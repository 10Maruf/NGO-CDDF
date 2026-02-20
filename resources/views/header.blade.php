<nav class="navbar navbar-expand-lg navbar-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/application/'.application()->main_logo) }}" alt="AFAD" id="logo" height="46">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ms-auto">

                {{-- Home --}}
                <li class="nav-item {{ request()->is('/') || request()->is('home') ? 'active' : '' }}">
                    <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') || request()->is('home') ? 'active' : '' }}">Home</a>
                </li>

                {{-- About us --}}
                @php
                    $aboutActive = request()->routeIs(
                        'about.us','vision.mission','team.members',
                        'origin_affilation','executive.committee','cheif.message',
                        'faq','photo.all'
                    );
                @endphp
                <li class="nav-item dropdown {{ $aboutActive ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle {{ $aboutActive ? 'active' : '' }}" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        About us
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                        <li><a class="dropdown-item {{ request()->routeIs('about.us') ? 'active' : '' }}" href="{{ route('about.us') }}">About CDDF</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('vision.mission') ? 'active' : '' }}" href="{{ route('vision.mission') }}">Mission, Vision & Core Values</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('team.members') ? 'active' : '' }}" href="{{ route('team.members') }}">Team Members</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('origin_affilation') ? 'active' : '' }}" href="{{ route('origin_affilation') }}">Origin and Legal Affiliation</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('executive.committee') ? 'active' : '' }}" href="{{ route('executive.committee') }}">Executive Committee</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('cheif.message') ? 'active' : '' }}" href="{{ route('cheif.message') }}">Message from Chief Executive</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('faq') ? 'active' : '' }}" href="{{ route('faq') }}">FAQ</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('photo.all') ? 'active' : '' }}" href="{{ route('photo.all') }}">Photo Gallery</a></li>
                    </ul>
                </li>

                {{-- Programs --}}
                @php
                    $programsActive = request()->routeIs(
                        'programs.all','key.focus.area','ongoing.project',
                        'project.archieve','success.stories'
                    );
                @endphp
                <li class="nav-item dropdown {{ $programsActive ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle {{ $programsActive ? 'active' : '' }}" href="#" id="programsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Programs
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="programsDropdown">
                        <li><a class="dropdown-item {{ request()->routeIs('programs.all') ? 'active' : '' }}" href="{{ route('programs.all') }}">Featured Programs</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('key.focus.area') ? 'active' : '' }}" href="{{ route('key.focus.area') }}">Key Focus Area</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('ongoing.project') ? 'active' : '' }}" href="{{ route('ongoing.project') }}">Ongoing Programs</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('project.archieve') ? 'active' : '' }}" href="{{ route('project.archieve') }}">Project Archieve</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('success.stories') ? 'active' : '' }}" href="{{ route('success.stories') }}">Success Stories</a></li>
                    </ul>
                </li>

                {{-- Get Involved --}}
                @php
                    $involvedActive = request()->routeIs(
                        'volunterr.opportunities','donate','fundraising',
                        'corporate.partnership','invoked.career'
                    );
                @endphp
                <li class="nav-item dropdown {{ $involvedActive ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle {{ $involvedActive ? 'active' : '' }}" href="#" id="involvedDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Get Involved
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="involvedDropdown">
                        <li><a class="dropdown-item {{ request()->routeIs('volunterr.opportunities') ? 'active' : '' }}" href="{{ route('volunterr.opportunities') }}">Volunteer Opportunities</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('donate') ? 'active' : '' }}" href="{{ route('donate') }}">Donate</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('fundraising') ? 'active' : '' }}" href="{{ route('fundraising') }}">Fundraising Campaign</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('corporate.partnership') ? 'active' : '' }}" href="{{ route('corporate.partnership') }}">Corporate Partnership</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('invoked.career') ? 'active' : '' }}" href="{{ route('invoked.career') }}">Career with AFAD</a></li>
                    </ul>
                </li>

                {{-- Updates --}}
                @php
                    $newsActive = request()->routeIs(
                        'latest.news.all','events.calender','youtube.video',
                        'strategic.plan','policy.guideline','publication'
                    );
                @endphp
                <li class="nav-item dropdown {{ $newsActive ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle {{ $newsActive ? 'active' : '' }}" href="#" id="eventsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Updates
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="eventsDropdown">
                        <li><a class="dropdown-item {{ request()->routeIs('latest.news.all') ? 'active' : '' }}" href="{{ route('latest.news.all') }}">News & Events</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('events.calender') ? 'active' : '' }}" href="{{ route('events.calender') }}">Events Calender</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('youtube.video') ? 'active' : '' }}" href="{{ route('youtube.video') }}">Youtube Video</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('strategic.plan') ? 'active' : '' }}" href="{{ route('strategic.plan') }}">AFAD Strategic Plan</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('policy.guideline') ? 'active' : '' }}" href="{{ route('policy.guideline') }}">Policy & Guideline</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('publication') ? 'active' : '' }}" href="{{ route('publication') }}">Publication</a></li>
                    </ul>
                </li>

                {{-- Contact --}}
                <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                </li>

                {{-- Donate CTA --}}
                <li class="nav-item cta">
                    <a href="{{ route('donate') }}" class="nav-link">
                        <i class="fa-solid fa-hand-holding-heart me-1"></i> Donate
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
