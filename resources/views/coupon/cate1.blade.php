<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Product Categories</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#7C3AED',
                        dark: '#1E293B',
                        light: '#F8FAFC',
                        success: '#10B981',
                        warning: '#F59E0B',
                        danger: '#EF4444'
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fa;
        }

        .sidebar-item:hover {
            background-color: rgba(79, 70, 229, 0.1);
        }

        .sidebar-item.active {
            background-color: rgba(79, 70, 229, 0.15);
            border-left: 3px solid #4F46E5;
        }

        .table-row:hover {
            background-color: #f9fafb;
        }

        .status-badge {
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .hierarchy-item {
            transition: all 0.2s ease;
        }

        .hierarchy-item:hover {
            background-color: #f3f4f6;
        }

        .modal-shadow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md">
            <div class="p-5 flex items-center border-b">
                <div class="bg-primary w-10 h-10 rounded-lg flex items-center justify-center">
                    <i class="fas fa-cube text-white text-xl"></i>
                </div>
                <div class="ml-3">
                    <h1 class="text-lg font-bold text-gray-800">AdminPanel</h1>
                    <p class="text-xs text-gray-500">v3.1.0</p>
                </div>
            </div>
            <nav class="mt-6">
                <a href="#" class="sidebar-item active flex items-center py-3 px-6 text-primary">
                    <i class="fas fa-table mr-3"></i>
                    <span>Products</span>
                </a>
                <a href="#" class="sidebar-item flex items-center py-3 px-6 text-gray-600">
                    <i class="fas fa-users mr-3"></i>
                    <span>Users</span>
                </a>
                <a href="#" class="sidebar-item flex items-center py-3 px-6 text-gray-600">
                    <i class="fas fa-chart-line mr-3"></i>
                    <span>Analytics</span>
                </a>
                <a href="#" class="sidebar-item flex items-center py-3 px-6 text-gray-600">
                    <i class="fas fa-shopping-cart mr-3"></i>
                    <span>Orders</span>
                </a>
                <a href="#" class="sidebar-item flex items-center py-3 px-6 text-gray-600">
                    <i class="fas fa-tags mr-3"></i>
                    <span>Categories</span>
                </a>
                <a href="#" class="sidebar-item flex items-center py-3 px-6 text-gray-600">
                    <i class="fas fa-cog mr-3"></i>
                    <span>Settings</span>
                </a>
            </nav>
            <div class="absolute bottom-0 w-64 p-4 border-t">
                <div class="flex items-center">
                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-10 h-10"></div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-800">Admin User</p>
                        <p class="text-xs text-gray-500">admin@example.com</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-x-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center py-4 px-8">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Product Categories</h1>
                        <p class="text-sm text-gray-600">Manage your product categories and hierarchy</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <i
                                class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Search products..."
                                class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <button
                            class="bg-primary hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center">
                            <i class="fas fa-plus mr-2"></i> Add Product
                        </button>
                        <div class="relative">
                            <button
                                class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600">
                                <i class="fas fa-bell"></i>
                            </button>
                            <span
                                class="absolute top-0 right-0 w-4 h-4 bg-danger rounded-full text-xs text-white flex items-center justify-center">3</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 p-6">
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-sm">Total Products</p>
                            <h3 class="text-2xl font-bold mt-1">1,248</h3>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-box text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-success">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>12.3% from last month</span>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-sm">Active Categories</p>
                            <h3 class="text-2xl font-bold mt-1">56</h3>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-tag text-green-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-success">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>8.7% from last month</span>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-sm">Revenue</p>
                            <h3 class="text-2xl font-bold mt-1">$42.8K</h3>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-full">
                            <i class="fas fa-dollar-sign text-purple-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-success">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>24.1% from last month</span>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-sm">Pending Actions</p>
                            <h3 class="text-2xl font-bold mt-1">12</h3>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <i class="fas fa-exclamation-circle text-yellow-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-danger">
                        <i class="fas fa-arrow-down mr-1"></i>
                        <span>3.2% from last month</span>
                    </div>
                </div>
            </div>

            <!-- Products Table -->
            <div class="bg-white rounded-xl shadow-sm mx-6 border border-gray-100">
                <div class="p-5 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-800">Product List</h2>
                    <div class="flex space-x-3">
                        <button class="px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600">
                            <i class="fas fa-filter"></i>
                        </button>
                        <button class="px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600">
                            <i class="fas fa-sort"></i>
                        </button>
                        <button class="px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-600">
                            <i class="fas fa-download"></i>
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Product</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Category</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Stock</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Product 1 -->
                            <tr class="table-row">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-mobile-alt text-blue-600"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900">Premium Smartphone X</div>
                                            <div class="text-xs text-gray-500">#PRD-001</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Mobile Devices</div>
                                    <div class="text-xs text-gray-500">Electronics</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <span class="mr-2">128</span>
                                        <div class="w-20 bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-success h-1.5 rounded-full" style="width: 85%"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">$899.99</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="status-badge bg-green-100 text-green-800">
                                        <i class="fas fa-circle text-[8px] mr-1"></i> Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="openModal('prd1')" class="text-primary hover:text-indigo-700 mr-3">
                                        <i class="fas fa-eye mr-1"></i> View
                                    </button>
                                    <button class="text-blue-600 hover:text-blue-800 mr-3">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <button class="text-gray-500 hover:text-gray-700">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Product 2 -->
                            <tr class="table-row">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-book text-yellow-600"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900">Programming Guidebook</div>
                                            <div class="text-xs text-gray-500">#PRD-002</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Educational</div>
                                    <div class="text-xs text-gray-500">Books & Media</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <span class="mr-2">56</span>
                                        <div class="w-20 bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-warning h-1.5 rounded-full" style="width: 35%"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">$39.99</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="status-badge bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-circle text-[8px] mr-1"></i> Low Stock
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="openModal('prd2')" class="text-primary hover:text-indigo-700 mr-3">
                                        <i class="fas fa-eye mr-1"></i> View
                                    </button>
                                    <button class="text-blue-600 hover:text-blue-800 mr-3">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <button class="text-gray-500 hover:text-gray-700">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Product 3 -->
                            <tr class="table-row">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-headphones text-purple-600"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900">Wireless Headphones Pro
                                            </div>
                                            <div class="text-xs text-gray-500">#PRD-003</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Audio</div>
                                    <div class="text-xs text-gray-500">Accessories</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <span class="mr-2">0</span>
                                        <div class="w-20 bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-danger h-1.5 rounded-full" style="width: 0%"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">$129.99</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="status-badge bg-red-100 text-red-800">
                                        <i class="fas fa-circle text-[8px] mr-1"></i> Out of Stock
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="openModal('prd1')" class="text-primary hover:text-indigo-700 mr-3">
                                        <i class="fas fa-eye mr-1"></i> View
                                    </button>
                                    <button class="text-blue-600 hover:text-blue-800 mr-3">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <button class="text-gray-500 hover:text-gray-700">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Product 4 -->
                            <tr class="table-row">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 bg-green-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-laptop text-green-600"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900">Ultrabook Pro 2023</div>
                                            <div class="text-xs text-gray-500">#PRD-004</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Laptops</div>
                                    <div class="text-xs text-gray-500">Computers</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <span class="mr-2">42</span>
                                        <div class="w-20 bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-warning h-1.5 rounded-full" style="width: 28%"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">$1,299.99
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="status-badge bg-green-100 text-green-800">
                                        <i class="fas fa-circle text-[8px] mr-1"></i> Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="openModal('prd2')" class="text-primary hover:text-indigo-700 mr-3">
                                        <i class="fas fa-eye mr-1"></i> View
                                    </button>
                                    <button class="text-blue-600 hover:text-blue-800 mr-3">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <button class="text-gray-500 hover:text-gray-700">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-5 border-t border-gray-200 flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span
                            class="font-medium">1248</span> results
                    </div>
                    <div class="flex space-x-2">
                        <button
                            class="px-3 py-1.5 bg-gray-100 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button
                            class="px-3 py-1.5 bg-primary text-white rounded-md text-sm font-medium hover:bg-indigo-700">
                            1
                        </button>
                        <button
                            class="px-3 py-1.5 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                            2
                        </button>
                        <button
                            class="px-3 py-1.5 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                            3
                        </button>
                        <button
                            class="px-3 py-1.5 bg-gray-100 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Modal -->
    <div id="categoryModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
        <div class="bg-white rounded-xl w-full max-w-2xl max-h-[90vh] overflow-auto modal-shadow">
            <div class="border-b p-5 flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-800">Category Hierarchy</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="p-5">
                <div id="modalContent">
                    <!-- Content will be loaded dynamically -->
                </div>
            </div>

            <div class="border-t p-5 flex justify-end">
                <button onclick="closeModal()"
                    class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md text-gray-800 font-medium">
                    Close
                </button>
            </div>
        </div>
    </div>

    <script>
        // Toggle subcategories
        function toggleSubcategories(id) {
            const element = document.getElementById(id);
            const icon = document.querySelector(`[data-target="${id}"] i`);

            if (element.classList.contains('hidden')) {
                element.classList.remove('hidden');
                icon.classList.remove('fa-angle-right');
                icon.classList.add('fa-angle-down');
            } else {
                element.classList.add('hidden');
                icon.classList.remove('fa-angle-down');
                icon.classList.add('fa-angle-right');
            }
        }

        // Open modal with specific product hierarchy
        function openModal(productId) {
            let content = '';

            if (productId === 'prd1') {
                content = `
                    <div class="mb-6">
                        <div class="flex items-center">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-mobile-alt text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900">Premium Smartphone X</h4>
                                <p class="text-sm text-gray-600">Main Category: <span class="text-primary font-medium">Electronics</span></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ml-4">
                        <div class="flex items-center mb-2 cursor-pointer hierarchy-item p-2 rounded-lg" onclick="toggleSubcategories('sub1')">
                            <span class="text-gray-700 mr-3" data-target="sub1">
                                <i class="fas fa-angle-right"></i>
                            </span>
                            <div class="flex items-center">
                                <i class="fas fa-tv text-primary mr-2"></i>
                                <span class="font-medium">Electronics</span>
                            </div>
                            <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">3 subcategories</span>
                        </div>
                        
                        <div id="sub1" class="ml-8 mb-4 hidden">
                            <!-- Mobile Devices -->
                            <div class="mb-3">
                                <div class="flex items-center mb-1 cursor-pointer hierarchy-item p-2 rounded-lg" onclick="toggleSubcategories('sub1a')">
                                    <span class="text-gray-700 mr-3" data-target="sub1a">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                    <div class="flex items-center">
                                        <i class="fas fa-mobile-alt text-blue-500 mr-2"></i>
                                        <span>Mobile Devices</span>
                                    </div>
                                    <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">2 subcategories</span>
                                </div>
                                <div id="sub1a" class="ml-8 hidden">
                                    <div class="mb-2 flex items-center p-2 rounded-lg">
                                        <i class="fas fa-circle text-gray-300 text-xs mr-3"></i>
                                        <i class="fas fa-mobile text-gray-500 mr-2"></i>
                                        <span>Smartphones</span>
                                        <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">0 subcategories</span>
                                    </div>
                                    <div class="mb-2 flex items-center p-2 rounded-lg">
                                        <i class="fas fa-circle text-gray-300 text-xs mr-3"></i>
                                        <i class="fas fa-tablet-alt text-gray-500 mr-2"></i>
                                        <span>Tablets</span>
                                        <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">0 subcategories</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Computers -->
                            <div class="mb-3">
                                <div class="flex items-center mb-1 cursor-pointer hierarchy-item p-2 rounded-lg" onclick="toggleSubcategories('sub1b')">
                                    <span class="text-gray-700 mr-3" data-target="sub1b">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                    <div class="flex items-center">
                                        <i class="fas fa-laptop text-purple-500 mr-2"></i>
                                        <span>Computers</span>
                                    </div>
                                    <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">3 subcategories</span>
                                </div>
                                <div id="sub1b" class="ml-8 hidden">
                                    <div class="mb-2 flex items-center p-2 rounded-lg">
                                        <i class="fas fa-circle text-gray-300 text-xs mr-3"></i>
                                        <i class="fas fa-laptop text-gray-500 mr-2"></i>
                                        <span>Laptops</span>
                                        <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">0 subcategories</span>
                                    </div>
                                    <div class="mb-2 flex items-center p-2 rounded-lg">
                                        <i class="fas fa-circle text-gray-300 text-xs mr-3"></i>
                                        <i class="fas fa-desktop text-gray-500 mr-2"></i>
                                        <span>Desktops</span>
                                        <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">0 subcategories</span>
                                    </div>
                                    <div class="mb-2 flex items-center p-2 rounded-lg">
                                        <i class="fas fa-circle text-gray-300 text-xs mr-3"></i>
                                        <i class="fas fa-server text-gray-500 mr-2"></i>
                                        <span>Servers</span>
                                        <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">0 subcategories</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Audio Devices -->
                            <div class="mb-2">
                                <div class="flex items-center p-2 rounded-lg">
                                    <i class="fas fa-circle text-gray-300 text-xs mr-3"></i>
                                    <i class="fas fa-headphones text-orange-500 mr-2"></i>
                                    <span>Audio Devices</span>
                                    <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">0 subcategories</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            } else if (productId === 'prd2') {
                content = `
                    <div class="mb-6">
                        <div class="flex items-center">
                            <div class="bg-yellow-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-book text-yellow-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900">Programming Guidebook</h4>
                                <p class="text-sm text-gray-600">Main Category: <span class="text-primary font-medium">Books & Media</span></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ml-4">
                        <div class="flex items-center mb-2 cursor-pointer hierarchy-item p-2 rounded-lg" onclick="toggleSubcategories('sub2')">
                            <span class="text-gray-700 mr-3" data-target="sub2">
                                <i class="fas fa-angle-right"></i>
                            </span>
                            <div class="flex items-center">
                                <i class="fas fa-book text-primary mr-2"></i>
                                <span class="font-medium">Books & Media</span>
                            </div>
                            <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">4 subcategories</span>
                        </div>
                        
                        <div id="sub2" class="ml-8 mb-4 hidden">
                            <!-- Fiction -->
                            <div class="mb-3">
                                <div class="flex items-center mb-1 cursor-pointer hierarchy-item p-2 rounded-lg" onclick="toggleSubcategories('sub2a')">
                                    <span class="text-gray-700 mr-3" data-target="sub2a">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                    <div class="flex items-center">
                                        <i class="fas fa-book-open text-blue-500 mr-2"></i>
                                        <span>Fiction</span>
                                    </div>
                                    <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">3 subcategories</span>
                                </div>
                                <div id="sub2a" class="ml-8 hidden">
                                    <div class="mb-2 flex items-center p-2 rounded-lg">
                                        <i class="fas fa-circle text-gray-300 text-xs mr-3"></i>
                                        <i class="fas fa-book text-gray-500 mr-2"></i>
                                        <span>Science Fiction</span>
                                        <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">0 subcategories</span>
                                    </div>
                                    <div class="mb-2 flex items-center p-2 rounded-lg">
                                        <i class="fas fa-circle text-gray-300 text-xs mr-3"></i>
                                        <i class="fas fa-book text-gray-500 mr-2"></i>
                                        <span>Mystery</span>
                                        <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">0 subcategories</span>
                                    </div>
                                    <div class="mb-2 flex items-center p-2 rounded-lg">
                                        <i class="fas fa-circle text-gray-300 text-xs mr-3"></i>
                                        <i class="fas fa-book text-gray-500 mr-2"></i>
                                        <span>Fantasy</span>
                                        <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">0 subcategories</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Non-Fiction -->
                            <div class="mb-3">
                                <div class="flex items-center mb-1 cursor-pointer hierarchy-item p-2 rounded-lg" onclick="toggleSubcategories('sub2b')">
                                    <span class="text-gray-700 mr-3" data-target="sub2b">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                    <div class="flex items-center">
                                        <i class="fas fa-book text-purple-500 mr-2"></i>
                                        <span>Non-Fiction</span>
                                    </div>
                                    <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">2 subcategories</span>
                                </div>
                                <div id="sub2b" class="ml-8 hidden">
                                    <div class="mb-2 flex items-center p-2 rounded-lg">
                                        <i class="fas fa-circle text-gray-300 text-xs mr-3"></i>
                                        <i class="fas fa-book text-gray-500 mr-2"></i>
                                        <span>Biography</span>
                                        <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">0 subcategories</span>
                                    </div>
                                    <div class="mb-2 flex items-center p-2 rounded-lg">
                                        <i class="fas fa-circle text-gray-300 text-xs mr-3"></i>
                                        <i class="fas fa-book text-gray-500 mr-2"></i>
                                        <span>History</span>
                                        <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">0 subcategories</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Educational -->
                            <div class="mb-3">
                                <div class="flex items-center mb-1 cursor-pointer hierarchy-item p-2 rounded-lg" onclick="toggleSubcategories('sub2c')">
                                    <span class="text-gray-700 mr-3" data-target="sub2c">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                    <div class="flex items-center">
                                        <i class="fas fa-graduation-cap text-green-500 mr-2"></i>
                                        <span>Educational</span>
                                    </div>
                                    <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">2 subcategories</span>
                                </div>
                                <div id="sub2c" class="ml-8 hidden">
                                    <div class="mb-2 flex items-center p-2 rounded-lg">
                                        <i class="fas fa-circle text-gray-300 text-xs mr-3"></i>
                                        <i class="fas fa-book text-gray-500 mr-2"></i>
                                        <span>Textbooks</span>
                                        <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">0 subcategories</span>
                                    </div>
                                    <div class="mb-2 flex items-center p-2 rounded-lg">
                                        <i class="fas fa-circle text-gray-300 text-xs mr-3"></i>
                                        <i class="fas fa-laptop-code text-gray-500 mr-2"></i>
                                        <span>Programming</span>
                                        <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">0 subcategories</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Media -->
                            <div class="mb-2">
                                <div class="flex items-center p-2 rounded-lg">
                                    <i class="fas fa-circle text-gray-300 text-xs mr-3"></i>
                                    <i class="fas fa-film text-orange-500 mr-2"></i>
                                    <span>Media</span>
                                    <span class="ml-auto bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">0 subcategories</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }

            document.getElementById('modalContent').innerHTML = content;
            document.getElementById('categoryModal').classList.remove('hidden');
        }

        // Close modal
        function closeModal() {
            document.getElementById('categoryModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('categoryModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</body>

</html>