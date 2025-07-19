<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Order Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4f46e5',
                        secondary: '#f97316',
                        dark: '#1f2937',
                        light: '#f9fafb'
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        .order-card {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }

        .order-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .timeline-item:before {
            content: '';
            position: absolute;
            top: 0;
            left: 11px;
            height: 100%;
            width: 2px;
            background: #e5e7eb;
        }

        .timeline-item:last-child:before {
            display: none;
        }

        .status-badge {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(79, 70, 229, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(79, 70, 229, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(79, 70, 229, 0);
            }
        }

        .product-image {
            transition: all 0.3s ease;
        }

        .product-image:hover {
            transform: scale(1.05);
        }

        .flatpickr-input {
            background-color: #fff;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
            width: 100%;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4 border-b border-gray-700">
                <h1 class="text-xl font-bold">Admin Dashboard</h1>
                <p class="text-gray-400 text-sm">Order Management</p>
            </div>
            <nav class="p-4">
                <ul>
                    <li class="mb-2">
                        <a href="#" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded">
                            <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center p-2 bg-gray-700 text-white rounded">
                            <i class="fas fa-shopping-cart mr-3"></i> Orders
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded">
                            <i class="fas fa-box mr-3"></i> Products
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded">
                            <i class="fas fa-users mr-3"></i> Customers
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded">
                            <i class="fas fa-tag mr-3"></i> Coupons
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded">
                            <i class="fas fa-chart-bar mr-3"></i> Analytics
                        </a>
                    </li>
                    <li class="mb-2 mt-8">
                        <a href="#" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded">
                            <i class="fas fa-cog mr-3"></i> Settings
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-x-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center p-4">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Order #ORD-2023-8765</h2>
                        <p class="text-gray-600">Edit and manage this order</p>
                    </div>
                    <div class="flex items-center">
                        <div class="relative mr-4">
                            <button class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute top-0 right-0 w-3 h-3 bg-red-500 rounded-full"></span>
                            </button>
                        </div>
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Admin"
                                class="w-10 h-10 rounded-full">
                            <span class="ml-2 text-gray-700">Admin User</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="p-6">
                <div
                    class="bg-white order-card rounded-lg p-6 w-full h-100 flex items-center justify-between mb-1.5 font-bold text-2xl">
                    <h2>Order Summary</h2>
                    <div class="flex justify-end">
                        <div class=" whitespace-nowrap text-sm font-medium text-gray-900 relative">
                            <!-- Dots Button -->
                            <button
                                class="action-toggle bg-amber-100 p-1 border-amber-200 rounded-2xl flex justify-center items-center">
                                <i class="fa-solid fa-ellipsis-vertical "></i>
                            </button>

                            <!-- Action Menu -->
                            <div
                                class="action-menu absolute top-10 right-0 bg-white border rounded shadow-lg hidden z-50">
                                <ul class="text-sm text-gray-700 p-3">
                                    <li>
                                        <button class="w-full px-4 py-2 hover:bg-gray-100 text-left">GST</button>
                                    </li>
                                    <li>
                                        <button class="w-full px-4 py-2 hover:bg-gray-100 text-left">Product
                                            Details</button>
                                    </li>
                                    <li>
                                        <button class="w-full px-4 py-2 hover:bg-gray-100 text-left">Invoice</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <script>
                    document.addEventListener('click', function (e) {
                        const isToggleBtn = e.target.closest('.action-toggle');
                        const isMenu = e.target.closest('.action-menu');

                        // Close all menus first
                        document.querySelectorAll('.action-menu').forEach(menu => menu.classList.add('hidden'));

                        // If toggle button clicked
                        if (isToggleBtn) {
                            const container = isToggleBtn.closest('.relative');
                            const menu = container.querySelector('.action-menu');
                            menu.classList.toggle('hidden');
                        }
                    });
                </script>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <!-- Left Column -->
                    <div class="lg:col-span-2 space-y-6">

                        <!-- Order Summary -->
                        <div class="bg-white order-card rounded-lg p-6">

                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-lg font-semibold text-gray-800">Order Summary</h3>
                                <span
                                    class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">Completed</span>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Product</th>
                                            <th
                                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Price</th>
                                            <th
                                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Qty</th>
                                            <th
                                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Total</th>
                                            <th
                                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <!-- Product 1 -->
                                        <tr>
                                            <td class="px-4 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div
                                                        class="flex-shrink-0 h-16 w-16 mr-4 overflow-hidden rounded-md">
                                                        <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80"
                                                            alt="Product"
                                                            class="h-full w-full object-cover product-image">
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">Wireless
                                                            Bluetooth Headphones</div>
                                                        <div class="text-sm text-gray-500">
                                                            <span class="mr-2">Color: Black</span>
                                                            <span>Size: Standard</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">$89.99
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                $89.99</td>


                                            <td>
                                                <div class="relative">
                                                    <select
                                                        class="block appearance-none w-full bg-gray-100 border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-md leading-tight focus:outline-none focus:bg-white focus:border-primary">
                                                        <option>Pending</option>
                                                        <option>Processing</option>
                                                        <option selected>Completed</option>
                                                        <option>Shipped</option>
                                                        <option>Cancelled</option>
                                                        <option>Refunded</option>
                                                    </select>
                                                    <div
                                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>

                                        <!-- Product 2 -->
                                        <tr>
                                            <td class="px-4 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div
                                                        class="flex-shrink-0 h-16 w-16 mr-4 overflow-hidden rounded-md">
                                                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80"
                                                            alt="Product"
                                                            class="h-full w-full object-cover product-image">
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">Smart Watch
                                                            Series 5</div>
                                                        <div class="text-sm text-gray-500">
                                                            <span class="mr-2">Color: Silver</span>
                                                            <span>Size: 44mm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">$249.99
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                $249.99</td>
                                            <td>
                                                <div class="relative">
                                                    <select
                                                        class="block appearance-none w-full bg-gray-100 border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-md leading-tight focus:outline-none focus:bg-white focus:border-primary">
                                                        <option>Pending</option>
                                                        <option>Processing</option>
                                                        <option selected>Completed</option>
                                                        <option>Shipped</option>
                                                        <option>Cancelled</option>
                                                        <option>Refunded</option>
                                                    </select>
                                                    <div
                                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                </div>

                                            </td>

                                        </tr>


                                        <!-- Discount -->
                                        <tr class="bg-blue-50">
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                                colspan="4">
                                                <div class="flex items-center">
                                                    <i class="fas fa-tag text-blue-500 mr-2"></i>
                                                    Discount (SUMMER2023)
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-red-600">
                                                -$50.00</td>
                                        </tr>

                                        <!-- Shipping -->
                                        <tr>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                                colspan="4">
                                                <div class="flex items-center">
                                                    <i class="fas fa-truck text-gray-500 mr-2"></i>
                                                    Shipping
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                $12.99</td>

                                        </tr>

                                        <!-- Tax -->
                                        <tr>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                                colspan="4">
                                                <div class="flex items-center">
                                                    <i class="fas fa-receipt text-gray-500 mr-2"></i>
                                                    Tax
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                $24.87</td>
                                        </tr>

                                        <!-- Total -->
                                        <tr class="border-t-2 border-gray-300">
                                            <td class="px-4 py-4 whitespace-nowrap text-lg font-bold text-gray-900"
                                                colspan="4">
                                                Total</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-lg font-bold text-gray-900">
                                                $326.85</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Order Timeline -->
                        <div class="bg-white order-card rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-6">Order Timeline</h3>

                            <div class="space-y-4">
                                <div class="timeline-item relative pl-8">
                                    <div
                                        class="absolute left-0 top-0 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-check text-white text-xs"></i>
                                    </div>
                                    <div class="mb-6">
                                        <div class="text-sm font-medium text-gray-900">Order Completed</div>
                                        <div class="text-xs text-gray-500">Aug 15, 2023 at 10:30 AM</div>
                                        <p class="mt-1 text-sm text-gray-600">Order delivered and confirmed by
                                            customer
                                        </p>
                                    </div>
                                </div>

                                <div class="timeline-item relative pl-8">
                                    <div
                                        class="absolute left-0 top-0 w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-truck text-white text-xs"></i>
                                    </div>
                                    <div class="mb-6">
                                        <div class="text-sm font-medium text-gray-900">Out for Delivery</div>
                                        <div class="text-xs text-gray-500">Aug 14, 2023 at 9:15 AM</div>
                                        <p class="mt-1 text-sm text-gray-600">Package is with the delivery courier
                                        </p>
                                    </div>
                                </div>

                                <div class="timeline-item relative pl-8">
                                    <div
                                        class="absolute left-0 top-0 w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-warehouse text-white text-xs"></i>
                                    </div>
                                    <div class="mb-6">
                                        <div class="text-sm font-medium text-gray-900">Shipped</div>
                                        <div class="text-xs text-gray-500">Aug 12, 2023 at 3:45 PM</div>
                                        <p class="mt-1 text-sm text-gray-600">Order shipped via FedEx (TRK:
                                            FE3458723495)</p>
                                    </div>
                                </div>

                                <div class="timeline-item relative pl-8">
                                    <div
                                        class="absolute left-0 top-0 w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-box text-white text-xs"></i>
                                    </div>
                                    <div class="mb-6">
                                        <div class="text-sm font-medium text-gray-900">Order Processed</div>
                                        <div class="text-xs text-gray-500">Aug 11, 2023 at 11:20 AM</div>
                                        <p class="mt-1 text-sm text-gray-600">Items packaged and ready for shipment
                                        </p>
                                    </div>
                                </div>

                                <div class="timeline-item relative pl-8">
                                    <div
                                        class="absolute left-0 top-0 w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-credit-card text-white text-xs"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">Payment Received</div>
                                        <div class="text-xs text-gray-500">Aug 10, 2023 at 2:15 PM</div>
                                        <p class="mt-1 text-sm text-gray-600">Payment of $326.85 received via Visa
                                            ending in 1234</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Customer Information -->
                        <div class="bg-white order-card rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Customer Information</h3>

                            <div class="flex items-start mb-5">
                                <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="Customer"
                                    class="w-16 h-16 rounded-full mr-4">
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800">Sarah Johnson</h4>
                                    <p class="text-sm text-gray-600">sarah.j@example.com</p>
                                    <p class="text-sm text-gray-600">+1 (555) 123-4567</p>
                                    <div class="mt-2">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            <i class="fas fa-star mr-1 text-yellow-400"></i> Premium Customer
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h5 class="text-sm font-medium text-gray-500 mb-1">Shipping Address</h5>
                                    <p class="text-sm text-gray-800">
                                        1234 Main Street<br>
                                        Apt 5B<br>
                                        New York, NY 10001<br>
                                        United States
                                    </p>
                                </div>
                                <div>
                                    <h5 class="text-sm font-medium text-gray-500 mb-1">Billing Address</h5>
                                    <p class="text-sm text-gray-800">
                                        Same as shipping address
                                    </p>
                                </div>
                            </div>

                            <div class="mt-5">
                                <button
                                    class="w-full py-2 px-4 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-md transition duration-200">
                                    <i class="fas fa-envelope mr-2"></i> Contact Customer
                                </button>
                            </div>
                        </div>
                        <div class="bg-white order-card rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Vendor Information</h3>

                            <div class="flex items-start mb-5">
                                <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="Customer"
                                    class="w-16 h-16 rounded-full mr-4">
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800">Sarah Johnson</h4>
                                    <p class="text-sm text-gray-600">sarah.j@example.com</p>
                                    <p class="text-sm text-gray-600">+1 (555) 123-4567</p>
                                    <div class="mt-2">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            <i class="fas fa-star mr-1 text-yellow-400"></i> Premium Customer
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h5 class="text-sm font-medium text-gray-500 mb-1">Shipping Address</h5>
                                    <p class="text-sm text-gray-800">
                                        1234 Main Street<br>
                                        Apt 5B<br>
                                        New York, NY 10001<br>
                                        United States
                                    </p>
                                </div>
                                <div>
                                    <h5 class="text-sm font-medium text-gray-500 mb-1">Billing Address</h5>
                                    <p class="text-sm text-gray-800">
                                        Same as shipping address
                                    </p>
                                </div>
                            </div>

                            <div class="mt-5">
                                <button
                                    class="w-full py-2 px-4 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-md transition duration-200">
                                    <i class="fas fa-envelope mr-2"></i> Contact Customer
                                </button>
                            </div>
                        </div>

                        <!-- Order Details -->
                        <div class="bg-white order-card rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Order Details</h3>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Order Status</label>
                                    <div class="relative">
                                        <select
                                            class="block appearance-none w-full bg-gray-100 border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-md leading-tight focus:outline-none focus:bg-white focus:border-primary">
                                            <option>Pending</option>
                                            <option>Processing</option>
                                            <option selected>Completed</option>
                                            <option>Shipped</option>
                                            <option>Cancelled</option>
                                            <option>Refunded</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Order
                                            Date</label>
                                        <input type="text" class="flatpickr-input" placeholder="Select Date"
                                            value="Aug 10, 2023">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Delivery
                                            Date</label>
                                        <input type="text" class="flatpickr-input" placeholder="Select Date"
                                            value="Aug 15, 2023">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Return
                                        Policy</label>
                                    <div class="flex items-center">
                                        <div class="relative inline-block w-10 mr-2 align-middle select-none">
                                            <input type="checkbox" name="returnable" id="returnable" class="sr-only"
                                                checked>
                                            <div class="block bg-gray-300 w-10 h-6 rounded-full"></div>
                                            <div
                                                class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition transform translate-x-4">
                                            </div>
                                        </div>
                                        <label for="returnable" class="text-sm text-gray-700">Returnable until Sep
                                            14,
                                            2023</label>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Return Date</label>
                                    <input type="text" class="flatpickr-input" placeholder="Select Date"
                                        value="Sep 14, 2023">
                                    <label for="timeInput"
                                        class="block text-sm font-medium text-gray-700 mb-0.5 mt-1">Select
                                        Time</label>
                                    <input type="time" id="timeInput" name="timeInput"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                        value="14:30">

                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Applied
                                        Coupon</label>
                                    <div class="flex items-center bg-yellow-50 p-3 rounded-md">
                                        <i class="fas fa-tag text-yellow-500 text-xl mr-3"></i>
                                        <div>
                                            <span class="font-medium">SUMMER2023</span>
                                            <p class="text-sm text-gray-600">$50.00 discount applied</p>
                                        </div>
                                        <button class="ml-auto text-gray-500 hover:text-gray-700">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="pt-4">
                                    <button
                                        class="w-full py-2 px-4 bg-primary hover:bg-primary-dark text-white rounded-md transition duration-200">
                                        <i class="fas fa-save mr-2"></i> Save Changes
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Notes & Actions -->
                        <div class="bg-white order-card rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Order Notes</h3>

                            <div class="mb-4">
                                <div class="flex items-start mb-3">
                                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16"></div>
                                    <div class="ml-3">
                                        <h4 class="text-sm font-medium text-gray-900">Admin User</h4>
                                        <p class="text-xs text-gray-500">Aug 12, 2023 at 10:30 AM</p>
                                        <p class="text-sm text-gray-700 mt-1">Customer requested signature delivery
                                            confirmation.</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16"></div>
                                    <div class="ml-3">
                                        <h4 class="text-sm font-medium text-gray-900">Sarah Johnson</h4>
                                        <p class="text-xs text-gray-500">Aug 11, 2023 at 3:45 PM</p>
                                        <p class="text-sm text-gray-700 mt-1">Can you please ensure the headphones
                                            are
                                            the latest model? Thanks!</p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Add Note</label>
                                <textarea
                                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    rows="3" placeholder="Add a note about this order..."></textarea>
                                <button
                                    class="mt-2 py-2 px-4 bg-gray-800 hover:bg-gray-900 text-white rounded-md transition duration-200">
                                    Add Note
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Initialize date pickers
        flatpickr('.flatpickr-input', {
            enableTime: false,
            dateFormat: "M j, Y",
            allowInput: true
        });


        // Toggle switch functionality
        document.getElementById('returnable').addEventListener('change', function () {
            const returnDateField = document.querySelector('[name="return_date"]');
            if (this.checked) {
                returnDateField.disabled = false;
            } else {
                returnDateField.disabled = true;
            }
        });
    </script>
</body>

</html>