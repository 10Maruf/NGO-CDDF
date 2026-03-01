@extends('layouts.admin')

@section('title_l1', 'Impact Metrics')
@section('bread_crumb')
    <li class="breadcrumb-item">Impact</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="mb-0 text-uppercase">All Impact Metrics</h6>
            <a href="{{ route('impact.add') }}" class="btn btn-primary btn-sm">
                <i class="feather-plus me-1"></i> Add Impact
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
                @if (session()->has('update'))
                    <div class="alert alert-info alert-dismissible fade show">
                        {{ session()->get('update') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width:40px"><input type="checkbox" id="select-all"></th>
                                <th style="width:40px">#</th>
                                <th style="width:55px">Icon</th>
                                <th>Title &amp; Description</th>
                                <th style="width:140px">Metric</th>
                                <th style="width:60px" class="text-center">Order</th>
                                <th style="width:130px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key=>$item)
                            <tr>
                                <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                <td>{{ $key + 1 }}</td>
                                <td class="text-center">
                                    @if($item->icon)
                                        <i class="{{ $item->icon }}" style="font-size: 28px; color: #0d6efd;"></i>
                                    @else
                                        <span class="badge bg-secondary">No Icon</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-semibold" style="font-size:13px;">{{ $item->title }}</div>
                                    @if($item->description)
                                        <div class="text-muted" style="font-size:11px; max-width:280px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $item->description }}</div>
                                    @endif
                                </td>
                                <td style="white-space:nowrap;">
                                    <span class="badge bg-primary" style="font-size:13px;">{{ $item->metric_value }}@if($item->metric_unit)<span style="font-weight:400;"> {{ $item->metric_unit }}</span>@endif</span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-secondary">{{ $item->order }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="table-actions justify-content-center">
                                        <button type="button" class="btn btn-info text-white" title="View"
                                                data-bs-toggle="modal" data-bs-target="#viewImpactModal{{ $item->id }}">
                                            <i class="feather-eye"></i>
                                        </button>
                                        <a href="{{ route('impact.edit',$item->id) }}" 
                                           class="btn btn-primary" 
                                           title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('impact.delete',$item->id) }}" 
                                           class="btn btn-danger" 
                                           data-delete 
                                           data-delete-title="Delete Impact Metric" 
                                           data-delete-message="Are you sure you want to delete this impact metric? This action cannot be undone."
                                           title="Delete">
                                            <i class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <i class="bx bx-folder-open" style="font-size: 48px; color: #ccc;"></i>
                                    <p class="text-muted mt-2">No impact metrics found. <a href="{{ route('impact.add') }}">Add one now</a></p>
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

{{-- View Modals --}}
@foreach ($data as $item)
<div class="modal fade" id="viewImpactModal{{ $item->id }}" tabindex="-1" aria-hidden="true" style="z-index: 1055;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $item->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Metric Value --}}
                <div class="text-center mb-4">
                    @if($item->icon)
                        <i class="{{ $item->icon }}" style="font-size: 48px; color: #0d6efd;"></i>
                    @endif
                    <div class="mt-2">
                        <span class="badge bg-primary" style="font-size:20px; padding:10px 20px;">{{ $item->metric_value }}</span>
                        @if($item->metric_unit)
                            <div class="text-muted mt-1">{{ $item->metric_unit }}</div>
                        @endif
                    </div>
                </div>

                <table class="table table-borderless table-sm">
                    <tbody>
                        @if($item->description)
                        <tr>
                            <th class="text-muted small" style="width:120px">Description</th>
                            <td class="small">{{ $item->description }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th class="text-muted small">Order</th>
                            <td><span class="badge bg-secondary">{{ $item->order }}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer bg-light">
                <a href="{{ route('impact.edit', $item->id) }}" class="btn btn-primary btn-sm">
                    <i class="feather-edit me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modalEl = document.getElementById('viewImpactModal{{ $item->id }}');
        if (modalEl) {
            modalEl.addEventListener('show.bs.modal', function () {
                $(this).appendTo('body');
            });
        }
    });
</script>
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
            <button class="btn btn-primary" id="bulk-clear" title="Clear Selection">
                <i class="feather-x"></i>
            </button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
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
            if (count > 0) { $('#bulk-count').text(count); $('#bulk-bar').css('display', 'flex'); } else { $('#bulk-bar').hide(); }
        }
        function getSelectedIds() {
            var ids = []; $('.select-item:checked').each(function() { ids.push($(this).val()); }); return ids;
        }
        $('#bulk-delete').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            $('#deleteConfirmModalLabel').text('Delete Selected Impact Metrics');
            $('#deleteConfirmMessage').text('Are you sure you want to delete ' + ids.length + ' selected impact metric(s)? This action cannot be undone.');
            $('#confirmDeleteBtn').off('click.bulk').attr('href', '#');
            $('#confirmDeleteBtn').on('click.bulk', function(e) {
                e.preventDefault(); deleteModal.hide();
                $.ajax({ url: "{{ route('impact.bulk_delete') }}", method: "POST", data: { ids: ids, _token: "{{ csrf_token() }}" }, success: function() { location.reload(); }, error: function() { alert('Something went wrong!'); } });
            });
            deleteModal.show();
        });
        $('#bulk-clear').on('click', function() { $('.select-item, #select-all').prop('checked', false); toggleBulkActions(); });
    });
</script>
@endsection
