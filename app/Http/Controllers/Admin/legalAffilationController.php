<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class legalAffilationController extends Controller
{
    // Add
    public function create()
    {
        return view('admin.legal_affilation.add');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|mimes:jpg,png,jpeg,gif|max:2048',
            'pdf_file'  => 'nullable|mimes:pdf|max:10240',
        ]);

        $thumbnailName = '';
        if ($thumbnail = $request->file('thumbnail')) {
            $thumbnailName = rand(10000, 99999) . 'legal_affilation_thumbnail.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('images/legal_affilation/thumbnails/'), $thumbnailName);
        }

        $pdfFileName = '';
        if ($pdfFile = $request->file('pdf_file')) {
            $pdfFileName = rand(10000, 99999) . 'legal_affilation.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('images/legal_affilation/pdfs/'), $pdfFileName);
        }

        DB::table('legal_affilation')->insert([
            'title'       => $request->title,
            'description' => $request->description,
            'thumbnail'   => $thumbnailName,
            'pdf_file'    => $pdfFileName,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return redirect()->back()->with('success', 'Legal Affiliation added successfully');
    }

    // Index
    public function index()
    {
        $items = DB::table('legal_affilation')->orderBy('created_at', 'desc')->get();
        return view('admin.legal_affilation.index', compact('items'));
    }

    // Edit
    public function edit($id)
    {
        $item = DB::table('legal_affilation')->where('id', $id)->first();
        return view('admin.legal_affilation.edit', compact('item'));
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

        $existing = DB::table('legal_affilation')->where('id', $id)->first();

        $thumbnailName = $existing->thumbnail;
        if ($thumbnail = $request->file('thumbnail')) {
            if (!empty($existing->thumbnail)) {
                $old = public_path('images/legal_affilation/thumbnails/' . $existing->thumbnail);
                if (file_exists($old)) @unlink($old);
            }
            $thumbnailName = rand(10000, 99999) . 'legal_affilation_thumbnail.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('images/legal_affilation/thumbnails/'), $thumbnailName);
        }

        $pdfFileName = $existing->pdf_file;
        if ($pdfFile = $request->file('pdf_file')) {
            if (!empty($existing->pdf_file)) {
                $old = public_path('images/legal_affilation/pdfs/' . $existing->pdf_file);
                if (file_exists($old)) @unlink($old);
            }
            $pdfFileName = rand(10000, 99999) . 'legal_affilation.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('images/legal_affilation/pdfs/'), $pdfFileName);
        }

        DB::table('legal_affilation')->where('id', $id)->update([
            'title'       => $request->title,
            'description' => $request->description,
            'thumbnail'   => $thumbnailName,
            'pdf_file'    => $pdfFileName,
            'updated_at'  => now(),
        ]);

        return redirect()->route('origin.legal_affilation.index')->with('success', 'Legal Affiliation updated successfully');
    }

    // Delete
    public function destroy($id)
    {
        $existing = DB::table('legal_affilation')->where('id', $id)->first();

        if (!empty($existing->thumbnail)) {
            $old = public_path('images/legal_affilation/thumbnails/' . $existing->thumbnail);
            if (file_exists($old)) @unlink($old);
        }
        if (!empty($existing->pdf_file)) {
            $old = public_path('images/legal_affilation/pdfs/' . $existing->pdf_file);
            if (file_exists($old)) @unlink($old);
        }

        DB::table('legal_affilation')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Legal Affiliation deleted successfully');
    }
}
