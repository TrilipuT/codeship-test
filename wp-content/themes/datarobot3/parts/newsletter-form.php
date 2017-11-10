<?php
$form_name = 'Newsletter';
?>
<div class="newsletter-block">
    <div class="container">
        <div class="newsletter-wrap">
            <div class="image-wrap">
                <img src="<?= get_template_directory_uri(); ?>/assets/built/images/newsletter-img.png"
                     alt="Newsletter Subscription" class="full-image">
                <img src="<?= get_template_directory_uri(); ?>/assets/built/images/newsletter-img-medium.png"
                     alt="Newsletter Subscription" class="medium-image">
            </div>
            <div class="n-form-wrap">
                <div class="n-form-inner-wrap">
                    <span><?php _e( 'Doing Data Science?', 'datarobot3' ) ?></span>
                    <p><?php _e( 'Get our regular data science news, insights, tutorials and more!', 'datarobot3' ) ?></p>
                    <div class="dr-form newsletter-form new-form-handler">
                        <form method="post" name="<?= $form_name; ?>" target="hiddenframe" id="<?= $form_name; ?>"
                              novalidate data-handler="newsletterSend">
                            <label for="firstName" class="first">
								<?php get_template_part( 'parts/forms/fields/input', 'firstname' ) ?>
                            </label>
                            <label for="lastName" class="last">
								<?php get_template_part( 'parts/forms/fields/input', 'lastname' ) ?>
                            </label>
							<?php get_template_part( 'parts/forms/fields/input', 'company' ) ?>
							<?php get_template_part( 'parts/forms/fields/input', 'email' ) ?>
                            <input type="hidden" name="submittedOnUrl" id="submittedOnUrl" value="">
                            <input type="hidden" name="formName" value="<?php echo $form_name; ?>">
                            <input type="hidden" name="elqFormName" value="<?php echo $form_name; ?>">
                            <input type="hidden" name="elqSiteID" value="2142644770">
                            <input type="hidden" name="elqCustomerGUID" value="">
                            <button type="submit" class="submit bg-filled-blue button">
                                <span>
                                    <i class="icon-email"></i>
	                                <?php _e( 'Subscribe', 'datarobot3' ); ?>
                                </span>
                            </button>
                        </form>

                        <script type='text/javascript'>
                            function newsletterSend() {
                                jQuery('.n-form-inner-wrap').hide();
                                jQuery('.n-success-wrap').show();

                                var formData = jQuery('.dr-form form').serialize();
                                jQuery.post({
                                    url: 'https://s2142644770.t.eloqua.com/e/f2',
                                    data: formData,
                                    encode: true
                                })
                                    .done(function (message) {
                                        jQuery('.n-message-wrap').html('<span class="success"><?php _e( 'You’ve just successfully subscribed', 'datarobot3' ) ?></span><p><?php _e( 'Thanks! Check your inbox to confirm your subscription.', 'datarobot3' ) ?></p>');
                                        var d = new Date();
                                        d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
                                        var expires = "expires=" + d.toUTCString();
                                        document.cookie = "newsletter-subscribed=" + "true" + "; " + expires + "; path=/";
                                    })
                                    .fail(function (message) {
                                        jQuery('.n-message-wrap').html('<span class="error">Submission failed</span><p>Please try again or contact us at <a href="mailto:info@datarobot.com" target="_top">info@datarobot.com</a></p>');
                                    })
                                    .error(function (message) {
                                        jQuery('.n-message-wrap').html('<span class="error">Submission error happened</span><p>Please try again or contact us at <a href="mailto:info@datarobot.com" target="_top">info@datarobot.com</a></p>');
                                    });
                            }
                        </script>
                    </div>
                </div>
                <div class="n-success-wrap">
                    <div class="n-message-wrap">
                        <div class="preloader">
							<?php get_template_part( 'parts/dr-loader' ) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
