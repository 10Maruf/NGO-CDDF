@extends('main')

@section('title') Management Level – CDDF @endsection

@section('content')

{{-- ===== Hero Banner ===== --}}
<div class="hero-wrap" style="background-image: url('{{ (isset($application->management_banner) && $application->management_banner) ? asset('images/application/'.$application->management_banner) : asset('static_image/about_us_bg.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 340px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.60);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size: 0.9rem;">
                    <a href="{{ url('/') }}" style="color: #ffaa6e; text-decoration: none;">Home</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">Our Team</span>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">Management Level</span>
                </p>
                <h1 class="mb-0" style="color: #fff; font-weight: 400; font-size: 2.8rem; letter-spacing: 1px;">Management Level</h1>
                <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
                <p class="mt-3 mb-0" style="color: #ddd; font-size: 0.97rem; max-width: 540px; margin: 0 auto;">
                    The management team of CDDF led by the Executive Director and comprising Senior Management, Mid-Level, Field &amp; Support Staff.
                </p>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

{{-- ===== Nav Tabs ===== --}}
<div id="mgmt-tab-bar" style="background: #fff; border-bottom: 2px solid #fde8d8; position: sticky; top: 0; z-index: 1020; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
    <div class="container">
        <div class="d-flex gap-0 justify-content-center flex-wrap">
            <a href="#section-ed" class="gov-tab-link" onclick="scrollToSection('section-ed', this)">
                <span class="gov-tab-count">{{ count($ed) }}</span>
                Executive Director
            </a>
            <a href="#section-smt" class="gov-tab-link" onclick="scrollToSection('section-smt', this)">
                <span class="gov-tab-count">{{ count($smt) }}</span>
                SMT
            </a>
            <a href="#section-mid" class="gov-tab-link" onclick="scrollToSection('section-mid', this)">
                <span class="gov-tab-count">{{ count($mid) }}</span>
                Mid-Level
            </a>
            <a href="#section-field" class="gov-tab-link" onclick="scrollToSection('section-field', this)">
                <span class="gov-tab-count">{{ count($field) }}</span>
                Field Staff
            </a>
            <a href="#section-support" class="gov-tab-link" onclick="scrollToSection('section-support', this)">
                <span class="gov-tab-count">{{ count($support) }}</span>
                Support Staff
            </a>
        </div>
    </div>
</div>
{{-- ===== End Nav Tabs ===== --}}

{{-- ===== Sections ===== --}}
<div style="background: #fdf6f0;">

    {{-- ======== 1. EXECUTIVE DIRECTOR ======== --}}
    <section id="section-ed" class="ed-featured-section">
        <div class="container">
            @forelse($ed as $member)
            @php
                $edPhoto = $member->photo
                    ? asset('images/org_members/' . $member->photo)
                    : asset('img/testimonial.jpg');
            @endphp

            <div class="ed-layout">

                {{-- LEFT: Photo card --}}
                <div class="ed-left">
                    <div class="ed-img-card">
                        <div class="ed-quote-badge"><i class="fa-solid fa-quote-right"></i></div>
                        <img src="{{ $edPhoto }}"
                             onerror="this.src='{{ asset('img/testimonial.jpg') }}'"
                             alt="{{ $member->name }}"
                             class="ed-img">
                        <div class="ed-img-overlay"></div>
                        <div class="ed-img-nameplate">
                            <div class="ed-img-name">{{ $member->name }}</div>
                            <div class="ed-img-desg">{{ $member->designation }}, CDDF</div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT: Content --}}
                <div class="ed-right">
                    <p class="ed-eyebrow">MESSAGE FROM THE EXECUTIVE DIRECTOR</p>
                    <h2 class="ed-headline">A word from our leadership</h2>

                    @if($member->message)
                    <blockquote class="ed-blockquote">
                        {{ $member->message }}
                    </blockquote>
                    @endif

                    @if($member->bio)
                    <p class="ed-bio-text">{{ $member->bio }}</p>
                    @endif

                    {{-- Meta row --}}
                    <div class="ed-meta-strip">
                        @if($member->experience_years)
                        <span><i class="fa-solid fa-briefcase"></i> {{ $member->experience_years }} yrs experience</span>
                        @endif
                        @if($member->education)
                        <span><i class="fa-solid fa-graduation-cap"></i> {{ $member->education }}</span>
                        @endif
                        @if($member->joining_date)
                        <span><i class="fa-solid fa-calendar-days"></i> Since {{ \Carbon\Carbon::parse($member->joining_date)->format('M Y') }}</span>
                        @endif
                    </div>

                    {{-- Contact + Social --}}
                    <div class="ed-footer-strip">
                        @if($member->email)
                        <a href="mailto:{{ $member->email }}" class="ed-footer-link"><i class="fa-solid fa-envelope"></i> {{ $member->email }}</a>
                        @endif
                        @if($member->contact_number)
                        <a href="tel:{{ $member->contact_number }}" class="ed-footer-link"><i class="fa-solid fa-phone"></i> {{ $member->contact_number }}</a>
                        @endif
                        @if($member->facebook || $member->twitter || $member->instagram || $member->linkedin || $member->youtube)
                        <div class="ed-socials">
                            @if($member->facebook)
                            <a href="{{ $member->facebook }}" target="_blank" class="ed-soc"><i class="fa-brands fa-facebook-f"></i></a>
                            @endif
                            @if($member->twitter)
                            <a href="{{ $member->twitter }}" target="_blank" class="ed-soc"><i class="fa-brands fa-twitter"></i></a>
                            @endif
                            @if($member->instagram)
                            <a href="{{ $member->instagram }}" target="_blank" class="ed-soc"><i class="fa-brands fa-instagram"></i></a>
                            @endif
                            @if($member->linkedin)
                            <a href="{{ $member->linkedin }}" target="_blank" class="ed-soc"><i class="fa-brands fa-linkedin-in"></i></a>
                            @endif
                            @if($member->youtube)
                            <a href="{{ $member->youtube }}" target="_blank" class="ed-soc"><i class="fa-brands fa-youtube"></i></a>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>

            </div>

            @empty
            <div class="col-12 text-center text-muted py-5">No Executive Director found.</div>
            @endforelse
        </div>
    </section>

    {{-- ======== 2. SENIOR MANAGEMENT TEAM (SMT) ======== --}}
    <section id="section-smt" class="gov-section">
        <div class="container">
            <div class="gov-section-header">
                <h2 class="gov-section-title">Senior Management Team</h2>
                <span class="gov-count-pill">{{ count($smt) }} Members</span>
                <p class="gov-section-desc">The Senior Management Team (SMT) supports the Executive Director in strategic planning, program oversight, finance, HR, communication, and resource mobilization.</p>
                <div class="gov-section-divider"></div>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($smt as $member)
                <div class="col-6 col-md-4 col-lg-3 gov-card-item">
                    @include('frontend.partials.gov_member_card', ['member' => $member, 'borderColor' => '#2a9d8f', 'badgeBg' => '#e6f7f5', 'badgeColor' => '#2a9d8f'])
                </div>
                @empty
                <div class="col-12 text-center text-muted py-5">No SMT members found.</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ======== 3. MID-LEVEL MANAGEMENT ======== --}}
    <section id="section-mid" class="gov-section" style="background: #fff;">
        <div class="container">
            <div class="gov-section-header">
                <h2 class="gov-section-title">Mid-Level Management</h2>
                <span class="gov-count-pill">{{ count($mid) }} Members</span>
                <p class="gov-section-desc">Mid-level managers bridge strategic direction and field implementation, overseeing regional and district-level operations, finance, admin, training, and research activities.</p>
                <div class="gov-section-divider"></div>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($mid as $member)
                <div class="col-6 col-md-4 col-lg-3 gov-card-item">
                    @include('frontend.partials.gov_member_card', ['member' => $member, 'borderColor' => '#457b9d', 'badgeBg' => '#e8f1f8', 'badgeColor' => '#457b9d'])
                </div>
                @empty
                <div class="col-12 text-center text-muted py-5">No mid-level management members found.</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ======== 4. FIELD & FRONTLINE STAFF ======== --}}
    <section id="section-field" class="gov-section">
        <div class="container">
            <div class="gov-section-header">
                <h2 class="gov-section-title">Field &amp; Frontline Staff</h2>
                <span class="gov-count-pill">{{ count($field) }} Members</span>
                <p class="gov-section-desc">Field and frontline staff are the backbone of CDDF's community outreach, including Field Officers, Facilitators, Community Mobilizers, Volunteers, and Teachers.</p>
                <div class="gov-section-divider"></div>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($field as $member)
                <div class="col-6 col-md-4 col-lg-3 gov-card-item">
                    @include('frontend.partials.gov_member_card', ['member' => $member, 'borderColor' => '#6d6875', 'badgeBg' => '#f0eef2', 'badgeColor' => '#6d6875'])
                </div>
                @empty
                <div class="col-12 text-center text-muted py-5">No field staff members found.</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ======== 5. SUPPORT STAFF ======== --}}
    <section id="section-support" class="gov-section" style="background: #fff;">
        <div class="container">
            <div class="gov-section-header">
                <h2 class="gov-section-title">Support Staff</h2>
                <span class="gov-count-pill">{{ count($support) }} Members</span>
                <p class="gov-section-desc">Support staff ensure the smooth day-to-day operation of CDDF, including Office Assistants, Guards, Drivers, Cooks, and other administrative personnel.</p>
                <div class="gov-section-divider"></div>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($support as $member)
                <div class="col-6 col-md-4 col-lg-3 gov-card-item">
                    @include('frontend.partials.gov_member_card', ['member' => $member, 'borderColor' => '#adb5bd', 'badgeBg' => '#f8f9fa', 'badgeColor' => '#6c757d'])
                </div>
                @empty
                <div class="col-12 text-center text-muted py-5">No support staff members found.</div>
                @endforelse
            </div>
        </div>
    </section>

</div>
{{-- ===== End Sections ===== --}}

{{-- ===== Styles ===== --}}
<style>
/* Nav tabs */
.gov-tab-link {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 14px 22px;
    font-size: 0.88rem;
    font-weight: 600;
    color: #555;
    text-decoration: none;
    border-bottom: 3px solid transparent;
    transition: all 0.2s;
    white-space: nowrap;
}
.gov-tab-link:hover, .gov-tab-link.active {
    color: #f86f2d;
    border-bottom-color: #f86f2d;
    text-decoration: none;
}
.gov-tab-count {
    background: #f86f2d;
    color: #fff;
    border-radius: 50px;
    font-size: 0.72rem;
    font-weight: 700;
    padding: 1px 8px;
    line-height: 1.6;
}

/* Section */
.gov-section {
    padding: 64px 0;
}
.gov-section-header {
    text-align: center;
    margin-bottom: 44px;
}
.gov-section-title {
    font-size: 2rem;
    font-weight: 800;
    color: #f86f2d;
    margin-bottom: 10px;
    letter-spacing: 0.5px;
}
.gov-count-pill {
    display: inline-block;
    font-size: 0.78rem;
    font-weight: 700;
    padding: 4px 16px;
    border-radius: 50px;
    background: #1a1a1a;
    color: #fff;
    margin-bottom: 14px;
}
.gov-section-desc {
    color: #444;
    font-size: 0.95rem;
    margin: 10px auto 0;
    line-height: 1.7;
    max-width: 600px;
}
.gov-section-divider {
    width: 60px;
    height: 4px;
    background: linear-gradient(to right, #f86f2d, #fa8f3d);
    border-radius: 2px;
    margin: 16px auto 0;
}

/* Card scroll animation */
.gov-card-item {
    opacity: 0;
    transform: translateY(36px);
    transition: opacity 0.5s ease, transform 0.5s ease;
    height: 450px;
}
.gov-card-item.card-visible {
    opacity: 1;
    transform: translateY(0);
}
.gov-card-item.card-hidden {
    opacity: 0;
    transform: translateY(36px);
}

/* ===== EXECUTIVE DIRECTOR FEATURED SECTION ===== */
.ed-featured-section {
    padding: 72px 0 64px;
    background: #faf8f5;
    border-bottom: 2px solid #f0e8df;
}
.ed-layout {
    display: flex;
    gap: 64px;
    align-items: center;
    max-width: 1040px;
    margin: 0 auto;
}

/* LEFT */
.ed-left { flex: 0 0 360px; }
.ed-img-card {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 12px 40px rgba(0,0,0,0.16);
    aspect-ratio: 3 / 4;
    max-height: 480px;
}
.ed-quote-badge {
    position: absolute;
    top: 16px;
    left: 16px;
    z-index: 3;
    width: 48px;
    height: 48px;
    background: #f86f2d;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    color: #fff;
    box-shadow: 0 4px 12px rgba(248,111,45,0.35);
}
.ed-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    display: block;
}
.ed-img-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, transparent 50%, rgba(10,8,30,0.80) 100%);
}
.ed-img-nameplate {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    padding: 18px 20px;
    z-index: 2;
}
.ed-img-name {
    color: #fff;
    font-size: 1.05rem;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 2px;
}
.ed-img-desg {
    color: rgba(255,255,255,0.72);
    font-size: 0.78rem;
    font-weight: 500;
}

/* RIGHT */
.ed-right { flex: 1; min-width: 0; }
.ed-eyebrow {
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 1.4px;
    text-transform: uppercase;
    color: #f86f2d;
    margin-bottom: 10px;
}
.ed-headline {
    font-size: 2.1rem;
    font-weight: 800;
    color: #1a1a2e;
    line-height: 1.25;
    margin-bottom: 22px;
}
.ed-blockquote {
    border-left: 4px solid #f86f2d;
    padding: 4px 0 4px 20px;
    margin: 0 0 20px 0;
    font-size: 1.01rem;
    font-style: italic;
    color: #2c3e50;
    line-height: 1.82;
    background: none;
}
.ed-bio-text {
    font-size: 0.93rem;
    color: #555;
    line-height: 1.78;
    margin-bottom: 20px;
}
.ed-meta-strip {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 24px;
}
.ed-meta-strip span {
    font-size: 0.76rem;
    color: #666;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}
.ed-meta-strip i { color: #f86f2d; }
.ed-footer-strip {
    display: flex;
    flex-direction: column;
    gap: 8px;
    padding-top: 18px;
    border-top: 1px solid #ece6e0;
}
.ed-footer-link {
    font-size: 0.78rem;
    color: #444;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: color 0.15s;
}
.ed-footer-link i { color: #f86f2d; font-size: 0.8rem; }
.ed-footer-link:hover { color: #f86f2d; }
.ed-socials {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}
.ed-soc {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: #f0ebe5;
    color: #555;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.88rem;
    text-decoration: none;
    border: 1px solid #e0d8d0;
    transition: background 0.18s, color 0.18s;
}
.ed-soc:hover { background: #f86f2d; color: #fff; border-color: #f86f2d; }

/* Responsive */
@media (max-width: 900px) {
    .ed-layout { gap: 36px; }
    .ed-left { flex: 0 0 280px; }
    .ed-headline { font-size: 1.6rem; }
}
@media (max-width: 767px) {
    .ed-layout { flex-direction: column; gap: 28px; }
    .ed-left { flex: unset; width: 100%; max-width: 340px; margin: 0 auto; }
    .ed-img-card { max-height: 380px; }
    .ed-headline { font-size: 1.5rem; }
}

/* (kept for other cards) */
.gov-ed-card {
    height: 470px;
}

/* placeholder --- OLD ed-meta-badge removed --- keep font-size anchor */
.ed-meta-badge-unused {
    font-size: 0.76rem;
}
</style>

{{-- ===== Script ===== --}}
<script>
function scrollToSection(id, el) {
    event.preventDefault();
    var target = document.getElementById(id);
    if (target) {
        var navbar = document.getElementById('ftco-navbar');
        var tabBar = document.getElementById('mgmt-tab-bar');
        var navH   = (navbar && navbar.classList.contains('scrolled')) ? navbar.offsetHeight : 0;
        var tabH   = tabBar ? tabBar.offsetHeight : 56;
        var offset = navH + tabH + 8;
        var top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top: top, behavior: 'smooth' });
    }
    document.querySelectorAll('.gov-tab-link').forEach(function(a) { a.classList.remove('active'); });
    if (el) el.classList.add('active');
}

// Highlight tab on scroll
window.addEventListener('scroll', function () {
    var navbar = document.getElementById('ftco-navbar');
    var tabBar = document.getElementById('mgmt-tab-bar');
    var navH = (navbar && navbar.classList.contains('scrolled')) ? navbar.offsetHeight : 0;
    var tabH = tabBar ? tabBar.offsetHeight : 56;
    var offset = navH + tabH + 8;
    var sections = ['section-ed', 'section-smt', 'section-mid', 'section-field', 'section-support'];
    sections.forEach(function(id, i) {
        var el = document.getElementById(id);
        if (!el) return;
        var rect = el.getBoundingClientRect();
        if (rect.top <= offset && rect.bottom > offset) {
            document.querySelectorAll('.gov-tab-link').forEach(function(a) { a.classList.remove('active'); });
            var tabs = document.querySelectorAll('.gov-tab-link');
            if (tabs[i]) tabs[i].classList.add('active');
        }
    });
});

// Card scroll animation via IntersectionObserver
(function () {
    var cards = document.querySelectorAll('.gov-card-item');
    if (!cards.length) return;
    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                setTimeout(function () {
                    entry.target.classList.add('card-visible');
                    entry.target.classList.remove('card-hidden');
                }, (entry.target.dataset.delay || 0));
            } else {
                entry.target.classList.remove('card-visible');
                entry.target.classList.add('card-hidden');
            }
        });
    }, { threshold: 0.12 });
    cards.forEach(function (card, i) {
        card.dataset.delay = (i % 4) * 80;
        io.observe(card);
    });
})();

// Keep tab bar just below the fixed navbar
(function () {
    var tabBar = document.getElementById('mgmt-tab-bar');
    var navbar = document.getElementById('ftco-navbar');
    function syncTop() {
        if (!tabBar || !navbar) return;
        var navH = navbar.classList.contains('scrolled') ? navbar.offsetHeight : 0;
        tabBar.style.top = navH + 'px';
    }
    window.addEventListener('scroll', syncTop);
    window.addEventListener('resize', syncTop);
    syncTop();
})();
</script>

@endsection
