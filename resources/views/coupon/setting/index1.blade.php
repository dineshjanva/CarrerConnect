<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #818cf8;
            --primary-dark: #3730a3;
            --secondary: #f97316;
            --light-bg: #f8fafc;
            --dark-text: #1e293b;
            --light-text: #64748b;
        }

        body {
            background-color: #f1f5f9;
            font-family: 'Inter', sans-serif;
        }

        .ql-editor {
            min-height: 200px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background: white;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        .variant-combination {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            background-color: white;
            position: relative;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }

        .variant-combination:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-color: var(--primary-light);
        }

        .remove-combination {
            position: absolute;
            top: 1rem;
            right: 1rem;
            color: #ef4444;
            cursor: pointer;
            font-size: 1.25rem;
            font-weight: bold;
            transition: transform 0.2s;
        }

        .remove-combination:hover {
            transform: scale(1.2);
        }

        .combination-attribute {
            display: inline-flex;
            align-items: center;
            background-color: #e0e7ff;
            padding: 0.4rem 1rem;
            border-radius: 9999px;
            margin-right: 0.75rem;
            margin-bottom: 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--primary-dark);
        }

        .remove-attribute {
            margin-left: 0.5rem;
            color: var(--primary);
            cursor: pointer;
            font-weight: bold;
        }

        .image-preview {
            display: inline-block;
            margin-right: 10px;
            margin-bottom: 10px;
            position: relative;
            border-radius: 8px;
            overflow: hidden;
        }

        .remove-image {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ef4444;
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .attribute-select {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            background: var(--light-bg);
            border-bottom: 1px solid #e2e8f0;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            border-radius: 8px;
            padding: 0.625rem 1.25rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: white;
            color: var(--primary);
            border: 1px solid var(--primary);
            border-radius: 8px;
            padding: 0.625rem 1.25rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-secondary:hover {
            background: var(--primary-light);
            color: white;
        }

        .tabs .tab-button {
            transition: all 0.3s ease;
            position: relative;
        }

        .tabs .tab-button.active:after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--primary);
            border-radius: 3px 3px 0 0;
        }

        input,
        select,
        textarea {
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            padding: 0.75rem;
            transition: all 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-title {
            position: relative;
            padding-bottom: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--primary);
            border-radius: 3px;
        }

        .preview-image {
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }

        .preview-image img {
            transition: transform 0.3s ease;
        }

        .preview-image:hover img {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 border-r border-gray-200 bg-white">
                <div class="flex items-center h-16 px-4 border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="w-9 h-9 rounded-lg bg-indigo-600 flex items-center justify-center">
                            <i class="fas fa-box text-white text-lg"></i>
                        </div>
                        <h1 class="ml-3 text-lg font-semibold text-gray-800">Product Manager</h1>
                    </div>
                </div>
                <div class="flex flex-col flex-grow p-4 overflow-y-auto">
                    <nav class="flex-1 space-y-2">
                        <div>
                            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Products</h3>
                            <div class="mt-2 space-y-1">
                                <a href="#" class="flex items-center px-3 py-2.5 text-white bg-indigo-600 rounded-lg">
                                    <i class="fas fa-box-open mr-3"></i>
                                    <span>Product Management</span>
                                </a>
                                <a href="#"
                                    class="flex items-center px-3 py-2.5 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                                    <i class="fas fa-tags mr-3"></i>
                                    <span>Categories</span>
                                </a>
                                <a href="#"
                                    class="flex items-center px-3 py-2.5 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                                    <i class="fas fa-layer-group mr-3"></i>
                                    <span>Attributes</span>
                                </a>
                            </div>
                        </div>
                        <div>
                            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mt-6">Settings
                            </h3>
                            <div class="mt-2 space-y-1">
                                <a href="#"
                                    class="flex items-center px-3 py-2.5 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                                    <i class="fas fa-cog mr-3"></i>
                                    <span>General</span>
                                </a>
                                <a href="#"
                                    class="flex items-center px-3 py-2.5 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                                    <i class="fas fa-users mr-3"></i>
                                    <span>Users</span>
                                </a>
                            </div>
                        </div>
                    </nav>
                    <div class="mt-auto pt-4 border-t border-gray-200">
                        <div class="flex items-center px-3 py-2">
                            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                <span class="text-indigo-800 font-semibold">AD</span>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-800">Admin User</p>
                                <p class="text-xs text-gray-500">admin@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Navigation -->
            <header class="flex items-center justify-between px-6 py-4 bg-white shadow-sm">
                <div class="flex items-center">
                    <button class="p-2 text-gray-500 rounded-md md:hidden">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    <div class="ml-4 md:ml-0">
                        <span class="text-gray-800 font-medium">Product Details Management</span>
                        <p class="text-xs text-gray-500 mt-1">Add new product to your store</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <button class="relative p-2 text-gray-600 hover:bg-gray-100 rounded-full transition-colors">
                        <i class="fas fa-bell text-lg"></i>
                        <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 rounded-full"></span>
                    </button>
                    <button class="relative p-2 text-gray-600 hover:bg-gray-100 rounded-full transition-colors">
                        <i class="fas fa-question-circle text-lg"></i>
                    </button>
                    <button class="flex items-center text-sm text-gray-700">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-6">
                <div class="max-w-7xl mx-auto">
                    <!-- Header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Add New Product</h1>
                            <p class="text-gray-600 mt-1">Fill in all required details to create a new product</p>
                        </div>
                        <div class="mt-4 md:mt-0 flex space-x-3">
                            <button class="btn-secondary">
                                <i class="fas fa-eye mr-2"></i> Preview
                            </button>
                            <button class="btn-primary">
                                <i class="fas fa-save mr-2"></i> Save Product
                            </button>
                        </div>
                    </div>

                    <!-- Product Tabs -->
                    <div class="card mb-6">
                        <div class="card-header">
                            <ul class="flex flex-wrap tabs">
                                <li class="mr-2">
                                    <button data-tab="basic"
                                        class="tab-button active px-4 py-2 text-base font-medium text-indigo-600">
                                        <i class="fas fa-info-circle mr-2"></i>Basic Info
                                    </button>
                                </li>
                                <li class="mr-2">
                                    <button data-tab="inventory"
                                        class="tab-button px-4 py-2 text-base font-medium text-gray-600 hover:text-gray-800">
                                        <i class="fas fa-warehouse mr-2"></i>Inventory
                                    </button>
                                </li>
                                <li class="mr-2">
                                    <button data-tab="media"
                                        class="tab-button px-4 py-2 text-base font-medium text-gray-600 hover:text-gray-800">
                                        <i class="fas fa-images mr-2"></i>Media
                                    </button>
                                </li>
                                <li class="mr-2">
                                    <button data-tab="attributes"
                                        class="tab-button px-4 py-2 text-base font-medium text-gray-600 hover:text-gray-800">
                                        <i class="fas fa-tag mr-2"></i>Attributes
                                    </button>
                                </li>
                                <li class="mr-2">
                                    <button data-tab="variants"
                                        class="tab-button px-4 py-2 text-base font-medium text-gray-600 hover:text-gray-800">
                                        <i class="fas fa-code-branch mr-2"></i>Variants
                                    </button>
                                </li>
                                <li class="mr-2">
                                    <button data-tab="seo"
                                        class="tab-button px-4 py-2 text-base font-medium text-gray-600 hover:text-gray-800">
                                        <i class="fas fa-search mr-2"></i>SEO
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <!-- Tab Contents -->
                        <div class="p-6">
                            <!-- Basic Info Tab -->
                            <div id="basic-tab" class="tab-content active">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Product
                                            Name*</label>
                                        <input type="text"
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            placeholder="Enter product name">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">SKU*</label>
                                        <input type="text"
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            placeholder="Product SKU">
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Short
                                            Description</label>
                                        <textarea
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            rows="3" placeholder="Brief product description"></textarea>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Full
                                            Description</label>
                                        <div id="editor" style="height: 300px;"></div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Brand</label>
                                        <select
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option value="">Select Brand</option>
                                            <option>Nike</option>
                                            <option>Adidas</option>
                                            <option>Apple</option>
                                            <option>Samsung</option>
                                            <option>Sony</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 mb-2">Seller/Vendor</label>
                                        <select
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option value="">Select Seller</option>
                                            <option>Amazon</option>
                                            <option>Official Store</option>
                                            <option>Third Party Vendor</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Currency</label>
                                        <select
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option>USD ($)</option>
                                            <option>EUR (€)</option>
                                            <option>GBP (£)</option>
                                            <option selected>CAD (C$)</option>
                                            <option>AUD (A$)</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                        <select
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option selected>Active</option>
                                            <option>Draft</option>
                                            <option>Archived</option>
                                        </select>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                                        {{-- <input type="text"
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            placeholder="Add tags separated by commas"> --}}

                                        <div id="tagInputBox"
                                            class="flex flex-wrap items-center gap-2 border border-gray-300 rounded-lg px-3 py-2 focus-within:ring-2 focus-within:ring-indigo-500"
                                            onclick="document.getElementById('tagInput').focus()">

                                            <!-- Pills go here -->

                                            <input type="text" id="tagInput"
                                                class="flex-1 min-w-[120px] border-none outline-none py-1 bg-transparent"
                                                placeholder=" Type and press comma or enter" />
                                        </div>

                                        <!-- Optional: hidden input to send with form -->
                                        <input type="hidden" name="tags" id="tagsHiddenInput">

                                    </div>
                                    <script>
                                        const tagInput = document.getElementById('tagInput');
                                        const tagInputBox = document.getElementById('tagInputBox');
                                        const tagsHiddenInput = document.getElementById('tagsHiddenInput');

                                        let tags = [];

                                        function renderTags() {
                                            // Remove all existing pills
                                            tagInputBox.querySelectorAll('.tag-pill').forEach(pill => pill.remove());

                                            // Re-render all tags before input
                                            tags.forEach((tag, index) => {
                                                const pill = document.createElement('div');
                                                pill.className = 'tag-pill flex items-center bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm border-none';
                                                pill.innerHTML = `
                                                <span>${tag}</span>
                                                    <button type="button" class="ml-2 text-red-500 hover:text-red-700 focus:outline-none" data-index="${index}">&times;</button>`;

                                                // Insert before input field
                                                tagInputBox.insertBefore(pill, tagInput);
                                            });

                                            // Update hidden input value
                                            tagsHiddenInput.value = tags.join(',');

                                            // Set up remove event
                                            tagInputBox.querySelectorAll('button[data-index]').forEach(btn => {
                                                btn.addEventListener('click', () => {
                                                    const i = parseInt(btn.getAttribute('data-index'));
                                                    tags.splice(i, 1);
                                                    renderTags();
                                                });
                                            });
                                        }

                                        // Add tag on comma or Enter
                                        tagInput.addEventListener('keydown', e => {
                                            if (e.key === 'Enter' || e.key === ',') {
                                                e.preventDefault(); // Prevent new line or comma in input
                                                const value = tagInput.value.trim().replace(/,$/, '');
                                                if (value !== '' && !tags.includes(value)) {
                                                    tags.push(value);
                                                    tagInput.value = '';
                                                    renderTags();
                                                }
                                            } else if (e.key === 'Backspace' && tagInput.value === '') {
                                                // Remove last tag on backspace
                                                tags.pop();
                                                renderTags();
                                            }
                                        });
                                    </script>



                                    <div class="md:col-span-2">
                                        <div class="flex items-center space-x-6">
                                            <label class="flex items-center">
                                                <input type="checkbox"
                                                    class="h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                                <span class="ml-2 text-gray-700 font-medium">Featured Product</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox"
                                                    class="h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                                <span class="ml-2 text-gray-700 font-medium">Top Product</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox"
                                                    class="h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                                <span class="ml-2 text-gray-700 font-medium">New Arrival</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Inventory Tab -->
                            <div id="inventory-tab" class="tab-content">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Price*</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">$</span>
                                            </div>
                                            <input type="number" step="0.01"
                                                class="pl-10 w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                placeholder="0.00">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Compare at
                                            Price</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">$</span>
                                            </div>
                                            <input type="number" step="0.01"
                                                class="pl-10 w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                placeholder="0.00">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Cost per
                                            item</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">$</span>
                                            </div>
                                            <input type="number" step="0.01"
                                                class="pl-10 w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                placeholder="0.00">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Profit</label>
                                        <div class="px-4 py-2.5 bg-indigo-50 rounded-lg">
                                            <span class="text-indigo-700 font-medium">$0.00 (0%)</span>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Stock
                                            Quantity*</label>
                                        <input type="number"
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            placeholder="0">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Low Stock
                                            Threshold</label>
                                        <input type="number"
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            placeholder="0">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Barcode (ISBN, UPC,
                                            GTIN, etc.)</label>
                                        <input type="text"
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            placeholder="Barcode number">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Inventory
                                            Policy</label>
                                        <select
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option selected>Allow customers to purchase this product when it's out of
                                                stock</option>
                                            <option>Prevent customers from purchasing when this product is out of stock
                                            </option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Return
                                            Policy</label>
                                        <select
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option selected>Returns Accepted</option>
                                            <option>No Returns</option>
                                            <option>Exchange Only</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Warranty
                                            Period</label>
                                        <select
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option>No Warranty</option>
                                            <option selected>1 Year</option>
                                            <option>2 Years</option>
                                            <option>Lifetime</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Media Tab -->
                            <div id="media-tab" class="tab-content">
                                <div class="mb-6">
                                    <h3 class="text-lg font-medium text-gray-800 mb-3">Product Images</h3>
                                    <div
                                        class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center bg-gray-50">
                                        <div id="image-preview-container" class="flex flex-wrap mb-4">
                                            <!-- Image previews will appear here -->
                                        </div>
                                        <input type="file" id="product-images" class="hidden" multiple accept="image/*">
                                        <label for="product-images"
                                            class="cursor-pointer inline-flex items-center px-5 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                                            <i class="fas fa-upload mr-2"></i> Upload Images
                                        </label>
                                        <p class="text-sm text-gray-500 mt-3">Upload high-quality product images (max 10
                                            images)</p>
                                    </div>
                                </div>

                                <div>
                                    <h3 class="text-lg font-medium text-gray-800 mb-3">Product Videos</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">YouTube/Vimeo
                                                URL</label>
                                            <input type="text"
                                                class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                placeholder="https://youtube.com/watch?v=...">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Upload
                                                Video</label>
                                            <div class="relative">
                                                <input type="file"
                                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                    accept="video/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Attributes Tab -->
                            <div id="attributes-tab" class="tab-content">
                                <div class="mb-8">
                                    <h3 class="text-lg font-medium text-gray-800 mb-3">Product Specifications</h3>
                                    <div id="attributes-container">

                                    </div>
                                    <button id="add-attribute"
                                        class="px-4 py-2.5 bg-indigo-50 text-indigo-700 rounded-lg hover:bg-indigo-100 transition-colors">
                                        <i class="fas fa-plus mr-2"></i> Add Another Attribute
                                    </button>
                                </div>

                                <div>
                                    <h3 class="text-lg font-medium text-gray-800 mb-3">Custom Fields</h3>
                                    <div id="custom-fields-container">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Field
                                                    Name</label>
                                                <input type="text"
                                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                    placeholder="e.g. Material, Weight">
                                            </div>
                                            <div>
                                                <label
                                                    class="block text-sm font-medium text-gray-700 mb-2">Value</label>
                                                <input type="text"
                                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                    placeholder="e.g. Cotton, 500g">
                                            </div>
                                        </div>
                                    </div>
                                    <button id="add-custom-field"
                                        class="px-4 py-2.5 bg-indigo-50 text-indigo-700 rounded-lg hover:bg-indigo-100 transition-colors">
                                        <i class="fas fa-plus mr-2"></i> Add Custom Field
                                    </button>
                                </div>
                            </div>



                            <!-- Variants Tab -->
                            <div id="variants-tab" class="tab-content">
                                <div class="mb-6">
                                    <h3 class="text-lg font-medium text-gray-800 mb-3">Variant Options</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Option 1</label>
                                            <select
                                                class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                <option value="">Select an option</option>
                                                <option>Color</option>
                                                <option>Size</option>
                                                <option>Material</option>
                                                <option>Style</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Option 2</label>
                                            <select
                                                class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                <option value="">Select an option</option>
                                                <option>Color</option>
                                                <option>Size</option>
                                                <option>Material</option>
                                                <option>Style</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Option 3</label>
                                            <select
                                                class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                <option value="">Select an option</option>
                                                <option>Color</option>
                                                <option>Size</option>
                                                <option>Material</option>
                                                <option>Style</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-medium text-gray-800">Variant Combinations</h3>
                                    </div>

                                    <div id="variant-combinations-container">
                                        <!-- Variant combinations will be added here -->
                                    </div>

                                    <div class="flex justify-between items-center mb-4">
                                        <h1></h1>
                                        <button id="add-variant-combination"
                                            class="px-4 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                                            <i class="fas fa-plus mr-2"></i> Add Combination
                                        </button>
                                    </div>


                                </div>
                            </div>

                            <!-- SEO Tab -->
                            <div id="seo-tab" class="tab-content">
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Page Title</label>
                                        <input type="text"
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            placeholder="Optimized page title for search engines">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Meta
                                            Description</label>
                                        <textarea
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            rows="3"
                                            placeholder="Brief description for search engine results"></textarea>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">URL Slug</label>
                                        <input type="text"
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            placeholder="product-name">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Canonical
                                            URL</label>
                                        <input type="text"
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            placeholder="https://example.com/product">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Schema
                                            Markup</label>
                                        <select
                                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option selected>Product</option>
                                            <option>Book</option>
                                            <option>Clothing</option>
                                            <option>Electronics</option>
                                            <option>Food</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Save Buttons -->
                    <div class="flex justify-end space-x-3 mt-6">
                        <button
                            class="px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                            Cancel
                        </button>
                        <button
                            class="px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                            Save as Draft
                        </button>
                        <button
                            class="px-5 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                            Publish Product
                        </button>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Combination Template -->
    <template id="combination-template">
        <div class="variant-combination">
            <span class="remove-combination">&times;</span>

            <div class="mb-5">
                <h4 class="font-medium text-gray-700 text-lg mb-3">Combination Attributes</h4>
                <div id="attributesContainer" class="combination-attributes flex flex-wrap mb-4">
                    <!-- Attributes will be added here -->
                </div>

                <div class="flex items-center">
                    <button id="addAttributeBtn"
                        class="add-attribute px-4 py-2.5 bg-indigo-50 text-indigo-700 rounded-lg hover:bg-indigo-100 transition-colors">
                        <i class="fas fa-plus mr-2"></i> Add Attribute
                    </button>
                </div>
            </div>
        </div>
    </template>

    <script>
        // Initialize Quill editor
        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            },
            placeholder: 'Write detailed product description here...'
        });

        // Tab functionality
        document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                document.querySelectorAll('.tab-button').forEach(btn => {
                    btn.classList.remove('active', 'text-indigo-600');
                    btn.classList.add('text-gray-600');
                });

                // Add active class to clicked button
                button.classList.add('active', 'text-indigo-600');
                button.classList.remove('text-gray-600');

                // Hide all tab content
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });

                // Show selected tab content
                const tabId = button.getAttribute('data-tab') + '-tab';
                document.getElementById(tabId).classList.add('active');
            });
        });

        // Image upload preview


        const fileInput = document.getElementById('product-images');
        const previewContainer = document.getElementById('image-preview-container');

        // Use a Set to store unique file names
        const uploadedFiles = new Set();

        fileInput.addEventListener('change', function (e) {
            const files = Array.from(e.target.files);

            files.forEach(file => {
                const uniqueKey = file.name + '-' + file.size;

                if (uploadedFiles.has(uniqueKey)) {
                    return;
                }

                const reader = new FileReader();

                reader.onload = function (event) {
                    const imageBox = document.createElement('div');
                    imageBox.className = 'relative w-24 h-24 mr-3 mb-3';

                    imageBox.innerHTML = `
            <img src="${event.target.result}" class="w-full h-full object-cover rounded-lg border" data-key="${uniqueKey}">
                <button type="button" class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center remove-image" title="Remove">
                    &times;
                </button>
                `;

                    previewContainer.appendChild(imageBox);
                    uploadedFiles.add(uniqueKey);
                };

                reader.readAsDataURL(file);
            });

            // Reset input so same file can be reselected
            fileInput.value = '';
        });

        // Remove image from preview and Set
        previewContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-image')) {
                const imageBox = e.target.closest('div');
                const img = imageBox.querySelector('img');
                const key = img.getAttribute('data-key');

                uploadedFiles.delete(key); // remove from Set
                imageBox.remove(); // remove from DOM
            }
        });



        // Handle removing images
        previewContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-image')) {
                const imageBox = e.target.closest('div');
                const img = imageBox.querySelector('img');

                // Remove from set by filename (if possible)
                const src = img.src;
                const match = uploadedFiles.has(img.alt) ? img.alt : [...uploadedFiles].find(name => src.includes(name));
                if (match) uploadedFiles.delete(match);

                imageBox.remove();
            }
        });





        // Remove image
        document.getElementById('image-preview-container').addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-image')) {
                e.target.closest('.image-preview').remove();
            }
        });

        // Add attribute field
        document.getElementById('add-attribute').addEventListener('click', function () {
            const container = document.getElementById('attributes-container');

            // Create wrapper for the full row with a class for deletion
            const newAttribute = document.createElement('div');
            newAttribute.className = 'flex justify-between gap-4 mb-4 attribute-row border p-3 rounded bg-gray-50 relative';

            newAttribute.innerHTML = `
    <!-- Attribute Name -->
    <div>
        <input type="text"
            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="e.g. Color, Size">
    </div>

    <!-- Value -->
    <div>
        <input type="text"
            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="e.g. Red, Large">
    </div>

    <!-- Image -->
    <div>
        <input type="file"
            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
            accept="image/*">
    </div>

    <!-- Color Picker -->
    <div>
        <input type="color"
            class="w-10 h-[44px] px-2 py-1 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
            value="#ff0000">
    </div>

    <!-- ❌ Remove Button -->
    <div class="flex items-end">
        <button type="button"
            class="remove-attribute w-fit px-4 py-2.5 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
            <i class="fas fa-trash-alt mr-1"></i>
        </button>
    </div>
    `;

            container.appendChild(newAttribute);
        });
        // Delegate remove button click from attribute container
        document.getElementById('attributes-container').addEventListener('click', function (e) {
            if (e.target.closest('.remove-attribute')) {
                const row = e.target.closest('.attribute-row');
                if (row) row.remove();
            }
        });


        // Add custom field
        document.getElementById('add-custom-field').addEventListener('click', function () {
            const container = document.getElementById('custom-fields-container');
            const newField = document.createElement('div');
            newField.className = 'grid grid-cols-1 md:grid-cols-2 gap-4 mb-4';
            newField.innerHTML = `
    <div>
        <input type="text"
            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="e.g. Material, Weight">
    </div>
    <div>
        <input type="text"
            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="e.g. Cotton, 500g">
    </div>
    `;
            container.appendChild(newField);
        });

        // Variant combination functionality
        document.getElementById('add-variant-combination').addEventListener('click', function () {
            const container = document.getElementById('variant-combinations-container');
            const template = document.getElementById('combination-template');
            const clone = template.content.cloneNode(true);

            container.appendChild(clone);

            // Set up event listeners for the new combination
            const newCombination = container.lastElementChild;

            // Remove combination
            newCombination.querySelector('.remove-combination').addEventListener('click', function () {
                newCombination.remove();
            });

            // Add attribute to combination
            const addAttributeBtn = newCombination.querySelector('.add-attribute');
            const attributesContainer = newCombination.querySelector('.combination-attributes');

            addAttributeBtn.addEventListener('click', function () {
                const attributeBlock = document.createElement('div');
                attributeBlock.className = 'attribute-select w-full mb-6 p-5 bg-gray-50 rounded-xl border border-gray-200 relative';
                attributeBlock.innerHTML = `
    <button class="delete-attribute absolute top-4 right-4 text-red-600 hover:text-red-800 text-xl">&times;</button>

    <div class="mb-5">
        <label class="block text-sm font-medium text-gray-700 mb-2">Attribute Name</label>
        <input type="text"
            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="e.g. Color, Size">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Price</label>
            <input type="number" step="0.01"
                class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                placeholder="0.00">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
            <input type="number"
                class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                placeholder="0">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">SKU</label>
            <input type="text"
                class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                placeholder="Variant SKU">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Barcode</label>
            <input type="text"
                class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                placeholder="Barcode">
        </div>
    </div>

    <div class="mt-4">
        <label class="block text-sm font-medium text-gray-700 mb-2">Variant Image</label>
        <div class="flex items-center">
            <div class="mr-4">
                <img src="https://via.placeholder.com/80" alt="Preview"
                    class="image-preview w-20 h-20 object-cover rounded-lg">
            </div>
            <input type="file" class="hidden" accept="image/*">
            <button class="px-4 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                <i class="fas fa-upload mr-1"></i> Upload
            </button>
        </div>
    </div>
    `;

                // Setup delete for this attribute
                attributeBlock.querySelector('.delete-attribute').addEventListener('click', function () {
                    attributeBlock.remove();
                });

                // Setup image upload for this attribute
                const uploadBtn = attributeBlock.querySelector('button');
                const fileInput = attributeBlock.querySelector('input[type="file"]');
                const previewImg = attributeBlock.querySelector('img');



                fileInput.addEventListener('change', function (e) {
                    if (this.files && this.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            previewImg.src = e.target.result;
                        };
                        reader.readAsDataURL(this.files[0]);
                    }
                });

                attributesContainer.appendChild(attributeBlock);
            });
        });
    </script>
</body>

</html>