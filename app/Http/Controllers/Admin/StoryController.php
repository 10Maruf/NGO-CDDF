<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoryController extends Controller
{
    // add
    public function add()
    {
        return view('admin.stories.add');
    }

    // Store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'rating' => 'required|integer|min:1|max:5',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif',
            'beneficiary_name' => 'required',
            'beneficiary_title' => 'required',
        ]);

        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = rand(10000, 99999) . "story." . $image->getClientOriginalExtension();
            $image->move(public_path('images/stories/'), $imageName);
        }

        $data = array(
            // 'rating' => $request->rating,
            'description' => $request->description,
            'image' => $imageName,
            'beneficiary_name' => $request->beneficiary_name,
            'beneficiary_title' => $request->beneficiary_title,
            'date' => $request->date,
            'order' => $request->order ?? 0,
        );

        DB::table('stories')->insert($data);
        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $data = DB::table('stories')->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        return view('admin.stories.index', compact('data'));
    }

    public function updateOrder(Request $request)
    {
        if ($request->has('order')) {
            foreach ($request->order as $index => $id) {
                DB::table('stories')->where('id', $id)->update(['order' => $index + 1]);
            }
            return response()->json(['success' => 'Order updated successfully'], 200);
        }
        return response()->json(['error' => 'Order data missing'], 400);
    }

    // Destroy
    public function destroy($id)
    {
        $item = DB::table('stories')->where('id', $id)->first();
        $oldImageName = public_path('images/stories/' . $item->image);

        if (file_exists($oldImageName)) {
            @unlink($oldImageName);
        }
        DB::table('stories')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    // Edit
    public function edit($id)
    {
        $data = DB::table('stories')->where('id', $id)->first();
        return view('admin.stories.edit', compact('data'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // 'rating' => 'required|integer|min:1|max:5',
            'description' => 'required',
            'beneficiary_name' => 'required',
            'beneficiary_title' => 'required',
        ]);

        $item = DB::table('stories')->where('id', $id)->first();

        $imageName = '';
        $oldImageName = public_path('images/stories/' . $item->image);

        if ($image = $request->file('image')) {
            if (file_exists($oldImageName)) {
                @unlink($oldImageName);
            }
            $imageName = rand(10000, 99999) . "story." . $image->getClientOriginalExtension();
            $image->move(public_path('images/stories'), $imageName);
        } else {
            $imageName = $item->image;
        }

        $data = array(
            // 'rating' => $request->rating,
            'description' => $request->description,
            'image' => $imageName,
            'beneficiary_name' => $request->beneficiary_name,
            'beneficiary_title' => $request->beneficiary_title,
            'date' => $request->date,
            'order' => $request->order ?? 0,
        );

        DB::table('stories')->where('id', $id)->update($data);
        return redirect()->back()->with('update', 'Successfully Updated');
    }

    // Bulk Delete
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['error' => 'No items selected'], 400);
        }

        $items = DB::table('stories')->whereIn('id', $ids)->get();
        foreach ($items as $item) {
            if ($item->image) {
                $path = public_path('images/stories/' . $item->image);
                if (file_exists($path)) @unlink($path);
            }
        }

        DB::table('stories')->whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }
}
