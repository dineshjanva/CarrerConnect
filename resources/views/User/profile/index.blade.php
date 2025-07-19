<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <!-- Header -->

    @include('user.layout.navbar')

    <!-- Profile Container -->
    <div class="profile-container">
        <!-- Profile Sidebar -->
        <div class="profile-sidebar">
            <div class="profile-card">
                <div class="profile-header">
                    <div class="profile-img-container">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&h=200&q=80"
                            alt="Profile" class="profile-img">
                        <button class="change-img-btn">
                            <i class="fas fa-camera"></i>
                        </button>
                    </div>
                    <h2 class="profile-name">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</h2>
                    <p class="profile-title">{{ Auth::user()->bio ?? 'Add Bio'  }}</p>

                    <div class="profile-stats">
                        <div class="stat-item">
                            <div class="stat-number">142</div>
                            <div class="stat-label">Connections</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">24</div>
                            <div class="stat-label">Posts</div>
                        </div>
                    </div>
                </div>
                <div class="profile-actions">
                    <a href="#" class="action-btn primary">View Public Profile</a>
                    <a href="#" class="action-btn">Add Profile Section</a>
                    @role('jobseeker')
                    <a href="#" class="action-btn">Download Resume</a>
                    @endrole
                    @auth
                    @role('employer')
                    <a href="{{ route('addJob.page') }}" class="action-btn">Add Job Post</a>
                    @endrole
                    @endauth
                    @role('employer')
                    <a href="{{ route('dashboard') }}" class="action-btn">Go To Dashboard</a>
                    @endrole

                    <a href="{{ route('logout') }}" class="action-btn">Logout</a>
                </div>
            </div>

                @role('jobseeker')
            <div class="skills-card">
                <h3 class="card-title">Skills & Endorsements</h3>
                <div class="skills-list" id="skills-List">

                    @if (!empty($skills?->skill))
                    <div class="skills-container" style="display: flex; flex-wrap: wrap; gap: 10px;">
                        @foreach(explode(',', $skills->skill) as $skill)
                        <div class="skill-tag">{{ trim($skill) }}</div>
                        @endforeach
                    </div>
                    @endif
                    <!-- <div class="skill-tag">React.js</div> -->
                    {{-- <div class="form-group">
                        <input type="text" id="inpskills" class="Skill" style="display:none;" placeholder="Add Skill">
                    </div> --}}
                </div>
                <!-- <a href="{{ route('skillsPage') }}"> -->
                    <button type="submit" class="edit-btn"  style="margin-top: 20px;" onclick="window.location='{{ route('skillsPage') }}'"><i class="fas fa-plus"></i> Add Skill
                    </button>
                <!-- </a> -->
            </div>
                    @endrole
        </div>

        <!-- Profile Main Content -->
        <div class="profile-main">
            <!-- About Section -->

            <div class="profile-section">
                <div class="section-header">
                    <h3 class="section-title">
                        @if(auth()->check() && auth()->user()->hasRole('employer'))
                        Company Description
                        @else
                        About
                        @endif
                    </h3>
                    <button class="edit-btn">
                        <i class="fas fa-pencil-alt"></i> Edit
                    </button>
                </div>
                <div class="section-content">
                    <p class="bio-text">
                        {{ Auth::user()->about }}
                    </p>

                    <form action="{{ route('ProfileUpdate') }}" method="post">
                        @csrf
                        <div class="edit-form">
                            <div class="form-group">
                                <label for="bio">Professional Summary</label>
                                <textarea id="bio" name="desc">{{ Auth::user()->about}}</textarea>
                            </div>
                            @error('bio')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-actions">
                                <button class="cancel-btn">Cancel</button>
                                <button type="submit" class="save-btn">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Personal Information -->
            <div class="profile-section">
                @if (session('profilesuccess'))
                <span class=" text-success">{{ session('profilesuccess') }}</span>
                @endif
                <div class="section-header">
                    <h3 class="section-title">Personal Information</h3>
                    <button class="edit-btn">
                        <i class="fas fa-pencil-alt"></i> Edit
                    </button>
                </div>
                <div class="section-content">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">First Name</div>
                            <div class="info-value">{{ Auth::user()->name }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Last Name</div>
                            <div class="info-value">{{ Auth::user()->lastname }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Email</div>
                            <div class="info-value">{{ Auth::user()->email }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Phone</div>
                            <div class="info-value">{{ Auth::user()->phone }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Location</div>
                            <div class="info-value">{{ Auth::user()->location }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Industry</div>
                            <div class="info-value">{{ Auth::user()->industry }}</div>
                        </div>

                    </div>

                    <form action="{{ route('user.profile') }}" method="POST">
                        @csrf
                        <div class="edit-form">

                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" name="name" id="firstName"
                                    value="{{ old('name', Auth::user()->name) }}" placeholder="Enter your first name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" name="lastname" id="lastName"
                                    value="{{ old('lastname', Auth::user()->lastname) }}"
                                    placeholder="Enter your last name">
                                @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', Auth::user()->email) }}" placeholder="Enter your email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" name="phone" id="phone"
                                    value="{{ old('phone', Auth::user()->phone) }}"
                                    placeholder="Enter your phone number">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" id="location"
                                    value="{{ old('location', Auth::user()->location) }}"
                                    placeholder="Enter your location">
                                @error('location')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="location">Bio</label>
                                <input type="text" name="bio" id="Bio" value="{{ Auth::user()->bio }}"
                                    placeholder="Enter your Bio">
                                @error('bio')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="industry">Industry</label>
                                <select name="industry" id="industry">
                                    <option value="">-- Select Industry --</option>
                                    <option value="Information Technology"
                                        {{ old('industry', Auth::user()->industry) == '' ? 'selected' : 'Information Technology' }}>
                                        Information Technology</option>
                                    <option value="finance"
                                        {{ old('industry', Auth::user()->industry) == 'finance' ? 'selected' : '' }}>
                                        Finance</option>
                                    <option value="healthcare"
                                        {{ old('industry', Auth::user()->industry) == 'healthcare' ? 'selected' : '' }}>
                                        Healthcare</option>
                                    <option value="education"
                                        {{ old('industry', Auth::user()->industry) == 'education' ? 'selected' : '' }}>
                                        Education</option>
                                    <option value="retail"
                                        {{ old('industry', Auth::user()->industry) == 'retail' ? 'selected' : '' }}>
                                        Retail</option>
                                </select>
                                @error('industry')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-actions">
                                <button type="reset" class="cancel-btn">Cancel</button>
                                <button type="submit" class="save-btn">Save Changes</button>
                            </div>
                        </div>
                    </form>

                    <!-- #endregion -->
                </div>
            </div>

            <!-- Company Details -->
            @if (auth()->check() && auth()->user()->hasRole('employer') && $company)
            <div class="profile-section">
                @if (session('success'))
                <span class=" text-success">{{ session('success') }}</span>
                @endif
                <div class="section-header">
                    <h3 class="section-title">Company Information</h3>
                    <button class="edit-btn">
                        <i class="fas fa-pencil-alt"></i> Edit
                    </button>
                </div>
                <div class="section-content">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Company Name</div>
                            <div class="info-value">{{ $company->name }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Tagline</div>
                            <div class="info-value">{{ $company->tagline }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Website</div>
                            <div class="info-value">{{ $company->website }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Employee size</div>
                            <div class="info-value">{{ $company->employee_size }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Location</div>
                            <div class="info-value">{{ $company->location }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Industry</div>
                            <div class="info-value">{{ $company->industry }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Description</div>
                            <div class="info-value">{{ $company->description }}</div>
                        </div>
                    </div>


                    <div class="edit-form">
                        <form action="{{ route('companyprofileupdated') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="companyName">Company Name</label>
                                <input type="text" id="companyName" name="company_name"
                                    value="{{ old('company_name', $company->name) }}" placeholder="Enter company name">
                                @error('company_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tagline">Tagline</label>
                                <input type="text" id="tagline" name="tagline"
                                    value="{{ old('tagline', $company->tagline) }}" placeholder="Enter tagline">
                                @error('tagline')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Website</label>
                                <input type="text" id="email" name="website"
                                    value="{{ old('website', $company->website) }}" placeholder="https://example.com">
                                @error('website')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="employee_size">Employee Size</label>
                                <input type="text" id="employee_size" name="employee_size"
                                    value="{{ old('employee_size', $company->employee_size) }}"
                                    placeholder="e.g. 10-50">
                                @error('employee_size')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" id="location" name="location"
                                    value="{{ old('location', $company->location) }}"
                                    placeholder="e.g. Udaipur, Rajasthan">
                                @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="industry">Industry</label>
                                <select id="industry" name="industry">
                                    <option value="">-- Select Industry --</option>
                                    <option value="Information Technology"
                                        {{ old('industry', $company->industry) == 'Information Technology' ? 'selected' : '' }}>
                                        Information
                                        Technology</option>
                                    <option value="finance"
                                        {{ old('industry', $company->industry) == 'finance' ? 'selected' : '' }}>Finance
                                    </option>
                                    <option value="healthcare"
                                        {{ old('industry', $company->industry) == 'healthcare' ? 'selected' : '' }}>
                                        Healthcare</option>
                                    <option value="education"
                                        {{ old('industry', $company->industry) == 'education' ? 'selected' : '' }}>
                                        Education</option>
                                    <option value="retail"
                                        {{ old('industry', $company->industry) == 'retail' ? 'selected' : '' }}>Retail
                                    </option>
                                </select>
                                @error('industry')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input text="textarea" id="description" name="description"
                                    value="{{ old('description', $company->description) }}"
                                    placeholder="Short company description">
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-actions">
                                <button type="reset" class="cancel-btn">Cancel</button>
                                <button type="submit" class="save-btn">Save Company Information</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @role('jobseeker')
            <!-- Experience Section -->
            <div class="profile-section">
                <div class="section-header">
                    <h3 class="section-title">Experience</h3>
                    <a href="{{ route('experience') }}" style="text-decoration: none;">
                        <button
                            style="color: var(--primary-blue);background: none;border: none;font-weight: 600;cursor: pointer; display: flex; align-items: center; gap: 5px;">
                            <i class="fas fa-plus"></i> Add Experience
                        </button>
                    </a>
                </div>
                <div class="section-content">
                    <!-- Experience Item 1 -->
                    @foreach ($experience as $c)

                    <div class="experience-item">
                        <div class="exp-logo">TC</div>
                        <div class="exp-details">
                            <div style="display: flex; justify-content: space-between;">
                                <h4 class="exp-title">{{ $c->job_title }}</h4>
                                <a href="{{ route('updateExperience',['id'=>$c->id]) }}" class="action-btn primary"
                                    style="padding: 5px; ">Edit</a>
                            </div>
                            <div class="exp-company">{{ $c->company_name }}</div>
                            <div class="exp-duration">{{ $c->years }}</div>
                            <p class="exp-description">
                                {{ $c->description }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Education Section -->
            <div class="profile-section">
                <div class="section-header">
                    <h3 class="section-title">Education</h3>
                    <a href="{{ route('education') }}" style="text-decoration: none;">
                        <button
                            style="color: var(--primary-blue);background: none;border: none;font-weight: 600;cursor: pointer; display: flex; align-items: center; gap: 5px;">
                            <i class="fas fa-plus"></i> Add Education
                        </button>
                    </a>
                </div>
                <div class="section-content">
                    <!-- Education Item 1 -->
                    @foreach ($education as $e)
                    <div class="education-item">
                        <div class="edu-logo">UT</div>
                        <div class="edu-details">
                            <div style="display: flex; justify-content: space-between;">
                                <h4 class="edu-title">{{ $e->degree_title }}</h4>

                                <a href="{{ route('updateEducation',['id'=>$e->id]) }}" class="action-btn primary"
                                    style="padding: 5px; ">Edit</a>
                            </div>
                            <div class="edu-school">{{ $e->institute_name }}</div>
                            <div class="edu-duration">{{ $e->years }}</div>
                            <p class="edu-description">
                                {{ $e->description }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endrole
        </div>
    </div>

    <!-- Footer -->
    @include('user.layout.footer')

    <script>
    // Simple JavaScript to toggle edit mode
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-btn');

        editButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const section = this.closest('.profile-section');
                section.classList.toggle('edit-mode');

                // Change button text based on state
                if (section.classList.contains('edit-mode')) {
                    const pencilIcon = this.querySelector('.fa-pencil-alt');
                    if (pencilIcon) {
                        this.innerHTML = '<i class="fas fa-times"></i> Cancel';
                    }
                } else {
                    const timesIcon = this.querySelector('.fa-times');
                    if (timesIcon) {
                        this.innerHTML = '<i class="fas fa-pencil-alt"></i> Edit';
                    }
                }
            });
        });

        // Change profile image simulation
        const changeImgBtn = document.querySelector('.change-img-btn');
        changeImgBtn.addEventListener('click', function() {
            alert('Profile image change functionality would open a file dialog in a real application');
        });

        // Form cancel buttons
        const cancelButtons = document.querySelectorAll('.cancel-btn');
        cancelButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const section = this.closest('.profile-section');
                section.classList.remove('edit-mode');

                // Reset button text
                const editBtn = section.querySelector('.edit-btn');
                editBtn.innerHTML = '<i class="fas fa-pencil-alt"></i> Edit';
            });
        });
    });

    var inpskills = document.getElementById('inpskills');
    var skillsList = document.getElementById('skills-List');
    var Addskillbtn = document.getElementById('Addskillbtn');

    Addskillbtn.addEventListener('click', function(e) {
        e.preventDefault();

        if (inpskills.style.display === 'none' || inpskills.style.display === '') {
            inpskills.style.display = 'block';
            inpskills.focus();
        } else if (inpskills.value.trim() !== '') {
            addSkill();
        }
    });

    inpskills.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            addSkill();
        }
    });

    function addSkill() {
        var skill = inpskills.value.trim();
        console.log(skill);
        if (skill !== '') {
            var div = document.createElement('div');
            div.className = 'skill-tag';
            div.textContent = skill;

            // Insert before input box
            skillsList.insertBefore(div, inpskills.parentElement);
        }

        // Clear input and hide
        inpskills.value = '';
        inpskills.style.display = 'none';
    }
    </script>
</body>

</html>
