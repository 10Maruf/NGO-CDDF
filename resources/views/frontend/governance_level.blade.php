@extends('main')

@section('title') Governance Level – CDDF @endsection

@section('content')

{{-- ===== Hero Banner ===== --}}
<div class="hero-wrap" style="background-image: url('{{ asset('static_image/about_us_bg.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 340px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.60);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size: 0.9rem;">
                    <a href="{{ url('/') }}" style="color: #ffaa6e; text-decoration: none;">Home</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">Our People</span>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">Governance Level</span>
                </p>
                <h1 class="mb-0" style="color: #fff; font-weight: 400; font-size: 2.8rem; letter-spacing: 1px;">Governance Level</h1>
                <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
                <p class="mt-3 mb-0" style="color: #ddd; font-size: 0.97rem; max-width: 520px; margin: 0 auto;">
                    The governing body of CDDF comprising the General Council, Executive Committee, and Advisory Council.
                </p>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

{{-- ===== Nav Tabs ===== --}}
<div id="gov-tab-bar" style="background: #fff; border-bottom: 2px solid #fde8d8; position: sticky; top: 0; z-index: 1020; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
    <div class="container">
        <div class="d-flex gap-0 justify-content-center">
            <a href="#section-gc" class="gov-tab-link" onclick="scrollToSection('section-gc', this)">
                <span class="gov-tab-count">{{ count($gc) }}</span>
                General Council
            </a>
            <a href="#section-ec" class="gov-tab-link" onclick="scrollToSection('section-ec', this)">
                <span class="gov-tab-count">{{ count($ec) }}</span>
                Executive Committee
            </a>
            <a href="#section-ac" class="gov-tab-link" onclick="scrollToSection('section-ac', this)">
                <span class="gov-tab-count">{{ count($ac) }}</span>
                Advisory Council
            </a>
        </div>
    </div>
</div>

{{-- ===== Sections ===== --}}
<div style="background: #fdf6f0;">

    {{-- ======== 1. GENERAL COUNCIL ======== --}}
    <section id="section-gc" class="gov-section">
        <div class="container">
            <div class="gov-section-header">
                <h2 class="gov-section-title">General Council</h2>
                <span class="gov-count-pill">{{ count($gc) }} Members</span>
                <p class="gov-section-desc">The supreme governing body of CDDF, comprising {{ count($gc) }} renowned women rights activists responsible for overall policy and direction.</p>
                <div class="gov-section-divider"></div>
            </div>

            <div class="row g-4">
                @forelse($gc as $member)
                <div class="col-6 col-md-4 col-lg-3 gov-card-item">
                    @include('frontend.partials.gov_member_card', ['member' => $member, 'borderColor' => '#f86f2d', 'badgeBg' => '#fff3ec', 'badgeColor' => '#f86f2d'])
                </div>
                @empty
                <div class="col-12 text-center text-muted py-5">No members found.</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ======== 2. EXECUTIVE COMMITTEE ======== --}}
    <section id="section-ec" class="gov-section" style="background: #fff;">
        <div class="container">
            <div class="gov-section-header">
                <h2 class="gov-section-title">Executive Committee</h2>
                <span class="gov-count-pill">{{ count($ec) }} Members</span>
                <p class="gov-section-desc">The {{ count($ec) }}-member Executive Committee oversees organizational management and is accountable to the General Council.</p>
                <div class="gov-section-divider"></div>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($ec as $member)
                <div class="col-6 col-md-4 col-lg-3 gov-card-item">
                    @include('frontend.partials.gov_member_card', ['member' => $member, 'borderColor' => '#f86f2d', 'badgeBg' => '#fff3ec', 'badgeColor' => '#f86f2d'])
                </div>
                @empty
                <div class="col-12 text-center text-muted py-5">No members found.</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ======== 3. ADVISORY COUNCIL ======== --}}
    <section id="section-ac" class="gov-section">
        <div class="container">
            <div class="gov-section-header">
                <h2 class="gov-section-title">Advisory Council</h2>
                <span class="gov-count-pill">{{ count($ac) }} Members</span>
                <p class="gov-section-desc">Distinguished experts and advisors providing strategic guidance and technical oversight to the organization.</p>
                <div class="gov-section-divider"></div>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($ac as $member)
                <div class="col-6 col-md-4 col-lg-3 gov-card-item">
                    @include('frontend.partials.gov_member_card', ['member' => $member, 'borderColor' => '#f86f2d', 'badgeBg' => '#fff3ec', 'badgeColor' => '#f86f2d'])
                </div>
                @empty
                <div class="col-12 text-center text-muted py-5">No members found.</div>
                @endforelse
            </div>
        </div>
    </section>

</div>

{{-- ===== Styles ===== --}}
<style>
/* Nav tabs */
.gov-tab-link {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 14px 28px;
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
    height: 450px; /* match card height */
}
.gov-card-item.card-visible {
    opacity: 1;
    transform: translateY(0);
}
.gov-card-item.card-hidden {
    opacity: 0;
    transform: translateY(36px);
}
</style>

{{-- ===== Script ===== --}}
<script>
function scrollToSection(id, el) {
    event.preventDefault();
    const target = document.getElementById(id);
    if (target) {
        var navbar = document.getElementById('ftco-navbar');
        var tabBar = document.getElementById('gov-tab-bar');
        var navH   = (navbar && navbar.classList.contains('scrolled')) ? navbar.offsetHeight : 0;
        var tabH   = tabBar ? tabBar.offsetHeight : 56;
        var offset = navH + tabH + 8;
        const top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top, behavior: 'smooth' });
    }
    document.querySelectorAll('.gov-tab-link').forEach(a => a.classList.remove('active'));
    if (el) el.classList.add('active');
}

// Highlight tab on scroll
window.addEventListener('scroll', function () {
    var navbar = document.getElementById('ftco-navbar');
    var tabBar = document.getElementById('gov-tab-bar');
    var navH = (navbar && navbar.classList.contains('scrolled')) ? navbar.offsetHeight : 0;
    var tabH = tabBar ? tabBar.offsetHeight : 56;
    var offset = navH + tabH + 8;
    const sections = ['section-gc', 'section-ec', 'section-ac'];
    sections.forEach((id, i) => {
        const el = document.getElementById(id);
        if (!el) return;
        const rect = el.getBoundingClientRect();
        if (rect.top <= offset && rect.bottom > offset) {
            document.querySelectorAll('.gov-tab-link').forEach(a => a.classList.remove('active'));
            const tabs = document.querySelectorAll('.gov-tab-link');
            if (tabs[i]) tabs[i].classList.add('active');
        }
    });
});

// Card scroll animation via IntersectionObserver
(function () {
    var cards = document.querySelectorAll('.gov-card-item');
    if (!cards.length) return;
    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry, idx) {
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
    var tabBar = document.getElementById('gov-tab-bar');
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
