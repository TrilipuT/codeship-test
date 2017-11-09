<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 10/18/17
 * Time: 14:50
 */ ?>
<div class="layout-block block-content">
	<?php if ( $text = get_sub_field( 'text' ) ): ?>
        <div class="text"><?= $text ?></div>
	<?php endif; ?>
	<?php if ( $image = get_sub_field( 'image' ) ): ?>
        <div class="image"><?= wp_get_attachment_image( $image, 'large' ); ?></div>
	<?php endif; ?>
</div>
