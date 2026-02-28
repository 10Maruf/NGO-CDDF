@extends('layouts.admin')

@section('title_l1', 'Careers')
@section('bread_crumb')
    <li class="breadcrumb-item">Careers</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="mb-0 text-uppercase">All Careers</h6>
            <a href="{{ route('invoked.create') }}" class="btn btn-primary btn-sm">
                <i class="feather-plus me-1"></i> Add Career
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-danger">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($file as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        {{ Str::limit($value->name, 30, '...') }}
                                    </td>
                                    <td>
                                        {{ $value->file }}
                                    </td>
                                    <td>
                                        <a href="{{ route('invoked.edit',$value->id) }}" class="btn btn-sm btn-primary text-white text-center">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('invoked.delete',$value->id) }}" class="btn btn-sm btn-danger text-white text-center" data-delete data-delete-title="Delete Invoked Item" data-delete-message="Are you sure you want to delete this item? This action cannot be undone.">
                                            <i class="feather-trash-2"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
