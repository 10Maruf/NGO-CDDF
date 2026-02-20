@extends('main')
@section('title') Photo Gallery — CDDF @endsection

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
.cddf-gal-tile::after { pointer-events: none; }
</style>

<style>
.cddf-gal-grid { display:flex; flex-wrap:wrap; }
.cddf-gal-tile {
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
.cddf-gal-tile::after {
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,0,0,0.22);
    transition:all 0.3s ease;
}
.cddf-gal-tile .gal-icon {
    position:relative;
    z-index:2;
    width:52px;
    height:52px;
    background:rgba(255,255,255,0.85);
    border-radius:50%;
    opacity:0;
    display:flex;
    align-items:center;
    justify-content:center;
    transition:all 0.3s ease;
    color:#f86f2d;
    font-size:1.1rem;
}
.cddf-gal-tile:hover .gal-icon { opacity:1; }
.cddf-gal-tile:hover::after { opacity:0; }
@media(max-width:575px){ .cddf-gal-tile{ width:100%; height:220px; } }
@media(min-width:576px) and (max-width:767px){ .cddf-gal-tile{ width:50%; } }
@media(min-width:768px) and (max-width:991px){ .cddf-gal-tile{ width:33.333%; } }
</style>
@endpush

@section('content')

{{-- ===== Hero / Page Banner ===== --}}
<div class="hero-wrap" style="background-image: url('{{ asset('static_image/gallery_blk.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 340px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.60);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size: 0.9rem;">
                    <a href="{{ url('/') }}" style="color: #ffaa6e; text-decoration: none;">Home</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">Gallery</span>
                </p>
                <h1 class="mb-0" style="color: #ffffff; font-weight: 400; font-size: 2.8rem; letter-spacing: 1px;">Photo Gallery</h1>
                <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

{{-- Gallery Section --}}
<section style="background:#f9f5f1; padding:60px 0 0;">
    <div class="container">
        <div class="text-center mb-5">
            <span style="display:inline-block; background:#fff1e8; color:#f86f2d; font-size:0.78rem; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; padding:4px 16px; border-radius:20px; margin-bottom:10px;">Gallery</span>
            <h2 style="font-family:'Dosis',sans-serif; font-weight:700; color:#2d2d2d; font-size:2rem;">Our Photo Gallery</h2>
            <div style="width:60px; height:4px; background:#f86f2d; border-radius:2px; margin:10px auto 0;"></div>
            <p class="mt-3" style="color:#777; max-width:520px; margin:0 auto; font-size:0.97rem;">Moments captured from CDDF's work across communities — empowering lives in Chilmari and beyond.</p>
        </div>
    </div>

    <div class="cddf-gal-grid">
        @foreach($photos as $data)
        <a href="{{ asset('images/gallery/'.$data->image) }}"
           class="cddf-gal-tile image-popup-gal"
           style="background-image:url('{{ asset('images/gallery/'.$data->image) }}');">
            <div class="gal-icon"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
        </a>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="container">
        <div class="d-flex justify-content-center py-5">
            {{ $photos->links() }}
        </div>
    </div>
</section>
{{-- End Gallery Section --}}

@endsection

@push('js')
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script>
$(document).ready(function(){
    $('.image-popup-gal').magnificPopup({
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
