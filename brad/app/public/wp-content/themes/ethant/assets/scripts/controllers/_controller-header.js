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