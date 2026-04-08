@extends('layouts.admin')

@section('title_l1', 'About Us')
@section('bread_crumb')
    <li class="breadcrumb-item">About Us</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add About Us</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" id="about_form" action="{{ route('about.us.store') }}" method="post">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <div id="editor-container" style="height:320px;"></div>
                            <input type="hidden" name="description" id="description_input">
                            @error('description')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Description:</h6>
                        <p class="text-justify">
                            {!! isset($about->description)?"$about->description":'' !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Quill CSS --}}
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/quill.min.css') }}">
<style>
    .ql-toolbar.ql-snow  { border-color: #ced4da; border-radius: 4px 4px 0 0; }
    .ql-container.ql-snow{ border-color: #ced4da; border-radius: 0 0 4px 4px; font-family: inherit; font-size: 14px; }
</style>

{{-- Quill JS --}}
<script src="{{ asset('admin/assets/vendors/js/quill.min.js') }}"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        placeholder: 'Write about description here...',
        modules: {
            toolbar: [
                [{ header: [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                [{ indent: '-1' }, { indent: '+1' }],
                [{ color: [] }, { background: [] }],
                [{ align: [] }],
                ['link', 'image', 'video'],
                ['clean']
            ]
        }
    });

    // Populate existing data
    var existingContent = {!! json_encode(old('description', isset($about->description) ? $about->description : '')) !!};
    if (existingContent) {
        quill.root.innerHTML = existingContent;
    }

    // Sync input before submit
    document.getElementById('about_form').addEventListener('submit', function () {
        document.getElementById('description_input').value = quill.root.innerHTML;
    });
});
</script>

@endsection
