@extends('layouts.admin')

@section('title_l1', 'Careers')
@section('bread_crumb')
    <li class="breadcrumb-item">Careers</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Careers</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('careers.add') }}" class="btn btn-sm btn-primary">
                        <i class="feather-plus"></i> Add New Career
                    </a>
                </div>
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Title</th>
                                <th>Thumbnail</th>
                                <th>PDF File</th>
                                <th>Description</th>

                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($careers as $key => $career)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $career->title }}</td>
                                <td class="align-middle">
                                    @if ($career->thumbnail)
                                        <img src="{{ asset('images/careers/thumbnails/'.$career->thumbnail) }}" alt="{{ $career->title }}" width="50" height="40" class="rounded">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if ($career->pdf_file)
                                        <a href="{{ asset('images/careers/pdfs/'.$career->pdf_file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                            <i class="bx bx-download"></i> View PDF
                                        </a>
                                    @else
                                        <span class="text-muted">No PDF</span>
                                    @endif
                                </td>
                                <td class="align-middle">{{ Str::limit($career->description, 30, '...') }}</td>

                                <td class="align-middle">
                                    <div class="table-actions justify-content-center">
                                        <a href="{{ route('careers.edit', $career->id) }}" class="btn btn-primary" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('careers.delete', $career->id) }}" class="btn btn-danger" title="Delete" data-delete data-delete-title="Delete Career" data-delete-message="Are you sure you want to delete this career? This action cannot be undone.">
                                            <i class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="feather-briefcase"></i>
                                        <p class="mt-2">No careers found. <a href="{{ route('careers.add') }}">Add first one</a></p>
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
