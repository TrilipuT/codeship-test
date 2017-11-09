<div class="popular-posts">

  <?php
  global $post;

  $sidebar_id = 'category-sidebar';
  $sidebars_widgets = wp_get_sidebars_widgets();
  $widget_ids = $sidebars_widgets[$sidebar_id];
  $widget = $widget_ids[0];

  $posts = get_field('popular_posts', 'widget_' . $widget);


  if( $posts ){ ?>
    <h4>Popular posts</h4>

    <?php foreach( $posts as $post){ setup_postdata($post); ?>
      <div class="post">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <span><?php the_time('M j, Y'); ?> by <?php the_author_posts_link(); ?></span>
      </div>
    <?php } ?>

    <?php wp_reset_postdata(); ?>

  <?php } ?>

</div>
