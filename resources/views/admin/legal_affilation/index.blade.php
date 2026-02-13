@extends('layouts.admin')

@section('title_l1', 'Legal Affiliation')
@section('bread_crumb')
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item active">Legal Affiliation</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Origin and Legal Affilation</h6>
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
                                        <div class="table-actions">
                                            <a href="{{ route('origin.legal_affilation.edit',$value->id) }}" class="btn btn-primary" title="Edit">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="{{ route('origin.legal_affilation.delete',$value->id) }}" class="btn btn-danger" data-delete data-delete-title="Delete Legal Affiliation" data-delete-message="Are you sure you want to delete this legal affiliation document? This action cannot be undone." title="Delete">
                                                <i class="feather-trash-2"></i>
                                            </a>
                                        </div>
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
