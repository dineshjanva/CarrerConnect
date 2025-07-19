<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\SiteSetting;

class SettingController extends Controller
{
    //
    public function setting()
    {
        return view('Admin.setting.index');
    }

    public function uploadLogo(Request $request)
    {

        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/logos', $filename);

            SiteSetting::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => str_replace('public/', '', $path)]
            );

            return back()->with('success', 'Logo uploaded successfully!');
        }
        return back()->with('error', 'No image file found.');
    }
}