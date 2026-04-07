@extends('main')

@section('title')
CDDF - Home
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

<section class="py-5" style="background-image: url('{{ (isset($application->mission_vision_bg) && $application->mission_vision_bg) ? asset('images/application/'.$application->mission_vision_bg) : asset('static_image/mission-vision_bg.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; position: relative;">
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
            @foreach($focus_areas->take(6) as $fa)
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

        @if($focus_areas->count() > 6)
        <div class="text-center mt-5" style="position: relative; z-index: 1;">
            <a href="{{ route('key.focus.area') }}" class="btn text-white rounded px-4 py-2" style="background-color: #f86f2d; border: 1px solid #f86f2d; font-weight: 600; letter-spacing: 0.5px; transition: all 0.3s;" onmouseover="this.style.backgroundColor='#e0591e'" onmouseout="this.style.backgroundColor='#f86f2d'">
                View All Focus Areas
            </a>
        </div>
        @endif
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

{{-- Featured Projects --}}
<style>
    .featured-projects-section {
        background-color: #fdfdfd;
        overflow: hidden;
        padding: 80px 0;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
    }
    .fp-header {
        text-align: center;
        margin-bottom: 50px;
    }
    .fp-header .subheading {
        font-size: 14px;
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: #f86f2d;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    .fp-header h3 {
        font-weight: 600;
        color: #1a202c;
        font-size: 2.5rem;
        margin-bottom: 20px;
    }
    .fp-header h3 span {
        color: #f86f2d; /* Orange */
    }
    .fp-header .divider {
        width: 60px;
        height: 3px;
        background-color: #f86f2d;
        margin: 0 auto;
    }
    .fp-scroll-wrapper {
        width: 100%;
        overflow: hidden;
        position: relative;
    }
    .fp-scroll-container {
        display: flex;
        gap: 24px;
        padding: 20px;
        width: max-content;
        transform: translateX(0);
        will-change: transform;
    }
    .fp-card {
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 650px;
        background: #fff;
        border: 1px solid #eee;
        border-radius: 16px;
        padding: 20px;
        gap: 24px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
        text-decoration: none !important;
        color: inherit;
        position: relative;
    }
    .fp-card::before {
        content: '';
        position: absolute;
        top: 8px;
        left: 8px;
        right: 8px;
        bottom: 8px;
        border: 1px dashed #ccc;
        border-radius: 12px;
        pointer-events: none;
        transition: border-color 0.3s ease;
    }
    .fp-card:hover {
        border-color: #f86f2d;
        box-shadow: 0 12px 30px rgba(248, 111, 45, 0.12);
        transform: translateY(-5px);
        color: inherit;
    }
    .fp-card:hover::before {
        border-color: #f86f2d;
    }
    .fp-image {
        width: 240px;
        height: 180px;
        border-radius: 12px;
        object-fit: cover;
        flex-shrink: 0;
        background-color: #f4f4f4;
        position: relative;
        z-index: 1;
    }
    .fp-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        flex-grow: 1;
        height: 100%;
        position: relative;
        z-index: 1;
    }
    .fp-title {
        font-size: 1.4rem;
        font-weight: 800;
        color: #222;
        margin-bottom: 16px;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .fp-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 16px;
    }
    .fp-badge {
        background-color: #fff9e6; /* Light yellow */
        color: #222;
        border: 1px solid #fde08b;
        padding: 6px 16px;
        border-radius: 30px;
        font-size: 0.85rem;
        font-weight: 700;
    }
    .fp-date {
        font-size: 0.95rem;
        color: #7a8b9a;
        margin-top: auto;
    }
    .fp-btn-container {
        text-align: center;
        margin-top: 50px;
    }
    .fp-btn {
        background-color: #f86f2d;
        color: #fff;
        border: none;
        padding: 10px 24px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 1rem;
        transition: background-color 0.3s ease, transform 0.2s ease;
        display: inline-block;
        text-decoration: none !important;
    }
    .fp-btn:hover {
        background-color: #e05a1f;
        color: #fff;
        transform: translateY(-2px);
    }

    /* Slider Navigation Controls */
    .fp-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: #fff;
        border: 2px solid #f86f2d;
        color: #f86f2d;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        z-index: 10;
    }
    .fp-nav-btn:hover {
        background-color: #f86f2d;
        color: #fff;
    }
    .fp-prev-btn {
        left: 20px;
        box-shadow: 4px 4px 10px rgba(0,0,0,0.1);
    }
    .fp-next-btn {
        right: 20px;
        box-shadow: -4px 4px 10px rgba(0,0,0,0.1);
    }

    @media (max-width: 768px) {
        .fp-card {
            flex-direction: column;
            width: 340px;
            text-align: center;
            padding: 15px;
        }
        .fp-image {
            width: 100%;
            height: 200px;
        }
        .fp-badges {
            justify-content: center;
        }
        .fp-title {
            font-size: 1.2rem;
        }
    }
</style>

<div class="featured-projects-section" id="featuredProjectsSection">
    <div class="container">
        <div class="fp-header">
            <span class="subheading">OUR INITIATIVES</span>
            <h3>Featured <span>Projects</span></h3>
            <div class="divider mb-4"></div>
            <p class="text-secondary">Discover our key initiatives driving sustainable change and community empowerment.</p>
        </div>
    </div>

    <div class="fp-scroll-wrapper">
        <button class="fp-nav-btn fp-prev-btn" id="fpPrevBtn"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="fp-nav-btn fp-next-btn" id="fpNextBtn"><i class="fa-solid fa-chevron-right"></i></button>

        <div class="fp-scroll-container" id="fpScrollContainer">
            {{-- Original Set --}}
            @foreach ($project as $item)
                <a href="{{ route('ongoing.project.view', $item->id) }}" class="fp-card">
                    <img src="{{ $item->cover_image_url }}" alt="{{ $item->title }}" class="fp-image">
                    <div class="fp-content">
                        <h4 class="fp-title">{{ $item->title }}</h4>
                        <div class="fp-badges">
                            <span class="fp-badge">{{ $item->status === 'ongoing' ? 'Current Projects' : 'Completed Projects' }}</span>
                            @foreach($item->focusAreas as $fa)
                                <span class="fp-badge">{{ $fa->title }}</span>
                            @endforeach
                        </div>
                        <div class="fp-date">
                            {{ $item->start_date ? $item->start_date->format('M d, Y') : $item->created_at->format('M d, Y') }}
                        </div>
                    </div>
                </a>
            @endforeach
            
            {{-- Duplicate Set for seamless scrolling --}}
            @foreach ($project as $item)
                <a href="{{ route('ongoing.project.view', $item->id) }}" class="fp-card">
                    <img src="{{ $item->cover_image_url }}" alt="{{ $item->title }}" class="fp-image">
                    <div class="fp-content">
                        <h4 class="fp-title">{{ $item->title }}</h4>
                        <div class="fp-badges">
                            <span class="fp-badge">{{ $item->status === 'ongoing' ? 'Current Projects' : 'Completed Projects' }}</span>
                            @foreach($item->focusAreas as $fa)
                                <span class="fp-badge">{{ $fa->title }}</span>
                            @endforeach
                        </div>
                        <div class="fp-date">
                            {{ $item->start_date ? $item->start_date->format('M d, Y') : $item->created_at->format('M d, Y') }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="fp-btn-container">
            <a href="{{ route('ongoing.project') }}" class="fp-btn">
                <i class="fa-solid fa-eye me-2"></i> View All Projects
            </a>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const section = document.getElementById('featuredProjectsSection');
        const container = document.getElementById('fpScrollContainer');
        const prevBtn = document.getElementById('fpPrevBtn');
        const nextBtn = document.getElementById('fpNextBtn');
        
        // Initial check
        if(!section || !container) return;

        let manualTranslate = 0; // Tracks manual offsets from buttons
        let scrollTranslate = 0; // Tracks automatic offsets from scrolling
        let maxScroll = 0;

        // Use scroll event for automatic translation
        window.addEventListener('scroll', function() {
            const rect = section.getBoundingClientRect();
            const windowHeight = window.innerHeight;
            
            if (rect.top < windowHeight && rect.bottom > 0) {
                let progress = (windowHeight - rect.top) / (windowHeight + rect.height);
                progress = Math.max(0, Math.min(1, progress));
                
                maxScroll = container.scrollWidth / 2;
                scrollTranslate = -(progress * maxScroll * 1.5); 
                
                updateTransform();
            }
        });

        if (prevBtn && nextBtn) {
            function getScrollAmount() {
                const firstCard = container.querySelector('.fp-card');
                return firstCard ? (firstCard.offsetWidth + 24) : 674;
            }

            prevBtn.addEventListener('click', () => {
                manualTranslate += getScrollAmount();
                updateTransform();
            });

            nextBtn.addEventListener('click', () => {
                manualTranslate -= getScrollAmount();
                updateTransform();
            });
        }
        
        function updateTransform() {
            container.style.transition = 'transform 0.4s ease';
            
            // Total translation is the sum of scroll effect and manual clicks
            let totalTranslate = scrollTranslate + manualTranslate;
            
            // Boundary checks
            if (totalTranslate > 0) {
                totalTranslate = 0;
                manualTranslate = -scrollTranslate; // Limit manual translation so total isn't positive
            }
            if (maxScroll > 0 && Math.abs(totalTranslate) > maxScroll) {
                totalTranslate = -maxScroll;
                manualTranslate = -maxScroll - scrollTranslate; 
            }
            
            container.style.transform = `translateX(${totalTranslate}px)`;
        }
    });
</script>
{{-- End Featured Projects --}}

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
    .cddf-news-section {
        padding: 80px 0;
        background: #f8f9fa;
    }
    .cddf-section-heading {
        text-align: center;
        margin-bottom: 50px;
    }
    .cddf-section-heading .subheading {
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #f86f2d;
        margin-bottom: 10px;
        display: block;
    }
    .cddf-section-heading h2 {
        font-size: 32px;
        font-weight: 700;
        color: #1a1a2e;
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 16px;
    }
    .cddf-section-heading h2::after {
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
    .cddf-section-heading p {
        color: #6c757d;
        max-width: 580px;
        margin: 0 auto;
        font-size: 15px;
    }
    .cddf-blog-entry {
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
    .cddf-blog-entry:hover {
        transform: translateY(-6px);
        box-shadow: 0px 12px 40px -10px rgba(0,0,0,0.22);
    }
    .cddf-block-img {
        overflow: hidden;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        display: block;
        width: 100%;
        height: 230px;
        position: relative;
    }
    .cddf-block-img .cddf-cat-badge {
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
    .cddf-blog-text {
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
    .cddf-blog-meta {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 10px;
        flex-wrap: wrap;
    }
    .cddf-blog-meta span {
        font-size: 13px;
        color: #96a1af;
    }
    .cddf-blog-meta span i {
        color: #f86f2d;
        margin-right: 4px;
    }
    .cddf-blog-text .heading {
        font-size: 17px;
        font-weight: 600;
        margin-bottom: 10px;
        line-height: 1.45;
        flex-shrink: 0;
    }
    .cddf-blog-text .heading a {
        color: #1a1a2e;
        text-decoration: none;
        transition: color 0.2s;
    }
    .cddf-blog-text .heading a:hover {
        color: #f86f2d;
    }
    .cddf-blog-text .excerpt {
        font-size: 14px;
        color: #6c757d;
        line-height: 1.65;
        flex: 1;
        margin-bottom: 16px;
    }
    .cddf-read-more {
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
    .cddf-read-more:hover {
        color: #d9541a;
        gap: 10px;
    }
    .cddf-time-loc {
        font-size: 13px;
        color: #96a1af;
        margin-bottom: 12px;
    }
    .cddf-time-loc span {
        margin-right: 12px;
        white-space: nowrap;
    }
    .cddf-time-loc span i {
        color: #f86f2d;
        margin-right: 4px;
    }
    .cddf-view-all-wrap {
        text-align: center;
        margin-top: 50px;
    }
    .cddf-btn-viewall {
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
    .cddf-btn-viewall:hover {
        background: #d9541a;
        color: #fff;
        transform: translateY(-2px);
    }
</style>

{{-- ── Latest News & Events ─────────────────────────────────────────────── --}}
<section class="cddf-news-section">
    <div class="container">
        <div class="cddf-section-heading">
            <span class="subheading">Stay Informed</span>
            <h2>Latest News <span style="color:#f86f2d;">&amp;</span> Events</h2>
            <p>Follow our work and stay up to date with the stories and events that matter most.</p>
        </div>

        <div class="row">
            @forelse ($news->take(6) as $data)
                @php $isEvent = ($data->category ?? 'news') === 'event'; @endphp
                <div class="col-md-4 d-flex mb-4">
                    <div class="cddf-blog-entry w-100">
                        <a href="{{ route('latest.news.view', $data->id) }}"
                           class="cddf-block-img"
                           style="background-image: url('{{ asset('images/news/'.$data->image) }}');">
                            <span class="cddf-cat-badge {{ $isEvent ? 'bg-warning text-dark' : 'bg-primary text-white' }}">
                                <i class="fas {{ $isEvent ? 'fa-calendar-check' : 'fa-newspaper' }} me-1"></i>
                                {{ $isEvent ? 'Event' : 'News' }}
                            </span>
                        </a>
                        <div class="cddf-blog-text">
                            <div class="cddf-blog-meta">
                                <span><i class="fas fa-calendar-alt"></i>{{ date("d M, Y") }}</span>
                                <span><i class="fas fa-user"></i> CDDF</span>
                            </div>
                            <h3 class="heading">
                                <a href="{{ route('latest.news.view', $data->id) }}">
                                    {{ Str::limit($data->title, 60, '...') }}
                                </a>
                            </h3>
                            @if ($isEvent)
                                <p class="cddf-time-loc">
                                    <span><i class="fas fa-clock"></i> All Day</span>
                                    <span><i class="fas fa-map-marker-alt"></i> CDDF Venue</span>
                                </p>
                            @endif
                            <p class="excerpt">
                                {!! Str::limit(strip_tags($data->description), 110, '...') !!}
                            </p>
                            <a href="{{ route('latest.news.view', $data->id) }}" class="cddf-read-more">
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

        <div class="cddf-view-all-wrap">
            <a href="{{ route('latest.news.all') }}" class="cddf-btn-viewall">
                <i class="fas fa-eye"></i> View All News &amp; Events
            </a>
        </div>
    </div>
</section>
{{-- End of Latest News and Events --}}


{{-- Volunteer & Partner Section --}}
<style>
.vp-section-top {
    background: linear-gradient(135deg, #111827 0%, #1f2937 60%, #374151 100%);
    padding: 36px 0 40px; /* Added bottom padding to give space for the card */
    position: relative;
    overflow: visible;
}
.vp-section-top::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    pointer-events: none;
}
.vp-badge {
    display: inline-block;
    background: rgba(248, 111, 45, 0.2);
    color: #f86f2d;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    padding: 5px 18px;
    border-radius: 50px;
    border: 1px solid rgba(248, 111, 45, 0.4);
    margin-bottom: 1rem;
}
.vp-stats-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.18);
    padding: 2.5rem 2rem; /* Increased padding for a cleaner look */
    position: relative;
    z-index: 30;
    margin-bottom: -110px; /* Use negative margin instead of transform */
    transition: box-shadow 0.4s ease;
}
.vp-stats-card:hover {
    box-shadow: 0 30px 80px rgba(0,0,0,0.25);
}
.vp-stat-item {
    padding: 0.5rem 1.5rem;
}
.vp-stat-number {
    font-size: 2.5rem; /* Larger font size for the number */
    font-weight: 800;
    color: #1f2937;
    line-height: 1;
    margin-bottom: 12px; /* More space below number */
}
.vp-stat-label {
    font-size: 0.9rem; /* Slightly larger label */
    color: #4b5563; /* Darker gray for better readability */
    font-weight: 500;
    letter-spacing: 0.5px;
}
.vp-divider {
    width: 1px;
    height: 80px; /* Taller divider */
    background: #e5e7eb; /* Solid light gray line */
    margin: auto;
}
.vp-cta-section {
    background-color: #f86f2d;
    padding-top: 5rem; /* Adjusted padding since we are using negative margin on the card */
    padding-bottom: 2.5rem;
    position: relative;
    z-index: 10;
}
.vp-cta-section::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5z' fill='%23ffffff' fill-opacity='0.04' fill-rule='evenodd'/%3E%3C/svg%3E");
    pointer-events: none;
}
.vp-btn-primary {
    background: #fff;
    color: #f86f2d;
    border: none;
    border-radius: 50px;
    padding: 9px 26px;
    font-weight: 700;
    font-size: 0.8rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    text-decoration: none;
    display: inline-block;
}
.vp-btn-primary:hover {
    background: #1f2937;
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}
.vp-btn-secondary {
    background: transparent;
    color: #fff;
    border: 2px solid rgba(255,255,255,0.7);
    border-radius: 50px;
    padding: 9px 26px;
    font-weight: 700;
    font-size: 0.8rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
}
.vp-btn-secondary:hover {
    background: rgba(255,255,255,0.15);
    border-color: #fff;
    color: #fff;
    transform: translateY(-3px);
}
</style>

<section>
    <!-- Dark Top Section -->
    <div class="vp-section-top">
        <div class="container text-center position-relative">
            <div data-aos="fade-down" data-aos-duration="600">
                <span class="vp-badge"><i class="fas fa-hands-helping me-1"></i> Join Us</span>
                <h2 class="fw-bold text-white mb-2" style="font-size: 1.6rem; letter-spacing: -0.5px;">
                    Volunteerism & Partnership
                </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9">
                    <p class="text-white mb-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100" style="font-size: 0.95rem; line-height: 1.6; opacity: 0.85;">
                        CDDF is committed to building a stronger, more inclusive society by mobilizing volunteers and fostering strategic partnerships. Together with over <strong>1,000 dedicated volunteers</strong> and <strong>50 partner organizations</strong>, we are working to create lasting change in the communities we serve.
                    </p>
                </div>
            </div>

            <!-- Stats Card -->
            <div class="row justify-content-center" id="vpStatsRow">
                <div class="col-lg-7 col-md-10">
                    <div class="vp-stats-card" data-aos="zoom-out-up" data-aos-duration="700" data-aos-delay="200">
                        <div class="row align-items-center text-center">
                            <div class="col-md-5 vp-stat-item">
                                <div class="vp-stat-number vp-counter" data-target="1000" data-suffix="+">0+</div>
                                <div class="vp-stat-label">Dedicated Volunteers</div>
                            </div>
                            <div class="col-md-2 d-none d-md-flex justify-content-center">
                                <div class="vp-divider"></div>
                            </div>
                            <div class="col-md-5 vp-stat-item mt-4 mt-md-0">
                                <div class="vp-stat-number vp-counter" data-target="50" data-suffix="+">0+</div>
                                <div class="vp-stat-label">Partner Organizations</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Orange CTA Section -->
    <div class="vp-cta-section w-100 text-center">
        <div class="container position-relative" style="z-index: 2;">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="100">
                        <h3 class="text-white mb-2" style="font-size: 1.4rem; font-weight: 700; line-height: 1.4;">
                            Want to make a difference<br><span style="opacity: 0.9; font-weight: 400;">with CDDF?</span>
                        </h3>
                        <p class="text-white mb-3" style="opacity: 0.85; font-size: 0.9rem;">Volunteer with us or become a partner organization — reach out and let's build a better future together.</p>
                    </div>
                    <div class="d-flex justify-content-center flex-wrap gap-3" data-aos="fade-up" data-aos-duration="700" data-aos-delay="250">
                        <a href="{{ route('volunteer.opportunities') }}" class="vp-btn-primary">
                            <i class="fas fa-user-plus me-2"></i> Become a Volunteer
                        </a>
                        <a href="{{ route('contact') }}" class="vp-btn-secondary">
                            <i class="fas fa-handshake me-2"></i> Become a Partner
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
(function () {
    function animateVpCounter(el) {
        var target   = parseInt(el.getAttribute('data-target'), 10);
        var suffix   = el.getAttribute('data-suffix') || '';
        var duration = 2000;
        var start    = null;

        function step(ts) {
            if (!start) start = ts;
            var progress = Math.min((ts - start) / duration, 1);
            var ease     = 1 - Math.pow(1 - progress, 3);
            var current  = Math.floor(target * ease);
            
            el.textContent = current.toLocaleString() + suffix;
            
            if (progress < 1) requestAnimationFrame(step);
            else el.textContent = target.toLocaleString() + suffix;
        }
        requestAnimationFrame(step);
    }

    var vpCounters = document.querySelectorAll('.vp-counter');

    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    vpCounters.forEach(animateVpCounter);
                }
            });
        }, { threshold: 0.3 });

        var row = document.getElementById('vpStatsRow');
        if (row) observer.observe(row);
    } else {
        vpCounters.forEach(animateVpCounter);
    }
})();
</script>
{{-- End of Volunteer & Partner Section --}}

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
    align-items:flex-end;
    justify-content:center;
    overflow:hidden;
    text-decoration:none;
}
.cddf-gallery-tile::before {
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,0,0,0.18);
    transition:background 0.3s ease;
    z-index:1;
}
.cddf-gallery-tile-overlay {
    position:absolute;
    bottom:0;
    left:0;
    right:0;
    background:linear-gradient(transparent, rgba(0,0,0,0.78));
    padding:28px 10px 10px;
    transform:translateY(100%);
    transition:transform 0.32s ease;
    z-index:3;
}
.cddf-gallery-tile-overlay span {
    display:block;
    color:#fff;
    font-size:0.78rem;
    font-weight:600;
    line-height:1.3;
    text-align:center;
    letter-spacing:0.3px;
    text-shadow:0 1px 3px rgba(0,0,0,0.6);
}
.cddf-gallery-tile:hover .cddf-gallery-tile-overlay { transform:translateY(0); }
.cddf-gallery-tile:hover::before { background:rgba(0,0,0,0.08); }
.cddf-gallery-tile .gal-icon {
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    z-index:4;
    width:48px;
    height:48px;
    background:rgba(255,255,255,0.88);
    border-radius:50%;
    opacity:0;
    display:flex;
    align-items:center;
    justify-content:center;
    transition:opacity 0.3s ease;
    color:#f86f2d;
    font-size:1rem;
}
.cddf-gallery-tile:hover .gal-icon { opacity:1; }
@media(max-width:575px){ .cddf-gallery-tile{ width:50%; height:160px; } }
@media(min-width:576px) and (max-width:767px){ .cddf-gallery-tile{ width:50%; height:180px; } }
@media(min-width:768px) and (max-width:991px){ .cddf-gallery-tile{ width:33.333%; height:190px; } }
.mfp-title { color:#eee; font-size:0.88rem; text-align:center; padding:6px 10px; }
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
        <a href="{{ asset($data->folder.$data->image) }}"
           class="cddf-gallery-tile image-popup-gallery"
           data-title="{{ $data->title }}"
           style="background-image:url('{{ asset($data->folder.$data->image) }}');">
            <div class="gal-icon"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
            <div class="cddf-gallery-tile-overlay"><span>{{ $data->title }}</span></div>
        </a>
        @endforeach
        {{-- Hidden anchors: remaining photos included in popup gallery navigation --}}
        @foreach($galleryAll->skip(8) as $data)
        <a href="{{ asset($data->folder.$data->image) }}"
           class="image-popup-gallery"
           data-title="{{ $data->title }}"
           style="display:none;"></a>
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
            verticalFit: true,
            titleSrc: function(item) {
                return item.el.attr('data-title') || '';
            }
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
<style>
    .impact-header {
        text-align: center;
        margin-bottom: 20px;
    }
    .impact-subheading {
        font-size: 14px;
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #f86f2d;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    .impact-title {
        font-weight: 400;
        color: #ffffff;
        font-size: 2.5rem;
        margin-bottom: 16px;
        line-height: 1.2;
    }
    .impact-divider {
        width: 60px;
        height: 3px;
        background-color: #f86f2d;
        margin: 0 auto 20px;
    }
</style>
<div style="background-image: url('{{ (isset($application->impact_bg) && $application->impact_bg) ? asset('images/application/'.$application->impact_bg) : asset('img/map.png') }}'); background-attachment:fixed;">
    <div class="container">
        <div class="py-4 px-2">
            <div class="impact-header">
                <span class="impact-subheading">Our</span>
                <h2 class="impact-title">Impact</h2>
                <div class="impact-divider"></div>
                <div class="row justify-content-sm-center">
                    <div class="col-md-6">
                        <p class="text-white py-2 text-center">
                            Transforming lives and communities in northern Bangladesh through sustainable development initiatives, empowering individuals and fostering positive change. Join us in making a lasting difference for a brighter future.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" id="impactCounterRow">
                @foreach($impacts as $imp)
                @php
                    $rawVal   = (int) preg_replace('/[^0-9]/', '', $imp->metric_value);
                    $isYear   = ($imp->order == 1); // "since" year, count to exact value
                    $display  = $isYear ? $imp->metric_value : number_format($rawVal > 999999 ? $rawVal : $rawVal);
                    $suffix   = ($imp->metric_unit === 'since') ? '' : $imp->metric_unit;
                    $suffix   = ($imp->metric_unit === 'M+') ? 'M+' : $suffix;
                @endphp
                <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-3 mx-2 my-2 rounded shadow-sm">
                    <i class="{{ $imp->icon }} text-secondary pt-2" style="font-size:1.6rem;"></i>
                    <h6 class="mt-2 mb-1 text-muted" style="font-size:0.85rem;">{{ $imp->title }}</h6>
                    <h2 class="fw-bold mb-0 impact-counter" style="color: #f86f2d;"
                        data-target="{{ $rawVal }}"
                        data-suffix="{{ $suffix }}"
                        data-year="{{ $isYear ? 1 : 0 }}">{{ $display }}{{ $suffix }}</h2>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

<script>
(function () {
    function formatNum(n) {
        if (n >= 1000000) return (n / 1000000).toFixed(1).replace(/\.0$/, '') + 'M';
        return n.toLocaleString();
    }

    function animateCounter(el) {
        var target   = parseInt(el.getAttribute('data-target'), 10);
        var suffix   = el.getAttribute('data-suffix') || '';
        var isYear   = el.getAttribute('data-year') === '1';
        var duration = 2000;
        var start    = null;
        var startVal = isYear ? target - 50 : 0;

        function step(ts) {
            if (!start) start = ts;
            var progress = Math.min((ts - start) / duration, 1);
            var ease     = 1 - Math.pow(1 - progress, 3);
            var current  = Math.floor(startVal + (target - startVal) * ease);
            if (isYear) {
                el.textContent = current;
            } else if (suffix === 'M+') {
                el.textContent = (current / 1000000).toFixed(1).replace(/\.0$/, '') + 'M+';
            } else {
                el.textContent = current.toLocaleString() + suffix;
            }
            if (progress < 1) requestAnimationFrame(step);
            else {
                if (isYear) el.textContent = target;
                else if (suffix === 'M+') el.textContent = (target / 1000000).toFixed(1).replace(/\.0$/, '') + 'M+';
                else el.textContent = target.toLocaleString() + suffix;
            }
        }
        requestAnimationFrame(step);
    }

    var counters = document.querySelectorAll('.impact-counter');

    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    counters.forEach(animateCounter);
                }
            });
        }, { threshold: 0.3 });

        var row = document.getElementById('impactCounterRow');
        if (row) observer.observe(row);
    } else {
        counters.forEach(animateCounter);
    }
})();
</script>
{{-- End of Impact part --}}

{{-- Success Stories --}}
<div class="bg-white py-5">
    <div class="container">
        
        {{-- Success Stories Slider --}}
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php 
                    $chunks = $stories->chunk(4); 
                @endphp

                @forelse($chunks as $index => $chunk)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="row align-items-center" style="min-height: 600px;">
                        {{-- Left Column: Title + Middle Card + Pagination --}}
                        <div class="col-lg-5 ps-lg-5 d-flex flex-column justify-content-between h-100 py-4">
                            
                            {{-- Title Section --}}
                            <div class="mb-5">
                                <h6 class="text-uppercase fw-bold ls-2" style="color: #1f2937;">Success <span style="color: #f86f2d;">Stories</span></h6>
                                <h2 class="display-5 fw-bold text-dark" style="font-family: 'Playfair Display', serif;">VOICES OF <br>CHANGE</h2>
                            </div>

                            {{-- Middle Card (Left Side) - Only if 2nd item exists --}}
                            @if(isset($chunk[$index * 4 + 1]) || $chunk->count() >= 2)
                                @php 
                                    $middleStory = $chunk->skip(1)->first(); 
                                    // Determine image path (support seeded avatars and uploaded images)
                                    $middleImgPath = asset('images/stories/'.$middleStory->image);
                                    if(in_array($middleStory->image, ['1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png','9.png','10.png','11.png','12.png'])) {
                                        $middleImgPath = asset('admin/assets/images/duralux/avatar/'.$middleStory->image);
                                    }
                                @endphp
                                @if($middleStory)
                                <div class="vp-story-card ms-lg-4 mb-4 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
                                    <div class="vp-story-img-wrapper mb-3">
                                        <div class="vp-story-img-border"></div>
                                        <img src="{{ $middleImgPath }}" alt="{{ $middleStory->beneficiary_name }}" class="vp-story-img">
                                    </div>
                                    <div class="text-start">
                                        <h6 class="vp-story-label text-primary mb-2">Success Story #2</h6>
                                        <p class="vp-story-desc text-muted mb-3">"{{ Str::limit($middleStory->description, 90) }}"</p>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="vp-story-line"></div>
                                            <div>
                                                <h6 class="vp-story-name mb-0">{{ $middleStory->beneficiary_name }}</h6>
                                                <small class="text-muted" style="font-size: 0.75rem;">{{ $middleStory->beneficiary_title }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endif

                             {{-- Pagination Controls (Bottom Left) --}}
                             <div class="mt-auto d-flex align-items-center gap-3 pt-5">
                                <button class="vp-slider-btn prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                                    <i class="fas fa-arrow-left"></i>
                                </button>
                                <span class="vp-slider-counter fs-5 fw-bold text-dark">
                                    <span class="text-primary">0{{ $index + 1 }}</span>
                                    <span class="text-muted opacity-50">/</span>
                                    <span class="text-muted opacity-50">0{{ $chunks->count() }}</span>
                                </span>
                                <button class="vp-slider-btn next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>

                        </div>

                        {{-- Right Column: Top Card + Bottom Card --}}
                        <div class="col-lg-7 position-relative">
                             <div class="row h-100">
                                {{-- Top Right Card --}}
                                <div class="col-md-10 offset-md-2 mb-4">
                                    @php 
                                        $firstStory = $chunk->first(); 
                                        $firstImgPath = asset('images/stories/'.$firstStory->image);
                                        if(in_array($firstStory->image, ['1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png','9.png','10.png','11.png','12.png'])) {
                                            $firstImgPath = asset('admin/assets/images/duralux/avatar/'.$firstStory->image);
                                        }
                                    @endphp
                                    @if($firstStory)
                                    <div class="vp-story-card ms-auto" data-aos="fade-left" data-aos-delay="100">
                                         <div class="d-flex flex-row-reverse align-items-start gap-4">
                                            <div class="vp-story-img-wrapper">
                                                <div class="vp-story-img-border border-end"></div>
                                                <img src="{{ $firstImgPath }}" alt="{{ $firstStory->beneficiary_name }}" class="vp-story-img">
                                            </div>
                                            <div class="text-end pt-3">
                                                <h6 class="vp-story-label text-info mb-2">Success Story #1</h6>
                                                <p class="vp-story-desc text-muted mb-3">"{{ Str::limit($firstStory->description, 80) }}"</p>
                                                <div class="d-flex align-items-center justify-content-end gap-2">
                                                    <div>
                                                        <h6 class="vp-story-name mb-0">{{ $firstStory->beneficiary_name }}</h6>
                                                        <small class="text-muted" style="font-size: 0.75rem;">{{ $firstStory->beneficiary_title }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                {{-- Bottom Center/Right Card (Card #3) --}}
                                <div class="col-md-8 offset-md-1 mt-3">
                                     @if(isset($chunk[$index * 4 + 2]) || $chunk->count() >= 3)
                                        @php 
                                            $thirdStory = $chunk->skip(2)->first(); 
                                            $thirdImgPath = asset('images/stories/'.$thirdStory->image);
                                            if(in_array($thirdStory->image, ['1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png','9.png','10.png','11.png','12.png'])) {
                                                $thirdImgPath = asset('admin/assets/images/duralux/avatar/'.$thirdStory->image);
                                            }
                                        @endphp
                                        @if($thirdStory)
                                        <div class="vp-story-card mx-auto" data-aos="fade-up" data-aos-delay="300">
                                             <div class="d-flex flex-column align-items-center text-center">
                                                <div class="vp-story-img-wrapper mb-3">
                                                    <div class="vp-story-img-border border-bottom"></div>
                                                    <img src="{{ $thirdImgPath }}" alt="{{ $thirdStory->beneficiary_name }}" class="vp-story-img">
                                                </div>
                                                <h6 class="vp-story-label text-warning mb-2">Success Story #3</h6>
                                                <p class="vp-story-desc text-muted mb-3 w-100 px-3 mx-auto">"{{ Str::limit($thirdStory->description, 90) }}"</p>
                                                 <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <div>
                                                        <h6 class="vp-story-name mb-0">{{ $thirdStory->beneficiary_name }}</h6>
                                                        <small class="text-muted" style="font-size: 0.75rem;">{{ $thirdStory->beneficiary_title }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                </div>

                                {{-- Fourth Card (Bottom Right) --}}
                                <div class="col-md-12 mt-4 pt-3">
                                     @if(isset($chunk[$index * 4 + 3]) || $chunk->count() >= 4)
                                        @php 
                                            $fourthStory = $chunk->skip(3)->first(); 
                                            $fourthImgPath = asset('images/stories/'.$fourthStory->image);
                                            if(in_array($fourthStory->image, ['1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png','9.png','10.png','11.png','12.png'])) {
                                                $fourthImgPath = asset('admin/assets/images/duralux/avatar/'.$fourthStory->image);
                                            }
                                        @endphp
                                        @if($fourthStory)
                                        <div class="vp-story-card ms-auto" data-aos="fade-left" data-aos-delay="400">
                                             <div class="d-flex flex-row-reverse align-items-start gap-4">
                                                <div class="vp-story-img-wrapper">
                                                    <div class="vp-story-img-border border-end" style="border-color: #f86f2d;"></div>
                                                    <img src="{{ $fourthImgPath }}" alt="{{ $fourthStory->beneficiary_name }}" class="vp-story-img">
                                                </div>
                                                <div class="text-end pt-3">
                                                    <h6 class="vp-story-label text-success mb-2">Success Story #4</h6>
                                                    <p class="vp-story-desc text-muted mb-3">"{{ Str::limit($fourthStory->description, 80) }}"</p>
                                                    <div class="d-flex align-items-center justify-content-end gap-2">
                                                        <div>
                                                            <h6 class="vp-story-name mb-0">{{ $fourthStory->beneficiary_name }}</h6>
                                                            <small class="text-muted" style="font-size: 0.75rem;">{{ $fourthStory->beneficiary_title }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
                @empty
                <!-- No stories handling -->
                @endforelse
            </div>
        </div>
    </div>
</div>
{{-- End of Success Stories --}}

<style>
.ls-2 { letter-spacing: 2px; }
.vp-story-card {
    max-width: 450px;
}
.vp-story-img-wrapper {
    position: relative;
    display: inline-block;
    padding: 10px;
}
.vp-story-img {
    width: 200px;
    height: 200px;
    object-fit: cover;
    filter: grayscale(100%);
    transition: all 0.5s ease;
    border-radius: 4px; /* Optional slight rounding */
}
.vp-story-card:hover .vp-story-img {
    filter: grayscale(0%);
}
.vp-story-img-border {
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    border: 3px solid #e5e7eb; /* Light gray border base */
    z-index: 1;
    pointer-events: none;
    transition: all 0.3s ease;
}
/* Variations of border effects */
.vp-story-img-border { border-color:  #d1d5db; transform: translate(-5px, -5px); }
.vp-story-card:hover .vp-story-img-border {
    border-color: #f86f2d; /* Orange or brand color on hover */
    transform: translate(5px, 5px);
}

.vp-story-label {
    font-family: 'Brush Script MT', cursive; /* Handwritten style font if possible, or serif italic */
    font-size: 1.5rem;
    font-style: italic;
    transform: rotate(-2deg);
}
.vp-story-desc {
    font-size: 1.1rem;
    font-weight: 400;
    line-height: 1.5;
}
.vp-story-name {
    font-size: 1.2rem;
    font-weight: 700;
    color: #111827;
}

.vp-slider-btn {
    width: 40px; height: 40px;
    border-radius: 50%;
    background: #fff;
    border: 1px solid #e5e7eb;
    color: #6b7280;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.3s ease;
}
.vp-slider-btn:hover {
    background: #f86f2d;
    color: #fff;
    border-color: #f86f2d;
}
</style>


{{-- subscription part removed and moved to footer --}}
@endsection

@push('js')

@endpush
