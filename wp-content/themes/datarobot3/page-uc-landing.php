<?php
/* Template Name: Industries LP  */
?>
<?php get_header(); ?>
<section class="uc-landing">
    <div class="top-wrapper">
		<?php get_template_part( 'parts/insurance/top-banner' ) ?>
    </div>
    <div class="page-content">
        <div class="container">
			<?php if ( get_field( 'em_text' ) ) { ?>
                <div class="eml clearfix">
                    <div class="b-left">
                        <img src="<?php the_field( 'em_image' ); ?>" alt="Embrace machine learning">
                    </div>
                    <div class="b-right">
                        <h2><?php the_field( 'em_title' ); ?></h2>
						<?php the_field( 'em_text' ); ?>
                    </div>
                    <div class="static-logos">
                        <img src="<?= get_template_directory_uri() ?>/assets/built/images/insurance/spark-logo.svg">
                        <img src="<?= get_template_directory_uri() ?>/assets/built/images/insurance/h2o-logo.svg">
                        <img src="<?= get_template_directory_uri() ?>/assets/built/images/insurance/python-logo.svg">
                        <img src="<?= get_template_directory_uri() ?>/assets/built/images/insurance/R-logo.svg">
                        <img src="<?= get_template_directory_uri() ?>/assets/built/images/insurance/xgboost-logo.svg">
                        <img src="<?= get_template_directory_uri() ?>/assets/built/images/insurance/tensorflow-logo.svg">
                        <img src="<?= get_template_directory_uri() ?>/assets/built/images/insurance/rabbit-logo.svg">
                    </div>
                </div>
			<?php } ?>
            <div class="with-rd mobile">
                <h2>With DataRobot you will:</h2>
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


        <div class="recent-uc" id="recent-uc">
            <div class="container clearfix">
				<?php if ( get_field( 'customers' ) ) { ?>
                    <div class="featured-customers">
                        <p>Featured Customers. A few words about our major customers in this sector</p>
                        <div class="customers">
							<?php
							$count = 0;
							if ( have_rows( 'customers' ) ):
								while ( have_rows( 'customers' ) ) : the_row();
									if ( count( get_field( 'customers' ) ) > 1 ):
										$width = ( 100 / count( get_field( 'customers' ) ) - 4 ) . '%';
									else:
										$width = '100%';
									endif;
									?>
                                    <div class="customer-logo"
                                         style="background-image: url(<?php the_sub_field( 'customer_logo' ); ?>); width: <?= $width; ?>;"></div>
								<?php endwhile;
							endif; ?>
                        </div>
                    </div>
				<?php } ?>

				<?php if ( get_field( 'main_post_image' ) ) { ?>
                    <div class="recent-uc-posts">
                        <div class="b-left">
							<?php if ( get_field( 'type_of_post' ) == 'post' ) : ?>
								<?php if ( get_field( 'main_post' ) ) : ?>
									<?php $post_obj = get_field( 'main_post' ); ?>
                                    <a href="<?= $post_obj->guid ?>">
                                        <div class="ss-wrap"
                                             style="background-image: url(<?php the_field( 'main_post_image' ); ?>)">
                                            <div class="mask ss"></div>
                                            <div class="ss-slide">
                                                <div class="label"><?php the_field( 'label_name' ) ?></div>
                                                <div class="b-bottom">
                                                    <h3><?= $post_obj->post_title; ?></h3>
                                                    <p class="post-link"><i
                                                                class="icon-circle-right"></i><?php the_field( 'link_text' ); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
								<?php endif; ?>
							<?php elseif ( get_field( 'type_of_post' ) == 'pdf' ) : ?>
                                <a href="<?php the_field( 'pdf_link' ); ?>" target="_blank">
                                    <div class="ss-wrap"
                                         style="background-image: url(<?php the_field( 'main_post_image' ); ?>)">
                                        <div class="mask ss"></div>
                                        <div class="ss-slide">
                                            <div class="label"><?php the_field( 'label_name' ) ?></div>
                                            <div class="b-bottom">
                                                <h3><?php the_field( 'pdf_title' ); ?></h3>
                                                <p class="post-link"><i
                                                            class="icon-circle-right"></i><?php the_field( 'link_text' ); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
							<?php endif; ?>
                        </div>
                        <div class="b-right">
							<?php if ( get_field( 'industry' ) == 'insurance' ): ?>
                                <h2>DataRobot use cases in <?php the_field( 'banner_title' ); ?>:</h2>
                                <div class="uc-posts">
									<?php
									global $post;
									$args      = array(
										'posts_per_page' => 7,
										'order'          => 'ASC',
										'orderby'        => 'date',
										'post_type'      => 'usecase',
										'group'          => 'insurance'
									);
									$postslist = get_posts( $args );
									foreach ( $postslist as $post ) :
										setup_postdata( $post ); ?>
                                        <a href="<?php the_permalink(); ?>"><i class="icon-circle-right"></i>
                                            <p><?php the_title(); ?></p></a>
										<?php
									endforeach;
									wp_reset_postdata();
									?>
                                </div>
							<?php elseif ( get_field( 'industry' ) == 'fintech' ) : ?>
                                <h2>DataRobot use cases in FinTech:</h2>
                                <div class="uc-posts">
									<?php
									global $post;
									$args      = array(
										'posts_per_page' => 7,
										'order'          => 'ASC',
										'orderby'        => 'date',
										'post_type'      => 'usecase',
										'group'          => 'fintech'
									);
									$postslist = get_posts( $args );
									foreach ( $postslist as $post ) :
										setup_postdata( $post ); ?>
                                        <a href="<?php the_permalink(); ?>"><i class="icon-circle-right"></i>
                                            <p><?php the_title(); ?></p></a>
										<?php
									endforeach;
									wp_reset_postdata();
									?>
                                </div>
							<?php else : ?>
							<?php endif; ?>
                        </div>
                    </div>
				<?php } ?>
            </div>
        </div>

		<?php if ( get_field( 'section' ) ) { ?>
            <div class="fintech-sections">
                <div class="container">
                    <div class="sections-switcher">
                        <div class="section active" sect="lending">Lending</div>
                        <div class="section" sect="payments">Payments</div>
                        <div class="section" sect="digital">Digital wealth</div>
                        <div class="section" sect="blockchain">Blockchain</div>
                        <div class="section" sect="blockchain">Blockchain</div>
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
                                            <div class="uc-wrap">
                                                <h3>Use cases</h3>
                                                <div class="use-cases">
													<?php $post_objects = get_sub_field( 'section_use_cases' );
													if ( $post_objects ) : ?>
														<?php foreach ( $post_objects as $post ) : ?>
															<?php setup_postdata( $post ); ?>
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
												if ( have_rows( 'section_logos' ) ):
													while ( have_rows( 'section_logos' ) ) : the_row(); ?>
                                                        <div class="logo"><img src="<?php the_sub_field( 'logo' ); ?>">
                                                        </div>
													<?php endwhile; ?>
												<?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="b-right">
										<?php if ( get_sub_field( 'section_quote' ) ) : ?>
                                            <div class="quote-box">
                                                <img src="<?= get_template_directory_uri() ?>/assets/built/images/quotes.png">
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

    <div class="events-announcement">
        <div class="container">
            <div class="b-left">
                <h2>Where you can find us</h2>
				<?php if ( have_rows( 'events' ) ):
					while ( have_rows( 'events' ) ) : the_row();
						$startDate = get_sub_field( 'ev_start_date' );
						$endDate   = get_sub_field( 'ev_end_date' ); ?>
                        <div class="single-event">
                            <p class="post-title"><a href="<?php the_sub_field( 'event_link' ); ?>"
                                                     target="_blank"><?php the_sub_field( 'event_title' ); ?></a></p>
                            <div class="date">
                                <i class="icon-calendar"></i>
								<?php universityClassDate( $startDate, $endDate ) ?>
                                , <?php universityClassYear( $startDate ); ?>
                            </div>
                        </div>
					<?php endwhile;
				endif; ?>
            </div>
            <div class="b-right">
                <div class="ann-img">
                    <div class="img-wrap"
                         style="background-image: url(<?php the_field( 'announcement_image' ); ?>)"></div>
                    <div class="ann-label"><span>Announcement</span></div>
                </div>
                <div class="ann-title">
					<?php $post_objects = get_field( 'announcement' );
					if ( $post_objects ) : ?>
						<?php foreach ( $post_objects as $post ) : ?>
							<?php setup_postdata( $post ); ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="meta sm clearfix">
                                <div class="meta-info">
                                    <div class="date"><?php the_time( 'M j, Y' ); ?> </div>
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
    <?php get_template_part('parts/get-in-touch') ?>
</section>
<?php get_footer(); ?>
<script>
    jQuery(document).ready(function ($) {
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
    });
</script>
<?php get_template_part( 'parts/forms/popup' );
get_template_part( 'end' ); ?>
