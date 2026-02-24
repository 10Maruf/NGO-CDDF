@extends('layouts.admin')

@section('title_l1', 'YouTube Videos')
@section('bread_crumb')
    <li class="breadcrumb-item">YouTube Videos</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="mb-0 text-uppercase">All YouTube Videos</h6>
            <a href="{{ route('admin.youtube_videos.add') }}" class="btn btn-primary btn-sm">
                <i class="feather-plus me-1"></i> Add Video
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('update'))
                    <div class="alert alert-success">{{ session('update') }}</div>
                @endif

                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Video URL</th>
                                <th>Order</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($videos as $key => $video)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <img src="{{ $video->thumbnail }}" alt="{{ $video->title }}"
                                         style="width:100px; border-radius:6px; object-fit:cover;">
                                </td>
                                <td>{{ $video->title }}</td>
                                <td>
                                    <a href="https://youtu.be/{{ $video->video_id }}" target="_blank"
                                       class="text-truncate d-block" style="max-width:200px;">
                                        {{ $video->video_url }}
                                    </a>
                                </td>
                                <td>{{ $video->order }}</td>
                                <td>
                                    <div class="table-actions justify-content-center">
                                        <a href="{{ route('admin.youtube_videos.edit', $video->id) }}"
                                           class="btn btn-primary btn-sm" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.youtube_videos.delete', $video->id) }}"
                                           class="btn btn-danger btn-sm"
                                           data-delete
                                           data-delete-title="Delete Video"
                                           data-delete-message="Are you sure you want to delete this video?"
                                           title="Delete">
                                            <i class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No videos added yet.</td>
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
