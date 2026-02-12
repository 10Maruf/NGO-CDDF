@extends('layouts.admin')

@section('content')

<div class="row">
<div class="card">
    <div class="card-body">
        <div class="text-center p-5">
            <h2 class="text-danger">AFADBD</h2>
            <h6>Association for Alternative Development</h6>
        </div>
        <hr>
        <div class="text-center">
            <h1 class="text-success">Admin Dashboard</h1>
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-2 mt-4">
            <a href="{{ route('strategic_plans.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i> Add Strategic Plan
            </a>
            <a href="{{ route('strategic_plans.index') }}" class="btn btn-outline-primary">
                <i class="bx bx-list-ul"></i> All Strategic Plans
            </a>
        </div>
    </div>
</div>
</div>

@endsection

