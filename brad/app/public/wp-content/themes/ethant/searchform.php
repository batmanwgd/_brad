<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<form class="vlt-search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search&hellip;', 'ethant' ); ?>" value="<?php echo get_search_query(); ?>">
	<button class="vlt-btn vlt-btn--primary"><?php esc_html_e( 'Search', 'ethant' ); ?></button>
</form>
<!-- /.vlt-search-form -->