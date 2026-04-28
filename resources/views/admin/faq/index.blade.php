@extends('layouts.admin')

@section('title_l1', 'FAQ')
@section('bread_crumb')
    <li class="breadcrumb-item">FAQ</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="mb-0 text-uppercase">All FAQ</h6>
            <a href="{{ route('faq.add') }}" class="btn btn-primary btn-sm">
                <i class="feather-plus me-1"></i> Add FAQ
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-danger">{{ session()->get('success') }}</div>
                @endif
                @if (session()->has('update'))
                    <div class="alert alert-danger">{{ session()->get('update') }}</div>
                @endif

                {{-- Filter by category --}}
                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <a href="{{ route('faq.index') }}"
                       class="btn btn-sm {{ $filterCategory == '' ? 'btn-primary' : 'btn-outline-secondary' }}">All</a>
                    @foreach($categories as $cat)
                        <a href="{{ route('faq.index', ['category' => $cat]) }}"
                           class="btn btn-sm {{ $filterCategory == $cat ? 'btn-primary' : 'btn-outline-secondary' }}">
                            {{ $cat }}
                        </a>
                    @endforeach
                </div>

                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light border-bottom border-2">
                            <tr>
                                @if($filterCategory != '')
                                <th style="width:30px"></th>
                                @endif
                                <th style="width:40px"><input type="checkbox" id="select-all"></th>
                                <th style="width:40px">#</th>
                                <th>Question</th>
                                <th style="width:150px">Category</th>
                                <th style="width:130px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="{{ $filterCategory != '' ? 'sortable-faq' : '' }}">
                            @foreach ($data as $key=>$item)
                            <tr data-id="{{ $item->id }}">
                                @if($filterCategory != '')
                                <td class="text-center drag-handle" style="cursor: grab;">
                                    <i class="fa-solid fa-grip-vertical fs-5 text-muted"></i>
                                </td>
                                @endif
                                <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                <td class="serial-number">{{ ++$key }}</td>
                                <td>
                                    <div class="fw-semibold" style="font-size:13px;">{{ $item->question }}</div>
                                </td>
                                <td>
                                    @if($item->category)
                                        <span class="badge bg-info text-dark">{{ $item->category }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="table-actions justify-content-center">
                                        <button type="button" class="btn btn-info text-white" title="View"
                                                data-bs-toggle="modal" data-bs-target="#viewFaqModal{{ $item->id }}">
                                            <i class="feather-eye"></i>
                                        </button>
                                        <a href="{{ route('faq.edit',$item->id) }}" class="btn btn-primary" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('faq.delete',$item->id) }}" class="btn btn-danger" data-delete data-delete-title="Delete FAQ" data-delete-message="Are you sure you want to delete this FAQ? This action cannot be undone." title="Delete">
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
<div class="modal fade" id="viewFaqModal{{ $item->id }}" tabindex="-1" aria-hidden="true" style="z-index: 1055;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">FAQ Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($item->category)
                    <div class="mb-3">
                        <span class="badge bg-info text-dark">{{ $item->category }}</span>
                    </div>
                @endif
                <div class="mb-3">
                    <label class="small text-muted fw-bold d-block mb-1">Question</label>
                    <p class="fw-semibold mb-0">{{ $item->question }}</p>
                </div>
                @if(isset($item->answer) && $item->answer)
                <div class="bg-light p-3 rounded border-start border-4 border-primary">
                    <label class="small text-muted fw-bold d-block mb-1">Answer</label>
                    <p class="mb-0 small" style="white-space:pre-line;">{{ $item->answer }}</p>
                </div>
                @endif
            </div>
            <div class="modal-footer bg-light">
                <a href="{{ route('faq.edit', $item->id) }}" class="btn btn-primary btn-sm">
                    <i class="feather-edit me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modalEl = document.getElementById('viewFaqModal{{ $item->id }}');
        if (modalEl) { modalEl.addEventListener('show.bs.modal', function () { $(this).appendTo('body'); }); }
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
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        $('#select-all').on('change', function() { $('.select-item').prop('checked', $(this).prop('checked')); toggleBulkActions(); });
        $('.select-item').on('change', function() { $('#select-all').prop('checked', $('.select-item:checked').length == $('.select-item').length); toggleBulkActions(); });
        function toggleBulkActions() { var c = $('.select-item:checked').length; if (c > 0) { $('#bulk-count').text(c); $('#bulk-bar').css('display','flex'); } else { $('#bulk-bar').hide(); } }
        function getSelectedIds() { var ids = []; $('.select-item:checked').each(function() { ids.push($(this).val()); }); return ids; }
        $('#bulk-delete').on('click', function() {
            var ids = getSelectedIds(); if (ids.length === 0) return;
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            $('#deleteConfirmModalLabel').text('Delete Selected FAQs');
            $('#deleteConfirmMessage').text('Are you sure you want to delete ' + ids.length + ' selected FAQ(s)? This action cannot be undone.');
            $('#confirmDeleteBtn').off('click.bulk').attr('href', '#');
            $('#confirmDeleteBtn').on('click.bulk', function(e) { e.preventDefault(); deleteModal.hide();
                $.ajax({ url: "{{ route('faq.bulk_delete') }}", method: "POST", data: { ids: ids, _token: "{{ csrf_token() }}" }, success: function() { location.reload(); }, error: function() { alert('Something went wrong!'); } });
            });
            deleteModal.show();
        });
        $('#bulk-clear').on('click', function() { $('.select-item, #select-all').prop('checked', false); toggleBulkActions(); });

        $("#sortable-faq").sortable({
            handle: ".drag-handle",
            update: function(event, ui) {
                let orderedIds = [];
                $(this).children('tr').each(function(index) {
                    orderedIds.push($(this).data('id'));
                    $(this).find('.serial-number').text(index + 1); // Update serial visually
                });

                $.ajax({
                    url: "{{ route('faq.updateOrder') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        order: orderedIds
                    },
                    success: function(response) {
                        if(response.success) {
                            console.log('Order updated successfully');
                        }
                    }
                });
            }
        });
    });
</script>
@endsection
