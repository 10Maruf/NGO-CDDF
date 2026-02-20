@extends('layouts.admin')

@section('title_l1', 'News & Events')
@section('bread_crumb')
    <li class="breadcrumb-item">News & Events</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All News & Events</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Cover Image</th>
                                <th>Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $key => $item)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">
                                    @if (($item->category ?? 'news') === 'event')
                                        <span class="badge bg-warning text-dark">Event</span>
                                    @else
                                        <span class="badge bg-info">News</span>
                                    @endif
                                </td>
                                <td class="align-middle">{{ $item->title }}</td>
                                <td class="align-middle">
                                    <img src="{{ asset('images/news/'.$item->image) }}" alt="" width="60" class="rounded">
                                </td>
                                <td class="align-middle">{{ Str::limit($item->description, 40, '...') }}</td>
                                <td class="align-middle">
                                    <div class="table-actions justify-content-center">
                                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-primary" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('news.delete', $item->id) }}" class="btn btn-danger"
                                           data-delete data-delete-title="Delete" data-delete-message="Are you sure you want to delete this entry? This action cannot be undone." title="Delete">
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
