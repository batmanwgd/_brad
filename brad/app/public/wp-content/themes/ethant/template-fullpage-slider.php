<?php

/**
 * Template Name: Fullpage Slider
 * @author: VLThemes
 * @version: 1.0.1
 */

get_header();

$loop_top = ethant_get_field( 'slider_loop_top' );
$loop_bottom = ethant_get_field( 'slider_loop_bottom' );
$speed = ethant_get_field( 'slider_speed' );
$dots = ethant_get_field( 'slider_dots' );

// prepend query
$args = array(
	'post_type' => 'slide',
	'posts_per_page' => -1,
	'post_status' => 'publish',
);

$new_query = new WP_Query( $args );

$slide_IDs = [];

?>

<main class="vlt-main">

	<div class="vlt-fullpage-slider" data-loop-top="<?php echo esc_attr( $loop_top ); ?>" data-loop-bottom="<?php echo esc_attr( $loop_bottom ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>">

		<?php

			if ( $new_query->have_posts() ) : while ( $new_query->have_posts() ) : $new_query->the_post();

				$slide_ID = get_post_field( 'post_name', get_post() );
				$slide_IDs[] = $slide_ID;

				// slide settings
				$slide_background_color = ethant_get_field( 'slide_background_color' );
				$slide_background_image = ethant_get_field( 'slide_background_image' );
				$slide_background_image = wp_get_attachment_image_src( $slide_background_image, 'ethant-1920x1080_crop' )[0];
				$slide_ornament_image = ethant_get_field( 'slide_ornament_image' );
				$slide_ornament_image = wp_get_attachment_image_src( $slide_ornament_image, 'ethant-1920x1080_crop' )[0];
				$slide_lines = ethant_get_field( 'slide_lines' );
				$slide_lines_color = ethant_get_field( 'slide_lines_color' );
				$slide_parallax = ethant_get_field( 'slide_parallax' );

				$section_style = '';
				if ( $slide_background_color ) {
					$section_style .= ' background-color: ' . $slide_background_color . ';';
				}
				if ( $slide_background_image ) {
					$section_style .= ' background-image: url(' . $slide_background_image . ');';
				}

				$lines_style = '';
				if ( $slide_lines_color ) {
					$lines_style .= ' color: ' . $slide_lines_color . ';';
				}
				?>

				<div class="vlt-section pp-scrollable" data-anchor="<?php echo esc_attr( $slide_ID ); ?>" style="<?php echo ethant_sanitize_style( $section_style ); ?>">

					<div class="vlt-section__vertical-align-wrap">

						<?php if ( $slide_lines ) : ?>

							<div class="vlt-section__lines" style="<?php echo ethant_sanitize_style( $lines_style ); ?>">
								<div></div>
								<div></div>
								<div></div>
								<div></div>
							</div>

						<?php endif; ?>

						<?php

							if ( $slide_parallax ) {

								if ( have_rows( 'slide_parallax_layers' ) ) {

									echo '<div class="vlt-section__parallax">';

									// loop through the rows of data
									while ( have_rows( 'slide_parallax_layers' ) ) : the_row();

										// display a sub field value
										$depth = get_sub_field( 'parallax_depth' );
										$image = wp_get_attachment_image_src( get_sub_field( 'parallax_image' ), 'ethant-1920x1080_crop' )[0];

										echo '<div class="layer" data-depth="' . $depth . '" style="background-image: url(' . $image . ');"></div>';

									endwhile;

									echo '</div>';

								}

							}

						?>

						<?php if ( $slide_ornament_image ) : ?>

							<div class="vlt-section__ornament" style="background-image: url(<?php echo esc_attr( $slide_ornament_image ); ?>);"></div>

						<?php endif; ?>

						<div class="vlt-section__vertical-align vlt-boxed--vertical">

							<div class="container">

								<?php the_content(); ?>

							</div>

						</div>

					</div>

				</div>

				<?php

			endwhile; endif;
			wp_reset_postdata();

			// show dots
			if ( $dots ) {
				echo '<ul class="vlt-fullpage-slider-navigation">';
				foreach ( $slide_IDs as $slide_ID ) {
					echo '<li class="down" data-menuanchor="' . $slide_ID . '"></li>';
				}
				echo '</ul>';
			}

		?>

	</div>

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>