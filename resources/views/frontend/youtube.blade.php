@extends('main')

@push('css')
<style>
    .video-card {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform .25s ease, box-shadow .25s ease;
        background: #000;
    }
    .video-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    .video-card img {
        width: 100%;
        aspect-ratio: 16/9;
        object-fit: cover;
        display: block;
        opacity: .85;
        transition: opacity .25s ease;
    }
    .video-card:hover img {
        opacity: .65;
    }
    .video-card .play-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60px;
        height: 60px;
        background: rgba(248, 111, 45, 0.92);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform .25s ease, background .25s ease;
    }
    .video-card:hover .play-btn {
        transform: translate(-50%, -50%) scale(1.15);
        background: #f86f2d;
    }
    .video-card .play-btn i {
        color: #fff;
        font-size: 22px;
        margin-left: 4px;
    }
    .video-card .yt-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(0,0,0,0.7);
        color: #fff;
        font-size: 11px;
        padding: 3px 8px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    #videoModal .modal-content {
        background: #000;
        border: none;
        border-radius: 12px;
    }
    #videoModal .modal-header {
        border: none;
        padding: .75rem 1rem;
    }
    #videoModal .btn-close {
        filter: invert(1);
    }
    #videoModal .ratio {
        border-radius: 0 0 12px 12px;
        overflow: hidden;
    }
</style>
@endpush

@section('content')

{{-- Breadcrumbs --}}
<div class="hero-wrap" style="background-image: url('{{ (isset($application->youtube_banner) && $application->youtube_banner) ? asset('images/application/'.$application->youtube_banner) : asset('static_image/news_event_blk.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 340px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.60);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size: 0.9rem;">
                    <a href="{{ url('/') }}" style="color: #ffaa6e; text-decoration: none;">Home</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">Media & Publication</span>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">YouTube Videos</span>
                </p>
                <h1 class="mb-0" style="color: #ffffff; font-weight: 400; font-size: 2.8rem; letter-spacing: 1px;">
                    YouTube Videos
                </h1>
                <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
            </div>
        </div>
    </div>
</div>

{{-- Video Grid --}}
<section class="bg-light py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <p class="mb-1" style="color: #f86f2d; font-weight: 600; letter-spacing: 1px; font-size: 0.9rem; text-transform: uppercase;">Watch & Learn</p>
            <h2 style="font-weight: 700; color: #1a1a1a; font-size: 2rem;">Our Videos</h2>
            <div class="mx-auto mt-2" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
        </div>

        <div class="row g-4">
            @forelse($videos as $video)
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="video-card" data-bs-toggle="modal" data-bs-target="#videoModal"
                     data-video-id="{{ $video->video_id }}" data-video-title="{{ $video->title }}">
                    <img src="{{ $video->thumbnail }}"
                         alt="{{ $video->title }}" loading="lazy">
                    <div class="play-btn">
                        <i class="fa-solid fa-play"></i>
                    </div>
                    <span class="yt-badge">
                        <i class="fa-brands fa-youtube" style="color:#ff0000;"></i> YouTube
                    </span>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted py-5">
                <i class="fa-brands fa-youtube fa-3x mb-3" style="color:#ccc;"></i>
                <p>No videos available yet.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- Video Modal --}}
<div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-white" id="videoModalTitle"></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="ratio ratio-16x9">
                <iframe id="videoModalIframe" src="" title="YouTube video"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    const videoModal = document.getElementById('videoModal');
    videoModal.addEventListener('show.bs.modal', function (e) {
        const card = e.relatedTarget;
        const videoId = card.getAttribute('data-video-id');
        const title   = card.getAttribute('data-video-title');
        document.getElementById('videoModalTitle').textContent = title;
        document.getElementById('videoModalIframe').src =
            'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
    });
    videoModal.addEventListener('hide.bs.modal', function () {
        document.getElementById('videoModalIframe').src = '';
    });
</script>
@endpush

@endsection
