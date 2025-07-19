<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\JobPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;


class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $totalCompany = Company::count();
        $recentCompany = Company::whereHas('jobs')
            ->withCount('jobs')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        $totalJobseeker = user::role('jobseeker')->count();
        $recentUsers = User::whereHas('roles', function ($q) {
            $q->where('name', 'jobseeker')
                ->orWhere('name', 'employer');
        })->latest()->take(4)->get();

        $totalJobPosts = JobPost::count();
        return view('admin.index', compact('totalJobseeker', 'totalCompany', 'totalJobPosts', 'recentUsers', 'recentCompany'));
    }

    public function adminpage()
    {


    }
}