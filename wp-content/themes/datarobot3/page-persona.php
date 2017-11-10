<?php
/* Template Name: Persona */
?>
<?php get_header();
global $post;
$post_id = get_field( 'page_id' ) ?: $post->post_name;
?>
<section class="persona" id="<?= $post_id; ?>">
    <div class="top-banner <?= get_field( 'top-banner-layout' ) ?: 'image-right' ?>">
        <div class="container clearfix">
			<?php get_template_part( 'parts/persona/top-banner', get_field( 'top-banner-layout' ) ) ?>
        </div>
		<?php if ( $features = get_field( 'features' ) ): ?>
            <div class="anchors default">
                <div class="container">
                    <ul class="items<?= count( $features ) ?> clearfix">
						<?php foreach ( $features as $index => $feature ) : ?>
                            <li>
                                <a href="#feature<?= $index ?>"
                                   class="transition"><?= $feature['anchor_title']; ?></a>
                            </li>
						<?php endforeach; ?>
                    </ul>
                </div>
            </div>
		<?php endif; ?>
    </div>

    <div class="page-content">
        <div class="container">
			<?php if ( get_the_content() ): ?>
                <div class="excerpt">
					<?php the_content(); ?>
                </div>
			<?php endif; ?>
            <div class="b-features">
				<?php if ( $features ) {
					if ( is_handheld() ) {
						foreach ( $features as $index => $feature ) { ?>
                            <article id="feature<?= $index ?>" class="feature left-image clearfix">
                                <div class="b-left">
                                    <img src="<?php echo $feature['feature_image']; ?>"
                                         alt="<?php echo $feature['feature_title']; ?>">
                                </div>
                                <div class="b-right">
                                    <h2><?php echo $feature['feature_title']; ?></h2>
									<?php echo $feature['feature_description']; ?>
                                </div>
                            </article>
						<?php }
					} else {
						foreach ( $features as $index => $feature ) { ?>
							<?php if ( $index % 2 == 0 ) { ?>
                                <article id="feature<?= $index ?>" class="feature right-image clearfix">
                                    <div class="b-left">
                                        <h2><?php echo $feature['feature_title']; ?></h2>
										<?php echo $feature['feature_description']; ?>
                                    </div>
                                    <div class="b-right">
                                        <img src="<?php echo $feature['feature_image']; ?>"
                                             alt="<?php echo $feature['feature_title']; ?>">
                                    </div>
                                </article>
							<?php } else { ?>
                                <article id="feature<?= $index ?>" class="feature left-image clearfix">
                                    <div class="b-left">
                                        <img src="<?php echo $feature['feature_image']; ?>"
                                             alt="<?php echo $feature['feature_title']; ?>">
                                    </div>
                                    <div class="b-right">
                                        <h2><?php echo $feature['feature_title']; ?></h2>
										<?php echo $feature['feature_description']; ?>
                                    </div>
                                </article>
							<?php }
						}
					}
				} ?>
            </div>
        </div>
    </div>
	<?php get_template_part( 'parts/get-in-touch' ); //Want to use DataRobot for your project? ?>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.anchors a').on('click', function (e) {
                e.preventDefault();

                $('.anchors a').removeClass('active');
                $(this).addClass('active');

                var target = this.hash,
                    topPadding = 135;
                if ($('#header-message').is(':visible')) {
                    topPadding += 60;
                }
                var $target = $(target);
                $('html, body').stop().animate({
                    'scrollTop': $target.offset().top - topPadding
                }, 500, 'swing');
            });
        });
    </script>
</section>
<?php get_footer(); ?>
<?php get_template_part( 'parts/forms/popup' ); ?>
<?php get_template_part( 'end' ); ?>
