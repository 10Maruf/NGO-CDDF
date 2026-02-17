@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0 text-uppercase">Volunteer Registration Details</h6>
            <a href="{{ route('admin.volunteer_registrations.index') }}" class="btn btn-sm btn-secondary">
                <i class="bx bx-arrow-back"></i> Back to List
            </a>
        </div>
        <hr/>
        
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $data->name }}</h5>
                    @if($data->status == 'pending')
                        <span class="badge bg-warning text-dark fs-6">Pending</span>
                    @elseif($data->status == 'approved')
                        <span class="badge bg-success fs-6">Approved</span>
                    @else
                        <span class="badge bg-danger fs-6">Rejected</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <h6 class="text-primary"><i class="bx bx-user"></i> Personal Information</h6>
                        <table class="table table-sm">
                            <tr>
                                <th width="35%">Full Name:</th>
                                <td>{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><a href="mailto:{{ $data->email }}">{{ $data->email }}</a></td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td><a href="tel:{{ $data->phone }}">{{ $data->phone }}</a></td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>{{ $data->address ?? 'Not provided' }}</td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <h6 class="text-primary"><i class="bx bx-time"></i> Registration Details</h6>
                        <table class="table table-sm">
                            <tr>
                                <th width="35%">Status:</th>
                                <td>
                                    @if($data->status == 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($data->status == 'approved')
                                        <span class="badge bg-success">Approved</span>
                                    @else
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Registration Date:</th>
                                <td>{{ date('d M Y, h:i A', strtotime($data->created_at)) }}</td>
                            </tr>
                            <tr>
                                <th>Last Updated:</th>
                                <td>{{ date('d M Y, h:i A', strtotime($data->updated_at)) }}</td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="col-md-12 mb-4">
                        <h6 class="text-primary"><i class="bx bx-briefcase"></i> Skills & Expertise</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <p class="mb-0" style="white-space: pre-wrap;">{{ $data->skills ?? 'Not provided' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 mb-4">
                        <h6 class="text-primary"><i class="bx bx-message-dots"></i> Why Volunteer?</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <p class="mb-0" style="white-space: pre-wrap;">{{ $data->why_volunteer }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                @if($data->status == 'pending')
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('admin.volunteer_registrations.reject', $data->id) }}" 
                               class="btn btn-warning"
                               onclick="return confirm('Are you sure you want to reject this registration?')">
                                <i class="bx bx-x"></i> Reject
                            </a>
                            <a href="{{ route('admin.volunteer_registrations.approve', $data->id) }}" 
                               class="btn btn-success"
                               onclick="return confirm('Are you sure you want to approve this registration?')">
                                <i class="bx bx-check"></i> Approve
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        
        <div class="mt-3 text-center">
            <a href="{{ route('admin.volunteer_registrations.delete', $data->id) }}" 
               class="btn btn-danger"
               onclick="return confirm('Are you sure you want to delete this registration? This action cannot be undone.')">
                <i class="bx bx-trash"></i> Delete Registration
            </a>
        </div>
    </div>
</div>
@endsection
