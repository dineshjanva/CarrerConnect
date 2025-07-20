<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    // public function findJob(Request $request)
    // {
    //     // return $request;
    //     $allJobCount = JobPost::count();

    //     if ($request->search) {
    //         // return $request;
    //         $search = $request->search;
    //         $location = $request->location;
    //         $experience_level = $request->experience_level;
    //         $job_type = $request->job_type;

    //         $lastestJobData = JobPost::query();

    //         if ($request->filled('search')) {
    //             $lastestJobData->where(function ($q) use ($request) {
    //                 $q->where('job_title', 'like', '%' . $request->search . '%')
    //                     ->orWhere('location', 'like', '%' . $request->search . '%');
    //             });
    //         }

    //         if ($request->filled('job_type')) {
    //             $lastestJobData->where('job_type', $request->job_type);
    //         }

    //         if ($request->filled('experience_level')) {
    //             $lastestJobData->where('experience_level', $request->experience_level);
    //         }

    //         // dd($lastestJobData);
    //         return view('user.find_job', compact('search', 'lastestJobData', 'allJobCount'));
    //     }
    //     if (!$request) {
    //         if (Auth::check()) {
    //             $user = Auth::user();
    //             // dd($user->all());
    //             if ($user->industry !== null) {
    //                 $lastestJobData = JobPost::whereHas('company', function ($query) use ($user) {
    //                     $query->where('industry', $user->industry); // or 'industry_id' if ID
    //                 })->with('company')->take(3)->get();

    //                 // return $lastestJobData;
    //                 if (count($lastestJobData) != 10) {
    //                     $otherJobs = JobPost::whereDoesntHave('company', function ($query) use ($user) {
    //                         $query->where('industry', $user->industry);
    //                     })->with('company')->take(10 - count($lastestJobData))->get();
    //                 }
    //             } else {
    //                 $lastestJobData = JobPost::orderBy('created_at', 'desc')->take(10)->get();
    //             }
    //         } else {
    //             $lastestJobData = JobPost::orderBy('created_at', 'desc')->take(10)->get();
    //             // return $lastestJobData;
    //         }
    //         $lastestJobData = $lastestJobData->merge($otherJobs);
    //     } {
    //         $query = JobPost::query();

    //         if ($request->filter == 'newest') {
    //             $query->orderBy('created_at', 'desc');
    //         } elseif ($request->filter == 'salary') {
    //             $query->orderByRaw("CAST(SUBSTRING_INDEX(salary_range, '-', -1) AS UNSIGNED) DESC");
    //         } elseif ($request->filter == 'relevance') {
    //             $query->orderBy('job_title');
    //         }
    //         // return $lastestJobData;
    //         $lastestJobData = $query->paginate(10);
    //     }

    //     // return $allJobCount;
    //     return view('user.find_job', compact('lastestJobData', 'allJobCount'));
    // }
    public function findJob(Request $request)
    {
        $allJobCount = JobPost::count();
        $search = $request->search;
        $location = $request->location;
        $experience_level = $request->experience_level;
        $job_type = $request->job_type;
        $filter = $request->filter;

        // Initialize base query
        $query = JobPost::query();

        // 🔍 Apply filters if form submitted
        if ($request->filled('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('job_title', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->filled('job_type')) {
            $query->where('job_type', $job_type);
        }

        if ($request->filled('experience_level')) {
            $query->where('experience_level', $experience_level);
        }

        // 🧠 Apply filter type
        if ($filter === 'newest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($filter === 'salary') {
            $query->orderByRaw("CAST(SUBSTRING_INDEX(salary_range, '-', -1) AS UNSIGNED) DESC");
        } elseif ($filter === 'relevance') {
            $query->orderBy('job_title');
        }

        // 🧠 If user is authenticated, suggest jobs based on industry
        if (Auth::check() && !$request->search) {
            $user = Auth::user();
            $lastestJobData = collect();

            if ($user->industry !== null) {
                $matchedJobs = JobPost::whereHas('company', function ($q) use ($user) {
                    $q->where('industry', $user->industry);
                })->with('company')->take(3)->get();

                $lastestJobData = $lastestJobData->merge($matchedJobs);

                if ($lastestJobData->count() < 10) {
                    $otherJobs = JobPost::whereDoesntHave('company', function ($q) use ($user) {
                        $q->where('industry', $user->industry);
                    })->with('company')->take(10 - $lastestJobData->count())->get();

                    $lastestJobData = $lastestJobData->merge($otherJobs);
                }
            } else {
                $lastestJobData = JobPost::orderBy('created_at', 'desc')->take(10)->get();
            }
        } else {
            // 🧾 Default paginate for filters or unauthenticated users
            $lastestJobData = $query->paginate(10);
        }

        return view('user.find_job', compact('lastestJobData', 'allJobCount', 'search'));
    }


    public function resourse()
    {
        return view('user.resourse');
    }

    public function company()
    {
        $companyDetails = Company::all();
        // return $companyDetails;
        return view('user.company.index', compact('companyDetails'));
    }

    public function about()
    {
        return view('user.about');
    }



}