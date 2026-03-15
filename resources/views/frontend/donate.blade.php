@extends('main')

@section('title') Donate — CDDF @endsection

@section('content')

{{-- ===== Hero Banner ===== --}}
<div class="hero-wrap" style="background-image: url('{{ (isset($application->donate_banner) && $application->donate_banner) ? asset('images/application/'.$application->donate_banner) : asset('static_image/donation_blk.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 340px; position: relative; display: flex; align-items: center;">
    <div class="overlay" style="position: absolute; inset: 0; background: rgba(0,0,0,0.65);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center py-5">
                <p class="mb-2" style="font-size: 0.9rem;">
                    <a href="{{ url('/') }}" style="color: #ffaa6e; text-decoration: none;">Home</a>
                    <span class="mx-2" style="color: #ccc;">/</span>
                    <span style="color: #fff;">Donate</span>
                </p>
                <h1 class="mb-0" style="color: #ffffff; font-weight: 400; font-size: 2.8rem; letter-spacing: 1px;">Support Our Cause</h1>
                <div class="mx-auto mt-3" style="width: 60px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
                <p class="mt-3 mb-0" style="color: #ddd; font-size: 1rem;">Be a part of our mission to raise funds for impactful humanitarian causes.</p>
            </div>
        </div>
    </div>
</div>
{{-- ===== End Hero ===== --}}

<section class="py-5" style="background-color: #f9f5f1;">
    <div class="container">

        {{-- ===== Payment Methods ===== --}}
        <div class="text-center mb-5">
            <p class="mb-1" style="color: #f86f2d; font-weight: 600; letter-spacing: 1px; font-size: 0.9rem; text-transform: uppercase;">Ways to Give</p>
            <h2 style="font-weight: 700; color: #1a1a1a; font-size: 1.8rem;">Payment Methods</h2>
            <div class="mx-auto mt-2" style="width: 50px; height: 4px; background: #f86f2d; border-radius: 2px;"></div>
            <p class="mt-3 text-secondary">Please donate using any of the following methods, then fill out the form below.</p>
        </div>

        <div class="row g-4 justify-content-center mb-5">
            @if($paymentMethods->count() > 0)
                @foreach($paymentMethods as $method)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="h-100 bg-white rounded-3 p-4 text-center" style="border: 2px dashed #e0d5cc; box-shadow: 0 4px 18px rgba(0,0,0,0.06); transition: transform 0.3s ease, box-shadow 0.3s ease;"
                         onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 30px rgba(248,111,45,0.18)';this.style.borderColor='#f86f2d';"
                         onmouseout="this.style.transform='';this.style.boxShadow='0 4px 18px rgba(0,0,0,0.06)';this.style.borderColor='#e0d5cc';">

                        {{-- Icon / Logo --}}
                        <div class="mb-3" style="height: 64px; display: flex; align-items: center; justify-content: center;">
                            @if($method->icon_image)
                                <img src="{{ asset('storage/'.$method->icon_image) }}" alt="{{ $method->type }}" style="max-height: 56px; max-width: 120px; object-fit: contain;">
                            @elseif($method->type == 'bank')
                                <i class="fa-solid fa-building-columns" style="font-size: 2.8rem; color: #f86f2d;"></i>
                            @elseif(file_exists(public_path('img/'.$method->type.'.png')))
                                <img src="{{ asset('img/'.$method->type.'.png') }}" alt="{{ $method->type }}" style="max-height: 56px; max-width: 120px; object-fit: contain;">
                            @else
                                <i class="fa-solid fa-money-bill-wave" style="font-size: 2.8rem; color: #f86f2d;"></i>
                            @endif
                        </div>

                        <div style="border-top: 2px solid #f86f2d; padding-top: 12px;">
                            <p class="mb-1" style="font-size: 0.78rem; color: #f86f2d; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">{{ ucfirst($method->type) }}</p>
                            <h6 class="mb-1" style="font-weight: 700; color: #1a1a1a;">{{ $method->account_name }}</h6>
                            <p class="mb-0" style="font-size: 1rem; font-weight: 600; color: #f86f2d; letter-spacing: 0.5px;">{{ $method->account_number }}</p>

                            @if($method->type == 'bank' && $method->bank_details)
                                <ul class="list-unstyled mt-2 mb-0 text-start" style="font-size: 0.82rem; color: #666;">
                                    @if(isset($method->bank_details['bank_name']))
                                        <li><i class="fa-solid fa-landmark me-1" style="color:#f86f2d;"></i> {{ $method->bank_details['bank_name'] }}</li>
                                    @endif
                                    @if(isset($method->bank_details['branch_name']))
                                        <li><i class="fa-solid fa-code-branch me-1" style="color:#f86f2d;"></i> {{ $method->bank_details['branch_name'] }}</li>
                                    @endif
                                    @if(isset($method->bank_details['routing_number']))
                                        <li><i class="fa-solid fa-hashtag me-1" style="color:#f86f2d;"></i> Routing: {{ $method->bank_details['routing_number'] }}</li>
                                    @endif
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 text-center py-4 text-muted">
                    <i class="fa-solid fa-circle-info fa-2x mb-2" style="color: #f86f2d;"></i>
                    <p>Payment methods will be available soon.</p>
                </div>
            @endif
        </div>

        {{-- ===== Donation Form ===== --}}
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="bg-white rounded-3" style="border: 2px dashed #e0d5cc; box-shadow: 0 4px 24px rgba(0,0,0,0.07); overflow: hidden;">

                    {{-- Form Header --}}
                    <div class="px-4 py-3 d-flex align-items-center gap-3" style="background: #f86f2d;">
                        <i class="fa-solid fa-hand-holding-heart fa-lg text-white"></i>
                        <h5 class="mb-0 text-white" style="font-weight: 600;">Submit Your Donation Information</h5>
                    </div>

                    <div class="p-4">

                        {{-- Info note --}}
                        <div class="d-flex align-items-start gap-3 mb-4 p-3 rounded-2" style="background: #fff8f4; border-left: 4px solid #f86f2d;">
                            <i class="fa-solid fa-circle-info mt-1" style="color: #f86f2d;"></i>
                            <p class="mb-0" style="font-size: 0.9rem; color: #555;">
                                <strong>How it works:</strong> First complete your payment using any method above, then fill in this form with your transaction details. We'll verify and acknowledge your donation promptly.
                            </p>
                        </div>

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2">
                                <i class="fa-solid fa-check-circle"></i>
                                <span>{{ session()->get('success') }}</span>
                                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('donation.submit') }}" method="POST">
                            @csrf

                            <div class="row g-3">
                                {{-- Name --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" style="color: #333;">Your Name <span style="color:#f86f2d;">*</span></label>
                                    <input type="text" name="donor_name" id="donor_name"
                                           class="form-control @error('donor_name') is-invalid @enderror"
                                           placeholder="Enter your full name"
                                           value="{{ old('donor_name') }}" required
                                           style="border-color: #ddd; border-radius: 6px;">
                                    @error('donor_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                {{-- Phone --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" style="color: #333;">Phone Number <span style="color:#f86f2d;">*</span></label>
                                    <input type="text" name="donor_phone" id="donor_phone"
                                           class="form-control @error('donor_phone') is-invalid @enderror"
                                           placeholder="e.g., +8801XXXXXXXXX"
                                           value="{{ old('donor_phone') }}" required
                                           style="border-color: #ddd; border-radius: 6px;">
                                    @error('donor_phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                {{-- Payment Method --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" style="color: #333;">Payment Method Used <span style="color:#f86f2d;">*</span></label>
                                    <select name="payment_method_id" id="payment_method_id"
                                            class="form-select @error('payment_method_id') is-invalid @enderror" required
                                            style="border-color: #ddd; border-radius: 6px;">
                                        <option value="">-- Select Payment Method --</option>
                                        @foreach($paymentMethods as $method)
                                            <option value="{{ $method->id }}" {{ old('payment_method_id') == $method->id ? 'selected' : '' }}>
                                                {{ ucfirst($method->type) }} — {{ $method->account_number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('payment_method_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                {{-- Transaction ID --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" style="color: #333;">Transaction ID <span style="color:#f86f2d;">*</span></label>
                                    <input type="text" name="transaction_id" id="transaction_id"
                                           class="form-control @error('transaction_id') is-invalid @enderror"
                                           placeholder="Enter transaction / reference ID"
                                           value="{{ old('transaction_id') }}" required
                                           style="border-color: #ddd; border-radius: 6px;">
                                    @error('transaction_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                {{-- Amount --}}
                                <div class="col-12">
                                    <label class="form-label fw-semibold" style="color: #333;">Donation Amount (৳) <span style="color:#f86f2d;">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: #fff8f4; border-color: #ddd; color: #f86f2d; font-weight: 700;">৳</span>
                                        <input type="number" name="amount" id="amount"
                                               class="form-control @error('amount') is-invalid @enderror"
                                               placeholder="Enter amount in BDT"
                                               min="1" step="0.01"
                                               value="{{ old('amount') }}" required
                                               style="border-color: #ddd; border-radius: 0 6px 6px 0;">
                                        @error('amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                {{-- Submit --}}
                                <div class="col-12 mt-2">
                                    <button type="submit" id="donation-submit-btn" class="btn w-100 py-3" style="background: #f86f2d; color: #fff; font-weight: 600; font-size: 1rem; border: none; border-radius: 6px; letter-spacing: 0.4px;">
                                        <i class="fa-solid fa-paper-plane me-2"></i> Submit Donation Information
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
    document.getElementById('donation-submit-btn').addEventListener('click', function(e) {
        e.preventDefault();
        var form = this.closest('form');
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'donate'}).then(function(token) {
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
