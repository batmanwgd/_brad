<div class="wrap about-wrap vlt-dashboard">

	<h1><?php printf( vlthemes_dashboard()->strings[ 'dashboard_title'], vlthemes_helper_plugin()->theme_name, vlthemes_helper_plugin()->theme_version ); ?></h1>

	<div class="about-text"><?php printf( vlthemes_dashboard()->strings[ 'dashboard_subtitle' ], vlthemes_helper_plugin()->theme_name ); ?></div>

	<div class="wp-badge"></div>

	<p class="vlt-page-actions">
		<a target="_blank" href="<?php echo vlthemes_dashboard()->strings[ 'subscribe_link' ]; ?>" class="button button-primary"><?php echo vlthemes_dashboard()->strings[ 'subscribe_text' ]; ?></a>
		<a target="_blank" href="<?php echo vlthemes_dashboard()->strings[ 'documentation_link' ]; ?>" class="button button-secondary"><?php echo vlthemes_dashboard()->strings[ 'documentation_text' ]; ?></a>
		<a target="_blank" href="<?php echo vlthemes_dashboard()->strings[ 'support_link' ]; ?>" class="button button-help"><?php echo vlthemes_dashboard()->strings[ 'support_text' ]; ?></a>
	</p>
	<div class="clear"></div>
	<div class="panels vlt-panels">
		<?php
			$widgets = vlthemes_dashboard()->widgets();
			foreach( $widgets as $widget ) {
				require_once vlthemes_helper_plugin()->plugin_path . '/includes//dashboard/widgets/' . $widget . '.php';
			}
		?>
	</div>
	<div class="clear"></div>
	<p class="vlt-thank-you">
		<?php printf( vlthemes_dashboard()->strings[ 'footer_thank_you' ], vlthemes_helper_plugin()->theme_name ); ?>
	</p>
</div>