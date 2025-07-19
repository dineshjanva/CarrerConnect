<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Admin Settings</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-blue: #0a66c2;
            --dark-blue: #084482;
            --light-blue: #e6f0ff;
            --white: #ffffff;
            --light-gray: #f5f7fa;
            --medium-gray: #e0e6ed;
            --dark-gray: #333333;
            --text-gray: #666666;
            --sidebar-bg: #2c3e50;
            --sidebar-hover: #34495e;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
        }

        body {
            background-color: var(--light-gray);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg);
            color: white;
            height: 100vh;
            position: fixed;
            transition: all 0.3s;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h2 {
            display: flex;
            align-items: center;
            font-size: 20px;
        }

        .sidebar-header h2 i {
            margin-right: 10px;
            color: var(--primary-blue);
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .menu-item:hover {
            background-color: var(--sidebar-hover);
            color: white;
        }

        .menu-item.active {
            background-color: var(--sidebar-hover);
            color: white;
            border-left: 3px solid var(--primary-blue);
        }

        .menu-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .menu-item.active i {
            color: var(--primary-blue);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* Top Navigation */
        .top-nav {
            background-color: var(--white);
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background-color: var(--light-gray);
            padding: 8px 15px;
            border-radius: 0;
            width: 300px;
        }

        .search-bar input {
            border: none;
            background: transparent;
            padding: 5px;
            width: 100%;
            outline: none;
        }

        .search-bar i {
            color: var(--text-gray);
            margin-right: 10px;
        }

        .user-menu {
            display: flex;
            align-items: center;
        }

        .notification-btn {
            position: relative;
            margin-right: 20px;
            color: var(--text-gray);
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #e74c3c;
            color: white;
            font-size: 10px;
            width: 18px;
            height: 18px;
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 0;
            margin-right: 10px;
            object-fit: cover;
        }

        .user-info {
            line-height: 1.3;
        }

        .user-name {
            font-weight: 600;
            font-size: 14px;
        }

        .user-role {
            font-size: 12px;
            color: var(--text-gray);
        }

        /* Settings Container */
        .settings-container {
            flex: 1;
            overflow-y: auto;
            padding: 30px;
            background-color: var(--light-gray);
        }

        .settings-card {
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-header {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--medium-gray);
        }

        .page-header h1 {
            font-size: 32px;
            color: var(--dark-gray);
        }

        .page-header p {
            color: var(--text-gray);
            margin-top: 10px;
        }

        /* Tabs */
        .settings-tabs {
            display: flex;
            border-bottom: 1px solid var(--medium-gray);
            margin-bottom: 30px;
        }

        .tab {
            padding: 15px 25px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
            position: relative;
            color: var(--text-gray);
        }

        .tab.active {
            color: var(--primary-blue);
        }

        .tab.active:after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--primary-blue);
        }

        /* Tab Content */
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .section-title {
            font-size: 24px;
            color: var(--dark-gray);
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--medium-gray);
        }

        /* Logo Settings */
        .logo-settings {
            display: flex;
            gap: 40px;
            margin-bottom: 40px;
        }

        .current-logo {
            flex: 0 0 300px;
        }

        .current-logo h3 {
            margin-bottom: 15px;
            color: var(--dark-gray);
        }

        .logo-preview {
            width: 100%;
            height: 150px;
            background-color: var(--light-blue);
            border: 1px dashed var(--primary-blue);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo-preview img {
            max-width: 80%;
            max-height: 80%;
        }

        .logo-form {
            flex: 1;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
            color: var(--dark-gray);
        }

        .file-upload {
            border: 2px dashed var(--medium-gray);
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
        }

        .file-upload:hover {
            border-color: var(--primary-blue);
        }

        .file-upload i {
            font-size: 48px;
            color: var(--primary-blue);
            margin-bottom: 15px;
        }

        .file-upload p {
            color: var(--text-gray);
            margin-bottom: 15px;
        }

        .file-upload input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .logo-specs {
            background-color: var(--light-gray);
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .logo-specs h4 {
            margin-bottom: 10px;
            color: var(--dark-gray);
        }

        .logo-specs ul {
            padding-left: 20px;
            color: var(--text-gray);
        }

        .logo-specs li {
            margin-bottom: 5px;
        }

        .btn {
            padding: 12px 25px;
            background-color: var(--primary-blue);
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn:hover {
            background-color: var(--dark-blue);
        }

        /* Banner Settings */
        .banner-settings {
            margin-bottom: 40px;
        }

        .current-banner {
            margin-bottom: 30px;
        }

        .current-banner h3 {
            margin-bottom: 15px;
            color: var(--dark-gray);
        }

        .banner-preview {
            width: 100%;
            height: 250px;
            background-color: var(--light-blue);
            border: 1px dashed var(--primary-blue);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .banner-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .banner-form .form-group {
            max-width: 600px;
        }

        /* Footer Settings */
        .footer-settings {
            margin-bottom: 40px;
        }

        .footer-columns {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .footer-column {
            background-color: var(--light-gray);
            border-radius: 8px;
            padding: 25px;
        }

        .column-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--medium-gray);
        }

        .column-header h3 {
            color: var(--dark-gray);
        }

        .add-link-btn {
            background: none;
            border: none;
            color: var(--primary-blue);
            cursor: pointer;
            font-size: 24px;
            line-height: 1;
        }

        .links-list {
            list-style: none;
        }

        .link-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid var(--medium-gray);
        }

        .link-item:last-child {
            border-bottom: none;
        }

        .link-title {
            color: var(--dark-gray);
        }

        .link-url {
            color: var(--text-gray);
            font-size: 14px;
            margin-top: 5px;
        }

        .link-actions {
            display: flex;
            gap: 10px;
        }

        .link-actions button {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-gray);
            font-size: 16px;
        }

        .link-actions .edit-btn:hover {
            color: var(--primary-blue);
        }

        .link-actions .delete-btn:hover {
            color: var(--danger);
        }

        /* Add Link Form */
        .add-link-form {
            background-color: var(--light-gray);
            border-radius: 8px;
            padding: 25px;
            margin-top: 30px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-control {
            margin-bottom: 20px;
        }

        .form-control label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark-gray);
        }

        .form-control input,
        .form-control select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--medium-gray);
            border-radius: 5px;
            font-size: 15px;
        }

        .form-control input:focus,
        .form-control select:focus {
            outline: none;
            border-color: var(--primary-blue);
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .btn-secondary {
            background-color: var(--text-gray);
        }

        .btn-secondary:hover {
            background-color: var(--dark-gray);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .logo-settings {
                flex-direction: column;
            }

            .current-logo {
                flex: 0 0 auto;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .sidebar-header h2 span,
            .menu-item span {
                display: none;
            }

            .menu-item {
                justify-content: center;
                padding: 15px 0;
            }

            .menu-item i {
                margin-right: 0;
                font-size: 18px;
            }

            .main-content {
                margin-left: 70px;
            }

            .settings-tabs {
                flex-wrap: wrap;
            }

            .tab {
                flex: 1;
                text-align: center;
                padding: 12px;
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .top-nav {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px;
            }

            .search-bar {
                width: 100%;
                margin-bottom: 15px;
            }

            .user-info {
                display: none;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    {{-- <div class="sidebar">
        <div class="sidebar-header">
            <h2><i class="fas fa-briefcase"></i> <span>CareerConnect</span></h2>
        </div>
        <div class="sidebar-menu">
            <a href="#" class="menu-item">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-building"></i>
                <span>Companies</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-briefcase"></i>
                <span>Jobs</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-chart-bar"></i>
                <span>Reports</span>
            </a>
            <a href="#" class="menu-item active">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
        </div>
    </div> --}}
    @include('admin.layout.sidebar')
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        {{-- <div class="top-nav">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search...">
            </div>
            <div class="user-menu">
                <div class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </div>
                <div class="user-profile">
                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&h=100&q=80"
                        alt="Admin">
                    <div class="user-info">
                        <div class="user-name">Admin User</div>
                        <div class="user-role">Super Admin</div>
                    </div>
                </div>
            </div>
        </div> --}}
        @include('admin.layout.topnav')

        <!-- Settings Container -->
        <div class="settings-container">
            <div class="settings-card">
                <div class="page-header">
                    <h1>Website Settings</h1>
                    <p>Manage your website's appearance and content settings</p>
                </div>

                <div class="settings-tabs">
                    <div class="tab active" data-tab="logo">Logo Settings</div>
                    <div class="tab" data-tab="banner">Banner Settings</div>
                    <div class="tab" data-tab="footer">Footer Settings</div>
                </div>

                <!-- Logo Settings Tab -->
                <div class="tab-content active" id="logo-tab">
                    <h2 class="section-title">Logo Management</h2>

                    <div class="logo-settings">
                        <div class="current-logo">
                            <h3>Current Logo</h3>
                            <div class="logo-preview">


                                <img src="" alt="Current Logo">
                            </div>
                            <p>Your logo is displayed in the website header.</p>
                        </div>

                        <div class="logo-form">
                            @if(session('success'))
                                <div class="text-green-600">{{ session('success') }}</div>
                                <img src="{{ session('image_path') }}" alt="Uploaded Logo" class="mt-2 w-32 h-auto">
                            @endif

                            @if($errors->any())
                                <div class="text-red-600">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('admin.setting.image') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <h3>Upload New Logo</h3>
                                <div class="form-group">
                                    <label>Logo File</label>
                                    <div class="file-upload">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p>Drag & drop your logo here or click to browse</p>
                                        <span class="btn">Select File</span>
                                        <input type="file" accept="image/*" name="image" required>
                                    </div>
                                </div>

                                <div class="logo-specs">
                                    <h4>Logo Specifications</h4>
                                    <ul>
                                        <li>Recommended size: 300px × 100px</li>
                                        <li>Formats: PNG, JPG, SVG</li>
                                        <li>Max file size: 2MB</li>
                                        <li>Transparent background recommended</li>
                                    </ul>
                                </div>

                                <button type="submit" class="btn">
                                    <i class="fas fa-upload"></i> Upload Logo
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Banner Settings Tab -->
                <div class="tab-content" id="banner-tab">
                    <h2 class="section-title">Banner Management</h2>

                    <div class="banner-settings">
                        <div class="current-banner">
                            <h3>Current Banner</h3>
                            <div class="banner-preview">
                                <img src="https://via.placeholder.com/1200x400?text=CareerConnect+Banner"
                                    alt="Current Banner">
                            </div>
                            <p>Your banner is displayed on the homepage.</p>
                        </div>

                        <div class="banner-form">
                            <h3>Upload New Banner</h3>
                            <div class="form-group">
                                <label>Banner File</label>
                                <div class="file-upload">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p>Drag & drop your banner here or click to browse</p>
                                    <span class="btn">Select File</span>
                                    <input type="file" accept="image/*">
                                </div>
                            </div>

                            <div class="logo-specs">
                                <h4>Banner Specifications</h4>
                                <ul>
                                    <li>Recommended size: 1200px × 400px</li>
                                    <li>Formats: PNG, JPG</li>
                                    <li>Max file size: 5MB</li>
                                    <li>Optimize for web to ensure fast loading</li>
                                </ul>
                            </div>

                            <button class="btn">
                                <i class="fas fa-upload"></i> Upload Banner
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Footer Settings Tab -->
                <div class="tab-content" id="footer-tab">
                    <h2 class="section-title">Footer Links Management</h2>

                    <div class="footer-settings">
                        <h3>Current Footer Links</h3>
                        <p>Manage the links displayed in your website footer</p>

                        <div class="footer-columns">
                            <div class="footer-column">
                                <div class="column-header">
                                    <h3>For Job Seekers</h3>
                                    <button class="add-link-btn">+</button>
                                </div>
                                <ul class="links-list">
                                    <li class="link-item">
                                        <div>
                                            <div class="link-title">Browse Jobs</div>
                                            <div class="link-url">/jobs</div>
                                        </div>
                                        <div class="link-actions">
                                            <button class="edit-btn"><i class="fas fa-edit"></i></button>
                                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </li>
                                    <li class="link-item">
                                        <div>
                                            <div class="link-title">Career Resources</div>
                                            <div class="link-url">/resources</div>
                                        </div>
                                        <div class="link-actions">
                                            <button class="edit-btn"><i class="fas fa-edit"></i></button>
                                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </li>
                                    <li class="link-item">
                                        <div>
                                            <div class="link-title">Resume Builder</div>
                                            <div class="link-url">/resume-builder</div>
                                        </div>
                                        <div class="link-actions">
                                            <button class="edit-btn"><i class="fas fa-edit"></i></button>
                                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="footer-column">
                                <div class="column-header">
                                    <h3>For Employers</h3>
                                    <button class="add-link-btn">+</button>
                                </div>
                                <ul class="links-list">
                                    <li class="link-item">
                                        <div>
                                            <div class="link-title">Post a Job</div>
                                            <div class="link-url">/post-job</div>
                                        </div>
                                        <div class="link-actions">
                                            <button class="edit-btn"><i class="fas fa-edit"></i></button>
                                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </li>
                                    <li class="link-item">
                                        <div>
                                            <div class="link-title">Browse Candidates</div>
                                            <div class="link-url">/candidates</div>
                                        </div>
                                        <div class="link-actions">
                                            <button class="edit-btn"><i class="fas fa-edit"></i></button>
                                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </li>
                                    <li class="link-item">
                                        <div>
                                            <div class="link-title">Pricing Plans</div>
                                            <div class="link-url">/pricing</div>
                                        </div>
                                        <div class="link-actions">
                                            <button class="edit-btn"><i class="fas fa-edit"></i></button>
                                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="footer-column">
                                <div class="column-header">
                                    <h3>Company</h3>
                                    <button class="add-link-btn">+</button>
                                </div>
                                <ul class="links-list">
                                    <li class="link-item">
                                        <div>
                                            <div class="link-title">About Us</div>
                                            <div class="link-url">/about</div>
                                        </div>
                                        <div class="link-actions">
                                            <button class="edit-btn"><i class="fas fa-edit"></i></button>
                                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </li>
                                    <li class="link-item">
                                        <div>
                                            <div class="link-title">Contact Us</div>
                                            <div class="link-url">/contact</div>
                                        </div>
                                        <div class="link-actions">
                                            <button class="edit-btn"><i class="fas fa-edit"></i></button>
                                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </li>
                                    <li class="link-item">
                                        <div>
                                            <div class="link-title">Privacy Policy</div>
                                            <div class="link-url">/privacy</div>
                                        </div>
                                        <div class="link-actions">
                                            <button class="edit-btn"><i class="fas fa-edit"></i></button>
                                            <button class="delete-btn"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="add-link-form">
                            <h3>Add New Footer Link</h3>
                            <div class="form-row">
                                <div class="form-control">
                                    <label>Link Title</label>
                                    <input type="text" placeholder="Enter link title">
                                </div>
                                <div class="form-control">
                                    <label>Link URL</label>
                                    <input type="text" placeholder="Enter link URL">
                                </div>
                                <div class="form-control">
                                    <label>Column</label>
                                    <select>
                                        <option>For Job Seekers</option>
                                        <option>For Employers</option>
                                        <option>Company</option>
                                        <option>Resources</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button class="btn">
                                    <i class="fas fa-plus"></i> Add Link
                                </button>
                                <button class="btn btn-secondary">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript for settings page
        document.addEventListener('DOMContentLoaded', function () {
            // Tab switching functionality
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    const tabId = this.getAttribute('data-tab');

                    // Remove active class from all tabs and contents
                    tabs.forEach(t => t.classList.remove('active'));
                    tabContents.forEach(c => c.classList.remove('active'));

                    // Add active class to clicked tab and corresponding content
                    this.classList.add('active');
                    document.getElementById(`${tabId}-tab`).classList.add('active');
                });
            });

            // File upload preview functionality
            const logoUpload = document.querySelector('#logo-tab input[type="file"]');
            const bannerUpload = document.querySelector('#banner-tab input[type="file"]');

            logoUpload.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const logoPreview = document.querySelector('#logo-tab .logo-preview');
                        logoPreview.innerHTML = `<img src="${e.target.result}" alt="New Logo">`;
                    }
                    reader.readAsDataURL(file);
                }
            });

            bannerUpload.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const bannerPreview = document.querySelector('#banner-tab .banner-preview');
                        bannerPreview.innerHTML = `<img src="${e.target.result}" alt="New Banner">`;
                    }
                    reader.readAsDataURL(file);
                }
            });

            // Footer link actions
            const addLinkButtons = document.querySelectorAll('.add-link-btn');
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const editButtons = document.querySelectorAll('.edit-btn');

            addLinkButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const columnTitle = this.closest('.column-header').querySelector('h3')
                        .textContent;
                    const columnSelect = document.querySelector('.add-link-form select');

                    // Set the column in the form
                    for (let i = 0; i < columnSelect.options.length; i++) {
                        if (columnSelect.options[i].text === columnTitle) {
                            columnSelect.selectedIndex = i;
                            break;
                        }
                    }

                    // Scroll to the form
                    document.querySelector('.add-link-form').scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const linkItem = this.closest('.link-item');
                    if (confirm('Are you sure you want to delete this link?')) {
                        linkItem.style.opacity = '0.5';
                        setTimeout(() => {
                            linkItem.remove();
                        }, 300);
                    }
                });
            });

            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const linkItem = this.closest('.link-item');
                    const title = linkItem.querySelector('.link-title').textContent;
                    const url = linkItem.querySelector('.link-url').textContent;

                    // Populate form with existing data
                    const form = document.querySelector('.add-link-form');
                    form.querySelector('input[type="text"]:first-child').value = title;
                    form.querySelector('input[type="text"]:nth-child(2)').value = url;

                    // Change form to edit mode
                    form.querySelector('.btn').innerHTML =
                        '<i class="fas fa-save"></i> Update Link';

                    // Scroll to form
                    form.scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });

            // Add link form submission
            const addLinkForm = document.querySelector('.add-link-form');
            const addLinkBtn = addLinkForm.querySelector('.btn');

            addLinkBtn.addEventListener('click', function () {
                const titleInput = addLinkForm.querySelector('input[type="text"]:first-child');
                const urlInput = addLinkForm.querySelector('input[type="text"]:nth-child(2)');
                const columnSelect = addLinkForm.querySelector('select');

                if (titleInput.value && urlInput.value) {
                    const columnTitle = columnSelect.options[columnSelect.selectedIndex].text;

                    // Find the appropriate column
                    const columns = document.querySelectorAll('.footer-column');
                    let targetColumn = null;
                    columns.forEach(column => {
                        if (column.querySelector('h3').textContent === columnTitle) {
                            targetColumn = column;
                        }
                    });

                    if (targetColumn) {
                        const linksList = targetColumn.querySelector('.links-list');
                        const newLink = document.createElement('li');
                        newLink.className = 'link-item';
                        newLink.innerHTML = `
                            <div>
                                <div class="link-title">${titleInput.value}</div>
                                <div class="link-url">${urlInput.value}</div>
                            </div>
                            <div class="link-actions">
                                <button class="edit-btn"><i class="fas fa-edit"></i></button>
                                <button class="delete-btn"><i class="fas fa-trash"></i></button>
                            </div>
                        `;

                        linksList.appendChild(newLink);

                        // Reset form
                        titleInput.value = '';
                        urlInput.value = '';
                        columnSelect.selectedIndex = 0;

                        // Reset button text if it was in edit mode
                        if (this.textContent.includes('Update')) {
                            this.innerHTML = '<i class="fas fa-plus"></i> Add Link';
                        }

                        // Add event listeners to new buttons
                        newLink.querySelector('.delete-btn').addEventListener('click', function () {
                            if (confirm('Are you sure you want to delete this link?')) {
                                const linkItem = this.closest('.link-item');
                                linkItem.style.opacity = '0.5';
                                setTimeout(() => {
                                    linkItem.remove();
                                }, 300);
                            }
                        });

                        newLink.querySelector('.edit-btn').addEventListener('click', function () {
                            const linkItem = this.closest('.link-item');
                            const title = linkItem.querySelector('.link-title').textContent;
                            const url = linkItem.querySelector('.link-url').textContent;

                            // Populate form with existing data
                            const form = document.querySelector('.add-link-form');
                            form.querySelector('input[type="text"]:first-child').value = title;
                            form.querySelector('input[type="text"]:nth-child(2)').value = url;

                            // Change form to edit mode
                            form.querySelector('.btn').innerHTML =
                                '<i class="fas fa-save"></i> Update Link';

                            // Scroll to form
                            form.scrollIntoView({
                                behavior: 'smooth'
                            });

                            // Remove the item being edited
                            linkItem.remove();
                        });
                    }
                } else {
                    alert('Please fill in both title and URL fields');
                }
            });
        });
    </script>
</body>

</html>