<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

/**
 * Required plugins
 */
if ( ! function_exists( 'ethant_tgm_plugins' ) ) {
	function ethant_tgm_plugins() {

		$source = 'http://paul-themes.com/wordpress/ethant/plugins/';

		$plugins = array(
			array(
				'name' => esc_html__( 'Kirki', 'ethant' ),
				'slug' => 'kirki',
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Ethant Helper Plugin', 'ethant' ),
				'slug' => 'ethant_helper_plugin',
				'source' => esc_url( $source . 'ethant_helper_plugin.zip' ),
				'required' => true,
			),
			array(
				'name' => esc_html__( 'GTranslate', 'ethant' ),
				'slug' => 'gtranslate',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Advanced Custom Fields PRO', 'ethant' ),
				'slug' => 'advanced-custom-fields-pro',
				'source' => esc_url( $source . 'advanced-custom-fields-pro.zip' ),
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Elementor Page Builder', 'ethant' ),
				'slug' => 'elementor',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Contact Form 7', 'ethant' ),
				'slug' => 'contact-form-7',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Regenerate Thumbnails', 'ethant' ),
				'slug' => 'regenerate-thumbnails',
				'required' => false,
			)
		);
		tgmpa( $plugins );
	}
}
add_action( 'tgmpa_register', 'ethant_tgm_plugins' );

/**
 * Print notice if helper plugin is not installed
 */
if ( ! function_exists( 'ethant_helper_plugin_notice' ) ) {
	function ethant_helper_plugin_notice() {
		if ( class_exists( 'VLThemesHelperPlugin' ) ) {
			return;
		}
		echo '<div class="notice notice-info is-dismissible"><p>' . sprintf( __( 'Please activate <strong>%s</strong> before your work with this theme.', 'ethant' ), 'Ethant Helper Plugin' ) . '</p></div>';
	}
}
add_action( 'admin_notices', 'ethant_helper_plugin_notice' );