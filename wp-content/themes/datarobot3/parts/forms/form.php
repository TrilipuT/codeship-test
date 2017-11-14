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
            <label for="firstName" class="first">
				<?php get_template_part( 'parts/forms/fields/input', apply_filters( 'dr/forms/fields/firstname', 'firstname' ) ) ?>
            </label>
            <label for="lastName" class="last">
				<?php get_template_part( 'parts/forms/fields/input', apply_filters( 'dr/forms/fields/lastname', 'lastname' ) ) ?>
            </label>
            <label for="emailAddress" class="first">
				<?php get_template_part( 'parts/forms/fields/input', apply_filters( 'dr/forms/fields/email', 'email' ) ) ?>
            </label>
            <label for="busPhone" class="last">
				<?php get_template_part( 'parts/forms/fields/input', apply_filters( 'dr/forms/fields/busphone', 'busphone' ) ) ?>
            </label>
            <label for="company" class="first">
				<?php get_template_part( 'parts/forms/fields/input', apply_filters( 'dr/forms/fields/company', 'company' ) ) ?>
            </label>
            <label class="last dropdown-parent">
				<?php get_template_part( 'parts/forms/fields/select', apply_filters( 'dr/forms/fields/title', 'title' ) ) ?>
            </label>
            <label class="first dropdown-parent">
				<?php get_template_part( 'parts/forms/fields/select', apply_filters( 'dr/forms/fields/country', 'country' ) ) ?>
            </label>
            <label class="last dropdown-parent">
				<?php get_template_part( 'parts/forms/fields/select', apply_filters( 'dr/forms/fields/stateprov', 'stateprov' ) ) ?>
            </label>
            <label class="fullrow dropdown-parent">
				<?php get_template_part( 'parts/forms/fields/select', apply_filters( 'dr/forms/fields/inquiry', 'inquiry' ) ) ?>
            </label>
            <label class="fullrow">
				<?php get_template_part( 'parts/forms/fields/input', apply_filters( 'dr/forms/fields/customersinterest', 'customersinterest' ) ) ?>
            </label>
        </div>
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