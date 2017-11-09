<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 10/5/17
 * Time: 19:00
 */
if ( get_field( 'display_banner', 'option' ) ) :
	if ( get_field( 'banner_show_on_selected_pages', 'option' ) && is_page( get_field( 'banner_pages', 'option' ) ) ): ?>
        <div id="header-message" data-cname="<?php the_field( 'banner_name', 'option' ); ?>">
            <style type="text/css">
                <?php the_field('banner_css', 'option'); ?>
            </style>
            <div class="container">
                <div class="message-wrap">
					<?php the_field( 'banner_html', 'option' ); ?>
                </div>
            </div>
        </div>
	<?php endif;
endif;