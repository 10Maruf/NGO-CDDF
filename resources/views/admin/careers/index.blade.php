@extends('layouts.admin')

@section('title_l1', 'Careers')
@section('bread_crumb')
    <li class="breadcrumb-item">Careers</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="mb-0 text-uppercase">All Careers</h6>
            <a href="{{ route('careers.add') }}" class="btn btn-primary btn-sm">
                <i class="feather-plus me-1"></i> Add New Career
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif

                <div class="d-flex justify-content-end mb-3">
                </div>

                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th style="width:40px"><input type="checkbox" id="select-all"></th>
                                <th>SL.</th>
                                <th>Title</th>
                                <th>Thumbnail</th>
                                <th>PDF File</th>
                                <th>Description</th>

                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($careers as $key => $career)
                            <tr>
                                <td class="align-middle"><input type="checkbox" class="select-item" value="{{ $career->id }}"></td>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $career->title }}</td>
                                <td class="align-middle">
                                    @if ($career->thumbnail)
                                        <img src="{{ asset('images/careers/thumbnails/'.$career->thumbnail) }}" alt="{{ $career->title }}" width="50" height="40" class="rounded">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if ($career->pdf_file)
                                        <a href="{{ asset('images/careers/pdfs/'.$career->pdf_file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                            <i class="bx bx-download"></i> View PDF
                                        </a>
                                    @else
                                        <span class="text-muted">No PDF</span>
                                    @endif
                                </td>
                                <td class="align-middle">{{ Str::limit($career->description, 30, '...') }}</td>

                                <td class="align-middle">
                                    <div class="table-actions justify-content-center">
                                        <a href="{{ route('careers.edit', $career->id) }}" class="btn btn-primary" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('careers.delete', $career->id) }}" class="btn btn-danger" title="Delete" data-delete data-delete-title="Delete Career" data-delete-message="Are you sure you want to delete this career? This action cannot be undone.">
                                            <i class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="feather-briefcase"></i>
                                        <p class="mt-2">No careers found. <a href="{{ route('careers.add') }}">Add first one</a></p>
                                    </div>
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
                    'Delete Selected Careers',
                    'Are you sure you want to delete ' + ids.length + ' selected career(s)? This action cannot be undone.',
                    function() {
                        $.ajax({
                            url: "{{ route('careers.bulk_delete') }}",
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
            } else if (confirm('Delete ' + ids.length + ' career(s)?')) {
                $.ajax({
                    url: "{{ route('careers.bulk_delete') }}",
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
