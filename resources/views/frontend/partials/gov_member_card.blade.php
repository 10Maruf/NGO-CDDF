@php
    $cardId = 'mc-' . $member->id . '-' . rand(100,999);
    $photoSrc = $member->photo
        ? asset('images/org_members/' . $member->photo)
        : asset('img/testimonial.jpg');
@endphp

<div class="gov-flip-wrap" id="{{ $cardId }}" onclick="toggleGovCard('{{ $cardId }}')">
    <div class="gov-flip-inner">

        {{-- ===== FRONT ===== --}}
        <div class="gov-face gov-front">
            <img src="{{ $photoSrc }}"
                 onerror="this.src='{{ asset('img/testimonial.jpg') }}'"
                 alt="{{ $member->name }}"
                 class="gov-photo">
            <div class="gov-front-overlay"></div>
            <div class="gov-front-info">
                <h6 class="gov-front-name">{{ $member->name }}</h6>
                <p class="gov-front-desg">{{ $member->designation }}</p>
            </div>
            <div class="gov-hint"><i class="fa-solid fa-hand-pointer me-1"></i> View Info</div>
        </div>

        {{-- ===== BACK ===== --}}
        <div class="gov-face gov-back">
            <div class="gov-back-inner">
                <div class="gov-back-header">
                    <h6 class="gov-back-name">{{ $member->name }}</h6>
                    <p class="gov-back-desg">{{ $member->designation }}</p>
                </div>
                <div class="gov-back-divider"></div>
                @if($member->bio)
                <p class="gov-back-bio">{{ $member->bio }}</p>
                @endif
                @if($member->experience_years || $member->education || $member->joining_date)
                <div class="gov-back-meta">
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
                @endif
                <div class="gov-back-socials">
                    @if($member->contact_number)
                    <div class="gov-contact-text">
                        <i class="fa-solid fa-phone"></i>
                        <a href="tel:{{ $member->contact_number }}">{{ $member->contact_number }}</a>
                    </div>
                    @endif
                    @if($member->email)
                    <div class="gov-contact-text">
                        <i class="fa-solid fa-envelope"></i>
                        <a href="mailto:{{ $member->email }}">{{ $member->email }}</a>
                    </div>
                    @endif
                    @if($member->facebook || $member->twitter || $member->instagram || $member->linkedin || $member->youtube)
                    <div class="gov-social-icons">
                        @if($member->facebook)
                        <a href="{{ $member->facebook }}" target="_blank" class="gov-soc-ico" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        @endif
                        @if($member->twitter)
                        <a href="{{ $member->twitter }}" target="_blank" class="gov-soc-ico" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
                        @endif
                        @if($member->instagram)
                        <a href="{{ $member->instagram }}" target="_blank" class="gov-soc-ico" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        @endif
                        @if($member->linkedin)
                        <a href="{{ $member->linkedin }}" target="_blank" class="gov-soc-ico" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                        @endif
                        @if($member->youtube)
                        <a href="{{ $member->youtube }}" target="_blank" class="gov-soc-ico" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

<style>
.gov-flip-wrap {
    perspective: 1000px;
    height: 450px;
    cursor: pointer;
    border-radius: 16px;
}
.gov-flip-inner {
    position: relative;
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
    transition: transform 0.55s cubic-bezier(0.45, 0.05, 0.55, 0.95);
    border-radius: 16px;
}
.gov-flip-wrap.flipped .gov-flip-inner {
    transform: rotateY(180deg);
}
.gov-face {
    position: absolute;
    inset: 0;
    border-radius: 16px;
    overflow: hidden;
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
}
/* FRONT */
.gov-front { background: #1a1340; }
.gov-photo {
    width: 100%; height: 100%;
    object-fit: cover; object-position: top center; display: block;
}
.gov-front-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to bottom, transparent 38%, rgba(15,10,50,0.55) 62%, rgba(10,6,40,0.93) 100%);
}
.gov-front-info {
    position: absolute; bottom: 40px; left: 0; right: 0; padding: 0 14px;
}
.gov-front-name {
    color: #fff; font-size: 1rem; font-weight: 700;
    margin-bottom: 2px; line-height: 1.3; text-shadow: 0 1px 4px rgba(0,0,0,0.5);
}
.gov-front-desg {
    color: #f86f2d; font-size: 0.78rem; font-weight: 600; margin-bottom: 0;
}
.gov-hint {
    position: absolute; bottom: 13px; left: 0; right: 0;
    text-align: center; font-size: 0.68rem; color: rgba(255,255,255,0.38); letter-spacing: 0.3px;
    transition: color 0.2s;
}
.gov-flip-wrap:hover .gov-hint { color: rgba(248,111,45,0.75); }
/* BACK */
.gov-back {
    background: linear-gradient(145deg, #f86f2d 0%, #c94d10 100%);
    transform: rotateY(180deg);
}
.gov-back-inner {
    display: flex; flex-direction: column; height: 100%; padding: 18px 16px 14px;
}
.gov-back-name {
    color: #fff; font-size: 0.97rem; font-weight: 700; margin-bottom: 2px; line-height: 1.3;
}
.gov-back-desg {
    color: rgba(255,255,255,0.82); font-size: 0.76rem; font-weight: 600; margin-bottom: 0;
}
.gov-back-divider {
    height: 2px;
    background: linear-gradient(to right, rgba(255,255,255,0.7), transparent);
    border-radius: 2px; margin: 11px 0; flex-shrink: 0;
}
.gov-back-bio {
    color: rgba(255,255,255,0.88); font-size: 0.79rem; line-height: 1.65;
    flex: 1; 
    margin-bottom: 8px;
}
.gov-back-meta {
    display: flex; flex-direction: column; gap: 3px; margin-bottom: 8px;
}
.gov-back-meta span {
    font-size: 0.71rem; color: rgba(255,255,255,0.75);
    display: flex; align-items: center; gap: 5px;
}
.gov-back-meta i { color: #fff; font-size: 0.72rem; flex-shrink: 0; }
.gov-back-socials {
    display: flex; flex-direction: column; gap: 5px;
    margin-top: auto; padding-top: 10px;
    border-top: 1px solid rgba(255,255,255,0.25);
}
.gov-contact-text {
    display: flex; align-items: center; gap: 7px;
    font-size: 0.73rem;
}
.gov-contact-text svg, 
.gov-contact-text i,
.gov-contact-text path {
    color: #fff !important; 
    fill: #fff !important;
    font-size: 0.77rem; 
    flex-shrink: 0;
}
.gov-contact-text a {
    color: #fff; text-decoration: none;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    max-width: 160px; display: inline-block;
}
.gov-contact-text a:hover { text-decoration: underline; }
.gov-social-icons {
    display: flex; gap: 6px; flex-wrap: wrap; margin-top: 4px;
}
.gov-soc-ico {
    width: 30px; height: 30px; border-radius: 50%;
    background: rgba(255,255,255,0.2);
    display: inline-flex; align-items: center; justify-content: center;
    color: #fff; font-size: 0.88rem; text-decoration: none;
    transition: background 0.2s, color 0.2s;
    border: 1px solid rgba(255,255,255,0.3);
}
.gov-soc-ico:hover { background: rgba(255,255,255,0.38); color: #fff; border-color: rgba(255,255,255,0.6); }
</style>
<script>
function toggleGovCard(id) {
    if (event.target.closest('a')) return;
    var el = document.getElementById(id);
    var wasFlipped = el.classList.contains('flipped');
    document.querySelectorAll('.gov-flip-wrap.flipped').forEach(function(c){ c.classList.remove('flipped'); });
    if (!wasFlipped) el.classList.add('flipped');
}
if (!window._govFlipInit) {
    window._govFlipInit = true;
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.gov-flip-wrap')) {
            document.querySelectorAll('.gov-flip-wrap.flipped').forEach(function(c){ c.classList.remove('flipped'); });
        }
    });
}
</script>


