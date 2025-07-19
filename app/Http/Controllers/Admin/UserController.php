<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $totalUser = User::whereHas('roles', function ($q) {
            $q->where('name', 'jobseeker')
                ->orWhere('name', 'employer');
        })->count();

        $totalMonthUser = User::
            whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // Total Employeer
        $totalEmployer = User::whereHas('roles', function ($q) {
            $q->Where('name', 'employer');
        })->count();

        // return $totalEmployer;
        if ($request->ajax()) {
            $data = User::with('roles');

            // Optional filter by role
            if ($request->has('role') && $request->role != '') {
                $data->whereHas('roles', function ($q) use ($request) {
                    $q->where('name', $request->role);
                });
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('role', function ($user) {
                    return $user->getRoleNames()->first() ?? 'N/A';
                })
                ->editColumn('created_at', function ($user) {
                    return $user->created_at->format('d M Y');
                })
                ->make(true);
        }

        return view('Admin.User.index', compact('totalUser', 'totalMonthUser', 'totalEmployer'));

    }

    // public function adminUsers(Request $request)
    // {

    // }

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}