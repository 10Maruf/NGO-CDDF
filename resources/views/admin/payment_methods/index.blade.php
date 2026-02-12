@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Payment Methods</h6>
        <hr/>
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Payment Methods List</h6>
                    <a href="{{ route('admin.payment_methods.add') }}" class="btn btn-primary btn-sm">
                        <i class="bx bx-plus"></i> Add New Method
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
                
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">SL</th>
                                <th width="10%">Icon</th>
                                <th width="15%">Type</th>
                                <th width="20%">Account Name</th>
                                <th width="20%">Account Number</th>
                                <th width="10%">Status</th>
                                <th width="8%">Order</th>
                                <th width="12%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key=>$item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="text-center">
                                    @if($item->icon_image)
                                        <img src="{{ asset('storage/'.$item->icon_image) }}" alt="{{ $item->type }}" style="height: 40px;">
                                    @elseif($item->type == 'bank')
                                        <i class="fa-solid fa-building-columns" style="font-size: 28px;"></i>
                                    @elseif(file_exists(public_path('img/'.$item->type.'.png')))
                                        <img src="{{ asset('img/'.$item->type.'.png') }}" alt="{{ $item->type }}" style="height: 40px;">
                                    @else
                                        <span class="badge bg-secondary">No Icon</span>
                                    @endif
                                </td>
                                <td><strong>{{ ucfirst($item->type) }}</strong></td>
                                <td>{{ $item->account_name }}</td>
                                <td>{{ $item->account_number }}</td>
                                <td>
                                    @if($item->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-dark">{{ $item->display_order }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.payment_methods.toggle', $item->id) }}" 
                                           class="btn btn-sm {{ $item->is_active ? 'btn-warning' : 'btn-success' }}" 
                                           title="{{ $item->is_active ? 'Deactivate' : 'Activate' }}">
                                            <i class="bx {{ $item->is_active ? 'bx-hide' : 'bx-show' }}"></i>
                                        </a>
                                        <a href="{{ route('admin.payment_methods.edit', $item->id) }}" 
                                           class="btn btn-sm btn-primary" 
                                           title="Edit">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.payment_methods.delete', $item->id) }}" 
                                           class="btn btn-sm btn-danger" 
                                           onclick="return confirm('Are you sure you want to delete this payment method?')"
                                           title="Delete">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="bx bx-info-circle" style="font-size: 24px;"></i>
                                    <p class="mb-0 mt-2">No payment methods found. Add your first payment method!</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
