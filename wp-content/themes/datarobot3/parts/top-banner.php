<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 9/18/17
 * Time: 18:44
 */ ?>
<div class="top-banner" style="background-image: url('<?php the_field('banner_image') ?>');">
    <div class="container clearfix">
        <div class="b-left">
            <h1><?php the_field('banner_title') ?></h1>
            <p><?php the_field('banner_text') ?></p>
            <a href="#" class="open-popup bg-filled-blue button"><?php _e('Learn more', 'datarobot3'); ?></a>
        </div>
        <div class="b-right">
            <?php if (get_field('banner_image_mobile')) {
                $image = get_field('banner_image_mobile'); ?>
                <img src="<?php echo $image['url'] ?>" width="<?php echo($image['width'] / 2); ?>"
                     alt="<?php the_field('banner_title'); ?>" class="tb-mobile">
            <?php } ?>
        </div>
    </div>
</div>
