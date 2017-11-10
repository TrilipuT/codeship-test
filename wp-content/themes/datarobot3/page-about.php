<?php
/* Template Name: About us */
?>

<?php get_header(); ?>

<section class="about-us">
	<div class="top-banner" style="background-image: url(<?php the_field('banner_image'); ?>)">
		<div class="container clearfix">
			<div class="banner-content">
				<h1><?php the_field('banner_title'); ?></h1>
				<p><?php the_field('banner_text'); ?></p>
			</div>
		</div>
	</div>
	<div class="page-content">
		<div class="top-records">
			<div class="container">
                <h2><?php _e( 'DataRobot\'s world-class Data Scientists', 'datarobot3' ) ?></h2>
				<div class="record-wrap">

				<?php
					$rows = get_field('dr_records');
					foreach($rows as $row){ ?>
						<div class="record" style="background-image: url(<?php echo $row['bg_image']['url']; ?>);">
							<span><?php echo $row['big_number']; ?></span>
							<p><?php echo $row['description']; ?></p>
						</div>
				<?php } ?>

				</div>
			</div>
		</div>
		<div class="customer-testimonials"><?php  ?>
				<h2><?php _e( 'What our customers are saying', 'datarobot3' ) ?></h2>

				<div class="quote-slider">
					<?php

					$quotes = get_field('quotes');

					if($quotes){
						echo '<ul>';
						if (is_handheld()) {
								foreach($quotes as $quote){ ?>
									<li>
										<div class="item">
											<blockquote>
												<p><?php echo $quote['quote_text']; ?></p>
												<footer>
													<span class="name"><?php echo $quote['quote_author']; ?></span>
												</footer>
											</blockquote>
										</div>
									</li>
								<?php }
						} else {
							foreach (array_chunk($quotes, 4) as $slide){
								echo '<li>';
								foreach($slide as $quote){ ?>
									<div class="item">
										<blockquote>
											<p><?php echo $quote['quote_text']; ?></p>
											<footer>
												<span class="name"><?php echo $quote['quote_author']; ?></span>
											</footer>
										</blockquote>
									</div>
								<?php }
								echo '</li>';
							}
						}
						echo '</ul>';
					} ?>
					<div class="bullets"></div>
				</div>
				<script type="text/javascript">
                    jQuery(document).ready(function ($) {
                        jQuery('.quote-slider ul').bxSlider({
                            mode: 'horizontal',
                            speed: 300,
                            pagerSelector: '.bullets',
                            controls: false,
                            infiniteLoop: false
                        });

                        if (jQuery('.quote-slider li').length === 1) {
                            jQuery('.bullets').hide();
                        }
                    });
				</script>
		</div>
		<div class="expertise">
			<div class="container">
				<h2><?php _e( 'Real world experience and expertise from:', 'datarobot3' ) ?></h2>
					<?php
						$rows = get_field('companies');

							echo "<ul class=\"logos\">";

							foreach($rows as $company){
								$image = $company['logo'];
								echo '<li><img src="'.$image['url'].'" width="'.($image['width']/2).'" alt="'.$company['name'].'"></li>';
							}

							echo "</ul>";
					?>
			</div>
		</div>
		<?php get_template_part('parts/get-in-touch') ?>
	</div>
</section>
<?php get_footer(); ?>
<?php get_template_part('parts/forms/popup') ?>
<?php get_template_part('end'); ?>
