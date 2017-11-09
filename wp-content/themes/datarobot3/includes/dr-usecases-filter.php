<?php

add_action( 'wp_ajax_nopriv_dr_ajax_uc', 'dr_uc_filter' );
add_action( 'wp_ajax_dr_ajax_uc', 'dr_uc_filter' );

function dr_uc_filter() {
	$nonce = $_POST['nonce'];

	if ( ! wp_verify_nonce( $nonce, 'dr-nonce' ) )
		die ( 'Stop!');

	$term_id = intval($_POST['term_id']);

	$fields = get_term_meta( $term_id , '', false );

	$cases = get_posts(
		array(
			'numberposts'     => -1,
			'post_type'       => 'usecase',
			'tax_query'       => array(
			    array(
			      'taxonomy'  => 'group',
			      'field'     => 'id',
			      'terms'     => $term_id
			    )
			),
			'post_status'     => 'publish',
			'orderby'         => 'post_date',
			'order'           => 'DESC'
		)
	);

	ob_start(); 

	if ($fields) {
		echo '<div class="uc-description">';
			echo '<h3>'.$fields['title'][0].'</h3>';
			echo '<p>'.$fields['description'][0].'</p>';
		echo '</div>';
	}

	echo '<div class="uc-examples">';

	foreach($cases as $case){
		$group_classes = '';
		$cur_terms = get_the_terms( $case->ID, 'group' );
		foreach( $cur_terms as $cur_term ){
			$group_classes .= ' '.strtolower($cur_term->name);
		}

		echo '<div class="uc-item hover-light transition01'.$group_classes.'">';
			echo '<a href="'.get_the_permalink($case->ID).'">';
				echo '<h3>'.get_the_title($case->ID).'</h3>';
				echo '<p>'.get_field('excerpt', $case->ID).'</p>';
				echo '<span class="read-more">Open use case</span>';
			echo '</a>';
		echo '</div>';

	}

	echo '</div>';

	$page_output = ob_get_contents();

	ob_end_clean();

	echo $page_output;
	//echo json_encode($page_output);

	wp_die();
}

?>
