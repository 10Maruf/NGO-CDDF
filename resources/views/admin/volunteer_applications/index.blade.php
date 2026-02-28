@extends('layouts.admin')

@section('title_l1', 'Volunteers')
@section('bread_crumb')
    <li class="breadcrumb-item">Volunteers</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-uppercase">All Volunteers</h6>
            <a href="{{ route('admin.volunteer_applications.add') }}" class="btn btn-primary btn-sm"><i class="feather-plus me-1"></i> Add Volunteer</a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="40"><input type="checkbox" id="select-all"></th>
                                <th>SL.</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">
                                    @if ($item->photo)
                                        <img src="{{ asset('images/volunteers/' . $item->photo) }}" width="42" height="42" style="border-radius:50%; object-fit:cover;">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td class="align-middle">{{ $item->name }}</td>
                                <td class="align-middle">{{ $item->phone ?? '—' }}</td>
                                <td class="align-middle">{{ $item->email ?? '—' }}</td>
                                <td class="align-middle">
                                    @php $badge = ['pending' => 'warning', 'approved' => 'success', 'rejected' => 'danger']; @endphp
                                    <span class="badge bg-{{ $badge[$item->status] ?? 'secondary' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="align-middle">{{ $item->created_at->format('d M Y') }}</td>
                                <td class="align-middle">
                                    <div class="table-actions justify-content-center">
                                        <a href="{{ route('admin.volunteer_applications.show', $item->id) }}" class="btn btn-info btn-sm" title="View">
                                            <i class="feather-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.volunteer_applications.edit', $item->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.volunteer_applications.delete', $item->id) }}" class="btn btn-danger btn-sm" data-delete data-delete-title="Delete Volunteer" data-delete-message="Are you sure?" title="Delete">
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
            <button class="btn btn-success" id="bulk-approve" title="Approve Selected">
                <i class="feather-check-circle"></i>
            </button>
            <button class="btn btn-secondary" id="bulk-reject" title="Reject Selected">
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
        $('#select-all').on('change', function() { $('.select-item').prop('checked', $(this).prop('checked')); toggleBulkActions(); });
        $('.select-item').on('change', function() { $('#select-all').prop('checked', $('.select-item:checked').length == $('.select-item').length); toggleBulkActions(); });
        function toggleBulkActions() { var c = $('.select-item:checked').length; if (c > 0) { $('#bulk-count').text(c); $('#bulk-bar').css('display','flex'); } else { $('#bulk-bar').hide(); } }
        function getSelectedIds() { var ids = []; $('.select-item:checked').each(function() { ids.push($(this).val()); }); return ids; }

        $('#bulk-delete').on('click', function() {
            var ids = getSelectedIds(); if (ids.length === 0) return;
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            $('#deleteConfirmModalLabel').text('Delete Selected Volunteers');
            $('#deleteConfirmMessage').text('Are you sure you want to delete ' + ids.length + ' selected volunteer(s)? This action cannot be undone.');
            $('#confirmDeleteBtn').off('click.bulk').attr('href', '#');
            $('#confirmDeleteBtn').on('click.bulk', function(e) { e.preventDefault(); deleteModal.hide();
                $.ajax({ url: "{{ route('admin.volunteer_applications.bulk_delete') }}", method: "POST", data: { ids: ids, _token: "{{ csrf_token() }}" }, success: function() { location.reload(); }, error: function() { alert('Something went wrong!'); } });
            });
            deleteModal.show();
        });

        $('#bulk-approve').on('click', function() { var ids = getSelectedIds(); if (ids.length === 0) return; updateStatus(ids, 'approved'); });
        $('#bulk-reject').on('click', function() { var ids = getSelectedIds(); if (ids.length === 0) return; updateStatus(ids, 'rejected'); });

        function updateStatus(ids, status) {
            $.ajax({ url: "{{ route('admin.volunteer_applications.bulk_status') }}", method: "POST", data: { ids: ids, status: status, _token: "{{ csrf_token() }}" }, success: function() { location.reload(); }, error: function() { alert('Something went wrong!'); } });
        }

        $('#bulk-clear').on('click', function() { $('.select-item, #select-all').prop('checked', false); toggleBulkActions(); });
    });
</script>
@endsection
