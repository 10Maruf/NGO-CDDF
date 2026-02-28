<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CareerController extends Controller
{
    // Add
    public function add()
    {
        return view('admin.careers.add');
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
            $thumbnailName = rand(10000, 99999) . 'career_thumbnail.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('images/careers/thumbnails/'), $thumbnailName);
        }

        $pdfFileName = '';
        if ($pdfFile = $request->file('pdf_file')) {
            $pdfFileName = rand(10000, 99999) . 'career.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('images/careers/pdfs/'), $pdfFileName);
        }

        DB::table('careers')->insert([
            'title'       => $request->title,
            'description' => $request->description,
            'thumbnail'   => $thumbnailName,
            'pdf_file'    => $pdfFileName,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        NotificationService::newCareer($request->title);

        return redirect()->back()->with('success', 'Career added successfully');
    }

    // Index
    public function index()
    {
        $careers = DB::table('careers')->orderBy('created_at', 'desc')->get();
        return view('admin.careers.index', compact('careers'));
    }

    // Edit
    public function edit($id)
    {
        $career = DB::table('careers')->where('id', $id)->first();
        return view('admin.careers.edit', compact('career'));
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

        $career = DB::table('careers')->where('id', $id)->first();

        $thumbnailName = $career->thumbnail;
        if ($thumbnail = $request->file('thumbnail')) {
            if (!empty($career->thumbnail)) {
                $old = public_path('images/careers/thumbnails/' . $career->thumbnail);
                if (file_exists($old)) @unlink($old);
            }
            $thumbnailName = rand(10000, 99999) . 'career_thumbnail.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('images/careers/thumbnails/'), $thumbnailName);
        }

        $pdfFileName = $career->pdf_file;
        if ($pdfFile = $request->file('pdf_file')) {
            if (!empty($career->pdf_file)) {
                $old = public_path('images/careers/pdfs/' . $career->pdf_file);
                if (file_exists($old)) @unlink($old);
            }
            $pdfFileName = rand(10000, 99999) . 'career.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('images/careers/pdfs/'), $pdfFileName);
        }

        DB::table('careers')->where('id', $id)->update([
            'title'       => $request->title,
            'description' => $request->description,
            'thumbnail'   => $thumbnailName,
            'pdf_file'    => $pdfFileName,
            'updated_at'  => now(),
        ]);

        return redirect()->route('careers.index')->with('success', 'Career updated successfully');
    }

    // Delete
    public function destroy($id)
    {
        $career = DB::table('careers')->where('id', $id)->first();

        if (!empty($career->thumbnail)) {
            $old = public_path('images/careers/thumbnails/' . $career->thumbnail);
            if (file_exists($old)) @unlink($old);
        }
        if (!empty($career->pdf_file)) {
            $old = public_path('images/careers/pdfs/' . $career->pdf_file);
            if (file_exists($old)) @unlink($old);
        }

        DB::table('careers')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Career deleted successfully');
    }

    // Bulk Delete
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (!empty($ids)) {
            $items = DB::table('careers')->whereIn('id', $ids)->get();
            foreach ($items as $item) {
                if (!empty($item->thumbnail)) {
                    $old = public_path('images/careers/thumbnails/' . $item->thumbnail);
                    if (file_exists($old)) @unlink($old);
                }
                if (!empty($item->pdf_file)) {
                    $old = public_path('images/careers/pdfs/' . $item->pdf_file);
                    if (file_exists($old)) @unlink($old);
                }
            }
            DB::table('careers')->whereIn('id', $ids)->delete();
        }
        return response()->json(['success' => true]);
    }
}
