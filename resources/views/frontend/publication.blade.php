@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Stay Informed</li>
      </ol>
      <h2>Publications</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

<!-- ======= Publication Section ======= -->
  <section id="publication" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Publications</h2>
        @if(isset($publications) && count($publications) > 0)
            <div class="row p-3">
                @foreach($publications as $publication)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($publication->thumbnail)
                            <img src="{{ asset('images/publications/thumbnails/'.$publication->thumbnail) }}" 
                                 class="card-img-top" 
                                 alt="{{ $publication->title }}" 
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center bg-secondary text-white" 
                                 style="height: 200px;">
                                <i class="fa-solid fa-file-pdf fa-3x"></i>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $publication->title }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit($publication->description, 100) }}</p>
                            <div class="mt-auto">
                                @if($publication->pdf_file)
                                    <a href="{{ asset('images/publications/pdfs/'.$publication->pdf_file) }}" 
                                       target="_blank" 
                                       class="btn btn-warning border border-dark w-100" 
                                       style="font-size: 16px; font-weight:500; box-shadow: 3px 3px 0 rgba(0,0,0,1);">
                                        <i class="fa-solid fa-cloud-arrow-down"></i> Download
                                    </a>
                                @else
                                    <button class="btn btn-secondary w-100" disabled>
                                        <i class="fa-solid fa-file-pdf"></i> No PDF Available
                                    </button>
                                @endif
                                <!-- <small class="text-muted d-block mt-2 text-center">
                                    Published: {{ date('M d, Y', strtotime($publication->created_at)) }}
                                </small> -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="fa-solid fa-file-pdf fa-4x text-muted mb-3"></i>
                <p class="fs-4 text-secondary">No publications available at the moment.</p>
                <p class="text-muted">Please check back later for new publications.</p>
            </div>
        @endif
      </div>
    </div>
  </section>
<!-- End Publication Section -->

@endsection
