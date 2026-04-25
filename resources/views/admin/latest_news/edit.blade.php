@extends('layouts.admin')

@section('title_l1', 'Edit News / Event')
@section('bread_crumb')
    <li class="breadcrumb-item"><a href="{{ route('news.index') }}">News & Events</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit News / Event</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" id="newsForm" action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $news->title }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
                                <option value="news"  {{ ($news->category ?? 'news') == 'news'  ? 'selected' : '' }}>News</option>
                                <option value="event" {{ ($news->category ?? '') == 'event' ? 'selected' : '' }}>Event</option>
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date" value="{{ $news->start_date ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="start_time" class="form-label">Start Time</label>
                            <input type="time" name="start_time" class="form-control" id="start_time" value="{{ $news->start_time ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" class="form-control" id="end_date" value="{{ $news->end_date ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="end_time" class="form-label">End Time</label>
                            <input type="time" name="end_time" class="form-control" id="end_time" value="{{ $news->end_time ?? '' }}">
                        </div>
                        <div class="col-md-12">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" id="location" value="{{ $news->location ?? '' }}" placeholder="Enter Location">
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Cover Image <span class="text-muted">(leave blank to keep current)</span></label>
                            <input type="file" name="image" class="form-control" id="img">
                            <span class="text-info">Cover image dimension: 725×375 px, max 2MB.</span>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Current Cover Image</label><br>
                            <img src="{{ asset('images/news/'.$news->image) }}" alt="Cover" width="120" class="rounded border">
                        </div>
                        <div class="col-md-12">
                            <label for="gallery" class="form-label">Add Gallery Images <span class="text-muted">(optional, multiple)</span></label>
                            <input type="file" name="gallery[]" class="form-control" id="gallery" multiple>
                            <span class="text-info">Select multiple images to add to the gallery. Max 2MB each.</span>
                        </div>

                        {{-- Existing gallery images --}}
                        @if ($galleryImages->isNotEmpty())
                        <div class="col-md-12">
                            <label class="form-label">Current Gallery Images</label>
                            <div class="d-flex flex-wrap gap-2 mt-1">
                                @foreach ($galleryImages as $gi)
                                <div class="text-center" style="position:relative;">
                                    <img src="{{ asset('images/news/'.$gi->image) }}" alt="Gallery" width="100" class="rounded border">
                                    <br>
                                    <a href="{{ route('news.gallery.delete', $gi->id) }}"
                                       class="btn btn-danger btn-sm mt-1"
                                       onclick="return confirm('Delete this gallery image?')">
                                        <i class="feather-trash-2"></i> Delete
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            {{-- Hidden textarea holds the actual submitted value --}}
                            <textarea id="description" name="description" class="d-none @error('description') is-invalid @enderror">{{ $news->description }}</textarea>
                            <div id="description-editor" style="min-height: 220px;"></div>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 d-flex align-items-center gap-2">
                            <button class="btn btn-primary px-4" type="submit">Update</button>
                            <a href="{{ route('news.index') }}" class="btn btn-danger px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<style>
    /* Force the container to not exceed a certain height and handle overflow */
    #description-editor { 
        background: #fff; 
        border: 1px solid #ced4da; 
        border-radius: 0 0 .25rem .25rem; 
        height: 300px; /* Set a fixed height for the container */
    }
    
    /* Ensure the editor area respects the container height */
    .ql-container {
        height: 300px !important;
    }
    
    /* Make the editor content scrollable */
    .ql-editor {
        min-height: 100%;
        max-height: 100%;
        overflow-y: auto;
    }
    
    .ql-toolbar.ql-snow { 
        border-radius: .25rem .25rem 0 0; 
        border: 1px solid #ced4da;
        border-bottom: none;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
    var quill = new Quill('#description-editor', {
        theme: 'snow',
        placeholder: 'Write description here...',
        modules: {
            toolbar: [
                [{ 'header': [1,2,3,false] }],
                ['bold','italic','underline','strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['link','blockquote'],
                ['clean']
            ]
        }
    });

    // Pre-fill editor with existing description
    var existing = document.getElementById('description').value.trim();
    if (existing) { quill.clipboard.dangerouslyPasteHTML(existing); }

    // Sync editor content to hidden textarea before submit
    var form = document.getElementById('newsForm');
    form.addEventListener('submit', function() {
        document.getElementById('description').value = quill.root.innerHTML;
    });
</script>
@endpush