@extends('layouts.admin')

@section('title_l1', 'Org Members')
@section('bread_crumb')
    <li class="breadcrumb-item active">Organizational Members</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="mb-0 text-uppercase">All Organizational Members</h6>
            <a href="{{ route('org.add') }}" class="btn btn-primary btn-sm">
                <i class="feather-plus me-1"></i> Add Member
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

                {{-- Filter by type --}}
                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <a href="{{ route('org.index') }}"
                       class="btn btn-sm {{ $filterType == '' ? 'btn-primary' : 'btn-outline-secondary' }}">All</a>
                    @foreach($orgTypes as $key => $label)
                        <a href="{{ route('org.index', ['type' => $key]) }}"
                           class="btn btn-sm {{ $filterType == $key ? 'btn-primary' : 'btn-outline-secondary' }}">
                            {{ \App\Models\OrgMember::$orgTypeLabels[$key] ?? $key }}
                        </a>
                    @endforeach
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="table-light border-bottom border-2">
                            <tr>
                                <th style="width:40px"><input type="checkbox" id="select-all"></th>
                                <th style="width:40px">#</th>
                                <th style="width:50px">Photo</th>
                                <th>Name &amp; Designation</th>
                                <th>Type</th>
                                <th style="width:60px" class="text-center">Order</th>
                                <th style="width:70px" class="text-center">Active</th>
                                <th style="width:100px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key => $item)
                            <tr>
                                <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <img src="{{ asset('images/org_members/' . $item->photo) }}"
                                         onerror="this.src='{{ asset('img/testimonial.jpg') }}'"
                                         alt="{{ $item->name }}" width="40" height="40"
                                         class="rounded-circle object-fit-cover border">
                                </td>
                                <td>
                                    <div class="fw-semibold" style="font-size:13px;">{{ $item->name }}</div>
                                    <div class="text-muted" style="font-size:11px;">{{ $item->designation }}</div>
                                </td>
                                <td>
                                    @php
                                        $badges = [
                                            'general_council'    => 'bg-info text-dark',
                                            'executive_committee'=> 'bg-primary',
                                            'advisory_council'   => 'bg-warning text-dark',
                                            'executive_director' => 'bg-danger',
                                            'senior_management'  => 'bg-success',
                                            'mid_management'     => 'bg-secondary',
                                            'field_staff'        => 'bg-dark',
                                            'support_staff'      => 'bg-light text-dark border',
                                        ];
                                        $badge = $badges[$item->org_type] ?? 'bg-secondary';
                                        $label = \App\Models\OrgMember::$orgTypeLabels[$item->org_type] ?? $item->org_type;
                                    @endphp
                                    <span class="badge {{ $badge }}">{{ $label }}</span>
                                </td>
                                <td class="text-center">{{ $item->order }}</td>
                                <td class="text-center">
                                    @if($item->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <div class="table-actions justify-content-center">
                                        @if($item->is_active)
                                            <a href="{{ route('org.toggle', $item->id) }}" class="btn btn-success" title="Active – Click to Deactivate">
                                                <i class="feather-check-circle"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('org.toggle', $item->id) }}" class="btn btn-secondary" title="Inactive – Click to Activate">
                                                <i class="feather-x-circle"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('org.edit', $item->id) }}" class="btn btn-primary" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('org.delete', $item->id) }}" class="btn btn-danger" data-delete data-delete-title="Delete Member" data-delete-message="Are you sure you want to delete this member? This action cannot be undone." title="Delete">
                                            <i class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">No members found.</td>
                            </tr>
                            @endforelse
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
            if (count > 0) {
                $('#bulk-count').text(count);
                $('#bulk-bar').css('display', 'flex');
            } else {
                $('#bulk-bar').hide();
            }
        }

        function getSelectedIds() {
            var ids = [];
            $('.select-item:checked').each(function() { ids.push($(this).val()); });
            return ids;
        }

        $('#bulk-delete').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;

            var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            $('#deleteConfirmModalLabel').text('Delete Selected Members');
            $('#deleteConfirmMessage').text('Are you sure you want to delete ' + ids.length + ' selected member(s)? This action cannot be undone.');

            $('#confirmDeleteBtn').off('click.bulk').attr('href', '#');
            $('#confirmDeleteBtn').on('click.bulk', function(e) {
                e.preventDefault();
                deleteModal.hide();
                $.ajax({
                    url: "{{ route('org.bulk_delete') }}",
                    method: "POST",
                    data: { ids: ids, _token: "{{ csrf_token() }}" },
                    success: function() { location.reload(); },
                    error: function() { alert('Something went wrong!'); }
                });
            });

            deleteModal.show();
        });

        $('#bulk-activate').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;
            updateStatus(ids, 1);
        });

        $('#bulk-deactivate').on('click', function() {
            var ids = getSelectedIds();
            if (ids.length === 0) return;
            updateStatus(ids, 0);
        });

        $('#bulk-clear').on('click', function() {
            $('.select-item, #select-all').prop('checked', false);
            toggleBulkActions();
        });

        function updateStatus(ids, status) {
            $.ajax({
                url: "{{ route('org.bulk_status') }}",
                method: "POST",
                data: { ids: ids, status: status, _token: "{{ csrf_token() }}" },
                success: function() { location.reload(); },
                error: function() { alert('Something went wrong!'); }
            });
        }
    });
</script>
@endsection
