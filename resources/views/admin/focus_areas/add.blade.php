@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Focus Area</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('admin.focus_areas.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Icon (optional)</label>
                            <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" accept="image/*">
                            @error('icon')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Image (optional)</label>
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
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a href="{{ route('admin.focus_areas.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
