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

{{-- Focus Areas --}}
@if(isset($focus_areas) && $focus_areas->count())
<section class="py-5 bg-light" id="home-focus-areas">
<style>
    /* ---- Focus Area Cards ---- */
    .hfa-title-block {
        background: #f86f2d; /* Orange */
        border-radius: 0;
        padding: 40px;
        height: 100%;
        min-height: 380px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding-top: 60px;
        opacity: 0;
        transform: translateY(30px);
        color: #fff;
    }
    .hfa-title-block.hfa-in {
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }
    .hfa-card {
        background: #fff;
        border: 2px dashed #ddd;
        border-radius: 18px;
        padding: 28px 22px 22px;
        height: 100%;
        position: relative;
        overflow: hidden;
        transition: transform 0.28s ease, box-shadow 0.28s ease, background 0.28s ease, border-color 0.28s ease;
        opacity: 0;
        transform: translateY(30px);
    }
    .hfa-card.hfa-in {
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.5s ease, transform 0.5s ease, background 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease;
    }
    .hfa-card:hover {
        background: #f86f2d;
        border-color: #f86f2d;
        transform: translateY(-5px);
        box-shadow: 0 16px 40px rgba(248,111,45,0.32);
    }
    .hfa-icon-wrap {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        background: rgba(248,111,45,0.10);
        color: #f86f2d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 14px;
        transition: background 0.28s ease, color 0.28s ease;
    }
    .hfa-card:hover .hfa-icon-wrap {
        background: rgba(255,255,255,0.22);
        color: #fff;
    }
    .hfa-card-title {
        font-size: 15.5px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.03em;
        margin-bottom: 8px;
        color: #1a1a1a;
        transition: color 0.28s ease;
    }
    .hfa-card:hover .hfa-card-title { color: #fff; }
    .hfa-card-desc {
        font-size: 13.5px;
        color: #666;
        line-height: 1.65;
        margin-bottom: 14px;
        transition: color 0.28s ease;
    }
    .hfa-card:hover .hfa-card-desc { color: rgba(255,255,255,0.88); }
    .hfa-learn-more {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 13px;
        font-weight: 700;
        border: 2px solid #f86f2d;
        color: #f86f2d;
        background: transparent;
        border-radius: 50px;
        padding: 5px 16px;
        text-decoration: none;
        transition: background 0.25s ease, color 0.25s ease, border-color 0.25s ease, gap 0.2s;
    }
    .hfa-card:hover .hfa-learn-more {
        background: #fff;
        color: #f86f2d;
        border-color: #fff;
    }
    /* stagger */
    .nfa-d1 { transition-delay: 0.1s; }
    .nfa-d2 { transition-delay: 0.2s; }
    .nfa-d3 { transition-delay: 0.3s; }
    .nfa-d4 { transition-delay: 0.4s; }
    .nfa-d5 { transition-delay: 0.5s; }
    .nfa-d6 { transition-delay: 0.6s; }

    /* New Focus Area Styling based on Tailwind concept */
    :root {
        --fa-primary: #f86f2d; /* Orange */
    }
    
    .new-fa-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem; /* Gap 4 => 1rem, but let's give it a bit more space like a gutter */
    }
    @media (min-width: 768px) {
        .new-fa-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 992px) {
        .new-fa-grid { grid-template-columns: repeat(3, 1fr); }
    }
    .w-2-3-xl {
        width: 83.333333%; /* w-5/6 */
        margin-left: auto;
        margin-right: auto;
    }
    @media (min-width: 1536px) {
        .w-2-3-xl { width: 66.666667%; } /* 2xl:w-2/3 */
    }

    /* 1. Title Block (Static Orange) */
    .nfa-title-card {
        background-color: var(--fa-primary);
        color: #fff;
        padding: 2rem;
        min-height: 208px; /* Tailwind min-h-52 = 13rem = 208px */
        display: flex;
        flex-direction: column;
        justify-content: center;
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .nfa-title-card.aos-animate {
        opacity: 1;
        transform: translateY(0);
    }
    .nfa-title-small {
        font-size: 1.25rem; /* text-xl */
        font-weight: 400; /* font-sans */
        display: block;
        margin-bottom: 0px;
    }
    @media (min-width: 768px) {
        .nfa-title-small { font-size: 2.25rem; } /* md:text-4xl */
    }

    .nfa-title-main {
        font-size: 1.5rem; /* text-2xl */
        font-weight: 700; /* font-bold */
        text-transform: capitalize;
        line-height: 1.1;
    }
    @media (min-width: 768px) {
        .nfa-title-main { font-size: 2.25rem; } /* md:text-4xl */
    }

    /* 2. Content Cards */
    .nfa-item-card {
        background-color: #fff;
        border-radius: 1rem; /* rounded-2xl */
        padding: 0.75rem; /* p-3 outer padding */
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* shadow-lg */
        min-height: 100%; /* Match grid height */
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease;
        opacity: 0;
        transform: translateY(20px);
    }
    .nfa-item-card.aos-animate {
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    
    /* The sliding background (orange) */
    .nfa-hover-bg {
        position: absolute;
        top: 0; 
        left: 0;
        height: 100%;
        width: 0; /* starts at 0 width */
        background-color: var(--fa-primary);
        border-radius: 1rem; /* rounded-2xl */
        z-index: 0; /* Behind content */
        transition: width 0.5s ease;
    }
    /* Expand on hover */
    .nfa-item-card:hover .nfa-hover-bg {
        width: 100%;
    }

    /* Inner Content Wrapper */
    .nfa-content-wrap {
        position: relative;
        z-index: 10;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    
    /* Dashed Border Box inside */
    .nfa-dashed-box {
        border: 1px dashed #d1d5db; /* border-gray-300 */
        border-radius: 0.5rem; /* rounded-lg */
        padding: 2rem; /* p-8 */
        width: 100%;
        height: 100%;
        transition: border-color 0.2s ease;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }
    .nfa-item-card:hover .nfa-dashed-box {
        border-color: rgba(255,255,255, 0.5); /* lighter border on orange */
    }

    /* Typography & Icon changes on Hover */
    .nfa-icon {
        font-size: 3rem; /* w-16 approx 4rem */
        color: #333;
        transition: color 0.3s ease;
    }
    .nfa-card-title {
        font-size: 1.25rem; /* text-xl */
        font-weight: 400; /* font-sans */
        text-transform: uppercase;
        margin-top: 0.5rem; /* mt-2 */
        color: #1f2937; 
        transition: color 0.3s ease;
    }
    @media (min-width: 768px) {
        .nfa-card-title { font-size: 1.5rem; } /* md:text-2xl */
    }
    .nfa-card-desc {
        color: #4b5563; 
        margin-top: 1.5rem;
        margin-bottom: 1.5rem; /* my-6 */
        line-height: 1.6;
        transition: color 0.3s ease;
        flex-grow: 1;
    }

    /* Button */
    .nfa-learn-btn {
        display: inline-block;
        font-weight: 600; /* font-semibold */
        text-transform: capitalize;
        padding: 0.5rem 1rem; /* px-4 py-2 */
        border: 1px dashed #d1d5db;
        border-radius: 9999px; /* rounded-full */
        color: #1f2937;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .nfa-item-card.aos-animate {
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    
    /* The sliding background (orange) */
    .nfa-hover-bg {
        position: absolute;
        top: 0; 
        left: 0;
        height: 100%;
        width: 0; /* starts at 0 width */
        background-color: var(--fa-primary);
        border-radius: 1rem;
        z-index: 0; /* Behind content */
        transition: width 0.5s ease;
    }
    /* Expand on hover */
    .nfa-item-card:hover .nfa-hover-bg {
        width: 100%;
    }

    /* Inner Content Wrapper */
    .nfa-content-wrap {
        position: relative;
        z-index: 10; /* Above background */
        height: 100%;
        padding: 1rem; /* p-3 in original snippet */
        display: flex;
        flex-direction: column;
    }
    
    /* Dashed Border Box inside */
    .nfa-dashed-box {
        border: 1px dashed #d1d5db; /* border-gray-300 */
        border-radius: 0.5rem; /* rounded-lg */
        padding: 2rem; /* p-8 in original */
        width: 100%;
        height: 100%;
        transition: border-color 0.2s ease;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }
    .nfa-item-card:hover .nfa-dashed-box {
        border-color: rgba(255,255,255, 0.5); /* lighter border on orange */
    }

    /* Typography & Icon changes on Hover */
    .nfa-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #333;
        transition: color 0.3s ease;
    }
    .nfa-card-title {
        font-size: 1.5rem;
        font-weight: 700;
        text-transform: uppercase;
        margin-top: 0.5rem;
        margin-bottom: 1rem;
        color: #1f2937; /* text-gray-800 */
        transition: color 0.3s ease;
    }
    .nfa-card-desc {
        margin-bottom: 1.5rem;
        color: #4b5563; /* text-gray-600 */
        line-height: 1.6;
        transition: color 0.3s ease;
        flex-grow: 1;
    }

    /* Button */
    .nfa-learn-btn {
        display: inline-block;
        font-weight: 600;
        text-transform: capitalize;
        padding: 0.5rem 1rem;
        border: 1px dashed #d1d5db;
        border-radius: 9999px; /* rounded-full */
        color: #1f2937;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    
    /* HOVER STATES for Text elements (Turn White) */
    .nfa-item-card:hover .nfa-icon,
    .nfa-item-card:hover .nfa-card-title,
    .nfa-item-card:hover .nfa-card-desc {
        color: #ffffff;
    }
    
    .nfa-item-card:hover .nfa-learn-btn {
        background-color: #fff;
        color: var(--fa-primary);
        border-color: transparent;
    }

</style>
    <div class="container pb-5 position-relative">
        <div class="mx-auto position-relative" style="max-width: 83.333333%; @media (min-width: 1536px) { max-width: 66.666667%; }">
        
        {{-- Orange Glow Effect --}}
        <div style="
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 120%;
            height: 120%;
            background: radial-gradient(circle, rgba(248,111,45,0.25) 0%, rgba(255,255,255,0) 70%);
            pointer-events: none;
            z-index: 0;
        "></div>

        {{-- Custom Grid Layout --}}
        <div class="new-fa-grid" style="position: relative; z-index: 1;">
            
            {{-- 1. Title Block --}}
            <div class="nfa-title-card aos-animate">
                <span class="nfa-title-small">Our</span>
                <h2 class="nfa-title-main">Focus areas</h2>
            </div>
            
            {{-- 2. Loop Focus Areas --}}
            @php
                $delays = ['nfa-d1','nfa-d2','nfa-d3','nfa-d4','nfa-d5','nfa-d6'];
            @endphp
            @foreach($focus_areas as $fa)
            @php
                $faIcon = !empty($fa->icon_class) ? $fa->icon_class : 'fa-solid fa-bullseye';
                $delay  = isset($delays[$loop->index]) ? $delays[$loop->index] : '';
            @endphp
            <div class="nfa-item-card {{ $delay }}">
                {{-- Sliding Orange Background --}}
                <div class="nfa-hover-bg"></div>
                
                <div class="nfa-content-wrap">
                    <div class="nfa-dashed-box">
                        {{-- Icon --}}
                        <div class="nfa-icon">
                            <i class="{{ $faIcon }}"></i>
                        </div>
                        
                        {{-- Title --}}
                        <h3 class="nfa-card-title">{{ $fa->title }}</h3>
                        
                        {{-- Desc --}}
                        <p class="nfa-card-desc">{{ Str::limit($fa->description, 100) }}</p>
                        
                        {{-- Button --}}
                        <a href="{{ route('focus.area.detail', $fa->id) }}" class="nfa-learn-btn">
                            Learn more
                            <span class="visually-hidden">about {{ $fa->title }}</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>

<script>
(function () {
    // Intersection Observer that toggles 'aos-animate' based on visibility
    var items = document.querySelectorAll('.nfa-title-card, .nfa-item-card');
    if (!items.length) return;
    
    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                // Determine if scrolling down or just appearing
                entry.target.classList.add('aos-animate');
            } else {
                // When scrolling out of view, remove class to reset animation state
                // This makes them "disappear" so they can animate in again
                entry.target.classList.remove('aos-animate');
            }
        });
    }, { threshold: 0.1 }); // Trigger when 10% visible
    
    items.forEach(function(el) { observer.observe(el); });
})();
</script>
@endif
{{-- End Focus Areas --}}

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

{{-- Our Network: Partners & Donors --}}
<style>
.cddf-network-section {
    background: #fff;
    padding: 60px 0 50px;
    border-top: 4px solid #f86f2d;
    border-bottom: 4px solid #f86f2d;
}
.cddf-network-section .section-badge {
    display: inline-block;
    background: #fff3ed;
    color: #f86f2d;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 5px 16px;
    border-radius: 20px;
    margin-bottom: 10px;
}
.cddf-network-section h2 {
    font-size: 1.9rem;
    font-weight: 800;
    color: #1a1a1a;
    margin-bottom: 6px;
}
.cddf-network-section h2 span { color: #f86f2d; }
.cddf-network-section .subtitle {
    color: #777;
    font-size: 0.95rem;
    margin-bottom: 40px;
}
/* Marquee track */
.cddf-marquee-outer {
    overflow: hidden;
    position: relative;
    width: 100%;
}
.cddf-marquee-outer::before,
.cddf-marquee-outer::after {
    content: '';
    position: absolute;
    top: 0; bottom: 0;
    width: 80px;
    z-index: 2;
    pointer-events: none;
}
.cddf-marquee-outer::before { left: 0; background: linear-gradient(to right, #fff, transparent); }
.cddf-marquee-outer::after  { right: 0; background: linear-gradient(to left, #fff, transparent); }
.cddf-marquee-track {
    display: flex;
    gap: 24px;
    width: max-content;
    animation: cddfScroll 30s linear infinite;
}
.cddf-marquee-track:hover { animation-play-state: paused; }
@keyframes cddfScroll {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.cddf-partner-item {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    border: 1.5px solid #ffe0d0;
    border-radius: 12px;
    padding: 14px 24px;
    min-width: 160px;
    max-width: 200px;
    height: 90px;
    box-shadow: 0 2px 10px rgba(248,111,45,0.07);
    transition: box-shadow .2s, border-color .2s;
    position: relative;
    overflow: hidden;
}
.cddf-partner-item:hover {
    box-shadow: 0 4px 18px rgba(248,111,45,0.18);
    border-color: #f86f2d;
}
.cddf-partner-item img {
    max-height: 58px;
    max-width: 150px;
    object-fit: contain;
    filter: grayscale(40%);
    transition: filter .2s;
}
.cddf-partner-item:hover img { filter: grayscale(0%); }
.cddf-partner-item .partner-name {
    font-size: 12px;
    font-weight: 600;
    color: #444;
    text-align: center;
    line-height: 1.35;
    word-break: break-word;
}
/* Hover name tooltip overlay */
.cddf-partner-item .partner-tooltip {
    position: absolute;
    bottom: -100%;
    left: 0; right: 0;
    background: rgba(248,111,45,0.93);
    color: #fff;
    font-size: 11px;
    font-weight: 600;
    text-align: center;
    padding: 6px 8px;
    line-height: 1.3;
    transition: bottom .25s ease;
    pointer-events: none;
    border-radius: 0 0 10px 10px;
}
.cddf-partner-item:hover .partner-tooltip {
    bottom: 0;
}
</style>

<section class="cddf-network-section">
    <div class="container text-center">
        <span class="section-badge">Our Network</span>
        <h2>Partners <span>&</span> Donors</h2>
        <p class="subtitle">Organizations and donors who stand with CDDF in building resilient communities.</p>
    </div>

    @php
        $partnerList = $partners->values()->all();
        // Duplicate for seamless loop
        $doubled = array_merge($partnerList, $partnerList);
    @endphp

    <div class="cddf-marquee-outer">
        <div class="cddf-marquee-track">
            @foreach($doubled as $p)
            <div class="cddf-partner-item">
                @if(!empty($p->image))
                    <img src="{{ asset('images/partner/' . $p->image) }}" alt="{{ trim($p->name) }}">
                @else
                    <span class="partner-name">{{ trim($p->name) }}</span>
                @endif
                <span class="partner-tooltip">{{ trim($p->name) }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>
{{-- End Our Network --}}

{{-- Latest News and Events --}}
<style>
    /* News & Events Section */
    .afad-news-section {
        padding: 80px 0;
        background: #f8f9fa;
    }
    .afad-section-heading {
        text-align: center;
        margin-bottom: 50px;
    }
    .afad-section-heading .subheading {
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #f86f2d;
        margin-bottom: 10px;
        display: block;
    }
    .afad-section-heading h2 {
        font-size: 32px;
        font-weight: 700;
        color: #1a1a2e;
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 16px;
    }
    .afad-section-heading h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: #f86f2d;
        border-radius: 2px;
    }
    .afad-section-heading p {
        color: #6c757d;
        max-width: 580px;
        margin: 0 auto;
        font-size: 15px;
    }
    .afad-blog-entry {
        border: 1px solid #f0f0f0;
        background: #fff;
        overflow: hidden;
        border-radius: 6px;
        box-shadow: 0px 5px 30px -10px rgba(0,0,0,0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .afad-blog-entry:hover {
        transform: translateY(-6px);
        box-shadow: 0px 12px 40px -10px rgba(0,0,0,0.22);
    }
    .afad-block-img {
        overflow: hidden;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        display: block;
        width: 100%;
        height: 230px;
        position: relative;
    }
    .afad-block-img .afad-cat-badge {
        position: absolute;
        top: 14px;
        left: 14px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 5px 12px;
        border-radius: 3px;
        z-index: 1;
    }
    .afad-blog-text {
        padding: 24px 22px 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
        /* slight pull-up overlap effect */
        margin-top: -24px;
        background: #fff;
        border-radius: 4px 4px 0 0;
        position: relative;
        z-index: 1;
        width: 90%;
        margin-left: auto;
        margin-right: auto;
    }
    .afad-blog-meta {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 10px;
        flex-wrap: wrap;
    }
    .afad-blog-meta span {
        font-size: 13px;
        color: #96a1af;
    }
    .afad-blog-meta span i {
        color: #f86f2d;
        margin-right: 4px;
    }
    .afad-blog-text .heading {
        font-size: 17px;
        font-weight: 600;
        margin-bottom: 10px;
        line-height: 1.45;
        flex-shrink: 0;
    }
    .afad-blog-text .heading a {
        color: #1a1a2e;
        text-decoration: none;
        transition: color 0.2s;
    }
    .afad-blog-text .heading a:hover {
        color: #f86f2d;
    }
    .afad-blog-text .excerpt {
        font-size: 14px;
        color: #6c757d;
        line-height: 1.65;
        flex: 1;
        margin-bottom: 16px;
    }
    .afad-read-more {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        color: #f86f2d;
        text-decoration: none;
        letter-spacing: 0.5px;
        transition: gap 0.2s;
    }
    .afad-read-more:hover {
        color: #d9541a;
        gap: 10px;
    }
    .afad-time-loc {
        font-size: 13px;
        color: #96a1af;
        margin-bottom: 12px;
    }
    .afad-time-loc span {
        margin-right: 12px;
        white-space: nowrap;
    }
    .afad-time-loc span i {
        color: #f86f2d;
        margin-right: 4px;
    }
    .afad-view-all-wrap {
        text-align: center;
        margin-top: 50px;
    }
    .afad-btn-viewall {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #f86f2d;
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        padding: 13px 34px;
        border-radius: 4px;
        text-decoration: none;
        letter-spacing: 0.5px;
        transition: background 0.25s, transform 0.2s;
        border: none;
    }
    .afad-btn-viewall:hover {
        background: #d9541a;
        color: #fff;
        transform: translateY(-2px);
    }
</style>

{{-- ── Latest News & Events ─────────────────────────────────────────────── --}}
<section class="afad-news-section">
    <div class="container">
        <div class="afad-section-heading">
            <span class="subheading">Stay Informed</span>
            <h2>Latest News <span style="color:#f86f2d;">&amp;</span> Events</h2>
            <p>Follow our work and stay up to date with the stories and events that matter most.</p>
        </div>

        <div class="row">
            @forelse ($news->take(6) as $data)
                @php $isEvent = ($data->category ?? 'news') === 'event'; @endphp
                <div class="col-md-4 d-flex mb-4">
                    <div class="afad-blog-entry w-100">
                        <a href="{{ route('latest.news.view', $data->id) }}"
                           class="afad-block-img"
                           style="background-image: url('{{ asset('images/news/'.$data->image) }}');">
                            <span class="afad-cat-badge {{ $isEvent ? 'bg-warning text-dark' : 'bg-primary text-white' }}">
                                <i class="fas {{ $isEvent ? 'fa-calendar-check' : 'fa-newspaper' }} me-1"></i>
                                {{ $isEvent ? 'Event' : 'News' }}
                            </span>
                        </a>
                        <div class="afad-blog-text">
                            <div class="afad-blog-meta">
                                <span><i class="fas fa-calendar-alt"></i>{{ date("d M, Y") }}</span>
                                <span><i class="fas fa-user"></i> CDDF</span>
                            </div>
                            <h3 class="heading">
                                <a href="{{ route('latest.news.view', $data->id) }}">
                                    {{ Str::limit($data->title, 60, '...') }}
                                </a>
                            </h3>
                            @if ($isEvent)
                                <p class="afad-time-loc">
                                    <span><i class="fas fa-clock"></i> All Day</span>
                                    <span><i class="fas fa-map-marker-alt"></i> CDDF Venue</span>
                                </p>
                            @endif
                            <p class="excerpt">
                                {!! Str::limit(strip_tags($data->description), 110, '...') !!}
                            </p>
                            <a href="{{ route('latest.news.view', $data->id) }}" class="afad-read-more">
                                {{ $isEvent ? 'Join Event' : 'Read More' }}
                                <i class="fas fa-arrow-right" style="font-size:11px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-4">No news or events available at the moment.</div>
            @endforelse
        </div>

        <div class="afad-view-all-wrap">
            <a href="{{ route('latest.news.all') }}" class="afad-btn-viewall">
                <i class="fas fa-eye"></i> View All News &amp; Events
            </a>
        </div>
    </div>
</section>
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
