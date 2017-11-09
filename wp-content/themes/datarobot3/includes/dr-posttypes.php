<?php

// add_action('init', 'features_init');
// function features_init()
// {
//   $labels = array(
// 	'name' => 'Overview features',
// 	'singular_name' => 'Feature',
// 	'add_new' => 'Add new',
// 	'add_new_item' => 'Add new Feature',
// 	'edit_item' => 'Edit',
// 	'new_item' => 'New Feature',
// 	'all_items' => 'All Features',
// 	'view_item' => 'View',
// 	'search_items' => 'Find',
// 	'not_found' =>  'Not found',
// 	'not_found_in_trash' => 'Not found in trash',
// 	'parent_item_colon' => '',
// 	'menu_name' => 'Overview features'
//   );
//   $args = array(
// 	'labels' => $labels,
// 	'public' => false,
// 	'publicly_queryable' => true,
// 	'show_ui' => true,
// 	'show_in_menu' => true,
// 	'show_in_nav_menus' => false,
// 	'query_var' => true,
// 	'rewrite' => false,
// 	'menu_icon' => 'dashicons-images-alt',
// 	'menu_position' => 4,
// 	'capability_type' => 'post',
// 	'has_archive' => true,
// 	'hierarchical' => false,
// 	'taxonomies' => array('category'),
// 	'supports' => array('title','editor','author','thumbnail')
//   );
//   register_post_type('feature',$args);
// }

add_action('init', 'courses_init');
function courses_init()
{
  $labels = array(
	'name' => 'DRU Courses',
	'singular_name' => 'Course',
	'add_new' => 'Add new',
	'add_new_item' => 'Add new Course',
	'edit_item' => 'Edit',
	'new_item' => 'New Course',
	'all_items' => 'All Courses',
	'view_item' => 'View Course',
	'search_items' => 'Find',
	'not_found' =>  'Not found',
	'not_found_in_trash' => 'Not found in trash',
	'parent_item_colon' => '',
	'menu_name' => 'DRU Courses'
  );
  $args = array(
	'labels' => $labels,
	'public' => false,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'show_in_nav_menus' => false,
	'query_var' => true,
	'rewrite' => false,
	'menu_icon' => 'dashicons-welcome-learn-more',
	'menu_position' => 5,
	'capability_type' => 'post',
	'has_archive' => false,
	'hierarchical' => false,
	'supports' => array('title','author')
  );
  register_post_type('course',$args);
}

add_action('init', 'use_cases_init');
function use_cases_init()
{
  $labels = array(
	'name' => 'Use cases',
	'singular_name' => 'Use case',
	'add_new' => 'Add new',
	'add_new_item' => 'Add new Use case',
	'edit_item' => 'Edit',
	'new_item' => 'New Use case',
	'all_items' => 'All Use cases',
	'view_item' => 'View',
	'search_items' => 'Find',
	'not_found' =>  'Not found',
	'not_found_in_trash' => 'Not found in trash',
	'parent_item_colon' => '',
	'menu_name' => 'Use cases'

  );
  $args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'show_in_nav_menus' => false,
	'query_var' => true,
	'rewrite' => array('slug' => 'use-cases'),
	'menu_icon' => 'dashicons-images-alt2',
	'menu_position' => 6,
	'capability_type' => 'post',
	'has_archive' => false,
	'hierarchical' => true,
	'taxonomies' => array('group'),
	'supports' => array('title','editor','author')
  );
  register_post_type('usecase',$args);
}

add_action( 'init', 'create_usecase_taxonomy', 0 );
function create_usecase_taxonomy(){
	$labels = array(
		'name' => _x( 'Groups', 'taxonomy general name' ),
		'singular_name' => _x( 'Group', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Groups' ),
		'popular_items' => __( 'Popular Groups' ),
		'all_items' => __( 'All Groups' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Group' ),
		'update_item' => __( 'Update Group' ),
		'add_new_item' => __( 'Add New Group' ),
		'new_item_name' => __( 'New Group Name' ),
		'menu_name' => __( 'Groups' ),
	);

	register_taxonomy('group', 'usecase', array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'group' ),
		'show_in_quick_edit' => true,
		'show_admin_column'     => true,
	));
}

add_action('init', 'slides_init');
function slides_init()
{
  $labels = array(
	'name' => 'Slides',
	'singular_name' => 'Slide',
	'add_new' => 'Add new',
	'add_new_item' => 'Add new Slide',
	'edit_item' => 'Edit Slide',
	'new_item' => 'New Slide',
	'all_items' => 'All Slides',
	'view_item' => 'View Slide',
	'search_items' => 'Find',
	'not_found' =>  'Not found',
	'not_found_in_trash' => 'Not found in trash',
	'parent_item_colon' => '',
	'menu_name' => 'Slides'

  );
  $args = array(
	'labels' => $labels,
	'public' => false,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'show_in_nav_menus' => false,
	'query_var' => true,
	'rewrite' => true,
	'menu_icon' => 'dashicons-slides',
	'menu_position' => 7,
	'capability_type' => 'post',
	'has_archive' => false,
	'hierarchical' => false,
	'supports' => array('title','editor','author','thumbnail')
  );
  register_post_type('slide',$args);
}

add_action('init', 'dr_events_init');
function dr_events_init()
{
  $labels = array(
	'name' => 'Events',
	'singular_name' => 'Event',
	'add_new' => 'Add new',
	'add_new_item' => 'Add new Event',
	'edit_item' => 'Edit Event',
	'new_item' => 'New Event',
	'all_items' => 'All Events',
	'view_item' => 'View Event',
	'search_items' => 'Find Event',
	'not_found' =>  'Not found',
	'not_found_in_trash' => 'Not found in trash',
	'parent_item_colon' => '',
	'menu_name' => 'Events'
	
  );
  $args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'query_var' => true,
	'rewrite' => true,
	'menu_icon' => 'dashicons-location',
	'menu_position' => 8,
	'capability_type' => 'post',
	'has_archive' => true,
	'hierarchical' => false,
	'taxonomies' => array('category'),
	'supports' => array('title','editor','author','thumbnail')
  );
  register_post_type('event',$args);
}

add_action('init', 'testimonials_init');
function testimonials_init()
{
  $labels = array(
	'name' => 'Testimonials',
	'singular_name' => 'Testimonial',
	'add_new' => 'Add new',
	'add_new_item' => 'Add new Testimonial',
	'edit_item' => 'Edit Testimonial',
	'new_item' => 'New Testimonial',
	'all_items' => 'All Testimonials',
	'view_item' => 'View Testimonial',
	'search_items' => 'Find Testimonials',
	'not_found' =>  'Not found',
	'not_found_in_trash' => 'Not found in trash',
	'parent_item_colon' => '',
	'menu_name' => 'Testimonials'

  );
  $args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'query_var' => true,
	'rewrite' => true,
	'menu_icon' => 'dashicons-format-quote',
	'menu_position' => 9,
	'capability_type' => 'post',
	'has_archive' => false,
	'hierarchical' => true,
	'supports' => array('title','author')
  );
  register_post_type('testimonial',$args);
}

?>