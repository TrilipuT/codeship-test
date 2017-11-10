<?php
/* Template Name: Superhero 2 LP */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="google-site-verification" content="d-L8sQWcqXG9U_ua4yroXJjGnte_X4EQaWOLHQ7aEMU" />
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/assets/built/stylesheets/sh2-lp.css'; ?>">
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
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=257592791258402&ev=PageView&noscript=1"
	/></noscript>
	<!-- DO NOT MODIFY -->
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
<body <?php body_class('sh2-lp'); ?>>
	<div class="wrapper">
		<div class="fx">
			<div class="item e-fx" id="i1">
				<img src="<?= get_template_directory_uri(); ?>/assets/built/images/sh2lp/cl_obj1.svg" alt="bgc" unselectable="on">
			</div>
			<div class="item e-fx" id="i2">
				<img src="<?= get_template_directory_uri(); ?>/assets/built/images/sh2lp/cl_obj2.svg" alt="bgc" unselectable="on">
			</div>
			<div class="item e-fx" id="i3">
				<img src="<?= get_template_directory_uri(); ?>/assets/built/images/sh2lp/cl_obj3.svg" alt="bgc" unselectable="on">
			</div>
			<div class="item e-fx" id="i4">
				<img src="<?= get_template_directory_uri(); ?>/assets/built/images/sh2lp/cl_obj4.svg" alt="bgc" unselectable="on">
			</div>
			<div class="item e-fx" id="i5">
				<img src="<?= get_template_directory_uri(); ?>/assets/built/images/sh2lp/cl_obj5.svg" alt="bgc" unselectable="on">
			</div>
			<div class="item e-fx" id="i6">
				<img src="<?= get_template_directory_uri(); ?>/assets/built/images/sh2lp/cl_obj6.svg" alt="bgc" unselectable="on">
			</div>
			<div class="item e-fx" id="i7">
				<img src="<?= get_template_directory_uri(); ?>/assets/built/images/sh2lp/cl_obj7.svg" alt="bgc" unselectable="on">
			</div>
		</div>
		<header>
			<div class="container">
				<div class="row-wrap">
					<div id="logo">
						<a href="/" title="DataRobot Homepage">
							<img src="<?= get_template_directory_uri(); ?>/assets/built/images/Logo-with-Robot.svg" alt="DataRobot">
						</a>
					</div>
	        <div class="bpf">
						<a href="#actions" class="button">
							<h1>Become a Data Science Superhero</h1>
							<span>Arditto from Traveloka Uses His Powers to Map Out the Perfect Destination</span>
						</a>
					</div>
				</div>
			</div>
		</header>

		<?php
		$pixel = get_field('tracking_code');
		$utm_param = get_field('utm_parameters');
		?>

		<section class="sh" id="<?php strToLowRep(get_the_title()); ?>">

			<div class="block_1">
				<div class="container">
					<div class="row-wrap">
						<div class="left">
							<div class="b-person">
								<figure>
									<img src="<?= get_template_directory_uri(); ?>/assets/built/images/sh2lp/arditto.png" alt="Arditto Trianggada">
								</figure>
								<div class="person">
									<div class="name">
										Arditto Trianggada
									</div>
									<div class="title">
										Data Science Superhero at Traveloka
									</div>
								</div>
							</div>
							<div class="cta">
								<a href="#actions" class="button bg-filled-blue">
									Become a Data Science Superhero
								</a>
							</div>
						</div>
						<div class="right">
							<h2>Arditto Trianggada is a data scientist with Traveloka, the hotel and flight booking platform that is shaking up the Southeast Asia travel market.</h2>
							<p>Traveloka was founded with the goal of presenting the best travel plans to each user of its popular mobile app. From the beginning, Traveloka has been dedicated to building a data-driven business. Their world-class data science team strives to develop accurate, flexible, and high-performing predictive models that create a compelling user experience for researching flights, hotels, and travel-related services.</p>
<p>But as the popularity of their mobile app grew, the Traveloka data science team were becoming victims of the company’s success. Initially, machine learning was a mostly manual process, with the team iterating on several models, trying to find the one that would result in the optimal travel plan for each customer. Results were very good, and the company was booming. </p>
						</div>
					</div>
				</div>
			</div>

			<div class="block_2">
				<div class="container">
					<div class="row-wrap left-image">
						<div class="left e-fx">
							<img src="<?= get_template_directory_uri(); ?>/assets/built/images/sh2lp/img1.jpg" alt="img1">
						</div>
						<div class="right">
							<h2>Arditto, however, was concerned about keeping up with their success.</h2>
							<p>The team was frustrated with the time required to manually tune even a limited number of models, as it hampered their ability to develop a truly agile data science environment, and caused issues like: </p>
<ul>
<li>It was impossible to keep up with all the new and promising open source models, which slowed innovation </li>
<li>Limited time for comprehensive hyperparameter tuning affected the ability to deliver the most accurate model</li>
<li>Model evaluation techniques and metrics like Confusion Matrix, RMSE, Gini, LogLoss, and AUC, were rushed or even skipped</li>
<li>Data scientists tweaked models all the way up until deployment, preventing work on other projects </li></ul>
<p>Arditto was keenly aware that their current methodology was not the best way to help his fast-paced company grow.</p>
						</div>
					</div>

					<div class="row-wrap right-image">
						<div class="left">
							<h2>Knowing automation was the key to Traveloka’s continued success, Arditto activated the DataRobot signal.</h2>
<p>DataRobot worked with Arditto and his fellow data scientists to determine how DataRobot could meet Traveloka’s needs. Early in the investigations, it became apparent that DataRobot was extremely effective in producing highly accurate models for Traveloka in very short order. </p>
<p>DataRobot enables fast development, testing, and iteration of dozens of open source models, and offers built-in evaluation tools to guarantee model performance. In addition, DataRobot delivers metrics that visually explain why a certain model is best. This, in turn, allows the data scientists to easily, and visually, communicate with management.</p>
<p>Deployment is often the most difficult step in a predictive modeling project. In Traveloka’s case, deployment requirements were forcing trade-offs between model performance and accuracy, or what they call “agility” – the ability and time required to deploy predictive models. </p>
<p>Arditto now uses the DataRobot Prediction API to deploy models into production at supersonic speed for truly agile machine learning development. This new-found agility reduces business stakeholders’ concerns about resources and delivers a positive impact to the business. It was, in fact, a major component in the decision to purchase. </p>
						</div>
						<div class="right e-fx">
							<img src="<?= get_template_directory_uri(); ?>/assets/built/images/sh2lp/img2.jpg" alt="img2">
						</div>
					</div>
				</div>
			</div>

			<div class="block_3">
				<div class="container">
					<div class="row-wrap">
						<div class="left">
							<img src="<?= get_template_directory_uri(); ?>/assets/built/images/sh2lp/hero.png" alt="DR Superhero Uncovers">
						</div>
						<div class="right">
							<h2>With DataRobot’s help, Arditto discovered his data science superpowers and is helping to foster even more superheroes at Traveloka. </h2>
							<ul>
								<li>The intuitive, easy-to-use platform allows the team to develop and deploy highly accurate predictive models at lightning speed. </li>
								<li>The new models developed by the data science team allow Traveloka to deliver the best lodging deals and most convenient travel times to their customers.</li>
								<li>Today, our superhero Arditto spends his time creating business value … not tediously refining models.</li>
							</ul>

							<div class="ref-card">
								<a href="#" data-featherlight="#refcard" data-featherlight-close-on-esc="false">
									<figure class="thumbnail">
										<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/refcard.jpg" alt="Data Science Superhero Reference Card">
										<i class="icon-magnify-plus"></i>
									</figure>
									<span>Data Science Superhero vs Mortal</span>
								</a>
								<div class="fl-lightbox" id="refcard">
									<div class="ref-table clearfix">
										<?php the_field('ref_card'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="fx">
					<div class="item pop e-fx" id="b3-i1"></div>
					<div class="item pop e-fx" id="b3-i2"></div>
					<div class="item pop e-fx" id="b3-i3"></div>
					<div class="item pop e-fx" id="b3-i4"></div>
					<div class="item z-z-zap e-fx" id="b3-i5"></div>
				</div>
			</div>

			<div class="block_4">
				<div class="fx">
					<div class="item z-z-zap e-fx" id="b4-i1"></div>
					<div class="item pop e-fx" id="b4-i2"></div>
				</div>
			</div>

			<div class="block_5">
				<div class="container">
					<div class="row-wrap">
						<div class="single">
							<blockquote>
								<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/dr.svg" alt="DR Logo">
<p>Now, Arditto and the Traveloka data science team are looking to supercharge their efforts. By producing even more accurate models, they will provide Traveloka app users an even more customized user experience. And by continually evaluating and tuning their models, and looking for additional sources of data to refine their predictions, Traveloka will continue to outpace the competition for years to come.</p>
								<p>“DataRobot had significantly reduced time spent on creating and tuning predictive models.  I’ve been able to become far more productive and get models into service more quickly than ever before – all of which helps Traveloka deliver the best travel deals to our customers.”</p>
								<footer>
									<span class="name">Arditto Trianggada</span>
									<span class="title">Data Scientist, Traveloka</span>
								</footer>
							</blockquote>
							</div>
					</div>
				</div>
			</div>

			<div class="block_6" id="actions">
				<div class="container">
					<h2>Want to become a Data Science Superhero like Arditto?</h2>
					<div class="row-wrap">
						<div class="item">
							<div class="img-wrap">
								<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/item1.png" alt="Educate Yourself">
							</div>
							<h3>Educate Yourself</h3>
							<a href="<?php the_field('button_1'); ?>" class="button bg-filled-blue" onClick="fbq('track', 'Lead');"><span>Attend DataRobot University</span></a>
						</div>
						<div class="item">
							<div class="img-wrap">
								<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/item2.png" alt="See Automated Machine Learning in Action">
							</div>
							<h3>See Machine Learning Automation in Action</h3>
							<a href="<?php the_field('button_2'); ?>" class="button bg-filled-blue" onClick="fbq('track', 'Lead');">Join a live Webinar </a>
						</div>
						<div class="item">
							<div class="img-wrap">
								<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/item3.png" alt="Find out how DataRobot can help meet your unique requirements">
							</div>
							<h3>Find out how DataRobot can help meet your unique requirements</h3>
							<a href="<?php the_field('button_3'); ?>" class="button bg-filled-blue" onClick="fbq('track', 'Lead');"><?php _e( 'Request a demo' , 'datarobot3' ) ?></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php if ($pixel) {
		  if ($utm_param) {
		    foreach ($utm_param as $item) {
		      $utm_param_assoc[$item['param']] = $item['value'];
		    }
		    if (comp_arrays($utm_param_assoc, $_GET)) {
		      echo $pixel;
		    }
		  } else {
		    echo $pixel;
		  }
		} ?>

		<?php get_footer(); ?>

		<script type="text/javascript">
		jQuery(document).ready(function($) {

			$(window).scroll( function(){
				$('.fx .pop').each(function(){
					var bottom_of_object = $(this).offset().top + $(this).outerHeight();
					var bottom_of_window = $(window).scrollTop() + $(window).height();

					if( bottom_of_window > bottom_of_object ){
							$(this).css({
								'-webkit-animation-name':'pop',
								'animation-name':'pop'
							});
					} else {
							$(this).css({
								'-webkit-animation-name':'none',
								'animation-name':'none'
							});
					}
				});
				$('.fx .z-z-zap').each(function(){
					var bottom_of_object = $(this).offset().top + $(this).outerHeight();
					var bottom_of_window = $(window).scrollTop() + $(window).height();

					if( bottom_of_window > bottom_of_object ){
							$(this).css({
								'-webkit-animation-name':'z-z-zap',
								'animation-name':'z-z-zap'
							});
					} else {
							$(this).css({
								'-webkit-animation-name':'none',
								'animation-name':'none'
							});
					}
				});
				$('.row-wrap .left, .row-wrap .right').each(function(){
					var bottom_of_object = $(this).offset().top + $(this).outerHeight() - 200;
					var bottom_of_window = $(window).scrollTop() + $(window).height();

					if( bottom_of_window > bottom_of_object ){
							$(this).find('img').animate({
								opacity: 1,
  							margin: 0,
								bottom: 0
							}, 500);
					}
				});
			});
			//$('#superhero_lp .fx .item').css('opacity','1');

			$('.cta a, .bpf a').on('click', function (e) {
	        e.preventDefault();

					topPadding = 0;

	        if($('#header-message').is(':visible')){
	        	topPadding += 60;
	        }
	        $target = $(this.hash);
	        $('html, body').stop().animate({
	            'scrollTop': $target.offset().top-topPadding
	        }, 500, 'swing');
	    });

			$('.ref-card a').on('click', function (e) {
	        e.preventDefault();

					$('body').css({
						height: "100vh",
  					overflow: "hidden"
					});

					$('.featherlight-close-icon, .featherlight').on('click', function () {
							$('body').css({
								height: "auto",
								overflow: "auto"
							});
					});
	    });
		});

		</script>

		<?php get_template_part('end'); ?>
