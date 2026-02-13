<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--favicon-->
	<link rel="icon" href="{{ asset('images/application/'.application()->fav_icon) }}" type="image/png" />
	<!--! BEGIN: Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/bootstrap.min.css') }}" />
	<!--! END: Bootstrap CSS-->
	<!--! BEGIN: Vendors CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/css/vendors.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/css/daterangepicker.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/css/feather.min.css') }}" />
	<!--! END: Vendors CSS-->
	<!--! BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/theme.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/custom-logo.css') }}" />
    <!--! Legacy Icons CSS (Restore for Boxicons compatibility) -->
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">
	<!--! END: Custom CSS-->
	<style>
		/* Duralux Native Dark Mode Implementation */
		html.app-skin-dark {
			background-color: #1e2139;
			color: #b8c2cc;
		}
		
		html.app-skin-dark .nxl-header {
			background-color: #242736;
			border-color: #2f3349;
		}
		
		html.app-skin-dark .nxl-navigation {
			background-color: #1e2139;
			border-color: #2f3349;
		}
		
		html.app-skin-dark .nxl-navigation .nxl-navbar .nxl-item .nxl-link {
			color: #b8c2cc;
		}
		
		html.app-skin-dark .nxl-navigation .nxl-navbar .nxl-item .nxl-link:hover {
			background-color: #2f3349;
			color: #fff;
		}
		
		html.app-skin-dark .nxl-navigation .nxl-navbar .nxl-item.nxl-caption > label {
			color: #6c757d;
		}
		
		html.app-skin-dark .card {
			background-color: #242736;
			border-color: #2f3349;
			color: #b8c2cc;
		}
		
		html.app-skin-dark .main-content {
			background-color: #1e2139;
		}
		
		html.app-skin-dark .table {
			color: #b8c2cc;
		}
		
		html.app-skin-dark .table th {
			border-color: #2f3349;
			background-color: #242736;
		}
		
		html.app-skin-dark .table td {
			border-color: #2f3349;
		}
		
		html.app-skin-dark .form-control {
			background-color: #2f3349;
			border-color: #495057;
			color: #b8c2cc;
		}
		
		html.app-skin-dark .form-control:focus {
			background-color: #2f3349;
			border-color: #6c757d;
			color: #b8c2cc;
		}
		
		html.app-skin-dark .dropdown-menu {
			background-color: #242736;
			border-color: #2f3349;
		}
		
		html.app-skin-dark .dropdown-item {
			color: #b8c2cc;
		}
		
		html.app-skin-dark .dropdown-item:hover {
			background-color: #2f3349;
			color: #fff;
		}
		
		html.app-skin-dark .nxl-h-dropdown {
			background-color: #242736;
			border-color: #2f3349;
		}
		
		html.app-skin-dark .notifications-head,
		html.app-skin-dark .notifications-footer {
			background-color: #2f3349;
			border-color: #495057;
		}
		
		html.app-skin-dark .notifications-item {
			border-color: #2f3349;
		}
		
		html.app-skin-dark .text-dark {
			color: #b8c2cc !important;
		}
		
		html.app-skin-dark .text-muted {
			color: #6c757d !important;
		}
		
		/* Additional Duralux Navigation and Header Dark Mode */
		html.app-navigation-dark .nxl-navigation {
			background-color: #1e2139;
		}
		
		html.app-header-dark .nxl-header {
			background-color: #242736;
		}
		
		/* Auto-apply navigation and header dark when skin is dark */
		html.app-skin-dark .nxl-navigation {
			background-color: #1e2139;
		}
		
		html.app-skin-dark .nxl-header {
			background-color: #242736;
		}
		
		/* Header Icons Styling */
		.nxl-head-link {
			display: flex;
			align-items: center;
			justify-content: center;
			width: 40px;
			height: 40px;
			border-radius: 6px;
			transition: all 0.3s ease;
			position: relative;
		}
		
		.nxl-head-link:hover {
			background-color: rgba(13, 110, 253, 0.1);
			color: #0d6efd;
		}
		
		html.app-skin-dark .nxl-head-link:hover {
			background-color: rgba(255, 255, 255, 0.1);
			color: #fff;
		}
		
		.nxl-h-badge {
			position: absolute;
			top: 4px;
			right: 4px;
			font-size: 9px;
			min-width: 16px;
			height: 16px;
			border-radius: 8px;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		
		/* Notification Dropdown Styling */
		.notifications-item {
			display: flex;
			align-items: flex-start;
			padding: 12px 16px;
			border-bottom: 1px solid #eee;
		}
		
		.notifications-desc {
			flex: 1;
			margin-left: 12px;
			margin-right: 12px;
		}
		
		.notifications-date {
			flex-shrink: 0;
		}
		
		/* Search Dropdown */
		.nxl-search-dropdown {
			min-width: 350px;
		}

		/* Active Menu Item Styling */
		.nxl-item.active > .nxl-link,
		.nxl-item .nxl-submenu .nxl-item.active > .nxl-link {
			background-color: rgba(52, 111, 238, 0.1); /* Primary color with transparency */
			color: #346fee;
			border-radius: 4px;
			font-weight: 600;
		}
		
		/* Dark Mode Active Menu Item */
		html.app-skin-dark .nxl-item.active > .nxl-link,
		html.app-skin-dark .nxl-item .nxl-submenu .nxl-item.active > .nxl-link {
			background-color: rgba(255, 255, 255, 0.1);
			color: #ffffff;
		}

		.nxl-item .nxl-submenu .nxl-item.active > .nxl-link:before {
			background-color: #346fee;
		}

		html.app-skin-dark .nxl-item .nxl-submenu .nxl-item.active > .nxl-link:before {
			background-color: #ffffff;
		}

		/* Fix for minimized sidebar submenu width */
		.nxl-navigation.minimenu .nxl-submenu {
			width: max-content !important;
			min-width: 220px !important;
		}

		/* Ensure active submenus are visible when sidebar is expanded */
		.nxl-navigation:not(.minimenu) .nxl-item.nxl-trigger > .nxl-submenu {
			display: block;
		}
		
		.nxl-navigation.minimenu .nxl-submenu .nxl-item .nxl-link {
			white-space: nowrap !important;
			width: 100% !important;
			display: block !important;
			padding-right: 15px !important;
		}

		.search-form {
			padding: 12px;
		}
		
		/* Enhanced Icon Sizing */
		.feather-search, .feather-bell, .feather-moon, .feather-sun, .feather-maximize, .feather-minimize {
			width: 20px;
			height: 20px;
			display: inline-block;
			vertical-align: middle;
		}

		/* Flag Icon Styles */
		.flag-icon {
			width: 20px;
			height: 20px;
			border-radius: 50%;
			display: inline-block;
			position: relative;
			overflow: hidden;
			border: 1px solid #dee2e6;
			box-shadow: 0 1px 3px rgba(0,0,0,0.1);
		}
		
		.flag-icon.bd {
			background: linear-gradient(45deg, #006A4E 0%, #006A4E 100%);
		}
		
		.flag-icon.bd::after {
			content: '';
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 8px;
			height: 8px;
			background: #DC143C;
			border-radius: 50%;
		}
		
		.flag-icon.us {
			background: linear-gradient(to bottom, 
				#B22234 0%, #B22234 7.7%, 
				#FFFFFF 7.7%, #FFFFFF 15.4%, 
				#B22234 15.4%, #B22234 23.1%, 
				#FFFFFF 23.1%, #FFFFFF 30.8%, 
				#B22234 30.8%, #B22234 38.5%, 
				#FFFFFF 38.5%, #FFFFFF 46.2%, 
				#B22234 46.2%, #B22234 53.9%, 
				#FFFFFF 53.9%, #FFFFFF 61.6%, 
				#B22234 61.6%, #B22234 69.3%, 
				#FFFFFF 69.3%, #FFFFFF 77%, 
				#B22234 77%, #B22234 84.7%, 
				#FFFFFF 84.7%, #FFFFFF 92.4%, 
				#B22234 92.4%, #B22234 100%);
			position: relative;
		}
		
		.flag-icon.us::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 40%;
			height: 53.9%;
			background: #3C3B6E;
			border-radius: 50% 0 50% 0;
		}
		
		.flag-icon:hover {
			transform: scale(1.1);
			transition: transform 0.2s ease;
		}
		
		/* Enhanced language dropdown styling */
		.language-item {
			display: flex;
			align-items: center;
			padding: 8px 12px;
			border-radius: 6px;
			transition: all 0.2s ease;
			margin-bottom: 4px;
		}
		
		.language-item:hover {
			background: linear-gradient(45deg, #f8f9fa, #e9ecef);
			transform: translateX(2px);
		}
		
		.language-text {
			margin-left: 10px;
			font-weight: 500;
			font-size: 14px;
		}
		
		
		.wd-20 {
			width: 20px;
			height: 20px;
		}
		
		.wd-35 {
			width: 35px;
		}
		
		.ht-35 {
			height: 35px;
		}
		
		.fs-11 {
			font-size: 11px;
		}
		
		.fs-12 {
			font-size: 12px;
		}
		
		.fs-13 {
			font-size: 13px;
		}
		
		.fw-medium {
			font-weight: 500;
		}
		
		/* Header dropdown improvements */
		.nxl-h-dropdown {
			border: 1px solid #dee2e6;
			box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
		}
		
		.notifications-head {
			padding: 12px 16px;
			border-bottom: 1px solid #dee2e6;
			background-color: #f8f9fa;
		}
		
		.notifications-footer {
			padding: 12px 16px;
			border-top: 1px solid #dee2e6;
			background-color: #f8f9fa;
		}
	</style>
	@stack('styles')
	<!--! ================================================================ !-->
	<!--! [Start] Navigation Menu !-->
	<!--! ================================================================ !-->
	<nav class="nxl-navigation">
		<div class="navbar-wrapper">
			<div class="m-header">
				<a href="{{ route('admin.home') }}" class="b-brand">
					<img src="{{ asset('admin/assets/images/duralux/CDDF_logo.png') }}" alt="logo" class="logo logo-lg" />
					<img src="{{ asset('admin/assets/images/duralux/CDDF_logo.png') }}" alt="logo" class="logo logo-sm" />
				</a>
			</div>
			<div class="navbar-content">
				<ul class="nxl-navbar">
					<li class="nxl-item nxl-caption">
						<label>Navigation</label>
					</li>
					<li class="nxl-item">
						<a href="{{ route('admin.home') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-home"></i></span>
							<span class="nxl-mtext" data-translate="dashboard">Dashboard</span>
						</a>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-image"></i></span>
							<span class="nxl-mtext" data-translate="slider">Slider</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('slider.add') }}" data-translate="add_slider">Add Slider</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('slider.index') }}" data-translate="all_slider">All Slider</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-folder"></i></span>
							<span class="nxl-mtext" data-translate="ongoing_project">Ongoing Project</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('project.add') }}" data-translate="add_project">Add Project</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('project.index') }}" data-translate="all_project">All Project</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-file-text"></i></span>
							<span class="nxl-mtext" data-translate="latest_news">Latest News</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('news.add') }}" data-translate="add_news">Add News</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('news.index') }}" data-translate="all_news">All News</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-camera"></i></span>
							<span class="nxl-mtext" data-translate="photo_gallery">Photo Gallery</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('gallery.add') }}" data-translate="add_photo">Add Photo</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('gallery.index') }}" data-translate="all_photo">All Photo</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-bell"></i></span>
							<span class="nxl-mtext" data-translate="subscribe">Subscribe</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('subscribe.all') }}" data-translate="all_subscribe">All Subscribe</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-heart"></i></span>
							<span class="nxl-mtext" data-translate="donate_now">Donate Now</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('admin.payment_methods.add') }}" data-translate="add_payment_method">Add Payment Method</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('admin.payment_methods.index') }}" data-translate="all_payment_methods">All Payment Methods</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('admin.donations.index') }}" data-translate="all_donations">All Donations</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-target"></i></span>
							<span class="nxl-mtext" data-translate="key_focus_area">Key Focus Area</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('admin.focus_areas.add') }}" data-translate="add_focus_area">Add Focus Area</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('admin.focus_areas.index') }}" data-translate="all_focus_areas">All Focus Areas</a></li>
						</ul>
					</li>
					<li class="nxl-item">
						<a href="{{ route('logo.create') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-settings"></i></span>
							<span class="nxl-mtext" data-translate="application">Application</span>
						</a>
					</li>
					<li class="nxl-item">
						<a href="{{ route('about.us.create') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-info"></i></span>
							<span class="nxl-mtext" data-translate="about_us">About Us</span>
						</a>
					</li>
					<li class="nxl-item">
						<a href="{{ route('mission.vision.create') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-award"></i></span>
							<span class="nxl-mtext" data-translate="mission_vision">Mission Vision</span>
						</a>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-file"></i></span>
							<span class="nxl-mtext" data-translate="origin_legal">Origin & Legal Affilation</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('origin.legal_affilation.create') }}" data-translate="add_affilation">Add Affilation</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('origin.legal_affilation.index') }}" data-translate="all_affilation">All Affilation</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-user"></i></span>
							<span class="nxl-mtext" data-translate="executive_committee">Executive Committee</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('executive.add') }}" data-translate="add_member">Add Member</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('executive.index') }}" data-translate="all_members">All Members</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-users"></i></span>
							<span class="nxl-mtext" data-translate="team_members">Team Members</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('team.add') }}" data-translate="add_member">Add Member</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('team.index') }}" data-translate="all_members">All Members</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-briefcase"></i></span>
							<span class="nxl-mtext" data-translate="programs">Programs</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('programs.add') }}" data-translate="add_program">Add Program</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('programs.index') }}" data-translate="all_programs">All Programs</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-trending-up"></i></span>
							<span class="nxl-mtext" data-translate="impact_metrics">Impact Metrics</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('impact.add') }}" data-translate="add_impact">Add Impact</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('impact.index') }}" data-translate="all_impact">All Impact</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-star"></i></span>
							<span class="nxl-mtext" data-translate="success_stories">Success Stories</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('stories.add') }}" data-translate="add_story">Add Story</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('stories.index') }}" data-translate="all_stories">All Stories</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-message-circle"></i></span>
							<span class="nxl-mtext" data-translate="chief_message">Chief Executive Message</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('chief.message.add') }}" data-translate="add_message">Add Message</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('chief.message.index') }}" data-translate="all_message">All Message</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-help-circle"></i></span>
							<span class="nxl-mtext" data-translate="faq">FAQ</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('faq.add') }}" data-translate="add_faq">Add FAQ</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('faq.index') }}" data-translate="all_faq">All FAQ</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-smile"></i></span>
							<span class="nxl-mtext" data-translate="volunteers">Volunteers</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('volunteers.add') }}" data-translate="add_opportunity">Add Opportunity</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('volunteers.index') }}" data-translate="all_opportunities">All Opportunities</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-mail"></i></span>
							<span class="nxl-mtext" data-translate="user_message">User Message</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('message.index') }}" data-translate="all_message">All Message</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-gift"></i></span>
						<span class="nxl-mtext" data-translate="partners_donor">Partners & Donor</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('partner.create') }}" data-translate="add_partners_donor">Add Partners & Donor</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('partner.index') }}" data-translate="all_partners_donor">All Partners & Donor</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-archive"></i></span>
							<span class="nxl-mtext" data-translate="project_archive">Project Archive</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('project.archive.create') }}" data-translate="add_project">Add Project</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('project.archive.index') }}" data-translate="all_project">All Project</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-clipboard"></i></span>
							<span class="nxl-mtext" data-translate="strategic_plan">Strategic Plan</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('strategic_plans.create') }}" data-translate="add_strategic_plan">Add Strategic Plan</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('strategic_plans.index') }}" data-translate="all_strategic_plan">All Strategic Plan</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-shield"></i></span>
							<span class="nxl-mtext" data-translate="policy_guideline">Policy and Guideline</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('policy.create') }}" data-translate="add_policy_guideline">Add Policy and Guideline</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('policy.index') }}" data-translate="all_policy_guideline">All Policy and Guideline</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-book"></i></span>
							<span class="nxl-mtext" data-translate="publication">Publication</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('publications.add') }}" data-translate="add_publication">Add Publication</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('publications.index') }}" data-translate="all_publications">All Publications</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-flag"></i></span>
							<span class="nxl-mtext" data-translate="career">Career</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('invoked.create') }}" data-translate="add_career">Add Career</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('invoked.index') }}" data-translate="all_career">All Career</a></li>
						</ul>
					</li>
					<li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-phone"></i></span>
							<span class="nxl-mtext" data-translate="contact">Contact</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('contact.add') }}">Add Contact</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('contact.index') }}">All Contact</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--! ================================================================ !-->
	<!--! [End] Navigation Menu !-->
	<!--! ================================================================ !-->
	<!--! ================================================================ !-->
	<!--! [Start] Header !-->
	<!--! ================================================================ !-->
	<header class="nxl-header">
		<div class="header-wrapper">
			<!--! [Start] Header Left !-->
			<div class="header-left d-flex align-items-center gap-4">
				<!--! [Start] nxl-head-mobile-toggler !-->
				<a href="javascript:void(0);" class="nxl-head-mobile-toggler" id="mobile-collapse">
					<div class="hamburger hamburger--arrowturn">
						<div class="hamburger-box">
							<div class="hamburger-inner"></div>
						</div>
					</div>
				</a>
				<!--! [End] nxl-head-mobile-toggler !-->
				<!--! [Start] nxl-navigation-toggle !-->
				<div class="nxl-navigation-toggle">
					<a href="javascript:void(0);" id="menu-mini-button">
						<i class="feather-align-left"></i>
					</a>
					<a href="javascript:void(0);" id="menu-expend-button" style="display: none">
						<i class="feather-arrow-right"></i>
					</a>
				</div>
				<!--! [End] nxl-navigation-toggle !-->
			</div>
			<!--! [End] Header Left !-->
			<!--! [Start] Header Right !-->
			<div class="header-right ms-auto">
				<div class="d-flex align-items-center">
					<!--! [Start] Header Search !-->
					<div class="dropdown nxl-h-item nxl-header-search">
						<a href="javascript:void(0);" class="nxl-head-link me-0" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
							<i class="feather-search"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-search-dropdown">
							<div class="input-group search-form">
								<span class="input-group-text">
									<i class="feather-search fs-6 text-muted"></i>
								</span>
								<input type="text" class="form-control search-input-field" placeholder="Search..." />
								<span class="input-group-text">
									<button type="button" class="btn-close">
									</button>
								</span>
							</div>
							<div class="dropdown-divider mt-0"></div>
							<div class="search-items-wrapper">
								<div class="searching-for px-3 py-2">
									<p class="fs-11 fw-medium text-muted">I'm searching for...</p>
									<div class="d-flex flex-wrap gap-1">
										<a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold text-muted">Projects</a>
										<a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold text-muted">Donations</a>
										<a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold text-muted">Messages</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--! [End] Header Search !-->
					<!--! [Start] Header Language !-->
					<div class="dropdown nxl-h-item">
						<a href="javascript:void(0);" class="nxl-head-link me-0" data-bs-toggle="dropdown" role="button" data-bs-auto-close="outside" id="current-language">
							<div class="flag-icon bd" id="current-flag"></div>
						</a>
						<div class="dropdown-menu dropdown-menu-end nxl-h-dropdown" style="min-width: 250px;">
							<div class="dropdown-header px-3 py-2">
								<h6 class="fs-13 text-dark mb-0" data-translate="select_language">Select Language</h6>
								<small class="text-muted" data-translate="languages_available">2 languages available!</small>
							</div>
							<div class="dropdown-divider mt-0"></div>
							<div class="px-3 pb-2">
								<a href="javascript:void(0);" class="dropdown-item language-item p-0" onclick="changeLanguage('bd', 'Bengali', 'বাংলা')">
									<div class="flag-icon bd"></div>
									<span class="language-text">বাংলা (Bengali)</span>
								</a>
								<a href="javascript:void(0);" class="dropdown-item language-item p-0" onclick="changeLanguage('us', 'English', 'English')">
									<div class="flag-icon us"></div>
									<span class="language-text">English</span>
								</a>
							</div>
						</div>
					</div>
					<!--! [End] Header Language !-->
					<!--! [Start] Header Fullscreen !-->
					<div class="nxl-h-item d-none d-sm-flex">
						<a href="javascript:void(0);" class="nxl-head-link me-0" id="fullscreen-toggle" onclick="toggleFullscreen();">
							<i class="feather-maximize" id="maximize-icon"></i>
							<i class="feather-minimize" id="minimize-icon" style="display: none;"></i>
						</a>
					</div>
					<!--! [End] Header Fullscreen !-->
					<!--! [Start] Header Theme Mode !-->
					<div class="nxl-h-item d-none d-sm-flex">
						<a href="javascript:void(0);" class="nxl-head-link me-0" data-bs-toggle="tooltip" title="Light/Dark Mode">
							<i class="feather-moon"></i>
						</a>
					</div>
					<!--! [End] Header Theme Mode !-->
					<!--! [Start] Header Notifications !-->
					<div class="dropdown nxl-h-item">
						<a class="nxl-head-link me-0" data-bs-toggle="dropdown" href="#" role="button" data-bs-auto-close="outside" aria-expanded="false">
							<i class="feather-bell"></i>
							<span class="badge bg-danger nxl-h-badge">3</span>
						</a>
						<div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-notifications-menu">
							<div class="d-flex justify-content-between align-items-center notifications-head">
								<h6 class="fw-bold text-dark mb-0">Notifications</h6>
								<span class="fs-11 text-muted">(3 unread)</span>
							</div>
							<div class="notifications-item">
								<img src="{{ asset('admin/assets/images/duralux/avatar/1.png') }}" alt="" class="wd-35 ht-35 rounded-circle" />
								<div class="notifications-desc">
									<p class="font-weight-bold text-dark">New donation received</p>
									<span class="fs-12 text-muted">From: John Doe - $50</span>
								</div>
								<div class="notifications-date">
									<span class="fs-11 text-muted">2 min ago</span>
								</div>
							</div>
							<div class="notifications-item">
								<img src="{{ asset('admin/assets/images/duralux/avatar/2.png') }}" alt="" class="wd-35 ht-35 rounded-circle" />
								<div class="notifications-desc">
									<p class="font-weight-bold text-dark">New volunteer application</p>
									<span class="fs-12 text-muted">From: Sarah Wilson</span>
								</div>
								<div class="notifications-date">
									<span class="fs-11 text-muted">10 min ago</span>
								</div>
							</div>
							<div class="notifications-item">
								<img src="{{ asset('admin/assets/images/duralux/avatar/3.png') }}" alt="" class="wd-35 ht-35 rounded-circle" />
								<div class="notifications-desc">
									<p class="font-weight-bold text-dark">Project milestone reached</p>
									<span class="fs-12 text-muted">Clean Water Project - Phase 1</span>
								</div>
								<div class="notifications-date">
									<span class="fs-11 text-muted">1 hour ago</span>
								</div>
							</div>
							<div class="text-center notifications-footer">
								<a href="javascript:void(0)" class="fs-13 fw-semibold text-dark">See all notifications</a>
							</div>
						</div>
					</div>
					<!--! [End] Header Notifications !-->
					<!--! [Start] Header User !-->
					<div class="dropdown nxl-h-item">
						<a href="javascript:void(0);" data-bs-toggle="dropdown" role="button" data-bs-auto-close="outside">
							<img src="{{ asset('images/application/'.application()->fav_icon) }}" alt="user-image" class="img-fluid user-avtar me-0" />
						</a>
						<div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-user-dropdown">
							<div class="dropdown-header">
								<div class="d-flex align-items-center">
									<img src="{{ asset('images/application/'.application()->fav_icon) }}" alt="user-image" class="img-fluid user-avtar" />
									<div>
										<h6 class="text-dark mb-0">{{ Auth::user()->name }}</h6>
										<span class="fs-12 fw-medium text-muted">{{ Auth::user()->email }}</span>
									</div>
								</div>
							</div>
							<div class="dropdown-divider"></div>
							<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="feather-log-out"></i>
								<span>Logout</span>
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--! [End] Header Right !-->
		</div>
	</header>
	<!--! ================================================================ !-->
	<!--! [End] Header !-->
	<!--! ================================================================ !-->
	<!--! ================================================================ !-->
	<!--! [Start] Main Content !-->
	<!--! ================================================================ !-->
	<main class="nxl-container">
		<div class="nxl-content">
            <!-- [Start] Page Header -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">@yield('title_l1', 'Dashboard')</h5>
                    </div>
                    <span class="mx-2 text-muted">|</span>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        @yield('bread_crumb')
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [End] Page Header -->

			<div class="main-content">
				@yield('content')
			</div>
		</div>
	</main>
	<!--! ================================================================ !-->
	<!--! [End] Main Content !-->
	<!--! ================================================================ !-->

	<!--! ================================================================ !-->
	<!--! [Start] Delete Confirmation Modal !-->
	<!--! ================================================================ !-->
	<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content border-0 shadow-lg">
				<div class="modal-body text-center p-4">
					<div class="mb-3">
						<div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-danger" style="width: 64px; height: 64px;">
							<i class="feather-trash-2 text-white" style="font-size: 32px;"></i>
						</div>
					</div>
					<h5 class="modal-title fw-bold mb-2" id="deleteConfirmModalLabel">Delete Item</h5>
					<p class="text-muted mb-4" id="deleteConfirmMessage">Are you sure you want to delete this item? This action cannot be undone.</p>
					<div class="d-flex gap-2 justify-content-center">
						<button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Cancel</button>
						<a href="#" id="confirmDeleteBtn" class="btn btn-danger px-4">Delete</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--! ================================================================ !-->
	<!--! [End] Delete Confirmation Modal !-->
	<!--! ================================================================ !-->

    <!--! BEGIN: Theme Customizer !-->
    <div class="theme-customizer">
        <div class="customizer-handle">
            <a href="javascript:void(0);" class="cutomizer-open-trigger bg-primary">
                <i class="feather-settings"></i>
            </a>
        </div>
        <div class="customizer-sidebar-wrapper">
            <div class="customizer-sidebar-header px-4 ht-80 border-bottom d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Theme Settings</h5>
                <a href="javascript:void(0);" class="cutomizer-close-trigger d-flex">
                    <i class="feather-x"></i>
                </a>
            </div>
            <div class="customizer-sidebar-body position-relative p-4" data-scrollbar-target="#psScrollbarInit">
                <!--! BEGIN: [Navigation] !-->
                <div class="position-relative px-3 pb-3 pt-4 mt-3 mb-5 border border-gray-2 theme-options-set">
                    <label class="py-1 px-2 fs-8 fw-bold text-uppercase text-muted text-spacing-2 bg-white border border-gray-2 position-absolute rounded-2 options-label" style="top: -12px">Navigation</label>
                    <div class="row g-2 theme-options-items app-navigation" id="appNavigationList">
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-navigation-light" name="app-navigation" value="1" data-app-navigation="app-navigation-light" checked>
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-navigation-light">Light</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-navigation-dark" name="app-navigation" value="2" data-app-navigation="app-navigation-dark">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-navigation-dark">Dark</label>
                        </div>
                    </div>
                </div>
                <!--! END: [Navigation] !-->
                <!--! BEGIN: [Header] !-->
                <div class="position-relative px-3 pb-3 pt-4 mt-3 mb-5 border border-gray-2 theme-options-set mt-5">
                    <label class="py-1 px-2 fs-8 fw-bold text-uppercase text-muted text-spacing-2 bg-white border border-gray-2 position-absolute rounded-2 options-label" style="top: -12px">Header</label>
                    <div class="row g-2 theme-options-items app-header" id="appHeaderList">
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-header-light" name="app-header" value="1" data-app-header="app-header-light" checked>
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-header-light">Light</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-header-dark" name="app-header" value="2" data-app-header="app-header-dark">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-header-dark">Dark</label>
                        </div>
                    </div>
                </div>
                <!--! END: [Header] !-->
                <!--! BEGIN: [Skins] !-->
                <div class="position-relative px-3 pb-3 pt-4 mt-3 mb-5 border border-gray-2 theme-options-set">
                    <label class="py-1 px-2 fs-8 fw-bold text-uppercase text-muted text-spacing-2 bg-white border border-gray-2 position-absolute rounded-2 options-label" style="top: -12px">Skins</label>
                    <div class="row g-2 theme-options-items app-skin" id="appSkinList">
                        <div class="col-6 text-center position-relative single-option light-button active">
                            <input type="radio" class="btn-check" id="app-skin-light" name="app-skin" value="1" data-app-skin="app-skin-light">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-skin-light">Light</label>
                        </div>
                        <div class="col-6 text-center position-relative single-option dark-button">
                            <input type="radio" class="btn-check" id="app-skin-dark" name="app-skin" value="2" data-app-skin="app-skin-dark">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-skin-dark">Dark</label>
                        </div>
                    </div>
                </div>
                <!--! END: [Skins] !-->
                <!--! BEGIN: [Typography] !-->
                <div class="position-relative px-3 pb-3 pt-4 mt-3 mb-0 border border-gray-2 theme-options-set">
                    <label class="py-1 px-2 fs-8 fw-bold text-uppercase text-muted text-spacing-2 bg-white border border-gray-2 position-absolute rounded-2 options-label" style="top: -12px">Typography</label>
                    <div class="row g-2 theme-options-items font-family" id="fontFamilyList">
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-lato" name="font-family" value="1" data-font-family="app-font-family-lato">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-lato">Lato</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-rubik" name="font-family" value="2" data-font-family="app-font-family-rubik">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-rubik">Rubik</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-inter" name="font-family" value="3" data-font-family="app-font-family-inter" checked>
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-inter">Inter</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-cinzel" name="font-family" value="4" data-font-family="app-font-family-cinzel">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-cinzel">Cinzel</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-nunito" name="font-family" value="6" data-font-family="app-font-family-nunito">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-nunito">Nunito</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-roboto" name="font-family" value="7" data-font-family="app-font-family-roboto">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-roboto">Roboto</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-ubuntu" name="font-family" value="8" data-font-family="app-font-family-ubuntu">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-ubuntu">Ubuntu</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-poppins" name="font-family" value="9" data-font-family="app-font-family-poppins">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-poppins">Poppins</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-raleway" name="font-family" value="10" data-font-family="app-font-family-raleway">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-raleway">Raleway</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-system-ui" name="font-family" value="11" data-font-family="app-font-family-system-ui">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-system-ui">System UI</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-noto-sans" name="font-family" value="12" data-font-family="app-font-family-noto-sans">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-noto-sans">Noto Sans</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-fira-sans" name="font-family" value="13" data-font-family="app-font-family-fira-sans">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-fira-sans">Fira Sans</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-work-sans" name="font-family" value="14" data-font-family="app-font-family-work-sans">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-work-sans">Work Sans</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-open-sans" name="font-family" value="15" data-font-family="app-font-family-open-sans">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-open-sans">Open Sans</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-maven-pro" name="font-family" value="16" data-font-family="app-font-family-maven-pro">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-maven-pro">Maven Pro</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-quicksand" name="font-family" value="17" data-font-family="app-font-family-quicksand">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-quicksand">Quicksand</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-montserrat" name="font-family" value="18" data-font-family="app-font-family-montserrat">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-montserrat">Montserrat</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-josefin-sans" name="font-family" value="19" data-font-family="app-font-family-josefin-sans">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-josefin-sans">Josefin Sans</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-ibm-plex-sans" name="font-family" value="20" data-font-family="app-font-family-ibm-plex-sans">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-ibm-plex-sans">IBM Plex Sans</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-source-sans-pro" name="font-family" value="5" data-font-family="app-font-family-source-sans-pro">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-source-sans-pro">Source Sans Pro</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-montserrat-alt" name="font-family" value="21" data-font-family="app-font-family-montserrat-alt">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-montserrat-alt">Montserrat Alt</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-roboto-slab" name="font-family" value="22" data-font-family="app-font-family-roboto-slab">
                            <label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-roboto-slab">Roboto Slab</label>
                        </div>
                    </div>
                </div>
                <!--! END: [Typography] !-->
            </div>
            <div class="customizer-sidebar-footer px-4 ht-60 border-top d-flex align-items-center gap-2">
                <div class="flex-fill w-100">
                    <a href="javascript:void(0);" class="btn btn-danger w-100" data-style="reset-all-common-style">Reset</a>
                </div>
            </div>
        </div>
    </div>
    <!--! END: Theme Customizer !-->

	<!--! BEGIN: Vendors JS !-->
	<script src="{{ asset('admin/assets/vendors/js/vendors.min.js') }}"></script>
	<!-- vendors.min.js {always must need to be top} -->
	<script src="{{ asset('admin/assets/vendors/js/daterangepicker.min.js') }}"></script>
	<script src="{{ asset('admin/assets/vendors/js/apexcharts.min.js') }}"></script>
	<script src="{{ asset('admin/assets/vendors/js/circle-progress.min.js') }}"></script>
	<!--! END: Vendors JS !-->
	<!--! BEGIN: Apps Init  !-->
	<script src="{{ asset('admin/assets/js/common-init.min.js') }}"></script>
	<script src="{{ asset('admin/assets/js/dashboard-init.min.js') }}"></script>
	<!--! END: Apps Init !-->
	<!--! BEGIN: Theme Customizer  !-->
	<script src="{{ asset('admin/assets/js/theme-customizer-init.min.js') }}"></script>
	<!--! END: Theme Customizer !-->
	<!--! BEGIN: Custom Header Scripts !-->
	<script src="{{ asset('admin/assets/vendors/js/full-screen-helper.min.js') }}"></script>
	<script>
		// Duralux Native Dark/Light Theme Toggle
		document.addEventListener('DOMContentLoaded', function() {
			const themeToggle = document.querySelector('[data-bs-toggle="tooltip"][title="Light/Dark Mode"]');
			const themeIcon = themeToggle.querySelector('i');
			
			// Initialize theme from localStorage (same as Duralux)
			const savedTheme = localStorage.getItem('app-skin-dark') || 'app-skin-light';
			if (savedTheme === 'app-skin-dark') {
				document.documentElement.classList.add('app-skin-dark');
				document.documentElement.classList.add('app-navigation-dark');
				document.documentElement.classList.add('app-header-dark');
				themeIcon.className = 'feather-sun';
			} else {
				document.documentElement.classList.remove('app-skin-dark');
				document.documentElement.classList.remove('app-navigation-dark');
				document.documentElement.classList.remove('app-header-dark');
				themeIcon.className = 'feather-moon';
			}
			
			// Theme toggle click handler
			themeToggle.addEventListener('click', function(e) {
				e.preventDefault();
				
				if (document.documentElement.classList.contains('app-skin-dark')) {
					// Switch to light mode
					document.documentElement.classList.remove('app-skin-dark');
					document.documentElement.classList.remove('app-navigation-dark');
					document.documentElement.classList.remove('app-header-dark');
					localStorage.setItem('app-skin-dark', 'app-skin-light');
					localStorage.setItem('app-navigation', 'app-navigation-light');
					localStorage.setItem('app-header', 'app-header-light');
					themeIcon.className = 'feather-moon';
				} else {
					// Switch to dark mode
					document.documentElement.classList.add('app-skin-dark');
					document.documentElement.classList.add('app-navigation-dark');
					document.documentElement.classList.add('app-header-dark');
					localStorage.setItem('app-skin-dark', 'app-skin-dark');
					localStorage.setItem('app-navigation', 'app-navigation-dark');
					localStorage.setItem('app-header', 'app-header-dark');
					themeIcon.className = 'feather-sun';
				}
			});
		});

		// Search functionality
		document.addEventListener('DOMContentLoaded', function() {
			const searchInput = document.querySelector('.search-input-field');
			if (searchInput) {
				searchInput.addEventListener('input', function() {
					const query = this.value.toLowerCase();
					// Add your search logic here
					console.log('Searching for:', query);
				});
			}
		});
		
		// Notification dropdown enhancement
		document.addEventListener('DOMContentLoaded', function() {
			// Auto-refresh notifications every 30 seconds
			setInterval(function() {
				// You can add AJAX call here to fetch new notifications
				console.log('Checking for new notifications...');
			}, 30000);
		});
		
		// Fullscreen toggle function
		function toggleFullscreen() {
			const maximizeIcon = document.getElementById('maximize-icon');
			const minimizeIcon = document.getElementById('minimize-icon');
			
			if (!document.fullscreenElement) {
				// Enter fullscreen
				document.documentElement.requestFullscreen().then(() => {
					maximizeIcon.style.display = 'none';
					minimizeIcon.style.display = 'inline';
				});
			} else {
				// Exit fullscreen
				document.exitFullscreen().then(() => {
					maximizeIcon.style.display = 'inline';
					minimizeIcon.style.display = 'none';
				});
			}
		}
		
		// Listen for fullscreen change events (including ESC key)
		document.addEventListener('fullscreenchange', function() {
			const maximizeIcon = document.getElementById('maximize-icon');
			const minimizeIcon = document.getElementById('minimize-icon');
			
			if (!document.fullscreenElement) {
				// Exited fullscreen
				maximizeIcon.style.display = 'inline';
				minimizeIcon.style.display = 'none';
			} else {
				// Entered fullscreen
				maximizeIcon.style.display = 'none';
				minimizeIcon.style.display = 'inline';
			}
		});
		
		// Translation dictionary
		const translations = {
			en: {
				select_language: 'Select Language',
				languages_available: '2 languages available!',
				dashboard: 'Dashboard',
				slider: 'Slider',
				add_slider: 'Add Slider',
				all_slider: 'All Slider',
				ongoing_project: 'Ongoing Project',
				add_project: 'Add Project',
				all_project: 'All Project',
				latest_news: 'Latest News',
				add_news: 'Add News',
				all_news: 'All News',
				photo_gallery: 'Photo Gallery',
				add_photo: 'Add Photo',
				all_photo: 'All Photo',
				subscribe: 'Subscribe',
				all_subscribe: 'All Subscribe',
				key_focus_area: 'Key Focus Area',
				add_focus_area: 'Add Focus Area',
				all_focus_areas: 'All Focus Areas',
				application: 'Application',
				about_us: 'About Us',
				mission_vision: 'Mission Vision',
				donate_now: 'Donate Now',
				origin_legal: 'Origin & Legal Affiliation',
				executive_committee: 'Executive Committee',
				team_members: 'Team Members',
				programs: 'Programs',
				impact_metrics: 'Impact Metrics',
				success_stories: 'Success Stories',
				chief_message: 'Chief Executive Message',
				faq: 'FAQ',
				volunteers: 'Volunteers',
				user_message: 'User Message',
				partners_donor: 'Partners & Donor',
				project_archive: 'Project Archive',
				strategic_plan: 'Strategic Plan',
				policy_guideline: 'Policy and Guideline',
				publication: 'Publication',
				add_affilation: 'Add Affilation',
				all_affilation: 'All Affilation',
				add_career: 'Add Career',
				all_career: 'All Career',
				career: 'Career',
				contact: 'Contact',
				// Submenu items
				add_member: 'Add Member',
				all_members: 'All Members',
				add_program: 'Add Program',
				all_programs: 'All Programs',
				add_impact: 'Add Impact',
				all_impact: 'All Impact',
				add_story: 'Add Story',
				all_stories: 'All Stories',
				add_message: 'Add Message',
				all_message: 'All Messages',
				add_faq: 'Add FAQ',
				all_faq: 'All FAQ',
				add_opportunity: 'Add Opportunity',
				all_opportunities: 'All Opportunities',
				add_partners_donor: 'Add Partners & Donor',
				all_partners_donor: 'All Partners & Donor',
				add_strategic_plan: 'Add Strategic Plan',
				all_strategic_plan: 'All Strategic Plan',
				add_policy_guideline: 'Add Policy and Guideline',
				all_policy_guideline: 'All Policy and Guideline',
				add_publication: 'Add Publication',
				all_publications: 'All Publications',
				add_payment_method: 'Add Payment Method',
				all_payment_methods: 'All Payment Methods',
				all_donations: 'All Donations'
			},
			bn: {
				select_language: 'ভাষা নির্বাচন করুন',
				languages_available: '২টি ভাষা উপলব্ধ!',
				dashboard: 'ড্যাশবোর্ড',
				slider: 'স্লাইডার',
				add_slider: 'স্লাইডার যোগ করুন',
				all_slider: 'সব স্লাইডার',
				ongoing_project: 'চলমান প্রকল্প',
				add_project: 'প্রকল্প যোগ করুন',
				all_project: 'সব প্রকল্প',
				latest_news: 'সর্বশেষ সংবাদ',
				add_news: 'সংবাদ যোগ করুন',
				all_news: 'সব সংবাদ',
				photo_gallery: 'ছবির গ্যালারি',
				add_photo: 'ছবি যোগ করুন',
				all_photo: 'সব ছবি',
				subscribe: 'সাবস্ক্রাইব',
				all_subscribe: 'সব সাবস্ক্রিপশন',
				key_focus_area: 'মুখ্য ফোকাস এরিয়া',
				add_focus_area: 'ফোকাস এরিয়া যোগ করুন',
				all_focus_areas: 'সব ফোকাস এরিয়া',
				application: 'এপ্লিকেশন',
				about_us: 'আমাদের সম্পর্কে',
				mission_vision: 'মিশন ভিশন',
				donate_now: 'এখনই দান করুন',
				origin_legal: 'উৎপত্তি ও আইনি সম্পর্ক',
				executive_committee: 'নির্বাহী কমিটি',
				team_members: 'টিম মেম্বার',
				programs: 'কার্যক্রম',
				impact_metrics: 'প্রভাব মেট্রিক্স',
				success_stories: 'সফলতার গল্প',
				chief_message: 'প্রধান নির্বাহীর বার্তা',
				faq: 'সাধারণ প্রশ্ন',
				volunteers: 'স্বেচ্ছাসেবক',
				user_message: 'ব্যবহারকারীর বার্তা',
				partners_donor: 'সাথী ও দাতা',
				project_archive: 'প্রকল্প আর্কাইভ',
				strategic_plan: 'স্ট্র্যাটেজিক প্ল্যান',
				policy_guideline: 'নীতি ও নির্দেশনা',
				publication: 'প্রকাশনা',
				add_affilation: 'অ্যাফিলিয়েশন যোগ করুন',
				all_affilation: 'সব অ্যাফিলিয়েশন',
				add_career: 'ক্যারিয়ার যোগ করুন',
				all_career: 'সব ক্যারিয়ার',
				career: 'ক্যারিয়ার',
				contact: 'যোগাযোগ',
				// Submenu items
				add_member: 'সদস্য যোগ করুন',
				all_members: 'সব সদস্য',
				add_program: 'প্রোগ্রাম যোগ করুন',
				all_programs: 'সব প্রোগ্রাম',
				add_impact: 'ইমপ্যাক্ট যোগ করুন',
				all_impact: 'সব ইমপ্যাক্ট',
				add_story: 'গল্প যোগ করুন',
				all_stories: 'সব গল্প',
				add_message: 'বার্তা যোগ করুন',
				all_message: 'সব বার্তা',
				add_faq: 'FAQ যোগ করুন',
				all_faq: 'সব FAQ',
				add_opportunity: 'সুযোগ যোগ করুন',
				all_opportunities: 'সব সুযোগ',
				add_partners_donor: 'সাথী ও দাতা যোগ করুন',
				all_partners_donor: 'সব সাথী ও দাতা',
				add_strategic_plan: 'স্ট্র্যাটেজিক প্ল্যান যোগ করুন',
				all_strategic_plan: 'সব স্ট্র্যাটেজিক প্ল্যান',
				add_policy_guideline: 'নীতি ও নির্দেশনা যোগ করুন',
				all_policy_guideline: 'সব নীতি ও নির্দেশনা',
				add_publication: 'প্রকাশনা যোগ করুন',
				all_publications: 'সব প্রকাশনা',
				add_payment_method: 'পেমেন্ট মেথড যোগ করুন',
				all_payment_methods: 'সব পেমেন্ট মেথড',
				all_donations: 'সব অনুদান'
			}
		};
		
		// Language switching functionality with translation
		function changeLanguage(countryCode, languageName, localName) {
			const currentFlag = document.getElementById('current-flag');
			
			// Update flag icon
			currentFlag.className = `flag-icon ${countryCode}`;
			currentFlag.setAttribute('data-country', countryCode);
			currentFlag.setAttribute('data-language', languageName);
			
			// Store selected language in localStorage
			localStorage.setItem('selected-language', countryCode);
			localStorage.setItem('selected-language-name', languageName);
			localStorage.setItem('selected-language-local', localName);
			
			// Apply translations
			applyTranslations(languageName.toLowerCase());
			
			// Show confirmation with animation
			currentFlag.style.transform = 'scale(1.2)';
			setTimeout(() => {
				currentFlag.style.transform = 'scale(1)';
			}, 200);
			
			console.log(`Language changed to: ${languageName} (${localName})`);
		}
		
		// Apply translations to elements
		function applyTranslations(language) {
			const langCode = language === 'bengali' ? 'bn' : 'en';
			const trans = translations[langCode] || translations.en;
			
			// Translate elements with data-translate attribute
			document.querySelectorAll('[data-translate]').forEach(element => {
				const key = element.getAttribute('data-translate');
				if (trans[key]) {
					element.textContent = trans[key];
				}
			});
		}
		
		// Load saved language on page load
		document.addEventListener('DOMContentLoaded', function() {
			const savedLang = localStorage.getItem('selected-language');
			const savedLangName = localStorage.getItem('selected-language-name');
			const savedLangLocal = localStorage.getItem('selected-language-local');
			
			if (savedLang && savedLangName) {
				const currentFlag = document.getElementById('current-flag');
				currentFlag.className = `flag-icon ${savedLang}`;
				currentFlag.setAttribute('data-country', savedLang);
				currentFlag.setAttribute('data-language', savedLangName);
				
				// Apply saved language translations
				applyTranslations(savedLangName.toLowerCase());
			}
		});

		// Active Menu Item Logic
		document.addEventListener("DOMContentLoaded", function() {
			const currentUrl = window.location.href.split('?')[0]; // Ignore query params
			const menuLinks = document.querySelectorAll('.nxl-link');
			
			menuLinks.forEach(link => {
				if (link.href.split('?')[0] === currentUrl) {
					// Add active class to direct parent (li.nxl-item)
					const parentItem = link.closest('.nxl-item');
					if (parentItem) {
						parentItem.classList.add('active');
						
						// Check if it's inside a submenu
						const parentSubmenu = parentItem.closest('.nxl-submenu');
						if (parentSubmenu) {
							// Add active class to the parent menu item (li.nxl-item.nxl-hasmenu)
							const grandParentItem = parentSubmenu.closest('.nxl-item');
							if (grandParentItem) {
								grandParentItem.classList.add('active');
								// Add theme specific classes for open state if needed
								grandParentItem.classList.add('nxl-trigger');
								// Ensure submenu is visible
								// parentSubmenu.style.display = 'block';
							}
						}
					}
				}
			});
		});

		// Delete Confirmation Modal Handler
		document.addEventListener('DOMContentLoaded', function() {
			const deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
			const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
			const deleteModalLabel = document.getElementById('deleteConfirmModalLabel');
			const deleteModalMessage = document.getElementById('deleteConfirmMessage');
			
			// Handle all delete links with data-delete attribute
			document.body.addEventListener('click', function(e) {
				const deleteLink = e.target.closest('a[data-delete]');
				if (deleteLink) {
					e.preventDefault();
					
					// Get custom message and title from data attributes
					const customTitle = deleteLink.getAttribute('data-delete-title') || 'Delete Item';
					const customMessage = deleteLink.getAttribute('data-delete-message') || 'Are you sure you want to delete this item? This action cannot be undone.';
					const deleteUrl = deleteLink.getAttribute('href');
					
					// Update modal content
					deleteModalLabel.textContent = customTitle;
					deleteModalMessage.textContent = customMessage;
					confirmDeleteBtn.setAttribute('href', deleteUrl);
					
					// Show modal
					deleteModal.show();
				}
			});
		});
	</script>
	<!--! END: Custom Header Scripts !-->
	
	<!--! BEGIN: Page Specific Scripts !-->
	@stack('scripts')
	<!--! END: Page Specific Scripts !-->
</body>

</html>
