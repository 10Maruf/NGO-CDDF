
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Project Archive</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('project.archive.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="name" class="form-label">Project Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" placeholder="Enter Project Name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="partner" class="form-label">Partner/Donor<span class="text-danger">*</span></label>
                            <input type="text" name="partner" class="form-control @error('partner') is-invalid @enderror" id="partner" value="{{ old('partner') }}" placeholder="Enter Partner/Donor Name">
                            @error('partner')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="from" class="form-label">From</label>
                            <input type="date" name="from" class="form-control @error('from') is-invalid @enderror" id="from" value="{{ old('from') }}" placeholder="From Date">
                            @error('from')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="to" class="form-label">To</label>
                            <input type="date" name="to" class="form-control @error('to') is-invalid @enderror" id="to" value="{{ old('to') }}" placeholder="To Date">
                            @error('to')
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
