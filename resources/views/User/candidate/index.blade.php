<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Browse Candidates</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
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
            --success: #28a745;
            --warning: #ffc107;
        }

        body {
            background-color: #f8f9fa;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        /* Header Styles */
       

        /* Candidates Page Styles */
        .candidates-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .page-title {
            font-size: 28px;
            color: var(--primary-blue);
        }

        .result-count {
            color: var(--medium-gray);
            font-size: 14px;
        }

        .search-section {
            background-color: var(--white);
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .search-bar {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .search-input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        .search-btn {
            padding: 10px 20px;
            background-color: var(--primary-blue);
            color: white;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .search-btn:hover {
            background-color: var(--dark-blue);
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .filter-group {
            flex: 1;
            min-width: 150px;
        }

        .filter-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            font-size: 14px;
        }

        .filter-select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            background-color: var(--white);
            font-size: 14px;
        }

        .candidates-grid1 {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .candidate-card1 {
            background-color: var(--white);
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #eee;
        }

        .candidate-card1:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .card-header1 {
            background-color: var(--primary-blue);
            color: white;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .candidate-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
        }

        .candidate-info1 {
            flex: 1;
        }

        .candidate-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 3px;
        }

        .candidate-title {
            font-size: 14px;
            opacity: 0.9;
        }

        .availability {
            background-color: var(--success);
            color: white;
            padding: 3px 8px;
            font-size: 12px;
            font-weight: 500;
        }

        .card-body1 {
            padding: 15px;
        }

        .info-item1 {
            display: flex;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .info-icon {
            width: 20px;
            margin-right: 10px;
            color: var(--primary-blue);
        }

        .skills-section1 {
            margin: 15px 0;
        }

        .section-title1 {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark-gray);
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .skills-container1 {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .skill-tag {
            background-color: var(--light-blue);
            color: var(--primary-blue);
            padding: 4px 10px;
            font-size: 12px;
            font-weight: 500;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            padding: 12px 15px;
            border-top: 1px solid #eee;
        }

        .action-btn {
            padding: 6px 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
        }

        .view-profile {
            background-color: var(--primary-blue);
            color: white;
            border: none;
        }

        .view-profile:hover {
            background-color: var(--dark-blue);
        }

        .message-btn {
            background-color: transparent;
            color: var(--primary-blue);
            border: 1px solid var(--primary-blue);
        }

        .message-btn:hover {
            background-color: var(--light-blue);
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .pagination-btn {
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 3px;
            background-color: var(--white);
            border: 1px solid #ddd;
            color: var(--dark-gray);
            cursor: pointer;
            transition: all 0.3s;
        }

        .pagination-btn:hover, .pagination-btn.active {
            background-color: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }

        /* Footer */

        /* Responsive Adjustments */
        @media (max-width: 900px) {
            .filters {
                flex-direction: column;
            }
            
            .candidates-grid1 {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 768px) {
            nav {
                display: none;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .search-bar {
                flex-direction: column;
            }
            
            .card-header1 {
                flex-direction: column;
                text-align: center;
            }
            
            .candidate-info1 {
                text-align: center;
            }
            
            .card-footer {
                flex-direction: column;
                gap: 8px;
            }
            
            .action-btn {
                width: 100%;
                text-align: center;
            }
            
            .footer-container {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
@include('user.layout.navbar')

    <!-- Candidates Page Content -->
    <main class="candidates-container">
        <div class="page-header">
            <h1 class="page-title">Browse Candidates</h1>
            <div class="result-count">Showing 6 of 48 candidates</div>
        </div>
        
        <div class="search-section">
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Search by skill, role, or name...">
                <button class="search-btn">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
            
            <div class="filters">
                <div class="filter-group">
                    <label for="location">Location</label>
                    <select id="location" class="filter-select">
                        <option value="">All Locations</option>
                        <option value="new-york">New York</option>
                        <option value="san-francisco">San Francisco</option>
                        <option value="remote">Remote</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="experience">Experience</label>
                    <select id="experience" class="filter-select">
                        <option value="">All Levels</option>
                        <option value="junior">Junior (0-2 yrs)</option>
                        <option value="mid">Mid-Level (3-5 yrs)</option>
                        <option value="senior">Senior (5+ yrs)</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="role">Job Role</label>
                    <select id="role" class="filter-select">
                        <option value="">All Roles</option>
                        <option value="frontend">Frontend</option>
                        <option value="backend">Backend</option>
                        <option value="fullstack">Full Stack</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="availability">Status</label>
                    <select id="availability" class="filter-select">
                        <option value="">All Status</option>
                        <option value="available">Available</option>
                        <option value="employed">Employed</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="candidates-grid1">
            <!-- Candidate 1 -->
             @foreach ($users as $u)    
             <div class="candidate-card1">
                 <div class="card-header1">
                     <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=100&h=100&q=80" alt="Sarah Johnson" class="candidate-img">
                     <div class="candidate-info1">
                         <h2 class="candidate-name">{{ $u->name }}</h2>
                         <p class="candidate-title"></p>
                        </div>
                    </div>
                    <div class="card-body1">
                    <div class="info-item1">
                        <i class="fas fa-map-marker-alt info-icon"></i>
                        <span>{{ $u->location }}</span>
                    </div>
                    <div class="info-item1">
                        <i class="fas fa-briefcase info-icon"></i>
                        <span>5 years experience</span>
                    </div>
                    
                    <div class="skills-section1">
                        <div class="section-title1">
                            <i class="fas fa-code"></i>
                            <span>Skills</span>
                        </div>
                        <div class="skills-container1">
                            <span class="skill-tag">Figma</span>
                            <span class="skill-tag">UI Design</span>
                            <span class="skill-tag">User Research</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                   <a href="{{ route('viewProfile',['id'=>$u->id]) }}"> <button class="action-btn view-profile">View Profile</button></a>
                    <button class="action-btn message-btn">Message</button>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="pagination">
            <button class="pagination-btn"><i class="fas fa-chevron-left"></i></button>
            <button class="pagination-btn active">1</button>
            <button class="pagination-btn">2</button>
            <button class="pagination-btn">3</button>
            <button class="pagination-btn"><i class="fas fa-chevron-right"></i></button>
        </div>
    </main>

    <!-- Footer -->
@include('user.layout.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Pagination buttons
            const paginationBtns = document.querySelectorAll('.pagination-btn');
            
            paginationBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    if(this.classList.contains('active')) return;
                    
                    // Remove active class from all buttons
                    paginationBtns.forEach(b => b.classList.remove('active'));
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>