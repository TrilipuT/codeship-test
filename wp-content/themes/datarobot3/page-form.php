<?php
/* Template Name: Form test page */
?>

<?php get_header(); ?>
<section class="text-page">
	<div class="container">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<div class="post-content">
					<?php the_content(); ?>
          <div class="form" style="width:600px; margin:0 auto;">
						<div class="b-form">
								<div class="dr-form form-orange">
								<?php $submit_color = 'blue'; ?>
            		<?php include(locate_template('includes/form-constructor.php')); ?>
          			</div>
          	</div>
          </div>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
</section>
<?php get_footer(); ?>
<div class="popup transition">
	<div class="form-wrap">
		<div class="popup-close transition">
			<i class="icon-close"></i>
		</div>
		<div class="form-title">
			<h3></h3>
		</div>
		<div class="b-form">
				<div class="dr-form form-orange">
    <?php get_template_part('includes/form-constructor'); ?>
				</div>
		</div>
	</div>
</div>
<?php get_template_part('end'); ?>
