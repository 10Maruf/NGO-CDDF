@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Impact Metric</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('impact.store') }}" method="post">
                        @csrf
                        
                        <div class="col-md-8">
                            <div class="col-md-12 mb-3">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" placeholder="e.g., Lives Impacted" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="metric_value" class="form-label">Metric Value <span class="text-danger">*</span></label>
                                    <input type="text" name="metric_value" class="form-control @error('metric_value') is-invalid @enderror" 
                                           id="metric_value" placeholder="e.g., 10,000 or 500+" value="{{ old('metric_value') }}" required>
                                    @error('metric_value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="metric_unit" class="form-label">Metric Unit <span class="text-danger">*</span></label>
                                    <input type="text" name="metric_unit" class="form-control @error('metric_unit') is-invalid @enderror" 
                                           id="metric_unit" placeholder="e.g., People, Projects" value="{{ old('metric_unit') }}" required>
                                    @error('metric_unit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="4" 
                                          placeholder="Brief description about this impact metric">{{ old('description') }}</textarea>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="year" class="form-label">Year</label>
                                    <input type="number" name="year" class="form-control" id="year" 
                                           placeholder="{{ date('Y') }}" value="{{ old('year', date('Y')) }}" 
                                           min="2000" max="2100">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="order" class="form-label">Display Order</label>
                                    <input type="number" name="order" class="form-control" id="order" 
                                           value="{{ old('order', 0) }}" min="0">
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
                                            <option value="bx bx-group">👥 Group/People</option>
                                            <option value="bx bx-user-plus">👤 User Plus</option>
                                            <option value="bx bxs-user-detail">👨‍💼 User Detail</option>
                                            <option value="bx bx-happy-heart-eyes">😍 Happy</option>
                                        </optgroup>
                                        <optgroup label="Medical & Health">
                                            <option value="bx bx-heart">❤️ Heart</option>
                                            <option value="bx bxs-heart">💖 Heart Filled</option>
                                            <option value="bx bx-donate-heart">💝 Donate Heart</option>
                                            <option value="bx bx-clinic">🏥 Clinic</option>
                                            <option value="bx bx-first-aid">⚕️ First Aid</option>
                                        </optgroup>
                                        <optgroup label="Education">
                                            <option value="bx bxs-graduation">🎓 Graduation</option>
                                            <option value="bx bx-book">📖 Book</option>
                                            <option value="bx bxs-school">🏫 School</option>
                                            <option value="bx bx-book-reader">📚 Book Reader</option>
                                        </optgroup>
                                        <optgroup label="Projects & Goals">
                                            <option value="bx bx-bar-chart-alt-2">📊 Chart</option>
                                            <option value="bx bx-trending-up">📈 Trending Up</option>
                                            <option value="bx bx-line-chart">📉 Line Chart</option>
                                            <option value="bx bx-bullseye">🎯 Target</option>
                                            <option value="bx bx-trophy">🏆 Trophy</option>
                                            <option value="bx bx-task">✓ Task</option>
                                        </optgroup>
                                        <optgroup label="Location & Global">
                                            <option value="bx bx-globe">🌍 Globe</option>
                                            <option value="bx bx-map">🗺️ Map</option>
                                            <option value="bx bx-map-pin">📍 Map Pin</option>
                                            <option value="bx bx-buildings">🏢 Buildings</option>
                                        </optgroup>
                                        <optgroup label="Finance">
                                            <option value="bx bx-donate-blood">🩸 Donate</option>
                                            <option value="bx bx-coin-stack">🪙 Coins</option>
                                            <option value="bx bx-money">💵 Money</option>
                                        </optgroup>
                                        <optgroup label="Other">
                                            <option value="bx bx-star">⭐ Star</option>
                                            <option value="bx bxs-star">🌟 Star Filled</option>
                                            <option value="bx bx-smile">😊 Smile</option>
                                            <option value="bx bx-like">👍 Like</option>
                                            <option value="bx bx-award">🏅 Award</option>
                                        </optgroup>
                                    </select>
                                    
                                    <div class="text-center p-4 mt-3 bg-light border rounded" id="iconPreview">
                                        <i class="bx bx-image-add" style="font-size: 48px; color: #ccc;"></i>
                                        <p class="mt-2 mb-0 text-muted small">Select icon to preview</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary px-4" type="submit">
                                <i class="bx bx-save"></i> Save Impact
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

