<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$priority = 0;

/**
 * Footer general
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfg_1',
	'section' => 'section_footer_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'ethant' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'footer_show',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Footer Show', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'ethant' ),
		'hide' => esc_html__( 'Hide', 'ethant' ),
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'footer_fixed',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Footer Fixed', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'ethant' ),
		'disable' => esc_html__( 'Disable', 'ethant' )
	),
	'active_callback' => array(
		array(
			'setting' => 'footer_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'editor',
	'settings' => 'footer_copyright',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Copyright', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '<p>© Ethant 2020.</p>',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfg_2',
	'section' => 'section_footer_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Socials', 'ethant' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'repeater',
	'settings' => 'footer_social_list',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Social List', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'row_label' => array(
		'type' => 'text',
		'value' => esc_html__( 'social', 'ethant' )
	),
	'fields' => array(
		'social_icon' => array(
			'type' => 'select',
			'label' => esc_html__( 'Social Icon', 'ethant' ),
			'choices' => ethant_get_social_icons()
		),
		'social_url' => array(
			'type' => 'text',
			'label' => esc_html__( 'Social Url', 'ethant' )
		),
	),
	'default' => ''
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfg_3',
	'section' => 'section_footer_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Contact Form', 'ethant' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'footer_cf7_shortcode',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'CF7 Shortcode', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfg_4',
	'section' => 'section_footer_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Ornament', 'ethant' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'footer_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'footer_ornament',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Footer Ornament', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'ethant' ),
		'hide' => esc_html__( 'Hide', 'ethant' )
	),
	'active_callback' => array(
		array(
			'setting' => 'footer_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'background',
	'settings' => 'footer_ornament_background',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Ornament', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'background-color' => '',
		'background-image' => '',
		'background-repeat' => 'no-repeat',
		'background-position' => 'center center',
		'background-size' => 'cover',
		'background-attachment' => 'scroll',
	),
	'active_callback' => array(
		array(
			'setting' => 'footer_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'footer_ornament',
			'operator' => '==',
			'value' => 'show',
		)
	),
	'output' => array(
		array(
			'element' => '.vlt-footer__ornament'
		),
	),
) );