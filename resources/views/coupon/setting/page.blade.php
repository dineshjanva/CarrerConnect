<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
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
    <style>
        .slug-input {
            transition: all 0.2s ease;
            border: 1px solid #d1d5db;
            padding-left: 2.5rem;
        }

        .slug-input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
        }

        .slug-prefix {
            left: 0.75rem;
            color: #6b7280;
        }

        .editor-container {
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .ck.ck-editor__main>.ck-editor__editable {
            min-height: 300px;
            background-color: #fff;
        }

        .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
            border-color: #e5e7eb;
        }

        .ck.ck-toolbar {
            background: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
            border-radius: 0.5rem 0.5rem 0 0;
        }

        .fade-in {
            animation: fadeIn 0.3s ease-in;
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

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .sidebar-item {
            transition: all 0.2s ease;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
        }

        .sidebar-item:hover {
            background-color: #f3f4f6;
        }

        .sidebar-item.active {
            background-color: #e0e7ff;
            color: #4f46e5;
            font-weight: 500;
        }

        .image-preview-container {
            position: relative;
            width: 100%;
            height: 300px;
            border: 2px dashed #d1d5db;
            border-radius: 0.75rem;
            overflow: hidden;
            background-color: #f9fafb;
        }

        .image-preview {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: none;
        }

        .image-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #9ca3af;
        }

        .thumbnail-container {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .thumbnail {
            width: 80px;
            height: 80px;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            object-fit: cover;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .thumbnail:hover {
            border-color: #4f46e5;
        }

        .thumbnail.active {
            border: 2px solid #4f46e5;
        }

        .file-input {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 border-r border-gray-200 bg-white">
                <div class="flex items-center h-16 px-4 border-b border-gray-200">
                    <h1 class="text-lg font-semibold text-gray-800">Product Manager</h1>
                </div>
                <div class="flex flex-col flex-grow p-4 overflow-y-auto">
                    <nav class="flex-1 space-y-2">
                        <div>
                            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Products</h3>
                            <div class="mt-2 space-y-1">
                                <a href="#" class="sidebar-item active flex items-center">
                                    <i class="fas fa-box-open mr-3 text-indigo-500"></i>
                                    Product Details
                                </a>
                                <a href="#" class="sidebar-item flex items-center">
                                    <i class="fas fa-tags mr-3 text-gray-400"></i>
                                    Pricing & Inventory
                                </a>
                                <a href="#" class="sidebar-item flex items-center">
                                    <i class="fas fa-layer-group mr-3 text-gray-400"></i>
                                    Variants
                                </a>
                                <a href="#" class="sidebar-item flex items-center">
                                    <i class="fas fa-images mr-3 text-gray-400"></i>
                                    Media
                                </a>
                            </div>
                        </div>
                        <div>
                            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Marketing</h3>
                            <div class="mt-2 space-y-1">
                                <a href="#" class="sidebar-item flex items-center">
                                    <i class="fas fa-bullhorn mr-3 text-gray-400"></i>
                                    SEO
                                </a>
                                <a href="#" class="sidebar-item flex items-center">
                                    <i class="fas fa-share-alt mr-3 text-gray-400"></i>
                                    Social Media
                                </a>
                            </div>
                        </div>
                        <div>
                            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Settings</h3>
                            <div class="mt-2 space-y-1">
                                <a href="#" class="sidebar-item flex items-center">
                                    <i class="fas fa-cog mr-3 text-gray-400"></i>
                                    General
                                </a>
                                <a href="#" class="sidebar-item flex items-center">
                                    <i class="fas fa-truck mr-3 text-gray-400"></i>
                                    Shipping
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="p-4 border-t border-gray-200">
                    <div class="flex items-center">
                        <div class="w-9 h-9 bg-indigo-100 rounded-full flex items-center justify-center">
                            <span class="font-semibold text-indigo-700">AD</span>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-700">Admin User</p>
                            <p class="text-xs font-medium text-gray-500">admin@example.com</p>
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
                    <div class="ml-4 text-sm text-gray-600 md:ml-0">
                        <span class="text-gray-800 font-medium">Product Details Management</span>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <button class="relative p-2 text-gray-600 hover:bg-gray-100 rounded-full">
                        <i class="fas fa-bell text-lg"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <button class="relative p-2 text-gray-600 hover:bg-gray-100 rounded-full">
                        <i class="fas fa-question-circle text-lg"></i>
                    </button>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-6">
                <div class="max-w-4xl mx-auto">
                    <!-- Header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Product Details</h1>
                            <p class="text-gray-600 mt-1">Manage your product information</p>
                        </div>
                        <div class="mt-4 md:mt-0 flex items-center space-x-3">
                            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                                <i class="fas fa-times mr-2"></i> Cancel
                            </button>
                            <button
                                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 flex items-center">
                                <i class="fas fa-save mr-2"></i>Save Product
                            </button>
                        </div>
                    </div>

                    <!-- Product Details Form -->
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                        <div class="grid grid-cols-1 gap-6">
                            <!-- Product Images -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Product Images</label>
                                <div class="image-preview-container">
                                    <img id="main-image-preview" class="image-preview" src="" alt="Main product image">
                                    <div class="image-placeholder">
                                        <i class="fas fa-image text-4xl mb-2"></i>
                                        <p class="text-sm">Upload product images</p>
                                        <button id="upload-btn"
                                            class="mt-3 px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm hover:bg-indigo-700">
                                            <i class="fas fa-upload mr-2"></i>Select Images
                                        </button>
                                        <input type="file" id="file-input" class="file-input" accept="image/*" multiple>
                                    </div>
                                </div>
                                <div id="thumbnail-container" class="thumbnail-container">
                                    <!-- Thumbnails will be added here -->
                                </div>
                            </div>

                            <!-- Product Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                                <input type="text" id="product-name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="Enter product name" value="Premium Wireless Headphones">
                            </div>

                            <!-- Slug -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                                    <span>Slug</span>
                                    <button id="regenerate-slug"
                                        class="ml-2 text-xs px-2 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200">
                                        <i class="fas fa-sync-alt mr-1"></i>Regenerate
                                    </button>
                                </label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none slug-prefix">
                                        https://example.com/products/
                                    </div>
                                    <input type="text" id="product-slug"
                                        class="slug-input w-full pl-56 pr-4 py-2 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                                        value="premium-wireless-headphones">
                                </div>
                                <p class="mt-1 text-sm text-gray-500">The slug is used in the product URL</p>
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <div class="flex space-x-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status" class="form-radio text-indigo-600" checked>
                                        <span class="ml-2">Active</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status" class="form-radio text-indigo-600">
                                        <span class="ml-2">Draft</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status" class="form-radio text-indigo-600">
                                        <span class="ml-2">Archived</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Rich Text Editor -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Product Description</label>
                                <div class="editor-container">
                                    <div id="product-description">
                                        <h2>Premium Wireless Headphones</h2>
                                        <p>Experience crystal-clear sound with our premium wireless headphones. Designed
                                            for comfort and style, these headphones deliver exceptional audio quality
                                            for both music and calls.</p>

                                        <h3>Key Features:</h3>
                                        <ul>
                                            <li>Active Noise Cancellation</li>
                                            <li>30-hour battery life</li>
                                            <li>Bluetooth 5.2 connectivity</li>
                                            <li>Voice assistant support</li>
                                            <li>Built-in microphone for calls</li>
                                        </ul>

                                        <h3>Specifications:</h3>
                                        <table style="border-collapse: collapse; width: 100%;" border="1">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Battery Life</strong></td>
                                                    <td>Up to 30 hours</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Charging Time</strong></td>
                                                    <td>2 hours (full charge)</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Wireless Range</strong></td>
                                                    <td>10 meters</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Weight</strong></td>
                                                    <td>250g</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <p><br></p>
                                        <p>Available in three colors: Black, Silver, and Navy Blue.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Preview Section -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-eye mr-2 text-indigo-500"></i>
                            Product Preview
                        </h2>

                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex flex-col md:flex-row gap-6">
                                <div class="md:w-1/3">
                                    <div id="preview-image-container"
                                        class="bg-gray-200 rounded-xl w-full h-64 flex items-center justify-center overflow-hidden">
                                        <img id="preview-image" src="" alt="Product preview"
                                            class="w-full h-full object-contain hidden">
                                        <i class="fas fa-image text-4xl text-gray-500" id="preview-placeholder"></i>
                                    </div>
                                </div>
                                <div class="md:w-2/3">
                                    <h3 id="preview-name" class="text-2xl font-bold text-gray-800">Premium Wireless
                                        Headphones</h3>
                                    <div class="mt-2 flex items-center">
                                        <span class="status-badge bg-green-100 text-green-800">Active</span>
                                        <span class="ml-2 text-sm text-gray-500">Slug: <span id="preview-slug"
                                                class="font-mono">premium-wireless-headphones</span></span>
                                    </div>

                                    <div id="preview-description" class="prose max-w-none mt-4">
                                        <!-- Content will be generated by JavaScript -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Initialize CKEditor
        let editor;

        ClassicEditor
            .create(document.querySelector('#product-description'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'blockQuote', 'insertTable', 'undo', 'redo'
                    ]
                },
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                    ]
                }
            })
            .then(newEditor => {
                editor = newEditor;
                editor.model.document.on('change:data', updatePreview);
            })
            .catch(error => {
                console.error(error);
            });

        // Image Upload and Preview
        const fileInput = document.getElementById('file-input');
        const uploadBtn = document.getElementById('upload-btn');
        const mainImagePreview = document.getElementById('main-image-preview');
        const thumbnailContainer = document.getElementById('thumbnail-container');
        const previewImage = document.getElementById('preview-image');
        const previewPlaceholder = document.getElementById('preview-placeholder');

        let uploadedImages = [];

        uploadBtn.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', (e) => {
            const files = Array.from(e.target.files);
            if (files.length === 0) return;

            uploadedImages = [];
            thumbnailContainer.innerHTML = '';

            files.forEach((file, index) => {
                if (!file.type.match('image.*')) return;

                const reader = new FileReader();
                reader.onload = (event) => {
                    const imageData = {
                        src: event.target.result,
                        file: file
                    };
                    uploadedImages.push(imageData);

                    // Create thumbnail
                    const thumbnail = document.createElement('img');
                    thumbnail.src = event.target.result;
                    thumbnail.className = 'thumbnail';
                    thumbnail.dataset.index = index;

                    // Set first image as main preview by default
                    if (index === 0) {
                        setMainImagePreview(imageData.src);
                        thumbnail.classList.add('active');
                    }

                    // Thumbnail click event
                    thumbnail.addEventListener('click', () => {
                        setMainImagePreview(imageData.src);
                        document.querySelectorAll('.thumbnail').forEach(thumb => {
                            thumb.classList.remove('active');
                        });
                        thumbnail.classList.add('active');
                    });

                    thumbnailContainer.appendChild(thumbnail);
                };
                reader.readAsDataURL(file);
            });
        });

        function setMainImagePreview(src) {
            mainImagePreview.src = src;
            mainImagePreview.style.display = 'block';
            document.querySelector('.image-placeholder').style.display = 'none';

            // Update preview section
            previewImage.src = src;
            previewImage.classList.remove('hidden');
            previewPlaceholder.classList.add('hidden');
        }

        // Slug generation
        function generateSlug(name) {
            return name.trim()
                .toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        }

        // Update slug when product name changes
        document.getElementById('product-name').addEventListener('input', function () {
            document.getElementById('product-slug').value = generateSlug(this.value);
            updatePreview();
        });

        // Regenerate slug button
        document.getElementById('regenerate-slug').addEventListener('click', function () {
            const productName = document.getElementById('product-name').value;
            document.getElementById('product-slug').value = generateSlug(productName);
            updatePreview();

            // Show notification
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 px-4 py-2 bg-green-600 text-white rounded-lg shadow-lg flex items-center fade-in';
            notification.innerHTML = `
                <i class="fas fa-check-circle mr-2"></i>
                Slug regenerated successfully
            `;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.classList.add('opacity-0', 'transition-opacity', 'duration-300');
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        });

        // Update preview function
        function updatePreview() {
            document.getElementById('preview-name').textContent = document.getElementById('product-name').value;
            document.getElementById('preview-slug').textContent = document.getElementById('product-slug').value;

            // Update the description preview
            if (editor) {
                document.getElementById('preview-description').innerHTML = editor.getData();
            }
        }

        // Initial preview update
        setTimeout(updatePreview, 1000);

        // Status radio buttons
        document.querySelectorAll('input[name="status"]').forEach(radio => {
            radio.addEventListener('change', function () {
                const statusBadge = document.querySelector('.status-badge');
                if (this.value === 'active' || this.checked && this.nextElementSibling.textContent === 'Active') {
                    statusBadge.className = 'status-badge bg-green-100 text-green-800';
                    statusBadge.textContent = 'Active';
                } else if (this.value === 'draft' || this.checked && this.nextElementSibling.textContent === 'Draft') {
                    statusBadge.className = 'status-badge bg-yellow-100 text-yellow-800';
                    statusBadge.textContent = 'Draft';
                } else {
                    statusBadge.className = 'status-badge bg-gray-100 text-gray-800';
                    statusBadge.textContent = 'Archived';
                }
            });
        });

        // Save button
        document.querySelector('.bg-indigo-600').addEventListener('click', function () {
            this.classList.add('animate-pulse');

            // Show notification
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 px-4 py-2 bg-indigo-600 text-white rounded-lg shadow-lg flex items-center fade-in';
            notification.innerHTML = `
                <i class="fas fa-save mr-2"></i>
                Product details saved successfully
            `;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.classList.add('opacity-0', 'transition-opacity', 'duration-300');
                setTimeout(() => {
                    notification.remove();
                }, 300);
                this.classList.remove('animate-pulse');
            }, 3000);
        });

        // Mobile sidebar toggle
        document.querySelector('.fa-bars').addEventListener('click', function () {
            const sidebar = document.querySelector('.hidden.md\\:flex');
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('absolute');
            sidebar.classList.toggle('z-50');
            sidebar.classList.toggle('h-full');
        });
    </script>
</body>

</html>