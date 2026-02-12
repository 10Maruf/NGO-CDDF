@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Success Story</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('stories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="rating" class="form-label">Rating</label>
                            <select name="rating" class="form-control @error('rating') is-invalid @enderror" id="rating">
                                <option value="">Select Rating</option>
                                <option value="5">5 Stars (★★★★★)</option>
                                <option value="4">4 Stars (★★★★☆)</option>
                            </select>
                            @error('rating')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="beneficiary_name" class="form-label">Beneficiary Name</label>
                            <input type="text" name="beneficiary_name" class="form-control @error('beneficiary_name') is-invalid @enderror" id="beneficiary_name" placeholder="Enter Beneficiary Name">
                            @error('beneficiary_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="beneficiary_title" class="form-label">Beneficiary Title</label>
                            <input type="text" name="beneficiary_title" class="form-control @error('beneficiary_title') is-invalid @enderror" id="beneficiary_title" placeholder="e.g., Community Leader, Sylhet">
                            @error('beneficiary_title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="img">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Story Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="5"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="date" class="form-label">Date (Optional)</label>
                            <input type="date" name="date" class="form-control" id="date">
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
