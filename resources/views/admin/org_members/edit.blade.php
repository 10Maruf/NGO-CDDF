@extends('layouts.admin')

@section('title_l1', 'Edit Org Member')
@section('bread_crumb')
    <li class="breadcrumb-item"><a href="{{ route('org.index') }}">Org Members</a></li>
    <li class="breadcrumb-item active">Edit Member</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Organizational Member</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('org.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- Member Type --}}
                        <div class="col-md-12">
                            <label for="org_type" class="form-label fw-semibold">Member Type <span class="text-danger">*</span></label>
                            <select name="org_type" id="org_type" class="form-select @error('org_type') is-invalid @enderror" required>
                                <option value="">-- Select Type --</option>
                                @foreach($orgTypes as $key => $label)
                                    <option value="{{ $key }}" {{ $data->org_type == $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('org_type') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        {{-- Name --}}
                        <div class="col-md-12">
                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $data->name }}">
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        {{-- Designation --}}
                        <div class="col-md-12">
                            <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                            <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" id="designation" value="{{ $data->designation }}">
                            @error('designation') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        {{-- Photo --}}
                        <div class="col-md-12">
                            <label for="img" class="form-label">Photo <span class="text-muted">(Optional — leave blank to keep current)</span></label>
                            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="img" accept="image/*">
                            @error('photo') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        @if($data->photo)
                        <div class="col-md-12">
                            <label class="form-label">Current Photo:</label><br>
                            <img src="{{ asset('images/org_members/'.$data->photo) }}" alt="{{ $data->name }}" width="80" class="rounded shadow-sm border">
                        </div>
                        @endif

                        {{-- Bio --}}
                        <div class="col-md-12">
                            <label for="bio" class="form-label">Bio <span class="text-muted">(Optional)</span></label>
                            <textarea id="bio" name="bio" class="form-control" rows="3">{{ $data->bio }}</textarea>
                        </div>

                        {{-- Contact Info --}}
                        <div class="col-md-6">
                            <label class="form-label">Contact Number <span class="text-muted">(Optional)</span></label>
                            <input type="text" name="contact_number" class="form-control" value="{{ $data->contact_number }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" name="email" class="form-control" value="{{ $data->email }}">
                        </div>

                        {{-- Message --}}
                        <div class="col-md-12">
                            <label class="form-label">Message <span class="text-muted">(Optional)</span></label>
                            <textarea name="message" class="form-control" rows="3">{{ $data->message }}</textarea>
                        </div>

                        {{-- Joining Date --}}
                        <div class="col-md-6">
                            <label class="form-label">Joining Date <span class="text-muted">(Optional)</span></label>
                            <input type="date" name="joining_date" class="form-control" value="{{ $data->joining_date ? \Carbon\Carbon::parse($data->joining_date)->format('Y-m-d') : '' }}">
                        </div>

                        {{-- Education & Experience --}}
                        <div class="col-md-8">
                            <label class="form-label">Education <span class="text-muted">(Optional)</span></label>
                            <input type="text" name="education" class="form-control" value="{{ $data->education }}" placeholder="e.g. MSS, Dhaka University">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Experience (Years) <span class="text-muted">(Optional)</span></label>
                            <input type="number" name="experience_years" class="form-control" value="{{ $data->experience_years }}" min="0" max="60" placeholder="e.g. 15">
                        </div>

                        {{-- Social Links --}}
                        <div class="col-12"><hr><p class="fw-semibold mb-0">Social Links <span class="text-muted small">(Optional)</span></p></div>
                        <div class="col-md-6">
                            <label class="form-label">Facebook URL</label>
                            <input type="url" name="facebook" class="form-control" value="{{ $data->facebook }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Twitter URL</label>
                            <input type="url" name="twitter" class="form-control" value="{{ $data->twitter }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Instagram URL</label>
                            <input type="url" name="instagram" class="form-control" value="{{ $data->instagram }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">YouTube URL</label>
                            <input type="url" name="youtube" class="form-control" value="{{ $data->youtube }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">LinkedIn URL</label>
                            <input type="url" name="linkedin" class="form-control" value="{{ $data->linkedin }}">
                        </div>
                        <div class="col-12"><hr></div>

                        {{-- Order & Active --}}
                        <div class="col-md-6">
                            <label for="order" class="form-label">Display Order</label>
                            <input type="number" name="order" class="form-control" id="order" value="{{ $data->order }}">
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ $data->is_active ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Active / Visible</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary px-4" type="submit">Update Member</button>
                            <a href="{{ route('org.index') }}" class="btn btn-secondary ms-2">Back to List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
