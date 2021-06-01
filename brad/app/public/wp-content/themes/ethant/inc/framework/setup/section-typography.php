<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$priority = 0;

/**
 * General fonts
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'primary_font',
	'section' => 'typography_fonts',
	'label' => esc_html__( 'Primary Font', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'variant' => array( 'regular', 'italic', '700' ),
	),
	'default' => array(
		'font-family' => 'Libre Baskerville'
	),
	'output' => array(
		array(
			'choice' => 'font-family',
			'element' => ':root',
			'property' => '--pf',
			'context' => array( 'editor', 'front' ),
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'secondary_font',
	'section' => 'typography_fonts',
	'label' => esc_html__( 'Secondary Font', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'variant' => array( 'regular', '500', '600', '700' ),
	),
	'default' => array(
		'font-family' => 'Work Sans'
	),
	'output' => array(
		array(
			'choice' => 'font-family',
			'element' => ':root',
			'property' => '--sf',
			'context' => array( 'editor', 'front' ),
		)
	)
) );

/**
 * Body typography
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'base_typography',
	'section' => 'typography_text',
	'label' => esc_html__( 'Base Typography', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => ethant_add_custom_choice(),
	'default' => array(
		'font-family' => 'Work Sans',
		'variant' => 'regular',
		'font-size' => '1rem', // 16px
		'line-height' => '1.5',
		'letter-spacing' => '-.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'body'
		),
		array(
			'element' => '.edit-post-visual-editor.editor-styles-wrapper',
			'context' => array( 'editor' ),
		),
	)
) );

/**
 * Heading typography
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h1_titles',
	'section' => 'typography_headings',
	'label' => esc_html__( 'H1 Titles', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => ethant_add_custom_choice(),
	'default' => array(
		'font-family' => 'Libre Baskerville',
		'variant' => '700',
		'font-size' => '2.5rem', // 40px
		'line-height' => '1.2',
		'letter-spacing' => '-.02em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h1, .h1'
		),
		array(
			'element' => '.edit-post-visual-editor.editor-styles-wrapper h1, .edit-post-visual-editor.editor-styles-wrapper .editor-post-title__input',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h2_titles',
	'section' => 'typography_headings',
	'label' => esc_html__( 'H2 Titles', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => ethant_add_custom_choice(),
	'default' => array(
		'font-family' => 'Libre Baskerville',
		'variant' => '700',
		'font-size' => '2rem', // 32px
		'line-height' => '1.166',
		'letter-spacing' => '-.02em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h2, .h2'
		),
		array(
			'element' => '.edit-post-visual-editor.editor-styles-wrapper h2',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h3_titles',
	'section' => 'typography_headings',
	'label' => esc_html__( 'H3 Titles', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => ethant_add_custom_choice(),
	'default' => array(
		'font-family' => 'Libre Baskerville',
		'variant' => '700',
		'font-size' => '1.75rem', // 28px
		'line-height' => '1.2',
		'letter-spacing' => '-.02em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h3, .h3'
		),
		array(
			'element' => '.edit-post-visual-editor.editor-styles-wrapper h3',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h4_titles',
	'section' => 'typography_headings',
	'label' => esc_html__( 'H4 Titles', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => ethant_add_custom_choice(),
	'default' => array(
		'font-family' => 'Libre Baskerville',
		'variant' => '700',
		'font-size' => '1.5rem', // 24px
		'line-height' => '1.25',
		'letter-spacing' => '-.02em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h4, .h4'
		),
		array(
			'element' => '.edit-post-visual-editor.editor-styles-wrapper h4',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h5_titles',
	'section' => 'typography_headings',
	'label' => esc_html__( 'H5 Titles', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => ethant_add_custom_choice(),
	'default' => array(
		'font-family' => 'Work Sans',
		'variant' => '700',
		'font-size' => '1.25rem', // 20px
		'line-height' => '1.5',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h5, .h5'
		),
		array(
			'element' => '.edit-post-visual-editor.editor-styles-wrapper h5',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h6_titles',
	'section' => 'typography_headings',
	'label' => esc_html__( 'H6 Titles', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => ethant_add_custom_choice(),
	'default' => array(
		'font-family' => 'Work Sans',
		'variant' => '600',
		'font-size' => '1rem', // 16px
		'line-height' => '1.5',
		'letter-spacing' => '.06em',
		'text-transform' => 'uppercase'
	),
	'output' => array(
		array(
			'element' => 'h6, .h6'
		),
		array(
			'element' => '.edit-post-visual-editor.editor-styles-wrapper h6',
			'context' => array( 'editor' ),
		),
	)
) );

/**
 * Blockquote typography
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'blockquote_typography',
	'section' => 'typography_blockquote',
	'label' => esc_html__( 'Blockquote', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => ethant_add_custom_choice(),
	'default' => array(
		'font-family' => 'Work Sans',
		'variant' => '700',
		'font-size' => '1.25rem', // 20px
		'line-height' => '1.5',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'blockquote'
		),
		array(
			'element' => '.wp-block-quote, .wp-block-pullquote',
			'context' => array( 'editor' ),
		),
	)
) );

/**
 * Button typography
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_button',
	'section' => 'typography_buttons',
	'label' => esc_html__( 'Button Typography', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => ethant_add_custom_choice(),
	'default' => array(
		'font-family' => 'Work Sans',
		'variant' => '700',
		'font-size' => '.875rem', // 14px
		'line-height' => '1.5',
		'letter-spacing' => '0',
		'text-transform' => 'uppercase'
	),
	'output' => array(
		array(
			'element' => '.vlt-btn'
		)
	)
) );

/**
 * Input typography
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_input',
	'section' => 'typography_input',
	'label' => esc_html__( 'Input Typography', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => ethant_add_custom_choice(),
	'default' => array(
		'font-family' => 'Work Sans',
		'variant' => 'regular',
		'font-size' => '1rem',
		'letter-spacing' => '0',
		'line-height' => '1.5',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => '
				input[type="text"],
				input[type="date"],
				input[type="email"],
				input[type="password"],
				input[type="tel"],
				input[type="url"],
				input[type="search"],
				input[type="number"],
				textarea,
				select
			'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_label',
	'section' => 'typography_input',
	'label' => esc_html__( 'Label Typography', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => ethant_add_custom_choice(),
	'default' => array(
		'font-family' => 'Work Sans',
		'variant' => 'regular',
		'font-size' => '1rem',
		'line-height' => '1.5',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'label'
		)
	)
) );

/**
 * Widget title typography
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_widget_title',
	'section' => 'typography_widget',
	'label' => esc_html__( 'Widget Title Typography', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => ethant_add_custom_choice(),
	'default' => array(
		'font-family' => 'Work Sans',
		'variant' => '700',
		'font-size' => '1.25rem',
		'line-height' => '1.5',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => '.vlt-widget__title'
		)
	)
) );