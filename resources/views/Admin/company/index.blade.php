<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect Admin | Companies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
</head>

<body>
    @include('admin.layout.sidebar')
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
       
        @include('admin.layout.topnav')

        <!-- Page Content -->
        <div class="page-content">
            <div class="page-header">
                <h1 class="page-title">Company Management</h1>
                <ul class="breadcrumb">
                    <li>Admin</li>
                    <li class="active">Companies</li>
                </ul>
            </div>

            <!-- Company Statistics -->
            <div class="company-stats">
                <div class="stat-card">
                    <div class="stat-value">{{ number_format($totalCompanies) }}</div>
                    <div class="stat-label">Total Companies</div>
                </div>
                <!-- <div class="stat-card">
                    <div class="stat-value">1,892</div>
                    <div class="stat-label">Verified Companies</div>
                </div> -->
                <div class="stat-card">
                    <div class="stat-value">{{ number_format($totalMonthCompanies) }}</div>
                    <div class="stat-label">New This Month</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ number_format($jobsPost) }}</div>
                    <div class="stat-label">Total Jobs Posted</div>
                </div>
            </div>
            

            <!-- Company Table -->
            <div class="company-table-container">
                <div class="table-header">
                    <h3 class="table-title">Registered Companies</h3>
                    <div class="table-actions">
                        <!-- <button class="btn">
                            <i class="fas fa-plus"></i> Add Company
                        </button> -->
                        <button class="btn">
                            <i class="fas fa-download" id="exportBtn"></i> Export
                        </button>
                    </div>
                </div>

                <table id="companies-table" class="display">
                    <thead>
                        <tr>
                            <th>Company <i class="fas fa-sort"></i></th>
                            <!-- <th>Job Posts <i class="fas fa-sort"></i></th> -->
                            <th>Industry <i class="fas fa-sort"></i></th>
                            <th>Employee Size<i class="fas fa-sort"></i></th>
                            <th>Location<i class="fas fa-sort"></i></th>
                            <th>Joined Date <i class="fas fa-sort"></i></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

                    <!-- Load jQuery FIRST -->
                    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> 

                    <!-- Then DataTables and buttons -->
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

                    <script>

                        $(document).ready(function () {
                            // ✅ Initialize DataTable
                            let table = $('#companies-table').DataTable({
                                processing: true,
                                serverSide: true,
                                pageLength: 10, // Show 10 records per page
                                ajax: "{{ route('admin.allCompanies') }}", // Adjust the route as necessary
                                columns: [
                                    { data: 'name', name: 'name' },
                                    { data: 'industry', name: 'industry' },
                                    { data: 'employee_size', name: 'employee_size' },
                                    { data: 'location', name: 'location' },
                                    { data: 'created_at', name: 'created_at' }
                                ],
                                dom: 'Bfrtip',
                                buttons: [
                                    {
                                        extend: 'excel',
                                        className: 'd-none', // Hidden button
                                        title: 'Companies_Export'
                                    }
                                ]
                            });

                            // ✅ Attach click event after DataTable initialized
                            $('#exportBtn').on('click', function () {
                                table.button('.buttons-excel').trigger();

                                // Use draw.dt event for custom pagination styling
                                $('#companies-table').on('draw.dt', function () {
                                    $('.dataTables_paginate').addClass('custom-pagination');
                                    $('.paginate_button').addClass('pagination-btn');
                                    $('.paginate_button.current').addClass('active');
                                });
                            });
                        });

                    </script>
            </div>

            <!-- Footer -->
            @include('admin.layout.footer')
        </div>
    </div>
</body>

</html>