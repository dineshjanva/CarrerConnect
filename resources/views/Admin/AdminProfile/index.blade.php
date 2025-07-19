<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect Admin | Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
</head>

<body>
    <!-- Sidebar -->

    @include('admin.layout.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        @include('admin.layout.topnav')

        <!-- Page Content -->
        <div class="page-content">
            <div class="page-header">
                <h1 class="page-title">My Profile</h1>
                <ul class="breadcrumb">
                    <li>Admin</li>
                    <li class="active">Profile</li>
                </ul>
            </div>

            <div class="profile-container">
                <!-- Profile Card -->
                <div class="profile-card">
                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=300&h=300&q=80"
                        alt="Admin" class="profile-picture">
                    <h2 class="profile-name">{{ Auth::user()->name }}</h2>
                    <div class="profile-role">Super Administrator</div>
                    <p>CareerConnect Platform Manager</p>

                    <div class="profile-stats">
                        <div class="stat-item">
                            <div class="stat-value">{{ number_format($totalUser) }}</div>
                            <div class="stat-label">Active Users</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">{{ number_format($totalCompanies) }}</div>
                            <div class="stat-label">Companies</div>
                        </div>
                    </div>

                    <form action="{{ route('logout') }}">
                        <div class="profile-actions">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa-solid fa-right-from-bracket"></i> Logout
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Profile Content -->
                <div class="profile-content">
                    <div class="profile-tabs">
                        <div class="tab active" data-tab="personal">Personal Info</div>
                        <div class="tab" data-tab="security">Security</div>
                        <!-- <div class="tab" data-tab="activity">Activity Log</div> -->
                    </div>

                    <div class="tab-content">
                        <!-- Personal Info Tab -->
                        <div class="tab-pane active" id="personal-tab">
                            <h3 class="section-title">Personal Information</h3>

                            <form action="{{ route('adminprofileUpdate') }}" method="POST">
                                @csrf
                                @if (session('success'))
                                    <div id="responseMessage"
                                        style="padding: 10px; color: green; background-color:rgba(0, 0, 0, 0.1); border-radius: 5px; margin-bottom: 15px;">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <div class="form-row">
                                        <label for="firstName">First Name</label>
                                        <input type="text" id="firstName" name="name" value="{{ Auth::user()->name }}">
                                        @error('name')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-row">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" id="lastName" name="lastname"
                                            value="{{ Auth::user()->lastname }}">
                                        @error('lastname')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-row full-width">
                                        <label for="email">Email Address</label>
                                        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}">
                                        @error('email')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-row">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                                        @error('phone')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-row">
                                        <label for="location">Location</label>
                                        <input type="text" id="location" name="location"
                                            value="{{ Auth::user()->location }}">
                                        @error('location')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-row full-width">
                                        <label for="bio">Bio</label>
                                        <textarea id="bio" name="bio" rows="4"
                                            style="padding: 12px 15px; border: 1px solid #ddd; border-radius: 5px; resize: vertical;">{{ Auth::user()->bio }}</textarea>
                                        @error('bio')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <h3 class="section-title">Account Settings</h3>

                                <div class="form-group">
                                    <div class="form-row">
                                        <label for="language">Language</label>
                                        <select id="language" name="language">
                                            <option {{ old('language') == 'English' ? 'selected' : '' }}>English</option>
                                            <option {{ old('language') == 'Hindi' ? 'selected' : '' }}>Hindi</option>
                                        </select>
                                        @error('language')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn-save">
                                    <i class="fas fa-save"></i> Save Changes
                                </button>
                            </form>

                        </div>

                        <!-- Security Tab -->
                        <div class="tab-pane" id="security-tab">
                            <h3 class="section-title">Security Settings</h3>

                            <div class="security-item">
                                <div class="security-info">
                                    <div class="security-title">Password</div>
                                    <div class="security-desc">Last changed
                                        {{ Auth::user()->updated_at->diffForHumans() }}
                                    </div>
                                </div>
                                <a href="#update-password"><button class="toggle-btn">Change Password</button></a>
                            </div>

                            <h3 class="section-title" id="update-password">Password Update</h3>
                            <form action="{{ route('passwordUpdate') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <!-- Current Password -->
                                    <div class="form-row">
                                        <label for="currentPassword">Current Password</label>
                                        <input type="password" id="currentPassword" name="current_password"
                                            placeholder="Enter current password">
                                        @error('current_password')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- New Password -->
                                    <div class="form-row">
                                        <label for="newPassword">New Password</label>
                                        <input type="password" id="newPassword" name="new_password"
                                            placeholder="Enter new password">
                                        @error('new_password')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="form-row">
                                        <label for="confirmPassword">Confirm Password</label>
                                        <input type="password" id="confirmPassword" name="new_password_confirmation"
                                            placeholder="Re-enter new password">
                                        @error('new_password_confirmation')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn-save">
                                    <i class="fas fa-lock"></i> Update Password
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            @include('admin.layout.footer')
        </div>
    </div>

    <script>
        // JavaScript for admin profile page
        document.addEventListener('DOMContentLoaded', function () {
            // Tab switching functionality
            const tabs = document.querySelectorAll('.tab');
            const tabPanes = document.querySelectorAll('.tab-pane');

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    const tabId = this.getAttribute('data-tab');

                    // Remove active class from all tabs and panes
                    tabs.forEach(t => t.classList.remove('active'));
                    tabPanes.forEach(p => p.classList.remove('active'));

                    // Add active class to clicked tab and corresponding pane
                    this.classList.add('active');
                    document.getElementById(`${tabId}-tab`).classList.add('active');
                });
            });
        });
    </script>
</body>

</html>