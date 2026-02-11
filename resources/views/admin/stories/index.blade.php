@extends('layouts.admin')

@section('title_l1', 'Success Stories')
@section('bread_crumb')
    <li class="breadcrumb-item">Stories</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Success Stories</h6>
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
                                <th>SL.</th>
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
                                <td class="align-middle">{{ ++$key }}</td>
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
                                <td class="text-center align-middle">
                                    <a href="{{ route('stories.edit',$item->id) }}" class="btn btn-sm btn-primary text-white text-center">
                                        <i class="feather-edit"></i>
                                    </a>
                                    <a href="{{ route('stories.delete',$item->id) }}" class="btn btn-sm btn-danger text-white text-center" data-delete data-delete-title="Delete Success Story" data-delete-message="Are you sure you want to delete this success story? This action cannot be undone.">
                                        <i class="feather-trash-2"></i>
                                    </a>
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
@endsection
