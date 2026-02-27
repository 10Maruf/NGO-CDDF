@extends('main')

@section('title') FAQ @endsection

@section('content')

{{-- ===== Hero / Page Banner ===== --}}
<div class="hero-wrap" style="background-image: url('{{ (isset($application->faq_banner) && $application->faq_banner) ? asset('images/application/'.$application->faq_banner) : asset('static_image/about_us_bg.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 340px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.60);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size: 0.9rem;">
                    <a href="{{ url('/') }}" style="color: #ffaa6e; text-decoration: none;">Home</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">FAQ</span>
                </p>
                <h1 class="mb-0" style="color: #ffffff; font-weight: 400; font-size: 2.8rem; letter-spacing: 1px;">Frequently Asked Questions</h1>
                <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

{{-- ===== FAQ Content ===== --}}
<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <p class="mb-1" style="color: #f86f2d; font-weight: 600; letter-spacing: 1px; font-size: 0.9rem; text-transform: uppercase;">Got Questions?</p>
            <h2 class="mb-2" style="font-weight: 700; color: #1a1a1a; font-size: 1.9rem;">We Have Answers</h2>
            <div class="mx-auto" style="width: 50px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-9">

                @if(isset($faqs) && count($faqs) > 0)

                {{-- Group by category --}}
                @php
                    $grouped = $faqs->groupBy('category');
                @endphp

                @foreach($grouped as $category => $items)
                    @if($category)
                    <div class="mb-2 mt-4">
                        <span style="display:inline-block; background:#fff3ec; color:#f86f2d; font-size:0.78rem; font-weight:700; text-transform:uppercase; letter-spacing:1.5px; padding:4px 14px; border-radius:20px; border:1px solid #f0c4ac;">
                            {{ $category }}
                        </span>
                    </div>
                    @endif

                    <div class="accordion mb-3" id="accordion_{{ Str::slug($category ?? 'general') }}">
                        @foreach($items as $index => $faq)
                        @php $uid = 'faq_' . $faq->id; @endphp
                        <div class="accordion-item" style="border: none; margin-bottom: 10px; border-radius: 10px !important; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                            <h3 class="accordion-header" id="heading_{{ $uid }}">
                                <button class="accordion-button {{ $index == 0 && $loop->parent->first ? '' : 'collapsed' }}"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse_{{ $uid }}"
                                        aria-expanded="{{ $index == 0 && $loop->parent->first ? 'true' : 'false' }}"
                                        aria-controls="collapse_{{ $uid }}"
                                        style="font-weight: 600; font-size: 0.97rem; color: #1a1a1a; background: #fff; box-shadow: none; padding: 18px 22px;">
                                    <span style="display:inline-flex;align-items:center;justify-content:center;width:30px;height:30px;background:#fff3ec;border-radius:50%;margin-right:14px;flex-shrink:0;">
                                        <i class="fa-solid fa-circle-question" style="color:#f86f2d;font-size:0.95rem;"></i>
                                    </span>
                                    {{ $faq->question }}
                                </button>
                            </h3>
                            <div id="collapse_{{ $uid }}"
                                 class="accordion-collapse collapse {{ $index == 0 && $loop->parent->first ? 'show' : '' }}"
                                 aria-labelledby="heading_{{ $uid }}">
                                <div class="accordion-body" style="padding: 16px 22px 20px 66px; color: #555; font-size: 0.95rem; line-height: 1.8; background: #fff;">
                                    {!! nl2br(e($faq->answer)) !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endforeach

                @else
                <div class="text-center py-5">
                    <i class="fa-solid fa-circle-question" style="font-size:3rem;color:#ddd;"></i>
                    <p class="mt-3" style="color:#aaa;">No FAQs available at the moment.</p>
                </div>
                @endif

                {{-- CTA --}}
                <div class="text-center mt-5 p-4" style="background:#fff;border-radius:12px;box-shadow:0 2px 12px rgba(0,0,0,0.06);">
                    <p class="mb-1" style="color:#f86f2d;font-weight:700;font-size:0.85rem;text-transform:uppercase;letter-spacing:1px;">Still have questions?</p>
                    <h5 class="mb-3" style="color:#1a1a1a;font-weight:700;">Can't find the answer you're looking for?</h5>
                    <a href="{{ route('contact') }}" class="btn px-4 py-2" style="background-color:#f86f2d;color:#fff;border-radius:6px;font-weight:600;text-decoration:none;border:none;">
                        <i class="fa-solid fa-envelope me-2"></i>Contact Us
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
{{-- ===== End FAQ ===== --}}

@endsection

@push('css')
<style>
.accordion-button:not(.collapsed) {
    color: #f86f2d !important;
    background-color: #fff9f6 !important;
}
.accordion-button:not(.collapsed) span i {
    color: #f86f2d;
}
.accordion-button::after {
    filter: none;
}
.accordion-button:not(.collapsed)::after {
    filter: invert(55%) sepia(80%) saturate(500%) hue-rotate(340deg);
}
.accordion-button:focus {
    box-shadow: none;
}
</style>
@endpush
