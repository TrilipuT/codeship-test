<?php
/* Template Name: Webinar LP */
?>
<?php get_header('guide'); ?>
<section class="guide webinar">
	<div class="top-block">
		<div class="container">
			<div class="wrap-left">
				<h1>Executives: The New Drivers of Data Science</h1>
			</div>
			<div class="wrap-right">
				<div class="event-details">
					<h2>Event Details</h2>
					<p>
						<strong>Webinar recording available for viewing</strong>
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="main-block">
		<div class="container">
			<article class="guide-info">
				<div class="b-info clearfix">
					<p>Claim your spot in this webinar to discover:</p>
					<ul>
						<li>
							<span><img src="<?= get_template_directory_uri(); ?>/assets/built/images/oval-blue.png" alt='list'></span>
							How business knowledge and domain expertise drive world-class data science teams
						</li>
						<li>
							<span><img src="<?= get_template_directory_uri(); ?>/assets/built/images/oval-blue.png" alt='list'></span>
							What types of business challenges are best addressed with data science and how automation will drive results
						</li>
						<li>
							<span><img src="<?= get_template_directory_uri(); ?>/assets/built/images/oval-blue.png" alt='list'></span>
							Why you need to generate advocacy for data science throughout your organization
						</li>
						<li>
							<span><img src="<?= get_template_directory_uri(); ?>/assets/built/images/oval-blue.png" alt='list'></span>
							How automated machine learning will help you democratize data science beyond data scientists
						</li>
						<li>
							<span><img src="<?= get_template_directory_uri(); ?>/assets/built/images/oval-blue.png" alt='list'></span>
							Real-world examples of how data science and machine learning have increased revenues, reduced costs and improved key metrics in companies like yours
						</li>
					</ul>
				</div>
				<div class="bt-form">
					<script type="text/javascript" src="https://www.brighttalk.com/clients/js/embed/embed.js"></script>
					<object class="BrightTALKEmbed" width="600" height="450">
					    <param name="player" value="webcast_player"/>
					    <param name="domain" value="https://www.brighttalk.com"/>
					    <param name="channelid" value="14217"/>
					    <param name="communicationid" value="219937"/>
					    <param name="autoStart" value="false"/>
					    <param name="theme" value="generic.swf"/>
					</object>
				</div>
			</article>
		</div>
	</div>
</section>
<?php get_footer('guide'); ?>