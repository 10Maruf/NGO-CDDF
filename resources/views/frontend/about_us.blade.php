@extends('main')

@section('title') About CDDF @endsection

@section('content')

{{-- ===== Hero / Page Banner ===== --}}
<div class="hero-wrap" style="background-image: url('{{ asset('static_image/about_us_bg.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 340px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.60);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size: 0.9rem;">
                    <a href="{{ url('/') }}" style="color: #ffaa6e; text-decoration: none;">Home</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">About Us</span>
                </p>
                <h1 class="mb-0" style="color: #ffffff; font-weight: 400; font-size: 2.8rem; letter-spacing: 1px;">About CDDF</h1>
                <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

{{-- ===== About Content ===== --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">

            {{-- Left: Text Content --}}
            <div class="col-lg-7 col-md-12">
                <p class="mb-1" style="color: #f86f2d; font-weight: 600; letter-spacing: 1px; font-size: 0.9rem; text-transform: uppercase;">Who We Are</p>
                <h2 class="mb-4" style="font-weight: 700; color: #1a1a1a; font-size: 1.9rem;">
                    Chilmari Distressed Development Foundation
                    <span style="display: block; width: 50px; height: 4px; background: #f86f2d; border-radius: 2px; margin-top: 10px;"></span>
                </h2>

                <div class="about-text" style="color: #444; line-height: 1.9; font-size: 1rem; text-align: justify;">
                    @if(isset($about_us) && $about_us)
                        {!! $about_us->description !!}
                    @else
                        <p>CDDF (Chilmari Distressed Development Foundation) is a non-government, non-profit, non-political, voluntary social welfare organization working for the development of marginalized and underprivileged communities.</p>
                    @endif
                </div>

                <div class="mt-4 d-flex flex-wrap gap-3">
                    <a href="{{ route('vision.mission') }}" class="btn px-4 py-2" style="background-color: #f86f2d; color: #fff; border-radius: 4px; font-weight: 600; text-decoration: none;">
                        <i class="fa-solid fa-bullseye me-2"></i> Our Mission & Vision
                    </a>
                    <a href="{{ route('donate') }}" class="btn px-4 py-2" style="border: 2px solid #f86f2d; color: #f86f2d; border-radius: 4px; font-weight: 600; text-decoration: none; background: transparent;">
                        <i class="fa-solid fa-hand-holding-heart me-2"></i> Donate Now
                    </a>
                </div>
            </div>

            {{-- Right: Chilmari Map --}}
            <div class="col-lg-5 col-md-12 text-center">
                <div style="background: #fff; border-radius: 12px; padding: 24px; box-shadow: 0 8px 30px rgba(0,0,0,0.10); border: 1px solid #f0ebe4;">
                    <p class="mb-2" style="font-size: 0.8rem; color: #f86f2d; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Our Location</p>
                    <h5 class="mb-3" style="color: #1a1a1a; font-weight: 600;">Chilmari, Kurigram</h5>
                    <img src="{{ asset('static_image/Chilmari_in_Rangpur_division_(Bangladesh).svg') }}"
                         alt="Chilmari Location Map"
                         style="width: 100%; max-width: 340px; height: auto;">
                    <p class="mt-3 mb-0" style="font-size: 0.85rem; color: #888;">
                        <i class="fa-solid fa-location-dot me-1" style="color: #f86f2d;"></i>
                        Chilmari Upazila, Kurigram District, Rangpur Division
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
{{-- ===== End About Content ===== --}}

@endsection
