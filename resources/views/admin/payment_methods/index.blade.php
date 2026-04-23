@extends('layouts.admin')

@section('title_l1', 'Payment Methods')
@section('bread_crumb')
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item active">Payment Methods</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="mb-0 text-uppercase">All Payment Methods</h6>
            <a href="{{ route('admin.payment_methods.add') }}" class="btn btn-primary btn-sm">
                <i class="feather-plus me-1"></i> Add New Method
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="30"></th>
                                <th width="3%"><input type="checkbox" id="select-all"></th>
                                <th width="5%">#</th>
                                <th width="10%">Icon</th>
                                <th width="15%">Type</th>
                                <th width="20%">Account Name</th>
                                <th width="20%">Account Number</th>
                                <th width="10%">Status</th>
                                <th width="12%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-payment-methods">
                            @forelse ($data as $item)
                            <tr data-id="{{ $item->id }}">
                                <td class="text-center drag-handle" style="cursor: grab;">
                                    <i class="fa-solid fa-grip-vertical fs-5 text-muted"></i>
                                </td>
                                <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                <td class="serial-number">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    @if($item->icon_image)
                                        <img src="{{ asset('storage/'.$item->icon_image) }}" alt="{{ $item->type }}" style="height: 40px;">
                                    @elseif($item->type == 'bank')
                                        <i class="fa-solid fa-building-columns" style="font-size: 28px;"></i>
                                    @elseif(file_exists(public_path('img/'.$item->type.'.png')))
                                        <img src="{{ asset('img/'.$item->type.'.png') }}" alt="{{ $item->type }}" style="height: 40px;">
                                    @else
                                        <span class="badge bg-secondary">No Icon</span>
                                    @endif
                                </td>
                                <td><strong>{{ ucfirst($item->type) }}</strong></td>
                                <td>{{ $item->account_name }}</td>
                                <td>{{ $item->account_number }}</td>
                                <td>
                                    @if($item->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="table-actions justify-content-center">
                                        @if($item->is_active)
                                            <a href="{{ route('admin.payment_methods.toggle', $item->id) }}" class="btn btn-success" title="Active – Click to Deactivate">
                                                <i class="feather-check-circle"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('admin.payment_methods.toggle', $item->id) }}" class="btn btn-secondary" title="Inactive – Click to Activate">
                                                <i class="feather-x-circle"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('admin.payment_methods.edit', $item->id) }}" 
                                           class="btn btn-primary" 
                                           title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.payment_methods.delete', $item->id) }}" 
                                           class="btn btn-danger" 
                                           data-delete 
                                           data-delete-title="Delete Payment Method" 
                                           data-delete-message="Are you sure you want to delete this payment method? This action cannot be undone."
                                           title="Delete">
                                            <i class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">
                                    <i class="bx bx-info-circle" style="font-size: 24px;"></i>
                                    <p class="mb-0 mt-2">No payment methods found. Add your first payment method!</p>
                                </td>
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
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        // Drag and Drop Sortable
        $("#sortable-payment-methods").sortable({
            handle: ".drag-handle",
            update: function(event, ui) {
                let orderedIds = [];
                $(this).children('tr').each(function(index) {
                    orderedIds.push($(this).data('id'));
                    $(this).find('.serial-number').text(index + 1);
                });

                $.ajax({
                    url: "{{ route('admin.payment_methods.updateOrder') }}",
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
            $('#deleteConfirmModalLabel').text('Delete Selected Payment Methods');
            $('#deleteConfirmMessage').text('Are you sure you want to delete ' + ids.length + ' selected payment method(s)? This action cannot be undone.');

            $('#confirmDeleteBtn').off('click.bulk').attr('href', '#');
            $('#confirmDeleteBtn').on('click.bulk', function(e) {
                e.preventDefault();
                deleteModal.hide();
                $.ajax({
                    url: "{{ route('admin.payment_methods.bulk_delete') }}",
                    method: "POST",
                    data: { ids: ids, _token: "{{ csrf_token() }}" },
                    success: function() { location.reload(); },
                    error: function() { alert('Something went wrong!'); }
                });
            });

            deleteModal.show();
        });

        $('#bulk-clear').on('click', function() {
            $('.select-item, #select-all').prop('checked', false);
            toggleBulkActions();
        });

        // Bulk Activate
        $('#bulk-activate').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;
            updateStatus(ids, 1);
        });

        // Bulk Deactivate
        $('#bulk-deactivate').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;
            updateStatus(ids, 0);
        });

        function updateStatus(ids, status) {
            $.ajax({
                url: "{{ route('admin.payment_methods.bulk_status') }}",
                method: "POST",
                data: { ids: ids, status: status, _token: "{{ csrf_token() }}" },
                success: function() { location.reload(); },
                error: function() { alert('Something went wrong!'); }
            });
        }
    });
</script>
@endsection
