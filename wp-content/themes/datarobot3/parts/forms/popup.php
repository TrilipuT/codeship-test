<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 9/19/17
 * Time: 11:04
 */ ?>
<div class="popup transition new-form-handler" id="form-popup">
	<?php
	$form_title = get_field( 'form_title' );
	$form_type  = get_field( 'form_type' );
	?>
    <div class="form-wrap">
        <div class="popup-close transition">
            <i class="icon-close"></i>
        </div>
        <div class="form-title">
            <h3 class="form-title-target"><?= $form_title ?></h3>
        </div>
        <div class="dr-form contact-form">
			<?php get_template_part( 'parts/forms/form', apply_filters( 'dr/forms/form_type', $form_type ) ) ?>
        </div>
    </div>
</div>
