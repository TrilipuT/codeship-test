<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 9/18/17
 * Time: 18:33
 */ ?>
<div class="get-in-touch">
    <div class="container">
        <div class="button-wrap">
            <p><?php the_field('git_text') ?></p>
            <a href="#" class="contact-popup bg-filled-white button">
                <?php get_field('git_button_text') ? the_field('git_button_text') : _e('Contact us', 'datarobot3'); ?>
            </a>
        </div>
    </div>
</div>
