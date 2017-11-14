<?php get_header( 'landing' ) ?>
    <section class="webinar-content">

        <h1 class="title"><?php the_title() ?></h1>
		<?php // We do not show date if there are no date set and if we are in watch mode
		if ( ! get_query_var( 'type' ) && Webinar::get_date() ):
			// Also we don't show date if this is recordings
			if ( ! Webinar::is_recording() ):?>
                <div class="date">
                    <span>
                        <svg width="18" height="20" viewBox="0 0 18 20" xmlns="http://www.w3.org/2000/svg">
                            <g fill="#465275" fill-rule="evenodd">
                                <path d="M16 2h-1V0h-2v2H5V0H3v2H2C.9 2 0 2.9 0 4v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 16H2V7h14v11z"/>
                                <path d="M4 9h5v5H4z"/>
                            </g>
                        </svg>
                        <time>
                            <?= Webinar::get_date( _x( 'l, F d, Y', 'Webinar date format', 'datarobot3' ) ) ?>
                        </time>
                    </span>
                    <span>
                        <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 0C4.5 0 0 4.5 0 10s4.5 10 10 10 10-4.5 10-10S15.5 0 10 0zm0 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8zm.5-13H9v6l5.2 3.2.8-1.3-4.5-2.7V5z"
                                  fill="#465275" fill-rule="evenodd" fill-opacity=".9"/>
                        </svg>
                        <time datetime="<?= Webinar::get_date( 'Y-m-d\TH-i-s' ) ?>"
                              data-timestamp="<?= Webinar::get_date( 'U', true ) ?>"
                              title="<?= Webinar::get_date( 'g:i a \E\T' ) ?>"><?= Webinar::get_date( 'g:i a \E\T' ) ?></time>. <i><?php the_field( 'webinar_duration' ) ?></i>
                    </span>
                    <span>
                        <a href="<?= Webinar::get_add_to_calendar_link() ?>" class="add-to-calendar" target="_blank"
                           rel="nofollow">Add&nbsp;to&nbsp;Google&nbsp;calendar</a>
                    </span>
                </div>
			<?php endif; ?>
			<?php if ( have_rows( 'webinar' ) ): ?>
            <div class="content">
				<?php while ( have_rows( 'webinar' ) ) {
					the_row();
					get_template_part( 'parts/webinar/block', get_row_layout() );
				} ?>
				<?php get_template_part('parts/webinar/quotes') ?>
            </div>
		<?php endif; ?>
            <div class="fixed-holder">
                <button class="button bg-filled-orange open-popup"
                        data-target="form-holder"><?php _e( 'Sign up now for Free', 'datarobot3' ) ?></button>
            </div>
		<?php else: ?>
            <div class="content">
				<?= apply_filters( 'the_content', get_field( 'webinar_video' ) ) ?>
            </div>
		<?php endif; ?>
    </section>
<?php get_footer( 'landing' );
