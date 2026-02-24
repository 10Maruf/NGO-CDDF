@extends('layouts.admin')

@section('title_l1', 'Key Focus Areas')
@section('bread_crumb')
    <li class="breadcrumb-item">Focus Areas</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-11 mx-auto">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-uppercase">Key Focus Areas</h6>
            <a href="{{ route('admin.focus_areas.add') }}" class="btn btn-primary">Add Focus Area</a>
        </div>
        <hr/>

        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="60">#</th>
                                <th>Title</th>
                                <th width="90">Order</th>
                                <th width="110">Status</th>
                                <th width="160">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($focus_areas as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <div class="fw-bold">{{ $item->title }}</div>
                                        <div class="text-muted" style="max-width: 650px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            {{ $item->description }}
                                        </div>
                                    </td>
                                    <td>{{ $item->order }}</td>
                                    <td>
                                        @if ($item->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="{{ route('admin.focus_areas.edit', $item->id) }}" class="btn btn-primary" title="Edit">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.focus_areas.delete', $item->id) }}" class="btn btn-danger" data-delete data-delete-title="Delete Focus Area" data-delete-message="Are you sure you want to delete this focus area? This action cannot be undone." title="Delete">
                                                <i class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No focus areas found.</td>
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
