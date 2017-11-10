<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 11/1/17
 * Time: 13:48
 */ ?>
<div class="invisible" data-img-big="url(<?php the_field( 'banner_image_big' ); ?>)"
     data-img-medium="url(<?php the_field( 'banner_image_medium' ); ?>)" style="display: none"></div>
<div class="top-wrapper industry-banner" style="background-image: url(<?php the_field( 'banner_image_big' ); ?>);">
    <div class="top-banner">
        <div class="container clearfix">
            <div class="b-left">
                <h1><?php the_field( 'banner_title' ); ?></h1>
                <p><?php the_field( 'banner_text' ); ?></p>
            </div>
            <div class="b-bottom">
                <a href="#"
                   class="open-popup open-popup bg-filled-blue button"><?php _e( 'Request a demo', 'datarobot3' ); ?></a>
                <div class="watch-v transition">
                    <i class="icon-play-circle-outline"></i><?php the_field( 'video' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
