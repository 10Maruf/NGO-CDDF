<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    // add
    public function add()
    {
        return view('admin.faq.add');
    }

    // Store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'order' => 'nullable|integer',
        ]);

        $data = array(
            'question' => $request->question,
            'answer' => $request->answer,
            'category' => $request->category,
            'order' => $request->order ?? 0
        );

        DB::table('faq')->insert($data);
        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $data = DB::table('faq')->orderBy('order', 'asc')->get();
        return view('admin.faq.index', compact('data'));
    }

    // Destroy
    public function destroy($id)
    {
        DB::table('faq')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    // Edit
    public function edit($id)
    {
        $data = DB::table('faq')->where('id', $id)->first();
        return view('admin.faq.edit', compact('data'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'order' => 'nullable|integer',
        ]);

        $data = array(
            'question' => $request->question,
            'answer' => $request->answer,
            'category' => $request->category,
            'order' => $request->order ?? 0
        );

        DB::table('faq')->where('id', $id)->update($data);
        return redirect()->back()->with('update', 'Successfully Updated');
    }

    // Bulk Delete
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['error' => 'No items selected'], 400);
        }
        DB::table('faq')->whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }
}
