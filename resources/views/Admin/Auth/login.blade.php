<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect Admin | Login</title>
    <link rel="stylesheet" href="{{ asset('css/admin/loginCSS/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="#" class="logo">
                <i class="fas fa-briefcase"></i>
                <span>CareerConnect</span>
                <span class="admin-tag">ADMIN</span>
            </a>
        </div>
    </header>

    <!-- Login Section -->
    <div class="login-container">
        <div class="login-left">
            <h1>Admin Portal Login</h1>
            <p>Access the CareerConnect administration dashboard to manage the platform, users, and job listings.</p>

            <ul class="features-list">
                <li>
                    <i class="fas fa-users-cog"></i>
                    <span>Manage user accounts and permissions</span>
                </li>
                <li>
                    <i class="fas fa-file-alt"></i>
                    <span>Review and approve job postings</span>
                </li>
                <li>
                    <i class="fas fa-chart-bar"></i>
                    <span>Access platform analytics and reports</span>
                </li>
                <li>
                    <i class="fas fa-cogs"></i>
                    <span>Configure system settings and preferences</span>
                </li>
                <li>
                    <i class="fas fa-shield-alt"></i>
                    <span>Monitor platform security and activity</span>
                </li>
            </ul>
        </div>

        <div class="login-right">
            <div class="login-form-container">
                <div class="login-header">
                    <h2>Admin Login</h2>
                    <p>Enter your credentials to access the dashboard</p>
                </div>

                <form class="login-form" action="{{ route('admin_login') }}" method="post">
                    @csrf
                    {{-- Email Field --}}
                    <div class="form-group">
                        <label for="email">Admin Email</label>
                        <div class="input-with-icon">
                            <i class="fas fa-user"></i>
                            <input type="email" id="email" name="email" placeholder="admin@careerconnect.com"
                                value="{{ old('email') }}" required>
                        </div>
                        @error('email')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password Field --}}
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" placeholder="Enter your password"
                                required>
                        </div>
                        @error('password')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-options">
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Remember this device</label>
                        </div>
                        <a href="#" class="forgot-password">Forgot password?</a>
                    </div>

                    <button type="submit" class="login-btn">Sign In</button>

                    <div class="security-note">
                        <i class="fas fa-lock"></i>
                        <span>For security reasons, please log out after each session and do not share your
                            credentials.</span>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('admin.layout.footer')

    <script>
        // Simple form validation and animation

        document.querySelector('.login-form').addEventListener('submit', function (e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (email && password) {
                const btn = document.querySelector('.login-btn');
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Authenticating...';
                btn.disabled = true;

                // Let the form submit normally
            }
            // else: browser will block submission because of 'required' attribute
        });



        // Add focus effect to inputs
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function () {
                this.parentElement.style.borderColor = '#2c5aa0';
            });

            input.addEventListener('blur', function () {
                this.parentElement.style.borderColor = '';
            });
        });
    </script>
</body>

</html>