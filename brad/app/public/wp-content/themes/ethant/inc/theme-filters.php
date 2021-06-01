<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

/**
 * ACF in Admin Panel
 */
if ( ! function_exists( 'ethant_acf_in_admin_panel' ) ) {
	function ethant_acf_in_admin_panel() {
		return ethant_get_theme_mod( 'acf_show_admin_panel' ) == 'show' ? true : false;
	}
}
add_filter( 'ethant/acf_show_admin_panel', 'ethant_acf_in_admin_panel' );

/**
 * Add body class
 */
if ( ! function_exists( 'ethant_add_body_class' ) ) {
	function ethant_add_body_class( $classes ) {
		$classes[] = '';
		if ( ! wp_is_mobile() ) {
			$classes[] = 'no-mobile';
		} else {
			$classes[] = 'is-mobile';
		}
		return $classes;
	}
}
add_filter( 'body_class', 'ethant_add_body_class' );

/**
 * Add html class
 */
if ( ! function_exists( 'ethant_add_html_class' ) ) {
	function ethant_add_html_class( $classes = '' ) {

		// color scheme
		$acf_color_scheme = ethant_get_theme_mod( 'site_color_scheme', true );
		$classes .= ' vlt-is--' . ethant_get_theme_mod( 'site_color_scheme', $acf_color_scheme ) . '-scheme';

		return apply_filters( 'ethant/add_html_class', ethant_sanitize_class( $classes ) );
	}
}

/**
 * Get post password form
 */
if ( ! function_exists( 'ethant_get_post_password_form' ) ) {
	function ethant_get_post_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$output = '<form class="vlt-post-password-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">';
		$output .= '<h4>' . esc_html__( 'Password Protected', 'ethant' ) . '</h4>';
		$output .= '<p>' . esc_html__( 'This content is restricted access, please type the password below and get access.', 'ethant' ) . '</p>';
		$output .= '<div class="d-flex">';
		$output .= '<input name="post_password" id="' . $label . '" type="password" size="20" placeholder="' . esc_attr__( 'Password:' , 'ethant' ) . '">';
		$output .= '<button class="vlt-btn vlt-btn--primary">' . esc_html__( 'Get Access' , 'ethant' ) . '</button>';
		$output .= '</div>';
		$output .= '</form>';
		return apply_filters( 'ethant/get_post_password_form', $output );
	}
}
add_filter( 'the_password_form', 'ethant_get_post_password_form' );

/**
 * Admin logo link
 */
if ( ! function_exists( 'ethant_change_admin_logo_link' ) ) {
	function ethant_change_admin_logo_link() {
		return home_url( '/' );
	}
}
add_filter( 'login_headerurl', 'ethant_change_admin_logo_link' );

/**
 * Comment form fields order
 */
if ( ! function_exists( 'ethant_comment_form_fields' ) ) {
	function ethant_comment_form_fields( $comment_fields ) {
		if ( ethant_get_theme_mod( 'comment_placement' ) == 'bottom' ) {
			$keys = array_keys( $comment_fields );
			if ( 'comment' == $keys[0] ) {
				$comment_fields['comment'] = array_shift( $comment_fields );
			}
		}
		return $comment_fields;
	}
}
add_filter( 'comment_form_fields', 'ethant_comment_form_fields' );

/**
 * Remove comment notes
 */
add_filter( 'comment_form_logged_in', '__return_empty_string' );

/**
 * Add comma to tag widget
 */
if ( ! function_exists( 'ethant_filter_tag_cloud' ) ) {
	function ethant_filter_tag_cloud( $args ) {
		$args['smallest'] = .875;
		$args['largest'] = .875;
		$args['unit'] = 'rem';
		$args['orderby'] = 'count';
		$args['order'] = 'DESC';
		$args['separator']= '';
		return $args;
	}
}
add_filter( 'widget_tag_cloud_args', 'ethant_filter_tag_cloud' );

/**
 * Extend mime tipes
 */
if ( ! function_exists( 'ethant_mime_types' ) ) {
	function ethant_mime_types( $mime_types ) {
		$mime_types['mp3'] = 'audio/mpeg';
		$mime_types['svg'] = 'image/svg+xml';
		return $mime_types;
	}
}
add_filter( 'upload_mimes', 'ethant_mime_types' );