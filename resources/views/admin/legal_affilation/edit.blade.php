@extends('layouts.admin')

@section('title_l1', 'Edit Legal Affiliation')
@section('bread_crumb')
    <li class="breadcrumb-item"><a href="{{ route('origin.legal_affilation.index') }}">Legal Affiliations</a></li>
    <li class="breadcrumb-item active">Edit Affiliation</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Origin and Legal Affiliation</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('origin.legal_affilation.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $item->title) }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="thumbnail" class="form-label">Thumbnail Image</label>
                            <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail">
                            <span class="text-info">Leave empty to keep current. Maximum size 2 MB. Supported formats: JPG, PNG, JPEG, GIF</span>
                            @error('thumbnail')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @if ($item->thumbnail)
                        <div class="col-md-12">
                            <label class="form-label">Current Thumbnail:</label>
                            <div>
                                <img src="{{ asset('images/legal_affilation/thumbnails/'.$item->thumbnail) }}" alt="{{ $item->title }}" width="150" class="rounded border">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <label for="pdf_file" class="form-label">PDF File</label>
                            <input type="file" name="pdf_file" class="form-control @error('pdf_file') is-invalid @enderror" id="pdf_file">
                            <span class="text-info">Leave empty to keep current PDF. Maximum size 10 MB</span>
                            @error('pdf_file')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @if ($item->pdf_file)
                        <div class="col-md-12">
                            <label class="form-label">Current PDF:</label>
                            <div>
                                <a href="{{ asset('images/legal_affilation/pdfs/'.$item->pdf_file) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i class="bx bx-download"></i> View Current PDF
                                </a>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $item->description) }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('origin.legal_affilation.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
