function initNav(){jQuery(".nav-opener, .nav-overlay").click((function(e){e.preventDefault(),jQuery("html").toggleClass("nav-active")})),jQuery(".btnClose").click((function(e){e.preventDefault(),jQuery("html").removeClass("nav-active")})),jQuery((function(){jQuery(".nav ul li:has(.dropdown)").addClass("has-dropdown").prepend('<a href="javascript:;" class="drop-opener"><i class="fa fa-chevron-down"></i></a>'),jQuery(".drop-opener").click((function(e){e.preventDefault(),jQuery(this).parent().hasClass("drop-active")?jQuery(this).parent().removeClass("drop-active"):(jQuery(this).parents(".nav").find(".drop-active").removeClass("drop-active"),jQuery(this).parent().addClass("drop-active"))}))}))}function initTabs(){jQuery((function(){jQuery(".tabsMain").find(".tabContentActive").show(0),jQuery(".tabsMain .tabOpener").click((function(e){e.preventDefault();var i=jQuery(this).attr("href");jQuery(this).parents(".tabsMain").find(".tabActive").removeClass("tabActive"),jQuery(this).parents(".tabsMain").find(".tabsMainContent").hide().removeClass("tabContentActive"),jQuery(this).parent().addClass("tabActive"),jQuery(i).fadeIn().addClass("tabContentActive")}))}))}function initAccordion(){jQuery((function(){jQuery(".accordionMain .accordionOpener").click((function(e){e.preventDefault(),jQuery(this).parent().parent().hasClass("accActive")?(jQuery(this).parent().parent().removeClass("accActive"),jQuery(this).parent().next(".accContent").slideUp()):(jQuery(this).parents(".accordionMain").find(".accActive").removeClass("accActive"),jQuery(this).parents(".accordionMain").find(".accContent").slideUp(),jQuery(this).parent().parent().addClass("accActive"),jQuery(this).parent().next(".accContent").slideDown())}))}))}function initSlickSlides(){jQuery(".portfolioSlider").slick({dots:!0,arrows:!1,slidesToShow:3,slidesToScroll:1,responsive:[{breakpoint:1024,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:600,settings:{slidesToShow:1,slidesToScroll:1}}]}),jQuery(".testimonialsSlider").slick({prevArrow:'<button class="slick-prev" type="button"><i class="fa fa-chevron-left"></i></button>',nextArrow:'<button class="slick-next" type="button"><i class="fa fa-chevron-right"></i></button>',slidesToShow:3,slidesToScroll:1,responsive:[{breakpoint:1024,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:600,settings:{slidesToShow:1,slidesToScroll:1}}]}),jQuery(".projectsSlider").slick({slidesToShow:2,slidesToScroll:1,prevArrow:'<button class="slick-prev" type="button"><i class="fa fa-chevron-left"></i></button>',nextArrow:'<button class="slick-next" type="button"><i class="fa fa-chevron-right"></i></button>',responsive:[{breakpoint:767,settings:{slidesToShow:1,slidesToScroll:1}}]})}function initFixedHeader(){jQuery(window).scroll((function(){var e=jQuery("html");jQuery(window).scrollTop()>=150?e.addClass("fixed-header"):e.removeClass("fixed-header")}))}function initSmoothScroll(){jQuery('a.smoothScroll[href*="#"], .btn-explore').not('[href="#"]').not('[href="#0"]').click((function(e){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var i=jQuery(this.hash);(i=i.length?i:jQuery("[name="+this.hash.slice(1)+"]")).length&&(e.preventDefault(),jQuery("html, body").animate({scrollTop:i.offset().top-96},1e3,(function(){var e=jQuery(i);if(e.focus(),e.is(":focus"))return!1;e.attr("tabindex","-1"),e.focus()})))}}))}function initMapPoints(){jQuery((function(){jQuery(".marker-link").click((function(e){e.stopPropagation(),jQuery(this).parent().hasClass("pinActive")?jQuery(this).parent().removeClass("pinActive"):(jQuery(this).parents(".map-main").find(".pinActive").removeClass("pinActive"),jQuery(this).parent().addClass("pinActive"))})),jQuery(document).on("click",(function(e){!1===jQuery(e.target).is(".map-pin")&&jQuery(".map-pin").removeClass("pinActive")}))}))}function initSwiper(){var e=new Swiper(".swiperSlider2",{mousewheel:!0,autoHeight:!0,slidesPerView:"auto",freeMode:!0,pagination:{el:".swiper-pagination",type:"fraction"},effect:"fade",thumbs:{swiper:i},scrollbar:{el:".slider-scrollbar2",draggable:!0,hide:!1,snapOnRelease:!0,dragSize:46}}),i=new Swiper(".swiperSlider",{direction:"vertical",autoHeight:!0,mousewheel:!0,slidesPerView:"auto",freeMode:!0,thumbs:{swiper:e},pagination:{el:".swiper-pagination",clickable:!0},scrollbar:{el:".slider-scrollbar",draggable:!0,hide:!1,snapOnRelease:!0,dragSize:46}});new Swiper(".swiperSlider2",{slidesPerView:"auto",autoHeight:!0,freeMode:!0,mousewheel:!0,effect:"fade",thumbs:{swiper:i},scrollbar:{el:".slider-scrollbar2",draggable:!0,hide:!1,snapOnRelease:!0,dragSize:46},on:{init:function(){jQuery(".js-current-slide").text(this.realIndex+1),jQuery(".js-all-slide").text(this.slides.length)}}})}function initIsotope(){jQuery(".grid").isotope({itemSelector:".item-grid",percentPosition:!0,masonry:{columnWidth:".grid-sizer"}})}jQuery((function(){initNav(),initAccordion(),initTabs(),initSlickSlides(),initFixedHeader(),initSmoothScroll(),initMapPoints(),initSwiper(),initIsotope()})),jQuery(window).on("load",(function(){jQuery("html").addClass("pageLoaded")})),jQuery(document).ready((function(){canvasAnimation()})),jQuery(window).resize((function(){canvasAnimation()})),AOS.init();