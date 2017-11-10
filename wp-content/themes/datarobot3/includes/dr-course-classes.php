<?php

add_action( 'wp_ajax_nopriv_dr_ajax_dru', 'dru_classes' );
add_action( 'wp_ajax_dr_ajax_dru', 'dru_classes' );

function dru_classes() {
	$nonce = $_POST['nonce'];

	if ( ! wp_verify_nonce( $nonce, 'dr-nonce' ) ) {
		die ( 'Stop!' );
	}
	$prog_id = intval( $_POST['prid'] );

	$classes = get_field( 'class', $prog_id );
	if ( $classes ) {
		$options = '<option value="" selected>' . __( 'Select class', 'datarobot3' ) . '</option>';

		foreach ( $classes as $class ) {
			$options .= '<option value="' . $class['month'] . ' ' . $class['days'] . ' ' . $class['venue'] . '">' . $class['month'] . ' ' . $class['days'] . ', ' . $class['venue'] . '</option>';
		}
	} else {
		$options = '<option value="" selected>' . __( 'No classes available', 'datarobot3' ) . '</option>';
	}
	wp_send_json_success( $options );
}
