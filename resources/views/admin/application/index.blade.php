@extends('layouts.admin')

@section('title_l1', 'Logos & Branding')
@section('bread_crumb')
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item active">Logos</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">Applications</h6>
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
                                <th>Logo</th>
                                <th>Favicon</th>
                                <th>Facebook</th>
                                <th>Twitter</th>
                                <th>Instagram</th>
                                <th>Youtube</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $key=>$data)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">
                                    <img src="{{ asset('images/application/'.$data->main_logo) }}" alt="" width="50">
                                </td>
                                <td class="align-middle">
                                    <img src="{{ asset('images/application/'.$data->fav_icon) }}" alt="" width="50">
                                </td>
                                <td class="align-middle">{{ $data->facebook }}</td>
                                <td class="align-middle">{{ $data->twitter }}</td>
                                <td class="align-middle">{{ $data->instagram }}</td>
                                <td class="align-middle">{{ $data->youtube }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('gallery.edit',$data->id) }}" class="btn btn-sm btn-primary text-white text-center">
                                        <i class="feather-edit"></i>
                                    </a>
                                    <a href="{{ route('gallery.delete',$data->id) }}" class="btn btn-sm btn-danger text-white text-center" data-delete data-delete-title="Delete Application Setting" data-delete-message="Are you sure you want to delete this application setting? This action cannot be undone.">
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
