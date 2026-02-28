<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Flysystem\File;

class sliderController extends Controller
{
    // Insert
    public function add(){
        return view('admin.slider.add');
    }

    // Store
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);

        $imageName = '';
        if($image = $request->file('image')){
            $imageName = rand(1000000, 9999999)."slider.".$image->getClientOriginalExtension();
            $image->move(public_path('images/slider'),$imageName);
        }

        $slider = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'order' => $request->order ?? 0,
        );

        DB::table('slider')->insert($slider);
        return redirect()->back()->with('success','Successfully inserted data');
    }

    // index
    public function index(){
        $slider = DB::table('slider')->orderBy('order', 'asc')->get();
        return view('admin.slider.index',compact('slider'));
    }

    // Destroy
    public function destroy($id){
        $slider = DB::table('slider')->where('id',$id)->first();

        $delOldImage = public_path('images/slider/' . $slider->image);

        if (file_exists($delOldImage)){
            @unlink($delOldImage);
        }
        DB::table('slider')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted data');
    }

    // Edit
    public function edit($id){
        $slider = DB::table('slider')->where('id',$id)->first();
        return view('admin.slider.edit',compact('slider'));
    }

    // Update
    public function update(Request $request, $id){
        $slider = DB::table('slider')->where('id', $id)->first();
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $imageName = '';
        $delOldImage = public_path('images/slider/' . $slider->image);

        if($image = $request->file('image')){
            if(file_exists($delOldImage)){
                @unlink($delOldImage);
            }
            $imageName = rand(1000000, 9999999) . "slider." . $image->getClientOriginalExtension();
            $image->move(public_path('images/slider'), $imageName);
        }
        else{
            $imageName = $slider->image;
        }

        $slider = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'order' => $request->order ?? 0,
        );

        DB::table('slider')->where('id',$id)->update($slider);
        return redirect()->back()->with('success', 'Successfully Updated data');
    }

    // Toggle Status
    public function toggleStatus($id)
    {
        $slider = DB::table('slider')->where('id', $id)->first();
        if ($slider) {
            $newStatus = $slider->status ? 0 : 1;
            DB::table('slider')->where('id', $id)->update(['status' => $newStatus]);
        }
        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    // Bulk Delete
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');
        if ($ids) {
            foreach ($ids as $id) {
                $slider = DB::table('slider')->where('id', $id)->first();
                if ($slider && $slider->image) {
                     $delOldImage = public_path('images/slider/' . $slider->image);
                    if (file_exists($delOldImage)){
                        @unlink($delOldImage);
                    }
                }
                DB::table('slider')->where('id', $id)->delete();
            }
            return response()->json(['success' => 'Selected sliders deleted successfully.']);
        }
        return response()->json(['error' => 'No items selected.'], 400);
    }

    // Bulk Status Update
    public function bulkStatus(Request $request)
    {
        $ids = $request->input('ids');
        $status = $request->input('status');

        if ($ids) {
            DB::table('slider')->whereIn('id', $ids)->update(['status' => $status]);
            return response()->json(['success' => 'Status updated successfully.']);
        }
        return response()->json(['error' => 'No items selected.'], 400);
    }
}
