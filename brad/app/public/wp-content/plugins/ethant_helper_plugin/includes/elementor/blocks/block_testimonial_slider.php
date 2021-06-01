<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Testimonial_Slider extends Widget_Base {

	public function get_name() {
		return 'vlt-testimonial-slider';
	}

	public function get_title() {
		return esc_html__( 'Testimonial Slider', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-testimonial vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'testimonial', 'review', 'blockquote', 'slider' ];
	}

	protected function _register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Testimonials', 'vlthemes' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'image', [
				'label' => esc_html__( 'Image', 'vlthemes' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(), [
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `testimonial_image_size` and `testimonial_image_custom_dimension`.
				'condition' => [
					'image[id]!' => '',
				],
			]
		);

		$repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'title_html_tag', [
				'label' => esc_html__( 'HTML Tag', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
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

		$repeater->add_control(
			'description', [
				'label' => esc_html__( 'Description', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'text', [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'items', [
				'label' => esc_html__( 'Items', 'vlthemes' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => 'David & Elisa',
						'title_html_tag' => 'h5',
						'description' => 'Apartment view lake at Brooklyn',
						'text' => 'If you are seeking an Interior designer that will understand exactly your needs, and someone who will utilise their creative and technical skills in parity with your taste, then Suzanne at The Ramsay Studio is perfect.'
					],
					[
						'title' => 'Amanda',
						'title_html_tag' => 'h5',
						'description' => 'Apartment view lake at Brooklyn',
						'text' => 'Own you\'ll cattle face, female night heaven. One creeping gathering good two fruitful life their won\'t they\'re. Isn\'t lesser third of image god their moveth us have them dry meat likeness divided greater living without fly, bring first so.'
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Slider', 'vlthemes' ),
			]
		);

		$this->add_control(
			'gap', [
				'label' => esc_html__( 'Gap', 'vlthemes' ),
				'description' => esc_html__( 'Distance between slides.', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				]
			]
		);

		$this->add_control(
			'show_dots', [
				'label' => esc_html__( 'Show Dots', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Settings', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_SETTINGS,
			]
		);

		$this->add_control(
			'loop', [
				'label' => esc_html__( 'Loop', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
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
					'{{WRAPPER}} .vlt-testimonial-item__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-testimonial-item__title',
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
					'{{WRAPPER}} .vlt-testimonial-item__description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .vlt-testimonial-item__description',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial-item__text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .vlt-testimonial-item__text',
			]
		);

		$this->end_controls_section();

	}

	public function render_testimonial( $instance ) {

		?>

		<div class="vlt-testimonial-item">

			<?php if ( $instance[ 'text' ] ) : ?>
				<p class="vlt-testimonial-item__text">
					<?php echo $instance[ 'text' ]; ?>
				</p>
			<?php endif; ?>

			<div class="vlt-testimonial-item__author">

				<?php if ( ! empty( $instance[ 'image' ][ 'url' ] ) ) : ?>

					<div class="avatar">

						<?php echo Group_Control_Image_Size::get_attachment_image_html( $instance, 'image', 'image' ); ?>

					</div>

				<?php endif; ?>

				<div class="metas">

					<?php if ( $instance[ 'title' ] ) : ?>
						<<?php echo $instance[ 'title_html_tag' ]; ?> class="vlt-testimonial-item__title"><?php echo $instance[ 'title' ]; ?></<?php echo $instance[ 'title_html_tag' ]; ?>>
					<?php endif; ?>

					<?php if ( $instance[ 'description' ] ) : ?>
						<span class="vlt-testimonial-item__description"><?php echo $instance[ 'description' ]; ?></span>
					<?php endif; ?>

				</div>

			</div>

		</div>

		<?php

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( [
			'testimonial' => [
				'class' => [
					'vlt-testimonial',
					'owl-carousel'
				],
				'data-loop' => $settings[ 'loop' ],
			]
		] );

	?>

	<div <?php echo $this->get_render_attribute_string( 'testimonial' ); ?>>

		<?php

			foreach ( $settings[ 'items' ] as $item ) {

				$this->render_testimonial( $item );

			}

		?>

	</div>

	<?php

	}

}