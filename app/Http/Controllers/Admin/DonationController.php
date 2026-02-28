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

    // Delete donation
    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();
        
        return redirect()->back()->with('success', 'Donation deleted successfully!');
    }
}
