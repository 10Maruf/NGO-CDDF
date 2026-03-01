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

                                        {{-- Change Status Trigger --}}
                                        <button class="btn btn-sm btn-light single-status-trigger" type="button"
                                                title="Change Status"
                                                data-id="{{ $item->id }}"
                                                data-current="{{ $item->status }}"
                                                data-name="{{ $item->donor_name }}"
                                                style="border:none;background:transparent;padding:4px 6px;line-height:1;">
                                            <i class="bx bx-transfer-alt" style="font-size:18px;color:#6c757d;"></i>
                                        </button>

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
<style> html.minimenu #bulk-bar { left: 100px !important; } html.minimenu #single-status-bar { left: 100px !important; }</style>
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

{{-- Single Status Change Sticky Bar --}}
<div id="single-status-bar" style="display:none; position:fixed; bottom:0; left:280px; right:0; background:#fff; padding:15px 24px; z-index:1050; box-shadow:0 -2px 12px rgba(0,0,0,0.1); border-top:1px solid #e5e7eb; transition: left 0.3s ease;">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center me-4">
            <span class="fw-bold" style="font-size:1.1rem; color:#495057;" id="single-status-title">Change Status for: <span class="text-primary ms-1"></span></span>
        </div>
        <div class="d-flex align-items-center gap-4">
            <form id="single-status-form" method="POST" class="d-flex gap-2 m-0" action="">
                @csrf
                <input type="hidden" name="status" id="single-status-input" value="">
                
                <button type="button" class="btn btn-warning btn-status-submit d-flex align-items-center gap-1" data-status="pending" title="Mark as Pending">
                    <i class="bx bx-time fs-5"></i> Pending
                </button>
                <button type="button" class="btn btn-success btn-status-submit d-flex align-items-center gap-1" data-status="verified" title="Mark as Verified">
                    <i class="bx bx-check-circle fs-5"></i> Verified
                </button>
                <button type="button" class="btn btn-danger btn-status-submit d-flex align-items-center gap-1" data-status="rejected" title="Mark as Rejected">
                    <i class="bx bx-x-circle fs-5"></i> Rejected
                </button>
            </form>
            
            <button class="btn btn-secondary border-0 bg-light text-dark rounded-circle" id="single-status-close" title="Cancel" style="width: 38px; height: 38px; display: flex; align-items: center; justify-content: center;">
                <i class="bx bx-x fs-4"></i>
            </button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        // Single Status Bar Logic
        let actionUrlBase = "{{ route('admin.donations.change_status', ':id') }}";
        
        $('.single-status-trigger').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            let donationId = $(this).data('id');
            let currentStatus = $(this).data('current');
            let donorName = $(this).data('name');
            
            // Set title and form action
            $('#single-status-title span').text(donorName);
            $('#single-status-form').attr('action', actionUrlBase.replace(':id', donationId));
            
            // Adjust buttons opacity based on current status
            $('.btn-status-submit').each(function() {
                if ($(this).data('status') === currentStatus) {
                    $(this).css('opacity', '0.45').css('pointer-events', 'none');
                } else {
                    $(this).css('opacity', '1').css('pointer-events', 'auto');
                }
            });

            // Hide bulk bar if open, show this bar
            $('#bulk-bar').hide();
            $('#single-status-bar').css('display', 'flex');
        });

        // Submit form via buttons
        $('.btn-status-submit').on('click', function() {
            let status = $(this).data('status');
            let label = $(this).text().trim();
            
            if (confirm('Change status to ' + label + '?')) {
                $('#single-status-input').val(status);
                $('#single-status-form').submit();
            }
        });

        // Close Single Status Bar
        $('#single-status-close').on('click', function() {
            $('#single-status-bar').hide();
        });


        // Select All -> Also hide single status bar
        $('#select-all').on('change', function() {
            var isChecked = $(this).prop('checked');
            $('.select-item').prop('checked', isChecked);
            $('#single-status-bar').hide();
            toggleBulkActions();
        });

        // Individual Select -> Also hide single status bar
        $('.select-item').on('change', function() {
            if ($('.select-item:checked').length == $('.select-item').length) {
                $('#select-all').prop('checked', true);
            } else {
                $('#select-all').prop('checked', false);
            }
            $('#single-status-bar').hide();
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
