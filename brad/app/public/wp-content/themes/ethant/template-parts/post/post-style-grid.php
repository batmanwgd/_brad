<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$size = 'ethant-680x460_crop';
$post_class = 'vlt-post vlt-post--style-grid';

?>

<article <?php post_class( $post_class ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="vlt-post-thumbnail">
			<?php echo wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), $size ); ?>
			<?php get_template_part( 'template-parts/post/partials/partial', 'thumbnail-link' ); ?>
		</div>
		<!-- /.vlt-post-thumbnail -->

	<?php endif; ?>

	<div class="vlt-post-content">

		<header class="vlt-post-header">
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-meta' ); ?>
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-title' ); ?>
		</header>
		<!-- /.vlt-post-header -->

		<div class="vlt-post-excerpt">
			<?php echo ethant_get_trimmed_content( get_the_content(), 14 ); ?>
		</div>
		<!-- /.vlt-post-excerpt -->

	</div>
	<!-- /.vlt-post-content -->

</article>
<!-- /.vlt-post -->