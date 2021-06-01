<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

if ( ! function_exists( 'ethant_load_more_btn' ) ) {
	function ethant_load_more_btn( $wp_query = null ) {

		if ( $wp_query == null ) {
			global $wp_query;
		} else {
			$wp_query = $wp_query;
		}

		$max = $wp_query->max_num_pages;
		$paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;

		wp_localize_script(
			'vlt-controllers',
			'VLT_LOAD_MORE_CDATA',
			array(
				'load_more_btn_startPage' => $paged,
				'load_more_btn_maxPages' => $max,
				'load_more_btn_nextLink' => next_posts( $max, false ),
				'load_more_btn_noMore' => esc_html__( 'No More', 'ethant' ),
				'load_more_btn_text' => esc_html__( 'More', 'ethant' ),
				'load_more_btn_loading' => esc_html__( 'Loading', 'ethant' ),
			)
		);
	}
}