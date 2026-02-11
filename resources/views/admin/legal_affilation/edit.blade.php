@extends('layouts.admin')

@section('title_l1', 'Edit Legal Affiliation')
@section('bread_crumb')
    <li class="breadcrumb-item"><a href="{{ route('origin.legal_affilation.index') }}">Legal Affiliations</a></li>
    <li class="breadcrumb-item active">Edit Affiliation</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Origin and Legal Affilation </h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('origin.legal_affilation.update',$file->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $file->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="file" class="form-label">Upload PDF</label>
                            <input type="file" name="file" id="file" class="form-control @error('file') is -invalid @enderror">
                            <span class="text-info">Old File Name: {{ $file->file }}</span>
                            @error('file')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
