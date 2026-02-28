<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StrategicPlanController extends Controller
{
    public function create()
    {
        return view('admin.strategic_plans.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10240',
        ]);

        $thumbnailName = '';
        if ($thumbnail = $request->file('thumbnail')) {
            $thumbnailName = rand(10000, 99999) . 'strategic_plan_thumbnail.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('images/strategic_plans/thumbnails/'), $thumbnailName);
        }

        $pdfFileName = '';
        if ($pdfFile = $request->file('pdf_file')) {
            $pdfFileName = rand(10000, 99999) . 'strategic_plan.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('images/strategic_plans/pdfs/'), $pdfFileName);
        }

        DB::table('strategic_plans')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $thumbnailName,
            'pdf_file' => $pdfFileName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Strategic Plan uploaded successfully');
    }

    public function index()
    {
        $strategicPlans = DB::table('strategic_plans')->orderBy('created_at', 'desc')->get();
        return view('admin.strategic_plans.index', compact('strategicPlans'));
    }

    public function edit($id)
    {
        $strategicPlan = DB::table('strategic_plans')->where('id', $id)->first();
        return view('admin.strategic_plans.edit', compact('strategicPlan'));
    }

    public function update(Request $request, $id)
    {
        $strategicPlan = DB::table('strategic_plans')->where('id', $id)->first();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10240',
        ]);

        $thumbnailName = $strategicPlan->thumbnail;
        if ($thumbnail = $request->file('thumbnail')) {
            if (!empty($strategicPlan->thumbnail)) {
                $oldThumbnail = public_path('images/strategic_plans/thumbnails/' . $strategicPlan->thumbnail);
                if (file_exists($oldThumbnail)) {
                    @unlink($oldThumbnail);
                }
            }

            $thumbnailName = rand(10000, 99999) . 'strategic_plan_thumbnail.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('images/strategic_plans/thumbnails/'), $thumbnailName);
        }

        $pdfFileName = $strategicPlan->pdf_file;
        if ($pdfFile = $request->file('pdf_file')) {
            if (!empty($strategicPlan->pdf_file)) {
                $oldPdf = public_path('images/strategic_plans/pdfs/' . $strategicPlan->pdf_file);
                if (file_exists($oldPdf)) {
                    @unlink($oldPdf);
                }
            }

            $pdfFileName = rand(10000, 99999) . 'strategic_plan.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('images/strategic_plans/pdfs/'), $pdfFileName);
        }

        DB::table('strategic_plans')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $thumbnailName,
            'pdf_file' => $pdfFileName,
            'updated_at' => now(),
        ]);

        return redirect()->route('strategic_plans.index')->with('success', 'Strategic Plan updated successfully');
    }

    public function destroy($id)
    {
        $strategicPlan = DB::table('strategic_plans')->where('id', $id)->first();

        if (!empty($strategicPlan->thumbnail)) {
            $oldThumbnail = public_path('images/strategic_plans/thumbnails/' . $strategicPlan->thumbnail);
            if (file_exists($oldThumbnail)) {
                @unlink($oldThumbnail);
            }
        }

        if (!empty($strategicPlan->pdf_file)) {
            $oldPdf = public_path('images/strategic_plans/pdfs/' . $strategicPlan->pdf_file);
            if (file_exists($oldPdf)) {
                @unlink($oldPdf);
            }
        }

        DB::table('strategic_plans')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Strategic Plan deleted successfully');
    }

    // Bulk Delete
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (!empty($ids)) {
            $items = DB::table('strategic_plans')->whereIn('id', $ids)->get();
            foreach ($items as $item) {
                if (!empty($item->thumbnail)) {
                    $old = public_path('images/strategic_plans/thumbnails/' . $item->thumbnail);
                    if (file_exists($old)) @unlink($old);
                }
                if (!empty($item->pdf_file)) {
                    $old = public_path('images/strategic_plans/pdfs/' . $item->pdf_file);
                    if (file_exists($old)) @unlink($old);
                }
            }
            DB::table('strategic_plans')->whereIn('id', $ids)->delete();
        }
        return response()->json(['success' => true]);
    }
}
