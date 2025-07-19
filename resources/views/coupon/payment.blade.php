<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payout Management Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4361ee',
                        secondary: '#3f37c9',
                        dark: '#0f172a',
                        light: '#f8fafc'
                    }
                }
            }
        }
    </script>
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }

        .expanded-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .expanded-content.show {
            max-height: 500px;
        }

        .status-badge {
            @apply px-2 py-1 rounded-full text-xs font-medium;
        }

        .status-success {
            @apply bg-green-100 text-green-800;
        }

        .status-pending {
            @apply bg-yellow-100 text-yellow-800;
        }

        .status-failed {
            @apply bg-red-100 text-red-800;
        }

        .status-processing {
            @apply bg-blue-100 text-blue-800;
        }

        .payout-table {
            min-width: 800px;
        }

        @media (max-width: 768px) {
            .payout-table {
                min-width: 1000px;
            }
        }
    </style>
</head>

<body class="bg-gray-50 flex h-screen">
    <!-- Sidebar -->
    <div class="sidebar bg-white w-64 border-r border-gray-200 flex flex-col hidden md:flex">
        <div class="p-5 border-b border-gray-200">
            <h1 class="text-xl font-bold text-primary flex items-center">
                <i class="fas fa-wallet mr-2"></i> PayoutPro
            </h1>
        </div>
        <div class="flex-1 overflow-y-auto">
            <nav class="p-4">
                <ul>
                    <li class="mb-2">
                        <a href="#" class="flex items-center p-3 bg-primary text-white rounded-lg">
                            <i class="fas fa-home mr-3"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                            <i class="fas fa-sync-alt mr-3"></i>
                            Transactions
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                            <i class="fas fa-users mr-3"></i>
                            Sellers
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                            <i class="fas fa-chart-bar mr-3"></i>
                            Analytics
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                            <i class="fas fa-cog mr-3"></i>
                            Settings
                        </a>
                    </li>
                    <li class="mb-2 mt-8">
                        <a href="#" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                            <i class="fas fa-question-circle mr-3"></i>
                            Help & Support
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="p-4 border-t border-gray-200">
            <div class="flex items-center">
                <div
                    class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-bold mr-3">
                    AJ</div>
                <div>
                    <p class="font-medium text-gray-800">Admin Johnson</p>
                    <p class="text-xs text-gray-500">admin@example.com</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Bar -->
        <header class="bg-white border-b border-gray-200">
            <div class="flex items-center justify-between p-4">
                <div class="flex items-center">
                    <button class="text-gray-500 mr-4 md:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-lg font-semibold text-gray-800">Payout Management</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" placeholder="Search..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <button class="relative p-2 text-gray-500 hover:text-gray-700">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 w-3 h-3 bg-red-500 rounded-full"></span>
                    </button>
                    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-user text-gray-600"></i>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <div class="flex-1 overflow-y-auto p-4 md:p-6">
            <!-- Stats Summary -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white rounded-xl shadow p-4">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Total Payouts</p>
                            <p class="text-2xl font-bold text-gray-800">₹84,200</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-wallet text-blue-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-xs text-green-500 mt-2"><i class="fas fa-arrow-up mr-1"></i> 12.5% from last month
                    </p>
                </div>
                <div class="bg-white rounded-xl shadow p-4">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Pending</p>
                            <p class="text-2xl font-bold text-gray-800">₹12,450</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-yellow-100 flex items-center justify-center">
                            <i class="fas fa-clock text-yellow-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-xs text-red-500 mt-2"><i class="fas fa-arrow-down mr-1"></i> 3.2% from last month</p>
                </div>
                <div class="bg-white rounded-xl shadow p-4">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Sellers</p>
                            <p class="text-2xl font-bold text-gray-800">42</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center">
                            <i class="fas fa-users text-green-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-xs text-green-500 mt-2"><i class="fas fa-arrow-up mr-1"></i> 8.7% from last month</p>
                </div>
                <div class="bg-white rounded-xl shadow p-4">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Avg. Payout</p>
                            <p class="text-2xl font-bold text-gray-800">₹2,005</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                            <i class="fas fa-chart-line text-purple-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-xs text-green-500 mt-2"><i class="fas fa-arrow-up mr-1"></i> 5.3% from last month</p>
                </div>
            </div>

            <!-- Payout Table -->
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <div
                    class="px-6 py-4 border-b border-gray-200 flex flex-col md:flex-row justify-between items-start md:items-center">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 md:mb-0">Payout Overview</h3>
                    <div class="flex space-x-2">
                        <button
                            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 flex items-center">
                            <i class="fas fa-filter mr-2"></i> Filter
                        </button>
                        <button class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary flex items-center">
                            <i class="fas fa-plus mr-2"></i> New Payout
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full payout-table">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total Payment</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Remaining Payment</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Seller 1 -->
                            <tr class="hover:bg-gray-50" data-id="1">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">PAY-001</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold mr-3">
                                            JE</div>
                                        <div class="text-sm text-gray-900">John Electronics</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">₹12,450.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">₹4,200.00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="status-badge status-pending">Pending</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex space-x-2">
                                        <button class="expand-btn p-2 text-gray-500 hover:bg-gray-100 rounded-full"
                                            data-id="1">
                                            <i class="fas fa-angle-right"></i>
                                        </button>
                                        <button class="details-btn p-2 text-gray-500 hover:bg-gray-100 rounded-full"
                                            data-id="1">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="p-0">
                                    <div class="expanded-content" id="expanded-1">
                                        <!-- Expanded content will be shown here -->
                                    </div>
                                </td>
                            </tr>

                            <!-- Seller 2 -->
                            <tr class="hover:bg-gray-50" data-id="2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">PAY-002</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-bold mr-3">
                                            SF</div>
                                        <div class="text-sm text-gray-900">Sarah Fashion</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">₹8,750.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">₹2,150.00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="status-badge status-processing">Processing</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex space-x-2">
                                        <button class="expand-btn p-2 text-gray-500 hover:bg-gray-100 rounded-full"
                                            data-id="2">
                                            <i class="fas fa-angle-right"></i>
                                        </button>
                                        <button class="details-btn p-2 text-gray-500 hover:bg-gray-100 rounded-full"
                                            data-id="2">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="p-0">
                                    <div class="expanded-content" id="expanded-2">
                                        <!-- Expanded content will be shown here -->
                                    </div>
                                </td>
                            </tr>

                            <!-- Seller 3 -->
                            <tr class="hover:bg-gray-50" data-id="3">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">PAY-003</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold mr-3">
                                            TB</div>
                                        <div class="text-sm text-gray-900">Tech Brothers</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">₹24,800.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">₹0.00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="status-badge status-success">Completed</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex space-x-2">
                                        <button class="expand-btn p-2 text-gray-500 hover:bg-gray-100 rounded-full"
                                            data-id="3">
                                            <i class="fas fa-angle-right"></i>
                                        </button>
                                        <button class="details-btn p-2 text-gray-500 hover:bg-gray-100 rounded-full"
                                            data-id="3">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="p-0">
                                    <div class="expanded-content" id="expanded-3">
                                        <!-- Expanded content will be shown here -->
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Payout Details Modal -->
    <div id="payoutModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl max-h-[80vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Payout Details</h3>
                    <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div id="modalContent">
                    <!-- Modal content will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Processing Modal -->
    <div id="paymentModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Process Payment</h3>
                    <button id="closePaymentModal" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div id="paymentContent" class="space-y-4">
                    <!-- Payment content will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample data for sellers
        const sellers = {
            1: {
                id: "PAY-001",
                name: "John Electronics",
                email: "john.electronics@example.com",
                phone: "+91 9876543210",
                bankDetails: {
                    accountName: "John Electronics",
                    accountNumber: "123456789012",
                    bankName: "State Bank of India",
                    ifsc: "SBIN0001234"
                },
                totalPayment: "₹12,450.00",
                remainingPayment: "₹4,200.00",
                payoutMethods: [
                    { method: "UPI", amount: "₹6,250.00" },
                    { method: "Bank Transfer", amount: "₹6,200.00" }
                ],
                transactionHistory: [
                    { date: "2023-05-15", amount: "₹2,500.00", method: "UPI", status: "Success" },
                    { date: "2023-04-28", amount: "₹3,750.00", method: "Bank Transfer", status: "Success" },
                    { date: "2023-03-10", amount: "₹1,000.00", method: "UPI", status: "Failed" }
                ]
            },
            2: {
                id: "PAY-002",
                name: "Sarah Fashion",
                email: "sarah.fashion@example.com",
                phone: "+91 8765432109",
                bankDetails: {
                    accountName: "Sarah Fashion",
                    accountNumber: "987654321098",
                    bankName: "HDFC Bank",
                    ifsc: "HDFC0009876"
                },
                totalPayment: "₹8,750.00",
                remainingPayment: "₹2,150.00",
                payoutMethods: [
                    { method: "UPI", amount: "₹4,500.00" },
                    { method: "Bank Transfer", amount: "₹4,250.00" }
                ],
                transactionHistory: [
                    { date: "2023-05-10", amount: "₹2,000.00", method: "Bank Transfer", status: "Success" },
                    { date: "2023-04-05", amount: "₹2,600.00", method: "UPI", status: "Success" }
                ]
            },
            3: {
                id: "PAY-003",
                name: "Tech Brothers",
                email: "tech.brothers@example.com",
                phone: "+91 7890123456",
                bankDetails: {
                    accountName: "Tech Brothers Pvt Ltd",
                    accountNumber: "456789012345",
                    bankName: "ICICI Bank",
                    ifsc: "ICIC0004567"
                },
                totalPayment: "₹24,800.00",
                remainingPayment: "₹0.00",
                payoutMethods: [
                    { method: "Bank Transfer", amount: "₹24,800.00" }
                ],
                transactionHistory: [
                    { date: "2023-06-01", amount: "₹8,200.00", method: "Bank Transfer", status: "Success" },
                    { date: "2023-05-22", amount: "₹9,500.00", method: "Bank Transfer", status: "Success" },
                    { date: "2023-05-05", amount: "₹7,100.00", method: "Bank Transfer", status: "Success" }
                ]
            }
        };

        // Expand row functionality
        document.querySelectorAll('.expand-btn').forEach(button => {
            button.addEventListener('click', function () {
                const sellerId = this.getAttribute('data-id');
                const expandedContent = document.getElementById(`expanded-${sellerId}`);
                const icon = this.querySelector('i');

                expandedContent.classList.toggle('show');

                if (expandedContent.classList.contains('show')) {
                    icon.classList.remove('fa-angle-right');
                    icon.classList.add('fa-angle-down');
                    // Load content if not already loaded
                    if (!expandedContent.innerHTML) {
                        const seller = sellers[sellerId];
                        expandedContent.innerHTML = `
                            <div class="bg-gray-50 p-4 border-t border-gray-200">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <h4 class="font-medium text-gray-700 mb-2">Pending Amount</h4>
                                        <p class="text-2xl font-bold text-gray-800">${seller.remainingPayment}</p>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-700 mb-2">Next Payout Date</h4>
                                        <p class="text-lg text-gray-800">${new Date(new Date().setDate(new Date().getDate() + 7)).toLocaleDateString()}</p>
                                    </div>
                                    <div class="flex items-end space-x-2">
                                        <button class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary flex-1">Send Reminder</button>
                                        <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 flex-1">Initiate Payout</button>
                                    </div>
                                </div>
                            </div>
                        `;
                    }
                } else {
                    icon.classList.remove('fa-angle-down');
                    icon.classList.add('fa-angle-right');
                }
            });
        });

        // Modal functionality
        const modal = document.getElementById('payoutModal');
        const paymentModal = document.getElementById('paymentModal');
        const closeModal = document.getElementById('closeModal');
        const closePaymentModal = document.getElementById('closePaymentModal');
        const modalContent = document.getElementById('modalContent');
        const paymentContent = document.getElementById('paymentContent');

        document.querySelectorAll('.details-btn').forEach(button => {
            button.addEventListener('click', function () {
                const sellerId = this.getAttribute('data-id');
                const seller = sellers[sellerId];

                // Populate modal content
                modalContent.innerHTML = `
                    <div class="mb-6">
                        <h4 class="text-md font-semibold text-gray-700 mb-4 pb-2 border-b">Seller Information</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <p class="text-sm text-gray-600 mb-2"><span class="font-medium text-gray-800">Name:</span> ${seller.name}</p>
                                <p class="text-sm text-gray-600 mb-2"><span class="font-medium text-gray-800">Email:</span> ${seller.email}</p>
                                <p class="text-sm text-gray-600 mb-2"><span class="font-medium text-gray-800">Phone:</span> ${seller.phone}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-2"><span class="font-medium text-gray-800">Total Payment:</span> ${seller.totalPayment}</p>
                                <p class="text-sm text-gray-600 mb-2"><span class="font-medium text-gray-800">Remaining Payment:</span> ${seller.remainingPayment}</p>
                                <p class="text-sm text-gray-600 mb-2"><span class="font-medium text-gray-800">Last Payout:</span> ${seller.transactionHistory[0].date}</p>
                            </div>
                        </div>
                        
                        <h4 class="text-md font-semibold text-gray-700 mb-4 pb-2 border-b">Bank Details</h4>
                        <div class="bg-gray-50 p-4 rounded-lg mb-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600 mb-2"><span class="font-medium text-gray-800">Account Name:</span> ${seller.bankDetails.accountName}</p>
                                    <p class="text-sm text-gray-600 mb-2"><span class="font-medium text-gray-800">Account Number:</span> ${seller.bankDetails.accountNumber}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600 mb-2"><span class="font-medium text-gray-800">Bank Name:</span> ${seller.bankDetails.bankName}</p>
                                    <p class="text-sm text-gray-600 mb-2"><span class="font-medium text-gray-800">IFSC Code:</span> ${seller.bankDetails.ifsc}</p>
                                </div>
                            </div>
                        </div>
                        
                        <h4 class="text-md font-semibold text-gray-700 mb-4 pb-2 border-b">Add Payment</h4>
                        <div class="mb-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
                                    <input type="text" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary p-3 border" value="${seller.remainingPayment}" placeholder="Enter amount">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
                                    <select class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary p-3 border">
                                        <option>Bank Transfer</option>
                                        <option>UPI</option>
                                        <option>Cheque</option>
                                        <option>Cash</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                                <textarea class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary p-3 border" rows="2" placeholder="Add payment notes"></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg mr-2 hover:bg-gray-300">Save Draft</button>
                                <button class="process-payment-btn px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary" data-id="${sellerId}">Process Payment</button>
                            </div>
                        </div>
                        
                        <h4 class="text-md font-semibold text-gray-700 mb-4 pb-2 border-b">Transaction History</h4>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Method</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    ${seller.transactionHistory.map(transaction => `
                                        <tr>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">${transaction.date}</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">${transaction.amount}</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">${transaction.method}</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm">
                                                <span class="status-badge ${transaction.status === 'Success' ? 'status-success' : 'status-failed'}">
                                                    ${transaction.status}
                                                </span>
                                            </td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-end space-x-3">
                        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Download Report</button>
                        <button id="closeModalBtn" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary">Close</button>
                    </div>
                `;

                // Show modal
                modal.classList.remove('hidden');

                // Add event listener to the close button in the modal content
                document.getElementById('closeModalBtn')?.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });

                // Add event listener to process payment button
                document.querySelector('.process-payment-btn')?.addEventListener('click', function () {
                    const sellerId = this.getAttribute('data-id');
                    const seller = sellers[sellerId];

                    // Populate payment modal
                    paymentContent.innerHTML = `
                        <div class="p-4 bg-blue-50 rounded-lg mb-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mr-3">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">${seller.name}</h4>
                                    <p class="text-sm text-gray-600">${seller.email}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Amount to Pay</label>
                                <input type="text" value="${seller.remainingPayment}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary p-3 border font-medium text-lg">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
                                <select class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary p-3 border">
                                    <option>Bank Transfer</option>
                                    <option>UPI</option>
                                    <option>Cheque</option>
                                    <option>Cash</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Transaction Reference</label>
                                <input type="text" placeholder="Enter reference ID" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary p-3 border">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Payment Date</label>
                                <input type="date" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary p-3 border">
                            </div>
                            
                            <div class="pt-4">
                                <button class="w-full px-4 py-3 bg-primary text-white rounded-lg hover:bg-secondary font-medium">
                                    Confirm and Process Payment
                                </button>
                            </div>
                        </div>
                    `;

                    // Hide current modal and show payment modal
                    modal.classList.add('hidden');
                    paymentModal.classList.remove('hidden');
                });
            });
        });

        // Close modals
        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        closePaymentModal.addEventListener('click', () => {
            paymentModal.classList.add('hidden');
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });

        paymentModal.addEventListener('click', (e) => {
            if (e.target === paymentModal) {
                paymentModal.classList.add('hidden');
            }
        });
    </script>
</body>

</html>