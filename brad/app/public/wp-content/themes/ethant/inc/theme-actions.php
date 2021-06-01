<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

/**
 * Register sidebars
 */
if ( ! function_exists( 'ethant_register_sidebar' ) ) {
	function ethant_register_sidebar() {
		register_sidebar( array(
			'name' => esc_html__( 'Blog Sidebar', 'ethant' ),
			'id' => 'blog_sidebar',
			'description' => esc_html__( 'Blog Widget Area', 'ethant' ),
			'before_widget' => '<div id="%1$s" class="vlt-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="vlt-widget__title">',
			'after_title' => '</h5>'
		) );
	}
}
add_action( 'widgets_init', 'ethant_register_sidebar' );

/**
 * Before site wrapper
 */
if ( ! function_exists( 'ethant_before_site_wrapper' ) ) {
	function ethant_before_site_wrapper() {
		$class = 'vlt-site-wrapper';

		// preloader
		if ( ethant_get_theme_mod( 'preloader' ) == 'show' ) {
			$class .= ' animsition';
		}

		echo '<div class="' . ethant_sanitize_class( $class ) . '">';
	}
}
add_action( 'ethant/before_site_wrapper', 'ethant_before_site_wrapper' );

/**
 * After site wrapper
 */
if ( ! function_exists( 'ethant_after_site_wrapper' ) ) {
	function ethant_after_site_wrapper() {
		echo '</div>';
	}
}
add_action( 'ethant/after_site_wrapper', 'ethant_after_site_wrapper' );

/**
 * Change admin logo
 */
if ( ! function_exists( 'ethant_change_admin_logo' ) ) {
	function ethant_change_admin_logo() {
		if ( ! ethant_get_theme_mod( 'login_logo_image' ) ) {
			return;
		}
		$image_url = ethant_get_theme_mod( 'login_logo_image' );
		$image_w = ethant_get_theme_mod( 'login_logo_image_width' );
		$image_h = ethant_get_theme_mod( 'login_logo_image_height' );
		echo '<style type="text/css">
			h1 a {
				background: transparent url(' . esc_url( $image_url ) . ') 50% 50% no-repeat !important;
				width:' . esc_attr( $image_w ) . '!important;
				height:' . esc_attr( $image_h ) . '!important;
				background-size: cover !important;
			}
		</style>';
	}
}
add_action( 'login_head', 'ethant_change_admin_logo' );

/**
 * Prints Tracking code
 */
if ( ! function_exists( 'ethant_print_tracking_code' ) ) {
	function ethant_print_tracking_code() {
		$tracking_code = ethant_get_theme_mod( 'tracking_code' );
		if ( ! empty( $tracking_code ) ) {
			echo '' . $tracking_code;
		}
	}
}
add_action( 'wp_head', 'ethant_print_tracking_code' );