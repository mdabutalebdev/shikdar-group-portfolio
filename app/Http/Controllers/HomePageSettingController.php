<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomePageSetting;

class HomePageSettingController extends Controller
{
    public function edit()
    {
        $setting = HomePageSetting::first();
        if (!$setting) {
            $setting = HomePageSetting::create([]);
        }
        return view('admin.home-page.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = HomePageSetting::first();
        if (!$setting) {
            $setting = HomePageSetting::create([]);
        }

        $data = $request->except(['_token', '_method', 'hero_bg_image_file', 'section']);

        if ($request->hasFile('hero_bg_image_file')) {
            $path = $request->file('hero_bg_image_file')->store('images/banners', 'public');
            $data['hero_bg_image'] = '/storage/' . $path;
        }

        $setting->update($data);

        $section = $request->input('section', 'hero');

        return redirect()->route('admin.home-page-settings.edit', ['section' => $section])
                         ->with('success', 'Home Page Settings updated successfully.');
    }
}
