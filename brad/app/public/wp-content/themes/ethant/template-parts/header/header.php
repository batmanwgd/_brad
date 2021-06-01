<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$acf_navbar = ethant_get_theme_mod( 'page_custom_navigation', true );

if ( ethant_get_theme_mod( 'navigation_show', $acf_navbar ) == 'hide' ) {
	return;
}

$header_class = 'vlt-header';
$navbar_class = 'vlt-navbar vlt-navbar--main vlt-boxed';

if ( ethant_get_theme_mod( 'navigation_fixed', $acf_navbar ) == 'enable' ) {
	$navbar_class .= ' vlt-navbar--fixed';
}

if ( is_404() || is_page_template( 'template-fullpage-slider.php' ) ) {
	$navbar_class .= ' vlt-navbar--fixed';
}

?>

<header class="<?php echo ethant_sanitize_class( $header_class ); ?>">

	<div class="<?php echo ethant_sanitize_class( $navbar_class ); ?>">

		<div class="vlt-navbar-background"></div>

		<div class="vlt-navbar-inner">

			<div class="vlt-navbar-inner--left">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="vlt-navbar-logo">
					<?php if ( ethant_get_theme_mod( 'navigation_logo' ) ) : ?>
						<img src="<?php echo esc_url( ethant_get_theme_mod( 'navigation_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>">
					<?php else: ?>
						<h2><?php bloginfo( 'name' ); ?></h2>
					<?php endif; ?>
				</a>
				<!-- .vlt-navbar-logo -->

			</div>
			<!-- /.vlt-navbar-inner--left -->

			<div class="vlt-navbar-inner--right">

				<div class="d-flex align-items-center">

					<a href="#" class="vlt-menu-burger">
						<span class="line line-one"><span></span></span>
						<span class="line line-two"><span></span></span>
						<span class="line line-three"><span></span></span>
					</a>
					<!-- /.vlt-menu-burger -->

				</div>

			</div>
			<!-- /.vlt-navbar-inner--right -->

		</div>
		<!-- /.vlt-navbar-inner -->

	</div>
	<!-- /.vlt-navbar -->

</header>
<!-- /.vlt-header -->

<?php get_template_part( 'template-parts/header/partials/partial', 'aside-menu' ); ?>