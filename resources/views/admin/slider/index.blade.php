@extends('layouts.admin')

@section('title_l1', 'Sliders')
@section('bread_crumb')
    <li class="breadcrumb-item">Sliders</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <h6 class="mb-0 text-uppercase">All Sliders</h6>
            <a href="{{ route('slider.add') }}" class="btn btn-primary btn-sm">
                <i class="feather-plus me-1"></i> Add Slider
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="30"></th>
                                <th width="40"><input type="checkbox" id="select-all"></th>
                                <th width="50">SL</th>
                                <th>Title & Description</th>
                                <th width="80">Image</th>
                                <th width="90">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-sliders">
                            @foreach ($slider as $key => $row)
                            <tr data-id="{{ $row->id }}">
                                <td class="text-center drag-handle" style="cursor: grab;">
                                    <i class="fa-solid fa-grip-vertical fs-5 text-muted"></i>
                                </td>
                                <td><input type="checkbox" class="select-item" value="{{ $row->id }}"></td>
                                <td class="align-middle serial-number">{{ ++$key }}</td>
                                <td class="align-middle">
                                    <div class="fw-semibold" style="max-width:220px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" title="{{ $row->title }}">{{ $row->title }}</div>
                                    <small class="text-muted">{{ Str::limit($row->description, 50, '...') }}</small>
                                </td>
                                <td class="align-middle">
                                    <img src="{{ asset('images/slider/'.$row->image) }}" alt="" width="60" style="border-radius:4px;object-fit:cover;height:40px;">
                                </td>
                                <td class="align-middle">
                                    @if(isset($row->status) && $row->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <div class="table-actions justify-content-center">
                                        <button type="button" class="btn btn-info btn-sm" title="View"
                                                data-bs-toggle="modal" data-bs-target="#viewSliderModal{{ $row->id }}">
                                            <i class="feather-eye"></i>
                                        </button>
                                        <a href="{{ route('slider.edit',$row->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        @if(isset($row->status) && $row->status == 1)
                                            <a href="{{ route('slider.toggle_status',$row->id) }}" class="btn btn-success btn-sm" title="Active – Click to Deactivate">
                                                <i class="feather-check-circle"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('slider.toggle_status',$row->id) }}" class="btn btn-secondary btn-sm" title="Inactive – Click to Activate">
                                                <i class="feather-x-circle"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('slider.delete',$row->id) }}" class="btn btn-danger btn-sm" data-delete data-delete-title="Delete Slider" data-delete-message="Are you sure you want to delete this slider? This action cannot be undone." title="Delete">
                                            <i class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- View Modals --}}
@foreach ($slider as $row)
<div class="modal fade" id="viewSliderModal{{ $row->id }}" tabindex="-1" aria-hidden="true" style="z-index: 1055;">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $row->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                @if($row->image)
                    <img src="{{ asset('images/slider/'.$row->image) }}" alt="{{ $row->title }}"
                         class="img-fluid rounded mb-3 w-100" style="max-height:300px;object-fit:cover;">
                @endif
                <table class="table table-borderless table-sm">
                    <tr><td width="120"><strong>Title:</strong></td><td>{{ $row->title }}</td></tr>
                    <tr><td><strong>Description:</strong></td><td>{{ $row->description }}</td></tr>
                    <tr><td><strong>Order:</strong></td><td>{{ $row->order }}</td></tr>
                    <tr>
                        <td><strong>Status:</strong></td>
                        <td>
                            @if($row->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <a href="{{ route('slider.edit',$row->id) }}" class="btn btn-primary btn-sm">
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
        // Drag and Drop Sortable for Sliders
        $("#sortable-sliders").sortable({
            handle: ".drag-handle",
            update: function(event, ui) {
                let orderedIds = [];
                $(this).children('tr').each(function(index) {
                    orderedIds.push($(this).data('id'));
                    $(this).find('.serial-number').text(index + 1); // Update serial visually
                });

                $.ajax({
                    url: "{{ route('slider.updateOrder') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        order: orderedIds
                    },
                    success: function(response) {
                        console.log(response.message);
                    }
                });
            }
        });
        // Fix for modal backdrop issue
        $('.modal').on('show.bs.modal', function () {
            $(this).appendTo('body');
        });

        // Select All
        $('#select-all').on('change', function() {
            var isChecked = $(this).prop('checked');
            $('.select-item').prop('checked', isChecked);
            toggleBulkActions();
        });

        // Individual Select
        $('.select-item').on('change', function() {
            if ($('.select-item:checked').length == $('.select-item').length) {
                $('#select-all').prop('checked', true);
            } else {
                $('#select-all').prop('checked', false);
            }
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
        $('#bulk-delete').on('click', function() {
            var ids = [];
            $('.select-item:checked').each(function() {
                ids.push($(this).val());
            });
            if (ids.length === 0) return;

            // Use the existing Bootstrap delete modal
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            $('#deleteConfirmModalLabel').text('Delete Selected Sliders');
            $('#deleteConfirmMessage').text('Are you sure you want to delete ' + ids.length + ' selected slider(s)? This action cannot be undone.');

            // Detach previous bulk handler to avoid stacking
            $('#confirmDeleteBtn').off('click.bulk');
            $('#confirmDeleteBtn').attr('href', '#');

            // One-time confirm
            $('#confirmDeleteBtn').on('click.bulk', function(e) {
                e.preventDefault();
                deleteModal.hide();
                $.ajax({
                    url: "{{ route('slider.bulk_delete') }}",
                    method: "POST",
                    data: {
                        ids: ids,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function() { location.reload(); },
                    error: function() { alert('Something went wrong!'); }
                });
            });

            deleteModal.show();
        });

        // Bulk Activate
        $('#bulk-activate').on('click', function() {
            updateStatus(1);
        });

        // Bulk Deactivate
        $('#bulk-deactivate').on('click', function() {
            updateStatus(0);
        });

        // Clear Selection
        $('#bulk-clear').on('click', function () {
            $('.select-item, #select-all').prop('checked', false);
            toggleBulkActions();
        });

        function updateStatus(status) {
            var ids = [];
            $('.select-item:checked').each(function() {
                ids.push($(this).val());
            });

            $.ajax({
                url: "{{ route('slider.bulk_status') }}",
                method: "POST",
                data: {
                    ids: ids,
                    status: status,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr) {
                    alert('Something went wrong!');
                }
            });
        }
    });
</script>
@endsection
