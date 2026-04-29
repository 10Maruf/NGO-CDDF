<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\NotificationService;
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

        // New items should appear at the top
        DB::table('publications')->increment('sort_order');

        $publication = [
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $thumbnailName,
            'pdf_file' => $pdfFileName,
            'sort_order' => 1,
        ];

        DB::table('publications')->insert($publication);

        NotificationService::newPublication($request->title);

        return redirect()->back()->with('success', 'Publication added successfully');
    }

    // Index - List all publications
    public function index()
    {
        $publications = DB::table('publications')
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();
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

    // Bulk Delete
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (!empty($ids)) {
            $items = DB::table('publications')->whereIn('id', $ids)->get();
            foreach ($items as $item) {
                if (!empty($item->thumbnail)) {
                    $old = public_path('images/publications/thumbnails/' . $item->thumbnail);
                    if (file_exists($old)) @unlink($old);
                }
                if (!empty($item->pdf_file)) {
                    $old = public_path('images/publications/pdfs/' . $item->pdf_file);
                    if (file_exists($old)) @unlink($old);
                }
            }
            DB::table('publications')->whereIn('id', $ids)->delete();
        }
        return response()->json(['success' => true]);
    }

    public function updateOrder(Request $request)
    {
        $orders = $request->order;

        if ($orders && is_array($orders)) {
            foreach ($orders as $index => $id) {
                DB::table('publications')->where('id', $id)->update(['sort_order' => $index + 1]);
            }
            return response()->json(['status' => 'success', 'message' => 'Order updated successfully.']);
        }

        return response()->json(['status' => 'error', 'message' => 'Invalid order data.'], 400);
    }
}