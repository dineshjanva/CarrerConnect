<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\JobPost;
use App\Models\Company;



class WebsiteController extends Controller
{
    // Home
    public function index()
    {

        $otherJobs = collect();

        if (Auth::check()) {
            $user = Auth::user();
            // dd($user->all());
            if ($user->industry !== null) {
                $lastestJobData = JobPost::whereHas('company', function ($query) use ($user) {
                    $query->where('industry', $user->industry); // or 'industry_id' if ID
                })->with('company')->take(3)->get();

                // return $lastestJobData;
                if (count($lastestJobData) != 3) {
                    $otherJobs = JobPost::whereDoesntHave('company', function ($query) use ($user) {
                        $query->where('industry', $user->industry);
                    })->with('company')->take(3 - count($lastestJobData))->get();
                }
            } else {
                $lastestJobData = JobPost::orderBy('created_at', 'desc')->take(3)->get();
            }
        } else {
            $lastestJobData = JobPost::orderBy('created_at', 'desc')->take(3)->get();
            // return $lastestJobData;
        }
        $lastestJobData = $lastestJobData->merge($otherJobs);

        return view('user.index', compact('lastestJobData'));
    }

    // Find Jobs
    public function findJob(Request $request)
    {
        $allJobCount = JobPost::count();

        // Get filters
        $search = $request->input('search');
        $location = $request->input('location');
        $experience_level = $request->input('experience_level');
        $job_type = $request->input('job_type');
        $filter = $request->input('filter');

        // 👥 Authenticated user
        $user = Auth::user();

        // 👉 Apply base query
        $query = JobPost::with('company');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('job_title', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if (!empty($location)) {
            $query->where('location', $location);
        }

        if (!empty($job_type)) {
            $query->where('job_type', $job_type);
        }

        if (!empty($experience_level)) {
            $query->where('experience_level', $experience_level);
        }

        // 🧠 Apply sorting
        switch ($filter) {
            case 'newest':
                $query->orderByDesc('created_at');
                break;
            case 'salary':
                $query->orderByRaw("CAST(SUBSTRING_INDEX(salary_range, '-', -1) AS UNSIGNED) DESC");
                break;
            case 'relevance':
                $query->orderBy('job_title');
                break;
        }

        // 🧑‍💼 For logged-in users without search → show industry-matched jobs
        if (Auth::check() && empty($search)) {
            if (!empty($user->industry)) {
                // Match user's industry
                $matchedJobs = JobPost::whereHas('company', function ($q) use ($user) {
                    $q->where('industry', $user->industry);
                })->with('company');

                $otherJobs = JobPost::whereDoesntHave('company', function ($q) use ($user) {
                    $q->where('industry', $user->industry);
                })->with('company');

                // Apply same filter logic to both
                switch ($filter) {
                    case 'newest':
                        $matchedJobs->orderByDesc('created_at');
                        $otherJobs->orderByDesc('created_at');
                        break;
                    case 'salary':
                        $matchedJobs->orderByRaw("CAST(SUBSTRING_INDEX(salary_range, '-', -1) AS UNSIGNED) DESC");
                        $otherJobs->orderByRaw("CAST(SUBSTRING_INDEX(salary_range, '-', -1) AS UNSIGNED) DESC");
                        break;
                    case 'relevance':
                        $matchedJobs->orderBy('job_title');
                        $otherJobs->orderBy('job_title');
                        break;
                }

                // Fetch & merge
                $matchedJobs = $matchedJobs->get();
                $otherJobs = $otherJobs->get();
                $merged = collect($matchedJobs)->merge($otherJobs);

                // Paginate manually
                $page = $request->get('page', 1);
                $perPage = 10;
                $lastestJobData = new LengthAwarePaginator(
                    $merged->forPage($page, $perPage),
                    $merged->count(),
                    $perPage,
                    $page,
                    ['path' => $request->url(), 'query' => $request->query()]
                );
            } else {
                // No industry — fallback to default filtered query
                $lastestJobData = $query->paginate(10);
            }
        } else {
            // Unauthenticated user OR search present
            $lastestJobData = $query->paginate(10);
        }

        return view('user.find_job', compact('lastestJobData', 'allJobCount', 'search'));
    }


    public function resourse()
    {
        return view('user.resourse');
    }

    // Company search and filter
    public function company(Request $request)
    {
        $query = Company::query();
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('industry')) {
            $query->where('industry', $request->industry);
        }
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }
        $companyDetails = $query->paginate(9);
        return view('user.company.index', compact('companyDetails'));
    }

    public function about()
    {
        return view('user.about');
    }



}