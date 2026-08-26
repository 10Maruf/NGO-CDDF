<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    // add
    public function add()
    {
        return view('admin.programs.add');
    }

    // Store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif',
            'status' => 'required|in:active,completed,upcoming',
        ]);

        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = rand(10000, 99999) . "program." . $image->getClientOriginalExtension();
            compress_and_save_image($image, public_path('images/programs'), $imageName);
        }

        $data = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'start_date' => $request->start_date,
            'status' => $request->status
        );

        DB::table('programs')->insert($data);
        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $data = DB::table('programs')->orderBy('id', 'desc')->get();
        return view('admin.programs.index', compact('data'));
    }

    // Destroy
    public function destroy($id)
    {
        $item = DB::table('programs')->where('id', $id)->first();
        $oldImageName = public_path('images/programs/' . $item->image);

        if (file_exists($oldImageName)) {
            @unlink($oldImageName);
        }
        DB::table('programs')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    // Edit
    public function edit($id)
    {
        $data = DB::table('programs')->where('id', $id)->first();
        return view('admin.programs.edit', compact('data'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:active,completed,upcoming',
        ]);

        $item = DB::table('programs')->where('id', $id)->first();

        $imageName = '';
        $oldImageName = public_path('images/programs/' . $item->image);

        if ($image = $request->file('image')) {
            if (file_exists($oldImageName)) {
                @unlink($oldImageName);
            }
            $imageName = rand(10000, 99999) . "program." . $image->getClientOriginalExtension();
            compress_and_save_image($image, public_path('images/programs'), $imageName);
        } else {
            $imageName = $item->image;
        }

        $data = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'start_date' => $request->start_date,
            'status' => $request->status
        );

        DB::table('programs')->where('id', $id)->update($data);
        return redirect()->back()->with('update', 'Successfully Updated');
    }
}
