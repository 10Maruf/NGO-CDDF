@extends('main')

@section('content')

@php
    $isEvent = ($news->category ?? 'news') === 'event';
    $bgImage = asset('images/news/'.$news->image);
@endphp

{{-- ===== Hero Section ===== --}}
<div class="hero-wrap" style="background-image: url('{{ $bgImage }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 500px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.6) 50%, rgba(0,0,0,0.3) 100%);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row">
            <div class="col-lg-8">
                {{-- Category Badge --}}
                <span class="badge mb-3 px-3 py-2 text-uppercase shadow-sm"
                      style="font-size: 12px; letter-spacing: 1.5px; background-color: {{ $isEvent ? '#ffc107' : '#f86f2d' }}; color: {{ $isEvent ? '#000' : '#fff' }};">
                    {{ $isEvent ? 'Event' : 'News Update' }}
                </span>

                {{-- Title --}}
                <h1 class="text-white fw-bold mb-3 display-4" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                    {{ $news->title }}
                </h1>

                {{-- Date & Meta --}}
                <div class="d-flex align-items-center text-white-50 mt-4" style="font-size: 15px;">
                    <span class="me-4">
                        <i class="fas fa-calendar-alt me-2 text-warning"></i>
                        {{ date("d F, Y") }}
                    </span>
                    @if($isEvent)
                    <span>
                        <i class="fas fa-map-marker-alt me-2 text-danger"></i>
                        CDDF Venue
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

{{-- ===== Content Section ===== --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                {{-- Content Body --}}
                <div class="mb-5">
                    @if($news->title)
                    <h3 class="mb-4 text-dark fw-bold">{{ $news->title }}</h3>
                    @endif
                    
                    <div class="text-secondary description-content" style="font-size: 1.1rem; line-height: 1.8; text-align: justify; color: #444 !important;">
                        {!! $news->description !!}
                    </div>
                </div>

                {{-- Gallery Grid (if available) --}}
                @if(isset($galleryImages) && count($galleryImages) > 0)
                <div class="mb-5 pt-4 border-top">
                    <h4 class="mb-4 fw-bold">Event Gallery</h4>
                    <div class="row g-3">
                        @foreach($galleryImages as $img)
                            <div class="col-md-4 col-sm-6">
                                <a href="{{ asset('images/news/'.$img->image) }}" class="ratio ratio-4x3 overflow-hidden rounded shadow-sm d-block image-popup-gallery position-relative gallery-item">
                                    <img src="{{ asset('images/news/'.$img->image) }}" alt="Gallery Image" class="w-100 h-100 object-fit-cover">
                                    <div class="gallery-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-search-plus text-white fa-2x"></i>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Back Button --}}
                <div class="mt-5 pt-4 border-top">
                    <a href="{{ route('latest.news.all') }}" class="btn btn-outline-dark rounded-pill px-4" style="font-weight: 600;">
                        <i class="fas fa-arrow-left me-2"></i> Back to Updates
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
{{-- ===== End Content ===== --}}

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

/* Gallery Hover Effect */
.gallery-item {
    position: relative;
    display: block;
}
.gallery-overlay {
    background: rgba(0, 0, 0, 0.4);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.gallery-item:hover .gallery-overlay {
    opacity: 1;
}
.gallery-item:hover .fa-search-plus {
    transform: scale(1.2);
    transition: transform 0.3s ease;
}
</style>
@endpush

@push('js')
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.image-popup-gallery').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                tPrev: 'Previous (Left arrow key)',
                tNext: 'Next (Right arrow key)',
                preload: [0, 1]
            },
            mainClass: 'mfp-with-zoom',
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
    });
</script>
@endpush

@endsection
