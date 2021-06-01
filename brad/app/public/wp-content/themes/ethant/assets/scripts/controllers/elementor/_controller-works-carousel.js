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