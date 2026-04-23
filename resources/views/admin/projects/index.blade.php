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
            <a href="{{ route('project.add') }}" class="btn btn-primary btn-sm">
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
                                <th width="40"><input type="checkbox" id="select-all"></th>
                                <th width="60">#</th>
                                <th width="80">Image</th>
                                <th>Title</th>
                                <th width="100">Status</th>
                                <th width="100">Timeline</th>
                                <th width="100" class="text-center">Stats</th>
                                <th width="100" class="text-center">Flags</th>
                                <th width="160">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $item)
                                <tr>
                                    <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
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
                                        <small class="d-block"><i class="feather-users text-info me-1"></i>{{ $item->partners_count }} Partners</small>
                                        <small class="d-block"><i class="feather-target text-warning me-1"></i>{{ $item->focus_areas_count }} Focus</small>
                                    </td>
                                    <td class="text-center">
                                        @if ($item->is_featured)
                                            <span class="badge bg-primary d-block mb-1">Featured</span>
                                        @endif
                                        @if ($item->is_active)
                                            <span class="badge bg-success d-block">Active</span>
                                        @else
                                            <span class="badge bg-secondary d-block">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-actions">
                                            <button type="button" class="btn btn-info btn-sm text-white" title="View"
                                                    data-bs-toggle="modal" data-bs-target="#viewProjectModal{{ $item->id }}">
                                                <i class="feather-eye"></i>
                                            </button>
                                            <a href="{{ route('project.edit', $item->id) }}"
                                               class="btn btn-primary btn-sm" title="Edit">
                                                <i class="feather-edit"></i>
                                            </a>
                                            @if($item->is_active)
                                                <a href="{{ route('project.toggle_status', $item->id) }}"
                                                   class="btn btn-success btn-sm" title="Active – Click to Deactivate">
                                                    <i class="feather-check-circle"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('project.toggle_status', $item->id) }}"
                                                   class="btn btn-secondary btn-sm" title="Inactive – Click to Activate">
                                                    <i class="feather-x-circle"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('project.delete', $item->id) }}"
                                               class="btn btn-danger btn-sm"
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
                                    <td colspan="10" class="text-center text-muted py-4">No projects found. <a href="{{ route('project.add') }}">Add one now.</a></td>
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

{{-- Bulk Action Sticky Bar --}}
<style> html.minimenu #bulk-bar { left: 100px !important; } </style>
<div id="bulk-bar" style="display:none; position:fixed; bottom:0; left:280px; right:0; background:#fff; padding:12px 24px; z-index:1050; box-shadow:0 -2px 12px rgba(0,0,0,0.1); border-top:1px solid #e5e7eb; transition: left 0.3s ease;">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-primary px-3 py-2" id="bulk-count" style="font-size:1rem;">0</span>
            <span class="text-muted small">items selected</span>
        </div>
        <div class="table-actions ms-4">
            <button class="btn btn-danger" id="bulk-delete" title="Delete Selected">
                <i class="feather-trash-2"></i>
            </button>
            <button class="btn btn-success" id="bulk-activate" title="Activate">
                <i class="feather-check-circle"></i>
            </button>
            <button class="btn btn-secondary" id="bulk-deactivate" title="Deactivate">
                <i class="feather-x-circle"></i>
            </button>
            <button class="btn btn-primary" id="bulk-clear" title="Clear Selection">
                <i class="feather-x"></i>
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function () {

        // Fix for modal backdrop issue
        $('.modal').on('show.bs.modal', function () {
            $(this).appendTo('body');
        });

        // Select All
        $('#select-all').on('change', function () {
            $('.select-item').prop('checked', $(this).prop('checked'));
            toggleBulkActions();
        });

        // Individual Select
        $('.select-item').on('change', function () {
            $('#select-all').prop('checked', $('.select-item:checked').length === $('.select-item').length);
            toggleBulkActions();
        });

        function toggleBulkActions() {
            var count = $('.select-item:checked').length;
            if (count > 0) {
                $('#bulk-count').text(count);
                $('#bulk-bar').css('display', 'flex');
            } else {
                $('#bulk-bar').hide();
            }
        }

        // Bulk Delete
        $('#bulk-delete').on('click', function () {
            var ids = [];
            $('.select-item:checked').each(function () { ids.push($(this).val()); });
            if (ids.length === 0) return;

            var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            $('#deleteConfirmModalLabel').text('Delete Selected Projects');
            $('#deleteConfirmMessage').text('Are you sure you want to delete ' + ids.length + ' selected project(s)? This action cannot be undone.');
            $('#confirmDeleteBtn').off('click.bulk').attr('href', '#');
            $('#confirmDeleteBtn').on('click.bulk', function (e) {
                e.preventDefault();
                deleteModal.hide();
                $.ajax({
                    url: "{{ route('project.bulk_delete') }}",
                    method: 'POST',
                    data: { ids: ids, _token: "{{ csrf_token() }}" },
                    success: function () { location.reload(); },
                    error:   function () { alert('Something went wrong!'); }
                });
            });
            deleteModal.show();
        });

        // Bulk Activate
        $('#bulk-activate').on('click', function () { updateStatus(1); });

        // Bulk Deactivate
        $('#bulk-deactivate').on('click', function () { updateStatus(0); });

        // Clear Selection
        $('#bulk-clear').on('click', function () {
            $('.select-item, #select-all').prop('checked', false);
            toggleBulkActions();
        });

        function updateStatus(status) {
            var ids = [];
            $('.select-item:checked').each(function () { ids.push($(this).val()); });
            $.ajax({
                url: "{{ route('project.bulk_status') }}",
                method: 'POST',
                data: { ids: ids, status: status, _token: "{{ csrf_token() }}" },
                success: function () { location.reload(); },
                error:   function () { alert('Something went wrong!'); }
            });
        }

    });
</script>
@endpush
