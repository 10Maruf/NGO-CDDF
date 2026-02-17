@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Programs</li>
      </ol>
      <h2>Featured Programs</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  {{-- Featured Program Single View --}}
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Features Programs</h2>
        <div class="row">
            <div class="col text-start">
                <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="w-50">
                <h3 class="mt-3">Women's Empowerment Initiative</h3>
                <p style="text-align: justify;">
                    At UMUS, we believe in a future where every woman and girl in Satkhira district has the opportunity, the voice and the economic power to shape her own life. Our Women's Empowerment Initiative focuses on three interconnected pathways: education & skills training, economic empowerment, and rights & advocacy.
                    <br/>
                    Through targeted training programmes, we equip women — especially those marginalised by geography, poverty or social norms — with the practical skills and confidence needed for meaningful work and leadership. We support income-generation, access to micro-finance and linkages to local markets so that women move beyond survival-mode into sustainable livelihoods.
                    <br/>
                    Equally important, we work to shift the social and institutional environment. We partner with local institutions, community leaders, religious figures and government bodies to challenge norms, reduce gender-based violence, promote women’s rights, and build stronger networks of women-led organisations. This means safe spaces, awareness sessions, collective activism and mechanisms for women to claim their rights.
                    <br/>
                    By combining individual capacity-building with structural change, the Initiative aims to ensure that women are not just supported as beneficiaries, but as agents of change in their families, communities and beyond. Together, we’re building dignity, equity and sustainable opportunity for women — because when women thrive, whole communities do.
                </p>
                <div class="py-3">
                    <a href="{{ route('programs.all') }}" class="btn btn-danger"> <i class="fa fa-angle-left" aria-hidden="true"></i> Back to Programs</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  {{-- End of Featured Program Single View --}}


@endsection
