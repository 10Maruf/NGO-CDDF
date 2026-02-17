{{-- Footer started --}}
<div class="bg-dark" style="border-top:5px solid #28a745;">
    <div class="container py-5">
        <div class="row" id="footer_link_wrapper">
            {{-- logo and short description --}}
            <div class="col-md-4 d-flex align-items-center">
                <div>
                    <img src="{{ asset('images/application/'.application()->main_logo) }}" alt="Logo" width="75%">
                    <p class="py-3 text-justified text-white" style="font-size: 14px;">
                        UMUS (Uddipto Mohila Unnayan Sangstha) is a non-governmental organization working for Dalit women and children empowerment in Satkhira since 2003. UMUS is registered with the NGO Affairs Bureau (NGOAB) of Bangladesh.
                    </p>
                </div>
            </div>

            {{-- link and address --}}
            <div class="col-md-8 mt-5 text-white">
                <div class="row">
                    <div class="col-md-3 py-4">
                        <h5 class="pb-3">Who we are</h5>
                        <ul class="p-0 m-0" style="font-size: 14px;">
                            <li class="py-1"><a class="dropdown-item" href="{{ route('about.us') }}">About UMUS</a></li>
                            <li class="py-1"><a class="dropdown-item" href="{{ route('vision.mission') }}">Mission & Vision</a></li>
                            <li class="py-1"><a class="dropdown-item" href="{{ route('origin_affilation') }}">Origin and legal Affiliation</a></li>
                            <li class="py-1"><a class="dropdown-item" href="{{ route('partner.donor') }}">Our Partners and Donor</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 py-4">
                        <h5 class="pb-3">What we do</h5>
                        <ul class="p-0 m-0" style="font-size: 14px;">
                            <li class="py-1"><a class="dropdown-item" href="{{ route('key.focus.area') }}">Key Focus Area</a></li>
                            <li class="py-1"><a class="dropdown-item" href="{{ route('ongoing.project') }}">Ongoing Project</a></li>
                            <li class="py-1"><a class="dropdown-item" href="{{ route('project.archieve') }}">Project Archieve</a></li>
                            <li class="py-1"><a class="dropdown-item" href="{{ route('programs.all') }}">Programs</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 py-4">
                        <h5 class="pb-3">HELP</h5>
                        <ul class="p-0 m-0" style="font-size: 14px;">
                            <li class="py-1"><a href="{{ route('faq') }}" class="text-white">FAQ</a></li>
                            <li class="py-1"><a href="{{ route('donate') }}" class="text-white">Donate</a></li>
                            <li class="py-1"><a href="{{ route('policy.guideline') }}" class="text-white">Policy & Guideline</a></li>
                            {{-- <li class="py-1"><a href="#" class="text-white">Terms & Condtions</a></li> --}}
                            <li class="py-1"><a href="{{ route('volunterr.opportunities') }}" class="text-white">Volunteer Opportunities</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 py-4">
                        <h5 class="pb-3">CONTACT</h5>
                        <div class="d-flex py-2" style="font-size: 14px;">
                            <div><i class="fa-solid fa-location-dot mx-2"></i></div>
                            <div>Tala, Satkhira, Bangladesh</div>
                        </div>
                        <div class="d-flex py-2" style="font-size: 14px;">
                            <div><i class="fa-solid fa-phone mx-2"></i></div>
                            <div>01712-345678 <br>  01812-345678 </div>
                        </div>
                        <div>
                            <ul class="d-flex">
                                <li class="me-2">
                                <a href="{{ application()->facebook }}" target="blank"><i class="fa-brands fa-facebook-f px-1 text-white"></i></a>
                                </li class="mx-2">
                                <li>
                                <a href="{{ application()->twitter }}" target="blank"><i class="fa-brands fa-twitter px-1 text-white"></i></a>
                                </li>
                                <li class="mx-2">
                                <a href="{{ application()->instagram }}" target="blank"><i class="fa-brands fa-instagram px-1 text-white"></i></a>
                                </li>
                                <li class="">
                                <a href="{{ application()->youtube }}" target="blank"><i class="fa-brands fa-youtube px-1 text-white"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-end">
    <a href="#" class="btn btn-danger shadow back-to-top">
        <i class="fa fa-arrow-up" aria-hidden="true"></i>
    </a>
</div>

{{-- copyright --}}
<div class="p-3" style="background: #000;">
    <div class="container text-white d-flex justify-content-between">
       <small> Copyright © {{ date('Y') }} || All right reserved by <abbr title="Uddipto Mohila Unnayan Sangstha">UMUS</abbr></small>
       <small> Developed By: <span title="Noakhali Science and Technology University">NSTU</span> Software Development Team</small>
    </div>
</div>
