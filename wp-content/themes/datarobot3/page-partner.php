<?php
/* Template Name: Partner page */
?>

<?php get_header(); ?>
<section class="partner">
	<div class="top-banner" style="background-image: url(<?php the_field('banner_image'); ?>)">
		<div class="container clearfix">
			<div class="b-left">
				<h1><?php the_field('banner_title'); ?></h1>
				<p><?php the_field('banner_text'); ?></p>
				<a href="#" class="open-popup bg-filled-blue button">Contact us for a demo</a>
			</div>
			<div class="b-right">
			<div class="media-wrap">
				<?php the_field('banner_video'); ?>
			</div>
			</div>
		</div>
	</div>
	<div class="page-content">
		<div class="main-descr">
			<div class="container">
				<div class="before-slider">
					<div class="top-row clearfix">
						<p><?php the_field('main_top'); ?></p>
						<figure>
							<?php if (get_field('partner_logo')) {
								$image = get_field('partner_logo'); ?>
								<img src="<?php echo $image['url']; ?>" width="<?php echo ($image['width']/2); ?>" alt="<?php the_field('banner_title'); ?>">
							<?php } ?>
						</figure>
					</div>
					<div class="bottom-row">
						<div>
							<p><?php the_field('text_column_1'); ?></p>
						</div>
						<div>
							<p><?php the_field('text_column_2'); ?></p>
						</div>
					</div>
				</div>
				<?php $slides = get_field('slides');
				if($slides){ ?>
					<div class="partner-slider">
						<div class="container">
							<div class="slider-wrap">
								<ul>
									<?php foreach($slides as $slide){
										if($slide['slide_link']){ ?>
											<li>
												<a href="<?php echo $slide['slide_link']; ?>">
													<img src="<?php echo $slide['slide']; ?>" alt="Screenshot">
												</a>
											</li>
										<?php } else { ?>
											<li>
												<img src="<?php echo $slide['slide']; ?>" alt="Screenshot">
											</li>
										<?php }
									} ?>
								</ul>
								<div class="controls">
									<div class="bullets clearfix"></div>
								</div>
							</div>
						</div>
					</div>
					<script type="text/javascript">
                        jQuery(document).ready(function ($) {
                            jQuery('.partner-slider ul').bxSlider({
                                speed: 300,
                                pagerSelector: '.partner-slider .bullets',
                                prevSelector: '.partner-slider .controls',
                                nextSelector: '.partner-slider .controls',
                                prevText: '<i class=\"icon-slider-prev\"></i><span>Previous</span>',
                                nextText: '<span>Next</span><i class=\"icon-slider-next\"></i>',
                                moveSlides: 1
                            });

                            if (jQuery('.quote-slider li').length === 1) {
                                jQuery('.bullets').hide();
                            }
                        });
				</script>
				<?php } ?>
				<div class="after-slider">
					<p><?php the_field('below_the_slider'); ?></p>
				</div>
			</div>
		</div>
		<?php $features = get_field('features');
		if($features){ ?>
			<div class="partner-features">
				<div class="container">
					<div class="col-wrap">
					<?php foreach($features as $feature){ ?>
						<div class="col">
							<div class="feature-icon">
								<img src="<?php echo $feature['icon']['url']; ?>" width="<?php echo ($feature['icon']['width']/2); ?>" alt="<?php echo $feature['title']; ?>">
							</div>
							<div class="feature-text">
								<h3><?php echo $feature['title']; ?></h3>
								<p><?php echo $feature['text']; ?></p>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>

		<div class="press-release">
			<div class="container">
				<div class="logo-img">
					<img src="<?php the_field('pr_image'); ?>" alt="<?php the_field('banner_title'); ?>">
				</div>
				<div class="pr-title">
					<p><?php the_field('pr_title'); ?></p>
					<a href="<?php the_field('pr_link'); ?>"><i class="icon-circle-right"></i>Read press release</a>
				</div>
			</div>
		</div>
		<div class="get-app">
			<div class="container">
				<div class="app-link">
					<p><?php the_field('links_block_text'); ?></p>
					<a href="<?php the_field('get_link'); ?>" class="bg-filled-blue button"><?php the_field('get_text'); ?></a>
					<a href="<?php the_field('download_link'); ?>" class="download">
						<i class="icon-download"></i>
						<span><?php the_field('download_text'); ?></span>
					</a>
				</div>
				<p>Have any questions? Drop us a line at <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
			</div>
		</div>
	</div>
</section>
<?php get_footer();
get_template_part('parts/forms/popup');
get_template_part('end'); ?>
