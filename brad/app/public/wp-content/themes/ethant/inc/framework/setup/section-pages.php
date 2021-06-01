<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$priority = 0;

/**
 * Blog page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sb_1',
	'section' => 'section_blog',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'ethant' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'blog_title',
	'section' => 'section_blog',
	'label' => esc_html__( 'Blog Title', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => esc_html__( 'Recent News', 'ethant' ),
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'blog_type_pagination',
	'section' => 'section_blog',
	'label' => esc_html__( 'Type Pagination', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'ethant' ),
		'paged' => esc_html__( 'Paged', 'ethant' ),
		'numeric' => esc_html__( 'Numeric', 'ethant' ),
	),
	'default' => 'numeric',
) );

/**
 * Single post
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ssp_1',
	'section' => 'section_single_post',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'ethant' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'comment_placement',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Comment Placement', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'top' => esc_html__( 'Top', 'ethant' ),
		'bottom' => esc_html__( 'Bottom', 'ethant' )
	),
	'default' => 'bottom',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'show_share_post',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Post Share', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'ethant' ),
		'hide' => esc_html__( 'Hide', 'ethant' )
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'show_about_author',
	'section' => 'section_single_post',
	'label' => esc_html__( 'About Author', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'ethant' ),
		'hide' => esc_html__( 'Hide', 'ethant' )
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'show_post_navigation',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Post Navigation', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'ethant' ),
		'hide' => esc_html__( 'Hide', 'ethant' )
	),
	'default' => 'hide',
) );

/**
 * Page 404
 */
VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'error_title',
	'section' => 'section_404',
	'label' => esc_html__( 'Error Title', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => esc_html__( 'Page not found', 'ethant' ),
) );

VLT_Options::add_field( array(
	'type' => 'textarea',
	'settings' => 'error_subtitle',
	'section' => 'section_404',
	'label' => esc_html__( 'Error Subtitle', 'ethant' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => esc_html__( 'We are sorry. But the page you are looking for cannot be found.', 'ethant' ),
) );