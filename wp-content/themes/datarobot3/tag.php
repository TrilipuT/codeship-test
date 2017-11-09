<?php get_header(); ?> 
<section class="tag archive">
	<div class="container clearfix">
		<section class="posts-roll">
			<h1>
				<?php printf('Posts with tag <em>"%s"</em>', single_tag_title('', false)); // h1 tag title ?>
			</h1>
			<?php if (have_posts()) : while (have_posts()) : the_post(); // if posts exist - start cycle ?>
				<?php get_template_part('loop'); // to output posts get loop template (loop.php) ?>
			<?php endwhile; // cycle end
				else: echo '<h2>Sorry, posts not found</h2>'; endif; // if posts not exist, show message ?>	 
			<div class="pagination">
				<?php pagination(); // show pagination, located in function.php ?>
			</div>
		</section>
		<?php get_sidebar(); // include sidebar.php ?>
	</div>
</section>
<?php get_footer(); ?>
<?php get_template_part('end'); ?>
