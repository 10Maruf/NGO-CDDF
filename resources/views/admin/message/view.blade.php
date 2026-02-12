@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">View Message</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <div class="row mb-3">
                        <div class="col-1 text-end">
                            Name :
                        </div>
                        <div class="col-11">
                            {{ $message->name }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-1 text-end">
                            Email :
                        </div>
                        <div class="col-11">
                            {{ $message->email }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-1 text-end">
                            Subject :
                        </div>
                        <div class="col-10 fw-bold">
                            {{ $message->subject }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 text-end">
                            Message :
                        </div>
                        <div class="col-11">
                            <p>
                                {{ $message->message }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-11">
                            <a href="{{ route('message.index') }}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
