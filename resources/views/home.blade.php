@extends('main')

@section('title')
Uddipto Mohila Unnayan Sangstha
@endsection

@section('content')
{{-- slider --}}
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($slider as $skey => $slider)
        <div class="carousel-item @if($skey == 0) active @endif">
            <img src="{{ asset('images/slider/'.$slider->image) }}" class="d-block" alt="UMUS" width="100%" height="auto">
            <div class="carousel-caption" style="position:absolute;top:150px; text-align:left;">
                <h2 class="text-white text-start typing-text" style="font-size: 3rem">{{ $slider->title }}</span></h1>
                <div class="my-2" style="width:100px;border-bottom:5px solid #dc3545;"></div>
                <p style="font-size:1rem;" class="text-white">
                    {{ $slider->description }}
                </p>
                <a href="{{ route('donate') }}" class="btn btn-warning" style="box-shadow: 5px 5px 0 rgba(0,0,0,1);"><i class="fa-solid fa-sack-dollar"></i> Donate now</a>
            </div>
        </div>
        @endforeach
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
</div>
{{-- end of slide --}}

{{-- Who we are --}}
<div class="bg-light">
    <div class="container bg-white px-2">
        <div class="pt-5 pb-3">
            <h3 class="text-center">Who <span class="text-success">we are</span></h3>
            <p class="text-center text-secondary">The sole meaning of life is to serve humanity</p>
        </div>

        <div class="row g-4 pb-3">
            <div class="col-lg-10 col-md-12 col-12 mx-auto">
                <p class="text-center text-secondary">Uddipto Mohila Unnayan Sangstha (UMUS) is a non-governmental organization dedicated to empowering Dalit women and children in Satkhira district, Bangladesh. Established in 2003, UMUS is registered with the NGO Affairs Bureau (NGOAB) and operates primarily in Tala and Assasuni Upazilas. We work tirelessly to strengthen social security, promote legal rights, and build leadership capacity among marginalized communities.</p>
            </div>
        </div>
        <div class="text-center pb-5">
            <a href="{{ route('programs.all') }}" class="btn btn-success my-1"><i class="fa-solid fa-hands-holding-child"></i> Programs</a>
            <a href="{{ route('invoked.career') }}" class="btn btn-primary my-1"><i class="fa-solid fa-circle-nodes"></i> Get Involved</a>
            <a href="{{ route('contact') }}" class="btn btn-success my-1"><i class="fa-solid fa-phone-volume"></i> Contact us</a>
        </div>
        {{-- <hr class="py-3 mt-5 m-0"> --}}
    </div>
</div>
{{-- End of who we are --}}

{{-- Mission Vision--}}
<div class="bg-light py-5" style="background-image: url('{{ asset('img/slider/slider-2.jpg') }}');background-attachment:fixed;">
    <div class="container px-2">
        <div class="row">
            <div class="col-md-6 col-12 mx-auto">
                <h3 class="text-center text-white"><span style="border-bottom:3px solid #28a745;">Mission</span> <i class="fa-solid fa-bullseye text-success"></i></h3>
                <p style="text-align: justify;" class="text-white">
                    UMUS works to reduce discrimination and rebuild society by promoting the legal rights of marginalized women and children, with a strong focus on the Dalit community. We strive to improve access to essential services including healthcare, legal aid, and education while strengthening skills, leadership capacity, and income-generating abilities—especially for Dalit women and girls in Satkhira.
                </p>
            </div>
            <div class="col-md-6 col-12 mx-auto">
                <h3 class="text-center text-white"><span style="border-bottom:3px solid #0073ff;">Vision</span> <i class="fa-solid fa-eye-low-vision text-primary"></i></h3>
                <p style="text-align: justify;" class="text-white">
                    An equal and just society where Dalit people live with honor and dignity, are recognized as full citizens of Bangladesh, and their cultural diversity is respected and celebrated.
                </p>
            </div>
        </div>
        {{-- <hr class="py-3 m-0"> --}}
    </div>
</div>
{{-- End of Mission Vision --}}

{{-- Featured Programs --}}
<div class="bg-light">
    <div class="container bg-white px-2">
        <div class="pt-5 pb-3">
            <h3 class="text-center"> Featured <span class="text-success">Programs</span></h3>
            <p class="text-center text-secondary">Elevating Lives, Empowering Futures: UMUS Featured Programs bring transformative opportunities to communities in Satkhira, Bangladesh.</p>
        </div>

        <div class="row p-3">
            @if(isset($programs) && count($programs) > 0)
                @foreach($programs as $program)
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                    <a href="{{ route('programs.view', $program->id) }}">
                        <div class="featuredImage">
                            @if($program->image)
                            <img src="{{ asset('images/programs/'.$program->image) }}" alt="{{ $program->title }}">
                            @else
                            <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="{{ $program->title }}">
                            @endif
                            <div class="overlay">
                                <p class="h4">{{ $program->title }}</p>
                                <p class="textmuted">{{ Str::limit($program->description, 150) }}</p>
                                @if($program->status)
                                <span class="badge badge-{{ $program->status == 'active' ? 'success' : ($program->status == 'completed' ? 'secondary' : 'info') }}">{{ ucfirst($program->status) }}</span>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            @else
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                <a href="#">
                    <div class="featuredImage">
                        <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        <div class="overlay">
                            <p class="h4">Women's Empowerment Initiative</p>
                            <p class="textmuted"> Promoting gender equality and empowerment through education, skill-building, and advocacy for women's rights.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                <a href="#">
                    <div class="featuredImage">
                        <img src="https://images.pexels.com/photos/2659475/pexels-photo-2659475.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        <div class="overlay">
                            <p class="h4">Youth Development Project</p>
                            <p class="textmuted"> Empowering the next generation through mentorship, education, and community engagement to foster leadership.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                <a href="#">
                    <div class="featuredImage">
                        <img src="https://images.pexels.com/photos/4388165/pexels-photo-4388165.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        <div class="overlay">
                            <p class="h4">Healthcare Access Program</p>
                            <p class="textmuted">Providing essential healthcare services, awareness campaigns, and medical assistance to underserved communities in Bangladesh.</p>
                        </div>
                    </div>
                </a>
            </div>
            @endif
        </div>

        <div class="d-flex justify-content-center pt-5 pb-3">
            <a href="{{ route('programs.all') }}" class="btn btn-danger"><i class="fa-solid fa-eye"></i> View all Programs</a>
        </div>
        <hr class="py-3 mt-4 m-0">
    </div>
</div>
{{-- End of Featured Programs --}}

{{-- Ongoing Project --}}
<div class="bg-light">
    <div class="container bg-white px-2">
        <div class="pt-3 pb-3">
            <h3 class="text-center">Ongoing <span class="text-danger">Projects</span></h3>
            <p class="text-center text-secondary">UMUS's Ongoing Projects actively address community needs, fostering sustainable development in Satkhira district.</p>
        </div>

        {{-- card --}}
        <div class="row row-cols-1 row-cols-md-3 g-3">
            @foreach ($project as $key=>$project)
                <div class="col">
                    <div class="card shadow border-0">
                        <img src="{{ asset('images/project/'.$project->image) }}" class="card-img-top" alt="activity" width="100%" height="200px">
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ Str::limit( $project->title ,15, '...') }}
                            </h4>
                            <p class="text-secondary" style="font-size: 12px;">
                                <i class="fas fa-calendar-minus"></i>
                                {{ date("d/m/Y  h:i:s a") }}
                            </p>
                            <hr>
                            <p class="card-text py-1">
                                {{ Str::limit($project->description, 75,"...") }}
                            </p>
                            <a href="{{ route('ongoing.project.view',$project->id) }}" class="text-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i> Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center py-5">
            <a href="{{ route('ongoing.project') }}" class="btn btn-danger"> <i class="fa-solid fa-eye"></i> VIEW ALL PROJECTS</a>
        </div>
        {{-- card --}}

    </div>
</div>

{{-- Sponsor --}}
<div style="background-image: url('{{asset('img/slider/slider-1.jpg')}}');border-top:5px solid rgb(255, 0, 68);border-bottom:5px solid rgb(255, 0, 68);">
    <div class="container py-5">
        <h4 class="text-uppercasse text-white text-center"><span class="text-danger">Sponsor</span> for Growing Fund</h4>
        <div class="d-flex justify-content-center">
            <p class="text-white text-center py-3">
            Sponsor UMUS's growing fund to fuel impactful initiatives in Satkhira district, empowering communities and fostering positive change. Your support drives essential programs in healthcare, education, and community resilience, making a lasting difference in the lives of those in need. Join us in our mission to create a brighter future for all.
        </p>
        </div>

        <div class="d-flex justify-content-center">
            <a href="{{ route('contact') }}" class="btn btn-danger fw-blod"><i class="fa-solid fa-hand-holding-dollar"></i> Become a Sponsor</a>
        </div>

    </div>
</div>
{{-- End of Sponsor --}}

{{-- Latest News and Events --}}
<div class="bg-light">
    <div class="container bg-white pt-5">
        <div class="py-3">
            <h3 class="text-center">Latest News<span class="text-danger"> & Events</span></h3>
            <p class="text-center text-secondary">The sole meaning of life is to serve humanity</p>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($news as $key=>$data)
                <div class="col">
                    <div class="card border-0 shadow">
                        <img src="{{ asset('images/news/'.$data->image) }}" class="card-img-top" alt="activity" width="100%" height="200px">
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($data->title, 30 , '...') }}</h5>
                            <p class="text-secondary" style="font-size: 12px;">
                                <i class="fas fa-calendar-minus"></i>
                                {{ date("d/m/Y  h:i:s a") }}
                            </p>
                            <p class="card-text py-3">
                                {{ Str::limit($data->description, 75, '...') }}
                            </p>
                            <a href="{{ route('latest.news.view',$data->id) }}" class="text-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i> Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center py-5">
            <a href="{{ route('latest.news.all') }}" class="btn btn-danger"><i class="fa-solid fa-eye"></i> View all News & Events</a>
        </div>
    </div>
</div>
{{-- End of Latest News and Events --}}


{{-- Volunteer part --}}
<div style=" background-image: url('{{asset('img/slider/slider-1.jpg')}}');background-attachment:fixed;">
    <div class="container">
        <div class="row p-5">
            <div class="col-md-12">
                <h4 class="text-uppercasse text-white text-center"><span class="text-danger">Become</span> a Volunteer</h4>
                <p class="text-white py-2 text-center">
                    Sponsor UMUS's growing fund to fuel impactful initiatives in Satkhira district, empowering communities and fostering positive change. Your support drives essential programs in healthcare, education, and community resilience, making a lasting difference in the lives of those in need. Join us in our mission to create a brighter future for all.
                </p>
                <div class="text-center">
                    <a href="{{ route('volunteer.register') }}" class="btn btn-danger"><i class="fa-solid fa-user-plus"></i> Registration</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end of volunteer part --}}

{{-- Photo Gallery --}}
<div class="bg-light">
    <div class="container bg-white">
        <div class="pt-5 pb-2">
            <h3 class="text-center">Photo <span class="text-danger">Gallery</span></h3>
            <p class="text-center text-secondary">Stay updated with UMUS's latest news and events, offering insights into our impactful initiatives and community engagements.</p>
        </div>

        {{-- photo --}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-2">
            @foreach ($gallery as $key => $data)
                <div class="col mt-3">
                    <img src="{{ asset('images/gallery/'.$data->image) }}" class="img-fluid rounded" alt="image">
                </div>
            @endforeach
        </div>
        {{-- button --}}
        <div class="d-flex justify-content-center py-5">
            <a href="{{ route('photo.all') }}" class="btn btn-danger"><i class="fa-solid fa-eye"></i> See all Photos</a>
        </div>
    </div>
</div>
{{-- End of Photo Gallery --}}

{{-- Impact part --}}
<div style="background-image: url('{{asset('img/map.png')}}'); background-attachment:fixed;">
    <div class="container">
        <div class="p-5">
            <h4 class="text-uppercasse text-white text-center"><span class="text-danger">Our</span> Impact</h4>
            <div class="row justify-content-sm-center">
                <div class="col-md-6">
                    <p class="text-white py-2 text-center">
                        Transforming lives and communities in Satkhira district through sustainable development initiatives, empowering individuals and fostering positive change. Join us in making a lasting difference for a brighter future.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                @if(isset($impact) && count($impact) > 0)
                    @foreach($impact as $item)
                    <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                        @if($item->icon)
                        <i class="{{ $item->icon }} text-secondary pt-3"></i>
                        @endif
                        <h6>{{ $item->title }}</h6>
                        <h2 class="text-danger fw-bold">{{ number_format($item->metric_value) }}{{ $item->metric_unit == 'Women' || $item->metric_unit == 'Students' || $item->metric_unit == 'Families' || $item->metric_unit == 'Cases' || $item->metric_unit == 'Villages' || $item->metric_unit == 'Beneficiaries' || $item->metric_unit == 'Hours' || $item->metric_unit == 'Campaigns' ? '+' : '' }}</h2>
                        @if($item->metric_unit)
                        <p class="small text-muted mb-0">{{ $item->metric_unit }}</p>
                        @endif
                    </div>
                    @endforeach
                @else
                    {{-- Fallback static data --}}
                    <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                        <i class="fa-regular fa-calendar-check text-secondary pt-3"></i>
                        <h6>Year</h6>
                        <h2 class="text-danger fw-bold">1998</h2>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                        <i class="fa-solid fa-map-location-dot text-secondary pt-3"></i>
                        <h6>District</h6>
                        <h2 class="text-danger fw-bold">03</h2>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                        <i class="fa-solid fa-hands-holding-circle text-secondary pt-3"></i>
                        <h6>Project</h6>
                        <h2 class="text-danger fw-bold">41</h2>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                        <i class="fa-solid fa-users-viewfinder text-secondary pt-3"></i>
                        <h6>People</h6>
                        <h2 class="text-danger fw-bold">1.3M</h2>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
{{-- End of Impact part --}}

{{-- Success Stories --}}
<div class="bg-light pb-5" style=" background-image: url('{{asset('img/testimonial_back.jpg')}}');">
    <div class="container">
        <div class="py-5">
            <h3 class="text-center text-white">Success Stories</h3>
        </div>
        
        {{-- Rating Filter --}}
        <div class="text-center mb-4">
            <button class="btn btn-light me-2 filter-btn" data-rating="5">5 Star</button>
            <button class="btn btn-light me-2 filter-btn" data-rating="4">4 Star</button>
            <button class="btn btn-light me-2 filter-btn" data-rating="3">3 Star</button>
            <button class="btn btn-light me-2 filter-btn" data-rating="2">2 Star</button>
            <button class="btn btn-light me-2 filter-btn" data-rating="1">1 Star</button>
            <button class="btn btn-light filter-btn active" data-rating="0">All</button>
        </div>
        
        {{-- Success Stories Slider --}}
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($stories as $index => $story)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }} story-item" data-rating="{{ $story->rating }}">
                    <div class="text-center px-3">
                        <div class="rating mb-3">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $story->rating)
                                    <span class="text-warning fs-4">&#9733;</span>
                                @else
                                    <span class="text-white fs-4">&#9734;</span>
                                @endif
                            @endfor
                        </div>
                        <p class="text-white mt-3 mb-4 px-2" style="font-style: italic; font-size: 1.1rem; word-wrap: break-word; overflow-wrap: break-word;">"{{ Str::limit($story->description, 200) }}"</p>
                        <img src="{{ asset('images/stories/'.$story->image) }}" class="img-fluid rounded-circle border" alt="{{ $story->beneficiary_name }}" width="100" height="100">
                        <h5 class="mt-3 text-white mb-0">{{ $story->beneficiary_name }}</h5>
                        <p class="text-muted" style="color: #ddd !important;">{{ $story->beneficiary_title }}</p>
                    </div>
                </div>
                @empty
                <!-- Default Testimonial if no stories exist -->
                <div class="carousel-item active story-item" data-rating="3">
                    <div class="text-center">
                        <img src="{{ asset('img/testimonial.jpg') }}" class="img-fluid rounded-circle border" alt="Testimonial" width="100" height="100">
                        <h5 class="mt-3 text-white">Jane Alam</h5>
                        <p class="text-white">UMUS's tireless efforts in promoting education, healthcare, and economic opportunities have transformed the lives of many marginalized individuals in Satkhira. Their holistic approach to development is making a lasting difference in our region.</p>
                        <div class="rating">
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-white">&#9734;</span>
                            <span class="text-white">&#9734;</span>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            <!-- Carousel Controls -->
            @if($stories && count($stories) > 1)
            <button class="carousel-control-prev text-dark" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            @endif
        </div>
        {{-- End of Success Stories Slider --}}
    </div>
</div>
{{-- End of Success Stories --}}

<script>
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const selectedRating = this.getAttribute('data-rating');
        
        // Update active button
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        
        // Filter stories
        const stories = document.querySelectorAll('.story-item');
        stories.forEach(story => {
            if (selectedRating === '0') {
                story.style.display = 'block';
            } else {
                story.style.display = story.getAttribute('data-rating') === selectedRating ? 'block' : 'none';
            }
        });
    });
});
</script>

{{-- subscription part --}}
<div class="bg-light pb-5">
    <div class="container bg-white pb-5 rounded">
        <div class="py-5">
            <h3 class="text-center"><span class="text-danger">Stay</span> connected <span class="text-danger"> with us</span></h3>
            <p class="text-center text-secondary">Keep in touch with our activities throughout the world by subscribing to our e-newsletter.</p>
        </div>
        <div>
            @if (session()->has('success'))
                <div class="alert alert-success w-75 mx-auto text-center">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form action="{{ route('user.subscribe') }}" method="post">
                @csrf
                <div class="d-flex justify-content-center">
                    <div class="w-75 mx-auto">
                        <div class="row">
                            <div class="col-md-4 my-2">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your Name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email" value="{{ old('email') }}" required>
                                 @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <button class="btn w-100 btn-danger my-2" type="submit">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- end of subscription part --}}
@endsection

@push('js')

@endpush
