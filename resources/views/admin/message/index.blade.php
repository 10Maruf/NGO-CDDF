@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Message</h6>
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
                                <th>Subject</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message as $key=>$message)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $message->name }}</td>
                                <td class="align-middle">{{ $message->email }}</td>
                                <td class="align-middle">{{ $message->subject }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('message.delete',$message->id) }}" class="btn btn-sm btn-danger text-white text-center">
                                        <i class="fadeIn animated bx bx-trash-alt"></i>
                                    </a>
                                    <a href="{{ route('message.view',$message->id) }}" class="btn btn-sm btn-info text-white text-center">
                                        <i class="lni lni-eye"></i>
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
