@extends('layouts.admin')

@section('title_l1', 'Latest News')
@section('bread_crumb')
    <li class="breadcrumb-item">News</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All News</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-danger">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('update'))
                    <div class="alert alert-danger">
                        {{ session()->get('update') }}
                    </div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $key=>$news)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $news->title }}</td>
                                <td class="align-middle">
                                    <img src="{{ asset('images/news/'.$news->image) }}" alt="" width="50">
                                </td>
                                <td class="align-middle">{{ Str::limit($news->description,30,'...') }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('news.edit',$news->id) }}" class="btn btn-sm btn-primary text-white text-center">
                                        <i class="feather-edit"></i>
                                    </a>
                                    <a href="{{ route('news.delete',$news->id) }}" class="btn btn-sm btn-danger text-white text-center" data-delete data-delete-title="Delete News" data-delete-message="Are you sure you want to delete this news article? This action cannot be undone.">
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
