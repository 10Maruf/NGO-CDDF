@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Publications</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="mb-3">
                    <a href="{{ route('publications.add') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Add New Publication
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
                                <th>Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($publications as $key => $publication)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $publication->title }}</td>
                                <td class="align-middle">
                                    @if ($publication->thumbnail)
                                        <img src="{{ asset('images/publications/thumbnails/'.$publication->thumbnail) }}" alt="{{ $publication->title }}" width="50" height="40" class="rounded">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if ($publication->pdf_file)
                                        <a href="{{ asset('images/publications/pdfs/'.$publication->pdf_file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                            <i class="bx bx-download"></i> View PDF
                                        </a>
                                    @else
                                        <span class="text-muted">No PDF</span>
                                    @endif
                                </td>
                                <td class="align-middle">{{ Str::limit($publication->description, 50, '...') }}</td>
                                <td class="align-middle">{{ date('M d, Y', strtotime($publication->created_at)) }}</td>
                                <td class="text-center align-middle">
                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                        <a href="{{ route('publications.edit', $publication->id) }}" class="btn btn-sm btn-primary text-white" title="Edit">
                                            <i class="fadeIn animated bx bx-edit"></i>
                                        </a>
                                        <a href="{{ route('publications.delete', $publication->id) }}" class="btn btn-sm btn-danger text-white" title="Delete" onclick="return confirm('Are you sure you want to delete this publication?')">
                                            <i class="fadeIn animated bx bx-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="bx bx-file bx-lg"></i>
                                        <p class="mt-2">No publications found. <a href="{{ route('publications.add') }}">Add your first publication</a></p>
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