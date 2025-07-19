<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupon Management</title>
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
                                <a href="#" class="flex items-center px-4 py-2 text-white bg-indigo-600 rounded-lg sidebar-link active">
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
                    <span class="text-gray-800 font-medium">Coupons</span>
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
                            <h1 class="text-2xl font-bold text-gray-800">Coupon Management</h1>
                            <p class="text-gray-600 mt-1">Create and manage discount coupons for your store</p>
                        </div>
                        <button class="mt-4 md:mt-0 px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition flex items-center">
                            <i class="fas fa-plus mr-2"></i>
                            Create Coupon
                        </button>
                    </div>
                    
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                        <div class="bg-white rounded-xl shadow-sm p-5">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-ticket-alt text-indigo-600 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-600">Total Coupons</p>
                                    <h3 class="text-2xl font-bold text-gray-800">24</h3>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-sm p-5">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-600">Active Coupons</p>
                                    <h3 class="text-2xl font-bold text-gray-800">18</h3>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-sm p-5">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-users text-yellow-600 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-600">Total Redeemed</p>
                                    <h3 class="text-2xl font-bold text-gray-800">1,284</h3>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-sm p-5">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-dollar-sign text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-600">Total Savings</p>
                                    <h3 class="text-2xl font-bold text-gray-800">$5,230</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Coupon Table -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <!-- Table Header -->
                        <div class="flex flex-col md:flex-row md:items-center justify-between px-6 py-4 border-b">
                            <div class="mb-4 md:mb-0">
                                <div class="relative">
                                    <input type="text" placeholder="Search coupons..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full md:w-80">
                                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <span class="text-gray-600 mr-2">Status:</span>
                                    <select class="px-3 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <option>All</option>
                                        <option selected>Active</option>
                                        <option>Expired</option>
                                        <option>Disabled</option>
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
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Coupon Code</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Discount</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usage / Limit</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expiry Date</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <!-- Coupon 1 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-medium text-gray-900">SUMMER25</div>
                                            <div class="text-gray-500 text-sm">Summer Sale Discount</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-medium text-gray-900">25% Off</div>
                                            <div class="text-gray-500 text-sm">All Products</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">128 / 500</div>
                                            <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                <div class="bg-indigo-600 h-2 rounded-full" style="width: 25%"></div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">Aug 31, 2023</div>
                                            <div class="text-gray-500 text-sm">23 days left</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Active</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Coupon 2 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-medium text-gray-900">WELCOME10</div>
                                            <div class="text-gray-500 text-sm">New Customer Offer</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-medium text-gray-900">$10 Off</div>
                                            <div class="text-gray-500 text-sm">Orders over $50</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">42 / Unlimited</div>
                                            <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                <div class="bg-indigo-600 h-2 rounded-full" style="width: 8%"></div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">Dec 31, 2023</div>
                                            <div class="text-gray-500 text-sm">4 months left</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Active</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Coupon 3 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-medium text-gray-900">FREESHIP</div>
                                            <div class="text-gray-500 text-sm">Free Shipping Offer</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-medium text-gray-900">Free Shipping</div>
                                            <div class="text-gray-500 text-sm">Nationwide</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">89 / 200</div>
                                            <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                <div class="bg-indigo-600 h-2 rounded-full" style="width: 45%"></div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">Jun 30, 2023</div>
                                            <div class="text-gray-500 text-sm">Expired 2 days ago</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">Expired</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Coupon 4 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-medium text-gray-900">BACKTOSCHOOL</div>
                                            <div class="text-gray-500 text-sm">Back to School Special</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-medium text-gray-900">15% Off</div>
                                            <div class="text-gray-500 text-sm">School Supplies</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">0 / 100</div>
                                            <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                <div class="bg-indigo-600 h-2 rounded-full" style="width: 0%"></div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">Sep 15, 2023</div>
                                            <div class="text-gray-500 text-sm">Starts in 20 days</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">Scheduled</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Coupon 5 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-medium text-gray-900">FLASH50</div>
                                            <div class="text-gray-500 text-sm">Flash Sale Discount</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-medium text-gray-900">50% Off</div>
                                            <div class="text-gray-500 text-sm">Selected Items</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">75 / 75</div>
                                            <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                <div class="bg-indigo-600 h-2 rounded-full" style="width: 100%"></div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-900">Jul 15, 2023</div>
                                            <div class="text-gray-500 text-sm">Expired</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">Limit Reached</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900">
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
                                    Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">24</span> coupons
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
                    
                    <!-- Quick Stats -->
                    <div class="mt-8">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Coupon Performance</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-white rounded-xl shadow-sm p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-lg font-medium text-gray-800">Most Popular Coupon</h3>
                                    <span class="px-2 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm">SUMMER25</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-fire text-indigo-600 text-2xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">128 redemptions</p>
                                        <p class="text-sm text-gray-500">Generated $2,560 in sales</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-white rounded-xl shadow-sm p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-lg font-medium text-gray-800">Highest Discount</h3>
                                    <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">FLASH50</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-percentage text-purple-600 text-2xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">50% off</p>
                                        <p class="text-sm text-gray-500">75 redemptions before expiration</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-white rounded-xl shadow-sm p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-lg font-medium text-gray-800">Upcoming Coupon</h3>
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">BACKTOSCHOOL</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-calendar-alt text-yellow-600 text-2xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Starts Sep 15, 2023</p>
                                        <p class="text-sm text-gray-500">15% off school supplies</p>
                                    </div>
                                </div>
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
        
        // Create coupon button functionality
        const createCouponBtn = document.querySelector('button:contains("Create Coupon")');
        createCouponBtn.addEventListener('click', () => {
            alert('Redirecting to coupon creation form...');
            // In a real app, this would navigate to the coupon creation page
        });
    </script>
</body>
</html>
create setting page use tab website setting, firebase setting, payment getway setting, SMS setting, config setting same as above side navbar and top navbar other one more thing add all option in all tabs