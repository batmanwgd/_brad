<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

$wizard = new Merlin(

	$config = array(
		'directory' => 'merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url' => 'merlin', // The wp-admin page slug where Merlin WP loads.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes', // URL for the 'child-action-link'.
		'dev_mode' => ETHANT_DEVELOPMENT, // Enable development mode for testing.
		'license_step' => false, // EDD license activation step.
		'license_required' => false, // Require the license activation step.
		'license_help_url' => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url' => '', // EDD_Theme_Upater_Admin remote_api_url.
		'edd_item_name' => '', // EDD_Theme_Upater_Admin item_name.
		'edd_theme_slug' => '', // EDD_Theme_Upater_Admin item_slug.
	),
	$strings = array(
		'admin-menu' => esc_html__( 'Theme Setup', 'ethant' ),
		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s' => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'ethant' ),
		'return-to-dashboard' => esc_html__( 'Return to the dashboard', 'ethant' ),
		'ignore' => esc_html__( 'Disable this wizard', 'ethant' ),
		'btn-skip' => esc_html__( 'Skip', 'ethant' ),
		'btn-next' => esc_html__( 'Next', 'ethant' ),
		'btn-start' => esc_html__( 'Start', 'ethant' ),
		'btn-no' => esc_html__( 'Cancel', 'ethant' ),
		'btn-plugins-install' => esc_html__( 'Install', 'ethant' ),
		'btn-child-install' => esc_html__( 'Install', 'ethant' ),
		'btn-content-install' => esc_html__( 'Install', 'ethant' ),
		'btn-import' => esc_html__( 'Import', 'ethant' ),
		'btn-license-activate' => esc_html__( 'Activate', 'ethant' ),
		'btn-license-skip' => esc_html__( 'Later', 'ethant' ),
		/* translators: Theme Name */
		'license-header%s' => esc_html__( 'Activate %s', 'ethant' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'ethant' ),
		/* translators: Theme Name */
		'license%s' => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'ethant' ),
		'license-label' => esc_html__( 'License key', 'ethant' ),
		'license-success%s' => esc_html__( 'The theme is already registered, so you can go to the next step!', 'ethant' ),
		'license-json-success%s' => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'ethant' ),
		'license-tooltip' => esc_html__( 'Need help?', 'ethant' ),
		/* translators: Theme Name */
		'welcome-header%s' => esc_html__( 'Welcome to %s', 'ethant' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'ethant' ),
		'welcome%s' => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'ethant' ),
		'welcome-success%s' => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'ethant' ),
		'child-header' => esc_html__( 'Install Child Theme', 'ethant' ),
		'child-header-success' => esc_html__( 'You\'re good to go!', 'ethant' ),
		'child' => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'ethant' ),
		'child-success%s' => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'ethant' ),
		'child-action-link' => esc_html__( 'Learn about child themes', 'ethant' ),
		'child-json-success%s' => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'ethant' ),
		'child-json-already%s' => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'ethant' ),
		'plugins-header' => esc_html__( 'Install Plugins', 'ethant' ),
		'plugins-header-success' => esc_html__( 'You\'re up to speed!', 'ethant' ),
		'plugins' => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'ethant' ),
		'plugins-success%s' => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'ethant' ),
		'plugins-action-link' => esc_html__( 'Advanced', 'ethant' ),
		'import-header' => esc_html__( 'Import Content', 'ethant' ),
		'import' => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'ethant' ),
		'import-action-link' => esc_html__( 'Advanced', 'ethant' ),
		'ready-header' => esc_html__( 'All done. Have fun!', 'ethant' ),
		/* translators: Theme Author */
		'ready%s' => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'ethant' ),
		'ready-action-link' => esc_html__( 'Extras', 'ethant' ),
		'ready-big-button' => esc_html__( 'View your website', 'ethant' ),
		'ready-link-1' => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'tools.php?page=regenerate-thumbnails' ), esc_html__( 'Regenerate Thumbnails', 'ethant' ) ),
		'ready-link-2' => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', 'ethant' ) ),
		'ready-link-3' => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://vlthemes.ticksy.com/', esc_html__( 'Get Theme Support', 'ethant' ) ),
	)
);

/**
 * Demo import
 */
if ( ! function_exists( 'ethant_demo_import_files' ) ) {
	function ethant_demo_import_files() {
		return array(
			array(
				'import_file_name' => esc_html__( 'Light Mode', 'ethant' ),
				'local_import_file' => ETHANT_REQUIRE_DIRECTORY . 'inc/demo/light/demo-content.xml',
				'local_import_widget_file' => ETHANT_REQUIRE_DIRECTORY . 'inc/demo/light/widgets.wie',
				'local_import_customizer_file' => ETHANT_REQUIRE_DIRECTORY . 'inc/demo/light/customizer.dat',
				'import_preview_image_url' => ETHANT_THEME_DIRECTORY . 'inc/demo/light/demo-light.jpg',
				'preview_url' => 'http://paul-themes.com/wordpress/ethant/',
			),
			array(
				'import_file_name' => esc_html__( 'Dark Mode', 'ethant' ),
				'local_import_file' => ETHANT_REQUIRE_DIRECTORY . 'inc/demo/dark/demo-content.xml',
				'local_import_widget_file' => ETHANT_REQUIRE_DIRECTORY . 'inc/demo/dark/widgets.wie',
				'local_import_customizer_file' => ETHANT_REQUIRE_DIRECTORY . 'inc/demo/dark/customizer.dat',
				'import_preview_image_url' => ETHANT_THEME_DIRECTORY . 'inc/demo/dark/demo-dark.jpg',
				'preview_url' => 'http://paul-themes.com/wordpress/ethant/dark/',
			),
		);
	}
}
add_filter( 'merlin_import_files', 'ethant_demo_import_files' );
add_filter( 'pt-ocdi/import_files', 'ethant_demo_import_files' );

/**
 * Disable regenerate thumbnails
 */
add_filter( 'merlin_regenerate_thumbnails_in_content_import', '__return_false' );
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

/**
 * After setup function
 */
if ( ! function_exists( 'ethant_after_import_setup' ) ) {
	function ethant_after_import_setup() {

		global $wp_rewrite;

		// Set menus
		$primary_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
		$onepage_menu = get_term_by( 'name', 'Onepage Menu', 'nav_menu' );

		set_theme_mod( 'nav_menu_locations', array(
			'primary-menu' => $primary_menu->term_id,
			'onepage-menu' => $onepage_menu->term_id,
		) );

		// Set pages
		$front_page = get_page_by_title( 'Homepage' );
		if ( isset( $front_page->ID ) ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page->ID );
		}

		// Update option
		update_option( 'date_format', 'd F Y' );

		// Update permalink
		$wp_rewrite->set_permalink_structure( '/%postname%/' );

		if (!get_option('elementor_container_width')) {
			update_option('elementor_container_width', '1170');
		}

		if (!get_option('elementor_disable_color_schemes')) {
			update_option('elementor_disable_color_schemes', 'yes');
		}

		if (!get_option('elementor_disable_typography_schemes')) {
			update_option('elementor_disable_typography_schemes', 'yes');
		}

	}
}
add_action( 'merlin_after_all_import', 'ethant_after_import_setup' );
add_action( 'pt-ocdi/after_import', 'ethant_after_import_setup' );