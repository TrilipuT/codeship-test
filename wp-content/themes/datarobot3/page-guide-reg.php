<?php
/* Template Name: ASTROS invite */
?>
<?php get_header('guide'); ?>
<section class="guide reg">
	<div class="top-block">
		<div class="container">
			<div class="wrap">
				<h1>Learn How To Consistently Hit Data-Driven Decision Home Runs</h1>
			</div>
		</div>
	</div>
	<div class="main-block">
		<div class="container">
			<article class="main-info">
				<div class="b-info clearfix">
					<div class="left_img_text">
						<img src="<?= get_template_directory_uri(); ?>/assets/built/images/vs_image.png" alt="DataRobot's Practical Guide">
						<p class="vs_venue">Minute Maid Park Tuesday, June 21st Game Time - 7:10pm</p>
						<p>Suite opens at 6:00pm and demos are available. Food and beverages will be provided</p>
					</div>
					<div class="right_text">
						<h2>The distance between data and decisions is simply too long. You need answers. Faster.</h2>
						<p>Join us on June 21 st at Minute Maid Park and mingle with your peers. Be able to learn how DataRobot can help you eliminate the obstacles that stand in the way of quick, accurate predictions – and clear the path to data-driven decision home runs.</p>
					</div>
				</div>
				<div class="reg-form">
					<img src="<?= get_template_directory_uri(); ?>/assets/built/images/form_image.png" alt="Sign up for the June 21st event">
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
                                <?php get_template_part( 'parts/forms/fields/input', 'company' ) ?>
                                <label class="dropdown-parent">
                                    <?php get_template_part( 'parts/forms/fields/select', 'title' ) ?>
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
				</div>
			</article>
		</div>
	</div>
</section>
<?php get_footer('guide'); ?>
