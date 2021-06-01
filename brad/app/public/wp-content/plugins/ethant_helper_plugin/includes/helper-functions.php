<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

/**
 * Share buttons
 */
if ( ! function_exists( 'vlthemes_get_post_share_buttons' ) ) {
	function vlthemes_get_post_share_buttons( $postID ) {
		$url = urlencode( get_permalink( $postID ) );
		$title = urlencode( get_the_title( $postID ) );
		$media = wp_get_attachment_image_src( get_post_thumbnail_id( $postID, 'full' ) );
		$output = '<a class="vlt-social-icon facebook" target="_blank" href="https://www.facebook.com/share.php?u=' . $url . '&title=' . $title . '"><i class="socicon-facebook"></i></a>';
		$output .= '<a class="vlt-social-icon twitter" target="_blank" href="https://twitter.com/home?status=' . $title . '+' . $url . '"><i class="socicon-twitter"></i></a>';
		$output .= '<a class="vlt-social-icon pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=' . $url . '&media=' . $media[0] . '&description=' . $title . '"><i class="socicon-pinterest"></i></a>';
		$output .= '<a class="vlt-social-icon linkedin" target="_blank" href="https://www.linkedin.com/shareArticle?url='. $url . '&title=' . $title . '"><i class="socicon-linkedin"></i></a>';

		return apply_filters( 'vlthemes/get_post_share_buttons', $output );
	}
}

/**
 * Theme activation
 */
if ( ! function_exists( 'vlthemes_theme_activation_notice' ) ) {
	function vlthemes_theme_activation_notice() {
	?>
		<div class="notice notice-warning">
			<p><?php esc_html_e( 'To unlock the theme functions and receive theme updates automatically, you need to activate your theme license.', 'vlthemes' ); ?></p>
			<p><?php echo sprintf( __( '<a href="%s" class="button button-primary">Activate</a>', 'vlthemes' ), admin_url( 'admin.php?page=theme-dashboard-license' ) ); ?></p>
		</div>
	<?php
	}
}

if ( ! function_exists( 'vlthemes_is_theme_activated' ) ) {
	function vlthemes_is_theme_activated() {
		return apply_filters( 'vlthemes/is_theme_activated', false );
	}
}

/**
 * Register post type
 */
if ( ! function_exists( 'vlthemes_slide_register_custom_post' ) ) {

	function vlthemes_slide_register_custom_post() {

		$labels = array(
			'name' => esc_html__( 'Slides', 'vlthemes' ),
			'singular_name' => esc_html__( 'Slide', 'vlthemes' ),
			'add_new' => esc_html__( 'Add New Slide', 'vlthemes' ),
			'add_new_item' => esc_html__( 'Add New Slide', 'vlthemes' ),
			'edit_item' => esc_html__( 'Edit Slide', 'vlthemes' ),
			'new_item' => esc_html__( 'New Slide', 'vlthemes' ),
			'view_item' => esc_html__( 'View Slide', 'vlthemes' ),
			'search_items' => esc_html__( 'Search Slides', 'vlthemes' ),
			'not_found' => esc_html__( 'No Slide Found', 'vlthemes' ),
			'not_found_in_trash' => esc_html__( 'No slide found in Trash', 'vlthemes' )
		);

		$args = array(
			'labels' => $labels,
			'supports' => array( 'title', 'editor', 'elementor' ),
			'hierarchical' => false,
			'public' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-images-alt2',
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => false,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'rewrite' => false,
			'capability_type' => 'page',
		);

		register_post_type( 'slide', $args );

	}

	add_action( 'init', 'vlthemes_slide_register_custom_post', 0 );

}

if ( ! function_exists( 'vlthemes_slide_custom_taxonomy' ) ) {

	function vlthemes_slide_custom_taxonomy() {

		$labels = array(
			'name' => _x( 'Slide Categories', 'Taxonomy General Name', 'vlthemes' ),
			'singular_name' => _x( 'Slide Category', 'Taxonomy Singular Name', 'vlthemes' ),
			'menu_name' => esc_html__( 'Slide Category', 'vlthemes' ),
			'all_items' => esc_html__( 'All Item Categories', 'vlthemes' ),
			'parent_item' => esc_html__( 'Parent Item', 'vlthemes' ),
			'parent_item_colon' => esc_html__( 'Parent Item:', 'vlthemes' ),
			'new_item_name' => esc_html__( 'New Item Category', 'vlthemes' ),
			'add_new_item' => esc_html__( 'Add New Item', 'vlthemes' ),
			'edit_item' => esc_html__( 'Edit Item', 'vlthemes' ),
			'update_item' => esc_html__( 'Update Item', 'vlthemes' ),
			'view_item' => esc_html__( 'View Item', 'vlthemes' ),
			'separate_items_with_commas' => esc_html__( 'Separate items with commas', 'vlthemes' ),
			'add_or_remove_items' => esc_html__( 'Add or remove items', 'vlthemes' ),
			'choose_from_most_used' => esc_html__( 'Choose from the most used', 'vlthemes' ),
			'popular_items' => esc_html__( 'Popular Items', 'vlthemes' ),
			'search_items' => esc_html__( 'Search Items', 'vlthemes' ),
			'not_found' => esc_html__( 'Not Found', 'vlthemes' ),
			'no_terms' => esc_html__( 'No items', 'vlthemes' ),
			'items_list' => esc_html__( 'Items list', 'vlthemes' ),
			'items_list_navigation' => esc_html__( 'Items list navigation', 'vlthemes' ),
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
		);

		register_taxonomy( 'slide_category', array( 'slide' ), $args );

	}

	add_action( 'init', 'vlthemes_slide_custom_taxonomy', 0 );

}