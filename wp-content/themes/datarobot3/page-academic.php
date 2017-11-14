<?php
/* Template Name: DR Academic */

get_header('guide');
$image = get_field('benefits_image');
?>
<section class="landing" style="color: rgb(255, 255, 255);">
    <div class="container">
        <div class="lp-left">
            <div class="e-upper">
                <h1><?php the_field('headline'); ?></h1>
                <p><?php the_field('description'); ?></p>
            </div>
            <div class="e-mobile-button">
                <a href="#" class="scroll-to bg-filled-orange button"><?php the_field('form_button_text'); ?></a>
            </div>
            <div class="e-bottom image">
                <div class="media">
                    <img src="<?php echo $image["url"]; ?>" width="<?php echo($image["width"] / 2); ?>" alt="Why DataRobot?">
                </div>
                <div class="details">
                    <h3><?php the_field('benefits_headline'); ?></h3>
                    <ul>
                        <?php while (have_rows('benefits_list')): the_row(); ?>
                            <li><?php the_sub_field('benefit'); ?></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="lp-right">
            <div class="b-form">
                <div class="dr-form form-orange new-form-handler">
	                <?php $form_name    = Form::get_form_name();
	                $redirect           = Form::get_redirect_url();
	                $submit_button_text = Form::get_button_text();
	                $form_action        = Form::get_form_action();
	                ?>
                    <iframe name="hiddenframe" id="hiddenframe" frameborder="0"
                            style="width:0;height:0;border:0;display:none;"></iframe>
                    <form method="post" name="<?= $form_name; ?>" target="hiddenframe" id="<?= $form_name; ?>" novalidate
                          data-redirect="<?= esc_attr( $redirect ) ?>" data-action="<?= esc_attr( $form_action ) ?>">
                        <?php get_template_part( 'parts/forms/fields/input', 'firstname' ) ?>
                        <?php get_template_part( 'parts/forms/fields/input', 'lastname' ) ?>
                        <?php get_template_part( 'parts/forms/fields/input', 'company' ) ?>
                        <?php get_template_part( 'parts/forms/fields/input', 'email' ) ?>
                        <input type="text" name="accessCode" id="accessCode" value="" class="text" maxlength="40" placeholder="Access Code" required data-validation="alpha_numeric">

                        <label class="checkbox">
                            <input type="checkbox" name="agreementAccepted" id="agreementAccepted" value="1" required>
                            <span>I agree to the <a href="<?php echo file_get_contents('academic-tos.txt', true); ?>" target="_blank">DataRobot Academic Terms of Service</a></span>
                        </label>
                        <?php get_template_part( 'parts/forms/fields/input', 'extra-hidden' ) ?>
                        <div class="preloader">
                            <?php get_template_part( 'parts/dr-loader' ) ?>
                        </div>
                        <div id="error-wrap">
                            <div id="form-errors" class="shake" role="alert"></div>
                        </div>
                        <button type="submit" class="submit bg-filled-orange button" disabled><?= $submit_button_text ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$pixel = get_field('tracking_code');
$utm_param = get_field('utm_parameters');
if ($pixel) {
  if ($utm_param) {
    foreach ($utm_param as $item) {
      $utm_param_assoc[$item['param']] = $item['value'];
    }
    if (comp_arrays($utm_param_assoc, $_GET)) {
      echo $pixel;
    }
  } else {
    echo $pixel;
  }
}
get_footer();
get_template_part('end');
