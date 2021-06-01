<div class="vlt-dashboard-widget">
	<div class="vlt-dashboard-widget--title">
		<mark><?php echo vlthemes_dashboard()->strings[ 'widget_support_title' ]; ?></mark>
	</div>
	<div class="vlt-dashboard-widget--content">
		<div class="vlt-widget-support">
			<p><?php echo vlthemes_dashboard()->strings[ 'widget_support_text1' ]; ?></p>
			<div class="clear"></div>
			<a target="_blank" href="<?php echo vlthemes_dashboard()->strings[ 'support_link' ]; ?>" class="button button-help"><?php echo vlthemes_dashboard()->strings[ 'support_text' ]; ?></a>
			<div class="clear"></div>
			<p class="small"><?php echo sprintf( vlthemes_dashboard()->strings[ 'widget_support_text2' ], vlthemes_helper_plugin()->theme_name ); ?></p>
		</div>
	</div>
</div>
<!--end .vlt-dashboard-widget-->