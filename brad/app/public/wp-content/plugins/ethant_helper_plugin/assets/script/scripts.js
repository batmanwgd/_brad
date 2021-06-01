(function($) {
	$('.vlt-drop-parent').each(function() {
		new Drop({
			target: this,
			content: $(this).children('.vlt-drop-content').html(),
			classes: 'vlt-drop-tether drop-theme-arrows drop-theme-arrows-bounce-dark',
			position: 'top left',
			openOn: 'hover',
		})
	});
})(jQuery);
