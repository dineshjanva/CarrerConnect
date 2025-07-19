<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Orders</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-gray-800">
                <div class="flex items-center justify-center h-16 bg-gray-900">
                    <span class="text-white font-bold text-xl">Admin Panel</span>
                </div>
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto">
                    <nav class="flex-1 px-2 space-y-1 bg-gray-800">
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-md group">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            Dashboard
                        </a>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 rounded-md group">
                            <i class="fas fa-users mr-3"></i>
                            Customers
                        </a>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-md group">
                            <i class="fas fa-shopping-cart mr-3"></i>
                            Orders
                        </a>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 rounded-md group">
                            <i class="fas fa-boxes mr-3"></i>
                            Products
                        </a>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 rounded-md group">
                            <i class="fas fa-chart-bar mr-3"></i>
                            Analytics
                        </a>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 rounded-md group">
                            <i class="fas fa-cog mr-3"></i>
                            Settings
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Navigation -->
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-200">
                <div class="flex items-center">
                    <button class="text-gray-500 focus:outline-none lg:hidden">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="ml-4 text-xl font-semibold text-gray-800">Orders</h1>
                </div>
                <div class="flex items-center">
                    <div class="relative">
                        <input type="text"
                            class="w-full py-2 pl-10 pr-4 text-gray-700 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Search...">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-search text-gray-500"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <button class="flex items-center text-gray-700 focus:outline-none">
                            <i class="fas fa-bell"></i>
                        </button>
                    </div>
                    <div class="ml-4">
                        <div class="flex items-center">
                            <div class="w-8 h-8 overflow-hidden rounded-full">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    class="object-cover w-full h-full">
                            </div>
                            <span class="ml-2 text-sm font-medium text-gray-700">Admin</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-6">
                <!-- Filter and Action Buttons -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Order List</h2>
                    <div class="flex space-x-2">
                        <button id="filterBtn"
                            class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-filter mr-2"></i>Filter
                        </button>
                        <button
                            class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fa-solid fa-file-invoice"></i>
                        </button>
                        <button
                            class="px-4 py-2 bg-blue-600 rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-plus mr-2"></i>Add Order
                        </button>
                    </div>
                </div>

                <!-- Bulk Actions (hidden by default) -->
                <div id="bulkActions" class="hidden mb-4 p-3 bg-gray-50 rounded-md border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <span id="selectedCount" class="text-sm font-medium text-gray-700">0 orders selected</span>
                        </div>
                        <div class="flex space-x-2">
                            <button id="bulkDeleteBtn"
                                class="px-3 py-1 bg-red-600 rounded-md text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                                <i class="fas fa-trash mr-1"></i>Delete Selected
                            </button>
                            <button id="clearSelectionBtn"
                                class="px-3 py-1 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Clear Selection
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Active Filters Display -->
                <div id="activeFilters" class="hidden mb-4">
                    <div class="flex flex-wrap items-center gap-2 p-3 bg-gray-50 rounded-md border border-gray-200">
                        <span class="text-sm font-medium text-gray-700">Active filters:</span>
                        <!-- Filters will be added here dynamically -->
                    </div>
                </div>

                <!-- Filter Modal -->
                <div id="filterModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
                    <div
                        class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                            aria-hidden="true">&#8203;</span>
                        <div
                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Filter Orders</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Date Range -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Date Range</label>
                                        <div class="mt-1 grid grid-cols-2 gap-2">
                                            <input type="date" id="fromDate"
                                                class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                                            <input type="date" id="toDate"
                                                class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                    </div>

                                    <!-- Order Status -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Order Status</label>
                                        <select id="orderStatus"
                                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md border">
                                            <option value="">All Statuses</option>
                                            <option value="pending">Pending</option>
                                            <option value="completed">Completed</option>
                                            <option value="cancelled">Cancelled</option>
                                            <option value="shipped">Shipped</option>
                                            <option value="processing">Processing</option>
                                        </select>
                                    </div>

                                    <!-- Payment Method -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Payment Method</label>
                                        <select id="paymentMethod"
                                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md border">
                                            <option value="">All Methods</option>
                                            <option value="cod">Cash on Delivery</option>
                                            <option value="upi">UPI</option>
                                            <option value="netbanking">Net Banking</option>
                                            <option value="card">Credit/Debit Card</option>
                                        </select>
                                    </div>

                                    <!-- Customer Search -->
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700">Customer Name</label>
                                        <input type="text" id="customerSearch"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border"
                                            placeholder="Search by customer name">
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button id="applyFilterBtn" type="button"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Apply Filters
                                </button>
                                <button id="resetFilterBtn" type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    Reset
                                </button>
                                <button id="closeFilterBtn" type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Table -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <input type="checkbox" id="selectAll"
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Order ID
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Customer Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Amount
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Payment Method
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="orderTableBody" class="bg-white divide-y divide-gray-200">
                                <!-- Orders will be populated here by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Order Details Modal -->
                <div id="orderDetailsModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
                    <div
                        class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                            aria-hidden="true">&#8203;</span>
                        <div
                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="flex justify-between items-start">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modalOrderTitle">Order
                                        Details</h3>
                                    <button id="closeModalBtn" class="text-gray-400 hover:text-gray-500">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Order Summary -->
                                        <div class="border rounded-lg p-4">
                                            <h4 class="font-medium text-gray-900 mb-3">Order Summary</h4>
                                            <div class="space-y-2">
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Order ID:</span>
                                                    <span class="font-medium" id="modalOrderId">-</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Date:</span>
                                                    <span class="font-medium" id="modalOrderDate">-</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Status:</span>
                                                    <span class="font-medium" id="modalOrderStatus">-</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Payment Method:</span>
                                                    <span class="font-medium" id="modalPaymentMethod">-</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Total Amount:</span>
                                                    <span class="font-medium" id="modalTotalAmount">-</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Customer Info -->
                                        <div class="border rounded-lg p-4">
                                            <h4 class="font-medium text-gray-900 mb-3">Customer Information</h4>
                                            <div class="space-y-2">
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Name:</span>
                                                    <span class="font-medium" id="modalCustomerName">-</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Email:</span>
                                                    <span class="font-medium" id="modalCustomerEmail">-</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Phone:</span>
                                                    <span class="font-medium" id="modalCustomerPhone">-</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Order Items -->
                                    <div class="mt-6 border rounded-lg p-4">
                                        <h4 class="font-medium text-gray-900 mb-3">Order Items</h4>
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Product</th>
                                                        <th scope="col"
                                                            class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Price</th>
                                                        <th scope="col"
                                                            class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Quantity</th>
                                                        <th scope="col"
                                                            class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="modalOrderItems" class="bg-white divide-y divide-gray-200">
                                                    <!-- Order items will be populated here -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Shipping Address -->
                                    <div class="mt-6 border rounded-lg p-4">
                                        <h4 class="font-medium text-gray-900 mb-3">Shipping Address</h4>
                                        <div class="space-y-1" id="modalShippingAddress">
                                            <!-- Address will be populated here -->
                                        </div>
                                    </div>

                                    <!-- Payment Info -->
                                    <div class="mt-6 border rounded-lg p-4">
                                        <h4 class="font-medium text-gray-900 mb-3">Payment Information</h4>
                                        <div class="space-y-2" id="modalPaymentInfo">
                                            <!-- Payment info will be populated here -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="button"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Print Invoice
                                </button>
                                <button type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    Edit Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Sample order data
        const orders = [
            {
                id: 'ORD-1001',
                customer: {
                    name: 'John Doe',
                    email: 'john.doe@example.com',
                    phone: '+1 (555) 123-4567'
                },
                date: '2023-06-15',
                amount: 149.97,
                paymentMethod: 'card',
                paymentMethodDisplay: 'Credit Card',
                status: 'completed',
                statusDisplay: 'Completed',
                items: [
                    {
                        name: 'Wireless Headphones',
                        price: 99.99,
                        quantity: 1,
                        total: 99.99
                    },
                    {
                        name: 'Phone Case',
                        price: 24.99,
                        quantity: 2,
                        total: 49.98
                    }
                ],
                shippingAddress: {
                    street: '123 Main St',
                    city: 'New York',
                    state: 'NY',
                    zip: '10001',
                    country: 'United States'
                },
                paymentInfo: {
                    cardLast4: '4242',
                    cardBrand: 'Visa',
                    transactionId: 'ch_1J4jg72eZvKYlo2C0XJXrQ2E'
                }
            },
            {
                id: 'ORD-1002',
                customer: {
                    name: 'Jane Smith',
                    email: 'jane.smith@example.com',
                    phone: '+1 (555) 987-6543'
                },
                date: '2023-06-18',
                amount: 89.50,
                paymentMethod: 'upi',
                paymentMethodDisplay: 'UPI',
                status: 'shipped',
                statusDisplay: 'Shipped',
                items: [
                    {
                        name: 'Smart Watch',
                        price: 79.99,
                        quantity: 1,
                        total: 79.99
                    },
                    {
                        name: 'Screen Protector',
                        price: 9.51,
                        quantity: 1,
                        total: 9.51
                    }
                ],
                shippingAddress: {
                    street: '456 Oak Ave',
                    city: 'Los Angeles',
                    state: 'CA',
                    zip: '90001',
                    country: 'United States'
                },
                paymentInfo: {
                    upiId: 'jane.smith@upi',
                    transactionId: 'UPI123456789'
                }
            },
            {
                id: 'ORD-1003',
                customer: {
                    name: 'Robert Johnson',
                    email: 'robert.j@example.com',
                    phone: '+1 (555) 456-7890'
                },
                date: '2023-06-20',
                amount: 45.25,
                paymentMethod: 'cod',
                paymentMethodDisplay: 'Cash on Delivery',
                status: 'pending',
                statusDisplay: 'Pending',
                items: [
                    {
                        name: 'USB Cable',
                        price: 9.99,
                        quantity: 3,
                        total: 29.97
                    },
                    {
                        name: 'Power Adapter',
                        price: 15.28,
                        quantity: 1,
                        total: 15.28
                    }
                ],
                shippingAddress: {
                    street: '789 Pine Rd',
                    city: 'Chicago',
                    state: 'IL',
                    zip: '60601',
                    country: 'United States'
                },
                paymentInfo: {
                    method: 'Pay on delivery'
                }
            },
            {
                id: 'ORD-1004',
                customer: {
                    name: 'Emily Wilson',
                    email: 'emily.w@example.com',
                    phone: '+1 (555) 789-0123'
                },
                date: '2023-06-22',
                amount: 199.99,
                paymentMethod: 'netbanking',
                paymentMethodDisplay: 'Net Banking',
                status: 'processing',
                statusDisplay: 'Processing',
                items: [
                    {
                        name: 'Bluetooth Speaker',
                        price: 129.99,
                        quantity: 1,
                        total: 129.99
                    },
                    {
                        name: 'AA Batteries (4-pack)',
                        price: 14.99,
                        quantity: 2,
                        total: 29.98
                    },
                    {
                        name: 'Car Charger',
                        price: 19.99,
                        quantity: 2,
                        total: 39.98
                    }
                ],
                shippingAddress: {
                    street: '321 Elm St',
                    city: 'Houston',
                    state: 'TX',
                    zip: '77001',
                    country: 'United States'
                },
                paymentInfo: {
                    bank: 'Chase Bank',
                    transactionId: 'NB987654321'
                }
            }
        ];

        // DOM elements
        const filterBtn = document.getElementById('filterBtn');
        const filterModal = document.getElementById('filterModal');
        const closeFilterBtn = document.getElementById('closeFilterBtn');
        const applyFilterBtn = document.getElementById('applyFilterBtn');
        const resetFilterBtn = document.getElementById('resetFilterBtn');
        const orderTableBody = document.getElementById('orderTableBody');
        const orderDetailsModal = document.getElementById('orderDetailsModal');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const bulkActions = document.getElementById('bulkActions');
        const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
        const clearSelectionBtn = document.getElementById('clearSelectionBtn');
        const selectAll = document.getElementById('selectAll');
        const selectedCount = document.getElementById('selectedCount');
        const activeFilters = document.getElementById('activeFilters');

        // Filter elements
        const fromDate = document.getElementById('fromDate');
        const toDate = document.getElementById('toDate');
        const orderStatus = document.getElementById('orderStatus');
        const paymentMethod = document.getElementById('paymentMethod');
        const customerSearch = document.getElementById('customerSearch');

        // Modal elements
        const modalOrderTitle = document.getElementById('modalOrderTitle');
        const modalOrderId = document.getElementById('modalOrderId');
        const modalOrderDate = document.getElementById('modalOrderDate');
        const modalOrderStatus = document.getElementById('modalOrderStatus');
        const modalPaymentMethod = document.getElementById('modalPaymentMethod');
        const modalTotalAmount = document.getElementById('modalTotalAmount');
        const modalCustomerName = document.getElementById('modalCustomerName');
        const modalCustomerEmail = document.getElementById('modalCustomerEmail');
        const modalCustomerPhone = document.getElementById('modalCustomerPhone');
        const modalOrderItems = document.getElementById('modalOrderItems');
        const modalShippingAddress = document.getElementById('modalShippingAddress');
        const modalPaymentInfo = document.getElementById('modalPaymentInfo');

        // Current filtered orders
        let filteredOrders = [...orders];
        let selectedOrders = new Set();
        let currentFilters = {};

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function () {
            renderOrders(orders);

            // Set today's date as default for "to" date filter
            const today = new Date().toISOString().split('T')[0];
            toDate.value = today;

            // Set one month ago as default for "from" date filter
            const oneMonthAgo = new Date();
            oneMonthAgo.setMonth(oneMonthAgo.getMonth() - 1);
            fromDate.value = oneMonthAgo.toISOString().split('T')[0];
        });

        // Event listeners
        filterBtn.addEventListener('click', () => {
            filterModal.classList.remove('hidden');
        });

        closeFilterBtn.addEventListener('click', () => {
            filterModal.classList.add('hidden');
        });

        applyFilterBtn.addEventListener('click', applyFilters);
        resetFilterBtn.addEventListener('click', resetFilters);

        closeModalBtn.addEventListener('click', () => {
            orderDetailsModal.classList.add('hidden');
        });

        bulkDeleteBtn.addEventListener('click', bulkDeleteOrders);
        clearSelectionBtn.addEventListener('click', clearSelection);
        selectAll.addEventListener('change', toggleSelectAll);

        // Close modals when clicking outside
        window.addEventListener('click', (event) => {
            if (event.target === filterModal) {
                filterModal.classList.add('hidden');
            }
            if (event.target === orderDetailsModal) {
                orderDetailsModal.classList.add('hidden');
            }
        });

        // Functions
        function renderOrders(ordersToRender) {
            orderTableBody.innerHTML = '';

            if (ordersToRender.length === 0) {
                orderTableBody.innerHTML = `
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">No orders found matching your criteria</td>
                    </tr>
                `;
                return;
            }

            ordersToRender.forEach(order => {
                const row = document.createElement('tr');
                row.className = 'hover:bg-gray-50';
                row.dataset.orderId = order.id;

                // Status badge color
                let statusClass = '';
                switch (order.status) {
                    case 'completed':
                        statusClass = 'bg-green-100 text-green-800';
                        break;
                    case 'pending':
                        statusClass = 'bg-yellow-100 text-yellow-800';
                        break;
                    case 'cancelled':
                        statusClass = 'bg-red-100 text-red-800';
                        break;
                    case 'shipped':
                        statusClass = 'bg-blue-100 text-blue-800';
                        break;
                    case 'processing':
                        statusClass = 'bg-purple-100 text-purple-800';
                        break;
                    default:
                        statusClass = 'bg-gray-100 text-gray-800';
                }

                const isSelected = selectedOrders.has(order.id);

                row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap">
                        <input type="checkbox" class="order-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" data-order-id="${order.id}" ${isSelected ? 'checked' : ''}>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${order.id}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${order.customer.name}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${formatDate(order.date)}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$${order.amount.toFixed(2)}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${order.paymentMethodDisplay}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                            ${order.statusDisplay}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button onclick="viewOrder('${order.id}')" class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                        <button onclick="editOrder('${order.id}')" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                        <button  class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fa-solid fa-file-invoice-dollar"></i></button>
                        <button onclick="deleteOrder('${order.id}')" class="text-red-600 hover:text-red-900">Delete</button>
                    </td>
                `;

                orderTableBody.appendChild(row);
            });

            // Add event listeners to checkboxes
            document.querySelectorAll('.order-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const orderId = this.dataset.orderId;
                    if (this.checked) {
                        selectedOrders.add(orderId);
                    } else {
                        selectedOrders.delete(orderId);
                        selectAll.checked = false;
                    }
                    updateBulkActions();
                });
            });

            updateBulkActions();
        }

        function applyFilters() {
            const fromDateValue = fromDate.value;
            const toDateValue = toDate.value;
            const statusValue = orderStatus.value;
            const paymentValue = paymentMethod.value;
            const customerValue = customerSearch.value.toLowerCase();

            // Store current filters for display
            currentFilters = {};

            if (fromDateValue) currentFilters['From Date'] = formatDisplayDate(fromDateValue);
            if (toDateValue) currentFilters['To Date'] = formatDisplayDate(toDateValue);
            if (statusValue) currentFilters['Status'] = document.querySelector(`#orderStatus option[value="${statusValue}"]`).text;
            if (paymentValue) currentFilters['Payment Method'] = document.querySelector(`#paymentMethod option[value="${paymentValue}"]`).text;
            if (customerValue) currentFilters['Customer'] = customerSearch.value;

            filteredOrders = orders.filter(order => {
                // Date filter
                if (fromDateValue && new Date(order.date) < new Date(fromDateValue)) {
                    return false;
                }
                if (toDateValue && new Date(order.date) > new Date(toDateValue)) {
                    return false;
                }

                // Status filter
                if (statusValue && order.status !== statusValue) {
                    return false;
                }

                // Payment method filter
                if (paymentValue && order.paymentMethod !== paymentValue) {
                    return false;
                }

                // Customer name filter
                if (customerValue && !order.customer.name.toLowerCase().includes(customerValue)) {
                    return false;
                }

                return true;
            });

            renderOrders(filteredOrders);
            updateActiveFilters();
            filterModal.classList.add('hidden');
        }

        function resetFilters() {
            fromDate.value = '';
            toDate.value = '';
            orderStatus.value = '';
            paymentMethod.value = '';
            customerSearch.value = '';

            currentFilters = {};
            filteredOrders = [...orders];
            renderOrders(filteredOrders);
            updateActiveFilters();
        }

        function updateActiveFilters() {
            const activeFiltersContainer = document.querySelector('#activeFilters > div');
            activeFiltersContainer.innerHTML = '<span class="text-sm font-medium text-gray-700">Active filters:</span>';

            if (Object.keys(currentFilters).length === 0) {
                activeFilters.classList.add('hidden');
                return;
            }

            activeFilters.classList.remove('hidden');

            for (const [key, value] of Object.entries(currentFilters)) {
                const filterPill = document.createElement('div');
                filterPill.className = 'flex items-center bg-white rounded-full px-3 py-1 text-xs font-medium text-gray-700 border border-gray-300';
                filterPill.innerHTML = `
                    ${key}: ${value}
                    <button onclick="removeFilter('${key}')" class="ml-1 text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                activeFiltersContainer.appendChild(filterPill);
            }
        }

        function removeFilter(filterKey) {
            switch (filterKey) {
                case 'From Date':
                    fromDate.value = '';
                    break;
                case 'To Date':
                    toDate.value = '';
                    break;
                case 'Status':
                    orderStatus.value = '';
                    break;
                case 'Payment Method':
                    paymentMethod.value = '';
                    break;
                case 'Customer':
                    customerSearch.value = '';
                    break;
            }

            delete currentFilters[filterKey];
            applyFilters(); // Reapply filters with the removed one excluded
        }

        function viewOrder(orderId) {
            const order = orders.find(o => o.id === orderId);
            if (!order) return;

            // Set modal title
            modalOrderTitle.textContent = `Order Details - ${order.id}`;

            // Set order summary
            modalOrderId.textContent = order.id;
            modalOrderDate.textContent = formatDate(order.date);
            modalOrderStatus.textContent = order.statusDisplay;
            modalPaymentMethod.textContent = order.paymentMethodDisplay;
            modalTotalAmount.textContent = `$${order.amount.toFixed(2)}`;

            // Set customer info
            modalCustomerName.textContent = order.customer.name;
            modalCustomerEmail.textContent = order.customer.email;
            modalCustomerPhone.textContent = order.customer.phone;

            // Set order items
            modalOrderItems.innerHTML = '';
            order.items.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900">${item.name}</td>
                    <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500">$${item.price.toFixed(2)}</td>
                    <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500">${item.quantity}</td>
                    <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500">$${item.total.toFixed(2)}</td>
                `;
                modalOrderItems.appendChild(row);
            });

            // Set shipping address
            modalShippingAddress.innerHTML = `
                <div>${order.shippingAddress.street}</div>
                <div>${order.shippingAddress.city}, ${order.shippingAddress.state} ${order.shippingAddress.zip}</div>
                <div>${order.shippingAddress.country}</div>
            `;

            // Set payment info
            modalPaymentInfo.innerHTML = '';
            if (order.paymentMethod === 'card') {
                modalPaymentInfo.innerHTML = `
                    <div class="flex justify-between">
                        <span class="text-gray-600">Card:</span>
                        <span class="font-medium">${order.paymentInfo.cardBrand} ending in ${order.paymentInfo.cardLast4}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Transaction ID:</span>
                        <span class="font-medium">${order.paymentInfo.transactionId}</span>
                    </div>
                `;
            } else if (order.paymentMethod === 'upi') {
                modalPaymentInfo.innerHTML = `
                    <div class="flex justify-between">
                        <span class="text-gray-600">UPI ID:</span>
                        <span class="font-medium">${order.paymentInfo.upiId}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Transaction ID:</span>
                        <span class="font-medium">${order.paymentInfo.transactionId}</span>
                    </div>
                `;
            } else if (order.paymentMethod === 'netbanking') {
                modalPaymentInfo.innerHTML = `
                    <div class="flex justify-between">
                        <span class="text-gray-600">Bank:</span>
                        <span class="font-medium">${order.paymentInfo.bank}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Transaction ID:</span>
                        <span class="font-medium">${order.paymentInfo.transactionId}</span>
                    </div>
                `;
            } else {
                modalPaymentInfo.innerHTML = `
                    <div class="flex justify-between">
                        <span class="text-gray-600">Method:</span>
                        <span class="font-medium">${order.paymentInfo.method}</span>
                    </div>
                `;
            }

            // Show modal
            orderDetailsModal.classList.remove('hidden');
        }

        function editOrder(orderId) {
            alert(`Edit order ${orderId} functionality would be implemented here`);
        }

        function deleteOrder(orderId) {
            if (confirm(`Are you sure you want to delete order ${orderId}?`)) {
                alert(`Delete order ${orderId} functionality would be implemented here`);
            }
        }

        function toggleSelectAll() {
            const checkboxes = document.querySelectorAll('.order-checkbox');
            if (selectAll.checked) {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = true;
                    selectedOrders.add(checkbox.dataset.orderId);
                });
            } else {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = false;
                    selectedOrders.delete(checkbox.dataset.orderId);
                });
            }
            updateBulkActions();
        }

        function updateBulkActions() {
            if (selectedOrders.size > 0) {
                bulkActions.classList.remove('hidden');
                selectedCount.textContent = `${selectedOrders.size} ${selectedOrders.size === 1 ? 'order' : 'orders'} selected`;
            } else {
                bulkActions.classList.add('hidden');
            }
        }

        function clearSelection() {
            selectedOrders.clear();
            selectAll.checked = false;
            document.querySelectorAll('.order-checkbox').forEach(checkbox => {
                checkbox.checked = false;
            });
            updateBulkActions();
        }

        function bulkDeleteOrders() {
            if (selectedOrders.size === 0) return;

            if (confirm(`Are you sure you want to delete ${selectedOrders.size} ${selectedOrders.size === 1 ? 'order' : 'orders'}?`)) {
                alert(`Bulk delete functionality would be implemented here for orders: ${Array.from(selectedOrders).join(', ')}`);
                // In a real implementation, you would:
                // 1. Send a request to the server to delete these orders
                // 2. On success, remove them from the UI
                // 3. Clear the selection
                clearSelection();
            }
        }

        function formatDate(dateString) {
            const options = { year: 'numeric', month: 'short', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('en-US', options);
        }

        function formatDisplayDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('en-US', options);
        }
    </script>
</body>

</html>