@extends('layouts.admin')

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
                                        <a href="{{ route('admin.focus_areas.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a href="{{ route('admin.focus_areas.delete', $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Delete this focus area?')">Delete</a>
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
