@extends('layouts.admin')

@section('title_l1', 'Volunteers')
@section('bread_crumb')
    <li class="breadcrumb-item">Volunteers</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-uppercase">All Volunteers</h6>
            <a href="{{ route('admin.volunteer_applications.add') }}" class="btn btn-primary btn-sm"><i class="feather-plus me-1"></i> Add Volunteer</a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">
                                    @if ($item->photo)
                                        <img src="{{ asset('images/volunteers/' . $item->photo) }}" width="42" height="42" style="border-radius:50%; object-fit:cover;">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td class="align-middle">{{ $item->name }}</td>
                                <td class="align-middle">{{ $item->phone ?? '—' }}</td>
                                <td class="align-middle">{{ $item->email ?? '—' }}</td>
                                <td class="align-middle">
                                    @php $badge = ['pending' => 'warning', 'approved' => 'success', 'rejected' => 'danger']; @endphp
                                    <span class="badge bg-{{ $badge[$item->status] ?? 'secondary' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="align-middle">{{ $item->created_at->format('d M Y') }}</td>
                                <td class="align-middle">
                                    <div class="table-actions justify-content-center">
                                        <a href="{{ route('admin.volunteer_applications.show', $item->id) }}" class="btn btn-info btn-sm" title="View">
                                            <i class="feather-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.volunteer_applications.edit', $item->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.volunteer_applications.delete', $item->id) }}" class="btn btn-danger btn-sm" data-delete data-delete-title="Delete Volunteer" data-delete-message="Are you sure?" title="Delete">
                                            <i class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
