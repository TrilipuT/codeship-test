<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 10/18/17
 * Time: 14:50
 */ ?>
<div class="layout-block block-speakers-list">
	<?php if ( $title = get_sub_field( 'title' ) ): ?>
        <h3 class="sub-title"><?= $title ?></h3>
	<?php endif; ?>
	<?php if ( have_rows( 'list' ) ): ?>
        <div class="list-2-columns">
			<?php while ( have_rows( 'list' ) ): the_row() ?>
                <div class="item">
                    <div class="person">
						<?php if ( $image = get_sub_field( 'image' ) ): ?>
							<?= wp_get_attachment_image( $image, 'medium' ); ?>
						<?php endif; ?>
                        <div class="person__info">
							<?php if ( $title = get_sub_field( 'name' ) ): ?>
                                <h6><?= $title ?></h6>
							<?php endif; ?>
							<?php if ( $position = get_sub_field( 'position' ) ): ?>
                                <span class="position"><?= $position ?></span>
							<?php endif; ?>
                        </div>
                    </div>
					<?php if ( $text = get_sub_field( 'text' ) ): ?>
                        <p><?= $text ?></p>
					<?php endif; ?>
                </div>
			<?php endwhile; ?>
        </div>
	<?php endif; ?>
</div>
