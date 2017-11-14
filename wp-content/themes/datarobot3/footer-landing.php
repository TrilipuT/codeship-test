        <footer>
                <div class="copyright">
                    <img src="<?= get_template_directory_uri(); ?>/assets/built/images/td/logo-sm.png" alt="DataRobot">
                    <span>DataRobot, Inc. © 2012 - <?php the_time( 'Y' ); ?></span>
                </div>
                <div class="bpf">
                    Better predictions. Faster.
                </div>
        </footer>
    </div>
    <?php if ( ! get_query_var( 'type' ) ): ?>
        <div class="form-holder" id="form-holder">
            <div class="form-wrap">
                <div class="popup-close transition">
                    <i class="icon-close"></i>
                </div>
                <?php get_template_part('parts/forms/webinar-material') ?>
            </div>
	        <?php get_template_part('parts/webinar/quotes') ?>
        </div>
    <?php endif; ?>
</section>
<?php wp_footer(); ?>
<!-- leadforensics -->
<script type="text/javascript" src="https://secure.leadforensics.com/js/117222.js"></script>
<noscript><img alt=""
               src="https://secure.leadforensics.com/117222.png?trk_user=117222&trk_tit=jsdisabled&trk_ref=jsdisabled&trk_loc=jsdisabled"
               height="0px" width="0px" style="display:none;"/></noscript>
<!-- /leadforensics -->
<?php get_template_part( 'end' );