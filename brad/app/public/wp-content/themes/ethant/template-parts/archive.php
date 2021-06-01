<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$pagination = ethant_get_theme_mod( 'blog_type_pagination' );

$column_sidebar_class = 'col-md-4';

if ( is_active_sidebar( 'blog_sidebar' ) ) {
	$column_content_class = 'col-md-8';
} else {
	$column_content_class = 'col-md-12';
}

$post_list_class = 'vlt-blog-posts';

?>

<div class="container">

	<div class="row">

		<div class="<?php echo ethant_sanitize_class( $column_content_class ); ?>">

			<div class="<?php echo ethant_sanitize_class( $post_list_class ); ?>">

				<?php

					if ( have_posts() ) :

						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/post/post-style', 'default' );

						endwhile;

						echo ethant_get_page_pagination( null, $pagination );

					else:

						get_template_part( 'template-parts/content/content-page', 'empty' );

					endif;

					wp_reset_postdata();

				?>

			</div>

		</div>

		<?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>

			<div class="<?php echo ethant_sanitize_class( $column_sidebar_class ); ?>">

				<div class="vlt-sidebar vlt-sidebar--right">

					<?php get_sidebar(); ?>

				</div>

			</div>

		<?php endif; ?>

	</div>

</div>