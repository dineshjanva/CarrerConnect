<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\AdCampaign;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ads = AdCampaign::get();
        return view('admin.ads.index', compact('ads'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.ads.add_ads');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
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
        $ad = AdCampaign::findOrFail($id);
        return view('admin.ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'campaign_name' => 'required|string|max:255',
            'ad_type' => 'required|in:banner,video',
            'status' => 'required|in:active,paused',
            'headline' => 'nullable|string|max:255',
            'ad_description' => 'nullable|string',
            'cta' => 'nullable|string|max:100',
            'destination_url' => 'nullable|url|max:255',
            'creative_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'target_audience' => 'nullable|array',
            'target_audience.*' => 'string|in:job_seekers,employers,students',

            'start_date' => 'required|date|',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_budget' => 'nullable|numeric|min:0',

            'bid_strategy' => 'nullable|in:cpc,cpm',
            'bid_amount' => 'nullable|numeric|min:0',
        ]);


        $ad = AdCampaign::findOrFail($id);

        if ($request->hasFile('creative_image')) {
            if ($ad->creative_image && \Storage::disk('public')->exists('ads/' . $ad->creative_image)) {
                // dd('true');
                \Storage::disk('public')->delete('ads/' . $ad->creative_image);
            }

            $file = $request->file('creative_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('ads', $filename, 'public');
            $validated['creative_image'] = $filename;
        }

        $ad->update($validated);

        return redirect()->route('admin.ads')->with('success', 'Ad campaign updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Ad::findOrFail($id)->delete();
        return redirect()->route('admin.ads.index')->with('success', 'Ad deleted');
    }


    public function pause($id)
    {

        $ad = AdCampaign::findOrFail($id);
        if ($ad->status === 'pending') {
            $ad->status = 'active';
        } elseif ($ad->status === 'active') {
            $ad->status = 'paused';
        } else {
            $ad->status = 'active';
        }

        $ad->save();
        return redirect()->back()->with('success', 'Ad paused');
    }

    public function stats($id)
    {
        $ad = AdCampaign::findOrFail($id);

        // $weeklyClicks = DB::table('AdCampaign')
        //     ->select(
        //         DB::raw("WEEK(created_at) as week_number"),
        //         DB::raw("SUM(total_buget) as total_clicks")
        //     )
        //     ->groupBy(DB::raw("WEEK(created_at)"))
        //     ->orderBy(DB::raw("WEEK(created_at)"))
        //     ->get();
        // return view('admin.ads.stats', [
        //     'weeklyClicks' => $weeklyClicks
        // ]);
        // Custom logic to fetch stats
        return view('admin.ads.stats', compact('ad'));
    }
}