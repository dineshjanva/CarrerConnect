<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Admin FAQ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
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
        }

        body {
            background-color: #f8f9fa;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        /* Header Styles */
        header {
            background-color: var(--white);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
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

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 30px;
        }

        nav ul li a {
            text-decoration: none;
            color: var(--dark-gray);
            font-weight: 500;
            font-size: 16px;
            padding: 8px 0;
            position: relative;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: var(--primary-blue);
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-blue);
            transition: width 0.3s;
        }

        nav ul li a:hover::after {
            width: 100%;
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
        }

        /* FAQ Page Styles */
        .faq-container {
            max-width: 1000px;
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
            font-size: 28px;
            color: var(--primary-blue);
        }

        .search-section {
            background-color: var(--white);
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .search-bar {
            display: flex;
        }

        .search-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .search-btn {
            padding: 0 20px;
            background-color: var(--primary-blue);
            color: white;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

        .faq-categories {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .category-btn {
            padding: 10px 20px;
            background-color: var(--white);
            color: var(--dark-gray);
            border: 1px solid #ddd;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }

        .category-btn:hover, .category-btn.active {
            background-color: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }

        .faq-accordion {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .faq-item {
            border-bottom: 1px solid #eee;
        }

        .faq-item:last-child {
            border-bottom: none;
        }

        .faq-question {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 600;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .faq-question:hover {
            background-color: var(--light-gray);
        }

        .faq-question i {
            transition: transform 0.3s;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s, padding 0.3s;
        }

        .faq-item.active .faq-answer {
            padding: 0 20px 20px;
            max-height: 500px;
        }

        .faq-answer-content {
            padding-bottom: 20px;
        }

        .contact-support {
            background-color: var(--white);
            padding: 30px;
            margin-top: 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            text-align: center;
        }

        .contact-title {
            font-size: 22px;
            margin-bottom: 15px;
            color: var(--primary-blue);
        }

        .contact-text {
            margin-bottom: 20px;
            color: var(--medium-gray);
        }

        .contact-btn {
            padding: 12px 30px;
            background-color: var(--primary-blue);
            color: white;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .contact-btn:hover {
            background-color: var(--dark-blue);
        }

        /* Footer */
        footer {
            background-color: var(--dark-gray);
            color: var(--white);
            padding: 60px 20px 30px;
            margin-top: 50px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
        }

        .footer-col h3 {
            font-size: 20px;
            margin-bottom: 25px;
            position: relative;
        }

        .footer-col h3::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--primary-blue);
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 15px;
        }

        .footer-col ul li a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-col ul li a:hover {
            color: var(--white);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            color: var(--white);
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .social-links a:hover {
            background-color: var(--primary-blue);
        }

        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #aaa;
            font-size: 14px;
        }

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
            
            .search-bar {
                flex-direction: column;
            }
            
            .search-input {
                margin-bottom: 10px;
            }
            
            .search-btn {
                padding: 12px;
            }
            
            .faq-question {
                font-size: 16px;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <a href="index.html" class="logo">
                <i class="fas fa-briefcase"></i>
                <span>CareerConnect</span>
            </a>
            <nav>
                <ul>
                    <li><a href="admin-dashboard.html">Dashboard</a></li>
                    <li><a href="admin-users.html">Users</a></li>
                    <li><a href="admin-companies.html">Companies</a></li>
                    <li><a href="admin-jobs.html">Jobs</a></li>
                    <li><a href="admin-faq.html" class="active">FAQ</a></li>
                    <li><a href="admin-settings.html">Settings</a></li>
                </ul>
            </nav>
            <div class="user-menu">
                <a href="admin-notifications.html" class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">5</span>
                </a>
                <a href="admin-profile.html" class="user-profile">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=100&h=100&q=80" alt="Profile">
                    <div class="user-info">
                        <div class="user-name">Admin User</div>
                        <div class="user-role">System Administrator</div>
                    </div>
                </a>
            </div>
        </div>
    </header>

    <!-- FAQ Content -->
    <main class="faq-container">
        <div class="page-header">
            <h1 class="page-title">Administrator FAQ</h1>
        </div>
        
        <div class="search-section">
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Search the knowledge base...">
                <button class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        
        <div class="faq-categories">
            <button class="category-btn active">All Categories</button>
            <button class="category-btn">User Management</button>
            <button class="category-btn">Company Management</button>
            <button class="category-btn">Job Listings</button>
            <button class="category-btn">Reporting</button>
            <button class="category-btn">System Settings</button>
        </div>
        
        <div class="faq-accordion">
            <!-- FAQ Item 1 -->
            <div class="faq-item">
                <div class="faq-question">
                    <span>How do I add a new administrator to the system?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>To add a new administrator:</p>
                        <ol>
                            <li>Navigate to the <strong>User Management</strong> section in the admin dashboard</li>
                            <li>Click on <strong>Add New User</strong> button</li>
                            <li>Fill in the user details including name, email, and contact information</li>
                            <li>Set the <strong>User Role</strong> to "Administrator"</li>
                            <li>Select the appropriate permissions for the new admin</li>
                            <li>Click <strong>Save</strong> to create the account</li>
                        </ol>
                        <p>The new administrator will receive an email with setup instructions.</p>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 2 -->
            <div class="faq-item">
                <div class="faq-question">
                    <span>How can I verify a company's registration?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>Company verification involves these steps:</p>
                        <ul>
                            <li>Go to the <strong>Companies</strong> section in the admin panel</li>
                            <li>Find the company you want to verify in the list</li>
                            <li>Click on the company name to view their profile</li>
                            <li>Check the submitted documents in the <strong>Verification</strong> tab</li>
                            <li>Review the company's details and documents</li>
                            <li>Click <strong>Verify Company</strong> if everything is in order</li>
                            <li>If documents are insufficient, click <strong>Request More Information</strong> and specify what's needed</li>
                        </ul>
                        <p>Verified companies will display a verification badge on their profile.</p>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 3 -->
            <div class="faq-item">
                <div class="faq-question">
                    <span>What should I do when a job posting violates our terms?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>When you encounter a job posting that violates terms:</p>
                        <ol>
                            <li>Navigate to the job posting in the <strong>Job Listings</strong> section</li>
                            <li>Click on the <strong>Flag</strong> button in the top right corner</li>
                            <li>Select the reason for flagging from the dropdown menu</li>
                            <li>Add any additional notes in the provided field</li>
                            <li>Choose an action:
                                <ul>
                                    <li><strong>Request Edit:</strong> Sends the posting back to the company for revision</li>
                                    <li><strong>Take Down:</strong> Immediately removes the posting</li>
                                    <li><strong>Suspend Company:</strong> For repeated violations</li>
                                </ul>
                            </li>
                            <li>The system will automatically notify the company of your action</li>
                        </ol>
                        <p>All moderation actions are logged in the system for record-keeping.</p>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 4 -->
            <div class="faq-item">
                <div class="faq-question">
                    <span>How do I generate reports from the system?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>The reporting system allows you to generate various reports:</p>
                        <h4>Standard Reports:</h4>
                        <ul>
                            <li><strong>User Activity:</strong> Shows login frequency and actions</li>
                            <li><strong>Job Postings:</strong> Statistics on job creation and views</li>
                            <li><strong>Applications:</strong> Tracks application rates and sources</li>
                        </ul>
                        
                        <h4>To generate a report:</h4>
                        <ol>
                            <li>Go to the <strong>Reporting</strong> section</li>
                            <li>Select the report type you need</li>
                            <li>Set the date range and any filters</li>
                            <li>Choose the output format (PDF, CSV, or Excel)</li>
                            <li>Click <strong>Generate Report</strong></li>
                            <li>Download or email the report as needed</li>
                        </ol>
                        
                        <p>For custom reports beyond these options, contact our technical support team.</p>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 5 -->
            <div class="faq-item">
                <div class="faq-question">
                    <span>How can I reset a user's password?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>Administrators can reset passwords in two ways:</p>
                        
                        <h4>Manual Reset:</h4>
                        <ol>
                            <li>Find the user in the <strong>User Management</strong> section</li>
                            <li>Click on the user's name to open their profile</li>
                            <li>Click the <strong>Reset Password</strong> button</li>
                            <li>Set a temporary password (the user will be forced to change it on next login)</li>
                            <li>Click <strong>Save</strong> to update</li>
                        </ol>
                        
                        <h4>Self-Service Reset:</h4>
                        <ol>
                            <li>From the user's profile, click <strong>Send Reset Link</strong></li>
                            <li>The user will receive an email with password reset instructions</li>
                            <li>The link expires in 24 hours for security</li>
                        </ol>
                        
                        <p><strong>Note:</strong> For security reasons, administrators cannot view existing passwords.</p>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 6 -->
            <div class="faq-item">
                <div class="faq-question">
                    <span>What are the different user roles and permissions?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>Our system has several user roles with different permission levels:</p>
                        
                        <table style="width:100%; border-collapse: collapse; margin-bottom: 20px;">
                            <thead>
                                <tr style="background-color: var(--light-blue);">
                                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Role</th>
                                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Description</th>
                                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Key Permissions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ddd;"><strong>Super Admin</strong></td>
                                    <td style="padding: 10px; border: 1px solid #ddd;">Full system access</td>
                                    <td style="padding: 10px; border: 1px solid #ddd;">All permissions including system settings and user management</td>
                                </tr>
                                <tr style="background-color: #f9f9f9;">
                                    <td style="padding: 10px; border: 1px solid #ddd;"><strong>Admin</strong></td>
                                    <td style="padding: 10px; border: 1px solid #ddd;">General administration</td>
                                    <td style="padding: 10px; border: 1px solid #ddd;">User management, content moderation, reports (no system settings)</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ddd;"><strong>Moderator</strong></td>
                                    <td style="padding: 10px; border: 1px solid #ddd;">Content moderation</td>
                                    <td style="padding: 10px; border: 1px solid #ddd;">Review and approve jobs, companies, and user-generated content</td>
                                </tr>
                                <tr style="background-color: #f9f9f9;">
                                    <td style="padding: 10px; border: 1px solid #ddd;"><strong>Support</strong></td>
                                    <td style="padding: 10px; border: 1px solid #ddd;">User support</td>
                                    <td style="padding: 10px; border: 1px solid #ddd;">Answer tickets, reset passwords, basic user assistance</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <p>Permissions can be customized for each role in the <strong>System Settings</strong> section.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="contact-support">
            <h3 class="contact-title">Still need help?</h3>
            <p class="contact-text">Our support team is available 24/7 to assist you with any questions or issues.</p>
            <button class="contact-btn">
                <i class="fas fa-headset"></i> Contact Support
            </button>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-col">
                <h3>CareerConnect</h3>
                <p>Connecting talent with opportunity across the globe. Our mission is to help professionals find their dream jobs and companies find exceptional talent.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h3>For Job Seekers</h3>
                <ul>
                    <li><a href="#">Browse Jobs</a></li>
                    <li><a href="#">Career Resources</a></li>
                    <li><a href="#">Resume Builder</a></li>
                    <li><a href="#">Salary Calculator</a></li>
                    <li><a href="#">Job Alerts</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>For Employers</h3>
                <ul>
                    <li><a href="#">Post a Job</a></li>
                    <li><a href="#">Search Resumes</a></li>
                    <li><a href="#">Recruiting Solutions</a></li>
                    <li><a href="#">Pricing Plans</a></li>
                    <li><a href="#">Employer Resources</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Company</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; 2023 CareerConnect. All rights reserved.
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ Accordion functionality
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                
                question.addEventListener('click', function() {
                    // Close all other items
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item && otherItem.classList.contains('active')) {
                            otherItem.classList.remove('active');
                        }
                    });
                    
                    // Toggle current item
                    item.classList.toggle('active');
                });
            });
            
            // Category filter buttons
            const categoryBtns = document.querySelectorAll('.category-btn');
            
            categoryBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    categoryBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // In a real app, this would filter the FAQ items
                    console.log(`Filtering by: ${this.textContent}`);
                });
            });
            
            // Search functionality
            const searchBtn = document.querySelector('.search-btn');
            searchBtn.addEventListener('click', function() {
                const searchInput = document.querySelector('.search-input');
                alert(`Searching for: ${searchInput.value}`);
                // In a real app, this would search FAQ content
            });
            
            // Contact support button
            const contactBtn = document.querySelector('.contact-btn');
            contactBtn.addEventListener('click', function() {
                window.location.href = 'admin-support.html';
            });
        });
    </script>
</body>
</html>