<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Vacancy_Item extends Widget_Base {

	public function get_name() {
		return 'vlt-vacancy-item';
	}

	public function get_title() {
		return esc_html__( 'Vacancy Item', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-image-box vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'vacancy', 'experience', 'education', 'timeline' ];
	}

	protected function _register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Award Item', 'vlthemes' ),
			]
		);

		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Graphic Design'
			]
		);

		$this->add_control(
			'title_html_tag', [
				'label' => esc_html__( 'HTML Tag', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h5',
				'options' => [
					'h1' => esc_html__( 'Heading 1', 'vlthemes' ),
					'h2' => esc_html__( 'Heading 2', 'vlthemes' ),
					'h3' => esc_html__( 'Heading 3', 'vlthemes' ),
					'h4' => esc_html__( 'Heading 4', 'vlthemes' ),
					'h5' => esc_html__( 'Heading 5', 'vlthemes' ),
					'h6' => esc_html__( 'Heading 6', 'vlthemes' ),
					'div' => esc_html__( 'div', 'vlthemes' ),
					'span' => esc_html__( 'span', 'vlthemes' ),
					'p' => esc_html__( 'p', 'vlthemes' )
				],
			]
		);

		$this->add_control(
			'place', [
				'label' => esc_html__( 'Place', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'University of Studies, California'
			]
		);

		$this->add_control(
			'time', [
				'label' => esc_html__( 'Time', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Jan 2002 - Dec 2007'
			]
		);

		$this->add_control(
			'description', [
				'label' => esc_html__( 'Description', 'vlthemes' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Major in Graphic Design, UX/UI Design, Product Desgin and Illustration.'
			]
		);

		$this->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url'=> '#',
				],
				'separator' => 'before'
			]
		);


		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Style', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'title_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-vacancy-item__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-vacancy-item__title',
			]
		);

		$this->add_control(
			'title_spacing', [
				'label' => esc_html__( 'Spacing', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-vacancy-item__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Place', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'place_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-vacancy-item__place' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'place_typography',
				'selector' => '{{WRAPPER}} .vlt-vacancy-item__place',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Time', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'time_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-vacancy-item__time' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'time_typography',
				'selector' => '{{WRAPPER}} .vlt-vacancy-item__time',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Description', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'description_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-vacancy-item__description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .vlt-vacancy-item__description',
			]
		);

		$this->add_control(
			'description_spacing', [
				'label' => esc_html__( 'Spacing', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-vacancy-item__description' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}


	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'vacancy', 'class', 'vlt-vacancy-item' );

		if ( ! empty( $settings[ 'link' ][ 'url' ] ) ) {

			$this->add_render_attribute( 'vacancy-link', 'href', $settings[ 'link' ][ 'url' ] );

			if ( $settings[ 'link' ][ 'is_external' ] ) {
				$this->add_render_attribute( 'vacancy-link', 'target', '_blank' );
			}

			if ( $settings[ 'link' ][ 'nofollow' ] ) {
				$this->add_render_attribute( 'vacancy-link', 'rel', 'nofollow' );
			}

		}

		?>

		<div <?php echo $this->get_render_attribute_string( 'vacancy' ); ?>>

			<?php if ( $settings[ 'title' ] ) : ?>

				<<?php echo $settings[ 'title_html_tag' ]; ?> class="vlt-vacancy-item__title">

				<?php if ( ! empty( $settings[ 'link' ][ 'url' ] ) ) : ?>

					<a <?php echo $this->get_render_attribute_string( 'vacancy-link' ); ?>>

				<?php endif; ?>

				<?php echo $settings[ 'title' ]; ?>

				<?php if ( ! empty( $settings[ 'link' ][ 'url' ] ) ) : ?>

					</a>

				<?php endif; ?>

				</<?php echo $settings[ 'title_html_tag' ]; ?>>

			<?php endif; ?>

			<?php if ( $settings[ 'place' ] ) : ?>
				<div class="vlt-vacancy-item__place"><?php echo $settings[ 'place' ]; ?></div>
			<?php endif; ?>

			<?php if ( $settings[ 'time' ] ) : ?>
				<div class="vlt-vacancy-item__time"><?php echo $settings[ 'time' ]; ?></div>
			<?php endif; ?>

			<?php if ( $settings[ 'description' ] ) : ?>
				<p class="vlt-vacancy-item__description"><?php echo $settings[ 'description' ]; ?></p>
			<?php endif; ?>

		</div>

		<?php

	}

}