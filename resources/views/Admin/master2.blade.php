<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Template | Top Nav + Sidebar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4895ef;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --border: #dee2e6;
            --success: #4cc9f0;
            --warning: #f72585;
            --sidebar-width: 250px;
            --topbar-height: 60px;
            --transition: all 0.3s ease;
        }

        body {
            background-color: #f5f7fb;
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Top Navigation */
        .top-nav {
            background-color: white;
            height: var(--topbar-height);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo i {
            font-size: 24px;
            color: var(--primary);
        }

        .logo h1 {
            font-size: 22px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--gray);
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 6px;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background-color: var(--light);
            color: var(--primary);
        }

        .nav-links a i {
            font-size: 16px;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-menu .notifications {
            position: relative;
            cursor: pointer;
        }

        .user-menu .notifications i {
            font-size: 18px;
            color: var(--gray);
        }

        .user-menu .notifications .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--warning);
            color: white;
            font-size: 10px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .user-profile img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--light-gray);
        }

        .user-profile .name {
            font-weight: 500;
            color: var(--dark);
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: var(--gray);
            cursor: pointer;
        }

        /* Main Layout */
        .main-container {
            display: flex;
            flex: 1;
            margin-top: var(--topbar-height);
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background-color: white;
            height: calc(100vh - var(--topbar-height));
            position: fixed;
            left: 0;
            top: var(--topbar-height);
            overflow-y: auto;
            transition: var(--transition);
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            z-index: 90;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid var(--border);
        }

        .sidebar-title {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--gray);
            font-weight: 600;
            margin-bottom: 5px;
        }

        .sidebar-menu {
            padding: 15px 0;
            list-style: none;
        }

        .menu-title {
            padding: 10px 20px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--gray);
            font-weight: 600;
        }

        .menu-item {
            margin-bottom: 5px;
        }

        .menu-item a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--gray);
            text-decoration: none;
            transition: var(--transition);
            gap: 12px;
        }

        .menu-item a i {
            width: 20px;
            text-align: center;
        }

        .menu-item a:hover,
        .menu-item a.active {
            background-color: var(--light);
            color: var(--primary);
        }

        .menu-item a.active {
            border-left: 4px solid var(--primary);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 30px;
            min-height: calc(100vh - var(--topbar-height));
            transition: var(--transition);
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .content-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--dark);
        }

        .breadcrumb {
            display: flex;
            list-style: none;
            gap: 10px;
            color: var(--gray);
            font-size: 14px;
        }

        .breadcrumb li:not(:last-child)::after {
            content: '/';
            margin-left: 10px;
        }

        .breadcrumb a {
            color: var(--gray);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .content-body {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 30px;
            min-height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .content-placeholder {
            text-align: center;
            max-width: 500px;
            color: var(--gray);
        }

        .content-placeholder i {
            font-size: 48px;
            color: var(--light-gray);
            margin-bottom: 20px;
        }

        .content-placeholder h3 {
            font-size: 22px;
            font-weight: 500;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .content-placeholder p {
            margin-bottom: 20px;
        }

        /* Footer */
        .footer {
            background-color: white;
            padding: 25px;
            border-top: 1px solid var(--border);
            text-align: center;
            color: var(--gray);
            font-size: 14px;
            margin-left: var(--sidebar-width);
            transition: var(--transition);
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 15px;
            list-style: none;
        }

        .footer-links a {
            color: var(--gray);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content,
            .footer {
                margin-left: 0;
            }

            .menu-toggle {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .content-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .breadcrumb {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>
    <!-- Top Navigation -->
    <nav class="top-nav">
        <div class="logo">
            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
            <i class="fas fa-cube"></i>
            <h1>MasterLayout</h1>
        </div>

        <ul class="nav-links">
            <li><a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-chart-bar"></i> Analytics</a></li>
            <li><a href="#"><i class="fas fa-calendar"></i> Calendar</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Team</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
        </ul>

        <div class="user-menu">
            <div class="notifications">
                <i class="fas fa-bell"></i>
                <span class="badge">5</span>
            </div>
            <div class="user-profile">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&h=200&q=80"
                    alt="User">
                <div class="name">Alex Morgan</div>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-title">Main Navigation</div>
            </div>

            <ul class="sidebar-menu">
                <li class="menu-title">Dashboard</li>
                <li class="menu-item">
                    <a href="#" class="active">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Management</li>
                <li class="menu-item">
                    <a href="#">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        <i class="fas fa-box"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        <i class="fas fa-dollar-sign"></i>
                        <span>Payments</span>
                    </a>
                </li>

                <li class="menu-title">Content</li>
                <li class="menu-item">
                    <a href="#">
                        <i class="fas fa-file-alt"></i>
                        <span>Pages</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        <i class="fas fa-blog"></i>
                        <span>Blog</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        <i class="fas fa-image"></i>
                        <span>Media</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        <i class="fas fa-comments"></i>
                        <span>Comments</span>
                    </a>
                </li>

                <li class="menu-title">System</li>
                <li class="menu-item">
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        <i class="fas fa-shield-alt"></i>
                        <span>Security</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        <i class="fas fa-life-ring"></i>
                        <span>Support</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="content-header">
                <h1 class="content-title">Dashboard</h1>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>Dashboard</li>
                </ul>
            </div>

            <div class="content-body">
                <div class="content-placeholder">
                    <i class="fas fa-layout"></i>
                    <h3>Main Content Area</h3>
                    <p>This is a master template with top navigation, sidebar, and footer. Add your content here.</p>
                    <p>The layout is fully responsive and ready for your implementation.</p>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <ul class="footer-links">
            <li><a href="#">About</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Help Center</a></li>
        </ul>
        <p>&copy; 2023 Master Template. All rights reserved.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuToggle = document.getElementById('menuToggle');
            const sidebar = document.getElementById('sidebar');

            // Toggle sidebar on mobile
            menuToggle.addEventListener('click', function () {
                sidebar.classList.toggle('active');
            });

            // Close sidebar when clicking outside
            document.addEventListener('click', function (event) {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickInsideMenuToggle = menuToggle.contains(event.target);

                if (!isClickInsideSidebar && !isClickInsideMenuToggle && window.innerWidth <= 992) {
                    sidebar.classList.remove('active');
                }
            });

            // Update active menu item
            const menuItems = document.querySelectorAll('.menu-item a');
            menuItems.forEach(item => {
                item.addEventListener('click', function () {
                    menuItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');

                    // Close sidebar on mobile after selection
                    if (window.innerWidth <= 992) {
                        sidebar.classList.remove('active');
                    }
                });
            });
        });
    </script>
</body>

</html>