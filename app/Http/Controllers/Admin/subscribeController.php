<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class subscribeController extends Controller
{
    // index
    public function index(){
        $subscribe = DB::table('subscribe')->get();
        return view('admin.subscribe.all',compact('subscribe'));
    }

    public function destroy($id){
        DB::table('subscribe')->where('id',$id)
                              ->delete();
        return redirect()->back()->with('success','Successfully Deleted Subscription');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;
        if (!empty($ids)) {
            DB::table('subscribe')->whereIn('id', $ids)->delete();
        }
        return response()->json(['success' => 'Subscribers deleted successfully.']);
    }

}
