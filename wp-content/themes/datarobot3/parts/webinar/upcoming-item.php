<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 10/11/17
 * Time: 14:41
 */
$link = Webinar::get_link(); ?>
<li class="item">
    <div class="holder">
        <div class="info">
            <div class="header">
                <time datetime="<?= Webinar::get_date( 'Y-m-d\TH-i-s' ) ?>"
                      data-timestamp="<?= Webinar::get_date( 'U', true ) ?>"
                      title="<?= Webinar::get_date( _x( 'l, M d \a\t g:i a', 'Upcoming webinar date-time format', 'datarobot3' ) ) ?> ET">
					<?= Webinar::get_date( _x( 'l, M d \a\t g:i a', 'Upcoming webinar date-time format', 'datarobot3' ) ) ?>
                </time>
                <h4 class="webinar-title"><a href="<?= $link ?>"><?= get_the_title(); ?></a></h4>
            </div>
            <a href="<?= $link ?>" class="mobile-image"><?php the_post_thumbnail( 'full' ); ?></a>
            <div class="excerpt">
				<?= Webinar::get_excerpt( 75 ); ?>
            </div>
        </div>
        <a href="<?= $link ?>" class="image"><?php the_post_thumbnail( 'full' ); ?></a>
    </div>
</li>
