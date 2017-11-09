<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 10/18/17
 * Time: 14:50
 */ ?>
<div class="layout-block block-benefits-list">
	<?php if ( $title = get_sub_field( 'title' ) ): ?>
        <h3 class="sub-title"><?= $title ?></h3>
	<?php endif; ?>
	<?php if ( have_rows( 'list' ) ): ?>
        <div class="list-3-columns">
			<?php while ( have_rows( 'list' ) ): the_row() ?>
                <div class="item">
					<?php if ( $image = get_sub_field( 'image' ) ): ?>
						<?= wp_get_attachment_image( $image, 'full' ); ?>
					<?php endif; ?>
                    <div class="content">
						<?php if ( $title = get_sub_field( 'title' ) ): ?>
                            <h6><?= $title ?></h6>
						<?php endif; ?>
						<?php if ( $text = get_sub_field( 'text' ) ): ?>
                            <p><?= $text ?></p>
						<?php endif; ?>
                    </div>
                </div>
			<?php endwhile; ?>
        </div>
	<?php endif; ?>
</div>
