@extends('main')

@section('content')

{{-- ===== Hero / Page Banner ===== --}}
<div class="hero-wrap" style="background-image: url('{{ asset('static_image/focus_areas_blk.jpeg') }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 340px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.60);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size: 0.9rem;">
                    <a href="{{ url('/') }}" style="color: #ffaa6e; text-decoration: none;">Home</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">Key Focus Area</span>
                </p>
                <h1 class="mb-0" style="color: #ffffff; font-weight: 400; font-size: 2.8rem; letter-spacing: 1px;">Key Focus Area</h1>
                <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

<section class="bg-light py-5">
    <div class="container" data-aos="fade-up">
        
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3" style="color: #333;">Prioritizing Impact</h2>
            <p class="text-secondary mx-auto" style="max-width: 720px; font-size: 1.05rem; line-height: 1.7;">
                The Focus Area section provides a brief overview of the key areas our projects will prioritize—such as infrastructure support for women, community empowerment, livelihood development, and social protection.
            </p>
        </div>

        <div class="row g-4">
            @php
                $iconBadgeClasses = [
                    'bg-primary bg-opacity-10 text-primary',
                    'bg-success bg-opacity-10 text-success',
                    'bg-warning bg-opacity-10 text-warning',
                    'bg-info bg-opacity-10 text-info',
                    'bg-danger bg-opacity-10 text-danger',
                    'bg-secondary bg-opacity-10 text-secondary'
                ];
            @endphp
            @foreach(($focus_areas ?? collect()) as $item)
                @php
                    $badgeClass = $iconBadgeClasses[$loop->index % count($iconBadgeClasses)];
                    $iconClass = !empty($item->icon_class) ? $item->icon_class : 'fa-solid fa-bullseye';

                    $iconUrl = null;
                    if (!empty($item->icon_path)) {
                        $iconUrl = asset('storage/' . $item->icon_path);
                    }

                    $imageUrl = null;
                    if (!empty($item->image_path)) {
                        $imageUrl = asset('storage/' . $item->image_path);
                    } elseif (!empty($item->default_image)) {
                        $imageUrl = asset($item->default_image);
                    }

                    $cardClass = !empty($imageUrl) ? 'focus-area-card--image' : '';
                    $cardStyle = !empty($imageUrl) ? "background-image: url('{$imageUrl}');" : '';
                @endphp
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="focus-area-card {{ $cardClass }}" style="{{ $cardStyle }}">
                        <div class="focus-area-card-content">
                            <div class="focus-area-icon {{ $badgeClass }}">
                                @if (!empty($iconUrl))
                                    <img src="{{ $iconUrl }}" alt="{{ $item->title }} icon">
                                @else
                                    <i class="{{ $iconClass }}"></i>
                                @endif
                            </div>
                            <div class="focus-area-card-title">{{ $item->title }}</div>
                            <p class="focus-area-card-text" style="text-align: justify;">{{ Str::limit($item->description, 120) }}</p>
                            <a href="{{ route('focus.area.detail', $item->id) }}" class="focus-area-learn-more mt-2 d-inline-flex align-items-center gap-1">
                                Learn More <i class="fa-solid fa-arrow-right" style="font-size:12px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('css')
<style>
    .focus-area-card{
        background: #fff;
        border: 1px solid var(--bs-border-color);
        border-radius: 16px;
        padding: 24px;
        height: 100%;
        transition: transform 180ms ease, box-shadow 180ms ease;
        will-change: transform;
        position: relative;
        overflow: hidden;
    }
    .focus-area-card--image{
        background-size: cover;
        background-position: center;
        border-color: transparent;
        padding: 28px;
    }
    .focus-area-card--image::before{
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(0,0,0,0.65) 0%, rgba(0,0,0,0.28) 55%, rgba(0,0,0,0.65) 100%);
        pointer-events: none;
    }
    .focus-area-card-content{
        position: relative;
        z-index: 1;
    }
    .focus-area-card:hover{
        transform: translateY(-4px);
        box-shadow: 0 .75rem 2rem rgba(var(--bs-body-color-rgb), .10);
    }
    .focus-area-icon{
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 14px;
        overflow: hidden;
    }
    .focus-area-icon img{
        width: 28px;
        height: 28px;
        object-fit: contain;
        display: block;
    }
    .focus-area-icon i{
        font-size: 22px;
    }
    .focus-area-card-title{
        font-size: 18px;
        font-weight: 800;
        margin-bottom: 8px;
    }
    .focus-area-card-text{
        color: var(--bs-secondary-color);
        margin-bottom: 0;
    }
    .focus-area-card--image .focus-area-card-title,
    .focus-area-card--image .focus-area-card-text{
        color: rgba(255,255,255,.92);
        text-shadow: 0 2px 10px rgba(0,0,0,.45);
    }
    .focus-area-card--image .focus-area-card-text{
        color: rgba(255,255,255,.80);
    }
    .focus-area-card--image .focus-area-card-content{
        background: rgba(0,0,0,.22);
        border-radius: 14px;
        padding: 14px;
    }
    .focus-area-card--image .focus-area-icon{
        background: rgba(255,255,255,.14) !important;
        color: rgba(255,255,255,.95) !important;
    }
    .focus-area-learn-more {
        font-size: 13px;
        font-weight: 700;
        color: #f86f2d;
        text-decoration: none;
        transition: gap 0.2s;
    }
    .focus-area-learn-more:hover { color: #f86f2d; gap: 6px !important; }
    .focus-area-card--image .focus-area-learn-more {
        color: rgba(255,255,255,.9);
    }
    @media (prefers-reduced-motion: reduce){
        .focus-area-card{
            transition: none;
        }
        .focus-area-card:hover{
            transform: none;
            box-shadow: none;
        }
    }
</style>
@endpush
