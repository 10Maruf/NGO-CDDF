<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class invokedController extends Controller
{
    //__Create__//
    public function create()
    {
        return view('admin.invoked.add');
    }

    //__store__//
    public function store(Request $request)
    {
        $validatedDate = $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:pdf,jpg,png,jpeg',
        ]);

        $fileName = '';
        if ($file = $request->file('file')) {
            $fileName = rand(10000, 99999) . 'invoked.' . $file->getClientOriginalExtension();
            compress_and_save_image($file, public_path('images/invoked'), $fileName);
        }

        $file = [
            'name' => $request->name,
            'file' => $fileName
        ];

        DB::table('invoked')->insert($file);
        return redirect()->back()->with('success', 'Successfully Uploaded');
    }

    //__index__//
    public function index()
    {
        $file = DB::table('invoked')->get();
        return view('admin.invoked.index', compact('file'));
    }

    //__delete__//
    public function destroy($id)
    {
        $file = DB::table('invoked')->where('id', $id)->first();

        $oldFile = public_path('images/invoked/' . $file->file);

        if (file_exists($oldFile)) {
            @unlink($oldFile);
        }

        DB::table('invoked')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    //__edit__//
    public function edit($id)
    {
        $file = DB::table('invoked')->where('id', $id)->first();
        return view('admin.invoked.edit', compact('file'));
    }

    //update//
    public function update(Request $request, $id)
    {
        $validatedDate = $request->validate([
            'name' => 'required',
        ]);

        $files = DB::table('invoked')->where('id', $id)->first();

        $fileName = '';
        $oldFile = public_path('images/invoked/' . $files->file);

        if ($file = $request->file('file')) {
            if (file_exists($oldFile)) {
                @unlink($oldFile);
            }
            $fileName = rand(10000, 99999) . 'invoked.' . $file->getClientOriginalExtension();
            compress_and_save_image($file, public_path('images/invoked'), $fileName);
        } else {
            $fileName = $files->file;
        }


        $invoked = [
            'name' => $request->name,
            'file' => $fileName
        ];

        DB::table('invoked')->where('id', $id)->update($invoked);
        return redirect()->back()->with('success', 'Successfully Updated');
    }
}
