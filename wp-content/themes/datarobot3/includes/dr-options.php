<?php
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'icon_url'   => 'dashicons-screenoptions',
		'redirect'   => false
	) );

	acf_add_options_sub_page( array(
		'page_title'  => 'Message Banner Settings',
		'menu_title'  => 'Message Banner',
		'parent_slug' => 'theme-general-settings',
	) );

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Footer',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));

}
