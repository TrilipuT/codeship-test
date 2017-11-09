<?php get_header();
global $wp_query; ?>
<section>
	<?php $upcomings = Webinar::get_upcomings();
	if ( $upcomings->have_posts() ): ?>
        <div class="upcoming-webinars">
            <div class="container">
                <h2><?php _e( 'Upcoming webinars', 'datarobot3' ); ?></h2>
                <div class="bx-nav">
                    <span id="prev"></span>
                    <span id="next"></span>
                </div>
                <div class="slides-wrapper controls--dots">
                    <ul class="slides">
						<?php while ( $upcomings->have_posts() ) {
							$upcomings->the_post();
							get_template_part( 'parts/webinar/upcoming-item' );
						} ?>
                    </ul>
                </div>
            </div>
        </div>
	<?php endif;
	if ( have_posts() ): ?>
        <div class="webinars-recordings">
            <div class="container">
                <h2><?php _e( 'On-Demand Webinars', 'datarobot3' ); ?></h2>
                <div class="content">
					<?php _e( 'Don\'t have time to catch a live webinar? Don\'t worry! Our webinars archive lets you access and view all our old webinars whenever it\'s convenient for you.', 'datarobot3' ); ?>
                </div>
                <div class="recordings list-3-columns load-more-target" data-page="2"
                     data-max_num_pages="<?= $wp_query->max_num_pages ?>">
					<?php while ( have_posts() ):
						the_post();
						get_template_part( 'parts/webinar/recording-item' );
					endwhile; ?>
                </div>
				<?php if ( $wp_query->max_num_pages > 1 ): ?>
                    <button class="load-more">
                        <span class="text"><?php _e( 'Show more recordings', 'datarobot3' ) ?></span>
						<?php get_template_part( 'parts/dr-loader' ) ?>
                    </button>
				<?php endif; ?>
            </div>
        </div>
	<?php endif; ?>
</section>
<?php get_template_part( 'parts/newsletter-form' ); ?>
<?php get_footer(); ?>
<?php get_template_part( 'end' ); ?>
