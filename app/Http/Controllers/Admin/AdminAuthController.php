<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\AdminAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminAuthController extends Controller
{
    public function AdminAuth()
    {
        return view('admin.auth.login');
    }

    public function authCheck(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        // Check password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Incorrect email or password.'])->withInput();
        }

        // $remember = $request->has('remember');
        if (!$user->hasRole('admin')) {
            return back()->withErrors(['email' => 'You are not authorized to login from here.']);
        }
        // Auth::guard('admin')->login($user);
        Auth::login($user);

        // Login the user (session-based)
        // Auth::login($user, $request->filled('remember'));

        return redirect()->route('admin');
    }

    // Failed login




}
