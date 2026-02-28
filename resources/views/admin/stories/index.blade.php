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
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="40"><input type="checkbox" id="select-all"></th>
                                <th>SL.</th>
                                <th>Order</th>
                                <th>Beneficiary Name</th>
                                <th>Beneficiary Title</th>
                                <th>Image</th>
                                <th>Rating</th>
                                <th>Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=>$item)
                            <tr>
                                <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $item->order ?? 0 }}</td>
                                <td class="align-middle">{{ $item->beneficiary_name }}</td>
                                <td class="align-middle">{{ $item->beneficiary_title }}</td>
                                <td class="align-middle">
                                    <img src="{{ asset('images/stories/'.$item->image) }}" alt="" width="50">
                                </td>
                                <td class="align-middle">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $item->rating)
                                            <span class="text-warning">&#9733;</span>
                                        @else
                                            <span class="text-muted">&#9734;</span>
                                        @endif
                                    @endfor
                                </td>
                                <td class="align-middle">{{ $item->date }}</td>
                                <td class="align-middle">
                                    <div class="table-actions justify-content-center">
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
