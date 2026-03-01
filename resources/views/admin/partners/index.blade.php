@extends('layouts.admin')

@section('title_l1', 'Partners & Donors')
@section('bread_crumb')
    <li class="breadcrumb-item">Partners</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="mb-0 text-uppercase">All Partners/Donors</h6>
            <a href="{{ route('partner.create') }}" class="btn btn-primary btn-sm">
                <i class="feather-plus me-1"></i> Add Partner
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-danger">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-light border-bottom border-2">
                            <tr>
                                <th style="width:40px"><input type="checkbox" id="select-all"></th>
                                <th>SL.</th>
                                <th>Partner's/Donor's Name</th>
                                <th style="width:100px">Image</th>
                                <th class="text-center" style="width:130px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partner as $key=>$p)
                            <tr>
                                <td class="align-middle"><input type="checkbox" class="select-item" value="{{ $p->id }}"></td>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle fw-semibold">{{ $p->name }}</td>
                                <td class="align-middle">
                                    <img src="{{ asset('images/partner/'.$p->image) }}" alt="{{ $p->name }}" width="50" class="rounded">
                                </td>
                                <td class="align-middle">
                                    <div class="table-actions justify-content-center">
                                        <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#viewPartnerModal{{ $p->id }}" title="View">
                                            <i class="feather-eye"></i>
                                        </button>
                                        <a href="{{ route('partner.edit',$p->id) }}" class="btn btn-primary" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('partner.delete',$p->id) }}" class="btn btn-danger" data-delete data-delete-title="Delete Partner" data-delete-message="Are you sure you want to delete this partner? This action cannot be undone." title="Delete">
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

<!-- View Partner Modals -->
@foreach ($partner as $p)
<div class="modal fade" id="viewPartnerModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Partner Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('images/partner/'.$p->image) }}" alt="{{ $p->name }}" class="img-fluid rounded mb-3" style="max-height:180px; object-fit:contain;">
                <h5 class="fw-bold mb-0">{{ $p->name }}</h5>
            </div>
            <div class="modal-footer">
                <a href="{{ route('partner.edit', $p->id) }}" class="btn btn-primary btn-sm"><i class="feather-edit me-1"></i>Edit</a>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
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
                    'Delete Selected Partners',
                    'Are you sure you want to delete ' + ids.length + ' selected partner(s)? This action cannot be undone.',
                    function() {
                        $.ajax({
                            url: "{{ route('partner.bulk_delete') }}",
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
            } else if (confirm('Delete ' + ids.length + ' partner(s)?')) {
                $.ajax({
                    url: "{{ route('partner.bulk_delete') }}",
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
