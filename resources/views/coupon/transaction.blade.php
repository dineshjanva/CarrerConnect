<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Transactions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50 font-sans">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-indigo-800 text-white p-4 hidden md:block">
            <div class="flex items-center justify-center py-4">
                <div class="bg-gray-200 rounded-xl w-16 h-16"></div>
                <div class="ml-3">
                    <h1 class="text-xl font-bold">Admin Panel</h1>
                    <p class="text-xs opacity-80">Administrator</p>
                </div>
            </div>
            <nav class="mt-8">
                <ul class="space-y-1">
                    <li><a href="#" class="block py-3 px-4 rounded hover:bg-indigo-700"><i
                                class="fas fa-tachometer-alt mr-3"></i> Dashboard</a></li>
                    <li><a href="#" class="block py-3 px-4 rounded bg-indigo-700"><i
                                class="fas fa-exchange-alt mr-3"></i> Transactions</a></li>
                    <li><a href="#" class="block py-3 px-4 rounded hover:bg-indigo-700"><i
                                class="fas fa-shopping-cart mr-3"></i> Orders</a></li>
                    <li><a href="#" class="block py-3 px-4 rounded hover:bg-indigo-700"><i
                                class="fas fa-users mr-3"></i> Customers</a></li>
                    <li><a href="#" class="block py-3 px-4 rounded hover:bg-indigo-700"><i
                                class="fas fa-chart-line mr-3"></i> Analytics</a></li>
                    <li><a href="#" class="block py-3 px-4 rounded hover:bg-indigo-700"><i class="fas fa-cog mr-3"></i>
                            Settings</a></li>
                    <li class="pt-8 border-t border-indigo-400 mt-8"><a href="#"
                            class="block py-3 px-4 rounded hover:bg-indigo-700"><i class="fas fa-sign-out-alt mr-3"></i>
                            Logout</a></li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navbar -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center p-4">
                    <div class="flex items-center">
                        <button class="md:hidden mr-4 text-gray-600">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <h2 class="text-xl font-bold text-gray-800">Transaction Management</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative hidden md:block">
                            <input type="text" placeholder="Search..."
                                class="pl-10 pr-4 py-2 border rounded-lg w-64 focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button class="text-gray-600 relative">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                            </button>
                            <div class="flex items-center">
                                <div class="bg-gray-200 rounded-xl w-10 h-10"></div>
                                <span class="ml-2 text-gray-700 hidden md:inline">Admin User</span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-4 md:p-6">
                <!-- Stats Summary -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-white rounded-xl shadow p-6 flex items-center">
                        <div class="bg-green-100 p-3 rounded-lg mr-4">
                            <i class="fas fa-wallet text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Total Revenue</p>
                            <p class="text-2xl font-bold">$24,568.00</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow p-6 flex items-center">
                        <div class="bg-blue-100 p-3 rounded-lg mr-4">
                            <i class="fas fa-exchange-alt text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Transactions</p>
                            <p class="text-2xl font-bold">1,245</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow p-6 flex items-center">
                        <div class="bg-purple-100 p-3 rounded-lg mr-4">
                            <i class="fas fa-user-check text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Customers</p>
                            <p class="text-2xl font-bold">562</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow p-6 flex items-center">
                        <div class="bg-yellow-100 p-3 rounded-lg mr-4">
                            <i class="fas fa-sync-alt text-yellow-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Refunds</p>
                            <p class="text-2xl font-bold">$1,245.00</p>
                        </div>
                    </div>
                </div>

                <!-- Filters Section -->
                <div class="bg-white p-6 rounded-xl shadow mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Transaction Filters</h3>
                        <button class="text-indigo-600 font-medium">
                            <i class="fas fa-sliders-h mr-2"></i> Advanced Filters
                        </button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">From Date</label>
                            <input type="date" id="fromDate"
                                class="w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">To Date</label>
                            <input type="date" id="toDate"
                                class="w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select id="statusFilter"
                                class="w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">All Statuses</option>
                                <option value="success">Success</option>
                                <option value="failed">Failed</option>
                                <option value="pending">Pending</option>
                                <option value="refunded">Refunded</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Commission</label>
                            <select id="paymentMethodFilter"
                                class="w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">All Methods</option>
                                <option value="credit_card">Credit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="bank_transfer">Bank Transfer</option>
                                <option value="crypto">Cryptocurrency</option>
                            </select>
                        </div>
                        <div class="flex items-end space-x-2">
                            <button id="applyFilters"
                                class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                                Apply
                            </button>
                            <button id="resetFilters"
                                class="w-full bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300 transition">
                                Reset
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Transactions Table -->
                <div class="bg-white rounded-xl shadow overflow-hidden">
                    <div class="p-4 flex justify-between items-center border-b">
                        <h3 class="text-lg font-semibold text-gray-800">Recent Transactions</h3>
                        <div class="flex space-x-2">
                            <button
                                class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md text-sm hover:bg-gray-50 transition">
                                <i class="fas fa-download mr-2"></i> Export
                            </button>
                            <button
                                class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm hover:bg-indigo-700 transition">
                                <i class="fas fa-plus mr-2"></i> New Transaction
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Transaction ID</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Customer</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date & Time</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total Amount</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Commission</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody id="transactionsTable" class="bg-white divide-y divide-gray-200">
                                <!-- Transactions will be populated here by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 border-t flex justify-between items-center">
                        <div class="text-sm text-gray-600">
                            Showing <span id="showingFrom">1</span> to <span id="showingTo">5</span> of <span
                                id="totalTransactions">5</span> transactions
                        </div>
                        <div class="flex space-x-2">
                            <button id="prevPage" class="px-3 py-1 border rounded-md text-sm disabled:opacity-50"
                                disabled>
                                Previous
                            </button>
                            <button class="px-3 py-1 border rounded-md text-sm bg-indigo-600 text-white">
                                1
                            </button>
                            <button class="px-3 py-1 border rounded-md text-sm hover:bg-gray-100">
                                2
                            </button>
                            <button class="px-3 py-1 border rounded-md text-sm hover:bg-gray-100">
                                3
                            </button>
                            <button id="nextPage" class="px-3 py-1 border rounded-md text-sm">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Transaction Details Modal -->
    <div id="transactionModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute w-full h-full bg-black bg-opacity-50 position-sticky" onclick="closeTransactionModal()">
        </div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-3xl">
            <div class="bg-white rounded-xl shadow-xl max-h-[90vh] overflow-y-auto scroll-smooth">
                <div class="bg-indigo-600 text-white p-5 flex justify-between items-center">
                    <h3 class="text-xl font-bold">Transaction Details</h3>
                    <button onclick="closeTransactionModal()" class="text-white hover:text-gray-200">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Transaction Summary -->
                        <div class="bg-gray-50 p-5 rounded-lg">
                            <h4 class="font-semibold text-lg mb-3">Transaction Summary</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Transaction ID:</span>
                                    <span id="modalTxnId" class="font-medium">-</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Date & Time:</span>
                                    <span id="modalTxnDate" class="font-medium">-</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Order ID:</span>
                                    <span id="modalOrderId" class="font-medium">-</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Total Amount:</span>
                                    <span id="modalTxnAmount" class="font-medium text-lg text-green-600">-</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Status:</span>
                                    <span id="modalTxnStatus" class="font-medium">-</span>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Information -->
                        <div class="bg-gray-50 p-5 rounded-lg">
                            <h4 class="font-semibold text-lg mb-3">Payment Information</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Method:</span>
                                    <span id="modalPaymentMethod" class="font-medium">-</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Gateway:</span>
                                    <span id="modalPaymentGateway" class="font-medium">-</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Commission:</span>
                                    <span id="modalTxnFee" class="font-medium">-</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Net Amount:</span>
                                    <span id="modalNetAmount" class="font-medium">-</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Gateway ID:</span>
                                    <span id="modalGatewayId" class="font-medium text-sm">-</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Information -->
                    <div class="bg-gray-50 p-5 rounded-lg mb-6">
                        <h4 class="font-semibold text-lg mb-3">Customer Information</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <p class="text-gray-600 text-sm">Name</p>
                                <p id="modalCustomerName" class="font-medium">-</p>
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm">Email</p>
                                <p id="modalCustomerEmail" class="font-medium">-</p>
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm">Phone</p>
                                <p id="modalCustomerPhone" class="font-medium">-</p>
                            </div>
                        </div>
                    </div>

                    <!-- Transaction Timeline -->
                    <div class="bg-gray-50 p-5 rounded-lg">
                        <h4 class="font-semibold text-lg mb-3">Transaction Timeline</h4>
                        <div id="modalTxnTimeline" class="relative pl-8 border-l-2 border-gray-200 space-y-4">
                            <!-- Timeline items will be added here -->
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-6 flex justify-end space-x-3">
                        <button class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                            <i class="fas fa-print mr-2"></i> Print Receipt
                        </button>
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            <i class="fas fa-redo mr-2"></i> Refund Transaction
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample transaction data
        const transactions = [
            {
                id: 'TX-763482',
                orderId: 'ORD-1245',
                customer: {
                    name: 'Sarah Johnson',
                    email: 'sarah@example.com',
                    phone: '+1 (555) 123-4567'
                },
                date: '2023-10-12T10:24:00',
                amount: 249.99,
                paymentMethod: 'credit_card',
                paymentDetails: {
                    type: 'Visa',
                    last4: '4231',
                    gateway: 'Stripe',
                    fee: 7.50,
                    gatewayId: 'ch_1J4jJd2eZvKYlo2C3mJ0zX3e'
                },
                status: 'success',
                timeline: [
                    { event: 'Payment Completed', timestamp: '2023-10-12T10:24:00', status: 'completed' },
                    { event: 'Order Processed', timestamp: '2023-10-12T10:15:00', status: 'completed' },
                    { event: 'Payment Authorized', timestamp: '2023-10-12T10:12:00', status: 'completed' },
                    { event: 'Order Placed', timestamp: '2023-10-12T10:10:00', status: 'completed' }
                ]
            },
            {
                id: 'TX-892156',
                orderId: 'ORD-1246',
                customer: {
                    name: 'Michael Chen',
                    email: 'michael@example.com',
                    phone: '+1 (555) 987-6543'
                },
                date: '2023-10-11T15:45:00',
                amount: 89.50,
                paymentMethod: 'paypal',
                paymentDetails: {
                    gateway: 'PayPal',
                    fee: 3.58,
                    gatewayId: 'PAYID-MB3J4XI7M123456'
                },
                status: 'pending',
                timeline: [
                    { event: 'Payment Pending', timestamp: '2023-10-11T15:45:00', status: 'pending' },
                    { event: 'Order Placed', timestamp: '2023-10-11T15:40:00', status: 'completed' }
                ]
            },
            {
                id: 'TX-347812',
                orderId: 'ORD-1247',
                customer: {
                    name: 'Emma Rodriguez',
                    email: 'emma@example.com',
                    phone: '+1 (555) 456-7890'
                },
                date: '2023-10-10T09:15:00',
                amount: 1245.00,
                paymentMethod: 'bank_transfer',
                paymentDetails: {
                    gateway: 'Bank Transfer',
                    fee: 0,
                    gatewayId: 'BT-987654321'
                },
                status: 'failed',
                timeline: [
                    { event: 'Payment Failed', timestamp: '2023-10-10T09:15:00', status: 'failed' },
                    { event: 'Order Placed', timestamp: '2023-10-10T09:10:00', status: 'completed' }
                ]
            },
            {
                id: 'TX-569342',
                orderId: 'ORD-1248',
                customer: {
                    name: 'David Wilson',
                    email: 'david@example.com',
                    phone: '+1 (555) 789-0123'
                },
                date: '2023-10-09T14:30:00',
                amount: 420.00,
                paymentMethod: 'credit_card',
                paymentDetails: {
                    type: 'Mastercard',
                    last4: '9821',
                    gateway: 'Stripe',
                    fee: 12.60,
                    gatewayId: 'ch_1J4jJd2eZvKYlo2C3mJ0zX3e',
                    refundId: 're_3J4jJd2eZvKYlo2C1mJ0zX3e'
                },
                status: 'refunded',
                timeline: [
                    { event: 'Refund Processed', timestamp: '2023-10-09T16:45:00', status: 'completed' },
                    { event: 'Payment Completed', timestamp: '2023-10-09T14:30:00', status: 'completed' },
                    { event: 'Order Placed', timestamp: '2023-10-09T14:25:00', status: 'completed' }
                ]
            },
            {
                id: 'TX-781234',
                orderId: 'ORD-1249',
                customer: {
                    name: 'Jennifer Lee',
                    email: 'jennifer@example.com',
                    phone: '+1 (555) 234-5678'
                },
                date: '2023-10-08T11:20:00',
                amount: 75.25,
                paymentMethod: 'crypto',
                paymentDetails: {
                    type: 'Bitcoin',
                    gateway: 'Coinbase Commerce',
                    fee: 0.75,
                    gatewayId: 'BTC-5J4jJd2eZvKYlo2C3mJ0zX3e'
                },
                status: 'success',
                timeline: [
                    { event: 'Payment Completed', timestamp: '2023-10-08T11:20:00', status: 'completed' },
                    { event: 'Order Placed', timestamp: '2023-10-08T11:15:00', status: 'completed' }
                ]
            }
        ];

        // DOM elements
        const transactionsTable = document.getElementById('transactionsTable');
        const transactionModal = document.getElementById('transactionModal');
        const applyFiltersBtn = document.getElementById('applyFilters');
        const resetFiltersBtn = document.getElementById('resetFilters');
        const prevPageBtn = document.getElementById('prevPage');
        const nextPageBtn = document.getElementById('nextPage');

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function () {
            renderTransactions(transactions);
            updatePaginationInfo(1, transactions.length, transactions.length);
        });

        // Render transactions to the table
        function renderTransactions(transactionsToRender) {
            transactionsTable.innerHTML = '';

            transactionsToRender.forEach(txn => {
                const row = document.createElement('tr');
                row.className = 'hover:bg-gray-50 transition-colors';

                // Status badge styling
                let statusClass = '';
                let statusIcon = '';
                switch (txn.status) {
                    case 'success':
                        statusClass = 'bg-green-100 text-green-800';
                        statusIcon = 'fa-check-circle';
                        break;
                    case 'failed':
                        statusClass = 'bg-red-100 text-red-800';
                        statusIcon = 'fa-times-circle';
                        break;
                    case 'pending':
                        statusClass = 'bg-yellow-100 text-yellow-800';
                        statusIcon = 'fa-clock';
                        break;
                    case 'refunded':
                        statusClass = 'bg-purple-100 text-purple-800';
                        statusIcon = 'fa-undo';
                        break;
                    default:
                        statusClass = 'bg-gray-100 text-gray-800';
                        statusIcon = 'fa-info-circle';
                }

                // Format date
                const txnDate = new Date(txn.date);
                const formattedDate = txnDate.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
                const formattedTime = txnDate.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });

                row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap ">
                        <div class="text-sm font-medium text-gray-900">${txn.id}</div>
                        <div class="text-sm text-gray-500">${txn.orderId}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="bg-gray-200 rounded-xl w-8 h-8"></div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">${txn.customer.name}</div>
                                <div class="text-sm text-gray-500">${txn.customer.email}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${formattedDate}</div>
                        <div class="text-sm text-gray-500">${formattedTime}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                        $${txn.amount.toFixed(2)}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                        $${txn.paymentDetails.fee.toFixed(2)}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                            <i class="fas ${statusIcon} mr-1"></i> ${txn.status.charAt(0).toUpperCase() + txn.status.slice(1)}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button onclick="viewTransaction('${txn.id}')" class="text-indigo-600 hover:text-indigo-900 mr-3">
                            <i class="fas fa-eye mr-1"></i>
                        </button>
                        <button class="text-gray-600 hover:text-gray-900">
                            <i class="fas fa-print"></i>
                        </button>
                    </td>
                `;

                transactionsTable.appendChild(row);
            });
        }

        // View transaction details
        function viewTransaction(txnId) {
            const txn = transactions.find(t => t.id === txnId);
            if (!txn) return;

            // Format date
            const txnDate = new Date(txn.date);
            const formattedDateTime = txnDate.toLocaleString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });

            // Set modal content
            document.getElementById('modalTxnId').textContent = txn.id;
            document.getElementById('modalTxnDate').textContent = formattedDateTime;
            document.getElementById('modalOrderId').textContent = txn.orderId;
            document.getElementById('modalTxnAmount').textContent = `$${txn.amount.toFixed(2)}`;

            // Set status
            let statusBadge = '';
            switch (txn.status) {
                case 'success':
                    statusBadge = '<span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"><i class="fas fa-check-circle mr-1"></i> Success</span>';
                    break;
                case 'failed':
                    statusBadge = '<span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800"><i class="fas fa-times-circle mr-1"></i> Failed</span>';
                    break;
                case 'pending':
                    statusBadge = '<span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800"><i class="fas fa-clock mr-1"></i> Pending</span>';
                    break;
                case 'refunded':
                    statusBadge = '<span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800"><i class="fas fa-undo mr-1"></i> Refunded</span>';
                    break;
                default:
                    statusBadge = txn.status;
            }
            document.getElementById('modalTxnStatus').innerHTML = statusBadge;

            // Set payment method
            let paymentMethod = '';
            switch (txn.paymentMethod) {
                case 'credit_card':
                    paymentMethod = `<div class="flex items-center">
                        <div class="w-6 h-6 rounded-md bg-gray-100 flex items-center justify-center mr-2">
                            <i class="fab ${txn.paymentDetails.type === 'Visa' ? 'fa-cc-visa text-blue-600' : 'fa-cc-mastercard text-red-600'}"></i>
                        </div>
                        <span>${txn.paymentDetails.type} •••• ${txn.paymentDetails.last4}</span>
                    </div>`;
                    break;
                case 'paypal':
                    paymentMethod = `<div class="flex items-center">
                        <div class="w-6 h-6 rounded-md bg-gray-100 flex items-center justify-center mr-2">
                            <i class="fab fa-paypal text-blue-500"></i>
                        </div>
                        <span>PayPal</span>
                    </div>`;
                    break;
                case 'bank_transfer':
                    paymentMethod = `<div class="flex items-center">
                        <div class="w-6 h-6 rounded-md bg-gray-100 flex items-center justify-center mr-2">
                            <i class="fas fa-university text-blue-800"></i>
                        </div>
                        <span>Bank Transfer</span>
                    </div>`;
                    break;
                case 'crypto':
                    paymentMethod = `<div class="flex items-center">
                        <div class="w-6 h-6 rounded-md bg-gray-100 flex items-center justify-center mr-2">
                            <i class="fab fa-bitcoin text-orange-500"></i>
                        </div>
                        <span>Bitcoin</span>
                    </div>`;
                    break;
                default:
                    paymentMethod = txn.paymentMethod;
            }
            document.getElementById('modalPaymentMethod').innerHTML = paymentMethod;

            // Set other payment details
            document.getElementById('modalPaymentGateway').textContent = txn.paymentDetails.gateway;
            document.getElementById('modalTxnFee').textContent = `$${txn.paymentDetails.fee.toFixed(2)}`;
            document.getElementById('modalNetAmount').textContent = `$${(txn.amount - txn.paymentDetails.fee).toFixed(2)}`;
            document.getElementById('modalGatewayId').textContent = txn.paymentDetails.gatewayId;

            // Set customer info
            document.getElementById('modalCustomerName').textContent = txn.customer.name;
            document.getElementById('modalCustomerEmail').textContent = txn.customer.email;
            document.getElementById('modalCustomerPhone').textContent = txn.customer.phone;

            // Render timeline
            const timelineEl = document.getElementById('modalTxnTimeline');
            timelineEl.innerHTML = '';

            txn.timeline.forEach(event => {
                const eventDate = new Date(event.timestamp);
                const formattedEventTime = eventDate.toLocaleString('en-US', {
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });

                let dotColor = '';
                switch (event.status) {
                    case 'completed':
                        dotColor = 'bg-green-500';
                        break;
                    case 'failed':
                        dotColor = 'bg-red-500';
                        break;
                    case 'pending':
                        dotColor = 'bg-yellow-500';
                        break;
                    default:
                        dotColor = 'bg-gray-400';
                }

                const timelineItem = document.createElement('div');
                timelineItem.className = 'relative';
                timelineItem.innerHTML = `
                    <div class="absolute -left-11 top-0 w-5 h-5 rounded-full ${dotColor} border-4 border-white"></div>
                    <div class="text-sm">
                        <p class="font-medium">${event.event}</p>
                        <p class="text-gray-600">${formattedEventTime}</p>
                    </div>
                `;
                timelineEl.appendChild(timelineItem);
            });

            // Show modal
            transactionModal.classList.remove('hidden');
        }

        // Close modal
        function closeTransactionModal() {
            transactionModal.classList.add('hidden');
        }

        // Apply filters
        applyFiltersBtn.addEventListener('click', function () {
            const fromDate = document.getElementById('fromDate').value;
            const toDate = document.getElementById('toDate').value;
            const status = document.getElementById('statusFilter').value;
            const paymentMethod = document.getElementById('paymentMethodFilter').value;

            const filteredTransactions = transactions.filter(txn => {
                // Date filter
                const txnDate = new Date(txn.date).toISOString().split('T')[0];
                if (fromDate && txnDate < fromDate) return false;
                if (toDate && txnDate > toDate) return false;

                // Status filter
                if (status && txn.status !== status) return false;

                // Payment method filter
                if (paymentMethod && txn.paymentMethod !== paymentMethod) return false;

                return true;
            });

            renderTransactions(filteredTransactions);
            updatePaginationInfo(1, filteredTransactions.length, filteredTransactions.length);
        });

        // Reset filters
        resetFiltersBtn.addEventListener('click', function () {
            document.getElementById('fromDate').value = '';
            document.getElementById('toDate').value = '';
            document.getElementById('statusFilter').value = '';
            document.getElementById('paymentMethodFilter').value = '';

            renderTransactions(transactions);
            updatePaginationInfo(1, transactions.length, transactions.length);
        });

        // Update pagination info
        function updatePaginationInfo(currentPage, itemsPerPage, totalItems) {
            const showingFrom = (currentPage - 1) * itemsPerPage + 1;
            const showingTo = Math.min(currentPage * itemsPerPage, totalItems);

            document.getElementById('showingFrom').textContent = showingFrom;
            document.getElementById('showingTo').textContent = showingTo;
            document.getElementById('totalTransactions').textContent = totalItems;

            // Enable/disable pagination buttons
            prevPageBtn.disabled = currentPage === 1;
            nextPageBtn.disabled = showingTo >= totalItems;
        }
    </script>
</body>

</html>