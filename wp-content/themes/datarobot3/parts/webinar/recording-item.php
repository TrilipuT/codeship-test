<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 10/11/17
 * Time: 14:41
 */
$link = Webinar::get_link(); ?>
<div class="item">
    <a href="<?= $link ?>"><?php the_post_thumbnail('full'); ?></a>
    <h4 class="webinar-title"><a href="<?= $link ?>"><?= wp_trim_words( get_the_title(), 10 ); ?></a></h4>
    <div class="excerpt">
		<?= Webinar::get_excerpt(); ?>
    </div>
</div>
