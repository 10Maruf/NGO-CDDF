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
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light border-bottom border-2">
                            <tr>
                                <th style="width:40px"><input type="checkbox" id="select-all"></th>
                                <th style="width:40px">#</th>
                                <th style="width:55px">Photo</th>
                                <th>Name &amp; Contact</th>
                                <th style="width:100px" class="text-center">Status</th>
                                <th style="width:130px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                <td>{{ ++$key }}</td>
                                <td>
                                    @if ($item->photo)
                                        <img src="{{ asset('images/volunteers/' . $item->photo) }}" width="42" height="42"
                                             onerror="this.src='{{ asset('img/testimonial.jpg') }}'"
                                             class="rounded-circle object-fit-cover border">
                                    @else
                                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center" style="width:42px;height:42px;">
                                            <i class="feather-user text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-semibold" style="font-size:13px;">{{ $item->name }}</div>
                                    @if($item->phone)
                                        <div class="text-muted" style="font-size:11px;"><i class="feather-phone me-1"></i>{{ $item->phone }}</div>
                                    @endif
                                    @if($item->email)
                                        <div class="text-muted" style="font-size:11px;"><i class="feather-mail me-1"></i>{{ $item->email }}</div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @php $badge = ['pending' => 'warning', 'approved' => 'success', 'rejected' => 'danger']; @endphp
                                    <span class="badge bg-{{ $badge[$item->status] ?? 'secondary' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="table-actions justify-content-center">
                                        <button type="button" class="btn btn-info text-white" title="View"
                                                data-bs-toggle="modal" data-bs-target="#viewVolunteerModal{{ $item->id }}">
                                            <i class="feather-eye"></i>
                                        </button>
                                        <button class="btn btn-warning single-status-trigger" type="button"
                                                title="Change Status"
                                                data-id="{{ $item->id }}"
                                                data-current="{{ $item->status }}"
                                                data-name="{{ $item->name }}">
                                            <i class="bx bx-transfer-alt"></i>
                                        </button>
                                        <a href="{{ route('admin.volunteer_applications.edit', $item->id) }}" class="btn btn-primary" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.volunteer_applications.delete', $item->id) }}" class="btn btn-danger" data-delete data-delete-title="Delete Volunteer" data-delete-message="Are you sure?" title="Delete">
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
@foreach ($data as $item)
@php $badge = ['pending' => 'warning', 'approved' => 'success', 'rejected' => 'danger']; @endphp
<div class="modal fade" id="viewVolunteerModal{{ $item->id }}" tabindex="-1" aria-hidden="true" style="z-index: 1055;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $item->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-center gap-3 mb-3">
                    @if($item->photo)
                        <img src="{{ asset('images/volunteers/' . $item->photo) }}"
                             onerror="this.src='{{ asset('img/testimonial.jpg') }}'"
                             class="rounded-circle border" style="width:70px;height:70px;object-fit:cover;">
                    @else
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center" style="width:70px;height:70px;">
                            <i class="feather-user text-white fs-3"></i>
                        </div>
                    @endif
                    <div>
                        <div class="fw-semibold fs-6">{{ $item->name }}</div>
                        <span class="badge bg-{{ $badge[$item->status] ?? 'secondary' }} mt-1">{{ ucfirst($item->status) }}</span>
                    </div>
                </div>

                <table class="table table-borderless table-sm">
                    <tbody>
                        @if($item->phone)
                        <tr>
                            <th class="text-muted small" style="width:110px"><i class="feather-phone me-1"></i>Phone</th>
                            <td class="small">{{ $item->phone }}</td>
                        </tr>
                        @endif
                        @if($item->email)
                        <tr>
                            <th class="text-muted small"><i class="feather-mail me-1"></i>Email</th>
                            <td class="small">{{ $item->email }}</td>
                        </tr>
                        @endif
                        @if(isset($item->address) && $item->address)
                        <tr>
                            <th class="text-muted small"><i class="feather-map-pin me-1"></i>Address</th>
                            <td class="small">{{ $item->address }}</td>
                        </tr>
                        @endif
                        @if(isset($item->skills) && $item->skills)
                        <tr>
                            <th class="text-muted small"><i class="feather-star me-1"></i>Skills</th>
                            <td class="small">{{ $item->skills }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th class="text-muted small"><i class="feather-calendar me-1"></i>Applied</th>
                            <td class="small">{{ $item->created_at->format('d M Y') }}</td>
                        </tr>
                    </tbody>
                </table>

                @if(isset($item->message) && $item->message)
                <div class="bg-light p-3 rounded border-start border-4 border-primary">
                    <label class="small text-muted fw-bold d-block mb-1">Message</label>
                    <p class="mb-0 small" style="white-space:pre-line;">{{ $item->message }}</p>
                </div>
                @endif
            </div>
            <div class="modal-footer bg-light">
                <a href="{{ route('admin.volunteer_applications.edit', $item->id) }}" class="btn btn-primary btn-sm">
                    <i class="feather-edit me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modalEl = document.getElementById('viewVolunteerModal{{ $item->id }}');
        if (modalEl) { modalEl.addEventListener('show.bs.modal', function () { $(this).appendTo('body'); }); }
    });
</script>
@endforeach

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

{{-- Single Status Change Sticky Bar --}}
<div id="single-status-bar" style="display:none; position:fixed; bottom:0; left:280px; right:0; background:#fff; padding:15px 24px; z-index:1050; box-shadow:0 -2px 12px rgba(0,0,0,0.1); border-top:1px solid #e5e7eb; transition: left 0.3s ease;">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center me-4">
            <span class="fw-bold" style="font-size:1.1rem; color:#495057;">Change Status for: <span class="text-primary ms-1" id="single-status-title"></span></span>
        </div>
        <div class="d-flex align-items-center gap-4">
            <form id="single-status-form" method="POST" class="d-flex gap-2 m-0" action="">
                @csrf
                <input type="hidden" name="status" id="single-status-input" value="">
                <button type="button" class="btn btn-warning btn-status-submit d-flex align-items-center gap-1" data-status="pending">
                    <i class="bx bx-time fs-5"></i> Pending
                </button>
                <button type="button" class="btn btn-success btn-status-submit d-flex align-items-center gap-1" data-status="approved">
                    <i class="bx bx-check-circle fs-5"></i> Approved
                </button>
                <button type="button" class="btn btn-danger btn-status-submit d-flex align-items-center gap-1" data-status="rejected">
                    <i class="bx bx-x-circle fs-5"></i> Rejected
                </button>
            </form>
            <button class="btn btn-secondary border-0 bg-light text-dark rounded-circle" id="single-status-close" title="Cancel" style="width:38px;height:38px;display:flex;align-items:center;justify-content:center;">
                <i class="bx bx-x fs-4"></i>
            </button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        // Single Status Bar Logic
        let actionUrlBase = "{{ route('admin.volunteer_applications.status', ':id') }}";

        $('.single-status-trigger').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            let id = $(this).data('id');
            let currentStatus = $(this).data('current');
            let name = $(this).data('name');

            $('#single-status-title').text(name);
            $('#single-status-form').attr('action', actionUrlBase.replace(':id', id));

            $('.btn-status-submit').each(function() {
                if ($(this).data('status') === currentStatus) {
                    $(this).css('opacity', '0.45').css('pointer-events', 'none');
                } else {
                    $(this).css('opacity', '1').css('pointer-events', 'auto');
                }
            });

            $('#bulk-bar').hide();
            $('#single-status-bar').css('display', 'flex');
        });

        $('.btn-status-submit').on('click', function() {
            let status = $(this).data('status');
            let label = $(this).text().trim();
            if (confirm('Change status to ' + label + '?')) {
                $('#single-status-input').val(status);
                $('#single-status-form').submit();
            }
        });

        $('#single-status-close').on('click', function() {
            $('#single-status-bar').hide();
        });

        $('#select-all').on('change', function() {
            $('.select-item').prop('checked', $(this).prop('checked'));
            $('#single-status-bar').hide();
            toggleBulkActions();
        });
        $('.select-item').on('change', function() {
            $('#select-all').prop('checked', $('.select-item:checked').length == $('.select-item').length);
            $('#single-status-bar').hide();
            toggleBulkActions();
        });
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

        $('#bulk-approve').on('click', function() { var ids = getSelectedIds(); if (ids.length === 0) return; updateBulkStatus(ids, 'approved'); });
        $('#bulk-reject').on('click', function() { var ids = getSelectedIds(); if (ids.length === 0) return; updateBulkStatus(ids, 'rejected'); });

        function updateBulkStatus(ids, status) {
            $.ajax({ url: "{{ route('admin.volunteer_applications.bulk_status') }}", method: "POST", data: { ids: ids, status: status, _token: "{{ csrf_token() }}" }, success: function() { location.reload(); }, error: function() { alert('Something went wrong!'); } });
        }

        $('#bulk-clear').on('click', function() { $('.select-item, #select-all').prop('checked', false); toggleBulkActions(); });
    });
</script>
@endsection
