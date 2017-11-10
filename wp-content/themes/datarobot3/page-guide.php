<?php
/* Template Name: Practical Guide */
?>
<?php get_header('guide'); ?>
<section class="guide">
	<div class="top-block">
		<div class="container">
			<div class="wrap">
				<h1>Better Predictions. Faster.</h1>
				<p>A Practical Guide to Automated Machine Learning.</p>
			</div>
		</div>
	</div>
	<div class="main-block">
		<div class="container">
			<article class="guide-info">
				<div class="b-info clearfix">
					<img src="<?= get_template_directory_uri(); ?>/assets/built/images/leaflet_icon_2.png" alt="DataRobot's Practical Guide">
					<p>In this white paper you will learn:</p>
					<ul>
						<li>
							<span><img src="<?= get_template_directory_uri(); ?>/assets/built/images/oval-blue.png" alt='list'></span>
							The historical significance of automated machine learning

						</li>
						<li>
							<span><img src="<?= get_template_directory_uri(); ?>/assets/built/images/oval-blue.png" alt='list'></span>
							What defines a modern automated machine learning platform
						</li>
						<li>
							<span><img src="<?= get_template_directory_uri(); ?>/assets/built/images/oval-blue.png" alt='list'></span>
							How an automation platform drives competitive advantage for your business
						</li>
					</ul>
				</div>
				<div class="b-form">
					<div class="dr-form form-blue new-form-handler">
						<?php $form_name    = get_field( 'form_name' ) ?: 'Datarobot-main';
						$redirect           = get_field( 'redirect_url' ) ?: home_url( '/thank-you' );
						$submit_button_text = get_field( 'submit_button_text' ) ?: __( 'Submit', 'datarobot3' );
						$form_action        = get_field( 'form_action' ) ?: "submit_all";
						?>
                        <iframe name="hiddenframe" id="hiddenframe" frameborder="0"
                                style="width:0;height:0;border:0;display:none;"></iframe>
                        <form method="post" name="<?= $form_name; ?>" target="hiddenframe" id="<?= $form_name; ?>"
                              novalidate data-redirect="<?= esc_attr( $redirect ) ?>" data-action="<?= esc_attr( $form_action ) ?>">
							<?php get_template_part( 'parts/forms/fields/input', 'firstname' ) ?>
							<?php get_template_part( 'parts/forms/fields/input', 'lastname' ) ?>
							<?php get_template_part( 'parts/forms/fields/input', 'email' ) ?>
							<?php get_template_part( 'parts/forms/fields/input', 'busphone' ); ?>
                            <label class="dropdown-parent">
								<?php get_template_part( 'parts/forms/fields/select', 'industry' ) ?>
                            </label>
							<?php get_template_part( 'parts/forms/fields/input', 'company' ) ?>
                            <label class="dropdown-parent">
								<?php get_template_part( 'parts/forms/fields/select', 'title' ) ?>
                            </label>
                            <label class="dropdown-parent">
								<?php get_template_part( 'parts/forms/fields/select', 'country' ) ?>
                            </label><label class="dropdown-parent">
								<?php get_template_part( 'parts/forms/fields/select', 'stateprov' ) ?>
                            </label>
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
				<div class="guide-cta">
					Start your business transformation today!
				</div>
			</article>
		</div>
	</div>
</section>
<?php get_footer('guide'); ?>
