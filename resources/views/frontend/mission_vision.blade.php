@extends('main')

@section('title') Mission, Vision & Values — CDDF @endsection

@section('content')

{{-- ===== Hero Banner ===== --}}
<div class="hero-wrap" style="background-image: url('{{ (isset($application->mission_vision_banner) && $application->mission_vision_banner) ? asset('images/application/'.$application->mission_vision_banner) : asset('static_image/mission-vision_bg_blk.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 340px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.62);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size: 0.9rem;">
                    <a href="{{ url('/') }}" style="color: #ffaa6e; text-decoration: none;">Home</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">Mission, Vision & Values</span>
                </p>
                <h1 class="mb-0" style="color: #ffffff; font-weight: 400; font-size: 2.8rem; letter-spacing: 1px;">Mission, Vision & Values</h1>
                <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

<style>
    .mvv-anim {
        opacity: 0;
        transform: translateY(40px);
    }
    .mvv-anim.animate-in {
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .mvv-anim-delay-1 { transition-delay: 0.05s; }
    .mvv-anim-delay-2 { transition-delay: 0.18s; }
    .mvv-anim-delay-3 { transition-delay: 0.08s; }
    .mvv-anim-delay-4 { transition-delay: 0.16s; }
    .mvv-anim-delay-5 { transition-delay: 0.24s; }
    .mvv-anim-delay-6 { transition-delay: 0.32s; }
    .mvv-anim-delay-7 { transition-delay: 0.40s; }
</style>

<section class="py-5" style="background-color: #f9f5f1;">
    <div class="container">

        {{-- ===== Row 1: Vision + Mission ===== --}}
        <div class="row g-4 mb-4">

            {{-- Vision Card --}}
            <div class="col-md-6 mvv-anim mvv-anim-delay-1">
                <div class="h-100 p-4 bg-white rounded-3" style="border: 2px dashed #d8d0c8; box-shadow: 0 4px 18px rgba(0,0,0,0.06);">
                    <h3 class="mb-3" style="font-weight: 700; color: #1a1a1a;">Our Vision</h3>
                    <div style="border-left: 4px solid #f86f2d; padding-left: 16px;">
                        <p class="mb-0" style="color: #444; line-height: 1.85; text-align: justify;">
                            {{ $mission_vision->vision ?? 'Ensure Empowerment & living status of poor, helpless & destitution through Socio-Economic Development.' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Mission Card --}}
            <div class="col-md-6 mvv-anim mvv-anim-delay-2">
                <div class="h-100 p-4 bg-white rounded-3" style="border: 2px dashed #d8d0c8; box-shadow: 0 4px 18px rgba(0,0,0,0.06);">
                    <h3 class="mb-3" style="font-weight: 700; color: #1a1a1a;">Our Mission</h3>
                    <div style="border-left: 4px solid #f86f2d; padding-left: 16px;">
                        @if(!empty($mission_vision->mission))
                            <p class="mb-0" style="color: #444; line-height: 1.85; text-align: justify;">{{ $mission_vision->mission }}</p>
                        @else
                            <ul class="mb-0 ps-3" style="color: #444; line-height: 1.9;">
                                <li>Development of the poor through establishing citizens' rights in society.</li>
                                <li>Ensure women &amp; girls' livelihood development.</li>
                                <li>Implement development activities to enhance the poor &amp; bring them into the mainstream.</li>
                                <li>Special activities for persons with special needs, children &amp; women affected by disaster.</li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== Row 2: Our Core Values ===== --}}
        <div class="p-4 bg-white rounded-3 mb-4 mvv-anim mvv-anim-delay-3" style="border: 2px dashed #d8d0c8; box-shadow: 0 4px 18px rgba(0,0,0,0.06);">
            <h3 class="mb-4" style="font-weight: 700; color: #1a1a1a;">Our Core Values</h3>
            <div class="row g-4">

                <div class="col-lg-4 col-md-6">
                    <div style="border-left: 3px solid #f86f2d; padding-left: 14px;">
                        <div class="mb-2">
                            <i class="fa-solid fa-heart-pulse fa-2x" style="color: #f86f2d;"></i>
                        </div>
                        <h6 style="font-weight: 700; color: #1a1a1a;">Ensure Humanitarian Standard</h6>
                        <p class="mb-0" style="color: #666; font-size: 0.92rem; line-height: 1.7;">Upholding internationally recognized humanitarian principles in all our programs and activities.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div style="border-left: 3px solid #f86f2d; padding-left: 14px;">
                        <div class="mb-2">
                            <i class="fa-solid fa-handshake fa-2x" style="color: #f86f2d;"></i>
                        </div>
                        <h6 style="font-weight: 700; color: #1a1a1a;">Respect to All</h6>
                        <p class="mb-0" style="color: #666; font-size: 0.92rem; line-height: 1.7;">Treating every individual with dignity and respect regardless of their background, status or beliefs.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div style="border-left: 3px solid #f86f2d; padding-left: 14px;">
                        <div class="mb-2">
                            <i class="fa-solid fa-scale-balanced fa-2x" style="color: #f86f2d;"></i>
                        </div>
                        <h6 style="font-weight: 700; color: #1a1a1a;">Equal Opportunities</h6>
                        <p class="mb-0" style="color: #666; font-size: 0.92rem; line-height: 1.7;">Ensuring fair and equal access to resources, services and opportunities for all community members.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div style="border-left: 3px solid #f86f2d; padding-left: 14px;">
                        <div class="mb-2">
                            <i class="fa-solid fa-shield-halved fa-2x" style="color: #f86f2d;"></i>
                        </div>
                        <h6 style="font-weight: 700; color: #1a1a1a;">Preserve Rights &amp; Dignity</h6>
                        <p class="mb-0" style="color: #666; font-size: 0.92rem; line-height: 1.7;">Actively protecting the fundamental rights and inherent dignity of every person we serve.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div style="border-left: 3px solid #f86f2d; padding-left: 14px;">
                        <div class="mb-2">
                            <i class="fa-solid fa-landmark fa-2x" style="color: #f86f2d;"></i>
                        </div>
                        <h6 style="font-weight: 700; color: #1a1a1a;">Ensure Governance</h6>
                        <p class="mb-0" style="color: #666; font-size: 0.92rem; line-height: 1.7;">Maintaining transparency, accountability and strong governance across all organizational operations.</p>
                    </div>
                </div>

            </div>
        </div>

        {{-- ===== Row 3: Objectives ===== --}}
        <div class="p-4 bg-white rounded-3 mvv-anim mvv-anim-delay-4" style="border: 2px dashed #d8d0c8; box-shadow: 0 4px 18px rgba(0,0,0,0.06);">
            <h3 class="mb-4" style="font-weight: 700; color: #1a1a1a;">Our Objectives</h3>
            <div class="row g-4">

                <div class="col-lg-6 col-md-6">
                    <div style="border-left: 3px solid #f86f2d; padding-left: 14px;">
                        <div class="mb-2">
                            <i class="fa-solid fa-seedling fa-2x" style="color: #f86f2d;"></i>
                        </div>
                        <h6 style="font-weight: 700; color: #1a1a1a;">Livelihood Improvement</h6>
                        <p class="mb-0" style="color: #666; font-size: 0.92rem; line-height: 1.7;">Improve the livelihood status of poor men, women and children through need-based sustainable development programs.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div style="border-left: 3px solid #f86f2d; padding-left: 14px;">
                        <div class="mb-2">
                            <i class="fa-solid fa-coins fa-2x" style="color: #f86f2d;"></i>
                        </div>
                        <h6 style="font-weight: 700; color: #1a1a1a;">Economic Empowerment</h6>
                        <p class="mb-0" style="color: #666; font-size: 0.92rem; line-height: 1.7;">Increase the economic status of the poor through Income Generating Activities and creating employment opportunities.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div style="border-left: 3px solid #f86f2d; padding-left: 14px;">
                        <div class="mb-2">
                            <i class="fa-solid fa-users fa-2x" style="color: #f86f2d;"></i>
                        </div>
                        <h6 style="font-weight: 700; color: #1a1a1a;">Social Empowerment</h6>
                        <p class="mb-0" style="color: #666; font-size: 0.92rem; line-height: 1.7;">Empower the poor socially and economically to make them active and contributing members of society.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div style="border-left: 3px solid #f86f2d; padding-left: 14px;">
                        <div class="mb-2">
                            <i class="fa-solid fa-gavel fa-2x" style="color: #f86f2d;"></i>
                        </div>
                        <h6 style="font-weight: 700; color: #1a1a1a;">Human Rights &amp; Justice</h6>
                        <p class="mb-0" style="color: #666; font-size: 0.92rem; line-height: 1.7;">Promote human rights and social justice for poor men, women, children as well as for the disabled.</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<script>
(function () {
    var els = document.querySelectorAll('.mvv-anim');
    if (!els.length) return;
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });
    els.forEach(function (el) { observer.observe(el); });
})();
</script>

@endsection
