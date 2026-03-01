@extends('layouts.admin')

@section('title_l1', 'Success Stories')
@section('bread_crumb')
    <li class="breadcrumb-item">Stories</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="mb-0 text-uppercase">All Success Stories</h6>
            <a href="{{ route('stories.add') }}" class="btn btn-primary btn-sm">
                <i class="feather-plus me-1"></i> Add Story
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
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light border-bottom border-2">
                            <tr>
                                <th style="width:40px"><input type="checkbox" id="select-all"></th>
                                <th style="width:40px">#</th>
                                <th style="width:55px">Image</th>
                                <th>Name &amp; Title</th>
                                <th style="width:100px" class="text-center">Rating</th>
                                <th style="width:60px" class="text-center">Order</th>
                                <th style="width:130px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=>$item)
                            <tr>
                                <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <img src="{{ asset('images/stories/'.$item->image) }}"
                                         onerror="this.src='{{ asset('img/testimonial.jpg') }}'"
                                         alt="{{ $item->beneficiary_name }}" width="45" height="45"
                                         class="rounded-circle object-fit-cover border">
                                </td>
                                <td>
                                    <div class="fw-semibold" style="font-size:13px;">{{ $item->beneficiary_name }}</div>
                                    <div class="text-muted" style="font-size:11px;">{{ $item->beneficiary_title }}</div>
                                </td>
                                <td class="text-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $item->rating)
                                            <span class="text-warning">&#9733;</span>
                                        @else
                                            <span class="text-muted">&#9734;</span>
                                        @endif
                                    @endfor
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-secondary">{{ $item->order ?? 0 }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="table-actions justify-content-center">
                                        <button type="button" class="btn btn-info text-white" title="View"
                                                data-bs-toggle="modal" data-bs-target="#viewStoryModal{{ $item->id }}">
                                            <i class="feather-eye"></i>
                                        </button>
                                        <a href="{{ route('stories.edit',$item->id) }}" class="btn btn-primary" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('stories.delete',$item->id) }}" class="btn btn-danger" data-delete data-delete-title="Delete Success Story" data-delete-message="Are you sure you want to delete this success story? This action cannot be undone." title="Delete">
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
<div class="modal fade" id="viewStoryModal{{ $item->id }}" tabindex="-1" aria-hidden="true" style="z-index: 1055;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $item->beneficiary_name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="{{ asset('images/stories/'.$item->image) }}"
                         onerror="this.src='{{ asset('img/testimonial.jpg') }}'"
                         alt="{{ $item->beneficiary_name }}"
                         class="rounded-circle border" style="width:70px;height:70px;object-fit:cover;">
                    <div>
                        <div class="fw-semibold">{{ $item->beneficiary_name }}</div>
                        <div class="text-muted small">{{ $item->beneficiary_title }}</div>
                        <div class="mt-1">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $item->rating)
                                    <span class="text-warning">&#9733;</span>
                                @else
                                    <span class="text-muted">&#9734;</span>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
                @if(isset($item->story) && $item->story)
                    <div class="bg-light p-3 rounded border-start border-4 border-primary">
                        <p class="mb-0 small fst-italic" style="white-space:pre-line;">"{{ $item->story }}"</p>
                    </div>
                @endif
                @if(isset($item->description) && $item->description)
                    <div class="bg-light p-3 rounded border-start border-4 border-primary mt-2">
                        <p class="mb-0 small" style="white-space:pre-line;">{{ $item->description }}</p>
                    </div>
                @endif
            </div>
            <div class="modal-footer bg-light">
                <a href="{{ route('stories.edit', $item->id) }}" class="btn btn-primary btn-sm">
                    <i class="feather-edit me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modalEl = document.getElementById('viewStoryModal{{ $item->id }}');
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
            $('#deleteConfirmModalLabel').text('Delete Selected Stories');
            $('#deleteConfirmMessage').text('Are you sure you want to delete ' + ids.length + ' selected story(ies)? This action cannot be undone.');
            $('#confirmDeleteBtn').off('click.bulk').attr('href', '#');
            $('#confirmDeleteBtn').on('click.bulk', function(e) {
                e.preventDefault(); deleteModal.hide();
                $.ajax({ url: "{{ route('stories.bulk_delete') }}", method: "POST", data: { ids: ids, _token: "{{ csrf_token() }}" }, success: function() { location.reload(); }, error: function() { alert('Something went wrong!'); } });
            });
            deleteModal.show();
        });
        $('#bulk-clear').on('click', function() { $('.select-item, #select-all').prop('checked', false); toggleBulkActions(); });
    });
</script>
@endsection
