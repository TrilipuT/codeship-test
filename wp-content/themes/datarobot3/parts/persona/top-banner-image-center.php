<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 9/19/17
 * Time: 12:56
 */ ?>
<div class="single-col">
    <?php if ($image = get_field('banner_image_mobile')) : ?>
        <img src="<?= $image['url'] ?>" width="<?= $image['width'] / 2 ?>"
             alt="<?php the_field('banner_title'); ?>" class="tb-mobile">
    <?php endif; ?>
    <h1><?php the_field('banner_title'); ?></h1>
    <p><?php the_field('banner_text'); ?></p>
    <?php if ($image = get_field('banner_image')): ?>
        <img src="<?= $image ?>" alt="<?= esc_attr(get_field('banner_title')); ?>">
    <?php endif; ?>
    <a href="#" class="contact-popup bg-filled-blue button"><?php _e('Contact us to learn more', 'datarobot3'); ?></a>
    <?php if ($video = get_field('banner_video')) : ?>
        <div class="watch-v block transition">
            <i class="icon-play-circle-outline"></i><?= $video ?>
        </div>
    <?php endif; ?>
</div>
