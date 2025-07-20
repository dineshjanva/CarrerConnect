<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\JobApplication;
use App\Models\JobPost;
use App\Models\UserExperience;
use App\Models\UserEducation;
use App\Models\UserSkill;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{

    public function searchJob(Request $request)
    {
        // dd($request);
        $validated = $request->validate([

            'search' => 'nullable|string|max:255',

            'location' => 'nullable|string|in:Udaipur,san-francisco,chicago,london,berlin',
            'job_type' => 'nullable|string|in:full-time,part-time,contract,remote',
            'experience_level' => 'nullable|string|in:entry,mid,senior',
        ], [
            'location.in' => 'Invalid location selected.',
            'job_type.in' => 'Invalid job type.',
            'experience_level.in' => 'Invalid experience level.',
        ]);

        // return $request;
        // return $validated;
        return redirect()->route('user.find_job', [
            'search' => $request->search,
            'location' => $request->location,
            'experience_level' => $request->experience_level,
            'job_type' => $request->job_type,
        ]);
    }

    public function profile()
    {
        $user = Auth::user();
        if ($user->hasRole('jobseeker')) {
            $experience = UserExperience::where('user_id', Auth::id())->get();
            // return $experience;
            $education = UserEducation::where('user_id', Auth::id())->get();
            // return $education;
            $skills = UserSkill::where('user_id', Auth::id())->first();

            return view('user.profile.index', compact('education', 'experience', 'skills'));
        }
        if ($user->hasRole('employer')) {
            $company = Company::where('user_id', $user->id)->first();
            return view('user.profile.index', compact('company'));
        }
        return view('user.profile.index');
    }

    public function profileUpdate(Request $request)
    {

        if ($request->desc) {
            $validated = $request->validate([
                'desc' => 'nullable|string|max:1000',
            ]);
            $user = Auth::user();
            $user->about = $validated['desc'] ?? null;
        } else {

            $validated = $request->validate([
                'name' => 'required|string|min:3|max:50',
                'lastname' => 'nullable|string|min:3|max:50',
                'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
                'phone' => 'nullable|string|max:10',
                'location' => 'nullable|string|max:255',
                'bio' => 'nullable|string|max:30',
                'industry' => 'nullable|in:Information Technology,finance,healthcare,education,retail',
            ]);

            $user = Auth::user();
            $user->name = $validated['name'];
            $user->lastname = $validated['lastname'];
            $user->email = $validated['email'];
            $user->bio = $validated['bio'] ?? null;
            $user->phone = $validated['phone'] ?? null;
            $user->location = $validated['location'] ?? null;
            $user->industry = $validated['industry'] ?? null;
        }

        $user->save();

        return redirect()->back()->with('profilesuccess', 'Profile updated successfully!');
    }

    public function education()
    {
        return view('user.profile.education.add');
    }

    public function addeduaction(Request $request)
    {

        if ($request->exp_company) {

            $request->validate([
                'exp_company' => 'required|string|max:255',
                'exp_location' => 'required|string|max:255',
                'exp_title' => 'required|string|max:255',
                'exp_dates' => 'required|string|max:100',
                'exp_description' => 'required|string|max:1000',
            ]);


            UserExperience::create([
                'user_id' => Auth::id(),
                'job_title' => $request->exp_title,
                'company_name' => $request->exp_company,
                'location' => $request->exp_location,
                'years' => $request->exp_dates,
                'description' => $request->exp_description,
            ]);

            return back()->with('addexperience', 'Add successfully!');
        } else if ($request->edu_institution) {

            $request->validate([
                'edu_institution' => 'required|string|max:255',
                'edu_location' => 'required|string|max:255',
                'edu_degree' => 'required|string|max:255',
                'edu_dates' => 'required|string|max:100',
                'edu_description' => 'required|string|max:1000',
            ]);
            UserEducation::create([
                'user_id' => auth()->id(),
                'degree_title' => $request->edu_degree,
                'location' => $request->edu_location,
                'institute_name' => $request->edu_institution,
                'years' => $request->edu_dates,
                'description' => $request->edu_description,
            ]);
            return back()->with('addeducation', 'Add successfully!');
        } else {
            // return $request;
            $request->validate([
                'skills' => 'nullable|string|max:1000',
            ]);
            UserSkill::updateOrCreate(
                ['user_id' => Auth::id()],
                ['skill' => $request->skills]
            );
            return back()->with('success', 'Added successfully!');
        }
        // return back()->with('success', 'Profile updated successfully!');
        // return $request;
    }


    public function educationPage($id)
    {

        $userEducation = UserEducation::where('user_id', Auth::id())->findOrFail($id);

        return view('user.profile.education.edit', compact('id', 'userEducation'));
    }

    public function UpdateProfileEducation(Request $request, $id)
    {
        // return $id;
        $request->validate([
            'edu_institution' => 'required|string|max:255',
            'edu_location' => 'required|string|max:255',
            'edu_degree' => 'required|string|max:255',
            'edu_dates' => 'required|string|max:100',
            'edu_description' => 'required|string|max:1000',
        ]);
        // return $request;
        $userEducation = UserEducation::where('user_id', Auth::id())->findOrFail($id);
        $userEducation->update([
            'institute_name' => $request->edu_institution,
            'location' => $request->edu_location,
            'degree_title' => $request->edu_degree,
            'years' => $request->edu_dates,
            'description' => $request->edu_description,
        ]);
        return redirect()->back()->with('success', 'Education details updated successfully.');
    }

    public function experiencePage($id)
    {

        $userExperience = UserExperience::where('user_id', Auth::id())->findOrFail($id);
        // return $userExperience;
        return view('user.profile.experience.edit', compact('id', 'userExperience'));
    }
    public function updateProfileexperience(Request $request, $id)
    {
        $request->validate([
            'exp_company' => 'required|string|max:255',
            'exp_location' => 'required|string|max:255',
            'exp_title' => 'required|string|max:255',
            'exp_dates' => 'required|string|max:100',
            'exp_description' => 'required|string|max:1000',
        ]);
        $userExperience = UserExperience::where('user_id', Auth::id())->findOrFail($id);

        $userExperience->update([
            'job_title' => $request->exp_title,
            'company_name' => $request->exp_company,
            'location' => $request->exp_location,
            'years' => $request->exp_dates,
            'description' => $request->exp_description,
        ]);

        return back()->with('message', 'Experience updated successfully');

        // return $id;
    }

    public function experience()
    {
        return view('user.profile.experience.add');
    }

    public function deleteProfileexperience($id)
    {
        $userExperience = UserExperience::where('user_id', Auth::id())->findOrFail($id);

        $userExperience->delete();
        return redirect()->route('user.profile');
    }

    public function deleteProfileeducation($id)
    {
        $userEducation = UserEducation::where('user_id', Auth::id())->findOrFail($id);

        $userEducation->delete();
        return redirect()->route('user.profile');
    }


    public function profiledata($id)
    {
        $user = User::where('id', $id)->first();
        if (empty($user)) {
            return back();
        }
        $userEducation = UserEducation::where('user_id', $user->id)->get();
        $userExperience = UserExperience::where('user_id', $user->id)->get();
        $skills = UserSkill::where('user_id', $user->id)->first();
        // return $user;
        // return $userEducation;
        // return $userExperience;
        // return $skills;
        return view('user.candidate.view', compact('user', 'userEducation', 'userExperience', 'skills'));
    }

    public function skillsPage()
    {
        $skills = UserSkill::where('user_id', Auth::id())->first();
        $skillString = $skills ? $skills->skill : '';
        return view('user.profile.skill.index', compact('skillString'));

        // }
        // return view('user.profile.skill.index');
    }


    public function companypos($id)
    {
        $companyDetails = Company::where('company_id', $id)->first();
        // return $companyDetails;
        if (empty($companyDetails)) {
            return back();
        }
        $moreCompanyJob = JobPost::where('company_id', $id)->get();
        // return $moreCompanyJob;
        // return $companyDetails;
        return view('user.companypos', compact('companyDetails', 'moreCompanyJob'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function userNotification()
    {

        // $user = Auth::user();
        // return $user;
        $notifications = Notification::get();

        // return $notifications;

        // $company=Company::where('user_id',$notifications->company_id);
        return view('User.notification.index', compact('notifications'));
    }


    public function allUser()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['jobseeker']);
        })->get();

        // return $users;
        return view('user.candidate.index', compact('users'));
    }
}