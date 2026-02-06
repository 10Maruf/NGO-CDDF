<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class missionController extends Controller
{
    //__Create__//
    public function create(){
        $mission = DB::table('mission_vision')->first();
        return view('admin.mission.create',compact('mission'));
    }

    //__Store__//
    public function store(Request $request){
        $validatedData = $request->validate([
            'vision' => 'required',
            'mission' => 'required',
            'values' => 'required',
        ]);

        $matchThese = ['id' => 1];
        DB::table('mission_vision')->updateOrInsert($matchThese, [
            'vision' => $request->vision,
            'mission' => $request->mission,
            'values' => $request->values,
        ]);
        
        return redirect()->back()->with('success','Successfully saved Mission, Vision and Values');
    }
}
