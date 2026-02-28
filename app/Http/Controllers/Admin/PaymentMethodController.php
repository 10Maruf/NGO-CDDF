<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentMethodController extends Controller
{
    // Index - Show all payment methods
    public function index()
    {
        $data = PaymentMethod::orderBy('display_order', 'asc')->get();
        return view('admin.payment_methods.index', compact('data'));
    }

    // Add - Show form
    public function add()
    {
        return view('admin.payment_methods.add');
    }

    // Store - Save new payment method
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'type' => 'required|string|max:50',
                'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'account_name' => 'required|string|max:255',
                'account_number' => 'required|string|max:255',
                'bank_name' => 'nullable|string|max:255',
                'branch_name' => 'nullable|string|max:255',
                'routing_number' => 'nullable|string|max:255',
                'display_order' => 'nullable|integer',
            ]);

            $iconPath = null;
            if ($request->hasFile('icon_image')) {
                $iconPath = $request->file('icon_image')->store('payment_icons', 'public');
            }

            $bankDetails = null;
            if ($request->type === 'bank') {
                $bankDetails = [
                    'bank_name' => $request->bank_name,
                    'branch_name' => $request->branch_name,
                    'routing_number' => $request->routing_number,
                ];
            }

            PaymentMethod::create([
                'type' => $request->type,
                'icon_image' => $iconPath,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'bank_details' => $bankDetails,
                'is_active' => $request->has('is_active') ? true : false,
                'display_order' => $request->display_order ?? 0,
            ]);

            return redirect()->route('admin.payment_methods.index')->with('success', 'Payment method added successfully!');
            
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // Edit - Show edit form
    public function edit($id)
    {
        $data = PaymentMethod::findOrFail($id);
        return view('admin.payment_methods.edit', compact('data'));
    }

    // Update - Update payment method
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'type' => 'required|string|max:50',
                'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'account_name' => 'required|string|max:255',
                'account_number' => 'required|string|max:255',
                'bank_name' => 'nullable|string|max:255',
                'branch_name' => 'nullable|string|max:255',
                'routing_number' => 'nullable|string|max:255',
                'display_order' => 'nullable|integer',
            ]);

            $paymentMethod = PaymentMethod::findOrFail($id);

            $iconPath = $paymentMethod->icon_image;
            if ($request->hasFile('icon_image')) {
                // Delete old image
                if ($paymentMethod->icon_image) {
                    Storage::disk('public')->delete($paymentMethod->icon_image);
                }
                $iconPath = $request->file('icon_image')->store('payment_icons', 'public');
            }

            $bankDetails = null;
            if ($request->type === 'bank') {
                $bankDetails = [
                    'bank_name' => $request->bank_name,
                    'branch_name' => $request->branch_name,
                    'routing_number' => $request->routing_number,
                ];
            }

            $paymentMethod->update([
                'type' => $request->type,
                'icon_image' => $iconPath,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'bank_details' => $bankDetails,
                'is_active' => $request->has('is_active') ? true : false,
                'display_order' => $request->display_order ?? 0,
            ]);

            return redirect()->route('admin.payment_methods.index')->with('success', 'Payment method updated successfully!');
            
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // Destroy - Delete payment method
    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        
        // Delete image if exists
        if ($paymentMethod->icon_image) {
            Storage::disk('public')->delete($paymentMethod->icon_image);
        }
        
        $paymentMethod->delete();
        
        return redirect()->back()->with('success', 'Payment method deleted successfully!');
    }

    // Toggle active status
    public function toggleStatus($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->update([
            'is_active' => !$paymentMethod->is_active
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
        $methods = PaymentMethod::whereIn('id', $ids)->get();
        foreach ($methods as $method) {
            if ($method->icon_image) {
                Storage::disk('public')->delete($method->icon_image);
            }
        }
        PaymentMethod::whereIn('id', $ids)->delete();
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
        PaymentMethod::whereIn('id', $ids)->update(['is_active' => $status]);
        return response()->json(['success' => true]);
    }
}
