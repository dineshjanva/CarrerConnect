@extends('admin.pages.master')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Website Analytics</title>
    <link rel="stylesheet" href="{{ asset('css/admin/cms.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Main Content */
        .main-content1 {
            flex: 1;
            padding-top: 70px;
        }

        .content-container {
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

        .date-filter {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-btn {
            padding: 8px 15px;
            background-color: var(--white);
            border: 1px solid #ddd;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-btn.active {
            background-color: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }

        /* Analytics Cards */
        .analytics-overview {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .metric-card {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            border-top: 4px solid var(--primary-blue);
        }

        .metric-card.visitors {
            border-top-color: var(--primary-blue);
        }

        .metric-card.users {
            border-top-color: var(--success);
        }

        .metric-card.bounce {
            border-top-color: var(--warning);
        }

        .metric-card.conversion {
            border-top-color: var(--danger);
        }

        .metric-value {
            font-size: 32px;
            font-weight: 700;
            margin: 10px 0;
        }

        .metric-title {
            font-size: 16px;
            color: var(--medium-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .metric-change {
            font-size: 14px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 4px;
        }

        .metric-change.positive {
            background-color: rgba(40, 167, 69, 0.15);
            color: var(--success);
        }

        .metric-change.negative {
            background-color: rgba(220, 53, 69, 0.15);
            color: var(--danger);
        }

        /* Charts Section */
        .charts-row1 {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .chart-container1 {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            height: 400px;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark-gray);
        }

        .chart-actions {
            display: flex;
            gap: 10px;
        }

        .chart-actions button {
            background: none;
            border: none;
            color: var(--medium-gray);
            cursor: pointer;
        }

        .chart-actions button:hover {
            color: var(--primary-blue);
        }

        /* Data Tables */
        .data-section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--dark-gray);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-blue);
        }

        .data-table {
            width: 100%;
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-collapse: collapse;
        }

        .data-table th {
            background-color: var(--primary-blue);
            color: white;
            text-align: left;
            padding: 15px;
            font-weight: 600;
        }

        .data-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        .data-table tr:hover {
            background-color: var(--light-gray);
        }

        .country-flag {
            width: 24px;
            margin-right: 10px;
            vertical-align: middle;
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
            .charts-row1 {
                grid-template-columns: 1fr;
            }

            .chart-container1 {
                height: 350px;
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

            .analytics-overview {
                grid-template-columns: 1fr 1fr;
            }

            .footer-container {
                flex-direction: column;
                gap: 15px;
            }
        }

        @media (max-width: 576px) {
            .analytics-overview {
                grid-template-columns: 1fr;
            }

            .date-filter {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>
    <!-- Main Content -->

    @section('contant')

        <main class="main-content1">
            <div class="content-container">
                <div class="page-header">
                    <h1 class="page-title">Website Analytics</h1>
                    <div class="date-filter">
                        <button class="filter-btn active">Today</button>
                        <button class="filter-btn">7 Days</button>
                        <button class="filter-btn">30 Days</button>
                        <button class="filter-btn">90 Days</button>
                        <button class="filter-btn">
                            <i class="fas fa-calendar"></i> Custom Range
                        </button>
                    </div>
                </div>

                <!-- Analytics Overview -->
                <div class="analytics-overview">
                    <div class="metric-card visitors">
                        <div class="metric-title">
                            <span>Total Visitors</span>
                            <span class="metric-change positive">
                                <i class="fas fa-arrow-up"></i> 12.5%
                            </span>
                        </div>
                        <div class="metric-value">24,568</div>
                        <div class="metric-info">Compared to 21,832 last period</div>
                    </div>

                    <div class="metric-card users">
                        <div class="metric-title">
                            <span>New Users</span>
                            <span class="metric-change positive">
                                <i class="fas fa-arrow-up"></i> 8.2%
                            </span>
                        </div>
                        <div class="metric-value">8,412</div>
                        <div class="metric-info">Compared to 7,774 last period</div>
                    </div>

                    <div class="metric-card bounce">
                        <div class="metric-title">
                            <span>Bounce Rate</span>
                            <span class="metric-change negative">
                                <i class="fas fa-arrow-down"></i> 3.1%
                            </span>
                        </div>
                        <div class="metric-value">32.4%</div>
                        <div class="metric-info">Compared to 35.5% last period</div>
                    </div>

                    <div class="metric-card conversion">
                        <div class="metric-title">
                            <span>Conversion Rate</span>
                            <span class="metric-change positive">
                                <i class="fas fa-arrow-up"></i> 5.7%
                            </span>
                        </div>
                        <div class="metric-value">4.8%</div>
                        <div class="metric-info">Compared to 4.3% last period</div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="charts-row1">
                    <div class="chart-container1">
                        <div class="chart-header">
                            <div class="chart-title">Traffic Overview</div>
                            <div class="chart-actions">
                                <button title="Download">
                                    <i class="fas fa-download"></i>
                                </button>
                                <button title="Expand">
                                    <i class="fas fa-expand"></i>
                                </button>
                            </div>
                        </div>
                        <canvas id="trafficChart"></canvas>
                    </div>

                    <div class="chart-container1">
                        <div class="chart-header">
                            <div class="chart-title">Traffic Sources</div>
                            <div class="chart-actions">
                                <button title="Download">
                                    <i class="fas fa-download"></i>
                                </button>
                            </div>
                        </div>
                        <canvas id="sourceChart"></canvas>
                    </div>
                </div>

                <!-- Additional Charts -->
                <div class="charts-row1">
                    <div class="chart-container1">
                        <div class="chart-header">
                            <div class="chart-title">User Engagement</div>
                            <div class="chart-actions">
                                <button title="Download">
                                    <i class="fas fa-download"></i>
                                </button>
                            </div>
                        </div>
                        <canvas id="engagementChart"></canvas>
                    </div>

                    <div class="chart-container1">
                        <div class="chart-header">
                            <div class="chart-title">Device Distribution</div>
                            <div class="chart-actions">
                                <button title="Download">
                                    <i class="fas fa-download"></i>
                                </button>
                            </div>
                        </div>
                        <canvas id="deviceChart"></canvas>
                    </div>
                </div>
                <!-- Data Tables -->
            </div>
        </main>
    @endsection

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Traffic Chart
            const trafficCtx = document.getElementById('trafficChart').getContext('2d');
            const trafficChart = new Chart(trafficCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'Total Visitors',
                        data: [18500, 20200, 19800, 23400, 24500, 22800, 26500],
                        borderColor: '#0a66c2',
                        backgroundColor: 'rgba(10, 102, 194, 0.1)',
                        tension: 0.3,
                        fill: true
                    }, {
                        label: 'New Users',
                        data: [5200, 6100, 5800, 7200, 7800, 7100, 8400],
                        borderColor: '#28a745',
                        backgroundColor: 'rgba(40, 167, 69, 0.1)',
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Source Chart
            const sourceCtx = document.getElementById('sourceChart').getContext('2d');
            const sourceChart = new Chart(sourceCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Organic Search', 'Direct', 'Social Media', 'Referral', 'Email'],
                    datasets: [{
                        data: [45, 25, 15, 10, 5],
                        backgroundColor: [
                            '#0a66c2',
                            '#28a745',
                            '#ffc107',
                            '#dc3545',
                            '#6f42c1'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    }
                }
            });

            // Engagement Chart
            const engagementCtx = document.getElementById('engagementChart').getContext('2d');
            const engagementChart = new Chart(engagementCtx, {
                type: 'bar',
                data: {
                    labels: ['Job Listings', 'Company Pages', 'Career Resources', 'Job Applications', 'Profile Pages'],
                    datasets: [{
                        label: 'Avg. Time Spent (minutes)',
                        data: [4.2, 3.5, 5.1, 2.8, 3.9],
                        backgroundColor: 'rgba(10, 102, 194, 0.7)',
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Device Chart
            const deviceCtx = document.getElementById('deviceChart').getContext('2d');
            const deviceChart = new Chart(deviceCtx, {
                type: 'pie',
                data: {
                    labels: ['Desktop', 'Mobile', 'Tablet'],
                    datasets: [{
                        data: [62, 34, 4],
                        backgroundColor: [
                            '#0a66c2',
                            '#28a745',
                            '#ffc107'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    }
                }
            });

            // Date filter buttons
            const filterBtns = document.querySelectorAll('.filter-btn');
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    // In a real app, this would update the charts with new data
                    alert(`Filter changed to: ${this.textContent.trim()}`);
                });
            });
        });
    </script>
</body>

</html>

{{-- <div class="data-section">
    <h2 class="section-title">Top Performing Pages</h2>
    <table class="data-table">
        <thead>
            <tr>
                <th>Page</th>
                <th>Visitors</th>
                <th>Avg. Time</th>
                <th>Bounce Rate</th>
                <th>Conversions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>/find-jobs</td>
                <td>8,452</td>
                <td>3m 24s</td>
                <td>28.4%</td>
                <td>1,254</td>
            </tr>
            <tr>
                <td>/companies</td>
                <td>5,678</td>
                <td>2m 45s</td>
                <td>32.7%</td>
                <td>842</td>
            </tr>
            <tr>
                <td>/resources/career-advice</td>
                <td>4,215</td>
                <td>4m 12s</td>
                <td>25.1%</td>
                <td>315</td>
            </tr>
            <tr>
                <td>/job/123-senior-developer</td>
                <td>3,987</td>
                <td>2m 18s</td>
                <td>41.3%</td>
                <td>587</td>
            </tr>
            <tr>
                <td>/company/techcorp</td>
                <td>3,452</td>
                <td>3m 05s</td>
                <td>29.8%</td>
                <td>421</td>
            </tr>
        </tbody>
    </table>
</div> --}}
{{-- <div class="data-section">
    <h2 class="section-title">User Demographics</h2>
    <table class="data-table">
        <thead>
            <tr>
                <th>Country</th>
                <th>Users</th>
                <th>Sessions</th>
                <th>Avg. Duration</th>
                <th>New Users</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="https://flagcdn.com/16x12/us.png" class="country-flag"> United States</td>
                <td>12,458</td>
                <td>18,745</td>
                <td>3m 42s</td>
                <td>8,412</td>
            </tr>
            <tr>
                <td><img src="https://flagcdn.com/16x12/gb.png" class="country-flag"> United Kingdom</td>
                <td>3,457</td>
                <td>5,214</td>
                <td>2m 58s</td>
                <td>2,145</td>
            </tr>
            <tr>
                <td><img src="https://flagcdn.com/16x12/ca.png" class="country-flag"> Canada</td>
                <td>2,845</td>
                <td>4,123</td>
                <td>3m 15s</td>
                <td>1,854</td>
            </tr>
            <tr>
                <td><img src="https://flagcdn.com/16x12/au.png" class="country-flag"> Australia</td>
                <td>1,987</td>
                <td>2,856</td>
                <td>2m 45s</td>
                <td>1,245</td>
            </tr>
            <tr>
                <td><img src="https://flagcdn.com/16x12/de.png" class="country-flag"> Germany</td>
                <td>1,745</td>
                <td>2,512</td>
                <td>3m 08s</td>
                <td>1,087</td>
            </tr>
        </tbody>
    </table>
</div> --}}