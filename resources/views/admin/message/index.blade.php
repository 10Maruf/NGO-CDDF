@extends('layouts.admin')

@section('title_l1', 'Messages')
@section('bread_crumb')
    <li class="breadcrumb-item">Messages</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Message</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light border-bottom border-2">
                            <tr>
                                <th style="width:40px"><input type="checkbox" id="select-all"></th>
                                <th>SL.</th>
                                <th style="width:160px">Name</th>
                                <th style="width:180px">Contact & Email</th>
                                <th>Subject</th>
                                <th class="text-center" style="width:120px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message as $key=>$msg)
                            <tr>
                                <td><input type="checkbox" class="select-item" value="{{ $msg->id }}"></td>
                                <td>{{ ++$key }}</td>
                                <td class="fw-semibold">{{ $msg->name }}</td>
                                <td>
                                    @if($msg->contact_number)
                                        <div class="text-muted small">{{ $msg->contact_number }}</div>
                                    @endif
                                    @if($msg->email)
                                        <div class="text-muted small">{{ $msg->email }}</div>
                                    @endif
                                </td>
                                <td style="max-width:220px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;" title="{{ $msg->subject }}">{{ $msg->subject }}</td>
                                <td>
                                    <div class="table-actions justify-content-center">
                                        <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#viewMsgModal{{ $msg->id }}" title="View">
                                            <i class="feather-eye"></i>
                                        </button>
                                        <a href="{{ route('message.delete',$msg->id) }}" class="btn btn-danger" data-delete data-delete-title="Delete Message" data-delete-message="Are you sure you want to delete this message? This action cannot be undone." title="Delete">
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

<!-- View Message Modals -->
@foreach ($message as $msg)
<div class="modal fade" id="viewMsgModal{{ $msg->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Message Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4 text-muted fw-semibold">Name</div>
                    <div class="col-md-8">{{ $msg->name }}</div>
                </div>
                @if($msg->contact_number)
                <div class="row mb-3">
                    <div class="col-md-4 text-muted fw-semibold">Contact Number</div>
                    <div class="col-md-8">{{ $msg->contact_number }}</div>
                </div>
                @endif
                <div class="row mb-3">
                    <div class="col-md-4 text-muted fw-semibold">Email</div>
                    <div class="col-md-8">{{ $msg->email }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 text-muted fw-semibold">Subject</div>
                    <div class="col-md-8 fw-bold">{{ $msg->subject }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 text-muted fw-semibold">Message</div>
                    <div class="col-md-8">
                        <p style="word-break:break-word; white-space:pre-wrap; overflow-wrap:break-word; margin:0;">{{ $msg->message }}</p>
                    </div>
                </div>
                @if($msg->created_at)
                <div class="row">
                    <div class="col-md-4 text-muted fw-semibold">Received At</div>
                    <div class="col-md-8 text-muted small">{{ \Carbon\Carbon::parse($msg->created_at)->format('d M Y, h:i A') }}</div>
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Bulk Action Bar -->
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
        // Fix modal z-index inside stacked layouts
        $('.modal').on('show.bs.modal', function() {
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
            var c = $('.select-item:checked').length;
            if (c > 0) {
                $('#bulk-count').text(c);
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

        $('#bulk-delete').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;

            // Use the global window.deleteConfirmModal helper
            if (typeof window.deleteConfirmModal !== 'undefined') {
                window.deleteConfirmModal.show(
                    'Delete Selected Messages',
                    'Are you sure you want to delete ' + ids.length + ' selected message(s)? This action cannot be undone.',
                    function() {
                        $.ajax({
                            url: "{{ route('message.bulk_delete') }}",
                            method: "POST",
                            data: {
                                ids: ids,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function() {
                                location.reload();
                            },
                            error: function() {
                                alert('Something went wrong!');
                            }
                        });
                    }
                );
            } else if (confirm('Delete ' + ids.length + ' message(s)?')) {
                $.ajax({
                    url: "{{ route('message.bulk_delete') }}",
                    method: "POST",
                    data: {
                        ids: ids,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function() {
                        location.reload();
                    },
                    error: function() {
                        alert('Something went wrong!');
                    }
                });
            }
        });

        $('#bulk-clear').on('click', function() {
            $('.select-item, #select-all').prop('checked', false);
            toggleBulkActions();
        });
    });
</script>
@endsection
