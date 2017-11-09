<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 9/29/17
 * Time: 15:08
 */ ?>
<div class="container clearfix">
    <div class="insurance-slider controls--dots">
        <ul class="bxslider">
			<?php while ( have_rows( 'insurance_slider' ) ): the_row();
				$link   = get_sub_field( 'button_link' );
				$target = strpos( $link, 'datarobot' ) === false ? "_blank" : '_self';
				?>
                <li class="slide">
                    <div class="slide-content">
                        <div class="slide-image">
							<?= wp_get_attachment_image( get_sub_field( 'image' ), 'full' ) ?>
                        </div>
                        <div class="slide-text">
                            <span><?php the_sub_field( 'type' ) ?></span>
                            <h4><?php the_sub_field( 'title' ) ?></h4>
                            <a class="bg-filled-blue button" target="<?= $target ?>"
                               href="<?= $link ?>"><?php the_sub_field( 'button_text' ) ?></a>
                        </div>
                    </div>
                </li>
			<?php endwhile; ?>
        </ul>
    </div>

	<?php if ( get_field( 'quote_text' ) ): ?>
        <div class="quote-wrap">
            <div class="quote">
                <div class="quote-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="60 4 120 75">
                        <path d="M60 31.2L70.97 1H99.3l-6.64 25.9h21.64V76H60V31.2zm65.7 0L136.67 1H165l-6.64 25.9H180V76h-54.3V31.2z"
                              fill="#F3F7FB"/>
                    </svg>
                </div>
                <p><?php the_field( 'quote_text' ); ?></p>
                <div class="author-holder">
					<?php if ( $image = get_field( 'quote_image' ) ): ?>
                        <img class="author-image" src="<?= $image['url'] ?>" width="<?= $image['width'] ?>"
                             height="<?= $image['height'] ?>" alt="<?php the_field( 'quote_author' ); ?>">
					<?php endif; ?>
                    <div class="author-info">
                        <b class="author-name"><?php the_field( 'quote_author' ); ?></b>
						<?php
						if ( $position = get_field( 'quote_position' ) ): ?>
                            <p class="author-position"><?= $position ?></p>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
	<?php endif; ?>
</div>
<script type="application/javascript">
    jQuery(function ($) {
        $('.bxslider').bxSlider({
            mode: 'fade',
            captions: false,
            controls: false,
        });
    });
</script>
