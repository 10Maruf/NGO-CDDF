@extends('layouts.admin')

@section('title_l1', 'Donations List')
@section('bread_crumb')
    <li class="breadcrumb-item">Donations</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Donations</h6>
        <hr/>
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Donations List</h6>
                    <div>
                        <!-- Filter Form -->
                        <form method="GET" action="{{ route('admin.donations.index') }}" class="d-inline-flex gap-2">
                            <select name="status" class="form-select form-select-sm" style="width: 150px;">
                                <option value="">All Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Verified</option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            <input type="date" name="date" class="form-control form-control-sm" value="{{ request('date') }}" style="width: 150px;">
                            <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                            <a href="{{ route('admin.donations.index') }}" class="btn btn-sm btn-secondary">Reset</a>
                        </form>
                    </div>
                </div>
            </div>
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
                                <th width="3%"><input type="checkbox" id="select-all"></th>
                                <th width="5%">SL</th>
                                <th width="14%">Donor Name</th>
                                <th width="10%">Phone</th>
                                <th width="12%">Transaction ID</th>
                                <th width="10%">Amount</th>
                                <th width="12%">Payment Method</th>
                                <th width="10%">Status</th>
                                <th width="12%">Date</th>
                                <th width="14%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key=>$item)
                            <tr>
                                <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                <td>{{ $data->firstItem() + $key }}</td>
                                <td><strong>{{ $item->donor_name }}</strong></td>
                                <td>{{ $item->donor_phone }}</td>
                                <td><code>{{ $item->transaction_id }}</code></td>
                                <td><strong>৳ {{ number_format($item->amount, 2) }}</strong></td>
                                <td>
                                    @if($item->paymentMethod)
                                        <span class="badge bg-info">{{ ucfirst($item->paymentMethod->type) }}</span>
                                    @else
                                        <span class="badge bg-secondary">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($item->status == 'verified')
                                        <span class="badge bg-success">Verified</span>
                                    @else
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                                <td><small>{{ $item->created_at->format('d M Y') }}<br>{{ $item->created_at->format('h:i A') }}</small></td>
                                <td class="text-center">
                                    <div class="table-actions justify-content-center">
                                        <a href="{{ route('admin.donations.show', $item->id) }}" 
                                           class="btn btn-info" 
                                           title="View Details">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        @if($item->status == 'pending')
                                        <form action="{{ route('admin.donations.verify', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success" 
                                                    onclick="return confirm('Verify this donation?')"
                                                    title="Verify">
                                                <i class="bx bx-check"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.donations.reject', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-warning" 
                                                    onclick="return confirm('Reject this donation?')"
                                                    title="Reject">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </form>
                                        @endif
                                        <a href="{{ route('admin.donations.delete', $item->id) }}" 
                                           class="btn btn-danger" 
                                           data-delete 
                                           data-delete-title="Delete Donation" 
                                           data-delete-message="Are you sure you want to delete this donation? This action cannot be undone."
                                           title="Delete">
                                            <i class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center text-muted py-4">
                                    <i class="bx bx-info-circle" style="font-size: 24px;"></i>
                                    <p class="mb-0 mt-2">No donations found.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $data->links() }}
                </div>

                <!-- Summary -->
                @if($data->count() > 0)
                <div class="alert alert-info mt-3">
                    <strong>Summary:</strong> 
                    Total: <strong>{{ $data->total() }}</strong> donations | 
                    Page: <strong>{{ $data->currentPage() }}</strong> of <strong>{{ $data->lastPage() }}</strong>
                </div>
                @endif
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

        function getSelectedIds() {
            var ids = [];
            $('.select-item:checked').each(function() {
                ids.push($(this).val());
            });
            return ids;
        }

        // Bulk Delete
        $('#bulk-delete').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;

            var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            $('#deleteConfirmModalLabel').text('Delete Selected Donations');
            $('#deleteConfirmMessage').text('Are you sure you want to delete ' + ids.length + ' selected donation(s)? This action cannot be undone.');

            $('#confirmDeleteBtn').off('click.bulk');
            $('#confirmDeleteBtn').attr('href', '#');

            $('#confirmDeleteBtn').on('click.bulk', function(e) {
                e.preventDefault();
                deleteModal.hide();
                $.ajax({
                    url: "{{ route('admin.donations.bulk_delete') }}",
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

        // Bulk Verify
        $('#bulk-verify').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;
            if (!confirm('Verify ' + ids.length + ' selected donation(s)?')) return;
            updateStatus(ids, 'verified');
        });

        // Bulk Reject
        $('#bulk-reject').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;
            if (!confirm('Reject ' + ids.length + ' selected donation(s)?')) return;
            updateStatus(ids, 'rejected');
        });

        // Bulk Pending
        $('#bulk-pending').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;
            if (!confirm('Mark ' + ids.length + ' selected donation(s) as pending?')) return;
            updateStatus(ids, 'pending');
        });

        // Clear Selection
        $('#bulk-clear').on('click', function () {
            $('.select-item, #select-all').prop('checked', false);
            toggleBulkActions();
        });

        function updateStatus(ids, status) {
            $.ajax({
                url: "{{ route('admin.donations.bulk_status') }}",
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
