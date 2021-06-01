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