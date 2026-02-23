@extends('main')

@section('title') Origin and Legal Affiliation - CDDF @endsection

@push('css')
<style>
/* ── Publication Cards ─────────────────────────────────────── */
.pub-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: transform .3s ease, box-shadow .3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}
.pub-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 34px rgba(0,0,0,0.14);
}
.pub-card__img {
    height: 220px;
    overflow: hidden;
    background: #f5f0ec;
    display: flex;
    align-items: center;
    justify-content: center;
}
.pub-card__img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .4s ease;
}
.pub-card:hover .pub-card__img img { transform: scale(1.06); }
.pub-card__body {
    padding: 18px 20px 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.pub-card__title {
    font-size: 0.97rem;
    font-weight: 600;
    color: #1a1a1a;
    line-height: 1.55;
    flex: 1;
    margin-bottom: 14px;
}
.pub-card__actions { display: flex; gap: 10px; }
.btn-download-pub {
    flex: 1;
    background: transparent;
    color: #f86f2d;
    border: 2px solid #f86f2d;
    border-radius: 6px;
    padding: 9px 12px;
    font-size: .85rem;
    font-weight: 600;
    text-decoration: none;
    transition: all .2s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}
.btn-download-pub:hover { background: #f86f2d; color: #fff; }
.btn-download-pub.disabled-pdf {
    opacity: .4;
    cursor: not-allowed;
    pointer-events: none;
}
</style>
@endpush

@section('content')

{{-- ===== Hero Banner ===== --}}
<div class="hero-wrap" style="background-image: url('{{ asset('static_image/news_event_blk.jpg') }}');
     background-size: cover; background-position: center; background-attachment: fixed;
     min-height: 340px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position:absolute;inset:0;background:rgba(0,0,0,.62);"></div>
    <div class="container" style="position:relative;z-index:1;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size:.9rem;">
                    <a href="{{ url('/') }}" style="color:#ffaa6e;text-decoration:none;">Home</a>
                    <span class="mx-2" style="color:#ccc;">/</span>
                    <span style="color:#fff;">About Us</span>
                    <span class="mx-2" style="color:#ccc;">/</span>
                    <span style="color:#fff;">Origin and Affiliation</span>
                </p>
                <h1 class="mb-0" style="color:#fff;font-weight:400;font-size:2.8rem;letter-spacing:1px;">Origin and Legal Affiliation</h1>
                <div class="mx-auto mt-3" style="width:60px;height:4px;background:#f86f2d;border-radius:2px;"></div>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

{{-- ===== Content Section ===== --}}
<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">
            <p style="color:#f86f2d;font-weight:600;letter-spacing:1px;font-size:.85rem;text-transform:uppercase;margin-bottom:6px;">
                CDDF Structure
            </p>
            <h2 style="font-weight:700;color:#1a1a1a;font-size:1.9rem;">Origin and Legal Affiliation</h2>
            <div class="mx-auto mt-2" style="width:50px;height:4px;background:#f86f2d;border-radius:2px;"></div>
        </div>

        @if(isset($affilation) && count($affilation) > 0)
        <div class="row g-4 justify-content-center">
            @foreach($affilation as $item)
            <div class="col-lg-4 col-md-6"
                 data-aos="fade-up"
                 data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                <div class="pub-card">

                    {{-- Thumbnail --}}
                    <div class="pub-card__img">
                        @php
                            $thumbRelPath = 'images/legal_affilation/thumbnails/'.$item->thumbnail;
                            $thumbAbsPath = public_path($thumbRelPath);
                            // Ensure thumbnail is set, file exists, and path is valid
                            $hasThumb = !empty($item->thumbnail) && file_exists($thumbAbsPath);
                        @endphp

                        @if($hasThumb)
                            <img src="{{ asset($thumbRelPath) }}" alt="{{ $item->title }}">
                        @elseif($item->pdf_file)
                            <canvas class="pdf-thumb-canvas"
                                    data-pdf-url="{{ asset('images/legal_affilation/pdfs/'.$item->pdf_file) }}"
                                    style="width:100%;height:100%;object-fit:cover;display:block;"></canvas>
                        @else
                            <i class="fa-solid fa-file-pdf fa-4x" style="color:#f86f2d;opacity:.3;"></i>
                        @endif
                    </div>

                    {{-- Body --}}
                    <div class="pub-card__body">
                        <p class="pub-card__title">{{ $item->title }}</p>
                        <div class="pub-card__actions">
                            {{-- Download button --}}
                            @if($item->pdf_file)
                                <a class="btn-download-pub"
                                   href="{{ asset('images/legal_affilation/pdfs/'.$item->pdf_file) }}"
                                   download="{{ $item->title }}.pdf">
                                    <i class="fa-solid fa-download"></i> Download
                                </a>
                            @else
                                <span class="btn-download-pub disabled-pdf">
                                    <i class="fa-solid fa-ban"></i> No PDF
                                </span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

        @else
        <div class="text-center py-5" data-aos="fade-up">
            <i class="fa-solid fa-file-contract fa-4x mb-3" style="color:#f86f2d;opacity:.25;"></i>
            <h5 style="color:#888;">No affiliation documents available at the moment.</h5>
            <p class="text-muted">Please check back later.</p>
        </div>
        @endif

    </div>
</section>
{{-- ===== End Content Section ===== --}}

@endsection

@push('js')
{{-- PDF.js (for thumbnail fallback) --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
(function () {
    /* Create a separate closure for PDF.js library to avoid conflicts */
    const pdfjsLib = window['pdfjs-dist/build/pdf'];
    if (!pdfjsLib) return;
    pdfjsLib.GlobalWorkerOptions.workerSrc =
        'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

    /* ── Render Thumbnails (Card View) ───────────────────── */
    document.querySelectorAll('.pdf-thumb-canvas').forEach(async function (canvas) {
        const url = canvas.dataset.pdfUrl;
        if (!url) return;
        try {
            const loadingTask = pdfjsLib.getDocument(url);
            const pdf = await loadingTask.promise;
            const page = await pdf.getPage(1);
            const container = canvas.parentElement;
            const W = container.clientWidth  || 320;
            const H = container.clientHeight || 220;
            const vp0 = page.getViewport({ scale: 1 });
            const scale = Math.max(W / vp0.width, H / vp0.height);
            const vp = page.getViewport({ scale });
            canvas.width  = vp.width;
            canvas.height = vp.height;
            await page.render({ canvasContext: canvas.getContext('2d'), viewport: vp }).promise;
        } catch (e) {
            /* PDF failed to load — show icon fallback */
            canvas.insertAdjacentHTML('afterend',
                '<i class="fa-solid fa-file-pdf fa-4x" style="color:#f86f2d;opacity:.3;"></i>');
            canvas.remove();
        }
    });

}());
</script>
@endpush
