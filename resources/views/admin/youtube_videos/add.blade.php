@extends('layouts.admin')

@section('title_l1', 'Add YouTube Video')
@section('bread_crumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.youtube_videos.index') }}">YouTube Videos</a></li>
    <li class="breadcrumb-item active">Add Video</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-8 mx-auto">
        <h6 class="mb-0 text-uppercase">Add YouTube Video</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('admin.youtube_videos.store') }}" method="POST">
                        @csrf

                        <div class="col-md-12">
                            <label for="title" class="form-label">Video Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   placeholder="e.g. CDDF Annual Report 2025"
                                   value="{{ old('title') }}">
                            @error('title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="video_url" class="form-label">YouTube URL or Video ID <span class="text-danger">*</span></label>
                            <input type="text" name="video_url" id="video_url"
                                   class="form-control @error('video_url') is-invalid @enderror"
                                   placeholder="https://www.youtube.com/watch?v=xxxxxxxx  or  https://youtu.be/xxxxxxxx"
                                   value="{{ old('video_url') }}">
                            <small class="text-muted">Paste any YouTube URL format or just the video ID.</small>
                            @error('video_url')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="order" class="form-label">Display Order</label>
                            <input type="number" name="order" id="order"
                                   class="form-control" value="{{ old('order', 0) }}">
                            <small class="text-muted">Lower number = shown first.</small>
                        </div>

                        <div class="col-12 d-flex align-items-center gap-2">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="feather-save me-1"></i> Save Video
                            </button>
                            <a href="{{ route('admin.youtube_videos.index') }}" class="btn btn-secondary px-4">Back to List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
