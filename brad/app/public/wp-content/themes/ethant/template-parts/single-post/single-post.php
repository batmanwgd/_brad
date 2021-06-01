<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$column_content_class = 'col-md-8 offset-md-2';

$size = 'ethant-1280x720_crop';
$post_class = 'vlt-post vlt-post--style-single';

?>

<div class="container">

	<div class="row">

		<div class="<?php echo ethant_sanitize_class( $column_content_class ); ?>">

			<article <?php post_class( $post_class ); ?>>

				<header class="vlt-post-header">

					<?php if ( ethant_get_post_taxonomy( get_the_ID(), 'category' ) ) : ?>
						<div class="vlt-post-category"><?php echo ethant_get_post_taxonomy( get_the_ID(), 'category', ', ' ); ?></div>
						<!-- /.vlt-post-category -->
					<?php endif; ?>

					<h1 class="vlt-post-title"><?php the_title(); ?></h1>
					<!-- /.vlt-post-title -->

					<div class="vlt-post-meta">

						<div class="row">

							<div class="col-sm-4">
								<h6><?php esc_html_e( 'Author', 'ethant' ); ?></h6>
								<?php echo get_the_author(); ?>
							</div>

							<div class="col-sm-4">
								<h6><?php esc_html_e( 'Published on', 'ethant' ); ?></h6>
								<time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time>
							</div>

							<div class="col-sm-4">
								<h6><?php esc_html_e( 'Reading time', 'ethant' ); ?></h6>
								<?php echo ethant_get_reading_time(); ?>
							</div>

						</div>

					</div>
					<!-- /.vlt-post-meta -->

				</header>
				<!-- /.vlt-post-header -->

				<?php if ( has_post_thumbnail() ) : ?>

					<div class="vlt-post-thumbnail">
						<?php echo wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), $size ); ?>
					</div>
					<!-- /.vlt-post-thumbnail -->

				<?php endif; ?>

				<div class="vlt-post-content clearfix">
					<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'content' ); ?>
				</div>
				<!-- /.vlt-post-content -->

				<footer class="vlt-post-footer">
					<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'footer' ); ?>
				</footer>
				<!-- /.vlt-post-footer -->

			</article>
			<!-- /.vlt-post -->

			<?php

				if ( ethant_get_theme_mod( 'show_about_author' ) == 'show' ) {
					get_template_part( 'template-parts/single-post/sections/section', 'about-author' );
				}

				if ( ethant_get_theme_mod( 'show_post_navigation' ) == 'show' ) {
					get_template_part( 'template-parts/single-post/sections/section', 'post-navigation' );
				}

			?>

			<?php

				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			?>

		</div>

	</div>

</div>
<!-- /.container -->