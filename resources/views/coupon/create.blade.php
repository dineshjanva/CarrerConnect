<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Coupon with Notifications</title>
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
    <style>
        .discount-type-btn {
            transition: all 0.3s ease;
        }
        .discount-type-btn.active {
            background-color: #4f46e5;
            color: white;
            border-color: #4f46e5;
        }
        .notification-dropdown {
            transform: translateY(-10px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        .notification-dropdown.open {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }
        .notification-item.unread {
            background-color: #f0f7ff;
            border-left: 3px solid #3b82f6;
        }
    </style>
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
            <header class="flex items-center justify-between px-6 py-4 bg-white shadow-sm relative">
                <!-- Left: Toggle Button for Mobile -->
                <button id="mobileSidebarToggle" class="md:hidden text-gray-600 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                
              
                
                <!-- Right: Icons and User Profile -->
                <div class="flex items-center space-x-4">
                    <!-- Notification Bell with Dropdown -->
                    <div class="relative">
                        <button id="notificationToggle" class="relative p-2 text-gray-600 hover:bg-gray-100 rounded-full">
                            <i class="fas fa-bell text-lg"></i>
                            <span class="absolute top-0 right-0 w-3 h-3 bg-red-500 rounded-full"></span>
                        </button>
                        
                        <!-- Notification Dropdown -->
                        <div id="notificationDropdown" class="notification-dropdown absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg z-20 border border-gray-200">
                            <!-- Dropdown Header -->
                            <div class="px-4 py-3 border-b flex justify-between items-center">
                                <h3 class="font-medium text-gray-800">Notifications</h3>
                                <button class="text-sm text-indigo-600 hover:text-indigo-800">Mark all as read</button>
                            </div>
                            
                            <!-- Notification List -->
                            <div class="max-h-96 overflow-y-auto">
                                <!-- Notification 1 -->
                                <div class="notification-item unread px-4 py-3 hover:bg-gray-50 cursor-pointer">
                                    <div class="flex">
                                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                            <i class="fas fa-shopping-cart text-blue-600"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm text-gray-800 font-medium">New order received</p>
                                            <p class="text-xs text-gray-500 mt-1">Order #1234 has been placed</p>
                                            <div class="flex items-center text-xs text-gray-400 mt-1">
                                                <i class="fas fa-clock mr-1"></i>
                                                <span>2 minutes ago</span>
                                            </div>
                                        </div>
                                        <div class="w-2 h-2 bg-blue-500 rounded-full ml-2 mt-1"></div>
                                    </div>
                                </div>
                                
                                <!-- Notification 2 -->
                                <div class="notification-item unread px-4 py-3 hover:bg-gray-50 cursor-pointer">
                                    <div class="flex">
                                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                            <i class="fas fa-user text-green-600"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm text-gray-800 font-medium">New customer registered</p>
                                            <p class="text-xs text-gray-500 mt-1">John Doe signed up</p>
                                            <div class="flex items-center text-xs text-gray-400 mt-1">
                                                <i class="fas fa-clock mr-1"></i>
                                                <span>1 hour ago</span>
                                            </div>
                                        </div>
                                        <div class="w-2 h-2 bg-green-500 rounded-full ml-2 mt-1"></div>
                                    </div>
                                </div>
                                
                                <!-- Notification 3 -->
                                <div class="notification-item px-4 py-3 hover:bg-gray-50 cursor-pointer">
                                    <div class="flex">
                                        <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                            <i class="fas fa-tag text-yellow-600"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm text-gray-800 font-medium">Coupon usage alert</p>
                                            <p class="text-xs text-gray-500 mt-1">SUMMER25 has been used 100 times</p>
                                            <div class="flex items-center text-xs text-gray-400 mt-1">
                                                <i class="fas fa-clock mr-1"></i>
                                                <span>3 hours ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Notification 4 -->
                                <div class="notification-item px-4 py-3 hover:bg-gray-50 cursor-pointer">
                                    <div class="flex">
                                        <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                            <i class="fas fa-comment-dots text-purple-600"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm text-gray-800 font-medium">New message</p>
                                            <p class="text-xs text-gray-500 mt-1">You have a new message from Sarah</p>
                                            <div class="flex items-center text-xs text-gray-400 mt-1">
                                                <i class="fas fa-clock mr-1"></i>
                                                <span>5 hours ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Notification 5 -->
                                <div class="notification-item px-4 py-3 hover:bg-gray-50 cursor-pointer">
                                    <div class="flex">
                                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                            <i class="fas fa-exclamation-triangle text-red-600"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm text-gray-800 font-medium">System update</p>
                                            <p class="text-xs text-gray-500 mt-1">Scheduled maintenance tonight</p>
                                            <div class="flex items-center text-xs text-gray-400 mt-1">
                                                <i class="fas fa-clock mr-1"></i>
                                                <span>Yesterday</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Dropdown Footer -->
                            <div class="px-4 py-3 border-t text-center">
                                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">View all notifications</a>
                            </div>
                        </div>
                    </div>
                    
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

                  <div class="bg-gray-100 w-full rounded-xl shadow-[0_0_10px_rgba(0,0,0,0.1)] p-6">
                      <!-- Breadcrumbs -->
                <div class="flex items-center text-sm text-gray-600 mb-0.5">
                    <a href="#" class="text-indigo-600 hover:text-indigo-800">Home</a>
                    <i class="fas fa-chevron-right mx-2 text-xs"></i>
                    <a href="#" class="text-indigo-600 hover:text-indigo-800">Coupons</a>
                    <i class="fas fa-chevron-right mx-2 text-xs"></i>
                    <span class="text-gray-800 font-medium">Create Coupon</span>
                </div>  
                <div class="">
                    <!-- Header -->
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Create New Coupon</h1>
                        <p class="text-gray-600 mt-1">Set up a discount coupon for your customers</p>
                    </div>
                    
                    <!-- Coupon Form -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <form id="couponForm">
                            <div class="p-6">
                                <!-- Coupon Details -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Left Column -->
                                    <div class="space-y-6">
                                        <!-- Coupon Code -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Coupon Code *</label>
                                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="SUMMER25" required>
                                            <p class="text-xs text-gray-500 mt-1">Unique code customers will enter at checkout</p>
                                        </div>
                                        
                                        <!-- Discount Type -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Discount Type *</label>
                                            <div class="flex space-x-2">
                                                <button type="button" class="discount-type-btn active flex-1 py-2 border border-gray-300 rounded-lg" data-type="percentage">
                                                    <i class="fas fa-percentage mr-2"></i> Percentage
                                                </button>
                                                <button type="button" class="discount-type-btn flex-1 py-2 border border-gray-300 rounded-lg" data-type="fixed">
                                                    <i class="fas fa-dollar-sign mr-2"></i> Fixed Amount
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <!-- Discount Value -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Discount Value *</label>
                                            <div class="relative">
                                                <div id="discountPrefix" class="absolute left-3 top-2.5 text-gray-500">%</div>
                                                <input type="number" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="25" required>
                                            </div>
                                        </div>
                                        
                                        <!-- Minimum Purchase -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Minimum Purchase Amount</label>
                                            <div class="relative">
                                                <div class="absolute left-3 top-2.5 text-gray-500">$</div>
                                                <input type="number" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="50.00">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Right Column -->
                                    <div class="space-y-6">
                                        <!-- Validity Period -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Validity Period</label>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block text-xs text-gray-500 mb-1">Start Date</label>
                                                    <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                </div>
                                                <div>
                                                    <label class="block text-xs text-gray-500 mb-1">End Date</label>
                                                    <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Usage Limits -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Usage Limits</label>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block text-xs text-gray-500 mb-1">Per Coupon</label>
                                                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Unlimited">
                                                </div>
                                                <div>
                                                    <label class="block text-xs text-gray-500 mb-1">Per Customer</label>
                                                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="1">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Status -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                            <div class="flex items-center space-x-4">
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="status" class="text-indigo-600 focus:ring-indigo-500" checked>
                                                    <span class="ml-2">Active</span>
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="status" class="text-indigo-600 focus:ring-indigo-500">
                                                    <span class="ml-2">Inactive</span>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <!-- Featured -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Featured Coupon</label>
                                            <div class="flex items-center">
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" class="sr-only peer">
                                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                                                    <span class="ml-3 text-sm font-medium text-gray-900">Promote this coupon</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Description -->
                                <div class="mt-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                    <textarea rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Describe this coupon for internal reference..."></textarea>
                                </div>
                                
                                <!-- Customer Message -->
                                <div class="mt-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Customer Message</label>
                                    <textarea rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Message shown to customers when they apply this coupon...">Enjoy 25% off your entire purchase!</textarea>
                                </div>
                                
                                <!-- Conditions -->
                                <div class="mt-8 border-t pt-6">
                                    <h3 class="text-lg font-medium text-gray-800">Conditions</h3>
                                    <p class="text-sm text-gray-600 mt-1">Set conditions for when this coupon can be applied</p>
                                    
                                    <div class="mt-4 space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Applicable Products</label>
                                            <select class="w-full px-4 py-2  border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                <option selected>All Products</option>
                                                <option>Specific Categories</option>
                                                <option>Specific Products</option>
                                            </select>
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Applicable Customers</label>
                                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                <option selected>All Customers</option>
                                                <option>Specific Customer Groups</option>
                                                <option>First-time Customers</option>
                                                <option>Returning Customers</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Form Actions -->
                            <div class="flex justify-between p-6 border-t">
                                <button type="button" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                                    Cancel
                                </button>
                                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 flex items-center">
                                    <i class="fas fa-plus mr-2"></i>
                                    Create Coupon
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Preview Card -->
                    <div class="mt-8">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Coupon Preview</h2>
                        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl shadow-lg overflow-hidden">
                            <div class="p-6 text-white">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-2xl font-bold">SUMMER25</h3>
                                        <p class="text-indigo-200 mt-1">25% off your entire purchase</p>
                                    </div>
                                    <div class="bg-white bg-opacity-20 rounded-lg px-3 py-2">
                                        <i class="fas fa-tag text-xl"></i>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="flex items-center text-sm">
                                        <i class="fas fa-calendar-alt mr-2"></i>
                                        <span>Valid until Aug 31, 2023</span>
                                    </div>
                                    <div class="flex items-center text-sm mt-1">
                                        <i class="fas fa-shopping-cart mr-2"></i>
                                        <span>Minimum purchase: $50.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white p-4">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-gray-600 text-sm">Copy code:</span>
                                        <span class="font-mono bg-gray-100 px-2 py-1 rounded">SUMMER25</span>
                                    </div>
                                    <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm">
                                        Copy Code
                                    </button>
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
        
        // Discount type toggle
        const discountTypeButtons = document.querySelectorAll('.discount-type-btn');
        const discountPrefix = document.getElementById('discountPrefix');
        
        discountTypeButtons.forEach(button => {
            button.addEventListener('click', function() {
                discountTypeButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                if (this.dataset.type === 'percentage') {
                    discountPrefix.textContent = '%';
                } else {
                    discountPrefix.textContent = '$';
                }
            });
        });
        
        // Form submission
        const couponForm = document.getElementById('couponForm');
        couponForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const code = this.querySelector('input[type="text"]').value;
            const discountType = document.querySelector('.discount-type-btn.active').dataset.type;
            const discountValue = this.querySelector('input[type="number"]').value;
            
            // Show success message
            alert(`Coupon "${code}" created successfully!\n${discountValue}${discountType === 'percentage' ? '%' : '$'} discount applied.`);
            
            // In a real app, this would submit the form data to a server
            // Reset form
            this.reset();
            discountTypeButtons[0].classList.add('active');
            discountTypeButtons[1].classList.remove('active');
            discountPrefix.textContent = '%';
        });
        
        // Notification dropdown toggle
        const notificationToggle = document.getElementById('notificationToggle');
        const notificationDropdown = document.getElementById('notificationDropdown');
        
        notificationToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            notificationDropdown.classList.toggle('open');
        });
        
        // Close notification dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!notificationToggle.contains(e.target) && !notificationDropdown.contains(e.target)) {
                notificationDropdown.classList.remove('open');
            }
        });
        
        // Mark notification as read
        const notificationItems = document.querySelectorAll('.notification-item');
        notificationItems.forEach(item => {
            item.addEventListener('click', function() {
                if (this.classList.contains('unread')) {
                    this.classList.remove('unread');
                    const dot = this.querySelector('.bg-blue-500, .bg-green-500');
                    if (dot) {
                        dot.remove();
                    }
                    
                    // Update notification count
                    const unreadCount = document.querySelectorAll('.notification-item.unread').length;
                    const notificationBadge = document.querySelector('.notification-toggle .bg-red-500');
                    if (notificationBadge) {
                        if (unreadCount > 0) {
                            notificationBadge.textContent = unreadCount;
                        } else {
                            notificationBadge.remove();
                        }
                    }
                }
            });
        });
        
        // Mark all as read
        const markAllAsRead = document.querySelector('button:contains("Mark all as read")');
        if (markAllAsRead) {
            markAllAsRead.addEventListener('click', function() {
                notificationItems.forEach(item => {
                    item.classList.remove('unread');
                    const dot = item.querySelector('.bg-blue-500, .bg-green-500');
                    if (dot) {
                        dot.remove();
                    }
                });
                
                // Remove notification badge
                const notificationBadge = document.querySelector('.notification-toggle .bg-red-500');
                if (notificationBadge) {
                    notificationBadge.remove();
                }
            });
        }
        
        // Update preview
        const codeInput = document.querySelector('input[type="text"]');
        const discountInput = document.querySelector('input[type="number"]');
        const minPurchaseInput = document.querySelectorAll('input[type="number"]')[1];
        
        function updatePreview() {
            const previewCode = document.querySelector('.preview-code');
            const discountText = document.querySelector('.discount-text');
            const minPurchase = document.querySelector('.min-purchase');
            
            if (previewCode) {
                previewCode.textContent = codeInput.value || 'SUMMER25';
                const discountValue = discountInput.value || '25';
                const discountType = document.querySelector('.discount-type-btn.active').dataset.type;
                
                discountText.textContent = `${discountValue}${discountType === 'percentage' ? '%' : '$'} off your entire purchase`;
                
                if (minPurchaseInput.value) {
                    minPurchase.textContent = `Minimum purchase: $${minPurchaseInput.value}`;
                    minPurchase.closest('div').classList.remove('hidden');
                } else {
                    minPurchase.closest('div').classList.add('hidden');
                }
            }
        }
        
        codeInput.addEventListener('input', updatePreview);
        discountInput.addEventListener('input', updatePreview);
        minPurchaseInput.addEventListener('input', updatePreview);
        discountTypeButtons.forEach(btn => {
            btn.addEventListener('click', updatePreview);
        });
    </script>
</body>
</html>