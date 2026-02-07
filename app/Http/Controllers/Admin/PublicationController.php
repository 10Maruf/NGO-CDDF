<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{
    // Add Publication
    public function add()
    {
        return view('admin.publications.add');
    }

    // Store Publication
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|mimes:jpg,png,jpeg,gif|max:512',
            'pdf_file' => 'nullable|mimes:pdf|max:10240',
        ]);

        $thumbnailName = '';
        if ($thumbnail = $request->file('thumbnail')) {
            $thumbnailName = rand(10000, 99999) . "publication_thumbnail." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('images/publications/thumbnails/'), $thumbnailName);
        }

        $pdfFileName = '';
        if ($pdfFile = $request->file('pdf_file')) {
            $pdfFileName = rand(10000, 99999) . "publication." . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('images/publications/pdfs/'), $pdfFileName);
        }

        $publication = [
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $thumbnailName,
            'pdf_file' => $pdfFileName
        ];

        DB::table('publications')->insert($publication);
        return redirect()->back()->with('success', 'Publication added successfully');
    }

    // Index - List all publications
    public function index()
    {
        $publications = DB::table('publications')->orderBy('created_at', 'desc')->get();
        return view('admin.publications.index', compact('publications'));
    }

    // Edit Publication
    public function edit($id)
    {
        $publication = DB::table('publications')->where('id', $id)->first();
        return view('admin.publications.edit', compact('publication'));
    }

    // Update Publication
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|mimes:jpg,png,jpeg,gif|max:512',
            'pdf_file' => 'nullable|mimes:pdf|max:10240',
        ]);

        $publication = DB::table('publications')->where('id', $id)->first();

        $thumbnailName = $publication->thumbnail;
        if ($thumbnail = $request->file('thumbnail')) {
            // Delete old thumbnail if exists
            $oldThumbnail = public_path('images/publications/thumbnails/' . $publication->thumbnail);
            if (file_exists($oldThumbnail)) {
                @unlink($oldThumbnail);
            }

            $thumbnailName = rand(10000, 99999) . "publication_thumbnail." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('images/publications/thumbnails/'), $thumbnailName);
        }

        $pdfFileName = $publication->pdf_file;
        if ($pdfFile = $request->file('pdf_file')) {
            // Delete old PDF if exists
            $oldPdf = public_path('images/publications/pdfs/' . $publication->pdf_file);
            if (file_exists($oldPdf)) {
                @unlink($oldPdf);
            }

            $pdfFileName = rand(10000, 99999) . "publication." . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('images/publications/pdfs/'), $pdfFileName);
        }

        $updateData = [
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $thumbnailName,
            'pdf_file' => $pdfFileName
        ];

        DB::table('publications')->where('id', $id)->update($updateData);
        return redirect()->route('publications.index')->with('success', 'Publication updated successfully');
    }

    // Delete Publication
    public function destroy($id)
    {
        $publication = DB::table('publications')->where('id', $id)->first();

        // Delete thumbnail file if exists
        $oldThumbnail = public_path('images/publications/thumbnails/' . $publication->thumbnail);
        if (file_exists($oldThumbnail)) {
            @unlink($oldThumbnail);
        }

        // Delete PDF file if exists
        $oldPdf = public_path('images/publications/pdfs/' . $publication->pdf_file);
        if (file_exists($oldPdf)) {
            @unlink($oldPdf);
        }

        DB::table('publications')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Publication deleted successfully');
    }
}