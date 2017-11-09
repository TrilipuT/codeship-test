<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 9/18/17
 * Time: 18:05
 */ ?>
<article class="feature left-image clearfix">
    <div class="b-left">
        <?php $image = get_sub_field('image'); ?>
        <img src="<?= $image['url'] ?>" width="<?= $image['width'] / 2; ?>"
             alt="<?php the_sub_field('title') ?>">
    </div>
    <div class="b-right">
        <h2><?php the_sub_field('title') ?></h2>
        <p><?php the_sub_field('text') ?></p>
    </div>
</article>
