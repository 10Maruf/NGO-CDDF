@extends('main')

@section('title') Contact Us @endsection

@section('content')

{{-- ===== Hero / Page Banner ===== --}}
<div class="hero-wrap" style="background-image: url('{{ (isset($application->contact_banner) && $application->contact_banner) ? asset('images/application/'.$application->contact_banner) : asset('static_image/contact_blk.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 340px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.60);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size: 0.9rem;">
                    <a href="{{ url('/') }}" style="color: #ffaa6e; text-decoration: none;">Home</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">Contact Us</span>
                </p>
                <h1 class="mb-0" style="color: #ffffff; font-weight: 400; font-size: 2.8rem; letter-spacing: 1px;">Contact Us</h1>
                <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

{{-- ===== Contact Info Cards ===== --}}
<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <p class="mb-1" style="color: #f86f2d; font-weight: 600; letter-spacing: 1px; font-size: 0.9rem; text-transform: uppercase;">Reach Out</p>
            <h2 class="mb-2" style="font-weight: 700; color: #1a1a1a; font-size: 1.9rem;">Contact Information</h2>
            <div class="mx-auto" style="width: 50px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
        </div>

        <div class="row g-4 mb-5">

            {{-- Head Office --}}
            @if($head_office)
            <div class="col-lg-4 col-md-6">
                <div style="background: #fff; border-radius: 16px; padding: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.07); height: 100%;">
                    <div style="border: 2px dashed #f0c4ac; border-radius: 10px; padding: 28px 24px; text-align: center; height: 100%;">
                        <div class="mb-3">
                            <span style="display: inline-flex; align-items: center; justify-content: center; width: 56px; height: 56px; background: #fff3ec; border-radius: 50%; box-shadow: 0 2px 8px rgba(248,111,45,0.15);">
                                <i class="fa-solid fa-building" style="color: #f86f2d; font-size: 1.4rem;"></i>
                            </span>
                        </div>
                        <hr style="border-color: #f86f2d; opacity: 0.4; margin: 0 20px 16px;">
                        <p class="mb-1" style="font-size: 0.75rem; color: #f86f2d; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px;">{{ $head_office->title ? $head_office->title : 'Head Office' }}</p>
                        <p class="mb-3" style="font-weight: 700; color: #1a1a1a; font-size: 0.95rem; line-height: 1.6;">{{ $head_office->address }}</p>
                        @if($head_office->mobile || $head_office->mobile2)
                        <p class="mb-1" style="color: #f86f2d; font-size: 0.95rem; font-weight: 600;">
                            <a href="tel:{{ $head_office->mobile }}" style="color: #f86f2d; text-decoration: none;">{{ $head_office->mobile }}</a>
                            @if($head_office->mobile2)<br><span style="color: #f86f2d;">{{ $head_office->mobile2 }}</span>@endif
                        </p>
                        @endif
                        @if($head_office->email || $head_office->email2)
                        <p class="mb-0" style="color: #888; font-size: 0.88rem;">
                            <a href="mailto:{{ $head_office->email }}" style="color: #888; text-decoration: none;">{{ $head_office->email }}</a>
                            @if($head_office->email2)<br>{{ $head_office->email2 }}@endif
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            @endif

            {{-- Branches --}}
            @foreach ($branches as $branch)
            <div class="col-lg-4 col-md-6">
                <div style="background: #fff; border-radius: 16px; padding: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.07); height: 100%;">
                    <div style="border: 2px dashed #f0c4ac; border-radius: 10px; padding: 28px 24px; text-align: center; height: 100%;">
                        <div class="mb-3">
                            <span style="display: inline-flex; align-items: center; justify-content: center; width: 56px; height: 56px; background: #fff3ec; border-radius: 50%; box-shadow: 0 2px 8px rgba(248,111,45,0.15);">
                                <i class="fa-solid fa-map-pin" style="color: #f86f2d; font-size: 1.4rem;"></i>
                            </span>
                        </div>
                        <hr style="border-color: #f86f2d; opacity: 0.4; margin: 0 20px 16px;">
                        <p class="mb-1" style="font-size: 0.75rem; color: #f86f2d; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px;">{{ $branch->title ? $branch->title : 'Branch Office' }}</p>
                        <p class="mb-3" style="font-weight: 700; color: #1a1a1a; font-size: 0.95rem; line-height: 1.6;">{{ $branch->address }}</p>
                        @if($branch->mobile || $branch->mobile2)
                        <p class="mb-1" style="color: #f86f2d; font-size: 0.95rem; font-weight: 600;">
                            <a href="tel:{{ $branch->mobile }}" style="color: #f86f2d; text-decoration: none;">{{ $branch->mobile }}</a>
                            @if($branch->mobile2)<br><span style="color: #f86f2d;">{{ $branch->mobile2 }}</span>@endif
                        </p>
                        @endif
                        @if($branch->email || $branch->email2)
                        <p class="mb-0" style="color: #888; font-size: 0.88rem;">
                            <a href="mailto:{{ $branch->email }}" style="color: #888; text-decoration: none;">{{ $branch->email }}</a>
                            @if($branch->email2)<br>{{ $branch->email2 }}@endif
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

            {{-- Contact Persons --}}
            @foreach ($persons as $person)
            <div class="col-lg-4 col-md-6">
                <div style="background: #fff; border-radius: 16px; padding: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.07); height: 100%;">
                    <div style="border: 2px dashed #f0c4ac; border-radius: 10px; padding: 28px 24px; text-align: center; height: 100%;">
                        <div class="mb-3">
                            <span style="display: inline-flex; align-items: center; justify-content: center; width: 56px; height: 56px; background: #fff3ec; border-radius: 50%; box-shadow: 0 2px 8px rgba(248,111,45,0.15);">
                                <i class="fa-solid fa-user-tie" style="color: #f86f2d; font-size: 1.4rem;"></i>
                            </span>
                        </div>
                        <hr style="border-color: #f86f2d; opacity: 0.4; margin: 0 20px 16px;">
                        <p class="mb-1" style="font-size: 0.75rem; color: #f86f2d; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px;">{{ $person->title }}</p>
                        <p class="mb-3" style="font-weight: 700; color: #1a1a1a; font-size: 0.95rem;">{{ $person->name }}</p>
                        @if($person->mobile || $person->mobile2)
                        <p class="mb-1" style="color: #f86f2d; font-size: 0.95rem; font-weight: 600;">
                            {{ $person->mobile }}
                            @if($person->mobile2)<br>{{ $person->mobile2 }}@endif
                        </p>
                        @endif
                        @if($person->email || $person->email2)
                        <p class="mb-0" style="color: #888; font-size: 0.88rem;">
                            <a href="mailto:{{ $person->email }}" style="color: #888; text-decoration: none;">{{ $person->email }}</a>
                            @if($person->email2)<br>{{ $person->email2 }}@endif
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        {{-- ===== Contact Form ===== --}}
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div style="background: #fff; border-radius: 12px; padding: 40px 36px; box-shadow: 0 6px 24px rgba(0,0,0,0.08);">

                    <div class="text-center mb-4">
                        <p class="mb-1" style="color: #f86f2d; font-weight: 600; letter-spacing: 1px; font-size: 0.9rem; text-transform: uppercase;">We'd Love to Hear From You</p>
                        <h3 class="mb-2" style="font-weight: 700; color: #1a1a1a; font-size: 1.6rem;">Send Us a Message</h3>
                        <div class="mx-auto" style="width: 50px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
                    </div>

                    @if (session()->has('success'))
                        <div class="alert alert-success rounded-3 mb-4">
                            <i class="fa-solid fa-circle-check me-2"></i>{{ session()->get('success') }}
                        </div>
                    @endif

                    <form action="{{ route('message.store') }}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" style="font-size: 0.88rem; font-weight: 600; color: #444;">Your Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="John Doe" value="{{ old('name') }}"
                                    style="border-radius: 6px; border: 1px solid #ddd; padding: 10px 14px; font-size: 0.95rem;">
                                @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" style="font-size: 0.88rem; font-weight: 600; color: #444;">Email Address</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="you@example.com" value="{{ old('email') }}"
                                    style="border-radius: 6px; border: 1px solid #ddd; padding: 10px 14px; font-size: 0.95rem;">
                                @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" style="font-size: 0.88rem; font-weight: 600; color: #444;">Contact Number</label>
                                <input type="text" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror" placeholder="+880 ..." value="{{ old('contact_number') }}"
                                    style="border-radius: 6px; border: 1px solid #ddd; padding: 10px 14px; font-size: 0.95rem;">
                                @error('contact_number') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" style="font-size: 0.88rem; font-weight: 600; color: #444;">Subject</label>
                                <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="How can we help?" value="{{ old('subject') }}"
                                    style="border-radius: 6px; border: 1px solid #ddd; padding: 10px 14px; font-size: 0.95rem;">
                                @error('subject') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label" style="font-size: 0.88rem; font-weight: 600; color: #444;">Message</label>
                                <textarea name="message" rows="6" class="form-control @error('message') is-invalid @enderror" placeholder="Write your message here..."
                                    style="border-radius: 6px; border: 1px solid #ddd; padding: 10px 14px; font-size: 0.95rem; resize: vertical;">{{ old('message') }}</textarea>
                                @error('message') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12">
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                                @error('g-recaptcha-response')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 text-center mt-2">
                                <button type="submit" class="btn px-5 py-2" style="background-color: #f86f2d; color: #fff; border-radius: 6px; font-weight: 600; font-size: 1rem; border: none;">
                                    <i class="fa-solid fa-paper-plane me-2"></i> Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
{{-- ===== End Contact ===== --}}

@endsection

@push('js')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
