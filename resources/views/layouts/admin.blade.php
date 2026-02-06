<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--favicon-->
	<link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('admin/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('admin/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('admin/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('admin/assets/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin/assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin/assets/css/header-colors.css') }}" />
	<title>AFADBD | Admin</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('img/logo.png') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text text-danger">AFADBD</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left text-danger'></i>
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
                            <a href="#"><i class="bx bx-right-arrow-alt"></i>Add Strategic Plan</a>
						</li>
						<li>
                            <a href="#"><i class="bx bx-right-arrow-alt"></i>All Strategic Plan</a>
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
                            <a href="#"><i class="bx bx-right-arrow-alt"></i>Add Publication</a>
						</li>
						<li>
                            <a href="#"><i class="bx bx-right-arrow-alt"></i>All Publication</a>
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
                            <a href="#"><i class="bx bx-right-arrow-alt"></i>Add Contact</a>
						</li>
						<li>
                            <a href="#"><i class="bx bx-right-arrow-alt"></i>All Contact</a>
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
							<li class="nav-item dropdown dropdown-large d-none">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
												ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
												ago</span></h6>
													<p class="msg-info">The pdf files generated</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
												ago</span></h6>
													<p class="msg-info">5.1 min avarage time response</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span
												class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">New customer comments recived</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
												ago</span></h6>
													<p class="msg-info">Successfully shipped your item</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
												ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
												ago</span></h6>
													<p class="msg-info">45% less alerts last 4 weeks</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large d-none">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
														<img src="{{ asset('admin/assets/images/avatars/avatar-1.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
														<img src="{{ asset('admin/assets/images/avatars/avatar-2.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
												sec ago</span></h6>
													<p class="msg-info">Many desktop publishing packages</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
														<img src="{{ asset('admin/assets/images/avatars/avatar-3.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
														<img src="{{ asset('admin/assets/images/avatars/avatar-4.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
												min ago</span></h6>
													<p class="msg-info">Making this the first true generator</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
														<img src="{{ asset('admin/assets/images/avatars/avatar-5.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
												ago</span></h6>
													<p class="msg-info">Duis aute irure dolor in reprehenderit</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
														<img src="{{ asset('admin/assets/images/avatars/avatar-6.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">The passage is attributed to an unknown</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
														<img src="{{ asset('admin/assets/images/avatars/avatar-7.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">The point of using Lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
														<img src="{{ asset('admin/assets/images/avatars/avatar-8.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
												ago</span></h6>
													<p class="msg-info">It was popularised in the 1960s</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
														<img src="{{ asset('admin/assets/images/avatars/avatar-9.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
														<img src="{{ asset('admin/assets/images/avatars/avatar-10.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
												ago</span></h6>
													<p class="msg-info">If you are going to use a passage</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
														<img src="{{ asset('admin/assets/images/avatars/avatar-11.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
												ago</span></h6>
													<p class="msg-info">All the Lorem Ipsum generators</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
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
			<p class="mb-0">Copyright © {{ @date('Y') }}. All right reserved AFADBD</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>

			<hr/>
			<h6 class="mb-0">Sidebar Backgrounds</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/jquery-knob/excanvas.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
	  <script>
		  $(function() {
			  $(".knob").knob();
		  });
	  </script>
	  <script src="{{ asset('admin/assets/js/index.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('admin/assets/js/app.js') }}"></script>
</body>

</html>
