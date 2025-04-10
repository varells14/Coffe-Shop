<x-app-layout>
    <div class="py-1 bg-gray-50">
        <div class="max-w-38xl mx-auto sm:px-6 lg:px-1">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Orders Management</h2>
                        <div class="flex space-x-2">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                </svg>
                                Filter
                            </button>
                            <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Export
                            </button>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                        <div class="bg-white p-4 rounded-lg shadow border border-gray-100">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500">Total Orders</div>
                                    <div class="text-xl font-semibold">{{ $orders->count() }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow border border-gray-100">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500">Pending</div>
                                    <div class="text-xl font-semibold">{{ $orders->where('status', 'pending')->count() }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow border border-gray-100">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500">Processed</div>
                                    <div class="text-xl font-semibold">{{ $orders->where('status', 'processed')->count() }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow border border-gray-100">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500">Completed</div>
                                    <div class="text-xl font-semibold">{{ $orders->where('status', 'completed')->count() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Search Bar -->
                    <div class="mb-6">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Search orders by customer name, status...">
                        </div>
                    </div>

                    <!-- Orders Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($orders as $order)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $order->customer_name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($order->status == 'completed') bg-green-100 text-green-800 
                                            @elseif($order->status == 'processed') bg-blue-100 text-blue-800 
                                            @elseif($order->status == 'cancelled') bg-red-100 text-red-800 
                                            @else bg-yellow-100 text-yellow-800 @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Rp {{ number_format($order->order_items_sum_total_amount, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div>{{ $order->created_at->format('d M Y') }}</div>
                                        <div class="text-xs text-gray-400">{{ $order->created_at->format('H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <button type="button" class="px-3 py-1.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 text-xs" onclick="openOrderModal({{ $order->id }})">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No orders found</h3>
                                        <p class="mt-1 text-sm text-gray-500">No order data available at the moment.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-4 flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">{{ min($orders->count(), 10) }}</span> of <span class="font-medium">{{ $orders->count() }}</span> entries
                        </div>
                        <div class="flex-1 flex justify-end">
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="#" aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    1
                                </a>
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Order Detail Modal -->
@foreach ($orders as $order)
    <div id="orderModal{{ $order->id }}" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl max-w-4xl w-full mx-4 overflow-hidden">
            <div class="flex justify-between items-center border-b px-6 py-4 bg-gray-50">
                <h3 class="text-lg font-bold text-gray-800">Order #{{ $order->id }} - {{ $order->customer_name }}</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600" onclick="closeOrderModal({{ $order->id }})">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-6 max-h-[70vh] overflow-y-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-700 mb-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Customer Information
                        </h4>
                        <div class="space-y-2">
                            <p class="text-gray-800"><span class="font-medium">Name:</span> {{ $order->customer_name }}</p>
                            <p class="text-gray-800"><span class="font-medium">Order Date:</span> {{ $order->created_at->format('d M Y H:i') }}</p>
                            <p class="text-gray-800"><span class="font-medium">Status:</span> 
                                <span class="px-2 py-1 rounded-full text-xs font-medium 
                                    @if($order->status == 'completed') bg-green-100 text-green-800 
                                    @elseif($order->status == 'processed') bg-blue-100 text-blue-800 
                                    @elseif($order->status == 'cancelled') bg-red-100 text-red-800 
                                    @else bg-yellow-100 text-yellow-800 @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-700 mb-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            Order Summary
                        </h4>
                        <div class="space-y-2">
                            <p class="text-gray-800"><span class="font-medium">Total Items:</span> {{ $order->orderItems->count() }}</p>
                            <p class="text-gray-800"><span class="font-medium">Total Amount:</span> 
                                <span class="text-lg font-bold text-gray-900">Rp {{ number_format($order->order_items_sum_total_amount, 0, ',', '.') }}</span>
                            </p>
                        </div>
                    </div>
                </div>

                <h4 class="text-sm font-medium text-gray-700 mb-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Purchased Items
                </h4>
                <div class="overflow-x-auto rounded-lg bg-gray-50 mb-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Menus</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-600 uppercase tracking-wider">Price</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">Quantity</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-600 uppercase tracking-wider">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($order->orderItems as $item)
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->product_name ?? 'Produk' }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600 text-right">Rp {{ number_format($item->price_per_unit ?? 0, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600 text-center">
                                        <span class="px-2 py-1 text-xs bg-gray-100 rounded-full">{{ $item->quantity ?? 1 }}</span>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-semibold text-gray-900 text-right">
                                        Rp {{ number_format($item->price_per_unit * $item->quantity, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="bg-gray-50">
                                <td colspan="3" class="px-4 py-3 text-right font-medium text-gray-700">Total:</td>
                                <td class="px-4 py-3 text-right font-bold text-lg text-gray-900"> Rp {{ number_format($order->order_items_sum_total_amount, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Form for changing order status -->
                <div class="mt-8 bg-gray-50 p-4 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Update Order Status
                    </h4>
                    <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" class="flex flex-wrap gap-2">
                        @csrf
                        <button type="submit" name="status" value="processed" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Process Order
                        </button>
                        <button type="submit" name="status" value="completed" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Complete Order
                        </button>
                        <button type="submit" name="status" value="cancelled" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 text-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Cancel Order
                        </button>
                    </form>
                </div>
            </div>

            <div class="border-t px-6 py-4 bg-gray-50 flex justify-end">
                <button type="button" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 flex items-center" onclick="closeOrderModal({{ $order->id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Close
                </button>
            </div>
        </div>
    </div>
@endforeach

    <script>
        function openOrderModal(id) {
            document.getElementById('orderModal' + id).classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }
        
        function closeOrderModal(id) {
            document.getElementById('orderModal' + id).classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    </script>
</x-app-layout>