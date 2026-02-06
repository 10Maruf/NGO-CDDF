<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FocusAreaController extends Controller
{
    public function index()
    {
        $focus_areas = DB::table('focus_areas')
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.focus_areas.index', compact('focus_areas'));
    }

    public function create()
    {
        return view('admin.focus_areas.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'order' => 'required|integer|min:0|unique:focus_areas,order',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('focus_areas', 'public');
        }

        DB::table('focus_areas')->insert([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_path' => $imagePath,
            'order' => $validated['order'] ?? 0,
            'is_active' => (bool)($validated['is_active'] ?? true),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.focus_areas.index')->with('success', 'Focus Area added successfully');
    }

    public function edit($id)
    {
        $focus_area = DB::table('focus_areas')->where('id', $id)->first();
        if (!$focus_area) {
            return redirect()->route('admin.focus_areas.index')->with('error', 'Focus Area not found');
        }

        return view('admin.focus_areas.edit', compact('focus_area'));
    }

    public function update(Request $request, $id)
    {
        $focus_area = DB::table('focus_areas')->where('id', $id)->first();
        if (!$focus_area) {
            return redirect()->route('admin.focus_areas.index')->with('error', 'Focus Area not found');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'order' => 'required|integer|min:0|unique:focus_areas,order,' . $id,
            'is_active' => 'nullable|boolean',
            'remove_image' => 'nullable|boolean',
        ]);

        $imagePath = $focus_area->image_path;

        if (!empty($validated['remove_image'])) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = null;
        }

        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('focus_areas', 'public');
        }

        DB::table('focus_areas')->where('id', $id)->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_path' => $imagePath,
            'order' => $validated['order'] ?? 0,
            'is_active' => (bool)($validated['is_active'] ?? false),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.focus_areas.index')->with('success', 'Focus Area updated successfully');
    }

    public function destroy($id)
    {
        $focus_area = DB::table('focus_areas')->where('id', $id)->first();
        if (!$focus_area) {
            return redirect()->route('admin.focus_areas.index')->with('error', 'Focus Area not found');
        }

        if ($focus_area->image_path) {
            Storage::disk('public')->delete($focus_area->image_path);
        }

        DB::table('focus_areas')->where('id', $id)->delete();

        return redirect()->route('admin.focus_areas.index')->with('success', 'Focus Area deleted successfully');
    }
}
