<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<div class="vlt-aside-menu__header">

	<nav class="vlt-aside-menu__locales">

		<?php

			if ( class_exists( 'GTranslate' ) ) {
				echo do_shortcode( '[gtranslate]' );
			}

		?>

	</nav>
	<!-- /.vlt-aside-menu__locales -->

	<a href="#" class="vlt-menu-burger vlt-menu-burger--opened">
		<span class="line line-one"><span></span></span>
		<span class="line line-two"><span></span></span>
		<span class="line line-three"><span></span></span>
	</a>
	<!-- /.vlt-menu-burger -->

</div>
<!-- /.vlt-aside-menu__header -->