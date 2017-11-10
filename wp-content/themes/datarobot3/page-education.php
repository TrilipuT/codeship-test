<?php
/* Template Name: Education */
?>

<?php get_header(); ?>

<?php
$pixel = get_field('tracking_code');
$utm_param = get_field('utm_parameters');
?>

<section class="education">
	<div class="top-block">
		<div class="container">
			<h1><a href="#" title="DataRobot University"><img src="<?= get_template_directory_uri(); ?>/assets/built/images/DRU.png" alt="DataRobot University"></a></h1>
			<div class="programs">
				<?php

				$progs = get_field('program');
				if($progs){
					foreach($progs as $index => $prog){
						$i = $index + 1; ?>
						<div class="item <?php echo 'p'.$i; ?> hover-bold transition01">
							<a href="<?php echo $prog['page_link']; ?>">
								<h2><?php echo $prog['title']; ?></h2>
								<p><?php echo $prog['description']; ?></p>
								<span><i class="icon-circle-right"></i>See programs</span>
							</a>
						</div>

					<?php }
				}

				?>
			</div>
			<div class="upcoming-classes-link">
				<a href="/education/all-courses" class="bg-filled-blue button">View upcoming classes</a>
			</div>
		</div>
	</div>
	<div class="page-content">
		<div class="container">
			<?php
				$rows = get_field('feature_block');
				if($rows){ ?>
					<div class="features">
						<h2>A better way to learn data science</h2>

						<?php foreach($rows as $index => $row){
							if($index%2 == 0) { ?>
								<div class="item right-image clearfix">
									<div class="b-left">
										<h3><?php echo $row['title']; ?></h3>
										<p><?php echo $row['description']; ?></p>
									</div><div class="b-right">
										<img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
									</div>
								</div>
							<?php } else { ?>
								<div class="item left-image clearfix">
									<div class="b-left">
										<h3><?php echo $row['title']; ?></h3>
										<p><?php echo $row['description']; ?></p>
									</div><div class="b-right">
										<img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
									</div>
								</div>
							<?php }
						} ?>
					</div>
				<?php } ?>
			<div class="bds clearfix">
				<h3>DataRobot is designed by some of the world’s best data scientists</h3>
				<div class="item">
					<img src="<?= get_template_directory_uri(); ?>/assets/built/images/bds1.svg" alt="1">
					<p>Learn their practical techniques for accurate prediction and actionable understanding.</p>
				</div>
				<div class="item">
					<img src="<?= get_template_directory_uri(); ?>/assets/built/images/bds2.svg" alt="2">
					<p>See how modern tools increase focus on business insights by automating mathematical detail.</p>
				</div>
				<div class="item">
					<img src="<?= get_template_directory_uri(); ?>/assets/built/images/bds3.svg" alt="3">
					<p>Learn expert best practices to make modeling faster, easier, less error-prone, and more successful.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="quotes">
		<div class="container">
			<div class="quote-slider">
				<?php

				$quotes = get_field('quote');

				if($quotes){
					echo '<ul>';
					foreach($quotes as $index => $quote){ ?>

						<li>
							<blockquote>
								<p><?php echo $quote['quote_text']; ?></p>
								<footer>
									<span class="name"><?php echo $quote['quote_author']; ?></span>
									<span class="title"><?php echo $quote['quote_author_title']; ?></span>
								</footer>
							</blockquote>
						</li>
					<?php }
					echo '</ul>';
				}

				?>
				<div class="bullets"></div>
			</div>
		</div>
		<script type="text/javascript">
            jQuery(document).ready(function ($) {
                jQuery('.quote-slider ul').bxSlider({
                    mode: 'fade',
                    pagerSelector: '.bullets',
                    controls: false,
                    infiniteLoop: false
                });

                if (jQuery('.quote-slider li').length == 1) {
                    jQuery('.bullets').hide();
                }
            });
		</script>
	</div>
	<?php get_template_part('parts/get-in-touch') ?>
</section>

<?php if ($pixel) {
  if ($utm_param) {
    foreach ($utm_param as $item) {
      $utm_param_assoc[$item['param']] = $item['value'];
    }
    if (comp_arrays($utm_param_assoc, $_GET)) {
      echo $pixel;
    }
  } else {
    echo $pixel;
  }
} ?>

<?php get_footer();
get_template_part('parts/forms/popup');
get_template_part('end'); ?>
