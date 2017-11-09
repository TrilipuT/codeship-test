<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 9/18/17
 * Time: 18:05
 */ ?>
<div class="b-ent-feature clearfix">
    <div class="e-img-wrap">
        <?php $image = get_sub_field('image'); ?>
        <img src="<?= $image['url'] ?>" width="<?= $image['width'] / 2; ?>"
             alt="<?php the_sub_field('title') ?>">
    </div>
    <h2><?php the_sub_field('title') ?></h2>
    <p><?php the_sub_field('text') ?></p>
</div>
