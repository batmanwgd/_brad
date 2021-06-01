<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

/**
 * Enqueue assets
 */
if ( ! class_exists( 'EthantEnqueueAssets' ) ) {
	class EthantEnqueueAssets {

		public function __construct() {
			$theme_info = wp_get_theme();
			$this->assets_dir = ETHANT_THEME_DIRECTORY . 'assets/';
			$this->customizer_frontend_css = ETHANT_THEME_DIRECTORY .'inc/framework/customizer-frontend.css';
			$this->customizer_editor_css = ETHANT_THEME_DIRECTORY .'inc/framework/customizer-editor.css';
			$this->theme_version = $theme_info[ 'Version' ];
			$this->init_assets();
		}

		public function fonts_url() {
			$fonts_url = '';
			$fonts = [];
			$subsets = 'latin-ext';
			$fonts[] = 'Libre Baskerville:400,italic,700';
			$fonts[] = 'Work Sans:400,500,600,700';

			if ( $fonts ) {
				$fonts_url = add_query_arg( array(
					'family' => urlencode( implode( '|', $fonts ) ),
					'subset' => urlencode( $subsets ),
				), 'https://fonts.googleapis.com/css?family=' );
			}
			return $fonts_url;
		}

		public function init_assets() {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_styles' ) );
			add_action( 'wp_default_scripts', array( $this, 'enqueue_default_scripts' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_gutenberg_editor_styles' ) );
		}

		public function enqueue_default_scripts( $wp_scripts ) {

			if ( is_admin() ) {
				return;
			}

			if ( ethant_get_theme_mod( 'jquery_in_footer' ) == 'disable' ) {
				return;
			}

			$wp_scripts->add_data( 'jquery', 'group', 1 );
			$wp_scripts->add_data( 'jquery-core', 'group', 1 );
			$wp_scripts->add_data( 'jquery-migrate', 'group', 1 );

		}

		public function enqueue_frontend_scripts() {

			if ( is_singular() && comments_open() ) {
				wp_enqueue_script( 'comment-reply' );
			}

			// Enqueue default scripts
			wp_enqueue_script( 'imagesloaded' );

			// Enqueue scripts
			wp_enqueue_script( 'animsition', $this->assets_dir .'vendors/animsition.min.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'bootstrap', $this->assets_dir .'vendors/bootstrap.min.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'popper', $this->assets_dir .'vendors/popper.min.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'superclick', $this->assets_dir .'vendors/superclick.min.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'jquery-fitvids', $this->assets_dir .'vendors/jquery.fitvids.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'fastclick', $this->assets_dir .'vendors/fastclick.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'owl-carousel', $this->assets_dir .'vendors/owl.carousel.min.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'css-vars-ponyfill', $this->assets_dir .'vendors/css-vars-ponyfill.min.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'anime', $this->assets_dir .'vendors/anime.min.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'typed', $this->assets_dir .'vendors/typed.min.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'jquery-pagepiling', $this->assets_dir .'vendors/jquery.pagepiling.min.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'parallax', $this->assets_dir .'vendors/parallax.min.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'isotope', $this->assets_dir .'vendors/isotope.pkgd.min.js', [ 'jquery' ], $this->theme_version, true );

			wp_enqueue_script( 'vlt-helpers', $this->assets_dir .'scripts/vlt-helpers.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'vlt-controllers', $this->assets_dir .'scripts/vlt-controllers.min.js', [ 'jquery' ], $this->theme_version, true );

		}

		public function enqueue_gutenberg_editor_styles() {
			wp_enqueue_style( 'vlt-gutenberg', $this->assets_dir .'css/vlt-gutenberg-style.min.css', [], $this->theme_version );
		}

		public function enqueue_admin_styles() {
			wp_enqueue_style( 'vlt-admin-style', $this->assets_dir .'css/vlt-admin.css', [], $this->theme_version );
			if ( ! class_exists( 'Kirki' ) ) {
				wp_enqueue_style( 'vlt-google-fonts-editor', $this->fonts_url(), false, $this->theme_version );
				wp_enqueue_style( 'vlt-customizer-editor', $this->customizer_editor_css, [], $this->theme_version );
			}
		}

		public function enqueue_admin_scripts() {
			wp_enqueue_script( 'vlt-admin-script', $this->assets_dir .'scripts/vlt-admin.js', [ 'jquery' ], $this->theme_version, true );
		}

		public function enqueue_frontend_styles() {

			wp_enqueue_style( 'vlt-theme-style', get_stylesheet_uri() );
			wp_enqueue_style( 'bootstrap', $this->assets_dir . 'css/framework/bootstrap.min.css', [], $this->theme_version );
			wp_enqueue_style( 'animate', $this->assets_dir . 'css/plugins/animate.css', [], $this->theme_version );
			wp_enqueue_style( 'superfish', $this->assets_dir . 'css/plugins/superfish.css', [], $this->theme_version );
			wp_enqueue_style( 'animsition', $this->assets_dir . 'css/plugins/animsition.min.css', [], $this->theme_version );
			wp_enqueue_style( 'owl-carousel', $this->assets_dir . 'css/plugins/owl.carousel.min.css', [], $this->theme_version );
			wp_enqueue_style( 'owl-theme-default', $this->assets_dir . 'css/plugins/owl.theme.default.css', [], $this->theme_version );
			wp_enqueue_style( 'jquery-pagepiling', $this->assets_dir .'css/plugins/jquery.pagepiling.min.css', [], $this->theme_version );

			// Icon Fonts
			wp_enqueue_style( 'linearicons', $this->assets_dir .'fonts/linearicons/style.css', [], $this->theme_version );
			wp_enqueue_style( 'socicons', $this->assets_dir .'fonts/socicons/socicon.css', [], $this->theme_version );

			wp_enqueue_style( 'vlt-main-css', $this->assets_dir .'css/vlt-main.min.css', [], $this->theme_version );
			if ( ! class_exists( 'Kirki' ) ) {
				wp_enqueue_style( 'vlt-google-fonts-frontend', $this->fonts_url(), false, $this->theme_version );
				wp_enqueue_style( 'vlt-customizer-frontend', $this->customizer_frontend_css, [], $this->theme_version );
			}
		}

	}

	new EthantEnqueueAssets;

}