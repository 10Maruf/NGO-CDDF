@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Team Member</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" id="designation" placeholder="Enter Designation">
                            @error('designation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="department" class="form-label">Department (Optional)</label>
                            <input type="text" name="department" class="form-control" id="department" placeholder="Enter Department">
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="img">
                            @error('photo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="bio" class="form-label">Bio (Optional)</label>
                            <textarea id="bio" name="bio" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="facebook" class="form-label">Facebook URL (Optional)</label>
                            <input type="url" name="facebook" class="form-control" id="facebook" placeholder="https://facebook.com/username">
                        </div>
                        <div class="col-md-6">
                            <label for="twitter" class="form-label">Twitter URL (Optional)</label>
                            <input type="url" name="twitter" class="form-control" id="twitter" placeholder="https://twitter.com/username">
                        </div>
                        <div class="col-md-6">
                            <label for="instagram" class="form-label">Instagram URL (Optional)</label>
                            <input type="url" name="instagram" class="form-control" id="instagram" placeholder="https://instagram.com/username">
                        </div>
                        <div class="col-md-6">
                            <label for="youtube" class="form-label">YouTube URL (Optional)</label>
                            <input type="url" name="youtube" class="form-control" id="youtube" placeholder="https://youtube.com/channel/...">
                        </div>
                        <div class="col-md-12">
                            <label for="order" class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" id="order" value="0">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
