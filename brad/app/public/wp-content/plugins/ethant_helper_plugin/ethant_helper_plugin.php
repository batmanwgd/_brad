<?php

/**
 * Plugin Name: Ethant Helper Plugin
 * Plugin URI: https://vlthemes.com
 * Description: Ethant Helper Plugin expands the functionality of the theme. Adds new icons, shortcodes and much more.
 * Version: 1.0
 * Author: VLThemes
 * Author URI: http://themeforest.net/user/vlthemes
 * License: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: vlthemes
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( ! class_exists( 'VLThemesHelperPlugin' ) ) {

	class VLThemesHelperPlugin {

		/**
		 * The single class instance.
		 * @var $_instance
		 */
		private static $_instance = null;

		/**
		 * Main Instance
		 * Ensures only one instance of this class exists in memory at any one time.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
				self::$_instance->init_hooks();
				self::$_instance->theme_init();
				self::$_instance->init_option();
				self::$_instance->init_includes();
				self::$_instance->clear_expired_caches();
			}
			return self::$_instance;
		}

		/**
		 * Path to the plugin directory
		 * @var $plugin_path
		 */
		public $plugin_path;

		/**
		 * URL to the plugin directory
		 * @var $plugin_url
		 */
		public $plugin_url;

		/**
		 * Plugin name
		 * @var $plugin_name
		 */
		public $plugin_name;

		/**
		 * Plugin version
		 * @var $plugin_version
		 */
		public $plugin_version;

		/**
		 * Plugin slug
		 * @var $plugin_slug
		 */
		public $plugin_slug;

		public function __construct() {
			// We do nothing here!
		}

		/**
		 * Plugin init
		 */
		public function plugin_init() {
			$data = get_plugin_data( __FILE__ );
			$this->plugin_name = $data[ 'Name' ];
			$this->plugin_version = $data[ 'Version' ];
			$this->plugin_slug = 'vlthemes_helper_plugin';
		}

		/**
		 * Theme init
		 */
		public function theme_init() {
			$theme_info = wp_get_theme();
			$theme_parent = $theme_info->parent();
			if ( !empty( $theme_parent ) ) {
				$theme_info = $theme_parent;
			}
			$this->theme_slug = $theme_info->get_stylesheet();
			$this->theme_name = $theme_info[ 'Name' ];
			$this->theme_version = $theme_info[ 'Version' ];
			$this->theme_is_child = !empty( $theme_parent );
		}

		/**
		 * Init options
		 */
		public function init_option() {
			$this->plugin_path = plugin_dir_path( __FILE__ );
			$this->plugin_url = plugin_dir_url( __FILE__ );

			load_plugin_textdomain( 'vlthemes', false, $this->plugin_path . 'languages/' );
		}

		/**
		 * Init hooks
		 */
		public function init_hooks() {
			add_action( 'admin_init', array( $this, 'plugin_init' ) );

			if ( is_admin() ) {
				add_action( 'admin_print_styles', array( $this, 'init_assets' ) );
			}

			// Process Elementor Blocks
			if ( defined( 'ELEMENTOR_PATH' ) ) {
				add_action( 'init', array( $this, 'init_elementor' ) );
			}
		}

		/**
		 * Init includes
		 */
		public function init_includes() {
			require_once $this->plugin_path . 'includes/dashboard/dashboard.php';
			require_once $this->plugin_path . 'includes/helper-functions.php';
			require_once $this->plugin_path . 'includes/portfolio-post-type.php';
			require_once $this->plugin_path . 'includes/vendors/custom-fonts/custom-fonts.php';
		}

		/**
		 * Init assets
		 */
		public function init_assets() {
			wp_enqueue_script( 'tether', vlthemes_helper_plugin()->plugin_url . 'assets/script/tether.min.js', array( 'jquery' ), $this->plugin_version, true );
			wp_enqueue_script( 'drop_js', vlthemes_helper_plugin()->plugin_url . 'assets/script/drop.min.js', array( 'jquery' ), $this->plugin_version, true );
			wp_enqueue_script( 'dashboard_js', vlthemes_helper_plugin()->plugin_url . 'assets/script/scripts.js', array( 'jquery' ), $this->plugin_version, true );
			wp_enqueue_style( 'drop_css', vlthemes_helper_plugin()->plugin_url . 'assets/css/drop-theme-twipsy.min.css', array(), $this->plugin_version );
			wp_enqueue_style( 'vlthemes_font', vlthemes_helper_plugin()->plugin_url . 'assets/fonts/vlthemes.css', array(), $this->plugin_version );
			wp_enqueue_style( 'dashboard_css', vlthemes_helper_plugin()->plugin_url . 'assets/css/style.css', array(), $this->plugin_version );
			wp_enqueue_style( 'admin_css', vlthemes_helper_plugin()->plugin_url . 'assets/css/admin.css', array(), $this->plugin_version );
		}

		/**
		 * Init Elementor
		 */
		public function init_elementor() {
			require_once $this->plugin_path . 'includes/elementor/helper.php';
			require_once $this->plugin_path . 'includes/elementor/elementor.php';
		}

		/**
		 * Get all options
		 */
		private function get_options() {
			$options_slug = 'vlthemes_helper_options';
			return unserialize( get_option( $options_slug, 'a:0:{}' ) );
		}

		/**
		 * Get option value
		 */
		public function get_option( $name, $default = null ) {
			$options = self::get_options();
			$name = sanitize_key( $name );
			return isset( $options[ $name ] ) ? $options[ $name ] : $default;
		}

		/**
		 * Update option
		 */
		public function update_option( $name, $value ) {
			$options_slug = 'vlthemes_helper_options';
			$options = self::get_options();
			$options[ sanitize_key( $name ) ] = $value;
			update_option( $options_slug, serialize( $options ) );
		}

		/**
		 * Get all caches
		 */
		private function get_caches() {
			$caches_slug = 'cache';
			return $this->get_option( $caches_slug, array() );
		}

		/**
		 * Set cache
		 */
		public function set_cache( $name, $value, $time = 3600 ) {
			if ( ! $time || $time <= 0 ) {
				return;
			}
			$caches_slug = 'cache';
			$caches = self::get_caches();

			$caches[ sanitize_key( $name ) ] = array(
				'value' => $value,
				'expired' => time() + ( (int) $time ? $time : 0 ),
			);
			$this->update_option( $caches_slug, $caches );
		}

		/**
		 * Get cache
		 */
		public function get_cache( $name, $default = null ) {
			$caches = self::get_caches();
			$name = sanitize_key( $name );
			return isset( $caches[ $name ][ 'value' ] ) ? $caches[ $name ][ 'value' ] : $default;
		}

		/**
		 * Clear cache
		 */
		public function clear_cache( $name ) {
			$caches_slug = 'cache';
			$caches = self::get_caches();
			$name = sanitize_key( $name );
			if ( isset( $caches[ $name ] ) ) {
				$caches[ $name ] = null;
				$this->update_option( $caches_slug, $caches );
			}
		}

		/**
		 * Clear all expired caches
		 */
		public function clear_expired_caches() {
			$caches_slug = 'cache';
			$caches = self::get_caches();
			foreach ( $caches as $k => $cache ) {
				if ( isset( $cache ) && isset( $cache[ 'expired' ] ) && $cache[ 'expired' ] < time() ) {
					$caches[ $k ] = null;
				}
			}
			$this->update_option( $caches_slug, $caches );
		}

	}

	function vlthemes_helper_plugin() {
		return VLThemesHelperPlugin::instance();
	}
	add_action( 'plugins_loaded', 'vlthemes_helper_plugin' );

}