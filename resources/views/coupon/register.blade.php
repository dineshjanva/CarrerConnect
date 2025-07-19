<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Service Provider Registration</title>
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
                            class="flex items-center px-4 py-2 text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 rounded-md group">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            Dashboard
                        </a>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 rounded-md group">
                            <i class="fas fa-users mr-3"></i>
                            Customers
                        </a>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 rounded-md group">
                            <i class="fas fa-shopping-cart mr-3"></i>
                            Orders
                        </a>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 rounded-md group">
                            <i class="fas fa-boxes mr-3"></i>
                            Products
                        </a>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-md group">
                            <i class="fas fa-user-cog mr-3"></i>
                            Service Providers
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
                    <h1 class="ml-4 text-xl font-semibold text-gray-800">Service Provider Registration</h1>
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
                <div class="max-w-5xl mx-auto">
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <!-- Form Tabs -->
                        {{-- <div class="border-b border-gray-200 w-full">
                            <nav class="flex py-2 px-4 w-[120px]" aria-label="Tabs">
                                <button data-tab="personal"
                                    class="tab-btn flex-shrink-0 px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-blue-100 text-blue-700">
                                    Personal Info
                                </button>
                                <button data-tab="location"
                                    class="tab-btn flex-shrink-0 px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Location
                                </button>
                                <button data-tab="kyc"
                                    class="tab-btn flex-shrink-0 px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    KYC Verification
                                </button>
                                <button data-tab="bank"
                                    class="tab-btn flex-shrink-0 px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Bank Details
                                </button>
                                <button data-tab="security"
                                    class="tab-btn flex-shrink-0 px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Security
                                </button>
                                <button data-tab="additional"
                                    class="tab-btn flex-shrink-0 px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Additional Info
                                </button>
                            </nav>
                        </div> --}}
                        <div class="overflow-x-auto">
                            <nav class="flex flex-wrap gap-x-4 py-2 px-4" aria-label="Tabs">
                                <button data-tab="personal"
                                    class="tab-btn flex-shrink-0 px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-blue-100 text-blue-700">
                                    Personal Info
                                </button>
                                <button data-tab="location"
                                    class="tab-btn flex-shrink-0 px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Location
                                </button>
                                <button data-tab="kyc"
                                    class="tab-btn flex-shrink-0 px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    KYC Verification
                                </button>
                                <button data-tab="bank"
                                    class="tab-btn flex-shrink-0 px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Bank Details
                                </button>
                                <button data-tab="security"
                                    class="tab-btn flex-shrink-0 px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Security
                                </button>
                                <button data-tab="additional"
                                    class="tab-btn flex-shrink-0 px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Additional Info
                                </button>
                            </nav>
                        </div>

                        <!-- Form Content -->
                        <form class="p-6">
                            <!-- Personal Information -->
                            <div id="personal" class="tab-content">
                                <h2 class="text-xl font-semibold text-gray-800 mb-6">Personal Information</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                            required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Email
                                            Address</label>
                                        <input type="email"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                            required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Mobile
                                            Number</label>
                                        <input type="tel"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                            required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Preferred
                                            Language</label>
                                        <select
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                            <option>English</option>
                                            <option>Hindi</option>
                                            <option>Bengali</option>
                                            <option>Telugu</option>
                                            <option>Marathi</option>
                                            <option>Tamil</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-3">Service
                                        Preferences</label>
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-2 block text-sm text-gray-700">Plumber</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-2 block text-sm text-gray-700">Electrician</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-2 block text-sm text-gray-700">Carpenter</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-2 block text-sm text-gray-700">Painter</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-2 block text-sm text-gray-700">AC Repair</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-2 block text-sm text-gray-700">Cleaning</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-2 block text-sm text-gray-700">Gardener</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-2 block text-sm text-gray-700">Pest Control</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- General Location Info -->
                            <div id="location" class="tab-content hidden">
                                <h2 class="text-xl font-semibold text-gray-800 mb-6">Location Information</h2>

                                <div class="mb-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">General Location
                                        (City/Locality)</label>
                                    <input type="text"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="mb-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Current Address</label>
                                    <textarea rows="3"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                                </div>

                                <div class="border-t border-gray-200 pt-6">
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">Detailed Addresses</h3>

                                    <div class="address-container space-y-6">
                                        <div class="address-card bg-gray-50 p-4 rounded-lg border border-gray-200">
                                            <div class="flex justify-between items-start mb-4">
                                                <h4 class="font-medium text-gray-700">Address #1</h4>
                                                <div class="flex items-center space-x-3">
                                                    <div class="flex items-center">
                                                        <input type="checkbox"
                                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                                            id="default1" name="default_address" checked>
                                                        <label for="default1" class="ml-2 text-sm text-gray-700">Set as
                                                            Default</label>
                                                    </div>
                                                    <button type="button" class="text-red-500 hover:text-red-700">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block text-sm text-gray-600 mb-1">House/Flat
                                                        Number</label>
                                                    <input type="text"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                </div>
                                                <div>
                                                    <label class="block text-sm text-gray-600 mb-1">Address Line
                                                        1</label>
                                                    <input type="text"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                </div>
                                                <div>
                                                    <label class="block text-sm text-gray-600 mb-1">Landmark
                                                        (Optional)</label>
                                                    <input type="text"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                </div>
                                                <div>
                                                    <label class="block text-sm text-gray-600 mb-1">City</label>
                                                    <input type="text"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                </div>
                                                <div>
                                                    <label class="block text-sm text-gray-600 mb-1">State</label>
                                                    <input type="text"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                </div>
                                                <div>
                                                    <label class="block text-sm text-gray-600 mb-1">Pincode</label>
                                                    <input type="text"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                </div>
                                                <div>
                                                    <label class="block text-sm text-gray-600 mb-1">Address
                                                        Label</label>
                                                    <select
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                        <option>Home</option>
                                                        <option>Work</option>
                                                        <option>Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" id="add-address"
                                        class="mt-4 flex items-center text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-plus-circle mr-2"></i> Add Another Address
                                    </button>
                                </div>
                            </div>

                            <!-- KYC Verification -->
                            <div id="kyc" class="tab-content hidden">
                                <h2 class="text-xl font-semibold text-gray-800 mb-6">KYC Verification</h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Aadhaar
                                            Number</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="XXXX-XXXX-XXXX">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">PAN Card Number
                                            (Optional)</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="ABCDE1234F">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Upload Aadhaar Card
                                            (Front)</label>
                                        <div
                                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl"></i>
                                                <div class="flex text-sm text-gray-600">
                                                    <label
                                                        class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                                                        <span>Upload a file</span>
                                                        <input type="file" class="sr-only">
                                                    </label>
                                                    <p class="pl-1">or drag and drop</p>
                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG, PDF up to 5MB</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Upload PAN Card
                                            (Optional)</label>
                                        <div
                                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl"></i>
                                                <div class="flex text-sm text-gray-600">
                                                    <label
                                                        class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                                                        <span>Upload a file</span>
                                                        <input type="file" class="sr-only">
                                                    </label>
                                                    <p class="pl-1">or drag and drop</p>
                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG, PDF up to 5MB</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">KYC Status</label>
                                    <div class="flex space-x-4">
                                        <div class="flex items-center">
                                            <input type="radio" name="kyc_status" value="pending" checked
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                            <label class="ml-2 block text-sm text-gray-700">Pending</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" name="kyc_status" value="verified"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                            <label class="ml-2 block text-sm text-gray-700">Verified</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" name="kyc_status" value="rejected"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                            <label class="ml-2 block text-sm text-gray-700">Rejected</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bank Account Details -->
                            <div id="bank" class="tab-content hidden">
                                <h2 class="text-xl font-semibold text-gray-800 mb-6">Bank Account Details</h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Account Holder
                                            Name</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Account
                                            Number</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Account
                                            Number</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">IFSC Code</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Bank Name</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Branch Name</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">UPI ID
                                            (Optional)</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="username@upi">
                                    </div>
                                </div>
                            </div>

                            <!-- Service PIN & Security -->
                            <div id="security" class="tab-content hidden">
                                <h2 class="text-xl font-semibold text-gray-800 mb-6">Service PIN & Security</h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Set Service PIN (4
                                            or 6 digits)</label>
                                        <input type="password" maxlength="6"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Service
                                            PIN</label>
                                        <input type="password" maxlength="6"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Security
                                                Question</label>
                                            <select
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                <option>Select a security question</option>
                                                <option>What was your mother's maiden name?</option>
                                                <option>What was the name of your first pet?</option>
                                                <option>What city were you born in?</option>
                                                <option>What was the make of your first car?</option>
                                                <option>What is your favorite book?</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Security
                                                Answer</label>
                                            <input type="text"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Optional Fields -->
                            <div id="additional" class="tab-content hidden">
                                <h2 class="text-xl font-semibold text-gray-800 mb-6">Additional Information</h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Years of
                                            Experience</label>
                                        <input type="number" min="0" max="50"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Working
                                            Hours</label>
                                        <div class="flex space-x-2">
                                            <select
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                <option>09:00 AM</option>
                                                <option>10:00 AM</option>
                                                <option>11:00 AM</option>
                                                <option>12:00 PM</option>
                                            </select>
                                            <span class="flex items-center">to</span>
                                            <select
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                <option>05:00 PM</option>
                                                <option>06:00 PM</option>
                                                <option>07:00 PM</option>
                                                <option>08:00 PM</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Availability
                                        Days</label>
                                    <div class="grid grid-cols-3 md:grid-cols-7 gap-2">
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-1 block text-sm text-gray-700">Mon</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-1 block text-sm text-gray-700">Tue</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-1 block text-sm text-gray-700">Wed</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-1 block text-sm text-gray-700">Thu</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-1 block text-sm text-gray-700">Fri</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-1 block text-sm text-gray-700">Sat</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-1 block text-sm text-gray-700">Sun</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Certifications (Upload
                                        relevant certificates)</label>
                                    <div
                                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl"></i>
                                            <div class="flex text-sm text-gray-600">
                                                <label
                                                    class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                                                    <span>Upload files</span>
                                                    <input type="file" multiple class="sr-only">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500">PDF, DOC, JPG up to 10MB each</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Form Navigation -->
                    <div class="mt-6 flex justify-between">
                        <button id="prev-tab"
                            class="px-4 py-2 bg-gray-200 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-arrow-left mr-2"></i>Previous
                        </button>
                        <button id="next-tab"
                            class="px-4 py-2 bg-blue-600 rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Next<i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6 text-center">
                        <button type="button" id="submit-form"
                            class="px-6 py-3 bg-green-600 rounded-md shadow-sm text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            <i class="fas fa-user-plus mr-2"></i>Register Service Provider
                        </button>
                    </div>
                </div>
            </main>
        </div>
    </div>

    {{--
    <script>
        // Tab navigation logic
        const tabs = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        const prevBtn = document.getElementById('prev-tab');
        const nextBtn = document.getElementById('next-tab');
        const submitBtn = document.getElementById('submit-form');
        const addAddressBtn = document.getElementById('add-address');

        let currentTab = 0;
        const tabIds = ['personal', 'location', 'kyc', 'bank', 'security', 'additional'];

        // Initialize first tab as active
        tabs[0].classList.add('bg-blue-100', 'text-blue-700');
        tabContents[0].classList.remove('hidden');

        // Switch tabs
        function switchTab(index) {
            // Hide all tab contents
            tabContents.forEach(content => content.classList.add('hidden'));

            // Remove active styles from all tabs
            tabs.forEach(tab => tab.classList.remove('bg-blue-100', 'text-blue-700'));

            // Show selected tab content
            document.getElementById(tabIds[index]).classList.remove('hidden');

            // Add active styles to selected tab
            tabs[index].classList.add('bg-blue-100', 'text-blue-700');

            // Update currentTab
            currentTab = index;

            // Update button visibility
            if (currentTab === 0) {
                prevBtn.classList.add('invisible');
            } else {
                prevBtn.classList.remove('invisible');
            }

            if (currentTab === tabs.length - 1) {
                nextBtn.classList.add('hidden');
                submitBtn.classList.remove('hidden');
            } else {
                nextBtn.classList.remove('hidden');
                submitBtn.classList.add('hidden');
            }
        }

        // Tab click event
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                switchTab(index);
            });
        });

        // Next button click
        nextBtn.addEventListener('click', () => {
            if (currentTab < tabs.length - 1) {
                switchTab(currentTab + 1);
            }
        });

        // Previous button click
        prevBtn.addEventListener('click', () => {
            if (currentTab > 0) {
                switchTab(currentTab - 1);
            }
        });

        // Add new address
        addAddressBtn.addEventListener('click', () => {
            const addressContainer = document.querySelector('.address-container');
            const addressCount = addressContainer.children.length + 1;

            const newAddress = document.createElement('div');
            newAddress.className = 'address-card bg-gray-50 p-4 rounded-lg border border-gray-200';
            newAddress.innerHTML = `
                <div class="flex justify-between items-start mb-4">
                    <h4 class="font-medium text-gray-700">Address #${addressCount}</h4>
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" id="default${addressCount}" name="default_address">
                            <label for="default${addressCount}" class="ml-2 text-sm text-gray-700">Set as Default</label>
                        </div>
                        <button type="button" class="text-red-500 hover:text-red-700">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">House/Flat Number</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Address Line 1</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Landmark (Optional)</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">City</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">State</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Pincode</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Address Label</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option>Home</option>
                            <option>Work</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
            `;

            addressContainer.appendChild(newAddress);

            // Add delete functionality to the new address
            const deleteBtn = newAddress.querySelector('button');
            deleteBtn.addEventListener('click', () => {
                newAddress.remove();
            });
        });

        // Form submission
        submitBtn.addEventListener('click', () => {
            alert('Service provider registration submitted successfully!');
        });
    </script> --}}
    <script>
        // Tab Setup
        const tabs = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        const prevBtn = document.getElementById('prev-tab');
        const nextBtn = document.getElementById('next-tab');
        const submitBtn = document.getElementById('submit-form');
        const addAddressBtn = document.getElementById('add-address');

        const tabIds = ['personal', 'location', 'kyc', 'bank', 'security', 'additional'];
        let currentTab = 0;

        // Initialize first tab
        function initTabs() {
            switchTab(currentTab);
        }

        // Switch tab function
        function switchTab(index) {
            // Hide all tab contents
            tabContents.forEach(content => content.classList.add('hidden'));

            // Remove active styling
            tabs.forEach(tab => tab.classList.remove('bg-blue-100', 'text-blue-700'));

            // Show selected tab content
            const selectedContent = document.getElementById(tabIds[index]);
            if (selectedContent) {
                selectedContent.classList.remove('hidden');
            }

            // Add active styling to clicked tab
            if (tabs[index]) {
                tabs[index].classList.add('bg-blue-100', 'text-blue-700');
            }

            currentTab = index;

            // Show/hide navigation buttons
            prevBtn.classList.toggle('invisible', currentTab === 0);
            nextBtn.classList.toggle('hidden', currentTab === tabs.length - 1);
            submitBtn.classList.toggle('hidden', currentTab !== tabs.length - 1);
        }

        // Tab click binding
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => switchTab(index));
        });

        // Next/Prev button click
        nextBtn?.addEventListener('click', () => {
            if (currentTab < tabs.length - 1) {
                switchTab(currentTab + 1);
            }
        });

        prevBtn?.addEventListener('click', () => {
            if (currentTab > 0) {
                switchTab(currentTab - 1);
            }
        });

        // Add Address
        addAddressBtn?.addEventListener('click', () => {
            const addressContainer = document.querySelector('.address-container');
            const addressCount = addressContainer.children.length + 1;

            const newAddress = document.createElement('div');
            newAddress.className = 'address-card bg-gray-50 p-4 rounded-lg border border-gray-200';
            newAddress.innerHTML = `
      <div class="flex justify-between items-start mb-4">
        <h4 class="font-medium text-gray-700">Address #${addressCount}</h4>
        <div class="flex items-center space-x-3">
          <div class="flex items-center">
            <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" id="default${addressCount}" name="default_address">
            <label for="default${addressCount}" class="ml-2 text-sm text-gray-700">Set as Default</label>
          </div>
          <button type="button" class="text-red-500 hover:text-red-700 delete-btn">
            <i class="fas fa-trash"></i>
          </button>
        </div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div><label class="block text-sm text-gray-600 mb-1">House/Flat Number</label><input type="text" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></div>
        <div><label class="block text-sm text-gray-600 mb-1">Address Line 1</label><input type="text" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></div>
        <div><label class="block text-sm text-gray-600 mb-1">Landmark (Optional)</label><input type="text" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></div>
        <div><label class="block text-sm text-gray-600 mb-1">City</label><input type="text" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></div>
        <div><label class="block text-sm text-gray-600 mb-1">State</label><input type="text" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></div>
        <div><label class="block text-sm text-gray-600 mb-1">Pincode</label><input type="text" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></div>
        <div><label class="block text-sm text-gray-600 mb-1">Address Label</label>
          <select class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            <option>Home</option><option>Work</option><option>Other</option>
          </select>
        </div>
      </div>
    `;
            addressContainer.appendChild(newAddress);

            // Bind delete
            newAddress.querySelector('.delete-btn').addEventListener('click', () => {
                newAddress.remove();
            });
        });

        // Form submit
        submitBtn?.addEventListener('click', () => {
            alert('Service provider registration submitted successfully!');
        });

        // Run init
        initTabs();
    </script>

</body>

</html>