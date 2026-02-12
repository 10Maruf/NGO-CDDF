@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Impact Metrics</h6>
        <hr/>
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Impact Metrics List</h6>
                    <a href="{{ route('impact.add') }}" class="btn btn-primary btn-sm">
                        <i class="bx bx-plus"></i> Add New Impact
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
                @if (session()->has('update'))
                    <div class="alert alert-info alert-dismissible fade show">
                        {{ session()->get('update') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">SL</th>
                                <th width="10%">Icon</th>
                                <th width="20%">Title</th>
                                <th width="18%">Metric</th>
                                <th width="22%">Description</th>
                                <th width="8%">Year</th>
                                <th width="7%">Order</th>
                                <th width="10%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key=>$item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="text-center">
                                    @if($item->icon)
                                        <i class="{{ $item->icon }}" style="font-size: 28px; color: #0d6efd;"></i>
                                    @else
                                        <span class="badge bg-secondary">No Icon</span>
                                    @endif
                                </td>
                                <td><strong>{{ $item->title }}</strong></td>
                                <td>
                                    <span class="badge bg-primary" style="font-size: 14px;">
                                        {{ $item->metric_value }}
                                    </span>
                                    <small class="text-muted">{{ $item->metric_unit }}</small>
                                </td>
                                <td>
                                    @if($item->description)
                                        {{ Str::limit($item->description, 60) }}
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->year)
                                        <span class="badge bg-info">{{ $item->year }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-dark">{{ $item->order }}</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('impact.edit',$item->id) }}" 
                                       class="btn btn-sm btn-primary text-white" 
                                       title="Edit">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <a href="{{ route('impact.delete',$item->id) }}" 
                                       class="btn btn-sm btn-danger text-white" 
                                       onclick="return confirm('Are you sure you want to delete this impact metric?')"
                                       title="Delete">
                                        <i class="bx bx-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <i class="bx bx-folder-open" style="font-size: 48px; color: #ccc;"></i>
                                    <p class="text-muted mt-2">No impact metrics found. <a href="{{ route('impact.add') }}">Add one now</a></p>
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
