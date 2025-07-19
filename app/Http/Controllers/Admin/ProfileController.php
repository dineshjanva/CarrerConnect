<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $totalUser = User::get()->count();
        // return $totalUser;
        $totalCompanies = Company::get()->count();
        // return $totalCompany;
        return view('Admin.AdminProfile.index', compact('totalUser', 'totalCompanies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255', // NOTE: You had max:25 (typo)
            'phone' => 'required|digits_between:10,15',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|max:1000|String',
        ]);

        $admin = Auth::user();
        // dd($admin);
        $admin->update([
            'name' => $validated['name'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'bio' => $validated['bio'],
            'location' => $validated['location'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function passwordUpdate(Request $request)
    {
        // return $request;
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $admin = Auth::user();
        // return $admin->id;
        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
        // PassWord Update
        $admin->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}