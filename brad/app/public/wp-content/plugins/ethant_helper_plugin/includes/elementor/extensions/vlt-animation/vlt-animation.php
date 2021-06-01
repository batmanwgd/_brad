<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'VLT_Animation' ) ) {

	class VLT_Animation {

		public function __construct() {
			add_action( 'elementor/element/common/_section_style/after_section_end', [ $this, 'register_controls' ], 10 );
			add_action( 'elementor/widget/before_render_content', [ $this, 'before_render' ] );
		}

		public function get_name() {
			return 'vlt-animation';
		}

		public function register_controls( $element ) {

			$element->start_controls_section(
				'vlt_animation_section', [
					'label' => esc_html__( 'VLT Animation', 'vlthemes' ),
					'tab' => Controls_Manager::TAB_ADVANCED,
				]
			);

			$element->add_control(
				'vlt_animation_name', [
					'label' => esc_html__( 'Animation Name', 'vlthemes' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'none' => 'None',
						'bounce' => 'bounce',
						'flash' => 'flash',
						'pulse' => 'pulse',
						'rubberBand' => 'rubberBand',
						'shake' => 'shake',
						'headShake' => 'headShake',
						'swing' => 'swing',
						'tada' => 'tada',
						'wobble' => 'wobble',
						'jello' => 'jello',
						'bounceIn' => 'bounceIn',
						'bounceInDown' => 'bounceInDown',
						'bounceInLeft' => 'bounceInLeft',
						'bounceInRight' => 'bounceInRight',
						'bounceInUp' => 'bounceInUp',
						'bounceOut' => 'bounceOut',
						'bounceOutDown' => 'bounceOutDown',
						'bounceOutLeft' => 'bounceOutLeft',
						'bounceOutRight' => 'bounceOutRight',
						'bounceOutUp' => 'bounceOutUp',
						'fadeIn' => 'fadeIn',
						'fadeInDown' => 'fadeInDown',
						'fadeInDownBig' => 'fadeInDownBig',
						'fadeInLeft' => 'fadeInLeft',
						'fadeInLeftBig' => 'fadeInLeftBig',
						'fadeInRight' => 'fadeInRight',
						'fadeInRightBig' => 'fadeInRightBig',
						'fadeInUp' => 'fadeInUp',
						'fadeInUpSm' => 'fadeInUpSm',
						'fadeInUpBig' => 'fadeInUpBig',
						'fadeOut' => 'fadeOut',
						'fadeOutDown' => 'fadeOutDown',
						'fadeOutDownBig' => 'fadeOutDownBig',
						'fadeOutLeft' => 'fadeOutLeft',
						'fadeOutLeftBig' => 'fadeOutLeftBig',
						'fadeOutRight' => 'fadeOutRight',
						'fadeOutRightBig' => 'fadeOutRightBig',
						'fadeOutUp' => 'fadeOutUp',
						'fadeOutUpBig' => 'fadeOutUpBig',
						'flipInX' => 'flipInX',
						'flipInY' => 'flipInY',
						'flipOutX' => 'flipOutX',
						'flipOutY' => 'flipOutY',
						'lightSpeedIn' => 'lightSpeedIn',
						'lightSpeedOut' => 'lightSpeedOut',
						'rotateIn' => 'rotateIn',
						'rotateInDownLeft' => 'rotateInDownLeft',
						'rotateInDownRight' => 'rotateInDownRight',
						'rotateInUpLeft' => 'rotateInUpLeft',
						'rotateInUpRight' => 'rotateInUpRight',
						'rotateOut' => 'rotateOut',
						'rotateOutDownLeft' => 'rotateOutDownLeft',
						'rotateOutDownRight' => 'rotateOutDownRight',
						'rotateOutUpLeft' => 'rotateOutUpLeft',
						'rotateOutUpRight' => 'rotateOutUpRight',
						'hinge' => 'hinge',
						'jackInTheBox' => 'jackInTheBox',
						'rollIn' => 'rollIn',
						'rollOut' => 'rollOut',
						'zoomIn' => 'zoomIn',
						'zoomInDown' => 'zoomInDown',
						'zoomInLeft' => 'zoomInLeft',
						'zoomInRight' => 'zoomInRight',
						'zoomInUp' => 'zoomInUp',
						'zoomOut' => 'zoomOut',
						'zoomOutDown' => 'zoomOutDown',
						'zoomOutLeft' => 'zoomOutLeft',
						'zoomOutRight' => 'zoomOutRight',
						'zoomOutUp' => 'zoomOutUp',
						'slideInDown' => 'slideInDown',
						'slideInLeft' => 'slideInLeft',
						'slideInRight' => 'slideInRight',
						'slideInUp' => 'slideInUp',
						'slideOutDown' => 'slideOutDown',
						'slideOutLeft' => 'slideOutLeft',
						'slideOutRight' => 'slideOutRight',
						'slideOutUp' => 'slideOutUp',
						'heartBeat' => 'heartBeat',
					],
					'default' => 'none',
					'frontend_available' => true,
					'render_type' => 'none',
				]
			);

			$element->add_control(
				'vlt_animation_delay', [
					'label' => esc_html__( 'Animation Delay', 'vlthemes' ),
					'description' => esc_html__( 'Delay before the animation starts', 'vlthemes' ),
					'type' => Controls_Manager::NUMBER,
					'default' => 0,
					'min' => 0,
					'step' => 50,
					'condition' => [
						'vlt_animation_name!' => 'none',
					],
					'selectors' => [
						'{{WRAPPER}}' => 'animation-delay: {{VALUE}}ms;',
					],
				]
			);

			$element->end_controls_section();

		}

		public function before_render( $element ) {

			$settings = $element->get_settings_for_display();

			if ( $settings[ 'vlt_animation_name' ] != 'none' ) {

				$element->add_render_attribute( '_wrapper', [
					'class' => 'vlt-animate-element',
 				] );

				$element->add_render_attribute( '_wrapper', 'class', $settings[ 'vlt_animation_name' ] );

			}

		}


	}

}