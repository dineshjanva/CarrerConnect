<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
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
                        <i class="fas fa-box text-white text-xl"></i>
                    </div>
                    <span class="text-xl font-bold text-indigo-600">ProductHub</span>
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
                    <a href="#" class="flex items-center px-4 py-2 text-white bg-indigo-600 rounded-lg sidebar-link">
                        <i class="fas fa-boxes mr-3"></i>
                        <span>Products</span>
                    </a>
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
                    <a href="#" class="text-indigo-600 hover:text-indigo-800">Home</a>
                    <i class="fas fa-chevron-right mx-2 text-xs"></i>
                    <span class="text-gray-800 font-medium">Products</span>
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
                    <!-- Header with Create Button -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Product Management</h1>
                            <p class="text-gray-600 mt-1">Manage your product inventory and listings</p>
                        </div>
                        <button id="addProductBtn" class="mt-4 md:mt-0 px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition flex items-center">
                            <i class="fas fa-plus mr-2"></i>
                            Add Product
                        </button>
                    </div>
                    
                    <!-- Product Filters -->
                    <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                                <div class="relative">
                                    <input type="text" placeholder="Search products..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full">
                                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option>All Categories</option>
                                    <option>Electronics</option>
                                    <option>Clothing</option>
                                    <option>Home & Kitchen</option>
                                    <option>Books</option>
                                    <option>Beauty</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option>All Status</option>
                                    <option>Active</option>
                                    <option>Draft</option>
                                    <option>Archived</option>
                                    <option>Out of Stock</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Price Range</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option>All Prices</option>
                                    <option>Under $10</option>
                                    <option>$10 - $50</option>
                                    <option>$50 - $100</option>
                                    <option>Over $100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Table -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <!-- Table Header -->
                        <div class="flex flex-col md:flex-row md:items-center justify-between px-6 py-4 border-b">
                            <div class="mb-4 md:mb-0">
                                <div class="text-sm text-gray-700">
                                    Showing <span class="font-medium">1</span> to <span class="font-medium">8</span> of <span class="font-medium">24</span> products
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center">
                                    <span class="text-gray-600 mr-2">Sort by:</span>
                                    <select class="px-3 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <option>Newest</option>
                                        <option>Price: Low to High</option>
                                        <option>Price: High to Low</option>
                                        <option>Name: A-Z</option>
                                    </select>
                                </div>
                                <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                                    <i class="fas fa-filter"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <!-- Product 1 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" alt="Wireless Headphones">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">Wireless Bluetooth Headphones</div>
                                                    <div class="text-gray-500 text-sm">SKU: HD-001</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">Electronics</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900 font-medium">$89.99</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">42</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Active</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-indigo-600 hover:text-indigo-900 mr-3 view-product" data-id="1">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-yellow-600 hover:text-yellow-900 mr-3 edit-product" data-id="1">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900 delete-product" data-id="1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Product 2 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" alt="Smart Watch">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">Smart Fitness Watch</div>
                                                    <div class="text-gray-500 text-sm">SKU: WT-005</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">Electronics</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900 font-medium">$129.99</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">18</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Active</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-indigo-600 hover:text-indigo-900 mr-3 view-product" data-id="2">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-yellow-600 hover:text-yellow-900 mr-3 edit-product" data-id="2">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900 delete-product" data-id="2">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Product 3 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" alt="Running Shoes">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">Running Shoes</div>
                                                    <div class="text-gray-500 text-sm">SKU: SH-012</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">Clothing</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900 font-medium">$79.99</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">0</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">Out of Stock</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-indigo-600 hover:text-indigo-900 mr-3 view-product" data-id="3">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-yellow-600 hover:text-yellow-900 mr-3 edit-product" data-id="3">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900 delete-product" data-id="3">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Product 4 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1491553895911-0055eca6402d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" alt="Sports Cap">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">Sports Cap</div>
                                                    <div class="text-gray-500 text-sm">SKU: CP-008</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">Clothing</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900 font-medium">$24.99</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">56</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Active</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-indigo-600 hover:text-indigo-900 mr-3 view-product" data-id="4">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-yellow-600 hover:text-yellow-900 mr-3 edit-product" data-id="4">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900 delete-product" data-id="4">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Product 5 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" alt="Camera">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">Digital Camera</div>
                                                    <div class="text-gray-500 text-sm">SKU: CAM-015</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">Electronics</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900 font-medium">$249.99</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">7</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">Low Stock</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-indigo-600 hover:text-indigo-900 mr-3 view-product" data-id="5">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-yellow-600 hover:text-yellow-900 mr-3 edit-product" data-id="5">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900 delete-product" data-id="5">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="px-6 py-4 border-t">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                <div class="text-sm text-gray-700 mb-4 md:mb-0">
                                    Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">24</span> products
                                </div>
                                <div class="flex items-center space-x-2">
                                    <button class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-100">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="px-3 py-1 bg-indigo-600 text-white rounded-lg">1</button>
                                    <button class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-100">2</button>
                                    <button class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-100">3</button>
                                    <button class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-100">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- View Product Modal -->
    <div id="viewProductModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-4xl max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Product Details</h2>
                    <button id="closeViewModal" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="bg-gray-100 rounded-lg p-4 mb-4">
                            <img id="viewProductImage" class="w-full h-64 object-contain" src="" alt="Product Image">
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Category</p>
                                <p id="viewProductCategory" class="font-medium"></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">SKU</p>
                                <p id="viewProductSKU" class="font-medium"></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Stock</p>
                                <p id="viewProductStock" class="font-medium"></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Status</p>
                                <p id="viewProductStatus" class="font-medium"></p>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 id="viewProductName" class="text-xl font-bold text-gray-800 mb-2"></h3>
                        <p id="viewProductPrice" class="text-2xl font-bold text-indigo-600 mb-4"></p>
                        
                        <div class="mb-4">
                            <h4 class="text-lg font-medium text-gray-800 mb-2">Description</h4>
                            <p id="viewProductDescription" class="text-gray-600"></p>
                        </div>
                        
                        <div class="mb-4">
                            <h4 class="text-lg font-medium text-gray-800 mb-2">Specifications</h4>
                            <ul id="viewProductSpecs" class="list-disc pl-5 text-gray-600 space-y-1"></ul>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 pt-4 border-t flex justify-end space-x-3">
                    <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300" id="closeViewModal2">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Product Modal -->
    <div id="productFormModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-3xl max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 id="formModalTitle" class="text-xl font-bold text-gray-800">Add New Product</h2>
                    <button id="closeFormModal" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
                
                <form id="productForm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                                    <option value="">Select Category</option>
                                    <option>Electronics</option>
                                    <option>Clothing</option>
                                    <option>Home & Kitchen</option>
                                    <option>Books</option>
                                    <option>Beauty</option>
                                    <option>Sports</option>
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Price ($)</label>
                                <input type="number" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Stock Quantity</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                            </div>
                        </div>
                        
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">SKU</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                                    <option value="">Select Status</option>
                                    <option>Active</option>
                                    <option>Draft</option>
                                    <option>Archived</option>
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
                                <div class="flex items-center space-x-4">
                                    <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-image text-gray-400"></i>
                                    </div>
                                    <button type="button" class="px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                                        Upload Image
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" rows="3"></textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Specifications</label>
                        <div id="specificationsContainer" class="space-y-2">
                            <div class="flex items-center space-x-2">
                                <input type="text" placeholder="Specification" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg">
                                <input type="text" placeholder="Value" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg">
                                <button type="button" class="text-red-500">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="mt-2 px-3 py-1 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 flex items-center">
                            <i class="fas fa-plus mr-1"></i> Add Specification
                        </button>
                    </div>
                    
                    <div class="mt-6 pt-4 border-t flex justify-end space-x-3">
                        <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300" id="closeFormModal2">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                            Save Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mt-3">Delete Product</h3>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Are you sure you want to delete this product? This action cannot be undone.</p>
                </div>
                <div class="mt-4 flex justify-center space-x-3">
                    <button id="cancelDelete" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                        Cancel
                    </button>
                    <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

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
        
        // Product data for demo purposes
        const products = {
            1: {
                name: "Wireless Bluetooth Headphones",
                category: "Electronics",
                price: "$89.99",
                stock: "42",
                status: "Active",
                sku: "HD-001",
                description: "Premium wireless headphones with noise cancellation and 30-hour battery life. Perfect for music lovers and travelers.",
                specs: ["Bluetooth 5.0", "Active Noise Cancellation", "30h Battery Life", "Built-in Microphone"],
                image: "https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
            },
            2: {
                name: "Smart Fitness Watch",
                category: "Electronics",
                price: "$129.99",
                stock: "18",
                status: "Active",
                sku: "WT-005",
                description: "Track your fitness goals with this advanced smartwatch featuring heart rate monitoring, GPS, and sleep tracking.",
                specs: ["Heart Rate Monitor", "GPS Tracking", "Water Resistant", "7-day Battery"],
                image: "https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
            },
            3: {
                name: "Running Shoes",
                category: "Clothing",
                price: "$79.99",
                stock: "0",
                status: "Out of Stock",
                sku: "SH-012",
                description: "High-performance running shoes with extra cushioning and breathable mesh for maximum comfort during your runs.",
                specs: ["Lightweight Design", "Breathable Mesh", "Extra Cushioning", "Non-slip Sole"],
                image: "https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
            },
            4: {
                name: "Sports Cap",
                category: "Clothing",
                price: "$24.99",
                stock: "56",
                status: "Active",
                sku: "CP-008",
                description: "Adjustable sports cap with UV protection and moisture-wicking fabric to keep you cool during outdoor activities.",
                specs: ["Adjustable Fit", "UV Protection", "Moisture-wicking", "Lightweight"],
                image: "https://images.unsplash.com/photo-1491553895911-0055eca6402d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
            },
            5: {
                name: "Digital Camera",
                category: "Electronics",
                price: "$249.99",
                stock: "7",
                status: "Low Stock",
                sku: "CAM-015",
                description: "Professional digital camera with 24MP sensor, 4K video recording, and built-in Wi-Fi for instant sharing.",
                specs: ["24MP Sensor", "4K Video", "Wi-Fi Connectivity", "5x Optical Zoom"],
                image: "https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
            }
        };
        
        // View Product Modal
        const viewModal = document.getElementById('viewProductModal');
        const closeViewButtons = document.querySelectorAll('#closeViewModal, #closeViewModal2');
        
        document.querySelectorAll('.view-product').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                const product = products[productId];
                
                if (product) {
                    document.getElementById('viewProductName').textContent = product.name;
                    document.getElementById('viewProductCategory').textContent = product.category;
                    document.getElementById('viewProductPrice').textContent = product.price;
                    document.getElementById('viewProductStock').textContent = product.stock;
                    document.getElementById('viewProductStatus').textContent = product.status;
                    document.getElementById('viewProductSKU').textContent = product.sku;
                    document.getElementById('viewProductDescription').textContent = product.description;
                    document.getElementById('viewProductImage').src = product.image;
                    document.getElementById('viewProductImage').alt = product.name;
                    
                    // Update specifications
                    const specsList = document.getElementById('viewProductSpecs');
                    specsList.innerHTML = '';
                    product.specs.forEach(spec => {
                        const li = document.createElement('li');
                        li.textContent = spec;
                        specsList.appendChild(li);
                    });
                    
                    viewModal.classList.remove('hidden');
                }
            });
        });
        
        closeViewButtons.forEach(button => {
            button.addEventListener('click', () => {
                viewModal.classList.add('hidden');
            });
        });
        
        // Add/Edit Product Modal
        const formModal = document.getElementById('productFormModal');
        const formModalTitle = document.getElementById('formModalTitle');
        const closeFormButtons = document.querySelectorAll('#closeFormModal, #closeFormModal2');
        const addProductBtn = document.getElementById('addProductBtn');
        const productForm = document.getElementById('productForm');
        
        addProductBtn.addEventListener('click', () => {
            formModalTitle.textContent = "Add New Product";
            formModal.classList.remove('hidden');
        });
        
        document.querySelectorAll('.edit-product').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                formModalTitle.textContent = "Edit Product";
                formModal.classList.remove('hidden');
                // In a real app, you would populate the form with product data
            });
        });
        
        closeFormButtons.forEach(button => {
            button.addEventListener('click', () => {
                formModal.classList.add('hidden');
            });
        });
        
        productForm.addEventListener('submit', function(e) {
            e.preventDefault();
            alert("Product saved successfully!");
            formModal.classList.add('hidden');
            // In a real app, you would submit the form data to a server
        });
        
        // Delete Confirmation Modal
        const deleteModal = document.getElementById('deleteModal');
        const cancelDeleteBtn = document.getElementById('cancelDelete');
        const confirmDeleteBtn = document.getElementById('confirmDelete');
        let currentProductId = null;
        
        document.querySelectorAll('.delete-product').forEach(button => {
            button.addEventListener('click', function() {
                currentProductId = this.getAttribute('data-id');
                deleteModal.classList.remove('hidden');
            });
        });
        
        cancelDeleteBtn.addEventListener('click', () => {
            deleteModal.classList.add('hidden');
            currentProductId = null;
        });
        
        confirmDeleteBtn.addEventListener('click', () => {
            if (currentProductId) {
                alert(`Product ID ${currentProductId} has been deleted.`);
                // In a real app, you would send a request to delete the product
            }
            deleteModal.classList.add('hidden');
            currentProductId = null;
        });
        
        // Close modals when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === viewModal) viewModal.classList.add('hidden');
            if (e.target === formModal) formModal.classList.add('hidden');
            if (e.target === deleteModal) deleteModal.classList.add('hidden');
        });
        
        // Close modals with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                viewModal.classList.add('hidden');
                formModal.classList.add('hidden');
                deleteModal.classList.add('hidden');
            }
        });
    </script>
</body>
</html>