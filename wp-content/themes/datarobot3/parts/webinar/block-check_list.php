<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 10/18/17
 * Time: 14:50
 */ ?>
<div class="layout-block block-check-list">
	<?php if ( $title = get_sub_field( 'title' ) ): ?>
        <h3 class="sub-title"><?= $title ?></h3>
	<?php endif; ?>
	<?php if ( have_rows( 'list' ) ): ?>
        <ul>
			<?php while ( have_rows( 'list' ) ): the_row() ?>
                <li class="item"><i class="icon-check"></i><span><?php the_sub_field( 'item' ) ?></span></li>
			<?php endwhile; ?>
        </ul>
	<?php endif; ?>
</div>
