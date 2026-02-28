<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrgMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrgMemberController extends Controller
{
    private $photoFolder = 'images/org_members';

    // Add form
    public function add()
    {
        $orgTypes = OrgMember::$orgTypes;
        return view('admin.org_members.add', compact('orgTypes'));
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'org_type'    => 'required',
            'name'        => 'required',
            'designation' => 'required',
            'photo'       => 'nullable|mimes:jpg,png,jpeg,gif',
            'order'       => 'nullable|integer',
        ]);

        $photoName = null;
        if ($photo = $request->file('photo')) {
            $photoName = rand(10000, 99999) . 'org.' . $photo->getClientOriginalExtension();
            $photo->move(public_path($this->photoFolder), $photoName);
        }

        DB::table('org_members')->insert([
            'org_type'    => $request->org_type,
            'name'        => $request->name,
            'designation' => $request->designation,
            'bio'         => $request->bio,
            'photo'       => $photoName,
            'facebook'    => $request->facebook,
            'twitter'     => $request->twitter,
            'instagram'   => $request->instagram,
            'youtube'     => $request->youtube,
            'linkedin'    => $request->linkedin,
            'contact_number' => $request->contact_number,
            'email'       => $request->email,
            'message'     => $request->message,
            'joining_date'=> $request->joining_date ?: null,
            'education'   => $request->education,
            'experience_years' => $request->experience_years ?: null,
            'order'       => $request->order ?? 0,
            'is_active'   => $request->has('is_active') ? 1 : 0,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return redirect()->back()->with('success', 'Member added successfully!');
    }

    // Index (all members, filterable by org_type)
    public function index(Request $request)
    {
        $orgTypes = OrgMember::$orgTypes;
        $filterType = $request->get('type', '');

        $query = DB::table('org_members');
        if ($filterType) {
            $query->where('org_type', $filterType);
        }
        $data = $query->orderBy('org_type')->orderBy('order')->get();

        return view('admin.org_members.index', compact('data', 'orgTypes', 'filterType'));
    }

    // Edit form
    public function edit($id)
    {
        $orgTypes = OrgMember::$orgTypes;
        $data = DB::table('org_members')->where('id', $id)->first();
        if (!$data) abort(404);
        return view('admin.org_members.edit', compact('data', 'orgTypes'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'org_type'    => 'required',
            'name'        => 'required',
            'designation' => 'required',
            'photo'       => 'nullable|mimes:jpg,png,jpeg,gif',
            'order'       => 'nullable|integer',
        ]);

        $item = DB::table('org_members')->where('id', $id)->first();
        if (!$item) abort(404);

        $photoName = $item->photo;
        if ($photo = $request->file('photo')) {
            // Delete old photo
            $oldPath = public_path($this->photoFolder . '/' . $item->photo);
            if ($item->photo && file_exists($oldPath)) {
                @unlink($oldPath);
            }
            $photoName = rand(10000, 99999) . 'org.' . $photo->getClientOriginalExtension();
            $photo->move(public_path($this->photoFolder), $photoName);
        }

        DB::table('org_members')->where('id', $id)->update([
            'org_type'    => $request->org_type,
            'name'        => $request->name,
            'designation' => $request->designation,
            'bio'         => $request->bio,
            'photo'       => $photoName,
            'facebook'    => $request->facebook,
            'twitter'     => $request->twitter,
            'instagram'   => $request->instagram,
            'youtube'     => $request->youtube,
            'linkedin'    => $request->linkedin,
            'contact_number' => $request->contact_number,
            'email'       => $request->email,
            'message'     => $request->message,
            'joining_date'=> $request->joining_date ?: null,
            'education'   => $request->education,
            'experience_years' => $request->experience_years ?: null,
            'order'       => $request->order ?? 0,
            'is_active'   => $request->has('is_active') ? 1 : 0,
            'updated_at'  => now(),
        ]);

        return redirect()->back()->with('update', 'Member updated successfully!');
    }

    // Destroy
    public function destroy($id)
    {
        $item = DB::table('org_members')->where('id', $id)->first();
        if (!$item) abort(404);

        $oldPath = public_path($this->photoFolder . '/' . $item->photo);
        if ($item->photo && file_exists($oldPath)) {
            @unlink($oldPath);
        }

        DB::table('org_members')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Member deleted successfully!');
    }

    // Toggle Status
    public function toggleStatus($id)
    {
        $item = DB::table('org_members')->where('id', $id)->first();
        if (!$item) abort(404);

        DB::table('org_members')->where('id', $id)->update([
            'is_active' => !$item->is_active,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    // Bulk Delete
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['error' => 'No items selected'], 400);
        }

        $items = DB::table('org_members')->whereIn('id', $ids)->get();
        foreach ($items as $item) {
            if ($item->photo) {
                $oldPath = public_path($this->photoFolder . '/' . $item->photo);
                if (file_exists($oldPath)) @unlink($oldPath);
            }
        }

        DB::table('org_members')->whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }

    // Bulk Status Update
    public function bulkStatus(Request $request)
    {
        $ids = $request->input('ids', []);
        $status = $request->input('status');
        if (empty($ids)) {
            return response()->json(['error' => 'No items selected'], 400);
        }

        DB::table('org_members')->whereIn('id', $ids)->update([
            'is_active' => (int) $status,
            'updated_at' => now(),
        ]);
        return response()->json(['success' => true]);
    }
}
