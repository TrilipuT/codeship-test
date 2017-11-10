<?php
/* Template Name: Product */
?>

<?php get_header(); ?>
<?php
the_post();
$hiw            = get_field( 'video_link' );
$featured_links = get_field( 'featured_links' );
?>
<section class="product <?php the_field( 'class' ) ?>">
    <div class="top-banner" style="background-image: url(<?php the_field( 'banner_image' ); ?>)">
        <div class="container clearfix">
            <div class="b-left">
                <h1><?php the_field( 'banner_title' ); ?></h1>
                <p><?php the_field( 'banner_text' ); ?></p>
                <a href="#"
                   class="open-popup bg-filled-blue button"><?php _e( 'Get Started with a Free Demo', 'datarobot3' ); ?></a>
				<?php if ( get_field( 'banner_video' ) ) : ?>
                    <div class="watch-v transition">
                        <i class="icon-play-circle-outline"></i><?php the_field( 'banner_video' ); ?>
                    </div>
				<?php endif; ?>
            </div>
            <div class="b-right">
				<?php if ( get_field( 'banner_image_mobile' ) ) {
					$image = get_field( 'banner_image_mobile' ); ?>
                    <img src="<?php echo $image['url']; ?>" width="<?php echo( $image['width'] / 2 ); ?>"
                         alt="<?php the_field( 'banner_title' ); ?>" class="tb-mobile">
				<?php } ?>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
			<?php if ( get_the_content() ) { ?>
                <div class="excerpt" <?= ! $hiw ? 'style="border-bottom: none;"' : '' ?>>
                    <?php the_content(); ?>
					<?php if ( $featured_links ) { ?>
                        <div class="featured_links">
							<?php foreach ( $featured_links as $item ) {
								$icon = $item['icon']; ?>
                                <div class="item">
                                    <div class="e-icon">
                                        <img src="<?php echo $icon['url']; ?>"
                                             width="<?php echo( $icon['width'] / 2 ); ?>">
                                    </div>
                                    <div class="e-text">
										<?php echo $item['text']; ?>
                                    </div>
                                    <a class="button bg-filled-blue"
                                       href="<?php echo $item['link_url']; ?>"><?php echo $item['link_text']; ?></a>
                                </div>
							<?php } ?>
                        </div>
					<?php } ?>
                </div>
			<?php } ?>
			<?php if ( $hiw ) {
				$steps = get_field( 'steps' ); ?>
                <div class="how-it-works">
                    <h2><?php _e( 'How DataRobot works', 'datarobot3' ); ?></h2>
                    <div class="video-slider">
                        <div class="video-tabs">
							<?php foreach ( $steps as $index => $step ) { ?>
                                <a href="" class="tab transition" data-start="<?php echo $step['step_start_time']; ?>">
                                <span class="progress-circle progress-0"><span
                                            class="number"><?php echo $index + 1; ?></span></span>
                                    <span class="tab-title"><?php echo $step['step_title']; ?></span>
                                </a>
							<?php } ?>
                        </div>
                        <div class="video-content">
                            <div class="tab-content active">
                                <div class="wistia_embed wistia_async_<?php echo $hiw; ?> wmode=transparent videoFoam=true"
                                     style="height:360px;width:496px;">&nbsp;
                                </div>
                            </div>
                        </div>
                        <script src="//fast.wistia.com/assets/external/E-v1.js"></script>
                        <script>
                            window._wq = window._wq || [];
                            _wq.push({
                                id: "<?php echo $hiw; ?>", onReady: function (video) {
                                    var prBar = document.createElement("div");
                                    prBar.className = 'progressbar';
                                    prBar.innerHTML = '<div class="bar"></div>';
                                    video.grid.bottom_inside.appendChild(prBar);

                                    var rewatch = document.createElement("div");
                                    rewatch.className = 'rewatch';
                                    rewatch.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="#FFFFFF" height="48" viewBox="0 0 24 24" width="48"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 5V1L7 6l5 5V7c3.31 0 6 2.69 6 6s-2.69 6-6 6-6-2.69-6-6H4c0 4.42 3.58 8 8 8s8-3.58 8-8-3.58-8-8-8z"/></svg>';
                                    video.grid.center.appendChild(rewatch);

                                    var elem = video.container.querySelector(".bar");
                                    var width = 0;
                                    var state;

                                    var s = 0;
                                    var s_Old;
                                    var prClass = "progress-0";
                                    var progressRingInt;

                                    function isScrolledIntoView(elem) {
                                        var docViewTop = jQuery(window).scrollTop();
                                        var docViewBottom = docViewTop + jQuery(window).height();
                                        var elemTop = jQuery(elem).offset().top;
                                        var elemBottom = elemTop + jQuery(elem).height();
                                        return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom) && (elemBottom <= docViewBottom) && (elemTop >= docViewTop));
                                    }

                                    jQuery(window).scroll(function () {
                                        if (isScrolledIntoView(jQuery('.video-slider'))) {
                                            if (video.state() !== "playing" && state !== "stop") {
                                                video.play();
                                            }
                                        } else {
                                            if (video.state() === "playing") {
                                                video.pause();
                                            }
                                        }
                                    });

                                    jQuery('a.tab').click(function (e) {
                                        e.preventDefault();
                                        var time = jQuery(this).data('start');
                                        video.pause();
                                        jQuery(this).prevAll().each(function () {
                                            jQuery(this).find('span.progress-circle').attr('class', 'progress-circle progress-100');
                                        });
                                        jQuery(this).nextAll().each(function () {
                                            jQuery(this).find('span.progress-circle').attr('class', 'progress-circle progress-0');
                                        });
                                        video.time(time).play();
                                    });

                                    jQuery('.rewatch').click(function () {
                                        jQuery(this).hide();
                                        jQuery('a.tab').eq(0).trigger('click');
                                    });

                                    video.bind('play', function () {
                                        jQuery('.rewatch').hide();
                                        state = "play";
                                        var progressBarInt = setInterval(progressBar, 100);

                                        function progressBar() {
                                            if (width >= 99.9) {
                                                clearInterval(progressBarInt);
                                                width = 0;
                                            } else {
                                                width = (video.time() * 100) / video.duration();
                                                elem.style.width = width + '%';
                                            }
                                        }
                                    });

                                    video.bind("timechange", function (t) {
                                        state = "play";

                                        switch (true) {
										<?php steps_timing( $steps ); ?>
                                        }

                                        function activateTab(i, st, d) {
                                            if (!jQuery("a.tab").eq(i).hasClass('active')) {
                                                jQuery("a.tab.active").removeClass('active');
                                                jQuery("a.tab").eq(i).addClass('active');
                                                var activeTabElem = jQuery("a.tab.active .progress-circle");
                                                activeTabElem[0].className = 'progress-circle progress-0';
                                                clearInterval(progressRingInt);
                                                var progressRingInt = setInterval(progressRing, 10);

                                                function progressRing() {
                                                    var s_Old = s;
                                                    if (s >= 100) {
                                                        clearInterval(progressRingInt);
                                                        s = 0;
                                                        prClass = 'progress-0';
                                                    } else {
                                                        s = Math.ceil(((video.time() - st) * 100) / d);
                                                        if (s > s_Old) {
                                                            activeTabElem[0].classList.remove(prClass);
                                                            s_Old = s;
                                                            prClass = 'progress-' + s;
                                                            activeTabElem[0].classList.add(prClass);
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    });

                                    video.bind('end', function () {
                                        state = "stop";
                                        jQuery('.rewatch').fadeIn(300);
                                    });
                                }
                            });
                        </script>
                    </div>
                    <a href="#"
                       class="open-popup bg-filled-orange button"><?php _e( 'Request a demo', 'datarobot3' ); ?></a>
                </div>
			<?php } ?>
        </div>
		<?php if ( get_field( 'aml_text' ) ) { ?>
            <div class="aml">
                <div class="aml-wrapper">
                    <div class="container">
                        <div class="b-left">
                            <h2><?php _e( 'Automated Machine Learning', 'datarobot3' ); ?></h2>
                            <p><?php the_field( 'aml_text' ); ?></p>
							<?php if ( get_field( 'aml_button_link' ) ) : ?>
                                <a href="<?php the_field( 'aml_button_link' ) ?>" target="_blank"
                                   class="bg-filled-blue button"><?php the_field( 'aml_button_text' ) ?></a>
							<?php endif; ?>
                        </div>
                        <div class="b-right">
                            <img src="<?php the_field( 'aml_img' ); ?>" alt="Automated Machine Learning"/>
                        </div>
                    </div>
                </div>
				<?php if ( get_field( 'aml_tiles' ) ): ?>
                    <div class="aml-tiles">
                        <div class="container">
                            <div class="aml-title"><span><?php _e( 'Advantages', 'datarobot3' ); ?></span></div>
                            <div class="aml-tiles-wrapper">
								<?php $tiles = get_field( 'aml_tiles' );
								foreach ( $tiles as $tile ) { ?>
                                    <div class="item">
                                        <div class="bg-wrap">
                                            <div class="image"><img src="<?php echo $tile['image']; ?>"></div>
                                            <h3><?php echo $tile['title']; ?></h3>
                                            <i class="icon-chevron-down"></i>
                                            <div class="mobile-accordeon">
                                                <p><?php echo $tile['text']; ?></p>
                                            </div>
                                        </div>
                                    </div>
								<?php } ?>
                            </div>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
		<?php } ?>
		<?php if ( get_field( 'rd_text' ) ) { ?>
            <div class="container">
                <div class="rdl clearfix">
                    <div class="b-left">
                        <img src="<?php the_field( 'rd_image' ); ?>" alt="Rapid Deployment">
                    </div>
                    <div class="b-right">
                        <h2><?php the_field( 'rd_title' ); ?></h2>
                        <p><?php the_field( 'rd_text' ); ?></p>
                    </div>
                </div>
            </div>
		<?php } ?>
		<?php if ( get_field( 'eg_text' ) ) { ?>
            <div class="eg">
                <div class="eg-wrapper">
                    <div class="container">
                        <div class="b-left">
                            <h2><?php _e( 'Enterprise-Grade', 'datarobot3' ); ?></h2>
                            <p><?php the_field( 'eg_text' ); ?></p>
                            <a href="https://www.datarobot.com/product/enterprise-ai/"
                               style="display: block;margin-top: 30px;font-weight: 500;">Learn more about customized
                                enterprise solutions</a>
                        </div>
                        <div class="b-right">
                            <h3><?php _e( 'Features that make DataRobot truly enterprise grade are:', 'datarobot3' ); ?></h3>
							<?php
							if ( have_rows( 'eg_list' ) ):
								while ( have_rows( 'eg_list' ) ) : the_row(); ?>
                                    <div class="feature"><i class="icon-check"></i>
                                        <p><?php the_sub_field( 'features' ); ?></p></div>
								<?php endwhile;
							endif;
							?>
                        </div>
                    </div>
                </div>
                <div class="eg-tiles">
                    <div class="container">
                        <div class="eg-title"><span><?php _e( 'Features', 'datarobot3' ); ?></span></div>
                        <div class="eg-tiles-wrapper">
							<?php $tiles = get_field( 'eg_tiles' );
							if ( $tiles ) {
								foreach ( $tiles as $tile ) { ?>
                                    <div class="item">
                                        <div class="bg-wrap">
                                            <div class="image"><img src="<?php echo $tile['image']; ?>"></div>
                                            <h3><?php echo $tile['title']; ?></h3>
                                            <p><?php echo $tile['text']; ?></p>
                                        </div>
                                    </div>
								<?php }
							} ?>
                        </div>
                    </div>
                </div>
            </div>
		<?php } ?>
    </div>
    <div class="quotes">
        <div class="container">
            <div class="quote-slider">
				<?php
				$quotes = get_field( 'quote' );
				if ( $quotes ) {
					echo '<ul>';
					foreach ( $quotes as $index => $quote ) { ?>
                        <li>
                            <blockquote>
                                <p><?php echo $quote['quote_text']; ?></p>
                                <footer>
                                    <span class="name"><?php echo $quote['quote_author']; ?></span>
                                    <span class="title"><?php echo $quote['quote_author_title']; ?></span>
                                </footer>
                            </blockquote>
                        </li>

					<?php }
					echo '</ul>';
				}

				?>
                <div class="bullets"></div>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                jQuery('.quote-slider ul').bxSlider({
                    mode: 'fade',
                    pagerSelector: '.bullets',
                    controls: false,
                    infiniteLoop: false
                });

                if (jQuery('.quote-slider li').length === 1) {
                    jQuery('.bullets').hide();
                }
            });
        </script>
    </div>
	<?php get_template_part( 'parts/get-in-touch' ) ?>
</section>
<?php get_footer();
get_template_part( 'parts/forms/popup' );
get_template_part( 'end' ); ?>
