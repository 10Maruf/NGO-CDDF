@extends('layouts.admin')

@section('title_l1', 'Add Focus Area')
@section('bread_crumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.focus_areas.index') }}">Focus Areas</a></li>
    <li class="breadcrumb-item active">Add New</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Focus Area</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" id="focus_area_form" action="{{ route('admin.focus_areas.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Short Description <small class="text-muted">(homepage card-এ দেখাবে)</small></label>
                            <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="2-3 line-এ সংক্ষেপে লিখুন...">{{ old('description') }}</textarea>
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
                                            <option value="{{ $val }}" {{ old('icon_class') == $val ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @error('icon_class')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <div id="icon_preview" class="border rounded d-flex align-items-center justify-content-center bg-light" style="width:56px;height:56px;font-size:24px;">
                                <i class="{{ old('icon_class', 'fa-solid fa-bullseye') }}"></i>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Hero Image <small class="text-muted">(Learn More page-এ দেখাবে — recommended: 1200×500px)</small></label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                            @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" value="{{ old('order', 0) }}" min="0" step="1" required class="form-control @error('order') is-invalid @enderror">
                            @error('order')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Status</label>
                            <select name="is_active" class="form-select @error('is_active') is-invalid @enderror">
                                <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('is_active')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" id="submit-btn" style="position: relative; z-index: 10;">Save</button>
                            <a href="{{ route('admin.focus_areas.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Quill CSS --}}
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/quill.min.css') }}">
{{-- Custom Style for Quill --}}
<style>
    .ql-toolbar.ql-snow { border-color: #ced4da; }
    .ql-container.ql-snow { border-color: #ced4da; font-family: inherit; }
</style>

{{-- Quill JS --}}
<script src="{{ asset('admin/assets/vendors/js/quill.min.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            placeholder: 'বিস্তারিত লিখুন...',
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

        // Sync with hidden input
        var form = document.getElementById('focus_area_form');
        form.onsubmit = function() {
            var html = quill.root.innerHTML;
            document.getElementById('detail_description_input').value = html;
        };

        // Set initial content (if validation failed and returned old input)
        var oldContent = {!! json_encode(old('detail_description', '')) !!};
        if(oldContent) {
             quill.root.innerHTML = oldContent;
        }
    });

    document.getElementById('icon_class_select').addEventListener('change', function () {
        var preview = document.getElementById('icon_preview');
        var val = this.value || 'fa-solid fa-bullseye';
        preview.innerHTML = '<i class="' + val + '"></i>';
    });
</script>
@endsection
