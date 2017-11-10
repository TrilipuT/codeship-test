<?php
/* Template Name: AI experience */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="google-site-verification" content="d-L8sQWcqXG9U_ua4yroXJjGnte_X4EQaWOLHQ7aEMU" />
	<link rel="stylesheet" type="text/css" href="<?= get_stylesheet_directory_uri() . '/assets/built/stylesheets/dr-ai-exp.css'; ?>">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300,500|Noto+Sans:400,700">
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
                var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
                s.src = '//img04.en25.com/i/elqCfg.min.js';
                var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
            }
            if (window.addEventListener) window.addEventListener('DOMContentLoaded', async_load, false);
            else if (window.attachEvent) window.attachEvent('onload', async_load);
        })();
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-K3WW4HZ');</script>
    <!-- End Google Tag Manager -->
    <!-- start Omniconvert.com code -->
    <link rel="dns-prefetch" href="//app.omniconvert.com"/>
    <script type="text/javascript" src="//cdn.omniconvert.com/js/v989b40.js"></script>
    <!-- end Omniconvert.com code -->
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','https://connect.facebook.net/en_US/fbevents.js');

        fbq('init', '257592791258402');
        fbq('track', "PageView");
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=257592791258402&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
	<script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:295062,hjsv:5};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
</head>

<?php
if (get_field('form_name')) {
	$form_name = get_field('form_name');
} else {
	$form_name = 'Datarobot-main';
}
if (get_field('redirect_url')) {
	$redirect = get_field('redirect_url');
} else {
	$redirect = '/thank-you';
}
?>

<body <?php body_class('ai-exp'); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3WW4HZ"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="wrapper">
	<header>
		<div class="container">
			<div class="row-wrap">
				<div id="logo">
					<a href="<?php if (function_exists('pll_home_url')) { echo pll_home_url(); } else { echo '/'; } ?>" title="DataRobot Homepage">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/built/images/ai-exp/dr-ai-exp-logo.svg" alt="DataRobot AI Experience">
					</a>
				</div>
				<div class="date-place">
					<div class="date">
						<div>
							<i class="icon-calendar"></i>
							<span><?php _e('November 9th, 2017', 'datarobot3'); ?></span>
						</div>
                        <?php the_field('atc_details'); ?>
					</div>
					<div class="place">
						<div>
							<i class="icon-map-marker"></i>
							<span><?php _e('Toranomon Hills, Tokyo, Jp', 'datarobot3'); ?></span>
						</div>
						<a href="<?php the_field('map_link'); ?>" class="button" target="_blank" title="<?php esc_attr_e('See on a map', 'datarobot3'); ?>"><?php _e('See on a map', 'datarobot3'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section>
		<div class="top-wrapper" data-img-big="url(<?php the_field('banner_image_big'); ?>)" data-img-medium="url(<?php the_field('banner_image_medium'); ?>)" style="background-image: url(<?php the_field('banner_image'); ?>);">
			<div class="top-banner">
				<div class="container">
					<div class="b-left">
						<h1><?php the_field('banner_title'); ?></h1>
						<p><?php the_field('banner_text'); ?></p>
					</div>
					<div class="b-bottom">
                        <div class="date-place">
                            <div class="date">
                                <div>
                                    <i class="icon-calendar"></i>
                                    <span>November 9th, 2017</span>
                                </div>
	                            <?php the_field('atc_details'); ?>
                            </div>
                            <div class="place">
                                <div>
                                    <i class="icon-map-marker"></i>
                                    <span>Toranomon Hills, Tokyo, Jp</span>
                                </div>
                                <a href="<?php the_field('map_link'); ?>" class="button" target="_blank" title="<?php _e('See on a map', 'datarobot3'); ?>"><?php _e('See on a map', 'datarobot3'); ?></a>
                            </div>
                        </div>
						<div class="watch-v transition">
							<?php the_field('banner_video'); ?>
						</div>
						<a href="#" class="scroll-to bg-filled-blue button"><?php _e(get_field('submit_button_text'), 'datarobot3'); ?></a>
					</div>
                    <div class="clock-wrap">
                        <div id="countdown"></div>
                    </div>
				</div>
			</div>

		</div>

		<div class="b-main">

			<div class="anchors default">
				<div class="container">
					<ul class="items-4">
						<li>
							<a href="#block_1" class="transition"><?php _e('Keynote speakers', 'datarobot3'); ?></a>
						</li>
						<li>
							<a href="#block_2" class="transition"><?php _e('Conference agenda', 'datarobot3'); ?></a>
						</li>
                        <?php if(get_field('faq_on')){ ?>
                            <li>
                                <a href="#block_3" class="transition"><?php _e('Frequent questions', 'datarobot3'); ?></a>
                            </li>
                        <?php } ?>
						<li>
							<a href="#block_4" class="transition"><?php _e('Register', 'datarobot3'); ?></a>
						</li>
					</ul>
				</div>
			</div>

			<div class="top-slider">
				<div class="container">
					<div class="slider-wrap">
						<div id="anim-slider">
                            <?php foreach(get_field('slides') as $slide){ ?>
                                <div class="item">
                                    <div class="e-wrap">
                                        <p><?php echo $slide['text']; ?></p>
                                        <div class="img-wrap">
                                            <?php echo $slide['svg_icon']; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
						</div>
					</div>
					<div class="controls">
						<div class="bullets"></div>
					</div>

					<script type="text/javascript">
                        jQuery(document).ready(function($) {
                            var draw_settings = {
                                duration: 600,
                                stagger: 30
                            };

                            var svg_icons = jQuery('#anim-slider svg');

                            function svg_draw_init() {
                                if ($.fn.drawsvg) {
                                    svg_icons.each(function () {
                                        jQuery(this).drawsvg(draw_settings);
                                    });
                                }
                            }

                            function svg_draw(el) {
                                el.css('visibility', 'visible');
                                if ($.fn.drawsvg) {
                                    el.drawsvg('animate');
                                }
                            }

                            function extend_parameters(obj, src) {
                                for (var key in src) {
                                    if (src.hasOwnProperty(key)) obj[key] = src[key];
                                }
                                return obj;
                            }

                            var resizeTimer;
                            var slSize = {};
                            var slParams = {};

                            var sl_basic = {
                                mode: 'fade',
                                speed: 300,
                                slideWidth: 615,
                                auto: true,
                                pause: 4000,
                                autoHover: true,
                                autoDelay: 1000,
                                pagerSelector: '.bullets',
                                prevSelector: '.slider-wrap',
                                nextSelector: '.slider-wrap',
                                prevText: '<i class=\"icon-slider-prev\"></i>',
                                nextText: '<i class=\"icon-slider-next\"></i>',
                                minSlides: 1,
                                maxSlides: 1,
                                moveSlides: 1,
                                onSliderLoad: function (index) {
                                    svg_draw_init();
                                    var icon = svg_icons.eq(index);
                                    setTimeout(function () {
                                        svg_draw(icon);
                                    }, 1000);
                                },
                                onSlideBefore: function (el, oi, ni) {
                                    var icon = svg_icons.eq(ni);
                                    setTimeout(function () {
                                        svg_draw(icon);
                                    }, 300);
                                    svg_icons.eq(oi).css('visibility', 'hidden');
                                },
                            };
                            sl_l = {
                                slideWidth: 615,
                            };
                            sl_m = {
                                slideWidth: 475,
                            };
                            sl_s = {
                                slideWidth: 720,
                            };

                            function sl_checkWidth() {
                                var wSize = jQuery(window).width();

                                if (wSize >= 1024) {
                                    slSize = sl_l;
                                } else if (wSize >= 720 && wSize < 1024) {
                                    slSize = sl_m;
                                } else {
                                    slSize = sl_s;
                                }
                            }

                            function sl_setParams() {
                                slParams = extend_parameters(sl_basic, slSize);
                            }

                            function sl_set_controls_hover(sl) {
                                jQuery('.top-slider .bx-prev, .top-slider .bx-next, .top-slider .bullets').hover(
                                    function () {
                                        sl.stopAuto();
                                    },
                                    function () {
                                        sl.startAuto();
                                    }
                                );
                            }

                            sl_checkWidth();
                            sl_setParams();

                            var svg_slider = jQuery('#anim-slider').bxSlider(slParams);

                            sl_set_controls_hover(svg_slider);

                            jQuery(window).resize(function () {
                                clearTimeout(resizeTimer);

                                resizeTimer = setTimeout(function () {
                                    sl_checkWidth();
                                    sl_setParams();
                                    svg_slider.reloadSlider(slParams);
                                    sl_set_controls_hover(svg_slider);
                                }, 500);
                            });
                        });
					</script>

				</div>
			</div>

			<div class="speakers" id="block_1">
				<div class="container">
					<div class="b-title">
						<h2><?php _e('Keynote speakers', 'datarobot3'); ?></h2>
					</div>
					<div class="items-wrap">
                        <?php foreach (get_field('speakers') as $speaker) { ?>
                            <div class="item">
                                <div class="e-wrap">
                                    <img src="<?php echo $speaker['photo']; ?>" alt="<?php echo $speaker['name']; ?>">
                                    <div class="m-wrap">
                                        <div class="name"><?php echo $speaker['name']; ?></div>
                                    </div>
                                    <i class="icon-chevron-down"></i>
                                </div>
                                <div class="text"><?php echo $speaker['description']; ?></div>
                            </div>
                        <?php } ?>
				    </div>
				</div>
			</div>

			<div class="agenda" id="block_2">
				<div class="container">
					<div class="b-title">
						<h2><?php _e('Conference Agenda', 'datarobot3'); ?></h2>
					</div>
					<div class="b-wrap">
						<?php the_content() ?>
					</div>
				</div>
			</div>

			<?php if(get_field('faq_on')){ ?>
                <div class="faq" id="block_3">
                    <div class="container">
                        <div class="b-title">
                            <h2><?php _e('Frequent questions', 'datarobot3'); ?></h2>
                        </div>
                        <div class="b-wrap">
							<?php foreach ( get_field( 'faq' ) as $key => $item ) { ?>
                                <div class="item <?php if($key === 0){echo 'active';} ?>">
                                    <div class="header">
										<?php echo $item['question']; ?>
                                        <i class="icon-chevron-down"></i>
                                    </div>
                                    <div class="answer" <?php if($key !== 0){echo 'style="display: none;"';} ?>>
										<?php echo $item['answer']; ?>
                                    </div>
                                </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
			<?php } ?>

            <div class="registration" id="block_4">
                <div class="container">
                    <div class="b-title">
                        <h2><?php _e('Registration', 'datarobot3'); ?></h2>
                    </div>
                    <div class="aie-form-wrap dr-form">
                        <a class="anchor" href="#form-errors" style="display:none;"></a>
												<?php if (get_field('form_expired')) { ?>
													<div class="registration_expired">
														<div class="message">
															<?php the_field('expired_message'); ?>
														</div>
													</div>
												<?php } else { ?>
                                <form method="post" name="<?php echo $form_name; ?>" id="ai-form" data-redirect="<?= esc_attr( $redirect ) ?>">
	                            <label>
	                                <input type="text" name="lastName" id="lastName" value="" class="field text is-empty" maxlength="40">
	                                <span><span><?php _e('Last Name', 'datarobot3'); ?></span></span>
	                            </label>
	                            <label>
	                                <input type="text" name="firstName" id="firstName" value="" class="field text is-empty" maxlength="40">
	                                <span><span><?php _e('First Name', 'datarobot3'); ?></span></span>
	                            </label>
	                            <label>
	                                <input type="text" name="emailAddress" id="emailAddress" value="" class="field text is-empty" maxlength="60">
	                                <span><span><?php _e('Business email', 'datarobot3'); ?></span></span>
	                            </label>
	                            <label>
	                                <input type="text" name="busPhone" id="busPhone" value="" class="field text is-empty" maxlength="20" placeholder="(123) 456-7890">
	                                <span><span><?php _e('Phone', 'datarobot3'); ?></span></span>
	                            </label>
	                            <label>
	                                <input type="text" name="company" id="company" value="" class="field text is-empty" maxlength="60" autocomplete="off">
	                                <span><span><?php _e('Company', 'datarobot3'); ?></span></span>
	                            </label>
	                            <label>
	                                <select name="title" id="title" class="select">
	                                    <option value=""><?php _e( 'Role', 'datarobot3' ); ?></option>
	                                    <option value="Actuary"><?php _e( 'Actuary', 'datarobot3' ); ?></option>
	                                    <option value="Business Analyst"><?php _e( 'Business Analyst', 'datarobot3' ); ?></option>
	                                    <option value="Executive"><?php _e( 'Executive', 'datarobot3' ); ?></option>
	                                    <option value="Data scientist - Beginner"><?php _e( 'Data scientist - Beginner', 'datarobot3' ); ?></option>
	                                    <option value="Data scientist - Expert"><?php _e( 'Data scientist - Expert', 'datarobot3' ); ?></option>
	                                    <option value="Data scientist - Management"><?php _e( 'Data scientist - Management', 'datarobot3' ); ?></option>
	                                    <option value="IT professional"><?php _e( 'IT professional', 'datarobot3' ); ?></option>
	                                    <option value="Software Engineer"><?php _e( 'Software Engineer', 'datarobot3' ); ?></option>
	                                    <option value="Other"><?php _e( 'Other', 'datarobot3' ); ?></option>
	                                </select>
	                            </label>

	                            <label>
	                                <select name="howHeardAboutDatarobot" id="howHeardAboutDatarobot" class="select long">
	                                    <option value=""><?php _e( 'How did you hear about us?', 'datarobot3' ); ?></option>
	                                    <option value="DataRobot"><?php _e( 'DataRobot', 'datarobot3' ); ?></option>
	                                    <option value="NSSOL"><?php _e( 'NSSOL', 'datarobot3' ); ?></option>
	                                    <option value="Transcosmos"><?php _e( 'Transcosmos', 'datarobot3' ); ?></option>
	                                    <option value="NTT Data"><?php _e( 'NTT Data', 'datarobot3' ); ?></option>
	                                    <option value="Advertisement"><?php _e( 'Advertisement', 'datarobot3' ); ?></option>
	                                    <option value="Other Sponsor"><?php _e( 'Other Sponsor', 'datarobot3' ); ?></option>
	                                </select>
	                            </label>

	                            <label>
	                                <select name="machineLearningStatus" id="machineLearningStatus" class="select long">
	                                    <option value=""><?php _e( 'Are there ML projects are your company?', 'datarobot3' ); ?></option>
	                                    <option value="Have a plan to start machine learning"><?php _e( 'Have a plan to start machine learning', 'datarobot3' ); ?></option>
	                                    <option value="Already executing machine learning projects"><?php _e( 'Already executing machine learning projects', 'datarobot3' ); ?></option>
	                                    <option value="No plan for machine learning"><?php _e( 'No plan for machine learning', 'datarobot3' ); ?></option>
	                                </select>
	                            </label>

	                            <label>
	                                <select name="machineLearningBudget" id="machineLearningBudget" class="select long">
	                                    <option value=""><?php _e( 'Budget for machine learning projects?', 'datarobot3' ); ?></option>
	                                    <option value="Under $44.5k"><?php _e( 'Under $44.5k', 'datarobot3' ); ?></option>
	                                    <option value="$44.5k ~ $89k"><?php _e( '$44.5k ~ $89k', 'datarobot3' ); ?></option>
	                                    <option value="$89k ~ $444.3k"><?php _e( '$89k ~ $444.3k', 'datarobot3' ); ?></option>
	                                    <option value="no plan or budget"><?php _e( 'no plan or budget', 'datarobot3' ); ?></option>
	                                </select>
	                            </label>

	                            <label>
	                                <select name="dataScienceExperience" id="dataScienceExperience" class="select long">
	                                    <option value=""><?php _e( 'Data science experience?', 'datarobot3' ); ?></option>
	                                    <option value="I have experience with data science"><?php _e( 'I have experience with data science', 'datarobot3' ); ?></option>
	                                    <option value="I don't have experience but we have a data scientist"><?php _e( 'I don\'t have experience but we have a data scientist', 'datarobot3' ); ?></option>
	                                    <option value="No data science experience"><?php _e( 'No data science experience', 'datarobot3' ); ?></option>
	                                </select>
	                            </label>

	                            <input type="hidden" name="submittedOnUrl" id="submittedOnUrl" value="">
	                            <input type="hidden" name="formName" value="<?php echo $form_name; ?>">
	                            <input type="hidden" name="elqFormName" value="<?php echo $form_name; ?>">
	                            <input type="hidden" name="elqSiteID" value="2142644770">
	                            <input type="hidden" name="elqCustomerGUID" value="">
	                            <input type="hidden" name="elqCookieWrite" value="0">
	                            <input type="hidden" name="elqCampaignId" value="11">
	                            <input type="hidden" name="campaignName" value="">
	                            <input type="hidden" name="campaignSource" value="">
	                            <input type="hidden" name="campaignMedium" value="">
	                            <input type="hidden" name="campaignContent" value="">
	                            <input type="hidden" name="campaignTerms" value="">

		                        <?php if (get_field('extra_hidden_fields')) {
			                        the_field('extra_hidden_fields');
		                        } ?>

	                            <div class="preloader">
	                              <span class="dr-loader">
	                                <span class="loader">
	                                  <svg width="36px" height="36px" viewBox="0 0 335 380">
	                                    <defs>
	                                        <path id="path-1" d="M0,0.207 L334.206,0.207 L334.206,378.94 L0,378.94 L0,0.207 Z"></path>
	                                    </defs>
	                                      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                                          <g id="datarobot-robot-monochrome"><g id="Clip-2"></g>
	                                              <path d="M310.55,180.463 C310.55,198.609 295.703,213.456 277.557,213.456 L56.649,213.456 C38.503,213.456 23.656,198.609 23.656,180.463 L23.656,48.488 C23.656,30.342 38.503,15.495 56.649,15.495 L277.557,15.495 C295.703,15.495 310.55,30.342 310.55,48.488 L310.55,180.463 L310.55,180.463 Z M322.565,69.944 L321.301,69.737 L321.301,41.448 C321.301,18.765 302.743,0.207 280.061,0.207 L54.145,0.207 C31.463,0.207 12.904,18.765 12.904,41.448 L12.904,69.737 L11.641,69.944 C5.113,71.014 0,77.034 0,83.649 L0,129.735 C0,136.35 5.113,142.37 11.641,143.44 L12.904,143.647 L12.904,189.961 C12.904,212.643 31.463,231.202 54.145,231.202 L118.658,231.202 L118.658,242.11 L113.082,242.11 L92.814,250.28 L92.814,253.277 L85.205,253.277 L85.205,261.246 C69.503,262.062 56.978,275.093 56.978,290.995 L56.978,300.038 L53.928,300.038 C50.17,303.796 48.063,305.903 44.306,309.661 L44.306,336.213 L53.928,345.836 L74.089,345.836 L78.213,341.712 L78.213,328.095 L86.148,328.129 L86.148,306.193 C86.148,302.794 83.392,300.038 79.993,300.038 L76.224,300.038 L76.224,290.995 C76.224,285.713 80.131,281.339 85.205,280.579 L85.205,291.222 L93.963,291.222 L93.963,323.119 L104.572,335.156 L104.572,351.651 C96.421,351.651 87.492,352.422 75.788,362.503 L75.788,379 L162.234,379 L162.234,346.794 L172.798,346.794 L172.798,379 L259.245,379 L259.245,362.503 C247.542,352.422 238.612,351.651 230.461,351.651 L230.461,335.156 L241.507,323.119 L241.507,291.222 L249.828,291.222 L249.828,280.551 C254.994,281.228 258.998,285.648 258.998,290.995 L258.998,300.038 L255.229,300.038 C251.83,300.038 249.074,302.794 249.074,306.193 L249.074,328.129 L257.009,328.095 L257.009,341.712 L261.133,345.836 L281.294,345.836 C285.052,342.078 287.159,339.971 290.916,336.213 L290.916,309.661 L281.294,300.038 L278.244,300.038 L278.244,290.995 C278.244,275.029 265.618,261.961 249.828,261.24 L249.828,253.277 L242.218,253.277 L242.218,250.28 L221.951,242.11 L216.374,242.11 L216.374,231.202 L280.061,231.202 C302.743,231.202 321.301,212.643 321.301,189.961 L321.301,143.647 L322.565,143.44 C329.093,142.37 334.206,136.35 334.206,129.735 L334.206,83.65 C334.206,77.035 329.093,71.015 322.565,69.944 L322.565,69.944 Z M113.084,99.062 C104.41,99.062 97.378,109.525 97.378,122.432 C97.378,135.338 104.41,145.801 113.084,145.801 C121.759,145.801 128.791,135.338 128.791,122.432 C128.791,109.525 121.759,99.062 113.084,99.062 L113.084,99.062 Z M221.122,99.062 C212.447,99.062 205.415,109.525 205.415,122.432 C205.415,135.338 212.447,145.801 221.122,145.801 C229.796,145.801 236.828,135.338 236.828,122.432 C236.828,109.525 229.796,99.062 221.122,99.062 L221.122,99.062 Z" id="Fill-1" fill="#BECDD9" mask="url(#mask-2)"></path>
	                                          </g>
	                                      </g>
	                                  </svg>
	                                  <span class="loader-inner"></span>
	                                </span>
	                              </span>
	                            </div>

	                            <div id="error-wrap">
	                                <div id="form-errors" class="shake" role="alert"></div>
	                            </div>

	                            <button type="submit" class="bg-filled-blue"><?php the_field('submit_button_text'); ?></button>
	                        </form>
												<?php } ?>
                    </div>
                </div>
            </div>

			<div class="partner sponsors" id="block_5">
				<div class="container">
					<div class="b-title">
						<h2><?php _e('Partner Sponsors', 'datarobot3'); ?></h2>
					</div>
					<div class="row-wrap">
						<?php foreach ( get_field( 'sponsors' ) as $item ) {
							$image = $item['logo'];
							$width = $item['width'];?>
                            <div class="item" <?= $width ? "style='width: {$width}'" : '' ?>>
                                <img src="<?php echo $image['url']; ?>" width="<?php echo $image['width'] / 2; ?>"
                                     alt="<?php echo $image['alt']; ?>">
                            </div>
						<?php } ?>
					</div>
				</div>
			</div>

            <div class="media sponsors" id="block_6">
				<div class="container">
					<div class="b-title">
						<h2><?php _e('Media Sponsors', 'datarobot3'); ?></h2>
					</div>
					<div class="row-wrap">
						<?php foreach ( get_field( 'media_sponsors' ) as $item ) {
							$image = $item['logo'];
							$width = $item['width'];?>
                            <div class="item" <?= $width ? "style='width: {$width}'" : '' ?>>
                                <img src="<?php echo $image['url']; ?>" width="<?php echo $image['width'] / 2; ?>"
                                     alt="<?php echo $image['alt']; ?>">
                            </div>
						<?php } ?>
					</div>
				</div>
			</div>

		</div>
	</section>

    <footer>
        <div class="container">
            <div class="row-wrap">
                <div class="copyright">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/built/images/td/logo-sm.png" alt="DataRobot">
                    <span>DataRobot, Inc. © 2012 - <?php the_time('Y'); ?></span>
                </div>
				<?php get_template_part( 'parts/share' ) ?>
                <div class="bpf">
                    Better predictions. Faster.
                </div>
            </div>
        </div>
    </footer>

	<?php wp_footer(); ?>
    <!-- leadforensics -->
    <script type="text/javascript" src="https://secure.leadforensics.com/js/117222.js" ></script>
    <noscript><img alt="" src="https://secure.leadforensics.com/117222.png?trk_user=117222&trk_tit=jsdisabled&trk_ref=jsdisabled&trk_loc=jsdisabled" height="0px" width="0px" style="display:none;" /></noscript>
    <!-- /leadforensics -->
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
	<script type="text/javascript">
        var clock;

        var active_agenda_tab = 'room_a';

        //both agenda tabs are displayed
        var tabbed = false;

        jQuery(document).ready(function ($) {

            var date = new Date("2017-11-09T12:00:00+09:00");
            var now = new Date();
            var diff = (date.getTime() / 1000) - (now.getTime() / 1000);

            clock = jQuery('#countdown').FlipClock(diff, {
                clockFace: 'DailyCounter',
                countdown: true
            });

            $('.speakers .e-wrap').click(function(){
                var item = $(this).parents('.item');
                if (item.hasClass('active')) {
                    item.find('.text').show().slideUp(150);
                    item.removeClass('active');
                } else {
                    $('.speakers .item.active').find('.text').show().slideUp(150);
                    $('.speakers .item.active').removeClass('active');
                    item.addClass('active').find('.text').hide().slideDown(150);
                }
            });

            $('.agenda-table .tab').click(function(){
                if($(window).width() < 1024){
                    $(this).siblings().addClass('bg');
                    $(this).removeClass('bg');
                    var col_to_show = $(this).data('col');
                    var col_to_hide = $(this).siblings().data('col');
                    active_agenda_tab = col_to_show;
                    $('.col.' + col_to_hide).hide();
                    $('.col.' + col_to_show).fadeIn(150);
                }
            });

            $('.faq .item').click(function () {
                if ($(this).hasClass('active')) {
                    $(this).find('.answer').slideUp(150);
                    $(this).removeClass('active');
                } else {
                    $('.faq .active').find('.answer').slideUp(150);
                    $('.faq .active').removeClass('active');
                    $(this).addClass('active').find('.answer').slideDown(300);
                }
            });

            $('.scroll-to').on('click', function (e) {
                e.preventDefault();
                var scrollTarget = $('#block_4').offset().top - 10;
                $('body,html').animate({
                        scrollTop: scrollTarget,
                    }, 300
                );
            });

            $('label:has(select)').addClass('dropdown-parent');

            var anchors = jQuery('.anchors');

            var anchors_offset = anchors_offset();

            function anchors_offset() {
                if (anchors.length) {
                    return anchors.offset().top;
                } else {
                    return 0;
                }
            }

            $('.anchors a').on('click', function (e) {
                e.preventDefault();

                $('.anchors a').removeClass('active');
                $(this).addClass('active');

                var target = this.hash,
                    topPadding = 75;
                if ($('#header-message').is(':visible')) {
                    topPadding += 60;
                }
                var $target = $(target);
                $('html, body').stop().animate({
                    'scrollTop': $target.offset().top - topPadding
                }, 500, 'swing');
            });

            $(window).scroll(function () {

                var scrollPos = $(document).scrollTop();

                $('.anchors a').each(function () {
                    var currLink = $(this);
                    var refElement = $(currLink.attr('href'));
                    if ((refElement.offset().top - 75) <= scrollPos && (refElement.offset().top + 75 + refElement.height()) > scrollPos) {
                        $('.anchors a').removeClass('active');
                        currLink.addClass('active');
                    }
                    else {
                        currLink.removeClass('active');
                    }
                });

                if ($(window).width() >= 720) {
                    if ($('.anchors').length) {
                        if ($(this).scrollTop() > anchors_offset && anchors.hasClass('default')) {
                            anchors.removeClass('default').addClass('fixed');
                        } else if ($(this).scrollTop() <= anchors_offset && anchors.hasClass('fixed')) {
                            anchors.removeClass('fixed').addClass('default');
                        }
                    }
                }
            });

            $(window).resize(function () {
                if($(window).width() >= 1024){
                    $('.col').show();
                    tabbed = false;
                } else {
                    if (tabbed == false){
                        $('.col').hide();
                        $('.col.' + active_agenda_tab).show();
                        tabbed = true;
                    }
                }

                if($(window).width() >= 720){
                    $('.speakers .text').show();
                } else {
                    $('.speakers .text').hide();
                }
            });
        });

	</script>

    <script type="text/javascript">(function () {
        if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
        if (window.ifaddtocalendar == undefined) { window.ifaddtocalendar = 1;
            var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
            s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
            s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
            var h = d[g]('body')[0];h.appendChild(s); }})();
    </script>

    <script type='text/javascript'>
        var timerId = null, timeout = 5;
    </script>

    <script type='text/javascript'>
        function WaitUntilCustomerGUIDIsRetrieved() {
            if (!!(timerId)) {
                if (timeout == 0) {
                    return;
                }
                if (typeof this.GetElqCustomerGUID === 'function') {
                    document.forms["<?php echo $form_name; ?>"].elements["elqCustomerGUID"].value = GetElqCustomerGUID();
                    return;
                }
                timeout -= 1;
            }
            timerId = setTimeout("WaitUntilCustomerGUIDIsRetrieved()", 500);
            return;
        }
        window.onload = WaitUntilCustomerGUIDIsRetrieved;
        _elqQ.push(['elqGetCustomerGUID']);
    </script>

    <script type='text/javascript'>
        function objectifyForm(formArray) {//serialize data function
            var rArray = {};
            for (var i = 0; i < formArray.length; i++) {
                rArray[formArray[i]['name']] = formArray[i]['value'];
            }
            var rJSON = JSON.stringify(rArray);
            console.log(rJSON);
            return rJSON;
        }

        function transmission_start() {
            jQuery('#form-errors').text('');
            jQuery('.dr-form button[type="submit"]').prop("disabled", true);
            jQuery('.dr-form .preloader').fadeIn(150);
        }

        function transmission_stop() {
            jQuery('.dr-form button[type="submit"]').prop("disabled", false);
            jQuery('.dr-form .preloader').hide();
        }

        function transmission_done() {
            jQuery('.dr-form .preloader').hide();
            window.location.href = '<?php echo $redirect; ?>';
        }

        function submitToSF() {
            var sfReq = jQuery.ajax({
                url: "https://fbnddub87j.execute-api.us-east-1.amazonaws.com/production/forms",
                type: "POST",
                headers: {
                    "Accept": "application/json; charset=utf-8",
                    "Content-Type": "application/json; charset=utf-8"
                },
                data: objectifyForm(jQuery('#ai-form').serializeArray()),
                dataType: "json",
                error: function (jqXHR) {
                    console.log("Response status code: " + jqXHR.status);
                    if (jqXHR.status === 422) {
                        jQuery.each(jqXHR.responseJSON.message, function (i, val) {
                            jQuery('#' + i).addClass('validation_error');
                            jQuery('#form-errors').text(val);
                        });
                        transmission_stop();
                    } else if (jqXHR.status === 500) {
                        if (typeof Raven !== 'undefined') {
                            Raven.captureMessage("SF error. Code: " + jqXHR.status);
                        }
                        transmission_done();
                    } else {
                        if (typeof Raven !== 'undefined') {
                            Raven.captureMessage("Submission error. Code: " + jqXHR.status + ". Switching to backup endpoint.");
                        }
                        submitToSF_backup();
                    }
                },
                success: function (data, jqXHR) {
                    console.log(data.message);
                    transmission_done();
                }
            });
            return sfReq;
        }

        function submitToSF_backup() {
            var sf_backup = jQuery.ajax({
                url: "https://q4mqrj2b0h.execute-api.us-west-1.amazonaws.com/backup/forms",
                type: "POST",
                headers: {
                    "Accept": "application/json; charset=utf-8",
                    "Content-Type": "application/json; charset=utf-8"
                },
                data: objectifyForm(jQuery('#ai-form').serializeArray()),
                dataType: "json",
                error: function (jqXHR) {
                    console.log("SF backup Raven error");
                    if (typeof Raven !== 'undefined') {
                        Raven.captureMessage("SF backup error. Code: " + jqXHR.status);
                    }
                    transmission_done();
                },
                success: function (jqXHR) {
                    console.log("Success. Data stored at SF backup endpoint.");
                    transmission_done();
                },
            });
        }

        function submitToEloqua() {
            return jQuery.ajax({
                url: "https://s2142644770.t.eloqua.com/e/f2",
                type: "POST",
                data: jQuery('#ai-form').serialize(),
                beforeSend: transmission_start(),
                error: function (jqXHR) {
                    console.log("Error. Submission to Eloqua failed.");
                    if (typeof Raven !== 'undefined') {
                        Raven.setUserContext({
                            email: document.getElementById('emailAddress').value
                        });
                        Raven.captureMessage("Error. Submission to Eloqua failed.");
                    }
                    transmission_stop();
                },
                success: function (jqXHR) {
                    console.log("Success. Elq submission saved.");
                },
                complete: function () {
                    submitToSF();
                }
            });
        }

        jQuery(document).ready(function ($) {

            $('.dr-form #submittedOnUrl').val(window.location.href);

            $('select').change(function () {
                $(this).css('color', '#465275');
            });

            $('#country').change(function () {
                if ($(this).val() === "United States" || $(this).val() === "Canada") {
                    $('#stateprov').prop('disabled', false);
                } else {
                    $('#stateprov').val('').prop('disabled', true);
                }
            });

            $('input').focus(function () {
                $(this).addClass('is-focused');
            }).blur(function () {
                $(this).removeClass('is-focused');
            }).on('keyup change', function () {
                if ($(this).val()) {
                    $(this).removeClass('is-empty');
                } else {
                    $(this).addClass('is-empty');
                }
            });

            $('.dr-form').submit(function (event) {
                event.preventDefault();

                $('.dr-form select').each(function () {
                    if ($(this).prop('disabled') === false && $(this).val() == "") {
                        $(this).addClass('validation_error');
                        $(this).focus(function () {
                            $(this).removeClass('validation_error');
                        });
                    }
                });

                $('.dr-form input[type="text"]').each(function () {
                    if ($(this).val() == "") {
                        $(this).addClass("validation_error");
                        $(this).focus(function () {
                            $(this).removeClass('validation_error');
                        });
                    }
                });

                var error_fields = jQuery(this).find(".validation_error");

                if (error_fields.length > 0) {
                    event.preventDefault();

                    jQuery('#form-errors').text('<?php _e( 'Please fill in all required fields', 'datarobot3' ); ?>');
                    jQuery('#error-wrap').fadeIn(150);

                    return;
                }
                ;

                jQuery("input[name='campaignName']").val(gasfdc_campaign);
                jQuery("input[name='campaignSource']").val(gasfdc_source);
                jQuery("input[name='campaignMedium']").val(gasfdc_medium);
                jQuery("input[name='campaignContent']").val(gasfdc_content);
                jQuery("input[name='campaignTerms']").val(gasfdc_term);

                identifyForm();

                submitToEloqua();
            });


            var validator = new FormValidator('<?php echo $form_name; ?>', [{
                name: 'firstName',
                rules: 'required|min_length[1]'
            }, {
                name: 'lastName',
                rules: 'required|min_length[1]'
            }, {
                name: 'emailAddress',
                rules: 'required|valid_email'
            }, {
                name: 'title',
                rules: 'required'
            }, {
                name: 'company',
                rules: 'required|min_length[2]'
            }, {
                name: 'busPhone',
                rules: 'required|min_length[5]'
            }], ___event_performValidation);

            var event = window.event;

            var classNameCheckOnlyThis = 'checkOnlyThis';

            function ___event_performValidation(errors, evt) {
                jQuery('.validation_error').removeClass('validation_error');

                jQuery('#form-errors').text('');
                jQuery('#error-wrap').fadeOut(150);

                // detect if it's an onSubmit event
                var weAreInASubmitEvent = evt != undefined;

                function checkIfIDIsInElementsToProcess(_string) {
                    return jQuery('#' + _string + '.' + classNameCheckOnlyThis).length != 0;
                }

                if (errors.length > 0) {
                    for (var i = 0; i < errors.length; i++) {
                        if (weAreInASubmitEvent || checkIfIDIsInElementsToProcess(errors[i].id)) {
                            var this_item = jQuery('#' + errors[i].id);

                            this_item.addClass('validation_error');
                        }
                    }

                    if (evt && evt.preventDefault) {
                        evt.preventDefault();
                    } else if (event) {
                        event.returnValue = false;
                    }
                } else {
                    if (event) event.returnValue = true;
                }
            }

            var allInputsOnPage = jQuery('.dr-form input, .dr-form select');

            allInputsOnPage.on('focus', function (_event) {
                _event.target.classList.add(classNameCheckOnlyThis);
            });

            allInputsOnPage.on('blur', function (_event) {
                if (_event.target.classList.contains('validation_error')) return;
                _event.target.classList.remove(classNameCheckOnlyThis);
            });

            allInputsOnPage.on('keyup blur change', function (_e) {
                validator._validateForm();
            });
        });
    </script>

</div>

<?php get_template_part('end'); ?>
