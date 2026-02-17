<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VolunteerRegistrationController extends Controller
{
    // Display all volunteer registrations
    public function index(Request $request)
    {
        $query = DB::table('volunteer_registrations');

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $data = $query->orderBy('created_at', 'desc')->paginate(20);
        
        return view('admin.volunteer_registrations.index', compact('data'));
    }

    // Show single registration
    public function show($id)
    {
        $data = DB::table('volunteer_registrations')->where('id', $id)->first();
        
        if (!$data) {
            return redirect()->route('admin.volunteer_registrations.index')->with('error', 'Registration not found!');
        }
        
        return view('admin.volunteer_registrations.show', compact('data'));
    }

    // Approve registration
    public function approve($id)
    {
        DB::table('volunteer_registrations')
            ->where('id', $id)
            ->update([
                'status' => 'approved',
                'updated_at' => now()
            ]);
        
        return redirect()->back()->with('success', 'Registration approved successfully!');
    }

    // Reject registration
    public function reject($id)
    {
        DB::table('volunteer_registrations')
            ->where('id', $id)
            ->update([
                'status' => 'rejected',
                'updated_at' => now()
            ]);
        
        return redirect()->back()->with('success', 'Registration rejected!');
    }

    // Delete registration
    public function destroy($id)
    {
        DB::table('volunteer_registrations')->where('id', $id)->delete();
        
        return redirect()->back()->with('success', 'Registration deleted successfully!');
    }
}
