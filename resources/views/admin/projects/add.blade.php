@extends('layouts.admin')

@section('title_l1', 'Add Project')
@section('bread_crumb')
    <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Projects</a></li>
    <li class="breadcrumb-item active">Add New</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <h6 class="mb-0 text-uppercase">Add New Project</h6>
        <hr/>
        <div class="card">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                @endif

                <div class="p-4 border rounded">
                    <form class="row g-3" id="project_form"
                          action="{{ route('project.store') }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        {{-- ── Core Info ────────────────────────────────────── --}}
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Project Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                   class="form-control @error('title') is-invalid @enderror"
                                   placeholder="Enter project title">
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="ongoing"    {{ old('status', 'ongoing') === 'ongoing'    ? 'selected' : '' }}>🟢 Ongoing</option>
                                <option value="completed"  {{ old('status') === 'completed'  ? 'selected' : '' }}>✅ Completed</option>
                            </select>
                            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- ── Cover Image ──────────────────────────────────── --}}
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Cover Image</label>
                            <input type="file" name="cover_image" accept="image/*"
                                   class="form-control @error('cover_image') is-invalid @enderror">
                            <small class="text-muted">Recommended: 1200×600px, max 2 MB (JPEG/PNG/WebP)</small>
                            @error('cover_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- ── Gallery Images ───────────────────────────────── --}}
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Gallery Images <span class="text-muted fw-normal">(optional, multiple)</span></label>
                            <input type="file" name="gallery[]" accept="image/*"
                                   class="form-control @error('gallery.*') is-invalid @enderror"
                                   multiple>
                            <small class="text-muted">Multiple images select করুন — max 2 MB each (JPEG/PNG/WebP/GIF)</small>
                            @error('gallery.*')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                        </div>

                        {{-- ── Descriptions ─────────────────────────────────── --}}
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">
                                Short Description <span class="text-danger">*</span>
                                <small class="text-muted fw-normal">(project card-এ দেখাবে — 2-3 লাইন)</small>
                            </label>
                            <textarea name="short_description" rows="3"
                                      class="form-control @error('short_description') is-invalid @enderror"
                                      placeholder="সংক্ষেপে project বর্ণনা করুন...">{{ old('short_description') }}</textarea>
                            @error('short_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold">
                                Detail Description
                                <small class="text-muted fw-normal">(detail page-এ দেখাবে — bold, italic ইত্যাদি ব্যবহার করুন)</small>
                            </label>
                            <div id="editor-container" style="height:320px;"></div>
                            <input type="hidden" name="detail_description" id="detail_description_input">
                            @error('detail_description')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                        </div>

                        {{-- ── Timeline ─────────────────────────────────────── --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Start Date</label>
                            <input type="date" name="start_date" value="{{ old('start_date') }}"
                                   class="form-control @error('start_date') is-invalid @enderror">
                            @error('start_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">End Date</label>
                            <input type="date" name="end_date" value="{{ old('end_date') }}"
                                   class="form-control @error('end_date') is-invalid @enderror">
                            <small class="text-muted">Ongoing project হলে খালি রাখুন</small>
                            @error('end_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- ── Location & Stats ─────────────────────────────── --}}
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Location / Area</label>
                            <input type="text" name="location" value="{{ old('location') }}"
                                   class="form-control @error('location') is-invalid @enderror"
                                   placeholder="e.g. Cox's Bazar, Bangladesh">
                            @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Budget / Funding (BDT)</label>
                            <input type="number" name="budget" value="{{ old('budget') }}" min="0" step="0.01"
                                   class="form-control @error('budget') is-invalid @enderror"
                                   placeholder="e.g. 5000000">
                            @error('budget')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Beneficiary Count</label>
                            <input type="number" name="beneficiary_count" value="{{ old('beneficiary_count') }}" min="0"
                                   class="form-control @error('beneficiary_count') is-invalid @enderror"
                                   placeholder="e.g. 2500">
                            @error('beneficiary_count')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Implementing Partner <small class="text-muted fw-normal">(lead org — free text)</small></label>
                            <input type="text" name="implementing_partner" value="{{ old('implementing_partner') }}"
                                   class="form-control @error('implementing_partner') is-invalid @enderror"
                                   placeholder="e.g. AFAD in partnership with UNHCR">
                            @error('implementing_partner')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- ── Donors / Partners ────────────────────────────── --}}
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">
                                Donors / Partners
                                <small class="text-muted fw-normal">(partners table থেকে — multiple select করুন)</small>
                            </label>
                            <div class="border rounded p-3" style="max-height:180px;overflow-y:auto;">
                                @forelse ($partners as $partner)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               name="partner_ids[]"
                                               value="{{ $partner->id }}"
                                               id="partner_{{ $partner->id }}"
                                               {{ in_array($partner->id, old('partner_ids', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="partner_{{ $partner->id }}">
                                            {{ $partner->name }}
                                        </label>
                                    </div>
                                @empty
                                    <p class="text-muted mb-0">কোনো partner নেই। <a href="{{ route('admin.partners.add') ?? '#' }}">Add Partner</a></p>
                                @endforelse
                            </div>
                            @error('partner_ids')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                        </div>

                        {{-- ── Focus Areas ──────────────────────────────────── --}}
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">
                                Focus Areas
                                <small class="text-muted fw-normal">(focus_areas table থেকে — multiple select করুন)</small>
                            </label>
                            <div class="border rounded p-3" style="max-height:180px;overflow-y:auto;">
                                @forelse ($focus_areas as $area)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               name="focus_area_ids[]"
                                               value="{{ $area->id }}"
                                               id="fa_{{ $area->id }}"
                                               {{ in_array($area->id, old('focus_area_ids', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="fa_{{ $area->id }}">
                                            @if ($area->icon_class)
                                                <i class="{{ $area->icon_class }} me-1"></i>
                                            @endif
                                            {{ $area->title }}
                                        </label>
                                    </div>
                                @empty
                                    <p class="text-muted mb-0">কোনো focus area নেই।</p>
                                @endforelse
                            </div>
                            @error('focus_area_ids')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                        </div>

                        {{-- ── Display Settings ─────────────────────────────── --}}
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Display Order</label>
                            <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                                   class="form-control @error('order') is-invalid @enderror">
                            @error('order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="is_active" class="form-select">
                                <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active')         == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="col-md-6 d-flex align-items-end">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_featured" value="1"
                                       id="is_featured"
                                       {{ old('is_featured') ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold" for="is_featured">
                                    Featured (Homepage-এ highlight করবে)
                                </label>
                            </div>
                        </div>

                        {{-- ── Submit ───────────────────────────────────────── --}}
                        <div class="col-12 pt-2 d-flex align-items-center gap-2">
                            <button class="btn btn-primary px-4" type="submit" id="submit-btn">
                                <i class="feather-save me-1"></i> Save Project
                            </button>
                            <a href="{{ route('project.index') }}" class="btn btn-secondary px-4">Back to List</a>
                        </div>

                    </form>
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
        placeholder: 'Project সম্পর্কে বিস্তারিত লিখুন...',
        modules: {
            toolbar: [
                [{ header: [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                [{ indent: '-1' }, { indent: '+1' }],
                [{ color: [] }, { background: [] }],
                [{ align: [] }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });

    var oldContent = {!! json_encode(old('detail_description', '')) !!};
    if (oldContent) quill.root.innerHTML = oldContent;

    document.getElementById('project_form').addEventListener('submit', function () {
        document.getElementById('detail_description_input').value = quill.root.innerHTML;
    });
});
</script>
@endsection
