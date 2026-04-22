@extends('layouts.admin')

@section('title_l1', 'Key Focus Areas')
@section('bread_crumb')
    <li class="breadcrumb-item">Focus Areas</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-11 mx-auto">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-uppercase">Key Focus Areas</h6>
            <a href="{{ route('admin.focus_areas.add') }}" class="btn btn-dark">Add Focus Area</a>
        </div>
        <hr/>

        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="30"></th>
                                <th width="40"><input type="checkbox" id="select-all"></th>
                                <th width="50">#</th>
                                <th width="60" class="text-center">Icon</th>
                                <th width="90" class="text-center">Hero Image</th>
                                <th>Title & Description</th>
                                <th width="100" class="text-center">Status</th>
                                <th width="140" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-focus-areas">
                            @forelse ($focus_areas as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td class="text-center drag-handle" style="cursor: grab;">
                                        <i class="fa-solid fa-grip-vertical fs-5 text-muted"></i>
                                    </td>
                                    <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                    <td class="serial-number">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        @if (isset($item->icon_class) && $item->icon_class)
                                            <i class="{{ $item->icon_class }} fs-4 text-primary"></i>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if (isset($item->image_path) && $item->image_path)
                                            <img src="{{ asset('storage/'.$item->image_path) }}" alt="" style="width:60px;height:40px;object-fit:cover;border-radius:4px;">
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-bold" style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $item->title }}">{{ $item->title }}</div>
                                        <div class="text-muted small" style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $item->description }}">
                                            {{ $item->description }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if ($item->is_active)
                                            <span class="badge bg-success d-block mb-1">Active</span>
                                        @else
                                            <span class="badge bg-secondary d-block mb-1">Inactive</span>
                                        @endif
                                        @if (isset($item->show_on_navbar) && $item->show_on_navbar)
                                            <span class="badge bg-info d-block">Navbar</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-actions justify-content-center">
                                            <button type="button" class="btn btn-info btn-sm text-white" title="View"
                                                    data-bs-toggle="modal" data-bs-target="#viewFocusModal{{ $item->id }}">
                                                <i class="feather-eye"></i>
                                            </button>
                                            <a href="{{ route('admin.focus_areas.edit', $item->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                                <i class="feather-edit"></i>
                                            </a>
                                            @if ($item->is_active)
                                                <a href="{{ route('admin.focus_areas.toggle', $item->id) }}" class="btn btn-success btn-sm" title="Active – Click to Deactivate">
                                                    <i class="feather-check-circle"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.focus_areas.toggle', $item->id) }}" class="btn btn-secondary btn-sm" title="Inactive – Click to Activate">
                                                    <i class="feather-x-circle"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('admin.focus_areas.delete', $item->id) }}" class="btn btn-danger btn-sm" data-delete data-delete-title="Delete Focus Area" data-delete-message="Are you sure you want to delete this focus area? This action cannot be undone." title="Delete">
                                                <i class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                <td colspan="8" class="text-center text-muted py-4">No focus areas found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- View Modals --}}
@foreach ($focus_areas as $item)
<div class="modal fade" id="viewFocusModal{{ $item->id }}" tabindex="-1" aria-hidden="true" style="z-index: 1055;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $item->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <div class="row mb-4 align-items-center">
                    <div class="col-8 text-center border-end">
                        <label class="d-block text-muted small mb-2">Hero Image</label>
                        @if (isset($item->image_path) && $item->image_path)
                            <img src="{{ asset('storage/'.$item->image_path) }}" alt="{{ $item->title }}"
                                 class="img-fluid rounded shadow-sm" style="max-height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-light rounded p-4 text-muted"><i class="feather-image fs-1"></i><br>No Image</div>
                        @endif
                    </div>
                    <div class="col-4 text-center">
                        <label class="d-block text-muted small mb-2">Icon</label>
                        @if (isset($item->icon_class) && $item->icon_class)
                            <i class="{{ $item->icon_class }} text-primary" style="font-size: 60px;"></i>
                        @else
                            <span class="text-muted">No Icon</span>
                        @endif
                    </div>
                </div>

                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <th width="30%" class="bg-light">Title</th>
                            <td>{{ $item->title }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Order</th>
                            <td>{{ $item->order }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Status</th>
                            <td>
                                @if ($item->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                                
                                @if (isset($item->show_on_navbar) && $item->show_on_navbar)
                                    <span class="badge bg-info ms-1">Navbar</span>
                                @endif
                                @if (isset($item->show_on_footer) && $item->show_on_footer)
                                    <span class="badge bg-info ms-1">Footer</span>
                                @endif
                                @if (isset($item->show_on_learn_more) && $item->show_on_learn_more)
                                    <span class="badge bg-primary ms-1">Learn More</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-3">
                    <h6 class="fw-bold border-bottom pb-2 text-primary">Description</h6>
                    <p class="text-muted">{{ $item->description }}</p>
                </div>
                
                @if($item->detail_description)
                <div class="mt-3">
                    <h6 class="fw-bold border-bottom pb-2 text-primary">Full Details</h6>
                    <div class="p-3 bg-light rounded border">
                        {!! $item->detail_description !!}
                    </div>
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <a href="{{ route('admin.focus_areas.edit', $item->id) }}" class="btn btn-primary btn-sm">
                    <i class="feather-edit me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        // Drag and Drop Sortable for Focus Areas
        $("#sortable-focus-areas").sortable({
            handle: ".drag-handle",
            update: function(event, ui) {
                let orderedIds = [];
                $(this).children('tr').each(function(index) {
                    orderedIds.push($(this).data('id'));
                    $(this).find('.serial-number').text(index + 1); // Update serial visually
                });

                $.ajax({
                    url: "{{ route('admin.focus_areas.updateOrder') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        order: orderedIds
                    },
                    success: function(response) {
                        // Optional: show a toast/alert or just update visually
                        console.log(response.message);
                    }
                });
            }
        });

        // Fix for modal backdrop issue
        $('.modal').on('show.bs.modal', function () {
            $(this).appendTo('body');
        });

        $('#select-all').on('change', function() {
            $('.select-item').prop('checked', $(this).prop('checked'));
            toggleBulkActions();
        });

        $('.select-item').on('change', function() {
            $('#select-all').prop('checked', $('.select-item:checked').length == $('.select-item').length);
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

        function getSelectedIds() {
            var ids = [];
            $('.select-item:checked').each(function() { ids.push($(this).val()); });
            return ids;
        }

        $('#bulk-delete').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;

            var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            $('#deleteConfirmModalLabel').text('Delete Selected Focus Areas');
            $('#deleteConfirmMessage').text('Are you sure you want to delete ' + ids.length + ' selected focus area(s)? This action cannot be undone.');

            $('#confirmDeleteBtn').off('click.bulk').attr('href', '#');
            $('#confirmDeleteBtn').on('click.bulk', function(e) {
                e.preventDefault();
                deleteModal.hide();
                $.ajax({
                    url: "{{ route('admin.focus_areas.bulk_delete') }}",
                    method: "POST",
                    data: { ids: ids, _token: "{{ csrf_token() }}" },
                    success: function() { location.reload(); },
                    error: function() { alert('Something went wrong!'); }
                });
            });

            deleteModal.show();
        });

        $('#bulk-activate').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;
            updateStatus(ids, 1);
        });

        $('#bulk-deactivate').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;
            updateStatus(ids, 0);
        });

        $('#bulk-clear').on('click', function() {
            $('.select-item, #select-all').prop('checked', false);
            toggleBulkActions();
        });

        function updateStatus(ids, status) {
            $.ajax({
                url: "{{ route('admin.focus_areas.bulk_status') }}",
                method: "POST",
                data: { ids: ids, status: status, _token: "{{ csrf_token() }}" },
                success: function() { location.reload(); },
                error: function() { alert('Something went wrong!'); }
            });
        }
    });
</script>
@endsection
