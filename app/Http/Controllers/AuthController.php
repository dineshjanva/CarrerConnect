<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\User;


class AuthController extends Controller
{
    public function login()
    {
        return view('user.auth.login');
    }

    public function loginData(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            $token = $user->createToken('auth_token')->plainTextToken;

            if ($user->hasRole('jobseeker') || $user->hasRole('employer')) {

                Auth::login($user);

                return redirect()->route('home')->with('login_success');
                
            } else {
                return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
            }
            // return redirect()->route('home')->with('login_success', true);
        } else {
            return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
        }
    }

    public function register()
    {
        return view('user.auth.register');
    }

    public function registerData(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|min:3',
            'lastname' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:jobseeker,employer',
        ]);

        $user = User::create([
            'name' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($validated['role']);

        if ($validated['role'] === 'employer') {

            Company::create([
                'user_id' => $user->id,
                'company_id' => $user->id,
                'name' => $validated['firstname'] . "'s Company",
            ]);
            // $token = $user->createToken('auth_token')->plainTextToken;
            // Auth::guard($user)->login($user);
            Auth::login($user);
            return redirect()->route('home');
        }
        Auth::login($user);
        return redirect()->route('home');

    }
}