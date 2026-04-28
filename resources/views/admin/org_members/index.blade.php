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
                                <th style="width:30px"></th>
                                <th style="width:40px"><input type="checkbox" id="select-all"></th>
                                <th style="width:40px">#</th>
                                <th style="width:50px">Photo</th>
                                <th>Name &amp; Designation</th>
                                <th>Type</th>
                                <th style="width:70px" class="text-center">Active</th>
                                <th style="width:100px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-org-members">
                            @forelse ($data as $key => $item)
                            <tr data-id="{{ $item->id }}">
                                <td class="text-center drag-handle" style="cursor: grab;">
                                    <i class="fa-solid fa-grip-vertical fs-5 text-muted"></i>
                                </td>
                                <td><input type="checkbox" class="select-item" value="{{ $item->id }}"></td>
                                <td class="serial-number">{{ ++$key }}</td>
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
                                <td class="text-center">
                                    @if($item->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <div class="table-actions justify-content-center">
                                        <button type="button" class="btn btn-info text-white" title="View"
                                                data-bs-toggle="modal" data-bs-target="#viewOrgMemberModal{{ $item->id }}">
                                            <i class="feather-eye"></i>
                                        </button>
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

{{-- View Modals --}}
@foreach ($data as $item)
<div class="modal fade" id="viewOrgMemberModal{{ $item->id }}" tabindex="-1" aria-hidden="true" style="z-index: 1055;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Member Details: {{ $item->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    {{-- Left Column: Image & Contact --}}
                    <div class="col-md-4 text-center border-end">
                        <img src="{{ asset('images/org_members/' . $item->photo) }}"
                             onerror="this.src='{{ asset('img/testimonial.jpg') }}'"
                             alt="{{ $item->name }}" class="img-fluid rounded border mb-3" style="max-height: 250px; object-fit: cover; width: 100%;">
                        
                        <div class="mb-3">
                            <h5 class="mb-1">{{ $item->name }}</h5>
                            <p class="text-muted small mb-2">{{ $item->designation }}</p>
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
                        </div>

                        <div class="d-flex justify-content-center gap-3 fs-5 mb-3">
                            @if(isset($item->facebook) && $item->facebook)
                                <a href="{{ $item->facebook }}" target="_blank" class="text-primary"><i class="feather-facebook"></i></a>
                            @endif
                            @if(isset($item->twitter) && $item->twitter)
                                <a href="{{ $item->twitter }}" target="_blank" class="text-info"><i class="feather-twitter"></i></a>
                            @endif
                            @if(isset($item->instagram) && $item->instagram)
                                <a href="{{ $item->instagram }}" target="_blank" class="text-danger"><i class="feather-instagram"></i></a>
                            @endif
                            @if(isset($item->linkedin) && $item->linkedin)
                                <a href="{{ $item->linkedin }}" target="_blank" class="text-primary"><i class="feather-linkedin"></i></a>
                            @endif
                            @if(isset($item->youtube) && $item->youtube)
                                <a href="{{ $item->youtube }}" target="_blank" class="text-danger"><i class="feather-youtube"></i></a>
                            @endif
                        </div>

                        <div class="text-start px-2">
                            @if(isset($item->email) && $item->email)
                                <div class="d-flex align-items-center mb-2 small">
                                    <i class="feather-mail me-2 text-muted"></i> {{ $item->email }}
                                </div>
                            @endif
                            @if(isset($item->contact_number) && $item->contact_number)
                                <div class="d-flex align-items-center mb-2 small">
                                    <i class="feather-phone me-2 text-muted"></i> {{ $item->contact_number }}
                                </div>
                            @endif
                            @if(isset($item->joining_date) && $item->joining_date)
                                <div class="d-flex align-items-center mb-2 small">
                                    <i class="feather-calendar me-2 text-muted"></i> Joined: {{ \Carbon\Carbon::parse($item->joining_date)->format('M d, Y') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Right Column: Bio & Other Details --}}
                    <div class="col-md-8">
                        <h6 class="border-bottom pb-2 mb-3">Professional Summary</h6>
                        
                        @if(isset($item->bio) && $item->bio)
                            <div class="mb-4 text-justify">
                                <p class="text-muted small" style="white-space: pre-line;">{{ $item->bio }}</p>
                            </div>
                        @else
                            <p class="text-muted small fst-italic">No biography available.</p>
                        @endif

                        @if(isset($item->message) && $item->message)
                            <div class="bg-light p-3 rounded mb-3 border-start border-4 border-primary">
                                <h6 class="small fw-bold text-primary mb-1">Message</h6>
                                <p class="mb-0 small fst-italic">"{{ $item->message }}"</p>
                            </div>
                        @endif

                        <div class="row g-3">
                            @if(isset($item->education) && $item->education)
                            <div class="col-md-6">
                                <label class="small text-muted fw-bold d-block">Education</label>
                                <span class="small">{{ $item->education }}</span>
                            </div>
                            @endif
                            @if(isset($item->experience_years) && $item->experience_years)
                            <div class="col-md-6">
                                <label class="small text-muted fw-bold d-block">Experience</label>
                                <span class="small">{{ $item->experience_years }} Years</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <a href="{{ route('org.edit', $item->id) }}" class="btn btn-primary btn-sm">
                    <i class="feather-edit me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Fix Modal Backdrop -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modalEl = document.getElementById('viewOrgMemberModal{{ $item->id }}');
        modalEl.addEventListener('show.bs.modal', function () {
            $(this).appendTo('body');
        });
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
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        $("#sortable-org-members").sortable({
            handle: ".drag-handle",
            update: function(event, ui) {
                let orderedIds = [];
                $(this).children('tr').each(function(index) {
                    orderedIds.push($(this).data('id'));
                    $(this).find('.serial-number').text(index + 1); // Update serial visually
                });

                $.ajax({
                    url: "{{ route('org.updateOrder') }}",
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
