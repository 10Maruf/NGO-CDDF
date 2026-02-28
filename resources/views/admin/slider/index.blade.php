@extends('layouts.admin')

@section('title_l1', 'Sliders')
@section('bread_crumb')
    <li class="breadcrumb-item">Sliders</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <div class="d-flex align-items-center gap-2">
                <h6 class="mb-0 text-uppercase">All Sliders</h6>
                <div id="bulk-actions" class="d-none gap-1">
                    <div class="table-actions">
                        <button class="btn btn-danger btn-sm" id="bulk-delete" title="Delete Selected">
                            <i class="feather-trash-2"></i>
                        </button>
                        <button class="btn btn-success btn-sm" id="bulk-activate" title="Activate">
                            <i class="feather-check-circle"></i>
                        </button>
                        <button class="btn btn-secondary btn-sm" id="bulk-deactivate" title="Deactivate">
                            <i class="feather-x-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
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
                                <th width="40"><input type="checkbox" id="select-all"></th>
                                <th>SL.</th>
                                <th>Order</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slider as $key => $row)
                            <tr>
                                <td><input type="checkbox" class="select-item" value="{{ $row->id }}"></td>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $row->order }}</td>
                                <td class="align-middle w-25">{{ $row->title }}</td>
                                <td class="align-middle">
                                    <img src="{{ asset('images/slider/'.$row->image) }}" alt="" width="50">
                                </td>
                                <td class="align-middle w-25">{{ Str::limit($row->description,30,'..' )}}</td>
                                <td class="align-middle">
                                    @if(isset($row->status) && $row->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <div class="table-actions justify-content-center">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
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
            if ($('.select-item:checked').length > 0) {
                $('#bulk-actions').removeClass('d-none').addClass('d-flex');
            } else {
                $('#bulk-actions').removeClass('d-flex').addClass('d-none');
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
