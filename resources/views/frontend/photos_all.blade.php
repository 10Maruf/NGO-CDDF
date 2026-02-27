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
    align-items:flex-end;
    justify-content:center;
    overflow:hidden;
    text-decoration:none;
}
/* dim overlay always visible slightly */
.cddf-gal-tile::before {
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,0,0,0.18);
    transition:background 0.3s ease;
    z-index:1;
}
/* title overlay slides up on hover */
.cddf-gal-overlay {
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
.cddf-gal-overlay span {
    display:block;
    color:#fff;
    font-size:0.78rem;
    font-weight:600;
    line-height:1.3;
    text-align:center;
    letter-spacing:0.3px;
    text-shadow:0 1px 3px rgba(0,0,0,0.6);
}
.cddf-gal-tile:hover .cddf-gal-overlay { transform:translateY(0); }
.cddf-gal-tile:hover::before { background:rgba(0,0,0,0.08); }
/* zoom icon */
.cddf-gal-tile .gal-icon {
    position:relative;
    z-index:4;
    width:46px;
    height:46px;
    background:rgba(255,255,255,0.88);
    border-radius:50%;
    opacity:0;
    display:flex;
    align-items:center;
    justify-content:center;
    transition:opacity 0.3s ease;
    color:#f86f2d;
    font-size:1rem;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
}
.cddf-gal-tile:hover .gal-icon { opacity:1; }
@media(max-width:575px){ .cddf-gal-tile{ width:100%; height:220px; } }
@media(min-width:576px) and (max-width:767px){ .cddf-gal-tile{ width:50%; } }
@media(min-width:768px) and (max-width:991px){ .cddf-gal-tile{ width:33.333%; } }
/* Magnific Popup custom caption */
.mfp-title { color:#eee; font-size:0.88rem; text-align:center; padding:6px 10px; }
</style>
@endpush

@section('content')

{{-- ===== Hero / Page Banner ===== --}}
<div class="hero-wrap" style="background-image: url('{{ (isset($application->gallery_banner) && $application->gallery_banner) ? asset('images/application/'.$application->gallery_banner) : asset('static_image/gallery_blk.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 340px; position: relative; display: flex; align-items: center;">
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
        <a href="{{ asset($data->folder.$data->image) }}"
           class="cddf-gal-tile image-popup-gal"
           data-title="{{ $data->title }}"
           style="background-image:url('{{ asset($data->folder.$data->image) }}');">
            <div class="gal-icon"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
            <div class="cddf-gal-overlay"><span>{{ $data->title }}</span></div>
        </a>
        @endforeach
    </div>

    <div style="height:60px;"></div>
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
