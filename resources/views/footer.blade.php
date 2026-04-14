@php
    $footer_news   = DB::table('latest_news')->where('status', 1)->orderBy('id','desc')->limit(2)->get();
    $footer_office = DB::table('contacts')->where('type','head_office')->where('status','active')->first();
@endphp

{{-- ===== Footer ===== --}}
<footer style="background: #1a1a1a; color: #ccc; padding-top: 60px;">
    <div class="container">
        <div class="row g-5 pb-5">

            {{-- Col 1: Logo + About + Social --}}
            <div class="col-lg-3 col-md-6">
                <div class="mb-4">
                    <img src="{{ asset('images/application/'.application()->main_logo) }}" alt="CDDF Logo" style="max-height:56px;filter:brightness(0) invert(1);">
                </div>
                <p style="font-size:0.88rem;line-height:1.8;color:#aaa;">
                    CDDF (Chilmari Distressed Development Foundation) is a non-profit, non-political voluntary social welfare organization working for marginalized communities in northern Bangladesh.
                </p>
                <ul class="list-unstyled d-flex gap-2 mt-4">
                    <li><a href="{{ application()->facebook }}" target="_blank" style="display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:50%;background:#f86f2d;color:#fff;font-size:0.85rem;"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="{{ application()->twitter }}" target="_blank" style="display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:50%;background:#f86f2d;color:#fff;font-size:0.85rem;"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="{{ application()->instagram }}" target="_blank" style="display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:50%;background:#f86f2d;color:#fff;font-size:0.85rem;"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="{{ application()->youtube }}" target="_blank" style="display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:50%;background:#f86f2d;color:#fff;font-size:0.85rem;"><i class="fa-brands fa-youtube"></i></a></li>
                    <li><a href="{{ route('donate') }}" aria-label="Donate" style="display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:50%;background:#f86f2d;color:#fff;font-size:0.85rem;"><i class="fa-solid fa-hand-holding-heart"></i></a></li>
                </ul>
            </div>

            {{-- Col 2: Recent News --}}
            <div class="col-lg-3 col-md-6">
                <h5 style="color:#fff;font-weight:700;font-size:1rem;text-transform:uppercase;letter-spacing:1px;margin-bottom:20px;padding-bottom:10px;border-bottom:2px solid #f86f2d;">Recent News</h5>
                @forelse($footer_news as $fn)
                <div class="d-flex gap-3 mb-4">
                    <a href="{{ route('latest.news.view', $fn->id) }}" style="flex-shrink:0;">
                        <img src="{{ asset('images/news/'.$fn->image) }}" alt="{{ $fn->title }}"
                             style="width:70px;height:60px;object-fit:cover;border-radius:6px;">
                    </a>
                    <div>
                        <h6 class="mb-1" style="font-size:0.85rem;line-height:1.4;">
                            <a href="{{ route('latest.news.view', $fn->id) }}"
                               style="color:#ddd;text-decoration:none;"
                               onmouseover="this.style.color='#f86f2d'" onmouseout="this.style.color='#ddd'">
                                {{ Str::limit($fn->title, 55) }}
                            </a>
                        </h6>
                        <small style="color:#888;"><i class="fa-solid fa-newspaper me-1"></i>Latest News</small>
                    </div>
                </div>
                @empty
                <p style="color:#888;font-size:0.88rem;">No news available.</p>
                @endforelse
            </div>

            {{-- Col 3: Quick Links --}}
            <div class="col-lg-3 col-md-6">
                <h5 style="color:#fff;font-weight:700;font-size:1rem;text-transform:uppercase;letter-spacing:1px;margin-bottom:20px;padding-bottom:10px;border-bottom:2px solid #f86f2d;">Quick Links</h5>
                <ul class="list-unstyled" style="font-size:0.9rem;">
                    <li class="mb-2"><a href="{{ url('/') }}" style="color:#aaa;text-decoration:none;" onmouseover="this.style.color='#f86f2d'" onmouseout="this.style.color='#aaa'"><i class="fa-solid fa-chevron-right me-2" style="color:#f86f2d;font-size:0.7rem;"></i>Home</a></li>
                    <li class="mb-2"><a href="{{ route('about.us') }}" style="color:#aaa;text-decoration:none;" onmouseover="this.style.color='#f86f2d'" onmouseout="this.style.color='#aaa'"><i class="fa-solid fa-chevron-right me-2" style="color:#f86f2d;font-size:0.7rem;"></i>About Us</a></li>
                    <li class="mb-2"><a href="{{ route('programs.all') }}" style="color:#aaa;text-decoration:none;" onmouseover="this.style.color='#f86f2d'" onmouseout="this.style.color='#aaa'"><i class="fa-solid fa-chevron-right me-2" style="color:#f86f2d;font-size:0.7rem;"></i>Programs</a></li>
                    <li class="mb-2"><a href="{{ route('faq') }}" style="color:#aaa;text-decoration:none;" onmouseover="this.style.color='#f86f2d'" onmouseout="this.style.color='#aaa'"><i class="fa-solid fa-chevron-right me-2" style="color:#f86f2d;font-size:0.7rem;"></i>FAQ</a></li>
                    <li class="mb-2"><a href="{{ route('latest.news.all') }}" style="color:#aaa;text-decoration:none;" onmouseover="this.style.color='#f86f2d'" onmouseout="this.style.color='#aaa'"><i class="fa-solid fa-chevron-right me-2" style="color:#f86f2d;font-size:0.7rem;"></i>Updates</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}" style="color:#aaa;text-decoration:none;" onmouseover="this.style.color='#f86f2d'" onmouseout="this.style.color='#aaa'"><i class="fa-solid fa-chevron-right me-2" style="color:#f86f2d;font-size:0.7rem;"></i>Contact</a></li>
                    <li class="mb-2"><a href="{{ route('volunteer.opportunities') }}" style="color:#aaa;text-decoration:none;" onmouseover="this.style.color='#f86f2d'" onmouseout="this.style.color='#aaa'"><i class="fa-solid fa-chevron-right me-2" style="color:#f86f2d;font-size:0.7rem;"></i>Volunteer</a></li>
                </ul>
            </div>

            {{-- Col 4: Contact Info (Head Office) --}}
            <div class="col-lg-3 col-md-6">
                <h5 style="color:#fff;font-weight:700;font-size:1rem;text-transform:uppercase;letter-spacing:1px;margin-bottom:20px;padding-bottom:10px;border-bottom:2px solid #f86f2d;">Have a Question?</h5>
                <ul class="list-unstyled" style="font-size:0.9rem;">
                    @if($footer_office && $footer_office->address)
                    <li class="d-flex gap-3 mb-3">
                        <span style="color:#f86f2d;margin-top:3px;flex-shrink:0;"><i class="fa-solid fa-location-dot"></i></span>
                        <span style="color:#aaa;line-height:1.6;">{{ $footer_office->address }}</span>
                    </li>
                    @else
                    <li class="d-flex gap-3 mb-3">
                        <span style="color:#f86f2d;margin-top:3px;flex-shrink:0;"><i class="fa-solid fa-location-dot"></i></span>
                        <span style="color:#aaa;line-height:1.6;">Chilmari, Kurigram, Rangpur Division, Bangladesh</span>
                    </li>
                    @endif
                    @if($footer_office && $footer_office->mobile)
                    <li class="d-flex gap-3 mb-3">
                        <span style="color:#f86f2d;flex-shrink:0;"><i class="fa-solid fa-phone"></i></span>
                        <span style="color:#aaa;">
                            <a href="tel:{{ $footer_office->mobile }}" style="color:#aaa;text-decoration:none;">{{ $footer_office->mobile }}</a>
                            @if($footer_office->mobile2)<br><a href="tel:{{ $footer_office->mobile2 }}" style="color:#aaa;text-decoration:none;">{{ $footer_office->mobile2 }}</a>@endif
                        </span>
                    </li>
                    @endif
                    @if($footer_office && $footer_office->email)
                    <li class="d-flex gap-3 mb-3">
                        <span style="color:#f86f2d;flex-shrink:0;"><i class="fa-solid fa-envelope"></i></span>
                        <span style="color:#aaa;">
                            <a href="mailto:{{ $footer_office->email }}" style="color:#aaa;text-decoration:none;">{{ $footer_office->email }}</a>
                            @if($footer_office->email2)<br><a href="mailto:{{ $footer_office->email2 }}" style="color:#aaa;text-decoration:none;">{{ $footer_office->email2 }}</a>@endif
                        </span>
                    </li>
                    @endif
                </ul>

                {{-- Subscription Form --}}
                <div class="mt-4">
                    <h6 style="color:#fff;font-weight:600;font-size:0.9rem;margin-bottom:15px;text-transform:uppercase;letter-spacing:1px;">Subscribe to Newsletter</h6>
                    @if (session()->has('success'))
                        <div class="alert alert-success py-1 px-2 mb-2" style="font-size: 0.8rem; background-color: rgba(25, 135, 84, 0.2); color: #75b798; border: 1px solid #75b798;">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <style>
                        .footer-subscribe-input::placeholder {
                            color: #9ca3af;
                            opacity: 1;
                        }
                        .footer-subscribe-input:focus {
                            background-color: #374151 !important;
                            border-color: #f86f2d !important;
                            color: #fff !important;
                            box-shadow: none !important;
                        }
                    </style>
                    <form action="{{ route('user.subscribe') }}" method="post" class="d-flex flex-column gap-2">
                        @csrf
                        <div>
                            <input type="text" name="name" class="form-control form-control-sm footer-subscribe-input @error('name') is-invalid @enderror" style="background-color: #1f2937; border: 1px solid #374151; color: #fff;" placeholder="Your Name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger mt-1" style="font-size: 0.75rem;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group input-group-sm">
                            <input type="email" name="email" class="form-control footer-subscribe-input @error('email') is-invalid @enderror" style="background-color: #1f2937; border: 1px solid #374151; color: #fff;" placeholder="Your Email" value="{{ old('email') }}">
                            <button class="btn" type="submit" style="background-color:#f86f2d; border-color:#f86f2d; color: #fff;">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                        @error('email')
                            <div class="text-danger mt-1" style="font-size: 0.75rem;">{{ $message }}</div>
                        @enderror
                    </form>
                </div>
            </div>

        </div>
    </div>

    {{-- Divider --}}
    <div style="border-top:1px solid #2e2e2e;"></div>

    {{-- Copyright Bar --}}
    <div class="container py-3">
        <div class="text-center" style="font-size:0.82rem;color:#555;">
            <span>Copyright &copy; {{ date('Y') }} &mdash; All rights reserved by <strong style="color:#f86f2d;">CDDF</strong></span>
        </div>
    </div>
</footer>

{{-- Back to Top --}}
<div class="text-end">
    <a href="#" class="back-to-top">
        <i class="fa fa-arrow-up" aria-hidden="true"></i>
    </a>
</div>
