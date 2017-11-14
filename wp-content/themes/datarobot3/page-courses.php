<?php
/* Template Name: Courses */
get_header();
the_post(); ?>
<section class="courses">
    <div class="top-block">
        <div class="container">
            <h1><?php the_field( 'title' ); ?></h1>
            <p><?php the_field( 'banner_text' ); ?></p>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="trainings">
				<?php $posts = get_field( 'courses' );
				if ( $posts ):
					foreach ( $posts as $key => $post ):
						setup_postdata( $post ); ?>
                        <div class="item clearfix" id="item_<?php echo $key; ?>">
                            <div class="cover">
                                <div class="title-wrap">
                                    <div class="type"><?php the_field( 'type' ); ?></div>
                                    <h2><?php the_title(); ?></h2>
                                    <p class="for">Appropriate for <?php the_field( 'appr_for' ); ?></p>
									<?php $c_classes = get_field( 'class' );
									if ( $c_classes ) { ?>
                                        <a class="all-classes" href="#upcoming_classes_<?php echo $key; ?>"><i
                                                    class="icon-circle-right"></i>See upcoming classes</a>
									<?php } ?>
                                </div>
                                <div class="action-wrap">
                                    <a href="#" class="open-popup bg-ghost button"
                                       data-title="<?php the_title(); ?>"
                                       data-source-url="<?php sanitize_title( get_the_title() ); ?>"
                                       data-source-id="<?php the_ID(); ?>">Hаve a question?</a>
                                </div>
                            </div>
                            <div class="main loading">
                                <div class="tab-headers">
                                    <ul class="clearfix">
                                        <li><a href="#overview_<?php echo $key; ?>" class="transition">Overview</a></li>
										<?php if ( get_field( 'outline_text' ) || get_field( 'outline_bullets' ) ) { ?>
                                            <li><a href="#course_outline_<?php echo $key; ?>" class="transition">Course
                                                    outline</a></li>
										<?php } ?>
										<?php $c_classes = get_field( 'class' );
										if ( $c_classes ) { ?>
                                            <li class="classes"><a href="#upcoming_classes_<?php echo $key; ?>"
                                                                   class="transition">Upcoming Classes</a></li>
										<?php } ?>
                                    </ul>
                                </div>
                                <div class="tab-contents">
                                    <div class="tab overview" id="overview_<?php echo $key; ?>">
                                        <p><?php the_field( 'overview' ); ?></p>
                                    </div>
                                    <div class="tab course_outline" id="course_outline_<?php echo $key; ?>">
										<?php
										if ( get_field( 'outline_type' ) == "text" ) {
											echo '<p>' . the_field( 'outline_text' ) . '</p>';
										} else {
											$outline_lists = get_field( 'outline_bullets' );
											$col_Num       = count( $outline_lists ); ?>

                                            <div class="row_wrap clearfix">

												<?php foreach ( $outline_lists as $column ) { ?>

                                                    <div class="column c<?php echo $col_Num; ?>">

                                                        <p><?php echo $column['column_title']; ?></p>

														<?php echo $column['column_content']; ?>

                                                    </div>

												<?php } ?>

                                            </div>
										<?php } ?>
                                    </div>
									<?php if ( $c_classes ) { ?>
                                        <div class="tab upcoming_classes" id="upcoming_classes_<?php echo $key; ?>">
                                            <div class="calendar-slider">
                                                <ul class="clearfix" id="slider_<?php echo $key; ?>">
													<?php foreach ( $c_classes as $c_class ) {
														$class = '';
														if ( $c_class['class_id'] ):
															$uri = 'http://datarobot.litmos.com/self-signup/register/';
															$uri .= $c_class['class_id'];
															$uri .= '?type=1';
														else:
															$uri   = '#';
															$class = 'open-popup';
														endif;
														?>
                                                        <li>
                                                            <div class="date">
                                                                <p class="month">
																	<?php universityClassMonth( $c_class['start_date'], $c_class['end_date'] ); ?>
                                                                    <span class="price">
																			<?php if ( $c_class['price'] ) : ?>
																				<?php echo $c_class['price']; ?>
																			<?php endif; ?>
																		</span>
                                                                </p>
                                                                <span class="day"><?php universityClassDays( $c_class['start_date'], $c_class['end_date'] ); ?></span>
                                                            </div>
                                                            <div class="venue"><i
                                                                        class="icon-map-marker"></i><?php echo $c_class['venue']; ?>
                                                            </div>
                                                            <div class="signUp"><a href="<?= $uri; ?>" target="_blank"
                                                                                   class="<?= $class; ?> bg-filled-green button">Sign
                                                                    up</a></div>
                                                        </li>
													<?php } ?>
                                                </ul>
                                                <div class="controls">
                                                </div>
                                            </div>
                                        </div>
									<?php } ?>
                                </div>
                            </div>
                        </div>
					<?php endforeach; ?>
				<?php endif; ?>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                var preload = function (sl) {
                    jQuery(sl).parents('.item').find('.main').removeClass('loading');
                };

				<?php
				foreach ( $posts as $key => $post ) {
					$p_classes = get_field( 'class' );
					if ( $p_classes ) {
						echo "
						$('#slider_$key').bxSlider({
							mode: 'horizontal',
							infiniteLoop: false,
							hideControlOnEnd: true,
							pager: true,
							prevSelector: '#item_$key .controls',
							nextSelector: '#item_$key .controls',
							prevText: '<i class=\"icon-slider-prev\"></i>',
							nextText: '<i class=\"icon-slider-next\"></i>',
							slideWidth: 210,
							slideMargin: 30,
							minSlides: 1,
							maxSlides: 4,
							moveSlides: 1,
							onSliderLoad: preload('#slider_$key')
						});\n
					";
					}
				}
				?>

                $('.item').each(function () {
                    var item = $(this);
                    item.find('.tab').hide();
                    item.find('.overview').show();
                    item.find('.tab-headers li').first().addClass('active');
                    item.find('.tab-headers li a, .cover .all-classes').click(function (e) {
                        e.preventDefault();
                        item.find('.tab-headers li, li.classes').removeClass('active');
                        if ($(this).hasClass('all-classes')) {
                            item.find('li.classes').addClass('active');
                        }
                        $(this).parent('li').addClass('active');
                        var target = $(this).attr('href');
                        item.find('.tab').hide();
                        item.find(target).show();
                    });
                });

                $('.course_outline').css('opacity', '1');

                $(document).on('popup-opened', function (e, button) {
                    let $button = $(button);
                    // Update inquiry type
                    var id = $button.data('source-id');
                    var $inquiryType = $('#inquirytype');
                    if (id) {
                        if (!window.hasOwnProperty('inquiryType_bkp')) {
                            window.inquiryType_bkp = $inquiryType.html();
                        }
                        $inquiryType.prop('disabled', true);
                        $.post(
                            dr.js_data.url,
                            {
                                action: 'dr_ajax_dru',
                                nonce: dr.js_data.nonce,
                                prid: id
                            },
                            function (responce) {
                                if (responce.success) {
                                    $inquiryType.html(responce.data).prop('disabled', false);
                                }
                            }
                        );
                    } else {
                        if (window.hasOwnProperty('inquiryType_bkp')) {
                            $inquiryType.html(window.inquiryType_bkp).prop('disabled', false);
                        }
                    }
                    var full_source = window.location.href.split("#")[0] + '#' + $button.data('source-url');
                    $('#submittedOnUrl').val(full_source);
                });
            });
        </script>
    </div>
	<?php wp_reset_postdata();
	get_template_part( 'parts/get-in-touch' ) ?>
</section>
<?php get_footer();
add_filter( 'dr/forms/form_type', function () {
	return 'full';
} );
add_filter( 'dr/forms/fields/customersinterest/placeholder', function () {
	return 'Question';
} );
add_filter( 'dr/forms/fields/inquiry', function () {
	return 'inquiry-university';
} );
get_template_part( 'parts/forms/popup' );
get_template_part( 'end' ); ?>
