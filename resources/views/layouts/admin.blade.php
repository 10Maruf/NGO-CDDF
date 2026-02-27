<!doctype html>
<html lang="{{ app()->getLocale() }}" class="{{ app()->getLocale() === 'bn' ? 'app-font-family-kalpurush' : '' }}">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--favicon-->
	@php $appSettings = application(); @endphp
	@if(!empty($appSettings) && !empty($appSettings->fav_icon))
	<link rel="icon" href="{{ asset('images/application/'.$appSettings->fav_icon) }}" type="image/png" />
	@endif
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

		/* Active Menu Item Styling - Light Mode (Default) */
		.nxl-item.active > .nxl-link,
		.nxl-item .nxl-submenu .nxl-item.active > .nxl-link {
			background-color: rgba(52, 111, 238, 0.1) !important;
			color: #346fee !important;
			border-radius: 4px;
			font-weight: 600;
		}
		
		/* Dark Mode Active Menu Item */
		html.app-skin-dark .nxl-link.active,
		html.app-skin-dark .nxl-item.active > .nxl-link,
		html.app-skin-dark .nxl-item .nxl-submenu .nxl-item.active > .nxl-link {
			background-color: rgba(52, 111, 238, 0.2) !important;
			color: #346fee !important;
		}

		.nxl-item .nxl-submenu .nxl-item.active > .nxl-link:before {
			background-color: #346fee;
		}

		html.app-skin-dark .nxl-item .nxl-submenu .nxl-item.active > .nxl-link:before {
			background-color: #346fee;
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
            /* Fix for hover gap issue */
            margin-top: 0 !important; 
            padding-top: 5px; /* Add padding inside instead of margin outside */
		}

        /* Invisible bridge to prevent menu closing when moving cursor from icon to menu */
        .nxl-h-dropdown::before {
            content: "";
            position: absolute;
            top: -15px; /* Extend upwards to cover the gap */
            left: 0;
            right: 0;
            height: 20px;
            background: transparent;
            z-index: -1;
        }

        /* Ensure dropdown stays open when hovering the bridge */
        .nxl-h-item:hover .nxl-h-dropdown {
            display: block; /* Force display if JS is lagging */
            animation: fadeIn 0.3s;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
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

        /* Unique Table Actions Redesign */
        .table-actions {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .table-actions .btn {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid transparent;
            margin: 0;
            padding: 0;
            position: relative;
            overflow: hidden;
        }

        .table-actions .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: currentColor;
            opacity: 0.12;
            transition: opacity 0.3s ease;
        }

        .table-actions .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }

        .table-actions .btn:hover::before {
            opacity: 0;
        }
        
        .table-actions .btn i {
            font-size: 1rem;
            position: relative;
            z-index: 1;
        }

        /* Color definitions */
        .table-actions .btn-primary { color: #3a86ff; background: transparent; border: 0; }
        .table-actions .btn-primary:hover { color: #fff; background: #3a86ff; } /* Fallback if opacity trick fails */
        
        .table-actions .btn-info { color: #00b4d8; background: transparent; border: 0; }
        .table-actions .btn-info:hover { color: #fff; background: #00b4d8; }

        .table-actions .btn-success { color: #06d6a0; background: transparent; border: 0; }
        .table-actions .btn-success:hover { color: #fff; background: #06d6a0; }

        .table-actions .btn-warning { color: #ffb703; background: transparent; border: 0; }
        .table-actions .btn-warning:hover { color: #fff; background: #ffb703; }

        .table-actions .btn-danger { color: #ef476f; background: transparent; border: 0; }
        .table-actions .btn-danger:hover { color: #fff; background: #ef476f; }

		/* ===== Bangla Font Declarations ===== */
		@font-face {
			font-family: 'Kalpurush';
			src: local('Kalpurush'), local('kalpurush');
			font-weight: normal;
			font-style: normal;
			font-display: swap;
		}

		/* Bangla font-family CSS rules */
		html.app-font-family-kalpurush body { font-family: 'Kalpurush', sans-serif; }
		html.app-font-family-system-bangla body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif; }

		/* Bangla font badge in theme settings */
		.bangla-font-divider {
			width: 100%;
			text-align: center;
			padding: 6px 0 2px;
			margin-top: 8px;
		}
		.bangla-font-divider span {
			background: linear-gradient(135deg, #006A4E, #DC143C);
			color: #fff;
			font-size: 10px;
			font-weight: 700;
			padding: 2px 10px;
			border-radius: 10px;
			letter-spacing: 1px;
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
					@if(!empty($appSettings) && !empty($appSettings->main_logo) && file_exists(public_path('images/application/'.$appSettings->main_logo)))
						<img src="{{ asset('images/application/'.$appSettings->main_logo) }}" alt="logo" class="logo logo-lg" />
					@else
						<img src="{{ asset('admin/assets/images/duralux/CDDF_logo.png') }}" alt="logo" class="logo logo-lg" />
					@endif
					<img src="{{ asset('admin/assets/images/duralux/CDDF_logo.png') }}" alt="logo" class="logo logo-sm" />
				</a>
			</div>
			<div class="navbar-content">
				<ul class="nxl-navbar">
					<li class="nxl-item nxl-caption">
						<label>{{ __('admin.navigation') }}</label>
					</li>
					<li class="nxl-item">
						<a href="{{ route('admin.home') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-home"></i></span>
							<span class="nxl-mtext">{{ __('admin.dashboard') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('slider.*') ? 'active' : '' }}">
						<a href="{{ route('slider.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-image"></i></span>
							<span class="nxl-mtext">{{ __('admin.slider') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('project.*') ? 'active' : '' }}">
						<a href="{{ route('project.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-folder"></i></span>
							<span class="nxl-mtext">{{ __('admin.projects') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('news.*') ? 'active' : '' }}">
						<a href="{{ route('news.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-file-text"></i></span>
							<span class="nxl-mtext">{{ __('admin.latest_news') }}</span>
						</a>
					</li>
					{{-- Photo Gallery menu disabled — gallery now auto-generated from news/projects
					<li class="nxl-item {{ request()->routeIs('gallery.*') ? 'active' : '' }}">
						<a href="{{ route('gallery.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-camera"></i></span>
							<span class="nxl-mtext" data-translate="photo_gallery">Photo Gallery</span>
						</a>
					</li>
					--}}
					<li class="nxl-item {{ request()->routeIs('subscribe.*') ? 'active' : '' }}">
						<a href="{{ route('subscribe.all') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-bell"></i></span>
							<span class="nxl-mtext">{{ __('admin.subscribe') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('admin.donations.*') ? 'active' : '' }}">
						<a href="{{ route('admin.donations.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-heart"></i></span>
							<span class="nxl-mtext">{{ __('admin.donations') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('admin.payment_methods.*') ? 'active' : '' }}">
						<a href="{{ route('admin.payment_methods.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-credit-card"></i></span>
							<span class="nxl-mtext">{{ __('admin.payment_methods') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('admin.focus_areas.*') ? 'active' : '' }}">
						<a href="{{ route('admin.focus_areas.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-target"></i></span>
							<span class="nxl-mtext">{{ __('admin.key_focus_area') }}</span>
						</a>
					</li>
					<li class="nxl-item">
						<a href="{{ route('logo.create') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-settings"></i></span>
							<span class="nxl-mtext">{{ __('admin.application') }}</span>
						</a>
					</li>
					<li class="nxl-item">
						<a href="{{ route('about.us.create') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-info"></i></span>
							<span class="nxl-mtext">{{ __('admin.about_us') }}</span>
						</a>
					</li>
					<li class="nxl-item">
						<a href="{{ route('mission.vision.create') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-award"></i></span>
							<span class="nxl-mtext">{{ __('admin.mission_vision') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('origin.legal_affilation.*') ? 'active' : '' }}">
						<a href="{{ route('origin.legal_affilation.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-file"></i></span>
							<span class="nxl-mtext">{{ __('admin.origin_legal') }}</span>
						</a>
					</li>
					{{-- Executive Committee (legacy — replaced by Org. Structure)
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
					--}}
					{{-- Team Members (legacy — replaced by Org. Structure)
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
					--}}
					{{-- Organizational Structure --}}
					<li class="nxl-item {{ request()->routeIs('org.*') ? 'active' : '' }}">
						<a href="{{ route('org.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-user-check"></i></span>
							<span class="nxl-mtext">{{ __('admin.org_members') }}</span>
						</a>
					</li>
					{{-- Programs (commented out)
					<li class="nxl-item {{ request()->routeIs('programs.*') ? 'active' : '' }}">
						<a href="{{ route('programs.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-briefcase"></i></span>
							<span class="nxl-mtext" data-translate="programs">Programs</span>
						</a>
					</li>
					--}}
					<li class="nxl-item {{ request()->routeIs('impact.*') ? 'active' : '' }}">
						<a href="{{ route('impact.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-trending-up"></i></span>
							<span class="nxl-mtext">{{ __('admin.impact_metrics') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('stories.*') ? 'active' : '' }}">
						<a href="{{ route('stories.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-star"></i></span>
							<span class="nxl-mtext">{{ __('admin.success_stories') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('chief.message.*') ? 'active' : '' }}">
						<a href="{{ route('chief.message.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-message-circle"></i></span>
							<span class="nxl-mtext">{{ __('admin.chief_message') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('faq.*') ? 'active' : '' }}">
						<a href="{{ route('faq.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-help-circle"></i></span>
							<span class="nxl-mtext">{{ __('admin.faq') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('admin.volunteer_applications.*') ? 'active' : '' }}">
						<a href="{{ route('admin.volunteer_applications.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-smile"></i></span>
							<span class="nxl-mtext">{{ __('admin.volunteers') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('message.*') ? 'active' : '' }}">
						<a href="{{ route('message.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-mail"></i></span>
							<span class="nxl-mtext">{{ __('admin.user_message') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('partner.*') ? 'active' : '' }}">
						<a href="{{ route('partner.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-gift"></i></span>
							<span class="nxl-mtext">{{ __('admin.partners_donor') }}</span>
						</a>
					</li>
					{{-- <li class="nxl-item nxl-hasmenu">
						<a href="javascript:void(0);" class="nxl-link">
							<span class="nxl-micon"><i class="feather-archive"></i></span>
							<span class="nxl-mtext" data-translate="project_archive">Project Archive</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
						</a>
						<ul class="nxl-submenu">
							<li class="nxl-item"><a class="nxl-link" href="{{ route('project.archive.create') }}" data-translate="add_project">Add Project</a></li>
							<li class="nxl-item"><a class="nxl-link" href="{{ route('project.archive.index') }}" data-translate="all_project">All Project</a></li>
						</ul>
					</li> --}}
					<li class="nxl-item {{ request()->routeIs('strategic_plans.*') ? 'active' : '' }}">
						<a href="{{ route('strategic_plans.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-clipboard"></i></span>
							<span class="nxl-mtext">{{ __('admin.strategic_plan') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('policy.*') ? 'active' : '' }}">
						<a href="{{ route('policy.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-shield"></i></span>
							<span class="nxl-mtext">{{ __('admin.policy_guideline') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('publications.*') ? 'active' : '' }}">
						<a href="{{ route('publications.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-book"></i></span>
							<span class="nxl-mtext">{{ __('admin.publication') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('admin.youtube_videos.*') ? 'active' : '' }}">
						<a href="{{ route('admin.youtube_videos.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-video"></i></span>
							<span class="nxl-mtext">{{ __('admin.youtube_videos') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('invoked.*') ? 'active' : '' }}">
						<a href="{{ route('invoked.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-flag"></i></span>
							<span class="nxl-mtext">{{ __('admin.career') }}</span>
						</a>
					</li>
					<li class="nxl-item {{ request()->routeIs('contact.*') ? 'active' : '' }}">
						<a href="{{ route('contact.index') }}" class="nxl-link">
							<span class="nxl-micon"><i class="feather-phone"></i></span>
							<span class="nxl-mtext">{{ __('admin.contact') }}</span>
						</a>
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
								<input type="text" class="form-control search-input-field" placeholder="{{ __('admin.search') }}" />
								<span class="input-group-text">
									<button type="button" class="btn text-muted" id="clear-search-btn" style="background: none; opacity: 1; width: auto; height: auto; padding: 0; border: none; box-shadow: none;">
										<i class="feather-x fs-6"></i>
									</button>
								</span>
							</div>
							<div class="dropdown-divider mt-0"></div>
							<div class="search-items-wrapper">
								<div class="searching-for px-3 py-2">
									<p class="fs-11 fw-medium text-muted">{{ __('admin.searching_for') }}</p>
									<div class="d-flex flex-wrap gap-1">
										<a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold text-muted">{{ __('admin.projects') }}</a>
										<a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold text-muted">{{ __('admin.donations') }}</a>
										<a href="javascript:void(0);" class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold text-muted">{{ __('admin.user_message') }}</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--! [End] Header Search !-->
					<!--! [Start] Header Language !-->
					<div class="dropdown nxl-h-item">
						<a href="javascript:void(0);" class="nxl-head-link me-0" data-bs-toggle="dropdown" role="button" data-bs-auto-close="outside" id="current-language">
							<div class="flag-icon {{ app()->getLocale() == 'bn' ? 'bd' : 'us' }}" id="current-flag"></div>
						</a>
						<div class="dropdown-menu dropdown-menu-end nxl-h-dropdown" style="min-width: 250px;">
							<div class="dropdown-header px-3 py-2">
								<h6 class="fs-13 text-dark mb-0">{{ __('admin.select_language') }}</h6>
								<small class="text-muted">{{ __('admin.languages_available') }}</small>
							</div>
							<div class="dropdown-divider mt-0"></div>
							<div class="px-3 pb-2">
								<a href="{{ route('lang.switch', 'bn') }}" class="dropdown-item language-item p-0">
									<div class="flag-icon bd"></div>
									<span class="language-text">বাংলা (Bengali)</span>
								</a>
								<a href="{{ route('lang.switch', 'en') }}" class="dropdown-item language-item p-0">
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
						<a href="javascript:void(0);" class="nxl-head-link me-0" data-bs-toggle="tooltip" title="{{ __('admin.light_dark_mode') }}">
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
								<h6 class="fw-bold text-dark mb-0">{{ __('admin.notifications') }}</h6>
								<span class="fs-11 text-muted">({{ __('admin.unread', ['count' => 3]) }})</span>
							</div>
							<div class="notifications-item">
								<img src="{{ asset('admin/assets/images/duralux/avatar/1.png') }}" alt="" class="wd-35 ht-35 rounded-circle" />
								<div class="notifications-desc">
									<p class="font-weight-bold text-dark">{{ __('admin.new_donation_received') }}</p>
									<span class="fs-12 text-muted">From: John Doe - $50</span>
								</div>
								<div class="notifications-date">
									<span class="fs-11 text-muted">2 min ago</span>
								</div>
							</div>
							<div class="notifications-item">
								<img src="{{ asset('admin/assets/images/duralux/avatar/2.png') }}" alt="" class="wd-35 ht-35 rounded-circle" />
								<div class="notifications-desc">
									<p class="font-weight-bold text-dark">{{ __('admin.new_volunteer_application') }}</p>
									<span class="fs-12 text-muted">From: Sarah Wilson</span>
								</div>
								<div class="notifications-date">
									<span class="fs-11 text-muted">10 min ago</span>
								</div>
							</div>
							<div class="notifications-item">
								<img src="{{ asset('admin/assets/images/duralux/avatar/3.png') }}" alt="" class="wd-35 ht-35 rounded-circle" />
								<div class="notifications-desc">
									<p class="font-weight-bold text-dark">{{ __('admin.project_milestone_reached') }}</p>
									<span class="fs-12 text-muted">Clean Water Project - Phase 1</span>
								</div>
								<div class="notifications-date">
									<span class="fs-11 text-muted">1 hour ago</span>
								</div>
							</div>
							<div class="text-center notifications-footer">
								<a href="javascript:void(0)" class="fs-13 fw-semibold text-dark">{{ __('admin.see_all_notifications') }}</a>
							</div>
						</div>
					</div>
					<!--! [End] Header Notifications !-->
					<!--! [Start] Header User !-->
					<div class="dropdown nxl-h-item">
						<a href="javascript:void(0);" data-bs-toggle="dropdown" role="button" data-bs-auto-close="outside">
							<img src="{{ asset('admin/assets/images/duralux/CDDF_logo.png') }}" alt="user-image" class="img-fluid user-avtar me-0" />
						</a>
						<div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-user-dropdown">
							<div class="dropdown-header">
								<div class="d-flex align-items-center">
									<img src="{{ asset('admin/assets/images/duralux/CDDF_logo.png') }}" alt="user-image" class="img-fluid user-avtar" />
									<div>
										<h6 class="text-dark mb-0">{{ Auth::user()->name }}</h6>
										<span class="fs-12 fw-medium text-muted">{{ Auth::user()->email }}</span>
									</div>
								</div>
							</div>
							<div class="dropdown-divider"></div>
							<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="feather-log-out"></i>
								<span>{{ __('admin.logout') }}</span>
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
                                <i class="feather-arrow-left me-2"></i>{{ __('admin.back') }}
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
					<h5 class="modal-title fw-bold mb-2" id="deleteConfirmModalLabel">{{ __('admin.delete_item') }}</h5>
					<p class="text-muted mb-4" id="deleteConfirmMessage">{{ __('admin.delete_confirm_message') }}</p>
					<div class="d-flex gap-2 justify-content-center">
						<button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">{{ __('admin.cancel') }}</button>
						<a href="#" id="confirmDeleteBtn" class="btn btn-danger px-4">{{ __('admin.delete') }}</a>
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
                <h5 class="mb-0">{{ __('admin.theme_settings') }}</h5>
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
                            <input type="radio" class="btn-check" id="app-font-family-inter" name="font-family" value="3" data-font-family="app-font-family-inter">
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
                        {{-- Bangla Fonts Section --}}
                        <div class="col-12 bangla-font-divider">
                            <span>বাংলা ফন্ট</span>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-kalpurush" name="font-family" value="101" data-font-family="app-font-family-kalpurush">
                            <label class="py-2 fs-9 fw-bold text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-kalpurush" style="font-family:'Kalpurush',sans-serif; color:#006A4E;">কালপুরুষ</label>
                        </div>
                        <div class="col-6 text-center single-option">
                            <input type="radio" class="btn-check" id="app-font-family-system-bangla" name="font-family" value="102" data-font-family="app-font-family-system-bangla">
                            <label class="py-2 fs-9 fw-bold text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-system-bangla" style="color:#006A4E;">সিস্টেম ফন্ট</label>
                        </div>
                    </div>
                </div>
                <!--! END: [Typography] -->
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
	<script>
		// Bangla font patch — the original theme-customizer only knows
		// about 22 built-in Latin font classes. This patch handles
		// Bangla fonts (Kalpurush + System Font) for switching & restore.
		(function() {
			var banglaClasses = [
				'app-font-family-kalpurush',
				'app-font-family-system-bangla'
			];
			// All 22 original Latin font classes the theme-customizer knows
			var latinClasses = [
				'app-font-family-lato','app-font-family-rubik','app-font-family-inter',
				'app-font-family-cinzel','app-font-family-source-sans-pro',
				'app-font-family-nunito','app-font-family-roboto','app-font-family-ubuntu',
				'app-font-family-poppins','app-font-family-raleway','app-font-family-system-ui',
				'app-font-family-noto-sans','app-font-family-fira-sans',
				'app-font-family-work-sans','app-font-family-open-sans',
				'app-font-family-maven-pro','app-font-family-quicksand',
				'app-font-family-montserrat','app-font-family-josefin-sans',
				'app-font-family-ibm-plex-sans','app-font-family-montserrat-alt',
				'app-font-family-roboto-slab'
			];

			function removeBanglaClasses() {
				banglaClasses.forEach(function(cls) { $("html").removeClass(cls); });
			}
			function removeLatinClasses() {
				latinClasses.forEach(function(cls) { $("html").removeClass(cls); });
			}

			// On any font-family radio change, force only the clicked radio to be checked
			// and uncheck all others. The theme-customizer might be fighting us.
			$(document).on('change', '[name="font-family"]', function() {
				var selected = $(this).attr('data-font-family');
				var $thisRadio = $(this);

				// Ensure only this radio is checked visually
				$('[name="font-family"]').not($thisRadio).prop('checked', false);
				$thisRadio.prop('checked', true);

				if (banglaClasses.indexOf(selected) !== -1) {
					// Bangla font selected
					setTimeout(function() {
						removeLatinClasses();
						removeBanglaClasses();
						$("html").addClass(selected);
						
						// Save to language-specific key AND universal key
						var currentLocale = '{{ app()->getLocale() }}';
						localStorage.setItem('font-family-' + currentLocale, selected);
						localStorage.setItem('font-family', selected);

						// Force check again in case original script reverted it
						$('[name="font-family"]').not($thisRadio).prop('checked', false);
						$thisRadio.prop('checked', true);
					}, 10);
				} else {
					// Latin font selected
					removeBanglaClasses();
					
					// Save latin choice too
					var currentLocale = '{{ app()->getLocale() }}';
					localStorage.setItem('font-family-' + currentLocale, selected);
					localStorage.setItem('font-family', selected);

					// Trust original script to add the latin class, but ensure unchecked others
					setTimeout(function() {
						$('[name="font-family"]').not($thisRadio).prop('checked', false);
						$thisRadio.prop('checked', true);
					}, 10);
				}
			});

			var currentLocale = '{{ app()->getLocale() }}';

			// On page load: restore saved font or apply locale default.
			// Use window.onload to ensure we run AFTER all other scripts.
			$(window).on('load', function() {
				// Clear any pre-checked radios first
				$('[name="font-family"]').prop('checked', false);
				
				removeBanglaClasses();
				
				var saved;
				// Load language-specific preference
				if (currentLocale === 'bn') {
					saved = localStorage.getItem('font-family-bn');
					if (!saved) {
						saved = 'app-font-family-kalpurush';
						// Optional: save this default so next time it's explicit? 
						// localStorage.setItem('font-family-bn', saved);
					}
				} else {
					saved = localStorage.getItem('font-family-en');
					if (!saved) {
						saved = 'app-font-family-inter';
						// localStorage.setItem('font-family-en', saved);
					}
				}
				
				// Apply it
				if (banglaClasses.indexOf(saved) !== -1) {
					// Is a Bangla font
					removeLatinClasses(); 
					$("html").addClass(saved);
				} else {
					// Is a Latin font - ensure class applied
					removeLatinClasses(); 
					$("html").addClass(saved);
				}
				
				// Check the radio
				var $targetRadio = $('[name="font-family"][data-font-family="' + saved + '"]');
				if ($targetRadio.length) {
					$targetRadio.prop('checked', true);
				} else {
					// Safe fallback
					$('[name="font-family"][data-font-family="app-font-family-inter"]').prop('checked', true);
				}
			});
			
			// Extend Reset functionality
			$(document).on('click', '[data-style="reset-all-common-style"]', function() {
				var currentLocale = '{{ app()->getLocale() }}';
				
				localStorage.removeItem('font-family-en');
				localStorage.removeItem('font-family-bn');
				localStorage.removeItem('font-family');
				
				// Re-apply defaults immediately so the user sees the change without reload
				// (The original theme script likely reloads or resets classes, but we want to be sure)
				removeBanglaClasses();
				removeLatinClasses();
				
				var defaultFont = (currentLocale === 'bn') ? 'app-font-family-kalpurush' : 'app-font-family-inter';
				$("html").addClass(defaultFont);
				
				// Update radio button state
				$('[name="font-family"]').prop('checked', false);
				$('[name="font-family"][data-font-family="' + defaultFont + '"]').prop('checked', true);
			});
		})();
	</script>
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
			const clearBtn = document.querySelector('#clear-search-btn');
			
			// Ensure we are targeting the correct wrapper. 
			// Based on HTML structure: .nxl-search-dropdown .search-items-wrapper
			let searchResultsWrapper = document.querySelector('.search-items-wrapper');
            
            // If the wrapper doesn't exist inside the dropdown for some reason, we might need to be more specific or create it?
            // But let's assume it exists based on the blade file.

			if (searchInput && searchResultsWrapper) {
				// Clear button functionality 
				if (clearBtn) {
					// Initially hide if empty
					if (searchInput.value.trim() === '') {
						clearBtn.style.display = 'none';
					}
					
					clearBtn.addEventListener('click', function() {
						searchInput.value = '';
						searchInput.focus();
						// Trigger input event to update results (will show default state)
						searchInput.dispatchEvent(new Event('input'));
						clearBtn.style.display = 'none';
					});
				}

				searchInput.addEventListener('input', function() {
					const query = this.value.toLowerCase().trim();
					
					// Toggle clear button visibility
					if (clearBtn) {
						clearBtn.style.display = query.length > 0 ? 'block' : 'none';
					}
					
					// Clear previous results
					searchResultsWrapper.innerHTML = '';
                    
                    // Show "Searching..." placeholder if empty
					if (query.length === 0) {
						searchResultsWrapper.innerHTML = `
							<div class="searching-for px-3 py-2 text-center">
								<p class="fs-12 fw-medium text-muted">{{ __('admin.searching_for') }}</p>
							</div>`;
						return;
					}

					// Find all navigation items - We select ALL links, even those in submenus
					const navLinks = document.querySelectorAll('.nxl-navigation a.nxl-link');
					let resultsFound = false;

                    // Container for results
                    const listGroup = document.createElement('div');
                    listGroup.className = 'list-group list-group-flush';

					navLinks.forEach(link => {
						// Skip if it's a parent menu toggle (has submenu but no direct link)
						const href = link.getAttribute('href');
						if (!href || href === 'javascript:void(0);' || href === '#' || href === '') return;

						const textSpan = link.querySelector('.nxl-mtext');
						const iconSpan = link.querySelector('.nxl-micon i');
						
						if (textSpan) {
							const text = textSpan.textContent.trim();
							if (text.toLowerCase().includes(query)) {
								resultsFound = true;
								
								// Create result item
								const resultItem = document.createElement('a');
								resultItem.href = href;
								resultItem.className = 'list-group-item list-group-item-action d-flex align-items-center py-2 px-3 border-0 hover-bg-light';
								
								// Clone the icon class or use default
                                const iconClass = iconSpan ? iconSpan.className : 'feather-chevron-right';
								
								resultItem.innerHTML = `
									<div class="avatar-text avatar-sm me-3 bg-light-primary text-primary rounded">
										<i class="${iconClass}"></i>
									</div>
									<span class="fs-12 fw-bold text-dark">${text}</span>
								`;
								
								listGroup.appendChild(resultItem);
							}
						}
					});

					if (resultsFound) {
                        searchResultsWrapper.appendChild(listGroup);
					} else {
						searchResultsWrapper.innerHTML = `
							<div class="px-3 py-3 text-center">
								<p class="fs-12 fw-medium text-muted mb-0">{{ __('admin.no_results_found') ?? 'No results found' }}</p>
							</div>`;
					}
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
