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