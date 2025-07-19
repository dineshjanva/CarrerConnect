<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Applications Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Employeer/candidate.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    @include('user.layout.navbar')

    <!-- Applications Dashboard Content -->
    <main class="dashboard-container">
        <div class="page-header">
            <h1 class="page-title">Job Applications</h1>
            <div class="page-actions">
                <button class="action-btn">
                    <i class="fas fa-download"></i> Export
                </button>
                <button class="action-btn">
                    <i class="fas fa-filter"></i> Filters
                </button>
            </div>
        </div>

        <div class="filter-section">
            <div class="filter-row">
                <input type="text" id="customSearch" class="search-input"
                    placeholder="Search by candidate name or job title...">
                <button class="search-btn">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>

            <div class="filter-row">
                <div class="filter-group">
                    <label for="job-filter">Job Position</label>
                    <select id="job-filter" class="filter-select">
                        <option>All Positions</option>
                        <option>Frontend Developer</option>
                        <option>Backend Engineer</option>
                        <option>UX Designer</option>
                        <option>Product Manager</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="status-filter">Application Status</label>
                    <select id="status-filter" class="filter-select">
                        <option>All Statuses</option>
                        <option>New</option>
                        <option>In Review</option>
                        <option>Interview</option>
                        <option>Rejected</option>
                        <option>Hired</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="date-filter">Date Applied</label>
                    <select id="date-filter" class="filter-select">
                        <option>All Time</option>
                        <option>Last 7 Days</option>
                        <option>Last 30 Days</option>
                        <option>Last 6 Months</option>
                    </select>
                </div>
            </div>
        </div>

        <h2>Candidate Applications</h2>

        <div class="container">
            {{-- <h2>Job Applications</h2> --}}
            <table id="applications-table" class="table applications-table">
                <thead>
                    <tr>
                        <th>Candidate</th>
                        <th>Job Position</th>
                        <th>Date Applied</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>


        <!-- Load jQuery FIRST -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#applications-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('companyApplyCandidate') }}",
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'full_name', name: 'full_name', orderable: true },
                        { data: 'email', name: 'email', orderable: true },
                        { data: 'current_location', name: 'current_location', orderable: true },
                        { data: 'created_at', name: 'created_at', orderable: true }
                    ]
                });
            });
        </script>

        {{-- pagination --}}
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
                    // In a real app, this would filter the applications
                });
            });

            // Search functionality
            const searchBtn = document.querySelector('.search-btn');
            searchBtn.addEventListener('click', function () {
                const searchInput = document.querySelector('.search-input');
                alert(`Searching for: ${searchInput.value}`);
                // In a real app, this would search applications
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

            // Export button
            const exportBtn = document.querySelector('.action-btn:first-child');
            exportBtn.addEventListener('click', function () {
                alert('Exporting applications data...');
                // In a real app, this would export data
            });

            // Filter button
            const filterBtn = document.querySelector('.action-btn:last-child');
            filterBtn.addEventListener('click', function () {
                document.querySelector('.filter-section').scrollIntoView({ behavior: 'smooth' });
            });
        });
    </script>
</body>

</html>

{{-- <div class="pagination">
    <button class="pagination-btn"><i class="fas fa-chevron-left"></i></button>
    <button class="pagination-btn active">1</button>
    <button class="pagination-btn">2</button>
    <button class="pagination-btn">3</button>
    <button class="pagination-btn"><i class="fas fa-chevron-right"></i></button>
</div> --}}
{{-- <div class="pagination">
    <button class="pagination-btn" id="prevPage"><i class="fas fa-chevron-left"></i></button>
    <button class="pagination-btn page-num active" data-page="1">1</button>
    <button class="pagination-btn page-num" data-page="2">2</button>
    <button class="pagination-btn page-num" data-page="3">3</button>
    <button class="pagination-btn" id="nextPage"><i class="fas fa-chevron-right"></i></button>
</div> --}}

{{-- <div class="pagination mt-3" id="customPagination">
    <button class="pagination-btn prev"><i class="fas fa-chevron-left"></i></button>
    <div id="page-numbers"></div>
    <button class="pagination-btn next"><i class="fas fa-chevron-right"></i></button>
</div> --}}
