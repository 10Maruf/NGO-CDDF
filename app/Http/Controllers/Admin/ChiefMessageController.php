<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChiefMessageController extends Controller
{
    // add
    public function add()
    {
        return view('admin.chief_message.add');
    }

    // Store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'message' => 'required',
            'name' => 'required',
            'designation' => 'required',
        ]);

        $photoName = '';
        if ($photo = $request->file('photo')) {
            $photoName = rand(10000, 99999) . "chief." . $photo->getClientOriginalExtension();
            compress_and_save_image($photo, public_path('images/chief_message'), $photoName);
        }

        $signatureName = '';
        if ($signature = $request->file('signature')) {
            $signatureName = rand(10000, 99999) . "signature." . $signature->getClientOriginalExtension();
            compress_and_save_image($signature, public_path('images/chief_message'), $signatureName);
        }

        $data = array(
            'title' => $request->title,
            'message' => $request->message,
            'name' => $request->name,
            'designation' => $request->designation,
            'photo' => $photoName,
            'signature' => $signatureName
        );

        DB::table('chief_executive_message')->insert($data);
        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $data = DB::table('chief_executive_message')->get();
        return view('admin.chief_message.index', compact('data'));
    }

    // Destroy
    public function destroy($id)
    {
        $item = DB::table('chief_executive_message')->where('id', $id)->first();
        $oldPhotoName = public_path('images/chief_message/' . $item->photo);
        $oldSignatureName = public_path('images/chief_message/' . $item->signature);

        if (file_exists($oldPhotoName)) {
            @unlink($oldPhotoName);
        }
        if (file_exists($oldSignatureName)) {
            @unlink($oldSignatureName);
        }
        DB::table('chief_executive_message')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    // Edit
    public function edit($id)
    {
        $data = DB::table('chief_executive_message')->where('id', $id)->first();
        return view('admin.chief_message.edit', compact('data'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'message' => 'required',
            'name' => 'required',
            'designation' => 'required',
        ]);

        $item = DB::table('chief_executive_message')->where('id', $id)->first();

        $photoName = '';
        $oldPhotoName = public_path('images/chief_message/' . $item->photo);

        if ($photo = $request->file('photo')) {
            if (file_exists($oldPhotoName)) {
                @unlink($oldPhotoName);
            }
            $photoName = rand(10000, 99999) . "chief." . $photo->getClientOriginalExtension();
            compress_and_save_image($photo, public_path('images/chief_message'), $photoName);
        } else {
            $photoName = $item->photo;
        }

        $signatureName = '';
        $oldSignatureName = public_path('images/chief_message/' . $item->signature);

        if ($signature = $request->file('signature')) {
            if (file_exists($oldSignatureName)) {
                @unlink($oldSignatureName);
            }
            $signatureName = rand(10000, 99999) . "signature." . $signature->getClientOriginalExtension();
            compress_and_save_image($signature, public_path('images/chief_message'), $signatureName);
        } else {
            $signatureName = $item->signature;
        }

        $data = array(
            'title' => $request->title,
            'message' => $request->message,
            'name' => $request->name,
            'designation' => $request->designation,
            'photo' => $photoName,
            'signature' => $signatureName
        );

        DB::table('chief_executive_message')->where('id', $id)->update($data);
        return redirect()->back()->with('update', 'Successfully Updated');
    }
}
