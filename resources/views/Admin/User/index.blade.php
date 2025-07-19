<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect Admin | Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
</head>

<body>
    <!-- Sidebar -->
    @include('admin.layout.sidebar')
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <div class="top-nav">
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
        </div>

        <!-- Page Content -->
        <div class="page-content">
            <div class="page-header">
                <h1 class="page-title">User Management</h1>
                <ul class="breadcrumb">
                    <li>Admin</li>
                    <li class="active">Users</li>
                </ul>
            </div>

            <!-- User Statistics -->
            <div class="user-stats">
                <div class="stat-card">
                    <div class="stat-value">{{ number_format($totalUser) }}</div>
                    <div class="stat-label">Total Users</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ number_format($totalUser) }}</div>
                    <div class="stat-label">Active Users</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ number_format($totalEmployer) }}</div>
                    <div class="stat-label">Employers</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ number_format($totalMonthUser) }}</div>
                    <div class="stat-label">New This Month</div>
                </div>
            </div>
            <!-- User Table -->
            <div class="user-table-container">
                <div class="table-header">
                    <h3 class="table-title">All Users</h3>
                    <div class="table-actions">
                        <!-- <button class="btn">
                            <i class="fas fa-plus"></i> Add User
                        </button> -->

                        <button class="btn dropdown-toggle" id="exportBtn">
                            <i class="fas fa-download"></i> Export
                        </button>
                        <div id="hidden-export-buttons" style="display: none;"></div>

                    </div>
                </div>

                <!-- User Table -->
                <table id="users-table" class="display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Industry</th>
                            <th>Joined Date</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

                <!-- DataTables + Buttons CSS -->
                <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

                <!-- JS Dependencies -->
                <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

                <script>
                    $(document).ready(function () {
                        // ✅ Initialize DataTable first
                        let table = $('#users-table').DataTable({
                            processing: true,
                            serverSide: true,
                            pageLength: 10, // Show 10 records per page
                            ajax: "{{ route('adminUsersPage') }}",
                            columns: [
                                { data: 'name', name: 'name' },
                                { data: 'email', name: 'email' },
                                { data: 'role', name: 'role' },
                                { data: 'phone', name: 'phone' },
                                { data: 'location', name: 'location' },
                                { data: 'industry', name: 'industry' },
                                { data: 'created_at', name: 'created_at' }
                            ],
                            dom: 'Bfrtip',
                            buttons: [
                                {
                                    extend: 'excel',
                                    className: 'd-none', // Hidden button
                                    title: 'Users_Export'
                                }
                            ]
                        });
                        // main code to connect Backend
                        $('#exportBtn').on('click', function () {
                            table.button('.buttons-excel').trigger();

                            $(document).ready(function () {
                                $('#users-table').on('draw.dt', function () {
                                    $('.dataTables_paginate').addClass('custom-pagination');
                                    $('.paginate_button').addClass('pagination-btn');
                                    $('.paginate_button.current').addClass('active');
                                });
                            });
                        });
                    });
                </script>
            </div>
            <!-- Footer -->
            @include('admin.layout.footer')
        </div>
    </div>
    <!-- DataTables Buttons CSS -->
    <script>
        // JavaScript for admin users page
        document.addEventListener('DOMContentLoaded', function () {
            // Table sorting functionality (simplified)
            const tableHeaders = document.querySelectorAll('th');

            tableHeaders.forEach(header => {
                header.addEventListener('click', function () {
                    const currentSort = this.getAttribute('data-sort');
                    const newSort = currentSort === 'asc' ? 'desc' : 'asc';

                    // Remove sort attributes from all headers
                    tableHeaders.forEach(h => {
                        h.removeAttribute('data-sort');
                        const icon = h.querySelector('i');
                        if (icon) icon.className = 'fas fa-sort';
                    });

                    // Set sort attribute and icon for this header
                    this.setAttribute('data-sort', newSort);
                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.className = newSort === 'asc'
                            ? 'fas fa-sort-up'
                            : 'fas fa-sort-down';
                    }

                    // In a real application, you would sort the table data here
                });
            });
            // Filter functionality
            const filterBtn = document.querySelector('.filter-container .btn');
            filterBtn.addEventListener('click', function () {
                // In a real application, this would filter the user table
                alert('Filter functionality would be implemented here');
            });

            // Action buttons
            const actionButtons = document.querySelectorAll('.action-btn');
            actionButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const action = this.querySelector('i').className;
                    const row = this.closest('tr');
                    const userName = row.querySelector('.user-cell').textContent.trim();

                    if (action.includes('eye')) {
                        alert(`View profile for ${userName}`);
                    } else if (action.includes('edit')) {
                        alert(`Edit user ${userName}`);
                    } else if (action.includes('ban')) {
                        alert(`Suspend user ${userName}`);
                    } else if (action.includes('check')) {
                        alert(`Activate user ${userName}`);
                    }
                });
            });
            // Pagination
            const paginationBtns = document.querySelectorAll('.pagination-btn');
            paginationBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    paginationBtns.forEach(b => b.classList.remove('active'));

                    if (!this.querySelector('i')) {
                        this.classList.add('active');
                    }
                });
            });
        });
    </script>
</body>

</html>
