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