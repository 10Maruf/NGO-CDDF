@extends('main')

@section('content')
<style>
    .fad-hero {
        position: relative;
        min-height: 380px;
        /* No longer on parent */
        display: flex;
        align-items: flex-end;
        overflow: hidden; /* Ensure blurred/filtered BG doesn't spill */
    }
    .fad-hero-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        filter: grayscale(100%); /* Make it Black & White */
        z-index: 0;
    }
    .fad-hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(0,0,0,0.25) 0%, rgba(0,0,0,0.72) 100%);
        z-index: 1; /* Above image, below content */
    }
    .fad-hero-content {
        position: relative;
        z-index: 2; /* Content on top */
        padding: 3rem 0 2.5rem;
    }
    .fad-hero-icon {
        width: 72px;
        height: 72px;
        border-radius: 18px;
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(6px);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        color: #fff;
        margin-bottom: 1rem;
        border: 2px solid rgba(255,255,255,0.3);
    }
    .fad-hero-no-image {
        background: linear-gradient(135deg, #c0392b 0%, #e74c3c 60%, #f86f2d 100%);
        min-height: 280px;
    }
    .fad-body {
        background: #fff;
        padding: 3rem 0;
    }
    .fad-back-btn {
        color: #c0392b;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 2rem;
        transition: gap 0.2s;
    }
    .fad-back-btn:hover { gap: 10px; color: #c0392b; }
    .fad-description {
        font-size: 1.05rem;
        line-height: 1.85;
        color: #444;
        text-align: justify;
    }
</style>

<!-- Hero Section -->
@php
    $bgUrl = !empty($area->image_path) ? asset('storage/' . $area->image_path) : '';
    // Use the same fallback background used in about page if needed, or handle no-image case
    if (empty($bgUrl)) {
         $bgUrl = asset('static_image/about_us_bg.jpg'); // Fallback or specific Focus Area default
    }
    $iconClass = !empty($area->icon_class) ? $area->icon_class : 'fa fa-cube';
@endphp

{{-- ===== Hero / Page Banner ===== --}}
<div class="hero-wrap" style="min-height: 340px; position: relative; display: flex; align-items: center; overflow: hidden;">
    {{-- Background Image with Grayscale Filter --}}
    <div style="position: absolute; inset: 0; background-image: url('{{ $bgUrl }}'); background-size: cover; background-position: center; background-attachment: fixed; filter: grayscale(100%); z-index: 0;"></div>
    
    {{-- Dark Overlay --}}
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.60); z-index: 1;"></div>
    
    <div class="container" style="position: relative; z-index: 2;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size: 0.9rem;">
                    <a href="{{ url('/') }}" style="color: #ffaa6e; text-decoration: none;">Home</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <a href="{{ route('key.focus.area') }}" style="color: #ffaa6e; text-decoration: none;">Focus Area</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">{{ $area->title }}</span>
                </p>
                <div class="d-flex justify-content-center mb-3">
                    <div class="fad-hero-icon" style="width: 50px; height: 50px; font-size: 20px;">
                        <i class="{{ $iconClass }}"></i>
                    </div>
                </div>
                <h1 class="mb-0" style="color: #ffffff; font-weight: 400; font-size: 2.8rem; letter-spacing: 1px;">{{ $area->title }}</h1>
                <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
                
                {{-- Short Description --}}
                <p class="text-white mx-auto mt-4" style="max-width: 800px; font-size: 1.1rem; line-height: 1.6; opacity: 0.9;">
                    {{ $area->description }}
                </p>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

<!-- Body -->
<section class="fad-body">
    <div class="container">
        <a href="{{ route('key.focus.area') }}" class="fad-back-btn">
            <i class="fa-solid fa-arrow-left"></i> Back to Focus Areas
        </a>

        {{-- Detailed Description (from new detail_description column) --}}
        @if(!empty($area->detail_description))
            <div class="row">
                <div class="col-12">
                    <div class="fad-description text-dark" style="font-size: 1.1rem; line-height: 1.8;">
                        {!! $area->detail_description !!}
                    </div>
                </div>
            </div>
        @else
            {{-- Fallback message if detail_description is empty --}}
            <div class="row align-items-center justify-content-center py-5">
                <div class="col-md-6 text-center">
                    <div style="width: 80px; height: 80px; background: #fff5f0; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                        <i class="fa-solid fa-hourglass-half" style="font-size: 32px; color: #f86f2d;"></i>
                    </div>
                    <h3 style="color: #333; font-weight: 600; margin-bottom: 1rem;">Detailed Information Coming Soon</h3>
                    <p class="text-muted" style="font-size: 1.05rem;">We are currently working on updating this section with comprehensive details. Please check back later.</p>
                </div>
            </div>
        @endif
        
    </div>
</section>

{{-- ===== Related Projects ===== --}}
@if(isset($relatedProjects) && $relatedProjects->count())
<style>
    .rp-section { background: #fff; padding: 60px 0 50px; }
    .rp-scroll-wrapper { width: 100%; overflow: hidden; position: relative; }
    .rp-scroll-container {
        display: flex;
        gap: 24px;
        padding: 20px;
        width: max-content;
        will-change: transform;
    }
    .rp-card {
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
    .rp-card::before {
        content: '';
        position: absolute;
        top: 8px; left: 8px; right: 8px; bottom: 8px;
        border: 1px dashed #ccc;
        border-radius: 12px;
        pointer-events: none;
        transition: border-color 0.3s ease;
    }
    .rp-card:hover { border-color: #f86f2d; box-shadow: 0 12px 30px rgba(248,111,45,0.12); transform: translateY(-5px); color: inherit; }
    .rp-card:hover::before { border-color: #f86f2d; }
    .rp-image {
        width: 240px; height: 180px;
        border-radius: 12px; object-fit: cover;
        flex-shrink: 0; background-color: #f4f4f4;
        position: relative; z-index: 1;
    }
    .rp-content {
        display: flex; flex-direction: column;
        justify-content: center; flex-grow: 1;
        height: 100%; position: relative; z-index: 1;
    }
    .rp-title {
        font-size: 1.4rem; font-weight: 800; color: #222;
        margin-bottom: 16px; line-height: 1.3;
        display: -webkit-box; -webkit-line-clamp: 3;
        -webkit-box-orient: vertical; overflow: hidden;
    }
    .rp-badges { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 16px; }
    .rp-badge {
        background-color: #fff9e6; color: #222;
        border: 1px solid #fde08b;
        padding: 6px 16px; border-radius: 30px;
        font-size: 0.85rem; font-weight: 700;
    }
    .rp-date { font-size: 0.95rem; color: #7a8b9a; margin-top: auto; }
    /* Arrow Buttons */
    .rp-scroll-wrapper { position: relative; }
    .rp-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        width: 46px; height: 46px;
        border-radius: 50%;
        background: #fff;
        border: 2px solid #f86f2d;
        color: #f86f2d;
        font-size: 1.1rem;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer;
        box-shadow: 0 4px 14px rgba(248,111,45,0.25);
        transition: background 0.2s, color 0.2s, transform 0.2s;
    }
    .rp-arrow:hover { background: #f86f2d; color: #fff; transform: translateY(-50%) scale(1.1); }
    .rp-arrow-left  { left: 14px; }
    .rp-arrow-right { right: 14px; }
    @media (max-width: 768px) {
        .rp-card { flex-direction: column; width: 340px; text-align: center; padding: 15px; }
        .rp-image { width: 100%; height: 200px; }
        .rp-badges { justify-content: center; }
        .rp-title { font-size: 1.2rem; }
    }
</style>

<div class="rp-section" id="relatedProjectsSection">
    <div class="container">
        <div class="fp-header text-center">
            <span class="subheading">INITIATIVES</span>
            <h3>Related <span style="color:#f86f2d;">Projects</span></h3>
            <div style="width:60px;height:3px;background:#f86f2d;margin:0 auto 20px;"></div>
            <p class="text-secondary">Projects linked to this focus area.</p>
        </div>
    </div>

    <div class="rp-scroll-wrapper">
        <button class="rp-arrow rp-arrow-left"  id="rpPrev"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="rp-arrow rp-arrow-right" id="rpNext"><i class="fa-solid fa-chevron-right"></i></button>
        <div class="rp-scroll-container" id="rpScrollContainer">
            {{-- Original Set --}}
            @foreach($relatedProjects as $proj)
                <a href="{{ route('ongoing.project.view', $proj->id) }}" class="rp-card">
                    <img src="{{ $proj->cover_image_url }}" alt="{{ $proj->title }}" class="rp-image"
                         onerror="this.onerror=null;this.src='{{ asset('static_image/projects_blk.jpg') }}'">
                    <div class="rp-content">
                        <h4 class="rp-title">{{ $proj->title }}</h4>
                        <div class="rp-badges">
                            <span class="rp-badge">{{ $proj->status === 'ongoing' ? 'Current Project' : 'Completed Project' }}</span>
                            @foreach($proj->focusAreas as $fa)
                                <span class="rp-badge">{{ $fa->title }}</span>
                            @endforeach
                        </div>
                        <div class="rp-date">
                            {{ $proj->start_date ? $proj->start_date->format('M d, Y') : $proj->created_at->format('M d, Y') }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="fp-btn-container text-center mt-5">
            <a href="{{ route('ongoing.project') }}" class="fp-btn">
                <i class="fa-solid fa-eye me-2"></i> View All Projects
            </a>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const container = document.getElementById('rpScrollContainer');
        const btnPrev   = document.getElementById('rpPrev');
        const btnNext   = document.getElementById('rpNext');
        if (!container) return;

        const step = 674; // card width 650 + gap 24
        let offset = 0;
        let animating = false;

        function slideTo(target) {
            if (animating) return;
            const max = container.scrollWidth - container.parentElement.offsetWidth;
            target = Math.max(0, Math.min(target, max));
            if (target === offset) return;
            animating = true;
            const start = offset;
            const diff  = target - start;
            const duration = 380;
            const startTime = performance.now();

            function ease(t) { return t < 0.5 ? 2*t*t : -1+(4-2*t)*t; }

            function animate(now) {
                const elapsed = now - startTime;
                const progress = Math.min(elapsed / duration, 1);
                offset = start + diff * ease(progress);
                container.style.transform = `translateX(-${offset}px)`;
                if (progress < 1) {
                    requestAnimationFrame(animate);
                } else {
                    offset = target;
                    container.style.transform = `translateX(-${offset}px)`;
                    animating = false;
                    updateButtons();
                }
            }
            requestAnimationFrame(animate);
        }

        function updateButtons() {
            const max = container.scrollWidth - container.parentElement.offsetWidth;
            btnPrev.style.opacity = offset <= 0   ? '0.35' : '1';
            btnNext.style.opacity = offset >= max ? '0.35' : '1';
        }

        btnNext && btnNext.addEventListener('click', () => slideTo(offset + step));
        btnPrev && btnPrev.addEventListener('click', () => slideTo(offset - step));

        updateButtons();
    });
</script>
@endif
{{-- ===== End Related Projects ===== --}}

@endsection
