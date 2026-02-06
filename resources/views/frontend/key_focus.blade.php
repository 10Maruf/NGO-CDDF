@extends('main')

@section('content')
<style>
    .focus-area-kicker{
        letter-spacing: 0.12em;
        font-size: 12px;
        font-weight: 700;
        color: var(--bs-secondary-color);
    }
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
        background: linear-gradient(180deg, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.18) 55%, rgba(0,0,0,0.55) 100%);
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
    }
    .focus-area-card--image .focus-area-card-text{
        color: rgba(255,255,255,.80);
    }
    .focus-area-card--image .focus-area-icon{
        background: rgba(255,255,255,.14) !important;
        color: rgba(255,255,255,.95) !important;
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

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>What we do</li>
        </ol>
        <h2>Key Focus Area</h2>
    </div>
</section>
<!-- End Breadcrumbs -->

<section class="bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
        <div class="text-center mb-4">
            <div class="focus-area-kicker">WHAT WE DO</div>
            <h2 class="fw-bold mb-2">Our Focus Areas</h2>
            <p class="text-secondary mx-auto mb-0" style="max-width: 720px;">
                Focus Area সেগমেন্টে আমাদের প্রকল্পগুলো কোন কোন এরিয়ায় ফোকাস করবে—সেই বিষয়ে সংক্ষিপ্ত ধারণা দেওয়া হয়।
                যেমন: নারীদের জন্য অবকাঠামোগত সুবিধা প্রদান, কমিউনিটি এমপাওয়ারমেন্ট, জীবিকা উন্নয়ন, সামাজিক সুরক্ষা ইত্যাদি।
            </p>
        </div>

        @php
            $iconBadgeClasses = [
                'bg-primary bg-opacity-10 text-primary',
                'bg-danger bg-opacity-10 text-danger',
                'bg-warning bg-opacity-10 text-warning',
                'bg-info bg-opacity-10 text-info',
                'bg-success bg-opacity-10 text-success',
                'bg-secondary bg-opacity-10 text-secondary',
            ];
        @endphp

        <div class="row g-4">
            @foreach(($focus_areas ?? collect()) as $item)
                @php
                    $badgeClass = $iconBadgeClasses[$loop->index % count($iconBadgeClasses)];
                    $iconClass = 'fa-solid fa-bullseye';

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
                                <i class="{{ $iconClass }}"></i>
                            </div>
                            <div class="focus-area-card-title">{{ $item->title }}</div>
                            <p class="focus-area-card-text" style="text-align: justify;">{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
