@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>About UMUS</li>
      </ol>
      <h2>About UMUS</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container" data-aos="fade-up">

      <div class="section-title bg-white py-5 px-3">
        <h2>About UMUS</h2>
        <p style="text-align:justify;">
            {{ $about_us->description }}
        </p>
      </div>

    </div>
  </section><!-- End Contact Section -->

@endsection
