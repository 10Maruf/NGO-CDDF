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
            <a href="{{ route('admin.focus_areas.add') }}" class="btn btn-primary">Add Focus Area</a>
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
                                <th width="40"><input type="checkbox" id="select-all"></th>
                                <th width="60">#</th>
                                <th>Title</th>
                                <th width="90">Order</th>
                                <th width="110">Status</th>
                                <th width="160">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($focus_areas as $item)
                                <tr>
                                    <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <div class="fw-bold">{{ $item->title }}</div>
                                        <div class="text-muted" style="max-width: 650px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            {{ $item->description }}
                                        </div>
                                    </td>
                                    <td>{{ $item->order }}</td>
                                    <td>
                                        @if ($item->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-actions">
                                            @if ($item->is_active)
                                                <a href="{{ route('admin.focus_areas.toggle', $item->id) }}" class="btn btn-success" title="Active – Click to Deactivate">
                                                    <i class="feather-check-circle"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.focus_areas.toggle', $item->id) }}" class="btn btn-secondary" title="Inactive – Click to Activate">
                                                    <i class="feather-x-circle"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('admin.focus_areas.edit', $item->id) }}" class="btn btn-primary" title="Edit">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.focus_areas.delete', $item->id) }}" class="btn btn-danger" data-delete data-delete-title="Delete Focus Area" data-delete-message="Are you sure you want to delete this focus area? This action cannot be undone." title="Delete">
                                                <i class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                <td colspan="6" class="text-center text-muted">No focus areas found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

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
<script>
    $(document).ready(function() {
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
