@extends('layouts.admin')

@section('title_l1', 'Volunteer Details')
@section('bread_crumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.volunteer_applications.index') }}">Volunteers</a></li>
    <li class="breadcrumb-item active">Details</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-8 mx-auto">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-uppercase">Volunteer Details</h6>
            <a href="{{ route('admin.volunteer_applications.edit', $data->id) }}" class="btn btn-primary btn-sm">
                <i class="feather-edit me-1"></i> Edit
            </a>
        </div>
        <hr/>
        @if (session()->has('update'))
            <div class="alert alert-success">{{ session()->get('update') }}</div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="text-center mb-4">
                    @if ($data->photo)
                        <img src="{{ asset('images/volunteers/' . $data->photo) }}" width="100" height="100"
                             style="border-radius:50%; object-fit:cover; border:3px solid #f86f2d;">
                    @else
                        <div style="width:100px;height:100px;border-radius:50%;background:#f0e8e0;border:3px solid #f86f2d;display:flex;align-items:center;justify-content:center;margin:0 auto;">
                            <i class="feather-user" style="font-size:2.5rem;color:#f86f2d;"></i>
                        </div>
                    @endif
                    <h5 class="mt-3 mb-0">{{ $data->name }}</h5>
                </div>

                <table class="table table-bordered">
                    <tr><th width="180">Phone</th><td>{{ $data->phone ?? '—' }}</td></tr>
                    <tr><th>Email</th><td>{{ $data->email ?? '—' }}</td></tr>
                    <tr><th>Address</th><td>{{ $data->address ?? '—' }}</td></tr>
                    <tr><th>Skills / Interests</th><td>{{ $data->skills ?? '—' }}</td></tr>
                    <tr><th>Message</th><td>{{ $data->message ?? '—' }}</td></tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @php $badge = ['pending' => 'warning', 'approved' => 'success', 'rejected' => 'danger']; @endphp
                            <span class="badge bg-{{ $badge[$data->status] ?? 'secondary' }}">{{ ucfirst($data->status) }}</span>
                        </td>
                    </tr>
                    <tr><th>Applied At</th><td>{{ $data->created_at->format('d M Y, h:i A') }}</td></tr>
                </table>

                <hr>
                <h6 class="text-uppercase mb-3">Quick Status Update</h6>
                <form action="{{ route('admin.volunteer_applications.status', $data->id) }}" method="post" class="d-flex gap-2">
                    @csrf
                    <select name="status" class="form-control w-auto">
                        <option value="pending"  {{ $data->status == 'pending'  ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ $data->status == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ $data->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
