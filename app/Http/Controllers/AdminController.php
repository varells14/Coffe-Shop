<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\Orders;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
  public function dashboard()
  {
    return view('admin.dashboard');
  }

  public function users()
  {
    $users = User::all();
    return view('admin.users', compact('users'));
  }
  


        


  public function orders()
  {
      $orders = Orders::with('orderItems')
          ->withSum('orderItems', 'total_amount')
          ->orderBy('created_at', 'desc') 
          ->get();
      
      return view('admin.orders', compact('orders'));
  }
  

  public function updateOrderStatus(Request $request, $id)
{
    $validated = Validator::make($request->all(), [
        'status' => 'required|in:processed,completed,cancelled',
    ]);

    if ($validated->fails()) {
        return back()->withErrors($validated)->withInput();
    }

    $order = Orders::findOrFail($id);
    $order->status = $request->status;
    $order->save();

    return back()->with('success', 'Order status updated to ' . ucfirst($request->status));
}


  

    public function products()
    {
        $products = Products::all();
        return view('admin.products', compact('products'));
        
    }

    public function createProduct(Request $request)
    {
        $product = new Products();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $request->file('image')->store('images', 'public');
        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }
    public function deleteProduct($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }
    public function updateProduct(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }
}
