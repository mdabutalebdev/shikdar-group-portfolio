<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('order')->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'title_1' => 'nullable|string|max:255',
            'title_2' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'btn1_text' => 'nullable|string|max:255',
            'btn1_url' => 'nullable|string|max:255',
            'btn2_text' => 'nullable|string|max:255',
            'btn2_url' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'integer'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('banners', 'public');
            $data['image_path'] = 'storage/' . $imagePath;
        }

        $data['is_active'] = $request->has('is_active');
        $data['order'] = $request->order ?? 0;

        Banner::create($data);

        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'title_1' => 'nullable|string|max:255',
            'title_2' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'btn1_text' => 'nullable|string|max:255',
            'btn1_url' => 'nullable|string|max:255',
            'btn2_text' => 'nullable|string|max:255',
            'btn2_url' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'integer'
        ]);

        if ($request->hasFile('image')) {
            if ($banner->image_path && file_exists(public_path($banner->image_path))) {
                @unlink(public_path($banner->image_path));
            }
            $imagePath = $request->file('image')->store('banners', 'public');
            $data['image_path'] = 'storage/' . $imagePath;
        }

        $data['is_active'] = $request->has('is_active');
        $data['order'] = $request->order ?? 0;

        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image_path && file_exists(public_path($banner->image_path))) {
            @unlink(public_path($banner->image_path));
        }
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully.');
    }
}
