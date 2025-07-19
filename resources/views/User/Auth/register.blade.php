<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Create Account</title>
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

    <!-- Registration Section -->
    <div class="register-container">
        <div class="register-left">
            <h1>Join CareerConnect Today</h1>
            <p>Create your free account and unlock access to thousands of job opportunities, career resources, and
                professional networking.</p>

            <ul class="features-list">
                <li>
                    <i class="fas fa-search"></i>
                    <span>Find your perfect job with our advanced search tools</span>
                </li>
                <li>
                    <i class="fas fa-bell"></i>
                    <span>Get notified about new opportunities matching your profile</span>
                </li>
                <li>
                    <i class="fas fa-file-alt"></i>
                    <span>Build and manage your professional profile</span>
                </li>
                <li>
                    <i class="fas fa-network-wired"></i>
                    <span>Connect with industry professionals and recruiters</span>
                </li>
                <li>
                    <i class="fas fa-chart-line"></i>
                    <span>Access career insights and growth opportunities</span>
                </li>
            </ul>
        </div>

        <div class="register-right">
            <div class="register-form-container">
                <div class="register-header">
                    <h2>Create Your Account</h2>
                    <p>Join thousands of professionals finding their dream jobs</p>
                </div>

                <form class="register-form" action="{{ route('registerData') }}" method="post">
                    @csrf
                    <div class="name-group">
                        <div class="form-group">
                            <label for="first-name">First Name *</label>
                            <div class="input-with-icon">
                                <i class="fas fa-user"></i>
                                <input type="text" id="first-name" name="firstname" placeholder="Enter your first name"
                                    required>
                                @error('firstname')
                                    <span class="alert text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last-name">Last Name *</label>
                            <div class="input-with-icon">
                                <i class="fas fa-user"></i>
                                <input type="text" id="last-name" name="lastname" placeholder="Enter your last name"
                                    required>
                                @error('lastname')
                                    <span class="alert text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required>
                            @error('email')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password *</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" placeholder="Create a password"
                                required>
                            @error('password')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Confirm Password *</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="confirm-password" name="password_confirmation"
                                placeholder="Confirm your password" required>
                        </div>
                    </div>

                    <div class="account-type">
                        <h3>I'm a: *</h3>
                        <div class="type-options">
                            <div class="type-option selected" data-role="jobseeker">
                                <i class="fas fa-user-tie"></i>
                                <h4>Job Seeker</h4>
                                <p>Looking for opportunities</p>
                            </div>
                            <div class="type-option" data-role="employer">
                                <i class="fas fa-building"></i>
                                <h4>Employer</h4>
                                <p>Hiring talent</p>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden input to capture role -->
                    <input type="hidden" name="role" id="role" value="jobseeker">

                    <div class="terms">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy
                                Policy</a></label>
                    </div>

                    <button type="submit" class="register-btn">Create Account</button>

                    <div class="divider">
                        <span>Or sign up with</span>
                    </div>

                    <div class="social-register">
                        <div class="social-btn google-btn">
                        <a href="{{ url('/auth/google') }}" style="text-decoration: none; color:black;">
                            <i class="fab fa-google"></i>
                            <span>Google</span>
                            </div>
                        </a>


                        <div class="social-btn linkedin-btn">
                            <i class="fab fa-linkedin-in"></i>
                            <span>LinkedIn</span>
                        </div>
                    </div>

                    <div class="login-link">
                        <p>Already have an account?</p>
                        <a href="{{ route('login') }}">Sign in now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('user.layout.footer')

    <script>
        document.querySelectorAll('.type-option').forEach(option => {
            option.addEventListener('click', () => {
                // Remove selected from all
                document.querySelectorAll('.type-option').forEach(el => el.classList.remove('selected'));
                // Add selected to clicked
                option.classList.add('selected');
                // Set hidden input value
                document.getElementById('role').value = option.getAttribute('data-role');
            });
        });
    </script>

</body>

</html>