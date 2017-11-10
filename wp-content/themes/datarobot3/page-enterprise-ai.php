<?php
/* Template Name: Enterprise AI */
?>

<?php get_header(); ?>
<?php the_post(); ?>
<section class="eai">
	<?php $bim = get_field('banner_image_mobile'); ?>
	<style>
		@media only screen and (max-width: 1023px) {
			.eai .top-banner {
				background-image: url("<?php echo $bim['url']; ?>") !important;
			}
		}
	</style>
	<div class="top-banner" style="background-image: url(<?php the_field('banner_image'); ?>)">
		<div class="container clearfix">
			<div class="row-wrap">
				<div class="b-left">
					<h1><?php the_field('banner_title'); ?></h1>
					<p><?php the_field('banner_text'); ?></p>
					<a href="#" class="open-popup bg-filled-blue button"><?php _e('Request a demo', 'datarobot3'); ?></a>
				</div>
			</div>
		</div>
	</div>
	<div class="page-content">

		<?php $mla = get_field('mla_img'); ?>
		<?php if($mla){ ?>
			<div class="e-mla">
				<div class="container">
					<div class="row-wrap">
						<div class="left">
							<img src="<?php echo $mla['url']; ?>" width="<?php echo($mla['width'] / 2); ?>" alt="<?php echo $mla['title']; ?>">
						</div>
						<div class="right">
							<h2><?php the_field('mla_title'); ?></h2>
							<p><?php the_field('mla_text'); ?></p>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>


		<?php $ec = get_field('chart'); ?>
		<?php $el = get_field('legend'); ?>
		<?php if($ec){ ?>
			<div class="e-chart">
				<div class="container">
					<h2><?php the_field('ec_title'); ?></h2>
					<div class="chart-w">
						<div class="left">
							<img src="<?php echo $ec['url']; ?>" width="<?php echo($ec['width'] / 2); ?>" alt="<?php echo $ec['title']; ?>">
						</div>
						<div class="right">
							<img src="<?php echo $el['url']; ?>" width="<?php echo($el['width'] / 2); ?>" alt="<?php echo $el['title']; ?>">
						</div>
					</div>
					<div class="chart-text">
						<?php the_field('ec_text'); ?>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php $ef = get_field('features'); ?>
		<?php if($ef){ ?>
			<div class="e-features">
				<div class="container">
					<h2><?php the_field('ef_title'); ?></h2>
					<div class="features-w">
						<?php foreach ($ef as $item) { ?>
							<div class="item">
								<div class="chevron">
									<i class="icon-chevron-down"></i>
								</div>
								<h3><?php echo $item['title']; ?></h3>
								<p><?php echo $item['text']; ?></p>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php $ap = get_field('packages'); ?>
		<?php if($ap){ ?>
			<div class="a-packages">
				<div class="container">
					<h2><?php the_field('p_title'); ?></h2>
					<p><?php the_field('p_subtitle'); ?></p>
					<div class="packages-w">
						<?php while ( have_rows('packages') ) : the_row(); ?>
						<?php
							$features = get_sub_field_object('description');
							$fv = $features['value'];
							$fc = $features['choices'];
							$state = 'inactive';
						?>
							<div class="item">
								<h3><?php the_sub_field('title'); ?></h3>
								<ul>
									<?php foreach ($fc as $key => $value) {
										if (in_array($key, $fv)) {
										    $state = 'active';
										}
										echo '<li class="'. $state .'"><i class="icon-check"></i><span>'. $value .'</span></li>';
										$state = 'inactive';
									} ?>
								</ul>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<?php get_template_part('parts/get-in-touch') ?>
</section>
<?php get_footer(); ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.e-features .item').click(function(){
			if ($(window).width() < 481) {
				if($(this).hasClass('active')){
					$(this).find('p').slideUp(300);
					$(this).find('.chevron i').css('transform', 'rotate(0deg)');
					$(this).removeClass('active');
				} else {
					$('.e-features .item.active').find('p').slideUp(300);
					$('.e-features .item.active').find('.chevron i').css('transform', 'rotate(0deg)');
					$('.e-features .item.active').removeClass('active');
					$(this).find('p').slideDown(300);
					$(this).find('.chevron i').css('transform', 'rotate(180deg)');
					$(this).addClass('active');
				}
			}
		});
		$(window).resize(function(){
			if ($(window).width() > 480) {
					$('.e-features .item p').show();
			}
		});
		if ($(window).width() > 719) {
			$(window).scroll( function(){
				var bottom_of_object = $('.chart-w').offset().top + $('.chart-w').outerHeight();
				var bottom_of_window = $(window).scrollTop() + $(window).height();

				if( bottom_of_window > bottom_of_object ){
						$('.chart-w img').animate({'opacity':'1'},600);
				}
			});
		} else {
			$('.chart-w img').css('opacity','1');
		}
        jQuery(document).ready(function () {
            jQuery('.aml-tiles-wrapper .icon-chevron-down').first().addClass('active').siblings('.mobile-accordeon').addClass('show');
        });

        jQuery('.bg-wrap h3').click(function () {
            if (jQuery(this).is('.active')) {
                jQuery(this).removeClass('active').siblings('.icon-chevron-down').removeClass('active').siblings('.mobile-accordeon').removeClass('show open');
            } else {
                jQuery('.bg-wrap h3').removeClass('active').siblings('.icon-chevron-down').removeClass('active').siblings('.mobile-accordeon').removeClass('show');
                jQuery(this).addClass('active').siblings('.icon-chevron-down').addClass('active').siblings('.mobile-accordeon').addClass('show');
            }
        });

        jQuery('.icon-chevron-down').click(function () {
            if (jQuery(this).is('.active')) {
                jQuery(this).removeClass('active').siblings('.mobile-accordeon').removeClass('show open');
            } else {
                jQuery('.icon-chevron-down').removeClass('active').siblings('.mobile-accordeon').removeClass('show');
                jQuery(this).addClass('active').siblings('.mobile-accordeon').addClass('show');
            }
        });
	});
</script>
<?php
get_template_part('parts/forms/popup');
get_template_part('end'); ?>
