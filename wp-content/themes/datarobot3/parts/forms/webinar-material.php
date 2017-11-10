<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 10/19/17
 * Time: 09:50
 */
$form_title         = get_field( 'form_title' );
$form_name          = get_field( 'form_name' ) ?: 'Datarobot-main';
$form_type          = get_field( 'form_type' );
$submit_button_text = get_field( 'submit_button_text' ) ?: __( 'Submit', 'datarobot3' );
$redirect           = get_field( 'redirect_url' ) ?: home_url( '/thank-you' );
$form_action        = get_field( 'form_action' ) ?: "submit_all";
if ( Webinar::is_recording() ) {
	$redirect = get_permalink() . 'watch/';
}

?>
<div class="dr-form form-material new-form-handler">
    <iframe name="hiddenframe" id="hiddenframe" frameborder="0"
            style="width:0;height:0;border:0;display:none;"></iframe>
    <form method="post" name="<?= $form_name; ?>" id="webinar-form" target="hiddenframe" novalidate
          data-redirect="<?= esc_attr( $redirect ) ?>" data-action="<?= esc_attr( $form_action ) ?>">
		<?php if ( $form_title ): ?>
            <h5 class="form-title"><?= $form_title ?></h5>
		<?php endif; ?>
        <label>
			<?php get_template_part( 'parts/forms/fields/input', 'firstname' ) ?>
            <span><span><?php _e( 'First Name', 'datarobot3' ); ?></span></span>
        </label>
        <label>
			<?php get_template_part( 'parts/forms/fields/input', 'lastname' ) ?>
            <span><span><?php _e( 'Last Name', 'datarobot3' ); ?></span></span>
        </label>
        <label>
			<?php get_template_part( 'parts/forms/fields/input', 'email' ) ?>
            <span><span><?php _e( 'Business email', 'datarobot3' ); ?></span></span>
        </label>
		<?php if ( $form_type == 'full' ): ?>
            <label>
				<?php get_template_part( 'parts/forms/fields/input', 'busphone' ) ?>
                <span><span><?php _e( 'Phone', 'datarobot3' ); ?></span></span>
            </label>
		<?php endif; ?>
        <label>
			<?php get_template_part( 'parts/forms/fields/input', 'company' ) ?>
            <span><span><?php _e( 'Company', 'datarobot3' ); ?></span></span>
        </label>
        <label class="dropdown-parent">
			<?php get_template_part( 'parts/forms/fields/select', 'title' ) ?>
        </label>
		<?php if ( $form_type == 'full' ): ?>
            <label class="dropdown-parent">
				<?php get_template_part( 'parts/forms/fields/select', 'country' ) ?>
            </label>
            <label class="dropdown-parent">
				<?php get_template_part( 'parts/forms/fields/select', 'stateprov' ) ?>
            </label>
		<?php endif; ?>
		<?php get_template_part( 'parts/forms/fields/input', 'extra-hidden' ) ?>
        <div class="preloader">
			<?php get_template_part( 'parts/dr-loader' ) ?>
        </div>
        <div id="error-wrap">
            <div id="form-errors" class="shake" role="alert"></div>
        </div>
        <button type="submit" class="button bg-filled-green"><?= $submit_button_text ?></button>
    </form>
</div>
