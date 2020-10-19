jQuery(function($) {

	// Header Sticky Scroll
	$(window).scroll(function(){
		ss_get_top_bar_height();
		function ss_get_top_bar_height(){
			var //SSbody = $('body'),
				SSheader = $('.page-fixed-header .header-wrap'),
				//SSmain = $('.non_header_float:not(.header-side).sticky-scroll #main_content'),
				SSheader_height = $('.page-fixed-header .header-wrap').outerHeight();
		    if ($(window).scrollTop() >= 100) {
			    //SSbody.addClass('body-fixed-header');
		        SSheader.addClass('fixed-header');
		    }
		    else {
			    //SSbody.removeClass('body-fixed-header');
		        SSheader.removeClass('fixed-header');
		    }
		    if ($(window).scrollTop() >= 300) {
		        SSheader.addClass('showed');
		    }
		    else {
		        SSheader.removeClass('showed');
		    }
	    }
	});

	//$( '.woocommerce-page div.product div.summary img' ).wrap( '<span class="slider_img"></span>');
	$(".yith-quick-view.yith-modal .yith-quick-view-content .images a").removeAttr('href');    
    $(".yith-wcqv-main a").each(function(){
        if($(this).hasClass("woocommerce-main-image")){
            $(this).removeAttr("href");
        }
    });


	//* ## Add Class to navigation if has megamenu */
	if ($('nav#site-navigation li').hasClass('mega-menu')) {
	    //$(this).parent().addClass('has-mega-menu');
		$("nav#site-navigation li.mega-menu").parent().parent().parent().parent().addClass("has-mega-menu");
		//$("nav#site-navigation li.mega-menu").parents().addClass("has-mega-menu");
	}

	
	//* ## CSS Object-fit IE */
	var userAgent, ieReg, ie;
	userAgent = window.navigator.userAgent;
	ieReg = /msie|Trident.*rv[ :]*11\./gi;
	ie = ieReg.test(userAgent);
	IEobjectfitContain = $('.single-product.woocommerce .woocommerce-product-gallery__image span, .masonary_grid_link.grid_features_icon .grid-item-inner-img');
	IEobjectfitCover = $('.media_content_item.full_image.image_style_cover .full_image_img, .masonary_grid_link.grid_features_clean .grid-item-inner-img, .masonary_grid_link.grid_features .layout.row-flex .grid-item-inner');
	
	if(ie) {
		IEobjectfitCover.each(function () {
			var $container = $(this),
			    imgUrl = $container.find("img").prop("src");
			if (imgUrl) {
			  $container.css("backgroundImage", 'url(' + imgUrl + ')').addClass("cover-object-fit");
			}
		});
		
		IEobjectfitContain.each(function () {
			var $container = $(this),
			    imgUrl = $container.find("img").prop("src");
			if (imgUrl) {
			  $container.css("backgroundImage", 'url(' + imgUrl + ')').addClass("contain-object-fit");
			}
		});
	}

	objectfitCover = $('');
	objectfitContain = $('.single-product.woocommerce .woocommerce-product-gallery__image span');
	objectfitCover.each(function () {
		var $container = $(this),
		    imgUrl = $container.find("img").prop("src");
		if (imgUrl) {
		  $container.css("backgroundImage", 'url(' + imgUrl + ')').addClass("cover-object-fit");
		}
	});
	objectfitContain.each(function () {
		var $container = $(this),
		    imgUrl = $container.find("img").prop("src");
		if (imgUrl) {
		  $container.css("backgroundImage", 'url(' + imgUrl + ')').addClass("contain-object-fit");
		}
	});	
	
	//* ## Top Bar - menu */
	"use strict";
	//Checks if li has sub (ul) and adds class for toggle icon - just an UI
    $('#panel-nav > ul > li:has( > ul)').addClass('menu-dropdown-icon');
    $('#panel-nav > ul > li > ul:not(:has(ul))').addClass('normal-sub');
    $("#panel-nav > ul > li").click(function () {
	    if ($(window).width() <= 991) {
            $(this).toggleClass("subnav-open");
            $(this).children("ul").slideToggle(500);
        }
    });
    $("#panel-nav > ul > li.menu-dropdown-icon:before").click(function () {
	    if ($(window).width() <= 991) {
            $(this).children("ul").slideToggle(500);
            $(this).toggleClass("subnav-open");
            $("#panel-nav > ul > li").toggleClass("subnav-open");
        }
    });    

	//If width is more than 991px dropdowns are displayed on hover
    $("#panel-nav > ul > li").hover(
        function (e) {
            if ($(window).width() > 991) {
                $(this).children("ul").fadeIn(250);
                e.preventDefault();
            }
        }, function (e) {
            if ($(window).width() > 991) {
                $(this).children("ul").fadeOut(250);
                e.preventDefault();
            }
        }
    );   

	//* ## Page Accordion Q&A split 2 columns (Option #1)
    $.fn.splitList = function() {
        var that = this,
            li = $('.inside-footer-widgets ul.menu li', that),
            len = li.length,
            half = Math.round(len / 2);
            //half = Math.floor(len / 2);
        return that.each(function() {
            li.slice(0, half).wrapAll('<div class=".content_page_qa page_qa_subcol col-sx-12 col-sm-6"></div>');
            li.slice(half, len).wrapAll('<div class=".content_page_qapage_qa_subcol col-sx-12 col-sm-6"></div>');
        });
    };
    $( ".content_page_qa .page_qa_one_item" ).wrapAll( "<div class='page_qa_subcol' />");


	// Accordion footer widgets
	var acc = $('.site-footer.accordion_footer .footer-widgets .widget-title');
	var i;
	for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", function() {
			/* Toggle between adding and removing the "active" class,
			to highlight the button that controls the panel */
			this.classList.toggle("active");
			
			/* Toggle between hiding and showing the active panel */
			var panel = this.nextElementSibling;
			if ($(window).width() < 767) {
				if (panel.style.maxHeight) {
					panel.style.maxHeight = null;
				} else {
					panel.style.maxHeight = panel.scrollHeight + "px";
				}
			}
		});
	}


   
	//* ## Home Master Hero slider - slick*/
	if ($('.hmh_hero_slider .slides .single-slider-item').length > 1) {
		$(".hmh_hero_slider .slides").slick({
			rtl: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			pauseOnHover: false,
			speed: 1500,
			autoplay: true,
			autoplaySpeed: 5000,
			arrows: false,
			dots: true,
			//cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
			draggable: true,
			//fade: true,
			infinite: true,
			touchThreshold: 100,
			responsive: [
		    {
		      breakpoint: 768,
		      settings: {
			    arrows: true,
		        adaptiveHeight: true,
		        autoplay: false,
		        dots: false,
		      }
		    }
			]
		});
	}
    
	//* ## MastHead full manual - slick*/
	if ($('.masthesd_full_manual .home_main_slider .home_main_slider_item').length > 1) {
		$(".masthesd_full_manual .home_main_slider").slick({
			rtl: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			pauseOnHover: false,
			speed: 900,
			autoplay: true,
			autoplaySpeed: 5000,
			arrows: false,
			dots: true,
			//cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
			draggable: true,
			//fade: true,
			infinite: true,
			touchThreshold: 100,
			responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        adaptiveHeight: true,
		        autoplay: false,
		      }
		    }
			]
		});
	}

	//* ## MastHead full Image - slick*/
	if ($('.masthead_img_slider .single-slider .single-slider-item').length > 1) {
		$(".masthead_img_slider .single-slider").slick({
			rtl: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			pauseOnHover: true,
			speed: 900,
			autoplay: false,
			autoplaySpeed: 6000,
			arrows: false,
			dots: true,
			//cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
			draggable: true,
			//fade: true,
			infinite: true,
			touchThreshold: 100
		});
	}	
	
	/* ---------------------------------------------------------------------- */
	/* -------------------- WOOCOMMERCE ------------------------------------- */
	/* ---------------------------------------------------------------------- */
	$(".cart-collaterals-col-inner").stick_in_parent({
	    offset_top: 10
	});

	// Category Page - Wrap subcaregories / products lists
	//$( ".subcategory_item" ).wrapAll( "<div id='subcategory_container'><div class='subcategory_container wrap'><div class='subcategory archive_product_loop row-flex'></div></div>");
	$( ".subcategory_product_item" ).wrapAll( "<div class='category_product_container wrap'><div class='products archive_product_loop row-flex'></div></div>");

	// Category Page - Filter dropdown on mobile
	$(".filter_title_wrap").on("click", function (e){
		e.preventDefault();
		
		var $this = $(this);
		if ($(window).width() < 767) {
			if ($this.hasClass("active")){
				$this.removeClass("active");
				$("form#Filters").removeClass("filter_open").addClass("filter_close").slideUp(350);
				
			}else{
				$this.addClass("active");
				$("form#Filters").addClass("filter_open").removeClass("filter_close").slideDown(350);
			};
		}
	});

    //Mini-cart popup
	var $document = $(document),
		$page = $("#page, #mh_hero"),
		$cartHead = $("#mini-cart .cart-head"),
	    $cartPopup = $("#mini-cart .cart-popup"),
	    $cartClose = $("#mini-cart .widget_shopping_cart_head");
	
	$cartHead.on("click", function (e){
		e.preventDefault();
		var $this = $(this);

		if ($this.hasClass("active")){
			$this.removeClass("active");
			$cartPopup.removeClass("open").addClass("close").slideUp(350);
		}else{
			$this.addClass("active");
			$cartPopup.addClass("open").removeClass("close").slideDown(350);
		};
		$page.on("click", function (){
			$cartHead.removeClass("active");
			$cartPopup.removeClass("open").addClass("close").slideUp(350);
		});		
		$cartClose.on("click", function (){
			$cartHead.removeClass("active");
			$cartPopup.removeClass("open").addClass("close").slideUp(350);
		});
	});
	
	//Product thumbnails carousel .flex-control-nav
	setTimeout(function() { 
		$('.flex-control-nav1111').slick({ 
			rtl: true, 
			dots: true, 
			infinite: true, 
			arrows: true, 
			speed: 600, 
			slidesToShow: 3, 
			slidesToScroll: 1, 
		}); 
	}, 300);

	//Related Products slider
	if ($('.related_products_slider .related_product_item').length > 1) {
		$(".product_related_products_row").slick({
			rtl: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			dots: false,
			pauseOnHover: true,
			speed: 500,
			autoplay: false,
			autoplaySpeed: 6000,
			arrows: true,
			responsive: [
		    {
		      breakpoint: 991,
		      settings: {
		        slidesToShow: 2
		      }
		    },
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 1,
		      }
		    }
			]
		});
	}

	//Category Article slider
	if ($('.archive_article_slider_wrapper .archive_article_slide').length > 1) {
		$(".archive_article_slider_wrapper").slick({
			rtl: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			dots: false,
			pauseOnHover: true,
			speed: 500,
			autoplay: false,
			autoplaySpeed: 6000,
			arrows: true,
			responsive: [
		    {
		      breakpoint: 991,
		      settings: {
		        slidesToShow: 2
		      }
		    },
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 1,
		      }
		    }
			]
		});
	}

	// Yith - Quik View - fancybox for product images
	$().fancybox({
	    selector : '.yith-quick-view .woocommerce div.product div.images a'
	});

	// Product Category Q&A
	$('.fc_VerticalTab').easyResponsiveTabs({
		type: 'vertical', //Types: default, vertical, accordion
		width: 'auto', //auto or any width like 600px
		fit: true, // 100% fit in a container
		closed: '', // accordion or '' Start closed if in accordion view
		tabidentify: 'hor_1', // The tab groups identifier
		active_Hash: false,// activate hash
		inactive_bg: '#f9f9f9',
		activate: function(event) { // Callback function if tab is switched
			var $tab = $(this);
			var $info = $('#nested-tabInfo2');
			var $name = $('span', $info);
			$name.text($tab.text());
			$info.show();
		}
	});
	
	
});