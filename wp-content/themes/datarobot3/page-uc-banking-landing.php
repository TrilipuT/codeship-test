<?php
/* Template Name: Industries LP Banking  */
?>
<?php get_header(); ?>
<?php $rows = get_field('section'); ?>
<section class="uc-landing banking">
    <div class="invisible" data-img-big="url(<?php the_field('banner_image_big'); ?>)" data-img-medium="url(<?php the_field('banner_image_medium'); ?>)" style="display: none"></div>
    <div class="top-wrapper" style="background-image: url()">
        <div class="top-banner">
          <div class="container clearfix">
              <div class="b-left">
                  <h1><?php the_field('banner_title'); ?></h1>
                  <p><?php the_field('banner_text'); ?></p>
              </div>
              <div class="b-bottom">
                  <a href="#" class="open-popup bg-filled-blue button"><?php _e('Request a demo', 'datarobot3'); ?></a>
                  <a href="<?php the_field('ebook_link'); ?>"><i class="icon-download"></i><?php _e('Download eBook','datarobot3') ?></a>
              </div>
          </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="with-rd mobile">
                <h2><?php _e( 'DataRobot can help you with:', 'datarobot3' ); ?></h2>
                <div class="benefit-wrap">
				    <?php
				    if ( have_rows( 'benefit' ) ):
					    while ( have_rows( 'benefit' ) ) : the_row(); ?>
                            <div class="benefit">
                                <div class="title-wrap">
                                    <h3><?php the_sub_field( 'benefit_title' ); ?></h3>
                                    <div class="icon"
                                         style="background-image: url(<?php the_sub_field( 'benefit_icon' ); ?>)"></div>
                                    <i class="icon-chevron-down"></i>
                                </div>
                                <div class="mobile-accordeon">
                                    <p><?php the_sub_field( 'benefit_text' ); ?></p>
                                </div>
                            </div>
					    <?php endwhile;
				    endif;
				    ?>
                </div>
            </div>
        </div>

	    <?php if ( get_field( 'quote_text' ) ) { ?>
            <div class="invisible" data-img-big="url(<?php the_field( 'quote_image_big' ); ?>)"
                 data-img-medium="url(<?php the_field( 'quote_image_medium' ); ?>)" style="display: none"></div>
            <div class="quote-wrap" style="background-image: url()">
                <div class="quote">
                    <div class="container clearfix">
                        <div class="b-left">
                            <img src="<?= get_template_directory_uri(); ?>/assets/built/images/commas-ico.svg">
                            <p><?php the_field( 'quote_text' ); ?></p>
                            <div class="b-info">
                                <p class="author"><?php the_field( 'quote_author' ); ?></p>
							    <?php
							    if ( have_rows( 'position' ) ):
								    while ( have_rows( 'position' ) ) : the_row(); ?>
                                        <p class="position"><?php the_sub_field( 'position_info' ); ?></p>
								    <?php endwhile;
							    endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	    <?php } ?>

	    <?php if ( get_field( 'materials' ) ) : ?>
            <div class="container">
                <div class="materials">
				    <?php
				    if ( have_rows( 'materials' ) ):
					    while ( have_rows( 'materials' ) ) : the_row(); ?>
                            <div class="item-block">
                                <a href="<?php the_sub_field( 'material_url' ); ?>"><img
                                            src="<?php the_sub_field( 'material_icon' ); ?>"></a>
                                <div class="text-wrap">
                                    <p><?php the_sub_field( 'type_of_material' ); ?></p>
                                    <a href="<?php the_sub_field( 'material_url' ); ?>">
                                        <h3><?php the_sub_field( 'material_title' ); ?></h3></a>
                                </div>

                            </div>
					    <?php endwhile;
				    endif; ?>
                </div>
            </div>
	    <?php endif; ?>
    </div>
	<?php if ( $rows ) { ?>
        <div class="banking-sections">
            <div class="container">
                <div class="sections-switcher">
					<?php foreach ( $rows as $key => $row ) {
						if ( $key == 0 ) { ?>
                            <div class="section active"
                                 data-sect="<?php echo $row['section_label']; ?>"><?php echo $row['section_label']; ?></div>
						<?php } else { ?>
                            <div class="section"
                                 data-sect="<?php echo $row['section_label']; ?>"><?php echo $row['section_label']; ?></div>
						<?php }
					} ?>
                </div>
                <div class="section-content">
					<?php if ( have_rows( 'section' ) ):
						while ( have_rows( 'section' ) ) : the_row(); ?>
                            <div class="single-section" style="display: none"
                                 data-name="<?php the_sub_field( 'section_label' ) ?>">
                                <div class="b-left">
                                    <div class="b-top">
                                        <div class="title-wrap">
                                            <h2><?php the_sub_field( 'section_title' ); ?></h2>
                                            <i class="icon-chevron-down"></i>
                                        </div>
                                        <p><?php the_sub_field( 'section_description' ); ?></p>
                                    </div>
                                    <div class="b-bottom">
										<?php $post_objects = get_sub_field( 'section_use_cases' );
										if ( $post_objects ) : ?>
                                            <div class="uc-wrap">
                                                <h3>Use cases</h3>
                                                <div class="use-cases">
													<?php foreach ( $post_objects as $post ) : ?>
														<?php setup_postdata( $post ); ?>
                                                        <a href="<?php the_permalink(); ?>"><i
                                                                    class="icon-circle-right"></i>
                                                            <p><?php the_title(); ?></p></a>
													<?php endforeach; ?>
													<?php wp_reset_postdata(); ?>

                                                </div>
                                            </div>
										<?php endif; ?>
										<?php if ( have_rows( 'section_logos' ) ): ?>
                                            <div class="logos">
												<?php while ( have_rows( 'section_logos' ) ) : the_row(); ?>
                                                    <div class="logo"><img src="<?php the_sub_field( 'logo' ); ?>">
                                                    </div>
												<?php endwhile; ?>
                                            </div>
										<?php endif; ?>
                                    </div>
                                </div>
                                <div class="b-right">
									<?php if ( get_sub_field( 'section_quote' ) ) : ?>
                                        <div class="quote-box">
                                            <img src="<?= get_template_directory_uri(); ?>/assets/built/images/quotes.png">
                                            <div class="quote-content">
												<?php if ( get_sub_field( 'video' ) ) : ?>
                                                    <div class="video"><?php the_sub_field( 'video' ); ?></div>
												<?php endif; ?>
                                                <p><?php the_sub_field( 'section_quote' ); ?></p>
                                                <div class="author-info">
                                                    <img class="author-photo"
                                                         src="<?php the_sub_field( 'quote_author_photo' ); ?>">
                                                    <div>
                                                        <p class="author-name"><?php the_sub_field( 'section_quote_author' ); ?></p>
                                                        <p class="author-position"><?php the_sub_field( 'section_quote_author_position' ); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									<?php else : ?>
                                        <div class="video"><?php the_sub_field( 'video' ); ?></div>
									<?php endif; ?>
                                </div>
                            </div>
						<?php endwhile; ?>
					<?php endif; ?>
                </div>
            </div>
        </div>
	<?php } ?>

    <div class="events-announcement">
        <div class="container">
            <div class="b-left">
                <h2><?php _e('Where you can find us', 'datarobot3'); ?></h2>
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
                    <div class="ann-label"><span><?php _e('Announcement', 'datarobot3'); ?></span></div>
                </div>
                <div class="ann-title">
                    <?php $post_objects = get_field('announcement');
                    if ( $post_objects ) : ?>
	                    <?php foreach ( $post_objects as $post ) : ?>
		                    <?php setup_postdata( $post ); ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="meta sm clearfix">
                                <div class="meta-info">
                                    <div class="date"><?= get_the_time( 'M j, Y' ); ?> </div>
                                    <div class="author"><span>&nbsp;by&nbsp;</span><?php the_author_posts_link(); ?>
                                    </div>
                                </div>
                                <div class="button-wrap">
                                    <a href="<?php the_permalink(); ?>" class="sm-filled-blue button clearfix">
                                        <span><?php _e( 'Read more', 'datarobot3' ); ?></span><i
                                                class="icon-angle-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
	                    <?php endforeach;
	                    wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
	<?php get_template_part( 'parts/get-in-touch' ) ?>
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

        jQuery('.benefit-wrap .title-wrap .icon-chevron-down').first().addClass('active').parents('.title-wrap').siblings('.mobile-accordeon').addClass('show');
        jQuery('.title-wrap').first().addClass('active');

        jQuery('.benefit-wrap .title-wrap').click(function () {
            if (jQuery(this).is('.active')) {
                jQuery(this).removeClass('active').children('.icon-chevron-down').removeClass('active').parent('.title-wrap').siblings('.mobile-accordeon').removeClass('show open');
            } else {
                jQuery('.benefit-wrap .title-wrap').removeClass('active').children('.icon-chevron-down').removeClass('active').parent('.title-wrap').siblings('.mobile-accordeon').removeClass('show');
                jQuery(this).addClass('active').children('.icon-chevron-down').addClass('active').parent('.title-wrap').siblings('.mobile-accordeon').addClass('show');
            }
        });
        $('.b-bottom a.link').on('click', function (e) {
            e.preventDefault();

            var target = this.hash,
                menu = target,
                topPadding = 135;
            if ($('#header-message').is(':visible')) {
                topPadding += 60;
            }
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - topPadding
            }, 500, 'swing', function () {
                window.location.hash = target;
            });
        });

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
            jQuery('.single-section[data-name="' + jQuery('.sections-switcher .active').data('sect') + '"]').hide().fadeIn(500);
            jQuery(document).on('click', '.section', function () {
                jQuery(this).siblings('.section').removeClass('active');
                jQuery(this).addClass('active');
                jQuery('.single-section').hide();
                jQuery('.single-section[data-name="' + jQuery(this).data('sect') + '"]').fadeIn(500);
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
                jQuery('.single-section[data-name="' + jQuery('.sections-switcher .active').data('sect') + '"]').fadeIn(500);
            }
        });
        jQuery('.section-content .icon-chevron-down').first().addClass('active').parent('.title-wrap').addClass('active').parents('.single-section').addClass('open');

        jQuery('.banking-sections .title-wrap').click(function () {
            if (jQuery(this).is('.active')) {
                jQuery(this).removeClass('active').children('.icon-chevron-down').removeClass('active').parents('.single-section').removeClass('open');
            } else {
                jQuery('.banking-sections .title-wrap').removeClass('active').children('.icon-chevron-down').removeClass('active').parents('.single-section').removeClass('open');
                jQuery(this).addClass('active').children('.icon-chevron-down').addClass('active').parents('.single-section').addClass('open');
            }
        });
    });
</script>
<?php get_template_part('parts/forms/popup');
get_template_part('end'); ?>
