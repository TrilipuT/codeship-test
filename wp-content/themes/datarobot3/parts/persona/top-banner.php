<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 9/19/17
 * Time: 12:56
 */ ?>
<div class="b-left-mobile">
    <?php if ($image = get_field('banner_image_mobile')) : ?>
        <img src="<?= $image['url'] ?>" width="<?= $image['width'] / 2 ?>"
             alt="<?php the_field('banner_title'); ?>" class="tb-mobile">
    <?php endif; ?>
</div>
<div class="b-left">
    <h1><?php the_title(); ?></h1>
    <p><?php the_field('banner_title'); ?></p>
    <a href="#" class="contact-popup bg-filled-blue button">Contact us to learn more</a>
    <?php if ($video = get_field('banner_video')) : ?>
        <div class="watch-v transition">
            <i class="icon-play-circle-outline"></i><?= $video ?>
        </div>
    <?php endif; ?>
</div>
<div class="b-right">
    <?php if ($image = get_field('banner_image')): ?>
        <img src="<?= $image ?>" alt="<?= esc_attr(the_title()); ?>">
    <?php endif; ?>
</div>
