<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Top Companies Hiring</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seeker/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .company-logo img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border: 2px solid #e6f0ff;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('user.layout.navbar')

    <!-- Companies Page Content -->
    <main class="companies-container">
        <h1 class="page-title">Top Companies Hiring</h1>

        <form action="{{ route('company') }}" method="get">

            <div class="search-filters">
                <div class="search-box">
                    <input type="text" name="search" placeholder="Search companies..." value="{{ request('search') }}">
                </div>
                <div class="filter-group">
                    <select name="industry">
                        <option value="">Industry</option>
                        <option value="tech" {{ request('industry') == 'tech' ? 'selected' : '' }}>Technology</option>
                        <option value="finance" {{ request('industry') == 'finance' ? 'selected' : '' }}>Finance</option>
                        <option value="healthcare" {{ request('industry') == 'healthcare' ? 'selected' : '' }}>Healthcare
                        </option>
                        <option value="retail" {{ request('industry') == 'retail' ? 'selected' : '' }}>Retail</option>
                        <option value="manufacturing" {{ request('industry') == 'manufacturing' ? 'selected' : '' }}>
                            Manufacturing</option>
                    </select>
                </div>
                <div class="filter-group">
                    <select name="location">
                        <option value="">Location</option>
                        <option value="usa" {{ request('location') == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="uk" {{ request('location') == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="canada" {{ request('location') == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="germany" {{ request('location') == 'germany' ? 'selected' : '' }}>Germany</option>
                        <option value="india" {{ request('location') == 'india' ? 'selected' : '' }}>India</option>
                    </select>
                </div>
                <div class="filter-btn">
                    <button type="submit">Search</button>
                </div>
            </div>
        </form>

        <div class="companies-grid">
            <!-- Company Card 1 -->
            @forelse ($companyDetails as $c)
                <div class="company-card">
                    <div class="company-logo">
                        <img src="{{ $c->avatar && !Str::startsWith($c->avatar, ['http://', 'https://']) ? asset($c->avatar) : ($c->avatar ?: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&h=200&q=80') }}"
                            alt="{{ $c->name }}" class="candidate-img">
                    </div>

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
            @empty
                <div class="no-results"
                    style="display:grid; place-items:center; min-height:100px; color:#888; grid-column:1/-1;">
                    <i class="fas fa-building fa-2x"></i>
                    <p style="font-size:1.2rem;">No companies found matching your criteria.</p>
                </div>
            @endforelse

            <!-- Company Card 2 -->
            {{-- <div class="company-card">
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
            </div> --}}

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
                @if ($companyDetails->lastPage() > 1)
                    @for ($i = 1; $i <= $companyDetails->lastPage(); $i++)
                        <li>
                            <a href="{{ $companyDetails->url($i) }}"
                                class="{{ $companyDetails->currentPage() == $i ? 'active' : '' }}">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor
                    <li>
                        <a href="{{ $companyDetails->nextPageUrl() ?? '#' }}">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </main>

    @include('user.layout.footer')

</body>

</html>