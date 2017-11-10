<?php
/* Template Name: Contact us */
?>

<?php get_header(); ?>

<section class="contact-us">
    <div class="top-block">
        <div class="container clearfix">
            <div class="banner-content">
                <h1><?php the_field( 'banner_title' ); ?></h1>
                <p><?php the_field( 'banner_text' ); ?></p>
                <div class="banner-buttons" data-hj-ignore-attributes>
					<?php
					$rows = get_field( 'banner_buttons' );
					foreach ( $rows as $row ) {
						$image = $row['icon'];
						$demo  = ( $row['type'] == "Request a demo" or $row['type'] == "デモのリクエスト" ); ?>
                        <div class="item transition01 <?php if ( $demo ) {
							echo 'demo';
						} ?>">
                            <a href="#<?php sanitize_title( $row['title'] ); ?>" class="open-popup"
                               data-title="<?= esc_attr( $row['title'] ); ?>"
                               data-predefinedInquiryType="<?= esc_attr( $row['type'] ); ?>">
                                <div class="image-wrap">
                                    <img src="<?= $image['url']; ?>" width="<?= ( $image['width'] / 2 ); ?>"
                                         alt="<?= $row['title']; ?>">
                                </div>
                                <h2 class="transition01"><?php echo $row['title']; ?></h2>
                                <p><?php echo $row['text']; ?></p>
                                <span class="<?= $demo ? 'bg-filled-orange' : 'bg-filled-white' ?> button"><?= $row['button_text'] ?></span>
                            </a>
                        </div>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="departments">
            <div class="container">
                <div class="headquarters">
                    <h2><?php _e( 'Want to reach a local office?', 'datarobot3' ); ?></h2>
                    <a href="#Boston" class="open-popup" data-title="Boston Office"
                       data-predefinedCountry="United States"
                       data-predefinedStateProv="Massachusetts">
                        <span class="bg-filled-blue button"><?php _e( 'Contact the headquarters (Boston, MA)', 'datarobot3' ); ?></span>
                    </a>
                </div>

                <div class="regions">

					<?php
					$rows = get_field( 'region' );
					foreach ( $rows as $row ) { ?>
                        <div class="item">
                            <h3><?php echo $row['title']; ?></h3>
                            <ul class="offices">
								<?php foreach ( $row['offices'] as $office ) { ?>
                                    <li>
                                        <a href="#<?php str_location( $office['office_location'] ); ?>"
                                           class="open-popup"
                                           data-predefinedCountry="<?= esc_attr( $office['country'] ); ?>"
                                           data-predefinedStateProv="<?= esc_attr( $office['state'] ); ?>"
                                           data-title="<?php str_location( $office['office_location'] ); ?> Office"><?php str_location( $office['office_location'] ); ?></a><span><?php str_state( $office['office_location'] ); ?></span>
                                    </li>
								<?php } ?>
                            </ul>
                        </div>
					<?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer();
get_template_part( 'parts/forms/popup' );
get_template_part( 'end' ); ?>
