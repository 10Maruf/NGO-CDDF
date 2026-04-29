@extends('layouts.admin')

@section('title_l1', 'Contacts')
@section('bread_crumb')
    <li class="breadcrumb-item">Contacts</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="mb-0 text-uppercase">All Contacts</h6>
            <a href="{{ route('contact.add') }}" class="btn btn-primary btn-sm">
                <i class="feather-plus me-1"></i> Add Contact
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light border-bottom border-2">
                            <tr>
                                <th style="width:30px"></th>
                                <th style="width:40px"><input type="checkbox" id="select-all"></th>
                                <th>SL.</th>
                                <th>Type</th>
                                <th>Title & Name/Address</th>
                                <th style="width:200px">Mobile & Email</th>
                                <th>Status</th>
                                <th class="text-center" style="width:160px">Action</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-contacts">
                            @forelse ($contacts as $key=>$contact)
                            <tr data-id="{{ $contact->id }}">
                                <td class="text-center drag-handle" style="cursor: grab;">
                                    <i class="fa-solid fa-grip-vertical fs-5 text-muted"></i>
                                </td>
                                <td class="align-middle"><input type="checkbox" class="select-item" value="{{ $contact->id }}"></td>
                                <td class="align-middle serial-number">{{ ++$key }}</td>
                                <td class="align-middle">
                                    @if($contact->type == 'head_office')
                                        <span class="badge bg-success">Head Office</span>
                                    @elseif($contact->type == 'branch')
                                        <span class="badge bg-info">Branch</span>
                                    @else
                                        <span class="badge bg-primary">Person</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $contact->title }}</div>
                                    <div class="text-muted small">
                                        @if($contact->type == 'head_office' || $contact->type == 'branch')
                                            {{ Str::limit($contact->address, 50) }}
                                        @else
                                            {{ $contact->name }}
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if($contact->mobile)
                                        <div class="small">{{ $contact->mobile }}</div>
                                    @endif
                                    @if($contact->email)
                                        <div class="text-muted small">{{ $contact->email }}</div>
                                    @endif
                                </td>
                                <td>
                                    @if($contact->status == 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="table-actions justify-content-center">
                                        <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#viewContactModal{{ $contact->id }}" title="View">
                                            <i class="feather-eye"></i>
                                        </button>
                                        @if($contact->status == 'active')
                                            <button class="btn btn-success btn-sm status-toggle" data-id="{{ $contact->id }}" data-status="inactive" title="Active (Click to Deactivate)">
                                                <i class="feather-check-circle"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-secondary btn-sm status-toggle" data-id="{{ $contact->id }}" data-status="active" title="Inactive (Click to Activate)">
                                                <i class="feather-x-circle"></i>
                                            </button>
                                        @endif
                                        <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-primary" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('contact.delete', $contact->id) }}" class="btn btn-danger" data-delete data-delete-title="Delete Contact" data-delete-message="Are you sure you want to delete this contact message? This action cannot be undone." title="Delete">
                                            <i class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">No contacts found. Add your first contact!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- View Contact Modals -->
@forelse ($contacts as $contact)
<div class="modal fade" id="viewContactModal{{ $contact->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4 text-muted fw-semibold">Type</div>
                    <div class="col-md-8">
                        @if($contact->type == 'head_office')
                            <span class="badge bg-success">Head Office</span>
                        @elseif($contact->type == 'branch')
                            <span class="badge bg-info">Branch</span>
                        @else
                            <span class="badge bg-primary">Person</span>
                        @endif
                    </div>
                </div>
                @if($contact->title)
                <div class="row mb-3">
                    <div class="col-md-4 text-muted fw-semibold">Title / Designation</div>
                    <div class="col-md-8">{{ $contact->title }}</div>
                </div>
                @endif
                @if($contact->name)
                <div class="row mb-3">
                    <div class="col-md-4 text-muted fw-semibold">Name</div>
                    <div class="col-md-8 fw-semibold">{{ $contact->name }}</div>
                </div>
                @endif
                @if($contact->address)
                <div class="row mb-3">
                    <div class="col-md-4 text-muted fw-semibold">Address</div>
                    <div class="col-md-8">{{ $contact->address }}</div>
                </div>
                @endif
                @if($contact->mobile)
                <div class="row mb-3">
                    <div class="col-md-4 text-muted fw-semibold">Mobile</div>
                    <div class="col-md-8">{{ $contact->mobile }}</div>
                </div>
                @endif
                @if($contact->email)
                <div class="row mb-3">
                    <div class="col-md-4 text-muted fw-semibold">Email</div>
                    <div class="col-md-8">{{ $contact->email }}</div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-4 text-muted fw-semibold">Status</div>
                    <div class="col-md-8">
                        @if($contact->status == 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-primary btn-sm"><i class="feather-edit me-1"></i>Edit</a>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse

<!-- Bulk Action Bar -->
<style> html.minimenu #bulk-bar { left: 100px !important; } </style>
<div id="bulk-bar" style="display:none; position:fixed; bottom:0; left:280px; right:0; background:#fff; padding:12px 24px; z-index:1050; box-shadow:0 -2px 12px rgba(0,0,0,0.1); border-top:1px solid #e5e7eb; transition: left 0.3s ease;">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-primary px-3 py-2" id="bulk-count" style="font-size:1rem;">0</span>
            <span class="text-muted small">items selected</span>
        </div>
        <div class="table-actions ms-4">
            <button class="btn btn-success" id="bulk-activate" title="Activate Selected">
                <i class="feather-check-circle"></i>
            </button>
            <button class="btn btn-secondary" id="bulk-deactivate" title="Deactivate Selected">
                <i class="feather-x-circle"></i>
            </button>
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
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        // Drag and Drop Sortable for Contacts
        $("#sortable-contacts").sortable({
            handle: ".drag-handle",
            update: function(event, ui) {
                let orderedIds = [];
                $(this).children('tr').each(function(index) {
                    orderedIds.push($(this).data('id'));
                    $(this).find('.serial-number').text(index + 1);
                });

                $.ajax({
                    url: "{{ route('contact.updateOrder') }}",
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

            if (typeof window.deleteConfirmModal !== 'undefined') {
                window.deleteConfirmModal.show(
                    'Delete Selected Contacts',
                    'Are you sure you want to delete ' + ids.length + ' selected contact(s)? This action cannot be undone.',
                    function() {
                        $.ajax({
                            url: "{{ route('contact.bulk_delete') }}",
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
            } else if (confirm('Delete ' + ids.length + ' contact(s)?')) {
                $.ajax({
                    url: "{{ route('contact.bulk_delete') }}",
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

        $('#bulk-activate').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;
            $.post("{{ route('contact.bulk_status') }}", {_token: "{{ csrf_token() }}", ids: ids, status: 'active'}, function() {
                location.reload();
            });
        });

        $('#bulk-deactivate').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;
            $.post("{{ route('contact.bulk_status') }}", {_token: "{{ csrf_token() }}", ids: ids, status: 'inactive'}, function() {
                location.reload();
            });
        });

        $('#bulk-clear').on('click', function() {
            $('.select-item, #select-all').prop('checked', false);
            toggleBulkActions();
        });

        // Individual Status Toggle (Restored)
        $('.status-toggle').on('click', function() {
            var id = $(this).data('id');
            var status = $(this).data('status');
            var action = status == 'active' ? 'activate' : 'deactivate';

            if(confirm('Are you sure you want to ' + action + ' this contact?')) {
                $.post("{{ route('contact.bulk_status') }}", {
                    _token: "{{ csrf_token() }}",
                    ids: [id],
                    status: status
                }, function() {
                    location.reload();
                });
            }
        });
    });
</script>
@endsection
