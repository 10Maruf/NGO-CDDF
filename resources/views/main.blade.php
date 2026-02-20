<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/application/'.application()->fav_icon) }}" type="image/x-icon">

    {{-- Google Fonts: Dosis (headings) + Overpass (body) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;700&family=Overpass:ital,wght@0,300;0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    {{-- AOS (Animate On Scroll) CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    {{-- Welfare Theme CSS --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/welfare-theme.css') }}">

    {{-- Custom App CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- FontAwesome 6 --}}
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    @stack('css')
</head>
<body>

    {{-- Page Loader --}}
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f86f2d"/>
        </svg>
    </div>

    @include('header')

    @yield('content')

    @include('footer')

    {{-- jQuery (full — needed for plugins) --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>

    {{-- Bootstrap 5 Bundle JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    {{-- AOS JS --}}
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script>
        // Init AOS animations
        AOS.init({ duration: 800, easing: 'ease-in-out', once: true });

        // Page loader hide on load
        $(window).on('load', function () {
            setTimeout(function () {
                $('#ftco-loader').removeClass('show');
            }, 300);
        });

        // Navbar scroll: awake / sleep behavior
        $(window).on('scroll', function () {
            var st       = $(this).scrollTop();
            var $navbar  = $('.ftco-navbar-light');

            if (st > 150) {
                if (!$navbar.hasClass('scrolled')) $navbar.addClass('scrolled');
            } else {
                if ($navbar.hasClass('scrolled')) $navbar.removeClass('scrolled sleep awake');
            }

            if (st > 350) {
                if (!$navbar.hasClass('awake')) $navbar.addClass('awake');
            } else {
                if ($navbar.hasClass('awake')) { $navbar.removeClass('awake'); $navbar.addClass('sleep'); }
            }
        });

        // Back-to-top button visibility
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 300) {
                $('.back-to-top').addClass('show-btn');
            } else {
                $('.back-to-top').removeClass('show-btn');
            }
        });
        $('.back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, 400);
        });

        // Hover dropdowns on desktop
        document.addEventListener('DOMContentLoaded', function () {
            if (window.innerWidth > 992) {
                document.querySelectorAll('.ftco-navbar-light .nav-item').forEach(function (item) {
                    item.addEventListener('mouseover', function () {
                        var link = this.querySelector('a[data-bs-toggle]');
                        if (link) { link.classList.add('show'); link.nextElementSibling.classList.add('show'); }
                    });
                    item.addEventListener('mouseleave', function () {
                        var link = this.querySelector('a[data-bs-toggle]');
                        if (link) { link.classList.remove('show'); link.nextElementSibling.classList.remove('show'); }
                    });
                });
            }
        });
    </script>

    @stack('js')

</body>
</html>
