<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

if ( ! function_exists( 'ethant_dynamic_css' ) ) {
	function ethant_dynamic_css( $css ) {
		$css .= '';

		return $css;
	}
}
add_filter( 'kirki_ethant_customize_dynamic_css', 'ethant_dynamic_css' );