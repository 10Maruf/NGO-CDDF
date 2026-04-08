@extends('layouts.admin')

@section('title_l1', 'Mission & Vision')
@section('bread_crumb')
    <li class="breadcrumb-item">About Us</li>
    <li class="breadcrumb-item active">Mission & Vision</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Mission and Vision </h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" id="mission_form" action="{{ route('mission.vision.store') }}" method="post">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">Vision</label>
                            <div id="vision-editor-container" style="height:200px;"></div>
                            <input type="hidden" name="vision" id="vision_input">
                            @error('vision')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Mission</label>
                            <div id="mission-editor-container" style="height:200px;"></div>
                            <input type="hidden" name="mission" id="mission_input">
                            @error('mission')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Our Values</label>
                            <div id="values-editor-container" style="height:250px;"></div>
                            <input type="hidden" name="values" id="values_input">
                            @error('values')
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
                        <h6>Vision:</h6>
                        <div class="text-justify">
                            {!! isset($mission->vision) ? $mission->vision : '' !!}
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <h6>Mission:</h6>
                        <div class="text-justify">
                            {!! isset($mission->mission) ? $mission->mission : '' !!}
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <h6>Our Values:</h6>
                        <div class="text-justify">
                            {!! isset($mission->values) ? $mission->values : '' !!}
                        </div>
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
    var toolbarOptions = [
        [{ header: [1, 2, 3, false] }],
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote'],
        [{ list: 'ordered' }, { list: 'bullet' }],
        [{ indent: '-1' }, { indent: '+1' }],
        [{ color: [] }, { background: [] }],
        [{ align: [] }],
        ['link', 'image', 'video'],
        ['clean']
    ];

    var quillVision = new Quill('#vision-editor-container', {
        theme: 'snow',
        placeholder: 'Write vision here...',
        modules: { toolbar: toolbarOptions }
    });

    var quillMission = new Quill('#mission-editor-container', {
        theme: 'snow',
        placeholder: 'Write mission here...',
        modules: { toolbar: toolbarOptions }
    });

    var quillValues = new Quill('#values-editor-container', {
        theme: 'snow',
        placeholder: 'Write values here...',
        modules: { toolbar: toolbarOptions }
    });

    // Populate existing data
    var visionContent = {!! json_encode(old('vision', $mission->vision ?? '')) !!};
    if (visionContent) quillVision.root.innerHTML = visionContent;

    var missionContent = {!! json_encode(old('mission', $mission->mission ?? '')) !!};
    if (missionContent) quillMission.root.innerHTML = missionContent;

    var valuesContent = {!! json_encode(old('values', $mission->values ?? '')) !!};
    if (valuesContent) quillValues.root.innerHTML = valuesContent;

    // Sync inputs before submit
    document.getElementById('mission_form').addEventListener('submit', function () {
        document.getElementById('vision_input').value = quillVision.root.innerHTML;
        document.getElementById('mission_input').value = quillMission.root.innerHTML;
        document.getElementById('values_input').value = quillValues.root.innerHTML;
    });
});
</script>

@endsection
