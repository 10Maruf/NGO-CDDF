@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Strategic Plans</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <div class="mb-3">
                    <a href="{{ route('strategic_plans.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Add Strategic Plan
                    </a>
                </div>

                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($strategicPlans as $key => $strategicPlan)
                                <tr>
                                    <td class="align-middle">{{ ++$key }}</td>
                                    <td class="align-middle">
                                        @if (!empty($strategicPlan->image))
                                            <img src="{{ asset('images/strategic_plans/images/'.$strategicPlan->image) }}" alt="{{ $strategicPlan->title }}" width="60" height="45" class="rounded border">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ asset('images/strategic_plans/pdfs/'.$strategicPlan->pdf_file) }}" target="_blank" download class="fw-bold text-decoration-none">
                                            {{ $strategicPlan->title }}
                                        </a>
                                    </td>
                                    <td class="align-middle">{{ Str::limit($strategicPlan->description, 50, '...') }}</td>
                                    <td class="align-middle">{{ date('M d, Y', strtotime($strategicPlan->created_at)) }}</td>
                                    <td class="text-center align-middle">
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <a href="{{ route('strategic_plans.edit', $strategicPlan->id) }}" class="btn btn-sm btn-primary text-white" title="Edit">
                                                <i class="fadeIn animated bx bx-edit"></i>
                                            </a>
                                            <a href="{{ route('strategic_plans.delete', $strategicPlan->id) }}" class="btn btn-sm btn-danger text-white" title="Delete">
                                                <i class="fadeIn animated bx bx-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bx bx-file bx-lg"></i>
                                            <p class="mt-2">No strategic plans found. <a href="{{ route('strategic_plans.create') }}">Add the first one</a></p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
