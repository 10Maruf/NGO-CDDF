@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Donations</h6>
        <hr/>
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Donations List</h6>
                    <div>
                        <!-- Filter Form -->
                        <form method="GET" action="{{ route('admin.donations.index') }}" class="d-inline-flex gap-2">
                            <select name="status" class="form-select form-select-sm" style="width: 150px;">
                                <option value="">All Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Verified</option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            <input type="date" name="date" class="form-control form-control-sm" value="{{ request('date') }}" style="width: 150px;">
                            <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                            <a href="{{ route('admin.donations.index') }}" class="btn btn-sm btn-secondary">Reset</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">SL</th>
                                <th width="15%">Donor Name</th>
                                <th width="10%">Phone</th>
                                <th width="12%">Transaction ID</th>
                                <th width="10%">Amount</th>
                                <th width="12%">Payment Method</th>
                                <th width="10%">Status</th>
                                <th width="12%">Date</th>
                                <th width="14%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key=>$item)
                            <tr>
                                <td>{{ $data->firstItem() + $key }}</td>
                                <td><strong>{{ $item->donor_name }}</strong></td>
                                <td>{{ $item->donor_phone }}</td>
                                <td><code>{{ $item->transaction_id }}</code></td>
                                <td><strong>৳ {{ number_format($item->amount, 2) }}</strong></td>
                                <td>
                                    @if($item->paymentMethod)
                                        <span class="badge bg-info">{{ ucfirst($item->paymentMethod->type) }}</span>
                                    @else
                                        <span class="badge bg-secondary">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($item->status == 'verified')
                                        <span class="badge bg-success">Verified</span>
                                    @else
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                                <td><small>{{ $item->created_at->format('d M Y') }}<br>{{ $item->created_at->format('h:i A') }}</small></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.donations.show', $item->id) }}" 
                                           class="btn btn-sm btn-info" 
                                           title="View Details">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        @if($item->status == 'pending')
                                        <form action="{{ route('admin.donations.verify', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" 
                                                    onclick="return confirm('Verify this donation?')"
                                                    title="Verify">
                                                <i class="bx bx-check"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.donations.reject', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-warning" 
                                                    onclick="return confirm('Reject this donation?')"
                                                    title="Reject">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </form>
                                        @endif
                                        <a href="{{ route('admin.donations.delete', $item->id) }}" 
                                           class="btn btn-sm btn-danger" 
                                           onclick="return confirm('Are you sure you want to delete this donation?')"
                                           title="Delete">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">
                                    <i class="bx bx-info-circle" style="font-size: 24px;"></i>
                                    <p class="mb-0 mt-2">No donations found.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $data->links() }}
                </div>

                <!-- Summary -->
                @if($data->count() > 0)
                <div class="alert alert-info mt-3">
                    <strong>Summary:</strong> 
                    Total: <strong>{{ $data->total() }}</strong> donations | 
                    Page: <strong>{{ $data->currentPage() }}</strong> of <strong>{{ $data->lastPage() }}</strong>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
