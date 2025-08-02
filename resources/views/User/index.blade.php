<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Professional Job Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/seeker/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('storage/website_logo/Copilot_20250722_173546.png') }}">

</head>

<body>
    @include('user.layout.navbar')

    <div id="loginSuccessDialog"
        style="position: fixed; top: 2rem; right: 2rem; background-color: #d1fae5; color: #065f46; padding: 1rem 1.5rem; border: 1px solid #6ee7b7; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); display: flex; align-items: center; gap: 10px; opacity: 0; transition: opacity 0.5s ease; z-index: 9999; margin-top:50px;">
        @auth
            <i class="fas fa-check-circle" style="color: #10b981; font-size: 1.2rem;"></i>
            <span>{{ __('messages.auth.login_success') }}</span>
        @endauth
    </div>


    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>{!! __('messages.hero.heading', [
    'highlight' => '<span>' . __('messages.hero.highlight') .
        '</span>'
]) !!}
                </h1>
                <p>{{ __('messages.hero.description') }}</p>
                <form action="{{ route('job.search') }}" method="post">
                    @csrf
                    <div class="hero-search">
                        <input type="text" name="search" placeholder="{{ __('messages.hero.search_placeholder') }}">
                        <button type="submit">{{ __('messages.hero.search_button') }}</button>
                    </div>
                </form>

                <div class="stats">
                    <div class="stat-item">
                        <i class="fas fa-building"></i>
                        <div class="stat-text">
                            <span class="stat-number">15,000+</span>
                            <span class="stat-label">{{ __('messages.stats.companies') }}</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-briefcase"></i>
                        <div class="stat-text">
                            <span class="stat-number">250,000+</span>
                            <span class="stat-label">{{ __('messages.stats.jobs') }}</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-users"></i>
                        <div class="stat-text">
                            <span class="stat-number">5M+</span>
                            <span class="stat-label">{{ __('messages.stats.professionals') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=600&h=600"
                    alt="CareerConnect Platform">
            </div>
        </div>
    </section>

    <section class="features">
        <div class="section-header1">
            <div>
                <h2>{{ __('messages.features.title') }}</h2>
            </div>
            <div>
                <p>{{ __('messages.features.description') }}</p>
            </div>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-search"></i></div>
                <h3>{{ __('messages.features.cards.search.title') }}</h3>
                <p>{{ __('messages.features.cards.search.description') }}</p>
                <a href="#" class="feature-link">{{ __('messages.features.cards.search.link') }} <i
                        class="fas fa-arrow-right"></i></a>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-user-tie"></i></div>
                <h3>{{ __('messages.features.cards.profiles.title') }}</h3>
                <p>{{ __('messages.features.cards.profiles.description') }}</p>
                <a href="#" class="feature-link">{{ __('messages.features.cards.profiles.link') }} <i
                        class="fas fa-arrow-right"></i></a>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-chart-line"></i></div>
                <h3>{{ __('messages.features.cards.insights.title') }}</h3>
                <p>{{ __('messages.features.cards.insights.description') }}</p>
                <a href="#" class="feature-link">{{ __('messages.features.cards.insights.link') }} <i
                        class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
    <!-- Job Listings -->

    <section class="job-listings">
        <div class="jobs-container">
            <div class="jobs-header">
                <h2>Featured Job Opportunities</h2>
                <a href="{{ route('user.find_job') }}" class="view-all">View All Jobs <i
                        class="fas fa-arrow-right"></i></a>
            </div>

            <div class="jobs-grid">
                @foreach ($lastestJobData as $l)
                    @php
                        $companyName = $l->company_name;
                        $initials = collect(explode(' ', $companyName))
                            ->map(fn($word) => strtoupper($word[0]))
                            ->join('');
                    @endphp

                    <div class="job-card">
                        <div class="job-card-header">
                            <div class="company-logo"> {{ $initials }}</div>
                            <div class="job-info">
                                <h3>{{ $l->job_title }}</h3>
                                <div class="company">{{ $l->company_name }}</div>
                            </div>
                        </div>
                        <div class="job-details">
                            <ul>
                                <li><i class="fas fa-map-marker-alt"></i> {{ $l->location }}</li>
                                <li><i class="fas fa-money-bill-wave"></i> ${{ $l->salary_range }}</li>
                                <li><i class="fas fa-clock"></i> {{ $l->job_type }}</li>
                            </ul>
                        </div>
                        <div class="job-actions">
                            <div class="job-type">Remote</div>
                            <a href="{{ route('user.applyjob', ['id' => $l->id]) }}" class="apply-btn">Apply Now</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="cta-container">
            <h2>{{ __('messages.cta.title') }}</h2>
            <p>{{ __('messages.cta.description') }}</p>
            <div class="cta-buttons">
                @role('employer')
                <a href="{{ route('addJob.page') }}" class="btn btn-employer">{{ __('messages.cta.post_job') }}</a>
                @endrole
                <a href="#" class="btn btn-jobseeker">{{ __('messages.cta.upload_resume') }}</a>
            </div>
        </div>
    </section>

    @include('user.layout.footer')

    @if(session('login_success'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const dialog = document.getElementById('loginSuccessDialog');
                setTimeout(() => {
                    dialog.style.opacity = '1';

                    setTimeout(() => {

                        dialog.style.display = 'none';
                    }, 3000);
                });
            });
        </script>
        @php session()->forget('login_success'); @endphp
    @endif
</body>

</html>