<?php
/* Template Name: Superhero LP */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="google-site-verification" content="d-L8sQWcqXG9U_ua4yroXJjGnte_X4EQaWOLHQ7aEMU" />
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/assets/built/stylesheets/sh-lp.css'; ?>">
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
<body <?php body_class('sh-lp'); ?>>
	<div class="wrapper">
		<div class="fx">
			<div class="item e-fx" id="i1">
				<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/cl_obj1.svg" alt="bgc" unselectable="on">
			</div>
			<div class="item e-fx" id="i2">
				<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/cl_obj2.svg" alt="bgc" unselectable="on">
			</div>
			<div class="item e-fx" id="i3">
				<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/cl_obj3.svg" alt="bgc" unselectable="on">
			</div>
			<div class="item e-fx" id="i4">
				<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/cl_obj4.svg" alt="bgc" unselectable="on">
			</div>
			<div class="item e-fx" id="i5">
				<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/cl_obj5.svg" alt="bgc" unselectable="on">
			</div>
			<div class="item e-fx" id="i6">
				<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/cl_obj6.svg" alt="bgc" unselectable="on">
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
						<h1>Become a Data Science Superhero</h1>
						<span>Follow the path of Nathan from Symphony Post Acute Network</span>
					</div>
				</div>
			</div>
		</header>

		<?php
		$pixel = get_field('tracking_code');
		$utm_param = get_field('utm_parameters');
		?>
		
		<section class="sh" id="<?php echo strToLowRep(get_the_title()); ?>">

			<div class="block_1">
				<div class="container">
					<div class="row-wrap">
						<div class="left">
							<div class="b-person">
								<figure>
									<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/nathan.jpg" alt="Nathan Patrick Taylor">
								</figure>
								<div class="person">
									<div class="name">
										Nathan Patrick Taylor
									</div>
									<div class="title">
										Data Science Superhero at Symphony Post Acute Network
									</div>
								</div>
							</div>
							<div class="cta">
								<a href="#actions" class="button">
									<span>Become<br> a Data Science<br> Superhero Today</span>
									<i class="icon-long-arrow-down"></i>
								</a>
							</div>
						</div>
						<div class="right">
							<h2>Data Scientist Nathan Patrick Taylor worked tirelessly, building model after model to improve the lives of healthcare patients.</h2>
							<p>Nathan is a Data Scientist with years of experience in healthcare analytics. With an in-depth knowledge of healthcare informatics and health insurance, he also understands how to optimize legacy processes that link the old world to the new - Nathan is extremely savvy when it comes to applying machine learning to healthcare.</p>
							<p>Like any good Data Scientist, Nathan uses data to complete previously impossible tasks. For example, he builds models that predict which patients are likely to fall after their care ends, or might develop infections, allowing Symphony to head off complications before they happen. Nathan’s deep insights help Symphony provide the best level of care to their patients while reducing overall healthcare costs.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="block_2">
				<div class="container">
					<div class="row-wrap left-image">
						<div class="left e-fx">
							<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/img1.jpg" alt="img1">
							<p>Prior to DataRobot, the machines were holding Nathan back.</p>
						</div>
						<div class="right">
							<h2>However traditional modeling methods prevented Nathan from attacking as many predictive challenges as he would like.</h2>
							<p>Manually building predictive models was time-consuming, resulting in persistent issues, such as:</p>
							<ul>
								<li>Lengthy trial and error testing with each model update</li>
								<li>Difficulty keeping up with the latest open-source machine learning algorithms</li>
								<li>Introducing the possibility of coding errors when deploying models to production</li>
								<li>An inability to address all of the requests for modeling projects from other groups at Symphony</li>
							</ul>
							<p>This manual process seemed flawed to Nathan. Surely these problems could be solved with technology?</p>
							<div class="ref-card">
								<a href="#" data-featherlight="#refcard" data-featherlight-close-on-esc="false">
									<figure class="thumbnail">
										<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/refcard.jpg" alt="Data Science Superhero Reference Card">
										<i class="icon-magnify-plus"></i>
									</figure>
									<span>See How Data Science Superheroes Differ from Mere Mortals!</span>
								</a>
								<div class="fl-lightbox" id="refcard">
								  <div class="ref-table clearfix">
								    <?php the_field('ref_card'); ?>
								  </div>
								</div>
							</div>
						</div>
					</div>

					<div class="row-wrap right-image">
						<div class="left">
							<h2>After years of being hampered by manual processes, Nathan yearned for a better way. In 2016, he activated the distress signal that summoned DataRobot.</h2>
							<p>After seeing a DataRobot demo, Nathan realized he found the answer to his technology challenges. Seamless integration with Alteryx, and the ability to connect to historical data in lots of different ways, removed any doubt and sealed the deal. He became an official DataRobot user in December 2016 — and by pushing productivity through the roof, he became a Data Science Superhero!</p>
							<p>The DataRobot machine learning automation platform captures the knowledge, experience and best practices of the world’s leading data scientists to deliver unmatched levels of automation and ease-of-use for Symphony’s machine learning initiatives. DataRobot enables Nathan to build and deploy highly accurate machine learning models in a fraction of the time he spent with traditional, manual modeling methods.</p>
						</div>
						<div class="right e-fx">
							<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/img2.jpg" alt="img2">
						</div>
					</div>
				</div>
			</div>

			<div class="block_3">
				<div class="container">
					<div class="row-wrap">
						<div class="left">
							<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/hero.png" alt="DR Superhero Uncovers">
						</div>
						<div class="right">
							<h2>With DataRobot at his side, Nathan is driving a far more ambitious predictive analytics agenda at Symphony Post Acute Network. He now:</h2>
							<ul>
								<li>Quickly builds predictive models in hours or days (instead of weeks)</li>
								<li>Deploys models through an easy-to-use, enterprise-ready deployment API</li>
								<li>Delivers more accurate results that drive cost savings and generate revenue, while offering the transparency to explain these models to his colleagues</li>
							</ul>
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
				<div class="container">
					<div class="row-wrap">
						<div class="single">
							<h2>Next steps for Nathan? He’s going to tackle even bigger challenges,</h2>
							<p>like lowering malpractice insurance rates to help lower healthcare costs and helping to prevent opioid addictions for patients who require painkillers. By delivering better predictions for Symphony, Nathan is impacting the company’s bottom line performance — and boosting his reputation in the process. Best of all, with DataRobot, Nathan has achieved his personal goal of leveraging machine learning to solve problems that affect real people and improve their lives!</p>
						</div>
					</div>
				</div>
				<div class="fx">
					<div class="item z-z-zap e-fx" id="b4-i1"></div>
					<div class="item pop e-fx" id="b4-i2"></div>
				</div>
			</div>

			<div class="block_5">
				<div class="container">
					<div class="row-wrap">
						<div class="single">
							<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/batman.svg" alt="DR Superhero">
							<blockquote>
								<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/dr.svg" alt="DR Logo">
								<p>“DataRobot’s platform makes my work exciting, my job fun, and the results more accurate and timely — it’s almost like magic.”</p>
								<footer>
									<span class="name">Nathan Patrick Taylor</span>
									<span class="title">VP Analytics Strategy, Symphony Post Acute Network</span>
								</footer>
							</blockquote>
							</div>
					</div>
				</div>
			</div>

			<div class="block_6" id="actions">
				<div class="container">
					<h2>Want to become a Data Science Superhero like Nathan?</h2>
					<div class="row-wrap">
						<div class="item">
							<div class="img-wrap">
								<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/item1.png" alt="Educate Yourself">
							</div>
							<h3>Educate Yourself</h3>
							<a href="https://www.datarobot.com/education/" class="button bg-filled-blue" onClick="fbq('track', 'Lead');"><span>Attend DataRobot University</span></a>
						</div>
						<div class="item">
							<div class="img-wrap">
								<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/item2.png" alt="See Automated Machine Learning in Action">
							</div>
							<h3>See Machine Learning Automation in Action</h3>
							<a href="https://www.datarobot.com/superhero-webinar-registration/?utm_source=Web&utm_campaign=DRSUPER072517e" class="button bg-filled-blue" onClick="fbq('track', 'Lead');">Join a live Webinar </a>
						</div>
						<div class="item">
							<div class="img-wrap">
								<img src="<?= get_template_directory_uri(); ?>/assets/built/images/shlp/item3.png" alt="Find out how DataRobot can help meet your unique requirements">
							</div>
							<h3>Find out how DataRobot can help meet your unique requirements</h3>
							<a href="https://www.datarobot.com/request-a-demo/" class="button bg-filled-blue" onClick="fbq('track', 'Lead');">Request a demo</a>
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

			var sh_url = location.href.split('?');
			console.log(sh_url);
			var url_param = '?utm_source=website&utm_campaign=SUPERHEROES';
			if (sh_url.length > 1) {
				url_param = '?' + sh_url[1];
			}
			console.log(url_param);
			$('#actions a').each(function(){
				var uwp = $(this).attr('href') + url_param;
				console.log(uwp);
				$(this).attr('href', uwp);
			});

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

			$('.cta a').on('click', function (e) {
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
