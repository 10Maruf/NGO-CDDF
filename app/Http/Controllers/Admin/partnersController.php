<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class partnersController extends Controller
{
    //__create__//
    public function create(){
        return view('admin.partners.add');
    }

    //__store__//
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpg,png,gif,jpeg',
        ]);

        $partnerImg = '';
        if($image = $request->file('image')){
            $partnerImg = rand(10000,99999). 'partner_donor.' . $image->getClientOriginalExtension();
            compress_and_save_image($image, public_path('images/partner'), $partnerImg);
        }

        $partner = [
            'name' => $request->name,
            'image' => $partnerImg
        ];

        DB::table('partners')->insert($partner);
        return redirect()->back()->with('success','Successfully Inserted Partner/Donor');
    }

    //__index__//
    public function index(){
        $partner = DB::table('partners')->orderBy('id', 'desc')->get();
        return view('admin.partners.index',compact('partner'));
    }

    //__Delete__//
    public function destroy($id){

        $partner = DB::table('partners')->where('id',$id)->first();

        $oldPartner = public_path('images/partner/'.$partner->image);

        if(file_exists($oldPartner)){
            @unlink($oldPartner);
        }

        DB::table('partners')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted Partner/Donor');
    }

    //__Edit__//
    public function edit($id){
        $partner = DB::table('partners')->where('id', $id)->first();
        return view('admin.partners.edit',compact('partner'));
    }

    //Update//
    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $partner_donor = DB::table('partners')->where('id',$id)->first();

        $imageName = '';
        $oldImage = public_path('images/partner/'. $partner_donor->image);

        if($image = $request->file('image')){
            if(file_exists($oldImage)){
                @unlink($oldImage);
            }
            $imageName = rand(10000,99999) . 'partner_donor' . $image->getClientOriginalExtension();
            compress_and_save_image($image, public_path('images/partner'), $imageName);
        }
        else{
            $imageName = $partner_donor->image;
        }

        $updatedPartner = [
            'name' => $request->name,
            'image' => $imageName
        ];

        DB::table('partners')->where('id',$id)->update($updatedPartner);
        return redirect()->back()->with('success','success');


    }

    // Bulk Delete
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (!empty($ids)) {
            $partners = DB::table('partners')->whereIn('id', $ids)->get();
            foreach ($partners as $partner) {
                if (!empty($partner->image)) {
                    $old = public_path('images/partner/' . $partner->image);
                    if (file_exists($old)) @unlink($old);
                }
            }
            DB::table('partners')->whereIn('id', $ids)->delete();
        }
        return response()->json(['success' => true]);
    }


}
