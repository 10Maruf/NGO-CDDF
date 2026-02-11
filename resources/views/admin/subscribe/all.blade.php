@extends('layouts.admin')

@section('title_l1', 'Subscribers')
@section('bread_crumb')
    <li class="breadcrumb-item">Subscribers</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Subscription</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-danger">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscribe as $key=>$subscribe)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $subscribe->name }}</td>
                                    <td>{{ $subscribe->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('subscribe.delete',$subscribe->id) }}" class="btn btn-sm btn-danger text-white text-center" data-delete data-delete-title="Delete Subscriber" data-delete-message="Are you sure you want to delete this subscriber? This action cannot be undone.">
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
