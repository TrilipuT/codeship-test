<?php get_header(); ?>
<?php
$bg_photo = 'no-photo';
if (get_field('ev_banner_bg')) {
    $bg_photo = 'bg-photo';
} ?>
    <section class="single-event">
        <div class="top-banner <?php echo $bg_photo; ?>" <?php if (get_field('ev_banner_bg')) {
            echo 'style="background-image: url(' . get_field('ev_banner_bg') . ')"';
        } ?>>
            <div class="container clearfix">
                <div class="b-left clearfix">
                    <h1><?php the_title(); ?></h1>
                    <p>
					<span class="date">
						<i class="icon-calendar"></i>
                        <?php eventDateTime(); ?>
					</span>
                        <span class="place">
						<i class="icon-map-marker"></i>
                            <?php the_field('ev_address_custom_name'); ?>
                            <br>
						<a href="<?php the_field('ev_address') ?>" target="_blank">Show on Google Maps</a>
					</span>
                    </p>
                    <!-- <a href="#" class="contact-popup bg-filled-white button">Book time to talk</a> -->
                    <a href="<?php the_field('of_page_url') ?>" class="of-page button"><i class="icon-launch"></i><span>Official page</span></a>
                </div>
                <div class="b-right bottom">
                    <?php if (get_field('ev_banner_image')) {
                        echo '<img src="' . get_field("ev_banner_image") . '" alt="' . get_the_title() . '"';
                    } ?>
                </div>
            </div>
        </div>
        <div class="container clearfix">
            <div class="post-content">
                <?php if (have_posts()) while (have_posts()) : the_post(); ?>
                    <article class="post-inner">
                        <h2>About the event</h2>
                        <div class="post-text">
                            <?php the_content(); ?>
                        </div>
                        <?php if (have_rows('session')): ?>
                        <h2>Notable Sessions</h2>
                        <div class="sessions">

                            <?php while (have_rows('session')) : the_row(); ?>

                                <div class="item">
                                    <div class="item-meta clearfix">
                                        <p class="time"><i
                                                class="icon-clock"></i><?php the_sub_field('item_time_start'); ?>
                                            - <?php the_sub_field('item_time_end'); ?></p>
                                        <p class="location"><i
                                                class="icon-flag"></i><?php the_sub_field('item_location'); ?></p>
                                    </div>
                                    <div class="item-descr">
                                        <h3><?php the_sub_field('item_title'); ?></h3>
                                        <p><?php the_sub_field('item_description'); ?></p>
                                    </div>
                                </div>

                            <?php endwhile;

                            echo '</div>';

                            endif;

                            ?>

                            <?php
                            if (get_field('ev_media_contacts')) { ?>
                                <div class="media-contacts">
                                    <h2>Media Inquiries:</h2>
                                    <span><?php the_field('ev_media_contacts'); ?></span>
                                </div>
                            <?php }
                            ?>
                            <div class="social-counters">
                            </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php get_sidebar('events'); ?>
        </div>
    </section>
<?php get_template_part('parts/newsletter-form'); ?>
<?php get_footer(); ?>
<?php get_template_part('end'); ?>
