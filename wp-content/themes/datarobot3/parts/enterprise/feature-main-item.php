<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 9/18/17
 * Time: 18:05
 */ ?>
<?php
$class = !get_row_index() % 2 ? 'left-image' : 'right-image';
$image = get_sub_field('image');
$image = "<img src=\"{$image['url']}\" width=\"" . $image['width'] / 2 . "\" alt=\"" . get_sub_field('title') . "\">";
$content = "<h2>" . get_sub_field('title') . "</h2><p>" . get_sub_field('text') . "</p>";
if (get_row_index() % 2) {
    $lcontent = $content;
    $rcontent = $image;
} else {
    $lcontent = $image;
    $rcontent = $content;
}
?>
<article class="feature <?= $class ?> clearfix">
    <div class="b-left">
        <?= $lcontent ?>
    </div>
    <div class="b-right">
        <?= $rcontent ?>
    </div>
</article>
