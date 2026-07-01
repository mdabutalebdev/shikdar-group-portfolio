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
        return view('home', compact('setting', 'concerns'));
    }

    public function concerns()
    {
        $concerns = Concern::orderBy('order_index')->get();
        return view('concerns', compact('concerns'));
    }
}
