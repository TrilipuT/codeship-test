<?php
/* Template Name: Cloud page */
?>

<?php get_header(); ?>
<section class="cloud">
    <div class="top-wrapper">
        <div class="fx">
            <div class="item e-fx" id="i1">
                <img src="<?= get_template_directory_uri(); ?>/assets/built/images/cloud/c1.svg" alt="bgc" unselectable="on">
            </div>
            <div class="item e-fx" id="i2">
                <img src="<?= get_template_directory_uri(); ?>/assets/built/images/cloud/c2.svg" alt="bgc" unselectable="on">
            </div>
            <div class="item e-fx" id="i3">
                <img src="<?= get_template_directory_uri(); ?>/assets/built/images/cloud/c3.svg" alt="bgc" unselectable="on">
            </div>
            <div class="item e-fx" id="i4">
                <img src="<?= get_template_directory_uri(); ?>/assets/built/images/cloud/c4.svg" alt="bgc" unselectable="on">
            </div>
            <div class="item e-fx" id="i5">
                <img src="<?= get_template_directory_uri(); ?>/assets/built/images/cloud/c5.svg" alt="bgc" unselectable="on">
            </div>
        </div>
        <div class="top-banner">
            <div class="container clearfix">
                <div class="b-left">
                    <img src="<?= get_template_directory_uri(); ?>/assets/built/images/cloud/top-icon.svg" alt="<?php the_field('banner_title'); ?>">
                    <h1><?php the_field('banner_title'); ?></h1>
                    <p><?php the_field('banner_text'); ?></p>
                    <a href="#" class="contact-popup bg-filled-blue button"><?php _e('See DataRobot in Action!', 'datarobot3'); ?></a>
                </div>
            </div>
        </div>
    </div>
    <div class="top-quote">
        <div class="container">
            <div class="main-wrap">
                <div class="text-wrap">
                    <?php the_field('top_text'); ?>
                </div>
                <div class="img-wrap">
                    <img src="<?php the_field('q_image'); ?>" alt="DataRobot App Screenshot">
                </div>
                <div class="quote">
                    <p><?php the_field('quote_text'); ?></p>
                    <div class="img-wrap">
                        <img src="<?php the_field('q_photo'); ?>" alt="<?php the_field('name'); ?>">
                    </div>
                    <div class="name"><?php the_field('q_name'); ?></div>
                    <div class="title"><?php the_field('q_title'); ?></div>
                </div>
            </div>
        </div>
    </div>
	<div class="page-content">
        <div class="container">
            <div class="b-features">
                <div class="item-wrap">
                    <?php foreach ( get_field('features') as $item ) { ?>
                        <div class="item">
                            <div class="accordeon-toggle">
                                <div class="img-wrap">
                                    <img src="<?php echo $item['f_icon']; ?>" alt="<?php echo $item['f_title']; ?>">
                                </div>
                                <h3><?php echo $item['f_title']; ?></h3>
                                <i class="icon-chevron-down"></i>
                            </div>
                            <div class="accordeon-content">
                                <p><?php echo $item['f_text']; ?></p>
	                            <?php if ($item['bottom_link']) { ?>
                                    <div class="link-wrap">
                                        <a href="<?php echo $item['f_link_url']; ?>">
                                            <i class="icon-circle-right"></i>
                                            <span><?php echo $item['f_bottom_link']; ?></span>
                                        </a>
                                    </div>
	                            <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="aws">
                <div class="b-logo">
                    <a href="https://aws.amazon.com/what-is-cloud-computing"><img src="https://d0.awsstatic.com/logos/powered-by-aws.png" alt="Powered by AWS Cloud Computing"></a>
                </div>
                <div class="b-description">
                    <h2><?php the_field('a_title'); ?></h2>
                    <p><?php the_field('a_text'); ?></p>
                </div>
            </div>

            <div class="sign-up">
                <div class="row-wrap">
                    <div class="text"><?php _e('Sign up and start seeing real bottom-line business value from machine learning projects immediately', 'datarobot3'); ?></div>
                    <a href="#" class="contact-popup bg-filled-blue button"><span><?php _e('Sign up', 'datarobot3'); ?></span><i class="icon-long-arrow-down"></i></a>
                </div>
            </div>
        </div>
	</div>
</section>

<?php
get_footer();
get_template_part('parts/forms/contact-us');
?>

<script>
    jQuery(document).ready(function($){
       $('.b-features .item').first().addClass('active');

       $('.b-features .accordeon-toggle').click(function(){
           if ($(this).parent('.item').is('.active')) {
               $(this).parent('.item').removeClass('active');
           } else {
               $('.b-features .item.active').removeClass('active');
               $(this).parent('.item').addClass('active');
           }
       });
    });
</script>

<?php get_template_part('end');  ?>
