<?php

namespace App\Http\Controllers\Jobseeker;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\JobPost;

class JobApplicationController extends Controller
{

    public function applyJob($id)
    {
        $jobDetails = JobPost::where('id', $id)->first();
        // return $jobDetails;
        if (!$jobDetails) {
            return back()->with('error', 'Now found this job');
        }
        return view('user.apply.apply_job', compact('jobDetails', 'id'));
    }

    public function jobData(Request $request)
    {
        // return $request;

        $validated = $request->validate([
            'job_id' => 'required|exists:job_posts,id',
            'full_name' => 'required|string|min:3',
            'email' => 'required|email',
            'mobile' => 'required|string|max:10',
            'current_location' => 'nullable|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'portfolio' => 'nullable|url',
            'source' => 'nullable|string|max:255',
        ]);

        // dd($request->all());
        // dd($validated);
        $companydata = JobPost::where('id', $request->job_id)->first();
        // return $companydata;
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // $company = Company::get();
        JobApplication::create([
            'user_id' => Auth::id(),
            'job_id' => $validated['job_id'],
            'company_id' => $companydata->company_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'current_location' => $request->current_location,
            'resume' => $resumePath,
            'cover_letter' => $request->cover_letter,
            'linkedin' => $request->linkedin,
            'portfolio' => $request->portfolio,
            'source' => $request->source,
        ]);
        return back()->with('success', 'Application submitted successfully!');
    }
}
