<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- FontAwesome for icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .sidebar {
                transition: width 0.3s ease;
                overflow-x: hidden;
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
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
            <!-- Sidebar -->
            <aside id="sidebar" class="sidebar bg-gray-800 dark:bg-gray-900 text-white w-64 min-h-screen fixed z-10 shadow-lg">
                <!-- Logo -->
                <div class="p-4 flex items-center justify-center bg-[dark]">
    <div class="logo-full flex items-center space-x-3">
        <span class="text-3xl font-extrabold text-[#6b4f3b] tracking-wide bg-[#fff7f0] px-3 py-1 rounded-lg shadow-md">
            V2
        </span>
        <span class="text-2xl font-semibold text-[#white] italic">
            Coffee Shop
        </span>
    </div>
    <div class="logo-small hidden">
        <span class="text-2xl font-extrabold text-[#6b4f3b] bg-[#fff7f0] px-3 py-1 rounded-lg shadow-md">
            V2
        </span>
    </div>
</div>

                
                <!-- Navigation -->
                <nav class="mt-5">
                    @php
                        $currentRoute = Route::currentRouteName();
                    @endphp
                    
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 hover:bg-gray-700 transition-colors duration-200 text-gray-300 hover:text-white {{ $currentRoute == 'admin.dashboard' ? 'bg-gray-700 text-white' : '' }}">
                        <i class="fas fa-tachometer-alt w-6"></i>
                        <span class="sidebar-item-text ml-3">Dashboard</span>
                    </a>

                    <a href="{{ route('admin.orders') }}" class="flex items-center px-4 py-3 hover:bg-gray-700 transition-colors duration-200 text-gray-300 hover:text-white {{ $currentRoute == 'admin.orders' ? 'bg-gray-700 text-white' : '' }}">
                        <i class="fas fa-shopping-cart w-6"></i>
                        <span class="sidebar-item-text ml-3">Orders</span>
                    </a>

                    <a href="{{ route('admin.products') }}" class="flex items-center px-4 py-3 hover:bg-gray-700 transition-colors duration-200 text-gray-300 hover:text-white {{ $currentRoute == 'admin.products' ? 'bg-gray-700 text-white' : '' }}">
                    <i class="fas fa-concierge-bell text-lg w-6"></i>
                        <span class="sidebar-item-text ml-3">Menus</span>
                    </a>
                    
                    <a href="{{ route('admin.users') }}" class="flex items-center px-4 py-3 hover:bg-gray-700 transition-colors duration-200 text-gray-300 hover:text-white {{ $currentRoute == 'admin.users' ? 'bg-gray-700 text-white' : '' }}">
                        <i class="fas fa-users w-6"></i>
                        <span class="sidebar-item-text ml-3">Users</span>
                    </a>

                    
                    
                    
                  
                </nav>
            </aside>

            <div id="main-content" class="main-content sidebar-expanded flex-1 ml-64">
                <!-- Top Navigation -->
                <header class="bg-white dark:bg-gray-800 shadow flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 md:hidden">
                            <button id="mobile-menu-button" class="text-gray-600 dark:text-gray-300 focus:outline-none">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                        
                        <button id="toggle-sidebar" class="bg-[#white] text-[#6b4f3b] p-2 rounded-md shadowfocus:outline-none">
    <i class="fas fa-bars"></i>
</button>


                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <!-- Search Bar -->
                        <div class="hidden md:block">
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <i class="fas fa-search text-gray-400"></i>
                                </span>
                                <input type="text" class="pl-10 pr-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-blue-500 w-64 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Search...">
                            </div>
                        </div>
                        
                        <!-- Notifications -->
                        <button class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 relative">
                            <i class="fas fa-bell text-gray-600 dark:text-gray-300"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        
                        <!-- User Menu -->
                        <div class="relative">
                            <button id="user-menu-button" class="flex items-center text-gray-700 dark:text-gray-300 focus:outline-none">
                                @php
                                    $userName = Auth::user()->name;
                                    $initials = strtoupper(substr($userName, 0, 1));
                                @endphp
                                <img class="h-8 w-8 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ $initials }}" alt="User avatar">
                                <span class="ml-2 hidden md:block">{{ ucfirst($userName) }}</span>
                                <i class="fas fa-chevron-down ml-2 text-xs"></i>
                            </button>
                            
                            <!-- Dropdown Menu (Hidden by default) -->
                            <div id="user-dropdown" class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-50 hidden">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
                                <div class="border-t border-gray-200 dark:border-gray-700"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('main-content');
                const toggleButton = document.getElementById('toggle-sidebar');
                const mobileMenuButton = document.getElementById('mobile-menu-button');
                const userMenuButton = document.getElementById('user-menu-button');
                const userDropdown = document.getElementById('user-dropdown');
                
                // Toggle sidebar on button click
                toggleButton.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');
                    
                    if (sidebar.classList.contains('collapsed')) {
                        mainContent.classList.remove('sidebar-expanded');
                        mainContent.classList.add('sidebar-collapsed');
                    } else {
                        mainContent.classList.remove('sidebar-collapsed');
                        mainContent.classList.add('sidebar-expanded');
                    }
                });
                
                // Toggle sidebar on mobile
                mobileMenuButton?.addEventListener('click', function() {
                    sidebar.classList.toggle('translate-x-0');
                    sidebar.classList.toggle('-translate-x-full');
                });
                
                // Toggle user dropdown
                userMenuButton.addEventListener('click', function() {
                    userDropdown.classList.toggle('hidden');
                });
                
                // Close dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                        userDropdown.classList.add('hidden');
                    }
                });
                
                // Handle responsiveness
                function handleResize() {
                    if (window.innerWidth < 768) {
                        sidebar.classList.add('-translate-x-full');
                        mainContent.classList.remove('sidebar-expanded', 'sidebar-collapsed');
                        mainContent.classList.add('ml-0');
                    } else {
                        sidebar.classList.remove('-translate-x-full');
                        if (sidebar.classList.contains('collapsed')) {
                            mainContent.classList.add('sidebar-collapsed');
                        } else {
                            mainContent.classList.add('sidebar-expanded');
                        }
                    }
                }
                
                window.addEventListener('resize', handleResize);
                handleResize();
            });
        </script>
    </body>
</html>