@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Get Involved</li>
      </ol>
      <h2>Volunteer Registration</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Join Us as a Volunteer</h2>
        <p>Thank you for your interest in volunteering with Uddipto Mohila Unnoyon Sangstha (UMUS). Please fill out the form below to register.</p>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-8">
          @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show">
              <i class="fa-solid fa-check-circle"></i> {{ session()->get('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          @endif

          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <form action="{{ route('volunteer.register.submit') }}" method="POST">
                @csrf
                
                <div class="row">
                  <div class="col-md-12 mb-3">
                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" 
                           class="form-control @error('name') is-invalid @enderror" 
                           placeholder="Enter your full name" 
                           value="{{ old('name') }}" required>
                    @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           placeholder="your.email@example.com" 
                           value="{{ old('email') }}" required>
                    @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="text" name="phone" id="phone" 
                           class="form-control @error('phone') is-invalid @enderror" 
                           placeholder="017XXXXXXXX" 
                           value="{{ old('phone') }}" required>
                    @error('phone')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" 
                           class="form-control @error('address') is-invalid @enderror" 
                           placeholder="Your address" 
                           value="{{ old('address') }}">
                    @error('address')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="skills" class="form-label">Skills & Expertise</label>
                    <textarea name="skills" id="skills" rows="3" 
                              class="form-control @error('skills') is-invalid @enderror" 
                              placeholder="Tell us about your skills, expertise, or any relevant experience">{{ old('skills') }}</textarea>
                    @error('skills')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="why_volunteer" class="form-label">Why do you want to volunteer with us? <span class="text-danger">*</span></label>
                    <textarea name="why_volunteer" id="why_volunteer" rows="4" 
                              class="form-control @error('why_volunteer') is-invalid @enderror" 
                              placeholder="Share your motivation for volunteering with UMUS" 
                              required>{{ old('why_volunteer') }}</textarea>
                    @error('why_volunteer')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-12">
                    <button type="submit" class="btn btn-danger btn-lg w-100">
                      <i class="fa-solid fa-paper-plane"></i> Submit Registration
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="mt-4 text-center">
            <p class="text-muted">
              <i class="fa-solid fa-info-circle"></i> 
              After submitting, our team will review your application and contact you soon.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
