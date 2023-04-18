
jQuery( function() {
	initNav();
	initAccordion();
	initTabs();
	initSlickSlides();
	initFixedHeader();
	initSmoothScroll();
	initMapPoints();
	initSwiper();
	initIsotope();
} );

jQuery( window ).on( 'load', function() {
	jQuery( 'html' ).addClass( 'pageLoaded' );
} );

// mobile menu init
function initNav() {
	jQuery( '.nav-opener, .nav-overlay' ).click( function( e ) {
		e.preventDefault();
		jQuery( 'html' ).toggleClass( 'nav-active' );
	} );
	jQuery( '.btnClose' ).click( function( e ) {
		e.preventDefault();
		jQuery( 'html' ).removeClass( 'nav-active' );
	} );

	jQuery( function() {
		jQuery( '.nav ul li:has(.dropdown)' ).addClass( 'has-dropdown' ).prepend( '<a href="javascript:;" class="drop-opener"><i class="fa fa-chevron-down"></i></a>' );
		jQuery( '.drop-opener' ).click( function( e ) {
			e.preventDefault();
			if ( jQuery( this ).parent().hasClass( 'drop-active' ) ) {
				jQuery( this ).parent().removeClass( 'drop-active' );
			} else {
				jQuery( this ).parents( '.nav' ).find( '.drop-active' ).removeClass( 'drop-active' );
				jQuery( this ).parent().addClass( 'drop-active' );
			}
		} );
	} );
}

// Tabs
function initTabs() {
	jQuery( function() {
		jQuery( '.tabsMain' ).find( '.tabContentActive' ).show( 0 );
		jQuery( '.tabsMain .tabOpener' ).click( function( e ) {
			e.preventDefault();
			const getHash = jQuery( this ).attr( 'href' );
			jQuery( this ).parents( '.tabsMain' ).find( '.tabActive' ).removeClass( 'tabActive' );
			jQuery( this ).parents( '.tabsMain' ).find( '.tabsMainContent' ).hide().removeClass( 'tabContentActive' );
			jQuery( this ).parent().addClass( 'tabActive' );
			jQuery( getHash ).fadeIn().addClass( 'tabContentActive' );
		} );
	} );
}

// Accordion
function initAccordion() {
	jQuery( function() {
		jQuery( '.accordionMain .accordionOpener' ).click( function( e ) {
			e.preventDefault();
			if ( jQuery( this ).parent().parent().hasClass( 'accActive' ) ) {
				jQuery( this ).parent().parent().removeClass( 'accActive' );
				jQuery( this ).parent().next( '.accContent' ).slideUp();
			} else {
				jQuery( this ).parents( '.accordionMain' ).find( '.accActive' ).removeClass( 'accActive' );
				jQuery( this ).parents( '.accordionMain' ).find( '.accContent' ).slideUp();
				jQuery( this ).parent().parent().addClass( 'accActive' );
				jQuery( this ).parent().next( '.accContent' ).slideDown();
			}
		} );
	} );
}

// Slick Slider
function initSlickSlides() {
	jQuery( '.portfolioSlider' ).slick( {
		dots: true,
		arrows: false,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
			  breakpoint: 1024,
			  settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
			  },
			},
			{
			  breakpoint: 600,
			  settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
			  },
			},
		  ],
	} );
	jQuery( '.testimonialsSlider' ).slick( {
		prevArrow: '<button class="slick-prev" type="button"><i class="fa fa-chevron-left"></i></button>',
		nextArrow: '<button class="slick-next" type="button"><i class="fa fa-chevron-right"></i></button>',
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
			  breakpoint: 1024,
			  settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
			  },
			},
			{
			  breakpoint: 600,
			  settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
			  },
			},
		  ],
	} );
	jQuery( '.projectsSlider' ).slick( {
		slidesToShow: 2,
		slidesToScroll: 1,
		prevArrow: '<button class="slick-prev" type="button"><i class="fa fa-chevron-left"></i></button>',
		nextArrow: '<button class="slick-next" type="button"><i class="fa fa-chevron-right"></i></button>',
		responsive: [

			{
			  breakpoint: 767,
			  settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
			  },
			},
		  ],
	} );
}

// Fixed Header
function initFixedHeader() {
	jQuery( window ).scroll( function() {
		const sticky = jQuery( 'html' ),
			scroll = jQuery( window ).scrollTop();

		if ( scroll >= 150 ) {
			sticky.addClass( 'fixed-header' );
		} else {
			sticky.removeClass( 'fixed-header' );
		}
	} );
}

//Smooth Scrolling
function initSmoothScroll() {
	jQuery( 'a.smoothScroll[href*="#"], .btn-explore' )
	// Remove links that don't actually link to anything
		.not( '[href="#"]' )
		.not( '[href="#0"]' )
		.click( function( event ) {
			// On-page links
			if (
				location.pathname.replace( /^\//, '' ) == this.pathname.replace( /^\//, '' )			&&
			location.hostname == this.hostname
			) {
			// Figure out element to scroll to
				let target = jQuery( this.hash );
				target = target.length ? target : jQuery( '[name=' + this.hash.slice( 1 ) + ']' );
				// Does a scroll target exist?
				if ( target.length ) {
				// Only prevent default if animation is actually gonna happen
					event.preventDefault();
					jQuery( 'html, body' ).animate( {
						scrollTop: target.offset().top - 96,
					}, 1000, function() {
						// Callback after animation
						// Must change focus!
						const $target = jQuery( target );
						$target.focus();
						if ( $target.is( ':focus' ) ) { // Checking if the target was focused
							return false;
						}
						$target.attr( 'tabindex', '-1' ); // Adding tabindex for elements not focusable
						$target.focus(); // Set focus again
					} );
				}
			}
		} );
}

// Map Points
function initMapPoints() {
	jQuery( function() {
		//jQuery('.nav ul li:has(.dropdown)').addClass('has-dropdown').prepend('<a href="javascript:;" class="drop-opener"><i class="fa fa-chevron-down"></i></a>');
		jQuery( '.marker-link' ).click( function( e ) {
			e.stopPropagation();
			if ( jQuery( this ).parent().hasClass( 'pinActive' ) ) {
				jQuery( this ).parent().removeClass( 'pinActive' );
			} else {
				jQuery( this ).parents( '.map-main' ).find( '.pinActive' ).removeClass( 'pinActive' );
				jQuery( this ).parent().addClass( 'pinActive' );
			}
		} );
		jQuery( document ).on( 'click', function( e ) {
			if ( jQuery( e.target ).is( '.map-pin' ) === false ) {
			  jQuery( '.map-pin' ).removeClass( 'pinActive' );
			}
		  } );
	} );
}

// Swiper Slider

function initSwiper() {
	const swiper2 = new Swiper( '.swiperSlider2', {
		mousewheel: true,
		autoHeight: true,
		slidesPerView: 'auto',
		freeMode: true,
		pagination: {
			el: '.swiper-pagination',
			type: 'fraction',
		},
		effect: 'fade',
		thumbs: {
			swiper,
		},
		scrollbar: {
			el: '.slider-scrollbar2',
			draggable: true,
			hide: false,
			snapOnRelease: true,
			dragSize: 46,
		},
	} );
	var swiper = new Swiper( '.swiperSlider', {
		direction: 'vertical',
		autoHeight: true,
		mousewheel: true,
		slidesPerView: 'auto',
		freeMode: true,

		thumbs: {
			swiper: swiper2,
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		scrollbar: {
			el: '.slider-scrollbar',
			draggable: true,
			hide: false,
			snapOnRelease: true,
			dragSize: 46,
		},
	} );
	const swiper3 = new Swiper( '.swiperSlider2', {
		slidesPerView: 'auto',
		autoHeight: true,
		freeMode: true,
		mousewheel: true,
		effect: 'fade',
		thumbs: {
			swiper,
		},
		scrollbar: {
			el: '.slider-scrollbar2',
			draggable: true,
			hide: false,

			snapOnRelease: true,
			dragSize: 46,
		},
		on: {
			init() {
				jQuery( '.js-current-slide' ).text( this.realIndex + 1 );
				jQuery( '.js-all-slide' ).text( this.slides.length );
			},
		},
	} );
}

// Isotope
function initIsotope() {
	jQuery( '.grid' ).isotope( {
		itemSelector: '.item-grid',
		percentPosition: true,
		masonry: {
		  columnWidth: '.grid-sizer',
		},
	} );
}

// Canvas Animation

// Canvas Animations
jQuery( document ).ready( function() {
	canvasAnimation();
} ),
jQuery( window ).resize( function() {
	canvasAnimation();
} );

// AOS Animation Init
AOS.init();
