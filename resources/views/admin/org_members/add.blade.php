@extends('layouts.admin')

@section('title_l1', 'Add Org Member')
@section('bread_crumb')
    <li class="breadcrumb-item"><a href="{{ route('org.index') }}">Org Members</a></li>
    <li class="breadcrumb-item active">Add Member</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Organizational Member</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('org.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- Member Type --}}
                        <div class="col-md-12">
                            <label for="org_type" class="form-label fw-semibold">Member Type <span class="text-danger">*</span></label>
                            <select name="org_type" id="org_type" class="form-select @error('org_type') is-invalid @enderror" required>
                                <option value="">-- Select Type --</option>
                                @foreach($orgTypes as $key => $label)
                                    <option value="{{ $key }}" {{ old('org_type') == $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('org_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Name --}}
                        <div class="col-md-12">
                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" placeholder="Enter Full Name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Designation --}}
                        <div class="col-md-12">
                            <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                            <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" id="designation" value="{{ old('designation') }}" placeholder="Enter Designation">
                            @error('designation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Department --}}
                        <div class="col-md-12">
                            <label for="department" class="form-label">Department <span class="text-muted">(Optional)</span></label>
                            <input type="text" name="department" class="form-control" id="department" value="{{ old('department') }}" placeholder="e.g. Finance, HR, Program">
                        </div>

                        {{-- Photo --}}
                        <div class="col-md-12">
                            <label for="img" class="form-label">Photo <span class="text-muted">(Optional)</span></label>
                            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="img" accept="image/*">
                            @error('photo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Bio --}}
                        <div class="col-md-12">
                            <label for="bio" class="form-label">Bio <span class="text-muted">(Optional)</span></label>
                            <textarea id="bio" name="bio" class="form-control" rows="3" placeholder="Short biography...">{{ old('bio') }}</textarea>
                        </div>

                        {{-- Social Links --}}
                        <div class="col-12"><hr><p class="fw-semibold mb-0">Social Links <span class="text-muted small">(Optional)</span></p></div>
                        <div class="col-md-6">
                            <label class="form-label">Facebook URL</label>
                            <input type="url" name="facebook" class="form-control" value="{{ old('facebook') }}" placeholder="https://facebook.com/...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Twitter URL</label>
                            <input type="url" name="twitter" class="form-control" value="{{ old('twitter') }}" placeholder="https://twitter.com/...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Instagram URL</label>
                            <input type="url" name="instagram" class="form-control" value="{{ old('instagram') }}" placeholder="https://instagram.com/...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">YouTube URL</label>
                            <input type="url" name="youtube" class="form-control" value="{{ old('youtube') }}" placeholder="https://youtube.com/...">
                        </div>
                        <div class="col-12"><hr></div>

                        {{-- Order & Active --}}
                        <div class="col-md-6">
                            <label for="order" class="form-label">Display Order</label>
                            <input type="number" name="order" class="form-control" id="order" value="{{ old('order', 0) }}">
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">Active / Visible</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary px-4" type="submit">Add Member</button>
                            <a href="{{ route('org.index') }}" class="btn btn-secondary ms-2">Back to List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
