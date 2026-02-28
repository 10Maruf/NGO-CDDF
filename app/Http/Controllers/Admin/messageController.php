<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class messageController extends Controller
{
    //__ index__//
    public function index(){
        $message = DB::table('messages')->get();
        return view('admin.message.index',compact('message'));
    }

    //__ Destroy__//
    public function destroy($id){
        DB::table('messages')->where('id',$id)->delete();
        return redirect()->back()->with('success','Successfully Deleted The Message');
    }

    //__View__//
    public function view($id){
        $message = DB::table('messages')->where('id',$id)->first();
        if (!$message) {
            return redirect()->route('message.index')->with('error', 'Message not found.');
        }
        return view('admin.message.view',compact('message'));
    }

    // Bulk Delete
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (!empty($ids)) {
            DB::table('messages')->whereIn('id', $ids)->delete();
        }
        return response()->json(['success' => true]);
    }
}
