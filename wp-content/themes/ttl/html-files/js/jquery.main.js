
jQuery(function () {
	initNav();
	initAccordion();
	initTabs();
	initSlickSlides();
	initFixedHeader();
	initSmoothScroll();
	initMapPoints();
	initSwiper();
	initIsotope(); 
});


$(window).on('load', function () {
	jQuery('html').addClass('pageLoaded');
});

// mobile menu init
function initNav() {
	$('.nav-opener, .nav-overlay').click(function (e) {
		e.preventDefault(); 
		$('html').toggleClass('nav-active');
	});
	$('.btnClose').click(function (e) {
		e.preventDefault();
		$('html').removeClass('nav-active');
	});

	$(function () {
		$('.nav ul li:has(.dropdown)').addClass('has-dropdown').prepend('<a href="javascript:;" class="drop-opener"><i class="fa fa-chevron-down"></i></a>');
		$('.drop-opener').click(function (e) {
			e.preventDefault();
			if ($(this).parent().hasClass('drop-active')) {
				$(this).parent().removeClass('drop-active');
			} else {
				$(this).parents('.nav').find('.drop-active').removeClass('drop-active');
				$(this).parent().addClass('drop-active');
			}
		});
	});

}	



// Tabs 
function initTabs() {
	$(function () {
		$('.tabsMain').find('.tabContentActive').show(0);
		$('.tabsMain .tabOpener').click(function (e) {
			e.preventDefault();
			var getHash = $(this).attr('href');
			$(this).parents('.tabsMain').find('.tabActive').removeClass('tabActive'); 
			$(this).parents('.tabsMain').find('.tabsMainContent').hide().removeClass('tabContentActive');
			$(this).parent().addClass('tabActive');
			$(getHash).fadeIn().addClass('tabContentActive');
		});
	});
}

// Accordion 
function initAccordion() {
	$(function () {		
		$('.accordionMain .accordionOpener').click(function (e) {
			e.preventDefault() ;
			if ($(this).parent().parent().hasClass('accActive')) {
				$(this).parent().parent().removeClass('accActive');
				$(this).parent().next('.accContent').slideUp();
			} else {
				$(this).parents('.accordionMain').find('.accActive').removeClass('accActive');
				$(this).parents('.accordionMain').find('.accContent').slideUp();
				$(this).parent().parent().addClass('accActive'); 
				$(this).parent().next('.accContent').slideDown();
			}
		});
	});
}

// Slick Slider
function initSlickSlides() {
	$('.portfolioSlider').slick({
		dots: true,
		arrows: false,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 600,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		  ]
	});
	$('.testimonialsSlider').slick({
		prevArrow: '<button class="slick-prev" type="button"><i class="fa fa-chevron-left"></i></button>',
		nextArrow: '<button class="slick-next" type="button"><i class="fa fa-chevron-right"></i></button>',
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 600,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		  ]
	});
	$('.projectsSlider').slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		prevArrow: '<button class="slick-prev" type="button"><i class="fa fa-chevron-left"></i></button>',
		nextArrow: '<button class="slick-next" type="button"><i class="fa fa-chevron-right"></i></button>',
		responsive: [
			
			{
			  breakpoint: 767,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		  ]
	});
}

// Fixed Header
function initFixedHeader() {
	$(window).scroll(function () {
		var sticky = $('html'),
			scroll = $(window).scrollTop();

		if (scroll >= 150) sticky.addClass('fixed-header');
		else sticky.removeClass('fixed-header');
	});
}

//Smooth Scrolling 
function initSmoothScroll() { 
	$('a.smoothScroll[href*="#"], .btn-explore')
	// Remove links that don't actually link to anything
		.not('[href="#"]')
		.not('[href="#0"]')
		.click(function(event) {
			// On-page links
			if (
			location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
			&& 
			location.hostname == this.hostname
			) {
			// Figure out element to scroll to
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			// Does a scroll target exist?
			if (target.length) {
				// Only prevent default if animation is actually gonna happen
				event.preventDefault();
				$('html, body').animate({
				scrollTop: target.offset().top - 96
				}, 1000, function() {
				// Callback after animation
				// Must change focus!
				var $target = $(target);
				$target.focus();
				if ($target.is(":focus")) { // Checking if the target was focused
					return false;
				} else {
					$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
					$target.focus(); // Set focus again
				};
				});
			}
		}
	});
}


// Map Points 
function initMapPoints() {
	$(function () {
		//$('.nav ul li:has(.dropdown)').addClass('has-dropdown').prepend('<a href="javascript:;" class="drop-opener"><i class="fa fa-chevron-down"></i></a>');
		$('.marker-link').click(function (e) {
			e.stopPropagation();
			if ($(this).parent().hasClass('pinActive')) {
				$(this).parent().removeClass('pinActive');
			} else {
				$(this).parents('.map-main').find('.pinActive').removeClass('pinActive');
				$(this).parent().addClass('pinActive');
			}
		});
		$(document).on("click", function(e) {
			if ($(e.target).is(".map-pin") === false) {
			  $(".map-pin").removeClass("pinActive");
			}
		  });
	});
}

// Swiper Slider 

function initSwiper() {
	var swiper2 = new Swiper(".swiperSlider2", {
		mousewheel: true,
		autoHeight: true,
		slidesPerView: "auto",
		freeMode: true,
		pagination: {
			el: ".swiper-pagination",
			type: "fraction",
		},
		effect: "fade",
		thumbs: {
			swiper: swiper,
		},
		scrollbar: {
			el: '.slider-scrollbar2',
			draggable: true,
			hide: false,
			snapOnRelease: true,
			dragSize: 46
		}
	});
	var swiper = new Swiper(".swiperSlider", {
		direction: "vertical",
		autoHeight: true,
		mousewheel: true,
		slidesPerView: "auto",
		freeMode: true,

		thumbs: {
			swiper: swiper2,
		},
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		scrollbar: {
			el: '.slider-scrollbar',
			draggable: true,
			hide: false,
			snapOnRelease: true,
			dragSize: 46
		}
	});
	var swiper3 = new Swiper(".swiperSlider2", {
		slidesPerView: "auto",
		autoHeight: true,
		freeMode: true,
		mousewheel: true,
		effect: "fade",
		thumbs: {
			swiper: swiper,
		},
		scrollbar: {
			el: '.slider-scrollbar2',
			draggable: true,
			hide: false,

			snapOnRelease: true,
			dragSize: 46
		},
		on: {
			init: function () {
				$('.js-current-slide').text(this.realIndex + 1);
				$('.js-all-slide').text(this.slides.length);
			}
		}
	});
}

// Isotope
function initIsotope() {
	$('.grid').isotope({
		itemSelector: '.item-grid',
		percentPosition: true,
		masonry: {
		  columnWidth: '.grid-sizer'
		}
	});
}

// Canvas Animation

// Canvas Animations
$(document).ready(function () {
	canvasAnimation();
}),
	$(window).resize(function () {
		canvasAnimation();
	});

// AOS Animation Init
AOS.init();

