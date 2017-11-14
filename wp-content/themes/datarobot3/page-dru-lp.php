<?php
/* Template Name: DRU LP */
?>

<?php get_header('guide'); ?>

<section class="dru">
	<div class="top-block">
		<div class="container">
			<div class="wrap">
				<h1><?php the_field('banner_title'); ?></h1>
				<p><?php the_field('banner_text'); ?></p>
			</div>
		</div>
	</div>
	<div class="main-block">
		<div class="container">
			<article class="lp-info">
				<div class="b-info clearfix">
					<div class="event-details">
						<h2>Event Details</h2>
						<p><?php the_field('event_details'); ?></p>
					</div>
					<div class="main-content">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="b-form">
					<div class="dr-form form-blue new-form-handler">
						<?php $form_name    = Form::get_form_name();
						$redirect           = Form::get_redirect_url();
						$submit_button_text = Form::get_button_text();
						$form_action        = Form::get_form_action();
						?>
                        <iframe name="hiddenframe" id="hiddenframe" frameborder="0"
                                style="width:0;height:0;border:0;display:none;"></iframe>
                        <form method="post" name="<?= $form_name; ?>" target="hiddenframe" id="<?= $form_name; ?>"
                              novalidate data-redirect="<?= esc_attr( $redirect ) ?>" data-action="<?= esc_attr( $form_action ) ?>">
							<?php get_template_part( 'parts/forms/fields/input', apply_filters( 'dr/forms/fields/firstname', 'firstname' ) ) ?>
							<?php get_template_part( 'parts/forms/fields/input', apply_filters( 'dr/forms/fields/lastname', 'lastname' ) ) ?>
							<?php get_template_part( 'parts/forms/fields/input', apply_filters( 'dr/forms/fields/email', 'email' ) ) ?>
							<?php if ( get_field( 'phone_number' ) ) {
								get_template_part( 'parts/forms/fields/input', apply_filters( 'dr/forms/fields/busphone', 'busphone' ) );
							}
							?>
							<?php get_template_part( 'parts/forms/fields/input', apply_filters( 'dr/forms/fields/company', 'company' ) ) ?>
                            <input type="text" name="title" id="title" value="" class="text" maxlength="40"
                                   placeholder="Title">

                            <div class="form-footer clearfix">
								<?php get_template_part( 'parts/forms/fields/input', 'extra-hidden' ) ?>
                                <div class="preloader">
									<?php get_template_part( 'parts/dr-loader' ) ?>
                                </div>
                                <div id="error-wrap">
                                    <div id="form-errors" class="shake" role="alert"></div>
                                </div>
                                <button type="submit"
                                        class="submit bg-filled-blue button"><?= $submit_button_text ?></button>
                            </div>
                        </form>
					</div>
				</div>
			</article>
		</div>
	</div>
</section>
<?php get_footer('guide'); ?>
