@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Slider</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
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
                            @foreach ($slider as $key => $slider)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle w-25">{{ $slider->title }}</td>
                                <td class="align-middle">
                                    <img src="{{ asset('images/slider/'.$slider->image) }}" alt="" width="50">
                                </td>
                                <td class="align-middle w-25">{{ Str::limit($slider->description,30,'..' )}}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-sm btn-primary text-white">
                                        <i class="fadeIn animated bx bx-edit"></i>
                                    </a>
                                    <a href="{{ route('slider.delete',$slider->id) }}" class="btn btn-sm btn-danger text-white">
                                        <i class="fadeIn animated bx bx-trash-alt"></i>
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
