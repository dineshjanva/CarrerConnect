<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | About Us</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seeker/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <!-- Header -->
    @include('user.layout.navbar')

    <!-- About Page Content -->
    <main class="about-container">
        <h1 class="page-title">About CareerConnect</h1>

        <div class="hero-about">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Connecting Talent with <span>Opportunity</span></h1>
                    <p>CareerConnect was founded in 2018 with a simple mission: to transform how people find meaningful
                        work and how companies discover exceptional talent. Today, we're proud to be one of the
                        fastest-growing job platforms, serving millions of professionals and thousands of companies
                        worldwide.</p>

                    <div class="stats">
                        <div class="stat-item">
                            <span class="stat-number">5M+</span>
                            <span class="stat-label">Professionals</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">15K+</span>
                            <span class="stat-label">Companies</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">250K+</span>
                            <span class="stat-label">Jobs Filled</span>
                        </div>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=600&h=500"
                        alt="CareerConnect Team">
                </div>
            </div>
        </div>

        <div class="mission-section">
            <div class="mission-card">
                <div class="mission-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3>Our Mission</h3>
                <p>To create economic opportunities for every professional by connecting talent with opportunity in a
                    transparent, efficient, and human way.</p>
            </div>

            <div class="mission-card">
                <div class="mission-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <h3>Our Vision</h3>
                <p>A world where anyone can find meaningful work that aligns with their skills, values, and aspirations.
                </p>
            </div>

            <div class="mission-card">
                <div class="mission-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Our Impact</h3>
                <p>We've helped thousands of companies build diverse, high-performing teams and empowered millions of
                    professionals to advance their careers.</p>
            </div>
        </div>

        <div class="team-section">
            <h2 class="section-title">Meet Our Leadership</h2>

            <div class="team-grid">
                <div class="team-member">
                    <div class="member-photo">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3 class="member-name">Sarah Johnson</h3>
                    <div class="member-position">CEO & Founder</div>
                    <p class="member-bio">Former tech executive with 15+ years in HR technology and talent acquisition.
                    </p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-photo">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3 class="member-name">Michael Chen</h3>
                    <div class="member-position">CTO</div>
                    <p class="member-bio">Technology leader with expertise in AI-driven matching algorithms and platform
                        scalability.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-photo">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3 class="member-name">Priya Sharma</h3>
                    <div class="member-position">Head of Product</div>
                    <p class="member-bio">Product visionary focused on creating intuitive experiences for both job
                        seekers and employers.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-photo">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3 class="member-name">David Williams</h3>
                    <div class="member-position">Head of Growth</div>
                    <p class="member-bio">Growth strategist with a passion for building communities and creating value.
                    </p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="values-section">
            <h2 class="section-title">Our Core Values</h2>

            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>People First</h3>
                    <p>We prioritize the needs and experiences of both job seekers and employers, recognizing that
                        people are at the heart of everything we do.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Innovation</h3>
                    <p>We constantly challenge ourselves to develop smarter, more effective solutions for connecting
                        talent with opportunity.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Integrity</h3>
                    <p>We operate with transparency, honesty, and ethical practices in all our interactions and
                        decisions.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3>Inclusivity</h3>
                    <p>We believe in creating equal opportunities for all and building diverse, inclusive workplaces.
                    </p>
                </div>
            </div>
        </div>

        <div class="cta-section">
            <div class="cta-content">
                <h2>Join Our Growing Community</h2>
                <p>Whether you're looking for your next career move or seeking exceptional talent for your organization,
                    CareerConnect is here to help you succeed.</p>
                <div class="cta-buttons">
                    <a href="{{ route('user.find_job') }}" class="btn-primary">Find Your Dream Job</a>
                    <a href="{{ route('addJob.page') }}" class="btn-outline">Post a Job Opening</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('user.layout.footer')
</body>

</html>