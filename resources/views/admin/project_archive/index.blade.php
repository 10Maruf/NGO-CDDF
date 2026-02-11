@extends('layouts.admin')

@section('title_l1', 'Project Archive')
@section('bread_crumb')
    <li class="breadcrumb-item">Projects</li>
    <li class="breadcrumb-item active">Archive</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Project Archive</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-danger">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('update'))
                    <div class="alert alert-danger">
                        {{ session()->get('update') }}
                    </div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Project Name</th>
                                <th>Partner/Donor Name</th>
                                <th>Duration</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project as $key=>$value)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ Str::limit($value->name, 30, '...') }}</td>
                                <td class="align-middle">{{ Str::limit($value->partners, 30, '...') }}</td>
                                <td class="align-middle">{{ $value->from_date}}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('project.archive.edit',$value->id) }}" class="btn btn-sm btn-primary text-white text-center">
                                        <i class="feather-edit"></i>
                                    </a>
                                    <a href="{{ route('project.archive.delete',$value->id) }}" class="btn btn-sm btn-danger text-white text-center" data-delete data-delete-title="Delete Archived Project" data-delete-message="Are you sure you want to delete this archived project? This action cannot be undone.">
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
