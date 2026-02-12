@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add FAQ</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('faq.store') }}" method="post">
                        @csrf
                        <div class="col-md-12">
                            <label for="question" class="form-label">Question</label>
                            <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" id="question" placeholder="Enter Question">
                            @error('question')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="answer" class="form-label">Answer</label>
                            <textarea id="answer" name="answer" class="form-control @error('answer') is-invalid @enderror" rows="5"></textarea>
                            @error('answer')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="category" class="form-label">Category (Optional)</label>
                            <input type="text" name="category" class="form-control" id="category" placeholder="e.g., General, Programs, Donation">
                        </div>
                        <div class="col-md-6">
                            <label for="order" class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" id="order" value="0">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
