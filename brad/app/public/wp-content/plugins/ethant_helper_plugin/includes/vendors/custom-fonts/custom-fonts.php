<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

if ( ! class_exists( 'VLThemesAddCustomFonts' ) ) {
	class VLThemesAddCustomFonts {

		/**
		 * New fonts array
		 */
		public $new_fonts = array();

		/**
		 * Children array
		 */
		public static $children = array();

		/**
		 * Variants array
		 */
		public static $variants = array();

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
				self::$_instance->prepare_custom_fonts();
				self::$_instance->prepare_typekit_fonts();
			}
			return self::$_instance;
		}

		public function __construct() {
			// We do nothing here!
		}

		/**
		 * Init hooks
		 */
		public function init_hooks() {
			add_action( 'init', array( $this, 'get_custom_fonts' ) );
			add_filter( 'vlthemes/kirki_font_choices', array( $this, 'add_custom_fonts' ), 20 );
		}

		/**
		 * Get custom fonts from Bsf_Custom_Fonts_Taxonomy
		 */
		public function get_custom_fonts() {
			if ( ! class_exists( 'Bsf_Custom_Fonts_Taxonomy' ) ) {
				return;
			}
			update_option( 'vlthemes-custom-fonts', Bsf_Custom_Fonts_Taxonomy::get_fonts() );
		}

		/**
		 * Prepare custom fonts
		 */
		public function prepare_custom_fonts() {

			$fonts = get_option( 'vlthemes-custom-fonts' );

			if ( ! empty( $fonts ) ) {
				foreach ( $fonts as $font => $key ) {
					$this->new_fonts[$font] = array(
						'id' => $font,
						'text' => $font,
						'variant' => array( '200', '300', '400', '400italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', 'regular', 'italic' )
					);
				}
			}

		}

		/**
		 * Prepare Typekit fonts
		 */
		public function prepare_typekit_fonts() {

			$fonts = get_option( 'custom-typekit-fonts' );
			$fonts = $fonts[ 'custom-typekit-font-details' ];

			if ( ! empty( $fonts ) ) {

				foreach ( $fonts as $key => $font ) {

					$this->new_fonts[$key] = array(
						'id' => implode( $font[ 'css_names' ] ),
						'text' => $font[ 'family' ],
						'variant' => $font[ 'weights' ]
					);

				}

			}

		}

		/**
		 * Check is font in array
		 */
		public function is_in_array( $array, $key, $key_value ) {
			$within_array = 'no';

			foreach ( $array as $k => $v ) {

				if ( is_array( $v ) ) {
					$within_array = $this->is_in_array( $v, $key, $key_value );

					if ( $within_array == 'yes' ) {
						break;
					}

				} else {

					if ( $v == $key_value && $k == $key ) {
						$within_array = 'yes';
						break;
					}

				}

			}

			return $within_array;
		}

		/**
		 * Add custom fonts to Kirki
		 */
		public function add_custom_fonts( $custom_choice ) {

			if ( ! empty( $this->new_fonts ) ) {

				foreach ( $this->new_fonts as $new_font ) {

					if ( $this->is_in_array( self::$children, 'id', $new_font[ 'id' ] ) == 'no' ) {

						self::$children[] = array(
							'id' => $new_font[ 'id' ],
							'text' => $new_font[ 'text' ]
						);

						self::$variants[$new_font[ 'id' ]] = $new_font[ 'variant' ];

					}

				}

			}

			$custom_choice[ 'families' ][ 'custom' ] = array(
				'text' => esc_attr__( 'Custom Fonts', 'vlthemes' ),
				'children' => self::$children
			);

			$custom_choice[ 'variants' ] = self::$variants;

			return $custom_choice;

		}

	}

	function vlthemes_add_custom_fonts() {
		return VLThemesAddCustomFonts::instance();
	}

	vlthemes_add_custom_fonts();

}