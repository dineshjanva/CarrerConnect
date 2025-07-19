<style>
    .language-selector select {
        padding: 2px 12px;
        font-size: 14px;
        color: #333;
        width: auto;
        background-color: #fff;
        border: 1px solid #ccc;
        background-position: right 10px center;
        background-size: 16px;
        cursor: pointer;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .language-selector select:focus {
        outline: none;
        border-color: #4f46e5;

        box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.3);
    }

    @media (max-width: 600px) {
        .language-selector {
            display: none;
        }
    }
</style>

<header>
    <div class="header-container">
        <a href="" class="logo">
            <i class="fas fa-briefcase"></i>
            <span>{{ __('messages.header.logo') }}</span>
        </a>
        <nav>
            <ul>
                @guest
                    <li><a href="{{ route('home') }}">{{ __('messages.header.home') }}</a></li>
                    <li><a href="{{ route('user.find_job') }}">{{ __('messages.header.find_jobs') }}</a></li>
                    <li><a href="{{ route('company') }}">{{ __('messages.header.companies') }}</a></li>
                    <li><a href="{{ route('resourse') }}">{{ __('messages.header.resources') }}</a></li>
                    <li><a href="{{ route('about') }}">{{ __('messages.header.about') }}</a></li>
                @endguest
                @auth

                    @role('employer')
                    <li><a href="{{ route('home') }}">{{ __('messages.header.home') }}</a></li>
                    <li><a href="{{ route('user.find_job') }}">{{ __('messages.header.find_jobs') }}</a></li>
                    <li><a href="{{ route('company') }}">{{ __('messages.header.companies') }}</a></li>
                    <li><a href="{{ route('websiteUser') }}">{{ __('messages.header.candidate') }}</a></li>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    @endrole

                    @role('jobseeker')
                    <li><a href="{{ route('home') }}">{{ __('messages.header.home') }}</a></li>
                    <li><a href="{{ route('user.find_job') }}">{{ __('messages.header.find_jobs') }}</a></li>
                    <li><a href="{{ route('company') }}">{{ __('messages.header.companies') }}</a></li>
                    <li><a href="{{ route('websiteUser') }}">{{ __('messages.header.candidate') }}</a></li>
                    @endrole

                @endauth
            </ul>
        </nav>

        @auth
            <div class="user-menu">
                <a href="{{ route('noti') }}" class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">2</span>
                </a>
                <a href="{{ route('chat') }}" class="messages-btn">
                    <i class="fas fa-envelope"></i>
                </a>
                <a href="{{ route('user.profile') }}" class="profile-btn">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&h=100&q=80"
                        alt="Profile">
                    <span>{{ Auth::user()->name }} {{ strtoupper(substr(Auth::user()->lastname, 0, 1)) }}.</span>
                </a>
            </div>
        @else
            <div class="header-buttons">
                <a href="{{ route('login') }}" class="btn btn-login">{{ __('messages.header.login') }}</a>
                <a href="{{ route('register') }}" class="btn btn-register">{{ __('messages.header.register') }}</a>
            </div>
        @endauth

        <div class="language-selector">
            <select id="languageSwitcher" class="">
                <option value="{{ route('lang', ['locale' => 'hi']) }}" {{ app()->getLocale() == 'hi' ? 'selected' : '' }}>हिन्दी</option>
                <option value="{{ route('lang', ['locale' => 'en']) }}" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
            </select>
        </div>

    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const languageSwitcher = document.getElementById('languageSwitcher');
        languageSwitcher.addEventListener('change', function () {
            const selectedUrl = this.value;
            if (selectedUrl) {
                window.location.href = selectedUrl;
            }
        });
    });
</script>