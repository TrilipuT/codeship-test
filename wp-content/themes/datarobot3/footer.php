<footer>
	<div class="container">
		<div class="site-map">
			<div class="hamburger">
				<span><?php _e('Site map', 'datarobot3'); ?></span>
				<button class="c-hamburger c-hamburger--htx">
					<span><?php _e('Site map', 'datarobot3'); ?></span>
				</button>
			</div>
			<div class="btt">
				<i class="icon-circle-up"></i>
				<span><?php _e('Back to top', 'datarobot3'); ?></span>
			</div>
			<div class="sitemap-columns clearfix">
				<div class="column">
					<span>Product</span>
					<?php
					$args = array(
						'theme_location' => 'bottom1',
						'container'=> false,
						'menu_class' => 'bottom-menu',
						'menu_id' => 'bottom-nav1',
					);
					wp_nav_menu($args);
					?>
				</div>
				<div class="column">
					<span>DataRobot is for...</span>
					<?php
					$args = array(
						'theme_location' => 'bottom2',
						'container'=> false,
						'menu_class' => 'bottom-menu',
						'menu_id' => 'bottom-nav2',
					);
					wp_nav_menu($args);
					?>
				</div>
				<div class="column">
					<span>DataRobot Education</span>
					<?php
					$args = array(
						'theme_location' => 'bottom3',
						'container'=> false,
						'menu_class' => 'bottom-menu',
						'menu_id' => 'bottom-nav3',
					);
					wp_nav_menu($args);
					?>
				</div>
				<div class="column">
					<span>Company</span>
					<?php
					$args = array(
						'theme_location' => 'bottom4',
						'container'=> false,
						'menu_class' => 'bottom-menu',
						'menu_id' => 'bottom-nav4',
					);
					wp_nav_menu($args);
					?>
				</div>
			</div>
			<div class="search-bar search_widget footer-top">
				<?php get_search_form(); ?>
			</div>
		</div>

		<div class="bottom-text">
			<div class="social-networks">
				<ul class="clearfix">
					<li><a href="https://plus.google.com/+DataRobot"><i class="icon-google-plus"></i></a></li>
					<li><a href="https://www.linkedin.com/company/datarobot"><i class="icon-linkedin"></i></a></li>
					<li><a href="https://www.facebook.com/datarobotinc/"><i class="icon-facebook"></i></a></li>
					<li><a href="https://twitter.com/DataRobot"><i class="icon-twitter"></i></a></li>
				</ul>
			</div>
			<div class="search-bar search_widget footer-bottom">
				<?php get_search_form(); ?>
			</div>
			<div class="dr-contacts">
				One International Place, 5th Floor, Boston, MA 02110<br>
				Contact: <a href="mailto:info@datarobot.com" target="_top">info@datarobot.com</a>
			</div>
			<div class="agreement">
				<div class="top">
					<span>DataRobot, Inc. © 2012 - <?php echo date("Y"); ?></span>
					<ul class="language-switcher clear"><?php pll_the_languages(array('show_flags'=>1,'show_names'=>0));?></ul>
				</div>
				<div class="bottom">
					<a href="<?= home_url('/privacy') ?>">Privacy</a> and <a href="<?= home_url('/terms-of-service') ?>">Terms of Service</a>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
<script>
	window._wq = window._wq || [];
	_wq.push({ id: "_all", onReady: function(video) {
		video.bind('end', function() {
			if (jQuery(window).width() <= 1024) {
				video.popover.hide();
			}
		});
	}});
</script>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
</div>
<!-- leadforensics -->
<script type="text/javascript" src="https://secure.leadforensics.com/js/117222.js" ></script>
<noscript><img alt="" src="https://secure.leadforensics.com/117222.png?trk_user=117222&trk_tit=jsdisabled&trk_ref=jsdisabled&trk_loc=jsdisabled" height="0px" width="0px" style="display:none;" /></noscript>
<!-- /leadforensics -->
