<?php
$id = get_the_ID();
if (have_rows('sidebar_slider', $id)):?>
    <div class="slider">
        <div class="nav-dots">
            <?php
            $count = 0;
            while (have_rows('sidebar_slider', $id)) : the_row();
                if (count( get_field('sidebar_slider')) > 1) { ?>
                    <div class="nav-dot <?php if ($count == 0) echo 'selected' ?>" data-btn="slide-<?= $count ?>"></div>
                <?php } ?>
                <?php $count++ ?>
            <?php endwhile; ?>
        </div>
        <?php
        $count = 0;
        while (have_rows('sidebar_slider', $id)) : the_row(); ?>
            <div class="slide-content <?php if ($count == 0) echo 'selected' ?>" data-num="slide-<?= $count ?>">
                <div class="img"
                     style="background: url('<?php the_sub_field('image'); ?>')no-repeat center; background-size: cover;">
                    <div class="content-block">
                        <p><?php the_sub_field('question'); ?></p>
                        <p class="slide-title"><?php the_sub_field('title'); ?></p>
                        <a href="<?php the_sub_field('link'); ?>"><i class="icon-circle-right"></i>Education program</a>
                    </div>
                </div>
            </div>
            <?php $count++ ?>
        <?php endwhile; ?>
    </div>
    <script>
        jQuery(document).ready(function(){
            jQuery(".nav-dots .nav-dot:first-child").addClass("selected");
            jQuery('.slide-content').first().addClass("selected");
            setTimeout(autoAddClass, 6000);
        });

        function autoAddClass(){
            var nextDot = jQuery(".nav-dots .selected").removeClass("selected").next();
            if(nextDot.length)
                jQuery(nextDot).addClass('selected');
            else
                jQuery('.nav-dots .nav-dot:first-child').addClass('selected');
            var nextSlide = jQuery(".slide-content.selected").removeClass("selected").next();
            if(nextSlide.length)
                jQuery(nextSlide).addClass('selected');
            else
                jQuery('.slide-content').first().addClass('selected');
            setTimeout(autoAddClass, 6000);
        }

        jQuery(document).on('click', '.nav-dot', function () {
            jQuery(this).siblings('.nav-dot').removeClass('selected');
            jQuery(this).addClass('selected');
            jQuery('.slide-content').removeClass('selected');
            jQuery('.slide-content[data-num="' + jQuery(this).attr('data-btn') + '"]').addClass('selected');
        });

    </script>
<?php endif; ?>