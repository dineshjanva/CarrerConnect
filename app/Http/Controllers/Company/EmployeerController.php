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

        $path = $request->file('company_logo')?->store('logos', 'public');

        $company = Company::where('user_id', Auth::id())->first();
        if (!$company) {
            return back()->withErrors(['company' => 'Company not found.']);
        }

        $job = JobPost::create([
            'company_id' => $company->user_id,
            'job_title' => $validated['job_title'],
            'job_type' => $validated['job_type'],
            'company_name' => $company->name ?? '',
            'experience_level' => $validated['experience_level'],
            'location' => $validated['location'],
            'salary_range' => $validated['salary_range'] ?? null,
            'application_url' => $validated['application_url'],
            'job_description' => $validated['job_description'],
            'responsibilities' => $validated['responsibilities'],
            'requirements' => $validated['requirements'],
            'benefits' => $validated['benefits'] ?? null,
            'required_skills' => isset($validated['required_skills']) ? json_encode($validated['required_skills']) : null,
            'bachelor_degree' => $request->boolean('bachelor_degree'),
            'portfolio_required' => $request->boolean('portfolio_required'),
            'about_company' => $validated['about_company'],
            'company_website' => $validated['company_website'] ?? null,
            'company_logo' => $path,
        ]);

        Notification::create([
            'company_id' => $company->user_id,
            'company_name' => $company->name ?? '',
            'job_title' => $job->job_title,
            'job_post_id' => $job->id,
        ]);
        return back()->with('success', 'Job Post Successfully');
    }

    public function companyProfileUpdate(Request $request)
    {

        $validated = $request->validate([
            'company_name' => 'required|string|max:50',
            'tagline' => 'nullable|string|max:255',
            'website' => 'required|max:255|url',
            'employee_size' => 'nullable|string|max:10',
            'location' => 'nullable|string|max:255',
            'industry' => 'required|in:Information Technology,finance,healthcare,education,retail',
            'description' => 'nullable|string|max:1000',
        ]);

        $company = Company::where('user_id', Auth::id())->first();

        if ($company) {
            $company->update([
                'name' => $validated['company_name'],
                'tagline' => $validated['tagline'] ?? null,
                'website' => $validated['website'],
                'employee_size' => $validated['employee_size'] ?? null,
                'location' => $validated['location'] ?? null,
                'industry' => $validated['industry'],
                'description' => $validated['description'] ?? null,
            ]);
            return back()->with('success', 'Company profile updated successfully.');
        }
        return back()->withErrors(['company' => 'Company not found.']);
    }



}