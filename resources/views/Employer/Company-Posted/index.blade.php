<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Job Postings</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Employeer/jobApplication.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body>
    <!-- Header -->
    @include('user.layout.navbar')

    <!-- Job Postings Content -->
    <main class="dashboard-container">
        <div class="page-header">
            <h1 class="page-title">Job Postings</h1>
            <div class="page-actions">
                <a class="action-btn" href="{{ route('addJob.page') }}">
                    <i class="fas fa-plus"></i> Post New Job
                </a>
                <button class="action-btn">
                    <i class="fas fa-download"></i> Export
                </button>
            </div>
        </div>

        <div class="filter-section">

            {{-- <div class="filter-row">
                <input type="text" id="customSearch" class="search-input"
                    placeholder="Search by job title or department...">

                <button class="search-btn">
                    <i class="fas fa-search"></i> Search
                </button>
            </div> --}}

            <div class="filter-row">

                <div class="filter-group">
                    <label for="department-filter">Search</label>
                    <input type="text" id="customSearch" class="search-input1 filter-select"
                        placeholder="Search by job title or department...">
                </div>
                {{-- <div class="filter-group">
                    <label for="department-filter">Department</label>
                    <select id="department-filter" class="filter-select">
                        <option>All Departments</option>
                        <option>Engineering</option>
                        <option>Design</option>
                        <option>Product</option>
                        <option>Marketing</option>
                        <option>Operations</option>
                    </select>
                </div> --}}

                {{-- <div class="filter-group">
                    <label for="type-filter">Job Type</label>
                    <select id="type-filter" class="filter-select">
                        <option>All Types</option>
                        <option>Full-time</option>
                        <option>Part-time</option>
                        <option>Contract</option>
                        <option>Internship</option>
                        <option>Remote</option>
                    </select>
                </div> --}}

                <div class="filter-group">
                    <label for="type-filter">Job Type</label>
                    <select id="type-filter" class="filter-select">
                        <option value="">All Types</option>
                        <option value="full-time">Full-time</option>
                        <option value="part-time">Part-time</option>
                        <option value="contract">Contract</option>
                        <option value="internship">Internship</option>
                        <option value="remote">Remote</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="status-filter">Job Status</label>
                    <select id="status-filter" class="filter-select">
                        <option>All Statuses</option>
                        <option>Active</option>
                        <option>Paused</option>
                        <option>Closed</option>
                    </select>
                </div>
            </div>
        </div>
        <table class="jobs-table" id="job_posted_data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Job Title</th>
                    <th>Company</th>
                    <th>Location</th>
                    <th>Skills</th>
                    <th>Posted On</th>
                    <th>Job_type</th>
                    <th>Action</th>
                </tr>
            </thead>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>


        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>

        <script>
            $(document).ready(function () {

                $.fn.dataTable.ext.errMode = 'none';

                var table = $('#job_posted_data').DataTable({
                    processing: false,
                    serverSide: true,
                    dom: 'lrtip',
                    dom: 'rtip',
                    ajax: {
                        url: "{{ route('companyPostedJob') }}",
                        data: function (d) {
                            d.search_input = $('#customSearch').val();
                            d.job_type = $('#type-filter').val(); // <-- custom filter value

                        }

                    },
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'job_title', name: 'job_title' },
                        { data: 'company_name', name: 'company_name' },
                        { data: 'location', name: 'location' },
                        { data: 'required_skills', name: 'required_skills' },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            render: function (data) {
                                return moment(data).format('DD MMM YYYY, hh:mm A');
                            }
                        },
                        { data: 'job_type', name: 'job_type' },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
                // Trigger table reload on filter change
                $('#customSearch, #type-filter').on('keyup change', function () {
                    table.draw();
                });
            });
        </script>
        {{-- <div class="pagination">
            <button class="pagination-btn"><i class="fas fa-chevron-left"></i></button>
            <button class="pagination-btn active">1</button>
            <button class="pagination-btn">2</button>
            <button class="pagination-btn">3</button>
            <button class="pagination-btn"><i class="fas fa-chevron-right"></i></button>
        </div> --}}
    </main>

    <!-- Footer -->
    @include('user.layout.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Filter functionality
            const filterSelects = document.querySelectorAll('.filter-select');

            filterSelects.forEach(select => {
                select.addEventListener('change', function () {
                    console.log(`Filter changed: ${this.id} = ${this.value}`);
                    // In a real app, this would filter the job postings
                });
            });

            // Search functionality
            const searchBtn = document.querySelector('.search-btn');
            searchBtn.addEventListener('click', function () {
                const searchInput = document.querySelector('.search-input');
                alert(`Searching for: ${searchInput.value}`);
                // In a real app, this would search job postings
            });

            // Pagination buttons
            const paginationBtns = document.querySelectorAll('.pagination-btn');

            paginationBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    if (this.classList.contains('active')) return;

                    // Remove active class from all buttons
                    paginationBtns.forEach(b => b.classList.remove('active'));

                    // Add active class to clicked button
                    this.classList.add('active');
                });
            });

            // New Job button
            const newJobBtn = document.querySelector('.action-btn:first-child');
            newJobBtn.addEventListener('click', function () {
                window.location.href = 'company-post-job.html';
            });

            // Export button
            const exportBtn = document.querySelector('.action-btn:last-child');
            exportBtn.addEventListener('click', function () {
                alert('Exporting job postings data...');
                // In a real app, this would export data
            });
        });
    </script>
</body>

</html>
