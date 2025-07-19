<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use App\Models\JobPost;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class EmployeerController extends Controller
{
    public function add_jobs()
    {
        return view('Employer.index');
    }

    public function addJobPost(Request $request)
    {
        $validated = $request->validate([

            'job_title' => 'required|string|min:3|max:255',
            'company_name' => 'required|string|max:255',
            'job_type' => 'required|in:full-time,part-time,contract,internship,remote',
            'experience_level' => 'required|in:entry,mid,senior,executive',
            'location' => 'required|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'application_url' => 'required|string|max:255',
            'job_description' => 'required|string',
            'responsibilities' => 'required|string',
            'requirements' => 'required|string',
            'benefits' => 'nullable|string',
            'required_skills' => 'nullable|array',
            'bachelor_degree' => 'nullable|boolean',
            'portfolio_required' => 'nullable|boolean',
            'about_company' => 'required|string',
            'company_website' => 'nullable|url',
            'company_logo' => 'nullable|file|image|max:2048', // 2MB
        ]);

        // dd($request->all());

        $path = null;
        if ($request->hasFile('company_logo')) {
            $path = $request->file('company_logo')->store('logos', 'public');
        }

        $compamyId = Company::where('user_id', Auth::id())
            ->where('company_id', Auth::id())
            ->first();
        // dd($request->all());
        // return $request;
        // return $compamyId->user_id;

        $job = JobPost::create([
            'company_id' => $compamyId->user_id,
            'job_title' => $request->job_title,
            'company_name' => $request->company_name,
            'job_type' => $request->job_type,
            'experience_level' => $request->experience_level,
            'location' => $request->location,
            'salary_range' => $request->salary_range,
            'application_url' => $request->application_url,
            'job_description' => $request->job_description,
            'responsibilities' => $request->responsibilities,
            'requirements' => $request->requirements,
            'benefits' => $request->benefits,
            'required_skills' => json_encode($request->required_skills),
            'bachelor_degree' => $request->has('bachelor_degree'),
            'portfolio_required' => $request->has('portfolio_required'),
            'about_company' => $request->about_company,
            'company_website' => $request->company_website,
            'company_logo' => $path,
        ]);

        // create notification
        Notification::create([
            'company_id' => $compamyId->user_id,
            'company_name' => $job->company_name,
            'job_title' => $job->job_title,
            'job_post_id' => $job->id,

        ]);
        return back()->with('success', 'Job Post Successfully');
    }

    public function companyProfileUpdate(Request $request)
    {
        // return Auth::id();
        // return $company;

        $validated = $request->validate([
            'company_name' => 'required|string|max:50',
            'tagline' => 'nullable|string|max:255',
            'website' => 'required|max:255|url',
            'employee_size' => 'nullable|string|max:10',
            'location' => 'nullable|string|max:255',
            'industry' => 'required|in:Information Technology,finance,healthcare,education,retail',
            'description' => 'nullable|string|max:1000',
        ]);
        // return $validated;

        $company = Company::where('user_id', Auth::id())->first();

        if ($company) {
            $company->update([
                'name' => $validated['company_name'],
                'tagline' => $validated['tagline'],
                'website' => $validated['website'],
                'employee_size' => $validated['employee_size'],
                'location' => $validated['location'],
                'industry' => $validated['industry'],
                'description' => $validated['description'],
            ]);

            return back()->with('success', 'Company profile updated successfully.');
        }


        return back()->with('success', 'Profile updated successfully.');
    }



}