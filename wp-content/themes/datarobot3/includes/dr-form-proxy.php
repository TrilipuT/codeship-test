<?php

function checkNonce() {

	$nonce = $_POST['nonce'];

	if ( ! wp_verify_nonce( $nonce, 'dr-nonce' ) ) {

		$er = 'WP Security token(nonce) is not valid.';
		dr_raven_form_report( $user, $er );
		$result['error']   = true;
		$result['exit']    = true;
		$result['message'] = 'Security token check failed.';
		echo json_encode( $result );

		exit;
	}
}

function SF_prod() {
	$url = 'https://fbnddub87j.execute-api.us-east-1.amazonaws.com/production/forms';

	$form_data_array = array();

	$form_data = $_POST['data'];

	$form_data = explode( '&', $form_data );

	foreach ( $form_data as &$value ) {
		$value                                  = explode( '=', $value );
		$value[1]                               = urldecode( $value[1] );
		$form_data_array[ strval( $value[0] ) ] = $value[1];
	}

	$formJSON = json_encode( $form_data_array );

	$args = array(
		'body'    => $formJSON,
		'method'  => 'POST',
		'headers' => array(
			'Accept'       => 'application/json; charset=utf-8',
			'Content-Type' => 'application/json; charset=utf-8'
		),
		'cookies' => array()
	);

	$response = wp_remote_post( $url, $args );

	// check for errors

	if ( is_wp_error( $response ) ) {

		$return = array(
			'code'    => $response->get_error_code(),
			'message' => $response->get_error_message()
		);

		dr_raven_form_report( $formJSON, $return );

		wp_send_json_success( $return );

	} else {

		$return = array(
			'code' => wp_remote_retrieve_response_code( $response ),
			'body' => json_decode( wp_remote_retrieve_body( $response ) )
		);

		if ( wp_remote_retrieve_response_code( $response ) == 500 ) {
			dr_raven_form_report( $formJSON, $return );
		}

		wp_send_json_success( $return );

	}
}

function Eloqua_prod() {
	$url = 'https://s2142644770.t.eloqua.com/e/f2';

	$data = $_POST['data'];

	$args = array(
		'body'    => $data,
		'method'  => 'POST',
		'headers' => array(),
		'cookies' => array()
	);

	$response = wp_remote_post( $url, $args );

	if ( is_wp_error( $response ) ) {

		$elq_return = array(
			'code'    => $response->get_error_code(),
			'message' => $response->get_error_message()
		);

		dr_raven_form_report( $data, $elq_return );

	}
}

function dr_submitToEloqua() {

	checkNonce();

	Eloqua_prod();

	$elq_return = array(
		'code'    => 200,
		'body' => array(
			'message' => 'Submission to Eloqua has finished'
		)
	);

	wp_send_json_success($elq_return);

}

function dr_submitToSF() {

	checkNonce();

	SF_prod();

}

function dr_submit_all() {
	checkNonce();

	Eloqua_prod();
	SF_prod();

	wp_die();
}


add_action( 'wp_ajax_nopriv_submit_all', 'dr_submit_all' );
add_action( 'wp_ajax_submit_all', 'dr_submit_all' );

add_action( 'wp_ajax_nopriv_submitToSF', 'dr_submitToSF' );
add_action( 'wp_ajax_submitToSF', 'dr_submitToSF' );

add_action( 'wp_ajax_nopriv_submitToEloqua', 'dr_submitToEloqua' );
add_action( 'wp_ajax_submitToEloqua', 'dr_submitToEloqua' );

?>
