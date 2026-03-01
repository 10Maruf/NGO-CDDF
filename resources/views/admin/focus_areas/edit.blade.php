@extends('layouts.admin')

@section('title_l1', 'Edit Focus Area')
@section('bread_crumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.focus_areas.index') }}">Focus Areas</a></li>
    <li class="breadcrumb-item active">Edit Area</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Focus Area</h6>
        <hr/>

        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" id="focus_area_edit_form" action="{{ route('admin.focus_areas.update', $focus_area->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="{{ old('title', $focus_area->title) }}" class="form-control @error('title') is-invalid @enderror">
                            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Short Description <small class="text-muted">(homepage card-এ দেখাবে)</small></label>
                            <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $focus_area->description) }}</textarea>
                            @error('description')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Detailed Description <small class="text-muted">(detail page-এ দেখাবে)</small></label>
                            
                            {{-- Quill Editor Container --}}
                            <div id="editor-container" style="height: 300px;"></div>
                            
                            {{-- Hidden Input to store the data --}}
                            <input type="hidden" name="detail_description" id="detail_description_input">

                            @error('detail_description')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                        </div>

                        {{-- Icon Class Dropdown --}}
                        <div class="col-md-8">
                            <label class="form-label">Icon <small class="text-muted">(FontAwesome)</small></label>
                            <select name="icon_class" id="icon_class_select" class="form-select @error('icon_class') is-invalid @enderror">
                                <option value="">— Select Icon —</option>
                                @php
                                    $currentIcon = old('icon_class', $focus_area->icon_class ?? '');
                                    $icons = [
                                        'Women / Gender' => [
                                            'fa-solid fa-venus-double'      => 'Venus Double (Women)',
                                            'fa-solid fa-person-dress'      => 'Person Dress (Women)',
                                            'fa-solid fa-hand-holding-heart'=> 'Hand Holding Heart',
                                            'fa-solid fa-shield-heart'      => 'Shield Heart',
                                        ],
                                        'Education' => [
                                            'fa-solid fa-graduation-cap'    => 'Graduation Cap',
                                            'fa-solid fa-book-open'         => 'Book Open',
                                            'fa-solid fa-school'            => 'School',
                                            'fa-solid fa-chalkboard-user'   => 'Chalkboard Teacher',
                                            'fa-solid fa-certificate'       => 'Certificate / Scholarship',
                                        ],
                                        'Disaster & Humanitarian' => [
                                            'fa-solid fa-house-flood-water' => 'House Flood Water',
                                            'fa-solid fa-cloud-bolt'        => 'Cloud Bolt (Storm)',
                                            'fa-solid fa-hand-holding-medical'=> 'Medical Aid',
                                            'fa-solid fa-kit-medical'       => 'First Aid Kit',
                                            'fa-solid fa-virus'             => 'Virus (Pandemic)',
                                        ],
                                        'Disability & Inclusion' => [
                                            'fa-solid fa-wheelchair'        => 'Wheelchair',
                                            'fa-solid fa-wheelchair-move'   => 'Wheelchair Active',
                                            'fa-solid fa-universal-access'  => 'Universal Access',
                                            'fa-solid fa-ear-deaf'          => 'Deaf',
                                        ],
                                        'WASH / Water' => [
                                            'fa-solid fa-droplet'           => 'Water Droplet',
                                            'fa-solid fa-faucet'            => 'Faucet',
                                            'fa-solid fa-toilet'            => 'Sanitation',
                                            'fa-solid fa-hands-holding-child'=> 'Child Care',
                                        ],
                                        'Rights & Advocacy' => [
                                            'fa-solid fa-scale-balanced'    => 'Scale Balanced',
                                            'fa-solid fa-gavel'             => 'Gavel / Judgment',
                                            'fa-solid fa-bullhorn'          => 'Bullhorn / Advocacy',
                                            'fa-solid fa-file-contract'     => 'File Contract',
                                            'fa-solid fa-landmark'          => 'Landmark',
                                        ],
                                        'Community & Livelihood' => [
                                            'fa-solid fa-people-group'      => 'People Group',
                                            'fa-solid fa-seedling'          => 'Seedling / Agriculture',
                                            'fa-solid fa-hand-holding-dollar'=> 'Livelihood / Income',
                                            'fa-solid fa-house-chimney-user'=> 'Community',
                                            'fa-solid fa-leaf'              => 'Leaf / Environment',
                                        ],
                                    ];
                                @endphp
                                @foreach($icons as $group => $options)
                                    <optgroup label="{{ $group }}">
                                        @foreach($options as $val => $label)
                                            <option value="{{ $val }}" {{ $currentIcon == $val ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @error('icon_class')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <div id="icon_preview" class="border rounded d-flex align-items-center justify-content-center bg-light" style="width:56px;height:56px;font-size:24px;">
                                <i class="{{ old('icon_class', $focus_area->icon_class ?? 'fa-solid fa-bullseye') }}"></i>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Replace Hero Image <small class="text-muted">(shows on Learn More page)</small></label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                            @error('image')<div class="text-danger">{{ $message }}</div>@enderror

                            @if (!empty($focus_area->image_path))
                                <div class="mt-2">
                                    <div class="text-muted mb-1">Current image:</div>
                                    <img src="{{ asset('storage/' . $focus_area->image_path) }}" alt="{{ $focus_area->title }}" style="max-width: 200px;" class="border rounded">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="remove_image" value="1" id="remove_image">
                                        <label class="form-check-label" for="remove_image">Remove image</label>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" value="{{ old('order', $focus_area->order) }}" min="0" step="1" required class="form-control @error('order') is-invalid @enderror">
                            @error('order')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Status</label>
                            <select name="is_active" class="form-select @error('is_active') is-invalid @enderror">
                                <option value="1" {{ old('is_active', (string)$focus_area->is_active) == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active', (string)$focus_area->is_active) == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('is_active')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12 d-flex align-items-center gap-2">
                            <button class="btn btn-primary px-4" type="submit" id="submit-btn" style="position: relative; z-index: 10;">Update</button>
                            <a href="{{ route('admin.focus_areas.index') }}" class="btn btn-danger px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/quill.min.css') }}">
<style>
    .ql-toolbar.ql-snow { border-color: #ced4da; }
    .ql-container.ql-snow { border-color: #ced4da; font-family: inherit; }
</style>
<script src="{{ asset('admin/assets/vendors/js/quill.min.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'direction': 'rtl' }],
                    [{ 'size': ['small', false, 'large', 'huge'] }],
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'font': [] }],
                    [{ 'align': [] }],
                    ['clean']
                ]
            }
        });

        // Pre-fill content (handle quotes escaping)
        var content = {!! json_encode(old('detail_description', $focus_area->detail_description ?? '')) !!};
        if(content) {
            quill.root.innerHTML = content;
        }

        // Sync with hidden input
        var form = document.getElementById('focus_area_edit_form');
        form.onsubmit = function() {
            var html = quill.root.innerHTML;
            document.getElementById('detail_description_input').value = html;
        };
    });

    document.getElementById('icon_class_select').addEventListener('change', function () {
        var preview = document.getElementById('icon_preview');
        var val = this.value || 'fa-solid fa-bullseye';
        preview.innerHTML = '<i class="' + val + '"></i>';
    });
</script>
@endsection
