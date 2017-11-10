<?php
/* Template Name: Industries Fintech-LP  */
?>
<?php get_header(); ?>
<section class="uc-landing-fintech">
    <div class="invisible" data-img-big="url(<?php the_field('banner_image_big'); ?>)"
         data-img-medium="url(<?php the_field('banner_image_medium'); ?>)" style="display: none"></div>
    <div class="top-wrapper" style="background-image: url()">
        <div class="top-banner">
            <div class="container clearfix">
                <div class="b-left">
                    <h1><?php the_field('banner_title'); ?></h1>
                    <p><?php the_field('banner_text'); ?></p>
                </div>
                <div class="b-bottom">
                    <a href="#" class="open-popup bg-filled-blue button"><?php _e( 'Request a demo' , 'datarobot3' ) ?></a>
                    <a href="<?php the_field('ebook_link') ?>" class="link"><i class="icon-download"></i>Download eBook</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="eml clearfix">
                <div class="b-left">
                    <div class="video-box"><?php the_field('video_id'); ?></div>
                </div>
                <div class="b-right">
                    <p><?php the_field('text'); ?></p>
                    <?php if(get_field('wow_book_link')) : ?>
                    <a href="<?php the_field('wow_book_link') ?>" class="link"><i class="icon-download"></i>Download
                        “Wow" book</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="invisible" data-img-big="url(<?php the_field('quote_image_big'); ?>)"
             data-img-medium="url(<?php the_field('quote_image_medium'); ?>)" style="display: none"></div>
        <div class="quote-wrap" style="background-image: url()">
            <div class="mask quotebox"></div>
            <div class="quote">
                <div class="container clearfix">
                    <div class="b-left">
                        <img src="<?= get_template_directory_uri(); ?>/assets/built/images/commas-ico.svg">
                        <p><?php the_field('quote_text'); ?></p>
                        <div class="b-info">
                            <p class="author"><?php the_field('quote_author'); ?></p>
                            <?php
                            if (have_rows('position')):
                                while (have_rows('position')) : the_row(); ?>
                                    <p class="position"><?php the_sub_field('position_info'); ?></p>
                                <?php endwhile;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fintech-sections">
            <div class="container">
                <div class="sections-switcher">
                    <div class="section active" sect="lending">Lending</div>
                    <div class="section" sect="payments">Payments</div>
                    <div class="section" sect="digital">Digital wealth</div>
                    <div class="section" sect="blockchain">Blockchain</div>
                </div>
                <div class="section-content">
                    <?php if (have_rows('section')):
                        while (have_rows('section')) : the_row(); ?>
                            <div class="single-section" style="display: none" data-name="<?php the_sub_field('section_label')?>">
                                <div class="b-left">
                                    <div class="b-top">
                                        <div class="title-wrap">
                                        <h2><?php the_sub_field('section_title'); ?></h2>
                                            <i class="icon-chevron-down"></i>
                                            </div>
                                        <p><?php the_sub_field('section_description'); ?></p>
                                    </div>
                                    <div class="b-bottom">
                                        <div class="uc-wrap">
                                        <h3>Use cases</h3>
                                        <div class="use-cases">
                                            <?php $post_objects = get_sub_field('section_use_cases');
                                            if ($post_objects) : ?>
                                                <?php foreach ($post_objects as $post) : ?>
                                                    <?php setup_postdata($post); ?>
                                                    <a href="<?php the_permalink(); ?>"><i
                                                            class="icon-circle-right"></i>
                                                        <p><?php the_title(); ?></p></a>
                                                <?php endforeach; ?>
                                                <?php wp_reset_postdata(); ?>
                                            <?php endif; ?>
                                        </div>
                                            </div>
                                        <div class="logos">
                                            <?php
                                            if (have_rows('section_logos')):
                                                while (have_rows('section_logos')) : the_row(); ?>
                                                    <div class="logo"><img src="<?php the_sub_field('logo'); ?>"></div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-right">
                                    <?php if(get_sub_field('section_quote')) : ?>
                                        <div class="quote-box">
                                            <img src="<?= get_template_directory_uri(); ?>/assets/built/images/quotes.png">
                                            <div class="quote-content">
                                                <?php if(get_sub_field('video')) : ?>
                                                    <div class="video"><?php the_sub_field('video'); ?></div>
                                                <?php endif; ?>
                                                <p><?php the_sub_field('section_quote'); ?></p>
                                                <div class="author-info">
                                                    <img class="author-photo" src="<?php the_sub_field('quote_author_photo'); ?>">
                                                    <div>
                                                        <p class="author-name"><?php the_sub_field('section_quote_author'); ?></p>
                                                        <p class="author-position"><?php the_sub_field('section_quote_author_position'); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <div class="video"><?php the_sub_field('video'); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="events-announcement">
            <div class="container">
                <div class="b-left">
                    <h2>Where you can find us</h2>
                    <?php if (have_rows('events')):
                        while (have_rows('events')) : the_row();
                            $startDate = get_sub_field('ev_start_date');
                            $endDate = get_sub_field('ev_end_date'); ?>
                            <div class="single-event">
                                <p class="post-title"><a href="<?php the_sub_field('event_link'); ?>"
                                                         target="_blank"><?php the_sub_field('event_title'); ?></a></p>
                                <div class="date">
                                    <i class="icon-calendar"></i>
                                    <?php universityClassDate($startDate, $endDate) ?>
                                    , <?php universityClassYear($startDate); ?>
                                </div>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
                <div class="b-right">
                    <div class="ann-img">
                        <div class="img-wrap"
                             style="background-image: url(<?php the_field('announcement_image'); ?>)"></div>
                        <div class="ann-label"><span>Announcement</span></div>
                    </div>
                    <div class="ann-title">
                        <?php $post_objects = get_field('announcement');
                        if ($post_objects) : ?>
                            <?php foreach ($post_objects as $post) : ?>
                                <?php setup_postdata($post); ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="meta sm clearfix">
                                    <div class="meta-info">
                                        <div class="date"><?php the_time('M j, Y'); ?> </div>
                                        <div class="author"><span>&nbsp;by&nbsp;</span><?php the_author_posts_link(); ?>
                                        </div>
                                    </div>
                                    <div class="button-wrap">
                                        <a href="<?php the_permalink(); ?>" class="sm-filled-blue button clearfix">
                                            <span><?php _e( 'READ MORE' , 'datarobot3' ) ?></span><i class="icon-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part('parts/get-in-touch') ?>
</section>
<?php get_footer(); ?>
<script>
    jQuery(document).ready(function ($) {
        var viewportWidth = jQuery(window).width();

        jQuery(window).resize(function () {
            var viewportWidth = jQuery(window).width();
            var imageUrl = jQuery(".invisible");
            imageUrl.each(function () {
                var bigImgUrl = jQuery(this).attr("data-img-big");
                var midImgUrl = jQuery(this).attr("data-img-medium");
                if (viewportWidth > 1023) {
                    jQuery(this).next().css('background-image', bigImgUrl);
                } else {
                    if (midImgUrl !== 'url()') {
                        jQuery(this).next().css('background-image', midImgUrl);
                    } else {
                        jQuery(this).next().css('background-image', bigImgUrl);
                    }
                }
            });
        });

        if (viewportWidth > 719) {
            jQuery('.single-section[data-name="' + jQuery('.active').attr('sect') + '"]').hide().fadeIn(500);
            jQuery(document).on('click', '.section', function () {
                jQuery(this).siblings('.section').removeClass('active');
                jQuery(this).addClass('active');
                jQuery('.single-section').fadeOut(500);
                jQuery('.single-section[data-name="' + jQuery(this).attr('sect') + '"]').hide().fadeIn(500);
            });
        }
        else if (viewportWidth < 719) {
            jQuery('.single-section').show();
        }
        jQuery(window).resize(function () {
            var viewportWidth = jQuery(window).width();
            if (viewportWidth < 719) {
                jQuery('.single-section').show();
            } else {
                jQuery('.single-section').hide();
                jQuery('.single-section[data-name="' + jQuery('.active').attr('sect') + '"]').hide().fadeIn(500);
            }
        });
        jQuery('.section-content .icon-chevron-down').first().addClass('active').parent('.title-wrap').addClass('active').parents('.single-section').addClass('open');


        jQuery('.title-wrap').click(function () {
            if (jQuery(this).is('.active')) {
                jQuery(this).removeClass('active').children('.icon-chevron-down').removeClass('active').parents('.single-section').removeClass('open');
            } else {
                jQuery('.title-wrap').removeClass('active').children('.icon-chevron-down').removeClass('active').parents('.single-section').removeClass('open');
                jQuery(this).addClass('active').children('.icon-chevron-down').addClass('active').parents('.single-section').addClass('open');
            }
        });
    });
</script>
<?php
get_template_part('parts/forms/popup');
get_template_part('end'); ?>
