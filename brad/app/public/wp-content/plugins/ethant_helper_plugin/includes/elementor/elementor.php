<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

class Plugin {

	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	private function include_widgets_files() {
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_award_item.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_button.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_contact_form_7.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_counter_item.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_progress_bar.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_slide_photo.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_template.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_testimonial_slider.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_vacancy_item.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_works_carousel.php';
	}

	public function register_widgets() {
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_VLThemes_Award_Item() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_VLThemes_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_VLThemes_Contact_Form_7() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_VLThemes_Counter_Item() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_VLThemes_Progress_Bar() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_VLThemes_Slide_Photo() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_VLThemes_Template() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_VLThemes_Testimonial_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_VLThemes_Vacancy_Item() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_VLThemes_Works_Carousel() );

	}

	private function include_extensions_files() {
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/extensions/vlt-animation/vlt-animation.php';
	}

	public function register_extensions() {
		$this->include_extensions_files();
		new \Elementor\VLT_Animation();
	}

	public function register_categories( $elements_manager ) {
		$elements_manager->add_category(
			'vlthemes-elements',
			array(
				'title' => esc_html__( 'VLThemes Elements', 'vlthemes' )
			)
		);
		$elements_manager->add_category(
			'vlthemes-showcase',
			array(
				'title' => esc_html__( 'VLThemes Showcase', 'vlthemes' )
			)
		);
		$elements_manager->add_category(
			'vlthemes-site',
			array(
				'title' => esc_html__( 'VLThemes Site', 'vlthemes' )
			)
		);
	}

	public function register_elementor_locations( $elementor_theme_manager ) {
		$elementor_theme_manager->register_location( 'header' );
		$elementor_theme_manager->register_location( 'footer' );
		$elementor_theme_manager->register_location( 'single' );
		$elementor_theme_manager->register_location( 'archive' );
	}

	public function register_editor_styles() {
		wp_enqueue_style( 'vlthemes-elementor-style', vlthemes_helper_plugin()->plugin_url . 'includes/elementor/assets/css/elementor.css', array(), vlthemes_helper_plugin()->plugin_version );
	}

	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_extensions' ] );
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'register_editor_styles' ] );
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_categories' ] );
		add_action( 'elementor/theme/register_locations', [ $this, 'register_elementor_locations' ] );
	}

}

// Instantiate Plugin Class
Plugin::instance();