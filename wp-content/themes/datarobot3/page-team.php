<?php
/* Template Name: Leadership team */
?>
<?php get_header(); ?>
<section class="team">
	<div class="top-block">
		<div class="container">
			<h1><?php the_field('title'); ?></h1>
			<p><?php the_field('banner_text'); ?></p>
		</div>
	</div>
	<div class="page-content">
		<div class="container">
			<div class="grid clearfix">
				<?php 
					$rows = get_field('person');
					if($rows){
						foreach($rows as $person){ ?>
							<div class="item transition">
								<figure>
									<div class="img-wrap">
										<img class="transition" src="<?php echo $person['photo']; ?>" alt="<?php echo $person['full_name']; ?>">
										<div class="more transition"><i class="icon-account-box-outline"></i><span>Read bio</span></div>
									</div>
									<figcaption>
										<h2><?php echo $person['full_name']; ?></h2>
										<p><?php echo $person['position']; ?></p>
									</figcaption>
								</figure>
							</div>
						<?php }
					}
				?>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('.team .grid .item').click(function () {
            if ($(window).width() < 720) {
                $('.wrapper').hide();
                $(window).scrollTop(75);
            } else if ($(window).width() >= 720 && $(window).width() <= 1023) {
                $('.wrapper').height($(window).height()).css("overflow", "hidden");
            } else {
                $('.wrapper').height($(window).height() - 75).css("overflow", "hidden");
                $(window).scrollTop(0);
            }
            $('.popup').show();
            var index = $(this).index();
            slider = $('.bio-slider').bxSlider({
                mode: 'fade',
                speed: 300,
                startSlide: index,
                pagerSelector: '.bullets',
                prevSelector: '.bio-slider-wrap .controls',
                nextSelector: '.bio-slider-wrap .controls',
                prevText: '<i class=\"icon-slider-prev\"></i><span>Previous</span><p></p>',
                nextText: '<span>Next</span><p></p><i class=\"icon-slider-next\"></i>',
                minSlides: 1,
                maxSlides: 1,
                moveSlides: 1,
                onSliderLoad: function (index) {
                    var items = $('.bio-slider .item').length - 1;
                    var nextSlide;
                    var prevSlide;

                    if (index == items) {
                        nextSlide = 0;
                        prevSlide = index - 1;
                    } else if (index == 0) {
                        nextSlide = index + 1;
                        prevSlide = items;
                    } else {
                        nextSlide = index + 1;
                        prevSlide = index - 1;
                    }

                    var prevName = $('.bio-slider .item').eq(prevSlide).data("name");
                    var nextName = $('.bio-slider .item').eq(nextSlide).data("name");
                    $('.bio-slider-wrap .bx-prev p').text(prevName);
                    $('.bio-slider-wrap .bx-next p').text(nextName);
                },
                onSlideBefore: function (slide, oldIndex, newIndex) {
                    var items = $('.bio-slider .item').length - 1;
                    var nextSlide;
                    var prevSlide;

                    if (newIndex == items) {
                        nextSlide = 0;
                        prevSlide = newIndex - 1;
                    } else if (newIndex == 0) {
                        nextSlide = newIndex + 1;
                        prevSlide = items;
                    } else {
                        nextSlide = newIndex + 1;
                        prevSlide = newIndex - 1;
                    }

                    var prevName = $('.bio-slider .item').eq(prevSlide).data("name");
                    var nextName = $('.bio-slider .item').eq(nextSlide).data("name");
                    $('.bio-slider-wrap .bx-prev p').text(prevName);
                    $('.bio-slider-wrap .bx-next p').text(nextName);
                }
            });
        });
        jQuery('.popup').click(function (e) {
            if (e.target !== this)
                return;
            jQuery(this).hide();
            jQuery('.wrapper').show().height("auto").css("overflow", "auto");
            slider.destroySlider();
        });
        jQuery('.popup-close').click(function () {
            jQuery('.wrapper').show().height("auto").css("overflow", "auto");
            jQuery('.popup').hide();
            slider.destroySlider();
        });
    });
</script>

<?php get_footer(); ?>

<div class="popup bio-slider-bg">
	<div class="bio-slider-wrap">
		<div class="popup-close transition">
			<i class="icon-close"></i>
		</div>
		<?php 
		if ($rows) {
		 	echo '<div class="bio-slider">';
			foreach ($rows as $person) { ?>
				<div class="item" data-name="<?php echo $person['full_name']; ?>">
					<div class="top clearfix">
						<div class="photo">
							<img src="<?php echo $person['photo']; ?>" alt="<?php echo $person['full_name']; ?>">
						</div>
						<div class="name-position">
							<h2><?php echo $person['full_name']; ?></h2>
							<p><?php echo $person['position']; ?></p>
						</div>
					</div>
					<div class="bio">
						<?php echo $person['bio']; ?>
					</div>
				</div>
			<?php }
			echo '</div>';
		} ?>
		<div class="controls">
			<div class="bullets clearfix"></div>
		</div>
	</div>
</div>

<?php get_template_part('end'); ?>