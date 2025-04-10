<x-app-layout>
    <div class="py-6">
        <div class="max-w-38xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800">Menu Management</h2>
                        <button type="button" class="px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-300 flex items-center gap-2 font-medium" 
                                onclick="document.getElementById('addProductModal').classList.remove('hidden')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add New Item
                        </button>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                        @foreach ($products as $product)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 cursor-pointer border border-gray-100" 
                             onclick="openProductModal({{ $product->id }})">
                            <div class="h-48 overflow-hidden relative">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                                @else
                                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute top-3 right-3 bg-white bg-opacity-90 rounded-full p-1 shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-lg mb-1 text-gray-800 truncate">{{ $product->name }}</h3>
                                <p class="text-green-600 font-bold mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                <p class="text-gray-500 text-sm line-clamp-2">{{ $product->description }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @if(count($products) == 0)
                    <div class="text-center py-16 bg-gray-50 rounded-lg mt-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <p class="text-gray-500 text-lg font-medium">Belum ada produk yang tersedia.</p>
                        <button type="button" class="mt-4 px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-300 flex items-center gap-2 mx-auto font-medium" 
                                onclick="document.getElementById('addProductModal').classList.remove('hidden')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Tambah Menu Pertama
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Product Detail Modal -->
    @foreach ($products as $product)
    <div id="productModal{{ $product->id }}" class="fixed inset-0 bg-black bg-opacity-60 z-50 hidden flex items-center justify-center backdrop-blur-sm">
        <div class="bg-white rounded-xl shadow-xl max-w-3xl w-full mx-4 animate-scale-in">
            <div class="flex justify-between items-center border-b px-6 py-4">
                <h3 class="text-xl font-bold text-gray-800">Detail Menu</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors" onclick="closeProductModal({{ $product->id }})">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-6">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="md:w-2/5">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full rounded-lg shadow-md object-cover">
                        @else
                            <div class="w-full h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="md:w-3/5">
                        <h4 class="text-2xl font-bold mb-2 text-gray-800">{{ $product->name }}</h4>
                        <p class="text-green-600 font-bold text-xl mb-6">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <div class="mb-6">
                            <h5 class="text-sm font-medium text-gray-600 mb-2">Deskripsi:</h5>
                            <p class="text-gray-700">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t px-6 py-4 flex justify-end gap-3">
                <button type="button" class="px-5 py-2.5 bg-amber-500 text-white rounded-lg hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-300 transition-colors duration-300 flex items-center gap-2" onclick="openEditModal({{ $product->id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </button>
                <button type="button" class="px-5 py-2.5 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition-colors duration-300 flex items-center gap-2" onclick="openDeleteModal({{ $product->id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Delete
                </button>
                <button type="button" class="px-5 py-2.5 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors duration-300" onclick="closeProductModal({{ $product->id }})">
                    Close
                </button>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Edit Product Modal -->
    @foreach ($products as $product)
    <div id="editModal{{ $product->id }}" class="fixed inset-0 bg-black bg-opacity-60 z-50 hidden flex items-center justify-center backdrop-blur-sm">
        <div class="bg-white rounded-xl shadow-xl max-w-3xl w-full mx-4 animate-scale-in">
            <div class="flex justify-between items-center border-b px-6 py-4">
                <h3 class="text-xl font-bold text-gray-800">Edit Menu</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors" onclick="closeEditModal({{ $product->id }})">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-4">
                            <label for="name{{ $product->id }}" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                            <input type="text" id="name{{ $product->id }}" name="name" value="{{ $product->name }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors" required>
                        </div>
                        <div class="mb-4">
                            <label for="price{{ $product->id }}" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                            <input type="number" id="price{{ $product->id }}" name="price" value="{{ $product->price }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="description{{ $product->id }}" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea id="description{{ $product->id }}" name="description" rows="4" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="image{{ $product->id }}" class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                        <div class="flex items-center">
                            <label class="flex items-center justify-center w-full px-4 py-2.5 border border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-sm text-gray-600">Choose file</span>
                                <input type="file" id="image{{ $product->id }}" name="image" class="hidden">
                            </label>
                        </div>
                        @if($product->image)
                            <div class="mt-2 flex items-center">
                                <span class="text-sm text-gray-500 inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Current image: {{ $product->image }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="border-t px-6 py-4 flex justify-end gap-3">
                    <button type="submit" class="px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-300 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Save Changes
                    </button>
                    <button type="button" class="px-5 py-2.5 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors duration-300" onclick="closeEditModal({{ $product->id }})">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    <!-- Delete Confirmation Modal -->
    @foreach ($products as $product)
    <div id="deleteModal{{ $product->id }}" class="fixed inset-0 bg-black bg-opacity-60 z-50 hidden flex items-center justify-center backdrop-blur-sm">
        <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4 animate-scale-in">
            <div class="p-6">
                <div class="flex items-center justify-center mb-4 text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4 text-center">Delete Confirmation</h3>
                <p class="text-gray-600 text-center mb-2">Are you sure you want to delete the product <span class="font-medium text-gray-800">"{{ $product->name }}"</span>?</p>
                <p class="text-gray-600 text-center">This action cannot be undone.</p>
            </div>
            <div class="border-t px-6 py-4 flex justify-center gap-3">
                <form action="{{ route('admin.products.delete', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="px-5 py-2.5 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition-colors duration-300 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Yes, Delete
                    </button>
                </form>
                <button type="button" class="px-5 py-2.5 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors duration-300" onclick="closeDeleteModal({{ $product->id }})">
                    Batal
                </button>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Add Product Modal -->
    <div id="addProductModal" class="fixed inset-0 bg-black bg-opacity-60 z-50 hidden flex items-center justify-center backdrop-blur-sm">
        <div class="bg-white rounded-xl shadow-xl max-w-3xl w-full mx-4 animate-scale-in">
            <div class="flex justify-between items-center border-b px-6 py-4">
                <h3 class="text-xl font-bold text-gray-800">Add New Menu</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors" onclick="document.getElementById('addProductModal').classList.add('hidden')">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('admin.products.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors" required>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                            <input type="number" id="price" name="price" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea id="description" name="description" rows="4" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                        <div class="flex items-center">
                            <label class="flex items-center justify-center w-full px-4 py-2.5 border border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-sm text-gray-600">Upload image</span>
                                <input type="file" id="image" name="image" class="hidden">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="border-t px-6 py-4 flex justify-end gap-3">
                    <button type="submit" class="px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-300 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Create Menu Item
                    </button>
                    <button type="button" class="px-5 py-2.5 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors duration-300" onclick="document.getElementById('addProductModal').classList.add('hidden')">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .animate-scale-in {
            animation: scaleIn 0.3s ease-out;
        }
        
        @keyframes scaleIn {
            from {
                transform: scale(0.95);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
    </style>

    <script>
        function openProductModal(id) {
            document.getElementById('productModal' + id).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closeProductModal(id) {
            document.getElementById('productModal' + id).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        
        function openEditModal(id) {
            document.getElementById('productModal' + id).classList.add('hidden');
            document.getElementById('editModal' + id).classList.remove('hidden');
        }
        
        function closeEditModal(id) {
            document.getElementById('editModal' + id).classList.add('hidden');
            document.getElementById('productModal' + id).classList.remove('hidden');
        }
        
        function openDeleteModal(id) {
            document.getElementById('productModal' + id).classList.add('hidden');
            document.getElementById('deleteModal' + id).classList.remove('hidden');
        }
        function closeDeleteModal(id) {
            document.getElementById('deleteModal' + id).classList.add('hidden');
            document.getElementById('productModal' + id).classList.remove('hidden');
        }
        
        // Show filename when file is selected
        document.querySelectorAll('input[type="file"]').forEach(inputElement => {
            inputElement.addEventListener('change', (event) => {
                const fileName = event.target.files[0]?.name;
                if (fileName) {
                    const parent = event.target.parentElement;
                    const span = parent.querySelector('span');
                    if (span) {
                        span.textContent = fileName;
                    }
                }
            });
        });
        
        // Close modals when clicking outside
        document.addEventListener('click', (event) => {
            const modals = document.querySelectorAll('[id^="productModal"], [id^="editModal"], [id^="deleteModal"], #addProductModal');
            modals.forEach(modal => {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
            });
        });
        
        // Close modals with Escape key
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                const visibleModal = document.querySelector('[id^="productModal"]:not(.hidden), [id^="editModal"]:not(.hidden), [id^="deleteModal"]:not(.hidden), #addProductModal:not(.hidden)');
                if (visibleModal) {
                    visibleModal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
            }
        });
    </script>
</x-app-layout>