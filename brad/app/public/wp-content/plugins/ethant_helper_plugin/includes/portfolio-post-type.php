<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

if ( ! class_exists( 'VLThemes_Portfolio_Post_Type' ) ) {
	class VLThemes_Portfolio_Post_Type {

		function __construct() {

			add_action( 'init', array( &$this, 'portfolio_init' ) );

			// Manage Columns for portfolio overview
			add_filter( 'manage_edit-portfolio_columns', array( &$this, 'fildisi_ext_portfolio_edit_columns' ) );
			add_action( 'manage_posts_custom_column', array( &$this, 'fildisi_ext_portfolio_custom_columns' ), 10, 2 );

		}

		function portfolio_init() {

			$portfolio_base_slug = 'portfolio';

			$labels = array(
				'name' => esc_html_x( 'Portfolio Items', 'Portfolio General Name', 'vlthemes' ),
				'singular_name' => esc_html_x( 'Portfolio Item', 'Portfolio Singular Name', 'vlthemes' ),
				'add_new' => esc_html__( 'Add New', 'vlthemes' ),
				'add_new_item' => esc_html__( 'Add New Portfolio Item', 'vlthemes' ),
				'edit_item' => esc_html__( 'Edit Portfolio Item', 'vlthemes' ),
				'new_item' => esc_html__( 'New Portfolio Item', 'vlthemes' ),
				'view_item' => esc_html__( 'View Portfolio Item', 'vlthemes' ),
				'search_items' => esc_html__( 'Search Portfolio Items', 'vlthemes' ),
				'not_found' =>  esc_html__( 'No Portfolio Items found', 'vlthemes' ),
				'not_found_in_trash' => esc_html__( 'No Portfolio Items found in Trash', 'vlthemes' ),
				'parent_item_colon' => '',
			);

			$category_labels = array(
				'name' => esc_html__( 'Portfolio Categories', 'vlthemes' ),
				'singular_name' => esc_html__( 'Portfolio Category', 'vlthemes' ),
				'search_items' => esc_html__( 'Search Portfolio Categories', 'vlthemes' ),
				'all_items' => esc_html__( 'All Portfolio Categories', 'vlthemes' ),
				'parent_item' => esc_html__( 'Parent Portfolio Category', 'vlthemes' ),
				'parent_item_colon' => esc_html__( 'Parent Portfolio Category:', 'vlthemes' ),
				'edit_item' => esc_html__( 'Edit Portfolio Category', 'vlthemes' ),
				'update_item' => esc_html__( 'Update Portfolio Category', 'vlthemes' ),
				'add_new_item' => esc_html__( 'Add New Portfolio Category', 'vlthemes' ),
				'new_item_name' => esc_html__( 'New Portfolio Category Name', 'vlthemes' ),
			);

			$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => 5,
				'menu_icon' => 'dashicons-format-gallery',
				'supports' => array( 'title', 'editor', 'author', 'excerpt', 'thumbnail', 'custom-fields', 'comments' ),
				'rewrite' => array( 'slug' => $portfolio_base_slug, 'with_front' => false ),
			);

			register_post_type( 'portfolio' , $args );

			register_taxonomy(
				'portfolio_category',
				array( 'portfolio' ),
				array(
					'hierarchical' => true,
					'label' => esc_html__( 'Portfolio Categories', 'vlthemes' ),
					'labels' => $category_labels,
					'show_in_nav_menus' => false,
					'show_tagcloud' => false,
					'rewrite' => true,
				)
			);
			register_taxonomy_for_object_type( 'portfolio_category', 'portfolio' );

		}

		function fildisi_ext_portfolio_edit_columns( $columns ) {
			$columns['cb'] = "<input type=\"checkbox\" />";
			$columns['title'] = esc_html__( 'Title', 'vlthemes' );
			$columns['portfolio_thumbnail'] = esc_html__( 'Featured Image', 'vlthemes' );
			$columns['author'] = esc_html__( 'Author', 'vlthemes' );
			$columns['portfolio_category'] = esc_html__( 'Portfolio Categories', 'vlthemes' );
			$columns['date'] = esc_html__( 'Date', 'vlthemes' );
			return $columns;
		}

		function fildisi_ext_portfolio_custom_columns( $column, $post_id ) {

			switch ( $column ) {
				case 'portfolio_thumbnail':
					if ( has_post_thumbnail( $post_id ) ) {
						$thumbnail_id = get_post_thumbnail_id( $post_id );
						$attachment_src = wp_get_attachment_image_src( $thumbnail_id, array( 80, 80 ) );
						$thumb = $attachment_src[0];
					} else {
						$thumb = vlthemes_helper_plugin()->plugin_url . '/assets/img/thumbnail.jpg';
					}
					echo '<img class="attachment-80x80" width="80" height="80" alt="portfolio image" src="' . esc_url( $thumb ) . '">';
					break;
				case 'portfolio_category':
					echo get_the_term_list( $post_id, 'portfolio_category', '', ', ','' );
				break;
				case 'portfolio_field':
					echo get_the_term_list( $post_id, 'portfolio_field', '', ', ','' );
				break;
			}
		}

	}
	new VLThemes_Portfolio_Post_Type;
}