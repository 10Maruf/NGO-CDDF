<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExecutiveCommitteeController extends Controller
{
    // add
    public function add()
    {
        return view('admin.executive_committee.add');
    }

    // Store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'photo' => 'required|mimes:jpg,png,jpeg,gif',
            'order' => 'nullable|integer',
        ]);

        $photoName = '';
        if ($photo = $request->file('photo')) {
            $photoName = rand(10000, 99999) . "executive." . $photo->getClientOriginalExtension();
            compress_and_save_image($photo, public_path('images/executive_committee'), $photoName);
        }

        $data = array(
            'name' => $request->name,
            'designation' => $request->designation,
            'bio' => $request->bio,
            'photo' => $photoName,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'order' => $request->order ?? 0
        );

        DB::table('executive_committee')->insert($data);
        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $data = DB::table('executive_committee')->orderBy('order', 'asc')->get();
        return view('admin.executive_committee.index', compact('data'));
    }

    // Destroy
    public function destroy($id)
    {
        $item = DB::table('executive_committee')->where('id', $id)->first();
        $oldImageName = public_path('images/executive_committee/' . $item->photo);

        if (file_exists($oldImageName)) {
            @unlink($oldImageName);
        }
        DB::table('executive_committee')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    // Edit
    public function edit($id)
    {
        $data = DB::table('executive_committee')->where('id', $id)->first();
        return view('admin.executive_committee.edit', compact('data'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'order' => 'nullable|integer',
        ]);

        $item = DB::table('executive_committee')->where('id', $id)->first();

        $photoName = '';
        $oldImageName = public_path('images/executive_committee/' . $item->photo);

        if ($photo = $request->file('photo')) {
            if (file_exists($oldImageName)) {
                @unlink($oldImageName);
            }
            $photoName = rand(10000, 99999) . "executive." . $photo->getClientOriginalExtension();
            compress_and_save_image($photo, public_path('images/executive_committee'), $photoName);
        } else {
            $photoName = $item->photo;
        }

        $data = array(
            'name' => $request->name,
            'designation' => $request->designation,
            'bio' => $request->bio,
            'photo' => $photoName,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'order' => $request->order ?? 0
        );

        DB::table('executive_committee')->where('id', $id)->update($data);
        return redirect()->back()->with('update', 'Successfully Updated');
    }
}
