<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Login</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <!-- Bootstrap CSS -->

</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <a href="{{ route('home') }}" class="logo">
                <i class="fas fa-briefcase"></i>
                <span>CareerConnect</span>
            </a>
        </div>
    </header>

    <!-- Login Section -->
    <div class="login-container">
        <div class="login-left">
            <h1>Welcome Back to CareerConnect</h1>
            <p>Sign in to access your personalized job recommendations, saved searches, and application history.</p>
            
            <ul class="features-list">
                <li>
                    <i class="fas fa-briefcase"></i>
                    <span>Access thousands of job opportunities tailored to your profile</span>
                </li>
                <li>
                    <i class="fas fa-bell"></i>
                    <span>Get notified about new jobs matching your preferences</span>
                </li>
                <li>
                    <i class="fas fa-file-alt"></i>
                    <span>Track your job applications in one convenient place</span>
                </li>
                <li>
                    <i class="fas fa-chart-line"></i>
                    <span>Receive career insights and growth recommendations</span>
                </li>
            </ul>
        </div>
        
        <div class="login-right">
            <div class="login-form-container">
                <div class="login-header">
                    <h2>Login to Your Account</h2>
                    <p>Enter your credentials to access your dashboard</p>
                </div>
                
                <form class="login-form" action="{{ route('loginData') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required>
                            @error('email')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required>
                             @error('pssword')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-options">
                        <div class="remember-me">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <a href="#" class="forgot-password">Forgot password?</a>
                    </div>
                    
                    <button type="submit" class="login-btn">Sign In</button>
                    
                    <div class="divider">
                        <span>Or continue with</span>
                    </div>
                    
                    <div class="social-login">
                        <div class="social-btn google-btn">
                            <i class="fab fa-google"></i>
                            <span>Google</span>
                        </div>
                        <div class="social-btn linkedin-btn">
                            <i class="fab fa-linkedin-in"></i>
                            <span>LinkedIn</span>
                        </div>
                    </div>
                    
                    <div class="signup-link">
                        <p>Don't have an account?</p>
                        <a href="{{ route('register') }}">Create an account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
@include('user.layout.footer')
</body>
</html>