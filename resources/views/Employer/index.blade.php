<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Post a Job</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Employeer/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    @include('user.layout.navbar')
    <!-- Employer Dashboard -->
    <main class="post-job-container">
        <div class="page-header">
            <h1>Post a New Job Opportunity</h1>
            <p>Reach thousands of qualified candidates by posting your job opening on CareerConnect</p>

        </div>

        <div class="post-job-form">
            <div class="form-container">
                <form id="jobPostForm" method="POST" action="{{ route('addJob.data') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Job Details Section -->
                    <div class="form-section">
                        <h2 class="section-title">Job Details</h2>
                        @if (session('success'))
                            <span class="text-success">{{session('success') }}</span>

                        @endif
                        <div class="form-group">
                            <label for="jobTitle">Job Title *</label>
                            <input type="text" id="jobTitle" name="job_title"
                                placeholder="e.g. Senior Frontend Developer" required value="{{ old('job_title') }}">
                            @error('job_title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label for="companyName">Company Name *</label>
                            <input type="text" id="companyName" name="company_name" placeholder="e.g. TechCorp Inc."
                                required>
                            @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> --}}

                        <div class="form-row">
                            <div class="form-group">
                                <label for="jobType">Job Type *</label>
                                <select id="jobType" name="job_type" required>
                                    <option value="">Select Job Type</option>
                                    <option value="full-time" {{ old('job_type') == 'full-time' ? 'selected' : '' }}>
                                        Full-time</option>
                                    <option value="part-time" {{ old('job_type') == 'part-time' ? 'selected' : '' }}>
                                        Part-time</option>
                                    <option value="contract" {{ old('job_type') == 'contract' ? 'selected' : '' }}>
                                        Contract</option>
                                    <option value="internship" {{ old('job_type') == 'internship' ? 'selected' : '' }}>
                                        Internship</option>
                                    <option value="remote" {{ old('job_type') == 'remote' ? 'selected' : '' }}>Remote
                                    </option>
                                </select>
                                @error('job_type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="experienceLevel">Experience Level *</label>
                                <select id="experienceLevel" name="experience_level" required>
                                    <option value="">Select Experience Level</option>
                                    <option value="entry" {{ old('experience_level') == 'entry' ? 'selected' : '' }}>Entry
                                        Level</option>
                                    <option value="mid" {{ old('experience_level') == 'mid' ? 'selected' : '' }}>Mid Level
                                    </option>
                                    <option value="senior" {{ old('experience_level') == 'senior' ? 'selected' : '' }}>
                                        Senior Level</option>
                                    <option value="executive" {{ old('experience_level') == 'executive' ? 'selected' : '' }}>Executive</option>
                                </select>
                                @error('experience_level') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="location">Location *</label>
                                <input type="text" id="location" name="location"
                                    placeholder="e.g. San Francisco, CA or Remote" required
                                    value="{{ old('location') }}">
                                @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="salaryRange">Salary Range</label>
                                <input type="text" id="salaryRange" name="salary_range" placeholder="e.g. 100000-130000"
                                    value="{{ old('salary_range') }}">
                                @error('salary_range') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="applicationUrl">Application URL or Email *</label>
                            <input type="text" id="applicationUrl" name="application_url"
                                placeholder="https://yourcompany.com/apply or jobs@company.com" required
                                value="{{ old('application_url') }}">
                            @error('application_url') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Job Description Section -->
                    <div class="form-section">
                        <h2 class="section-title">Job Description</h2>

                        <div class="form-group">
                            <label for="jobDescription">Job Description *</label>
                            <textarea id="jobDescription" name="job_description"
                                placeholder="Describe the role, responsibilities, and expectations..."
                                required>{{ old('job_description') }}</textarea>
                            @error('job_description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="responsibilities">Key Responsibilities *</label>
                            <textarea id="responsibilities" name="responsibilities"
                                placeholder="List the main responsibilities of the role..."
                                required>{{ old('responsibilities') }}</textarea>
                            @error('responsibilities') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="requirements">Requirements & Qualifications *</label>
                            <textarea id="requirements" name="requirements"
                                placeholder="List the required skills and qualifications..."
                                required>{{ old('requirements') }}</textarea>
                            @error('requirements') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="benefits">Benefits & Perks</label>
                            <textarea id="benefits" name="benefits"
                                placeholder="List any benefits or perks offered...">{{ old('benefits') }}</textarea>
                            @error('benefits') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Skills & Preferences -->
                    <div class="form-section">
                        <h2 class="section-title">Skills & Preferences</h2>

                        <div class="form-group">
                            <label>Required Skills</label>
                            <input type="text" id="skillInput" name="required_skills[]"
                                placeholder="Add skills (optional)" value="{{ old('required_skills.0') }}">
                            @error('required_skills') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>Preferred Qualifications</label>
                            <div class="checkbox-group">
                                <input type="checkbox" id="bachelorDegree" name="bachelor_degree" value="1" {{ old('bachelor_degree') ? 'checked' : '' }}>
                                <label for="bachelorDegree">Bachelor's Degree</label>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" id="portfolioRequired" name="portfolio_required" value="1" {{ old('portfolio_required') ? 'checked' : '' }}>
                                <label for="portfolioRequired">Portfolio or GitHub profile</label>
                            </div>
                            @error('bachelor_degree') <span class="text-danger">{{ $message }}</span> @enderror
                            @error('portfolio_required') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Company Info -->
                    <div class="form-section">
                        <h2 class="section-title">Company Information</h2>

                        <div class="form-group">
                            <label for="aboutCompany">About Your Company *</label>
                            <textarea id="aboutCompany" name="about_company"
                                placeholder="Write a brief introduction about your company..."
                                required>{{ old('about_company') }}</textarea>
                            @error('about_company') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="companyWebsite">Company Website</label>
                            <input type="url" id="companyWebsite" name="company_website"
                                placeholder="https://yourcompany.com" value="{{ old('company_website') }}">
                            @error('company_website') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="companyLogo">Company Logo</label>
                            <input type="file" id="companyLogo" name="company_logo" accept="image/*">
                            @error('company_logo') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="post-job-btn"
                            style="color:blue; background-color: white; border:2px solid blue;"
                            onclick="previewJob()">Preview</button>
                        <button type="submit" class="post-job-btn">Post Job</button>
                    </div>
                </form>

            </div>

            <div class="preview-container">
                <div class="preview-card">
                    <h3 class="preview-title">Job Preview</h3>

                    <div class="preview-header">
                        <div class="preview-company"></div>
                        <div class="preview-job-title"></div>
                    </div>

                    <div class="preview-meta">
                        <div class="preview-meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span></span>
                        </div>
                        <div class="preview-meta-item">
                            <i class="fas fa-briefcase"></i>
                            <span></span>
                        </div>
                        <div class="preview-meta-item">
                            <i class="fas fa-money-bill-wave"></i>
                            <span></span>
                        </div>
                    </div>

                    <div class="preview-section">
                        <h4 class="preview-section-title">Job Description</h4>
                        <p class="preview-content"></p>
                    </div>

                    <div class="preview-section">
                        <h4 class="preview-section-title">Responsibilities</h4>
                        <ul class="preview-content">

                        </ul>
                    </div>

                    <div class="preview-section">
                        <h4 class="preview-section-title">Requirements</h4>
                        <ul class="preview-content">

                        </ul>
                    </div>

                    <div class="preview-section">
                        <h4 class="preview-section-title">Required Skills</h4>
                        <div class="preview-skills">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('user.layout.footer')

    <script>
        function previewJob() {
            // Company and Job Title
            // document.querySelector('.preview-company').innerText = document.getElementById('companyName').value;
            document.querySelector('.preview-job-title').innerText = document.getElementById('jobTitle').value;

            // Meta
            document.querySelectorAll('.preview-meta-item span')[0].innerText = document.getElementById('location').value;
            document.querySelectorAll('.preview-meta-item span')[1].innerText = document.getElementById('jobType').value;
            document.querySelectorAll('.preview-meta-item span')[2].innerText = document.getElementById('salaryRange').value;

            // Description
            document.querySelectorAll('.preview-section .preview-content')[0].innerText = document.getElementById('jobDescription').value;

            // Responsibilities
            const responsibilities = document.getElementById('responsibilities').value.split('\n');
            const resList = document.querySelectorAll('.preview-section .preview-content')[1];
            resList.innerHTML = '';
            responsibilities.forEach(line => {
                if (line.trim() !== '') {
                    const li = document.createElement('li');
                    li.innerText = line;
                    resList.appendChild(li);
                }
            });

            // Requirements
            const requirements = document.getElementById('requirements').value.split('\n');
            const reqList = document.querySelectorAll('.preview-section .preview-content')[2];
            reqList.innerHTML = '';
            requirements.forEach(line => {
                if (line.trim() !== '') {
                    const li = document.createElement('li');
                    li.innerText = line;
                    reqList.appendChild(li);
                }
            });

            // Required Skills
            const skillsInput = document.querySelector('input[name="required_skills[]"]');
            const skills = skillsInput.value.split(',');
            const skillContainer = document.querySelector('.preview-skills');
            skillContainer.innerHTML = '';
            skills.forEach(skill => {
                if (skill.trim() !== '') {
                    const div = document.createElement('div');
                    div.classList.add('preview-skill');
                    div.innerText = skill.trim();
                    skillContainer.appendChild(div);
                }
            });

            // Show preview section if hidden
            document.querySelector('.preview-container').style.display = 'block';
            window.scrollTo({ top: document.querySelector('.preview-container').offsetTop - 100, behavior: 'smooth' });
        }
    </script>

</body>

</html>