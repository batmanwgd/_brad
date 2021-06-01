<div class="vlt-dashboard-widget">
	<div class="vlt-dashboard-widget--title">

		<?php if ( vlthemes_is_theme_activated() ) { ?>

			<mark class="true"><?php echo vlthemes_dashboard()->strings[ 'widget_actiavtion_title' ]; ?></mark>
			<span class="vlt-dashboard-widget--title-badge true"><?php echo vlthemes_dashboard()->strings[ 'widget_activation_activated' ]; ?></span>

		<?php } else { ?>

			<mark class="false"><?php echo vlthemes_dashboard()->strings[ 'widget_actiavtion_title' ]; ?></mark>
			<span class="vlt-dashboard-widget--title-badge false"><?php echo vlthemes_dashboard()->strings[ 'widget_activation_not_activated' ]; ?></span>

		<?php } ?>

	</div>

	<div class="vlt-dashboard-widget--content">
		<div class="vlt-widget-activation">

			<?php if ( vlthemes_is_theme_activated() ) { ?>
				<p><?php echo vlthemes_dashboard()->strings[ 'widget_activation_activated_text' ]; ?></p>
			<?php } else { ?>
				<p><?php echo vlthemes_dashboard()->strings[ 'widget_activation_not_activated_text' ]; ?></p>
			<?php } ?>

		</div>
	</div>

</div>
<!--end .vlt-dashboard-widget-->