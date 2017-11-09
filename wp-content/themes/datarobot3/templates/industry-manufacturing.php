<?php
/**
 * Template Name: Industry: Manufactirung
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 11/1/17
 * Time: 13:06
 */
get_header(); ?>
<section>
	<?php get_template_part( 'parts/industry/top-banner' ) ?>
    <div class="container">
        <div class="content list-2-columns">
            <div class="item">
				<?= wp_get_attachment_image( get_field( 'content_image' ), 'full' ) ?>
            </div>
            <div class="item">
                <div class="text">
					<?php the_field( 'content_text' ) ?>
                </div>
            </div>
        </div>
		<?php if ( have_rows( 'use_cases' ) ): ?>
            <div class="use-cases">
                <h2 class="case--title"><?php the_field( 'use_case_title' ) ?></h2>
                <div class="list-2-columns">
					<?php while ( have_rows( 'use_cases' ) ): the_row(); ?>
                        <div class="item<?= get_row_index() == 1 ? ' show' : '' ?>">
                            <div class="title-wrap acordeon-toggle">
								<?= wp_get_attachment_image( get_sub_field( 'image' ), 'full' ) ?>
                                <h4><?php the_sub_field( 'title' ) ?></h4>
                                <i class="icon-chevron-down"></i>
                            </div>
                            <p class="accordeon-content"><?php the_sub_field( 'text' ) ?></p>
                        </div>
					<?php endwhile; ?>
                </div>
            </div>
		<?php endif; ?>
    </div>
	<?php get_template_part( 'parts/get-in-touch' ) ?>
</section>
<?php get_footer(); ?>
<?php get_template_part( 'parts/forms/contact-us' ); ?>
<?php get_template_part( 'end' ) ?>
