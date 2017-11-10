<?php
/* Template Name: Partners page */
?>

<?php get_header(); ?>
<section class="partners <?php the_field('class')?>">
	<div class="top-banner" style="background-image: url(<?php the_field('banner_image'); ?>)">
		<div class="container clearfix">
			<div class="single-col">
				<h1><?php the_field('banner_title'); ?></h1>
				<p><?php the_field('banner_text'); ?></p>
				<a href="#" class="open-popup bg-filled-blue button"><?php _e('Become a partner', 'datarobot3'); ?></a>
			</div>
		</div>
	</div>
	<div class="page-content">
		<div class="container">
			<?php $fp = get_field('partners'); ?>
			<?php if($fp){ ?>
				<div class="featured-p">
					<?php if ( get_field('class') !== 'technology') : ?>
						<h2>Featured Partners</h2>
					<?php endif; ?>
					<div class="item-wrap">
						<?php foreach ($fp as $item) {
							$image = $item['logo']; ?>

							<div class="item">
								<div class="logo">
									<img src="<?php echo $image['url']; ?>" width="<?php echo($image['width'] / 2); ?>" alt="DataRobot Partner">
								</div>
								<div class="description">
									<p><?php echo $item['description']; ?></p>
								</div>
								<?php if ($item['link_type']) : ?>
									<?php if( $item['link_type'] == 'link' ) : ?>
									<?php if ($item['link']) : ?>
										<a href="<?= $item['link']; ?>">
											<i class="icon-circle-right"></i>
											<span><?php _e('Learn more', 'datarobot3'); ?></span>
										</a>
									<?php endif; ?>
										<?php  elseif( $item['link_type'] == 'external' ) : ?>
									<?php if ($item['external']) : ?>
										<a href="<?= $item['external']; ?>" target="_blank">
											<i class="icon-circle-right"></i>
											<span><?php _e('Learn more', 'datarobot3'); ?></span>
										</a>
									<?php endif; ?>
									<?php endif; ?>
								<?php endif; ?>
							</div>

						<?php } ?>
					</div>
				</div>
			<?php } ?>

			<?php if ( get_field('class') !== 'technology') : ?>
			<?php $pp = get_field('programs'); ?>
			<?php if($pp){ ?>
				<div class="p-programms">
					<h2>Which is the right partner program for you?</h2>
					<div class="item-wrap">
						<?php foreach ($pp as $item) { ?>

							<div class="item">
								<h3><?php echo $item['title']; ?></h3>
								<p><?php echo $item['text']; ?></p>
								<?php if ($item['programms_link']) : ?>
									<a href="<?= $item['programms_link']; ?>">
										<i class="icon-circle-right"></i>
										<span><?php _e('Learn more', 'datarobot3'); ?></span>
									</a>
								<?php endif; ?>
							</div>

						<?php } ?>
					</div>
				</div>
			<?php } ?>

			<?php $pe = get_field('f_post'); ?>
			<?php if($pe){ ?>
				<div class="p-ecosystem">
					<h2>What's happening in the DataRobot partner ecosystem</h2>
					<div class="item-wrap clearfix">
						<div class="featured-post">
							<?php
							$post = $pe;
							setup_postdata( $post );
							?>
							<article class="f-post-item">
								<div class="thumbnail">
									<?php if (has_post_thumbnail()) { ?>
	                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	                <?php } else { ?>
										<a href="<?php the_permalink(); ?>"><img src="<?= get_template_directory_uri(); ?>/assets/built/images/post-thumbnail.jpg" alt="Post thumbnail" title="<?php the_title(); ?>"></a>
									<?php } ?>
								</div>
	              <div class="post-cover">
	                <div class="category-label">
	                  <div class="label-bg"></div>
	                  <?php the_category(', '); ?>
	                </div>
	                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	                <div class="meta">
	                  <span><?php the_time('M j, Y'); ?></span>
										<a href="<?php the_permalink(); ?>" class="sm-filled-blue button"><span><?php _e('Read more', 'datarobot3'); ?></span><i class="icon-chevron-right"></i></a>
	                </div>
	              </div>
	            </article>
							<?php wp_reset_postdata(); ?>
						</div>

						<?php $rp = get_field('r_posts'); ?>
						<?php	if ($rp){ ?>
							<div class="related-posts">
								<?php foreach ($rp as $post){ setup_postdata( $post ); ?>
										<article class="r-post-item">
											<a href="<?php the_permalink(); ?>" class="transition"><?php the_title(); ?></a>
											<div class="meta">
												<i class="icon-calendar"></i>
												<span><?php the_time('M j, Y'); ?></span>
											</div>
										</article>
								<?php } ?>
								<?php wp_reset_postdata(); ?>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
			<?php endif; ?>
		</div>
	</div>
	<?php get_template_part( 'parts/get-in-touch' ) ?>
</section>
<?php get_footer();
get_template_part('parts/forms/popup');
get_template_part('end'); ?>
