<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Orders;
use App\Models\OrderItems;
use Illuminate\Support\Str;
use App\Services\MidtransService;

class CustomerController extends Controller
{
    public function products()
    {
        $products = Products::all();
        return view('shop', compact('products'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $cart = session()->get('cart', []);
        $quantity = $request->input('quantity', 1);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "product_name" => $product->name,
                "price" => $product->price,
                "quantity" => $quantity,
                "image" => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['cart' => $cart]);
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json(['cart' => $cart]);
    }
    
    public function clearCart()
    {
        session()->forget('cart');
        return response()->json(['success' => true]);
    }
    
    public function checkout(Request $request)
    {
        // Validate request
        $request->validate([
            'customer_name' => 'required|string|max:255',
        ]);
        
        // Get cart items
        $cart = session()->get('cart', []);
        
        // Check if cart is empty
        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'message' => 'Your cart is empty'
            ]);
        }
        
        try {
            $orderId = 'ORD-' . Str::random(10);
            
            $order = Orders::create([
                'order_id' => $orderId,
                'customer_name' => $request->customer_name,
                'status' => 'pending'
            ]);
            
            // Calculate total amount & create order items
            $totalAmount = 0;
            $itemDetails = [];
    
            foreach ($cart as $productId => $item) {
                $itemTotal = $item['price'] * $item['quantity'];
                $totalAmount += $itemTotal;
                
                OrderItems::create([
                    'order_id' => $orderId,
                    'product_name' => $item['product_name'],
                    'quantity' => $item['quantity'],
                    'price_per_unit' => $item['price'],
                    'total_amount' => $itemTotal
                ]);
    
                // Add to item_details for Midtrans
                $itemDetails[] = [
                    'id' => $productId,
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'name' => $item['product_name'],
                ];
            }
    
            // Midtrans Integration
            $midtrans = new MidtransService();
    
            $transactionDetails = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => $totalAmount,
                ],
                'customer_details' => [
                    'first_name' => $request->customer_name,
                    'email' => 'dummy@email.com', // optional
                    'phone' => '081234567890', // optional
                ],
                'item_details' => $itemDetails,
            ];
    
            $snapToken = $midtrans->createTransaction($transactionDetails);
    
            return response()->json([
                'success' => true,
                'order_id' => $orderId,
                'snap_token' => $snapToken
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create order: ' . $e->getMessage()
            ]);
        }
    }
}