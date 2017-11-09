<?php
/* Template Name: Thank you */
?>
<?php get_header(); ?>
<?php
$pixel = get_field('tracking_code');
$utm_param = get_field('utm_parameters');
?>
<section class="thank-you">
	<div class="container">
		<div class="ty-message">
			<h1><?php _e('Thank you!', 'datarobot3'); ?></h1>
			<p><?php _e('We will contact you shortly.', 'datarobot3'); ?></p>
			<a href="<?php if (function_exists('pll_home_url')) { echo pll_home_url(); } else { echo '/'; } ?>" class="bg-filled-blue button"><?php _e('Go to the homepage', 'datarobot3'); ?></a>
		</div>
	</div>
</section>
<script>
    fbq('track', 'Lead');
</script>
<?php $shcp = array("utm_source"=>"google", "utm_medium"=>"cpc", "utm_campaign"=>"SUPERHERODISP"); ?>
<?php if ($pixel) {
	if ($utm_param) {
		foreach ($utm_param as $item) {
			$utm_param_assoc[$item['param']] = $item['value'];
		}
		if (comp_arrays($utm_param_assoc, $_GET)) {
			echo $pixel;
		} elseif (comp_arrays($shcp, $_GET)) {
			echo '<!-- Google Code for SF Form Submit - Superheroes Conversion Page -->
						<script type="text/javascript">
						/* <![CDATA[ */
						var google_conversion_id = 974430488;
						var google_conversion_language = "en";
						var google_conversion_format = "3";
						var google_conversion_color = "ffffff";
						var google_conversion_label = "fXFFCPuJ8HMQmMLS0AM";
						var google_remarketing_only = false;
						/* ]]> */
						</script>
						<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
						</script>
						<noscript>
						<div style="display:inline;">
						<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/974430488/?label=fXFFCPuJ8HMQmMLS0AM&amp;guid=ON&amp;script=0"/>
						</div>
						</noscript>';
		}
	} else {
		echo $pixel;
	}
} ?>
<?php get_footer(); ?>
<?php get_template_part('end'); ?>
