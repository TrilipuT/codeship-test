<article class="post">
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="meta clearfix">
		<div class="date"><?php the_time('F j, Y'); ?></div>
		<div class="tags"><?php the_tags('',''); ?></div>
	</div>
	<?php if(has_post_thumbnail()){ ?>
		<div class="thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		</div>
	<?php } ?>
	<div class="intro">
		<?php the_excerpt(); ?>
	</div>
	<div class="post-bottom">
		<a href="<?php the_permalink(); ?>" class="sm-filled-blue button clearfix"><span>READ MORE</span><i class="icon-angle-right" aria-hidden="true"></i></a>
		<div class="social-share"></div>
	</div>
</article>