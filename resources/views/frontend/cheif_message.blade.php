@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>About us</li>
      </ol>
      <h2>Message form Cheif Executive</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- ======= Message Section ======= -->
  <section id="testimonials" class="testimonials bg-light p-0">
    <div class="container bg-white py-5">
      <div class="section-title">
        <h2>Message from Chief Executive</h2>
        @if(isset($message))
        <div class="testimonials-slider">
          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <div class="d-flex justify-content-center">
                @if($message->photo)
                <img src="{{ asset('images/chief_message/'.$message->photo) }}" class="testimonial-img" alt="{{ $message->name }}">
                @endif
              </div>
              <h3 class="fs-3">{{ $message->name }}</h3>
              <h4 class="fs-5 text-dark">{{ $message->designation }}</h4>
              @if($message->title)
              <h5 class="text-muted mb-3">{{ $message->title }}</h5>
              @endif
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                {!! nl2br(e($message->message)) !!}
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              @if($message->signature)
              <div class="mt-3">
                <img src="{{ asset('images/chief_message/'.$message->signature) }}" alt="Signature" style="max-width: 150px;">
              </div>
              @endif
            </div>
          </div>
          <!-- End Message item -->
        </div>
        @else
        <p class="text-muted fs-5">Message content will be updated soon.</p>
        @endif
      </div>
    </div>
  </section>
  <!-- End Message Section -->

@endsection
