<?php
/* Template Name: Test Drive */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="google-site-verification" content="d-L8sQWcqXG9U_ua4yroXJjGnte_X4EQaWOLHQ7aEMU"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo get_stylesheet_directory_uri() . '/assets/built/stylesheets/test-drive.css'; ?>">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:400,300,500|Noto+Sans:400,700">

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

	<?php wp_head(); ?>

	<?php
	$access_code        = get_field( 'ac_required' );
	$benefits_list      = get_field( 'benefits_list' );
	$form_name          = get_field( 'form_name' ) ?: 'Datarobot-main';
	$redirect           = get_field( 'redirect_url' ) ?: home_url( '/thank-you' );
	$submit_button_text = get_field( 'submit_button_text' ) ?: __( 'Submit', 'datarobot3' );
	$form_action        = get_field( 'form_action' ) ?: "submit_all";
	?>

    <script>
        (function (h, o, t, j, a, r) {
            h.hj = h.hj || function () {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {hjid: 295062, hjsv: 5};
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, '//static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>
</head>
<body <?php body_class( 'test-drive' ); ?>>
<div class="wrapper">
    <header>
        <div class="container">
            <div id="logo">
                <a href="/" title="DataRobot Homepage">
                    <img src="<?= get_template_directory_uri(); ?>/assets/built/images/td/td-logo.svg"
                         alt="DataRobot Test Drive">
                </a>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="b-main">
                <div class="row-wrap">
                    <div class="b-left">
                        <h1><?php the_field( 'headline' ); ?></h1>
                        <p><?php the_field( 'description' ); ?></p>
                        <div class="img-wrap">
                            <img src="<?php the_field( 'main_image' ); ?>" alt="DataRobot Test Drive">
                        </div>
                    </div>
                    <div class="b-right">
                        <div class="td-form-wrap dr-form <?php if ( $access_code ) { echo 'ac'; } ?> new-form-handler">
                            <div class="form-header">
                                <p><?php the_field( 'form_title' ); ?></p>
                                <a class="anchor" href="#form-errors" style="display:none;"></a>
                            </div>
                            <iframe name="hiddenframe" id="hiddenframe" frameborder="0" style="width:0;height:0;border:0;display:none;"></iframe>
                            <form method="post" name="<?= $form_name; ?>" id="<?= $form_name; ?>" target="hiddenframe" novalidate data-redirect="<?= esc_attr( $redirect ) ?>" data-action="<?= esc_attr( $form_action ) ?>">
                                <label>
                                    <input type="text" name="firstName" id="firstтame"
                                           class="field text is-empty" maxlength="40"  required data-validate="min_length[2]">
                                    <span><span>First Name</span></span>
                                </label>
                                <label>
                                    <input type="text" name="lastName" id="lastтame"
                                           class="field text is-empty" maxlength="40"  required data-validate="min_length[2]">
                                    <span><span>Last Name</span></span>
                                </label>
                                <label>
                                    <input type="text" name="emailAddress" id="emailфddress"
                                           class="field text is-empty" maxlength="60"  required data-validate="valid_email|callback_valid_business_email">
                                    <span><span>Business email</span></span>
                                </label>
                                <label>
                                    <input type="text" name="busPhone" id="busзhone"
                                           class="field text is-empty" maxlength="20" placeholder="(123) 456-7890" required data-validate="min_length[5]">
                                    <span><span>Business phone</span></span>
                                </label>
                                <label>
                                    <input type="text" name="company" id="company"  class="field text is-empty"
                                           maxlength="60"  autocomplete="off" required data-validate="min_length[2]">
                                    <span><span>Company</span></span>
                                </label>
                                <label class="dropdown-parent">
	                                <?php get_template_part( 'parts/forms/fields/select', 'title' ) ?>
                                </label>
                                <label class="dropdown-parent">
	                                <?php get_template_part( 'parts/forms/fields/select', 'country' ) ?>
                                </label>
                                <label class="dropdown-parent">
	                                <?php get_template_part( 'parts/forms/fields/select', 'stateprov' ) ?>
                                </label>

								<?php if ( $access_code ) { ?>
                                    <label>
                                        <input type="text" name="accessCode" id="accessCode"
                                               class="field text is-empty" maxlength="40" autocomplete="off">
                                        <span><span>Access Code</span></span>
                                    </label>
								<?php } ?>

                                <label class="checkbox">
                                    <input type="checkbox" name="agreementAccepted" id="agreementAccepted" value="1" required>
                                    <span>I agree to the <a href=<?php echo file_get_contents('academic-tos.txt', true); ?>" target="_blank">DataRobot Test Drive Terms of Service</a></span>
                                </label>

	                            <?php get_template_part( 'parts/forms/fields/input', 'extra-hidden' ) ?>
                                <div class="preloader">
		                            <?php get_template_part( 'parts/dr-loader' ) ?>
                                </div>
                                <div id="error-wrap">
                                    <div id="form-errors" class="shake" role="alert"></div>
                                </div>
                                <button type="submit" class="button bg-filled-green" disabled><?= $submit_button_text ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php if ( $benefits_list ) { ?>
            <div class="b-conditions">
                <div class="container">
                    <div class="row-wrap">
						<?php foreach ( $benefits_list as $item ) { ?>
                            <div class="item">
                                <div class="img-wrap">
                                    <i class="icon-check"></i>
                                </div>
                                <p><?php echo $item['benefit']; ?></p>
                            </div>
						<?php } ?>
                    </div>
                </div>
            </div>
		<?php } ?>
    </section>

    <footer>
        <div class="container">
            <div class="row-wrap">
                <div class="copyright">
                    <img src="<?= get_template_directory_uri(); ?>/assets/built/images/td/logo-sm.png" alt="DataRobot">
                    <span>DataRobot, Inc. © 2012</span>
                </div>
                <div class="bpf">
                    Better predictions. Faster.
                </div>
            </div>
        </div>
    </footer>

	<?php wp_footer(); ?>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.scroll-to').on('click', function (e) {
                e.preventDefault();
                var scrollTarget = $('.dr-form').offset().top - 10;
                $('body,html').animate({
                        scrollTop: scrollTarget,
                    }, 300
                );
            });
        });
    </script>

</div>

<?php get_template_part( 'end' ); ?>
