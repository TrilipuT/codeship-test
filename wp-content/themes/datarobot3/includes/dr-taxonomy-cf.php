<?php

$taxname = 'group';

add_action("{$taxname}_add_form_fields", 'add_group_custom_fields');
add_action("{$taxname}_edit_form_fields", 'edit_group_custom_fields');

add_action("create_{$taxname}", 'save_custom_taxonomy_meta');
add_action("edited_{$taxname}", 'save_custom_taxonomy_meta');

function add_group_custom_fields( $taxonomy_slug ){
	?>
	<div class="form-field">
		<label for="tag-title">Desription title</label>
		<input name="extra[title]" id="tag-title" type="text" value="" />
	</div>
	<div class="form-field">
		<label for="tag-description">Desription text</label>
		<textarea name="extra[description]" id="tag-description" rows="5" cols="50" class="large-text"><?php echo esc_attr(get_term_meta($term->term_id, 'description', 1)) ?></textarea>
	</div>
	<?php
}

function edit_group_custom_fields( $term ) {
	?>
		<tr class="form-field">
			<th scope="row" valign="top"><label>Desription title</label></th>
			<td>
				<input type="text" name="extra[title]" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'title', 1 ) ) ?>"><br />
			</td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top"><label>Desription text</label></th>
			<td>
				<textarea name="extra[description]" id="description" rows="5" cols="50" class="large-text"><?php echo esc_attr(get_term_meta($term->term_id, 'description', 1)) ?></textarea>
			</td>
		</tr>

	<?php
}

function save_custom_taxonomy_meta( $term_id ) {
	if ( ! isset($_POST['extra']) )
		return;

	$extra = array_map('trim', $_POST['extra']);

	foreach( $extra as $key => $value ){
		if( empty($value) ){
			delete_term_meta( $term_id, $key );
			continue;
		}

		update_term_meta( $term_id, $key, $value );
	}

	return $term_id;
}

?>