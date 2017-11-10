<?php
/* Template Name: Homepage */
?>

<?php get_header(); ?>
<section class="homepage">
    <div class="top-block" style="background-image: url(<?php the_field('bg_image'); ?>);">
        <div class="container">
            <div class="video clearfix">
                <div class="video-text">
                    <h1><?php the_field('banner_text'); ?></h1>
                    <a href="<?php the_field('get_started_link'); ?>" class="bg-filled-blue button"
                       data-type="<?php _e('Request a demo', 'datarobot3'); ?>"><?php _e('See DataRobot in Action!', 'datarobot3'); ?></a>
                    <div class="watch-v transition">
                        <i class="icon-play-circle-outline"></i><?php the_field('video'); ?>
                    </div>
                </div>
            </div>
            <?php
            if (have_rows('logos')): ?>
                <div class="logos">
                    <div class="logos-row">
                        <?php while (have_rows('logos')) : the_row();
                            $image = get_sub_field('logo_image'); ?>
                            <img src="<?php echo $image['url'] ?>" width="<?php echo($image['width'] / 2); ?>"
                                 alt="<?php _e('DR technologies', 'datarobot3'); ?>">
                        <?php endwhile; ?>
                    </div>
                    <p><?php the_field('text_under_logos'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="roles">
        <div class="container">
            <h2><?php _e('DataRobot works for...', 'datarobot3'); ?></h2>
            <div class="role-buttons" data-hj-ignore-attributes>
                <?php
                if (have_rows('role')):
                    while (have_rows('role')) : the_row(); ?>

                        <div class="item transition01 button hover-light">
                            <a href="<?php the_sub_field('link'); ?>">
                                <div class="role-image">
                                    <?php $image = get_sub_field('image'); ?>
                                    <img src="<?php echo $image["url"]; ?>" width="<?php echo($image["width"] / 2); ?>"
                                         alt="<?php esc_attr(get_sub_field('title')); ?>">
                                </div>
                                <div class="title">
                                    <span><?php the_sub_field('title'); ?></span>
                                </div>
                                <div class="persona-more">
                                    <i class="icon-circle-right"></i>
                                    <span><?php _e('View', 'datarobot3'); ?></span>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
	<?php if ( $link = get_field( 'sh_link' ) ): ?>
        <div class="superhero-banner">
            <div class="container">
                <img src="<?= get_template_directory_uri() ?>/assets/built/images/homepage/superhero-crest.png" alt="Superhero"
                     class="superhero-img">
                <a href="<?= $link ?>">
                    <span><?php _e( 'Check out the story of two real life Data Science Superheroes!', 'datarobot3' ); ?></span>
                    <svg width="25" height="8" viewBox="0 0 25 8">
                        <polygon fill="#2D8FE2"
                                transform="translate(-1018 -1196)translate(0 1170)translate(1030.5 30)rotate(-180)translate(-1030.5 -30)"
                                points="1043 29.2 1021.2 29.2 1023.2 27.2 1022 26 1018 30 1022 34 1023.2 32.8 1021.2 30.8 1043 30.8"/>
                    </svg>
                </a>
            </div>
        </div>
	<?php endif; ?>
	<?php get_template_part( 'parts/homepage/service-info' ); ?>
    <?php if (get_field('announcement_image')) : ?>
        <div class="announcement">
            <div class="container">
                <div class="b-left">
                    <div class="ann-img"><img src="<?php the_field('announcement_image'); ?>">
                        <div class="ann-label"><span><?php _e('Announcement', 'datarobot3'); ?></span></div>
                    </div>
                    <div class="ann-title">
                        <?php $post_objects = get_field('announcement');
                        if ($post_objects) : ?>
                            <?php foreach ($post_objects as $post) : ?>
                                <?php setup_postdata($post); ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="meta sm clearfix">
                                    <?php if (in_category('events')) { ?>
                                        <div class="date">
                                            <i class="icon-calendar"
                                               style="display: block;margin-right: 10px;float: left;"></i>
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
                                            <span><?php _e('READ MORE', 'datarobot3'); ?></span><i
                                                    class="icon-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="b-right">
                    <h2><?php _e('What’s new', 'datarobot3'); ?></h2>
                    <div class="latest-posts">
                        <?php $post_objects = get_field('latest_posts');
                        if ($post_objects): ?>
                            <?php foreach ($post_objects as $post) : ?>
                                <?php setup_postdata($post); ?>
                                <div class="single-post">
                                    <p class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </p>
                                    <div class="meta sm clearfix">
                                        <?php if (in_category('events')) { ?>
                                            <div class="date">
                                                <i class="icon-calendar"
                                                   style="display: block;margin-right: 10px;float: left;"></i>
                                                <?php eventDateTime(); ?>
                                            </div>
                                        <?php } else { ?>
                                            <div class="date"><?php the_time('F j, Y'); ?> </div>
                                            <div class="cat"><span>&nbsp;in&nbsp;</span><?php the_category(', '); ?>
                                            </div>
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
    <?php endif; ?>
    <div class="mbp">
        <div class="container">
            <h2><?php the_field('mbp_title') ?></h2>
            <p><?php the_field('mbp_subtitle') ?></p>
            <div class="ba-slider" id="ba-slider">
                <div class="new-way resize">
                    <img src="<?php the_field('image_after'); ?>" alt="<?php _e('With DataRobot', 'datarobot3'); ?>">
                </div>
                <div class="old-way resize2">
                    <img src="<?php the_field('image_before'); ?>" alt="<?php _e('Old way', 'datarobot3'); ?>">
                </div>
                <span class="handle"></span>
            </div>
            <div class="ba-mobile">
                <ul class="tab">
                    <li>
                        <a href="#tab1" class="tablinks new active"><?php _e('With DataRobot', 'datarobot3'); ?></a>
                    </li>
                    <li>
                        <a href="#tab2" class="tablinks old"><?php _e('Old way', 'datarobot3'); ?></a>
                    </li>
                </ul>
                <div id="gif" class="gif">
                    <img class="gif-img" src="<?= get_template_directory_uri(); ?>/assets/built/images/swipe.gif">
                </div>
                <div id="tab1" class="tabcontent" style="display: block">
                    <img src="<?php the_field('mobile_image_before'); ?>">
                </div>
                <div id="tab2" class="tabcontent" style="display: none">
                    <img src="<?php the_field('mobile_image_after'); ?>">
                </div>
            </div>
            <div class="contact-b">
                <a href="<?= home_url('/request-a-demo/') ?>"
                   class="bg-filled-white button"><?php _e('Request a demo', 'datarobot3'); ?></a>
            </div>
        </div>
        <script type="text/javascript">


        </script>
    </div>
</section>
<?php get_footer(); ?>
<?php get_template_part('parts/forms/popup') ?>
<?php get_template_part('end'); ?>
