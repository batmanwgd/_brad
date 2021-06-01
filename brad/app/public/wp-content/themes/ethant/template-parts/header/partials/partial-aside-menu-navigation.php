<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<nav class="vlt-aside-menu__navigation">

	<?php

		$acf_onepage_navigation = ethant_get_theme_mod( 'onepage_navigation', true );

		if ( $acf_onepage_navigation ) {

			wp_nav_menu( array(
				'theme_location' => 'onepage-menu',
				'container' => false,
				'depth' => 1,
				'menu_class' => 'sf-menu sf-menu-onepage',
				'fallback_cb' => 'ethant_fallback_menu',
				'walker' => new Ethant_Custom_Walker_Nav_Menu()
			) );


		} else {

			wp_nav_menu( array(
				'theme_location' => 'primary-menu',
				'container' => false,
				'depth' => 3,
				'menu_class' => 'sf-menu',
				'fallback_cb' => 'ethant_fallback_menu',
				'walker' => new Ethant_Custom_Walker_Nav_Menu()
			) );

		}

	?>

</nav>
<!-- /.vlt-aside-menu__navigation -->