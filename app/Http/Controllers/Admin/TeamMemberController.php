<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamMemberController extends Controller
{
    // add
    public function add()
    {
        return view('admin.team_members.add');
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
            $photoName = rand(10000, 99999) . "team." . $photo->getClientOriginalExtension();
            compress_and_save_image($photo, public_path('images/team_members'), $photoName);
        }

        $data = array(
            'name' => $request->name,
            'designation' => $request->designation,
            'department' => $request->department,
            'bio' => $request->bio,
            'photo' => $photoName,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'order' => $request->order ?? 0
        );

        DB::table('team_members')->insert($data);
        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $data = DB::table('team_members')->orderBy('order', 'asc')->get();
        return view('admin.team_members.index', compact('data'));
    }

    // Destroy
    public function destroy($id)
    {
        $item = DB::table('team_members')->where('id', $id)->first();
        $oldImageName = public_path('images/team_members/' . $item->photo);

        if (file_exists($oldImageName)) {
            @unlink($oldImageName);
        }
        DB::table('team_members')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    // Edit
    public function edit($id)
    {
        $data = DB::table('team_members')->where('id', $id)->first();
        return view('admin.team_members.edit', compact('data'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'order' => 'nullable|integer',
        ]);

        $item = DB::table('team_members')->where('id', $id)->first();

        $photoName = '';
        $oldImageName = public_path('images/team_members/' . $item->photo);

        if ($photo = $request->file('photo')) {
            if (file_exists($oldImageName)) {
                @unlink($oldImageName);
            }
            $photoName = rand(10000, 99999) . "team." . $photo->getClientOriginalExtension();
            compress_and_save_image($photo, public_path('images/team_members'), $photoName);
        } else {
            $photoName = $item->photo;
        }

        $data = array(
            'name' => $request->name,
            'designation' => $request->designation,
            'department' => $request->department,
            'bio' => $request->bio,
            'photo' => $photoName,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'order' => $request->order ?? 0
        );

        DB::table('team_members')->where('id', $id)->update($data);
        return redirect()->back()->with('update', 'Successfully Updated');
    }
}
