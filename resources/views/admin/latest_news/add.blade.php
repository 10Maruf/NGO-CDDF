@extends('layouts.admin')

@section('title_l1', 'Add News / Event')
@section('bread_crumb')
    <li class="breadcrumb-item"><a href="{{ route('news.index') }}">News & Events</a></li>
    <li class="breadcrumb-item active">Add New</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add News / Event</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" id="newsForm" action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" placeholder="Enter Title">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
                                <option value="">-- Select Category --</option>
                                <option value="news" {{ old('category') == 'news' ? 'selected' : '' }}>News</option>
                                <option value="event" {{ old('category') == 'event' ? 'selected' : '' }}>Event</option>
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Cover Image <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="img">
                            <span class="text-info">Cover image dimension: 725×375 px, max 2MB.</span>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="gallery" class="form-label">Gallery Images <span class="text-muted">(optional, multiple)</span></label>
                            <input type="file" name="gallery[]" class="form-control @error('gallery.*') is-invalid @enderror" id="gallery" multiple>
                            <span class="text-info">You can select multiple images. Max 2MB each.</span>
                            @error('gallery.*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            {{-- Hidden textarea holds the actual submitted value --}}
                            <textarea id="description" name="description" class="d-none @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            <div id="description-editor" style="min-height: 220px;"></div>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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

    // Pre-fill editor if old() value exists
    var oldVal = document.getElementById('description').value.trim();
    if (oldVal) { quill.clipboard.dangerouslyPasteHTML(oldVal); }

    // Sync editor content to hidden textarea before submit
    var form = document.getElementById('newsForm');
    form.addEventListener('submit', function() {
        document.getElementById('description').value = quill.root.innerHTML;
    });
</script>
@endpush
