<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users Management') }}
            </h2>
            <a href="{{ route('admin.users') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200 flex items-center">
                <i class="fas fa-plus-circle mr-2"></i>
                <span>Add New User</span>
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-500 bg-opacity-10 text-blue-500 mr-4">
                                <i class="fas fa-users text-2xl"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Users</p>
                                <p class="text-2xl font-semibold text-gray-800 dark:text-white">{{ $users->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-500 bg-opacity-10 text-green-500 mr-4">
                                <i class="fas fa-user-check text-2xl"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Active Users</p>
                                <p class="text-2xl font-semibold text-gray-800 dark:text-white">{{ $users->where('email_verified_at', '!=', null)->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-red-500 bg-opacity-10 text-red-500 mr-4">
                                <i class="fas fa-user-slash text-2xl"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Unverified Users</p>
                                <p class="text-2xl font-semibold text-gray-800 dark:text-white">{{ $users->where('email_verified_at', null)->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Search & Filter -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0">
                        <div class="flex-1 flex items-center">
                            <div class="relative flex-1 max-w-md">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <i class="fas fa-search text-gray-400"></i>
                                </span>
                                <input type="text" id="searchInput" class="pl-10 pr-4 py-2 w-full border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="Search users...">
                            </div>
                        </div>
                        
                        <div class="flex space-x-2">
                            <button id="viewGrid">
                             
                            </button>
                            <button id="viewList" class="p-2 rounded-md hover:bg-gray-100 text-gray-600 dark:hover:bg-gray-700 dark:text-gray-400 focus:outline-none">
                               
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Users Grid View -->
            <div id="gridView" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($users as $user)
                    <div class="user-card bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg transition-all duration-300 hover:shadow-md">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="h-12 w-12 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center mr-4 text-xl font-bold text-gray-600 dark:text-gray-300 overflow-hidden">
                                    @if($user->profile_photo_path)
                                        <img src="{{ Storage::url($user->profile_photo_path) }}" alt="{{ $user->name }}" class="h-full w-full object-cover">
                                    @else
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    @endif
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $user->name }}</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                                </div>
                            </div>
                            
                            <div class="mt-2 flex flex-wrap gap-2">
                                <span class="px-2 py-1 text-xs rounded-full {{ $user->email_verified_at ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                                    {{ $user->email_verified_at ? 'Verified' : 'Unverified' }}
                                </span>
                                @if($user->created_at)
                                    <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        Joined: {{ $user->created_at->format('M d, Y') }}
                                    </span>
                                @endif
                            </div>
                            
                            <div class="mt-4 flex justify-end space-x-2">
                                <a href="{{ route('admin.users', $user->id) }}" class="p-2 rounded-md bg-blue-50 text-blue-600 hover:bg-blue-100 dark:bg-blue-900 dark:text-blue-300 dark:hover:bg-blue-800 transition-colors duration-200">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="confirmDelete({{ $user->id }})" class="p-2 rounded-md bg-red-50 text-red-600 hover:bg-red-100 dark:bg-red-900 dark:text-red-300 dark:hover:bg-red-800 transition-colors duration-200">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                              
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 p-6 text-center bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                        <div class="flex flex-col items-center p-6">
                            <i class="fas fa-users text-4xl text-gray-400 mb-4"></i>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-1">No Users Found</h3>
                            <p class="text-gray-500 dark:text-gray-400">There are no users in the system yet.</p>
                            <a href="{{ route('admin.users') }}" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200">
                                Add First User
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
            
         

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white dark:bg-gray-800 rounded-lg max-w-md w-full p-6">
            <div class="text-center">
                <i class="fas fa-exclamation-triangle text-red-500 text-5xl mb-4"></i>
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Delete User</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6">Are you sure you want to delete this user? This action cannot be undone.</p>
            </div>
            <div class="flex justify-center space-x-4">
                <button id="cancelDelete" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 transition-colors duration-200">
                    Cancel
                </button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const gridViewBtn = document.getElementById('viewGrid');
            const listViewBtn = document.getElementById('viewList');
            const gridView = document.getElementById('gridView');
            const listView = document.getElementById('listView');
            const searchInput = document.getElementById('searchInput');
            const deleteModal = document.getElementById('deleteModal');
            const cancelDelete = document.getElementById('cancelDelete');
            const deleteForm = document.getElementById('deleteForm');
            const userCards = document.querySelectorAll('.user-card');
            
            // View switching
            gridViewBtn.addEventListener('click', function() {
                gridView.classList.remove('hidden');
                listView.classList.add('hidden');
                gridViewBtn.classList.add('bg-blue-100', 'text-blue-600', 'dark:bg-blue-900', 'dark:text-blue-300');
                gridViewBtn.classList.remove('hover:bg-gray-100', 'text-gray-600', 'dark:hover:bg-gray-700', 'dark:text-gray-400');
                listViewBtn.classList.remove('bg-blue-100', 'text-blue-600', 'dark:bg-blue-900', 'dark:text-blue-300');
                listViewBtn.classList.add('hover:bg-gray-100', 'text-gray-600', 'dark:hover:bg-gray-700', 'dark:text-gray-400');
            });
            
            listViewBtn.addEventListener('click', function() {
                gridView.classList.add('hidden');
                listView.classList.remove('hidden');
                listViewBtn.classList.add('bg-blue-100', 'text-blue-600', 'dark:bg-blue-900', 'dark:text-blue-300');
                listViewBtn.classList.remove('hover:bg-gray-100', 'text-gray-600', 'dark:hover:bg-gray-700', 'dark:text-gray-400');
                gridViewBtn.classList.remove('bg-blue-100', 'text-blue-600', 'dark:bg-blue-900', 'dark:text-blue-300');
                gridViewBtn.classList.add('hover:bg-gray-100', 'text-gray-600', 'dark:hover:bg-gray-700', 'dark:text-gray-400');
            });
            
            // Search functionality
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                userCards.forEach(card => {
                    const userName = card.querySelector('h3').textContent.toLowerCase();
                    const userEmail = card.querySelector('p').textContent.toLowerCase();
                    
                    if (userName.includes(searchTerm) || userEmail.includes(searchTerm)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
            
            // Delete modal
            cancelDelete.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });
            
            window.confirmDelete = function(userId) {
                deleteForm.action = `/admin/users/${userId}`;
                deleteModal.classList.remove('hidden');
            };
            
            // Close modal when clicking outside
            deleteModal.addEventListener('click', function(e) {
                if (e.target === deleteModal) {
                    deleteModal.classList.add('hidden');
                }
            });
        });
    </script>
</x-app-layout>