<?php
/* Template Name: Industry: Healthcare */
?>
<?php get_header(); ?>

<?php
$hc_stats = get_field('key_stats');
$hc_sections = get_field('sections');
?>

<section class="uc-landing hc">
	<?php get_template_part( 'parts/industry/top-banner' ) ?>
    <div class="page-content">
        <div class="container">
          <?php if ($hc_stats) { ?>
              <div class="hc-stats">
                <h2>Key Healthcare Stats</h2>
                <div class="slider-wrap">
                  <div class="stats-sl">
                    <?php foreach ($hc_stats as $item) { ?>
                      <div class="item">
                        <div class="top"><?php echo $item['title']; ?></div>
                        <div class="bottom"><?php echo $item['text']; ?></div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
                <div class="controls">
                  <div class="sl-prev"></div>
                  <div class="sl-next"></div>
                </div>
              </div>
          <?php } ?>

          <?php if ($hc_sections) { ?>
              <div class="hc-sections">
                  <div class="sections-switcher">
                      <?php foreach($hc_sections as $key => $item){
                        if ($key == 0) { ?>
                          <div class="section active" sect="<?php echo $item['section_title']; ?>"><?php echo $item['section_title']; ?></div>
                        <?php } else { ?>
                          <div class="section" sect="<?php echo $item['section_title']; ?>"><?php echo $item['section_title']; ?></div>
                        <?php }
                      } ?>
                  </div>
                  <div class="section-content">
                      <?php foreach ($hc_sections as $item) { ?>
                          <div class="single-section" style="display: none" data-name="<?php echo $item['section_title']; ?>">
                            <div class="title-wrap">
                              <h2><?php echo $item['section_title']; ?></h2>
                              <i class="icon-chevron-down"></i>
                            </div>
                            <div class="b-top">
                              <div class="img-wrap">
                                  <img src="<?php echo $item['section_image']; ?>" alt="<?php echo $item['section_title']; ?>">
                              </div>
                            </div>
                            <div class="b-bottom">
                                <div class="b-wrap collapsed">
                                  <?php $columns = $item['section_content'];
                                  foreach ($columns as $column) { ?>
                                    <div class="item">
                                      <h3><?php echo $column['title']; ?></h3>
                                      <div class="text">
                                        <?php echo $column['description']; ?>
                                      </div>
                                    </div>
                                  <?php } ?>
                                </div>
                                <div class="show-more">
                                  <p class="button">Show more</p>
                                </div>
                            </div>
                        </div>
                      <?php } ?>
                  </div>
              </div>
          <?php } ?>

          <?php if (get_field('benefit')) { ?>
              <div class="with-rd mobile">
                  <h2>DataRobot can help you with:</h2>
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
                      endif;
                    ?>
                  </div>
              </div>
          <?php } ?>

          <?php if (get_field('industry_name')) { ?>
            <?php
            $term = get_term_by('slug', 'healthcare', 'group');
            $useCases = get_posts(
    					array(
    						'numberposts'     => -1,
    						'post_type'       => 'usecase',
    						'post_status'     => 'publish',
    						'orderby'         => 'post_date',
    						'order'           => 'DESC',
    						'tax_query'       => array(
    						    array(
    						      'taxonomy'  => 'group',
    						      'field'     => 'id',
    						      'terms'     => $term->term_id
    						    )
    						),
    					)
    				);
            ?>
              <div class="ind-uc">
                <div class="block-label">
                  <span><?php _e('Use cases', 'datarobot3'); ?></span>
                </div>
                <div class="main-wrap clearfix">
                  <div class="b-left">
                    <div class="title-wrap">
                      <img src="<?php the_field('i_icon'); ?>" alt="<?php the_field('industry_name'); ?>">
                      <span><?php the_field('industry_name'); ?></span>
                    </div>
                    <div class="text">
                      <?php the_field('i_description'); ?>
                    </div>
                    <div class="uc_link">
                      <a href="<?php the_field('uc_link'); ?>">
                        <i class="icon-circle-right"></i>
                        <span><?php _e('See all use cases', 'datarobot3'); ?></span>
                      </a>
                    </div>
                  </div>
                  <div class="b-right">
                    <div class="slider-wrap">
                      <div class="controls">
                        <div class="sl-prev"></div>
                        <div class="sl-next"></div>
                      </div>
                      <div class="uc-slider">
                        <?php foreach ($useCases as $post) {
                          setup_postdata($post);
                          $excerpt = get_field('excerpt'); ?>
                          <div class="item">
                            <div class="item-i-wrap">
                              <h3><?php the_title(); ?></h3>
                              <p>
                                <?php
                                if (strlen($excerpt) >= 145) {
                                  echo substr($excerpt, 0, 145) . "...";
                                } else {
                                  echo $excerpt;
                                }
                                ?>
                              </p>
                              <a href="<?php the_permalink(); ?>"><i class="icon-long-arrow-down"></i></a>
                            </div>
                            <div class="b-shadow"></div>
                          </div>
                        <?php } wp_reset_postdata(); ?>
                      </div>
                    </div>
                  </div>
                </div>
                <script type="text/javascript">
                    jQuery(document).ready(function ($) {
                        jQuery('.uc-slider').bxSlider({
                            speed: 300,
                            slideWidth: 350,
                            slideMargin: 30,
                            pager: false,
                            prevSelector: '.ind-uc .sl-prev',
                            nextSelector: '.ind-uc .sl-next',
                            prevText: '<i class=\"icon-chevron-left\"></i>',
                            nextText: '<i class=\"icon-chevron-right\"></i>',
                            hideControlOnEnd: true,
                            infiniteLoop: false,
                            minSlides: 1,
                            maxSlides: 1,
                            moveSlides: 1
                        });
                    });
                </script>
              </div>
          <?php } ?>

          <?php if (get_field('q_name')) { ?>
              <div class="hc-quote">
                <div class="b-left">
                  <div class="video-container">
                    <?php the_field('q_video'); ?>
                  </div>
                </div>
                <div class="b-right">
                  <div class="top-wrap">
                    <img src="<?php the_field('q_photo'); ?>" alt="<?php the_field('q_name'); ?>">
                    <div class="name">
                      <?php the_field('q_name'); ?>
                    </div>
                    <div class="title">
                      <?php the_field('q_title'); ?>
                    </div>
                  </div>
                  <div class="bottom-wrap">
                    <?php the_field('q_text'); ?>
                  </div>
                </div>
              </div>
          <?php } ?>
        </div>
    </div>
	<?php get_template_part( 'parts/get-in-touch' ) ?>
</section>
<?php get_footer(); ?>
<script>
    jQuery(document).ready(function ($) {
        function extend(obj, src) {
            for (var key in src) {
                if (src.hasOwnProperty(key)) obj[key] = src[key];
            }
            return obj;
        }

        function sl_checkWidth() {
            var wSize = jQuery(window).width();

            if (wSize > 1366) {
                sl_Size = sl_def;
            } else if (wSize >= 1024 && wSize <= 1366) {
                sl_Size = sl3;
            } else if (wSize >= 720 && wSize < 1024) {
                sl_Size = sl2;
            } else {
                sl_Size = sl1;
            }
        }

        function sl_setParams() {
            sl_Params = extend(sl_basic, sl_Size);
        }

        var sl_Size = {};
        var sl_Params = {};

        var sl_basic = {
            speed: 300,
            slideWidth: 285,
            slideMargin: 135,
            pager: false,
            prevSelector: '.hc-stats .sl-prev',
            nextSelector: '.hc-stats .sl-next',
            prevText: '<i class=\"icon-chevron-left\"></i>',
            nextText: '<i class=\"icon-chevron-right\"></i>',
            hideControlOnEnd: false,
            infiniteLoop: true,
            minSlides: 3,
            maxSlides: 3,
            moveSlides: 1,
            auto: true,
            pause: 5000,
            autoHover: true
        }
        sl_def = {
            slideWidth: 285,
            slideMargin: 135,
            minSlides: 3,
            maxSlides: 3,
            moveSlides: 1
        }
        sl3 = {
            slideWidth: 285,
            slideMargin: 45,
            minSlides: 3,
            maxSlides: 3,
            moveSlides: 1
        }
        sl2 = {
            slideWidth: 480,
            slideMargin: 30,
            minSlides: 2,
            maxSlides: 2,
            moveSlides: 1
        }
        sl1 = {
            slideWidth: 480,
            slideMargin: 0,
            minSlides: 1,
            maxSlides: 1,
            moveSlides: 1
        }

        sl_checkWidth();
        sl_setParams();

        var st_Slider = jQuery('.stats-sl').bxSlider(sl_Params);

        jQuery(window).resize(function () {
            sl_checkWidth();
            sl_setParams();
            st_Slider.reloadSlider(sl_Params);
        });

        jQuery('.hc-stats .controls').hover(
            function () {
                st_Slider.stopAuto();
            },
            function () {
                st_Slider.startAuto();
            }
        );
        jQuery('.show-more').click(function () {
            jQuery('.show-more').hide();
            jQuery('.b-wrap').removeClass('collapsed');
        });

        jQuery('.benefit-wrap .title-wrap').click(function () {
            if (jQuery(this).is('.active')) {
                jQuery(this).removeClass('active').children('.icon-chevron-down').removeClass('active').parent('.title-wrap').siblings('.mobile-accordeon').removeClass('show open');
            } else {
                jQuery('.benefit-wrap .title-wrap').removeClass('active').children('.icon-chevron-down').removeClass('active').parent('.title-wrap').siblings('.mobile-accordeon').removeClass('show');
                jQuery(this).addClass('active').children('.icon-chevron-down').addClass('active').parent('.title-wrap').siblings('.mobile-accordeon').addClass('show');
            }
        });

        var viewportWidth = jQuery(window).width();


        if (viewportWidth > 719) {
            jQuery('.single-section[data-name="' + jQuery('.sections-switcher .active').attr('sect') + '"]').hide().fadeIn(500);
            jQuery(document).on('click', '.section', function () {
                jQuery(this).siblings('.section').removeClass('active');
                jQuery(this).addClass('active');
                jQuery('.single-section').hide();
                jQuery('.single-section[data-name="' + jQuery(this).attr('sect') + '"]').fadeIn(500);
            });
        } else if (viewportWidth < 719) {
            jQuery('.single-section').show();
        }

        jQuery('.benefit-wrap .title-wrap .icon-chevron-down').first().addClass('active').parents('.title-wrap').siblings('.mobile-accordeon').addClass('show');
        jQuery('.title-wrap').first().addClass('active');

        jQuery('.section-content .icon-chevron-down').first().addClass('active').parent('.title-wrap').addClass('active').parents('.single-section').addClass('open');

        jQuery('.hc-sections .title-wrap').click(function () {
            if (jQuery(this).is('.active')) {
                jQuery(this).removeClass('active').children('.icon-chevron-down').removeClass('active').parents('.single-section').removeClass('open');
            } else {
                jQuery('.hc-sections .title-wrap').removeClass('active').children('.icon-chevron-down').removeClass('active').parents('.single-section').removeClass('open');
                jQuery(this).addClass('active').children('.icon-chevron-down').addClass('active').parents('.single-section').addClass('open');
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

            if (viewportWidth < 719) {
                jQuery('.single-section').show();
            } else {
                jQuery('.single-section').hide();
                jQuery('.single-section[data-name="' + jQuery('.sections-switcher .active').attr('sect') + '"]').fadeIn(500);
            }
        });
    });
</script>
<?php get_template_part( 'parts/forms/popup' );
get_template_part( 'end' ); ?>
