@extends('main')

@section('title') Latest News & Events @endsection

@section('content')

{{-- ===== Hero / Page Banner ===== --}}
<div class="hero-wrap" style="background-image: url('{{ (isset($application->news_banner) && $application->news_banner) ? asset('images/application/'.$application->news_banner) : asset('static_image/news_event_blk.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 340px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.60);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size: 0.9rem;">
                    <a href="{{ url('/') }}" style="color: #ffaa6e; text-decoration: none;">Home</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">Latest News & Events</span>
                </p>
                <h1 class="mb-0" style="color: #ffffff; font-weight: 400; font-size: 2.8rem; letter-spacing: 1px;">Latest News & Events</h1>
                <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

{{-- ===== News & Events Listing ===== --}}
<style>
    .ne-blog-entry {
        border: 1px solid #f0f0f0;
        background: #fff;
        overflow: hidden;
        border-radius: 6px;
        box-shadow: 0px 5px 30px -10px rgba(0,0,0,0.13);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .ne-blog-entry:hover {
        transform: translateY(-6px);
        box-shadow: 0px 12px 40px -10px rgba(0,0,0,0.20);
    }
    .ne-block-img {
        overflow: hidden;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        display: block;
        width: 100%;
        height: 220px;
        position: relative;
    }
    .ne-cat-badge {
        position: absolute;
        top: 14px;
        left: 14px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 5px 12px;
        border-radius: 3px;
        z-index: 1;
    }
    .ne-blog-text {
        padding: 22px 20px 18px;
        flex: 1;
        display: flex;
        flex-direction: column;
        margin-top: -22px;
        background: #fff;
        border-radius: 4px 4px 0 0;
        position: relative;
        z-index: 1;
        width: 90%;
        margin-left: auto;
        margin-right: auto;
    }
    .ne-blog-meta {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 10px;
        flex-wrap: wrap;
    }
    .ne-blog-meta span {
        font-size: 13px;
        color: #96a1af;
    }
    .ne-blog-meta span i {
        color: #f86f2d;
        margin-right: 4px;
    }
    .ne-heading {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 10px;
        line-height: 1.45;
        flex-shrink: 0;
    }
    .ne-heading a {
        color: #1a1a2e;
        text-decoration: none;
        transition: color 0.2s;
    }
    .ne-heading a:hover { color: #f86f2d; }
    .ne-excerpt {
        font-size: 14px;
        color: #6c757d;
        line-height: 1.65;
        flex: 1;
        margin-bottom: 14px;
    }
    .ne-read-more {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        color: #f86f2d;
        text-decoration: none;
        letter-spacing: 0.5px;
        transition: gap 0.2s;
    }
    .ne-read-more:hover { color: #d9541a; gap: 10px; }
    .ne-time-loc {
        font-size: 13px;
        color: #96a1af;
        margin-bottom: 10px;
    }
    .ne-time-loc span { margin-right: 12px; }
    .ne-time-loc span i { color: #f86f2d; margin-right: 4px; }
</style>

<section class="py-5 bg-light">
    <div class="container">

        {{-- Filter tabs --}}
        <div class="d-flex justify-content-center gap-3 mb-5 flex-wrap">
            <a href="{{ route('latest.news.all') }}"
               class="btn btn-sm px-4 py-2 fw-semibold {{ !request('category') ? 'text-white' : 'btn-outline-secondary' }}"
               style="{{ !request('category') ? 'background:#f86f2d;border-color:#f86f2d;' : '' }}">
                All
            </a>
            <a href="{{ route('latest.news.all', ['category' => 'news']) }}"
               class="btn btn-sm px-4 py-2 fw-semibold {{ request('category') == 'news' ? 'btn-primary' : 'btn-outline-primary' }}">
                <i class="fas fa-newspaper me-1"></i> News
            </a>
            <a href="{{ route('latest.news.all', ['category' => 'event']) }}"
               class="btn btn-sm px-4 py-2 fw-semibold {{ request('category') == 'event' ? 'text-dark' : 'btn-outline-warning' }}"
               style="{{ request('category') == 'event' ? 'background:#ffc107;border-color:#ffc107;' : '' }}">
                <i class="fas fa-calendar-check me-1"></i> Events
            </a>
        </div>

        <div class="row">
            @forelse ($news as $data)
                @php $isEvent = ($data->category ?? 'news') === 'event'; @endphp
                <div class="col-md-4 d-flex mb-4">
                    <div class="ne-blog-entry w-100">
                        <a href="{{ route('latest.news.view', $data->id) }}"
                           class="ne-block-img"
                           style="background-image: url('{{ asset('images/news/'.$data->image) }}');">
                            <span class="ne-cat-badge {{ $isEvent ? 'bg-warning text-dark' : 'bg-primary text-white' }}">
                                <i class="fas {{ $isEvent ? 'fa-calendar-check' : 'fa-newspaper' }} me-1"></i>
                                {{ $isEvent ? 'Event' : 'News' }}
                            </span>
                        </a>
                        <div class="ne-blog-text">
                            <div class="ne-blog-meta">
                                <span><i class="fas fa-calendar-alt"></i>{{ $data->start_date ? date("d M, Y", strtotime($data->start_date)) : date("d M, Y") }}
                                @if($data->end_date && $data->end_date != $data->start_date) - {{ date("d M, Y", strtotime($data->end_date)) }} @endif</span>
                                <span><i class="fas fa-user"></i> CDDF</span>
                            </div>
                            <h3 class="ne-heading">
                                <a href="{{ route('latest.news.view', $data->id) }}">
                                    {{ Str::limit($data->title, 65, '...') }}
                                </a>
                            </h3>
                            @if ($isEvent)
                                <p class="ne-time-loc">
                                    @if($data->start_time)
                                        <span><i class="fas fa-clock"></i> {{ date("h:i A", strtotime($data->start_time)) }}
                                        @if($data->end_time) - {{ date("h:i A", strtotime($data->end_time)) }} @endif</span>
                                    @endif
                                    @if($data->location)
                                        <span><i class="fas fa-map-marker-alt"></i> {{ $data->location }}</span>
                                    @endif
                                </p>
                            @endif
                            <p class="ne-excerpt">
                                {!! Str::limit(strip_tags($data->description), 110, '...') !!}
                            </p>
                            <a href="{{ route('latest.news.view', $data->id) }}" class="ne-read-more">
                                @if($isEvent)
                                    @php
                                        $eventEndDate = $data->end_date ?: $data->start_date;
                                        $isPastEvent = $eventEndDate ? (strtotime($eventEndDate) < strtotime('today')) : false;
                                    @endphp
                                    {{ $isPastEvent ? 'View Details' : 'Join Event' }}
                                @else
                                    Read More
                                @endif
                                <i class="fas fa-arrow-right" style="font-size:11px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="fas fa-newspaper fa-2x mb-3 d-block" style="color:#ddd;"></i>
                    No news or events available at the moment.
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($news->hasPages())
            <div class="d-flex flex-column align-items-center mt-4 gap-2">
                <p class="text-muted mb-1" style="font-size:13px;">
                    Showing <strong>{{ $news->firstItem() }}</strong> – <strong>{{ $news->lastItem() }}</strong>
                    of <strong>{{ $news->total() }}</strong> results
                    @if(request('category'))&nbsp;&middot;&nbsp;<span class="text-capitalize">{{ request('category') }}</span> only @endif
                </p>
                {{ $news->appends(request()->query())->links() }}
            </div>
        @endif

    </div>
</section>
{{-- ===== End News & Events Listing ===== --}}

@endsection
