<?php
/* Template Name: LP - Practical ML program */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="google-site-verification" content="d-L8sQWcqXG9U_ua4yroXJjGnte_X4EQaWOLHQ7aEMU"/>
    <link rel="stylesheet" type="text/css"
          href="<?= get_stylesheet_directory_uri() . '/assets/built/stylesheets/practical-ml-program.css'; ?>">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:400,300,500|Noto+Sans:400,700">

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
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
<body <?php body_class( 'practical-ml-program' ); ?>>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="wrapper">
    <header>
        <div class="container">
            <div class="holder">
                <a href="<?= home_url() ?>" title="DataRobot Homepage" class="logo">
                    <img src="<?= get_template_directory_uri() ?>/assets/built/images/logo-big-robot.svg" alt="DataRobot" class="logo-img">
                </a>
                <p class="subtitle">Real-Life Machine Learning. As Real as it Gets.</p>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="form-holder row-wrap">
                <div class="b-left">
					<?php the_content() ?>
                </div>
                <div class="b-right item">
                    <div class="dr-form practical-ml-form">
                        <iframe name="hiddenframe" id="hiddenframe" frameborder="0"
                                style="width:0;height:0;border:0;display:none;"></iframe>
                        <form method="post" name="Ukraine AI Conference 092317" id="td-form" target="hiddenframe">
                            <input type="text" name="fullName" id="fullName" value="" class="text fullrow"
                                   maxlength="40" placeholder="Full name">
                            <input type="text" name="email" id="email" value="" class="text fullrow"
                                   maxlength="40" placeholder="Email">
                            <input type="text" name="currentPosition" id="currentPosition" value="" class="text fullrow"
                                    placeholder="Current position">
                            <input type="text" name="currentExpertise" id="currentExpertise" value=""
                                   class="text fullrow"
                                   placeholder="What is your current expertise in Data Science?">
                            <textarea name="comment" id="comment" value="" class="text fullrow"
                                      placeholder="Why are you interested in this program and what would you like to achieve?"></textarea>

                            <input type="hidden" name="submittedOnUrl" id="submittedOnUrl" value="">
                            <input type="hidden" name="formName" value="Ukraine AI Conference 092317">
                            <input type="hidden" name="elqFormName" value="UkraineAIConference092317">
                            <input type="hidden" name="elqSiteID" value="2142644770">
                            <input type="hidden" name="elqCustomerGUID" value="">
                            <input type="hidden" name="elqCampaignId" value="">
                            <input type="hidden" name="campaignName" value="">
                            <input type="hidden" name="campaignSource" value="">
                            <input type="hidden" name="campaignMedium" value="">
                            <input type="hidden" name="campaignContent" value="">
                            <input type="hidden" name="campaignTerms" value="">
                            <div class="preloader">
										<span class="dr-loader">
											<span class="loader">
												<svg width="36px" height="36px" viewBox="0 0 335 380">
													<defs><path id="path-1"
                                                                d="M0,0.207 L334.206,0.207 L334.206,378.94 L0,378.94 L0,0.207 Z"></path></defs><g
                                                            id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd"><g id="datarobot-robot-monochrome"><g
                                                                    id="Clip-2"></g><path
                                                                    d="M310.55,180.463 C310.55,198.609 295.703,213.456 277.557,213.456 L56.649,213.456 C38.503,213.456 23.656,198.609 23.656,180.463 L23.656,48.488 C23.656,30.342 38.503,15.495 56.649,15.495 L277.557,15.495 C295.703,15.495 310.55,30.342 310.55,48.488 L310.55,180.463 L310.55,180.463 Z M322.565,69.944 L321.301,69.737 L321.301,41.448 C321.301,18.765 302.743,0.207 280.061,0.207 L54.145,0.207 C31.463,0.207 12.904,18.765 12.904,41.448 L12.904,69.737 L11.641,69.944 C5.113,71.014 0,77.034 0,83.649 L0,129.735 C0,136.35 5.113,142.37 11.641,143.44 L12.904,143.647 L12.904,189.961 C12.904,212.643 31.463,231.202 54.145,231.202 L118.658,231.202 L118.658,242.11 L113.082,242.11 L92.814,250.28 L92.814,253.277 L85.205,253.277 L85.205,261.246 C69.503,262.062 56.978,275.093 56.978,290.995 L56.978,300.038 L53.928,300.038 C50.17,303.796 48.063,305.903 44.306,309.661 L44.306,336.213 L53.928,345.836 L74.089,345.836 L78.213,341.712 L78.213,328.095 L86.148,328.129 L86.148,306.193 C86.148,302.794 83.392,300.038 79.993,300.038 L76.224,300.038 L76.224,290.995 C76.224,285.713 80.131,281.339 85.205,280.579 L85.205,291.222 L93.963,291.222 L93.963,323.119 L104.572,335.156 L104.572,351.651 C96.421,351.651 87.492,352.422 75.788,362.503 L75.788,379 L162.234,379 L162.234,346.794 L172.798,346.794 L172.798,379 L259.245,379 L259.245,362.503 C247.542,352.422 238.612,351.651 230.461,351.651 L230.461,335.156 L241.507,323.119 L241.507,291.222 L249.828,291.222 L249.828,280.551 C254.994,281.228 258.998,285.648 258.998,290.995 L258.998,300.038 L255.229,300.038 C251.83,300.038 249.074,302.794 249.074,306.193 L249.074,328.129 L257.009,328.095 L257.009,341.712 L261.133,345.836 L281.294,345.836 C285.052,342.078 287.159,339.971 290.916,336.213 L290.916,309.661 L281.294,300.038 L278.244,300.038 L278.244,290.995 C278.244,275.029 265.618,261.961 249.828,261.24 L249.828,253.277 L242.218,253.277 L242.218,250.28 L221.951,242.11 L216.374,242.11 L216.374,231.202 L280.061,231.202 C302.743,231.202 321.301,212.643 321.301,189.961 L321.301,143.647 L322.565,143.44 C329.093,142.37 334.206,136.35 334.206,129.735 L334.206,83.65 C334.206,77.035 329.093,71.015 322.565,69.944 L322.565,69.944 Z M113.084,99.062 C104.41,99.062 97.378,109.525 97.378,122.432 C97.378,135.338 104.41,145.801 113.084,145.801 C121.759,145.801 128.791,135.338 128.791,122.432 C128.791,109.525 121.759,99.062 113.084,99.062 L113.084,99.062 Z M221.122,99.062 C212.447,99.062 205.415,109.525 205.415,122.432 C205.415,135.338 212.447,145.801 221.122,145.801 C229.796,145.801 236.828,135.338 236.828,122.432 C236.828,109.525 229.796,99.062 221.122,99.062 L221.122,99.062 Z"
                                                                    id="Fill-1" fill="#BECDD9"
                                                                    mask="url(#mask-2)"></path></g></g>
												</svg>
												<span class="loader-inner"></span>
											</span>
										</span>
                            </div>

                            <div id="error-wrap">
                                <div id="form-errors" class="shake" role="alert"></div>
                            </div>
                            <input type="submit" value="Sign up for the program for free"
                                   class="submit bg-filled-blue fullrow button">
                        </form>
                    </div>
                </div>
            </div>

            <div class="holder intro">
                <p>At DataRobot, having machine learning in production is what our product is about. Hundreds of
                    high-profile organizations across the world use our models every day and base their business
                    operations on them.</p>
            </div>
            <div class="benefits">
                <h3>Why you will benefit from the program</h3>
                <div class="row-wrap">
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60">
                            <g fill="#2D8FE2" fill-rule="nonzero">
                                <path d="M57.79 3.79H36v-.316A3.478 3.478 0 0 0 32.526 0h-5.052A3.478 3.478 0 0 0 24 3.474v.315H2.21C.993 3.79 0 4.781 0 6v6.316a.947.947 0 1 0 1.895 0V6c0-.174.141-.316.316-.316h36.526a.947.947 0 1 0 0-1.895H25.895v-.315c0-.871.708-1.58 1.579-1.58h5.052c.871 0 1.58.709 1.58 1.58v.315h-1.58a.947.947 0 1 0 0 1.895H57.79c.175 0 .316.142.316.316v37.79a.947.947 0 1 0 1.895 0V6c0-1.219-.992-2.21-2.21-2.21z"/>
                                <path d="M59.053 36.632a.947.947 0 0 0-.948.947v6.316a.316.316 0 0 1-.316.316H2.211a.316.316 0 0 1-.316-.316V6.105a.947.947 0 1 0-1.895 0v37.79c0 1.219.992 2.21 2.21 2.21h14.211v12h-4.105a.947.947 0 1 0 0 1.895h35.368a.947.947 0 1 0 0-1.895H43.58v-12h14.21c1.22 0 2.21-.991 2.21-2.21v-6.316a.947.947 0 0 0-.946-.947zM18.158 49.263a.947.947 0 1 0 0 1.895h23.526v6.947H18.316v-12h23.368v3.158H18.158z"/>
                                <path d="M6.691 22.207a2.044 2.044 0 0 0-1.638 1.998v1.484c0 .969.689 1.81 1.638 2l2.17.433c.124.356.268.704.432 1.043l-1.228 1.841a2.044 2.044 0 0 0 .255 2.572l1.05 1.05a2.044 2.044 0 0 0 2.571.254l1.842-1.228a9.64 9.64 0 0 0 1.042.432l.434 2.17c.19.95 1.03 1.639 2 1.639h1.483c.968 0 1.81-.69 1.999-1.638l.434-2.17a9.649 9.649 0 0 0 1.042-.433l1.842 1.228c.805.537 1.887.43 2.572-.254l1.05-1.05a2.044 2.044 0 0 0 .254-2.572l-1.228-1.841a9.64 9.64 0 0 0 .432-1.043l2.17-.434a2.044 2.044 0 0 0 1.639-1.999v-1.483c0-.969-.69-1.81-1.639-2l-2.17-.433a9.64 9.64 0 0 0-.432-1.043l1.228-1.841a2.044 2.044 0 0 0-.255-2.572l-1.05-1.05a2.044 2.044 0 0 0-2.571-.254l-1.842 1.228a9.64 9.64 0 0 0-1.042-.432l-.434-2.17A2.044 2.044 0 0 0 18.742 12h-1.484c-.968 0-1.809.69-1.999 1.639l-.434 2.17a9.649 9.649 0 0 0-1.042.432l-1.842-1.228a2.044 2.044 0 0 0-2.572.255L8.32 16.317a2.044 2.044 0 0 0-.255 2.572l1.228 1.841a9.63 9.63 0 0 0-.432 1.043l-2.17.434zm3.092 1.313c.35-.07.63-.33.726-.673a7.733 7.733 0 0 1 .709-1.71.947.947 0 0 0-.037-.99l-1.54-2.31a.144.144 0 0 1 .019-.18l1.05-1.05a.144.144 0 0 1 .18-.018l2.309 1.54c.297.197.68.211.99.036a7.743 7.743 0 0 1 1.71-.708.947.947 0 0 0 .674-.727l.544-2.72a.144.144 0 0 1 .141-.115h1.484c.068 0 .128.048.14.115l.545 2.72c.07.35.33.63.673.727a7.743 7.743 0 0 1 1.71.708c.312.176.695.161.991-.037l2.309-1.539a.144.144 0 0 1 .18.018l1.05 1.05a.144.144 0 0 1 .018.18l-1.539 2.31a.947.947 0 0 0-.037.99c.303.538.542 1.113.709 1.71a.947.947 0 0 0 .726.673l2.72.545a.144.144 0 0 1 .116.14v1.484a.144.144 0 0 1-.116.141l-2.72.544c-.35.07-.63.33-.726.674a7.743 7.743 0 0 1-.709 1.71.947.947 0 0 0 .037.99l1.54 2.309a.144.144 0 0 1-.019.181l-1.05 1.05a.144.144 0 0 1-.18.018l-2.309-1.54a.947.947 0 0 0-.99-.037 7.743 7.743 0 0 1-1.71.71.947.947 0 0 0-.674.726l-.544 2.72a.144.144 0 0 1-.141.115h-1.484a.144.144 0 0 1-.14-.115l-.545-2.72a.947.947 0 0 0-.673-.727 7.743 7.743 0 0 1-1.71-.709.946.946 0 0 0-.991.038l-2.309 1.539a.144.144 0 0 1-.18-.018l-1.05-1.05a.144.144 0 0 1-.018-.181l1.539-2.308a.947.947 0 0 0 .037-.99 7.743 7.743 0 0 1-.709-1.711.947.947 0 0 0-.726-.674l-2.72-.544a.144.144 0 0 1-.116-.14v-1.485c0-.068.049-.127.116-.14l2.72-.545z"/>
                                <path d="M18 29.495a4.552 4.552 0 0 0 4.547-4.548A4.552 4.552 0 0 0 18 20.4a4.552 4.552 0 0 0-4.547 4.547A4.552 4.552 0 0 0 18 29.495zm0-7.2a2.656 2.656 0 0 1 2.653 2.652A2.656 2.656 0 0 1 18 27.6a2.656 2.656 0 0 1-2.653-2.653A2.656 2.656 0 0 1 18 22.295zM36.316 8.842a.947.947 0 0 0-.948.947v30.316a.947.947 0 1 0 1.895 0v-2.842h15.474c1.219 0 2.21-.992 2.21-2.21v-2.527c0-1.219-.991-2.21-2.21-2.21h-8.79a.947.947 0 1 0 0 1.895h8.79c.174 0 .316.141.316.315v2.527a.316.316 0 0 1-.316.315H37.263v-3.157h7.895a.947.947 0 1 0 0-1.895h-7.895V28.42h9.158c1.219 0 2.21-.992 2.21-2.21v-2.527c0-1.218-.991-2.21-2.21-2.21h-6.526a.947.947 0 1 0 0 1.895h6.526c.174 0 .316.141.316.315v2.527a.316.316 0 0 1-.316.316h-9.158v-3.158h2.842a.947.947 0 1 0 0-1.895h-2.842v-1.895h4.105c1.22 0 2.211-.991 2.211-2.21v-2.527c0-1.218-.992-2.21-2.21-2.21h-4.106V9.789a.947.947 0 0 0-.947-.947zm5.052 5.684c.174 0 .316.142.316.316v2.526a.316.316 0 0 1-.316.316h-4.105v-3.158h4.105z"/>
                            </g>
                        </svg>

                        <p>We know how to operationalize Machine Learning in the real world and ready to share this
                            knowledge with you</p>
                    </div>
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60">
                            <g fill="#2D8FE2" fill-rule="nonzero">
                                <path d="M19.688 18.75v1.875a4.696 4.696 0 0 0 3.75 4.593V30c0 1.783.717 3.4 1.875 4.583v.105c.031 0 .061-.009.092-.01A6.541 6.541 0 0 0 30 36.563 6.57 6.57 0 0 0 36.563 30v-7.5a4.693 4.693 0 0 0-4.688-4.688h-11.25a.937.937 0 0 0-.938.938zM30 34.688a4.629 4.629 0 0 1-2.344-.653C29.05 33.222 30 31.727 30 30h-1.875a2.806 2.806 0 0 1-1.97 2.67 4.657 4.657 0 0 1-.843-2.67v-4.688h5.625a4.696 4.696 0 0 0 3.75 4.593V30A4.693 4.693 0 0 1 30 34.688zm-8.438-15h10.313a2.816 2.816 0 0 1 2.813 2.812v5.465a2.818 2.818 0 0 1-1.876-2.652v-.938a.937.937 0 0 0-.937-.938h-7.5a2.816 2.816 0 0 1-2.813-2.812v-.938z"/>
                                <path d="M57.478 51.563A5.621 5.621 0 0 0 60 46.874a5.63 5.63 0 0 0-5.625-5.625 5.624 5.624 0 0 0-4.688 2.522A5.621 5.621 0 0 0 45 41.25a5.58 5.58 0 0 0-2.125.433c-.612-1.877-2.36-3.245-4.438-3.245H22.785l-5.181-3.455-3.899-7.795H15v-1.875h-3.75v-7.575a6.538 6.538 0 0 0 3.646-1.8h1.041a4.693 4.693 0 0 0 4.688-4.688V9.375a.937.937 0 0 0-.938-.938h-2.812V7.5a.937.937 0 0 0-.938-.938H4.688a.937.937 0 0 0-.937.938v.938H.937A.937.937 0 0 0 0 9.374v1.875a4.693 4.693 0 0 0 4.688 4.688h1.041a6.541 6.541 0 0 0 3.646 1.8v7.575h-3.75v1.875h1.257l5.381 12.556c.067.156.174.291.31.39l1.624 1.18a5.627 5.627 0 0 0-3.884 2.459 5.622 5.622 0 0 0-4.688-2.523A5.63 5.63 0 0 0 0 46.875a5.624 5.624 0 0 0 2.522 4.688A5.624 5.624 0 0 0 0 56.25V60h1.875v-3.75a3.754 3.754 0 0 1 3.75-3.75 3.754 3.754 0 0 1 3.75 3.75V60h1.875v-3.75A3.754 3.754 0 0 1 15 52.5a3.754 3.754 0 0 1 3.75 3.75V60h1.875v-3.75a5.624 5.624 0 0 0-2.522-4.688 5.621 5.621 0 0 0 2.522-4.687c0-.324-.034-.64-.086-.95l1.961 1.427v11.71c0 .519.42.938.938.938h18.75c.517 0 .937-.42.937-.938v-6.05A3.706 3.706 0 0 1 45 52.5a3.754 3.754 0 0 1 3.75 3.75V60h1.875v-3.75a3.754 3.754 0 0 1 3.75-3.75 3.754 3.754 0 0 1 3.75 3.75V60H60v-3.75a5.624 5.624 0 0 0-2.522-4.688zM18.75 10.313v.937a2.807 2.807 0 0 1-2.502 2.782 6.511 6.511 0 0 0 .627-2.782v-.938h1.875zm-16.875.937v-.938H3.75v.938c0 .995.229 1.935.627 2.782a2.807 2.807 0 0 1-2.502-2.782zm3.75 0V8.437H15v2.813a4.693 4.693 0 0 1-4.688 4.688 4.693 4.693 0 0 1-4.687-4.688zm-3.75 35.625a3.754 3.754 0 0 1 3.75-3.75 3.754 3.754 0 0 1 3.75 3.75 3.754 3.754 0 0 1-3.75 3.75 3.754 3.754 0 0 1-3.75-3.75zm8.438 6.272a5.666 5.666 0 0 0-1.585-1.584 5.666 5.666 0 0 0 1.585-1.585 5.666 5.666 0 0 0 1.584 1.584 5.666 5.666 0 0 0-1.585 1.585zM15 50.625a3.754 3.754 0 0 1-3.75-3.75 3.754 3.754 0 0 1 3.75-3.75 3.754 3.754 0 0 1 3.75 3.75 3.754 3.754 0 0 1-3.75 3.75zm39.375-7.5a3.754 3.754 0 0 1 3.75 3.75 3.754 3.754 0 0 1-3.75 3.75 3.754 3.754 0 0 1-3.75-3.75 3.754 3.754 0 0 1 3.75-3.75zm-5.625 3.75a3.754 3.754 0 0 1-3.75 3.75c-.67 0-1.307-.182-1.875-.512v-6.476A3.714 3.714 0 0 1 45 43.125a3.754 3.754 0 0 1 3.75 3.75zm-19.688-2.509l-1.473-4.053h1.474v4.053zm1.875-4.053h1.474l-1.474 4.053v-4.053zM41.25 58.124H37.5V45h-1.875v13.125h-11.25v-11.25c0-.3-.143-.581-.386-.758l-10.105-7.349-4.962-11.58h2.686l4.429 8.856c.073.145.183.27.319.361l5.625 3.75a.937.937 0 0 0 .519.157h3.093l3.526 9.696a.939.939 0 0 0 1.762 0l3.526-9.696h4.03a2.816 2.816 0 0 1 2.813 2.813v15zm8.438-4.978a5.666 5.666 0 0 0-1.585-1.584 5.666 5.666 0 0 0 1.584-1.585 5.666 5.666 0 0 0 1.585 1.584 5.666 5.666 0 0 0-1.584 1.585zM25.313 7.5h1.875V4.687H30V2.813h-2.813V0h-1.875v2.813H22.5v1.874h2.813z"/>
                            </g>
                        </svg>
                        <p>We have a superstar team of Kaggle champions, ML library authors, and business-savvy
                            scientists
                            to help you learn and succeed</p>
                    </div>
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="58" viewBox="0 0 60 58">
                            <g fill="#2D8FE2" fill-rule="nonzero">
                                <path d="M33.929 10.266a15.116 15.116 0 0 0-10.747-4.442c-4.06 0-7.877 1.578-10.747 4.442-5.926 5.913-5.926 15.535 0 21.448a15.116 15.116 0 0 0 10.747 4.442c4.06 0 7.876-1.577 10.747-4.442A15.05 15.05 0 0 0 38.38 20.99a15.05 15.05 0 0 0-4.452-10.724zm-20.27 1.222a13.394 13.394 0 0 1 9.523-3.937c3.597 0 6.979 1.398 9.523 3.937a13.329 13.329 0 0 1 3.76 7.267l-4.719 4.604a3.085 3.085 0 0 0-4.075.974l-6.934-2.171.002-.06a3.085 3.085 0 0 0-6.17 0c0 .554.15 1.075.408 1.525l-3.638 3.763c-2.761-5.093-1.988-11.604 2.32-15.902zm17.93 14.553a1.354 1.354 0 0 1-2.706 0 1.354 1.354 0 0 1 2.707 0zM19.009 22.1a1.354 1.354 0 0 1-2.707 0 1.354 1.354 0 0 1 2.707 0zm13.697 8.392a13.394 13.394 0 0 1-9.523 3.936c-3.598 0-6.98-1.398-9.523-3.936a13.49 13.49 0 0 1-1.37-1.598l3.934-4.069a3.085 3.085 0 0 0 3.996-1.017l6.934 2.172-.001.06a3.085 3.085 0 0 0 6.169 0c0-.523-.132-1.016-.364-1.448l3.693-3.602c0 3.59-1.402 6.964-3.945 9.502z"/>
                                <path d="M15.517 12.18l1.136 1.303c2.684-2.327 6.447-3.045 9.821-1.872l.57-1.632c-3.959-1.375-8.375-.532-11.527 2.2zM29.265 11.026l-.9 1.475c.458.279.898.598 1.307.949l1.128-1.31c-.48-.412-.996-.787-1.535-1.114zM25.252 30.71a10 10 0 0 1-5.788-.499l-.644 1.603a11.71 11.71 0 0 0 6.79.585l-.358-1.69z"/>
                                <path d="M44.863 34.866l-1.256 1.254-3.118-3.325c3.69-5.383 4.578-12.117 2.664-18.15l2.474-2.414a3.085 3.085 0 0 0 4.546-2.71c0-.503-.123-.977-.338-1.397l5.31-5.181V5.62h1.732V.027H51.27v1.727h2.618l-5.24 5.113a3.085 3.085 0 0 0-4.644 2.654c0 .543.142 1.053.39 1.497l-1.896 1.85a20.802 20.802 0 0 0-4.493-6.669c-8.174-8.156-21.473-8.156-29.646 0C1.078 13.464.283 24.79 5.974 32.94l-1.458 1.508A3.084 3.084 0 0 0 0 37.172a3.085 3.085 0 0 0 6.169 0c0-.555-.149-1.075-.407-1.526l1.273-1.317c.415.5.855.985 1.324 1.452 4.087 4.078 9.455 6.117 14.823 6.117 4.12 0 8.24-1.203 11.782-3.606l3.125 3.334-1.3 1.296 15.137 15.051L60 49.917l-15.137-15.05zM47.088 8.17c.746 0 1.353.606 1.353 1.35a1.354 1.354 0 0 1-2.707 0c0-.744.608-1.35 1.354-1.35zM3.084 38.522a1.354 1.354 0 0 1-1.353-1.35 1.354 1.354 0 0 1 2.707 0c0 .745-.607 1.35-1.354 1.35zm6.499-3.962c-7.499-7.482-7.499-19.657 0-27.14 3.749-3.74 8.674-5.611 13.599-5.611 4.925 0 9.85 1.87 13.599 5.611 7.498 7.483 7.498 19.658 0 27.14-7.499 7.482-19.7 7.482-27.198 0zm26.78 2.696a21.094 21.094 0 0 0 3.074-3.056l2.945 3.142-3.068 3.061-2.951-3.147zm15.561 18.277L39.24 42.92l5.626-5.613L57.55 49.919l-5.626 5.614z"/>
                                <path d="M44.865 39.814l-2.477 2.471 1.224 1.222 1.253-1.25 4.777 4.767 1.224-1.222zM51.128 48.503l1.224-1.224 1.28 1.28-1.224 1.224zM9.378 42.783h1.731v1.882H9.378zM9.378 53.331h1.731v1.882H9.378zM23.634 46.412h1.731v1.882h-1.731zM48.441 30.878h1.731v1.882h-1.731zM50.405 15.89h1.731v1.882h-1.731zM56.142 23.826h1.731v1.882h-1.731z"/>
                            </g>
                        </svg>

                        <p>You will join us as a DataRobot employee and work on the tasks directly related to the
                            evolution of the product</p>
                    </div>
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60">
                            <g fill="#2D8FE2" fill-rule="nonzero">
                                <path d="M52.258 5.806v21.29H60V5.807h-7.742zm5.807 19.355h-3.871V7.741h3.87v17.42zM42.58 15.596a23.158 23.158 0 0 0-1.935-1.553v-.495h-.729a23.264 23.264 0 0 0-12.82-3.87h-.967V33.87h24.194v-.968c0-1.966-.26-3.911-.75-5.806h.75V9.677H42.58v5.92zm-14.515 16.34V11.633c2.738.126 5.406.79 7.866 1.914h-3.028v13.549h7.742v-10.58c.678.559 1.328 1.152 1.936 1.797v8.783h4.99c.446 1.578.72 3.198.795 4.838H28.065zM38.71 15.483v9.677h-3.871v-9.677h3.87zm5.806-3.871h3.871V25.16h-3.87V11.613zM7.541 37.541l8.225-8.225 1.369 1.368L8.91 38.91zM11.613 30c0-1.6-1.303-2.903-2.903-2.903A2.907 2.907 0 0 0 5.806 30c0 1.6 1.303 2.903 2.904 2.903 1.6 0 2.903-1.302 2.903-2.903zm-3.871 0a.968.968 0 1 1 1.936 0 .968.968 0 0 1-1.936 0zM16.452 34.839a2.907 2.907 0 0 0-2.904 2.903c0 1.6 1.303 2.903 2.904 2.903 1.6 0 2.903-1.302 2.903-2.903 0-1.6-1.303-2.903-2.903-2.903zm0 3.87a.968.968 0 1 1 0-1.936.968.968 0 0 1 0 1.937z"/>
                                <path d="M42.442 49.784a23.031 23.031 0 0 0 4.01-13.01v-.968H24.194V13.548h-.968c-.956 0-1.929.085-2.903.207V0H0v13.548h12.18l1.89 1.89C5.598 19.076 0 27.463 0 36.774 0 49.58 10.42 60 23.226 60c5.616 0 10.965-2.03 15.192-5.697l2.995 2.994a3.013 3.013 0 0 0 2.135.884c.774 0 1.548-.296 2.136-.884a3.024 3.024 0 0 0 0-4.272l-3.242-3.241zm-29.46-38.171H1.934V1.935h16.452V17.02l-5.406-5.406zm10.244 46.452c-11.74 0-21.29-9.551-21.29-21.29 0-8.799 5.454-16.691 13.622-19.848l4.765 4.764v-5.994c.647-.09 1.294-.16 1.935-.19v22.235h22.237a21.07 21.07 0 0 1-3.443 10.65l-1.544-1.543c.107-.438.17-.894.17-1.365a5.812 5.812 0 0 0-5.807-5.807 5.812 5.812 0 0 0-5.806 5.807 5.812 5.812 0 0 0 5.806 5.806c.471 0 .927-.063 1.365-.169l1.81 1.81c-3.857 3.305-8.718 5.134-13.82 5.134zm14.516-12.581a3.875 3.875 0 0 1-3.871 3.87A3.875 3.875 0 0 1 30 45.485a3.875 3.875 0 0 1 3.871-3.871 3.875 3.875 0 0 1 3.87 3.87zm6.574 10.445a1.085 1.085 0 0 1-1.535 0l-5.646-5.646a5.846 5.846 0 0 0 1.535-1.535l5.646 5.646a1.087 1.087 0 0 1 0 1.535z"/>
                                <path d="M3.871 3.871h12.581v1.935H3.871zM3.871 7.742h12.581v1.935H3.871zM32.903 44.516h1.935v1.935h-1.935zM24.194 44.516h1.935v1.935h-1.935zM20.323 44.516h1.935v1.935h-1.935zM16.452 44.516h1.935v1.935h-1.935z"/>
                            </g>
                        </svg>

                        <p>You will enjoy all the productivity boosts offered by Machine Learning automation and state
                            of the art ML models</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row-wrap">
                <div class="copyright">
                    <img src="<?= get_template_directory_uri(); ?>/assets/built/images/td/logo-sm.png" alt="DataRobot">
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
    <script type="text/javascript">
        jQuery('label:has(select)').addClass('dropdown-parent');

        function objectifyForm(formArray) {
            var rArray = {};
            for (var i = 0; i < formArray.length; i++) {
                rArray[formArray[i]['name']] = formArray[i]['value'];
            }
            var rJSON = JSON.stringify(rArray);
            console.log(rJSON);
            return rJSON;
        }

        function transmission_start() {
            jQuery('#error-wrap').hide();
            jQuery('#form-errors').text('');
            jQuery('.dr-form .button').prop("disabled", true);
            jQuery('.dr-form .preloader').fadeIn(150);
        }

        function transmission_stop() {
            jQuery('.dr-form .button').prop("disabled", false);
            jQuery('.dr-form .preloader').hide();
        }

        function transmission_done() {
            jQuery('.dr-form .preloader').hide();
            window.location.href = '<?= esc_url( get_field( 'redirect_url' ) ) ?: home_url( '/thank-you' ); ?>';
        }

        function submitToSF() {
            var sfReq = jQuery.ajax({
                url: "https://fbnddub87j.execute-api.us-east-1.amazonaws.com/production/forms",
                type: "POST",
                headers: {
                    "Accept": "application/json; charset=utf-8",
                    "Content-Type": "application/json; charset=utf-8"
                },
                data: objectifyForm(jQuery('#td-form').serializeArray()),
                dataType: "json",
                beforeSend: transmission_start(),
                error: function (jqXHR) {
                    console.log("Response status code: " + jqXHR.status);
                    if (jqXHR.status === 422) {
                        jQuery.each(jqXHR.responseJSON.message, function (i, val) {
                            jQuery('#' + i).addClass('validation_error');
                            jQuery('#form-errors').text(val);
                            jQuery('#error-wrap').fadeIn(150);
                        });
                        transmission_stop();
                    } else if (jqXHR.status === 500) {
                        Raven.captureMessage("SF error. Code: " + jqXHR.status);
                        transmission_done();
                    } else {
                        Raven.captureMessage("Submission error. Code: " + jqXHR.status + ". Switching to backup endpoint.");
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
                data: objectifyForm(jQuery('#td-form').serializeArray()),
                dataType: "json",
                error: function (jqXHR) {
                    console.log("SF backup Raven error");
                    Raven.captureMessage("SF backup error. Code: " + jqXHR.status);
                    transmission_done();
                },
                success: function (jqXHR) {
                    console.log("Success. Data stored at SF backup endpoint.");
                    transmission_done();
                },
            });
        }

        function submitToEloqua() {
            var elqReq = jQuery.ajax({
                url: "https://s2142644770.t.eloqua.com/e/f2",
                type: "POST",
                data: jQuery('#td-form').serialize(),
                beforeSend: transmission_start(),
                error: function (jqXHR) {
                    console.log("Error. Submission to Eloqua failed.");
                    Raven.setUserContext({
                        email: document.getElementById('emailAddress').value
                    });
                    Raven.captureMessage("Error. Submission to Eloqua failed.");
                    transmission_stop();
                },
                success: function (jqXHR) {
                    console.log("Success. Elq submission saved.");
                    transmission_done();
                },
                complete: function () {
//                    submitToSF();
                }
            });
            return elqReq;
        }

        jQuery(document).ready(function ($) {
            $('.dr-form #submittedOnUrl').val(window.location.href);

            $('.scroll-to').on('click', function (e) {
                e.preventDefault();
                var scrollTarget = $('.dr-form').offset().top - 10;
                $('body,html').animate({
                        scrollTop: scrollTarget,
                    }, 300
                );
            });

            $('input[name="company"]').autoComplete({
                minChars: 1,
                source: function (term, response) {
                    $.getJSON('https://autocomplete.clearbit.com/v1/companies/suggest', {query: term}, function (data) {
                        response(data);
                    });
                },
                renderItem: function (item, search) {
                    default_logo = 'https://s3.amazonaws.com/clearbit-blog/images/company_autocomplete_api/unknown.gif'

                    if (item.logo == null) {
                        logo = default_logo
                    } else {
                        logo = item.logo + '?size=30x30'
                    }

                    container = '<div class="autocomplete-suggestion" data-name="' + item.name + '" data-domain="' + item.domain + '" data-val="' + search + '">';
                    container += '<span class="icon"><img align="center" src="' + logo + '" onerror="this.src=\'' + default_logo + '\'"></span> ';
                    container += item.name + '<span class="domain">' + item.domain + '</span></div>';
                    return container
                },
                onSelect: function (e, term, item) {
                    $('input[name="company"]').val(item.data('name'));
                    $('input[name="website"]').val(item.data('domain'));
                }
            });

            $('select').change(function () {
                $(this).css('color', '#465275');
            });

            $('#country').change(function () {
                if ($(this).val() === "United States" || $(this).val() === "Canada") {
                    $('#stateProv').prop('disabled', false);
                } else {
                    $('#stateProv').val('').prop('disabled', true);
                }
            });

            $('input')
                .focus(function () {
                    $(this).addClass('is-focused');
                })
                .blur(function () {
                    $(this).removeClass('is-focused');
                })
                .on('keyup change', function () {
                    if ($(this).val()) {
                        $(this).removeClass('is-empty');
                    } else {
                        $(this).addClass('is-empty');
                    }
                });

            $('.dr-form form').submit(function (event) {
                event.preventDefault();

                if ($('.dr-form #stateProv').prop('disabled') === false && $('.dr-form #stateProv').val() == "") {
                    event.preventDefault();
                    $('.dr-form #stateProv').addClass('validation_error').focus(function () {
                        $(this).removeClass('validation_error');
                    });
                }

                $('.dr-form select').each(function () {
                    if ($(this).prop('disabled') === false && $(this).val() == "") {
                        $(this).addClass('validation_error');
                        $(this).focus(function () {
                            $(this).removeClass('validation_error');
                        });
                    }
                });

                $('.dr-form input[type="text"]').each(function () {
                    if ($(this).val() === "") {
                        $(this).addClass("validation_error");
                        $(this).focus(function () {
                            $(this).removeClass('validation_error');
                        });
                    }
                });

                var error_fields = jQuery(this).find(".validation_error");

                if (error_fields.length > 0) {
                    event.preventDefault();
                    return;
                }


                jQuery("input[name='campaignName']").val(gasfdc_campaign);
                jQuery("input[name='campaignSource']").val(gasfdc_source);
                jQuery("input[name='campaignMedium']").val(gasfdc_medium);
                jQuery("input[name='campaignContent']").val(gasfdc_content);
                jQuery("input[name='campaignTerms']").val(gasfdc_term);

                identifyForm({
                    'email': 'email',
                    'name': 'fullName',
                    'title': 'currentPosition',
                    'description': 'comment'
                });

                submitToEloqua();
            });


            var validator = new FormValidator('Ukraine AI Conference 092317', [{
                name: 'fullName',
                rules: 'required|min_length[2]'
            }, {
                name: 'email',
                rules: 'required|valid_email|' //callback_valid_be
            }, {
                name: 'currentPossition',
                rules: 'required|min_length[3]'
            }, {
                name: 'currentExpertise',
                rules: 'required|min_length[3]'
            }], ___event_performValidation);

            validator.registerCallback('valid_be', function (value) {
                return !!validateBusinessEmail(value);

            });
            validator.registerCallback('valid_c_name', function (value) {
                return !!validateCompany(value);

            });

            function validateBusinessEmail(email) {
                // var re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.+-]+\.edu$/g;
                // return re.test(email);
            }

            function validateCompany(comp) {
                var re = /([A-Za-z0-9\-\_]+)/g;
                return re.test(comp);
            }

            var event = window.event;

            var classNameCheckOnlyThis = 'checkOnlyThis';

            function ___event_performValidation(errors, evt) {
                jQuery('.validation_error').removeClass('validation_error');

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
<?php get_template_part( 'end' ); ?>
