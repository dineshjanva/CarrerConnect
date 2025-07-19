@extends('admin.pages.master')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Contact Developers</title>
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/cms.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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

        /* Contact Section */
        .contact-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 50px;
        }

        .contact-info {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 30px;
        }

        .contact-info h2 {
            font-size: 24px;
            margin-bottom: 25px;
            color: var(--dark-gray);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .contact-info h2 i {
            color: var(--primary-blue);
        }

        .contact-method {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background-color: var(--light-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            color: var(--primary-blue);
        }

        .contact-details h3 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .contact-details p {
            color: var(--medium-gray);
            margin-bottom: 5px;
        }

        .contact-details a {
            color: var(--primary-blue);
            text-decoration: none;
        }

        .contact-details a:hover {
            text-decoration: underline;
        }

        .dev-team {
            margin-top: 40px;
        }

        .dev-team h3 {
            font-size: 20px;
            margin-bottom: 20px;
            color: var(--dark-gray);
        }

        .dev-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .dev-card {
            text-align: center;
            padding: 20px;
            background-color: var(--light-gray);
            transition: transform 0.3s;
        }

        .dev-card:hover {
            transform: translateY(-5px);
        }

        .dev-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
            border: 3px solid var(--primary-blue);
        }

        .dev-name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .dev-role {
            color: var(--medium-gray);
            font-size: 14px;
            margin-bottom: 10px;
        }

        .dev-contact {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .dev-contact a {
            color: var(--primary-blue);
            text-decoration: none;
        }

        /* Contact Form */
        .contact-form1 {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 30px;
        }

        .contactForm {
            margin-top: 25px;
        }

        .form-group1 {
            margin-bottom: 25px;
        }

        .form-group1 label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: var(--primary-blue);
            outline: none;
        }

        .form-textarea {
            min-height: 150px;
            resize: vertical;
        }

        .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            background-color: var(--white);
            font-size: 16px;
        }

        .btn {
            padding: 12px 30px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            font-size: 16px;
        }

        .btn-primary {
            background-color: var(--primary-blue);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--dark-blue);
        }

        .btn-block {
            display: block;
            width: 100%;
        }

        .priority-info {
            background-color: #fff8e1;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin-bottom: 25px;
        }

        .priority-info h4 {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        /* Footer */


        /* Responsive Design */
        @media (max-width: 992px) {
            .contact-section {
                grid-template-columns: 1fr;
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
        }

        @media (max-width: 576px) {
            .dev-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    {{-- <header>
        <div class="header-container">
            <div class="logo">
                <i class="fas fa-briefcase"></i>
                <span>CareerConnect</span>
            </div>
            <div class="user-menu">
                <a href="admin-notifications.html" class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </a>
                <a href="admin-profile.html" class="user-profile">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=100&h=100&q=80"
                        alt="Profile">
                    <div class="user-info">
                        <div class="user-name">Admin User</div>
                        <div class="user-role">System Administrator</div>
                    </div>
                </a>
            </div>
        </div>
    </header> --}}

    <!-- Sidebar -->
    {{-- <nav class="sidebar">
        <ul class="sidebar-menu">
            <li class="sidebar-title">Main Navigation</li>
            <li>
                <a href="admin-dashboard.html">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="admin-users.html">
                    <i class="fas fa-users"></i>
                    <span>User Management</span>
                </a>
            </li>
            <li>
                <a href="admin-companies.html">
                    <i class="fas fa-building"></i>
                    <span>Companies</span>
                </a>
            </li>
            <li>
                <a href="admin-jobs.html">
                    <i class="fas fa-briefcase"></i>
                    <span>Job Listings</span>
                </a>
            </li>
            <li>
                <a href="admin-analytics.html">
                    <i class="fas fa-chart-line"></i>
                    <span>Website Analytics</span>
                </a>
            </li>
            <li>
                <a href="admin-faq.html">
                    <i class="fas fa-question-circle"></i>
                    <span>FAQ</span>
                </a>
            </li>
            <li class="sidebar-title">Support</li>
            <li>
                <a href="admin-contact.html" class="active">
                    <i class="fas fa-headset"></i>
                    <span>Contact Developers</span>
                </a>
            </li>
            <li>
                <a href="admin-support.html">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Support Tickets</span>
                </a>
            </li>
        </ul>
    </nav> --}}

    <!-- Main Content -->
    @section('contant')

        <main class="main-content1">
            <div class="content-container">
                <div class="page-header">
                    <h1 class="page-title">Contact Developers</h1>
                </div>

                <div class="priority-info">
                    <h4>
                        <i class="fas fa-exclamation-circle"></i>
                        Priority Support Information
                    </h4>
                    <p>For critical issues affecting site functionality, please mark your request as "Urgent" and our team
                        will respond within 1 business hour. For non-urgent requests, typical response time is 24 hours.</p>
                </div>

                <div class="contact-section">
                    <div class="contact-info">
                        <h2><i class="fas fa-info-circle"></i> Contact Information</h2>

                        <div class="contact-method">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h3>Email Support</h3>
                                <p>development-support@careerconnect.com</p>
                                <a href="mailto:development-support@careerconnect.com">Send Email</a>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h3>Phone Support</h3>
                                <p>+1 (800) 555-0123</p>
                                <p>Monday-Friday: 8am - 6pm EST</p>
                                <a href="tel:+18005550123">Call Now</a>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="contact-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div class="contact-details">
                                <h3>Live Chat</h3>
                                <p>Available during business hours</p>
                                <a href="#">Start Live Chat</a>
                            </div>
                        </div>

                        <div class="dev-team">
                            <h3>Development Team</h3>
                            <div class="dev-grid">
                                <div class="dev-card">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&h=200&q=80"
                                        class="dev-img">
                                    <div class="dev-name">Michael Chen</div>
                                    <div class="dev-role">Lead Developer</div>
                                    <div class="dev-contact">
                                        <a href="#"><i class="fab fa-slack"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>

                                <div class="dev-card">
                                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=200&h=200&q=80"
                                        class="dev-img">
                                    <div class="dev-name">Sarah Johnson</div>
                                    <div class="dev-role">Frontend Specialist</div>
                                    <div class="dev-contact">
                                        <a href="#"><i class="fab fa-slack"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contact-form1">
                        <h2><i class="fas fa-paper-plane"></i> Send Message</h2>
                        <form id="contactForm1" class="contactForm">
                            <div class="form-group1">
                                <label for="name">Your Name</label>
                                <input type="text" id="name" class="form-control" value="Admin User" required>
                            </div>

                            <div class="form-group1">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" class="form-control" value="admin@careerconnect.com"
                                    required>
                            </div>

                            <div class="form-group1">
                                <label for="issueType">Issue Type</label>
                                <select id="issueType" class="form-select" required>
                                    <option value="">Select an issue type</option>
                                    <option>Bug Report</option>
                                    <option>Feature Request</option>
                                    <option>Security Issue</option>
                                    <option>Performance Problem</option>
                                    <option>Content Update</option>
                                    <option>Other</option>
                                </select>
                            </div>

                            <div class="form-group1">
                                <label for="priority">Priority Level</label>
                                <select id="priority" class="form-select" required>
                                    <option value="low">Low Priority</option>
                                    <option value="normal" selected>Normal Priority</option>
                                    <option value="high">High Priority</option>
                                    <option value="urgent">Urgent (Site Down)</option>
                                </select>
                            </div>

                            <div class="form-group1">
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" class="form-control"
                                    placeholder="Briefly describe your issue" required>
                            </div>

                            <div class="form-group1">
                                <label for="message">Message</label>
                                <textarea id="message" class="form-control form-textarea"
                                    placeholder="Please describe your issue in detail..." required></textarea>
                            </div>

                            <div class="form-group1">
                                <label for="attachment">Attachments (Optional)</label>
                                <input type="file" id="attachment" class="form-control">
                                <small>You can attach screenshots, logs, or documents (Max 10MB)</small>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-paper-plane"></i> Send Message to Developers
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            {{-- <footer>
                <div class="footer-container">
                    <div class="copyright">
                        &copy; 2023 CareerConnect. All rights reserved.
                    </div>
                    <div class="version">
                        v3.2.1 | Support Portal
                    </div>
                </div>
            </footer> --}}
        </main>
    @endsection


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const contactForm1 = document.getElementById('contactForm1');

            contactForm1.addEventListener('submit', function (e) {
                e.preventDefault();

                // Get form values
                const name = document.getElementById('name').value;
                const issueType = document.getElementById('issueType').value;
                const priority = document.getElementById('priority').value;
                const subject = document.getElementById('subject').value;

                // Show success message
                alert(`Thank you, ${name}! Your ${priority} priority ${issueType} issue "${subject}" has been sent to our development team. We'll respond as soon as possible.`);

                // Reset form
                contactForm1.reset();
                document.getElementById('name').value = 'Admin User';
                document.getElementById('email').value = 'admin@careerconnect.com';
            });

            // Priority level indicator
            const prioritySelect = document.getElementById('priority');
            prioritySelect.addEventListener('change', function () {
                const priorityValue = this.value;
                const priorityInfo = document.querySelector('.priority-info');

                if (priorityValue === 'urgent') {
                    priorityInfo.style.backgroundColor = '#f8d7da';
                    priorityInfo.style.borderLeftColor = '#dc3545';
                } else if (priorityValue === 'high') {
                    priorityInfo.style.backgroundColor = '#fff3cd';
                    priorityInfo.style.borderLeftColor = '#ffc107';
                } else {
                    priorityInfo.style.backgroundColor = '#fff8e1';
                    priorityInfo.style.borderLeftColor = '#ffc107';
                }
            });
        });
    </script>
</body>

</html>