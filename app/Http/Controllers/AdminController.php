<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\OrderItems;
use App\Models\Orders;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Mendapatkan bulan dan tahun saat ini
        $currentMonth = now()->month;
        $currentYear = now()->year;
    
        // Jumlah orderan bulan ini
        $ordersThisMonth = Orders::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();
    
        // Total amount orderItems bulan ini
        $totalThisMonth = OrderItems::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('total_amount');
    
        // Jumlah orderan yang statusnya 'pending' bulan ini
        $pendingThisMonth = Orders::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('status', 'pending')
            ->count();
    
        // Jumlah customer unik yang melakukan order bulan ini
        $customerThisMonth = Orders::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->distinct('customer_name')
            ->count('customer_name');

            $menuFavorites = OrderItems::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->select('product_name', \DB::raw('COUNT(*) as count'))
            ->groupBy('product_name')
            ->orderByDesc('count')
            ->limit(5)
            ->with('product')  // Mengambil relasi product (termasuk gambar)
            ->get();
    
        return view('admin.dashboard', compact('ordersThisMonth', 'totalThisMonth', 'pendingThisMonth', 'customerThisMonth', 'menuFavorites'));
    }
    


  public function users()
  {
    $users = User::all();
    return view('admin.users', compact('users'));
  }
  


        


  public function orders()
{
    // Mengambil data orderan hari ini
    $ordersToday = Orders::whereDate('created_at', today())->count();

    // Ambil semua orders dengan relasi orderItems dan total_amount
    $orders = Orders::with('orderItems')
        ->withSum('orderItems', 'total_amount')
        ->orderBy('created_at', 'desc') 
        ->get();
        

    return view('admin.orders', compact('orders', 'ordersToday'));
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
