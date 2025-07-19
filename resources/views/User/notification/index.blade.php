<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Notifications</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Notifications Page Styles */
        .notifications-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 32px;
            color: var(--primary-blue);
        }

        .page-actions {
            display: flex;
            gap: 15px;
        }

        .action-btn {
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

        .action-btn:hover {
            background-color: var(--dark-blue);
        }

        .notification-types {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 30px;
        }

        .type-btn {
            padding: 15px 30px;
            background: none;
            border: none;
            cursor: pointer;
            font-weight: 600;
            color: var(--medium-gray);
            position: relative;
            transition: color 0.3s;
        }

        .type-btn:hover, .type-btn.active {
            color: var(--primary-blue);
        }

        .type-btn.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--primary-blue);
        }

        .notification-list {
            background-color: var(--white);
            border: 1px solid #eee;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .notification-group {
            padding: 25px;
            border-bottom: 1px solid #eee;
        }

        .group-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--dark-gray);
        }

        .notification-item {
            display: flex;
            padding: 20px;
            transition: background-color 0.3s;
            position: relative;
        }

        .notification-item:hover {
            background-color: var(--light-gray);
        }

        .notification-item.unread {
            background-color: rgba(10, 102, 194, 0.05);
        }

        .notification-item.unread::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background-color: var(--primary-blue);
        }

        .notification-icon {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .notification-icon.job {
            background-color: #e6f0ff;
            color: var(--primary-blue);
        }

        .notification-icon.follow {
            background-color: #e6f7ee;
            color: #00a651;
        }

        .notification-content {
            flex: 1;
        }

        .notification-message {
            margin-bottom: 8px;
            font-size: 16px;
        }

        .notification-message a {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 600;
        }

        .notification-message a:hover {
            text-decoration: underline;
        }

        .notification-time {
            font-size: 14px;
            color: var(--medium-gray);
            margin-bottom: 10px;
        }

        .notification-actions {
            display: flex;
            gap: 15px;
        }

        .action-link {
            color: var(--primary-blue);
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .action-link:hover {
            text-decoration: underline;
        }

        .mark-read-btn {
            background: none;
            border: none;
            color: var(--medium-gray);
            cursor: pointer;
            font-size: 14px;
            margin-left: auto;
        }

        .mark-read-btn:hover {
            color: var(--dark-gray);
        }

        .no-notifications {
            padding: 60px 20px;
            text-align: center;
        }

        .no-notifications i {
            font-size: 48px;
            color: var(--light-gray);
            margin-bottom: 20px;
        }

        .no-notifications h3 {
            font-size: 22px;
            margin-bottom: 10px;
            color: var(--dark-gray);
        }

        .no-notifications p {
            color: var(--medium-gray);
            margin-bottom: 30px;
        }

        /* Footer */
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            nav {
                display: none;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .page-actions {
                width: 100%;
                justify-content: space-between;
            }
            
            .notification-types {
                overflow-x: auto;
                white-space: nowrap;
            }
            
            .type-btn {
                padding: 12px 20px;
                font-size: 14px;
            }
            
            .notification-item {
                flex-direction: column;
            }
            
            .notification-icon {
                margin-right: 0;
                margin-bottom: 15px;
            }
            
            .mark-read-btn {
                margin-left: 0;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    @include('user.layout.navbar')

    <!-- Notifications Page Content -->
    <main class="notifications-container">
        <div class="page-header">
            <h1 class="page-title">Notifications</h1>
            <div class="page-actions">
                <button class="action-btn">
                    <i class="fas fa-check-double"></i> Mark All as Read
                </button>
                <button class="action-btn">
                    <i class="fas fa-cog"></i> Notification Settings
                </button>
            </div>
        </div>
        
        <div class="notification-types">
            <button class="type-btn active">All Notifications</button>
            <button class="type-btn">Job Alerts</button>
            <button class="type-btn">Follower Activity</button>
            <button class="type-btn">Unread</button>
        </div>
        
        <div class="notification-list">
            <!-- Today's Notifications -->
            <div class="notification-group">
                <h3 class="group-title">Today</h3>
                
                <!-- Job Notification -->
                 @foreach ($notifications as $noti)
                     
                 <div class="notification-item unread">
                     <div class="notification-icon job">
                         <i class="fas fa-briefcase"></i>
                        </div>
                    <div class="notification-content">
                        <p class="notification-message">
                            {{-- <input type="text" name="" id="" value="{{ $noti->company_id }}"> --}}
                            <a href="{{ route('companypos',['id'=>$noti->company_id]) }}">{{ $noti->company_name }}</a> posted a new job: <a href="{{ route('user.applyjob',['id'=>$noti->job_post_id])}}">{{ $noti->job_title }}</a> that matches your profile.
                        </p>
                        <div class="notification-time">{{ $noti->created_at }}</div>
                        <div class="notification-actions">
                            <a href="{{ route('user.find_job') }}" class="action-link">
                                <i class="fas fa-eye"></i> View Job
                            </a>
                            <a href="#" class="action-link">
                                <i class="fas fa-ban"></i> Turn off similar
                            </a>
                        </div>
                    </div>
                    <button class="mark-read-btn" title="Mark as read">
                        <i class="far fa-circle"></i>
                    </button>
                </div>
                @endforeach
                
                <!-- Follower Notification -->
                <div class="notification-item unread">
                    <div class="notification-icon follow">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="notification-content">
                        <p class="notification-message">
                            <a href="#">Sarah Johnson</a> started following you.
                        </p>
                        <div class="notification-time">3 hours ago</div>
                        <div class="notification-actions">
                            <a href="#" class="action-link">
                                <i class="fas fa-user"></i> View Profile
                            </a>
                            <a href="#" class="action-link">
                                <i class="fas fa-user-plus"></i> Follow back
                            </a>
                        </div>
                    </div>
                    <button class="mark-read-btn" title="Mark as read">
                        <i class="far fa-circle"></i>
                    </button>
                </div>
                
                <!-- Job Application Notification -->
                <!-- <div class="notification-item">
                    <div class="notification-icon job">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="notification-content">
                        <p class="notification-message">
                            Your application for <a href="#">UX Designer at FutureDesigns</a> has been viewed by the hiring team.
                        </p>
                        <div class="notification-time">5 hours ago</div>
                        <div class="notification-actions">
                            <a href="#" class="action-link">
                                <i class="fas fa-eye"></i> View Application
                            </a>
                        </div>
                    </div>
                    <button class="mark-read-btn" title="Mark as read">
                        <i class="far fa-circle"></i>
                    </button>
                </div> -->
            </div>
            
            <!-- Yesterday's Notifications -->
            <div class="notification-group">
                <!-- <h3 class="group-title">Yesterday</h3> -->
                
                <!-- Connection Notification -->
                <!-- <div class="notification-item">
                    <div class="notification-icon follow">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="notification-content">
                        <p class="notification-message">
                            <a href="#">Michael Chen</a> accepted your connection request.
                        </p>
                        <div class="notification-time">Yesterday, 4:30 PM</div>
                        <div class="notification-actions">
                            <a href="#" class="action-link">
                                <i class="fas fa-comment"></i> Send Message
                            </a>
                        </div>
                    </div>
                    <button class="mark-read-btn" title="Mark as read">
                        <i class="far fa-circle"></i>
                    </button>
                </div> -->
                
                <!-- Job Recommendation -->
                <!-- <div class="notification-item">
                    <div class="notification-icon job">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div class="notification-content">
                        <p class="notification-message">
                            New job recommendation: <a href="#">Full Stack Developer at DigitalMinds</a> based on your skills.
                        </p>
                        <div class="notification-time">Yesterday, 11:15 AM</div>
                        <div class="notification-actions">
                            <a href="#" class="action-link">
                                <i class="fas fa-eye"></i> View Job
                            </a>
                            <a href="#" class="action-link">
                                <i class="fas fa-ban"></i> Not interested
                            </a>
                        </div>
                    </div>
                    <button class="mark-read-btn" title="Mark as read">
                        <i class="far fa-circle"></i>
                    </button>
                </div> -->
                
                <!-- Follower Notification -->
                <!-- <div class="notification-item">
                    <div class="notification-icon follow">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="notification-content">
                        <p class="notification-message">
                            <a href="#">Alex Morgan</a> started following you.
                        </p>
                        <div class="notification-time">Yesterday, 9:45 AM</div>
                        <div class="notification-actions">
                            <a href="#" class="action-link">
                                <i class="fas fa-user"></i> View Profile
                            </a>
                            <a href="#" class="action-link">
                                <i class="fas fa-user-plus"></i> Follow back
                            </a>
                        </div>
                    </div>
                    <button class="mark-read-btn" title="Mark as read">
                        <i class="far fa-circle"></i>
                    </button>
                </div> -->
            </div>
            
            <!-- This Week's Notifications -->
            <div class="notification-group">
                <!-- <h3 class="group-title">This Week</h3> -->
                
                <!-- Job Alert -->
                <!-- <div class="notification-item">
                    <div class="notification-icon job">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="notification-content">
                        <p class="notification-message">
                            Job alert: 5 new <a href="#">React Developer</a> positions matching your preferences.
                        </p>
                        <div class="notification-time">2 days ago</div>
                        <div class="notification-actions">
                            <a href="#" class="action-link">
                                <i class="fas fa-eye"></i> View Jobs
                            </a>
                            <a href="#" class="action-link">
                                <i class="fas fa-cog"></i> Edit Alerts
                            </a>
                        </div>
                    </div>
                    <button class="mark-read-btn" title="Mark as read">
                        <i class="far fa-circle"></i>
                    </button>
                </div> -->
                
                <!-- Endorsement Notification -->
                <!-- <div class="notification-item">
                    <div class="notification-icon follow">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="notification-content">
                        <p class="notification-message">
                            <a href="#">David Williams</a> endorsed you for <a href="#">JavaScript</a> and <a href="#">React.js</a>.
                        </p>
                        <div class="notification-time">3 days ago</div>
                        <div class="notification-actions">
                            <a href="#" class="action-link">
                                <i class="fas fa-user"></i> View Profile
                            </a>
                            <a href="#" class="action-link">
                                <i class="fas fa-star"></i> Endorse Back
                            </a>
                        </div>
                    </div>
                </div> -->
                
                <!-- Application Update -->
                <!-- <div class="notification-item">
                    <div class="notification-icon job">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="notification-content">
                        <p class="notification-message">
                            Congratulations! You've been selected for an interview for <a href="#">Senior Frontend Developer at TechCorp Inc.</a>
                        </p>
                        <div class="notification-time">4 days ago</div>
                        <div class="notification-actions">
                            <a href="#" class="action-link">
                                <i class="fas fa-eye"></i> View Details
                            </a>
                            <a href="#" class="action-link">
                                <i class="fas fa-calendar"></i> Schedule
                            </a>
                        </div>
                    </div>
                    <button class="mark-read-btn" title="Mark as read">
                        <i class="far fa-circle"></i>
                    </button>
                </div> -->
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('user.layout.footer')

    <script>
        // JavaScript for notifications page
        document.addEventListener('DOMContentLoaded', function() {
            // Mark as read functionality
            const markReadButtons = document.querySelectorAll('.mark-read-btn');
            
            markReadButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const notificationItem = this.closest('.notification-item');
                    
                    if (notificationItem.classList.contains('unread')) {
                        notificationItem.classList.remove('unread');
                        this.innerHTML = '<i class="far fa-check-circle"></i>';
                        
                        // Update unread count in header
                        const badge = document.querySelector('.notification-badge');
                        if (badge) {
                            let count = parseInt(badge.textContent);
                            if (count > 0) {
                                badge.textContent = count - 1;
                                if (count === 1) {
                                    badge.style.display = 'none';
                                }
                            }
                        }
                    }
                });
            });
            
            // Mark all as read
            const markAllButton = document.querySelector('.action-btn:first-child');
            markAllButton.addEventListener('click', function() {
                const unreadNotifications = document.querySelectorAll('.notification-item.unread');
                
                unreadNotifications.forEach(item => {
                    item.classList.remove('unread');
                    const button = item.querySelector('.mark-read-btn');
                    if (button) {
                        button.innerHTML = '<i class="far fa-check-circle"></i>';
                    }
                });
                
                // Update unread count in header
                const badge = document.querySelector('.notification-badge');
                if (badge) {
                    badge.style.display = 'none';
                    badge.textContent = '0';
                }
            });
            
            // Notification type tabs
            const typeButtons = document.querySelectorAll('.type-btn');
            
            typeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    typeButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // In a real app, this would filter the notifications
                });
            });
        });
    </script>
</body>
</html>