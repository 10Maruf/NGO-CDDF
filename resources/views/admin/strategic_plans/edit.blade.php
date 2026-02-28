@extends('layouts.admin')

@section('title_l1', 'Edit Strategic Plan')
@section('bread_crumb')
    <li class="breadcrumb-item"><a href="{{ route('strategic_plans.index') }}">Strategic Plans</a></li>
    <li class="breadcrumb-item active">Edit Plan</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Strategic Plan</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('strategic_plans.update', $strategicPlan->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $strategicPlan->title }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description (optional)">{{ old('description', $strategicPlan->description) }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="thumbnail" class="form-label">Thumbnail Image</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror">
                            @if (!empty($strategicPlan->thumbnail))
                                <div class="mt-2">
                                    <img src="{{ asset('images/strategic_plans/thumbnails/'.$strategicPlan->thumbnail) }}" alt="Strategic Plan Thumbnail" width="120" class="rounded border">
                                </div>
                            @else
                                <span class="text-muted">No thumbnail uploaded yet</span>
                            @endif
                            @error('thumbnail')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="pdf_file" class="form-label">Upload PDF</label>
                            <input type="file" name="pdf_file" id="pdf_file" class="form-control @error('pdf_file') is-invalid @enderror">
                            @if (!empty($strategicPlan->pdf_file))
                                <span class="text-info">Old File: {{ $strategicPlan->pdf_file }}</span>
                            @else
                                <span class="text-danger">No PDF uploaded yet (PDF is required)</span>
                            @endif
                            @error('pdf_file')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 d-flex align-items-center gap-2">
                            <button class="btn btn-primary px-4" type="submit">Submit</button>
                            <a href="{{ route('strategic_plans.index') }}" class="btn btn-danger px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
