<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

if ( ! class_exists( 'VLThemesThemeDashboard' ) ) {

	class VLThemesThemeDashboard {

		/**
		 * Plugin dashboard slug
		 * @var $plugin_dashboard_slug
		 */
		public $plugin_dashboard_slug;

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
				self::$_instance->init_data();
				self::$_instance->init_menu_action();
			}
			return self::$_instance;
		}

		public function __construct() {
			// We do nothing here!
		}

		public function init_data() {

			$this->plugin_dashboard_suffix = '_wp';
			$this->plugin_dashboard_slug = 'theme-dashboard';

			$this->strings = array(
				'dashboard_title' => esc_html__( 'Getting started with %1$s v%2$s', 'vlthemes' ),
				'dashboard_subtitle' => esc_html__( 'Thanks for purchasing %1$s. We really appreciate your choice. If you like our theme and support, please rate it 5 stars. More information can be found below.', 'vlthemes' ),
				'footer_thank_you' => esc_html__( 'Thank you for choosing %s, Cheers!', 'vlthemes' ),
				'subscribe_text' => esc_html__( 'Subscribe Us', 'vlthemes' ),
				'support_text' => esc_html__( 'Get Help', 'vlthemes' ),
				'documentation_text' => esc_html__( 'Documentation', 'vlthemes' ),
				'subscribe_link' => esc_url( 'https://eepurl.com/cAIc41' ),
				'support_link' => esc_url( 'https://vlthemes.ticksy.com' ),
				'documentation_link' => esc_url( 'https://docs.vlthemes.com/docs/' . vlthemes_helper_plugin()->theme_slug . '/' ),
				'widget_support_title' => esc_html__( 'Get Help', 'vlthemes' ),
				'widget_support_text1' => esc_html__( 'If you still have questions after reading the documentation, you can create a ticket. We will contact you ASAP.', 'vlthemes' ),
				'widget_support_text2' => esc_html__( 'We love to hear your feedback - if you find any bugs or have suggestions for improvements please get in touch. Nearly all of the time we follow your advice and issue a rapid update to %s.', 'vlthemes' ),
				'widget_bad_request_text' => esc_html__( 'There seems to be a temporary problem retrieving the latest updates for this theme. You can always view your latest updates on the Themeforest.', 'vlthemes' ),
				'widget_requirements_title' => esc_html__( 'Requirements', 'vlthemes' ),
				'widget_requirements_problems' => esc_html__( 'Some Problems', 'vlthemes' ),
				'widget_requirements_noproblems' => esc_html__( 'No Problems', 'vlthemes' ),
				'widget_more_info_text' => esc_html__( 'More Info', 'vlthemes' ),
				'widget_actiavtion_title' => esc_html__( 'Theme Activation', 'vlthemes' ),
				'widget_activation_activated' => esc_html__( 'Activated', 'vlthemes' ),
				'widget_activation_not_activated' => esc_html__( 'Not Activated', 'vlthemes' ),
				'widget_activation_activated_text' => esc_html__( 'The theme is now installed and ready to use! We hope you enjoy it!', 'vlthemes' ),
				'widget_activation_not_activated_text' => esc_html__( 'The theme is now installed and ready to use! To unlock the theme functions and receive theme updates automatically, you need to activate your theme license. We hope you enjoy it!', 'vlthemes' ) ,
			);

		}

		public function init_menu_action() {
			add_action( 'admin_menu', array( $this, 'admin_menu' ) );
			add_action( 'admin_bar_menu', array($this, 'admin_bar_menu' ), 80 );
		}

		public function admin_menu() {
			call_user_func( 'add_menu_page', vlthemes_helper_plugin()->theme_name, vlthemes_helper_plugin()->theme_name, 'edit_theme_options', $this->plugin_dashboard_slug, array( $this, 'print_welcome' ), 'dashicons-vlthemes', 3 );
		}

		public function admin_bar_menu( $wp_admin_bar ){
			if ( ! is_object( $wp_admin_bar ) ) {
				global $wp_admin_bar;
			}
			$wp_admin_bar->add_menu( array(
				'id' => 'dashboard-admin-bar',
				'title' => '<span class="ab-icon dashicons-vlthemes"></span><span class="ab-label">' . vlthemes_helper_plugin()->theme_name . '</span>',
				'href' => admin_url( 'admin.php?page=' . $this->plugin_dashboard_slug ),
			) );
		}

		public function print_welcome() {
			require_once vlthemes_helper_plugin()->plugin_path . 'includes/dashboard/welcome.php';
		}

		public function widgets() {
			return array(
				'requirements',
				'activation',
				'support',
			);
		}

	}

	function vlthemes_dashboard() {
		return VLThemesThemeDashboard::instance();
	}

	vlthemes_dashboard();

}