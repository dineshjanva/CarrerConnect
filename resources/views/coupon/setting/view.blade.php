<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details | CouponHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4f46e5',
                        secondary: '#6366f1',
                        dark: '#1e293b',
                        light: '#f8fafc'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="flex flex-col w-64 bg-white shadow-lg transition-all duration-300">
            <!-- Logo -->
            <div class="flex items-center justify-between h-16 px-4 border-b">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-tag text-white text-xl"></i>
                    </div>
                    <span class="text-xl font-bold text-indigo-600">CouponHub</span>
                </div>
                <button id="sidebarToggle" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
            
            <!-- Navigation Links -->
            <div class="flex flex-col flex-1 overflow-y-auto py-4">
                <!-- Group 1 -->
                <div class="sidebar-group">
                    <div class="flex items-center justify-between px-4 py-3 cursor-pointer group-header">
                        <div class="flex items-center">
                            <i class="fas fa-chart-line mr-3 text-indigo-600"></i>
                            <span class="font-medium">Dashboard</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                    </div>
                    <div class="sidebar-group-content">
                        <ul class="pl-4">
                            <li class="mb-1">
                                <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg sidebar-link">
                                    <i class="fas fa-chart-simple mr-3"></i>
                                    <span>Overview</span>
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg sidebar-link">
                                    <i class="fas fa-chart-pie mr-3"></i>
                                    <span>Analytics</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Group 2 -->
                <div class="sidebar-group mt-2">
                    <div class="flex items-center justify-between px-4 py-3 cursor-pointer group-header">
                        <div class="flex items-center">
                            <i class="fas fa-shopping-cart mr-3 text-indigo-600"></i>
                            <span class="font-medium">Sales</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                    </div>
                    <div class="sidebar-group-content">
                        <ul class="pl-4">
                            <li class="mb-1">
                                <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg sidebar-link">
                                    <i class="fas fa-shopping-bag mr-3"></i>
                                    <span>Orders</span>
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg sidebar-link">
                                    <i class="fas fa-tag mr-3"></i>
                                    <span>Coupons</span>
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg sidebar-link">
                                    <i class="fas fa-gift mr-3"></i>
                                    <span>Promotions</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Other Links -->
                <div class="mt-4">
                    <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg sidebar-link">
                        <i class="fas fa-users mr-3"></i>
                        <span>Customers</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg sidebar-link">
                        <i class="fas fa-file-chart-line mr-3"></i>
                        <span>Reports</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg sidebar-link">
                        <i class="fas fa-cog mr-3"></i>
                        <span>Settings</span>
                    </a>
                </div>
                
                <!-- Logout Link -->
                <div class="mt-auto px-4">
                    <a href="#" class="flex items-center px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Navigation -->
            <header class="flex items-center justify-between px-6 py-4 bg-white shadow-sm">
                <!-- Left: Toggle Button for Mobile -->
                <button id="mobileSidebarToggle" class="md:hidden text-gray-600 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                
                <!-- Breadcrumbs -->
                <div class="flex items-center text-sm text-gray-600">
                    <a href="#" class="text-indigo-600 hover:text-indigo-800">Products</a>
                    <i class="fas fa-chevron-right mx-2 text-xs"></i>
                    <span class="text-gray-800 font-medium">Premium Wireless Headphones</span>
                </div>
                
                <!-- Right: Icons and User Profile -->
                <div class="flex items-center space-x-4">
                    <!-- Notification Bell -->
                    <button class="relative p-2 text-gray-600 hover:bg-gray-100 rounded-full">
                        <i class="fas fa-bell text-lg"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    
                    <!-- User Profile -->
                    <div class="relative">
                        <button class="flex items-center space-x-2 focus:outline-none">
                            <div class="w-9 h-9 bg-indigo-100 rounded-full flex items-center justify-center">
                                <span class="font-semibold text-indigo-700">AD</span>
                            </div>
                            <div class="hidden md:block text-left">
                                <span class="block text-gray-700 font-medium">Admin User</span>
                            </div>
                        </button>
                    </div>
                </div>
            </header>
            
            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-6">
                <div class="max-w-7xl mx-auto">
                    <!-- Product Header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Premium Wireless Headphones</h1>
                            <p class="text-gray-600 mt-1">SKU: AUD-012 | Category: Electronics</p>
                        </div>
                        <div class="mt-4 md:mt-0 flex items-center space-x-3">
                            <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 flex items-center">
                                <i class="fas fa-edit mr-2"></i>
                                Edit Product
                            </button>
                            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Product Details Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                        <!-- Product Image Gallery -->
                        <div class="bg-white rounded-xl shadow-sm p-6 lg:col-span-1">
                            <div class="relative pb-[100%] mb-4 rounded-lg bg-gray-100 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                                     alt="Premium Wireless Headphones" 
                                     class="absolute h-full w-full object-contain">
                            </div>
                            <div class="grid grid-cols-4 gap-2">
                                <div class="aspect-square bg-gray-100 rounded border border-gray-200 cursor-pointer">
                                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" 
                                         alt="Thumbnail 1" 
                                         class="h-full w-full object-cover">
                                </div>
                                <div class="aspect-square bg-gray-100 rounded border border-gray-200 cursor-pointer">
                                    <img src="https://images.unsplash.com/photo-1590658268037-6bf12165a8df?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" 
                                         alt="Thumbnail 2" 
                                         class="h-full w-full object-cover">
                                </div>
                                <div class="aspect-square bg-gray-100 rounded border border-gray-200 cursor-pointer">
                                    <img src="https://images.unsplash.com/photo-1593784991095-a205069470b6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" 
                                         alt="Thumbnail 3" 
                                         class="h-full w-full object-cover">
                                </div>
                                <div class="aspect-square bg-gray-100 rounded border border-gray-200 cursor-pointer flex items-center justify-center">
                                    <i class="fas fa-plus text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product Information -->
                        <div class="bg-white rounded-xl shadow-sm p-6 lg:col-span-2">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Basic Info -->
                                <div>
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">Basic Information</h3>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                                            <p class="text-gray-900">Premium Wireless Headphones</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">SKU</label>
                                            <p class="text-gray-900">AUD-012</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                            <p class="text-gray-900">Electronics > Audio > Headphones</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                                            <p class="text-gray-900">AudioPro</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Pricing -->
                                <div>
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">Pricing & Inventory</h3>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                                            <p class="text-gray-900 font-bold">$149.99</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Cost Price</label>
                                            <p class="text-gray-900">$89.50</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
                                            <div class="flex items-center">
                                                <p class="text-gray-900 mr-2">142</p>
                                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">In Stock</span>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Active</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Description -->
                                <div class="md:col-span-2">
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">Description</h3>
                                    <div class="prose max-w-none text-gray-600">
                                        <p>Experience crystal-clear sound with our Premium Wireless Headphones. Featuring advanced noise cancellation technology, 30-hour battery life, and ultra-comfortable memory foam ear cushions, these headphones are perfect for music lovers and professionals alike.</p>
                                        <ul class="mt-3">
                                            <li>Bluetooth 5.0 with 30ft range</li>
                                            <li>Active Noise Cancellation (ANC)</li>
                                            <li>30-hour playtime with quick charge</li>
                                            <li>Built-in microphone for calls</li>
                                            <li>Foldable design with carrying case</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Additional Sections -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                        <!-- Sales Performance -->
                        <div class="bg-white rounded-xl shadow-sm p-6 lg:col-span-2">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-lg font-bold text-gray-800">Sales Performance</h2>
                                <select class="px-3 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
                                    <option>Last 7 Days</option>
                                    <option selected>Last 30 Days</option>
                                    <option>Last 90 Days</option>
                                    <option>This Year</option>
                                </select>
                            </div>
                            <div class="h-64">
                                <div class="flex items-center justify-center h-full bg-gray-50 rounded-lg">
                                    <p class="text-gray-500">Sales chart would appear here</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mt-6">
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="text-sm text-gray-600">Total Sold</p>
                                    <p class="text-xl font-bold text-gray-800">142</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="text-sm text-gray-600">Total Revenue</p>
                                    <p class="text-xl font-bold text-gray-800">$21,298.58</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="text-sm text-gray-600">Avg. Daily</p>
                                    <p class="text-xl font-bold text-gray-800">4.7</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product Variants -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-lg font-bold text-gray-800">Variants</h2>
                                <button class="px-3 py-1 bg-indigo-600 text-white rounded-lg text-sm hover:bg-indigo-700">
                                    <i class="fas fa-plus mr-1"></i> Add Variant
                                </button>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center p-3 border rounded-lg hover:bg-gray-50">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-headphones text-blue-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gray-800">Black</h4>
                                        <p class="text-gray-600 text-sm">SKU: AUD-012-BLK</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-gray-900 font-medium">$149.99</p>
                                        <p class="text-gray-600 text-sm">Stock: 78</p>
                                    </div>
                                </div>
                                <div class="flex items-center p-3 border rounded-lg hover:bg-gray-50">
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-headphones text-gray-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gray-800">Silver</h4>
                                        <p class="text-gray-600 text-sm">SKU: AUD-012-SLV</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-gray-900 font-medium">$149.99</p>
                                        <p class="text-gray-600 text-sm">Stock: 64</p>
                                    </div>
                                </div>
                                <div class="flex items-center p-3 border rounded-lg hover:bg-gray-50">
                                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-headphones text-red-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gray-800">Red</h4>
                                        <p class="text-gray-600 text-sm">SKU: AUD-012-RED</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-gray-900 font-medium">$159.99</p>
                                        <p class="text-gray-600 text-sm">Stock: 0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Related Products -->
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-lg font-bold text-gray-800">Related Products</h2>
                            <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                                View All
                            </button>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="aspect-square bg-gray-100 rounded-lg mb-3 flex items-center justify-center">
                                    <i class="fas fa-headphones text-gray-400 text-2xl"></i>
                                </div>
                                <h4 class="font-medium text-gray-800">Wireless Earbuds</h4>
                                <p class="text-gray-600 text-sm">$79.99</p>
                            </div>
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="aspect-square bg-gray-100 rounded-lg mb-3 flex items-center justify-center">
                                    <i class="fas fa-volume-up text-gray-400 text-2xl"></i>
                                </div>
                                <h4 class="font-medium text-gray-800">Portable Speaker</h4>
                                <p class="text-gray-600 text-sm">$59.99</p>
                            </div>
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="aspect-square bg-gray-100 rounded-lg mb-3 flex items-center justify-center">
                                    <i class="fas fa-headphones text-gray-400 text-2xl"></i>
                                </div>
                                <h4 class="font-medium text-gray-800">Noise Cancelling Headphones</h4>
                                <p class="text-gray-600 text-sm">$199.99</p>
                            </div>
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="aspect-square bg-gray-100 rounded-lg mb-3 flex items-center justify-center">
                                    <i class="fas fa-microphone text-gray-400 text-2xl"></i>
                                </div>
                                <h4 class="font-medium text-gray-800">USB Microphone</h4>
                                <p class="text-gray-600 text-sm">$89.99</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar Backdrop -->
    <div id="mobileSidebarBackdrop" class="fixed inset-0 z-40 bg-gray-900 bg-opacity-50 hidden"></div>

    <script>
        // Toggle desktop sidebar
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-16');
            
            // Toggle text in sidebar
            document.querySelectorAll('.group-header span, .sidebar-link span').forEach(el => {
                el.classList.toggle('hidden');
            });
            
            // Adjust icons position
            document.querySelectorAll('.sidebar-link i, .group-header i').forEach(icon => {
                icon.classList.toggle('mr-0');
                icon.classList.toggle('mx-auto');
            });
        });
        
        // Toggle mobile sidebar
        const mobileSidebarToggle = document.getElementById('mobileSidebarToggle');
        const mobileSidebarBackdrop = document.getElementById('mobileSidebarBackdrop');
        
        mobileSidebarToggle.addEventListener('click', () => {
            sidebar.classList.remove('w-16');
            sidebar.classList.add('w-64', 'fixed', 'left-0', 'top-0', 'z-50', 'h-full');
            mobileSidebarBackdrop.classList.remove('hidden');
            
            // Make sure text is visible in mobile view
            document.querySelectorAll('.group-header span, .sidebar-link span').forEach(el => {
                el.classList.remove('hidden');
            });
            
            // Reset icons position
            document.querySelectorAll('.sidebar-link i, .group-header i').forEach(icon => {
                icon.classList.remove('mr-0', 'mx-auto');
                icon.classList.add('mr-3');
            });
        });
        
        // Close mobile sidebar when clicking on backdrop
        mobileSidebarBackdrop.addEventListener('click', () => {
            sidebar.classList.remove('fixed', 'left-0', 'top-0', 'z-50', 'h-full');
            mobileSidebarBackdrop.classList.add('hidden');
        });
        
        // Toggle group links
        document.querySelectorAll('.group-header').forEach(header => {
            header.addEventListener('click', () => {
                const group = header.closest('.sidebar-group');
                group.classList.toggle('collapsed');
            });
        });
        
        // Image gallery thumbnail click handler
        document.querySelectorAll('.aspect-square.cursor-pointer').forEach(thumb => {
            thumb.addEventListener('click', function() {
                if(this.querySelector('img')) {
                    const mainImg = document.querySelector('.relative.pb-\\[100\\%\\] img');
                    const thumbImg = this.querySelector('img');
                    mainImg.src = thumbImg.src.replace('200&q=80', '1000&q=80');
                }
            });
        });
    </script>
</body>
</html>