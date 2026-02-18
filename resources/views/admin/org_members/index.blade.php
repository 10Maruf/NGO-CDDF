@extends('layouts.admin')

@section('title_l1', 'Org Members')
@section('bread_crumb')
    <li class="breadcrumb-item active">Organizational Members</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Organizational Members</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif

                {{-- Filter by type --}}
                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <a href="{{ route('org.index') }}"
                       class="btn btn-sm {{ $filterType == '' ? 'btn-primary' : 'btn-outline-secondary' }}">All</a>
                    @foreach($orgTypes as $key => $label)
                        <a href="{{ route('org.index', ['type' => $key]) }}"
                           class="btn btn-sm {{ $filterType == $key ? 'btn-primary' : 'btn-outline-secondary' }}">
                            {{ \App\Models\OrgMember::$orgTypeLabels[$key] ?? $key }}
                        </a>
                    @endforeach
                    <a href="{{ route('org.add') }}" class="btn btn-sm btn-success ms-auto">
                        <i class="feather-plus me-1"></i> Add Member
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="table-light border-bottom border-2">
                            <tr>
                                <th style="width:40px">#</th>
                                <th style="width:50px">Photo</th>
                                <th>Name &amp; Designation</th>
                                <th>Type</th>
                                <th style="width:60px" class="text-center">Order</th>
                                <th style="width:70px" class="text-center">Active</th>
                                <th style="width:100px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <img src="{{ asset('images/org_members/' . $item->photo) }}"
                                         onerror="this.src='{{ asset('img/testimonial.jpg') }}'"
                                         alt="{{ $item->name }}" width="40" height="40"
                                         class="rounded-circle object-fit-cover border">
                                </td>
                                <td>
                                    <div class="fw-semibold" style="font-size:13px;">{{ $item->name }}</div>
                                    <div class="text-muted" style="font-size:11px;">{{ $item->designation }}{{ $item->department ? ' · ' . $item->department : '' }}</div>
                                </td>
                                <td>
                                    @php
                                        $badges = [
                                            'general_council'    => 'bg-info text-dark',
                                            'executive_committee'=> 'bg-primary',
                                            'advisory_council'   => 'bg-warning text-dark',
                                            'executive_director' => 'bg-danger',
                                            'senior_management'  => 'bg-success',
                                            'mid_management'     => 'bg-secondary',
                                            'field_staff'        => 'bg-dark',
                                            'support_staff'      => 'bg-light text-dark border',
                                        ];
                                        $badge = $badges[$item->org_type] ?? 'bg-secondary';
                                        $label = \App\Models\OrgMember::$orgTypeLabels[$item->org_type] ?? $item->org_type;
                                    @endphp
                                    <span class="badge {{ $badge }}">{{ $label }}</span>
                                </td>
                                <td class="text-center">{{ $item->order }}</td>
                                <td class="text-center">
                                    @if($item->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <div class="table-actions justify-content-center">
                                        <a href="{{ route('org.edit', $item->id) }}" class="btn btn-primary" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('org.delete', $item->id) }}" class="btn btn-danger" data-delete data-delete-title="Delete Member" data-delete-message="Are you sure you want to delete this member? This action cannot be undone." title="Delete">
                                            <i class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No members found.</td>
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
