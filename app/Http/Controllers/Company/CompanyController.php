<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use App\Models\JobApplication;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use App\Models\Notification;

class CompanyController extends Controller
{
    //company page
    public function index()
    {
        $companyJobPosts = JobPost::where('company_id', Auth::id())->take(3)->get();
        // return $companyJobPosts;
        $jobApplication = JobApplication::where('company_id', Auth::id())->get();
        // return $jobApplication;
        $lastestJobApplication = JobApplication::with('jobspost')->where('company_id', Auth::id())->latest()->take(4)->get();
        // return $lastestJobApplication;
        $companyDetails = Company::where('company_id', Auth::id())->where('user_id', Auth::id())->first();
        // return $companyDetails;

        return view('employer.dashboard.index', compact('companyJobPosts', 'jobApplication', 'lastestJobApplication', 'companyDetails'));
    }

    // public function companyJobPost()
    // {
    //     return view('company.jobpost.index');
    // }

    public function companyApplyCandidate(Request $request)
    {


        if ($request->ajax()) {
            $data = JobApplication::select(['id', 'full_name', 'email', 'current_location', 'created_at']);

            return datatables()->of($data)
                ->addColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('d M Y, h:i A');
                })
                ->addIndexColumn()
                ->make(true);
        }
        return view('employer.allcandidate.index');

    }

    // public function getApplicationsData(Request $request)
    // {
    //     $query = JobApplication::query();

    //     if ($request->filled('search_input')) {
    //         $search = $request->input('search_input');

    //         $query->where(function ($q) use ($search) {
    //             $q->where('full_name', 'like', '%' . $search . '%')
    //                 ->orWhere('job_title', 'like', '%' . $search . '%'); // if job_title exists
    //         });
    //     }

    //     return DataTables::of($query)
    //         ->addColumn('name', function ($row) {
    //             return '
    //             <div class="candidate-info">
    //                 <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=100&h=100&q=80"
    //                     alt="' . e($row->full_name) . '" class="candidate-img" />
    //                 <div>
    //                     <div class="candidate-name">' . e($row->full_name) . '</div>
    //                     <div class="candidate-title">Candidate</div>
    //                 </div>
    //             </div>';
    //         })
    //         ->addColumn('industry', fn($row) => 'UI/UX Design')
    //         ->addColumn('employee_size', fn($row) => '1-10')
    //         ->addColumn('location', fn($row) => $row->current_location ?? 'Unknown')
    //         ->editColumn('created_at', fn($row) => \Carbon\Carbon::parse($row->created_at)->format('d M Y'))
    //         ->rawColumns(['name'])
    //         ->make(true);

    // }

    // id
// company_id
// job_title
// company_name
// job_type
// experience_level
// location
// salary_range
// application_url
// job_description
// responsibilities
// requirements
// benefits
// required_skills
// bachelor_degree
// portfolio_required
// about_company
// company_website
// company_logo
// created_at
// updated_at

    // public function companyPostedJob(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = JobPost::where('company_id', Auth::id())
    //             ->when($request->filled('job_type'), function ($query) use ($request) {
    //                 $query->where('job_type', $request->job_type);
    //             })
    //             ->select(['id', 'job_title', 'company_name', 'location', 'job_type', 'required_skills', 'created_at']);

    //         return DataTables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function ($row) {
    //                 $viewUrl = route('editpost', $row->id);
    //                 return '<a href="' . $viewUrl . '" class="action-link btn btn-sm btn-primary">Edit</a>';
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }

    //     return view('employer.company-posted.index');
    // }

    public function companyPostedJob(Request $request)
    {
        if ($request->ajax()) {
            $query = JobPost::where('company_id', Auth::id());

            // Job type filter (if using)
            if ($request->filled('job_type')) {
                $query->where('job_type', $request->job_type);
            }

            // Custom search filter
            if ($request->filled('search_input')) {
                $search = $request->search_input;
                $query->where(function ($q) use ($search) {
                    $q->where('job_title', 'like', "%{$search}%")
                        ->orWhere('company_name', 'like', "%{$search}%");
                    // Add ->orWhere('department', ...) if applicable
                });
            }

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $viewUrl = route('editpost', $row->id);
                    return '<a href="' . $viewUrl . '" class="action-link btn btn-sm btn-primary">Edit</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('employer.company-posted.index');
    }



    public function deleteJobPost()
    {
        return "delete";
    }

    public function editJobPost($id)
    {
        $companyPostId = JobPost::where('id', $id)
            ->where('company_id', Auth::id())
            ->firstOrFail();
        return view('user.apply.edit_job', compact('companyPostId', 'id'));
    }

    public function editJobPostData(Request $request, $id)
    {
        // return $request;
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

        $path = null;
        if ($request->hasFile('company_logo')) {
            $path = $request->file('company_logo')->store('logos', 'public');
        }

        $compamyId = Company::where('user_id', Auth::id())
            ->where('company_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        $job = JobPost::findOrFail($id);

        $job->update([
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
            'company_logo' => $path ?? $job->company_logo, // fallback if no new logo
        ]);


        $notification = Notification::where('job_post_id', $job->id)->first();

        if ($notification) {
            $notification->updateOrCreate([
                'company_id' => $compamyId->user_id,
                'company_name' => $job->company_name,
                'job_title' => $job->job_title,
                'job_post_id' => $job->id,
            ]);
        }

        return back()->with('success', 'Job Update Successfully');

    }


}