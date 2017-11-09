<?php get_header(); ?>
<section class="text-page">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article>
				<h1><?php the_title(); ?></h1>
				<p class="last-modified">
					Last Changes to <?php the_title(); ?>: <?php echo get_the_date('F jS, Y'); ?>
				</p>
				<div class="page-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php else: echo '<article><p>No content found.</p></article>'; endif; ?>
	</div>
</section>
<?php get_footer(); ?>
<?php get_template_part('end'); ?>