@extends('layouts.admin')

@section('title_l1', 'Invoked Items')
@section('bread_crumb')
    <li class="breadcrumb-item">Invoked</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Invoked</h6>
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
