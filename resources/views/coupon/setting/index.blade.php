<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Settings</title>
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
                                <a href="#"
                                    class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg sidebar-link">
                                    <i class="fas fa-chart-simple mr-3"></i>
                                    <span>Overview</span>
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="#"
                                    class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg sidebar-link">
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
                                <a href="#"
                                    class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg sidebar-link">
                                    <i class="fas fa-shopping-bag mr-3"></i>
                                    <span>Orders</span>
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="#"
                                    class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg sidebar-link">
                                    <i class="fas fa-tag mr-3"></i>
                                    <span>Coupons</span>
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="#"
                                    class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg sidebar-link">
                                    <i class="fas fa-gift mr-3"></i>
                                    <span>Promotions</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Other Links -->
                <div class="mt-4">
                    <a href="#"
                        class="flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg sidebar-link">
                        <i class="fas fa-users mr-3"></i>
                        <span>Customers</span>
                    </a>
                    <a href="#"
                        class="flex items-center px-4 py-2 text-white bg-indigo-600 rounded-lg sidebar-link active">
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
                    <span class="text-gray-800 font-medium">Settings</span>
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
                    <!-- Header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">System Settings</h1>
                            <p class="text-gray-600 mt-1">Configure your platform settings</p>
                        </div>
                        <button
                            class="mt-4 md:mt-0 px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition flex items-center">
                            <i class="fas fa-save mr-2"></i>
                            Save All Settings
                        </button>
                    </div>

                    <!-- Tabs Navigation -->
                    <div class="bg-white rounded-xl shadow-sm mb-6">
                        <div class="border-b border-gray-200">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                                <li class="mr-2">
                                    <button data-tab="all"
                                        class="tab-button active inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 text-indigo-600 border-indigo-600">All
                                        Settings</button>
                                </li>
                                <li class="mr-2">
                                    <button data-tab="website"
                                        class="tab-button inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300">Website</button>
                                </li>
                                <li class="mr-2">
                                    <button data-tab="firebase"
                                        class="tab-button inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300">Firebase</button>
                                </li>
                                <li class="mr-2">
                                    <button data-tab="payment"
                                        class="tab-button inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300">Payment
                                        Gateway</button>
                                </li>
                                <li class="mr-2">
                                    <button data-tab="sms"
                                        class="tab-button inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300">SMS</button>
                                </li>
                                <li class="mr-2">
                                    <button data-tab="config"
                                        class="tab-button inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300">Config</button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <!-- All Settings Tab -->
                        <div id="all-tab" class="tab-pane active">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Website Settings -->
                                <div class="bg-white rounded-xl shadow-sm p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-medium text-gray-800 flex items-center">
                                            <i class="fas fa-globe mr-2 text-indigo-600"></i>
                                            Website Settings
                                        </h3>
                                        <span
                                            class="px-2 py-1 bg-indigo-100 text-indigo-800 rounded-full text-xs">Active</span>
                                    </div>

                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Site
                                                Title</label>
                                            <input type="text"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                value="CouponHub">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Site
                                                Description</label>
                                            <textarea
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                rows="2">Your premier coupon management system</textarea>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
                                            <div class="flex items-center space-x-4">
                                                <div
                                                    class="w-16 h-16 bg-indigo-100 rounded-lg flex items-center justify-center">
                                                    <i class="fas fa-image text-indigo-600 text-xl"></i>
                                                </div>
                                                <button
                                                    class="px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                                                    Upload New Logo
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Firebase Settings -->
                                <div class="bg-white rounded-xl shadow-sm p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-medium text-gray-800 flex items-center">
                                            <i class="fas fa-database mr-2 text-green-600"></i>
                                            Firebase Settings
                                        </h3>
                                        <span
                                            class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Connected</span>
                                    </div>

                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">API Key</label>
                                            <input type="password"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                value="AIzaSyDexampleKey123">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Project
                                                ID</label>
                                            <input type="text"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                value="couponhub-12345">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Database
                                                URL</label>
                                            <input type="text"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                value="https://couponhub.firebaseio.com">
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment Gateway Settings -->
                                <div class="bg-white rounded-xl shadow-sm p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-medium text-gray-800 flex items-center">
                                            <i class="fas fa-credit-card mr-2 text-blue-600"></i>
                                            Payment Gateway
                                        </h3>
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Test
                                            Mode</span>
                                    </div>

                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Gateway
                                                Provider</label>
                                            <select
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                <option>Stripe</option>
                                                <option selected>PayPal</option>
                                                <option>Braintree</option>
                                                <option>Authorize.net</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">API Key</label>
                                            <input type="password"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                value="pk_test_example123">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">API
                                                Secret</label>
                                            <input type="password"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                value="sk_test_example456">
                                        </div>
                                    </div>
                                </div>

                                <!-- SMS Settings -->
                                <div class="bg-white rounded-xl shadow-sm p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-medium text-gray-800 flex items-center">
                                            <i class="fas fa-sms mr-2 text-purple-600"></i>
                                            SMS Settings
                                        </h3>
                                        <span
                                            class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Active</span>
                                    </div>

                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Provider</label>
                                            <select
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                <option>Twilio</option>
                                                <option selected>Nexmo</option>
                                                <option>Plivo</option>
                                                <option>MessageBird</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">API Key</label>
                                            <input type="password"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                value="nexmo_api_key_123">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">API
                                                Secret</label>
                                            <input type="password"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                value="nexmo_secret_456">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Sender
                                                ID</label>
                                            <input type="text"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                value="COUPONHUB">
                                        </div>
                                    </div>
                                </div>

                                <!-- Config Settings -->
                                <div class="bg-white rounded-xl shadow-sm p-6 col-span-1 md:col-span-2">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-medium text-gray-800 flex items-center">
                                            <i class="fas fa-sliders-h mr-2 text-gray-600"></i>
                                            Config Settings
                                        </h3>
                                        <span
                                            class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs">Advanced</span>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Timezone</label>
                                            <select
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                <option>(UTC-12:00) International Date Line West</option>
                                                <option>(UTC-11:00) Midway Island, Samoa</option>
                                                <option>(UTC-10:00) Hawaii</option>
                                                <option selected>(UTC-08:00) Pacific Time (US & Canada)</option>
                                                <option>(UTC-07:00) Mountain Time (US & Canada)</option>
                                                <option>(UTC-06:00) Central Time (US & Canada)</option>
                                                <option>(UTC-05:00) Eastern Time (US & Canada)</option>
                                                <option>(UTC+00:00) Dublin, Edinburgh, Lisbon, London</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Date
                                                Format</label>
                                            <select
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                <option>MM/DD/YYYY</option>
                                                <option selected>DD/MM/YYYY</option>
                                                <option>YYYY-MM-DD</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Currency</label>
                                            <select
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                <option>USD ($)</option>
                                                <option>EUR (€)</option>
                                                <option>GBP (£)</option>
                                                <option selected>CAD (C$)</option>
                                                <option>AUD (A$)</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Language</label>
                                            <select
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                <option selected>English</option>
                                                <option>French</option>
                                                <option>Spanish</option>
                                                <option>German</option>
                                                <option>Chinese</option>
                                            </select>
                                        </div>

                                        <div class="md:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Maintenance
                                                Mode</label>
                                            <div class="flex items-center">
                                                <label class="inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" class="sr-only peer">
                                                    <div
                                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600">
                                                    </div>
                                                    <span class="ms-3 text-sm font-medium text-gray-700">Enable
                                                        maintenance mode</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Website Settings Tab -->
                        <div id="website-tab" class="tab-pane">
                            <div class="bg-white rounded-xl shadow-sm p-6">
                                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                                    <i class="fas fa-globe mr-2 text-indigo-600"></i>
                                    Website Settings
                                </h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Site Title</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            value="CouponHub">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Site Tagline</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            value="Your premier coupon management system">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Admin Email</label>
                                        <input type="email"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            value="admin@couponhub.com">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Contact
                                            Email</label>
                                        <input type="email"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            value="contact@couponhub.com">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
                                        <div class="flex items-center space-x-4 mt-1">
                                            <div
                                                class="w-16 h-16 bg-indigo-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-image text-indigo-600 text-xl"></i>
                                            </div>
                                            <div>
                                                <button
                                                    class="px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 mb-2">
                                                    Upload New Logo
                                                </button>
                                                <p class="text-xs text-gray-500">Recommended size: 200x200px</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Favicon</label>
                                        <div class="flex items-center space-x-4 mt-1">
                                            <div
                                                class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-icons text-indigo-600"></i>
                                            </div>
                                            <div>
                                                <button
                                                    class="px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 mb-2">
                                                    Upload Favicon
                                                </button>
                                                <p class="text-xs text-gray-500">Recommended size: 32x32px</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Footer Text</label>
                                        <textarea
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            rows="3">© 2023 CouponHub. All rights reserved.</textarea>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Google Analytics
                                            Code</label>
                                        <textarea
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 font-mono text-sm"
                                            rows="4"><script>
                                                // Your Google Analytics code here
                                            </script></textarea>
                                    </div>
                                </div>

                                <div class="mt-6 pt-4 border-t border-gray-200">
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">Social Media Links</h3>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fab fa-facebook-f text-blue-600"></i>
                                            </div>
                                            <input type="text"
                                                class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                placeholder="Facebook URL">
                                        </div>

                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 bg-blue-400 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fab fa-twitter text-white"></i>
                                            </div>
                                            <input type="text"
                                                class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                placeholder="Twitter URL">
                                        </div>

                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 bg-pink-600 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fab fa-instagram text-white"></i>
                                            </div>
                                            <input type="text"
                                                class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                placeholder="Instagram URL">
                                        </div>

                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fab fa-youtube text-white"></i>
                                            </div>
                                            <input type="text"
                                                class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                placeholder="YouTube URL">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Firebase Settings Tab -->
                        <div id="firebase-tab" class="tab-pane">
                            <div class="bg-white rounded-xl shadow-sm p-6">
                                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                                    <i class="fas fa-database mr-2 text-green-600"></i>
                                    Firebase Settings
                                </h2>

                                <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-green-800">Firebase is connected</h3>
                                            <div class="mt-2 text-sm text-green-700">
                                                <p>Your Firebase services are working properly. Last sync: 5 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">API Key</label>
                                        <input type="password"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            value="AIzaSyDexampleKey123">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Auth Domain</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            value="couponhub.firebaseapp.com">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Project ID</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            value="couponhub-12345">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Storage
                                            Bucket</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            value="couponhub.appspot.com">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Messaging Sender
                                            ID</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            value="1234567890">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">App ID</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            value="1:1234567890:web:example123">
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Database URL</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            value="https://couponhub.firebaseio.com">
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Service Account
                                            JSON</label>
                                        <div class="flex items-center">
                                            <input type="text"
                                                class="flex-1 px-3 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                placeholder="serviceAccountKey.json" disabled>
                                            <button
                                                class="px-4 py-2 bg-indigo-600 text-white rounded-r-lg hover:bg-indigo-700">
                                                Upload
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-8 pt-6 border-t border-gray-200">
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">Firebase Services</h3>

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fas fa-database text-blue-600"></i>
                                                </div>
                                                <div>
                                                    <h4 class="font-medium text-gray-800">Firestore</h4>
                                                    <p class="text-sm text-gray-600">Database service</p>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <label class="inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" class="sr-only peer" checked>
                                                    <div
                                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                                                    </div>
                                                    <span class="ms-3 text-sm font-medium text-gray-700">Enabled</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fas fa-bell text-green-600"></i>
                                                </div>
                                                <div>
                                                    <h4 class="font-medium text-gray-800">Cloud Messaging</h4>
                                                    <p class="text-sm text-gray-600">Push notifications</p>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <label class="inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" class="sr-only peer" checked>
                                                    <div
                                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                                                    </div>
                                                    <span class="ms-3 text-sm font-medium text-gray-700">Enabled</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fas fa-hdd text-yellow-600"></i>
                                                </div>
                                                <div>
                                                    <h4 class="font-medium text-gray-800">Storage</h4>
                                                    <p class="text-sm text-gray-600">File storage</p>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <label class="inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" class="sr-only peer" checked>
                                                    <div
                                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                                                    </div>
                                                    <span class="ms-3 text-sm font-medium text-gray-700">Enabled</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Gateway Tab -->
                        <div id="payment-tab" class="tab-pane">

                            <div class="bg-white rounded-xl shadow-sm p-6">
                                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                                    <i class="fas fa-credit-card mr-2 text-blue-600"></i>
                                    Payment Gateway Settings
                                </h2>

                                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-exclamation-triangle text-yellow-600 text-xl"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-yellow-800">Test mode is active</h3>
                                            <div class="mt-2 text-sm text-yellow-700">
                                                <p>All transactions are processed in test mode. No real money will be
                                                    transferred.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <!-- Payment Method Tabs -->

                                <div
                                    class="paymentlink grid grid-cols-1 md:grid-cols-4 gap-8 p-6 bg-white rounded-lg shadow-md">

                                    <!-- Left Sidebar (Payment Tabs) -->
                                    <div class="md:col-span-1 border-r border-gray-200">
                                        <ul class="flex flex-col text-sm font-medium space-y-2">
                                            <li>
                                                <button data-method="paypal"
                                                    class="method-tab active w-full text-left px-4 py-2 rounded-md bg-indigo-100 text-indigo-700 hover:bg-indigo-200 transition">PayPal</button>
                                            </li>
                                            <li>
                                                <button data-method="cards"
                                                    class="method-tab w-full text-left px-4 py-2 rounded-md hover:bg-gray-100 transition">Credit/Debit
                                                    Cards</button>
                                            </li>
                                            <li>
                                                <button data-method="wallets"
                                                    class="method-tab w-full text-left px-4 py-2 rounded-md hover:bg-gray-100 transition">Digital
                                                    Wallets</button>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Right Content -->
                                    <div class="md:col-span-3">
                                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Payment Methods</h3>

                                        <!-- Tabs Navigation (Optional: hide if using left side tabs only) -->
                                        <div class="hidden">
                                            <!-- Your original horizontal tabs here if you want to retain -->
                                        </div>

                                        <!-- Tab Content -->
                                        <div class="method-content space-y-10">

                                            <!-- PayPal Settings -->
                                            <div id="paypal-content" class="method-pane active space-y-6">
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">PayPal
                                                            Client ID</label>
                                                        <input type="text"
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                                            value="AeA6Q8l9XeZ...">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">PayPal
                                                            Secret</label>
                                                        <input type="password"
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                                            value="••••••••••••••••">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Environment</label>
                                                        <select
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                                                            <option selected>Sandbox</option>
                                                            <option>Live</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Payment
                                                            Action</label>
                                                        <select
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                                                            <option selected>Sale</option>
                                                            <option>Authorization</option>
                                                            <option>Order</option>
                                                        </select>
                                                    </div>
                                                    <div class="md:col-span-2">
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Webhook
                                                            ID</label>
                                                        <input type="text"
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                                            value="70R03927KM915344D">
                                                    </div>
                                                </div>

                                                <!-- Notes -->
                                                <div class="p-4 bg-blue-50 rounded-lg border border-blue-100">
                                                    <h4 class="font-medium text-blue-800 mb-2 flex items-center">
                                                        <i class="fas fa-info-circle mr-2"></i> PayPal Configuration
                                                        Notes
                                                    </h4>
                                                    <ul class="text-sm text-blue-700 list-disc pl-5 space-y-1">
                                                        <li>Ensure your PayPal account has been verified</li>
                                                        <li>Webhooks must be configured in your PayPal developer
                                                            dashboard</li>
                                                        <li>Test transactions won't transfer real money</li>
                                                        <li>Enable IPN (Instant Payment Notification) for better
                                                            tracking</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <!-- Credit/Debit Cards & Wallets content keep as-is with consistent spacing and grid -->
                                            <div id="cards-content" class="method-pane hidden">
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Processor</label>
                                                        <select
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                            <option>Stripe</option>
                                                            <option selected>Braintree</option>
                                                            <option>Authorize.net</option>
                                                            <option>Adyen</option>
                                                        </select>
                                                    </div>

                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Merchant
                                                            ID</label>
                                                        <input type="text"
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                            value="merchant_id_123456">
                                                    </div>

                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Public
                                                            Key</label>
                                                        <input type="text"
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                            value="public_key_abcdef">
                                                    </div>

                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Private
                                                            Key</label>
                                                        <input type="password"
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                            value="••••••••••••••••">
                                                    </div>

                                                    <div class="md:col-span-2">
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Accepted
                                                            Card Types</label>
                                                        <div
                                                            class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3 mt-2">
                                                            <label class="flex items-center">
                                                                <input type="checkbox"
                                                                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                                                    checked>
                                                                <span class="ml-2 text-gray-700">Visa</span>
                                                            </label>
                                                            <label class="flex items-center">
                                                                <input type="checkbox"
                                                                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                                                    checked>
                                                                <span class="ml-2 text-gray-700">Mastercard</span>
                                                            </label>
                                                            <label class="flex items-center">
                                                                <input type="checkbox"
                                                                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                <span class="ml-2 text-gray-700">American Express</span>
                                                            </label>
                                                            <label class="flex items-center">
                                                                <input type="checkbox"
                                                                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                <span class="ml-2 text-gray-700">Discover</span>
                                                            </label>
                                                            <label class="flex items-center">
                                                                <input type="checkbox"
                                                                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                                                    checked>
                                                                <span class="ml-2 text-gray-700">JCB</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-6 p-4 bg-green-50 rounded-lg border border-green-100">
                                                    <h4 class="font-medium text-green-800 mb-2 flex items-center">
                                                        <i class="fas fa-shield-alt mr-2"></i>
                                                        Security Recommendations
                                                    </h4>
                                                    <ul class="text-sm text-green-700 list-disc pl-5 space-y-1">
                                                        <li>Enable 3D Secure for additional fraud protection</li>
                                                        <li>Regularly update your PCI compliance status</li>
                                                        <li>Use tokenization to avoid storing raw card data</li>
                                                        <li>Set up fraud detection rules in your processor dashboard
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Just wrap each section in: -->
                                            <!-- Digital Wallets Settings -->
                                            <div id="wallets-content" class="method-pane hidden">
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Apple
                                                            Pay
                                                            Merchant ID</label>
                                                        <input type="text"
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                            value="merchant.com.example">
                                                    </div>

                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Google
                                                            Pay
                                                            Merchant ID</label>
                                                        <input type="text"
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                            value="google_merchant_id_987654">
                                                    </div>

                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Apple
                                                            Pay
                                                            Certificate</label>
                                                        <div class="flex items-center mt-1">
                                                            <input type="text"
                                                                class="flex-1 px-3 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                                placeholder="No file selected" disabled>
                                                            <button
                                                                class="px-4 py-2 bg-indigo-600 text-white rounded-r-lg hover:bg-indigo-700">
                                                                Upload
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Google
                                                            Pay
                                                            Service Account</label>
                                                        <div class="flex items-center mt-1">
                                                            <input type="text"
                                                                class="flex-1 px-3 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                                placeholder="No file selected" disabled>
                                                            <button
                                                                class="px-4 py-2 bg-indigo-600 text-white rounded-r-lg hover:bg-indigo-700">
                                                                Upload
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-2">
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Supported
                                                            Wallets</label>
                                                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 mt-2">
                                                            <label class="flex items-center">
                                                                <input type="checkbox"
                                                                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                                                    checked>
                                                                <span class="ml-2 text-gray-700">Apple Pay</span>
                                                            </label>
                                                            <label class="flex items-center">
                                                                <input type="checkbox"
                                                                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                                                    checked>
                                                                <span class="ml-2 text-gray-700">Google Pay</span>
                                                            </label>
                                                            <label class="flex items-center">
                                                                <input type="checkbox"
                                                                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                                <span class="ml-2 text-gray-700">Samsung Pay</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-6 p-4 bg-purple-50 rounded-lg border border-purple-100">
                                                    <h4 class="font-medium text-purple-800 mb-2 flex items-center">
                                                        <i class="fas fa-mobile-alt mr-2"></i>
                                                        Mobile Integration
                                                    </h4>
                                                    <ul class="text-sm text-purple-700 list-disc pl-5 space-y-1">
                                                        <li>Ensure your domain is registered with Apple Pay</li>
                                                        <li>Google Pay requires SSL certificate on your domain</li>
                                                        <li>Test wallet payments on both iOS and Android devices</li>
                                                        <li>Provide clear wallet payment instructions at checkout</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- <div id="cards-content" class="method-pane hidden space-y-6"> ... </div> -->
                                            <!-- <div id="wallets-content" class="method-pane hidden space-y-6"> ... </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <!-- Status Cards -->
                            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-gray-50 p-4 rounded-lg border">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fab fa-cc-visa text-blue-900"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">Credit/Debit Cards</h4>
                                            <p class="text-sm text-gray-600">Visa, Mastercard, etc.</p>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div
                                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                                            </div>
                                            <span class="ms-3 text-sm font-medium text-gray-700">Enabled</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="bg-gray-50 p-4 rounded-lg border">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fab fa-paypal text-blue-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">PayPal</h4>
                                            <p class="text-sm text-gray-600">PayPal payments</p>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div
                                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                                            </div>
                                            <span class="ms-3 text-sm font-medium text-gray-700">Enabled</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="bg-gray-50 p-4 rounded-lg border">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-wallet text-purple-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">Digital Wallets</h4>
                                            <p class="text-sm text-gray-600">Apple Pay, Google Pay</p>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer">
                                            <div
                                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                                            </div>
                                            <span class="ms-3 text-sm font-medium text-gray-700">Disabled</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- SMS Settings Tab -->
                        <div id="sms-tab" class="tab-pane">
                            <div class="bg-white rounded-xl shadow-sm p-6">
                                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                                    <i class="fas fa-sms mr-2 text-purple-600"></i>
                                    SMS Settings
                                </h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">SMS
                                            Provider</label>
                                        <select
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option>Twilio</option>
                                            <option selected>Nexmo</option>
                                            <option>Plivo</option>
                                            <option>MessageBird</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Account
                                            Status</label>
                                        <div class="flex items-center">
                                            <span
                                                class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Active</span>
                                            <span class="ml-2 text-sm text-gray-600">Balance: $42.50</span>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">API Key</label>
                                        <input type="password"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            value="nexmo_api_key_123">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">API
                                            Secret</label>
                                        <input type="password"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            value="nexmo_secret_456">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Sender
                                            ID</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            value="COUPONHUB">
                                        <p class="text-xs text-gray-500 mt-1">Name or number messages are sent from
                                        </p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Default
                                            Region</label>
                                        <select
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option>United States (+1)</option>
                                            <option selected>Canada (+1)</option>
                                            <option>United Kingdom (+44)</option>
                                            <option>Australia (+61)</option>
                                        </select>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">SMS Webhook
                                            URL</label>
                                        <div class="flex items-center">
                                            <input type="text"
                                                class="flex-1 px-3 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                value="https://couponhub.com/api/webhooks/sms">
                                            <button
                                                class="px-4 py-2 bg-indigo-600 text-white rounded-r-lg hover:bg-indigo-700">
                                                Copy
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-8 pt-6 border-t border-gray-200">
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">SMS Templates</h3>

                                    <div class="overflow-hidden rounded-lg border border-gray-200">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Template</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Content</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        Welcome Message</td>
                                                    <td class="px-6 py-4 text-sm text-gray-500">Welcome to
                                                        CouponHub! Use code WELCOME10 for $10 off your first order.
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        Order Confirmation</td>
                                                    <td class="px-6 py-4 text-sm text-gray-500">Your order # has
                                                        been confirmed. We'll notify you when it ships.</td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        Password Reset</td>
                                                    <td class="px-6 py-4 text-sm text-gray-500">Your password reset
                                                        code is: . It expires in 10 minutes.</td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <button
                                        class="mt-4 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 flex items-center">
                                        <i class="fas fa-plus mr-2"></i>
                                        Add New Template
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Config Settings Tab -->
                        <div id="config-tab" class="tab-pane">
                            <div class="bg-white rounded-xl shadow-sm p-6">
                                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                                    <i class="fas fa-sliders-h mr-2 text-gray-600"></i>
                                    Advanced Configuration
                                </h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Timezone</label>
                                        <select
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option>(UTC-12:00) International Date Line West</option>
                                            <option>(UTC-11:00) Midway Island, Samoa</option>
                                            <option>(UTC-10:00) Hawaii</option>
                                            <option selected>(UTC-08:00) Pacific Time (US & Canada)</option>
                                            <option>(UTC-07:00) Mountain Time (US & Canada)</option>
                                            <option>(UTC-06:00) Central Time (US & Canada)</option>
                                            <option>(UTC-05:00) Eastern Time (US & Canada)</option>
                                            <option>(UTC+00:00) Dublin, Edinburgh, Lisbon, London</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Date
                                            Format</label>
                                        <select
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option>MM/DD/YYYY</option>
                                            <option selected>DD/MM/YYYY</option>
                                            <option>YYYY-MM-DD</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Time
                                            Format</label>
                                        <select
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option selected>12-hour (3:45 PM)</option>
                                            <option>24-hour (15:45)</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Currency</label>
                                        <select
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option>USD ($)</option>
                                            <option>EUR (€)</option>
                                            <option>GBP (£)</option>
                                            <option selected>CAD (C$)</option>
                                            <option>AUD (A$)</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Language</label>
                                        <select
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option selected>English</option>
                                            <option>French</option>
                                            <option>Spanish</option>
                                            <option>German</option>
                                            <option>Chinese</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Default Items
                                            Per Page</label>
                                        <select
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option>10</option>
                                            <option selected>25</option>
                                            <option>50</option>
                                            <option>100</option>
                                        </select>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Maintenance
                                            Mode</label>
                                        <div class="flex items-center">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer">
                                                <div
                                                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600">
                                                </div>
                                                <span class="ms-3 text-sm font-medium text-gray-700">Enable
                                                    maintenance mode</span>
                                            </label>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">When enabled, only administrators can
                                            access the site</p>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Custom
                                            CSS</label>
                                        <textarea
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 font-mono text-sm"
                                            rows="6">/* Add your custom CSS here */
body {
  font-family: 'Inter', sans-serif;
}

.btn-primary {
  background-color: #4f46e5;
  color: white;
  border-radius: 0.5rem;
  padding: 0.5rem 1rem;
}</textarea>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Custom
                                            JavaScript</label>
                                        <textarea
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 font-mono text-sm"
                                            rows="6">// Add your custom JavaScript here
document.addEventListener('DOMContentLoaded', function() {
  console.log('CouponHub admin loaded');
  
  // Example: Add analytics tracking
  // trackAdminPageView();
});</textarea>
                                    </div>
                                </div>

                                <div class="mt-8 pt-6 border-t border-gray-200">
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">System Information</h3>

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fas fa-server text-blue-600"></i>
                                                </div>
                                                <div>
                                                    <h4 class="font-medium text-gray-800">Server</h4>
                                                    <p class="text-sm text-gray-600">Apache/2.4.52 (Ubuntu)</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fab fa-php text-green-600"></i>
                                                </div>
                                                <div>
                                                    <h4 class="font-medium text-gray-800">PHP</h4>
                                                    <p class="text-sm text-gray-600">8.1.2-1ubuntu2</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fab fa-laravel text-red-600"></i>
                                                </div>
                                                <div>
                                                    <h4 class="font-medium text-gray-800">Laravel</h4>
                                                    <p class="text-sm text-gray-600">v9.19.0</p>
                                                </div>
                                            </div>
                                        </div>
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

        // Tab functionality
        document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                document.querySelectorAll('.tab-button').forEach(btn => {
                    btn.classList.remove('active', 'text-indigo-600', 'border-indigo-600');
                    btn.classList.add('text-gray-500', 'border-transparent');
                });

                // Add active class to clicked button
                button.classList.add('active', 'text-indigo-600', 'border-indigo-600');
                button.classList.remove('text-gray-500', 'border-transparent');

                // Hide all tab content
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.remove('active');
                    pane.classList.add('hidden');
                });

                // Show selected tab content
                const tabId = button.getAttribute('data-tab') + '-tab';
                document.getElementById(tabId).classList.add('active');
                document.getElementById(tabId).classList.remove('hidden');
            });
        });

        // Save settings button
        const saveBtn = document.querySelector('button:contains("Save All Settings")');
        saveBtn.addEventListener('click', () => {
            const toast = document.createElement('div');
            toast.classList.add('fixed', 'top-4', 'right-4', 'px-4', 'py-3', 'rounded', 'bg-green-100', 'border', 'border-green-400', 'text-green-700', 'shadow-lg', 'z-50', 'transition-all', 'transform', 'translate-x-0');
            toast.innerHTML = `
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span>Settings saved successfully!</span>
                </div>
            `;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }, 3000);
        });
    </script>

    <script>
        // Payment method tab functionality
        document.querySelectorAll('.method-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs
                document.querySelectorAll('.method-tab').forEach(t => {
                    t.classList.remove('active', 'text-indigo-600', 'border-indigo-600');
                    t.classList.add('text-gray-500', 'border-transparent');
                });

                // Add active class to clicked tab
                tab.classList.add('active', 'text-indigo-600', 'border-indigo-600');
                tab.classList.remove('text-gray-500', 'border-transparent');

                // Hide all tab content
                document.querySelectorAll('.method-pane').forEach(pane => {
                    pane.classList.add('hidden');
                    pane.classList.remove('active');
                });

                // Show selected tab content
                const methodId = tab.getAttribute('data-method') + '-content';
                document.getElementById(methodId).classList.remove('hidden');
                document.getElementById(methodId).classList.add('active');
            });
        });

        // Copy Webhook URL functionality
        document.querySelector('.bg-indigo-600').addEventListener('click', () => {
            const urlInput = document.querySelector('input[value="https://couponhub.com/api/webhooks/payment"]');
            urlInput.select();
            document.execCommand('copy');

            // Show copied notification
            const originalText = document.querySelector('.bg-indigo-600').innerHTML;
            document.querySelector('.bg-indigo-600').innerHTML = '<i class="fas fa-check mr-1"></i> Copied!';

            setTimeout(() => {
                document.querySelector('.bg-indigo-600').innerHTML = originalText;
            }, 2000);
        });
    </script>
</body>

</html>