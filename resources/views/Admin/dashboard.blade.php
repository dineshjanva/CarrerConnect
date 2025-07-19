<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>🔥 Shandar Admin Dashboard | Bulma + Chart.js</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bulma CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

    <!-- Feather Icons CDN -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            color: #fff;
        }

        .sidebar {
            background: #4a3f7a;
            min-height: 100vh;
            padding: 2rem 1.5rem;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.3);
        }

        .sidebar a {
            color: #c3b8e0;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            transition: background 0.3s, color 0.3s;
            margin-bottom: 0.5rem;
        }

        .sidebar a:hover,
        .sidebar a.is-active {
            background: #7e6fc1;
            color: #fff;
        }

        .sidebar a svg {
            stroke: currentColor;
        }

        .navbar {
            background: transparent !important;
            padding: 1rem 2rem;
            box-shadow: none;
            color: #fff;
        }

        .navbar .navbar-item {
            font-weight: 600;
            font-size: 1.3rem;
        }

        .navbar .navbar-end .navbar-item {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar .navbar-end img {
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .card {
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            color: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .card .card-content p.title {
            font-size: 2.5rem;
            font-weight: 700;
        }

        .card .card-content p.subtitle {
            font-weight: 600;
            color: #d1c4e9;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .table-container {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            padding: 1rem;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
            overflow-x: auto;
        }

        table.table {
            color: #fff;
            width: 100%;
        }

        table.table thead th {
            border-bottom: 2px solid #7e6fc1;
            font-weight: 600;
        }

        table.table tbody tr:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .tag.is-open {
            background-color: #48c774;
            color: #fff;
            font-weight: 600;
            border-radius: 9999px;
        }

        .tag.is-closed {
            background-color: #f14668;
            color: #fff;
            font-weight: 600;
            border-radius: 9999px;
        }

        /* Chart Container Fix */
        .chart-card {
            padding: 2rem;
            margin-bottom: 3rem;
            height: 340px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #jobsChart {
            width: 100% !important;
            height: 300px !important;
            max-height: 300px !important;
            display: block;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="columns is-gapless">
        <!-- Sidebar -->
        <aside class="column is-2 sidebar">
            <p class="is-size-3 has-text-weight-bold mb-6">JobAdmin</p>
            <nav>
                <a href="#" class="is-active"><i data-feather="home"></i> Dashboard</a>
                <a href="#"><i data-feather="users"></i> Users</a>
                <a href="#"><i data-feather="briefcase"></i> Employers</a>
                <a href="#"><i data-feather="file-text"></i> Jobs</a>
                <a href="#"><i data-feather="settings"></i> Settings</a>
            </nav>
            <div style="margin-top: 3rem;">
                <button class="button is-danger is-fullwidth">Logout</button>
            </div>
        </aside>

        <!-- Main content -->
        <div class="column is-flex is-flex-direction-column"
            style="min-height: 100vh; background: linear-gradient(135deg, #7e6fc1, #4a3f7a);">
            <!-- Navbar -->
            <nav class="navbar">
                <div class="navbar-brand">
                    <span>Admin Dashboard</span>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item">
                        Hello, <strong id="adminName">Admin</strong>
                        <figure class="image is-32x32 ml-3">
                            <img id="adminAvatar" src="" alt="Admin Avatar" />
                        </figure>
                    </div>
                </div>
            </nav>

            <!-- Stats Cards -->
            <section class="section" style="flex-grow: 1;">
                <div class="stats-grid">
                    <div class="card">
                        <div class="card-content">
                            <p class="subtitle">Total Users</p>
                            <p class="title" id="totalUsers">0</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <p class="subtitle">Total Employers</p>
                            <p class="title" id="totalEmployers">0</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <p class="subtitle">Total Jobs</p>
                            <p class="title" id="totalJobs">0</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <p class="subtitle">Active Sessions</p>
                            <p class="title" id="activeSessions">0</p>
                        </div>
                    </div>
                </div>

                <!-- Chart Section -->
                <div class="card chart-card">
                    <canvas id="jobsChart"></canvas>
                </div>

                <!-- Latest Jobs Table -->
                <div class="table-container">
                    <h2 class="title is-4 has-text-white mb-4">Latest Job Posts</h2>
                    <table class="table is-fullwidth is-hoverable">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Company</th>
                                <th>Posted At</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="jobsTableBody"></tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <script>
        // Feather icons init
        feather.replace();

        // Demo dynamic data
        const adminName = "Shandar Admin";
        const totalUsers = 12345;
        const totalEmployers = 678;
        const totalJobs = 234;
        const activeSessions = 32;
        const latestJobs = [
            { job_title: 'Frontend Developer', company_name: 'TechCorp', created_at: '2025-07-10', status: 'Open' },
            { job_title: 'Backend Engineer', company_name: 'DataSoft', created_at: '2025-07-09', status: 'Closed' },
            { job_title: 'UI/UX Designer', company_name: 'CreativeX', created_at: '2025-07-08', status: 'Open' },
            { job_title: 'Product Manager', company_name: 'InnoVentures', created_at: '2025-07-06', status: 'Open' }
        ];

        // Set admin info
        document.getElementById('adminName').textContent = adminName;
        document.getElementById('adminAvatar').src = `https://ui-avatars.com/api/?name=${encodeURIComponent(adminName)}&background=4a3f7a&color=fff`;

        // Set stats
        document.getElementById('totalUsers').textContent = totalUsers.toLocaleString();
        document.getElementById('totalEmployers').textContent = totalEmployers.toLocaleString();
        document.getElementById('totalJobs').textContent = totalJobs.toLocaleString();
        document.getElementById('activeSessions').textContent = activeSessions;

        // Fill jobs table
        const tbody = document.getElementById('jobsTableBody');
        latestJobs.forEach(job => {
            const tr = document.createElement('tr');
            const statusClass = job.status === 'Open' ? 'tag is-success is-light' : 'tag is-danger is-light';
            tr.innerHTML = `
        <td>${job.job_title}</td>
        <td>${job.company_name}</td>
        <td>${job.created_at}</td>
        <td><span class="${statusClass}">${job.status}</span></td>
      `;
            tbody.appendChild(tr);
        });

        // Chart.js - Jobs posted over last 6 months demo
        const ctx = document.getElementById('jobsChart').getContext('2d');
        const jobsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Jobs Posted',
                    data: [12, 19, 14, 23, 28, 35],
                    borderColor: '#fff',
                    backgroundColor: 'rgba(255, 255, 255, 0.3)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#764ba2'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Yeh zaroori hai!
                plugins: {
                    legend: {
                        labels: { color: '#fff', font: { weight: '600' } }
                    }
                },
                scales: {
                    x: { ticks: { color: '#ddd' }, grid: { color: 'rgba(255,255,255,0.1)' } },
                    y: { ticks: { color: '#ddd' }, grid: { color: 'rgba(255,255,255,0.1)' }, beginAtZero: true }
                }
            }
        });
    </script>
</body>

</html>