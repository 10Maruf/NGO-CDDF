<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class policyController extends Controller
{
    // Add
    public function create()
    {
        return view('admin.policy_guideline.add');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail'   => 'nullable|mimes:jpg,png,jpeg,gif|max:2048',
            'pdf_file'    => 'nullable|mimes:pdf|max:10240',
        ]);

        $thumbnailName = '';
        if ($thumbnail = $request->file('thumbnail')) {
            $thumbnailName = rand(10000, 99999) . 'policy_thumbnail.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('images/policy_guideline/thumbnails/'), $thumbnailName);
        }

        $pdfFileName = '';
        if ($pdfFile = $request->file('pdf_file')) {
            $pdfFileName = rand(10000, 99999) . 'policy_guideline.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('images/policy_guideline/pdfs/'), $pdfFileName);
        }

        DB::table('policy_guideline')->insert([
            'title'       => $request->title,
            'description' => $request->description,
            'thumbnail'   => $thumbnailName,
            'pdf_file'    => $pdfFileName,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return redirect()->back()->with('success', 'Policy & Guideline added successfully');
    }

    // Index
    public function index()
    {
        $items = DB::table('policy_guideline')->orderBy('created_at', 'desc')->get();
        return view('admin.policy_guideline.index', compact('items'));
    }

    // Edit
    public function edit($id)
    {
        $item = DB::table('policy_guideline')->where('id', $id)->first();
        return view('admin.policy_guideline.edit', compact('item'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail'   => 'nullable|mimes:jpg,png,jpeg,gif|max:2048',
            'pdf_file'    => 'nullable|mimes:pdf|max:10240',
        ]);

        $existing = DB::table('policy_guideline')->where('id', $id)->first();

        $thumbnailName = $existing->thumbnail;
        if ($thumbnail = $request->file('thumbnail')) {
            if (!empty($existing->thumbnail)) {
                $old = public_path('images/policy_guideline/thumbnails/' . $existing->thumbnail);
                if (file_exists($old)) @unlink($old);
            }
            $thumbnailName = rand(10000, 99999) . 'policy_thumbnail.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('images/policy_guideline/thumbnails/'), $thumbnailName);
        }

        $pdfFileName = $existing->pdf_file;
        if ($pdfFile = $request->file('pdf_file')) {
            if (!empty($existing->pdf_file)) {
                $old = public_path('images/policy_guideline/pdfs/' . $existing->pdf_file);
                if (file_exists($old)) @unlink($old);
            }
            $pdfFileName = rand(10000, 99999) . 'policy_guideline.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('images/policy_guideline/pdfs/'), $pdfFileName);
        }

        DB::table('policy_guideline')->where('id', $id)->update([
            'title'       => $request->title,
            'description' => $request->description,
            'thumbnail'   => $thumbnailName,
            'pdf_file'    => $pdfFileName,
            'updated_at'  => now(),
        ]);

        return redirect()->route('policy.index')->with('success', 'Policy & Guideline updated successfully');
    }

    // Delete
    public function destroy($id)
    {
        $existing = DB::table('policy_guideline')->where('id', $id)->first();

        if (!empty($existing->thumbnail)) {
            $old = public_path('images/policy_guideline/thumbnails/' . $existing->thumbnail);
            if (file_exists($old)) @unlink($old);
        }
        if (!empty($existing->pdf_file)) {
            $old = public_path('images/policy_guideline/pdfs/' . $existing->pdf_file);
            if (file_exists($old)) @unlink($old);
        }

        DB::table('policy_guideline')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Policy & Guideline deleted successfully');
    }
}
