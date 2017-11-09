<?php get_header(); ?>
    <section class="archive category">
        <div class="container clearfix">
          <h1>
						<?php if (is_author()) {
					    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
							printf(__("Posts by %s",'datarobot3'),$curauth->display_name);
						} else {
							single_cat_title();
						} ?>
					</h1>
          <div class="b-main-wrap clearfix">

            <aside class="sidebar-left">
              <div class="b-blogs">
                <h4><a href="<?php echo get_category_link(72); ?>">Blogs</a></h4>
                <ul>
                  <?php wp_list_categories('child_of=72&orderby=count&show_count=0&use_desc_for_title=0&title_li='); ?>
                </ul>
              </div>
              <div class="b-categories">
                <h4><a href="<?php echo get_category_link(71); ?>">What's happening</a></h4>
                <ul>
                  <?php wp_list_categories('child_of=71&orderby=count&show_count=0&use_desc_for_title=0&title_li='); ?>
                </ul>
              </div>

              <div class="social-follow">
                <h4>Follow us</h4>
                <ul class="clearfix">
                  <li><a href="https://plus.google.com/+DataRobot" class="gplus"><i class="icon-google-plus"></i></a></li>
                  <li><a href="https://www.linkedin.com/company/datarobot" class="linkedin"><i class="icon-linkedin"></i></a></li>
                  <li><a href="https://www.facebook.com/datarobotinc/" class="facebook"><i class="icon-facebook"></i></a></li>
                  <li><a href="https://twitter.com/DataRobot" class="twitter"><i class="icon-twitter"></i></a></li>
                </ul>
              </div>
            </aside>

            <div class="main">
              <div class="blog-roll">
                <?php if (is_category('stories')) {
                  global $query_string;
                  parse_str($query_string, $args);
                  $args['category_name'] = 'blog,news';
                  query_posts( $args );
                } ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="post-item">
									<div class="thumbnail">
										<?php if (has_post_thumbnail()) { ?>
	                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	                  <?php } else { ?>
											<a href="<?php the_permalink(); ?>"><img src="<?= get_template_directory_uri(); ?>/assets/built/images/post-thumbnail.jpg" alt="Post thumbnail" title="<?php the_title(); ?>"></a>
										<?php } ?>
									</div>
                  <div class="post-cover">
                    <div class="category-label">
                      <div class="label-bg"></div>
                      <?php echo get_the_category_list(''); ?>
                    </div>
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php title_substr(get_the_title(), 60); ?></a></h2>
                    <div class="meta">
                      <span><?php the_time('M j, Y'); ?> by <?php the_author_posts_link(); ?></span>
                    </div>
                  </div>
                </article>
              <?php wp_reset_query(); endwhile;
              else: echo '<p>No posts yet.</p>'; endif; ?>
              </div>
              <div class="pagination">
                  <?php pagination(); ?>
              </div>
            </div>

            <?php get_sidebar('category'); ?>

          </div>
        </div>
    </section>
<?php get_template_part('parts/newsletter-form'); ?>
<?php get_footer(); ?>
<?php get_template_part('end'); ?>
