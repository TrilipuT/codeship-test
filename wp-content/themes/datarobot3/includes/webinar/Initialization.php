<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 10/11/17
 * Time: 12:09
 */

class Webinar_init {
	const POST_TYPE = 'webinar';

	public function __construct() {
		add_action( 'init', [ $this, 'register_post_type' ] );
		add_action( 'pre_get_posts', [ $this, 'filter_webinars_list' ] );
		add_action( 'template_redirect', [ $this, 'load_more_recordings' ] );
		add_action( 'template_redirect', [ $this, 'redirect_external' ] );
		$this->register_option_page();
	}

	public function redirect_external() {
		if ( is_singular( self::POST_TYPE ) ) {
			/** @var WP_Post $post */
			the_post();
			if ( Webinar::is_external_webinar() ) {
				wp_redirect( Webinar::get_link(), 301 );
			}
		}
	}

	public function register_option_page() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_sub_page( array(
				'page_title'  => 'Landing options',
				'menu_title'  => 'Landing options',
				'parent_slug' => 'theme-general-settings',
			) );
		}
	}

	public function register_post_type() {
		$labels = array(
			'name'               => 'Webinars',
			'singular_name'      => 'Webinar',
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new Webinar',
			'edit_item'          => 'Edit',
			'new_item'           => 'New Webinar',
			'all_items'          => 'All Webinars',
			'view_item'          => 'View Webinar',
			'search_items'       => 'Find',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Webinars',
		);
		$args   = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => false,
			'menu_icon'         => 'dashicons-format-video',
			'menu_position'     => 4,
			'has_archive'       => 'webinars',
			'supports'          => [ 'title', 'author', 'thumbnail', 'excerpt' ],
		);
		register_post_type( self::POST_TYPE, $args );

		add_rewrite_rule(
			self::POST_TYPE . '/([^/]+)/([^/]+)/?$',
			'index.php?' . self::POST_TYPE . '=$matches[1]&type=$matches[2]',
			'top'
		);
		add_rewrite_tag( '%type%', '([^&]+)' );
	}

	/**
	 * @param $wp_query WP_Query
	 */
	public function filter_webinars_list( &$wp_query ) {
		if ( $wp_query->is_main_query() && $wp_query->is_post_type_archive( self::POST_TYPE ) && ! is_admin() ) {
			$wp_query->set( 'meta_query', [
				[
					'key'     => 'webinar_video',
					'compare' => 'EXISTS',
				],
				[
					'key'     => 'webinar_video',
					'compare' => '!=',
					'value'   => '',
				],
			] );
			$wp_query->set( 'meta_key', 'webinar_date' );
			$wp_query->set( 'orderby', 'meta_value' );
			$wp_query->set( 'posts_per_page', 9 );

		}
	}

	public function load_more_recordings() {
		if ( ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' ) {
			$content = '';
			while ( have_posts() ) {
				the_post();
				ob_start();
				get_template_part( 'parts/webinar/recording-item' );
				$content .= ob_get_clean();
			}


			wp_send_json_success( $content );
		}
	}
}

new Webinar_init;
