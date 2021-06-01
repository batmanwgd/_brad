<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

$php_min_requirements = array(
	'php_version' => '5.6',
	'memory_limit' => '512',
	'max_execution_time' => '300',
	'max_input_time' => '300',
	'post_max_size' => '512',
	'max_input_vars' => '5000',
	'upload_max_filesize' => '512'
);
function vlthemes_requirement_php_version( $min_value ) {
		$requirement_php_version = $php_version = false;
		if ( function_exists( 'phpversion' ) ) {
			$php_version = phpversion();
			$requirement_php_version = version_compare( $php_version, $min_value, '>=' );
		}
		return array( $requirement_php_version, $php_version );
}
function vlthemes_requirement_memory_limit( $min_value ) {
		$requirement_memory_limit = $memory_limit = false;
		if ( function_exists( 'ini_get' ) ) {
			$memory_limit = ini_get( 'memory_limit' );
			$requirement_memory_limit = preg_replace( "/[^0-9]/", '', $memory_limit ) >= $min_value;
		}
		return array( $requirement_memory_limit, $memory_limit );
}
function vlthemes_requirement_max_execution_time( $min_value ) {
		$requirement_max_execution_time = $max_execution_time = false;
		if ( function_exists( 'ini_get' ) ) {
			$max_execution_time = ini_get( 'max_execution_time' );
			$requirement_max_execution_time = $max_execution_time >= $min_value;
		}
		return array( $requirement_max_execution_time, $max_execution_time );
}
function vlthemes_requirement_max_input_time( $min_value ) {
		$requirement_max_input_time = $max_input_time = false;
		if ( function_exists( 'ini_get' ) ) {
			$max_input_time = ini_get( 'max_input_time' );
			$requirement_max_input_time = preg_replace( "/[^0-9]/", '', $max_input_time ) >= $min_value;
		}
		return array( $requirement_max_input_time, $max_input_time );
}
function vlthemes_requirement_post_max_size( $min_value ) {
		$requirement_post_max_size = $post_max_size = false;
		if ( function_exists( 'ini_get' ) ) {
			$post_max_size = ini_get( 'post_max_size' );
			$requirement_post_max_size = preg_replace( "/[^0-9]/", '', $post_max_size ) >= $min_value;
		}
		return array( $requirement_post_max_size, $post_max_size );
}
function vlthemes_requirement_max_input_vars( $min_value ) {
		$requirement_max_input_vars = $max_input_vars = false;
		if ( function_exists( 'ini_get' ) ) {
			$max_input_vars = ini_get( 'max_input_vars');
			$requirement_max_input_vars = preg_replace( "/[^0-9]/", '', $max_input_vars ) >= $min_value;
		}
		return array( $requirement_max_input_vars, $max_input_vars );
}
function vlthemes_requirement_upload_max_filesize( $min_value ) {
		$requirement_upload_max_filesize = $upload_max_filesize = false;
		if ( function_exists( 'ini_get' ) ) {
			$upload_max_filesize = ini_get( 'upload_max_filesize' );
			$requirement_upload_max_filesize = preg_replace( "/[^0-9]/", '', $upload_max_filesize ) >= $min_value;
		}
		return array( $requirement_upload_max_filesize, $upload_max_filesize );
}

$requirements_all_is_well =
vlthemes_requirement_php_version( $php_min_requirements['php_version'] )[0] &&
vlthemes_requirement_memory_limit( $php_min_requirements['memory_limit'] )[0] &&
vlthemes_requirement_max_execution_time( $php_min_requirements['max_execution_time'] )[0] &&
vlthemes_requirement_max_input_time( $php_min_requirements['max_input_time'] )[0] &&
vlthemes_requirement_post_max_size( $php_min_requirements['post_max_size'] )[0] &&
vlthemes_requirement_max_input_vars( $php_min_requirements['max_input_vars'] )[0] &&
vlthemes_requirement_upload_max_filesize( $php_min_requirements['upload_max_filesize'] )[0];

?>

<div class="vlt-dashboard-widget">

	<div class="vlt-dashboard-widget--title">
		<?php if ( $requirements_all_is_well ) { ?>

			<mark class="true"><?php echo vlthemes_dashboard()->strings[ 'widget_requirements_title' ]; ?></mark>
			<span class="vlt-dashboard-widget--title-badge true"><?php echo vlthemes_dashboard()->strings[ 'widget_requirements_noproblems' ]; ?></span>

		<?php } else { ?>

			<mark class="false"><?php echo vlthemes_dashboard()->strings[ 'widget_requirements_title' ]; ?></mark>
			<span class="vlt-dashboard-widget--title-badge false"><?php echo vlthemes_dashboard()->strings[ 'widget_requirements_problems' ]; ?></span>

		<?php } ?>
	</div>

	<div class="vlt-dashboard-widget--content">
		<div class="vlt-widget-requirements">
			<table class="widefat" cellspacing="0">
				<tbody>

					<tr>
						<td><?php esc_html_e( 'PHP Version:', 'vlthemes' ); ?></td>
						<td>
							<?php

								$vlthemes_requirement_php_version = vlthemes_requirement_php_version( $php_min_requirements['php_version'] );

								if ( $vlthemes_requirement_php_version[0] ) {
									echo '<mark class="true">✔ ' . esc_attr( $vlthemes_requirement_php_version[1] ) . '</mark>';
								} else {
									echo '<mark class="false vlt-drop-parent">';
									echo '✘ ' . esc_attr( $vlthemes_requirement_php_version[1] );
									echo ' <small>[ ' . vlthemes_dashboard()->strings[ 'widget_more_info_text' ] . ' ]</small>';
									echo '<span class="vlt-drop-content">';
									echo sprintf( esc_html__( 'We recommend upgrade php version to at least %s.', 'vlthemes' ), $php_min_requirements[ 'php_version' ] );
									echo '</span>';
									echo '</mark>';
								}

							?>
						</td>
					</tr>

					<tr>
						<td><?php esc_html_e( 'Memory Limit:', 'vlthemes' ); ?></td>
						<td>
							<?php
								$vlthemes_requirement_memory_limit = vlthemes_requirement_memory_limit( $php_min_requirements['memory_limit'] );
								if ( $vlthemes_requirement_memory_limit[0] ) {
									echo '<mark class="true">✔ ' . esc_attr( $vlthemes_requirement_memory_limit[1] ) . '</mark>';
								} else {
									echo '<mark class="false vlt-drop-parent">✘ ' . esc_attr( $vlthemes_requirement_memory_limit[1] ) . ' ';
									echo '<small>[ ' . vlthemes_dashboard()->strings[ 'widget_more_info_text' ] . ' ]</small>';
									echo '<span class="vlt-drop-content">';
									echo sprintf( esc_html__( 'For normal usage will be enough 180M, but for importing demo we recommend setting memory to at least %s.', 'vlthemes' ),
										'<strong>' . esc_attr( $php_min_requirements[ 'memory_limit' ] ) . '</strong><br>'
									);
									echo sprintf( esc_html__( 'Read more: %s', 'vlthemes' ), sprintf( '<a href="http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP" target="_blank">%s</a>', esc_html__( 'Increasing memory allocated to PHP.', 'vlthemes' ) )
									);
									echo '</span>';
									echo '</mark>';
								}
							?>

						</td>
					</tr>

					<tr>
						<td><?php esc_html_e( 'Max Execution Time:', 'vlthemes' ); ?></td>
						<td>
							<?php

								$vlthemes_requirement_max_execution_time = vlthemes_requirement_max_execution_time( $php_min_requirements['max_execution_time'] );

								if ( $vlthemes_requirement_max_execution_time[0] ) {
									echo '<mark class="true">✔ ' . esc_attr( $vlthemes_requirement_max_execution_time[1] ) . '</mark>';
								} else {
									echo '<mark class="false vlt-drop-parent">';
									echo '✘ ' . esc_attr( $vlthemes_requirement_max_execution_time[1] );
									echo ' <small>[ ' . vlthemes_dashboard()->strings[ 'widget_more_info_text' ] . ' ]</small>';
									echo '<span class="vlt-drop-content">';
									echo sprintf( esc_html__( 'We recommend setting max execution time to at least %s.', 'vlthemes' ), esc_attr( $php_min_requirements[ 'max_execution_time' ] ) );
									echo ' <br> ';
									echo sprintf( esc_html__( 'See more: %s', 'vlthemes' ), sprintf( '<a href="http://codex.wordpress.org/Common_WordPress_Errors#Maximum_execution_time_exceeded" target="_blank">%s</a>', esc_html__( 'Increasing max execution to PHP', 'vlthemes' ) )
									);
									echo '</span>';
									echo '</mark>';
								}
							?>
						</td>
					</tr>

					<tr>
						<td><?php esc_html_e( 'Max Input Time:', 'vlthemes' ); ?></td>
						<td>
							<?php
								$vlthemes_requirement_max_input_time = vlthemes_requirement_max_input_time( $php_min_requirements['max_input_time'] );
								if ( $vlthemes_requirement_max_input_time[0] ) {
									echo '<mark class="true">✔ ' . esc_attr( $vlthemes_requirement_max_input_time[1] ) . '</mark>';
								} else {
									echo '<mark class="false vlt-drop-parent">';
									echo '✘ ' . esc_attr( $vlthemes_requirement_max_input_time[1] );
									echo ' <small>[ ' . vlthemes_dashboard()->strings[ 'widget_more_info_text' ] . ' ]</small>';
									echo '<span class="vlt-drop-content">';
									echo sprintf( esc_html__( 'We recommend to at least %s.', 'vlthemes' ), esc_attr( $php_min_requirements['max_input_time'] ) );
									echo '</span>';
									echo '</mark>';
								}
							?>
						</td>
					</tr>

					<tr>
						<td><?php esc_html_e( 'Post Max Size:', 'vlthemes' ); ?></td>
						<td>
							<?php
								$vlthemes_requirement_post_max_size = vlthemes_requirement_post_max_size( $php_min_requirements['post_max_size'] );
								if ( $vlthemes_requirement_post_max_size[0] ) {
									echo '<mark class="true">✔ ' . esc_attr( $vlthemes_requirement_post_max_size[1] ) . '</mark>';
								} else {
									echo '<mark class="false vlt-drop-parent">';
									echo '✘ ' . esc_attr( $vlthemes_requirement_post_max_size[1] );
									echo ' <small>[ ' . vlthemes_dashboard()->strings[ 'widget_more_info_text' ] . ' ]</small>';
									echo '<span class="vlt-drop-content">';
									echo sprintf( esc_html__( 'We recommend to at least %sM.', 'vlthemes' ), esc_attr( $php_min_requirements['post_max_size'] ) );
									echo '</span>';
									echo '</mark>';
								}
							?>
						</td>
					</tr>

					<tr>
						<td><?php esc_html_e( 'Max Input Vars:', 'vlthemes' ); ?></td>
						<td>
							<?php
								$vlthemes_requirement_max_input_vars = vlthemes_requirement_max_input_vars( $php_min_requirements['max_input_vars'] );
								if ( $vlthemes_requirement_max_input_vars[0] ) {
									echo '<mark class="true">✔ ' . esc_attr( $vlthemes_requirement_max_input_vars[1] ) . '</mark>';
								} else {
									echo '<mark class="false vlt-drop-parent">';
									echo '✘ ' . esc_attr( $vlthemes_requirement_max_input_vars[1] );
									echo ' <small>[ ' . vlthemes_dashboard()->strings[ 'widget_more_info_text' ] . ' ]</small>';
									echo '<span class="vlt-drop-content">';
									echo sprintf( esc_html__( 'We recommend to at least %s.', 'vlthemes' ), esc_attr( $php_min_requirements['max_input_vars'] ) );
									echo '</span>';
									echo '</mark>';
								}
							?>
						</td>
					</tr>

					<tr>
						<td><?php esc_html_e( 'Upload Max Filesize:', 'vlthemes' ); ?></td>
						<td>
							<?php
								$vlthemes_requirement_upload_max_filesize = vlthemes_requirement_upload_max_filesize( $php_min_requirements['upload_max_filesize'] );
								if ( $vlthemes_requirement_upload_max_filesize[0] ) {
									echo '<mark class="true">✔ ' . esc_attr( $vlthemes_requirement_upload_max_filesize[1] ) . '</mark>';
								} else {
									echo '<mark class="false vlt-drop-parent">';
									echo '✘ ' . esc_attr( $vlthemes_requirement_upload_max_filesize[1] );
									echo ' <small>[ ' . vlthemes_dashboard()->strings[ 'widget_more_info_text' ] . ' ]</small>';
									echo '<span class="vlt-drop-content">';
									echo sprintf( esc_html__( 'We recommend to at least %sM.', 'vlthemes' ), esc_attr( $php_min_requirements['upload_max_filesize'] ) );
									echo '</span>';
									echo '</mark>';
								}
							?>
						</td>
					</tr>

					<tr>
						<td><?php esc_html_e( 'Child Theme:', 'vlthemes' ); ?></td>
						<td>
							<?php
								if ( vlthemes_helper_plugin()->theme_is_child ) {
									echo '<mark class="true">✔</mark>';
								} else {
									echo '<mark class="vlt-drop-parent vlt-drop-parent">✘ ';
									echo '<small>[ ' . vlthemes_dashboard()->strings[ 'widget_more_info_text' ] . ' ]</small>';
									echo '<span class="vlt-drop-content">' . esc_html__( 'We recommend use child theme to prevent loosing your customizations after theme update.', 'vlthemes' ) . '</span>';
									echo '</mark>';
								}
							?>
						</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>
<!--end .vlt-dashboard-widget-->