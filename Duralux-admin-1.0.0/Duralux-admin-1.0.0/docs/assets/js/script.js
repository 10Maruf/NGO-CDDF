/*
<--!----------------------------------------------------------------!-->
<--! Sidebar Toggler" !-->
<--!----------------------------------------------------------------!-->
*/
$(document).ready(function () {
	$('[data-sidebar-toggler="sidebar-toggle"]').on("click", $(this), function () {
		$(".aside-wrap").toggleClass("active");
	});
});

/*
<--!----------------------------------------------------------------!-->
<--! Tooltip & Popover !-->
<--!----------------------------------------------------------------!-->
*/
$(document).ready(function () {
	[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function (tooltip) {
		return new bootstrap.Tooltip(tooltip);
	});
	[].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function (popover) {
		return new bootstrap.Popover(popover);
	});
});

/*
<--!----------------------------------------------------------------!-->
<--! PerfectScrollbar !-->
<--!----------------------------------------------------------------!-->
*/
$(document).ready(function () {
	$(".aside-wrap, pre").each(function () {
		const ps = new PerfectScrollbar($(this)[0], {
			wheelSpeed: 0.5,
		});
	});
});

/*
<--!----------------------------------------------------------------!-->
<--! Scrollspy !-->
<--!----------------------------------------------------------------!-->
*/
var scrollSpy = new bootstrap.ScrollSpy(document.body, {
	target: "#navbar_aside",
	offset: 80,
});

/*
<--!----------------------------------------------------------------!-->
<--! initHighlightingOnLoad !-->
<--!----------------------------------------------------------------!-->
*/
$(document).ready(function () {
	hljs.initHighlightingOnLoad();
});

/*
<--!----------------------------------------------------------------!-->
<--! stopPropagation !-->
<--!----------------------------------------------------------------!-->
*/
$(document).on("click", ".dropdown-menu", function (e) {
	e.stopPropagation();
});

/*
<--!----------------------------------------------------------------!-->
<--! Navigations !-->
<--!----------------------------------------------------------------!-->
*/
if ($(window).width() > 768) {
	$(window).scroll(function () {
		if ($(this).scrollTop() > 125) {
			$(".navbar-landing").addClass("fixed-top");
		} else {
			$(".navbar-landing").removeClass("fixed-top");
		}
	});
}
$("a.page-scroll").click(function (event) {
	var $anchor = $(this);
	$("html, body")
		.stop()
		.animate({ scrollTop: $($anchor.attr("href")).offset().top - 79 }, 1000);
	event.preventDefault();
});

$(".navbar-collapse ul li a.page-scroll").click(function () {
	$(".navbar-toggler:visible").click();
});

/*
<--!----------------------------------------------------------------!-->
<--! jsTree !-->
<--!----------------------------------------------------------------!-->
*/
$(function () {
	"use strict";
	// jsTree
	$(".jstree-file-structure").jstree({
		core: {
			check_callback: true,
		},
		plugins: ["types"],
		types: {
			folder: {
				icon: "fa-regular fa-folder-closed text-muted",
			},
			file: {
				icon: "a-regular fa-file text-muted",
			},
			html: {
				icon: "fa-brands fa-html5 text-muted",
			},
			css: {
				icon: "fa-brands fa-css3-alt text-muted",
			},
			js: {
				icon: "fa-brands fa-js text-muted",
			},
			img: {
				icon: "fa-regular fa-image text-muted",
			},
			sass: {
				icon: "fa-brands fa-sass text-muted",
			},
			gulp: {
				icon: "fa-brands fa-gulp text-muted",
			},
			json: {
				icon: "fa-brands fa-node-js text-muted",
			},
			book: {
				icon: "fa-regular fa-address-book text-muted",
			},
			map: {
				icon: "fa-regular fa-lightbulb text-muted",
			},
		},
	});
});
