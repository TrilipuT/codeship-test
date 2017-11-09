<?php get_header(); ?>
<section class="text-page">
	<div class="container">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<div class="post-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
</section>
<?php get_footer(); ?>
<?php get_template_part('end'); ?>