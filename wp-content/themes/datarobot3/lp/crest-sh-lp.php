<?php
/* Template Name: LP - Crest Superheroes */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="google-site-verification" content="d-L8sQWcqXG9U_ua4yroXJjGnte_X4EQaWOLHQ7aEMU" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/assets/built/stylesheets/cf-sh-lp.css'; ?>">
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
	<!-- Facebook Pixel Code -->
	<script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '257592791258402'); // Insert your pixel ID here.
        fbq('track', 'PageView');
	</script>
	<noscript>
		<img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=257592791258402&ev=PageView&noscript=1"/>
	</noscript>
	<!-- DO NOT MODIFY -->
	<!-- End Facebook Pixel Code -->

	<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/js/gasalesforce.js"></script>
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
$cta = get_field('cta_items');
$refcard = get_field('reference_card');
$next = get_field('next_steps_block');
$quote = get_field('quote');
?>

<body <?php body_class('crest-sh'); ?>>
<div class="wrapper">
	<header>
		<div class="container">
            <div id="logo">
                <a href="/" title="DataRobot Homepage">
                    <img src="<?= get_template_directory_uri(); ?>/assets/built/images/Logo-with-Robot.svg" alt="DataRobot">
                </a>
                <p>The world’s most advanced data science and machine learning platform</p>
            </div>
		</div>
	</header>
	<section class="cfsh">
        <div class="top-banner">
            <div class="container clearfix">
                <div class="row-wrap">
                    <div class="b-left">
                        <h1><?php the_field('banner_title'); ?></h1>
                    </div>
                    <div class="b-right">
                        <div class="img-wrap">
                            <img src="<?php the_field('banner_image'); ?>" alt="Become a Data Science Superhero!">
                        </div>
                    </div>
                </div>
                <div class="features row-3">
                    <?php foreach ($cta as $key => $item ){ ?>
                        <div class="item">
                            <div class="img-wrap">
                                <img src="<?php echo $item['icon']; ?>" alt="DataRobot">
                            </div>
                            <p><?php echo $item['text']; ?></p>
                            <a href="<?php echo $item['link']; ?>" class="button sm-filled-blue"><?php echo $item['button_text']; ?></a>
                        </div>
                    <?php } ?>
                </div>
                <div class="more">
                    <a href="#story" class="scroll-to transition">
                        <p>Read the Crest Financial Data Science Superhero story</p>
                        <span><i class="icon-chevron-down"></i></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="main" id="story">
                <?php the_field('page_content'); ?>
            </div>
            <div class="vs-reference">
                <div class="content-wrap">
                    <div class="ref-card" data-featherlight="#refcard" data-featherlight-close-on-esc="false">
                        <div class="img-wrap">
                            <img src="<?php echo $refcard['refcard_image']; ?>" alt="Data Science Superhero vs Mortal">
                        </div>
                        <div class="caption">
                            Data Science Superhero vs Mortal
                        </div>
                    </div>
                </div>
                <div class="fl-lightbox" id="refcard">
                    <div class="ref-table clearfix">
	                    <?php echo $refcard['ref_card']; ?>
                    </div>
                </div>
            </div>
            <div class="blue">
                <div class="content-wrap">
                    <h3><?php echo $next['next_title']; ?></h3>
	                <p><?php echo $next['next_text']; ?></p>
                </div>
            </div>
            <div class="quote">
                <div class="content-wrap">
                    <div class="text">
                        <p><?php echo $quote['text']; ?></p>
                    </div>
                    <div class="author">
                        <div class="img-wrap">
                            <img src="<?php echo $quote['author_photo']; ?>" alt="<?php echo $quote['author_name']; ?>">
                        </div>
                        <div class="text-wrap">
                            <p class="name"><?php echo $quote['author_name']; ?></p>
                            <p class="title"><?php echo $quote['author_title']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="features-b">
                <div class="container">
                    <h3>Become a Data Science Superhero!</h3>
                    <div class="features row-3">
		                <?php foreach ($cta as $key => $item ){ ?>
                            <div class="item">
                                <div class="img-wrap">
                                    <img src="<?php echo $item['icon']; ?>" alt="DataRobot">
                                </div>
                                <p><?php echo $item['text']; ?></p>
                                <a href="<?php echo $item['link']; ?>" class="button sm-<?php echo $key == 0 ? 'filled' : 'ghost'; ?>-blue"><?php echo $item['button_text']; ?></a>
                            </div>
		                <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>

    <script>
        jQuery(document).ready(function($){
            $('.scroll-to').on('click', function (e) {
                e.preventDefault();
                var scrollTarget = $('#story').offset().top;
                $('body,html').animate({
                        scrollTop: scrollTarget,
                    }, 300
                );
            });

            $('.ref-card').on('click', function () {

                $('body').css({
                    overflow: "hidden"
                });

                $('.featherlight-close-icon, .featherlight').on('click', function () {
                    $('body').css({
                        overflow: "auto"
                    });
                });
            });
        })
    </script>

<?php get_template_part('end'); ?>
