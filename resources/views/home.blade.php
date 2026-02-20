@extends('main')

@section('title')
Association for Alternative Development
@endsection

@section('content')
{{-- Hero Slider --}}
<div id="heroCarousel" class="hero-wrap carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">
        @foreach ($slider as $skey => $slide)
        <div class="carousel-item @if($skey == 0) active @endif"
             style="background-image: url('{{ asset('images/slider/'.$slide->image) }}');">
            <div class="overlay"></div>
            <div class="container h-100">
                <div class="row no-gutters slider-text h-100 align-items-center justify-content-center">
                    <div class="col-md-7 text-center">
                        <h1 class="mb-3">{{ $slide->title }}</h1>
                        <div class="mx-auto mb-4" style="width:80px; border-bottom:4px solid #f86f2d;"></div>
                        <p class="mb-5">{{ $slide->description }}</p>
                        <p>
                            <a href="{{ route('donate') }}" class="btn btn-white btn-outline-white px-4 py-3">
                                <i class="fa-solid fa-sack-dollar mr-2"></i> Donate Now
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- Controls --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
    {{-- Indicators --}}
    <div class="carousel-indicators">
        @foreach ($slider as $ikey => $s)
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $ikey }}"
                class="@if($ikey == 0) active @endif" aria-label="Slide {{ $ikey + 1 }}"></button>
        @endforeach
    </div>
</div>
{{-- end of hero slider --}}

{{-- About Us --}}
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 text-center">
                <div class="heading-section mb-4">
                    <span class="subheading">Who We Are</span>
                    <h2>About CDDF</h2>
                </div>
                @if(isset($about_us) && $about_us)
                    <div class="text-start" style="text-align: justify !important;">{!! $about_us->description !!}</div>
                @endif
                <div class="mt-4">
                    <a href="{{ route('about.us') }}" class="btn btn-primary px-4">Read More <i class="fa-solid fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- End About Us --}}

{{-- Mission Vision Values --}}
<style>
    .mvv-card {
        border: 2px dashed #e0d8d0;
        transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
        cursor: default;
        opacity: 0;
        transform: translateY(40px);
    }
    .mvv-card.animate-in {
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.6s ease, transform 0.6s ease, box-shadow 0.35s ease, border-color 0.35s ease;
    }
    .mvv-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 16px 40px rgba(248, 111, 45, 0.25) !important;
        border-color: #f86f2d !important;
    }
    .mvv-card:hover .mvv-icon-wrap {
        box-shadow: 0 0 0 3px rgba(248, 111, 45, 0.25);
        transition: box-shadow 0.3s ease;
    }
    .mvv-card-delay-1 { transition-delay: 0.1s; }
    .mvv-card-delay-2 { transition-delay: 0.25s; }
    .mvv-card-delay-3 { transition-delay: 0.4s; }
    .mvv-heading {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .mvv-heading.animate-in {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<section class="py-5" style="background-image: url('{{ asset('static_image/mission-vision_bg.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; position: relative;">
    <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.65);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        {{-- Section Heading --}}
        <div class="text-center mb-5 mvv-heading">
            <p class="mb-1" style="font-size: 0.95rem; color: #ffaa6e; letter-spacing: 1px; font-weight: 600;">CDDF's</p>
            <h2 style="font-size: 2.2rem; color: #ffffff; font-weight: 400;">Vision, Mission, Values</h2>
            <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
        </div>

        {{-- Cards Row --}}
        <div class="row g-4 justify-content-center">
            {{-- Vision Card --}}
            <div class="col-lg-4 col-md-6">
                <div class="mvv-card mvv-card-delay-1 h-100 p-4 bg-white rounded-3 shadow-sm">
                    <div class="d-flex align-items-center mb-3">
                        <div class="mvv-icon-wrap me-3" style="width: 44px; height: 44px; background-color: #fff1e8; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: background-color 0.3s ease;">
                            <i class="fa-solid fa-eye" style="color: #f86f2d; font-size: 1.2rem;"></i>
                        </div>
                        <h4 class="mb-0" style="color: #1a1a1a; font-weight: 600;">Our Vision</h4>
                    </div>
                    <div style="border-left: 4px solid #f86f2d; padding-left: 14px; min-height: 110px;">
                        <p class="mb-0 text-secondary" style="text-align: justify; line-height: 1.75;">
                            @if(isset($mission_vision) && $mission_vision->vision)
                                {{ $mission_vision->vision }}
                            @else
                                CDDF envisions an empowered society where poor, helpless, and destitute people achieve improved living conditions through inclusive socio-economic development.
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            {{-- Mission Card --}}
            <div class="col-lg-4 col-md-6">
                <div class="mvv-card mvv-card-delay-2 h-100 p-4 bg-white rounded-3 shadow-sm">
                    <div class="d-flex align-items-center mb-3">
                        <div class="mvv-icon-wrap me-3" style="width: 44px; height: 44px; background-color: #fff1e8; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: background-color 0.3s ease;">
                            <i class="fa-solid fa-bullseye" style="color: #f86f2d; font-size: 1.2rem;"></i>
                        </div>
                        <h4 class="mb-0" style="color: #1a1a1a; font-weight: 600;">Our Mission</h4>
                    </div>
                    <div style="border-left: 4px solid #f86f2d; padding-left: 14px; min-height: 110px;">
                        <p class="mb-0 text-secondary" style="text-align: justify; line-height: 1.75;">
                            @if(isset($mission_vision) && $mission_vision->mission)
                                {{ $mission_vision->mission }}
                            @else
                                CDDF promotes citizens' rights, strengthens women's livelihoods, and drives sustainable development to bring marginalized communities into the mainstream, with special focus on women, children, and disaster-affected persons.
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            {{-- Values Card --}}
            <div class="col-lg-4 col-md-6">
                <div class="mvv-card mvv-card-delay-3 h-100 p-4 bg-white rounded-3 shadow-sm">
                    <div class="d-flex align-items-center mb-3">
                        <div class="mvv-icon-wrap me-3" style="width: 44px; height: 44px; background-color: #fff1e8; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: background-color 0.3s ease;">
                            <i class="fa-solid fa-chart-line" style="color: #f86f2d; font-size: 1.2rem;"></i>
                        </div>
                        <h4 class="mb-0" style="color: #1a1a1a; font-weight: 600;">Our Values</h4>
                    </div>
                    <div style="border-left: 4px solid #f86f2d; padding-left: 14px; min-height: 110px;">
                        <p class="mb-0 text-secondary" style="text-align: justify; line-height: 1.75;">
                            @if(isset($mission_vision) && $mission_vision->values)
                                {{ $mission_vision->values }}
                            @else
                                CDDF is guided by humanitarian standards, respect for all, equal opportunities, protection of rights and dignity, and a strong commitment to transparency and good governance.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
(function () {
    const targets = document.querySelectorAll('.mvv-card, .mvv-heading');
    if (!targets.length) return;
    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });
    targets.forEach(function (el) { observer.observe(el); });
})();
</script>
{{-- End Mission Vision Values --}}

{{-- Featured Programs --}}
<div class="bg-light">
    <div class="container bg-white px-2">
        <div class="pt-5 pb-3">
            <h3 class="text-center"> Featured <span class="text-danger">Programs</span></h3>
            <p class="text-center text-secondary">Elevating Lives, Empowering Futures: AFAD's Featured Program brings transformative opportunities to communities in northern Bangladesh.</p>
        </div>

        <div class="row p-3">
            @if(isset($programs) && count($programs) > 0)
                @foreach($programs as $program)
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                    <a href="{{ route('programs.view', $program->id) }}">
                        <div class="featuredImage">
                            @if($program->image)
                            <img src="{{ asset('images/programs/'.$program->image) }}" alt="{{ $program->title }}">
                            @else
                            <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="{{ $program->title }}">
                            @endif
                            <div class="overlay">
                                <p class="h4">{{ $program->title }}</p>
                                <p class="textmuted">{{ Str::limit($program->description, 150) }}</p>
                                @if($program->status)
                                <span class="badge badge-{{ $program->status == 'active' ? 'success' : ($program->status == 'completed' ? 'secondary' : 'info') }}">{{ ucfirst($program->status) }}</span>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            @else
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                <a href="#">
                    <div class="featuredImage">
                        <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        <div class="overlay">
                            <p class="h4">Women's Empowerment Initiative</p>
                            <p class="textmuted"> Promoting gender equality and empowerment through education, skill-building, and advocacy for women's rights.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                <a href="#">
                    <div class="featuredImage">
                        <img src="https://images.pexels.com/photos/2659475/pexels-photo-2659475.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        <div class="overlay">
                            <p class="h4">Youth Development Project</p>
                            <p class="textmuted"> Empowering the next generation through mentorship, education, and community engagement to foster leadership.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                <a href="#">
                    <div class="featuredImage">
                        <img src="https://images.pexels.com/photos/4388165/pexels-photo-4388165.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        <div class="overlay">
                            <p class="h4">Healthcare Access Program</p>
                            <p class="textmuted">Providing essential healthcare services, awareness campaigns, and medical assistance to underserved communities in Bangladesh.</p>
                        </div>
                    </div>
                </a>
            </div>
            @endif
        </div>

        <div class="d-flex justify-content-center pt-5 pb-3">
            <a href="{{ route('programs.all') }}" class="btn btn-danger"><i class="fa-solid fa-eye"></i> View all Programs</a>
        </div>
        <hr class="py-3 mt-4 m-0">
    </div>
</div>
{{-- End of Featured Programs --}}

{{-- Ongoing Project --}}
<div class="bg-light">
    <div class="container bg-white px-2">
        <div class="pt-3 pb-3">
            <h3 class="text-center">Ongoing <span class="text-danger">Projects</span></h3>
            <p class="text-center text-secondary">AFAD's Ongoing Projects actively address community needs, fostering sustainable development in northern Bangladesh.</p>
        </div>

        {{-- card --}}
        <div class="row row-cols-1 row-cols-md-3 g-3">
            @foreach ($project as $key=>$project)
                <div class="col">
                    <div class="card shadow border-0">
                        <img src="{{ asset('images/project/'.$project->image) }}" class="card-img-top" alt="activity" width="100%" height="200px">
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ Str::limit( $project->title ,15, '...') }}
                            </h4>
                            <p class="text-secondary" style="font-size: 12px;">
                                <i class="fas fa-calendar-minus"></i>
                                {{ date("d/m/Y  h:i:s a") }}
                            </p>
                            <hr>
                            <p class="card-text py-1">
                                {{ Str::limit($project->description, 75,"...") }}
                            </p>
                            <a href="{{ route('ongoing.project.view',$project->id) }}" class="text-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i> Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center py-5">
            <a href="{{ route('ongoing.project') }}" class="btn btn-danger"> <i class="fa-solid fa-eye"></i> VIEW ALL PROJECTS</a>
        </div>
        {{-- card --}}

    </div>
</div>

{{-- Sponsor --}}
<div style="background-image: url('{{asset('img/slider/slider-1.jpg')}}');border-top:5px solid rgb(255, 0, 68);border-bottom:5px solid rgb(255, 0, 68);">
    <div class="container py-5">
        <h4 class="text-uppercasse text-white text-center"><span class="text-danger">Sponsor</span> for Growing Fund</h4>
        <div class="d-flex justify-content-center">
            <p class="text-white text-center py-3">
            Sponsor AFAD's growing fund to fuel impactful initiatives in northern Bangladesh, empowering communities and fostering positive change. Your support drives essential programs in healthcare, education, and community resilience, making a lasting difference in the lives of those in need. Join us in our mission to create a brighter future for all.
        </p>
        </div>

        <div class="d-flex justify-content-center">
            <a href="{{ route('contact') }}" class="btn btn-danger fw-blod"><i class="fa-solid fa-hand-holding-dollar"></i> Become a Sponsor</a>
        </div>

    </div>
</div>
{{-- End of Sponsor --}}

{{-- Latest News and Events --}}
<div class="bg-light">
    <div class="container bg-white pt-5">
        <div class="py-3">
            <h3 class="text-center">Latest News<span class="text-danger"> & Events</span></h3>
            <p class="text-center text-secondary">The sole meaning of life is to serve humanity</p>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($news as $key=>$data)
                <div class="col">
                    <div class="card border-0 shadow">
                        <img src="{{ asset('images/news/'.$data->image) }}" class="card-img-top" alt="activity" width="100%" height="200px">
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($data->title, 30 , '...') }}</h5>
                            <p class="text-secondary" style="font-size: 12px;">
                                <i class="fas fa-calendar-minus"></i>
                                {{ date("d/m/Y  h:i:s a") }}
                            </p>
                            <p class="card-text py-3">
                                {{ Str::limit($data->description, 75, '...') }}
                            </p>
                            <a href="{{ route('latest.news.view',$data->id) }}" class="text-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i> Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center py-5">
            <a href="{{ route('latest.news.all') }}" class="btn btn-danger"><i class="fa-solid fa-eye"></i> View all News & Events</a>
        </div>
    </div>
</div>
{{-- End of Latest News and Events --}}


{{-- Volunteer part --}}
<div style=" background-image: url('{{asset('img/slider/slider-1.jpg')}}');background-attachment:fixed;">
    <div class="container">
        <div class="row p-5">
            <div class="col-md-12">
                <h4 class="text-uppercasse text-white text-center"><span class="text-danger">Become</span> a Volunteer</h4>
                <p class="text-white py-2 text-center">
                    Sponsor AFAD's growing fund to fuel impactful initiatives in northern Bangladesh, empowering communities and fostering positive change. Your support drives essential programs in healthcare, education, and community resilience, making a lasting difference in the lives of those in need. Join us in our mission to create a brighter future for all.
                </p>
                <div class="text-center">
                    <a href="#" class="btn btn-danger"><i class="fa-solid fa-user-plus"></i> Registration</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end of volunteer part --}}

{{-- Photo Gallery --}}
<style>
.cddf-gallery-grid { display:flex; flex-wrap:wrap; }
.cddf-gallery-tile {
    position:relative;
    height:210px;
    width:25%;
    background-size:cover;
    background-position:center;
    display:flex;
    align-items:center;
    justify-content:center;
    overflow:hidden;
    text-decoration:none;
}
.cddf-gallery-tile::after {
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,0,0,0.22);
    transition:all 0.3s ease;
}
.cddf-gallery-tile .gal-icon {
    position:relative;
    z-index:2;
    width:48px;
    height:48px;
    background:rgba(255,255,255,0.85);
    border-radius:50%;
    opacity:0;
    display:flex;
    align-items:center;
    justify-content:center;
    transition:all 0.3s ease;
    color:#f86f2d;
    font-size:1rem;
}
.cddf-gallery-tile:hover .gal-icon { opacity:1; }
.cddf-gallery-tile:hover::after { opacity:0; }
@media(max-width:575px){ .cddf-gallery-tile{ width:50%; height:160px; } }
@media(min-width:576px) and (max-width:767px){ .cddf-gallery-tile{ width:50%; height:180px; } }
@media(min-width:768px) and (max-width:991px){ .cddf-gallery-tile{ width:33.333%; height:190px; } }
</style>

<section style="background:#f9f5f1; padding-top:60px; padding-bottom:0;">
    <div class="container">
        <div class="text-center mb-4">
            <span style="display:inline-block; background:#fff1e8; color:#f86f2d; font-size:0.78rem; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; padding:4px 16px; border-radius:20px; margin-bottom:10px;">Gallery</span>
            <h2 style="font-family:'Dosis',sans-serif; font-weight:700; color:#2d2d2d; font-size:2rem;">Photo Gallery</h2>
            <div style="width:60px; height:4px; background:#f86f2d; border-radius:2px; margin:10px auto 0;"></div>
            <p class="mt-3" style="color:#777; max-width:520px; margin:0 auto; font-size:0.97rem;">Moments captured from our work across communities in Chilmari and beyond.</p>
        </div>
    </div>
    <div class="cddf-gallery-grid">
        @foreach($gallery as $data)
        <a href="{{ asset('images/gallery/'.$data->image) }}"
           class="cddf-gallery-tile image-popup-gallery"
           style="background-image:url('{{ asset('images/gallery/'.$data->image) }}');">
            <div class="gal-icon"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
        </a>
        @endforeach
    </div>
    <div class="text-center py-4" style="background:#f9f5f1;">
        <a href="{{ route('photo.all') }}" class="btn px-5 py-2" style="background:#f86f2d; color:#fff; font-weight:600; border-radius:4px; font-size:0.95rem;"><i class="fa-solid fa-images me-2"></i>View All Photos</a>
    </div>
</section>
{{-- End of Photo Gallery --}}

@push('css')
<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
<style>
/* Magnific Popup zoom animation */
.mfp-with-zoom .mfp-container,
.mfp-with-zoom.mfp-bg {
    opacity: 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
.mfp-with-zoom.mfp-ready .mfp-container { opacity: 1; }
.mfp-with-zoom.mfp-ready.mfp-bg { opacity: 0.8; }
.mfp-with-zoom.mfp-removing .mfp-container,
.mfp-with-zoom.mfp-removing.mfp-bg { opacity: 0; }
.cddf-gallery-tile::after { pointer-events: none; }
</style>
@endpush
@push('js')
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script>
$(document).ready(function(){
    $('.image-popup-gallery').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1]
        },
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300
        }
    });
});
</script>
@endpush

{{-- Impact part --}}
<div style="background-image: url('{{asset('img/map.png')}}'); background-attachment:fixed;">
    <div class="container">
        <div class="p-5">
            <h4 class="text-uppercasse text-white text-center"><span class="text-danger">Our</span> Impact</h4>
            <div class="row justify-content-sm-center">
                <div class="col-md-6">
                    <p class="text-white py-2 text-center">
                        Transforming lives and communities in northern Bangladesh through sustainable development initiatives, empowering individuals and fostering positive change. Join us in making a lasting difference for a brighter future.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                {{-- Year --}}
                <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                    <i class="fa-regular fa-calendar-check text-secondary pt-3"></i>
                    <h6>Year</h6>
                    <h2 class="text-danger fw-bold">1998</h2>
                </div>
                {{-- District --}}
                <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                    <i class="fa-solid fa-map-location-dot text-secondary pt-3"></i>
                    <h6>District</h6>
                    <h2 class="text-danger fw-bold">03</h2>
                </div>
                {{-- Project --}}
                <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                    <i class="fa-solid fa-hands-holding-circle text-secondary pt-3"></i>
                    <h6>Project</h6>
                    <h2 class="text-danger fw-bold">41</h2>
                </div>
                {{-- People --}}
                <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                    <i class="fa-solid fa-users-viewfinder text-secondary pt-3"></i>
                    <h6>People</h6>
                    <h2 class="text-danger fw-bold">1.3M</h2>
                </div>
            </div>

        </div>
    </div>
</div>
{{-- End of Impact part --}}

{{-- Success Stories --}}
<div class="bg-light pb-5" style=" background-image: url('{{asset('img/testimonial_back.jpg')}}');">
    <div class="container">
        <div class="py-5">
            <h3 class="text-center text-white">Success Stories</h3>
        </div>
        
        {{-- Rating Filter --}}
        <div class="text-center mb-4">
            <button class="btn btn-light me-2 filter-btn" data-rating="5">5 Star</button>
            <button class="btn btn-light me-2 filter-btn" data-rating="4">4 Star</button>
            <button class="btn btn-light me-2 filter-btn" data-rating="3">3 Star</button>
            <button class="btn btn-light me-2 filter-btn" data-rating="2">2 Star</button>
            <button class="btn btn-light me-2 filter-btn" data-rating="1">1 Star</button>
            <button class="btn btn-light filter-btn active" data-rating="0">All</button>
        </div>
        
        {{-- Success Stories Slider --}}
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($stories as $index => $story)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }} story-item" data-rating="{{ $story->rating }}">
                    <div class="text-center px-3">
                        <div class="rating mb-3">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $story->rating)
                                    <span class="text-warning fs-4">&#9733;</span>
                                @else
                                    <span class="text-white fs-4">&#9734;</span>
                                @endif
                            @endfor
                        </div>
                        <p class="text-white mt-3 mb-4 px-2" style="font-style: italic; font-size: 1.1rem; word-wrap: break-word; overflow-wrap: break-word;">"{{ Str::limit($story->description, 200) }}"</p>
                        <img src="{{ asset('images/stories/'.$story->image) }}" class="img-fluid rounded-circle border" alt="{{ $story->beneficiary_name }}" width="100" height="100">
                        <h5 class="mt-3 text-white mb-0">{{ $story->beneficiary_name }}</h5>
                        <p class="text-muted" style="color: #ddd !important;">{{ $story->beneficiary_title }}</p>
                    </div>
                </div>
                @empty
                <!-- Default Testimonial if no stories exist -->
                <div class="carousel-item active story-item" data-rating="3">
                    <div class="text-center">
                        <img src="{{ asset('img/testimonial.jpg') }}" class="img-fluid rounded-circle border" alt="Testimonial" width="100" height="100">
                        <h5 class="mt-3 text-white">Jane Alam</h5>
                        <p class="text-white">AFAD's tireless efforts in promoting education, healthcare, and economic opportunities have transformed the lives of many marginalized individuals. Their holistic approach to development is making a lasting difference in our region.</p>
                        <div class="rating">
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-white">&#9734;</span>
                            <span class="text-white">&#9734;</span>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            <!-- Carousel Controls -->
            @if($stories && count($stories) > 1)
            <button class="carousel-control-prev text-dark" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            @endif
        </div>
        {{-- End of Success Stories Slider --}}
    </div>
</div>
{{-- End of Success Stories --}}

<script>
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const selectedRating = this.getAttribute('data-rating');
        
        // Update active button
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        
        // Filter stories
        const stories = document.querySelectorAll('.story-item');
        stories.forEach(story => {
            if (selectedRating === '0') {
                story.style.display = 'block';
            } else {
                story.style.display = story.getAttribute('data-rating') === selectedRating ? 'block' : 'none';
            }
        });
    });
});
</script>

{{-- subscription part --}}
<div class="bg-light pb-5">
    <div class="container bg-white pb-5 rounded">
        <div class="py-5">
            <h3 class="text-center"><span class="text-danger">Stay</span> connected <span class="text-danger"> with us</span></h3>
            <p class="text-center text-secondary">Keep in touch with our activities throughout the world by subscribing to our e-newsletter.</p>
        </div>
        <div>
            @if (session()->has('success'))
                <div class="alert alert-success w-75 mx-auto text-center">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form action="{{ route('user.subscribe') }}" method="post">
                @csrf
                <div class="d-flex justify-content-center">
                    <div class="w-75 mx-auto">
                        <div class="row">
                            <div class="col-md-4 my-2">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your Name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email" value="{{ old('email') }}">
                                 @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-block btn-danger my-2" type="submit">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- end of subscription part --}}
@endsection

@push('js')

@endpush
