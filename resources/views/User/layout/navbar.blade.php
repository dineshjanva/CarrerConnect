<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('storage/website_logo/Copilot_20250722_173546.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Overlay for mobile menu */
        .mobile-menu-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.2);
            z-index: 999;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

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

        .mainlogo {
            display: block;
            max-width: 80px;
            height: auto;
            margin: 0 auto;
            /* padding: 1rem 0; */
            object-fit: cover;
            object-position: center;
            transition: transform 0.3s ease-in-out;
        }


        .mainlogo:hover {
            transform: scale(1.05);
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

    <style>
        @media (min-width: 769px) {
            .mobile-menu-btn {
                display: none;
            }
        }
    </style>
    <style>
        @media (max-width: 768px) {
            .header-container {
                flex-direction: row;
                align-items: center;
                padding: 0.5rem 1rem;
                position: relative;
            }

            nav {
                overflow: visible;
            }

            nav ul.mobile-active {

                position: fixed;
                top: 0;
                right: 0;
                width: 70vw;
                max-width: 320px;
                height: 100vh;
                margin: 0;
                padding: 2rem 1rem 1rem;
                display: none;
                flex-direction: column;
                background: #fff;
                box-shadow: -2px 0 8px rgba(0, 0, 0, 0.08);
                transform: translateX(100%);
                transition: transform 0.3s ease;
                z-index: 1500;
            }

            nav ul.mobile-active {
                display: flex;
                transform: translateX(0);
            }

            .mobile-menu-btn {
                display: block;
                background: none;
                border: none;
                font-size: 2rem;
                color: #333;
                cursor: pointer;
                margin-left: auto;
                z-index: 1600;
            }

            .user-menu,
            .header-buttons,
            .language-selector {
                display: none !important;
            }
        }

        @media (min-width: 769px) {
            .mobile-menu-btn {
                display: none;
            }
        }
    </style>

</head>

<header>


    <div class="header-container">

        <a href="" class="logo">

            <img class="mainlogo" src="{{ asset('storage/website_logo/Copilot_20250722_181312.png') }}" alt="logo">
        </a>
        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Open menu">
            <i class="fas fa-bars"></i>
        </button>
        <nav>
            <ul id="mainNavList">
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
                    <li><a href="{{ route('dashboard') }}">{{ __('messages.header.dashboard') }}</a></li>
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
                {{-- <a href="{{ route('chat') }}" class="messages-btn">
                    <i class="fas fa-envelope"></i>
                </a> --}}
                <a href="{{ route('user.profile') }}" class="profile-btn">
                    <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&h=200&q=80' }}""
                                                                    alt=" Profile">
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
                <option value="{{ route('lang', ['locale' => 'hi']) }}" {{ app()->getLocale() == 'hi' ? 'selected' : ''
                    }}>हिन्दी</option>
                <option value="{{ route('lang', ['locale' => 'en']) }}" {{ app()->getLocale() == 'en' ? 'selected' : ''
                    }}>English</option>
            </select>
        </div>

    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mainNavList = document.getElementById('mainNavList');
        const mobileOverlay = document.getElementById('mobileMenuOverlay');
        const languageSwitcher = document.getElementById('languageSwitcher');

        function openMobileMenu() {
            mainNavList.classList.add('mobile-active');
            if (mobileOverlay) mobileOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        function closeMobileMenu() {
            mainNavList.classList.remove('mobile-active');
            if (mobileOverlay) mobileOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        if (mobileMenuBtn && mainNavList) {
            mobileMenuBtn.addEventListener('click', function () {
                if (mainNavList.classList.contains('mobile-active')) {
                    closeMobileMenu();
                } else {
                    openMobileMenu();
                }
            });
            if (mobileOverlay) mobileOverlay.addEventListener('click', closeMobileMenu);
            mainNavList.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', function () {
                    if (window.innerWidth <= 768) {
                        closeMobileMenu();
                    }
                });
            });
        }
        if (languageSwitcher) {
            languageSwitcher.addEventListener('change', function () {
                const selectedUrl = this.value;
                if (selectedUrl) {
                    window.location.href = selectedUrl;
                }
            });
        }
    });
</script>