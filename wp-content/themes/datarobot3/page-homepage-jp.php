<?php
/* Template Name: Homepage JP */
?>

<?php
	get_header();
?>
<section class="homepage">
	<div class="top-block" style="background-image: url(<?php the_field('bg_image'); ?>);">
		<div class="container">
			<div class="video clearfix">
				<div class="video-text">
					<h1><?php the_field('banner_text'); ?></h1>
					<a href="<?php the_field('get_started_link'); ?>" class="bg-filled-blue button" data-type="Request a demo"><?php _e('See how', 'datarobot3'); ?></a>
					<div class="watch-v transition">
						<i class="icon-play-circle-outline"></i><?php the_field('video'); ?>
					</div>
				</div>
			</div>
			<?php
			if( have_rows('logos') ): ?>
				<div class="logos">
					<div class="logos-row">
					<?php while ( have_rows('logos') ) : the_row();
					    	$image = get_sub_field('logo_image'); ?>
					        <img src="<?php echo $image['url'] ?>" width="<?php echo ($image['width']/2); ?>" alt="DR technologies">
					<?php endwhile; ?>
					</div>
					<p><?php the_field('text_under_logos'); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="roles">
		<div class="container">
			<h2>職種別ご利用事例</h2>
			<div class="role-buttons" data-hj-ignore-attributes>
				<?php
				if( have_rows('role') ):
				    while ( have_rows('role') ) : the_row(); ?>

				        <div class="item transition01 button hover-light">
							<a href="<?php the_sub_field('link'); ?>">
								<div class="role-image">
									<?php $image = get_sub_field('image');?>
									<img src="<?php echo $image["url"]; ?>" width="<?php echo ($image["width"] / 2); ?>" alt="DR">
								</div>
								<div class="title">
									<span><?php the_sub_field('title'); ?></span>
								</div>
								<div class="persona-more">
									<i class="icon-circle-right"></i>
									<span>View</span>
								</div>
							</a>
						</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
	<?php if(get_field('announcement_image')) : ?>
		<div class="announcement">
			<div class="container">
				<div class="b-left">
					<div class="ann-img"><img src="<?php the_field('announcement_image'); ?>">
						<div class="ann-label"><span>Announcement</span></div>
					</div>
					<div class="ann-title">
						<?php $post_objects = get_field('announcement');
						if($post_objects) : ?>
							<?php foreach ($post_objects as $post) : ?>
								<?php setup_postdata($post);?>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="meta sm clearfix">
									<?php if (in_category('events')) { ?>
										<div class="date">
											<i class="icon-calendar" style="display: block;margin-right: 10px;float: left;"></i>
											<?php eventDateTime(); ?>
										</div>
									<?php } else { ?>
										<div class="meta-info">
											<div class="date"><?php the_time('F j, Y'); ?> </div>
											<div class="cat"><span>&nbsp;in&nbsp;</span><?php the_category(', '); ?>
											</div>
										</div>
									<?php } ?>
									<div class="button-wrap">
										<a href="<?php the_permalink(); ?>" class="sm-filled-blue button clearfix">
											<span>READ MORE</span><i class="icon-angle-right" aria-hidden="true"></i>
										</a>
									</div>
								</div>
							<?php endforeach; ?>
							<?php wp_reset_postdata();?>
						<?php endif;?>
					</div>
				</div>
				<div class="b-right">
					<h2>What’s new</h2>
					<div class="latest-posts">
						<?php $post_objects = get_field('latest_posts');
						if( $post_objects ): ?>
							<?php foreach ($post_objects as $post) : ?>
								<?php setup_postdata($post); ?>
								<div class="single-post">
									<p class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
									<div class="meta sm clearfix">
										<?php if (in_category( 'events' )) { ?>
											<div class="date">
												<i class="icon-calendar" style="display: block;margin-right: 10px;float: left;"></i>
												<?php eventDateTime(); ?>
											</div>
										<?php } else { ?>
											<div class="date"><?php the_time('F j, Y'); ?> </div>
											<div class="cat"><span>&nbsp;in&nbsp;</span><?php the_category(', '); ?></div>
										<?php } ?>
									</div>
								</div>
								 <?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif;?>
	<div class="mbp">
		<div class="container">
			<h2>モデル生成のプロセス</h2>
			<p>日々増ていく機械学習アルゴリズムの世界に追いつくのは簡単です。</p>
			<div class="ba-slider">
				<div class="new-way resize">
					<img src="<?php the_field('image_after'); ?>" alt="With DataRobot">
				</div>
				<div class="old-way resize2">
				   <img src="<?php the_field('image_before'); ?>" alt="Old way">
				</div>
				<span class="handle"></span>
			</div>
			<div class="contact-b">
				<a href="/product" class="bg-filled-white button">もっと詳しく</a>
			</div>
		</div>
		<script type="text/javascript">
				jQuery('.ba-slider').beforeAfter();
				setInterval(handleAnimation, 5000);

			function handleAnimation() {
				jQuery('.handle').each(function () {
					if (jQuery(this).is(':visible')) {
						if (jQuery('.mbp').hasClass('hover-shake')) {
							jQuery('.mbp').removeClass('hover-shake')
						} else {
							jQuery('.mbp').addClass('hover-shake');
							if (jQuery('.handle').hasClass('draggable')) {
								jQuery('.mbp').removeClass('hover-shake')
							}
						}
					}
				});
			}
		</script>
	</div>
</section>
<?php get_footer(); ?>
<?php get_template_part('end'); ?>
