$(document).ready(function () {
	$(".toggle-password").click(function () {
		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});

	/* Testimonial*/
	$(".testimonial_all").owlCarousel({items:1,loop:true,autoplay: true,smartSpeed: 700,autoplayHoverPause: true,nav: false,margin: 40
	});

	$(".profile").click(function () {
		$(".menu").toggleClass("active");
	});

	$(".channel_area").click(function () {
		$(this).toggleClass("active");
	});

	/***************************Scrol Top Events************************/
	$(window).scroll(function (e) {
		e.preventDefault();
		if ($(this).scrollTop() > 100) {
			$(".to_top").fadeIn("slow");
		} else {
			$(".to_top").fadeOut("slow");
		}
	});

	/***************************Scrol To Top Events************************/

	$(".to_top").click(function () {
		$("html, body").animate({ scrollTop: 0 }, 2000);
		return false;
	});

	/********************Close and find events*****************/

	$(".arrow_top_img_area .arrow_img").click(function () {
		var $relatedCaption = $(this)
			.closest(".s_imgs")
			.find(".s_imgs_inner_caption");
		$relatedCaption.addClass("active");
	});

	/******************Sivling Events*********************/

	$(".s_imgs_inner").click(function () {
		var $relatedCaption = $(this).siblings(".s_imgs_inner_caption");
		$relatedCaption.removeClass("active");
	});

	/**********************Add remove class Evenys***********************/

	$(".logo_area .toggle").click(function () {
		$(".sidebar-contact").addClass("active");
		$(".logo_area .toggle").removeClass("active");
	});

	const $fromSlider = $("#fromSlider");
	const $sliderValue = $("#sliderValue");
	const $sliderTooltip = $("#fromSliderTooltip");
	const $viewMin = $("#viewMin");
	const $viewMax = $("#viewMax");
	const $estimatedView = $("#estimatedView");
	const $campaignType = $("#campaignType");

	function updateSlider(value) {
		$fromSlider.val(value);
		$sliderValue.text(`$${value}`);
		$sliderTooltip.text(`$${value}`);
		const percent = ((value - 10) / (1000 - 10)) * 100;
		updateSliderBackground($fromSlider, percent);
		const offset = ((percent - 60) / 50) * 20;
		$sliderTooltip.css("left", `calc(${percent}% - ${offset}px)`);
		updateViewCount(value);
	}

	function updateSliderBackground(slider, percent) {
		const background = `linear-gradient(to right, rgba(46,64,228,1) 0%, rgba(31,174,255,1) ${percent}%, rgba(202,59,205,1) ${percent}%, #CBD5E1 100%)`;
		slider.css("background", background);
	}

	function updateViewCount(value) {
		const baseMinView = 500;
		const baseMaxView = 600;
		const factor = value / 10;
		const percentageIncrease = factor * 0.1;

		const minView = baseMinView * factor * (1 + percentageIncrease);
		const maxView = baseMaxView * factor * (1 + percentageIncrease);

		$viewMin.text(minView.toFixed(0));
		$viewMax.text(maxView.toFixed(0));
		$estimatedView.val(`${minView.toFixed(0)} - ${maxView.toFixed(0)}`);
	}

	$fromSlider.on("input", function () {
		const value = $(this).val();
		updateSlider(value);
	});

	$(".view_type").on("click", function () {
		const type = $(this).text();
		$campaignType.val(type);
		$(".view_type").removeClass("active");
		$(this).addClass("active");
	});

	// Initialize the slider and input box with the initial value
	updateSlider($fromSlider.val());


});
