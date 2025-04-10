<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- FontAwesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }
    
    .sidebar {
        transition: width 0.3s ease;
        overflow-x: hidden;
    }
    
    #cartModal .rounded-lg {
        border-radius: 1rem;
    }
    
    #cartModal img {
        border-radius: 0.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    .sidebar.collapsed {
        width: 5rem;
    }
    
    .sidebar-item-text {
        transition: opacity 0.2s ease;
        white-space: nowrap;
    }
    
    .sidebar.collapsed .sidebar-item-text {
        opacity: 0;
        visibility: hidden;
    }
    
    .main-content {
        transition: margin-left 0.3s ease;
    }
    
    @media (min-width: 768px) {
        .main-content.sidebar-expanded {
            margin-left: 16rem;
        }
        
        .main-content.sidebar-collapsed {
            margin-left: 5rem;
        }
    }
    
    .logo-full {
        transition: opacity 0.2s ease;
    }
    
    .logo-small {
        display: none;
        transition: opacity 0.2s ease;
    }
    
    .sidebar.collapsed .logo-full {
        display: none;
    }
    
    .sidebar.collapsed .logo-small {
        display: block;
    }
    
    .quantity-control {
        display: flex;
        align-items: center;
        border: 1px solid #e2e8f0;
        border-radius: 0.375rem;
        overflow: hidden;
        width: 120px;
    }
    
    .quantity-btn {
        background-color: #f7fafc;
        border: none;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-weight: bold;
        color: #4a5568;
    }
    
    .quantity-input {
        border: none;
        text-align: center;
        width: 100%;
        font-size: 0.875rem;
        padding: 0.25rem 0;
    }
    
    .quantity-input:focus {
        outline: none;
    }
    
    .empty-cart-message {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }
    
    .empty-cart-icon {
        font-size: 3rem;
        color: #e2e8f0;
        margin-bottom: 1rem;
    }
    
    .checkout-form {
        padding: 1rem 1.5rem;
        background-color: #f8fafc;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
    }
    
    .form-group {
        margin-bottom: 1rem;
    }
    
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: #4b5563;
    }
    
    .form-input {
        width: 100%;
        padding: 0.5rem 0.75rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.375rem;
        font-size: 0.875rem;
    }
    
    .form-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    .invalid-feedback {
        color: #ef4444;
        font-size: 0.75rem;
        margin-top: 0.25rem;
    }
    
    /* Coffee Shop Specific Styles */
    .menu-header {
        background: linear-gradient(to right, #5a3921, #8b593d);
        color: #fff;
        border-radius: 0.5rem;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    .product-card {
        transition: all 0.3s ease;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        background: white;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    
    .product-img-container {
        height: 200px;
        overflow: hidden;
        position: relative;
    }
    
    .product-img-container img {
        transition: transform 0.5s ease;
    }
    
    .product-card:hover .product-img-container img {
        transform: scale(1.05);
    }
    
    .product-details {
        padding: 1.25rem;
    }
    
    .product-price {
        font-size: 1.1rem;
        font-weight: 600;
        color: #66410c;
    }
    
    .cart-btn {
        background: #a87c50;
        transition: all 0.3s ease;
        border-radius: 9999px;
    }
    
    .cart-btn:hover {
        background: #8b593d;
    }
    
    .modal-header {
        background: linear-gradient(to right, #5a3921, #8b593d);
        color: white;
    }
    
    .checkout-btn {
        background: #66410c;
        transition: all 0.3s ease;
    }
    
    .checkout-btn:hover {
        background: #4d3009;
    }
    
    .product-detail-price {
        color: #66410c;
    }
    
    .add-to-cart-btn {
        background: #a87c50;
        transition: all 0.3s ease;
    }
    
    .add-to-cart-btn:hover {
        background: #8b593d;
    }
    
    .buy-now-btn {
        background: #66410c;
        transition: all 0.3s ease;
    }
    
    .buy-now-btn:hover {
        background: #4d3009;
    }
    
    .notification {
        transition: all 0.3s ease;
    }
</style>

<div class="py-6 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="menu-header flex justify-between items-center">
            <div>
            <h1 class="text-4xl font-serif font-extrabold text-white-800 tracking-wide">V2 Coffee Shop</h1>
<p class="text-lg text-white-500 mt-3">Explore a curated experience of coffee, tea, and handcrafted delights</p>

            </div>
            <button type="button" class="cart-btn px-4 py-3 text-white rounded-full hover:shadow-lg focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-brown-300" onclick="openCartModal()">
                <i class="fas fa-shopping-cart mr-2"></i> Cart (<span id="cartItemCount">{{ count(session('cart', [])) }}</span>)
            </button>
        </div>

        <div class="bg-white overflow-hidden shadow-md rounded-xl p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                <div class="product-card cursor-pointer" onclick="openProductModal({{ $product->id }})">
                    <div class="product-img-container">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-mug-hot text-gray-400 text-4xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="product-details">
                        <h3 class="font-semibold text-lg text-gray-800 mb-2">{{ $product->name }}</h3>
                        <p class="product-price mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-gray-600 text-sm line-clamp-2">{{ $product->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            @if(count($products) == 0)
            <div class="text-center py-16">
                <i class="fas fa-coffee text-gray-300 text-5xl mb-4"></i>
                <p class="text-gray-500 text-lg">No products available at the moment. Please check back later!</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Product Detail Modal -->
@foreach ($products as $product)
<div id="productModal{{ $product->id }}" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full mx-4 overflow-hidden">
        <div class="modal-header flex justify-between items-center px-6 py-4">
            <h3 class="text-lg font-semibold text-white">Product Details</h3>
            <button type="button" class="text-white hover:text-gray-200" onclick="closeProductModal({{ $product->id }})">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="md:w-1/3">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full rounded-lg shadow-md">
                    @else
                        <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                            <i class="fas fa-mug-hot text-gray-400 text-4xl"></i>
                        </div>
                    @endif
                </div>
                <div class="md:w-2/3">
                    <h4 class="text-xl font-semibold mb-2">{{ $product->name }}</h4>
                    <p class="product-detail-price font-bold text-lg mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <div class="mb-6">
                        <h5 class="text-sm font-medium text-gray-600 mb-2">Description:</h5>
                        <p class="text-gray-700">{{ $product->description }}</p>
                    </div>
                    
                    <div class="mt-4">
                        <label for="quantityInput{{ $product->id }}" class="block text-sm font-medium text-gray-700 mb-1">Quantity:</label>
                        <div class="quantity-control">
                            <button type="button" class="quantity-btn" onclick="decrementQuantity({{ $product->id }})">-</button>
                            <input type="number" id="quantityInput{{ $product->id }}" class="quantity-input" min="1" value="1" readonly>
                            <button type="button" class="quantity-btn" onclick="incrementQuantity({{ $product->id }})">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t px-6 py-4 flex justify-end gap-3">
            <button onclick="addToCart({{ $product->id }})" class="add-to-cart-btn px-4 py-2 text-white rounded-md hover:shadow-lg focus:outline-none focus:ring focus:ring-opacity-50">
                <i class="fas fa-cart-plus mr-2"></i>Add To Cart
            </button>
            <button type="button" class="buy-now-btn px-4 py-2 text-white rounded-md hover:shadow-lg focus:outline-none focus:ring focus:ring-opacity-50" onclick="buyNow({{ $product->id }})">
                <i class="fas fa-shopping-bag mr-2"></i>Buy Now
            </button>
        </div>
    </div>
</div>
@endforeach

<!-- Cart Modal -->
<div id="cartModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-3xl w-full mx-4 max-h-[90vh] overflow-hidden flex flex-col">
        <div class="modal-header flex justify-between items-center px-6 py-4">
            <h3 class="text-lg font-semibold text-white">Your Cart</h3>
            <button type="button" class="text-white hover:text-gray-200" onclick="closeCartModal()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <div id="cartModalBody" class="overflow-y-auto flex-grow">
            @php $cart = session('cart', []); $total = 0; @endphp
            @if(count($cart) > 0)
                @foreach($cart as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <div class="flex items-center justify-between border-b pb-3 px-6 py-4 hover:bg-gray-50">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('storage/' . $item['image']) }}" class="w-20 h-20 object-cover rounded-md shadow-sm" alt="{{ $item['product_name'] }}">
                            <div>
                                <h4 class="font-semibold text-gray-800">{{ $item['product_name'] }}</h4>
                                <p class="text-sm text-gray-600">Qty: {{ $item['quantity'] }}</p>
                                <p class="font-medium text-gray-700">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold product-detail-price mb-2">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                            <button onclick="removeFromCart({{ $id }})" class="text-red-500 text-sm hover:underline flex items-center">
                                <i class="fas fa-trash-alt mr-1"></i> Remove
                            </button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-cart-message">
                    <i class="fas fa-shopping-cart empty-cart-icon"></i>
                    <p class="text-center text-gray-500">Your cart is empty.</p>
                    <p class="text-center text-gray-400 text-sm mt-2">Add some delicious coffee to get started!</p>
                </div>
            @endif
        </div>
        
        <div id="checkoutFormContainer" class="px-6 py-4 border-t {{ count($cart) == 0 ? 'hidden' : '' }}">
            <div class="flex justify-between items-center mb-4 bg-gray-50 p-4 rounded-lg">
                <span class="font-semibold text-gray-800">Total</span>
                <span id="cartTotal" class="text-lg font-bold product-detail-price">Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>
            
            <div class="checkout-form shadow-sm">
                <h4 class="text-md font-semibold text-gray-700 mb-3">Customer Information</h4>
                <div class="form-group">
                    <label for="customerName" class="form-label">Name</label>
                    <input type="text" id="customerName" class="form-input uppercase" placeholder="Enter your name" oninput="this.value = this.value.toUpperCase()">
                    <div id="customerNameError" class="invalid-feedback hidden">Please enter your name</div>
                </div>
            </div>
            
            <div class="flex justify-end">
                <button id="checkoutButton" onclick="proceedToCheckout()" class="checkout-btn w-full px-6 py-3 text-white rounded-md hover:shadow-lg focus:outline-none focus:ring focus:ring-opacity-50">
                    <i class="fas fa-credit-card mr-2"></i> Place Order
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Order Success Modal -->
<div id="orderSuccessModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 overflow-hidden">
        <div class="p-6 text-center">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-check-circle text-green-600 text-3xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Order Successful!</h3>
            <p class="text-gray-600 mb-6">Your order has been placed successfully.</p>
            <p class="text-gray-800 mb-4">Order ID: <span id="successOrderId" class="font-semibold"></span></p>
            <button type="button" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300" onclick="closeSuccessModal()">
                Continue Shopping
            </button>
        </div>
    </div>
</div>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script>
    // Setup CSRF token for AJAX requests
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    function openProductModal(id) {
        document.getElementById('productModal' + id).classList.remove('hidden');
    }
    
    function closeProductModal(id) {
        document.getElementById('productModal' + id).classList.add('hidden');
    }
    
    function openCartModal() {
        document.getElementById('cartModal').classList.remove('hidden');
    }
    
    function closeCartModal() {
        document.getElementById('cartModal').classList.add('hidden');
        document.getElementById('customerName').value = '';
        document.getElementById('customerNameError').classList.add('hidden');
    }
    
    function openSuccessModal(orderId) {
        document.getElementById('successOrderId').textContent = orderId;
        document.getElementById('orderSuccessModal').classList.remove('hidden');
    }
    
    function closeSuccessModal() {
        document.getElementById('orderSuccessModal').classList.add('hidden');
    }
    
    function incrementQuantity(id) {
        const input = document.getElementById('quantityInput' + id);
        input.value = parseInt(input.value) + 1;
    }
    
    function decrementQuantity(id) {
        const input = document.getElementById('quantityInput' + id);
        const currentValue = parseInt(input.value);
        if (currentValue > 1) {
            input.value = currentValue - 1;
        }
    }
    
    function addToCart(productId) {
        const quantity = parseInt(document.getElementById('quantityInput' + productId).value);
        
        fetch(`/cart/add/${productId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({ quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            updateCartModal(data.cart);
            closeProductModal(productId);
            
            // Show notification
            showNotification('Product added to cart!');
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Failed to add product to cart.', 'error');
        });
    }
    
    function buyNow(productId) {
        addToCart(productId);
        setTimeout(() => {
            openCartModal();
        }, 500);
    }
    
    function updateCartModal(cart) {
        let totalHarga = 0;
        let itemCount = 0;
        
        // Count items
        for (const id in cart) {
            itemCount += parseInt(cart[id].quantity);
        }
        
        // Update cart count in the header
        document.getElementById('cartItemCount').textContent = itemCount;
        
        const cartModalContent = Object.keys(cart).length === 0 
            ? `<div class="empty-cart-message">
                <i class="fas fa-shopping-cart empty-cart-icon"></i>
                <p class="text-center text-gray-500">Your cart is empty.</p>
                <p class="text-center text-gray-400 text-sm mt-2">Add some delicious coffee to get started!</p>
               </div>` 
            : Object.entries(cart).map(([id, item]) => {
                totalHarga += item.price * item.quantity;
                return `
                <div class="flex items-center justify-between border-b pb-3 px-6 py-4 hover:bg-gray-50">
                    <div class="flex items-center gap-4">
                        <img src="/storage/${item.image}" class="w-20 h-20 object-cover rounded-md shadow-sm" alt="${item.product_name}">
                        <div>
                            <h4 class="font-semibold text-gray-800">${item.product_name}</h4>
                            <p class="text-sm text-gray-600">Qty: ${item.quantity}</p>
                            <p class="font-medium text-gray-700">Rp ${formatRupiah(item.price)}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-bold product-detail-price mb-2">Rp ${formatRupiah(item.price * item.quantity)}</p>
                        <button onclick="removeFromCart(${id})" class="text-red-500 text-sm hover:underline flex items-center">
                            <i class="fas fa-trash-alt mr-1"></i> Remove
                        </button>
                    </div>
                </div>
                `;
            }).join('');
        
        document.getElementById('cartModalBody').innerHTML = cartModalContent;
        document.getElementById('cartTotal').textContent = `Rp ${formatRupiah(totalHarga)}`;
        
        // Show/hide checkout form based on cart contents
        const checkoutFormContainer = document.getElementById('checkoutFormContainer');
        if (Object.keys(cart).length === 0) {
            checkoutFormContainer.classList.add('hidden');
        } else {
            checkoutFormContainer.classList.remove('hidden');
        }
    }
    
    function removeFromCart(productId) {
        fetch(`/cart/remove/${productId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            }
        })
        .then(response => response.json())
        .then(data => {
            updateCartModal(data.cart);
            showNotification('Product removed from cart!');
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Failed to remove product from cart.', 'error');
        });
    }
    
    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID', { style: 'decimal', maximumFractionDigits: 0 }).format(number);
    }
    
    function proceedToCheckout() {
        // Validate customer name
        const customerName = document.getElementById('customerName').value.trim();
        const customerNameError = document.getElementById('customerNameError');
        
        if (!customerName) {
            customerNameError.classList.remove('hidden');
            return;
        } else {
            customerNameError.classList.add('hidden');
        }
        
        fetch('/checkout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({
                customer_name: customerName
            })
        })
        .then(response => response.json())
        .then(data => {
    if (data.success) {
        // ✅ MIDTRANS SNAP INTEGRATION
        snap.pay(data.snap_token, {
            onSuccess: function(result) {
                console.log('Success', result);
                showNotification('Payment successful!', 'success');

                // Optional: redirect or clear cart after payment
                fetch('/cart/clear', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    }
                }).then(() => {
                    updateCartModal({});
                    closeCartModal();
                    openSuccessModal(data.order_id);
                });

            },
            onPending: function(result) {
                console.log('Pending', result);
                showNotification('Payment pending. Please complete it.', 'info');
            },
            onError: function(result) {
                console.log('Error', result);
                showNotification('Payment failed. Please try again.', 'error');
            },
            onClose: function() {
                showNotification('Payment popup closed without completing the transaction.', 'warning');
            }
        });

    } else {
        showNotification(data.message || 'Failed to place order', 'error');
    }
})
    }
    
    function showNotification(message, type = 'success') {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 ${type === 'success' ? 'bg-green-500' : type === 'info' ? 'bg-blue-500' : type === 'warning' ? 'bg-yellow-500' : 'bg-red-500'} text-white notification`;
        notification.innerHTML = `<div class="flex items-center">
            <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'info' ? 'fa-info-circle' : type === 'warning' ? 'fa-exclamation-triangle' : 'fa-times-circle'} mr-2"></i>
            <span>${message}</span>
        </div>`;
        
        // Append to body
        document.body.appendChild(notification);
        
        // Remove after 3 seconds
        setTimeout(() => {
            notification.classList.add('opacity-0', 'transition-opacity', 'duration-300');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
</script>