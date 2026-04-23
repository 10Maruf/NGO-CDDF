@extends('main')

@section('content')
<style>
    .partner-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        border-color: #f86f2d !important;
    }
</style>

{{-- ===== Hero / Page Banner ===== --}}
<div class="hero-wrap" style="background-image: url('{{ $project->cover_image_url }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 500px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.60);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row">
            <div class="col-md-8 py-5 text-start">
                <h1 class="mb-0" style="color: #ffffff; font-weight: 700; font-size: 3.5rem; letter-spacing: 1px; text-transform: uppercase; font-family: 'Dosis', sans-serif;">{{ $project->title }}</h1>
                <div class="mt-3 mb-4" style="width: 80px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
                <p style="font-size: 1.2rem; line-height: 1.6; color: #f8f9fa; font-weight: 300; max-width: 90%;">
                    {{ $project->short_description }}
                </p>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

<!-- Content Section -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="row">
            <!-- Left Side: Detail Description -->
            <div class="col-lg-8 mb-5 mb-lg-0">
                <!-- Detail Description -->
                <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                    <h2 style="font-size: 2.2rem; font-weight: 700; color: #333; text-transform: uppercase; line-height: 1.3; margin-bottom: 20px;">{{ $project->title }}</h2>
                    
                    <div class="mb-4 rounded overflow-hidden shadow-sm" style="border: 1px solid #eee;">
                        <img src="{{ $project->cover_image_url }}" alt="{{ $project->title }}" class="img-fluid w-100" style="max-height: 450px; object-fit: cover;">
                    </div>

                    <h3 style="font-size: 1.8rem; font-weight: 700; color: #333; margin-bottom: 20px; margin-top: 40px; border-bottom: 2px solid #f86f2d; padding-bottom: 10px; display: inline-block;">Project Overview</h3>
                    <div style="font-size: 1.05rem; line-height: 1.8; color: #444; text-align: justify;">
                        {!! $project->detail_description !!}
                    </div>

                    {{-- Gallery Grid --}}
                    @if(isset($galleryImages) && $galleryImages->isNotEmpty())
                    <div class="mt-5 pt-4 border-top">
                        <h3 style="font-size: 1.8rem; font-weight: 700; color: #333; margin-bottom: 20px; border-bottom: 2px solid #f86f2d; padding-bottom: 10px; display: inline-block;">
                            Project Gallery
                        </h3>
                        <div class="row g-3 mt-2">
                            @foreach($galleryImages as $img)
                            <div class="col-md-4 col-sm-6">
                                <a href="{{ asset('images/project/' . $img->image) }}"
                                   class="ratio ratio-4x3 overflow-hidden rounded shadow-sm d-block image-popup-gallery position-relative gallery-item">
                                    <img src="{{ asset('images/project/' . $img->image) }}"
                                         alt="Project Gallery"
                                         class="w-100 h-100 object-fit-cover">
                                    <div class="gallery-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-search-plus text-white fa-2x"></i>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="mt-5">
                        <a href="{{ route('ongoing.project') }}" class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="fa fa-arrow-left me-2"></i> Back to Projects
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Right Side: Info, Date, Location, Partners -->
            <div class="col-lg-4">
                <!-- Project Information -->
                <div class="bg-white p-4 rounded shadow-sm mb-4" style="border-top: 4px solid #f86f2d;">
                    <h4 style="font-size: 1.3rem; font-weight: 700; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                        <i class="fas fa-clipboard-list me-2" style="color: #f86f2d;"></i> Project Information
                    </h4>
                    
                    <div class="mb-3 d-flex align-items-start">
                        <div class="me-3 mt-1" style="color: #f86f2d; font-size: 1.2rem;"><i class="fas fa-info-circle"></i></div>
                        <div>
                            <strong style="color: #777; display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px;">Status</strong>
                            <span style="font-size: 1.05rem; color: #333; font-weight: 600;">{{ ucfirst($project->status) }}</span>
                        </div>
                    </div>
                    
                    <div class="mb-3 d-flex align-items-start">
                        <div class="me-3 mt-1" style="color: #f86f2d; font-size: 1.2rem;"><i class="far fa-calendar-alt"></i></div>
                        <div>
                            <strong style="color: #777; display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px;">Duration</strong>
                            <span style="font-size: 1.05rem; color: #333; font-weight: 600;">
                                {{ \Carbon\Carbon::parse($project->start_date)->format('M Y') }} - 
                                {{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('M Y') : 'Present' }}
                            </span>
                        </div>
                    </div>
                    
                    @if($project->location)
                    <div class="mb-3 d-flex align-items-start">
                        <div class="me-3 mt-1" style="color: #f86f2d; font-size: 1.2rem;"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <strong style="color: #777; display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px;">Location</strong>
                            <span style="font-size: 1.05rem; color: #333; font-weight: 600;">{{ $project->location }}</span>
                        </div>
                    </div>
                    @endif
                    
                    @if($project->budget)
                    <div class="mb-3 d-flex align-items-start">
                        <div class="me-3 mt-1" style="color: #f86f2d; font-size: 1.2rem;"><i class="fas fa-money-bill-wave"></i></div>
                        <div>
                            <strong style="color: #777; display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px;">Budget</strong>
                            <span style="font-size: 1.05rem; color: #333; font-weight: 600;">৳ {{ number_format($project->budget, 2) }}</span>
                        </div>
                    </div>
                    @endif
                    
                    @if($project->beneficiary_count)
                    <div class="mb-3 d-flex align-items-start">
                        <div class="me-3 mt-1" style="color: #f86f2d; font-size: 1.2rem;"><i class="fas fa-users"></i></div>
                        <div>
                            <strong style="color: #777; display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px;">Beneficiaries</strong>
                            <span style="font-size: 1.05rem; color: #333; font-weight: 600;">{{ number_format($project->beneficiary_count) }}</span>
                        </div>
                    </div>
                    @endif
                </div>
                
                <!-- Focus Areas -->
                @if($project->focusAreas->isNotEmpty())
                <div class="bg-white p-4 rounded shadow-sm mb-4">
                    <h4 style="font-size: 1.3rem; font-weight: 700; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                        <i class="fas fa-bullseye me-2" style="color: #f86f2d;"></i> Focus Areas
                    </h4>
                    <ul class="list-unstyled mb-0">
                        @foreach($project->focusAreas as $area)
                            <li class="mb-3 d-flex align-items-center" style="font-size: 1.05rem; color: #444; font-weight: 500;">
                                <i class="fas fa-check-circle me-3" style="color: #f86f2d; font-size: 1.2rem;"></i> {{ $area->title }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Implementing Partners -->
                @if($project->partners->isNotEmpty())
                <div class="bg-white p-4 rounded shadow-sm mb-4">
                    <h4 style="font-size: 1.3rem; font-weight: 700; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                        <i class="fas fa-handshake me-2" style="color: #f86f2d;"></i> Partners / Donors
                    </h4>
                    <div class="row g-3">
                        @foreach($project->partners as $partner)
                            <div class="col-6">
                                <div class="partner-card p-3 border rounded text-center h-100 d-flex flex-column align-items-center justify-content-center bg-white shadow-sm" style="transition: all 0.3s ease; border-color: #e9ecef !important;">
                                    @if($partner->image)
                                        <img src="{{ asset('images/partner/'.$partner->image) }}" alt="{{ $partner->name }}" class="img-fluid mb-2" style="max-height: 60px; object-fit: contain;" title="{{ $partner->name }}">
                                        <span class="d-block text-muted" style="font-size: 0.85rem; font-weight: 600; line-height: 1.2;">{{ $partner->name }}</span>
                                    @else
                                        <div class="d-flex align-items-center justify-content-center h-100 w-100">
                                            <span class="fw-bold text-secondary" style="font-size: 0.9rem; line-height: 1.2;">{{ $partner->name }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

@push('css')
<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
<style>
.gallery-item { position: relative; display: block; }
.gallery-overlay {
    background: rgba(0,0,0,0.4);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.gallery-item:hover .gallery-overlay { opacity: 1; }
.gallery-item:hover .fa-search-plus { transform: scale(1.2); transition: transform 0.3s ease; }
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
            preload: [0, 1]
        },
        mainClass: 'mfp-with-zoom',
        zoom: { enabled: true, duration: 300 }
    });
});
</script>
@endpush

@endsection
