<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 10/18/17
 * Time: 14:50
 */ ?>
<div class="layout-block block-info">
	<?php if ( $text = get_sub_field( 'text' ) ): ?>
        <div class="text"><?= $text ?></div>
	<?php endif; ?>
</div>
