<?php
function dr3_setup(){
	load_theme_textdomain('datarobot3', get_template_directory() . '/languages');

	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');

	set_post_thumbnail_size(705, 300, true);

	add_filter('widget_text', 'do_shortcode');
	add_filter('wpseo_canonical', 'canonical_query');

	register_nav_menus(array(
		'top' => 'Top menu',
		'bottom1' => 'Bottom menu 1',
		'bottom2' => 'Bottom menu 2',
		'bottom3' => 'Bottom menu 3',
		'bottom4' => 'Bottom menu 4'
	));

	register_sidebar(array(
		'name' => 'Right sidebar',
		'id' => "right-sidebar",
		'description' => 'Typical sidebar on the right',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>\n",
		'before_title' => '<span class="widgettitle">',
		'after_title' => "</span>\n",
	));
	register_sidebar(array(
		'name' => 'Event page sidebar',
		'id' => "event-sidebar",
		'description' => 'Custom sidebar for event pages',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>\n",
		'before_title' => '<span class="widgettitle">',
		'after_title' => "</span>\n"
	));
	register_sidebar(array(
		'name' => 'Category sidebar',
		'id' => "category-sidebar",
		'description' => 'Custom sidebar for categories and posts',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => "</div>\n",
		'before_title' => '<span class="widgettitle">',
		'after_title' => "</span>\n"
	));
}

add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );

function dequeue_jquery_migrate( &$scripts ) {
	if ( ! is_admin() ) {
		$scripts->registered['jquery']->deps = [ 'jquery-core' ];
	}
}

/**
 * Get suffix '.min' if in production and '' if staging or dev
 * @return string
 */
function get_suffix(){
	$suffix = '';
	if ( function_exists( 'is_wpe' ) ) {
		$suffix = is_wpe() ? '.min' : '';
	}
	return $suffix;
}

add_action('after_setup_theme', 'dr3_setup');

function scripts_method() {
	wp_register_script( 'main', get_template_directory_uri() . "/assets/built/javascripts/common" . get_suffix() . ".js", [ 'jquery' ], filemtime( get_template_directory() . '/assets/built/javascripts/common' . get_suffix() . '.js' ), true );
	wp_enqueue_script( 'gasalesforce', get_template_directory_uri() . "/assets/src/javascripts/gasalesforce.js" );
//	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/built/stylesheets/screen.css' );

	if ( is_page_template( 'page-ai-exp.php' ) ) {
		wp_enqueue_script( 'draw-js', get_template_directory_uri() . '/js/jquery.drawsvg.js', array( 'jquery' ) );
		wp_enqueue_script( 'flipclock', get_template_directory_uri() . '/js/flipclock.min.js', array( 'jquery' ) );
	}

	$dr = [
		'js_data' => [
			'url'       => admin_url( 'admin-ajax.php' ),
			'nonce'     => wp_create_nonce( 'dr-nonce' ),
			'sc_nonce'  => wp_create_nonce( 'dr_sc_nonce' ),
			'is_mobile' => wp_is_mobile(),
		],
	];
	if ( is_page_template( 'page-test-drive.php' ) ) {
		$dr['freeEmailAddresses'] = get_email_domains();
	}
	wp_localize_script( 'main', 'dr', $dr );

	wp_enqueue_script( 'main' );
}

add_action('wp_enqueue_scripts', 'scripts_method');

function add_events_to_query($query)
{
    if ($query->is_main_query() && (is_category('events'))) {
        $query->set('post_type', array('post', 'event'));
    }
}
add_action('pre_get_posts', 'add_events_to_query');

function strToLowRep($string)
{
    $string = str_replace(' ', '_', $string);
    $string = preg_replace("/[^a-zA-Z0-9_]+/", "", $string);
    $string = strtolower($string);

    echo $string;
}

function str_source($string)
{
    $junk = array(":", ";", ".", ",", "'");
    $plain = str_replace($junk, "", $string);
    $result = str_replace(" ", "_", $plain);

    echo $result;
}

function str_location($string)
{
    if (($pos = strpos($string, ',')) !== false) {
        $result = substr($string, 0, $pos);
    } else {
        $result = $string;
    }
    echo $result;
}

function str_state($string)
{
    if (($pos = strpos($string, ',')) !== false) {
        $result = substr($string, $pos);
    }
    echo $result;
}

function eventDateTime()
{
    $ev_start_date = get_field('ev_start_date');
    $ev_start_date = date("F j", strtotime($ev_start_date));
    $ev_start_date_month = date("n", strtotime($ev_start_date));
    $ev_end_date = '';

    if (get_field('ev_end_date')) {
        $ev_end_date = get_field('ev_end_date');
        $ev_end_date_month = date("n", strtotime($ev_end_date));
        if ($ev_end_date_month == $ev_start_date_month) {
            $ev_end_date = " - " . date("j", strtotime($ev_end_date));
        } else {
            $ev_end_date = " - " . date("F j", strtotime($ev_end_date));
        }
    }

    $outputString = $ev_start_date . $ev_end_date;

    $ev_time_start = get_field('ev_time_start');
    $ev_time_end = get_field('ev_time_end');

    if ($ev_time_start) {
        $outputString .= ', ' . $ev_time_start;
        if ($ev_time_end) {
            $outputString .= ' - ' . $ev_time_end;
        }
    }

    echo $outputString;
}

function universityClassDate($start, $end)
{
    $c_start_date = $start;
    $c_start_date_month = date("n", strtotime($c_start_date));
    $c_start_date_day = date("j", strtotime($c_start_date));
    $output = date("F j", strtotime($c_start_date));

    if ($end) {
        $c_end_date = $end;
        $c_end_date_month = date("n", strtotime($c_end_date));
        $c_end_date_day = date("j", strtotime($c_end_date));
        if ($c_end_date_month == $c_start_date_month) {
            $output .= "-" . date("j", strtotime($c_end_date));
            if ($c_end_date_day == $c_start_date_day) {
                $output = date("F j", strtotime($c_start_date));
            }
        } else {
            $output = date("M j", strtotime($c_start_date)) . " - " . date("M j", strtotime($c_end_date));
        }
    }

    echo $output;
}

function universityClassMonth($start, $end)
{
    $c_start_date = $start;
    $c_start_month = date("M", strtotime($c_start_date));
    $output = $c_start_month;

    if ($end) {
        $c_end_date = $end;
        $c_end_month = date("M", strtotime($c_end_date));
        if ($c_end_month !== $c_start_month) {
            $output = date("M", strtotime($c_start_date)) . " - " . date("M", strtotime($c_end_date));
        }
    }

    echo $output;
}

function universityClassDays($start, $end)
{
    $c_start_date = $start;
    $c_start_day = date("j", strtotime($c_start_date));
    $output = $c_start_day;

    if ($end) {
        $c_end_date = $end;
        $c_end_day = date("j", strtotime($c_end_date));
        if ($c_end_day == $c_start_day) {
            $output = $c_start_day;
        } else {
            $output = $c_start_day . "-" . $c_end_day;
        }
    }

    echo $output;
}

function universityClassYear($end)
{
    $c_end_year = $end;
    $c_end_year = date("Y", strtotime($c_end_year));

    echo $c_end_year;
}

function steps_timing($steps) {
	$vSteps = array();
	foreach($steps as $index => $step){
			$vSteps[$index]['start'] = $steps[$index]["step_start_time"];
			$vSteps[$index]['end'] = $steps[$index+1]["step_start_time"];
			$vSteps[$index]['duration'] = $steps[$index+1]["step_start_time"] - $steps[$index]["step_start_time"];
	}

	$n = count($vSteps)-1;
	for ($i=0; $i < $n; $i++) {
	echo "case t >= {$vSteps[$i]['start']} && t < {$vSteps[$i]['end']}: activateTab({$i}, {$vSteps[$i]['start']}, {$vSteps[$i]['duration']}); break;\n";
	}
	echo "case t >= {$vSteps[$n]['start']} && t < video.duration(): activateTab({$n}, {$vSteps[$n]['start']}, (video.duration() - {$vSteps[$n]['start']})); break;\n";
}

function canonical_query($string) {
	if (is_page_template('page-careers.php')) {
		return 	home_url( add_query_arg( null, null ));
	} else {
		return $string;
	}
}

// Create the shortcode
function datarobot_total_models($atts)
{
    $data = file_get_contents("https://app.datarobot.com/public/total-models");

    $data = json_decode($data, true);
    $total_models = $data["total-models"];

    //  $total_models = number_format($total_models, 0);
    return $total_models;
}

// Add as shortcode
add_shortcode("datarobot_total_models", "datarobot_total_models");

// Load a list of free email domains
function get_email_domains() {
	if ( ! $data = get_transient( 'freeEmailAddresses' ) ) {
		$data = file_get_contents( "freeEmailAddresses.txt", true );
		$data = explode( "\n", $data );
		$data = json_encode( $data, true );
		set_transient( 'freeEmailAddresses', $data, DAY_IN_SECONDS );
	}

	return $data;
}

// Get page ID by slug
function get_id_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
}

function pagination()
{
    global $wp_query; // wp_query must be global
    $big = 999999999; // uniq num for replace
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))), // what replace in format
        'format' => '?paged=%#%', // format of pagination, %#% will be replaced
        'current' => max(1, get_query_var('paged')), // current page, 1 if $_GET['page'] is not set
        'type' => 'list', // links in ul list
        'prev_text' => '<i class="icon-chevron-left"></i>', // prev text
        'next_text' => '<i class="icon-chevron-right"></i>', // next text
        'total' => $wp_query->max_num_pages, // total amount of pages in pagination list
        'show_all' => false, // do not show all links, otherwise end_size and mid_size will be ignored
        'end_size' => 15, // how many numbers on either the start and the end list edges (12 ... 4 ... 89)
        'mid_size' => 15, // how many numbers to either side of current page, but not including current page (... 123 5 678 ...).
        'add_args' => false, // array of GET parameters to add in href
        'add_fragment' => '',    //string to append to each href in links
        'before_page_number' => '', // string to appear before the page number
        'after_page_number' => '' // string to appear after the page number
    ));
}

function disable_wp_emojicons()
{
    // all actions related to emojis
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');

    // filter to remove TinyMCE emojis
    add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');
}

add_action('init', 'disable_wp_emojicons');

function disable_emojicons_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function doctype_opengraph($output) {
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');

function excerpt($length){
    echo wp_trim_words( get_the_content(), $length, '...' );
}

function title_substr($string, $length){
	if(strlen($string) > $length){
		echo substr($string, 0, $length).'...';
	} else {
		echo $string;
	}
}

function breadcrumb_links( $link_output) {
	if(strpos( $link_output, 'breadcrumb_last' ) !== false ) {
		$link_output = '';
	}
	if(strpos( $link_output, '>Posts<' ) !== false ) {
		$link_output = '';
	}
  return $link_output;
}
add_filter('wpseo_breadcrumb_single_link', 'breadcrumb_links' );

function comp_arrays( $arrayA , $arrayB ) {

    sort( $arrayA );
    sort( $arrayB );

    return $arrayA == $arrayB;
}

add_filter( 'pre_get_posts', function ( $wp_query ) {
	if ( $wp_query->is_main_query() && is_admin() && !isset($_GET['orderby']) && $wp_query->get('post_type') == 'page') {
		$wp_query->set( 'orderby', 'date' );
		$wp_query->set( 'order', 'DESC' );
	}
}, 99 );

// DO NOT ADD YOUR CODE AFTER THIS LINE //

get_template_part('includes/dr-posttypes');
get_template_part('includes/dr-options');
get_template_part('includes/dr-widgets');
get_template_part('includes/dr-taxonomy-cf');
get_template_part('includes/dr-usecases-filter');
get_template_part('includes/dr-course-classes');
get_template_part('includes/dr-form-proxy');
get_template_part('includes/dr-sentry');
get_template_part('includes/dr-stripe');
get_template_part('includes/dr-strings');


include_once __DIR__ . '/includes/webinar/Initialization.php';
include_once __DIR__ . '/includes/webinar/Functions.php';
include_once __DIR__ . '/includes/forms/Functions.php';
