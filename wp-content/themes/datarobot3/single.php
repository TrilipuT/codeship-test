<?php get_header(); ?>
<section class="single-post">
  <?php the_post(); ?>
  <div class="top-banner">
    <div class="container">
      <div class="blog-category">
        <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>
      </div>
      <h1><?php the_title(); ?></h1>
      <div class="meta">
        <span><?php the_time('M j, Y'); ?> by <?php the_author_posts_link(); ?></span>
      </div>
    </div>
  </div>
  <div class="post-content">
    <div class="container">
      <div class="main">
        <article class="post-inner">
          <?php if( has_excerpt() ){ ?>
            <div class="excerpt">
              <?php the_excerpt(); ?>
            </div>
          <?php } ?>
          <div class="post-text">
            <?php the_content(); ?>
          </div>
          <div class="social-counters">
            <span class="share-text">Liked this post?</span>
            <div class="share-buttons">
              <ul>
                <li><div class="fb-share-button" data-layout="button" data-mobile-iframe="true"></div></li>
                <li><a class="twitter-share-button" href="https://twitter.com/intent/tweet"></a></li>
                <li><div class="g-plus" data-action="share" data-annotation="none"></div></li>
                <li><script type="text/javascript" src="https://platform.linkedin.com/in.js"></script><script type="in/share"></script></li>
              </ul>
            </div>
          </div>
        </article>

        <?php
        $related = get_field('related_posts');
        if($related){ ?>

          <div class="recommended">
            <p>You might also like</p>
            <div class="b-item-wrap">
              <?php foreach( $related as $post){ setup_postdata($post); ?>
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
                      <?php the_category(', '); ?>
                    </div>
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php title_substr(get_the_title(), 50); ?></a></h2>
                    <div class="meta">
                      <span><?php the_time('M j, Y'); ?> by <?php the_author_posts_link(); ?></span>
                    </div>
                  </div>
                </article>
              <?php } ?>
              <?php wp_reset_postdata(); ?>
            </div>
          </div>

        <?php } ?>

      </div>
      <?php get_sidebar('category'); ?>
    </div>
  </div>
</section>
<?php get_template_part('parts/newsletter-form'); ?>
<?php get_footer(); ?>
<script type="text/javascript">
    jQuery(document).ready(function($){
        jQuery('.single-post .post-text a.lightbox').has('img').featherlight({type: 'image'});
    });
</script>
<?php get_template_part('end'); ?>
