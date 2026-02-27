@extends('main')

@section('content')

<style>
    /* Tabs Styles */
    .project-tabs {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 40px;
    }
    .project-tab {
        padding: 10px 25px;
        border-radius: 30px;
        background-color: #f8f9fa;
        color: #333;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    .project-tab:hover {
        background-color: #e9ecef;
        color: #f86f2d;
    }
    .project-tab.active {
        background-color: #f86f2d;
        color: white;
        border-color: #f86f2d;
    }

    /* Card Styles (Reused from Home Page) */
    .fp-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
        border: 2px solid #f86f2d;
    }
    .fp-card::before {
        content: '';
        position: absolute;
        top: 6px;
        left: 6px;
        right: 6px;
        bottom: 6px;
        border: 2px dashed #f86f2d;
        border-radius: 8px;
        pointer-events: none;
        z-index: 1;
    }
    .fp-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(248, 111, 45, 0.2);
    }
    .fp-img-wrapper {
        position: relative;
        height: 220px;
        overflow: hidden;
        z-index: 2;
        margin: 12px 12px 0 12px;
        border-radius: 6px;
    }
    .fp-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .fp-card:hover .fp-img-wrapper img {
        transform: scale(1.05);
    }
    .fp-status-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        color: #fff;
        z-index: 3;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    .status-ongoing { background-color: #28a745; }
    .status-completed { background-color: #6c757d; }

    /* Focus Area Tags on Image */
    .fp-focus-tags {
        position: absolute;
        bottom: 10px;
        left: 10px;
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        z-index: 4;
    }
    .fp-focus-tag {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 3px 9px;
        border-radius: 20px;
        font-size: 0.72rem;
        font-weight: 600;
        color: #fff;
        background: rgba(248, 111, 45, 0.88);
        backdrop-filter: blur(4px);
        border: 1px solid rgba(255,255,255,0.3);
        box-shadow: 0 2px 6px rgba(0,0,0,0.25);
        white-space: nowrap;
        letter-spacing: 0.3px;
    }
    .fp-focus-tag i {
        font-size: 0.65rem;
        opacity: 0.9;
    }
    
    .fp-content {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        z-index: 2;
    }
    .fp-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 10px;
        line-height: 1.4;
    }
    .fp-desc {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 20px;
        flex-grow: 1;
    }
    .fp-meta {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
        font-size: 0.85rem;
        color: #777;
    }
    .fp-meta i {
        color: #f86f2d;
        margin-right: 5px;
    }
    .fp-btn {
        display: inline-block;
        padding: 8px 20px;
        background-color: #f86f2d;
        color: #fff;
        text-decoration: none;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: background-color 0.3s ease;
        align-self: flex-start;
        border: none;
    }
    .fp-btn:hover {
        background-color: #e05c1d;
        color: #fff;
    }

    /* Pagination Styles */
    .pagination {
        margin-top: 40px;
    }
    .page-item.active .page-link {
        background-color: #f86f2d;
        border-color: #f86f2d;
    }
    .page-link {
        color: #f86f2d;
    }
    .page-link:hover {
        color: #e05c1d;
    }
</style>

<!-- Hero Banner -->
<div class="hero-wrap" style="background-image: url('{{ (isset($application->projects_banner) && $application->projects_banner) ? asset('images/application/'.$application->projects_banner) : asset('static_image/projects_blk.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 340px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.60);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size: 0.9rem;">
                    <a href="{{ url('/') }}" style="color: #ffaa6e; text-decoration: none;">Home</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">Projects</span>
                </p>
                <h1 class="mb-0" style="color: #ffffff; font-weight: 400; font-size: 2.8rem; letter-spacing: 1px;">Our Projects</h1>
                <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Projects Section -->
<section class="py-5 bg-light">
    <div class="container">
        
        <!-- Tabs -->
        <div class="project-tabs">
            <a href="{{ route('ongoing.project', ['status' => 'all']) }}" class="project-tab {{ $status === 'all' ? 'active' : '' }}">All Projects</a>
            <a href="{{ route('ongoing.project', ['status' => 'ongoing']) }}" class="project-tab {{ $status === 'ongoing' ? 'active' : '' }}">Ongoing</a>
            <a href="{{ route('ongoing.project', ['status' => 'completed']) }}" class="project-tab {{ $status === 'completed' ? 'active' : '' }}">Completed</a>
        </div>

        <!-- Projects Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($project as $data)
                <div class="col">
                    <div class="fp-card">
                        <div class="fp-img-wrapper">
                            <img src="{{ $data->cover_image_url }}" alt="{{ $data->title }}" onerror="this.onerror=null; this.src='{{ asset('static_image/projects_blk.jpg') }}'">
                            <span class="fp-status-badge {{ $data->status === 'ongoing' ? 'status-ongoing' : 'status-completed' }}">
                                {{ ucfirst($data->status) }}
                            </span>
                            @if($data->focusAreas->isNotEmpty())
                                <div class="fp-focus-tags">
                                    @foreach($data->focusAreas as $fa)
                                        <span class="fp-focus-tag"><i class="fas fa-tag"></i> {{ $fa->title }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="fp-content">
                            <div class="fp-meta">
                                <span><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($data->start_date)->format('M Y') }}</span>
                            </div>
                            <h3 class="fp-title">{{ Str::limit($data->title, 50) }}</h3>
                            <p class="fp-desc">{{ Str::limit(strip_tags($data->short_description), 100) }}</p>
                            <a href="{{ route('ongoing.project.view', $data->id) }}" class="fp-btn">Read More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h4 class="text-muted">No projects found.</h4>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $project->appends(['status' => $status])->links('pagination::bootstrap-5') }}
        </div>

    </div>
</section>

@endsection
