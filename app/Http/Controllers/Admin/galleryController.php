<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class galleryController extends Controller
{
    // add
    public function add()
    {
        return view('admin.gallery.add');
    }
    // Store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif',
        ]);

        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = rand(10000, 99999) . "gallery." . $image->getClientOriginalExtension();
            $image->move(public_path('images/gallery/'), $imageName);
        }

        $gallery = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'created_at' => now(),
            'updated_at' => now()
        ];

        DB::table('gallery')->insert($gallery);
        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $gallery = DB::table('gallery')->get();
        return view('admin.gallery.index', compact('gallery'));
    }

    // Destroy
    public function destroy($id)
    {
        $gallery = DB::table('gallery')->where('id', $id)->first();
        $oldImageName = public_path('images/gallery/' . $gallery->image);

        if (file_exists($oldImageName)) {
            @unlink($oldImageName);
        }
        DB::table('gallery')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted Gallery Photo');
    }

    // Edit
    public function edit($id)
    {
        $gallery = DB::table('gallery')->where('id', $id)->first();
        return view('admin.gallery.edit', compact('gallery'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $gallery = DB::table('gallery')->where('id', $id)->first();

        $imageName = '';
        $oldIamgeName = public_path('images/gallery/' . $gallery->image);

        if ($image = $request->file('image')) {
            if (file_exists($oldIamgeName)) {
                @unlink($oldIamgeName);
            }
            $imageName = rand(10000, 99999) . "gallery." . $image->getClientOriginalExtension();
            $image->move(public_path('images/gallery'), $imageName);
        } else {
            $imageName = $gallery->image;
        }

        $galleryData = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'updated_at' => now()
        ];

        DB::table('gallery')->where('id', $id)->update($galleryData);
        return redirect()->back()->with('update', 'Successfully Updated Gallery');
    }
}

