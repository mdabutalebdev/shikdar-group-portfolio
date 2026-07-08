<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Concern;
use Illuminate\Support\Facades\Storage;

class ConcernController extends Controller
{
    public function index()
    {
        $concerns = Concern::orderBy('order_index')->get();
        return view('admin.concerns.index', compact('concerns'));
    }

    public function create()
    {
        return view('admin.concerns.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'details' => 'nullable',
            'icon_class' => 'nullable',
            'order_index' => 'integer',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);
        
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('concerns', 'public');
                $images[] = $path;
            }
        }
        $data['images'] = $images;

        Concern::create($data);
        return redirect()->route('admin.concerns.index')->with('success', 'Concern created successfully.');
    }

    public function edit(Concern $concern)
    {
        return view('admin.concerns.edit', compact('concern'));
    }

    public function update(Request $request, Concern $concern)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'details' => 'nullable',
            'icon_class' => 'nullable',
            'order_index' => 'integer',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        $images = $concern->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('concerns', 'public');
                $images[] = $path;
            }
        }
        
        // Remove images if requested
        if ($request->has('remove_images')) {
            foreach ($request->remove_images as $index) {
                if (isset($images[$index])) {
                    Storage::disk('public')->delete($images[$index]);
                    unset($images[$index]);
                }
            }
            $images = array_values($images); // Re-index array
        }

        $data['images'] = $images;

        $concern->update($data);
        return redirect()->route('admin.concerns.index')->with('success', 'Concern updated successfully.');
    }

    public function destroy(Concern $concern)
    {
        if ($concern->images) {
            foreach ($concern->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        $concern->delete();
        return back()->with('success', 'Concern deleted successfully.');
    }
}
