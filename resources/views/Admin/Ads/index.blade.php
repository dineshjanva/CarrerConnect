@extends('admin.pages.master')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Ads Management</title>
    <link rel="stylesheet" href="{{ asset('css/admin/cms.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* * {
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
            --dark-gray: #333333;
            --medium-gray: #666666;
            --light-gray: #f5f5f5;
            --sidebar-bg: #2c3e50;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --purple: #6f42c1;
            --teal: #20c997;
        }

        body {
            background-color: #f8f9fa;
            color: var(--dark-gray);
            line-height: 1.6;
            min-height: 100vh;
        } */

        /* Header Styles */
        /* header {
            background-color: var(--white);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
            width: 100%;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 100%;
            margin: 0 auto;
            padding: 15px 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-blue);
            text-decoration: none;
        }

        .logo i {
            margin-right: 10px;
        }

        .user-menu {
            display: flex;
            align-items: center;
        }

        .notification-btn {
            position: relative;
            margin-right: 20px;
            color: var(--medium-gray);
            text-decoration: none;
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
            color: var(--medium-gray);
        } */

        /* Sidebar Styles */
        /* .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg);
            color: white;
            height: calc(100vh - 70px);
            position: fixed;
            top: 70px;
            left: 0;
            overflow-y: auto;
            transition: all 0.3s;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 0;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #ecf0f1;
            text-decoration: none;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: #34495e;
            border-left: 4px solid var(--primary-blue);
        }

        .sidebar-menu a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar-title {
            padding: 15px 20px 5px;
            font-size: 12px;
            text-transform: uppercase;
            color: #bdc3c7;
            letter-spacing: 1px;
        } */
        a {
            text-decoration: none;
        }

        /* Main Content */
        .main-content1 {
            flex: 1;
            padding-top: 70px;
        }

        .content-container1 {
            padding: 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 28px;
            color: var(--primary-blue);
        }

        .cms-actions {
            display: flex;
            gap: 15px;
        }

        .cms-btn {
            padding: 10px 20px;
            background-color: var(--primary-blue);
            color: white;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cms-btn:hover {
            background-color: var(--dark-blue);
        }

        /* Ads Dashboard */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
        }

        .stat-title {
            font-size: 16px;
            color: var(--medium-gray);
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stat-change {
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .positive {
            color: var(--success);
        }

        .negative {
            color: var(--danger);
        }

        /* Ads Filter Section */
        .filter-section {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
        }

        .filter-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .filter-title {
            font-size: 20px;
            font-weight: 600;
        }

        .filter-form {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 15px;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
        }

        .filter-label {
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 14px;
        }

        .filter-select,
        .filter-input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: var(--white);
        }

        .filter-actions {
            display: flex;
            align-items: flex-end;
            gap: 10px;
        }

        .btn {
            padding: 10px 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
            height: 40px;
        }

        .btn-primary {
            background-color: var(--primary-blue);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--dark-blue);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary-blue);
            color: var(--primary-blue);
        }

        .btn-outline:hover {
            background-color: var(--light-blue);
        }

        /* Ads Table */
        .content-section {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 30px;
            border-radius: 8px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--light-blue);
        }

        .section-title {
            font-size: 22px;
            font-weight: 600;
            color: var(--dark-gray);
        }

        .content-table {
            width: 100%;
            border-collapse: collapse;
        }

        .content-table th {
            text-align: left;
            padding: 12px 15px;
            background-color: var(--light-gray);
            font-weight: 600;
        }

        .content-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }

        .content-table tr:hover {
            background-color: var(--light-gray);
        }

        .ad-title {
            font-weight: 500;
            color: var(--primary-blue);
        }

        .ad-status {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-active {
            background-color: rgba(40, 167, 69, 0.15);
            color: var(--success);
        }

        .status-paused {
            background-color: rgba(255, 193, 7, 0.15);
            color: var(--warning);
        }

        .status-pending {
            background-color: rgba(108, 117, 125, 0.15);
            color: #6c757d;
        }

        .status-expired {
            background-color: rgba(220, 53, 69, 0.15);
            color: var(--danger);
        }

        .ad-type {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .type-banner {
            background-color: rgba(32, 201, 151, 0.15);
            color: var(--teal);
        }

        .type-sponsor {
            background-color: rgba(111, 66, 193, 0.15);
            color: var(--purple);
        }

        .type-popup {
            background-color: rgba(13, 110, 253, 0.15);
            color: #0d6efd;
        }

        .progress-bar {
            height: 8px;
            background-color: #e9ecef;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background-color: var(--primary-blue);
            border-radius: 4px;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-sm {
            padding: 6px 10px;
            font-size: 13px;
        }

        .btn-icon {
            width: 32px;
            height: 32px;
            padding: 0;
            justify-content: center;
            border-radius: 50%;
        }

        /* Footer */
        footer {
            background-color: var(--dark-gray);
            color: var(--white);
            padding: 30px 20px;
            margin-top: 30px;
            width: calc(100% - 250px);
            margin-left: 250px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .copyright {
            font-size: 14px;
            color: #aaa;
        }

        .version {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 3px 10px;
            font-size: 12px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .stats-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }

            .filter-form {
                grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                overflow: visible;
            }

            .sidebar-title,
            .sidebar-menu span {
                display: none;
            }

            .sidebar-menu a {
                justify-content: center;
                padding: 15px;
            }

            .sidebar-menu a i {
                margin-right: 0;
                font-size: 20px;
            }

            .main-content1 {
                margin-left: 70px;
            }

            footer {
                width: calc(100% - 70px);
                margin-left: 70px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .cms-actions {
                width: 100%;
                justify-content: flex-end;
            }

            .content-table {
                display: block;
                overflow-x: auto;
            }

            .filter-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .filter-actions {
                width: 100%;
                justify-content: flex-end;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    {{-- <header>
        <div class="header-container">
            <div class="logo">
                <i class="fas fa-briefcase"></i>
                <span>CareerConnect</span>
            </div>
            <div class="user-menu">
                <a href="admin-notifications.html" class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">5</span>
                </a>
                <a href="admin-profile.html" class="user-profile">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=100&h=100&q=80"
                        alt="Profile">
                    <div class="user-info">
                        <div class="user-name">Admin User</div>
                        <div class="user-role">Ad Manager</div>
                    </div>
                </a>
            </div>
        </div>
    </header> --}}

    <!-- Sidebar -->
    {{-- <nav class="sidebar">
        <ul class="sidebar-menu">
            <li class="sidebar-title">Main Navigation</li>
            <li>
                <a href="">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-users"></i>
                    <span>User Management</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-building"></i>
                    <span>Companies</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-briefcase"></i>
                    <span>Job Listings</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-file-alt"></i>
                    <span>Content Management</span>
                </a>
            </li>
            <li>
                <a href="" class="active">
                    <i class="fas fa-ad"></i>
                    <span>Ads Management</span>
                </a>
            </li>
            <li class="sidebar-title">System</li>
            <li>
                <a href="">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-chart-line"></i>
                    <span>Analytics</span>
                </a>
            </li>
        </ul>
    </nav> --}}
    @section('contant')

        <!-- Main Content -->
        <main class="main-content1">
            <div class="content-container1">
                <div class="page-header">
                    <h1 class="page-title">Ads Management</h1>
                    <div class="cms-actions">
                        <a class="cms-btn" href="{{ route('admin.ads.create') }}">
                            <i class="fas fa-plus"></i> Create New Ad
                        </a>
                        <a class="cms-btn" href="{{ route('admin.ads') }}">
                            <i class="fas fa-sync-alt"></i> Refresh
                        </a>
                    </div>
                </div>

                <!-- Stats Overview -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-title">Active Campaigns</div>
                        <div class="stat-value">12</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i> 15% from last month
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-title">Total Impressions</div>
                        <div class="stat-value">245K</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i> 8.2% from last week
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-title">Click Through Rate</div>
                        <div class="stat-value">2.8%</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i> 0.4% from last week
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-title">Total Revenue</div>
                        <div class="stat-value">$8,420</div>
                        <div class="stat-change negative">
                            <i class="fas fa-arrow-down"></i> 3.1% from last month
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="filter-section">
                    <div class="filter-header">
                        <h2 class="filter-title">Filter Ads</h2>
                        <div class="filter-actions">
                            <button class="btn btn-outline">
                                <i class="fas fa-filter"></i> Apply Filters
                            </button>
                            <button class="btn btn-outline">
                                <i class="fas fa-redo"></i> Reset
                            </button>
                        </div>
                    </div>

                    <form class="filter-form">
                        <div class="filter-group">
                            <label class="filter-label">Status</label>
                            <select class="filter-select">
                                <option value="">All Statuses</option>
                                <option value="active">Active</option>
                                <option value="paused">Paused</option>
                                <option value="pending">Pending</option>
                                <option value="expired">Expired</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label class="filter-label">Ad Type</label>
                            <select class="filter-select">
                                <option value="">All Types</option>
                                <option value="banner">Banner</option>
                                <option value="sponsor">Sponsored</option>
                                <option value="popup">Popup</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label class="filter-label">Date Range</label>
                            <select class="filter-select">
                                <option value="">All Time</option>
                                <option value="today">Today</option>
                                <option value="week">This Week</option>
                                <option value="month">This Month</option>
                                <option value="quarter">This Quarter</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label class="filter-label">Search</label>
                            <input type="text" class="filter-input" placeholder="Ad name or ID">
                        </div>
                    </form>
                </div>

                <!-- Active Campaigns Section -->
                <div class="content-section">
                    <div class="section-header">
                        <h2 class="section-title">Active Campaigns</h2>
                        <div class="cms-actions">
                            <button class="cms-btn">
                                <i class="fas fa-file-export"></i> Export Report
                            </button>
                        </div>
                    </div>

                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Ad Campaign</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Impressions</th>
                                <th>Clicks</th>
                                <th>CTR</th>
                                <th>Budget Used</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="ad-title">Tech Talent Recruitment</div>
                                    <div class="small">ID: AD-2023-001</div>
                                </td>
                                <td><span class="ad-type type-banner">Banner</span></td>
                                <td><span class="ad-status status-active">Active</span></td>
                                <td>42,189</td>
                                <td>1,248</td>
                                <td>2.96%</td>
                                <td>
                                    <div>$1,250 / $5,000</div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 25%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm btn-icon">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline btn-sm btn-icon">
                                            <i class="fas fa-chart-bar"></i>
                                        </button>
                                        <button class="btn btn-outline btn-sm btn-icon">
                                            <i class="fas fa-pause"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="ad-title">Remote Work Summit</div>
                                    <div class="small">ID: AD-2023-045</div>
                                </td>
                                <td><span class="ad-type type-sponsor">Sponsored</span></td>
                                <td><span class="ad-status status-active">Active</span></td>
                                <td>28,456</td>
                                <td>842</td>
                                <td>2.96%</td>
                                <td>
                                    <div>$3,800 / $10,000</div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 38%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm btn-icon">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline btn-sm btn-icon">
                                            <i class="fas fa-chart-bar"></i>
                                        </button>
                                        <button class="btn btn-outline btn-sm btn-icon">
                                            <i class="fas fa-pause"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="ad-title">Developer Bootcamp</div>
                                    <div class="small">ID: AD-2023-087</div>
                                </td>
                                <td><span class="ad-type type-popup">Popup</span></td>
                                <td><span class="ad-status status-active">Active</span></td>
                                <td>67,831</td>
                                <td>2,154</td>
                                <td>3.18%</td>
                                <td>
                                    <div>$2,100 / $3,000</div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 70%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm btn-icon">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline btn-sm btn-icon">
                                            <i class="fas fa-chart-bar"></i>
                                        </button>
                                        <button class="btn btn-outline btn-sm btn-icon">
                                            <i class="fas fa-pause"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="ad-title">HR Software Solutions</div>
                                    <div class="small">ID: AD-2023-112</div>
                                </td>
                                <td><span class="ad-type type-banner">Banner</span></td>
                                <td><span class="ad-status status-active">Active</span></td>
                                <td>38,765</td>
                                <td>987</td>
                                <td>2.55%</td>
                                <td>
                                    <div>$1,800 / $4,000</div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 45%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm btn-icon">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline btn-sm btn-icon">
                                            <i class="fas fa-chart-bar"></i>
                                        </button>
                                        <button class="btn btn-outline btn-sm btn-icon">
                                            <i class="fas fa-pause"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="ad-title">Executive Job Board</div>
                                    <div class="small">ID: AD-2023-125</div>
                                </td>
                                <td><span class="ad-type type-sponsor">Sponsored</span></td>
                                <td><span class="ad-status status-active">Active</span></td>
                                <td>15,342</td>
                                <td>512</td>
                                <td>3.34%</td>
                                <td>
                                    <div>$850 / $2,500</div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 34%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm btn-icon">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline btn-sm btn-icon">
                                            <i class="fas fa-chart-bar"></i>
                                        </button>
                                        <button class="btn btn-outline btn-sm btn-icon">
                                            <i class="fas fa-pause"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Other Campaigns Section -->
                {{-- <div class="content-section">
                    <div class="section-header">
                        <h2 class="section-title">All Campaigns</h2>
                        <div class="cms-actions">
                            <button class="cms-btn">
                                <i class="fas fa-plus"></i> Create New
                            </button>
                        </div>
                    </div>

                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Ad Campaign</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Budget</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="ad-title">Tech Talent Recruitment</div>
                                    <div class="small">ID: AD-2023-001</div>
                                </td>
                                <td><span class="ad-type type-banner">Banner</span></td>
                                <td><span class="ad-status status-active">Active</span></td>
                                <td>2023-05-01</td>
                                <td>2023-08-31</td>
                                <td>$5,000</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-outline btn-sm">Report</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="ad-title">Career Fair 2023</div>
                                    <div class="small">ID: AD-2023-025</div>
                                </td>
                                <td><span class="ad-type type-sponsor">Sponsored</span></td>
                                <td><span class="ad-status status-expired">Expired</span></td>
                                <td>2023-03-15</td>
                                <td>2023-04-30</td>
                                <td>$3,500</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-outline btn-sm">Report</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="ad-title">Resume Builder Tool</div>
                                    <div class="small">ID: AD-2023-067</div>
                                </td>
                                <td><span class="ad-type type-popup">Popup</span></td>
                                <td><span class="ad-status status-paused">Paused</span></td>
                                <td>2023-06-10</td>
                                <td>2023-09-10</td>
                                <td>$1,200</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-outline btn-sm">Report</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="ad-title">Premium Job Alerts</div>
                                    <div class="small">ID: AD-2023-089</div>
                                </td>
                                <td><span class="ad-type type-banner">Banner</span></td>
                                <td><span class="ad-status status-pending">Pending</span></td>
                                <td>2023-07-01</td>
                                <td>2023-10-01</td>
                                <td>$2,800</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-outline btn-sm">Approve</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="ad-title">Interview Prep Course</div>
                                    <div class="small">ID: AD-2023-102</div>
                                </td>
                                <td><span class="ad-type type-sponsor">Sponsored</span></td>
                                <td><span class="ad-status status-expired">Expired</span></td>
                                <td>2023-02-01</td>
                                <td>2023-03-31</td>
                                <td>$1,500</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-outline btn-sm">Report</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}
            </div>

            <!-- Footer -->
        </main>
    @endsection


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Create New Ad button
            // const newAdBtn = document.querySelector('.cms-actions .cms-btn:first-child');
            // newAdBtn.addEventListener('click', function () {
            //     alert('Opening new ad creation form...');
            //     // In a real app, this would open a modal or new page
            // });

            // Pause buttons in active campaigns
            const pauseButtons = document.querySelectorAll('.btn-outline .fa-pause').forEach(icon => {
                icon.closest('button').addEventListener('click', function () {
                    const campaign = this.closest('tr').querySelector('.ad-title').textContent;
                    alert(`Pausing campaign: ${campaign}`);
                    this.innerHTML = '<i class="fas fa-play"></i>';
                });
            });

            // Edit buttons
            const editButtons = document.querySelectorAll('.btn-primary');
            editButtons.forEach(btn => {
                if (!btn.querySelector('.fa-chart-bar')) { // Exclude report buttons
                    btn.addEventListener('click', function () {
                        const row = this.closest('tr');
                        const title = row.querySelector('.ad-title').textContent;
                        alert(`Editing campaign: ${title}`);
                    });
                }
            });

            // Report buttons
            const reportButtons = document.querySelectorAll('.btn-outline:not(.btn-sm)');
            reportButtons.forEach(btn => {
                if (btn.textContent.includes('Report')) {
                    btn.addEventListener('click', function () {
                        const row = this.closest('tr');
                        const title = row.querySelector('.ad-title').textContent;
                        alert(`Generating report for: ${title}`);
                    });
                }
            });

            // Filter apply button
            const applyFilterBtn = document.querySelector('.filter-actions .btn:first-child');
            applyFilterBtn.addEventListener('click', function () {
                alert('Applying filters to campaigns...');
            });
        });
    </script>
</body>

</html>