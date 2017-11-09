<?php
/* Template Name: Culture */
?>

<?php get_header(); ?>
<?php the_post(); ?>
<section class="culture">
	<div class="top-block" style="background-image: url(<?php the_field('banner_image'); ?>);">
		<div class="container">
			<div class="text-wrap">
				<h1><?php the_field('banner_title'); ?></h1>
				<div class="video-play transition">
					<?php the_field('banner_video'); ?>
				</div>
        <div class="video-text-after">
          <?php the_field('banner_text'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="position-stats">
		<div class="container">
			<?php
				$st = $greenhouse->statsData();

				$jobPage = get_id_by_slug('careers/job');

				$depts = get_field('department_info', $jobPage);

				foreach ($depts as $key => $dept) {
					$depts[$dept["dept_id"]] = $dept;
					unset($depts[$key]);
				}
			?>
			<div class="stats-wrap">
				<div class="left-col">
					<div class="total-pos">
						<div class="total-number"><?php echo $st['total_jobs']; ?></div>
						<div class="b-label">Open positions</div>
					</div>
					<p class="talents-text"><?php the_field('talents_text'); ?></p>
					<a href="/careers/" class="bg-filled-blue button">All Open positions</a>
				</div>
				<div class="right-col">
					<div class="dept-links">
						<ul class="clearfix">
							<?php
							$elWidth = 100/count($st['departments']);
							$first = true;
							foreach($st['departments'] as $key => $el){
								if ($first) { ?>
	                <li class="active" data-id="<?php echo $key; ?>" style="width: <?php echo $elWidth."%"; ?>">
									<?php unset($first); ?>
	              <?php } else { ?>
	                <li data-id="<?php echo $key; ?>" style="width: <?php echo $elWidth."%"; ?>">
	              <?php } ?>
										<span><?php echo $el['name']; ?> (<?php echo $el['countJobs']; ?>)</span>
								</li>
							<?php } ?>
						</ul>
						<div class="scroller transition01" style="width: <?php echo $elWidth."%"; ?>"></div>
					</div>
					<?php if($depts) {
						echo '<div class="dept-descriptions clearfix">';
							foreach($st['departments'] as $key => $el) { ?>
								<div class="department-info" id="<?php echo $key; ?>">
									<div class="acc-header">
										<span><?php echo $el['name']; ?> (<?php echo $el['countJobs']; ?>)</span>
										<i class="icon-chevron-down"></i>
									</div>
									<div class="acc-body">
										<div class="dept-video"><?php echo $depts[$key]["video"]; ?></div>
										<div class="dept-text">
											<?php echo $depts[$key]["description_text"]; ?>
											<a href="/careers/#department=<?php echo $key; ?>">
												<i class="icon-circle-right"></i>
												<span>Open positions</span>
											</a>
										</div>
									</div>
								</div>
							<?php }
						echo '</div>';
					} ?>
				</div>
			</div>
		</div>
	</div>
	<div class="wwd">
		<div class="container">
			<div class="main">
        <p><?php the_content(); ?></p>
			</div>
			<div class="row-wrap">
				<div class="left-col">
					<h3><?php the_field('content_lc_title'); ?></h3>
					<p><?php the_field('content_lc'); ?></p>
				</div>
				<div class="right-col">
					<h3><?php the_field('content_rc_title'); ?></h3>
					<p><?php the_field('content_rc'); ?></p>
				</div>
			</div>
		</div>
	</div>
  <div class="offices">
    <h2><?php the_field('block_title'); ?></h2>
    <div class="tabs">
      <div class="container">
        <div class="item-wrap">
          <?php
            $offices = get_field('offices');
            $width = 100/count($offices) - 1;
            foreach($offices as $index => $office){
              if ($index == 0) { ?>
                <div class="item active transition" data-name="<?php strToLowRep($office['office_title']); ?>" style="width: <?php echo $width."%"; ?>">
              <?php } else { ?>
                <div class="item transition" data-name="<?php strToLowRep($office['office_title']); ?>" style="width: <?php echo $width."%"; ?>">
              <?php } ?>
                <figure>
				  <a href="/careers/#location=<?php str_location($office['office_title']); ?>"></a>
                  <div class="img-wrap">
                    <img class="transition" src="<?php echo $office['office_image']; ?>" alt="<?php echo $office['office_title']; ?>">
										<div class="clock <?php strToLowRep($office['office_title']); ?>" data-location="<?php strToLowRep($office['office_title']); ?>" data-tz="<?php echo $office['office_timezone']; ?>">
											<div class="hours-container">
												<div class="hours"></div>
											</div>
											<div class="minutes-container">
												<div class="minutes"></div>
											</div>
											<div class="seconds-container">
												<div class="seconds"></div>
											</div>
										</div>
                  </div>
                  <figcaption>
                    <p><e><?php echo $office['office_title']; ?></e><span><?php echo $office['office_country']; ?></span></p>
                  </figcaption>
                </figure>
              </div>
          <?php } ?>
          <div class="scroller transition01" style="width: <?php echo $width.'%'; ?>"></div>
        </div>
      </div>
    </div>
		<?php if ($thereiscontentforoffices) { ?>
			<div class="tab-content">
	      <div class="container">
	      <?php foreach ($offices as $index => $office) {
	        if ($index == 0) { ?>
	          <div class="item transition active" id="<?php strToLowRep($office['office_title']); ?>">
	        <?php } else { ?>
	          <div class="item transition" id="<?php strToLowRep($office['office_title']); ?>">
	        <?php } ?>
						<div class="office-thumb">
							<figure>
								<div class="img-wrap">
									<img class="transition" src="<?php echo $office['office_image']; ?>" alt="<?php echo $office['office_title']; ?>">
								</div>
								<figcaption>
									<p><i class="icon-chevron-down"></i><e><?php echo $office['office_title']; ?></e><span><?php echo $office['office_country']; ?></span></p>
								</figcaption>
							</figure>
						</div>
	          <div class="office_info">
	            <div class="col-left clearfix">
	              <div class="description_text">
	                <p><?php echo $office['description_text']; ?></p>
	              </div>
	              <?php if($office['perks']){ ?>
	                <div class="perks">
	                  <h4>Perks</h4>
	                  <ul>
	                    <?php foreach ($office['perks'] as $perk) {
	                      echo '<li><i class="icon-check"></i><span class="feature-text">'.$perk['perk_text'].'</span></li>';
	                    } ?>
	                  </ul>
	                </div>
	              <?php } ?>
	              <?php if($office['area_info']){ ?>
	                <div class="area-info">
	                  <h4>Area info</h4>
	                  <p><?php echo $office['area_info']; ?></p>
	                </div>
	              <?php } ?>
	            </div>
	            <div class="col-right">
	              <?php if( $office['slider'] ): ?>
	                <div class="office-slider-wrap">
	                  <div class="office-slider-<?php echo $index; ?>">
	                    <?php
	                    foreach ($office['slider'] as $slide) { ?>
	                      <div class="item">
	                          <img src="<?php echo $slide['image']; ?>" alt="<?php echo $office['office_title']; ?>">
	                      </div>
	                    <?php } ?>
	                  </div>
	                  <div class="controls">
	                    <div class="bullets clearfix"></div>
	                  </div>
	                </div>
	              <?php endif; ?>
	            </div>
							<div class="op-link">
				        <a href="<?php echo $office['open_positions_link']; ?>" class="bg-filled-blue button">Open positions in <?php str_location($office['office_title']); ?></a>
				      </div>
	          </div>
	        </div>
	      <?php } ?>
	      </div>
	    </div>
		<?php } ?>


		<script type="text/javascript">
			var actDept = jQuery('.dept-links li.active').data('id');
			jQuery('.dept-descriptions .active').removeClass('active');
			jQuery('#'+actDept).addClass('active');
			setTimeout(function(){
				jQuery('.dept-descriptions .active .dept-video').css('opacity', '1');
			}, 300);

			jQuery(document).ready(function($){
				$('.tabs .item').mouseenter(function(){
					if (!$(this).hasClass('active')) {
						var id = $(this).data('name');
						var pos = $(this).position();
						$('.tabs .item.active').removeClass('active');
						$(this).addClass('active');
						$('.tab-content .item.active').removeClass('active');
						$('#'+id).addClass('active');
						$('.offices .scroller').css("left", pos.left);
					}
				});

				$('.dept-links li').mouseenter(function(){
					if (!$(this).hasClass('active')) {
						var id = $(this).data('id');
						var pos = $(this).position();
						$('.dept-links li.active').removeClass('active');
						$(this).addClass('active');
						$('.dept-descriptions .active').removeClass('active');
						jQuery('.dept-descriptions .dept-video').css('opacity', '0');
						$('#'+id).addClass('active');
						setTimeout(function(){
							jQuery('.dept-descriptions .active .dept-video').css('opacity', '1');
						}, 300);
						$('.dept-links .scroller').css("left", pos.left);
					}
				});

				if ($(window).width() < 720) {
					$('.tab-content .item figcaption').click(function(){
						var item = $(this).parents('.item');
						if (item.hasClass('active')) {
							item.find('.office-info').slideUp(300);
							item.removeClass('active');
						} else {
							$('.tab-content .item.active .office-info').fadeOut();
							$('.tab-content .item.active').removeClass('active');
							item.find('.office-info').slideDown(300);
							item.addClass('active');
						}
					});

					$('.department-info .acc-header').click(function(){
						if ($(this).hasClass('active')) {
							$(this).next('.acc-body').slideUp(300);
							$(this).removeClass('active');
						} else {
							$('.department-info .acc-header.active').next('.acc-body').fadeOut();
							$('.department-info .acc-header.active').removeClass('active');
							$(this).next('.acc-body').slideDown(300);
							$(this).addClass('active');
						}
					});
				}
				<?php foreach ($offices as $index => $office) { ?>
                jQuery('.office-slider-<?php echo $index; ?>').bxSlider({
                    mode: 'fade',
                    speed: 300,
                    pagerSelector: '.bullets',
                    prevSelector: '.office-slider-wrap .controls',
                    nextSelector: '.office-slider-wrap .controls',
                    prevText: '<i class=\"icon-slider-prev\"></i><span>Previous</span>',
                    nextText: '<span>Next</span><i class=\"icon-slider-next\"></i>',
                    minSlides: 1,
                    maxSlides: 1,
                    moveSlides: 1
                });
				<?php } ?>
			});


		</script>
  </div>
  <div class="global" style="background-image: url(<?php the_field('gr_image'); ?>);">
		<div class="global-text-wrap">
			<h2>Global Robots</h2>
	    <p>Don't see your location? We have team members all over the world who work remotely.</p>
		</div>
  </div>

  <?php
  $cv = get_field('core_values');
  if( $cv ): ?>
    <div class="core-values">
      <div class="container">
        <h2>Our core values</h2>
        <div class="panel-controls">
            <div class="slider-prev"></div>
            <div class="slider-next"></div>
        </div>
        <div class="cv-slider-wrap">
          <ul class="cv-slider clearfix">
          <?php foreach ($cv as $key => $value) { ?>
            <li class="slide">
              <img src="<?php echo $value['value_image']; ?>" alt="<?php echo $value['value_title']; ?>" title="<?php echo $value['value_title']; ?>" />
              <span class="index">#<?php echo $key + 1; ?></span>
              <p class="value-text"><?php echo $value['value_title']; ?></p>
            </li>
          <?php } ?>
          </ul>
					<div class="controls">
						<div class="bullets clearfix"></div>
					</div>
        </div>
      </div>
			<!-- <div class="op-link">
        <a href="/careers/" class="bg-filled-blue button">Join the team</a>
      </div> -->
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            function extend(obj, src) {
                for (var key in src) {
                    if (src.hasOwnProperty(key)) obj[key] = src[key];
                }
                return obj;
            }

            var slSize = {};
            var slParams = {};

            var sl_basic = {
                mode: 'horizontal',
                speed: 500,
                pagerSelector: '.bullets',
                prevSelector: '.core-values .slider-prev',
                nextSelector: '.core-values .slider-next',
                prevText: '<i class="icon-slider-prev"></i>',
                nextText: '<i class="icon-slider-next"></i>',
                hideControlOnEnd: true,
                infiniteLoop: true,
                auto: true,
                autoHover: true,
            }
            sl3 = {
                slideWidth: 390,
                slideMargin: 30,
                minSlides: 3,
                maxSlides: 3,
                moveSlides: 3
            }
            sl2 = {
                slideWidth: 480,
                slideMargin: 30,
                minSlides: 2,
                maxSlides: 2,
                moveSlides: 2
            }
            sl1 = {
                slideWidth: 480,
                slideMargin: 0,
                minSlides: 1,
                maxSlides: 1,
                moveSlides: 1
            }

            function cv_checkWidth() {
                var wSize = jQuery(window).width();

                if (wSize >= 1024) {
                    slSize = sl3;
                } else if (wSize >= 720 && wSize < 1024) {
                    slSize = sl2;
                } else {
                    slSize = sl1;
                }
            }

            function cv_setParams() {
                slParams = extend(sl_basic, slSize);
            }

            cv_checkWidth();
            cv_setParams();

            var cvSlider = jQuery('.cv-slider').bxSlider(slParams);

            jQuery(window).resize(function () {
                cv_checkWidth();
                cv_setParams();
                cvSlider.reloadSlider(slParams);
            });

            jQuery('.core-values .panel-controls').hover(
                function () {
                    cvSlider.stopAuto();
                },
                function () {
                    cvSlider.startAuto();
                }
            );
        });
    </script>
  <?php endif; ?>

	<div class="get-in-touch">
			<div class="container">
					<div class="button-wrap">
							<p>Interested in a career at DataRobot?</p>
							<a href="/careers/" class="bg-filled-white button">View our open positions</a>
					</div>
			</div>
	</div>

</section>
<?php get_footer(); ?>
<?php get_template_part('end'); ?>
