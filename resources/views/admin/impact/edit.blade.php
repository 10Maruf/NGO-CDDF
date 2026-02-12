@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Impact Metric</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('update'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session()->get('update') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('impact.update',$data->id) }}" method="post">
                        @csrf
                        
                        <div class="col-md-8">
                            <div class="col-md-12 mb-3">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" value="{{ old('title', $data->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="metric_value" class="form-label">Metric Value <span class="text-danger">*</span></label>
                                    <input type="text" name="metric_value" class="form-control @error('metric_value') is-invalid @enderror" 
                                           id="metric_value" value="{{ old('metric_value', $data->metric_value) }}" required>
                                    @error('metric_value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="metric_unit" class="form-label">Metric Unit <span class="text-danger">*</span></label>
                                    <input type="text" name="metric_unit" class="form-control @error('metric_unit') is-invalid @enderror" 
                                           id="metric_unit" value="{{ old('metric_unit', $data->metric_unit) }}" required>
                                    @error('metric_unit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="4">{{ old('description', $data->description) }}</textarea>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="year" class="form-label">Year</label>
                                    <input type="number" name="year" class="form-control" id="year" 
                                           value="{{ old('year', $data->year) }}" min="2000" max="2100">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="order" class="form-label">Display Order</label>
                                    <input type="number" name="order" class="form-control" id="order" 
                                           value="{{ old('order', $data->order) }}" min="0">
                                    <small class="text-muted">Lower numbers appear first</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Icon Selection</h6>
                                </div>
                                <div class="card-body">
                                    <label for="icon" class="form-label">Choose Icon</label>
                                    <select class="form-select" id="icon" name="icon">
                                        <option value="">-- Select Icon --</option>
                                        <optgroup label="People & Community">
                                            <option value="bx bx-group" {{ old('icon', $data->icon) == 'bx bx-group' ? 'selected' : '' }}>👥 Group/People</option>
                                            <option value="bx bx-user-plus" {{ old('icon', $data->icon) == 'bx bx-user-plus' ? 'selected' : '' }}>👤 User Plus</option>
                                            <option value="bx bxs-user-detail" {{ old('icon', $data->icon) == 'bx bxs-user-detail' ? 'selected' : '' }}>👨‍💼 User Detail</option>
                                            <option value="bx bx-happy-heart-eyes" {{ old('icon', $data->icon) == 'bx bx-happy-heart-eyes' ? 'selected' : '' }}>😍 Happy</option>
                                        </optgroup>
                                        <optgroup label="Medical & Health">
                                            <option value="bx bx-heart" {{ old('icon', $data->icon) == 'bx bx-heart' ? 'selected' : '' }}>❤️ Heart</option>
                                            <option value="bx bxs-heart" {{ old('icon', $data->icon) == 'bx bxs-heart' ? 'selected' : '' }}>💖 Heart Filled</option>
                                            <option value="bx bx-donate-heart" {{ old('icon', $data->icon) == 'bx bx-donate-heart' ? 'selected' : '' }}>💝 Donate Heart</option>
                                            <option value="bx bx-clinic" {{ old('icon', $data->icon) == 'bx bx-clinic' ? 'selected' : '' }}>🏥 Clinic</option>
                                            <option value="bx bx-first-aid" {{ old('icon', $data->icon) == 'bx bx-first-aid' ? 'selected' : '' }}>⚕️ First Aid</option>
                                        </optgroup>
                                        <optgroup label="Education">
                                            <option value="bx bxs-graduation" {{ old('icon', $data->icon) == 'bx bxs-graduation' ? 'selected' : '' }}>🎓 Graduation</option>
                                            <option value="bx bx-book" {{ old('icon', $data->icon) == 'bx bx-book' ? 'selected' : '' }}>📖 Book</option>
                                            <option value="bx bxs-school" {{ old('icon', $data->icon) == 'bx bxs-school' ? 'selected' : '' }}>🏫 School</option>
                                            <option value="bx bx-book-reader" {{ old('icon', $data->icon) == 'bx bx-book-reader' ? 'selected' : '' }}>📚 Book Reader</option>
                                        </optgroup>
                                        <optgroup label="Projects & Goals">
                                            <option value="bx bx-bar-chart-alt-2" {{ old('icon', $data->icon) == 'bx bx-bar-chart-alt-2' ? 'selected' : '' }}>📊 Chart</option>
                                            <option value="bx bx-trending-up" {{ old('icon', $data->icon) == 'bx bx-trending-up' ? 'selected' : '' }}>📈 Trending Up</option>
                                            <option value="bx bx-line-chart" {{ old('icon', $data->icon) == 'bx bx-line-chart' ? 'selected' : '' }}>📉 Line Chart</option>
                                            <option value="bx bx-bullseye" {{ old('icon', $data->icon) == 'bx bx-bullseye' ? 'selected' : '' }}>🎯 Target</option>
                                            <option value="bx bx-trophy" {{ old('icon', $data->icon) == 'bx bx-trophy' ? 'selected' : '' }}>🏆 Trophy</option>
                                            <option value="bx bx-task" {{ old('icon', $data->icon) == 'bx bx-task' ? 'selected' : '' }}>✓ Task</option>
                                        </optgroup>
                                        <optgroup label="Location & Global">
                                            <option value="bx bx-globe" {{ old('icon', $data->icon) == 'bx bx-globe' ? 'selected' : '' }}>🌍 Globe</option>
                                            <option value="bx bx-map" {{ old('icon', $data->icon) == 'bx bx-map' ? 'selected' : '' }}>🗺️ Map</option>
                                            <option value="bx bx-map-pin" {{ old('icon', $data->icon) == 'bx bx-map-pin' ? 'selected' : '' }}>📍 Map Pin</option>
                                            <option value="bx bx-buildings" {{ old('icon', $data->icon) == 'bx bx-buildings' ? 'selected' : '' }}>🏢 Buildings</option>
                                        </optgroup>
                                        <optgroup label="Finance">
                                            <option value="bx bx-donate-blood" {{ old('icon', $data->icon) == 'bx bx-donate-blood' ? 'selected' : '' }}>🩸 Donate</option>
                                            <option value="bx bx-coin-stack" {{ old('icon', $data->icon) == 'bx bx-coin-stack' ? 'selected' : '' }}>🪙 Coins</option>
                                            <option value="bx bx-money" {{ old('icon', $data->icon) == 'bx bx-money' ? 'selected' : '' }}>💵 Money</option>
                                        </optgroup>
                                        <optgroup label="Other">
                                            <option value="bx bx-star" {{ old('icon', $data->icon) == 'bx bx-star' ? 'selected' : '' }}>⭐ Star</option>
                                            <option value="bx bxs-star" {{ old('icon', $data->icon) == 'bx bxs-star' ? 'selected' : '' }}>🌟 Star Filled</option>
                                            <option value="bx bx-smile" {{ old('icon', $data->icon) == 'bx bx-smile' ? 'selected' : '' }}>😊 Smile</option>
                                            <option value="bx bx-like" {{ old('icon', $data->icon) == 'bx bx-like' ? 'selected' : '' }}>👍 Like</option>
                                            <option value="bx bx-award" {{ old('icon', $data->icon) == 'bx bx-award' ? 'selected' : '' }}>🏅 Award</option>
                                        </optgroup>
                                    </select>
                                    
                                    <div class="text-center p-4 mt-3 bg-light border rounded" id="iconPreview">
                                        @if($data->icon)
                                            <i class="{{ $data->icon }}" style="font-size: 60px; color: #0d6efd;"></i>
                                        @else
                                            <i class="bx bx-image-add" style="font-size: 48px; color: #ccc;"></i>
                                            <p class="mt-2 mb-0 text-muted small">Select icon to preview</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary px-4" type="submit">
                                <i class="bx bx-save"></i> Update Impact
                            </button>
                            <a href="{{ route('impact.index') }}" class="btn btn-secondary px-4">
                                <i class="bx bx-x"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const iconSelect = document.getElementById('icon');
    const iconPreview = document.getElementById('iconPreview');
    
    iconSelect.addEventListener('change', function() {
        const iconClass = this.value;
        const iconText = this.options[this.selectedIndex].text;
        
        if (iconClass) {
            iconPreview.innerHTML = 
                '<i class="' + iconClass + '" style="font-size: 60px; color: #0d6efd;"></i>' +
                '<p class="mt-2 mb-0 text-muted small">' + iconText + '</p>';
        } else {
            iconPreview.innerHTML = 
                '<i class="bx bx-image-add" style="font-size: 48px; color: #ccc;"></i>' +
                '<p class="mt-2 mb-0 text-muted small">Select icon to preview</p>';
        }
    });
});
</script>
@endsection
