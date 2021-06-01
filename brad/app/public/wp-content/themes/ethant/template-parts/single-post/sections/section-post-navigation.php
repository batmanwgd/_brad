<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

if ( get_previous_post_link() ) : ?>

	<div class="vlt-post-navigation">
		<span><?php esc_html_e( 'Next Post', 'ethant' ); ?></span>
		<h3><?php previous_post_link( '%link' ); ?></h3>
	</div>
	<!-- /.vlt-post-navigation -->

<?php endif; ?>