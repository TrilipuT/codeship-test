<?php
/* Template Name: Board and investors */
?>
<?php get_header(); ?>
<section class="board">
	<div class="page-content">
		<div class="container">
			<h1>Board of directors</h1>
			<div class="grid">
				<?php
					$rows = get_field('board');
					$width = 100/count($rows) - 1;
					foreach($rows as $index => $person){
						if ($index == 0) { ?>
							<div class="item active transition" data-name="<?php strToLowRep($person['full_name']); ?>" style="width: <?php echo $width.'%'; ?>">
						<?php } else { ?>
							<div class="item transition" data-name="<?php strToLowRep($person['full_name']); ?>" style="width: <?php echo $width.'%'; ?>">
						<?php } ?>
							<figure>
								<div class="img-wrap">
									<img class="transition" src="<?php echo $person['photo']; ?>" alt="<?php echo $person['full_name']; ?>">
								</div>
								<figcaption>
									<h2><?php echo $person['full_name']; ?></h2>
									<p><?php echo $person['title']; ?></p>
								</figcaption>
							</figure>
							<div class="grid-bio">
								<?php echo $person['description']; ?>
							</div>
						</div>
					<?php }
				?>
			</div>
			<div class="bio-wrap">
				<div class="scroller transition01" style="width: <?php echo $width.'%'; ?>"></div>
				<?php foreach ($rows as $index => $person) {
					if ($index == 0) { ?>
						<div class="item active" id="<?php strToLowRep($person['full_name']); ?>">
					<?php } else { ?>
						<div class="item" id="<?php strToLowRep($person['full_name']); ?>">
					<?php } ?>
						<div class="bio">
							<?php echo $person['description']; ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('.grid .item').hover(function(){
					var id = $(this).data('name');
					var pos = $(this).position();
					$('.grid .active').removeClass('active');
					$(this).addClass('active');
					$('.bio-wrap .active').removeClass('active');
					$('#'+id).addClass('active');
					$('.bio-wrap .scroller').css("left", pos.left);
				});
			});
		</script>
	</div>
	<div class="investors">
		<div class="container">
			<h2>Strong backing from top tier investors</h2>
			<?php
				$rows = get_field('company');
				if($rows){

					echo "<ul class=\"logos\">";

					foreach($rows as $company){
						$image = $company['logo'];
						echo '<li><img src="'.$image['url'].'" width="'.($image['width']/2).'" alt="'.$company['name'].'"></li>';
					}

					echo "</ul>";
				}
			?>
		</div>
	</div>
	<?php get_template_part('parts/get-in-touch') ?>
</section>
<?php get_footer();
get_template_part( 'parts/forms/popup' );
get_template_part( 'end' ); ?>
