<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Company Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Employeer/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <!-- Header -->
    @include('user.layout.navbar')

    <!-- Dashboard Content -->
    <div class="container">
        <div class="dashboard-container">
            <!-- Sidebar -->
            <div class="dashboard-sidebar">
                <!-- Company Profile Card -->
                <div class="card company-card">
                    <div class="company-logo" style="text-transform: capitalize">
                        @php
                            $name = $companyDetails->name;
                            $first = $name ? mb_substr($name, 0, 1) : '';
                            $second = '';
                            $spacePos = mb_strpos($name, ' ');
                            if ($spacePos !== false && mb_strlen($name) > $spacePos + 1) {
                                $second = mb_substr($name, $spacePos + 1, 1);
                            }
                        @endphp
                        {{ $first }}{{ $second ? '' . $second : '' }}
                    </div>
                    <h3 class="company-name">{{ $companyDetails->name }}</h3>
                    <p class="company-tagline">{{ $companyDetails->tagline }}</p>
                    <div class="company-stats">
                        <div class="stat-item">
                            <div class="stat-number">{{ number_format(count($companyJobPosts)) }}</div>
                            <div class="stat-label">Active Jobs</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">{{ number_format(count($jobApplication)) }}</div>
                            <div class="stat-label">Applications</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="dashboard-main">
                <!-- Metrics Overview -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Overview</h3>
                        <div>
                            {{-- <button class="action-btn1 secondary">
                                <i class="fas fa-calendar"></i> Last 30 Days
                            </button> --}}
                        </div>
                    </div>
                    <div class="metrics-grid">
                        <div class="metric-card">
                            <div class="metric-header">
                                <div class="metric-icon" style="background: #e0f2fe; color: #0284c7;">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div>
                                    <div class="metric-title">Active Jobs</div>
                                    <div class="metric-value">{{ number_format(count($companyJobPosts)) }}</div>
                                </div>
                            </div>
                            <div class="metric-change positive">
                                <i class="fas fa-arrow-up"></i> 12% from last month
                            </div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-header">
                                <div class="metric-icon" style="background: #dcfce7; color: #16a34a;">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div>
                                    <div class="metric-title">Applications</div>
                                    <div class="metric-value">{{ number_format(count($jobApplication)) }}</div>
                                </div>
                            </div>
                            <div class="metric-change positive">
                                <i class="fas fa-arrow-up"></i> 8% from last month
                            </div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-header">
                                <div class="metric-icon" style="background: #fef3c7; color: #d97706;">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <div class="metric-title">New Candidates</div>
                                    <div class="metric-value">42</div>
                                </div>
                            </div>
                            <div class="metric-change negative">
                                <i class="fas fa-arrow-down"></i> 3% from last month
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Listings -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Active Job Listings</h3>
                        <div style="display: flex; justify-content: center; align-items: center; gap: 3px;">
                            <a class="action-btn1" style="text-decoration: none;" href="{{ route('addJob.page') }}">
                                <i class="fas fa-plus"></i> New Job
                            </a>
                            <a class="action-btn1" style="text-decoration: none; background-color: #10b981;"
                                href="{{ route('companyPostedJob') }}">
                                <i class="fas fa-eye"></i>View All
                            </a>
                        </div>
                    </div>

                    @foreach ($companyJobPosts as $cjp)
                        <div class="job-list">
                            <div class="job-item">
                                <div class="job-info">
                                    <div class="job-title">{{ $cjp->job_title }}</div>
                                    <div class="job-meta">
                                        <span><i class="fas fa-map-marker-alt"></i> {{ $cjp->company_name }}</span>
                                        <span><i class="fas fa-dollar-sign"></i> ${{ $cjp->salary_range }}</span>
                                        <span><i class="fas fa-user"></i> {{ $cjp->company_id }} Applications</span>
                                    </div>
                                </div>
                                <div class="job-actions">
                                    <span class="job-status status-active">{{ $cjp->job_type }}</span>
                                    <button class="action-btn1 secondary" style="padding: 5px 10px;">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                            </div>
                    @endforeach

                    </div>
                </div>

                <!-- Recent Applications -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Applications</h3>
                        <a href="{{ route('companyApplyCandidate') }}" style="font-size: 14px; color: #2563eb;">View
                            All</a>
                    </div>
                    @foreach ($lastestJobApplication as $ljp)
                        <div class="applications-list">
                            <div class="job-item">
                                <div class="job-info">
                                    <div class="job-title">{{ $ljp->full_name }}</div>
                                    <div class="job-meta">
                                        <span>{{ $ljp->email }}</span>
                                        <span>Applied: {{ $ljp->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="job-actions">
                                    <span class="job-status status-active">New</span>
                                    <a href="{{ route('viewProfile', ['id' => $ljp->user_id]) }}" class="action-btn1"
                                        style="padding: 5px 10px; text-decoration: none;">

                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </div>
                            </div>
                    @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
</body>

</html>