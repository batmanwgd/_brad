<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$acf_footer = ethant_get_theme_mod( 'page_custom_footer', true );
$acf_ornament = ethant_get_theme_mod( 'page_custom_footer_ornament', true );

if ( ethant_get_theme_mod( 'footer_show', $acf_footer ) == 'hide' ) {
	return;
}

$footer_class = 'vlt-footer vlt-boxed';

if ( ethant_get_theme_mod( 'footer_fixed', $acf_footer ) == 'enable' ) {
	$footer_class .= ' vlt-footer--fixed';
}

if ( is_404() || is_page_template( 'template-fullpage-slider.php' ) ) {
	$footer_class .= ' vlt-footer--fixed';
}

?>

<footer class="<?php echo ethant_sanitize_class( $footer_class ); ?>">

	<?php if ( ethant_get_theme_mod( 'footer_ornament', $acf_ornament ) == 'show' ) : ?>
		<div class="vlt-footer__ornament"></div>
	<?php endif; ?>

	<div class="vlt-footer__left">

		<?php if ( ethant_get_theme_mod( 'footer_copyright' ) ) : ?>

			<div class="vlt-footer-copyright"><?php echo wp_kses_post( ethant_get_theme_mod( 'footer_copyright' ) ); ?></div>
			<!-- /.vlt-footer-copyright -->

		<?php endif; ?>

	</div>

	<div class="vlt-footer__right text-center">

		<?php if ( ethant_get_theme_mod( 'footer_social_list' ) ) : ?>

			<ul class="vlt-footer-socials">
				<?php
					$socialIcons = ethant_get_social_icons();
					foreach ( ethant_get_theme_mod( 'footer_social_list' ) as $socialItem ) :
						foreach ( $socialIcons as $key => $socialIcon ) {
							if ( $socialItem['social_icon'] == $key ) {
								echo '<li><a href="' . esc_url( $socialItem['social_url'] ) . '" target="_blank"><i class="' . ethant_sanitize_class( $key ) . '"></i></a></li>';
							}
						}
					endforeach;
				?>
			</ul>
			<!-- /.vlt-footer-socials -->

		<?php endif; ?>

		<?php if ( ethant_get_theme_mod( 'footer_cf7_shortcode' ) ) : ?>

			<div class="vlt-footer-form-trigger">
				<span><?php esc_html_e( 'Let’s talk', 'ethant' ); ?></span>
				<a href="#" data-toggle="modal" data-target="#vlt-contact-form"><i class="lnr-bubbles"></i></a>
			</div>
			<!-- /.vlt-footer-form-trigger -->

		<?php endif; ?>

	</div>

</footer>
<!-- /.vlt-footer -->

<?php if ( ethant_get_theme_mod( 'footer_cf7_shortcode' ) ) : ?>

	<div class="modal fade" id="vlt-contact-form" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="<?php esc_html_e( 'Close', 'ethant' ); ?>">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo do_shortcode( html_entity_decode( ethant_get_theme_mod( 'footer_cf7_shortcode' ) ) ); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- /.modal -->

<?php endif; ?>