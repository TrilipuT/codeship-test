<?php
/* Template Name: Landing page template */
?>

<?php get_header('guide'); ?>

<?php
$bg = get_field('background_image');
$tc = get_field('text_color');
$content = get_field('lp_type');
$desc = get_field('description_type');
$ctl = get_field('content_type_left');
$ctr = get_field('content_type_right');
$image = get_field('benefits_image');
$wbnrEvent = get_field('event_details_wbnr');
$form_type = get_field('form_type');
$pixel = get_field('tracking_code');
$utm_param = get_field('utm_parameters');
?>

<section class="landing" style="color: <?php echo $tc; ?>; <?php if ($bg) {
    echo ' background-image: url(' . $bg . ');';
} ?>">
    <div class="container">
        <div class="lp-left">
            <div class="e-upper">
                <h1><?php the_field('headline'); ?></h1>
                <?php if ($desc == "text") { ?>
                <p><?php the_field('description'); ?></p>
                   <?php $counter = 0;?>
                <?php } else { ?>
                    <?php if( have_rows('with_logo') ):
                        while ( have_rows('with_logo') ) : the_row(); $counter++;
                            if($counter%2 !=0){
                            ?>
                            <div class="team-wrap">
                            <p><?php the_sub_field('team_name');?></p>
                            <img src="<?php the_sub_field('team_logo');?>" />
                                </div>
                                <?php } else{?>
                                <div class="team-wrap">
                                    <img src="<?php the_sub_field('team_logo');?>" />
                                    <p><?php the_sub_field('team_name');?></p>
                                </div>
                                <?php } ?>
                       <?php endwhile;
                    endif; ?>
                <?php } ?>
            </div>
            <div class="e-mobile-button">
                <a href="#" class="scroll-to bg-filled-orange button"><?php the_field('form_button_text'); ?></a>
            </div>
            <?php if ($content == "wbnr") { ?>
                <div class="e-bottom">
                    <div class="details list">
                        <h3><?php the_field('webinar_headline'); ?></h3>
                        <div class="list-box">
                            <?php while (have_rows('webinar_list')): the_row(); ?>
                                <span><?php the_sub_field('webinar_spot'); ?></span>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            <?php } elseif ($content == "lpg") { ?>
                <div class="e-bottom <?php echo($ctl == 'vid' ? 'video' : 'image'); ?>">
                    <div class="media <?php echo($ctl == 'event_details' ? 'dark' : ''); ?>">
                        <?php if ($ctl == "img") { ?>
                            <img src="<?php echo $image["url"]; ?>" width="<?php echo($image["width"] / 2); ?>"
                                 alt="Why DataRobot?">
                        <?php } elseif ($ctl == "vid") {
                            the_field('benefits_video');
                        } elseif ($ctl == "event") { ?>
                            <div class="event-box">
                              <?php if (get_field('event_details_image')) {
                                $dImage = get_field('event_details_image'); ?>
                                <img src="<?php echo $dImage["url"]; ?>" width="<?php echo($dImage["width"] / 2); ?>" alt="Event details">
                              <?php } else { ?>
                                <p class="title">Event details</p>
                                <div class="devider"></div>
                              <?php } ?>
                                <?php while (have_rows('event_details_lp')): the_row(); ?>
                                    <p><?php the_sub_field('details-list-lp'); ?></p>
                                <?php endwhile; ?>
                                <?php if (get_field('event_details_extra')) { ?>
                                  <p class="details-extra"><?php the_field('event_details_extra'); ?></p>
                                <?php } ?>
                            </div>
                        <?php } elseif ($ctl == "event_details"){ ?>
                            <div class="event-box">
                                <?php
                                if (have_rows('game_event_details')):
                                    while (have_rows('game_event_details')) : the_row(); ?>
                                        <?php
                                        $datetime = get_sub_field("datetime");
                                        $dateTime = DateTime::createFromFormat("Mjl", $datetime);

                                        if ( is_object($dateTime) ) {
                                            $month = $dateTime->format('M');
                                            $date = $dateTime->format('j');
                                            $day = $dateTime->format('l');
                                        }
                                        ?>
                                        <div class="details-wrap">
                                        <div class="date-box">
                                            <p class="month"><?php echo $month ?></p>
                                            <p class="date"><?php echo $date ?></p>
                                            <p class="day"><?php echo $day ?></p>
                                        </div>
                                        <div class="desc-wrap">
                                            <p><i class="icon-map-marker"></i><?php the_sub_field('place'); ?></p>
                                            <p><i class="icon-clock"></i><?php the_sub_field('time'); ?></p>
                                        </div>
                                            </div>
                                        <p class="short-desc"><?php the_sub_field('short_description'); ?></p>
                                    <?php endwhile;
                                endif; ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="details">
                        <?php if ($ctr == "bl") { ?>
                            <h3><?php the_field('benefits_headline'); ?></h3>
                            <ul>
                                <?php while (have_rows('benefits_list')): the_row(); ?>
                                    <li><?php the_sub_field('benefit'); ?></li>
                                <?php endwhile; ?>
                            </ul>
                        <?php } elseif ($ctr == "text") { ?>
                            <div class="text"><?php the_field('benefits_text'); ?></div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="lp-right">
            <?php if ($content == "wbnr") { ?>
                <div class="event-box">
                    <p class="title">Event details</p>
                    <div class="devider"></div>
                    <?php if ($wbnrEvent !== '') { ?>
                        <span><?php the_field('event_details_wbnr'); ?></span>
                    <?php } else { ?>
                        <p>Webinar recording available for viewing</p>
                    <?php } ?>
                </div>
                <div class="stream-box">
                    <?php the_field('wbnr_videostream'); ?>
                </div>
            <?php } elseif ($content == "lpg") {
                if (get_field("form_expired")) {
                  echo "<div class='b-form'>
                  <div class='dr-form form-orange'>
                  <div class='expired-message'>";
                    the_field("expired_message");
                  echo "</div></div></div>";
                } else { ?>

                <div class="b-form new-form-handler">
                    <div class="dr-form form-orange">
	                    <?php get_template_part( 'parts/forms/landing/form', $form_type ) ?>
                    </div>
                </div>

          <?php }
              } ?>
        </div>
    </div>
</section>

<?php if ($pixel) {
  if ($utm_param) {
    foreach ($utm_param as $item) {
      $utm_param_assoc[$item['param']] = $item['value'];
    }
    if (comp_arrays($utm_param_assoc, $_GET)) {
      echo $pixel;
    }
  } else {
    echo $pixel;
  }
} ?>

<?php get_footer(); ?>

<?php get_template_part('end'); ?>
