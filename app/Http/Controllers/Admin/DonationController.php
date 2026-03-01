<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\PaymentMethod;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    // Index - Show all donations
    public function index(Request $request)
    {
        $query = Donation::with('paymentMethod');

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Filter by date
        if ($request->has('date') && $request->date != '') {
            $query->whereDate('created_at', $request->date);
        }

        $data = $query->latest()->paginate(20);
        
        return view('admin.donations.index', compact('data'));
    }

    // Show single donation
    public function show($id)
    {
        $data = Donation::with('paymentMethod')->findOrFail($id);
        return view('admin.donations.show', compact('data'));
    }

    // Verify donation
    public function verify(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);
        $donation->update([
            'status' => 'verified',
            'admin_note' => $request->admin_note
        ]);

        NotificationService::donationVerified($donation->donor_name, $donation->amount);
        
        return redirect()->back()->with('success', 'Donation verified successfully!');
    }

    // Reject donation
    public function reject(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);
        $donation->update([
            'status' => 'rejected',
            'admin_note' => $request->admin_note
        ]);

        NotificationService::donationRejected($donation->donor_name, $donation->amount);
        
        return redirect()->back()->with('success', 'Donation rejected!');
    }

    // Change Status (any → any)
    public function changeStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,verified,rejected',
        ]);

        $donation = Donation::findOrFail($id);
        $oldStatus = $donation->status;
        $donation->update([
            'status'     => $request->status,
            'admin_note' => $request->admin_note,
        ]);

        if ($request->status === 'verified' && $oldStatus !== 'verified') {
            NotificationService::donationVerified($donation->donor_name, $donation->amount);
        } elseif ($request->status === 'rejected' && $oldStatus !== 'rejected') {
            NotificationService::donationRejected($donation->donor_name, $donation->amount);
        }

        return redirect()->back()->with('success', 'Donation status updated to ' . ucfirst($request->status) . '!');
    }

    // Delete donation
    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();
        
        return redirect()->back()->with('success', 'Donation deleted successfully!');
    }

    // Bulk Delete
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json(['error' => 'No items selected'], 400);
        }
        Donation::whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }

    // Bulk Status Update (verify / reject)
    public function bulkStatus(Request $request)
    {
        $ids = $request->input('ids', []);
        $status = $request->input('status'); // 'verified' or 'rejected'
        if (empty($ids) || !in_array($status, ['verified', 'rejected', 'pending'])) {
            return response()->json(['error' => 'Invalid request'], 400);
        }
        Donation::whereIn('id', $ids)->update(['status' => $status]);
        return response()->json(['success' => true]);
    }
}
