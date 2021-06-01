<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

define( 'ETHANT_THEME_DIRECTORY', trailingslashit( get_template_directory_uri() ) );
define( 'ETHANT_REQUIRE_DIRECTORY', trailingslashit( get_template_directory() ) );
define( 'ETHANT_DEVELOPMENT', false );

/**
 * After setup theme
 */
if ( ! function_exists( 'ethant_setup' ) ) {
	function ethant_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Ducky, use a find and replace
		 * to change 'ethant' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ethant', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1920, 9999 );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array(
			'gallery',
			'link',
			'quote',
			'video',
			'audio'
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name' => esc_html__( 'Small', 'ethant' ),
					'shortName' => esc_html__( 'S', 'ethant' ),
					'size' => 12,
					'slug' => 'small',
				),
				array(
					'name' => esc_html__( 'Normal', 'ethant' ),
					'shortName' => esc_html__( 'M', 'ethant' ),
					'size' => 14,
					'slug' => 'normal',
				),
				array(
					'name' => esc_html__( 'Large', 'ethant' ),
					'shortName' => esc_html__( 'L', 'ethant' ),
					'size' => 28,
					'slug' => 'large',
				),
				array(
					'name' => esc_html__( 'Huge', 'ethant' ),
					'shortName' => esc_html__( 'XL', 'ethant' ),
					'size' => 38,
					'slug' => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'First', 'ethant' ),
				'slug' => 'first',
				'color' => ethant_get_theme_mod( 'accent_colors' )['first'],
			),
			array(
				'name' => esc_html__( 'Second', 'ethant' ),
				'slug' => 'second',
				'color' => ethant_get_theme_mod( 'accent_colors' )['second'],
			),
			array(
				'name' => esc_html__( 'Third', 'ethant' ),
				'slug' => 'third',
				'color' => ethant_get_theme_mod( 'accent_colors' )['third'],
			),
			array(
				'name' => esc_html__( 'Fourth', 'ethant' ),
				'slug' => 'fourth',
				'color' => ethant_get_theme_mod( 'accent_colors' )['fourth'],
			),
			array(
				'name' => esc_html__( 'White', 'ethant' ),
				'slug' => 'white',
				'color' => '#ffffff',
			)
		) );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// register nav menus
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'ethant' ),
			'onepage-menu' => esc_html__( 'Onepage Menu', 'ethant' ),
		) );

		// 970x500
		add_image_size( 'ethant-970x500_crop', 970, 500, true );
		add_image_size( 'ethant-970x500', 970 );

		// 686x460
		add_image_size( 'ethant-680x460_crop', 680, 460, true );
		add_image_size( 'ethant-680x460', 680 );

		// 1280x720
		add_image_size( 'ethant-1280x720_crop', 1280, 720, true );
		add_image_size( 'ethant-1280x720', 1280 );

		// 1920x1080
		add_image_size( 'ethant-1920x1080_crop', 1920, 1080, true );
		add_image_size( 'ethant-1920x1080', 1920 );

		// 1920x960
		add_image_size( 'ethant-1920x960_crop', 1920, 960, true );

	}
}
add_action( 'after_setup_theme', 'ethant_setup' );

/**
 * Content width
 */
if ( ! function_exists( 'ethant_content_width' ) ) {
	function ethant_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'ethant/content_width', 1140 );
	}
}
add_action( 'after_setup_theme', 'ethant_content_width', 0 );

/**
 * Import ACF fields
 */
if ( ! ETHANT_DEVELOPMENT ) {
	function ethant_acf_show_admin_panel() {
		return apply_filters( 'ethant/acf_show_admin_panel', false );
	}
	add_filter( 'acf/settings/show_admin', 'ethant_acf_show_admin_panel' );
}

if ( ! ETHANT_DEVELOPMENT ) {
	require_once ETHANT_REQUIRE_DIRECTORY . 'inc/helper/custom-fields/custom-fields.php';
}

if ( ! function_exists( 'ethant_acf_save_json' ) ) {
	function ethant_acf_save_json( $path ) {
		$path = ETHANT_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
		return $path;
	}
}
add_filter( 'acf/settings/save_json', 'ethant_acf_save_json' );

if ( ETHANT_DEVELOPMENT ) {
	if ( ! function_exists( 'ethant_acf_load_json' ) ) {
		function ethant_acf_load_json( $paths ) {
			unset( $paths[0] );
			$paths[] = ETHANT_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
			return $paths;
		}
	}
	add_filter( 'acf/settings/load_json', 'ethant_acf_load_json' );
}

/**
 * Include Kirki fields
 */
require_once ETHANT_REQUIRE_DIRECTORY . 'inc/framework/customizer-helper.php';
require_once ETHANT_REQUIRE_DIRECTORY . 'inc/framework/customizer.php';

/**
 * Required files
 */
$ethant_theme_includes = array(
	'required-plugins',
	'enqueue',
	'includes',
	'merlin-config',
	'functions',
	'actions',
	'filters',
	'menus',
);

foreach ( $ethant_theme_includes as $file ) {
	require_once ETHANT_REQUIRE_DIRECTORY . 'inc/theme-' . $file . '.php';
}

// Unset the global variable.
unset( $ethant_theme_includes );