@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Contact</li>
      </ol>
      <h2>Contact</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact bg-light py-0 my-0">
    <div class="container bg-white" data-aos="fade-up">
      <div class="section-title py-5">
        <h2>Contact Information </h2>
         <!-- ======= Contact Section ======= -->
         <div class="row py-3">
            @if($head_office)
            <div class="col-md-3 text-start my-2">
                <h5>{{ $head_office->title ? $head_office->title : 'Head Office' }} Address</h5>
                <p class="text-secondary">{{ $head_office->address }}</p>
                @if($head_office->mobile || $head_office->mobile2)
                <p class="text-secondary mb-1"><strong>Mobile:</strong> {{ $head_office->mobile }}@if($head_office->mobile && $head_office->mobile2), @endif{{ $head_office->mobile2 }}</p>
                @endif
                @if($head_office->email || $head_office->email2)
                <p class="text-secondary mb-1"><strong>Email:</strong> {{ $head_office->email }}@if($head_office->email && $head_office->email2), @endif{{ $head_office->email2 }}</p>
                @endif
            </div>
            @endif

            @forelse ($branches as $branch)
            <div class="col-md-3 text-start my-2">
                <h5>{{ $branch->title ? $branch->title : 'Branch' }} Address</h5>
                <p class="text-secondary">{{ $branch->address }}</p>
                @if($branch->mobile || $branch->mobile2)
                <p class="text-secondary mb-1"><strong>Mobile:</strong> {{ $branch->mobile }}@if($branch->mobile && $branch->mobile2), @endif{{ $branch->mobile2 }}</p>
                @endif
                @if($branch->email || $branch->email2)
                <p class="text-secondary mb-1"><strong>Email:</strong> {{ $branch->email }}@if($branch->email && $branch->email2), @endif{{ $branch->email2 }}</p>
                @endif
            </div>
            @empty
            @endforelse

            @forelse ($persons as $person)
            <div class="col-md-3 text-start my-2">
                <h5>{{ $person->title }}</h5>
                <ul class="text-start m-0 p-0 text-secondary">
                    @if($person->name)
                    <li>{{ $person->title }}: {{ $person->name }}</li>
                    @endif
                    @if($person->mobile || $person->mobile2)
                    <li>Mobile: {{ $person->mobile }}@if($person->mobile && $person->mobile2), @endif{{ $person->mobile2 }}</li>
                    @endif
                    @if($person->email || $person->email2)
                    <li>Email: {{ $person->email }}@if($person->email && $person->email2), @endif{{ $person->email2 }}</li>
                    @endif
                    @if($person->skype)
                    <li>Skype: {{ $person->skype }}</li>
                    @endif
                    @if($person->whatsapp)
                    <li>WhatsApp: {{ $person->whatsapp }}</li>
                    @endif
                    @if($person->twitter)
                    <li>Twitter: {{ $person->twitter }}</li>
                    @endif
                </ul>
            </div>
            @empty
            @endforelse
         </div>

         <hr class="py-2">

         {{-- Message Form --}}
        <div class="row mx-1">
            <div class="col-lg-8 my-2">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form action="{{ route('message.store') }}" method="post" role="form" class="php-email-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" placeholder="Subject" value="{{ old('subject') }}">
                        @error('subject')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="3" placeholder="Message">
                            {{ old('message') }}
                        </textarea>
                        @error('message')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="text-start">
                        <button class="btn btn-danger" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 text-start my-2">
                <h1>Message us <i class="fa-regular fa-envelope text-danger"></i></h1>
                <p class="text-secondary">Please send us your message through email or message box. We will response within short periods of time. Thank you for being with us.</p>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Section -->
<div style="background-image: url('{{ asset('img/donation.jpg') }}')" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-12 mx-auto text-center">
                <h6 class="text-warning text-center">We need your cooperation</h6>
                <h1 class="text-white text-center">Be a part of our mission to raise funds for impactful humanitarian causes.</h1>
                <a href="{{ route('donate') }}" class="btn btn-warning mt-3"><i class="fa-solid fa-sack-dollar"></i> Donate Now</a>
            </div>
        </div>
    </div>
</div>

<section id="contact" class="contact bg-light py-0 my-0">
    <div class="container bg-white py-5">
        <div class="mb-5">
            <div class="section-title">
                <h2>Office Location</h2>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29642.845279656894!2d89.05!3d22.55!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a006d8b8c8c8c8d%3A0x1234567890abcdef!2sTala%2C%20Satkhira!5e0!3m2!1sen!2sbd!4v1675184176828!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

@endsection
