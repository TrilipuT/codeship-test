<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 11/10/17
 * Time: 15:02
 */

class Form {
	/**
	 * @return string
	 */
	public static function get_form_name() {
		return get_field( 'form_name' ) ?: 'Datarobot-main';
	}

	/**
	 * @return int
	 */
	public static function get_eloqua_campaign_id() {
		return get_field( 'eloqua_campaign_id' ) ?: ( isset( $_GET['elqCampaignId'] ) ? (int) $_GET['elqCampaignId'] : 0 );
	}

	/**
	 * @return string
	 */
	public static function get_redirect_url() {
		return get_field( 'redirect_url' ) ?: get_permalink( pll_get_post( get_page_by_path( '/thank-you' )->ID ) );
	}

	/**
	 * @return string
	 */
	public static function get_button_text() {
		return get_field( 'submit_button_text' ) ?: __( 'Submit', 'datarobot3' );
	}

	/**
	 * @return string
	 */
	public static function get_form_action() {
		return get_field( 'form_action' ) ?: "submit_all";
	}
}