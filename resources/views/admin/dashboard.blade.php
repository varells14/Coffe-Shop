<x-app-layout>
    <div class="py-6">
        <div class="max-w-38xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Dashboard V2 Coffee Shop</h2>

            <!-- Statistik Umum -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Total Pembelian Hari Ini -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 truncate">Monthly Purchases</p>
                                <div class="flex items-baseline">
                                    <p class="text-2xl font-semibold text-gray-900">
                                        {{ $ordersThisMonth }}  
                                    </p>
                                    <p class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                       
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pendapatan Hari Ini -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 truncate">Monthly Income</p>
                                <div class="flex items-baseline">
                                    <p class="text-2xl font-semibold text-gray-900">
                                    Rp {{ number_format($totalThisMonth, 0, ',', '.') }}  
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pesanan Tertunda -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 truncate">Pending Orders</p>
                                <div class="flex items-baseline">
                                    <p class="text-2xl font-semibold text-gray-900">
                                    {{ $pendingThisMonth }} 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Pelanggan -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 truncate">Total Customers</p>
                                <div class="flex items-baseline">
                                    <p class="text-2xl font-semibold text-gray-900">
                                    {{ $customerThisMonth }}   
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produk Terlaris -->
<div class="bg-white overflow-hidden shadow-sm rounded-lg">
    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Best Selling Menus</h3>
    </div>
    <div class="bg-white">
        <ul class="divide-y divide-gray-200">
            @foreach ($menuFavorites as $favorite)
                <li class="flex items-center space-x-6 py-4 px-6"> <!-- Menambah padding dan spasi antara gambar dan teks -->
                    <!-- Menampilkan Gambar Produk -->
                    <div class="flex-shrink-0">
                        <img src="{{ asset('storage/' . $favorite->product->image) }}" alt="{{ $favorite->product->name }}" class="w-16 h-16 object-cover rounded-md"> <!-- Ukuran gambar lebih besar-->
                    </div>
                    <!-- Menampilkan Nama Produk dan Jumlah Pesanan -->
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">{{ $favorite->product_name }}</p>
                        <p class="text-sm text-gray-500">{{ $favorite->count }} Times Purchased</p>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <a href="{{ route('admin.orders') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
            View All Menus <span aria-hidden="true">&rarr;</span>
            </a>
        </div>
    </div>
</div>


         

</x-app-layout>