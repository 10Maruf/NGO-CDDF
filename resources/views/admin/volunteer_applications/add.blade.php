@extends('layouts.admin')

@section('title_l1', 'Add Volunteer')
@section('bread_crumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.volunteer_applications.index') }}">Volunteers</a></li>
    <li class="breadcrumb-item active">Add Volunteer</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Volunteer</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('admin.volunteer_applications.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Full Name">
                            @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="01XXXXXXXXX">
                            @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email Address">
                            @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                            @error('photo')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="Address">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Skills / Area of Interest</label>
                            <textarea name="skills" class="form-control" rows="2" placeholder="e.g. teaching, healthcare, fundraising...">{{ old('skills') }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Message</label>
                            <textarea name="message" class="form-control" rows="3" placeholder="Any additional message...">{{ old('message') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="pending" {{ old('status') == 'pending'  ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>
                        <div class="col-12 d-flex align-items-center gap-2">
                            <button class="btn btn-primary px-4" type="submit">Submit</button>
                            <a href="{{ route('admin.volunteer_applications.index') }}" class="btn btn-secondary px-4">Back to List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
