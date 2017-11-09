<?php
/* Template Name: Enterprise */
?>
<?php get_header(); ?>
<section class="enterprise">
	<?php $image = get_field('banner_image_mobile'); ?>
    <div class="invisible" data-img-big="url(<?php the_field('banner_image'); ?>)" data-img-medium="url(<?php echo $image['url']; ?>)" style="display: none"></div>
    <div class="top-wrapper" style="background-image: url()">
        <div class="top-banner">
            <div class="container clearfix">
                <div class="b-left">
                    <h1><?php the_field('banner_title'); ?></h1>
                    <p><?php the_field('banner_text'); ?></p>
                    <a href="#" class="contact-popup bg-filled-blue button"><?php _e('Learn more', 'datarobot3'); ?></a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="b-ent-descr">
                <p class="features-desc"><?= get_field('enterprise_intro', false, false) ?></p>
            </div>
            <?php if (have_rows('enterprise_features')): ?>
                <div class="b-ent-features clearfix">
                    <?php while (have_rows('enterprise_features')):
                        the_row();
                        get_template_part('parts/enterprise/feature', 'item');
                    endwhile; ?>
                    <div style="margin: 30px 0;padding-top: 30px;text-align: center;clear: both; font-weight: 500;">
                        <a href="<?= home_url(get_field('enterprise_learn_more_link')) ?>"><?php the_field('enterprise_learn_more_text') ?></a>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (have_rows('enterprise_features_main')): ?>
                <div class="b-ent-features clearfix">
                    <?php while (have_rows('enterprise_features_main')):
                        the_row();
                        get_template_part('parts/enterprise/feature-main-item', function_exists('is_handheld') && is_handheld() ? 'mobile' : '');
                    endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php get_template_part('parts/get-in-touch'); ?>
    </div>
</section>
<?php
get_footer();
get_template_part('parts/forms/contact-us');
get_template_part('end');
?>
