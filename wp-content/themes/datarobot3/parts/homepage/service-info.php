<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 10/10/17
 * Time: 15:57
 */ ?>
<div class="service-info">
    <div class="container thin">
        <h2><?php the_field( 'si_title' ) ?></h2>
		<?php if ( $text = get_field( 'si_text' ) ): ?>
            <div class="text-block">
				<?= $text ?>
            </div>
		<?php endif; ?>
		<?php if ( have_rows( 'si_icons' ) ): ?>
            <div class="flow-block">
				<?php while ( have_rows( 'si_icons' ) ): the_row(); ?>
                    <div class="flow-item">
                        <div class="img-holder">
                            <img src="<?= get_sub_field( 'icon' ) ?>">
                        </div>
                        <p><?= get_sub_field( 'text' ) ?></p>
                    </div>
				<?php endwhile; ?>

            </div>
		<?php endif; ?>
		<?php if ( $sub_text = get_field( 'si_subtitle' ) ): ?>
            <div class="text-block">
				<?= $sub_text ?>
            </div>
		<?php endif; ?>

    </div>
    <div class="container">
		<?php if ( have_rows( 'si_blocks' ) ): ?>
            <div class="blocks">
				<?php while ( have_rows( 'si_blocks' ) ): the_row(); ?>
                    <div class="block-item">
                        <h5><?php the_sub_field( 'title' ) ?></h5>
                        <p><?php the_sub_field( 'text' ) ?></p>
                    </div>
				<?php endwhile; ?>
            </div>
		<?php endif; ?>
        <a href="#" class="contact-popup bg-filled-blue button" data-type="<?php _e( 'AI Services', 'datarobot3' ) ?>">
		    <?php _e( 'Request more information', 'datarobot3' ); ?>
        </a>
    </div>
</div>
