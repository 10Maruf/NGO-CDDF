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
@endsection
