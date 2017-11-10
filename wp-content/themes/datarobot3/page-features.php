<?php
/* Template Name: Features */
?>

<?php get_header(); ?>
<?php
	if ( have_posts() ) {
		the_post();
	}
?>
<section class="features" id="<?php echo strToLowRep(get_the_title()); ?>">
	<div class="top-banner" style="background-image: url(<?php the_field('banner_image'); ?>)">
		<div class="container clearfix">
			<div class="banner-content">
				<h1><?php the_field('banner_title'); ?></h1>
				<p><?php the_field('banner_text'); ?></p>
				<?php if (get_field('banner_image_mobile')) {
					$image = get_field('banner_image_mobile'); ?>
					<img src="<?php echo $image['url'] ?>" width="<?php echo ($image['width']/2); ?>" alt="<?php the_field('banner_title'); ?>" class="tb-mobile">
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="page-content">
		<div class="container">
			<div class="excerpt">
				<?php the_content(); ?>
			</div>
			<div class="b-features">
			<?php $features = get_field('features');
			if($features){
				if (is_handheld()) {
					foreach ($features as $index => $feature){ ?>
						<article id="<?php strToLowRep($feature['anchor_title']); ?>" class="feature left-image clearfix">
							<div class="b-left">
								<img src="<?php echo $feature['feature_image']; ?>" alt="<?php echo $feature['feature_title']; ?>">
							</div>
							<div class="b-right">
								<h2><?php echo $feature['feature_title']; ?></h2>
								<?php echo $feature['feature_description']; ?>
							</div>
						</article>
					<?php }
				} else {
					foreach($features as $index => $feature){ ?>
						<?php if($index%2 == 0) { ?>
							<article id="<?php strToLowRep($feature['anchor_title']); ?>" class="feature right-image clearfix">
								<div class="b-left">
										<h2><?php echo $feature['feature_title']; ?></h2>
										<?php echo $feature['feature_description']; ?>
								</div>
								<div class="b-right">
									<img src="<?php echo $feature['feature_image']; ?>" alt="<?php echo $feature['feature_title']; ?>">
								</div>
							</article>
						<?php } else { ?>
							<article id="<?php strToLowRep($feature['anchor_title']); ?>" class="feature left-image clearfix">
								<div class="b-left">
									<img src="<?php echo $feature['feature_image']; ?>" alt="<?php echo $feature['feature_title']; ?>">
								</div>
								<div class="b-right">
									<h2><?php echo $feature['feature_title']; ?></h2>
									<?php echo $feature['feature_description']; ?>
								</div>
							</article>
						<?php } ?>
					<?php }
				}
			} ?>
			</div>
		</div>
	</div>
	<?php get_template_part('parts/get-in-touch') ?>
</section>
<?php get_footer();
get_template_part( 'parts/forms/popup' );
get_template_part( 'end' ); ?>
