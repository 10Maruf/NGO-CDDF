@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Programs</li>
      </ol>
      <h2>Success Stories</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  {{-- Success Stories --}}
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <p class="text-uppercase text-center" style="color: #5cb85c; letter-spacing: 2px; font-weight: 600;">SUCCESS STORIES</p>
        <h2 class="text-center mb-4" style="font-size: 2.5rem; font-weight: 700;">Voices of Change</h2>
        <p class="text-center text-muted mb-5">Real stories from the communities we serve</p>
        @if(isset($stories) && count($stories) > 0)
            <div class="row p-3">
                @foreach($stories as $story)
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 mb-4">
              <a href="#" data-bs-toggle="modal" data-bs-target="#storyModal{{ $story->id }}" class="text-decoration-none">
                <div class="success-story-card h-100">
                  <div class="d-flex justify-content-between align-items-start">
                    <div class="rating">
                      <!-- @for($i = 1; $i <= 5; $i++)
                        @if($i <= ($story->rating ?? 0))
                          <span class="text-warning">&#9733;</span>
                        @else
                          <span class="text-warning" style="opacity: 0.35;">&#9733;</span>
                        @endif
                      @endfor -->
                    </div>
                  </div>

                  <p class="success-story-text">
                    “{{ Str::limit($story->description, 220) }}” <span class="text-primary fw-bold" style="text-decoration: none;">See more</span>
                  </p>

                  <div class="d-flex align-items-center gap-3 mt-auto">
                    @if($story->image)
                      <img
                        src="{{ asset('images/stories/'.$story->image) }}"
                        alt="{{ $story->beneficiary_name }}"
                        class="success-story-avatar"
                      />
                    @else
                      <div class="success-story-avatar bg-light border"></div>
                    @endif

                    <div>
                      <div class="success-story-name">{{ $story->beneficiary_name }}</div>
                      @if($story->beneficiary_title)
                        <div class="success-story-title">{{ $story->beneficiary_title }}</div>
                      @endif
                    </div>
                  </div>
                </div>
              </a>
            </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-muted fs-5">No success stories available at the moment.</p>
        @endif
        </div>
      </div>
    </div>

    <!-- Story Modals -->
    @if(isset($stories) && count($stories) > 0)
        @foreach($stories as $story)
        <div class="modal fade" id="storyModal{{ $story->id }}" tabindex="-1" aria-hidden="true" style="z-index: 1055;">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-0 px-4 pb-4">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            @php 
                                $modalImgPath = asset('images/stories/'.$story->image);
                                if(in_array($story->image, ['1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png','9.png','10.png','11.png','12.png'])) {
                                    $modalImgPath = asset('admin/assets/images/duralux/avatar/'.$story->image);
                                }
                            @endphp
                            <img src="{{ $modalImgPath }}" alt="{{ $story->beneficiary_name }}" class="rounded-circle border" style="width:80px;height:80px;object-fit:cover; border-color: #f86f2d !important;">
                            <div>
                                <h5 class="fw-bold mb-0 text-dark">{{ $story->beneficiary_name }}</h5>
                                <div class="text-muted small">{{ $story->beneficiary_title }}</div>
                            </div>
                        </div>
                        <div class="bg-light p-4 rounded border-start border-4" style="border-color: #f86f2d !important;">
                            <p class="mb-0 text-dark" style="white-space:pre-line; line-height: 1.8; font-size: 1rem;"><i class="fas fa-quote-left text-muted opacity-50 me-2"></i>{{ $story->description }}<i class="fas fa-quote-right text-muted opacity-50 ms-2"></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif

  </section>
  {{-- End of Success Stories --}}
@endsection
