<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Counter_Item extends Widget_Base {

	public function get_name() {
		return 'vlt-counter-item';
	}

	public function get_title() {
		return esc_html__( 'Counter Item', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-counter vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'counter', 'numbers' ];
	}

	protected function _register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Counter Item', 'vlthemes' ),
			]
		);

		$this->add_control(
			'number', [
				'label' => esc_html__( 'Number', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => '1,142'
			]
		);

		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Total clients'
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
			'description', [
				'label' => esc_html__( 'Description', 'vlthemes' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'In over 25 countries'
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
				'label' => esc_html__( 'Number', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'number_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-counter-item__number' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'number_typography',
				'selector' => '{{WRAPPER}} .vlt-counter-item__number',
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
					'{{WRAPPER}} .vlt-counter-item__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-counter-item__title',
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
					'{{WRAPPER}} .vlt-counter-item__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
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
					'{{WRAPPER}} .vlt-counter-item__description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .vlt-counter-item__description',
			]
		);

		$this->end_controls_section();

	}


	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'counter', 'class', 'vlt-counter-item' );

		?>

		<div <?php echo $this->get_render_attribute_string( 'counter' ); ?>>

			<?php if ( $settings[ 'number' ] ) : ?>

				<div class="number">

					<?php echo $settings[ 'number' ]; ?>

				</div>

			<?php endif; ?>

			<div class="metas">

				<?php if ( $settings[ 'title' ] ) : ?>
					<<?php echo $settings[ 'title_html_tag' ]; ?> class="vlt-counter-item__title"><?php echo $settings[ 'title' ]; ?></<?php echo $settings[ 'title_html_tag' ]; ?>>
				<?php endif; ?>

				<?php if ( $settings[ 'description' ] ) : ?>
					<span class="vlt-counter-item__description"><?php echo $settings[ 'description' ]; ?></span>
				<?php endif; ?>

			</div>

		</div>

		<?php

	}

}