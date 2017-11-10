<?php get_header(); ?>
<?php
$video = get_field( 'banner_video' );
$image = get_field( 'image_type' );
$logo  = get_field( 'company_logo' );
$photo = get_field( 'photo_of_person' );
?>
<?php if ( get_field( 'page_type' ) !== 'oldUC' ) : ?>
    <section class="use-cases-new">
        <div class="uc-top-banner">
            <div class="uc-top-banner-wrap container">
				<?php if ( get_field( 'page_type' ) == 'useCase' ) : ?>
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_field( 'banner_text' ); ?></p>
				<?php elseif ( get_field( 'page_type' ) == 'sucsStory' ) : ?>
                    <div class="header-text">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_field( 'banner_text' ); ?></p>
                    </div>
                    <div class="video"><?= $video ?></div>
				<?php endif; ?>
            </div>
        </div>
        <div class="uc-inner-description">
			<?php if ( get_field( 'page_type' ) !== 'oldUC' ) : ?>
                <div class="us-company-block">
					<?php if ( get_field( 'page_type' ) == 'useCase' ) : ?>
                        <div class="b-quote alone">
                            <p class="quote"><?php the_field( 'company_quote' ) ?></p>
                            <p class="author"><?php the_field( 'author' ) ?></p>
                        </div>
					<?php elseif ( get_field( 'page_type' ) == 'sucsStory' ) : ?>
						<?php if ( $image == "logo" && $logo ) : ?>
                            <div class="b-logo">
                                <img src="<?php the_field( 'company_logo' ); ?>" alt="logo">
                            </div>
                            <div class="b-quote">
                                <p class="quote"><?php the_field( 'company_quote' ) ?></p>
                                <p class="author"><?php the_field( 'author' ) ?></p>
                            </div>
						<?php elseif ( $image == "photo" && $photo ) : ?>
                            <div class="b-photo">
                                <img src="<?php the_field( 'photo_of_person' ); ?>" alt="person">
                            </div>
                            <div class="b-quote">
                                <p class="quote"><?php the_field( 'company_quote' ) ?></p>
                                <p class="author"><?php the_field( 'author' ) ?></p>
                            </div>
						<?php endif; ?>
					<?php endif; ?>
                </div>
			<?php endif; ?>
            <div class="container clearfix">
                <div class="uc-highlights">
					<?php if ( get_field( 'industry' ) ) : ?>
                        <div class="b-industry">
                            <span class="title"><?php _e( 'Industry', 'datarobot3' ); ?></span>
                            <p><?php the_field('industry'); ?></p>
                        </div>
					<?php endif; ?>
                    <div class="b-why-dr">
                        <span class="title"><?php _e( 'Why DataRobot', 'datarobot3' ); ?></span>
                        <p><?php the_field('why_dr'); ?></p>
                    </div>
                    <div class="b-highlights">
                        <span class="title"><?php _e( 'Highlights', 'datarobot3' ); ?></span>
                        <?php the_field('highlights'); ?>
                    </div>
                </div>
                <div class="uc-results">
                    <h2><?php _e( 'Results', 'datarobot3' ); ?></h2>
					<?php if ( get_field( 'results_content_type' ) == 'list' ):
						if ( have_rows( 'list_of_results' ) ):
							while ( have_rows( 'list_of_results' ) ) : the_row(); ?>
                                <div class="results"><i class="icon-check"></i>
                                    <p><?php the_sub_field( 'single_result' ); ?></p>
                                </div>
							<?php endwhile;
						endif;
					else :
						the_field( 'results_text' );
					endif;
					if ( get_field( 'download_pdf' ) ) : ?>
                        <div class="uc-pdf">
                            <p><?php _e( 'Want to know more about this use case?', 'datarobot3' ); ?></p>
                            <a href="#" class="open-popup bg-filled-blue button"><?php _e( 'Contact us', 'datarobot3' ); ?></a>
                            <a href="<?php the_field( 'pdf_link' ); ?>" class="pdf-link">
                                <i class="icon-file-pdf-box"></i>
                                <span><?php _e( 'Download pdf', 'datarobot3' ); ?></span>
                            </a>
                        </div>
					<?php endif; ?>
                </div>
                <div class="uc-solution">
                    <div class="b-solution">
						<?php
						if ( have_rows( 'description_items' ) ):
							while ( have_rows( 'description_items' ) ) : the_row(); ?>
                                <h2><?php the_sub_field( 'description_title' ); ?></h2>
                                <p><?php the_sub_field( 'description_text' ); ?></p>
							<?php endwhile;
						endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="get-in-touch">
            <div class="container">
                <div class="button-wrap">
                    <p><?php _e( 'Do you want to find out what solution is the best in your case?', 'datarobot3' ); ?></p>
                    <a href="#" class="open-popup bg-filled-white button"><?php _e( 'Contact us', 'datarobot3' ); ?></a>
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
    <section class="use-cases-old">
        <div class="uc-top-banner">
            <div class="uc-top-banner-wrap container">
                <h3><?php the_title(); ?></h3>
                <p><?php the_field( 'banner_text' ); ?></p>
            </div>
        </div>
        <div class="uc-inner-description">
            <div class="container clearfix">
                <div class="uc-highlights">
					<?php if ( get_field( 'company_logo' ) ) { ?>
                        <div class="b-logo">
                            <img src="<?= $logo ?>" alt="logo">
                        </div>
					<?php } ?>

					<?php if ( get_field( 'industry' ) ) { ?>
                        <div class="b-industry">
                            <span class="title"><?php _e( 'Industry', 'datarobot3' ); ?></span>
                            <p><?php the_field( 'industry' ); ?></p>
                        </div>
					<?php } ?>
                    <div class="b-why-dr">
                        <span class="title"><?php _e( 'Why DataRobot', 'datarobot3' ); ?></span>
                        <p><?php the_field( 'why_dr' ); ?></p>
                    </div>
                    <div class="b-highlights">
                        <span class="title"><?php _e( 'Highlights', 'datarobot3' ); ?></span>
						<?php the_field( 'highlights' ); ?>
                    </div>
                </div>
                <div class="uc-solution">
                    <div class="b-challenge">
                        <h2><?php _e( 'Challenge', 'datarobot3' ); ?></h2>
                        <p><?php the_field( 'challenge' ); ?></p>
                    </div>
                    <div class="b-solution">
                        <h2><?php _e( 'Solution', 'datarobot3' ); ?></h2>
                        <p><?php the_field( 'solution' ); ?></p>
                    </div>
                </div>
            </div>
        </div>
		<?php if ( get_field( 'results_list' ) ) : ?>
            <div class="uc-results">
                <div class="container">
                    <div class="uc-results-slider clearfix">
                        <div class="uc-results-slider-left">
                            <h2><?php _e( 'Results', 'datarobot3' ); ?>:</h2>
							<?php the_field( 'results_list' );

							if ( get_field( 'download_pdf' ) ) { ?>
                                <div class="uc-pdf">
                                    <p><?php _e( 'Want to know more about this use case?', 'datarobot3' ); ?></p>
                                    <a href="<?php the_field( 'download_pdf' ); ?>" class="bg-filled-blue button"><?php _e( 'Download
                                        pdf', 'datarobot3' ); ?></a>
                                </div>
							<?php } ?>
                        </div>
						<?php if ( get_field( 'slider' ) ): ?>
                            <div class="uc-results-slider-right <?php if ( count( get_field( 'slider' ) ) == 1 ) {
								echo 'single-slide';
							} ?>">
                                <div class="slider-panel">
                                    <div class="slide-caption"></div>
                                    <div class="panel-controls">
                                        <div class="slider-prev"></div>
                                        <div class="slider-pager"></div>
                                        <div class="slider-next"></div>
                                    </div>
                                </div>

                                <ul class="results-slider">

									<?php while ( have_rows( 'slider' ) ): the_row(); ?>

                                        <li class="slide">
                                            <img src="<?php echo get_sub_field( 'slide_image' ); ?>"
                                                 alt="<?php echo get_sub_field( 'image_title' ); ?>"
                                                 title="<?php echo get_sub_field( 'image_title' ); ?>"/>
                                        </li>

									<?php endwhile; ?>

                                </ul>

                            </div>

						<?php endif; ?>
                    </div>
                </div>
				<?php if ( get_field( 'person_name' ) ) { ?>
                    <div class="uc-results-video-wrap">
                        <div class="container">
                            <div class="uc-results-video clearfix">
                                <div class="uc-results-video-left">
                                    <div class="uc-testimonial-author">
                                        <img src="<?php the_field( 'person_photo' ); ?>" alt="photo">
                                        <p class="name"><?php the_field( 'person_name' ); ?></p>
                                        <p class="title"><?php the_field( 'person_title' ); ?></p>
                                    </div>
                                    <div class="uc-testimonial">
                                        <span><?php _e( 'Said about DataRobot:', 'datarobot3' ); ?></span>
                                        <p><?php the_field( 'about_dr' ); ?></p>
                                    </div>
                                </div>
                                <div class="uc-results-video-right">
									<?php the_field( 'testimonial_video' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php } ?>
            </div>
            <?php endif; ?>
            <div class="uc-similar-case">
                <div class="container">
                    <div class="sc-text">
                        <h4><?php _e( 'Do you have a similar case?', 'datarobot3' ); ?></h4>
                        <p><?php _e( 'Want to see this specific use case in action? Contact us to find out how we can solve your problems.', 'datarobot3' ); ?></p>
                        <a href="#" class=" open-popup bg-filled-white button"><?php _e( 'Contact us', 'datarobot3' ); ?></a>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                $('.results-slider').bxSlider({
                    mode: 'fade',
                    pagerType: 'short',
                    pagerSelector: '.slider-pager',
                    prevText: '<i class="icon-slider-prev"></i>',
                    nextText: '<i class="icon-slider-next"></i>',
                    prevSelector: '.slider-prev',
                    nextSelector: '.slider-next',
                    captions: true,
                    infiniteLoop: false
                });
            });
        </script>
    <?php endif; ?>
<?php get_footer();
get_template_part( 'parts/forms/popup' );
get_template_part( 'end' );
