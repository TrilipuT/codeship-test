<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 10/11/17
 * Time: 12:10
 */

class Webinar {
	const POST_TYPE = 'webinar';

	/**
	 * @return \WP_Query
	 */
	public static function get_upcomings() {
		return new \WP_Query( [
			'post_type'  => self::POST_TYPE,
			'meta_query' => [
				[
					'key'     => 'webinar_date',
					'value'   => self::get_current_datetime(),
					'compare' => '>=',
					'type'    => 'DATETIME',
				]
			],
			'orderby'    => 'meta_value',
			'order'      => 'ASC',
		] );
	}

	/**
	 * @param string $format
	 *
	 * @return string
	 */
	private static function get_current_datetime( $format = 'Y-m-d H:i:s' ) {
		return ( new \DateTime( 'America/New_York' ) )->format( $format );
	}

	/**
	 * @return bool
	 */
	public static function is_recording() {
		return (get_field( 'webinar_date' ) < self::get_current_datetime( 'U' )) && get_field( 'webinar_video' );
	}

	/**
	 * @return string
	 */
	public static function get_link() {
		if ( self::is_external_webinar() && $link = get_field( 'link_to_external_webinar' ) ) {
			return $link;
		}

		return get_permalink();
	}

	/**
	 * @return bool
	 */
	public static function is_external_webinar() {
		return get_field( 'is_external_webinar' );
	}

	/**
	 * Build add to google cal link with params of webinar
	 * @return string
	 */
	public static function get_add_to_calendar_link() {
		$args = [
			'action'   => 'TEMPLATE',
			'text'     => str_replace( ' ', '+', get_the_title() ),
			'dates'    => self::get_date( 'Ymd\\THi00' ) . '/' . self::get_date( 'Ymd\\THi00', false, '+45 minutes' ),
			'ctz'      => 'America/New_York',
			'details'  => str_replace( ' ', '+', self::get_excerpt( 200 ) ) . '+++Visit+' . get_permalink() . '+for+more+information.',
			'location' => 'online',
			'trp'      => 'false',
			'sprop'    => 'name:'
		];


		return 'http://www.google.com/calendar/event?' . build_query( $args );

	}

	/**
	 * @param string $format
	 * @param bool $utc
	 * @param string $offset Time modification. @see strtotime() to make modification.
	 *
	 * @return string
	 */
	public static function get_date( $format = 'U', $utc = false, $offset = '' ) {
		$date_time = get_field( 'webinar_date' );
		if(!$date_time){
			return '';
		}
		if ( $offset ) {
			$date_time = strtotime( $offset, $date_time );
		}
		if ( $utc ) {
			// add 4 hours to convert ET to UTC format
			$date_time += 4 * HOUR_IN_SECONDS;
		}
		if ( $format == 'U' ) {
			return $date_time;
		}

		return date_i18n( $format, $date_time );
	}

	/**
	 * @param int $num_words
	 *
	 * @return string
	 */
	public static function get_excerpt( $num_words = 22 ) {
		if ( has_excerpt() ) {
			$text = get_the_excerpt();
		} else {
			$text = get_field( 'description' );
		}

		return wp_trim_words( $text, $num_words );
	}

}
