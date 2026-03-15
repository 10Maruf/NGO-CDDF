@extends('main')

@section('title') Volunteers — CDDF @endsection

@section('content')

{{-- ===== Hero Banner ===== --}}
<div class="hero-wrap" style="background-image: url('{{ (isset($application->volunteer_banner) && $application->volunteer_banner) ? asset('images/application/'.$application->volunteer_banner) : asset('static_image/Volunteer_blk.png') }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 340px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.65);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size: 0.9rem;">
                    <a href="{{ url('/') }}" style="color: #ffaa6e; text-decoration: none;">Home</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">Volunteers</span>
                </p>
                <h1 class="mb-0" style="color: #ffffff; font-weight: 400; font-size: 2.8rem; letter-spacing: 1px;">Be a Volunteer</h1>
                <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
                <p class="mt-3 mb-0" style="color: #ddd; font-size: 1rem;">Join our team and make a meaningful difference in people's lives.</p>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

<section class="py-5" style="background-color: #f9f5f1;">
    <div class="container">

        {{-- ===== Our Volunteers ===== --}}
        @if($volunteers->count() > 0)
        <div class="text-center mb-5">
            <p class="mb-1" style="color: #f86f2d; font-weight: 600; letter-spacing: 1px; font-size: 0.9rem; text-transform: uppercase;">Our Team</p>
            <h2 style="font-weight: 700; color: #1a1a1a; font-size: 1.8rem;">Our Volunteers</h2>
            <div class="mx-auto mt-2" style="width: 50px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
        </div>

        <div class="row g-4 justify-content-center mb-5">
            @foreach($volunteers as $volunteer)
            <div class="col-lg-2 col-md-3 col-4 text-center">
                @if($volunteer->photo)
                    <img src="{{ asset('images/volunteers/' . $volunteer->photo) }}" alt="{{ $volunteer->name }}"
                         style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #f86f2d;">
                @else
                    <div style="width: 80px; height: 80px; border-radius: 50%; background: #f0e8e0; border: 3px solid #f86f2d; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                        <i class="fa-solid fa-user" style="font-size: 2rem; color: #f86f2d;"></i>
                    </div>
                @endif
                <p class="mt-2 mb-0 fw-semibold" style="font-size: 0.85rem; color: #333;">{{ $volunteer->name }}</p>
            </div>
            @endforeach
        </div>
        @endif

        {{-- ===== Application Form ===== --}}
        <div class="text-center mb-5">
            <p class="mb-1" style="color: #f86f2d; font-weight: 600; letter-spacing: 1px; font-size: 0.9rem; text-transform: uppercase;">Get Involved</p>
            <h2 style="font-weight: 700; color: #1a1a1a; font-size: 1.8rem;">Volunteer With Us</h2>
            <div class="mx-auto mt-2" style="width: 50px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
            <p class="mt-3 text-secondary">Fill out the form below and we'll be in touch with you shortly.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="bg-white rounded-3" style="border: 2px dashed #e0d5cc; box-shadow: 0 4px 24px rgba(0,0,0,0.07); overflow: hidden;">

                    <div class="px-4 py-3 d-flex align-items-center gap-3" style="background: #f86f2d;">
                        <i class="fa-solid fa-hands-helping fa-lg text-white"></i>
                        <h5 class="mb-0 text-white" style="font-weight: 600;">Volunteer Application</h5>
                    </div>

                    <div class="p-4">

                        @if (session()->has('apply_success'))
                            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2">
                                <i class="fa-solid fa-check-circle"></i>
                                <span>{{ session()->get('apply_success') }}</span>
                                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('volunteer.apply') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" style="color: #333;">Full Name <span style="color:#f86f2d;">*</span></label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Enter your full name"
                                           value="{{ old('name') }}" required
                                           style="border-color: #ddd; border-radius: 6px;">
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" style="color: #333;">Phone Number</label>
                                    <input type="text" name="phone"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           placeholder="e.g. 01XXXXXXXXX"
                                           value="{{ old('phone') }}"
                                           style="border-color: #ddd; border-radius: 6px;">
                                    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-semibold" style="color: #333;">Email Address</label>
                                    <input type="email" name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="Enter your email"
                                           value="{{ old('email') }}"
                                           style="border-color: #ddd; border-radius: 6px;">
                                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-semibold" style="color: #333;">Your Photo</label>
                                    <input type="file" name="photo"
                                           class="form-control"
                                           accept="image/*"
                                           style="border-color: #ddd; border-radius: 6px;">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-semibold" style="color: #333;">Address</label>
                                    <input type="text" name="address"
                                           class="form-control"
                                           placeholder="Your current address"
                                           value="{{ old('address') }}"
                                           style="border-color: #ddd; border-radius: 6px;">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-semibold" style="color: #333;">Skills / Area of Interest</label>
                                    <textarea name="skills" rows="2"
                                              class="form-control"
                                              placeholder="e.g. teaching, healthcare, fundraising..."
                                              style="border-color: #ddd; border-radius: 6px;">{{ old('skills') }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-semibold" style="color: #333;">Why do you want to volunteer?</label>
                                    <textarea name="message" rows="3"
                                              class="form-control"
                                              placeholder="Tell us a bit about yourself and your motivation..."
                                              style="border-color: #ddd; border-radius: 6px;">{{ old('message') }}</textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" id="volunteer-submit-btn" class="btn w-100 py-2 text-white fw-semibold"
                                            style="background: #f86f2d; border: none; border-radius: 6px; font-size: 1rem;">
                                        <i class="fa-solid fa-paper-plane me-2"></i> Submit Application
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@push('js')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
<script>
    document.getElementById('volunteer-submit-btn').addEventListener('click', function(e) {
        e.preventDefault();
        var form = this.closest('form');
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'volunteer'}).then(function(token) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'g-recaptcha-response';
                input.value = token;
                form.appendChild(input);
                form.submit();
            });
        });
    });
</script>
@endpush

