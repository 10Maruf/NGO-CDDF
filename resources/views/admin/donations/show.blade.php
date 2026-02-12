@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <h6 class="mb-0 text-uppercase">Donation Details</h6>
        <hr/>
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Donation #{{ $data->id }}</h6>
                    <a href="{{ route('admin.donations.index') }}" class="btn btn-secondary btn-sm">
                        <i class="bx bx-arrow-back"></i> Back to List
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="card border">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Donor Information</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <td width="40%"><strong>Donor Name:</strong></td>
                                        <td>{{ $data->donor_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone Number:</strong></td>
                                        <td>{{ $data->donor_phone }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Transaction ID:</strong></td>
                                        <td><code>{{ $data->transaction_id }}</code></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Payment Information</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <td width="40%"><strong>Amount:</strong></td>
                                        <td><h5 class="text-success mb-0">৳ {{ number_format($data->amount, 2) }}</h5></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Payment Method:</strong></td>
                                        <td>
                                            @if($data->paymentMethod)
                                                <span class="badge bg-info">{{ ucfirst($data->paymentMethod->type) }}</span><br>
                                                <small class="text-muted">{{ $data->paymentMethod->account_name }}</small><br>
                                                <small class="text-muted">{{ $data->paymentMethod->account_number }}</small>
                                            @else
                                                <span class="badge bg-secondary">N/A</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status:</strong></td>
                                        <td>
                                            @if($data->status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($data->status == 'verified')
                                                <span class="badge bg-success">Verified</span>
                                            @else
                                                <span class="badge bg-danger">Rejected</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Additional Information</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <td width="20%"><strong>Submitted Date:</strong></td>
                                        <td>{{ $data->created_at->format('d M Y, h:i A') }}</td>
                                    </tr>
                                    @if($data->admin_note)
                                    <tr>
                                        <td><strong>Admin Note:</strong></td>
                                        <td>{{ $data->admin_note }}</td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Actions</h6>
                            </div>
                            <div class="card-body">
                                @if($data->status == 'pending')
                                <form action="{{ route('admin.donations.verify', $data->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="admin_note" class="form-label">Admin Note (Optional)</label>
                                        <textarea name="admin_note" id="admin_note" class="form-control" rows="2" 
                                                  placeholder="Add any note about this donation..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success" 
                                            onclick="return confirm('Are you sure you want to verify this donation?')">
                                        <i class="bx bx-check-circle"></i> Verify Donation
                                    </button>
                                </form>

                                <form action="{{ route('admin.donations.reject', $data->id) }}" method="POST" class="d-inline ms-2">
                                    @csrf
                                    <button type="submit" class="btn btn-warning" 
                                            onclick="return confirm('Are you sure you want to reject this donation?')">
                                        <i class="bx bx-x-circle"></i> Reject Donation
                                    </button>
                                </form>
                                @else
                                <div class="alert alert-info mb-0">
                                    This donation has already been {{ $data->status }}.
                                </div>
                                @endif

                                <hr>

                                <a href="{{ route('admin.donations.delete', $data->id) }}" 
                                   class="btn btn-danger" 
                                   onclick="return confirm('Are you sure you want to delete this donation? This action cannot be undone.')">
                                    <i class="bx bx-trash"></i> Delete Donation
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
