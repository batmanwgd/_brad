<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<?php if ( get_the_tags() ) : ?>

	<div class="vlt-post-tags">

		<?php the_tags( '', '' ); ?>

	</div>
	<!-- /.vlt-post-tags -->

<?php endif; ?>


<?php if ( function_exists( 'vlthemes_get_post_share_buttons' ) && ethant_get_theme_mod( 'show_share_post' ) == 'show' ) : ?>

	<div class="vlt-social-share">

		<h5><?php esc_html_e( 'Share on:', 'ethant' ); ?></h5>

		<?php echo vlthemes_get_post_share_buttons( get_the_ID() ); ?>

	</div>
	<!-- /.vlt-social-share -->

<?php endif; ?>

<?php

	if ( ethant_get_theme_mod( 'about_author' ) == 'show' ) {

		get_template_part( 'template-parts/single-post/sections/section', 'about-author' );

	}

?>