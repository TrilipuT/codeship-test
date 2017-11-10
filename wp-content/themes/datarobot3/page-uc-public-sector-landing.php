<?php
/* Template Name: Industries Public Sector-LP  */
?>
<?php get_header(); ?>
<section class="uc-landing-public-sector">
    <div class="invisible" data-img-big="url(<?php the_field('banner_image_big'); ?>)" data-img-medium="url(<?php the_field('banner_image_medium'); ?>)" style="display: none"></div>
    <div class="top-wrapper" style="background-image: url()">
        <div class="top-banner">
            <div class="container clearfix">
                <div class="b-left">
                    <h1><?php the_field('banner_title'); ?></h1>
                    <p><?php the_field('banner_text'); ?></p>
                </div>
                <div class="b-bottom">
                    <a href="#" class="open-popup bg-filled-blue button"><?php _e( 'Watch a demo', 'datarobot3' ) ?></a>
                    <a href="<?php the_field( 'ebook_link' ) ?>" class="link"><i
                                class="icon-download"></i><?php _e( 'Download eBook', 'datarobot3' ) ?></a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="eml clearfix">
                <div class="b-left">
                    <img src="<?php the_field('em_image'); ?>" alt="Embrace machine learning">
                </div>
                <div class="b-right">
                    <h2><?php the_field('em_title'); ?></h2>
                    <?php the_field('em_text'); ?>
                </div>
            </div>
            <div class="with-rd mobile">
                <h2>With DataRobot you will:</h2>
                <div class="benefit-wrap">
                    <?php
                    if( have_rows('benefit') ):
                        while ( have_rows('benefit') ) : the_row();?>
                            <div class="benefit">
                                <div class="title-wrap">
                                    <h3><?php the_sub_field('benefit_title');?></h3>
                                    <div class="icon" style="background-image: url(<?php the_sub_field('benefit_icon');?>)"></div>
                                    <i class="icon-chevron-down"></i>
                                </div>
                                <div class="mobile-accordeon">
                                    <p><?php the_sub_field('benefit_text');?></p>
                                </div>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
        <div class="recent-uc" id="recent-uc">
            <div class="container clearfix">
                <div class="recent-uc-posts">
                    <div class="b-left">
                        <div class="ebook-wrapper">
                            <div class="label">Public sector ebook</div>
                            <div class="left-box">
                                <h3>How to apply DataRobot to solve problems in the public sector</h3>
                                <a href="<?php the_field('ebook_link')?>" class="download-ebook bg-filled-blue button">Download eBook</a>
                            </div>
                            <div class="ebook-img" style="background-image: url(<?php the_field('ebook_img');?>)"></div>
                        </div>
                    </div>
                    <div class="b-right">
                        <h2>Use case segments</h2>
                        <div class="uc-posts">
                            <?php
                            global $post;
                            $args = array( 'posts_per_page' => 7, 'order'=> 'ASC', 'orderby' => 'date', 'post_type' => 'usecase', 'group' => 'public-sector' );
                            $postslist = get_posts( $args );
                            foreach ( $postslist as $post ) :
                                setup_postdata( $post ); ?>
                                <a href="<?php the_permalink(); ?>"><i class="icon-circle-right"></i><p><?php the_title(); ?></p></a>
                                <?php
                            endforeach;
                            wp_reset_postdata();
                            ?>
                        </div>
                        <?php if(get_field('documentation_link')) :?>
                        <a href="<?php the_field('documentation_link')?>" class="documentation"><img src="<?= get_template_directory_uri(); ?>/assets/built/images/documentation-icon.svg">Use cases documentation</a>
                        <?php endif; ?>
                    </div>

                    <?php if(get_field('materials')) : ?>
                            <div class="materials">
                                <h2>Resources</h2>
                                <?php
                                if( have_rows('materials') ):
                                    while ( have_rows('materials') ) : the_row();?>
                                        <div class="item-block">
                                            <a href="<?php the_sub_field('material_url'); ?>"><img src="<?php the_sub_field('material_icon'); ?>"></a>
                                            <div class="text-wrap">
                                                <p><?php the_sub_field('type_of_material'); ?></p>
                                                <a href="<?php the_sub_field('material_url'); ?>"><h3><?php the_sub_field('material_title'); ?></h3></a>
                                            </div>

                                        </div>
                                    <?php endwhile;
                                endif; ?>
                            </div>
                    <?php endif; ?>

                    <div class="partners">
                        <div class="partners-header">
                        <h2>DataRobot partners</h2>
                        <div class="logo-switcher">
                            <div class="switch active" data-area="sis">SI’s</div>
                            <div class="switch" data-area="platform">Platform</div>
                            <div class="switch" data-area="isvs">ISV’s</div>
                        </div>
                        </div>
                        <?php
                        if( have_rows('partners_logo') ):?>
                            <div class="partners-logos">
                                <?php while ( have_rows('partners_logo') ) : the_row();?>
                                    <div class="logo" data-name="<?php the_sub_field('partner_data_area')?>" style="background-image: url(<?php the_sub_field('partner_logo');?>)"><div class="logo-mask"></div></div>
                                <?php endwhile;?>
                            </div>
                        <?php endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="invisible" data-img-big="url(<?php the_field('quote_image_big'); ?>)" data-img-medium="url(<?php the_field('quote_image_medium'); ?>)" style="display: none"></div>
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
                            if( have_rows('position') ):
                                while ( have_rows('position') ) : the_row();?>
                                    <p class="position"><?php the_sub_field('position_info');?></p>
                                <?php endwhile;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="events-announcement">
            <div class="container">
                <div class="b-left">
                    <h2>Where you can find us</h2>
                    <?php if( have_rows('events') ):
                        while ( have_rows('events') ) : the_row();
                            $startDate = get_sub_field('ev_start_date');
                            $endDate = get_sub_field('ev_end_date'); ?>
                            <div class="single-event">
                                <p class="post-title"><a href="<?php the_sub_field('event_link');?>" target="_blank"><?php the_sub_field('event_title');?></a></p>
                                <div class="date">
                                    <i class="icon-calendar"></i>
                                    <?php universityClassDate($startDate, $endDate)?>, <?php universityClassYear($startDate);?>
                                </div>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
                <div class="b-right">
                    <div class="ann-img"><div class="img-wrap" style="background-image: url(<?php the_field('announcement_image'); ?>)"></div>
                        <div class="ann-label"><span>Announcement</span></div>
                    </div>
                    <div class="ann-title">
                        <?php $post_objects = get_field('announcement');
                        if($post_objects) : ?>
                            <?php foreach ($post_objects as $post) : ?>
                                <?php setup_postdata($post);?>
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
                            <?php wp_reset_postdata();?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part('parts/get-in-touch'); ?>
</section>
<?php get_footer(); ?>
<script>
    jQuery(document).ready(function ($) {
        jQuery('.aml-tiles-wrapper .icon-chevron-down').first().addClass('active').siblings('.mobile-accordeon').addClass('show');

        jQuery('.bg-wrap h3').click(function () {
            if (jQuery(this).is('.active')) {
                jQuery(this).removeClass('active').siblings('.icon-chevron-down').removeClass('active').siblings('.mobile-accordeon').removeClass('show open');
            } else {
                jQuery('.bg-wrap h3').removeClass('active').siblings('.icon-chevron-down').removeClass('active').siblings('.mobile-accordeon').removeClass('show');
                jQuery(this).addClass('active').siblings('.icon-chevron-down').addClass('active').siblings('.mobile-accordeon').addClass('show');
            }
        });

        jQuery('.icon-chevron-down').click(function () {
            if (jQuery(this).is('.active')) {
                jQuery(this).removeClass('active').siblings('.mobile-accordeon').removeClass('show open');
            } else {
                jQuery('.icon-chevron-down').removeClass('active').siblings('.mobile-accordeon').removeClass('show');
                jQuery(this).addClass('active').siblings('.mobile-accordeon').addClass('show');
            }
        });

        jQuery('.logo[data-name="' + jQuery('.active').data('area') + '"] > div').removeClass('logo-mask');
        jQuery(document).on('click', '.switch', function () {
            jQuery(this).siblings('.switch').removeClass('active');
            jQuery(this).addClass('active');
            jQuery('.logo > div').addClass('logo-mask');
            jQuery('.logo[data-name="' + jQuery(this).data('area') + '"] > div').removeClass('logo-mask');
        });


        jQuery('.benefit-wrap .title-wrap .icon-chevron-down').first().addClass('active').parents('.title-wrap').siblings('.mobile-accordeon').addClass('show');
        jQuery('.title-wrap').first().addClass('active');

        jQuery('.title-wrap').click(function () {
            if (jQuery(this).is('.active')) {
                jQuery(this).removeClass('active').children('.icon-chevron-down').removeClass('active').parent('.title-wrap').siblings('.mobile-accordeon').removeClass('show open');
            } else {
                jQuery('.title-wrap').removeClass('active').children('.icon-chevron-down').removeClass('active').parent('.title-wrap').siblings('.mobile-accordeon').removeClass('show');
                jQuery(this).addClass('active').children('.icon-chevron-down').addClass('active').parent('.title-wrap').siblings('.mobile-accordeon').addClass('show');
            }
        });


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

    });
</script>
<?php get_template_part( 'parts/forms/popup' );
get_template_part( 'end' ); ?>
