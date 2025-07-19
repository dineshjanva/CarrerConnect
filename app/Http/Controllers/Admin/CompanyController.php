<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\JobPost;
use Carbon\Carbon;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // Check if the request is an AJAX request
        $jobsPost = JobPost::get()->count();
        $totalCompanies = Company::get()->count();
        $totalMonthCompanies = Company::
            whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        // return $jobsPost;
        // return $data;
        // return $totalMonthCompanies;
        if ($request->ajax()) {
            // Fetch companies with pagination
            $companies = Company::withCount('jobs')->select([
                'id',
                'name',
                'industry',
                'employee_size',
                'location',
                'created_at',
            ]);

            // Return the data in a format suitable for DataTables
            return datatables()->of($companies)
                ->addIndexColumn() // Adds an index column for row numbers
                ->make(true); // Returns the data as JSON
        }
        // Return the view if not an AJAX request
        return view('Admin.company.index', compact('jobsPost', 'totalCompanies', 'totalMonthCompanies'));
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