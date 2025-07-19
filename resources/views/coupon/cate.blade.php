<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Category & Product Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4361ee',
                        secondary: '#3f37c9',
                        accent: '#4895ef',
                        dark: '#1e1e2c',
                        light: '#f8f9fa'
                    }
                }
            }
        }
    </script>
    <style>
        .category-item {
            transition: all 0.3s ease;
        }

        .category-item:hover {
            background-color: #f0f7ff;
        }

        .breadcrumb-item::after {
            content: '>';
            margin: 0 10px;
            color: #94a3b8;
        }

        .breadcrumb-item:last-child::after {
            content: '';
        }

        .product-row:hover {
            background-color: #f8fafc;
        }

        .modal {
            transition: all 0.3s ease;
            opacity: 0;
            visibility: hidden;
        }

        .modal.active {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-dark text-white p-5 flex flex-col">
            <div class="mb-10">
                <h1 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-cube mr-3 text-accent"></i> AdminPanel
                </h1>
                <p class="text-gray-400 text-sm mt-1">Category & Product Management</p>
            </div>

            <nav class="flex-1">
                <a href="#" class="block py-3 px-4 rounded-lg bg-primary mb-2">
                    <i class="fas fa-layer-group mr-3"></i> Categories
                </a>
                <a href="#" class="block py-3 px-4 rounded-lg hover:bg-secondary mb-2">
                    <i class="fas fa-box mr-3"></i> Products
                </a>
                <a href="#" class="block py-3 px-4 rounded-lg hover:bg-secondary mb-2">
                    <i class="fas fa-shopping-cart mr-3"></i> Orders
                </a>
                <a href="#" class="block py-3 px-4 rounded-lg hover:bg-secondary mb-2">
                    <i class="fas fa-users mr-3"></i> Customers
                </a>
                <a href="#" class="block py-3 px-4 rounded-lg hover:bg-secondary mb-2">
                    <i class="fas fa-chart-bar mr-3"></i> Analytics
                </a>
            </nav>

            <div class="pt-5 border-t border-gray-700">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-accent flex items-center justify-center mr-3">
                        <span class="font-bold">AD</span>
                    </div>
                    <div>
                        <p class="font-medium">Admin User</p>
                        <p class="text-sm text-gray-400">admin@example.com</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8 overflow-auto">
            <div class="max-w-6xl mx-auto">
                <!-- Header -->
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h1 class="text-3xl font-bold text-dark">Product Management</h1>
                        <p class="text-gray-600">Manage all products and categories</p>
                    </div>
                    <div class="flex space-x-3">
                        <button class="bg-primary hover:bg-secondary text-white py-2 px-4 rounded-lg flex items-center">
                            <i class="fas fa-plus mr-2"></i> New Product
                        </button>
                        <button
                            class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 py-2 px-4 rounded-lg flex items-center">
                            <i class="fas fa-download mr-2"></i> Export
                        </button>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="flex border-b border-gray-200 mb-6">
                    <button id="categories-tab"
                        class="tab-button py-3 px-6 font-medium text-gray-600 border-b-2 border-transparent hover:text-primary">
                        <i class="fas fa-sitemap mr-2"></i> Categories
                    </button>
                    <button id="products-tab"
                        class="tab-button py-3 px-6 font-medium text-primary border-b-2 border-primary">
                        <i class="fas fa-box mr-2"></i> Products
                    </button>
                </div>

                <!-- Categories Content (Initially Hidden) -->
                <div id="categories-content" class="hidden">
                    <!-- Breadcrumb Navigation -->
                    <div class="flex items-center mb-6 p-4 bg-white rounded-lg shadow-sm">
                        <div class="breadcrumbs flex items-center text-sm">
                            <span class="breadcrumb-item font-medium text-primary">All Categories</span>
                            <span class="breadcrumb-item">Clothing</span>
                            <span class="breadcrumb-item font-semibold">Shirts</span>
                        </div>
                        <div class="ml-auto">
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                Current: Shirts
                            </span>
                        </div>
                    </div>

                    <!-- Category Navigation -->
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">
                        <div class="lg:col-span-1">
                            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                                <div class="p-4 bg-primary text-white">
                                    <h2 class="text-lg font-bold flex items-center">
                                        <i class="fas fa-sitemap mr-2"></i> Category Tree
                                    </h2>
                                </div>
                                <div class="p-4">
                                    <div class="mb-4">
                                        <div class="flex justify-between items-center mb-2">
                                            <h3 class="font-semibold text-dark">Top Categories</h3>
                                            <span
                                                class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">5</span>
                                        </div>
                                        <ul class="space-y-1">
                                            <li
                                                class="category-item p-2 rounded-lg cursor-pointer flex justify-between items-center bg-blue-50 border border-blue-100">
                                                <div class="flex items-center">
                                                    <i class="fas fa-tshirt text-blue-500 mr-2"></i>
                                                    <span class="font-medium">Clothing</span>
                                                </div>
                                                <span
                                                    class="bg-blue-500 text-white text-xs px-2 py-1 rounded-full">24</span>
                                            </li>
                                            <li
                                                class="category-item p-2 rounded-lg cursor-pointer flex justify-between items-center hover:bg-gray-50">
                                                <div class="flex items-center">
                                                    <i class="fas fa-laptop text-green-500 mr-2"></i>
                                                    <span>Electronics</span>
                                                </div>
                                                <span
                                                    class="bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded-full">18</span>
                                            </li>
                                            <li
                                                class="category-item p-2 rounded-lg cursor-pointer flex justify-between items-center hover:bg-gray-50">
                                                <div class="flex items-center">
                                                    <i class="fas fa-home text-yellow-500 mr-2"></i>
                                                    <span>Home & Kitchen</span>
                                                </div>
                                                <span
                                                    class="bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded-full">15</span>
                                            </li>
                                            <li
                                                class="category-item p-2 rounded-lg cursor-pointer flex justify-between items-center hover:bg-gray-50">
                                                <div class="flex items-center">
                                                    <i class="fas fa-heart text-red-500 mr-2"></i>
                                                    <span>Beauty</span>
                                                </div>
                                                <span
                                                    class="bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded-full">9</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div>
                                        <div class="flex justify-between items-center mb-2">
                                            <h3 class="font-semibold text-dark">Current Path</h3>
                                        </div>
                                        <ul class="space-y-1">
                                            <li
                                                class="category-item p-2 rounded-lg flex justify-between items-center hover:bg-gray-50">
                                                <div class="flex items-center">
                                                    <i class="fas fa-folder text-gray-400 mr-2"></i>
                                                    <span>All Categories</span>
                                                </div>
                                                <i class="fas fa-chevron-right text-gray-400"></i>
                                            </li>
                                            <li
                                                class="category-item p-2 rounded-lg flex justify-between items-center hover:bg-gray-50 bg-gray-50">
                                                <div class="flex items-center">
                                                    <i class="fas fa-folder-open text-blue-500 mr-2"></i>
                                                    <span class="font-medium">Clothing</span>
                                                </div>
                                                <i class="fas fa-chevron-right text-gray-400"></i>
                                            </li>
                                            <li
                                                class="category-item p-2 rounded-lg flex justify-between items-center bg-blue-50 border border-blue-100">
                                                <div class="flex items-center pl-4">
                                                    <i class="fas fa-folder-open text-blue-500 mr-2"></i>
                                                    <span class="font-medium">Shirts</span>
                                                </div>
                                                <span
                                                    class="bg-blue-500 text-white text-xs px-2 py-1 rounded-full">8</span>
                                            </li>
                                            <li
                                                class="category-item p-2 rounded-lg flex justify-between items-center hover:bg-gray-50">
                                                <div class="flex items-center pl-4">
                                                    <i class="fas fa-folder text-gray-400 mr-2"></i>
                                                    <span>Jeans</span>
                                                </div>
                                                <span
                                                    class="bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded-full">6</span>
                                            </li>
                                            <li
                                                class="category-item p-2 rounded-lg flex justify-between items-center hover:bg-gray-50">
                                                <div class="flex items-center pl-4">
                                                    <i class="fas fa-folder text-gray-400 mr-2"></i>
                                                    <span>Jackets</span>
                                                </div>
                                                <span
                                                    class="bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded-full">4</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Main Category Content -->
                        <div class="lg:col-span-3">
                            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                                <div class="p-4 bg-primary text-white flex justify-between items-center">
                                    <h2 class="text-lg font-bold flex items-center">
                                        <i class="fas fa-tshirt mr-2"></i> Shirts
                                        <span class="ml-2 bg-white text-primary text-xs px-2 py-1 rounded-full">8
                                            sub-categories</span>
                                    </h2>
                                    <div class="flex space-x-2">
                                        <button
                                            class="bg-white text-primary hover:bg-blue-50 py-1 px-3 rounded-lg text-sm">
                                            <i class="fas fa-sort mr-1"></i> Sort
                                        </button>
                                        <button
                                            class="bg-white text-primary hover:bg-blue-50 py-1 px-3 rounded-lg text-sm">
                                            <i class="fas fa-filter mr-1"></i> Filter
                                        </button>
                                    </div>
                                </div>

                                <div class="p-4">
                                    <!-- Category Hierarchy -->
                                    <div class="mb-6">
                                        <div class="flex justify-between items-center mb-4">
                                            <h3 class="font-semibold text-lg text-dark">Sub-categories</h3>
                                            <p class="text-gray-600">Click on any category to view its products</p>
                                        </div>

                                        <div class="space-y-2">
                                            <!-- Category with children -->
                                            <div class="border rounded-lg overflow-hidden">
                                                <div class="flex justify-between items-center p-3 bg-gray-50 cursor-pointer"
                                                    onclick="toggleCategory('men')">
                                                    <div class="flex items-center">
                                                        <i id="men-icon"
                                                            class="fas fa-angle-right text-gray-500 mr-3"></i>
                                                        <i class="fas fa-mars text-blue-500 mr-2"></i>
                                                        <span class="font-medium">Men's Shirts</span>
                                                        <span
                                                            class="ml-2 bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">45</span>
                                                    </div>
                                                    <div class="text-gray-600">5 sub-categories</div>
                                                </div>

                                                <div id="men-children" class="hidden pl-10 bg-white">
                                                    <div
                                                        class="flex justify-between items-center p-3 border-t hover:bg-gray-50 cursor-pointer">
                                                        <div class="flex items-center">
                                                            <i class="fas fa-shirt text-gray-400 mr-2"></i>
                                                            <span>T-Shirts</span>
                                                            <span
                                                                class="ml-2 bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">120</span>
                                                        </div>
                                                        <div class="text-gray-600">View products</div>
                                                    </div>
                                                    <div
                                                        class="flex justify-between items-center p-3 border-t hover:bg-gray-50 cursor-pointer">
                                                        <div class="flex items-center">
                                                            <i class="fas fa-shirt text-gray-400 mr-2"></i>
                                                            <span>Casual Shirts</span>
                                                            <span
                                                                class="ml-2 bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">98</span>
                                                        </div>
                                                        <div class="text-gray-600">View products</div>
                                                    </div>
                                                    <div
                                                        class="flex justify-between items-center p-3 border-t hover:bg-gray-50 cursor-pointer">
                                                        <div class="flex items-center">
                                                            <i class="fas fa-shirt text-gray-400 mr-2"></i>
                                                            <span>Formal Shirts</span>
                                                            <span
                                                                class="ml-2 bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">64</span>
                                                        </div>
                                                        <div class="text-gray-600">View products</div>
                                                    </div>
                                                    <div
                                                        class="flex justify-between items-center p-3 border-t hover:bg-gray-50 cursor-pointer">
                                                        <div class="flex items-center">
                                                            <i class="fas fa-shirt text-gray-400 mr-2"></i>
                                                            <span>Sports Shirts</span>
                                                            <span
                                                                class="ml-2 bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">42</span>
                                                        </div>
                                                        <div class="text-gray-600">View products</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Category with children -->
                                            <div class="border rounded-lg overflow-hidden">
                                                <div class="flex justify-between items-center p-3 bg-gray-50 cursor-pointer"
                                                    onclick="toggleCategory('women')">
                                                    <div class="flex items-center">
                                                        <i id="women-icon"
                                                            class="fas fa-angle-right text-gray-500 mr-3"></i>
                                                        <i class="fas fa-venus text-pink-500 mr-2"></i>
                                                        <span class="font-medium">Women's Shirts</span>
                                                        <span
                                                            class="ml-2 bg-pink-100 text-pink-800 text-xs px-2 py-1 rounded-full">38</span>
                                                    </div>
                                                    <div class="text-gray-600">4 sub-categories</div>
                                                </div>

                                                <div id="women-children" class="hidden pl-10 bg-white">
                                                    <div
                                                        class="flex justify-between items-center p-3 border-t hover:bg-gray-50 cursor-pointer">
                                                        <div class="flex items-center">
                                                            <i class="fas fa-shirt text-gray-400 mr-2"></i>
                                                            <span>Tops</span>
                                                            <span
                                                                class="ml-2 bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">85</span>
                                                        </div>
                                                        <div class="text-gray-600">View products</div>
                                                    </div>
                                                    <div
                                                        class="flex justify-between items-center p-3 border-t hover:bg-gray-50 cursor-pointer">
                                                        <div class="flex items-center">
                                                            <i class="fas fa-shirt text-gray-400 mr-2"></i>
                                                            <span>Blouses</span>
                                                            <span
                                                                class="ml-2 bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">67</span>
                                                        </div>
                                                        <div class="text-gray-600">View products</div>
                                                    </div>
                                                    <div
                                                        class="flex justify-between items-center p-3 border-t hover:bg-gray-50 cursor-pointer">
                                                        <div class="flex items-center">
                                                            <i class="fas fa-shirt text-gray-400 mr-2"></i>
                                                            <span>Tunics</span>
                                                            <span
                                                                class="ml-2 bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">32</span>
                                                        </div>
                                                        <div class="text-gray-600">View products</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Single category items -->
                                            <div class="border rounded-lg overflow-hidden">
                                                <div class="flex justify-between items-center p-3 bg-gray-50">
                                                    <div class="flex items-center">
                                                        <i class="fas fa-vest text-purple-500 mr-2"></i>
                                                        <span class="font-medium">Vests</span>
                                                        <span
                                                            class="ml-2 bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full">12</span>
                                                    </div>
                                                    <div class="text-gray-600">No sub-categories</div>
                                                </div>
                                            </div>

                                            <div class="border rounded-lg overflow-hidden">
                                                <div class="flex justify-between items-center p-3 bg-gray-50">
                                                    <div class="flex items-center">
                                                        <i class="fas fa-vest-patches text-green-500 mr-2"></i>
                                                        <span class="font-medium">Tank Tops</span>
                                                        <span
                                                            class="ml-2 bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">24</span>
                                                    </div>
                                                    <div class="text-gray-600">No sub-categories</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Stats Summary -->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                                        <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                                            <div class="flex justify-between items-start">
                                                <div>
                                                    <h4 class="text-gray-600">Total Products</h4>
                                                    <p class="text-2xl font-bold text-dark">1,245</p>
                                                </div>
                                                <div class="bg-blue-500 text-white p-2 rounded-lg">
                                                    <i class="fas fa-box"></i>
                                                </div>
                                            </div>
                                            <div class="mt-2 text-sm text-blue-700">
                                                <i class="fas fa-arrow-up mr-1"></i> 12% from last month
                                            </div>
                                        </div>

                                        <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                                            <div class="flex justify-between items-start">
                                                <div>
                                                    <h4 class="text-gray-600">Active Categories</h4>
                                                    <p class="text-2xl font-bold text-dark">24</p>
                                                </div>
                                                <div class="bg-green-500 text-white p-2 rounded-lg">
                                                    <i class="fas fa-tags"></i>
                                                </div>
                                            </div>
                                            <div class="mt-2 text-sm text-green-700">
                                                <i class="fas fa-check-circle mr-1"></i> All categories active
                                            </div>
                                        </div>

                                        <div class="bg-amber-50 p-4 rounded-lg border border-amber-100">
                                            <div class="flex justify-between items-start">
                                                <div>
                                                    <h4 class="text-gray-600">New This Month</h4>
                                                    <p class="text-2xl font-bold text-dark">47</p>
                                                </div>
                                                <div class="bg-amber-500 text-white p-2 rounded-lg">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="mt-2 text-sm text-amber-700">
                                                <i class="fas fa-bolt mr-1"></i> 5 new categories added
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Quick Actions -->
                                    <div class="border rounded-lg p-4 bg-gray-50">
                                        <h3 class="font-semibold text-lg text-dark mb-3">Quick Actions</h3>
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                            <button
                                                class="bg-white border border-gray-300 hover:bg-blue-50 hover:border-blue-200 py-3 rounded-lg flex flex-col items-center justify-center">
                                                <i class="fas fa-plus-circle text-blue-500 text-xl mb-2"></i>
                                                <span class="text-sm">Add Sub-category</span>
                                            </button>
                                            <button
                                                class="bg-white border border-gray-300 hover:bg-green-50 hover:border-green-200 py-3 rounded-lg flex flex-col items-center justify-center">
                                                <i class="fas fa-pen text-green-500 text-xl mb-2"></i>
                                                <span class="text-sm">Edit Category</span>
                                            </button>
                                            <button
                                                class="bg-white border border-gray-300 hover:bg-amber-50 hover:border-amber-200 py-3 rounded-lg flex flex-col items-center justify-center">
                                                <i class="fas fa-arrows-up-down text-amber-500 text-xl mb-2"></i>
                                                <span class="text-sm">Reorder Items</span>
                                            </button>
                                            <button
                                                class="bg-white border border-gray-300 hover:bg-red-50 hover:border-red-200 py-3 rounded-lg flex flex-col items-center justify-center">
                                                <i class="fas fa-trash text-red-500 text-xl mb-2"></i>
                                                <span class="text-sm">Delete Category</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Content (Visible by Default) -->
                <div id="products-content">
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-8">
                        <!-- Products Header -->
                        <div class="p-4 bg-primary text-white flex justify-between items-center">
                            <h2 class="text-lg font-bold flex items-center">
                                <i class="fas fa-box mr-2"></i> All Products
                                <span class="ml-2 bg-white text-primary text-xs px-2 py-1 rounded-full">1,245
                                    products</span>
                            </h2>
                            <div class="flex space-x-2">
                                <div class="relative">
                                    <input type="text" placeholder="Search products..."
                                        class="w-64 pl-10 pr-4 py-2 rounded-lg focus:outline-none">
                                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                </div>
                                <button class="bg-white text-primary hover:bg-blue-50 py-1 px-3 rounded-lg text-sm">
                                    <i class="fas fa-filter mr-1"></i> Filter
                                </button>
                            </div>
                        </div>

                        <!-- Products Table -->
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
                                            Price</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Stock</th>
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
                                    <tr class="product-row hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-md object-cover"
                                                        src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80"
                                                        alt="Men's Casual Shirt">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Men's Casual Shirt
                                                    </div>
                                                    <div class="text-sm text-gray-500">#PRD-001</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Shirts</div>
                                            <div class="text-sm text-gray-500">Men's Clothing</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            $29.99
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                42 in stock
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button onclick="openProductModal(1)"
                                                class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                            <button class="text-gray-600 hover:text-gray-900">Edit</button>
                                        </td>
                                    </tr>

                                    <!-- Product 2 -->
                                    <tr class="product-row hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-md object-cover"
                                                        src="https://images.unsplash.com/photo-1495121605193-b116b5b9c5fe?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80"
                                                        alt="Women's Blouse">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Women's Silk Blouse
                                                    </div>
                                                    <div class="text-sm text-gray-500">#PRD-002</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Blouses</div>
                                            <div class="text-sm text-gray-500">Women's Clothing</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            $49.99
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                12 in stock
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button onclick="openProductModal(2)"
                                                class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                            <button class="text-gray-600 hover:text-gray-900">Edit</button>
                                        </td>
                                    </tr>

                                    <!-- Product 3 -->
                                    <tr class="product-row hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-md object-cover"
                                                        src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80"
                                                        alt="Formal Shirt">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Men's Formal Shirt
                                                    </div>
                                                    <div class="text-sm text-gray-500">#PRD-003</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Formal Shirts</div>
                                            <div class="text-sm text-gray-500">Men's Clothing</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            $39.99
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Out of stock
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                On Hold
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button onclick="openProductModal(3)"
                                                class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                            <button class="text-gray-600 hover:text-gray-900">Edit</button>
                                        </td>
                                    </tr>

                                    <!-- Product 4 -->
                                    <tr class="product-row hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-md object-cover"
                                                        src="https://images.unsplash.com/photo-1566150905458-1bf1fc113f0d?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80"
                                                        alt="Sports T-Shirt">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Sports T-Shirt</div>
                                                    <div class="text-sm text-gray-500">#PRD-004</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">T-Shirts</div>
                                            <div class="text-sm text-gray-500">Men's Clothing</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            $24.99
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                87 in stock
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button onclick="openProductModal(4)"
                                                class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                            <button class="text-gray-600 hover:text-gray-900">Edit</button>
                                        </td>
                                    </tr>

                                    <!-- Product 5 -->
                                    <tr class="product-row hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-md object-cover"
                                                        src="https://images.unsplash.com/photo-1588117305388-c2631a279f82?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80"
                                                        alt="Summer Tunic">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Summer Tunic</div>
                                                    <div class="text-sm text-gray-500">#PRD-005</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Tunics</div>
                                            <div class="text-sm text-gray-500">Women's Clothing</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            $34.99
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                56 in stock
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button onclick="openProductModal(5)"
                                                class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                            <button class="text-gray-600 hover:text-gray-900">Edit</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                            <div class="flex items-center justify-between">
                                <div class="flex-1 flex justify-between sm:hidden">
                                    <a href="#"
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        Previous
                                    </a>
                                    <a href="#"
                                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        Next
                                    </a>
                                </div>
                                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-sm text-gray-700">
                                            Showing <span class="font-medium">1</span> to <span
                                                class="font-medium">5</span> of <span class="font-medium">1245</span>
                                            results
                                        </p>
                                    </div>
                                    <div>
                                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                            aria-label="Pagination">
                                            <a href="#"
                                                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                <span class="sr-only">Previous</span>
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                            <a href="#"
                                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                                1
                                            </a>
                                            <a href="#"
                                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                                2
                                            </a>
                                            <a href="#"
                                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                                3
                                            </a>
                                            <a href="#"
                                                class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                <span class="sr-only">Next</span>
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="mt-8 text-center text-gray-600 text-sm">
                    <p>© 2023 AdminPanel. All rights reserved. | Category Management System v2.4</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Modal -->
    <div id="product-modal"
        class="modal fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl w-11/12 md:w-3/4 lg:w-2/3">
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-900">Product Details</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Product Image -->
                    <div class="md:col-span-1">
                        <div
                            class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-64 flex items-center justify-center">
                            <i class="fas fa-image text-gray-400 text-4xl"></i>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="md:col-span-2">
                        <h2 id="product-name" class="text-2xl font-bold text-gray-800 mb-2">Men's Casual Shirt</h2>
                        <div class="flex items-center mb-4">
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mr-2">#PRD-001</span>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Active</span>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div>
                                <p class="text-sm text-gray-600">Price</p>
                                <p id="product-price" class="text-lg font-semibold">$29.99</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Stock</p>
                                <p id="product-stock" class="text-lg font-semibold">42 in stock</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">SKU</p>
                                <p class="text-md">SHIRT-M-CAS-001</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Created</p>
                                <p class="text-md">Aug 12, 2023</p>
                            </div>
                        </div>

                        <!-- Category Hierarchy -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Category Hierarchy</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-folder text-blue-500 mr-2"></i>
                                    <span>Clothing</span>
                                    <i class="fas fa-angle-right mx-2 text-gray-400"></i>
                                    <i class="fas fa-folder text-blue-500 mr-2"></i>
                                    <span>Men's Clothing</span>
                                    <i class="fas fa-angle-right mx-2 text-gray-400"></i>
                                    <i class="fas fa-folder text-blue-500 mr-2"></i>
                                    <span class="font-semibold">Shirts</span>
                                </div>
                                <p class="text-sm text-gray-600">Full path: Clothing > Men's Clothing > Shirts</p>
                            </div>
                        </div>

                        <!-- Product Description -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Description</h3>
                            <p id="product-description" class="text-gray-600">
                                Premium quality men's casual shirt made from 100% cotton. Features a modern slim fit
                                design,
                                button-down collar, and comfortable feel. Perfect for both casual and business casual
                                occasions.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t px-4 py-3 flex justify-end">
                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded mr-2">
                    Edit Product
                </button>
                <button class="bg-primary hover:bg-secondary text-white py-2 px-4 rounded">
                    View in Store
                </button>
            </div>
        </div>
    </div>

    <script>
        // Toggle category expansion
        function toggleCategory(categoryId) {
            const children = document.getElementById(`${categoryId}-children`);
            const icon = document.getElementById(`${categoryId}-icon`);

            if (children.classList.contains('hidden')) {
                children.classList.remove('hidden');
                icon.classList.remove('fa-angle-right');
                icon.classList.add('fa-angle-down');
            } else {
                children.classList.add('hidden');
                icon.classList.remove('fa-angle-down');
                icon.classList.add('fa-angle-right');
            }
        }

        // Tab switching
        const categoriesTab = document.getElementById('categories-tab');
        const productsTab = document.getElementById('products-tab');
        const categoriesContent = document.getElementById('categories-content');
        const productsContent = document.getElementById('products-content');

        categoriesTab.addEventListener('click', () => {
            categoriesTab.classList.add('text-primary', 'border-primary');
            productsTab.classList.remove('text-primary', 'border-primary');
            categoriesContent.classList.remove('hidden');
            productsContent.classList.add('hidden');
        });

        productsTab.addEventListener('click', () => {
            productsTab.classList.add('text-primary', 'border-primary');
            categoriesTab.classList.remove('text-primary', 'border-primary');
            productsContent.classList.remove('hidden');
            categoriesContent.classList.add('hidden');
        });

        // Modal functions
        function openProductModal(productId) {
            // In a real app, you would fetch product data based on productId
            const modal = document.getElementById('product-modal');
            modal.classList.add('active');
        }

        function closeModal() {
            const modal = document.getElementById('product-modal');
            modal.classList.remove('active');
        }

        // Close modal if clicked outside
        window.onclick = function (event) {
            const modal = document.getElementById('product-modal');
            if (event.target === modal) {
                closeModal();
            }
        }

        // Initialize with one category open
        document.addEventListener('DOMContentLoaded', function () {
            toggleCategory('men');
        });
    </script>
</body>

</html>