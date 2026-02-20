@extends('layouts.admin')

@section('title_l1', 'Messages')
@section('bread_crumb')
    <li class="breadcrumb-item">Messages</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Message</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message as $key=>$message)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle" style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $message->name }}">{{ $message->name }}</td>
                                <td class="align-middle">{{ $message->contact_number }}</td>
                                <td class="align-middle">{{ $message->email }}</td>
                                <td class="align-middle" style="max-width: 220px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $message->subject }}">{{ $message->subject }}</td>
                                <td class="align-middle">
                                    <div class="table-actions justify-content-center">
                                        <a href="{{ route('message.view',$message->id) }}" class="btn btn-info" title="View">
                                            <i class="lni lni-eye"></i>
                                        </a>
                                        <a href="{{ route('message.delete',$message->id) }}" class="btn btn-danger" data-delete data-delete-title="Delete Message" data-delete-message="Are you sure you want to delete this message? This action cannot be undone." title="Delete">
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
