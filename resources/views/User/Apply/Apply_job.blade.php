<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Apply Now</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seeker/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap CSS -->


</head>

<style>
    .alert {
        padding: 10px;
        border: 1px solid transparent;
        border-radius: 4px;
        margin-bottom: 20px;
        font-size: 16px;
    }

    .text-danger {
        color: #dc3545;
        /* Bootstrap's red */
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    .text-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .text-warning {
        color: #856404;
        background-color: #fff3cd;
        border-color: #ffeeba;
    }
</style>

<body>
    <!-- Header -->
    @include('user.layout.navbar')

    <!-- Main Content -->
    <main class="apply-container">
        <h1 class="page-title">Apply Now</h1>

        <div class="application-header">
            <h2 class="job-title">{{ $jobDetails->job_title }}</h2>
            <div class="company-name">{{ $jobDetails->company_name }}.</div>

            <div class="job-meta">
                <div class="meta-item">
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $jobDetails->location }}
                </div>
                <div class="meta-item">
                    <i class="fas fa-money-bill-wave"></i>
                    ${{ $jobDetails->salary_range }}
                </div>
                <div class="meta-item">
                    <i class="fas fa-briefcase"></i>
                    {{ $jobDetails->job_type }}
                </div>
                <div class="meta-item">
                    <i class="fas fa-clock"></i>
                    {{ $jobDetails->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
        <div class="application-body">

            <div class="application-form">
                <h3 class="form-title">Application Form</h3>
                @if (session('success'))
                    <span class="alert bg-success text-success">{{ session('success') }}</span>
                @endif

                <form action="{{ route('Applyed') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $id }}">
                    <div class="form-group">
                        <label for="full-name">Full Name *</label>
                        <input type="text" name="full_name" id="full-name" required value="{{ old('full_name') }}">
                        @error('full_name')
                            <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" name="email" id="email" required value="{{ old('email') }}">
                        @error('email')
                            <span class=" alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="tel" name="mobile" id="phone" required value="{{ old('phone') }}">
                        @error('mobile')
                            <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="location">Current Location *</label>
                        <input type="text" name="current_location" id="location" required
                            value="{{ old('current_location') }}">
                        @error('current_location')
                            <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="resume">Upload Resume *</label>
                        <div class="file-upload">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Click to upload or drag and drop</p>
                            <p>PDF, DOC, DOCX (Max file size: 5MB)</p>
                            <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" class="p-1" required
                                value="{{ old('resume') }}">
                        </div>
                        @error('resume')
                            <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="cover-letter">Cover Letter</label>
                        <textarea id="cover-letter" name="cover_letter"
                            placeholder="Tell us why you're a great fit for this position...">{{ old('cover_letter') }}</textarea>
                        @error('cover_letter')
                            <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="linkedin">LinkedIn Profile URL</label>
                        <input type="url" id="linkedin" name="linkedin"
                            placeholder="https://linkedin.com/in/yourprofile" value="{{ old('linkedin') }}">
                        @error('linkedin')
                            <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="portfolio">Portfolio/Website URL</label>
                        <input type="url" id="portfolio" name="portfolio" placeholder="https://yourportfolio.com"
                            value="{{ old('portfolio') }}">
                        @error('portfolio')
                            <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="source">How did you hear about this position? *</label>
                        <select id="source" required name="source">
                            <option value="">Select an option</option>
                            <option value="linkedin">LinkedIn</option>
                            <option value="careerconnect">CareerConnect</option>
                            <option value="company">Company Website</option>
                            <option value="referral">Employee Referral</option>
                            <option value="job-board">Job Board</option>
                            <option value="other">Other</option>
                        </select>
                        @error('source')
                            <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-checkbox">
                        <input type="checkbox" id="agreement" required>
                        <label for="agreement">I agree to the <a href="#">Terms and Conditions</a> and <a
                                href="#">Privacy Policy</a></label>
                    </div>

                    <button type="submit" class="submit-btn">Submit Application</button>
                </form>

            </div>

            <div class="application-sidebar">
                <h3 class="sidebar-title">Application Tips</h3>

                <ul class="tips-list">
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <strong>Tailor your resume</strong>
                        <p>Customize your resume to highlight relevant experience for this specific position.</p>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <strong>Write a compelling cover letter</strong>
                        <p>Explain why you're the perfect fit and what makes you passionate about this role.</p>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <strong>Double-check for errors</strong>
                        <p>Proofread all documents to ensure there are no typos or grammatical errors.</p>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <strong>Be specific</strong>
                        <p>Provide concrete examples of your achievements and how they relate to this job.</p>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <strong>Follow instructions</strong>
                        <p>Ensure you've provided all requested information and documents.</p>
                    </li>
                </ul>

                <div class="job-summary">
                    <h3>Job Summary</h3>
                    <ul>
                        <li><i class="fas fa-building"></i>
                            <strong>Responsibilities:</strong>{{ $jobDetails->responsibilities }}
                        </li>
                        <li><i class="fas fa-chart-line"></i>
                            <strong>Experience:</strong>{{ $jobDetails->requirements }}
                        </li>
                        <li><i class="fas fa-graduation-cap"></i> <strong>Bachelor's Degree:</strong>
                            {{ $jobDetails->bachelor_degree ? 'Yes' : 'No' }}

                            <!-- @if ($jobDetails->bachelor_degree==1)
                            Yes
                            @else
                            No
                        @endif  -->
                        </li>
                        <li><i class="fas fa-laptop"></i> <strong>Work Type:</strong> {{ $jobDetails->job_type }}</li>
                        <li><i class="fas fa-tags"></i> <strong>Skills:</strong>

                            @foreach(is_array($jobDetails->required_skills) ? $jobDetails->required_skills : json_decode($jobDetails->required_skills, true) ?? [] as $skill)
                                <div class="tag">{{ $skill }}</div>
                            @endforeach

                        </li>
                        <li><i class="fas fa-calendar"></i> <strong>Posted:</strong>
                            {{ $jobDetails->created_at->format('M-d-Y') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('user.layout.footer')
</body>

</html>