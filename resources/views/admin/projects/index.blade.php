@extends('layouts.admin')

@section('title_l1', 'Projects')
@section('bread_crumb')
    <li class="breadcrumb-item">Projects</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-uppercase">All Projects</h6>
            <a href="{{ route('project.add') }}" class="btn btn-primary">
                <i class="feather-plus me-1"></i> Add Project
            </a>
        </div>
        <hr/>

        <!-- Filter Form -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('project.index') }}" method="GET" class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="">All Statuses</option>
                            <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="focus_area" class="form-label">Focus Area</label>
                        <select name="focus_area" id="focus_area" class="form-select">
                            <option value="">All Focus Areas</option>
                            @foreach($all_focus_areas as $area)
                                <option value="{{ $area->id }}" {{ request('focus_area') == $area->id ? 'selected' : '' }}>{{ $area->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="start_date" class="form-label">Start Date (From)</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="end_date" class="form-label">End Date (To)</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100"><i class="feather-filter me-1"></i> Filter</button>
                    </div>
                </form>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="60">#</th>
                                <th width="80">Image</th>
                                <th>Title</th>
                                <th width="100">Status</th>
                                <th width="100">Timeline</th>
                                <th width="80">Partners</th>
                                <th width="80">Focus</th>
                                <th width="80">Featured</th>
                                <th width="80">Active</th>
                                <th width="160">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        @if ($item->cover_image)
                                            <img src="{{ asset('images/project/' . $item->cover_image) }}"
                                                 alt="{{ $item->title }}"
                                                 style="width:60px;height:40px;object-fit:cover;border-radius:4px;">
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-bold" style="max-width:200px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" title="{{ $item->title }}">
                                            {{ $item->title }}
                                        </div>
                                        <div class="text-muted small" style="max-width:200px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" title="{{ $item->short_description }}">
                                            {{ $item->short_description }}
                                        </div>
                                        @if ($item->location)
                                            <small class="text-info"><i class="feather-map-pin"></i> {{ $item->location }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status === 'ongoing')
                                            <span class="badge bg-success">Ongoing</span>
                                        @else
                                            <span class="badge bg-secondary">Completed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="small">
                                            <strong>Start:</strong> {{ $item->start_date ? $item->start_date->format('d M Y') : '—' }}<br>
                                            <strong>End:</strong> {{ $item->end_date ? $item->end_date->format('d M Y') : '—' }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-info">{{ $item->partners_count }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-warning text-dark">{{ $item->focus_areas_count }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if ($item->is_featured)
                                            <span class="badge bg-primary">Yes</span>
                                        @else
                                            <span class="badge bg-light text-dark">No</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($item->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-actions">
                                            <button type="button" class="btn btn-info text-white" title="View"
                                                    data-bs-toggle="modal" data-bs-target="#viewProjectModal{{ $item->id }}">
                                                <i class="feather-eye"></i>
                                            </button>
                                            <a href="{{ route('project.edit', $item->id) }}"
                                               class="btn btn-primary" title="Edit">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="{{ route('project.delete', $item->id) }}"
                                               class="btn btn-danger"
                                               data-delete
                                               data-delete-title="Delete Project"
                                               data-delete-message="Are you sure you want to delete '{{ $item->title }}'? This action cannot be undone."
                                               title="Delete">
                                                <i class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center text-muted py-4">No projects found. <a href="{{ route('project.add') }}">Add one now.</a></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- View Modals (Outside the table to prevent z-index/backdrop issues) --}}
@foreach ($projects as $item)
<div class="modal fade" id="viewProjectModal{{ $item->id }}" tabindex="-1" aria-hidden="true" style="z-index: 1055;">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $item->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                @if ($item->cover_image)
                    <div class="text-center mb-3">
                        <img src="{{ asset('images/project/' . $item->cover_image) }}"
                             alt="{{ $item->title }}"
                             class="img-fluid rounded"
                             style="max-height: 400px; width: auto; object-fit: contain;">
                    </div>
                @endif

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="p-3 border rounded bg-light h-100">
                            <h6 class="fw-bold mb-3 text-primary"><i class="feather-info me-1"></i> Project Details</h6>
                            <p class="mb-2"><strong>Status:</strong>
                                @if ($item->status === 'ongoing')
                                    <span class="badge bg-success">Ongoing</span>
                                @else
                                    <span class="badge bg-secondary">Completed</span>
                                @endif
                            </p>
                            <p class="mb-2"><strong>Timeline:</strong><br>
                                <span class="text-muted">{{ $item->start_date ? $item->start_date->format('d M Y') : '—' }}</span> <i class="feather-arrow-right mx-1 small"></i> <span class="text-muted">{{ $item->end_date ? $item->end_date->format('d M Y') : '—' }}</span>
                            </p>
                            <p class="mb-2"><strong>Location:</strong> {{ $item->location ?? '—' }}</p>
                            <p class="mb-0"><strong>Budget:</strong> {{ $item->budget ? number_format($item->budget, 2) . ' BDT' : '—' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 border rounded bg-light h-100">
                            <h6 class="fw-bold mb-3 text-primary"><i class="feather-list me-1"></i> Additional Info</h6>
                            <p class="mb-2"><strong>Beneficiaries:</strong> {{ $item->beneficiary_count ?? '—' }}</p>
                            <p class="mb-2"><strong>Implementing Partner:</strong> {{ $item->implementing_partner ?? '—' }}</p>
                            <div class="mb-2">
                                <strong>Partners/Donors:</strong>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    @forelse($item->partners as $partner)
                                        <span class="badge bg-info text-dark">{{ $partner->name }}</span>
                                    @empty
                                        <span class="text-muted small">None</span>
                                    @endforelse
                                </div>
                            </div>
                            <div class="mb-0">
                                <strong>Focus Areas:</strong>
                                <div class="d-flex flex-wrap gap-1 mt-1">
                                    @forelse($item->focusAreas as $area)
                                        <span class="badge bg-warning text-dark">{{ $area->title }}</span>
                                    @empty
                                        <span class="text-muted small">None</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold border-bottom pb-2 text-primary">Summary</h6>
                    <p class="text-muted lead fs-6">{{ $item->short_description }}</p>
                </div>

                @if($item->detail_description)
                <div class="mb-3">
                    <h6 class="fw-bold border-bottom pb-2 text-primary">Full Description</h6>
                    <div class="p-3 rounded bg-white border">
                        {!! $item->detail_description !!}
                    </div>
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@push('scripts')
<script>
    // Fix for modal backdrop issue in some admin templates
    $(document).ready(function() {
        $('.modal').on('show.bs.modal', function () {
            // Move modal to body to avoid z-index issues with parent containers
            $(this).appendTo('body');
        });
    });
</script>
@endpush
