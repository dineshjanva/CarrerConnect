<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
</head>

<body>
    <!-- Sidebar -->
    @include('admin.layout.sidebar')
    <!-- Main Content -->
    <div class="main-content">

        @include('admin.layout.topnav')

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <div class="page-header">
                <h1 class="page-title">Dashboard Overview</h1>
                <ul class="breadcrumb">
                    <li>Home</li>
                    <li class="active">Dashboard</li>
                </ul>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Total Users</div>
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ number_format($totalJobseeker) }}</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i> 12.5% from last month
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Total Companies</div>
                        <div class="stat-icon">
                            <i class="fas fa-building"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ number_format($totalCompany) }}</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i> 8.3% from last month
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Active Jobs</div>
                        <div class="stat-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ number_format($totalJobPosts) }}</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i> 5.7% from last month
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Revenue</div>
                        <div class="stat-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                    <div class="stat-value">$84,295</div>
                    <div class="stat-change negative">
                        <i class="fas fa-arrow-down"></i> 3.2% from last month
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="charts-section">
                <div class="chart-card">
                    <div class="chart-header">
                        <h3 class="chart-title">User Growth</h3>
                        <div class="chart-period">
                            <button class="period-btn active">Week</button>
                            <button class="period-btn">Month</button>
                            <button class="period-btn">Year</button>
                        </div>
                    </div>
                    <div class="chart-container">
                        {{-- [User Growth Chart Would Appear Here] --}}
                        <canvas id="userGrowthChart"></canvas>

                    </div>
                </div>

                <div class="chart-card">
                    <div class="chart-header">
                        <h3 class="chart-title">User Types</h3>
                        <div class="chart-period">
                            <button class="period-btn active">Month</button>
                            <button class="period-btn">Quarter</button>
                            {{-- <button class="period-btn">Year</button> --}}
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="userTypesChart"></canvas>

                        {{-- [User Types Pie Chart Would Appear Here] --}}
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="recent-activity">
                <div class="activity-header">
                    <h3 class="activity-title">Recent Activity</h3>
                    <a href="#" class="view-all">View All</a>
                </div>
                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-message">New user registered: Sarah Johnson</div>
                            <div class="activity-time">10 minutes ago</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-message">TechCorp Inc. posted 3 new jobs</div>
                            <div class="activity-time">45 minutes ago</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-message">Job application submitted for Senior Developer position</div>
                            <div class="activity-time">2 hours ago</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-message">New premium subscription purchased by DigitalMinds</div>
                            <div class="activity-time">5 hours ago</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-message">3 job postings reported by users</div>
                            <div class="activity-time">1 day ago</div>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Recent Users & Companies -->
            <div class="tables-section">
                <div class="table-card">
                    <div class="table-header">
                        <h3 class="table-title">Recent Users</h3>
                        <a href="{{ route('adminUsersPage') }}" class="view-all">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentUsers as $rus)

                                <tr style="text-transform: capitalize;">
                                    <td>
                                        <div class="user-cell">
                                            <!-- <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=100&h=100&q=80" alt="User"> -->
                                            {{ $rus->name }} {{ $rus->lastname }}
                                        </div>
                                    </td>
                                    <td>{{  $rus->getRoleNames()->first()  }}</td>
                                    <td><span class="status active">Active</span></td>
                                    <td>
                                        <button class="action-btn"><i class="fas fa-eye"></i></button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="table-card">
                    <div class="table-header">
                        <h3 class="table-title">Recent Companies</h3>
                        <a href="{{ route('admin.allCompanies') }}" class="view-all">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th>Jobs</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($recentCompany as $rcs)
                                <tr style="text-transform: capitalize;">
                                    <td>
                                        <div class="user-cell">
                                            <!-- <img src="https://via.placeholder.com/40" alt="Company"> -->
                                            {{ $rcs->name }}
                                        </div>
                                    </td>
                                    <td>{{ $rcs->jobs_count  }}</td>
                                    <td><span class="status active">Active</span></td>
                                    <td>
                                        <button class="action-btn"><i class="fas fa-eye"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Footer -->
            @include('admin.layout.footer')
        </div>
    </div>

    <script>
        // Simple JavaScript for admin dashboard functionality
        document.addEventListener('DOMContentLoaded', function () {
            // Toggle submenus
            const hasSubmenu = document.querySelectorAll('.has-submenu');

            hasSubmenu.forEach(item => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    this.classList.toggle('active');
                });
            });

            // Period buttons
            const periodBtns = document.querySelectorAll('.period-btn');

            periodBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    periodBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctxGrowth = document.getElementById('userGrowthChart').getContext('2d');
        const ctxTypes = document.getElementById('userTypesChart').getContext('2d');

        const userGrowthChart = new Chart(ctxGrowth, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Users',
                    data: [],
                    backgroundColor: 'rgba(54, 162, 235, 0.3)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        const userTypesChart = new Chart(ctxTypes, {
            type: 'pie',
            data: {
                labels: [],
                datasets: [{
                    label: 'User Types',
                    data: [],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        '#28a745'
                    ],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' },
                    title: { display: true, text: 'User Types Distribution' }
                }
            }
        });

        async function loadUserGrowth(period) {
            const res = await fetch(`/api/user-growth/${period}`);
            const data = await res.json();
            userGrowthChart.data.labels = data.labels;
            userGrowthChart.data.datasets[0].data = data.values;
            userGrowthChart.update();
        }

        async function loadUserTypes(period) {
            const res = await fetch(`/api/user-types/${period}`);
            const data = await res.json();
            userTypesChart.data.labels = Object.keys(data);
            userTypesChart.data.datasets[0].data = Object.values(data);
            userTypesChart.update();
        }

        document.querySelectorAll('.chart-period .period-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const period = btn.textContent.toLowerCase();
                const chartCard = btn.closest('.chart-card');
                const title = chartCard.querySelector('.chart-title').textContent;

                chartCard.querySelectorAll('.period-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                if (title.includes('User Growth')) {
                    loadUserGrowth(period);
                } else if (title.includes('User Types')) {
                    loadUserTypes(period);
                }
            });
        });

        // Initial load
        loadUserGrowth('week');
        loadUserTypes('month');
    </script>

</body>

</html>