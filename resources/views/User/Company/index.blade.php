<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Top Companies Hiring</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seeker/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Header -->
    @include('user.layout.navbar')

    <!-- Companies Page Content -->
    <main class="companies-container">
        <h1 class="page-title">Top Companies Hiring</h1>

        <div class="search-filters">
            <div class="search-box">
                <input type="text" placeholder="Search companies...">
            </div>
            <div class="filter-group">
                <select>
                    <option value="">Industry</option>
                    <option value="tech">Technology</option>
                    <option value="finance">Finance</option>
                    <option value="healthcare">Healthcare</option>
                    <option value="retail">Retail</option>
                    <option value="manufacturing">Manufacturing</option>
                </select>
            </div>
            <div class="filter-group">
                <select>
                    <option value="">Location</option>
                    <option value="usa">United States</option>
                    <option value="uk">United Kingdom</option>
                    <option value="canada">Canada</option>
                    <option value="germany">Germany</option>
                    <option value="india">India</option>
                </select>
            </div>
            <div class="filter-btn">
                <button>Search</button>
            </div>
        </div>

        <div class="companies-grid">
            <!-- Company Card 1 -->
            @foreach ($companyDetails as $c)

                <div class="company-card">
                    <div class="company-logo">TC</div>
                    <h2 class="company-name">{{ $c->name }}.</h2>
                    <div class="company-industry">{{ $c->industry }}</div>
                    <div class="company-meta">
                        <div class="meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $c->location }}
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-briefcase"></i>
                            {{ $c->employee_size }}
                            + Jobs
                        </div>
                    </div>
                    <div class="company-jobs">
                        <a href="{{ route('companypos', ['id' => $c->company_id]) }}" class="view-jobs">
                            View Open Positions <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach

            <!-- Company Card 2 -->
            <div class="company-card">
                <div class="company-logo">FD</div>
                <h2 class="company-name">FutureDesigns</h2>
                <div class="company-industry">Design · Creative</div>
                <div class="company-meta">
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        New York, NY
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-briefcase"></i>
                        120+ Jobs
                    </div>
                </div>
                <div class="company-jobs">
                    <a href="#" class="view-jobs">
                        View Open Positions <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Company Card 3 -->
            <div class="company-card">
                <div class="company-logo">DM</div>
                <h2 class="company-name">DigitalMinds</h2>
                <div class="company-industry">Marketing · Digital</div>
                <div class="company-meta">
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        Chicago, IL
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-briefcase"></i>
                        85+ Jobs
                    </div>
                </div>
                <div class="company-jobs">
                    <a href="#" class="view-jobs">
                        View Open Positions <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Company Card 4 -->
            <div class="company-card">
                <div class="company-logo">GF</div>
                <h2 class="company-name">GreenFuture</h2>
                <div class="company-industry">Sustainability · Energy</div>
                <div class="company-meta">
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        Berlin, Germany
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-briefcase"></i>
                        60+ Jobs
                    </div>
                </div>
                <div class="company-jobs">
                    <a href="#" class="view-jobs">
                        View Open Positions <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Company Card 5 -->
            <!-- <div class="company-card">
                <div class="company-logo">FS</div>
                <h2 class="company-name">FinSecure</h2>
                <div class="company-industry">Finance · Banking</div>
                <div class="company-meta">
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        London, UK
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-briefcase"></i>
                        200+ Jobs
                    </div>
                </div>
                <div class="company-jobs">
                    <a href="#" class="view-jobs">
                        View Open Positions <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div> -->

            <!-- Company Card 6 -->
            <!-- <div class="company-card">
                <div class="company-logo">HC</div>
                <h2 class="company-name">HealthCare Plus</h2>
                <div class="company-industry">Healthcare · Medical</div>
                <div class="company-meta">
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        Boston, MA
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-briefcase"></i>
                        150+ Jobs
                    </div>
                </div>
                <div class="company-jobs">
                    <a href="#" class="view-jobs">
                        View Open Positions <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div> -->
        </div>

        <div class="pagination">
            <ul>
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i></a></li>
            </ul>
        </div>
    </main>

    @include('user.layout.footer')

</body>

</html>