@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Contacts</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Type</th>
                                <th>Title/Designation</th>
                                <th>Name/Address</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contacts as $key=>$contact)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">
                                    @if($contact->type == 'head_office')
                                        <span class="badge bg-success">Head Office</span>
                                    @elseif($contact->type == 'branch')
                                        <span class="badge bg-info">Branch</span>
                                    @else
                                        <span class="badge bg-primary">Person</span>
                                    @endif
                                </td>
                                <td class="align-middle">{{ $contact->title }}</td>
                                <td class="align-middle">
                                    @if($contact->type == 'head_office' || $contact->type == 'branch')
                                        {{ Str::limit($contact->address, 50) }}
                                    @else
                                        {{ $contact->name }}
                                    @endif
                                </td>
                                <td class="align-middle">{{ $contact->mobile }}</td>
                                <td class="align-middle">{{ $contact->email }}</td>
                                <td class="align-middle">
                                    @if($contact->status == 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-sm btn-primary text-white">
                                        <i class="fadeIn animated bx bx-edit"></i>
                                    </a>
                                    <a href="{{ route('contact.delete', $contact->id) }}" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure you want to delete this contact?')">
                                        <i class="fadeIn animated bx bx-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">No contacts found. Add your first contact!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
