<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HomePageSetting;
use App\Models\Service;
use App\Models\Concern;

class FrontendController extends Controller
{
    public function home()
    {
        $setting = HomePageSetting::first() ?? new HomePageSetting();
        $concerns = Concern::orderBy('order_index')->get();
        $banners = \App\Models\Banner::where('is_active', true)->orderBy('order')->get();
        return view('home', compact('setting', 'concerns', 'banners'));
    }

    public function concerns()
    {
        $concerns = Concern::orderBy('order_index')->get();
        return view('concerns', compact('concerns'));
    }

    public function concern_details($id)
    {
        $concern = Concern::findOrFail($id);
        return view('concern_details', compact('concern'));
    }
}
