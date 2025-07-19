<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Career Resources</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seeker/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Resources Page Styles */
        .resources-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            margin-top: 6rem;
        }

        .page-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .page-header h1 {
            font-size: 42px;
            color: var(--primary-blue);
            margin-bottom: 15px;
        }

        .page-header p {
            font-size: 18px;
            color: var(--medium-gray);
            max-width: 700px;
            margin: 0 auto;
        }

        .categories-section {
            margin-bottom: 60px;
        }

        .section-title {
            font-size: 32px;
            margin-bottom: 30px;
            color: var(--dark-gray);
            text-align: center;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--primary-blue);
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .category-card {
            background-color: var(--white);
            border: 1px solid #eee;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .category-icon {
            width: 80px;
            height: 80px;
            background-color: var(--light-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
        }

        .category-icon i {
            font-size: 36px;
            color: var(--primary-blue);
        }

        .category-card h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: var(--dark-gray);
        }

        .category-card p {
            color: var(--medium-gray);
            margin-bottom: 20px;
        }

        .category-link {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
        }

        .category-link i {
            margin-left: 5px;
            transition: transform 0.3s;
        }

        .category-link:hover i {
            transform: translateX(5px);
        }

        .resources-section {
            margin-bottom: 60px;
        }

        .resources-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .resource-card {
            background-color: var(--white);
            border: 1px solid #eee;
            display: flex;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .resource-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .resource-img {
            flex: 0 0 150px;
            background-color: var(--light-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-blue);
            font-size: 40px;
        }

        .resource-content {
            flex: 1;
            padding: 25px;
        }

        .resource-type {
            display: inline-block;
            background-color: var(--light-blue);
            color: var(--primary-blue);
            padding: 5px 15px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .resource-title {
            font-size: 20px;
            margin-bottom: 10px;
            color: var(--dark-gray);
        }

        .resource-excerpt {
            color: var(--medium-gray);
            margin-bottom: 15px;
            font-size: 15px;
        }

        .resource-meta {
            display: flex;
            justify-content: space-between;
            color: var(--medium-gray);
            font-size: 14px;
        }

        .resource-link {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            margin-top: 15px;
        }

        .resource-link i {
            margin-left: 5px;
            transition: transform 0.3s;
        }

        .resource-link:hover i {
            transform: translateX(5px);
        }

        .tools-section {
            margin-bottom: 60px;
        }

        .tools-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .tool-card {
            background-color: var(--white);
            border: 1px solid #eee;
            padding: 35px 30px;
            text-align: center;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .tool-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .tool-icon {
            width: 70px;
            height: 70px;
            background-color: var(--light-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
        }

        .tool-icon i {
            font-size: 32px;
            color: var(--primary-blue);
        }

        .tool-card h3 {
            font-size: 20px;
            margin-bottom: 15px;
            color: var(--dark-gray);
        }

        .tool-card p {
            color: var(--medium-gray);
            margin-bottom: 20px;
            font-size: 15px;
        }

        .tool-link {
            background-color: var(--primary-blue);
            color: white;
            text-decoration: none;
            padding: 10px 25px;
            font-weight: 600;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .tool-link:hover {
            background-color: var(--dark-blue);
        }

        .newsletter-section {
            background: linear-gradient(to right, var(--primary-blue), var(--dark-blue));
            padding: 70px 20px;
            text-align: center;
            color: white;
        }

        .newsletter-container {
            max-width: 700px;
            margin: 0 auto;
        }

        .newsletter-container h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .newsletter-container p {
            font-size: 18px;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        .newsletter-form {
            display: flex;
            max-width: 500px;
            margin: 0 auto;
        }

        .newsletter-form input {
            flex: 1;
            padding: 15px 20px;
            border: none;
            font-size: 16px;
        }

        .newsletter-form input:focus {
            outline: none;
        }

        .newsletter-form button {
            background-color: white;
            color: var(--primary-blue);
            border: none;
            padding: 0 30px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .newsletter-form button:hover {
            background-color: var(--light-gray);
        }




        /* Responsive Adjustments */
        @media (max-width: 768px) {
            nav {
                display: none;
            }

            .page-header h1 {
                font-size: 32px;
            }

            .section-title {
                font-size: 28px;
            }

            .newsletter-form {
                flex-direction: column;
                gap: 15px;
            }

            .newsletter-form input,
            .newsletter-form button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    @include('user.layout.navbar')
    <!-- Resources Page Content -->
    <main class="resources-container">
        <div class="page-header">
            <h1>Career Development Resources</h1>
            <p>Access expert advice, tools, and guides to advance your career and land your dream job</p>
        </div>

        <!-- Resource Categories -->
       
        <section class="categories-section">
            <h2 class="section-title">{{ __('messages.categories.title') }}</h2>
            <div class="categories-grid">

                @foreach (['resume', 'interview', 'networking', 'job_search'] as $cat)
                    <div class="category-card">
                        <div class="category-icon">
                            @if ($cat == 'resume') <i class="fas fa-file-alt"></i>
                            @elseif ($cat == 'interview') <i class="fas fa-comments"></i>
                            @elseif ($cat == 'networking') <i class="fas fa-network-wired"></i>
                            @elseif ($cat == 'job_search') <i class="fas fa-briefcase"></i>
                            @endif
                        </div>
                        <h3>{{ __('messages.categories.' . $cat . '.title') }}</h3>
                        <p>{{ __('messages.categories.' . $cat . '.description') }}</p>
                        <a href="#" class="category-link">{{ __('messages.categories.browse') }} <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                @endforeach

            </div>
        </section>


        <!-- Featured Resources -->
      
        <section class="resources-section">
            <h2 class="section-title">{{ __('messages.resources.title') }}</h2>
            <div class="resources-grid">

                @foreach (['resume', 'interview', 'networking'] as $article)
                    <div class="resource-card">
                        <div class="resource-img">
                            @if ($article == 'resume') <i class="fas fa-file-alt"></i>
                            @elseif ($article == 'interview') <i class="fas fa-comments"></i>
                            @elseif ($article == 'networking') <i class="fas fa-network-wired"></i>
                            @endif
                        </div>
                        <div class="resource-content">
                            <span class="resource-type">{{ __('messages.resources.' . $article . '.type') }}</span>
                            <h3 class="resource-title">{{ __('messages.resources.' . $article . '.title') }}</h3>
                            <p class="resource-excerpt">{{ __('messages.resources.' . $article . '.excerpt') }}</p>
                            <div class="resource-meta">
                                <span><i class="far fa-clock"></i>
                                    {{ __('messages.resources.' . $article . '.read_time') }}</span>
                                <span><i class="far fa-calendar"></i>
                                    {{ __('messages.resources.' . $article . '.date') }}</span>
                            </div>
                            <a href="#" class="resource-link">{{ __('messages.resources.read_article') }} <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>


        <!-- Career Tools -->
        <!-- <section class="tools-section">
            <h2 class="section-title">Career Tools & Resources</h2>
            <div class="tools-grid">
                <div class="tool-card">
                    <div class="tool-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3>Resume Builder</h3>
                    <p>Create a professional resume in minutes with our easy-to-use resume builder tool.</p>
                    <a href="#" class="tool-link">Build Your Resume</a>
                </div>

                <div class="tool-card">
                    <div class="tool-icon">
                        <i class="fas fa-search-dollar"></i>
                    </div>
                    <h3>Salary Calculator</h3>
                    <p>Discover what you should be earning based on your role, experience, and location.</p>
                    <a href="#" class="tool-link">Calculate Salary</a>
                </div>

                <div class="tool-card">
                    <div class="tool-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h3>Interview Simulator</h3>
                    <p>Practice common interview questions and receive feedback on your responses.</p>
                    <a href="#" class="tool-link">Practice Interviews</a>
                </div>

                <div class="tool-card">
                    <div class="tool-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h3>Career Path Explorer</h3>
                    <p>Discover potential career paths based on your skills, interests, and goals.</p>
                    <a href="#" class="tool-link">Explore Paths</a>
                </div>

                <div class="tool-card">
                    <div class="tool-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h3>Networking Tracker</h3>
                    <p>Organize and manage your professional contacts and networking activities.</p>
                    <a href="#" class="tool-link">Manage Network</a>
                </div>

                <div class="tool-card">
                    <div class="tool-icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h3>Skills Assessment</h3>
                    <p>Evaluate your current skills and identify areas for professional development.</p>
                    <a href="#" class="tool-link">Assess Skills</a>
                </div>
            </div>
        </section> -->
        <section class="tools-section">
            <h2 class="section-title">{{ __('messages.tools.title') }}</h2>
            <div class="tools-grid">

                @foreach (['resume', 'salary', 'interview', 'career_path', 'networking', 'skills'] as $tool)
                    <div class="tool-card">
                        <div class="tool-icon">
                            @if ($tool == 'resume') <i class="fas fa-file-alt"></i>
                            @elseif ($tool == 'salary') <i class="fas fa-search-dollar"></i>
                            @elseif ($tool == 'interview') <i class="fas fa-laptop"></i>
                            @elseif ($tool == 'career_path') <i class="fas fa-book"></i>
                            @elseif ($tool == 'networking') <i class="fas fa-network-wired"></i>
                            @elseif ($tool == 'skills') <i class="fas fa-chart-pie"></i>
                            @endif
                        </div>
                        <h3>{{ __('messages.tools.' . $tool . '.title') }}</h3>
                        <p>{{ __('messages.tools.' . $tool . '.description') }}</p>
                        <a href="#" class="tool-link">{{ __('messages.tools.' . $tool . '.action') }}</a>
                    </div>
                @endforeach

            </div>
        </section>


        <!-- Newsletter Section -->
        <!-- <section class="newsletter-section">
            <div class="newsletter-container">
                <h2>Get Career Insights Delivered to Your Inbox</h2>
                <p>Subscribe to our newsletter for the latest career advice, industry trends, and job search strategies
                </p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email address">
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </section> -->
        <section class="newsletter-section">
            <div class="newsletter-container">
                <h2>{{ __('messages.newsletter.title') }}</h2>
                <p>{{ __('messages.newsletter.description') }}</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="{{ __('messages.newsletter.placeholder') }}">
                    <button type="submit">{{ __('messages.newsletter.button') }}</button>
                </form>
            </div>
        </section>


    </main>

    <!-- Footer -->
    @include('user.layout.footer')
</body>

</html>