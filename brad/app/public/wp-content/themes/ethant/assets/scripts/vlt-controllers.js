/***********************************************
 * FULLPAGE SLIDER
 ***********************************************/
(function($) {

	'use strict';

	if (typeof $.fn.pagepiling == 'undefined') {
		return;
	}

	var el = $('.vlt-fullpage-slider'),
		navigation = $('.vlt-fullpage-slider-navigation'),
		loop_top = el.data('loop-top') ? true : false,
		loop_bottom = el.data('loop-bottom') ? true : false,
		speed = el.data('speed') || 280,
		anchors = [];

	if (!el.length) {
		return;
	}

	VLTJS.body.css('overflow', 'hidden');
	VLTJS.html.css('overflow', 'hidden');

	el.find('[data-anchor]').each(function() {
		anchors.push($(this).data('anchor'));
	});

	function vlthemes_show_navigation() {
		navigation.find('li:first-child').addClass('active');
		navigation.addClass('is-show');
	}

	el.pagepiling({
		menu: '.sf-menu, .vlt-fullpage-slider-navigation',
		scrollingSpeed: speed,
		loopTop: loop_top,
		loopBottom: loop_bottom,
		anchors: anchors,
		verticalCentered: true,
		sectionSelector: '.vlt-section',
		navigation: false,
		afterRender: function() {
			vlthemes_show_navigation();
		},
		onLeave: function(index, nextIndex, direction){
			switch(direction) {
				case 'down':
					navigation.find('li').eq(index).removeClass('up');
					navigation.find('li').eq(index).addClass('down');
				break;
				case 'up':
					navigation.find('li').eq(index - 1).removeClass('down');
					navigation.find('li').eq(index - 1).addClass('up');
				break;
			}
			vlthemes_typed_text();
			vlthemes_progress_bar();
		}
	});

	$('#pp-nav').remove();

	// Prepend progress bar
	if ($('.vlt-progress-bar').length) {
		$('.vlt-progress-bar').parents('.vlt-section').addClass('vlt-section__progress');
	}
	function vlthemes_progress_bar() {
		$('.vlt-section__progress').each(function() {
			var thisSlide = $(this),
				bar_el = thisSlide.find('.vlt-progress-bar .track');
			if (thisSlide.hasClass('active')) {
				bar_el.width('100%');
			} else {
				bar_el.width('0%');
			}
		});
	}
	vlthemes_progress_bar();

	// Prepend typed text
	if ($('.vlt-typed-text').length) {
		$('.vlt-typed-text').parents('.vlt-section').addClass('vlt-section__typed');
	}

	function vlthemes_typed_text() {
		if (typeof Typed !== 'undefined') {
			$('.vlt-section__typed').each(function() {
				var thisSlide = $(this);
				if (thisSlide.hasClass('active')) {
					var typed_el = thisSlide.find('.vlt-typed-text').html(''),
						typed_text = typed_el.data('text');
					new Typed(typed_el.get(0), {
						strings: [
							typed_text
						],
						typeSpeed: 60,
						startDelay: 1000,
						loop: false,
						showCursor: false
					});
				}
			});
		}
	}
	vlthemes_typed_text();

	// parallax layers
	if (typeof Parallax !== 'undefined') {
		$('.vlt-section__parallax').each(function() {
			new Parallax(this);
		});
	}

})(jQuery);
/***********************************************
 * HEADER ASIDE
 ***********************************************/
(function($) {
	'use strict';

	var menuAside = $('.vlt-aside-menu-wrapper ul.sf-menu'),
		menuOverlay = $('.vlt-aside-menu-overlay'),
		menuToggle = $('.vlt-menu-burger'),
		menuIsOpen = false;

	// check if plugin defined
	if (typeof $.fn.superclick !== 'undefined') {
		menuAside.superclick({
			delay: 300,
			cssArrows: false,
			animation: {
				opacity: 'show',
				height: 'show'
			},
			animationOut: {
				opacity: 'hide',
				height: 'hide'
			},
		});
	}

	function _open_menu() {
		menuOverlay.fadeIn(300);
		if (typeof anime !== 'undefined') {
			anime.timeline({
				easing: 'easeInOutQuad',
				delay: 0
			}).add({
				targets: '.vlt-aside-menu-wrapper',
				duration: 600,
				translateX: ['100%', 0]
			}).add({
				targets: ['.vlt-aside-menu__locales', '.vlt-aside-menu__navigation', '.vlt-aside-menu__contacts', '.vlt-aside-menu__copyright'],
				duration: 500,
				delay: anime.stagger(150),
				translateY: [50, 0],
				opacity: [0, 1],
				loop: false
			});
		}
		menuIsOpen = true;
	}

	function _close_menu() {
		menuOverlay.fadeOut(300);
		if (typeof anime !== 'undefined') {
			anime.timeline({
				easing: 'easeInOutQuad',
				delay: 0
			}).add({
				targets: '.vlt-aside-menu-wrapper',
				duration: 400,
				translateX: [0, '100%']
			}).add({
				targets: ['.vlt-aside-menu__locales', '.vlt-aside-menu__navigation', '.vlt-aside-menu__contacts', '.vlt-aside-menu__copyright'],
				duration: 0,
				translateY: [0, 50],
				opacity: [1, 0]
			});
		}
		menuIsOpen = false;
	}
	menuToggle.on('click', function(e) {
		e.preventDefault();
		if (!menuIsOpen) {
			_open_menu();
		} else {
			_close_menu();
		}
	});
	menuOverlay.on('click', function(e) {
		e.preventDefault();
		_close_menu();
	});
	$(document).on('keyup', function(e) {
		if (e.keyCode === 27) {
			_close_menu();
		}
	});

})(jQuery);

/***********************************************
 * LOCALES
 ***********************************************/
(function($) {
	'use strict';

	var asideLocalesLink = $('.vlt-aside-menu__locales .glink');
	asideLocalesLink.eq(0).addClass('is-active');
	asideLocalesLink.each(function(index) {
		var currentLink = $(this);
		currentLink.on('click', function() {
			var clickedGlink = $(this);
			asideLocalesLink.removeClass('is-active');
			clickedGlink.addClass('is-active');
			asideLocalesLink.eq(index).addClass('is-active');
		});
	});

})(jQuery);

/***********************************************
 * NAVBAR
 ***********************************************/
(function($) {
	'use strict';

	var navbarMain = $('.vlt-navbar--main');
	var navbarMainOffset = navbarMain.height();

	// fixed navbar
	function _fixed_navbar() {
		navbarMain.addClass('vlt-navbar--sticky');
	}

	function _unfixed_navbar() {
		navbarMain.removeClass('vlt-navbar--sticky');
	}

	function _on_scroll_navbar() {
		if ( $('.vlt-fullpage-slider').length ) {
			return;
		}

		if (VLTJS.window.scrollTop() > navbarMainOffset) {
			_fixed_navbar();
		} else {
			_unfixed_navbar();
		}
	}

	if (navbarMain.hasClass('vlt-navbar--fixed') ) {
		VLTJS.window.on('scroll resize', _on_scroll_navbar);
		_on_scroll_navbar();
	}

})(jQuery);
/***********************************************
 * ETHANT: OTHER SCRIPTS
 ***********************************************/
(function ($) {
	'use strict';

	// Fitvids
	if (typeof $.fn.fitVids !== 'undefined') {
		VLTJS.body.fitVids({
			ignore: 'object'
		});
	}

	// Widget menu
	if (typeof $.fn.superclick !== 'undefined') {
		$('.widget_pages > ul, .widget_nav_menu ul.menu').superclick({
			delay: 300,
			cssArrows: false,
			animation: {
				opacity: 'show',
				height: 'show'
			},
			animationOut: {
				opacity: 'hide',
				height: 'hide'
			},
		});
	}

	// Fast click
	if (typeof FastClick === 'function') {
		FastClick.attach(document.body);
	}

})(jQuery);
/***********************************************
 * ETHANT: PRELOADER
 ***********************************************/
(function ($) {
	'use strict';
	// check if plugin defined
	if (typeof $.fn.animsition == 'undefined') {
		return;
	}
	var animsitionClass = $('.animsition');
	animsitionClass.animsition({
		inDuration: 500,
		outDuration: 500,
		linkElement: 'a:not([target="_blank"]):not([href^="#"]):not([rel="nofollow"]):not([href~="#"]):not([href^=mailto]):not([href^=tel]):not(.sf-with-ul)',
		loadingClass: 'animsition-loading-2',
		loadingInner: '<div class="spinner"><span class="double-bounce-one"></span><span class="double-bounce-two"></span></div>',
	});
	animsitionClass.on('animsition.inEnd', function () {
		VLTJS.window.trigger('vlt.preloader_done');
		VLTJS.html.addClass('vlt-is-page-loaded');
	});
})(jQuery);
/***********************************************
 * WIDGET: BLOG LIST
 ***********************************************/
(function($) {

	'use strict';

	var VLThemesBlogList = function($scope, $) {

		// check if plugin defined
		if (typeof $.fn.isotope == 'undefined') {
			return;
		}

		if (typeof $.fn.imagesLoaded == 'undefined') {
			return;
		}

		var el = $scope.find('.vlt-blog-posts'),
			postsContainer = el.find('.masonry'),
			filters = el.find('.vlt-blog-posts__filters'),
			pagination = el.find('.vlt-pagination'),
			itemSelector = '.grid-item';

		// Blog grid
		postsContainer.imagesLoaded(function() {

			var $grid = postsContainer.isotope({
				itemSelector: '.grid-item',
				transformsEnabled: false,
				// options for masonry layout mode
				masonry: {
					columnWidth: '.grid-sizer',
					gutterWidth: '.gutter-sizer',
				}
			});

			// filter items on button click
			filters.on( 'click', 'li', function() {
				var $this = $(this),
					filterValue = $this.attr('data-filter');

				filters.find('li').removeClass('active');
				$this.addClass('active');

				$grid.isotope({
					filter: filterValue
				});

			});

			// ajax load more
			vlthemes_ajax_load_more();

			function vlthemes_ajax_load_more() {
				if (typeof VLT_LOAD_MORE_CDATA == 'undefined') {
					return;
				}

				var startPage = parseInt(VLT_LOAD_MORE_CDATA.load_more_btn_startPage) + 1,
					maxPages = parseInt(VLT_LOAD_MORE_CDATA.load_more_btn_maxPages),
					nextLink = VLT_LOAD_MORE_CDATA.load_more_btn_nextLink,
					noMore = VLT_LOAD_MORE_CDATA.load_more_btn_noMore,
					text = VLT_LOAD_MORE_CDATA.load_more_btn_text,
					loading = VLT_LOAD_MORE_CDATA.load_more_btn_loading;

				pagination.filter('.vlt-pagination--load-more').find('> a > span').html(text);

				pagination.filter('.vlt-pagination--load-more').on('click', 'a', function(e) {
					e.preventDefault();
					if (nextLink === null) {
						return;
					}
					var $this = $(this);
					if (!$this.hasClass('disabled')) {
						$this.addClass('loading');
						$this.find('span').html(loading);
					}
					if (startPage <= maxPages) {
						$.ajax({
							type: 'POST',
							url: nextLink,
							dataType: 'html',
							success: function(data) {
								var newElems = $(data).find(itemSelector);
								if (newElems.length > 0) {
									postsContainer.append(newElems);
									postsContainer.imagesLoaded(function() {
										postsContainer.isotope('appended', newElems);
									});
									$this.removeClass('loading');
									$this.find('span').html(text);
								} else {
									$this.removeClass('loading').addClass('disabled');
									$this.find('span').html(noMore);
								}
								startPage++;
								nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/' + startPage);
								if (startPage <= maxPages) {
									$this.removeClass('loading');
								} else {
									$this.removeClass('loading').addClass('disabled');
									$this.find('span').html(noMore);
								}
							}
						});
					}
				});
			}

		});

	}

	VLTJS.window.on('elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-blog-list.default',
			VLThemesBlogList
		);
	});

})(jQuery);
/***********************************************
 * WIDGET: CONTACT FORM 7
 ***********************************************/
(function($){

	'use strict';

	var VLThemesContactForm7 = function() {

		// Remove unused tags
		$('.wpcf7-form').find('p').contents().unwrap();
		$('.wpcf7-form').find('p, br').remove();

	};

	VLTJS.window.on('elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-contact-form-7.default',
			VLThemesContactForm7
		);
	});

	VLThemesContactForm7();

})(jQuery);
/***********************************************
 * WIDGET: TESTIMONIAL SLIDER
 ***********************************************/
(function($) {

	'use strict';

	var VLThemesTestimonialSlider = function($scope, $) {

		// check if plugin defined
		if (typeof $.fn.owlCarousel == 'undefined') {
			return;
		}

		var el = $scope.find('.vlt-testimonial'),
			loop = el.data('loop') || false;

		el.owlCarousel({
			items: 1,
			smartSpeed: 750,
			margin: 30,
			autoplayHoverPause: true,
			dots: true,
			nav: false,
			loop: loop
		});

	}

	VLTJS.window.on('elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-testimonial-slider.default',
			VLThemesTestimonialSlider
		);
	});

})(jQuery);
/***********************************************
 * WIDGET: WORKS CAROUSEL
 ***********************************************/
(function($) {

	'use strict';

	var VLThemesWorksCarousel = function($scope, $) {

		// check if plugin defined
		if (typeof $.fn.owlCarousel == 'undefined') {
			return;
		}

		var el = $scope.find('.vlt-works-carousel'),
			loop = el.data('loop') || false;

		el.owlCarousel({
			items: 3,
			smartSpeed: 750,
			margin: 30,
			autoplayHoverPause: true,
			dots: true,
			nav: false,
			dotData: false,
			loop: loop,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				900: {
					items: 3
				}
			}
		});

	}

	VLTJS.window.on('elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-works-carousel.default',
			VLThemesWorksCarousel
		);
	});

})(jQuery);