@extends('layouts.admin')

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
                    <form class="row g-3" action="{{ route('admin.focus_areas.update', $focus_area->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="{{ old('title', $focus_area->title) }}" class="form-control @error('title') is-invalid @enderror">
                            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="6" class="form-control @error('description') is-invalid @enderror">{{ old('description', $focus_area->description) }}</textarea>
                            @error('description')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Replace Icon (optional)</label>
                            <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" accept="image/*">
                            @error('icon')<div class="text-danger">{{ $message }}</div>@enderror

                            @if (!empty($focus_area->icon_path))
                                <div class="mt-2">
                                    <div class="text-muted mb-1">Current icon:</div>
                                    <img src="{{ asset('storage/' . $focus_area->icon_path) }}" alt="{{ $focus_area->title }} icon" style="max-width: 80px;" class="border rounded p-1 bg-white">

                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="remove_icon" value="1" id="remove_icon">
                                        <label class="form-check-label" for="remove_icon">Remove icon</label>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Replace Image (optional)</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                            @error('image')<div class="text-danger">{{ $message }}</div>@enderror

                            @if (!empty($focus_area->image_path))
                                <div class="mt-2">
                                    <div class="text-muted mb-1">Current image:</div>
                                    <img src="{{ asset('storage/' . $focus_area->image_path) }}" alt="{{ $focus_area->title }}" style="max-width: 180px;" class="border rounded">

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

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('admin.focus_areas.index') }}" class="btn btn-light">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
