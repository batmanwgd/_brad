<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$priority = 0;

/**
 * Header general
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_1',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'ethant' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_show',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Header Show', 'ethant' ),
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
	'settings' => 'navigation_fixed',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Fixed', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'ethant' ),
		'disable' => esc_html__( 'Disable', 'ethant' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
	'default' => 'enable',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_3',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Logo', 'ethant' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'navigation_logo',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'navigation_logo_height',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo Height', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'output' => array(
		array(
			'element' => '.vlt-header .vlt-navbar-logo img',
			'property' => 'height'
		)
	)
) );

/**
 * Header aside
 */

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_3',
	'section' => 'section_header_aside',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Contact Phone', 'ethant' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'header_contact_phone',
	'section' => 'section_header_aside',
	'label' => esc_html__( 'Phone', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
) );

VLT_Options::add_field( array(
	'type' => 'link',
	'settings' => 'header_contact_phone_link',
	'section' => 'section_header_aside',
	'label' => esc_html__( 'Link', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_4',
	'section' => 'section_header_aside',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Contact Email', 'ethant' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'header_contact_email',
	'section' => 'section_header_aside',
	'label' => esc_html__( 'Email', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
) );

VLT_Options::add_field( array(
	'type' => 'link',
	'settings' => 'header_contact_email_link',
	'section' => 'section_header_aside',
	'label' => esc_html__( 'Link', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_5',
	'section' => 'section_header_aside',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Copyright', 'ethant' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'editor',
	'settings' => 'header_copyright',
	'section' => 'section_header_aside',
	'label' => esc_html__( 'Copyright', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '<p>All Rights Reserved.</p>',
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );