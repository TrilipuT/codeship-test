<?php
/* Template Name: Use cases */
?>

<?php get_header(); ?>
<section class="use-cases">
	<div class="container">
		<div class="uc-by-industry clearfix">
			<h1>Use cases by industry</h1>
			<div class="uc-filters default">
				<div class="ucf-mobile">
					<div class="uc-filter mobile industries">
						<div class="current-item"></div>
						<ul>
							<?php 
								$iterm = get_term_by('slug', 'industry', 'group');

								echo '<li><a href="#industry" class="active transition" data-query-filter="industry" data-term-id="'.$iterm->term_id.'">'. __( "All industries", "datarobot3" ) .'</a></li>';

								$industry_children = get_term_children($iterm->term_id, 'group');

								foreach ($industry_children as $child) {
									$term = get_term_by( 'id', $child, 'group' );
									if($term->count){ ?>
										<li>
											<a href="#<?php strToLowRep($term->name); ?>" class="transition" data-query-filter="<?php strToLowRep($term->name); ?>" data-term-id="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></a>
											<span><?php echo $term->count; ?></span>
										</li>
									<?php }
								}
						 	?>
					 	</ul>
					</div>
				</div>
				<div class="ucf-desktop">
					<div class="uc-filter industries">
						<ul>
							<?php 
								$iterm = get_term_by('slug', 'industry', 'group');

								echo '<li><a href="#industry" class="active transition" data-query-filter="industry" data-term-id="'.$iterm->term_id.'">'. __( "All industries", "datarobot3" ) .'</a></li>';

								$industry_children = get_term_children($iterm->term_id, 'group');

								foreach ($industry_children as $child) {
									$term = get_term_by( 'id', $child, 'group' );
									if($term->count){ ?>
										<li>
										<a href="#<?php strToLowRep($term->name); ?>" class="transition" data-query-filter="<?php strToLowRep($term->name); ?>" data-term-id="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></a>
										<span><?php echo $term->count; ?></span>
									</li>
								<?php }
								}
						 	?>
					 	</ul>
					</div>
				</div>
			</div>
			<div class="uc-content">

				<?php

				$query_group = '';

				if ($_GET['industry']) {
					$query_group = $_GET['industry'];
				} else {
					$query_group = 'industry';
				}

				$term = get_term_by('slug', $query_group, 'group');
				$fields = get_term_meta( $term->term_id , '', false );

				$cases = get_posts(
					array(
						'numberposts'     => -1,
						'post_type'       => 'usecase',
						'post_status'     => 'publish',
						'orderby'         => 'post_date',
						'order'           => 'DESC',
						'tax_query'       => array(
						    array(
						      'taxonomy'  => 'group',
						      'field'     => 'id',
						      'terms'     => $term->term_id
						    )
						),
					)
				);

				?>

				<?php if ($fields) {
					echo '<div class="uc-description">';
					echo '<h3>'.$fields["title"][0].'</h3>';
					echo '<p>'.$fields["description"][0].'</p>';
					echo '</div>';
				} ?>

				<div class="uc-examples">

				<?php
				foreach($cases as $post){ setup_postdata($post);
					$group_classes = '';
					$cur_terms = get_the_terms( $post->ID, 'group' );
					foreach( $cur_terms as $cur_term ){
						$group_classes .= ' '.strtolower($cur_term->name);
					} ?>

					<div class="uc-item hover-light transition01 <?php echo $group_classes; ?>">
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title(); ?></h3>
							<p><?php the_field('excerpt'); ?></p>
							<span class="read-more"><?php _e( 'Open use case', 'datarobot3' ); ?></span>
						</a>
					</div>

				<?php } wp_reset_postdata(); ?>

				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	function currentMenuItem() {
		jQuery(".menu-item-1120, .menu-item-1120 li").removeClass('current-menu-item');
		var cm = ".menu-item-1120 a[href='"+window.location.pathname + window.location.hash+"']";
		jQuery(cm).parent().addClass('current-menu-item');
	}

	function groupActive(){
		jQuery('.ucf-mobile .uc-filter').each(function(){
			var cc = "- - -";
			var active_text = jQuery(this).find('a.active').text();
			if(active_text){ cc = active_text }
			jQuery(this).find('.current-item').text(cc);
		});
	}

	jQuery(document).ready(function($){

		currentMenuItem();

		var hash = location.hash;
		if (hash) {
			console.log(hash);
			var group = hash.substring(1);
			var term = $('[data-query-filter="' + group + '"]').data("term-id");
			console.log(term);

			$.post(
				dr_js_data.url,
				{
					action : 'dr_ajax_uc',
					nonce : dr_js_data.nonce,
					term_id : term
				},
				function(data){
					$('.uc-content').html(data);
				}
			);

			$(".uc-filter a.active").removeClass('active');
			$('[data-query-filter="' + group + '"]').addClass('active');

            analytics.track('Viewed Industry Use Cases', {
                category: 'User interactions',
                label: group
            });

		}

		groupActive();

		$(".uc-filter a").click(function(e){

			var a_group = $(this).data("query-filter");
			var term_id = $(this).data("term-id");

			$(".uc-content").html('<div class="preloader"><span class="dr-loader"><span class="loader"><svg width="36px" height="36px" viewBox="0 0 335 380"><defs><path id="path-1" d="M0,0.207 L334.206,0.207 L334.206,378.94 L0,378.94 L0,0.207 Z"></path></defs><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="datarobot-robot-monochrome"><g id="Clip-2"></g><path d="M310.55,180.463 C310.55,198.609 295.703,213.456 277.557,213.456 L56.649,213.456 C38.503,213.456 23.656,198.609 23.656,180.463 L23.656,48.488 C23.656,30.342 38.503,15.495 56.649,15.495 L277.557,15.495 C295.703,15.495 310.55,30.342 310.55,48.488 L310.55,180.463 L310.55,180.463 Z M322.565,69.944 L321.301,69.737 L321.301,41.448 C321.301,18.765 302.743,0.207 280.061,0.207 L54.145,0.207 C31.463,0.207 12.904,18.765 12.904,41.448 L12.904,69.737 L11.641,69.944 C5.113,71.014 0,77.034 0,83.649 L0,129.735 C0,136.35 5.113,142.37 11.641,143.44 L12.904,143.647 L12.904,189.961 C12.904,212.643 31.463,231.202 54.145,231.202 L118.658,231.202 L118.658,242.11 L113.082,242.11 L92.814,250.28 L92.814,253.277 L85.205,253.277 L85.205,261.246 C69.503,262.062 56.978,275.093 56.978,290.995 L56.978,300.038 L53.928,300.038 C50.17,303.796 48.063,305.903 44.306,309.661 L44.306,336.213 L53.928,345.836 L74.089,345.836 L78.213,341.712 L78.213,328.095 L86.148,328.129 L86.148,306.193 C86.148,302.794 83.392,300.038 79.993,300.038 L76.224,300.038 L76.224,290.995 C76.224,285.713 80.131,281.339 85.205,280.579 L85.205,291.222 L93.963,291.222 L93.963,323.119 L104.572,335.156 L104.572,351.651 C96.421,351.651 87.492,352.422 75.788,362.503 L75.788,379 L162.234,379 L162.234,346.794 L172.798,346.794 L172.798,379 L259.245,379 L259.245,362.503 C247.542,352.422 238.612,351.651 230.461,351.651 L230.461,335.156 L241.507,323.119 L241.507,291.222 L249.828,291.222 L249.828,280.551 C254.994,281.228 258.998,285.648 258.998,290.995 L258.998,300.038 L255.229,300.038 C251.83,300.038 249.074,302.794 249.074,306.193 L249.074,328.129 L257.009,328.095 L257.009,341.712 L261.133,345.836 L281.294,345.836 C285.052,342.078 287.159,339.971 290.916,336.213 L290.916,309.661 L281.294,300.038 L278.244,300.038 L278.244,290.995 C278.244,275.029 265.618,261.961 249.828,261.24 L249.828,253.277 L242.218,253.277 L242.218,250.28 L221.951,242.11 L216.374,242.11 L216.374,231.202 L280.061,231.202 C302.743,231.202 321.301,212.643 321.301,189.961 L321.301,143.647 L322.565,143.44 C329.093,142.37 334.206,136.35 334.206,129.735 L334.206,83.65 C334.206,77.035 329.093,71.015 322.565,69.944 L322.565,69.944 Z M113.084,99.062 C104.41,99.062 97.378,109.525 97.378,122.432 C97.378,135.338 104.41,145.801 113.084,145.801 C121.759,145.801 128.791,135.338 128.791,122.432 C128.791,109.525 121.759,99.062 113.084,99.062 L113.084,99.062 Z M221.122,99.062 C212.447,99.062 205.415,109.525 205.415,122.432 C205.415,135.338 212.447,145.801 221.122,145.801 C229.796,145.801 236.828,135.338 236.828,122.432 C236.828,109.525 229.796,99.062 221.122,99.062 L221.122,99.062 Z"id="Fill-1" fill="#BECDD9" mask="url(#mask-2)"></path></g></g></svg><span class="loader-inner"></span></span></span></div>');

			$.post(
				dr_js_data.url,
				{
					action : 'dr_ajax_uc',
					nonce : dr_js_data.nonce,
					term_id : term_id
				},
				function(data){
					$('.uc-content').html(data);
					currentMenuItem();
					groupActive();
				}
			);

			$(".uc-filter a.active").removeClass('active');
			$('[data-query-filter="' + a_group + '"]').addClass('active');

            analytics.track('Viewed Industry Use Cases', {
                category: 'User interactions',
                label: a_group
            });

			//currentMenuItem();
			//groupActive();
		});

		$('.current-item').click(function(){
			if($(this).next('ul').is(":visible")){
				$(this).next('ul').slideUp(300);
			} else {
				$(this).next('ul').slideDown(300);
			}
		});

		$('.ucf-mobile a').click(function(){
			var catText = $(this).text();
			$(this).closest('.uc-filter').find('.current-item').text(catText);
			$(this).closest('ul').slideUp(300);
			var active_Ind_Group = catText;
		});

		$(".menu-item-1120 a").click(function(){
			window.location.href = $(this).attr('href');
			window.location.reload(true);
		});
	});
</script>
<?php get_footer(); ?>
<?php get_template_part('end'); ?>
