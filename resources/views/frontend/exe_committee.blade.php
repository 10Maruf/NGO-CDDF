@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>About UMUS</li>
      </ol>
      <h2>Executive Committee</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Executive Committee Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">

      <div class="section-title">
        <h2>Governance Structure/organogram of UMUS</h2>
        <p>
            The general body of UMUS comprises of 21 renowned women rights activist women and, the Executive Committee (EC) is consisted with 07 women members. The Chief Executive is responsible to the EC and there by GB.  The members of EC are providing different support to the organization on voluntary basis. There is no conflict of interest among the members in EC and GB level. The EC meetings are held regularly on monthly basis and GB meetings are held on six monthly basis. The organization is regularly submitting the Income tax return and VAT according the Govt. rule and regulations.
        </p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col text-start">
            <h5>Organizational Structure:</h5>
                <a href="{{ asset('frontend/file/UMUS_Organogram.pdf') }}" target="blank" class="btn btn-primary border border-dark m-2" style="font-size: 20px; font-weight:500; box-shadow: 5px 5px 0 rgba(0,0,0,1);"><i class="fa-solid fa-cloud-arrow-down"></i> Organizational Structure Pdf</a>
        </div>
      </div>

      @if(isset($committee) && count($committee) > 0)
      <div class="row mt-5" data-aos="fade-up" data-aos-delay="200">
        <div class="col-12">
          <h5 class="mb-4">Executive Committee Members</h5>
        </div>
        @foreach($committee as $member)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <div class="card h-100 shadow-sm">
            @if($member->photo)
            <img src="{{ asset('images/executive_committee/'.$member->photo) }}" class="card-img-top" alt="{{ $member->name }}">
            @endif
            <div class="card-body">
              <h6 class="card-title">{{ $member->name }}</h6>
              <p class="card-text text-muted mb-1">{{ $member->designation }}</p>
              @if($member->bio)
              <p class="card-text small">{{ Str::limit($member->bio, 100) }}</p>
              @endif
              @if($member->facebook || $member->twitter || $member->instagram || $member->youtube)
              <div class="social-links mt-2">
                @if($member->facebook)
                <a href="{{ $member->facebook }}" target="_blank" class="btn btn-sm btn-outline-primary me-1"><i class="bx bxl-facebook"></i></a>
                @endif
                @if($member->twitter)
                <a href="{{ $member->twitter }}" target="_blank" class="btn btn-sm btn-outline-info me-1"><i class="bx bxl-twitter"></i></a>
                @endif
                @if($member->instagram)
                <a href="{{ $member->instagram }}" target="_blank" class="btn btn-sm btn-outline-danger me-1"><i class="bx bxl-instagram"></i></a>
                @endif
                @if($member->youtube)
                <a href="{{ $member->youtube }}" target="_blank" class="btn btn-sm btn-outline-danger"><i class="bx bxl-youtube"></i></a>
                @endif
              </div>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @endif

    </div>
  </section><!-- End Executive Committee Section -->

@endsection
