<!DOCTYPE html>
<html lang="ja">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
    <link rel="alternate" type="application/rss+xml" title="Comments RSS"
          href="<?php bloginfo('comments_rss2_url'); ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo get_stylesheet_uri(); ?>?ver=<?php echo filemtime(get_stylesheet_directory() . '/style.css'); ?>">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:400,300,500|Noto+Sans:400,700">
    <?php if (in_category('blog')) {
        echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,400i">';
    } ?>

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title>DataRobot JP - データロボット</title>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-K3WW4HZ');</script>
    <!-- End Google Tag Manager -->

    <?php wp_head(); ?>

    <!-- start Omniconvert.com code -->
    <link rel="dns-prefetch" href="//app.omniconvert.com"/>
    <script type="text/javascript" src="//cdn.omniconvert.com/js/v989b40.js"></script>
    <!-- end Omniconvert.com code -->

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
            if (f.fbq)return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq)f._fbq = n;
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
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3WW4HZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="wrapper">
    <header class="fixed">
        <div class="container">
            <div id="logo">
                <a href="/" title="DataRobot Homepage">
                    <img src="<?= get_template_directory_uri(); ?>/assets/built/images/logo.svg" alt="DataRobot">
                </a>
            </div>
            <div class="menu-extra mobile">
                <a href="/contact-us/"
                   class="bg-filled-orange button menu-extra-button contact-sales"><?php _e('Contact Us', 'datarobot3'); ?></a>
            </div>
            <div class="nav-toggle">
                <div class="hamburger-header">
                    <button class="c-hamburger-header c-hamburger--htx">
                        <span></span>
                    </button>
                </div>
            </div>
            <div id="main-nav">
                <?php $args = array(
                    'theme_location' => 'top',
                    'container' => 'nav',
                    'menu_class' => 'menu clearfix',
                    'menu_id' => 'top-nav',
                );
                wp_nav_menu($args);
                ?>
                <div class="menu-extra">
                    <a href="/contact-us/"
                       class="bg-filled-orange button menu-extra-button contact-sales"><?php _e('Contact Us', 'datarobot3'); ?></a>
                </div>
            </div>
        </div>
    </header>
