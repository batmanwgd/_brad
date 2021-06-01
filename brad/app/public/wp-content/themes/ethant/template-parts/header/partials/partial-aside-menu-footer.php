<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<div class="vlt-aside-menu__footer">

	<?php if ( ethant_get_theme_mod( 'header_contact_phone' ) || ethant_get_theme_mod( 'header_contact_email' ) ) : ?>

		<div class="vlt-aside-menu__contacts">

			<?php if ( ethant_get_theme_mod( 'header_contact_phone' ) ) : ?>
				<div class="phone">

					<?php if ( ethant_get_theme_mod( 'header_contact_phone_link' ) ) : ?>
						<a href="<?php echo esc_url( ethant_get_theme_mod( 'header_contact_phone_link' ) ); ?>">
					<?php endif; ?>

					<?php echo esc_html( ethant_get_theme_mod( 'header_contact_phone' ) ); ?>

					<?php if ( ethant_get_theme_mod( 'header_contact_phone_link' ) ) : ?>
						</a>
					<?php endif; ?>

				</div>
			<?php endif; ?>


			<?php if ( ethant_get_theme_mod( 'header_contact_email' ) ) : ?>
				<div class="email">

					<?php if ( ethant_get_theme_mod( 'header_contact_email_link' ) ) : ?>
						<a href="<?php echo esc_url( ethant_get_theme_mod( 'header_contact_email_link' ) ); ?>">
					<?php endif; ?>

					<?php echo esc_html( ethant_get_theme_mod( 'header_contact_email' ) ); ?>

					<?php if ( ethant_get_theme_mod( 'header_contact_email_link' ) ) : ?>
						</a>
					<?php endif; ?>

				</div>
			<?php endif; ?>

		</div>
		<!-- /.vlt-aside-menu__contacts -->

	<?php endif; ?>

	<?php if ( ethant_get_theme_mod( 'header_copyright' ) ) : ?>

		<div class="vlt-aside-menu__copyright"><?php echo wp_kses_post( ethant_get_theme_mod( 'header_copyright' ) ); ?></div>
		<!-- /.vlt-aside-menu__copyright -->

	<?php endif; ?>

</div>
<!-- /.vlt-aside-menu__footer -->