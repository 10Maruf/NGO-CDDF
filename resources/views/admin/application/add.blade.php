@extends('layouts.admin')

@section('title_l1', 'Application Settings')
@section('bread_crumb')
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item active">Application</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Logo and Favicon</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('logo.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" name="main_logo" class="form-control @error('logo') is-invalid @enderror" id="logo">
                            @error('main_logo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="fav" class="form-label">Favicon</label>
                            <input type="file" name="fev_icon" class="form-control @error('fav') is-invalid @enderror" id="fav">
                            @error('fev_icon')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="fb" class="form-label">Facebook Link</label>
                            <input type="text" name="fb" class="form-control @error('fb') is-invalid @enderror" id="fb" value="{{ isset($application->facebook)? $application->facebook:'' }}" placeholder="Enter Facebook Link">
                            @error('fb')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="twitter" class="form-label">Twitter Link</label>
                            <input type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" id="twitter" placeholder="Enter Twitter Link" value="{{ isset($application->twitter)?$application->twitter:'' }}">
                            @error('twitter')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="insta" class="form-label">Instagram Link</label>
                            <input type="text" name="insta" class="form-control @error('insta') is-invalid @enderror" id="insta" placeholder="Enter Instagram Link" value="{{ isset($application->instagram)?$application->instagram:'' }}">
                            @error('insta')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="youtube" class="form-label">Youtube Link</label>
                            <input type="text" name="youtube" class="form-control @error('youtube') is-invalid @enderror" id="youtube" placeholder="Enter Youtube Link" value="{{ isset($application->youtube)?$application->youtube:'' }}">
                            @error('youtube')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-2 h6 text-end py-1">Facebook Link : </div>
                    <div class="col-md-10 h6 py-1">
                        {{ isset($application->facebook)? $application->facebook:'' }}
                    </div>

                    <div class="col-md-2 h6 text-end py-1">Twitter Link : </div>
                    <div class="col-md-10 h6 py-1">
                        {{ isset($application->twitter)? $application->twitter:'' }}
                    </div>

                    <div class="col-md-2 h6 text-end py-1">Instagram Link : </div>
                    <div class="col-md-10 h6 text-justify py-1">
                        {{ isset($application->instagram)? $application->instagram:'' }}
                    </div>

                    <div class="col-md-2 h6 text-end py-1">Youtube Link : </div>
                    <div class="col-md-10 h6 py-1">
                        {{ isset($application->youtube)? $application->youtube:'' }}
                    </div>

                    <div class="col-md-2 h6 text-end py-1">Main Logo: </div>
                    <div class="col-md-10 py-1">
                        <img src="{{ asset(isset($application->main_logo)?'images/application/'.$application->main_logo:'') }}" alt="" width="100">
                    </div>

                    <div class="col-md-2 h6 text-end py-1">Fav Icon: </div>
                    <div class="col-md-10 py-1">
                        <img src="{{ asset(isset($application->fav_icon)?'images/application/'.$application->fav_icon:'') }}" alt="" width="50">
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection
