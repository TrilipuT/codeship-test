<?php
/* Template Name: All courses */
?>
<?php get_header(); ?>
<section class="all-courses">
    <div class="top-banner"
         style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/built/images/courses-bg.jpg')">
        <div class="container">
            <div class="banner-content">
				<?php
				$today   = date( "Ymd" );
				$courses = get_posts(
					array(
						'numberposts' => - 1,
						'post_type'   => 'course',
						'post_status' => 'publish',
						'meta_key'    => 'class',
						'meta_query'  => array(
							array(
								'key'     => 'class',
								'value'   => 0,
								'type'    => 'numeric',
								'compare' => '>',
							),
						),
						'orderby'     => 'meta_value_num',
						'order'       => 'ASC'
					)
				);

				$class_data   = array();
				$class_titles = array();
				$class_venues = array();

				foreach ( $courses as $course ) {
					$course_classes = get_field( 'class', $course->ID );
					if ( is_array( $course_classes ) ) {
						$class_data[] = $course_classes;

						foreach ( $course_classes as $c_class ) {
							if ( $c_class['end_date'] > $today ) {
								$class_titles[] = $course->post_title;
							}
						}
					}
				}

				$merged_classes = call_user_func_array( 'array_merge', $class_data );

				foreach ( $merged_classes as $class ) {
					if ( $class['end_date'] > $today ) {
						array_push( $class_venues, $class['venue'] );
					}
				}

				$class_titles = array_unique( $class_titles );
				$class_venues = array_unique( $class_venues );
				?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/built/images/Small-White-DRU-Logo.png"
                     alt="DataRobot University" class="logo">
                <span class="title">I would like to go to</span>

                <span class="dd-wrap">
                    <button class="dd-btn" data-list="type">
                        <span>all trainings</span>
                    </button>

                    <ul class="dd-list type" data-name="type">
                        <li>all trainings</li>
	                    <?php foreach ( $class_titles as $title ) {
		                    echo "<li>{$title}</li>";
	                    } ?>
                    </ul>
                </span>

                <span class="title">in</span>

                <span class="dd-wrap">
                    <button class="dd-btn" data-list="location">
                        <span>all locations</span>
                    </button>
                    <ul class="dd-list location" data-name="location">
                        <li>all locations</li>
	                    <?php foreach ( $class_venues as $venue ) {
		                    echo "<li>{$venue}</li>";
	                    } ?>
                    </ul>
                </span>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="main-content">
            <div class="container">
                <div class="titles">
                    <span class="col left">Training title </span>
                    <span class="col">Date</span>
                    <span class="col">Location</span>
                    <span class="col right">Price</span>
                </div>
                <div class="training-schedule">
                    <div class="preloader">
						<?php get_template_part( 'parts/dr-loader' ) ?>
                    </div>
					<?php foreach ( $courses as $key => $post ) {
						setup_postdata( $post );
						$c_classes = get_field( 'class' );
						if ( $c_classes ) {
							foreach ( $c_classes as $c_class ) {
								$class = '';
								if ( $c_class['class_id'] ):
									$uri = 'http://datarobot.litmos.com/self-signup/register/';
									$uri .= $c_class['class_id'];
									$uri .= '?type=1';
								else:
									$uri   = '#';
									$class = 'open-popup';
								endif;
								if ( $c_class['end_date'] > $today ) { ?>
                                    <div class="one-training" data-title="<?php the_title(); ?>"
                                         data-location="<?php echo $c_class['venue']; ?>"
                                         data-start="<?php echo $c_class['start_date']; ?>">
                                        <div class="training-header transition01 accordeon clearfix">
                                            <span class="col left training-name"><?php the_title(); ?></span>
                                            <span class="col"><?php universityClassDate( $c_class['start_date'], $c_class['end_date'] ); ?></span>
                                            <span class="col"><?php echo $c_class['venue']; ?></span>
                                            <span class="col right">
                                                                                <?php if ( $c_class['price'] ) : ?>
	                                                                                <?php echo $c_class['price']; ?>
                                                                                <?php endif ?>
                                                                            </span>
                                            <i class="icon-chevron-down"></i>
                                        </div>
                                        <div class="training-content clearfix">
                                            <div class="left-box">
                                                <span class="duration"><?php the_field( 'type' ); ?></span>
                                                <span class="description">Appropriate for <?php the_field( 'appr_for' ); ?></span>

                                                <div class="bottom-box clearfix">
                                                    <div class="left-bottom-box">
                                                        <a href="<?= $uri; ?>" target="_blank"
                                                           class="<?= $class; ?> bg-filled-green button">Sign up</a>
                                                    </div>
													<?php if ( $c_class['pdf_link'] ) : ?>
                                                        <div class="right-bottom-box">
                                                            <a href="<?php echo $c_class['pdf_link']; ?>">
                                                                <i class="icon-file-pdf-box"></i>
                                                                <span>Download pdf</span>
                                                            </a>
                                                        </div>
													<?php endif; ?>
                                                </div>
                                                <div class="action-wrap">
                                                    <a href="#" class="open-popup"
                                                       data-title="<?php the_title(); ?>"
                                                       data-source-url="<?= sanitize_title( get_the_title() ); ?>"
                                                       data-type="<?php the_title();
													   echo ' - ';
													   universityClassDate( $c_class['start_date'], $c_class['end_date'] ); ?>">Hаve
                                                        a question?</a>
                                                </div>
                                            </div>
                                            <div class="right-box">
                                                <div class="tabs clearfix">
                                                    <div class="tab selected" tabfield="first">Overview</div>
                                                    <div class="tab" tabfield="second">Course outline</div>
                                                </div>
                                                <div class="tab-contents">
                                                    <div class="tabfield overview selected" data-name="first">
														<?php the_field( 'overview' ); ?>
                                                    </div>
                                                    <div class="tabfield outline" data-name="second">
														<?php if ( get_field( 'outline_type' ) == "text" ) {
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								<?php }
							}
						}
					} ?>
                </div>
            </div>
            <script>
                jQuery(document).ready(function ($) {
                    $('.one-training').sort(function (a, b) {
                        return $(a).data('start') - $(b).data('start');
                    }).appendTo('.training-schedule');
                    $('.preloader').hide();
                    $('.one-training').fadeIn(300);

                    $('.accordeon').click(function () {
                        $('.tab').removeClass('selected').filter('[tabfield="first"]').addClass('selected');
                        $('.tabfield').removeClass('selected').filter('[data-name="first"]').addClass('selected');
                        if ($(this).is('.active')) {
                            $(this).removeClass('active').next().removeClass('show');
                        } else {
                            $('.accordeon').removeClass('active').next().removeClass('show');
                            $(this).addClass('active').next().addClass('show');
                        }
                    });

                    $(document).on('click', '.tab', function () {
                        $(this).siblings('.tab').removeClass('selected');
                        $(this).addClass('selected');
                        $('.tabfield').removeClass('selected');
                        $('.tabfield[data-name="' + $(this).attr('tabfield') + '"]').addClass('selected');
                    });

                    $('.dd-list li').click(function () {
                        var liValue = $(this).html();
                        $('.dd-btn[data-list="' + $(this).parent().data('name') + '"] span').text(liValue);
                        $('.dd-list').removeClass('show');
                    });

                    $('.dd-list.type li').click(function () {
                        var liValue = $(this).html();
                        var currentLocation = $('.dd-btn[data-list="location"] span').html();

                        $('.one-training').hide();

                        if (liValue === 'all trainings' && currentLocation === 'all locations') {
                            $('.one-training').fadeIn(300);
                        } else if (liValue !== 'all trainings' && currentLocation === 'all locations') {
                            $('.one-training[data-title="' + liValue + '"]').fadeIn(300);
                        } else if (liValue === 'all trainings' && currentLocation !== 'all locations') {
                            $('.one-training[data-location="' + currentLocation + '"]').fadeIn(300);
                        } else if (liValue !== 'all trainings' && currentLocation !== 'all locations') {
                            $('.one-training[data-title="' + liValue + '"][data-location="' + currentLocation + '"]').fadeIn(300);
                        }
                    });

                    $('.dd-list.location li').click(function () {
                        var liValue = $(this).html();
                        var currentTitle = $('.dd-btn[data-list="type"] span').html();

                        $('.one-training').hide();

                        if (liValue === 'all locations' && currentTitle === 'all trainings') {
                            $('.one-training').fadeIn(300);
                        } else if (liValue !== 'all locations' && currentTitle === 'all trainings') {
                            $('.one-training[data-location="' + liValue + '"]').fadeIn(300);
                        } else if (liValue === 'all locations' && currentTitle !== 'all trainings') {
                            $('.one-training[data-title="' + currentTitle + '"]').fadeIn(300);
                        } else if (liValue !== 'all locations' && currentTitle !== 'all trainings') {
                            $('.one-training[data-location="' + liValue + '"][data-title="' + currentTitle + '"]').fadeIn(300);
                        }
                    });

                    $('.dd-btn').click(function () {
                        $('.dd-list[data-name="' + $(this).data('list') + '"], .show').toggleClass('show');
                    });

                    $("html").click(function (event) {
                        if ($(event.target).closest('.dd-list, .dd-btn').length === 0) {
                            $('.dd-list').removeClass('show');
                        }
                    });

                    // Custom form actions
                    $(document).on('popup-opened', function (e, button) {
                        let $button = $(button);
                        var type = $button.data('type');
                        var $inquiryType = $('#inquirytype');
                        if (type) {
                            if (!window.hasOwnProperty('inquiryType_bkp')) {
                                window.inquiryType_bkp = $inquiryType.html();
                            }
                            $inquiryType.html('<option value="' + type + '" selected="selected">' + type + '</option>').attr('disabled', true).change();
                        } else {
                            if (window.hasOwnProperty('inquiryType_bkp')) {
                                $inquiryType.html(window.inquiryType_bkp).attr('disabled', false);
                            }
                        }
                        var full_source = window.location.href.split("#")[0] + '#' + $button.data('source-url');
                        $('#submittedOnUrl').val(full_source);
                    });
                });
            </script>
        </div>
		<?php wp_reset_postdata() ?>
		<?php get_template_part( 'parts/get-in-touch' ) ?>
    </div>
</section>
<?php get_footer();
add_filter( 'dr/forms/fields/customersinterest/placeholder', function () {
	return 'Question';
} );
add_filter( 'dr/forms/fields/inquiry', function () {
	return 'inquiry-university';
} );
get_template_part( 'parts/forms/popup' );
get_template_part( 'end' ); ?>
