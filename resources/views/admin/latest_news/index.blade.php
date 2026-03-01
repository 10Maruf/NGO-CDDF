@extends('layouts.admin')

@section('title_l1', 'News & Events')
@section('bread_crumb')
    <li class="breadcrumb-item">News & Events</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="mb-0 text-uppercase">All News & Events</h6>
            <a href="{{ route('news.add') }}" class="btn btn-primary btn-sm">
                <i class="feather-plus me-1"></i> Add News
            </a>
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
                                <th width="50">SL</th>
                                <th>Category</th>
                                <th>Title & Description</th>
                                <th width="80">Cover Image</th>
                                <th width="90">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $key => $item)
                            <tr>
                                <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">
                                    @if (($item->category ?? 'news') === 'event')
                                        <span class="badge bg-warning text-dark">Event</span>
                                    @else
                                        <span class="badge bg-info">News</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <div class="fw-semibold" style="max-width:220px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" title="{{ $item->title }}">{{ $item->title }}</div>
                                    <small class="text-muted">{{ Str::limit($item->description, 50, '...') }}</small>
                                </td>
                                <td class="align-middle">
                                    <img src="{{ asset('images/news/'.$item->image) }}" alt="" width="60" style="border-radius:4px;object-fit:cover;height:40px;">
                                </td>
                                <td class="align-middle">
                                    @if(isset($item->status) && $item->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <div class="table-actions justify-content-center">
                                        <button type="button" class="btn btn-info btn-sm" title="View"
                                                data-bs-toggle="modal" data-bs-target="#viewNewsModal{{ $item->id }}">
                                            <i class="feather-eye"></i>
                                        </button>
                                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        @if(isset($item->status) && $item->status == 1)
                                            <a href="{{ route('news.toggle_status', $item->id) }}" class="btn btn-success btn-sm" title="Active – Click to Deactivate">
                                                <i class="feather-check-circle"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('news.toggle_status', $item->id) }}" class="btn btn-secondary btn-sm" title="Inactive – Click to Activate">
                                                <i class="feather-x-circle"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('news.delete', $item->id) }}" class="btn btn-danger btn-sm"
                                           data-delete data-delete-title="Delete News" data-delete-message="Are you sure you want to delete this entry? This action cannot be undone." title="Delete">
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
@foreach ($news as $item)
<div class="modal fade" id="viewNewsModal{{ $item->id }}" tabindex="-1" aria-hidden="true" style="z-index: 1055;">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    @if (($item->category ?? 'news') === 'event')
                        <span class="badge bg-warning text-dark me-2">Event</span>
                    @else
                        <span class="badge bg-info me-2">News</span>
                    @endif
                    {{ $item->title }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                @if($item->image)
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/news/'.$item->image) }}" alt="{{ $item->title }}"
                             class="img-fluid rounded" style="max-height:350px;object-fit:contain;">
                    </div>
                @endif
                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <table class="table table-bordered table-sm mb-0">
                            <tbody>
                                <tr>
                                    <th width="150" class="bg-light">Title</th>
                                    <td>{{ $item->title }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Category</th>
                                    <td>{{ ucfirst($item->category ?? 'News') }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Status</th>
                                    <td>
                                        @if(isset($item->status) && $item->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                @if($item->description)
                <div class="mb-3">
                    <h6 class="fw-bold border-bottom pb-2 text-primary">Summary</h6>
                    <p class="text-muted">{{ $item->description }}</p>
                </div>
                @endif
                
                @if(isset($item->details) && $item->details)
                <div class="mb-3">
                    <h6 class="fw-bold border-bottom pb-2 text-primary">Details</h6>
                    <div class="p-3 shadow-sm rounded bg-white border">
                        {!! $item->details !!}
                    </div>
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <a href="{{ route('news.edit', $item->id) }}" class="btn btn-primary btn-sm">
                    <i class="feather-edit me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

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
$(document).ready(function () {

    // Fix for modal backdrop issue
    $('.modal').on('show.bs.modal', function () {
        $(this).appendTo('body');
    });

    $('#select-all').on('change', function () {
        $('.select-item').prop('checked', $(this).prop('checked'));
        toggleBulkActions();
    });

    $('.select-item').on('change', function () {
        $('#select-all').prop('checked', $('.select-item:checked').length === $('.select-item').length);
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

    $('#bulk-delete').on('click', function () {
        var ids = [];
        $('.select-item:checked').each(function () { ids.push($(this).val()); });
        if (ids.length === 0) return;

        var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
        $('#deleteConfirmModalLabel').text('Delete Selected News');
        $('#deleteConfirmMessage').text('Are you sure you want to delete ' + ids.length + ' selected item(s)? This action cannot be undone.');
        $('#confirmDeleteBtn').off('click.bulk').attr('href', '#');
        $('#confirmDeleteBtn').on('click.bulk', function (e) {
            e.preventDefault();
            deleteModal.hide();
            $.ajax({
                url: "{{ route('news.bulk_delete') }}",
                method: 'POST',
                data: { ids: ids, _token: "{{ csrf_token() }}" },
                success: function () { location.reload(); },
                error:   function () { alert('Something went wrong!'); }
            });
        });
        deleteModal.show();
    });

    $('#bulk-activate').on('click',   function () { updateStatus(1); });
    $('#bulk-deactivate').on('click', function () { updateStatus(0); });

    // Clear Selection
    $('#bulk-clear').on('click', function () {
        $('.select-item, #select-all').prop('checked', false);
        toggleBulkActions();
    });

    function updateStatus(status) {
        var ids = [];
        $('.select-item:checked').each(function () { ids.push($(this).val()); });
        $.ajax({
            url: "{{ route('news.bulk_status') }}",
            method: 'POST',
            data: { ids: ids, status: status, _token: "{{ csrf_token() }}" },
            success: function () { location.reload(); },
            error:   function () { alert('Something went wrong!'); }
        });
    }

});
</script>
@endsection
