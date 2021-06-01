<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<div class="vlt-about-author">

	<?php if ( get_avatar( get_the_author_meta( 'email' ), 80 ) ) : ?>

		<div class="vlt-about-author__avatar">

			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
				<?php echo get_avatar( get_the_author_meta( 'email' ), 80 ); ?>
			</a>

		</div>
		<!-- /.vlt-about-author__avatar -->

	<?php endif; ?>

	<div class="vlt-about-author__content">

		<h4 class="vlt-about-author__name"><?php the_author_posts_link(); ?></h4>
		<div class="vlt-about-author__role"><?php echo ethant_get_author_role(); ?></div>

		<?php if ( get_the_author_meta( 'description' ) ) : ?>
			<p><?php the_author_meta( 'description' ); ?></p>
		<?php endif; ?>

	</div>
	<!-- /.vlt-about-author__content -->

</div>
<!-- /.vlt-about-author -->