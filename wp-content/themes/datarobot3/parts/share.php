<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 9/22/17
 * Time: 10:04
 */ ?>
<div class="share">
    <div class="item">
        <div class="fb-share-button" data-href="<?= get_permalink() ?>" data-layout="button"
             data-size="small" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank"
                                                             href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode( get_permalink() ) ?>&amp;src=sdkpreparse">Share</a>
        </div>
    </div>
    <div class="item">
        <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
        <script type="IN/Share" data-url="<?= urlencode( get_permalink() ) ?>"></script>
    </div>
    <div class="item">
        <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false">Tweet</a>
        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
    <div class="item">
        <div class="g-plus" data-action="share" data-href="<?= urlencode( get_permalink() ) ?>"></div>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
    </div>
</div>
