<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<div class="container">

	<div class="row">

		<div class="col-md-8 offset-md-2">

			<article <?php post_class( 'vlt-page' ); ?>>

				<div class="vlt-content-markup">
					<?php the_content(); ?>
				</div>

				<?php

					wp_link_pages( array(
						'before' => '<div class="vlt-link-pages"><h5>' . esc_html__( 'Pages: ', 'ethant' ) . '</h5>',
						'after' => '</div>',
						'separator' => '<span class="sep">|</span>',
						'nextpagelink' => esc_html__( 'Next page', 'ethant' ),
						'previouspagelink' => esc_html__( 'Previous page', 'ethant' ),
						'next_or_number' => 'next'
					) );

				?>
				<div class="clearfix"></div>

			</article>
			<!-- /.vlt-page -->

			<?php

				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			?>

		</div>

	</div>

</div>