<?php $form_name    = Form::get_form_name();
$redirect           = Form::get_redirect_url();
$submit_button_text = Form::get_button_text();
$form_action        = Form::get_form_action();
?>
<iframe name="hiddenframe" id="hiddenframe" frameborder="0"
        style="width:0;height:0;border:0;display:none;"></iframe>
<form method="post" name="<?= $form_name; ?>" target="hiddenframe" id="<?= $form_name; ?>" novalidate
      data-redirect="<?= esc_attr( $redirect ) ?>" data-action="<?= esc_attr( $form_action ) ?>">
    <div class="form-section">
        <div class="form-main">
            <label for="firstName" class="fullrow">
				<?php get_template_part( 'parts/forms/fields/input-firstname', apply_filters( 'dr/forms/fields/firstname', '' ) ) ?>
            </label>
            <label for="lastName" class="fullrow">
				<?php get_template_part( 'parts/forms/fields/input-lastname', apply_filters( 'dr/forms/fields/lastname', '' ) ) ?>
            </label>
            <label for="emailAddress" class="fullrow">
				<?php get_template_part( 'parts/forms/fields/input-email', apply_filters( 'dr/forms/fields/email', '' ) ) ?>
            </label>
            <label for="company" class="fullrow">
				<?php get_template_part( 'parts/forms/fields/input-company', apply_filters( 'dr/forms/fields/company', '' ) ) ?>
            </label>
            <label class="fullrow dropdown-parent">
				<?php get_template_part( 'parts/forms/fields/select-inquiry', apply_filters( 'dr/forms/fields/inquiry', '' ) ) ?>
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
        <button type="submit" class="submit bg-filled-blue button"><?= $submit_button_text ?></button>
    </div>
</form>