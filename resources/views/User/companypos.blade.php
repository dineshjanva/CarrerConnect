<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | TechCorp Open Positions</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seeker/main.css') }}">
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        .header-buttons {
            display: flex;
        }

        .btn {
            padding: 10px 20px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            display: inline-block;
            transition: all 0.3s;
            border: 1px solid;
        }

        .btn-login {
            color: var(--primary-blue);
            background-color: transparent;
            border-color: var(--primary-blue);
            margin-right: 15px;
        }

        .btn-login:hover {
            background-color: var(--light-blue);
        }

        .btn-register {
            background-color: var(--primary-blue);
            color: var(--white);
            border-color: var(--primary-blue);
        }

        .btn-register:hover {
            background-color: var(--dark-blue);
        }

        /* Company Hero Section */
        .company-hero {
            background-color: var(--white);
            padding: 50px 0;
            margin-bottom: 40px;
            border-bottom: 1px solid #eee;
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .company-logo {
            flex: 0 0 180px;
            height: 180px;
            background-color: var(--light-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: var(--primary-blue);
            font-size: 48px;
        }

        .company-info {
            flex: 1;
        }

        .company-name {
            font-size: 36px;
            margin-bottom: 15px;
            color: var(--dark-gray);
        }

        .company-tagline {
            font-size: 20px;
            color: var(--medium-gray);
            margin-bottom: 20px;
        }

        .company-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 25px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .meta-item i {
            color: var(--primary-blue);
            font-size: 20px;
        }

        .company-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .follow-btn {
            background-color: var(--primary-blue);
            color: white;
            border: none;
            padding: 12px 25px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .follow-btn:hover {
            background-color: var(--dark-blue);
        }

        .visit-btn {
            background-color: transparent;
            color: var(--primary-blue);
            border: 1px solid var(--primary-blue);
            padding: 12px 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .visit-btn:hover {
            background-color: var(--light-blue);
        }

        /* Jobs Section */
        .jobs-container {
            max-width: 1200px;
            margin: 0 auto 60px;
            padding: 0 20px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 32px;
            color: var(--dark-gray);
        }

        .jobs-count {
            color: var(--medium-gray);
            font-size: 18px;
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
            padding: 25px;
            background-color: var(--white);
            border: 1px solid #eee;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .filter-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark-gray);
        }

        .filter-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            font-size: 16px;
            background-color: var(--white);
        }

        .jobs-grid {
            display: grid;
            gap: 25px;
        }

        .job-card {
            background-color: var(--white);
            border: 1px solid #eee;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .job-details {
            flex: 1;
        }

        .job-title {
            font-size: 22px;
            margin-bottom: 5px;
            color: var(--dark-gray);
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--medium-gray);
        }

        .meta-item i {
            color: var(--primary-blue);
        }

        .job-description {
            color: var(--medium-gray);
            margin-bottom: 20px;
            max-width: 700px;
        }

        .job-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .tag {
            background-color: var(--light-blue);
            color: var(--primary-blue);
            padding: 5px 15px;
            font-size: 14px;
            font-weight: 600;
        }

        .job-actions {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-end;
        }

        .job-type {
            background-color: #e6f7ee;
            color: #00a651;
            padding: 5px 15px;
            font-weight: 600;
            font-size: 14px;
            text-align: center;
        }

        .job-date {
            color: var(--medium-gray);
            font-size: 14px;
            margin-bottom: 15px;
        }

        .apply-btn {
            background-color: var(--primary-blue);
            color: white;
            text-decoration: none;
            padding: 12px 30px;
            font-weight: 600;
            transition: background-color 0.3s;
            display: inline-block;
            text-align: center;
        }

        .apply-btn:hover {
            background-color: var(--dark-blue);
        }

        .save-job {
            display: flex;
            align-items: center;
            gap: 5px;
            color: var(--medium-gray);
            background: none;
            border: none;
            font-size: 14px;
            cursor: pointer;
            margin-top: 15px;
        }

        .save-job:hover {
            color: var(--primary-blue);
        }

        /* Company Info Section */
        .company-info-section {
            background-color: var(--white);
            padding: 60px 0;
            margin: 60px 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .info-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .info-card {
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .info-card h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: var(--dark-gray);
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary-blue);
        }

        .info-card p {
            color: var(--medium-gray);
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .benefits-list {
            list-style: none;
        }

        .benefits-list li {
            margin-bottom: 15px;
            padding-left: 30px;
            position: relative;
        }

        .benefits-list li i {
            position: absolute;
            left: 0;
            top: 5px;
            color: var(--primary-blue);
        }

        .culture-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .culture-tag {
            background-color: var(--light-blue);
            color: var(--primary-blue);
            padding: 8px 15px;
            font-weight: 600;
        }

        /* Footer */
        footer {
            background-color: var(--dark-gray);
            color: var(--white);
            padding: 70px 20px 30px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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
            background-color: rgba(255, 255, 255, 0.1);
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
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #aaa;
            font-size: 14px;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .hero-container {
                flex-direction: column;
                text-align: center;
            }

            .company-meta {
                justify-content: center;
            }

            .company-actions {
                justify-content: center;
            }

            .job-card {
                flex-direction: column;
            }

            .job-actions {
                align-items: flex-start;
                margin-top: 20px;
                gap: 15px;
            }
        }

        @media (max-width: 768px) {
            nav {
                display: none;
            }

            .company-logo {
                width: 120px;
                height: 120px;
                margin: 0 auto;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .section-title {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('user.layout.navbar')

    <!-- Company Hero Section -->
    ` <section class="company-hero">
        <div class="hero-container">
            <div class="company-logo">TC</div>
            <div class="company-info">
                <h1 class="company-name">{{ $companyDetails->name }}.</h1>
                <p class="company-tagline">{{ $companyDetails->tagline }}</p>

                <div class="company-meta">
                    <div class="meta-item">
                        <i class="fas fa-globe"></i>
                        <span>{{$companyDetails->website}}</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-industry"></i>
                        <span>{{ $companyDetails->industry }}</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-users"></i>
                        <span>{{ $companyDetails->employee_size }}+ employees</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $companyDetails->location }}</span>
                    </div>
                </div>

                <p class="company-description">
                    {{ $companyDetails->description }}
                    <!-- TechCorp is a leading technology company focused on developing innovative software solutions for businesses worldwide. 
                    Our mission is to empower organizations through cutting-edge technology that drives efficiency, productivity, and growth. -->
                </p>

                <div class="company-actions">
                    <button class="follow-btn"><i class="fas fa-plus"></i> Follow Company</button>
                    <a href="{{ $companyDetails->website }}" target="_blank"><button class="visit-btn">Visit
                            Website</button></a>
                </div>
            </div>
        </div>
    </section>
    `
    <!-- Jobs Section -->
    <section class="jobs-container">
        <div class="section-header">
            <h2 class="section-title">Open Positions at {{ $companyDetails->name }}</h2>
            <div class="jobs-count">12 positions available</div>
        </div>

        <div class="filters">
            <div class="filter-group">
                <label for="department">Department</label>
                <select id="department">
                    <option value="">All Departments</option>
                    <option value="engineering">Engineering</option>
                    <option value="design">Design</option>
                    <option value="product">Product</option>
                    <option value="marketing">Marketing</option>
                    <option value="sales">Sales</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="location">Location</label>
                <select id="location">
                    <option value="">All Locations</option>
                    <option value="sf">San Francisco, CA</option>
                    <option value="ny">New York, NY</option>
                    <option value="remote">Remote</option>
                    <option value="hybrid">Hybrid</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="job-type">Job Type</label>
                <select id="job-type">
                    <option value="">All Types</option>
                    <option value="full-time">Full-time</option>
                    <option value="part-time">Part-time</option>
                    <option value="contract">Contract</option>
                    <option value="internship">Internship</option>
                </select>
            </div>
        </div>

        @foreach ($moreCompanyJob as $mcomp)
            <div class="jobs-grid" style="margin-bottom: 1.5rem;">
                <!-- Job 1 -->

                <div class="job-card">
                    <div class="job-details">
                        <h3 class="job-title">{{ $mcomp->job_title }}</h3>
                        <div class="job-meta">
                            <div class="meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $mcomp->location }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-briefcase"></i>
                                <span>{{ $mcomp->experience_level }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>${{ $mcomp->salary_range }}</span>
                            </div>
                        </div>
                        <p class="job-description">
                            {{ $mcomp->job_description }}
                            <!-- We're looking for an experienced Frontend Developer to join our growing team. You'll be responsible for building user interfaces using React, TypeScript, and modern CSS. -->
                        </p>
                        <div class="job-tags">

                            @foreach(is_array($mcomp->required_skills) ? $mcomp->required_skills : json_decode($mcomp->required_skills, true) ?? [] as $skill)
                                <div class="tag">{{ $skill }}</div>
                            @endforeach


                            <!-- <div class="tag">TypeScript</div> -->
                            <!-- <div class="tag">JavaScript</div> -->
                            <!-- <div class="tag">HTML/CSS</div> -->
                        </div>
                    </div>
                    <div class="job-actions">
                        <div class="job-type">{{ $mcomp->job_type }}</div>
                        <div class="job-date">Posted {{ $mcomp->created_at->diffForHumans() }}</div>
                        <a href="{{ route('user.applyjob', ['id'=>$mcomp->id]) }}" class="apply-btn">Apply Now</a>
                        <button class="save-job">
                            <i class="far fa-bookmark"></i> Save Job
                        </button>
                    </div>
                </div>


            </div>
        @endforeach
    </section>

    <!-- Company Info Section -->
    <section class="company-info-section">
        <div class="info-container">
            <div class="info-card">
                <h3>About TechCorp</h3>
                <p>Founded in 2010, TechCorp has grown from a small startup to a global technology leader with offices
                    in 5 countries. Our mission is to empower businesses through innovative software solutions that
                    drive efficiency and growth.</p>
                <p>We believe in creating technology that makes a positive impact on the world while fostering a culture
                    of innovation, collaboration, and continuous learning.</p>
            </div>

            <div class="info-card">
                <h3>Employee Benefits</h3>
                <ul class="benefits-list">
                    <li><i class="fas fa-check-circle"></i> Competitive salary and equity packages</li>
                    <li><i class="fas fa-check-circle"></i> Comprehensive health insurance (medical, dental, vision)
                    </li>
                    <li><i class="fas fa-check-circle"></i> Flexible work hours and remote work options</li>
                    <li><i class="fas fa-check-circle"></i> Generous paid time off and parental leave</li>
                    <li><i class="fas fa-check-circle"></i> Professional development budget</li>
                    <li><i class="fas fa-check-circle"></i> 401(k) with company matching</li>
                    <li><i class="fas fa-check-circle"></i> Wellness programs and gym membership</li>
                    <li><i class="fas fa-check-circle"></i> Catered meals and fully stocked kitchens</li>
                </ul>
            </div>

            <div class="info-card">
                <h3>Our Culture</h3>
                <p>At TechCorp, we foster a culture of innovation, collaboration, and continuous learning. We value
                    diversity and believe that different perspectives lead to better solutions.</p>
                <p>Our core values:</p>
                <div class="culture-list">
                    <div class="culture-tag">Innovation</div>
                    <div class="culture-tag">Collaboration</div>
                    <div class="culture-tag">Integrity</div>
                    <div class="culture-tag">Excellence</div>
                    <div class="culture-tag">Customer Focus</div>
                </div>
            </div>
        </div>
    </section>

    @include('user.layout.footer')
</body>

</html>