<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Candidate1 Profile</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seeker/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-blue: #0a66c2;
            --dark-blue: #084482;
            --light-blue: #e6f0ff;
            --white: #ffffff;
            --dark-gray: #333333;
            --medium-gray: #666666;
            --light-gray: #f5f5f5;
        }

        body {
            background-color: #f8f9fa;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        /* Header Styles */
        header {
            background-color: var(--white);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        /* Candidate1 Profile Styles */
        .profile-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 30px;
        }

        .sidebar {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 30px;
            position: sticky;
            top: 100px;
            height: fit-content;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin: 0 auto 20px;
            border: 3px solid var(--light-blue);
        }

        .candidate1-name {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--dark-gray);
        }

        .candidate1-title {
            font-size: 18px;
            color: var(--primary-blue);
            margin-bottom: 20px;
        }

        .availability {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 5px 15px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 25px;
        }

        .contact-info {
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            font-size: 15px;
        }

        .info-icon {
            width: 25px;
            color: var(--primary-blue);
            margin-right: 10px;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 30px;
        }

        .action-btn {
            padding: 12px 20px;
            text-align: center;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }

        .primary-btn {
            background-color: var(--primary-blue);
            color: white;
        }

        .primary-btn:hover {
            background-color: var(--dark-blue);
        }

        .secondary-btn {
            background-color: transparent;
            color: var(--primary-blue);
            border: 1px solid var(--primary-blue);
        }

        .secondary-btn:hover {
            background-color: var(--light-blue);
        }

        .main-content {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 40px;
        }

        .section1 {
            margin-bottom: 40px;
        }

        .section-title1 {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-blue);
            display: flex;
            align-items: center;
        }

        .section-title1 i {
            margin-right: 10px;
        }

        .about-content {
            line-height: 1.8;
            color: var(--medium-gray);
        }

        .experience-item1,
        .education-item1 {
            margin-bottom: 25px;
            padding-bottom: 25px;
            border-bottom: 1px solid #eee;
        }

        .experience-item1:last-child,
        .education-item1:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .experience-title1,
        .education-title1 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark-gray);
        }
        .social-links1 {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links1 a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: var(--light-blue);
            color: var(--primary-blue);
            transition: all 0.3s;
        }

        .social-links1 a:hover {
            background-color: var(--primary-blue);
            color: white;
        }

        .company,
        .institution1 {
            font-size: 18px;
            color: var(--primary-blue);
            margin-bottom: 8px;
        }

        .date1 {
            font-size: 14px;
            color: var(--medium-gray);
            margin-bottom: 15px;
        }

        .experience-description1,
        .education-description1 {
            line-height: 1.7;
            color: var(--medium-gray);
        }

        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .skill-tag {
            background-color: var(--light-blue);
            color: var(--primary-blue);
            padding: 8px 16px;
            font-weight: 500;
        }

        /* Footer */

        /* Responsive Design */
        @media (max-width: 900px) {
            .profile-container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
            }
        }

        @media (max-width: 768px) {
            nav {
                display: none;
            }

            .action-buttons {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .action-btn {
                flex: 1;
                min-width: 120px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->

    @include('user.layout.navbar')
    <!-- Candidate1 Profile Content -->
    <main class="profile-container">
        <!-- Left Sidebar -->
        <div class="sidebar">
            <div class="profile-header">
                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=400&h=400&q=80"
                    alt="Sarah Johnson" class="profile-img">
                <h1 class="candidate1-name">{{ $user->name }} {{ $user->lastname }}</h1>
                <p class="candidate1-title">{{ $user->bio }}</p>
                <!-- <div class="availability">Available for Work</div> -->
            </div>

            <div class="contact-info">
                <div class="info-item">
                    <i class="fas fa-map-marker-alt info-icon"></i>
                    <div>
                        <strong>Location</strong><br>
                        {{ $user->location }}
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-envelope info-icon"></i>
                    <div>
                        <strong>Email</strong><br>
                        {{ $user->email }}
                    </div>
                </div>


                <div class="info-item">
                    <i class="fas fa-industry info-icon"></i>
                    <div>
                        <strong>Industry</strong><br>
                        {{ $user->industry }}
                    </div>
                </div>

                <!-- <div class="info-item">
                    <i class="fas fa-briefcase info-icon"></i>
                    <div>
                        <strong>Experience</strong><br>
                        8 years
                    </div>
                </div> -->

                <!-- <div class="info-item">
                    <i class="fas fa-graduation-cap info-icon"></i>
                    <div>
                        <strong>Education</strong><br>
                        M.S. Interaction Design
                    </div>
                </div> -->
            </div>
{{-- 
            <div class="social-links1">
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-dribbble"></i></a>
                <a href="#"><i class="fab fa-behance"></i></a>
            </div> --}}

            <div class="action-buttons">
                <button class="action-btn primary-btn">
                    <i class="fas fa-paper-plane"></i> Contact Candidate
                </button>
                <button class="action-btn secondary-btn">
                    <i class="fas fa-download"></i> Download Resume
                </button>
                <!-- <button class="action-btn secondary-btn">
                    <i class="fas fa-bookmark"></i> Save Profile
                </button> -->
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- About Section -->
            <div class="section1">
                <h2 class="section-title1">
                    <i class="fas fa-user"></i> About
                </h2>
                <div class="about-content">
                    <p>
                        {{$user->about}}
                    </p>
                    <!-- <p>Senior UX Designer with 8+ years of experience creating intuitive and engaging user experiences
                        for web and mobile applications. Passionate about understanding user needs and translating them
                        into innovative design solutions.</p> -->

                    <!-- <p>I specialize in user research, wireframing, prototyping, and usability testing. My approach
                        combines creativity with data-driven insights to deliver products that not only look beautiful
                        but also solve real user problems.</p>

                    <p>Currently seeking opportunities to lead design initiatives for innovative tech companies that
                        value user-centered design and collaboration.</p> -->
                </div>
            </div>

            <!-- Experience Section -->
            <div class="section1">
                <h2 class="section-title1">
                    <i class="fas fa-briefcase"></i> Work Experience
                </h2>
                @foreach ($userExperience as $ue)

                    <div class="experience-item1">
                        <h3 class="experience-title1">{{ $ue->job_title }}</h3>
                        <div class="company">{{ $ue->company_name }}</div>
                        <div class="date1">{{ $ue->years }} / {{ $ue->location }}</div>
                        <div class="experience-description1">
                            <p>{{ $ue->description }}</p>
                            <!-- <p>Key achievements:</p>
                        <ul>
                            <li>Redesigned core product interface, increasing user engagement by 42%</li>
                            <li>Implemented design system used across company products</li>
                            <li>Mentored junior designers and established design best practices</li>
                        </ul> -->
                        </div>
                    </div>
                @endforeach

                <!-- <div class="experience-item1">
                    <h3 class="experience-title1">Senior UX Designer</h3>
                    <div class="company">Digital Solutions Co.</div>
                    <div class="date1">March 2017 - December 2019</div>
                    <div class="experience-description1">
                        <p>Designed end-to-end user experiences for financial applications serving over 1 million users.
                            Conducted user research and usability testing to inform design decisions.</p>
                        <p>Key achievements:</p>
                        <ul>
                            <li>Reduced task completion time by 35% through interface improvements</li>
                            <li>Created responsive design system for web and mobile applications</li>
                            <li>Received company innovation award for mobile banking redesign</li>
                        </ul>
                    </div>
                </div> -->

                <!-- <div class="experience-item1">
                    <h3 class="experience-title1">UX Designer</h3>
                    <div class="company">Creative Web Agency</div>
                    <div class="date1">June 2015 - February 2017</div>
                    <div class="experience-description1">
                        <p>Designed websites and applications for clients across various industries. Collaborated with
                            developers to ensure design integrity in final products.</p>
                        <p>Key achievements:</p>
                        <ul>
                            <li>Designed e-commerce platform that increased conversion rate by 28%</li>
                            <li>Created wireframes, prototypes, and final UI designs for 15+ projects</li>
                            <li>Developed client presentation skills and stakeholder management</li>
                        </ul>
                    </div>
                </div> -->
            </div>

            <!-- Education Section -->
            <div class="section1">
                <h2 class="section-title1">
                    <i class="fas fa-graduation-cap"></i> Education
                </h2>
                @foreach ($userEducation as $uedu)
                <div class="education-item1">
                    <h3 class="education-title1">{{ $uedu->degree_title }}</h3>
                    <div class="institution1">{{ $uedu->institute_name }}</div>
                    <div class="date1">{{ $uedu->years }} / {{ $uedu->location }}</div>
                    <div class="education-description1">
                   {{ $uedu->description }}
                    </div>
                </div>
                @endforeach

                <!-- 
                <div class="education-item1">
                    <h3 class="education-title1">Bachelor of Fine Arts in Graphic Design</h3>
                    <div class="institution1">California College of the Arts</div>
                    <div class="date1">2009 - 2013</div>
                    <div class="education-description1">
                        Developed foundation in visual design principles, typography, and digital media. Minored in
                        Psychology to better understand human behavior.
                    </div>
                </div> -->
            </div>

            <!-- Skills Section -->
            <div class="section1">
                <h2 class="section-title1">
                    <i class="fas fa-code"></i> Skills & Expertise
                </h2>

                
                <div class="skills-container">
                          @if (!empty($skills?->skill))
                    <div class="skills-container" style="display: flex; flex-wrap: wrap; gap: 10px;">
                        @foreach(explode(',', $skills->skill) as $skill)
                        <div class="skill-tag">{{ trim($skill) }}</div>
                        @endforeach
                    </div>
                    @endif
                    
                    {{-- <div class="skill-tag">User Research</div>
                    <div class="skill-tag">Wireframing</div>
                    <div class="skill-tag">Prototyping</div>
                    <div class="skill-tag">Usability Testing</div> --}}
                    {{-- <div class="skill-tag">UI Design</div>
                    <div class="skill-tag">Figma</div>
                    <div class="skill-tag">Adobe XD</div>
                    <div class="skill-tag">Sketch</div>
                    <div class="skill-tag">Information Architecture</div>
                    <div class="skill-tag">Interaction Design</div>
                    <div class="skill-tag">Design Systems</div>
                    <div class="skill-tag">HTML/CSS</div> --}}
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('user.layout.footer')
    <script>
        // JavaScript for the candidate1 profile page
        document.addEventListener('DOMContentLoaded', function () {
            // Contact button functionality
            const contactBtn = document.querySelector('.primary-btn');
            contactBtn.addEventListener('click', function () {
                const candidate1Name = document.querySelector('.candidate1-name').textContent;
                alert(`Opening contact form for ${candidate1Name}`);
            });

            // Download resume button
            const downloadBtn = document.querySelectorAll('.action-btn')[1];
            downloadBtn.addEventListener('click', function () {
                alert('Downloading resume...');
            });

            // Save profile button
            const saveBtn = document.querySelectorAll('.action-btn')[2];
            let isSaved = false;
            saveBtn.addEventListener('click', function () {
                isSaved = !isSaved;
                if (isSaved) {
                    this.innerHTML = '<i class="fas fa-bookmark"></i> Profile Saved';
                    this.style.backgroundColor = '#e6f7ff';
                } else {
                    this.innerHTML = '<i class="fas fa-bookmark"></i> Save Profile';
                    this.style.backgroundColor = '';
                }
            });
        });
    </script>
</body>

</html>