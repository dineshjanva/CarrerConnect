<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Details</title>
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
    <!-- Demo Navigation Bar -->
    <div class="flex items-center justify-between px-6 py-4 bg-white shadow-sm">
        <h2 class="text-xl font-bold text-gray-800">Coupon Management System</h2>
        <button id="showPopupBtn" class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            <i class="fas fa-eye mr-2"></i>View Category
        </button>
    </div>
    
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Categories</h1>
            <p class="text-gray-600 mb-6">Click the "View Category" button above to see category details</p>
            
            <!-- Category Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-3">
                        <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-utensils text-indigo-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800">Food & Dining</h3>
                    </div>
                    <p class="text-gray-600 text-sm mb-3">Restaurants, cafes, and food delivery</p>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">12 coupons</span>
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Active</span>
                    </div>
                </div>
                
                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-shopping-bag text-purple-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800">Retail</h3>
                    </div>
                    <p class="text-gray-600 text-sm mb-3">Clothing, electronics, home goods</p>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">18 coupons</span>
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Active</span>
                    </div>
                </div>
                
                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-plane text-blue-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800">Travel</h3>
                    </div>
                    <p class="text-gray-600 text-sm mb-3">Hotels, flights, car rentals</p>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">7 coupons</span>
                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Limited</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- View Category Popup -->
    <div id="viewCategoryPopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <!-- Popup Header -->
            <div class="flex justify-between items-center p-6 border-b">
                <div>
                    <h2 class="text-xl font-bold text-gray-800 flex items-center">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-utensils text-indigo-600 text-xl"></i>
                        </div>
                        Food & Dining
                    </h2>
                    <p class="text-gray-600 mt-1">Restaurants, cafes, and food delivery</p>
                </div>
                <button id="closePopupBtn" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            
            <!-- Popup Body -->
            <div class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-ticket-alt text-indigo-600"></i>
                            </div>
                            <div>
                                <p class="text-gray-600">Total Coupons</p>
                                <h3 class="text-xl font-bold text-gray-800">12</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-check-circle text-green-600"></i>
                            </div>
                            <div>
                                <p class="text-gray-600">Active Coupons</p>
                                <h3 class="text-xl font-bold text-gray-800">10</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-users text-yellow-600"></i>
                            </div>
                            <div>
                                <p class="text-gray-600">Total Redeemed</p>
                                <h3 class="text-xl font-bold text-gray-800">1,284</h3>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Details Section -->
                <div class="bg-white rounded-lg border p-6 mb-6">
                    <h3 class="text-lg font-medium text-gray-800 mb-4">Category Details</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <div class="flex items-center">
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Active</span>
                                <span class="ml-2 text-sm text-gray-600">Since Jan 12, 2023</span>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Visibility</label>
                            <div class="flex items-center">
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Public</span>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Created On</label>
                            <p class="text-gray-900">Jan 12, 2023</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Updated</label>
                            <p class="text-gray-900">Mar 23, 2023</p>
                        </div>
                        
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <p class="text-gray-600">This category contains coupons for restaurants, cafes, food delivery services, and grocery stores. It's one of our most popular categories with high redemption rates.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Coupons Section -->
                <div class="bg-white rounded-lg border p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-800">Coupons in this Category</h3>
                        <span class="text-sm text-gray-600">12 coupons</span>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- Coupon 1 -->
                        <div class="flex items-center p-3 border rounded-lg hover:bg-gray-50">
                            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-tag text-indigo-600"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-800">SUMMER25</h4>
                                <p class="text-gray-600 text-sm">25% off on all dining orders</p>
                            </div>
                            <div class="text-right">
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Active</span>
                                <p class="text-gray-600 text-sm mt-1">128 redeemed</p>
                            </div>
                        </div>
                        
                        <!-- Coupon 2 -->
                        <div class="flex items-center p-3 border rounded-lg hover:bg-gray-50">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-tag text-green-600"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-800">FREEDELIVERY</h4>
                                <p class="text-gray-600 text-sm">Free delivery on orders over $30</p>
                            </div>
                            <div class="text-right">
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Active</span>
                                <p class="text-gray-600 text-sm mt-1">89 redeemed</p>
                            </div>
                        </div>
                        
                        <!-- Coupon 3 -->
                        <div class="flex items-center p-3 border rounded-lg hover:bg-gray-50">
                            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-tag text-yellow-600"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-800">COFFEE10</h4>
                                <p class="text-gray-600 text-sm">$10 off coffee subscriptions</p>
                            </div>
                            <div class="text-right">
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Limited</span>
                                <p class="text-gray-600 text-sm mt-1">42 redeemed</p>
                            </div>
                        </div>
                    </div>
                    
                    <button class="w-full mt-4 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-plus mr-2"></i>
                        View All Coupons
                    </button>
                </div>
            </div>
            
            <!-- Popup Footer -->
            <div class="p-6 border-t flex justify-end space-x-3">
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Category
                </button>
                <button id="closePopupBtn2" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                    Close
                </button>
            </div>
        </div>
    </div>

    <script>
        // Popup control logic
        const popup = document.getElementById('viewCategoryPopup');
        const showBtn = document.getElementById('showPopupBtn');
        const closeBtns = document.querySelectorAll('#closePopupBtn, #closePopupBtn2');
        
        // Show popup
        showBtn.addEventListener('click', () => {
            popup.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        });
        
        // Close popup
        closeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                popup.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            });
        });
        
        // Close popup when clicking outside content
        popup.addEventListener('click', (e) => {
            if (e.target === popup) {
                popup.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });
        
        // Close popup with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !popup.classList.contains('hidden')) {
                popup.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });
    </script>
</body>
</html>