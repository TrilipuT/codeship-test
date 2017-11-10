<?php $form_name    = get_field( 'form_name' ) ?: 'Datarobot-main';
$redirect           = get_field( 'redirect_url' ) ?: home_url( '/thank-you' );
$submit_button_text = get_field( 'submit_button_text' ) ?: __( 'Submit', 'datarobot3' );
$form_action        = get_field( 'form_action' ) ?: "submit_all";
?>
<iframe name="hiddenframe" id="hiddenframe" frameborder="0"
        style="width:0;height:0;border:0;display:none;"></iframe>
<form method="post" name="<?= $form_name; ?>" target="hiddenframe" id="<?= $form_name; ?>" novalidate
      data-redirect="<?= esc_attr( $redirect ) ?>" data-action="<?= esc_attr( $form_action ) ?>">
    <div class="form-section">
        <div class="form-main">
            <label for="firstName" class="first">
				<?php get_template_part( 'parts/forms/fields/input', 'firstname' ) ?>
            </label>
            <label for="lastName" class="last">
				<?php get_template_part( 'parts/forms/fields/input', 'lastname' ) ?>
            </label>
            <label for="emailAddress" class="fullrow">
				<?php get_template_part( 'parts/forms/fields/input', 'email' ) ?>
            </label>
            <label for="busPhone" class="fullrow">
				<?php get_template_part( 'parts/forms/fields/input', 'busphone' ) ?>
            </label>
            <label for="company" class="fullrow">
				<?php get_template_part( 'parts/forms/fields/input', 'company' ) ?>
            </label>
            <label class="fullrow dropdown-parent">
				<?php get_template_part( 'parts/forms/fields/select', 'title' ) ?>
            </label>
            <label class="fullrow dropdown-parent">
				<?php get_template_part( 'parts/forms/fields/select', 'country' ) ?>
            </label>
            <label class="fullrow dropdown-parent">
				<?php get_template_part( 'parts/forms/fields/select', 'stateprov' ) ?>
            </label>
        </div>
    </div>

    <div class="form-footer clearfix">
		<?php get_template_part( 'parts/forms/fields/input', 'extra-hidden' ) ?>
        <div class="preloader">
			<?php get_template_part( 'parts/dr-loader' ) ?>
        </div>
        <div id="error-wrap">
            <div id="form-errors" class="shake" role="alert"></div>
        </div>
        <button type="submit" class="submit bg-filled-orange button"><?= $submit_button_text ?></button>
    </div>
</form>