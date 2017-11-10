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
            <p><?= get_field('git_text') ?: __('Have a question about learning data science with DataRobot?', 'datarobot3'); ?></p>
            <a href="#" class="open-popup bg-filled-white button">
                <?= get_field('git_button_text') ?: __('Contact us', 'datarobot3'); ?>
            </a>
        </div>
    </div>
</div>
