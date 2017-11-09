
	<footer>
		<div class="container">
			<div class="row clear">
				<div class="col4 bottom-1">
					<?php
						$args = array(
							'theme_location' => 'bottom1_jp',
							'container'=> false,
							'menu_class' => 'bottom-menu',
					  		'menu_id' => 'bottom-nav1',
					  	);
						wp_nav_menu($args);
					?>
				</div>
				<div class="col4 bottom-2">
					<?php
						$args = array(
							'theme_location' => 'bottom2_jp',
							'container'=> false,
							'menu_class' => 'bottom-menu',
					  		'menu_id' => 'bottom-nav2',
					  	);
						wp_nav_menu($args);
					?>
				</div>
				<div class="col4 bottom-3">
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
				<div class="col4 bottom-4">
					<div class="social">
						<ul class="clear">
							<li><a href="https://plus.google.com/108404356130400194703"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="http://www.linkedin.com/company/datarobot"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="https://www.facebook.com/datarobotinc/"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://twitter.com/DataRobot"><i class="fa fa-twitter"></i></a></li>
						</ul>
					</div>

					<p class="email">日本語でのお問い合わせはこちら<br><a href="mailto:info-jp@datarobot.com">info-jp@datarobot.com</a></p>
					<p class="phone"></p>
					<p class="adress">One International Place, 5th Floor<br>Boston, MA, 02110</p>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	<script type="text/javascript">

		if (!Modernizr.svg) {
		    var imgs = document.getElementsByTagName('img');
		    var svgExtension = /.*\.svg$/
		    var l = imgs.length;
		    for(var i = 0; i < l; i++) {
		        if(imgs[i].src.match(svgExtension)) {
		            imgs[i].src = imgs[i].src.slice(0, -3) + 'png';
		            console.log(imgs[i].src);
		        }
		    }
		}
		
		var count = 0;
		function trigger_counter() {
			if(jQuery('.model-data-no').length) {
			  var docViewTop = jQuery(window).scrollTop();
			  var docViewBottom = docViewTop + jQuery(window).height();
			  var elemTop = jQuery('.model-data-no').offset().top;
			  var elemBottom = elemTop + jQuery('.model-data-no').height();

			  if (((elemBottom <= docViewBottom) && (elemTop >= docViewTop))) {
			    if (count == 0) {
			      count = '<?php  print(datarobot_total_models(null)); ?>';
			      jQuery('#models-count').countTo({
			        from: 4000000,
			        to: count,
			        speed: 1000,
			        refreshInterval: 50,
			        onComplete: function(value) {}
			      });
			    }
		  	}
			}
		}

		jQuery(document).ready(function($){
			$('input#s').val('');
			$('#searchform label i').click(function(){
				$('#searchform').submit();
			});

			var windowWidth;

			var tabletPortraitBreakpoint = 768;
			var tabletLandscapeBreakpoint = 1024;

			function onScroll(event){
					trigger_counter();
			    var scrollPos = $(document).scrollTop();
			    $('.anchors a').each(function(){
			        var currLink = $(this);
			        var refElement = $(currLink.attr('href'));
			        if ((refElement.offset().top-141) <= scrollPos && (refElement.offset().top + refElement.height()/*- 60*/) > scrollPos) {
			            $('.anchors a').removeClass('active');
			            currLink.addClass('active');
			        }
			        else {
			            currLink.removeClass('active');
			        }
			    });
			}

			function topBox() {
		      $( '.top-slider' ).height($( window ).height() - 80);
		      return false;
		    }

		    function isTablet () {
		    	return windowWidth < tabletLandscapeBreakpoint && windowWidth > tabletPortraitBreakpoint;
		    }

		    function isDesktop () {
		    	return windowWidth > tabletLandscapeBreakpoint;
		    }

		    function bindMenuHover() {
					$('#top-nav li').hover(
						function() {
							$(this).children('ul.sub-menu').fadeIn('fast');
						},
						function() {
							$(this).children('ul.sub-menu').hide();
						}
					);
		    }

		    function bindUseCaseHover() {
		    	if($('.usecase .title').is('.pointer')) {
		    		$('.usecase .title').removeClass('pointer');
		    	}
					$('.usecase').hover(
						function() {
							$(this).children('.panel').fadeIn('fast');
						},
						function() {
							$(this).children('.panel').hide();
						}
					);
		    }

		    function bindMenuClick() {
		    	$('#top-nav li').click(function() {
						if($(this).hasClass('open-menu')) {
							$(this).children('ul.sub-menu').hide();
						} else {
							$(this).children('ul.sub-menu').fadeIn('fast');
						}
			    	$( this ).toggleClass('open-menu');
			  	});
		    }

		    function bindUseCaseClick() {
		    	if(!$('.usecase .title').is('.pointer')) {
		    		$('.usecase .title').addClass('pointer');
		    	}
		    	$('.usecase').click(function() {
						if($(this).hasClass('open-panel')) {
							$(this).children('.panel').hide();
						} else {
							$(this).children('.panel').fadeIn('fast');
							$(this).siblings().find('.panel').hide();
							$(this).siblings().removeClass('open-panel');
						}
			    	$( this ).toggleClass('open-panel');
					});
		    }

		    function initializeListeners() {
		    	$('#top-nav li').off();
		    	$('.usecase').off();
		    	if(isDesktop()) {
			    	bindMenuHover();
						bindUseCaseHover();
			    } else {
			    	bindMenuClick();
			    	bindUseCaseClick();
			    }
		    }

		    function onResize() {
		    	windowWidth = $( window ).width();
					topBox();
		    	initializeListeners();
		    }

			onResize();
			trigger_counter();

			if($('.models-reporting').length) {
				$('.models-reporting').on('click', function() {
					$('.wistia_embed div').click();
				});
			}

			$('#top-nav ul.sub-menu').hide();

			$('#top-nav>li>a[href="#"]').click(function(e) {
			    e.preventDefault();
			});

			var menu = $('.wrapper header');
			var scrh = $( window ).height();
			var anchors = $('.anchors');
			if (anchors.length) {
				var anchors_offset = anchors.offset().top-81;
			}

      		$(window).scroll(function(){
				trigger_counter();

		      	if ( windowWidth > 768 ){
		      		if ($('.anchors').length) {
		      			if ( $(this).scrollTop() > anchors_offset && anchors.hasClass('default') ){
		      				$('.page-content').css('padding-top', '60px');
		            		anchors.removeClass('default').addClass('fixed');
			            } else if($(this).scrollTop() <= anchors_offset && anchors.hasClass('fixed')) {
			            	$('.page-content').css('padding-top', '0px');
			            	anchors.removeClass('fixed').addClass('default');
			            }
		      		} else {
		      			// if ( $(this).scrollTop() > scrh && menu.hasClass('default') ){
		          //   	$('.wrapper').css('padding-top', '81px');
			         //    menu.removeClass('default').addClass('fixed').fadeIn('fast');
			         //    } else if($(this).scrollTop() <= scrh && menu.hasClass('fixed')) {
			         //    	$('.wrapper').css('padding-top', '0px');
			         //        menu.removeClass('fixed').addClass('default');
			         //    }
		      		}
		          }
		      });

	        //$('.anchors li:first-child a').addClass('active');

			// $('.anchors a').on('click', function (event) {
			// 	event.preventDefault();

			// 	var id  = $(this).attr('href'),

			// 	top = $(id).offset().top;

			// 	$('body,html').animate({scrollTop: top-100}, 1000);
			// });

	        $(document).on("scroll", onScroll);

			$('.anchors a').on('click', function (e) {
		        e.preventDefault();
		        $(document).off("scroll");

		        $('.anchors a').each(function () {
		            $(this).removeClass('active');
		        })
		        $(this).addClass('active');

		        var target = this.hash,
		            menu = target;
		        $target = $(target);
		        $('html, body').stop().animate({
		            'scrollTop': $target.offset().top-141
		        }, 500, 'swing', function () {
		            window.location.hash = target;
		            $(document).on("scroll", onScroll);
		        });
		    });

			<?php if (is_page('careers')) { ?>

			$('.bxslider').bxSlider({
				speed: 500,
				infiniteLoop: false,
				prevSelector: $('.top-slider .prev'),
				nextSelector: $('.top-slider .next'),
				prevText: '',
				nextText: '',
				hideControlOnEnd: true
			});

			<?php }; ?>

			// if (window.location.pathname == '/careers/' && location.hash != "#position-grid") {
			// 	$('.page-template-page-careers').has('.top-slider').css('overflow', 'hidden');
			// };

	        $('#open-positions').click(function(event){
	        	event.preventDefault();

	        	var slideDown = $('.page-content').offset().top;

				$('body,html').animate({scrollTop: slideDown}, 750).css('overflow', 'auto');
	        });

	        $('a.bx-next').click(function(){
	        	if ($(this).hasClass('disabled')) {
	        		$(this).click(function(){
	        			var slideDown = $('.page-content').offset().top;
						$('body,html').animate({scrollTop: slideDown}, 750).css('overflow', 'auto');
	        		});
	        	};
	        });

	        $('#back-to-top').hide();
	        <?php
	        if (!is_mobile()) { ?>
	        	$(window).scroll(function(){
					( $(this).scrollTop() > 500 ) ? $('#back-to-top').fadeIn('fast') : $('#back-to-top').fadeOut('fast');
				});
	        <?php }; ?>


			$('#back-to-top').on('click', function(event){
				event.preventDefault();
				$('body,html').animate({
					scrollTop: 0 ,
				 	}, 500
				);
			});

			$('.scroll-down').click(function(event){
				event.preventDefault();
				var slideDownToForm = $('.get-in-touch').offset().top;
				$('body,html').animate({scrollTop: slideDownToForm <?php if(!is_mobile()){echo '- 175';} ?>}, 750);
			});

			$('header .nav-toggle').click(function(){
				if ($('#main-nav').is(':visible')) {
					$('#main-nav').slideUp('fast');
				} else {
					$('#main-nav').slideDown('fast');
				};
			})

			$('.uc-tabs ul li a').click(function(e){
				e.preventDefault();
				if ($(this).hasClass('active')){

				} else {
					$('.tab.active').hide().removeClass('active').siblings().fadeIn('fast').addClass('active');
					$('.uc-tabs ul li a.active').removeClass('active');
					$(this).addClass('active');
				};
			});

			$(window).resize(onResize);

			jQuery(function($) {
			  $('input[name="company"]').autoComplete({
			    minChars: 1,
			    source: function(term, response){
			      $.getJSON('https://autocomplete.clearbit.com/v1/companies/suggest', { query: term }, function(data){ response(data); });
			    },
			    renderItem: function (item, search) {
			      default_logo = 'https://s3.amazonaws.com/clearbit-blog/images/company_autocomplete_api/unknown.gif'

			      if(item.logo == null) {
			        logo = default_logo
			      } else {
			        logo = item.logo + '?size=30x30'
			      }

			      container = '<div class="autocomplete-suggestion" data-name="'+item.name+'" data-val="'+search+'">'
			      container += '<span class="icon"><img align="center" src="'+logo+'" onerror="this.src=\''+default_logo+'\'"></span> '
			      container += item.name+'<span class="domain">'+item.domain+'</span></div>';
			      return container
			    },
			    onSelect: function(e, term, item){
			      $('input[name="company"]').val(item.data('name'))
			    },
			  });
			});

		});

	</script>
	<script>
		(function(d,b,a,s,e){ var t = b.createElement(a),
		    fs = b.getElementsByTagName(a)[0]; t.async=1; t.id=e;
		    t.src=('https:'==document.location.protocol ? 'https://' : 'http://') + s;
		    fs.parentNode.insertBefore(t, fs); })
		(window,document,'script','scripts.demandbase.com/12n0lkFp.min.js','demandbase_js_lib');
	</script>
</div>

</body>
</html>