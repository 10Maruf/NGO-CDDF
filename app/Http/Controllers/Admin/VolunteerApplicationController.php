<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VolunteerApplication;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class VolunteerApplicationController extends Controller
{
    private $photoFolder = 'images/volunteers';

    // Index — all applications
    public function index()
    {
        $data = VolunteerApplication::orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.volunteer_applications.index', compact('data'));
    }

    // Add form (admin manual entry)
    public function add()
    {
        return view('admin.volunteer_applications.add');
    }

    // Store (admin manual entry)
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $photoName = null;
        if ($photo = $request->file('photo')) {
            $photoName = rand(10000, 99999) . 'vol.' . $photo->getClientOriginalExtension();
            $photo->move(public_path($this->photoFolder), $photoName);
        }

        // New items should appear at the top
        VolunteerApplication::query()->increment('sort_order');

        VolunteerApplication::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'photo'   => $photoName,
            'address' => $request->address,
            'skills'  => $request->skills,
            'message' => $request->message,
            'status'  => $request->status ?? 'pending',
            'sort_order' => 1,
        ]);

        return redirect()->route('admin.volunteer_applications.index')
                         ->with('success', 'Volunteer added successfully');
    }

    // Show details
    public function show($id)
    {
        $data = VolunteerApplication::findOrFail($id);
        return view('admin.volunteer_applications.show', compact('data'));
    }

    // Edit form
    public function edit($id)
    {
        $data = VolunteerApplication::findOrFail($id);
        return view('admin.volunteer_applications.edit', compact('data'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $record = VolunteerApplication::findOrFail($id);
        $photoName = $record->photo;

        if ($photo = $request->file('photo')) {
            if ($photoName && file_exists(public_path($this->photoFolder . '/' . $photoName))) {
                unlink(public_path($this->photoFolder . '/' . $photoName));
            }
            $photoName = rand(10000, 99999) . 'vol.' . $photo->getClientOriginalExtension();
            $photo->move(public_path($this->photoFolder), $photoName);
        }

        $record->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'photo'   => $photoName,
            'address' => $request->address,
            'skills'  => $request->skills,
            'message' => $request->message,
            'status'  => $request->status ?? $record->status,
        ]);

        return redirect()->back()->with('update', 'Volunteer updated successfully');
    }

    // Update Status only (from show page quick-action)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $vol = VolunteerApplication::findOrFail($id);
        $vol->update(['status' => $request->status]);

        NotificationService::volunteerStatusUpdated($vol->name, $request->status);

        return redirect()->back()->with('update', 'Status updated successfully');
    }

    // Destroy
    public function destroy($id)
    {
        $record = VolunteerApplication::findOrFail($id);

        if ($record->photo && file_exists(public_path($this->photoFolder . '/' . $record->photo))) {
            unlink(public_path($this->photoFolder . '/' . $record->photo));
        }

        $record->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

    // Bulk Delete
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['error' => 'No items selected'], 400);
        }

        $items = VolunteerApplication::whereIn('id', $ids)->get();
        foreach ($items as $item) {
            if ($item->photo && file_exists(public_path($this->photoFolder . '/' . $item->photo))) {
                @unlink(public_path($this->photoFolder . '/' . $item->photo));
            }
        }

        VolunteerApplication::whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }

    // Bulk Status Update
    public function bulkStatus(Request $request)
    {
        $ids = $request->input('ids', []);
        $status = $request->input('status');
        if (empty($ids) || !in_array($status, ['pending', 'approved', 'rejected'])) {
            return response()->json(['error' => 'Invalid request'], 400);
        }

        VolunteerApplication::whereIn('id', $ids)->update(['status' => $status]);
        return response()->json(['success' => true]);
    }

    public function updateOrder(Request $request)
    {
        $orders = $request->order;

        if ($orders && is_array($orders)) {
            foreach ($orders as $index => $id) {
                VolunteerApplication::where('id', $id)->update(['sort_order' => $index + 1]);
            }
            return response()->json(['status' => 'success', 'message' => 'Order updated successfully.']);
        }

        return response()->json(['status' => 'error', 'message' => 'Invalid order data.'], 400);
    }
}

