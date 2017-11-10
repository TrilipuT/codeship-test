<?php
/* Template Name: ZG LP */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="google-site-verification" content="d-L8sQWcqXG9U_ua4yroXJjGnte_X4EQaWOLHQ7aEMU"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo get_stylesheet_directory_uri() . '/assets/built/stylesheets/zg-lp.css'; ?>">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:400,300,500|Noto+Sans:400,700">

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

	<?php wp_head(); ?>
    <script type="text/javascript">
        var _elqQ = _elqQ || [];
        _elqQ.push(['elqSetSiteId', '2142644770']);
        _elqQ.push(['elqTrackPageView']);

        (function () {
            function async_load() {
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.src = '//img04.en25.com/i/elqCfg.min.js';
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(s, x);
            }

            if (window.addEventListener) window.addEventListener('DOMContentLoaded', async_load, false);
            else if (window.attachEvent) window.attachEvent('onload', async_load);
        })();
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window,
            document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');

        fbq('init', '257592791258402');
        fbq('track', "PageView");
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=257592791258402&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
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
<body <?php body_class(); ?>>
<div class="wrapper">
    <header class="fixed">
        <div class="container">
            <div id="logo">
                <a href="/" title="DataRobot Homepage">
                    <img src="<?= get_template_directory_uri(); ?>/assets/built/images/logo.svg" alt="DataRobot">
                </a>
            </div>
			<?php if ( get_field( 'navigation' ) ) { ?>
                <div class="menu-extra mobile">
                    <a href="/careers/"
                       class="menu-extra-link careers"><?php _e( 'We\'re hiring!', 'datarobot3' ); ?></a>
                    <a href="/contact-us/"
                       class="bg-filled-orange button menu-extra-button contact-sales"><?php _e( 'Contact Us', 'datarobot3' ); ?></a>
                </div>
                <div class="nav-toggle"><i class="icon-menu"></i></div>
                <div id="main-nav">
					<?php $args = array(
						'theme_location' => 'top',
						'container'      => 'nav',
						'menu_class'     => 'menu clearfix',
						'menu_id'        => 'top-nav',
					);
					wp_nav_menu( $args );
					?>
                    <div class="menu-extra">
                        <a href="/contact-us/"
                           class="bg-filled-orange button menu-extra-button contact-sales"><?php _e( 'Contact Us', 'datarobot3' ); ?></a>
                    </div>
                </div>
			<?php } else { ?>
                <div class="bpf">
                    Better predictions. Faster.
                </div>
			<?php } ?>
        </div>
    </header>

	<?php
	$topBanner = get_field( 'top_banner' );
	$features  = get_field( 'features' );
	?>

    <section class="zg persona" id="<?php strToLowRep( get_the_title() ); ?>">
        <div class="top-banner">
            <div class="container clearfix">
				<?php if ( $topBanner == "form" ) { ?>
                    <div class="b-left">
                        <h1><?php the_field( 'banner_title' ); ?></h1>
                        <p><?php the_field( 'banner_text' ); ?></p>
						<?php if ( get_field( 'uc-link' ) ) { ?>
                            <div class="uc-link transition">
                                <i class="icon-circle-right"></i>
                                <a href="<?php the_field( 'uc-link' ); ?>" class="button">See use cases</a>
                            </div>
						<?php } ?>
                    </div>
                    <div class="b-right">
                        <div class="dr-form contact-form form-orange new-form-handler">
	                        <?php get_template_part( 'parts/forms/form' ) ?>
                        </div>
                    </div>
				<?php } else { ?>
                    <div class="single-col">
                        <h1><?php the_field( 'banner_title' ); ?></h1>
                        <p><?php the_field( 'banner_text' ); ?></p>
                        <a href="#" class="open-popup bg-filled-blue button"><?php _e('Request a demo','datarobot3') ?></a>
						<?php if ( get_field( 'uc-link' ) ) { ?>
                            <div class="uc-link transition">
                                <i class="icon-circle-right"></i>
                                <a href="<?php the_field( 'uc-link' ); ?>" class="button">See use cases</a>
                            </div>
						<?php } ?>
                    </div>
				<?php } ?>
            </div>

			<?php if ( $features ) {
				$count = count( $features ); ?>
                <div class="anchors default">
                    <div class="container">
                        <ul class="items<?php echo $count; ?> clearfix">
							<?php foreach ( $features as $item ) { ?>
                                <li>
                                    <a href="#<?php strToLowRep( $item['anchor_title'] ); ?>"
                                       class="transition"><?php echo $item['anchor_title']; ?></a>
                                </li>
							<?php } ?>
                        </ul>
                    </div>
                </div>
			<?php } ?>

        </div>

        <div class="page-content">
            <div class="container">
				<?php if ( get_the_content() ) {
					echo '<div class="excerpt">';
					the_content();
					echo '</div>';
				} ?>
                <div class="b-features">
					<?php if ( $features ) {
						if ( is_handheld() ) {
							foreach ( $features as $index => $feature ) { ?>
                                <article id="<?php strToLowRep( $feature['anchor_title'] ); ?>"
                                         class="feature left-image clearfix">
                                    <div class="b-left">
                                        <img src="<?php echo $feature['feature_image']; ?>"
                                             alt="<?php echo $feature['feature_title']; ?>">
                                    </div>
                                    <div class="b-right">
                                        <h2><?php echo $feature['feature_title']; ?></h2>
										<?php echo $feature['feature_description']; ?>
                                    </div>
                                </article>
							<?php }
						} else {
							foreach ( $features as $index => $feature ) { ?>
								<?php if ( $index % 2 == 0 ) { ?>
                                    <article id="<?php strToLowRep( $feature['anchor_title'] ); ?>"
                                             class="feature right-image clearfix">
                                        <div class="b-left">
                                            <h2><?php echo $feature['feature_title']; ?></h2>
											<?php echo $feature['feature_description']; ?>
                                        </div>
                                        <div class="b-right">
                                            <img src="<?php echo $feature['feature_image']; ?>"
                                                 alt="<?php echo $feature['feature_title']; ?>">
                                        </div>
                                    </article>
								<?php } else { ?>
                                    <article id="<?php strToLowRep( $feature['anchor_title'] ); ?>"
                                             class="feature left-image clearfix">
                                        <div class="b-left">
                                            <img src="<?php echo $feature['feature_image']; ?>"
                                                 alt="<?php echo $feature['feature_title']; ?>">
                                        </div>
                                        <div class="b-right">
                                            <h2><?php echo $feature['feature_title']; ?></h2>
											<?php echo $feature['feature_description']; ?>
                                        </div>
                                    </article>
								<?php }
							}
						}
					} ?>
                </div>
            </div>
        </div>
        <div class="get-in-touch">
            <div class="container">
                <div class="button-wrap">
                    <p>Want to use DataRobot for your project?</p>
                    <a href="#" class="open-popup bg-filled-white button"><?php _e( 'Request a demo' , 'datarobot3' ) ?></a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('.anchors a').on('click', function (e) {
                    e.preventDefault();

                    $('.anchors a').each(function () {
                        $(this).removeClass('active');
                    });
                    $(this).addClass('active');

                    var target = this.hash,
                        topPadding = 135;
                    if ($('#header-message').is(':visible')) {
                        topPadding += 60;
                    }
                    var $target = $(target);
                    $('html, body').stop().animate({
                        'scrollTop': $target.offset().top - topPadding
                    }, 500, 'swing', function () {
                        window.location.hash = target;
                    });
                });
            });
        </script>
    </section>
	<?php get_footer(); ?>
	<?php if ( $topBanner == "form" ) { ?>

	<?php } else {
	    get_template_part('parts/forms/popup');
    } ?>
	<?php get_template_part( 'end' ); ?>
