<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\AdCampaign;
class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.ads.index');
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
        $validator = Validator::make($request->all(), [
            //     'campaign_name' => 'required|string|max:255',
            //     'ad_type' => 'required|in:banner,sponsored,popup',
            //     'status' => 'required|in:active,paused,pending',
            //     'description' => 'nullable|string',
            //     'headline' => 'required|string|max:255',
            //     'ad_description' => 'required|string',
            //     'cta' => 'required|string|max:255',
            //     'destination_url' => 'required|url',
            //     'start_date' => 'required|date',
            //     'end_date' => 'required|date|after_or_equal:start_date',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            //     // 'name' => 'required|string|max:255',
            //     'total_budget' => 'required|numeric|min:1',
            //     'bid_strategy' => 'required|in:cpc,cpm,cpa',
            //     'bid_amount' => 'required|numeric|min:0.1',

            //     'target_audience' => 'required|array|min:1',
            //     'target_audience.*' => 'in:job_seekers,employers,recruiters',
            'campaign_name' => 'required|string|max:255',
            'ad_type' => 'required|in:banner,sponsored,popup',
            'status' => 'required|in:active,paused,pending',
            'headline' => 'required|string|max:255',
            'description' => 'required|string',
            'ad_description' => 'required|string',
            'cta' => 'required|string|max:100',
            'destination_url' => 'required|url',
            'creative_image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'target_audience' => 'required|array|min:1',
            'target_audience.*' => 'in:job_seekers,employers,recruiters',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_budget' => 'required|numeric|min:1',
            'bid_strategy' => 'required|in:cpc,cpm,cpa',
            'bid_amount' => 'required|numeric|min:0.1',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $imagePath = null;
        if ($request->hasFile('creative_image')) {
            $imagePath = $request->file('creative_image')->store('ads', 'public');
        }

        AdCampaign::create([
            'campaign_name' => $request->campaign_name,
            'ad_type' => $request->ad_type,
            'status' => $request->status,
            'headline' => $request->headline,
            'ad_description' => $request->ad_description,
            'cta' => $request->cta,
            'destination_url' => $request->destination_url,
            'creative_image' => $imagePath,
            'target_audience' => json_encode($request->target_audience),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_budget' => $request->total_budget,
            'bid_strategy' => $request->bid_strategy,
            'bid_amount' => $request->bid_amount,
        ]);

        return redirect()->back()->with('success', 'Ad campaign created successfully!');

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

    public function add_ads()
    {
        return view('admin.ads.add_ads');
    }
}