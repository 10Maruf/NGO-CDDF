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
            'title'      => 'required|string|max:255',
            'description'=> 'required|string',
            'detail_description' => 'nullable|string',
            'icon_class' => 'nullable|string|max:100',
            'image'      => 'nullable|image|max:4096',
            'is_active'  => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($image = $request->file('image')) {
            $imageName = rand(100000, 999999) . '.' . $image->getClientOriginalExtension();
            compress_and_save_image($image, Storage::disk('public')->path('focus_areas'), $imageName);
            $imagePath = 'focus_areas/' . $imageName;
        }

        // Shift all existing orders down by 1 so the new one is at the top
        DB::table('focus_areas')->increment('order');

        DB::table('focus_areas')->insert([
            'title'       => $validated['title'],
            'description' => $validated['description'],
            'detail_description' => $validated['detail_description'] ?? null,
            'icon_class'  => $validated['icon_class'] ?? null,
            'icon_path'   => null,
            'image_path'  => $imagePath,
            'order'       => 1,
            'is_active'   => (bool)($validated['is_active'] ?? true),
            'created_at'  => now(),
            'updated_at'  => now(),
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
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'detail_description' => 'nullable|string',
            'icon_class'   => 'nullable|string|max:100',
            'image'        => 'nullable|image|max:4096',
            'is_active'    => 'nullable|boolean',
            'remove_image' => 'nullable|boolean',
        ]);

        $imagePath = $focus_area->image_path;

        if (!empty($validated['remove_image'])) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = null;
        }

        if ($image = $request->file('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imageName = rand(100000, 999999) . '.' . $image->getClientOriginalExtension();
            compress_and_save_image($image, Storage::disk('public')->path('focus_areas'), $imageName);
            $imagePath = 'focus_areas/' . $imageName;
        }

        DB::table('focus_areas')->where('id', $id)->update([
            'title'       => $validated['title'],
            'description' => $validated['description'],
            'detail_description' => $validated['detail_description'] ?? null,
            'icon_class'  => $validated['icon_class'] ?? null,
            'image_path'  => $imagePath,
            'is_active'   => (bool)($validated['is_active'] ?? false),
            'updated_at'  => now(),
        ]);

        return redirect()->route('admin.focus_areas.index')->with('success', 'Focus Area updated successfully');
    }

    public function updateOrder(Request $request)
    {
        $orders = $request->order;

        if ($orders && is_array($orders)) {
            foreach ($orders as $index => $id) {
                DB::table('focus_areas')->where('id', $id)->update(['order' => $index + 1]);
            }
            return response()->json(['status' => 'success', 'message' => 'Order updated successfully.']);
        }

        return response()->json(['status' => 'error', 'message' => 'Invalid order data.'], 400);
    }

    public function destroy($id)
    {
        $focus_area = DB::table('focus_areas')->where('id', $id)->first();
        if (!$focus_area) {
            return redirect()->route('admin.focus_areas.index')->with('error', 'Focus Area not found');
        }

        if (!empty($focus_area->icon_path)) {
            Storage::disk('public')->delete($focus_area->icon_path);
        }

        if ($focus_area->image_path) {
            Storage::disk('public')->delete($focus_area->image_path);
        }

        DB::table('focus_areas')->where('id', $id)->delete();

        return redirect()->route('admin.focus_areas.index')->with('success', 'Focus Area deleted successfully');
    }

    public function toggleStatus($id)
    {
        $focus_area = DB::table('focus_areas')->where('id', $id)->first();
        if (!$focus_area) {
            return redirect()->route('admin.focus_areas.index')->with('error', 'Focus Area not found');
        }

        DB::table('focus_areas')->where('id', $id)->update([
            'is_active' => !$focus_area->is_active,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Status updated successfully');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['error' => 'No items selected'], 400);
        }

        $items = DB::table('focus_areas')->whereIn('id', $ids)->get();
        foreach ($items as $item) {
            if (!empty($item->icon_path)) {
                Storage::disk('public')->delete($item->icon_path);
            }
            if ($item->image_path) {
                Storage::disk('public')->delete($item->image_path);
            }
        }

        DB::table('focus_areas')->whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }

    public function bulkStatus(Request $request)
    {
        $ids = $request->input('ids', []);
        $status = $request->input('status');
        if (empty($ids)) {
            return response()->json(['error' => 'No items selected'], 400);
        }

        DB::table('focus_areas')->whereIn('id', $ids)->update([
            'is_active' => (bool) $status,
            'updated_at' => now(),
        ]);
        return response()->json(['success' => true]);
    }
}
