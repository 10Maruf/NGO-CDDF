@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">Volunteer Registrations</h6>
        <hr/>
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">All Registrations</h6>
                    <div>
                        <!-- Filter Form -->
                        <form method="GET" action="{{ route('admin.volunteer_registrations.index') }}" class="d-inline-flex gap-2">
                            <select name="status" class="form-select form-select-sm" style="width: 150px;">
                                <option value="">All Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                            <a href="{{ route('admin.volunteer_registrations.index') }}" class="btn btn-sm btn-secondary">Reset</a>
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
                
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session()->get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">SL</th>
                                <th width="15%">Name</th>
                                <th width="15%">Email</th>
                                <th width="10%">Phone</th>
                                <th width="10%">Status</th>
                                <th width="12%">Date</th>
                                <th width="15%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key=>$item)
                            <tr>
                                <td>{{ $data->firstItem() + $key }}</td>
                                <td><strong>{{ $item->name }}</strong></td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    @if($item->status == 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($item->status == 'approved')
                                        <span class="badge bg-success">Approved</span>
                                    @else
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                                <td><small>{{ date('d M Y', strtotime($item->created_at)) }}<br>{{ date('h:i A', strtotime($item->created_at)) }}</small></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.volunteer_registrations.show', $item->id) }}" 
                                           class="btn btn-sm btn-info" 
                                           title="View Details">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        @if($item->status == 'pending')
                                        <a href="{{ route('admin.volunteer_registrations.approve', $item->id) }}" 
                                           class="btn btn-sm btn-success" 
                                           onclick="return confirm('Approve this registration?')"
                                           title="Approve">
                                            <i class="bx bx-check"></i>
                                        </a>
                                        <a href="{{ route('admin.volunteer_registrations.reject', $item->id) }}" 
                                           class="btn btn-sm btn-warning" 
                                           onclick="return confirm('Reject this registration?')"
                                           title="Reject">
                                            <i class="bx bx-x"></i>
                                        </a>
                                        @endif
                                        <a href="{{ route('admin.volunteer_registrations.delete', $item->id) }}" 
                                           class="btn btn-sm btn-danger" 
                                           onclick="return confirm('Are you sure you want to delete this registration?')"
                                           title="Delete">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="bx bx-info-circle" style="font-size: 24px;"></i>
                                    <p class="mb-0 mt-2">No volunteer registrations found.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($data->hasPages())
                <div class="mt-3">
                    {{ $data->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
