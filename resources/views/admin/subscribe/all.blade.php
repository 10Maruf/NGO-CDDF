@extends('layouts.admin')

@section('title_l1', 'Subscribers')
@section('bread_crumb')
    <li class="breadcrumb-item">Subscribers</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Subscription</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-danger">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th width="40"><input type="checkbox" id="select-all"></th>
                                <th width="50">SL.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-center" width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscribe as $key=>$row)
                                <tr>
                                    <td><input type="checkbox" class="select-item" value="{{ $row->id }}"></td>
                                    <td>{{ ++$key }}</td>
                                    <td class="text-wrap" style="max-width: 200px;">{{ $row->name }}</td>
                                    <td class="text-wrap" style="max-width: 250px;">{{ $row->email }}</td>
                                <td class="align-middle text-center">
                                    <div class="table-actions d-flex justify-content-center">
                                        <a href="{{ route('subscribe.delete',$row->id) }}" class="btn btn-danger btn-sm" data-delete data-delete-title="Delete Subscriber" data-delete-message="Are you sure you want to delete this subscriber? This action cannot be undone." title="Delete">
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
            <button class="btn btn-primary" id="bulk-clear" title="Clear Selection">
                <i class="feather-x"></i>
            </button>
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
            $('#deleteConfirmModalLabel').text('Delete Selected Subscribers');
            $('#deleteConfirmMessage').text('Are you sure you want to delete ' + ids.length + ' selected subscriber(s)? This action cannot be undone.');

            // Detach previous bulk handler to avoid stacking
            $('#confirmDeleteBtn').off('click.bulk');
            $('#confirmDeleteBtn').attr('href', '#'); // Disable link nav

            // One-time confirm
            $('#confirmDeleteBtn').on('click.bulk', function(e) {
                e.preventDefault();
                deleteModal.hide();
                
                $.ajax({
                    url: "{{ route('subscribe.bulk_delete') }}",
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

        // Clear Selection
        $('#bulk-clear').on('click', function () {
            $('.select-item, #select-all').prop('checked', false);
            toggleBulkActions();
        });
    });
</script>
@endsection
