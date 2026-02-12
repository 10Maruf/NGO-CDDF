@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit FAQ</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('faq.update',$data->id) }}" method="post">
                        @csrf
                        <div class="col-md-12">
                            <label for="question" class="form-label">Question</label>
                            <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" id="question" value="{{ $data->question }}">
                            @error('question')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="answer" class="form-label">Answer</label>
                            <textarea id="answer" name="answer" class="form-control @error('answer') is-invalid @enderror" rows="5">{{ $data->answer }}</textarea>
                            @error('answer')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="category" class="form-label">Category (Optional)</label>
                            <input type="text" name="category" class="form-control" id="category" value="{{ $data->category }}">
                        </div>
                        <div class="col-md-6">
                            <label for="order" class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" id="order" value="{{ $data->order }}">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
