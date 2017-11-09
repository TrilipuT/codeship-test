<?php

add_action( 'wp_ajax_nopriv_dr_ajax_dru', 'dru_classes' );
add_action( 'wp_ajax_dr_ajax_dru', 'dru_classes' );

function dru_classes() {
	$nonce = $_POST['nonce'];

	if ( ! wp_verify_nonce( $nonce, 'dr-nonce' ) )
		die ( 'Stop!');

	$prog_id = intval($_POST['prid']);

	$classes = get_field('class', $prog_id);

	ob_start(); 

	echo '<option value="" selected>Select class</option>';

	foreach($classes as $class){
		echo '<option value="'.$class['month'].' '.$class['days'].' '.$class['venue'].'">'.$class['month'].' '.$class['days'].', '.$class['venue'].'</option>';
	}

	$output = ob_get_contents();

	ob_end_clean();

	echo $output;

	wp_die();
}

?>
