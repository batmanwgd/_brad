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