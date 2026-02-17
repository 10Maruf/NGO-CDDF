<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--favicon-->
	<link rel="icon" href="{{ asset('images/application/'.application()->fav_icon) }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('admin-assets/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin-assets/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin-assets/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin-assets/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('admin-assets/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('admin-assets/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('admin-assets/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('admin-assets/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('admin-assets/assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('admin-assets/assets/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin-assets/assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin-assets/assets/css/header-colors.css') }}" />
	<title>UMUS | Admin</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('images/application/'.application()->fav_icon) }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text text-success">UMUS</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left text-success'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{ route('admin.home') }}">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-slider-alt"></i>
						</div>
						<div class="menu-title">Slider</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('slider.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
						</li>
						<li>
                            <a href="{{ route('slider.index') }}"><i class="bx bx-right-arrow-alt"></i>All Slider</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-shape-square"></i>
						</div>
						<div class="menu-title">Ongoing Project</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('project.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Project</a>
						</li>
						<li>
                            <a href="{{ route('project.index') }}"><i class="bx bx-right-arrow-alt"></i>All Project</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-news"></i>
						</div>
						<div class="menu-title">Latest News</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('news.add') }}"><i class="bx bx-right-arrow-alt"></i>Add News</a>
						</li>
						<li>
                            <a href="{{ route('news.index') }}"><i class="bx bx-right-arrow-alt"></i>All News</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="lni lni-image"></i>
						</div>
						<div class="menu-title">Photo Gallery</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('gallery.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Photo</a>
						</li>
						<li>
                            <a href="{{ route('gallery.index') }}"><i class="bx bx-right-arrow-alt"></i>All Photo</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-bell"></i>
						</div>
						<div class="menu-title">Subscribe</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('subscribe.all') }}"><i class="bx bx-right-arrow-alt"></i>All Subscribe</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-donate-heart"></i>
						</div>
						<div class="menu-title">Donate Now</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('admin.payment_methods.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Payment Method</a>
						</li>
						<li>
                            <a href="{{ route('admin.payment_methods.index') }}"><i class="bx bx-right-arrow-alt"></i>All Payment Methods</a>
						</li>
						<li>
                            <a href="{{ route('admin.donations.index') }}"><i class="bx bx-right-arrow-alt"></i>All Donations</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-target-lock"></i>
						</div>
						<div class="menu-title">Key Focus Area</div>
					</a>
					<ul>
						<li>
							<a href="{{ route('admin.focus_areas.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Focus Area</a>
						</li>
						<li>
							<a href="{{ route('admin.focus_areas.index') }}"><i class="bx bx-right-arrow-alt"></i>All Focus Areas</a>
						</li>
					</ul>
				</li>
				{{-- <li>
					<a href="{{ route('logo.create') }}">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Application</div>
					</a>
				</li> --}}
				<li>
					<a href="{{ route('logo.create') }}">
						<div class="parent-icon"><i class='bx bx-folder'></i>
						</div>
						<div class="menu-title">Application</div>
					</a>
				</li>
				<li>
					<a href="{{ route('about.us.create') }}">
						<div class="parent-icon"><i class='bx bx-folder'></i>
						</div>
						<div class="menu-title">About us</div>
					</a>
				</li>
				<li>
					<a href="{{ route('mission.vision.create') }}">
						<div class="parent-icon"><i class='fadeIn animated bx bx-calendar-star'></i>
						</div>
						<div class="menu-title">Mission Vision</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-detail'></i>
						</div>
						<div class="menu-title">Origin & Legal Affilation</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('origin.legal_affilation.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Affilation</a>
						</li>
						<li>
                            <a href="{{ route('origin.legal_affilation.index') }}"><i class="bx bx-right-arrow-alt"></i>All Affilation</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-user-circle'></i>
						</div>
						<div class="menu-title">Executive Committee</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('executive.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Member</a>
						</li>
						<li>
                            <a href="{{ route('executive.index') }}"><i class="bx bx-right-arrow-alt"></i>All Members</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-group'></i>
						</div>
						<div class="menu-title">Team Members</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('team.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Member</a>
						</li>
						<li>
                            <a href="{{ route('team.index') }}"><i class="bx bx-right-arrow-alt"></i>All Members</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-briefcase'></i>
						</div>
						<div class="menu-title">Programs</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('programs.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Program</a>
						</li>
						<li>
                            <a href="{{ route('programs.index') }}"><i class="bx bx-right-arrow-alt"></i>All Programs</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-trending-up'></i>
						</div>
						<div class="menu-title">Impact Metrics</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('impact.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Impact</a>
						</li>
						<li>
                            <a href="{{ route('impact.index') }}"><i class="bx bx-right-arrow-alt"></i>All Impact</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-book-heart'></i>
						</div>
						<div class="menu-title">Success Stories</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('stories.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Story</a>
						</li>
						<li>
                            <a href="{{ route('stories.index') }}"><i class="bx bx-right-arrow-alt"></i>All Stories</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='lni lni-network'></i>
						</div>
						<div class="menu-title">Chief Executive Message</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('chief.message.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Message</a>
						</li>
						<li>
                            <a href="{{ route('chief.message.index') }}"><i class="bx bx-right-arrow-alt"></i>All Message</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-help-circle'></i>
						</div>
						<div class="menu-title">FAQ</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('faq.add') }}"><i class="bx bx-right-arrow-alt"></i>Add FAQ</a>
						</li>
						<li>
                            <a href="{{ route('faq.index') }}"><i class="bx bx-right-arrow-alt"></i>All FAQ</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-heart'></i>
						</div>
						<div class="menu-title">Volunteers</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('volunteers.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Opportunity</a>
						</li>
						<li>
                            <a href="{{ route('volunteers.index') }}"><i class="bx bx-right-arrow-alt"></i>All Opportunities</a>
						</li>
						<li>
                            <a href="{{ route('admin.volunteer_registrations.index') }}"><i class="bx bx-right-arrow-alt"></i>Registrations</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-message-rounded-dots'></i>
						</div>
						<div class="menu-title">User Message</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('message.index') }}"><i class="bx bx-right-arrow-alt"></i>All Message</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-user-check'></i>
						</div>
						<div class="menu-title">Partners & Donor</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('partner.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Partners & Donor</a>
						</li>
						<li>
                            <a href="{{ route('partner.index') }}"><i class="bx bx-right-arrow-alt"></i>All Partners & Donor</a>
						</li>
					</ul>
				</li>
				{{-- <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-area'></i>
						</div>
						<div class="menu-title">Key Focus Ares</div>
					</a>
					<ul>
						<li>
                            <a href="#"><i class="bx bx-right-arrow-alt"></i>Add</a>
						</li>
						<li>
                            <a href="#"><i class="bx bx-right-arrow-alt"></i>All</a>
						</li>
					</ul>
				</li> --}}
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-notification'></i>
						</div>
						<div class="menu-title">Project Archive</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('project.archive.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Project</a>
						</li>
						<li>
                            <a href="{{ route('project.archive.index') }}"><i class="bx bx-right-arrow-alt"></i>All Project</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-file'></i>
						</div>
						<div class="menu-title">Strategic Plan</div>
					</a>
					<ul>
						<li>
							<a href="{{ route('strategic_plans.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Strategic Plan</a>
						</li>
						<li>
							<a href="{{ route('strategic_plans.index') }}"><i class="bx bx-right-arrow-alt"></i>All Strategic Plan</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-file'></i>
						</div>
						<div class="menu-title">Policy and Guideline</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('policy.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Policy and Guideline</a>
						</li>
						<li>
                            <a href="{{ route('policy.index') }}"><i class="bx bx-right-arrow-alt"></i>All Policy and Guideline</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-file'></i>
						</div>
						<div class="menu-title">Publication</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('publications.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Publication</a>
						</li>
						<li>
                            <a href="{{ route('publications.index') }}"><i class="bx bx-right-arrow-alt"></i>All Publications</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-star'></i>
						</div>
						<div class="menu-title">Career</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('invoked.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Career</a>
						</li>
						<li>
                            <a href="{{ route('invoked.index') }}"><i class="bx bx-right-arrow-alt"></i>All Career</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='fadeIn animated bx bx-phone-call'></i>
						</div>
						<div class="menu-title">Contact</div>
					</a>
					<ul>
						<li>
                            <a href="{{ route('contact.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Contact</a>
						</li>
						<li>
                            <a href="{{ route('contact.index') }}"><i class="bx bx-right-arrow-alt"></i>All Contact</a>
						</li>
					</ul>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">

					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							{{-- <li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
											</div>
											<div class="app-title">Teams</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
											</div>
											<div class="app-title">Projects</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
											</div>
											<div class="app-title">Tasks</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
											</div>
											<div class="app-title">Feeds</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
											</div>
											<div class="app-title">Files</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
											</div>
											<div class="app-title">Alerts</div>
										</div>
									</div>
								</div>
							</li> --}}
							{{-- <li class="nav-item dropdown dropdown-large d-none">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>
                                <!-- Dummy notifications removed -->
							</li>
							<li class="nav-item dropdown dropdown-large d-none">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='bx bx-comment'></i>
								</a>
                                <!-- Dummy messages removed -->
							</li> --}}
						</ul>
					</div>

					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="bx bx-user"></i>
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{ Auth::user()->name }}</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							{{-- <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
							</li> --}}
							{{-- <li>
								<div class="dropdown-divider mb-0"></div>
							</li> --}}
							<li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class='bx bx-log-out-circle'></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

                @yield('content')

            </div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © {{ @date('Y') }}. All right reserved UMUS</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
    <!-- Switcher content removed -->
	{{-- <div class="switcher-wrapper">
        ...
	</div> --}}
	<!--end switcher-->

	<!-- Bootstrap JS -->
	<script src="{{ asset('admin-assets/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('admin-assets/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('admin-assets/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('admin-assets/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('admin-assets/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('admin-assets/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
	<script src="{{ asset('admin-assets/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('admin-assets/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('admin-assets/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('admin-assets/assets/plugins/jquery-knob/excanvas.js') }}"></script>
	<script src="{{ asset('admin-assets/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
	  <script>
		  $(function() {
			  $(".knob").knob();
		  });
	  </script>
	  {{-- <script src="{{ asset('admin-assets/assets/js/index.js') }}"></script> --}}
	<!--app JS-->
	<script src="{{ asset('admin-assets/assets/js/app.js') }}"></script>
	
	<!-- SweetAlert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	<script>
	// Global delete confirmation function
	function confirmDelete(event, itemName = 'this item') {
		event.preventDefault();
		const url = event.currentTarget.href;
		
		Swal.fire({
			title: 'Are you sure?',
			html: `You are about to delete <strong>${itemName}</strong>.<br>This action cannot be undone!`,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#dc3545',
			cancelButtonColor: '#6c757d',
			confirmButtonText: '<i class="bx bx-trash"></i> Yes, delete it!',
			cancelButtonText: '<i class="bx bx-x"></i> Cancel',
			focusCancel: true
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = url;
			}
		});
	}
	
	// Success message display
	@if(session('success'))
		Swal.fire({
			icon: 'success',
			title: 'Success!',
			text: '{{ session("success") }}',
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true
		});
	@endif
	
	// Error message display
	@if(session('error'))
		Swal.fire({
			icon: 'error',
			title: 'Error!',
			text: '{{ session("error") }}',
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true
		});
	@endif
	</script>
	
	<!-- Custom Scripts Stack -->
	@stack('scripts')
</body>

</html>
