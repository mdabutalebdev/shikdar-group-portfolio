<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Concern;

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
            'icon_class' => 'nullable',
            'order_index' => 'integer'
        ]);
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
            'icon_class' => 'nullable',
            'order_index' => 'integer'
        ]);
        $concern->update($data);
        return redirect()->route('admin.concerns.index')->with('success', 'Concern updated successfully.');
    }

    public function destroy(Concern $concern)
    {
        $concern->delete();
        return back()->with('success', 'Concern deleted successfully.');
    }
}
