@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Programs</li>
      </ol>
      <h2>Success Story</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  {{-- Featured Program Single View --}}
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Success Story</h2>
        @if(isset($story))
        <div class="row">
            <div class="col text-start">
                @if($story->image)
                <img src="{{ asset('images/stories/'.$story->image) }}" alt="{{ $story->beneficiary_name }}" class="w-50 mb-3">
                @endif
                <h3 class="mt-3">{{ $story->beneficiary_name }}</h3>
                @if($story->beneficiary_title)
                <p class="text-muted"><em>{{ $story->beneficiary_title }}</em></p>
                @endif
                <!-- <div class="rating mb-3">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $story->rating)
                            <span class="text-warning fs-5">&#9733;</span>
                        @else
                            <span class="text-muted fs-5">&#9734;</span>
                        @endif
                    @endfor
                </div> -->
                <p style="text-align: justify; word-wrap: break-word; overflow-wrap: break-word; word-break: break-word; max-width: 100%;">
                    {{ $story->description }}
                </p>
                @if($story->date)
                <p class="text-muted"><small><strong>Date:</strong> {{ date('F d, Y', strtotime($story->date)) }}</small></p>
                @endif
                <div class="py-3">
                    <a href="{{ route('success.stories') }}" class="btn btn-danger"> <i class="fa fa-angle-left" aria-hidden="true"></i> Back to Stories</a>
                </div>
            </div>
        </div>
        @else
        <p class="text-center text-muted">Story not found.</p>
        @endif
      </div>
    </div>
  </section>
  {{-- End of Featured Program Single View --}}


@endsection
