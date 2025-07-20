<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Find Jobs</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seeker/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --main-color: #3490dc;
            --text-color: #333;
            --font-size-base: 16px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('user.layout.navbar')

    <!-- Main Content -->
    <main class="find-jobs-container">
        <h1 class="page-title">Find Your Next Opportunity</h1>

        <form action="{{ route('job.search') }}" method="post">
            @csrf
            <div class="search-filters">
                <!-- Search Field -->
                <div class="search-box">
                    <input type="text" placeholder="Job title, keywords, or company" name="search"
                        value="{{ old('search', $search ?? '') }}">
                </div>

                <!-- Location Dropdown -->
                <div class="filter-group">
                    <select name="location">
                        <option value="">Location</option>
                        <option value="Udaipur" {{ old('location', request('location')) == 'Udaipur' ? 'selected' : '' }}>
                            Udaipur</option>
                        <option value="san-francisco" {{ old('location', request('location')) == 'san-francisco' ? 'selected' : '' }}>San Francisco</option>
                        <option value="chicago" {{ old('location', request('location')) == 'chicago' ? 'selected' : '' }}>
                            Chicago</option>
                        <option value="london" {{ old('location', request('location')) == 'london' ? 'selected' : '' }}>
                            London</option>
                        <option value="berlin" {{ old('location', request('location')) == 'berlin' ? 'selected' : '' }}>
                            Berlin</option>
                    </select>
                    @error('location')
                        <div class="variable text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Job Type Dropdown -->
                <div class="filter-group">
                    <select name="job_type">
                        <option value="">Job Type</option>
                        <option value="full-time" {{ old('job_type', request('job_type')) == 'full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="part-time" {{ old('job_type', request('job_type')) == 'part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="contract" {{ old('job_type', request('job_type')) == 'contract' ? 'selected' : '' }}>Contract</option>
                        <option value="remote" {{ old('job_type', request('job_type')) == 'remote' ? 'selected' : '' }}>
                            Remote</option>
                    </select>
                    @error('job_type')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Experience Level Dropdown -->
                <div class="filter-group">
                    <select name="experience_level">
                        <option value="">Experience Level</option>
                        <option value="entry" {{ old('experience_level', request('experience_level')) == 'entry' ? 'selected' : '' }}>Entry Level</option>
                        <option value="mid" {{ old('experience_level', request('experience_level')) == 'mid' ? 'selected' : '' }}>Mid Level</option>
                        <option value="senior" {{ old('experience_level', request('experience_level')) == 'senior' ? 'selected' : '' }}>Senior Level</option>

                    </select>
                    @error('experience_level')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="filter-btn">
                    <button type="submit">Search Jobs</button>
                </div>
            </div>
        </form>


        <div class="results-header">
            <div class="results-count">Showing {{ $allJobCount }} Jobs</div>
            <div class="sort-by">
                <form action="{{ route('user.find_job') }}" method="get">
                    <label for="sort">Sort by:</label>
                    <!-- <select id="sort" name="filter" value="{{ old('filter') }}">
                    <option value="newest" value="Newest First">Newest First</option>
                    <option value="relevance" value="Relevance">Relevance</option>
                    <option value="salary"  value="Salary: High to Low" >Salary: High to Low</option>
                </select> -->
                    <select id="sort" name="filter">
                        <option value="newest" {{ request('filter') == 'newest' ? 'selected' : '' }}>Newest First
                        </option>
                        <option value="relevance" {{ request('filter') == 'relevance' ? 'selected' : '' }}>Relevance
                        </option>
                        <option value="salary" {{ request('filter') == 'salary' ? 'selected' : '' }}>Salary: High to Low
                        </option>
                    </select>

                    <button type="submit" class="btn" style=" background-color:var(--primary-blue); color:white;font-size: 16px;
                    font-weight: 600;">Apply filter</button>
                </form>
            </div>
        </div>

        <div class="job-listings">
            <!-- Job Listing 1 -->
            {{-- @dd($lastestJobData) --}}
            @if ($lastestJobData->count() === 0)
                <div class="job-card" style="display: flex; justify-content: center; align-items: center;">
                    <h2>Sorry no job Found! 😢</h2>
                </div>
            @else

                @foreach ($lastestJobData as $l)
                    @php
                        $companyName = $l['company_name'] ?? '';
                        $initials = collect(explode(' ', $companyName))
                            ->filter()
                            ->map(function ($word) {
                                return strtoupper($word[0]);
                            })
                            ->join('');
                    @endphp

                    <div class="job-card">
                        <div class="company-logo">{{ $initials }}</div>
                        <div class="job-details">
                            <h2 class="job-title">{{  $l->job_title}}</h2>
                            <div class="company-name">{{ $l->company_name }}.</div>

                            <div class="job-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $l->location }}
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-money-bill-wave"></i>
                                    ${{ $l->salary_range }}
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-briefcase"></i>
                                    {{ $l->job_type }}
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-clock"></i>
                                    {{ $l->created_at->diffForHumans() }}
                                </div>
                            </div>

                            <p class="job-description">
                                {{ $l->job_description }}
                                <!-- We're looking for an experienced Frontend Developer to join our growing team. You'll be responsible for building user interfaces using React, TypeScript, and modern CSS. -->
                            </p>
                            <div class="job-tags">
                                @foreach(is_array($l->required_skills) ? $l->required_skills : json_decode($l->required_skills, true) ?? [] as $skill)
                                    <span class="tag">{{ $skill }}</span>
                                @endforeach
                            </div>

                            <div class="job-actions">
                                <div class="job-type">{{ $l->job_type }}</div>
                                <a href="{{ route('user.applyjob', ['id' => $l]) }}" class="apply-btn">Apply Now</a>

                            </div>

                        </div>
                        @role('jobseeker')
                        <button class="save-job">
                            <i class="far fa-bookmark"></i> Save
                        </button>
                        @endrole
                    </div>
                @endforeach
            @endif






        </div>
        </div>

        @if ($lastestJobData->count() !== 0)
            @php
                $query = request()->query();
                unset($query['page']);

                $currentPage = $lastestJobData->currentPage();
                $lastPage = $lastestJobData->lastPage();

                $start = max(1, $currentPage - 2);
                $end = min($lastPage, $currentPage + 2);
            @endphp

            @if(is_object($lastestJobData) && method_exists($lastestJobData, 'onFirstPage'))
                <div class="pagination">
                    <ul>
                        {{-- Previous Page Link --}}
                        @if (!$lastestJobData->onFirstPage())
                            <li>
                                <a href="{{ $lastestJobData->previousPageUrl() . '&' . http_build_query($query) }}">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                        @endif

                        {{-- Page Number Links --}}
                        @for ($i = $start; $i <= $end; $i++)
                            <li>
                                <a href="{{ $lastestJobData->url($i) . '&' . http_build_query($query) }}"
                                    class="{{ $lastestJobData->currentPage() == $i ? 'active' : '' }}">
                                    {{ $i }}
                                </a>
                            </li>
                        @endfor

                        {{-- Next Page Link --}}
                        @if ($lastestJobData->hasMorePages())
                            <li>
                                <a href="{{ $lastestJobData->nextPageUrl() . '&' . http_build_query($query) }}">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            @endif
        @endif


    </main>

    <!-- Footer -->
    @include('user.layout.footer')
</body>

</html>