<?php get_header(); ?>
    <section class="search">
        <div class="container clearfix">
            <div class="search-roll">
                <div class="section-search">
                    <?php get_search_form(); ?>
                </div>
                <?php if (have_posts()) {
                    global $wp_query; ?>
                    <h3 class="search-count"><?php printf('%s search results for "%s"', $wp_query->found_posts, '<span class="result-text">' . get_search_query() . '</span>'); // search title ?></h3>
                    <div class="category-filter clearfix">
                        <ul class="clearfix">
                            <li class="cat-item current-cat" id="all"><a href="#">All</a></li>
                            <li class="cat-item" id="www"><a href="#">WWW</a></li>
                            <li class="cat-item" id="category"><a href="#">Blog & News</a></li>
                            <li class="cat-item" id="education"><a href="#">Education</a></li>
                        </ul>
                    </div>
                    <?php if (have_posts()) : while (have_posts()) : the_post();
                        if (basename(get_page_template()) != 'page-landing.php') {
                            $section = 'www';
                            if (basename(get_page_template()) == 'page-courses.php') {
                                $section = 'education';
                            } elseif (has_category(array('blog', 'news', 'events'))) {
                                $section = 'category';
                            } ?>
                            <article class="post <?= $section ?> all">
                                <div class="post-type"><?php echo $post->post_type; ?></div>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p class="excerpt"><?php excerpt(22); ?></p>
                                <div class="meta sm clearfix">
                                    <div class="date"><?php the_time('F j, Y'); ?> </div>
                                </div>
                            </article>
                        <?php } ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                <?php } else { ?>
                    <h3>We couldn’t find any posts regarding your input</h3>
                    <p>Try to change your query request.</p>
                <?php } ?>
                <p class="empty" style="display: none">No posts found.</p>
            </div>
    </section>
    <script>
        jQuery(document).ready(function($) {
            $('.section-search input.text').focusin(
                function () {
                    $('.section-search i').css('color', '#2D8FE2');
                }).focusout(
                function () {
                    $('.section-search i').css('color', '#B8C5CE');
                });

            $(".cat-item").click(function () {
                if ($(".cat-item").hasClass('current-cat')) {
                    $(".cat-item").removeClass('current-cat');
                }
                $(this).addClass('current-cat');
                var itemId = $(this).attr("id");
                $('.post').hide();
                if ($('.' + itemId).length < 1) {
                    $('.empty').show();
                } else {
                    $('.' + itemId).show();
                    $('.empty').hide();
                }
            });

            var search = $(".section-search input").val();
            if (search !== '') {
                var keyword = search.toLowerCase(),
                    $('article h3 a, article p').each(function () {
                        var keywordRegex = new RegExp('(' + keyword + ')', 'gi');
                        var $el = $(this);
                        if (keywordRegex.test($el.text())) {
                            $el.html($el.text().replace(keywordRegex, '<span class="highlight">$1</span>'));
                        }
                    });
            }
        });
    </script>
<?php get_footer(); ?>
<?php get_template_part('end'); ?>