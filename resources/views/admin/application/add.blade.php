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

                        <hr class="my-3">
                        <h6 class="text-uppercase text-muted mb-3"><i class="bx bx-image me-1"></i> Page Hero Banners</h6>
                        <p class="text-muted small mb-3">Upload hero banner images for each page. If not set, the default static image will be used.</p>

                        @php
                            $banners = [
                                ['field' => 'career_hero_banner', 'label' => 'Career Page', 'default' => 'static_image/news_event_blk.jpg'],
                                ['field' => 'about_us_banner', 'label' => 'About Us Page', 'default' => 'static_image/about_us_bg.jpg'],
                                ['field' => 'contact_banner', 'label' => 'Contact Page', 'default' => 'static_image/contact_blk.jpg'],
                                ['field' => 'donate_banner', 'label' => 'Donate Page', 'default' => 'static_image/donation_blk.jpg'],
                                ['field' => 'faq_banner', 'label' => 'FAQ Page', 'default' => 'static_image/about_us_bg.jpg'],
                                ['field' => 'mission_vision_banner', 'label' => 'Mission & Vision Page', 'default' => 'static_image/mission-vision_bg_blk.jpg'],
                                ['field' => 'key_focus_banner', 'label' => 'Key Focus Area Page', 'default' => 'static_image/focus_areas_blk.jpeg'],
                                ['field' => 'governance_banner', 'label' => 'Governance Level Page', 'default' => 'static_image/about_us_bg.jpg'],
                                ['field' => 'management_banner', 'label' => 'Management Level Page', 'default' => 'static_image/about_us_bg.jpg'],
                                ['field' => 'organogram_banner', 'label' => 'Organogram Page', 'default' => 'static_image/about_us_bg.jpg'],
                                ['field' => 'news_banner', 'label' => 'News & Events Page', 'default' => 'static_image/news_event_blk.jpg'],
                                ['field' => 'projects_banner', 'label' => 'Projects Page', 'default' => 'static_image/projects_blk.jpg'],
                                ['field' => 'volunteer_banner', 'label' => 'Volunteer Page', 'default' => 'static_image/Volunteer_blk.png'],
                                ['field' => 'gallery_banner', 'label' => 'Photo Gallery Page', 'default' => 'static_image/gallery_blk.jpg'],
                                ['field' => 'origin_banner', 'label' => 'Origin & Affiliation Page', 'default' => 'static_image/news_event_blk.jpg'],
                                ['field' => 'policy_banner', 'label' => 'Policy & Guideline Page', 'default' => 'static_image/news_event_blk.jpg'],
                                ['field' => 'strategic_plan_banner', 'label' => 'Strategic Plan Page', 'default' => 'static_image/news_event_blk.jpg'],
                                ['field' => 'publication_banner', 'label' => 'Publication Page', 'default' => 'static_image/news_event_blk.jpg'],
                                ['field' => 'youtube_banner', 'label' => 'YouTube Videos Page', 'default' => 'static_image/news_event_blk.jpg'],
                            ];
                        @endphp

                        <div class="row">
                            @foreach($banners as $banner)
                                <div class="col-md-6 mb-3">
                                    <label for="{{ $banner['field'] }}" class="form-label">{{ $banner['label'] }}</label>
                                    <input type="file" name="{{ $banner['field'] }}" class="form-control form-control-sm" id="{{ $banner['field'] }}">
                                    @error($banner['field'])
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                    @if(isset($application->{$banner['field']}) && $application->{$banner['field']})
                                        <img src="{{ asset('images/application/'.$application->{$banner['field']}) }}" alt="{{ $banner['label'] }}" width="150" class="mt-1 rounded border">
                                    @else
                                        <small class="text-muted">Default: {{ $banner['default'] }}</small>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <hr class="my-3">
                        <h6 class="text-uppercase text-muted mb-3"><i class="bx bx-image me-1"></i> Home Page Section Backgrounds</h6>

                        <div class="col-md-12">
                            <label for="mission_vision_bg" class="form-label">Mission-Vision Section Background (Home Page)</label>
                            <input type="file" name="mission_vision_bg" class="form-control" id="mission_vision_bg">
                            @error('mission_vision_bg')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @if(isset($application->mission_vision_bg) && $application->mission_vision_bg)
                                <img src="{{ asset('images/application/'.$application->mission_vision_bg) }}" alt="Mission Vision BG" width="200" class="mt-2 rounded">
                            @else
                                <small class="text-muted">Default: static_image/mission-vision_bg.jpg</small>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <label for="impact_bg" class="form-label">Impact Section Background (Home Page)</label>
                            <input type="file" name="impact_bg" class="form-control" id="impact_bg">
                            @error('impact_bg')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @if(isset($application->impact_bg) && $application->impact_bg)
                                <img src="{{ asset('images/application/'.$application->impact_bg) }}" alt="Impact BG" width="200" class="mt-2 rounded">
                            @else
                                <small class="text-muted">Default: img/map.png</small>
                            @endif
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

                    @php
                        $previewBanners = [
                            ['field' => 'career_hero_banner', 'label' => 'Career Banner'],
                            ['field' => 'about_us_banner', 'label' => 'About Us Banner'],
                            ['field' => 'contact_banner', 'label' => 'Contact Banner'],
                            ['field' => 'donate_banner', 'label' => 'Donate Banner'],
                            ['field' => 'faq_banner', 'label' => 'FAQ Banner'],
                            ['field' => 'mission_vision_banner', 'label' => 'Mission Vision Banner'],
                            ['field' => 'key_focus_banner', 'label' => 'Key Focus Banner'],
                            ['field' => 'governance_banner', 'label' => 'Governance Banner'],
                            ['field' => 'management_banner', 'label' => 'Management Banner'],
                            ['field' => 'organogram_banner', 'label' => 'Organogram Banner'],
                            ['field' => 'news_banner', 'label' => 'News Banner'],
                            ['field' => 'projects_banner', 'label' => 'Projects Banner'],
                            ['field' => 'volunteer_banner', 'label' => 'Volunteer Banner'],
                            ['field' => 'gallery_banner', 'label' => 'Gallery Banner'],
                            ['field' => 'origin_banner', 'label' => 'Origin Banner'],
                            ['field' => 'policy_banner', 'label' => 'Policy Banner'],
                            ['field' => 'strategic_plan_banner', 'label' => 'Strategic Plan Banner'],
                            ['field' => 'publication_banner', 'label' => 'Publication Banner'],
                            ['field' => 'youtube_banner', 'label' => 'YouTube Banner'],
                            ['field' => 'mission_vision_bg', 'label' => 'Mission-Vision BG (Home)'],
                            ['field' => 'impact_bg', 'label' => 'Impact BG (Home)'],
                        ];
                    @endphp

                    @foreach($previewBanners as $pb)
                    <div class="col-md-2 h6 text-end py-1">{{ $pb['label'] }}: </div>
                    <div class="col-md-10 py-1">
                        @if(isset($application->{$pb['field']}) && $application->{$pb['field']})
                            <img src="{{ asset('images/application/'.$application->{$pb['field']}) }}" alt="" width="150" class="rounded border">
                        @else
                            <span class="text-muted">Using default</span>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
</div>

@endsection
