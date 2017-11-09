<?php
/* Template Name: Homepage */
?>

<?php get_header(); ?>
<section class="homepage">
    <div class="top-block" style="background-image: url(<?php the_field('bg_image'); ?>);">
        <div class="container">
            <div class="video clearfix">
                <div class="video-text">
                    <h1><?php the_field('banner_text'); ?></h1>
                    <a href="<?php the_field('get_started_link'); ?>" class="bg-filled-blue button"
                       data-type="<?php _e('Request a demo', 'datarobot3'); ?>"><?php _e('See DataRobot in Action!', 'datarobot3'); ?></a>
                    <div class="watch-v transition">
                        <i class="icon-play-circle-outline"></i><?php the_field('video'); ?>
                    </div>
                </div>
            </div>
            <?php
            if (have_rows('logos')): ?>
                <div class="logos">
                    <div class="logos-row">
                        <?php while (have_rows('logos')) : the_row();
                            $image = get_sub_field('logo_image'); ?>
                            <img src="<?php echo $image['url'] ?>" width="<?php echo($image['width'] / 2); ?>"
                                 alt="<?php _e('DR technologies', 'datarobot3'); ?>">
                        <?php endwhile; ?>
                    </div>
                    <p><?php the_field('text_under_logos'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="roles">
        <div class="container">
            <h2><?php _e('DataRobot works for...', 'datarobot3'); ?></h2>
            <div class="role-buttons" data-hj-ignore-attributes>
                <?php
                if (have_rows('role')):
                    while (have_rows('role')) : the_row(); ?>

                        <div class="item transition01 button hover-light">
                            <a href="<?php the_sub_field('link'); ?>">
                                <div class="role-image">
                                    <?php $image = get_sub_field('image'); ?>
                                    <img src="<?php echo $image["url"]; ?>" width="<?php echo($image["width"] / 2); ?>"
                                         alt="<?php esc_attr(get_sub_field('title')); ?>">
                                </div>
                                <div class="title">
                                    <span><?php the_sub_field('title'); ?></span>
                                </div>
                                <div class="persona-more">
                                    <i class="icon-circle-right"></i>
                                    <span><?php _e('View', 'datarobot3'); ?></span>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
	<?php if ( $link = get_field( 'sh_link' ) ): ?>
        <div class="superhero-banner">
            <div class="container">
                <img src="<?= get_template_directory_uri() ?>/assets/built/images/homepage/superhero-crest.png" alt="Superhero"
                     class="superhero-img">
                <a href="<?= $link ?>">
                    <span><?php _e( 'Check out the story of two real life Data Science Superheroes!', 'datarobot3' ); ?></span>
                    <svg width="25" height="8" viewBox="0 0 25 8">
                        <polygon fill="#2D8FE2"
                                transform="translate(-1018 -1196)translate(0 1170)translate(1030.5 30)rotate(-180)translate(-1030.5 -30)"
                                points="1043 29.2 1021.2 29.2 1023.2 27.2 1022 26 1018 30 1022 34 1023.2 32.8 1021.2 30.8 1043 30.8"/>
                    </svg>
                </a>
            </div>
        </div>
	<?php endif; ?>
	<?php get_template_part( 'parts/homepage/service-info' ); ?>
    <?php if (get_field('announcement_image')) : ?>
        <div class="announcement">
            <div class="container">
                <div class="b-left">
                    <div class="ann-img"><img src="<?php the_field('announcement_image'); ?>">
                        <div class="ann-label"><span><?php _e('Announcement', 'datarobot3'); ?></span></div>
                    </div>
                    <div class="ann-title">
                        <?php $post_objects = get_field('announcement');
                        if ($post_objects) : ?>
                            <?php foreach ($post_objects as $post) : ?>
                                <?php setup_postdata($post); ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="meta sm clearfix">
                                    <?php if (in_category('events')) { ?>
                                        <div class="date">
                                            <i class="icon-calendar"
                                               style="display: block;margin-right: 10px;float: left;"></i>
                                            <?php eventDateTime(); ?>
                                        </div>
                                    <?php } else { ?>
                                        <div class="meta-info">
                                            <div class="date"><?php the_time('F j, Y'); ?> </div>
                                            <div class="cat"><span>&nbsp;in&nbsp;</span><?php the_category(', '); ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="button-wrap">
                                        <a href="<?php the_permalink(); ?>" class="sm-filled-blue button clearfix">
                                            <span><?php _e('READ MORE', 'datarobot3'); ?></span><i
                                                    class="icon-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="b-right">
                    <h2><?php _e('What’s new', 'datarobot3'); ?></h2>
                    <div class="latest-posts">
                        <?php $post_objects = get_field('latest_posts');
                        if ($post_objects): ?>
                            <?php foreach ($post_objects as $post) : ?>
                                <?php setup_postdata($post); ?>
                                <div class="single-post">
                                    <p class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </p>
                                    <div class="meta sm clearfix">
                                        <?php if (in_category('events')) { ?>
                                            <div class="date">
                                                <i class="icon-calendar"
                                                   style="display: block;margin-right: 10px;float: left;"></i>
                                                <?php eventDateTime(); ?>
                                            </div>
                                        <?php } else { ?>
                                            <div class="date"><?php the_time('F j, Y'); ?> </div>
                                            <div class="cat"><span>&nbsp;in&nbsp;</span><?php the_category(', '); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="mbp">
        <div class="container">
            <h2><?php the_field('mbp_title') ?></h2>
            <p><?php the_field('mbp_subtitle') ?></p>
            <div class="ba-slider" id="ba-slider">
                <div class="new-way resize">
                    <img src="<?php the_field('image_after'); ?>" alt="<?php _e('With DataRobot', 'datarobot3'); ?>">
                </div>
                <div class="old-way resize2">
                    <img src="<?php the_field('image_before'); ?>" alt="<?php _e('Old way', 'datarobot3'); ?>">
                </div>
                <span class="handle"></span>
            </div>
            <div class="ba-mobile">
                <ul class="tab">
                    <li>
                        <a href="#tab1" class="tablinks new active"><?php _e('With DataRobot', 'datarobot3'); ?></a>
                    </li>
                    <li>
                        <a href="#tab2" class="tablinks old"><?php _e('Old way', 'datarobot3'); ?></a>
                    </li>
                </ul>
                <div id="gif" class="gif">
                    <img class="gif-img" src="<?= get_template_directory_uri(); ?>/assets/built/images/swipe.gif">
                </div>
                <div id="tab1" class="tabcontent" style="display: block">
                    <img src="<?php the_field('mobile_image_before'); ?>">
                </div>
                <div id="tab2" class="tabcontent" style="display: none">
                    <img src="<?php the_field('mobile_image_after'); ?>">
                </div>
            </div>
            <div class="contact-b">
                <a href="<?= home_url('/request-a-demo/') ?>"
                   class="bg-filled-white button"><?php _e('Request a demo', 'datarobot3'); ?></a>
            </div>
        </div>
        <script type="text/javascript">


        </script>
    </div>
</section>
<?php get_footer(); ?>
<div class="popup transition">
    <?php
    $form_name = get_field( 'form_name' ) ? get_field( 'form_name' ) : 'Datarobot-main';
    $redirect  = get_field( 'redirect_url' ) ? get_field( 'redirect_url' ) : 'thank-you';
    ?>
    <div class="form-wrap">
        <div class="popup-close transition">
            <i class="icon-close"></i>
        </div>
        <div class="form-title">
            <h3></h3>
        </div>
        <div class="dr-form contact-form">
            <iframe name="hiddenframe" id="hiddenframe" frameborder="0"
                    style="width:0;height:0;border:0;display:none;"></iframe>
            <form method="post" name="<?php echo $form_name; ?>" action="https://s2142644770.t.eloqua.com/e/f2" target="hiddenframe" id="elqForm">
                <div class="form-section">
                    <div class="form-main">
                        <input type="text" name="firstName" id="firstName" value="" class="text first" maxlength="40"
                               placeholder="<?php _e('First Name', 'datarobot3'); ?>">
                        <input type="text" name="lastName" id="lastName" value="" class="text last" maxlength="40"
                               placeholder="<?php _e('Last Name', 'datarobot3'); ?>">
                        <input type="text" name="emailAddress" id="emailAddress" value="" class="text first"
                               maxlength="40" placeholder="<?php _e('Business email', 'datarobot3'); ?>">
                        <input type="text" name="busPhone" id="busPhone" value="" class="text last" maxlength="40"
                               placeholder="<?php _e('Phone', 'datarobot3'); ?>">
                        <input type="text" name="company" id="company" value="" class="text first" maxlength="40"
                               placeholder="<?php _e('Company', 'datarobot3'); ?>">

                        <label class="last">
                            <select name="title" id="title" class="select" placeholder="<?php _e('Role', 'datarobot3'); ?>">
                                <option value=""><?php _e('Role', 'datarobot3'); ?></option>
                                <option value="Actuary"><?php _e('Actuary', 'datarobot3'); ?></option>
                                <option value="Business Analyst"><?php _e('Business Analyst', 'datarobot3'); ?></option>
                                <option value="Executive"><?php _e('Executive', 'datarobot3'); ?></option>
                                <option value="Data scientist - Beginner"><?php _e('Data scientist - Beginner', 'datarobot3'); ?></option>
                                <option value="Data scientist - Expert"><?php _e('Data scientist - Expert', 'datarobot3'); ?></option>
                                <option value="Data scientist - Management"><?php _e('Data scientist - Management', 'datarobot3'); ?></option>
                                <option value="IT professional"><?php _e('IT professional', 'datarobot3'); ?></option>
                                <option value="Software Engineer"><?php _e('Software Engineer', 'datarobot3'); ?></option>
                                <option value="Other"><?php _e('Other', 'datarobot3'); ?></option>
                            </select>
                        </label>

                        <label class="first">
                            <select name="country" id="country" class="select">
                                <option value=""><?php _e('Country', 'datarobot3'); ?></option>
                                <option value="United States">United States</option>
                                <option value="Canada">Canada</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Singapore">Singapore</option>
                                <option value="France">France</option>
                                <option value="Japan">Japan</option>
                                <option value="">--------------</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Congo, The Democratic Republic of the">Congo, The Democratic Republic of
                                    the
                                </option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Territories">French Southern Territories</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guernsey">Guernsey</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands
                                </option>
                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran, Islamic Republic Of">Iran, Islamic Republic Of</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jersey">Jersey</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's
                                    Republic of
                                </option>
                                <option value="Korea, Republic of">Korea, Republic of</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic
                                </option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macao">Macao</option>
                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former
                                    Yugoslav Republic of
                                </option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russian Federation">Russian Federation</option>
                                <option value="RWANDA">RWANDA</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines
                                </option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Georgia and the South Sandwich Islands">South Georgia and the South
                                    Sandwich Islands
                                </option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-Leste">Timor-Leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying
                                    Islands
                                </option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Viet Nam">Viet Nam</option>
                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </label>

                        <label class="last">
                            <select name="stateProv" id="stateProv" class="select" disabled>
                                <option value=""><?php _e('State/Province', 'datarobot3'); ?></option>
                                <option value="Alabama">Alabama</option>
                                <option value="Alaska">Alaska</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Arizona">Arizona</option>
                                <option value="Arkansas">Arkansas</option>
                                <option value="California">California</option>
                                <option value="Colorado">Colorado</option>
                                <option value="Connecticut">Connecticut</option>
                                <option value="Delaware">Delaware</option>
                                <option value="District Of Columbia">District Of Columbia</option>
                                <option value="Federated States Of Micronesia">Federated States Of Micronesia</option>
                                <option value="Florida">Florida</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Guam">Guam</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Idaho">Idaho</option>
                                <option value="Illinois">Illinois</option>
                                <option value="Indiana">Indiana</option>
                                <option value="Iowa">Iowa</option>
                                <option value="Kansas">Kansas</option>
                                <option value="Kentucky">Kentucky</option>
                                <option value="Louisiana">Louisiana</option>
                                <option value="Maine">Maine</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Maryland">Maryland</option>
                                <option value="Massachusetts">Massachusetts</option>
                                <option value="Michigan">Michigan</option>
                                <option value="Minnesota">Minnesota</option>
                                <option value="Mississippi">Mississippi</option>
                                <option value="Missouri">Missouri</option>
                                <option value="Montana">Montana</option>
                                <option value="Nebraska">Nebraska</option>
                                <option value="Nevada">Nevada</option>
                                <option value="New Hampshire">New Hampshire</option>
                                <option value="New Jersey">New Jersey</option>
                                <option value="New Mexico">New Mexico</option>
                                <option value="New York">New York</option>
                                <option value="North Carolina">North Carolina</option>
                                <option value="North Dakota">North Dakota</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Ohio">Ohio</option>
                                <option value="Oklahoma">Oklahoma</option>
                                <option value="Oregon">Oregon</option>
                                <option value="Palau">Palau</option>
                                <option value="Pennsylvania">Pennsylvania</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Rhode Island">Rhode Island</option>
                                <option value="South Carolina">South Carolina</option>
                                <option value="South Dakota">South Dakota</option>
                                <option value="Tennessee">Tennessee</option>
                                <option value="Texas">Texas</option>
                                <option value="Utah">Utah</option>
                                <option value="Vermont">Vermont</option>
                                <option value="Virgin Islands">Virgin Islands</option>
                                <option value="Virginia">Virginia</option>
                                <option value="Washington">Washington</option>
                                <option value="West Virginia">West Virginia</option>
                                <option value="Wisconsin">Wisconsin</option>
                                <option value="Wyoming">Wyoming</option>
                                <option value="Alberta">Alberta</option>
                                <option value="British Columbia">British Columbia</option>
                                <option value="Manitoba">Manitoba</option>
                                <option value="New Brunswick">New Brunswick</option>
                                <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                                <option value="Nova Scotia">Nova Scotia</option>
                                <option value="Nunavut">Nunavut</option>
                                <option value="Northwest Territories">Northwest Territories</option>
                                <option value="Ontario">Ontario</option>
                                <option value="Prince Edward Island">Prince Edward Island</option>
                                <option value="Quebec">Quebec</option>
                                <option value="Saskatchewan">Saskatchewan</option>
                                <option value="Yukon">Yukon</option>
                            </select>
                        </label>

                        <label class="fullrow">
                            <select name="inquiryType" id="inquiryType" class="select"
                                    placeholder="I'd like to learn more about">
                                <option value="" selected="selected"><?php _e('Type of inquiry', 'datarobot3'); ?></option>
                                <option value="Request a demo"><?php _e('Request a demo', 'datarobot3'); ?></option>
                                <option value="Contact Sales"><?php _e('Contact Sales', 'datarobot3'); ?></option>
                                <option value="General inquiry"><?php _e('General inquiry', 'datarobot3'); ?></option>
                                <option value="Press/Media inquiry"><?php _e('Press/Media inquiry', 'datarobot3'); ?></option>
                                <option value="Partnership opportunities"><?php _e('Partnership opportunities', 'datarobot3'); ?></option>
                                <option value="Learn more about DataRobot University"><?php _e('Learn more about DataRobot
                                    University', 'datarobot3'); ?>
                                </option>
                                <option value="Investment opportunities"><?php _e('Investment opportunities', 'datarobot3'); ?></option>
                                <option value="Other"><?php _e('Other', 'datarobot3'); ?></option>
                            </select>
                        </label>
                    </div>

                    <div class="form-extra-wrap">
                        <textarea name="customersInterest" id="customersInterest" class="fullrow" rows="6"
                                  placeholder="<?php _e('Tell us about your interest', 'datarobot3'); ?>"></textarea>
                    </div>
                </div>

                <div class="form-footer clearfix">
                    <input type="hidden" name="submittedOnUrl" id="submittedOnUrl" value="">
                    <input type="hidden" name="formName" value="<?php echo $form_name; ?>">
                    <input type="hidden" name="elqFormName" value="<?php echo $form_name; ?>">
                    <input type="hidden" name="elqSiteID" value="2142644770">
                    <input type="hidden" name="elqCustomerGUID" value="">
                    <input type="hidden" name="elqCampaignId" value="11">
                    <input type="hidden" name="campaignName" value="">
                    <input type="hidden" name="campaignSource" value="">
                    <input type="hidden" name="campaignMedium" value="">
                    <input type="hidden" name="campaignContent" value="">
                    <input type="hidden" name="campaignTerms" value="">

                    <div class="preloader">
			                <span class="dr-loader">
			                  <span class="loader">
			                    <svg width="36px" height="36px" viewBox="0 0 335 380">
			                      <defs><path id="path-1" d="M0,0.207 L334.206,0.207 L334.206,378.94 L0,378.94 L0,0.207 Z"></path></defs><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="datarobot-robot-monochrome"><g id="Clip-2"></g><path d="M310.55,180.463 C310.55,198.609 295.703,213.456 277.557,213.456 L56.649,213.456 C38.503,213.456 23.656,198.609 23.656,180.463 L23.656,48.488 C23.656,30.342 38.503,15.495 56.649,15.495 L277.557,15.495 C295.703,15.495 310.55,30.342 310.55,48.488 L310.55,180.463 L310.55,180.463 Z M322.565,69.944 L321.301,69.737 L321.301,41.448 C321.301,18.765 302.743,0.207 280.061,0.207 L54.145,0.207 C31.463,0.207 12.904,18.765 12.904,41.448 L12.904,69.737 L11.641,69.944 C5.113,71.014 0,77.034 0,83.649 L0,129.735 C0,136.35 5.113,142.37 11.641,143.44 L12.904,143.647 L12.904,189.961 C12.904,212.643 31.463,231.202 54.145,231.202 L118.658,231.202 L118.658,242.11 L113.082,242.11 L92.814,250.28 L92.814,253.277 L85.205,253.277 L85.205,261.246 C69.503,262.062 56.978,275.093 56.978,290.995 L56.978,300.038 L53.928,300.038 C50.17,303.796 48.063,305.903 44.306,309.661 L44.306,336.213 L53.928,345.836 L74.089,345.836 L78.213,341.712 L78.213,328.095 L86.148,328.129 L86.148,306.193 C86.148,302.794 83.392,300.038 79.993,300.038 L76.224,300.038 L76.224,290.995 C76.224,285.713 80.131,281.339 85.205,280.579 L85.205,291.222 L93.963,291.222 L93.963,323.119 L104.572,335.156 L104.572,351.651 C96.421,351.651 87.492,352.422 75.788,362.503 L75.788,379 L162.234,379 L162.234,346.794 L172.798,346.794 L172.798,379 L259.245,379 L259.245,362.503 C247.542,352.422 238.612,351.651 230.461,351.651 L230.461,335.156 L241.507,323.119 L241.507,291.222 L249.828,291.222 L249.828,280.551 C254.994,281.228 258.998,285.648 258.998,290.995 L258.998,300.038 L255.229,300.038 C251.83,300.038 249.074,302.794 249.074,306.193 L249.074,328.129 L257.009,328.095 L257.009,341.712 L261.133,345.836 L281.294,345.836 C285.052,342.078 287.159,339.971 290.916,336.213 L290.916,309.661 L281.294,300.038 L278.244,300.038 L278.244,290.995 C278.244,275.029 265.618,261.961 249.828,261.24 L249.828,253.277 L242.218,253.277 L242.218,250.28 L221.951,242.11 L216.374,242.11 L216.374,231.202 L280.061,231.202 C302.743,231.202 321.301,212.643 321.301,189.961 L321.301,143.647 L322.565,143.44 C329.093,142.37 334.206,136.35 334.206,129.735 L334.206,83.65 C334.206,77.035 329.093,71.015 322.565,69.944 L322.565,69.944 Z M113.084,99.062 C104.41,99.062 97.378,109.525 97.378,122.432 C97.378,135.338 104.41,145.801 113.084,145.801 C121.759,145.801 128.791,135.338 128.791,122.432 C128.791,109.525 121.759,99.062 113.084,99.062 L113.084,99.062 Z M221.122,99.062 C212.447,99.062 205.415,109.525 205.415,122.432 C205.415,135.338 212.447,145.801 221.122,145.801 C229.796,145.801 236.828,135.338 236.828,122.432 C236.828,109.525 229.796,99.062 221.122,99.062 L221.122,99.062 Z" id="Fill-1" fill="#BECDD9" mask="url(#mask-2)"></path></g></g>
			                    </svg>
			                    <span class="loader-inner"></span>
			                  </span>
			                </span>
                    </div>

                    <div id="error-wrap">
                        <div id="form-errors" class="shake" role="alert"></div>
                    </div>

                    <input type="submit" value="<?php _e('Submit', 'datarobot3'); ?>" class="submit bg-filled-blue button">
                </div>
            </form>

            <script type='text/javascript'>
                var timerId = null, timeout = 5;
            </script>
            <script type='text/javascript'>
                function WaitUntilCustomerGUIDIsRetrieved() {
                    if (!!(timerId)) {
                        if (timeout == 0) {
                            return;
                        }
                        if (typeof this.GetElqCustomerGUID === 'function') {
                            document.forms["<?php echo $form_name; ?>"].elements["elqCustomerGUID"].value = GetElqCustomerGUID();
                            return;
                        }
                        timeout -= 1;
                    }
                    timerId = setTimeout("WaitUntilCustomerGUIDIsRetrieved()", 500);
                    return;
                }
                window.onload = WaitUntilCustomerGUIDIsRetrieved;
                _elqQ.push(['elqGetCustomerGUID']);
            </script>

            <script type='text/javascript'>
                function objectifyForm(formArray) {
                    var rArray = {};
                    for (var i = 0; i < formArray.length; i++) {
                        rArray[formArray[i]['name']] = formArray[i]['value'];
                    }
                    var rJSON = JSON.stringify(rArray);
                    console.log(rJSON);
                    return rJSON;
                }

                function transmission_start() {
                    jQuery('#form-errors').text('');
                    jQuery('.dr-form input[type="submit"]').prop("disabled", true);
                    jQuery('.dr-form .preloader').fadeIn(150);
                }

                function transmission_stop() {
                    jQuery('.dr-form input[type="submit"]').prop("disabled", false);
                    jQuery('.dr-form .preloader').hide();
                }

                function transmission_done() {
                    jQuery('.dr-form .preloader').hide();
                    window.location.href = '<?= home_url( $redirect ); ?>';
                }

                function submitToSF() {
                    var sfReq = jQuery.ajax({
                        url: "https://fbnddub87j.execute-api.us-east-1.amazonaws.com/production/forms",
                        type: "POST",
                        headers: {
                            "Accept": "application/json; charset=utf-8",
                            "Content-Type": "application/json; charset=utf-8"
                        },
                        data: objectifyForm(jQuery('#elqForm').serializeArray()),
                        dataType: "json",
                        error: function (jqXHR) {
                            console.log("Response status code: " + jqXHR.status);
                            if (jqXHR.status === 422) {
                                jQuery.each(jqXHR.responseJSON.message, function (i, val) {
                                    jQuery('#' + i).addClass('validation_error');
                                    jQuery('#form-errors').text(val);
                                });
                                transmission_stop();
                            } else if (jqXHR.status === 500) {
                                Raven.captureMessage("SF error. Code: " + jqXHR.status);
                                transmission_done();
                            } else {
                                Raven.captureMessage("Submission error. Code: " + jqXHR.status + ". Switching to backup endpoint.");
                                submitToSF_backup();
                            }
                        },
                        success: function (data, jqXHR) {
                            console.log(data.message);
                            transmission_done();
                        }
                    });
                    return sfReq;
                }

                function submitToSF_backup() {
                    var sf_backup = jQuery.ajax({
                        url: "https://q4mqrj2b0h.execute-api.us-west-1.amazonaws.com/backup/forms",
                        type: "POST",
                        headers: {
                            "Accept": "application/json; charset=utf-8",
                            "Content-Type": "application/json; charset=utf-8"
                        },
                        data: objectifyForm(jQuery('#elqForm').serializeArray()),
                        dataType: "json",
                        error: function (jqXHR) {
                            console.log("SF backup Raven error");
                            Raven.captureMessage("SF backup error. Code: " + jqXHR.status);
                            transmission_done();
                        },
                        success: function (jqXHR) {
                            console.log("Success. Data stored at SF backup endpoint.");
                            transmission_done();
                        },
                    });
                }

                function submitToEloqua() {
                    var elqReq = jQuery.ajax({
                        url: "https://s2142644770.t.eloqua.com/e/f2",
                        type: "POST",
                        data: jQuery('#elqForm').serialize(),
                        beforeSend: transmission_start(),
                        error: function (jqXHR) {
                            console.log("Error. Submission to Eloqua failed.");
                            Raven.setUserContext({
                                email: document.getElementById('emailAddress').value
                            });
                            Raven.captureMessage("Error. Submission to Eloqua failed.");
                            transmission_stop();
                        },
                        success: function (jqXHR) {
                            console.log("Success. Elq submission saved.");
                        },
                        complete: function () {
                            submitToSF();
                        }
                    });
                }

                jQuery(document).ready(function ($) {

                    $('.contact-popup').click(function (e) {
                        e.preventDefault();
                        if ($(window).width() < 720) {
                            $('.wrapper').hide();
                            $(window).scrollTop(75);
                        } else if ($(window).width() >= 720 && $(window).width() <= 1023) {
//                            $('.wrapper').height($(window).height()).css("overflow", "hidden");
                        } else {
//                            $('.wrapper').height($(window).height() - 75).css("overflow", "hidden");
//                            $(window).scrollTop(0);
                        }
                        $('.popup').show();
                    });
                    $('.popup').click(function (e) {
                        if (e.target !== this)
                            return;
                        $('.wrapper').show().height("auto").css("overflow", "auto");
                        $(this).hide();
                    });
                    $('.popup-close').click(function () {
                        $('.wrapper').show().height("auto").css("overflow", "auto");
                        $('.popup').hide();
                    });

                    $('.dr-form #submittedOnUrl').val(window.location.href);

                    $('.contact-popup').click(function () {
                        $('.form-title h3').text($(this).data('source'));
                        var element = $(this).attr('href');
                        var full_source = window.location.href.split("#")[0] + element;
                        $('.dr-form #submittedOnUrl').val(full_source);
                        var country = $(this).data('country');
                        if (country) {
                            $('.dr-form #country').val(country).change();
                        }
                        var state = $(this).data('state');
                        if (state) {
                            $('.dr-form #stateProv').val(state).change();
                        }
                        var type = $(this).data('type');
                        if (type) {
                            $('.dr-form #customersInterest').val(type).change();
                        }
                    });

                    $('select').change(function () {
                        $(this).css('color', '#424242');
                    });

                    $('#country').change(function () {
                        if ($(this).val() === "United States" || $(this).val() === "Canada") {
                            $('#stateProv').prop('disabled', false);
                        } else {
                            $('#stateProv').val('').prop('disabled', true);
                        }
                    });

                    $('.dr-form').submit(function (event) {
                        event.preventDefault();

                        if ($('.dr-form #stateProv').prop('disabled') === false && $('.dr-form #stateProv').val() == "") {
                            event.preventDefault();
                            $('.dr-form #stateProv').addClass('validation_error');
                            $('.dr-form #stateProv').focus(function () {
                                $(this).removeClass('validation_error');
                            });
                        }
                        ;

                        if ($('.dr-form #inquiryType').val() == "") {
                            event.preventDefault();
                            $('.dr-form #inquiryType').addClass('validation_error');
                            $('.dr-form #inquiryType').change(function () {
                                $(this).removeClass('validation_error');
                            });
                        }
                        ;

                        var error_fields = jQuery(this).find(".validation_error");

                        if (error_fields.length > 0) {
                            event.preventDefault();
                            return;
                        }
                        ;

                        jQuery("input[name='campaignName']").val(gasfdc_campaign);
                        jQuery("input[name='campaignSource']").val(gasfdc_source);
                        jQuery("input[name='campaignMedium']").val(gasfdc_medium);
                        jQuery("input[name='campaignContent']").val(gasfdc_content);
                        jQuery("input[name='campaignTerms']").val(gasfdc_term);

                        identifyForm();

                        submitToEloqua();
                    });


                    var validator = new FormValidator('<?php echo $form_name; ?>', [{
                        name: 'firstName',
                        rules: 'required|min_length[2]'
                    }, {
                        name: 'lastName',
                        rules: 'required|min_length[2]'
                    }, {
                        name: 'emailAddress',
                        rules: 'required|valid_email'
                    }, {
                        name: 'title',
                        rules: 'required'
                    }, {
                        name: 'company',
                        rules: 'required|min_length[2]|callback_valid_c_name'
                    }, {
                        name: 'busPhone',
                        rules: 'required|min_length[5]'
                    }, {
                        name: 'country',
                        rules: 'required'
                    }], ___event_performValidation);

                    validator.registerCallback('valid_c_name', function (value) {
                        if (validateCompany(value)) {
                            return true;
                        }
                        return false;
                    });

                    function validateCompany(comp) {
                        var re = /([A-Za-z0-9\-\_]+)/g;
                        return re.test(comp);
                    }

                    var event = window.event;

                    var classNameCheckOnlyThis = 'checkOnlyThis';

                    function ___event_performValidation(errors, evt) {
                        jQuery('.validation_error').removeClass('validation_error');

                        // detect if it's an onSubmit event
                        var weAreInASubmitEvent = evt != undefined;

                        function checkIfIDIsInElementsToProcess(_string) {
                            return jQuery('#' + _string + '.' + classNameCheckOnlyThis).length != 0;
                        }

                        // clear all error messages to avoid duplicates
                        jQuery('.validation_error_message').remove();

                        if (errors.length > 0) {
                            for (var i = 0; i < errors.length; i++) {
                                if (weAreInASubmitEvent || checkIfIDIsInElementsToProcess(errors[i].id)) {
                                    var this_item = jQuery('#' + errors[i].id);

                                    this_item.addClass('validation_error');
                                    this_item.after('<div class="validation_error_message">' + errors[i].message + '</div>');
                                }
                            }

                            if (evt && evt.preventDefault) {
                                evt.preventDefault();
                            } else if (event) {
                                event.returnValue = false;
                            }
                        } else {
                            if (event) event.returnValue = true;
                        }
                    }

                    var allInputsOnPage = jQuery('.dr-form input, .dr-form textarea');

                    allInputsOnPage.on('focus', function (_event) {
                        _event.target.classList.add(classNameCheckOnlyThis);
                    });

                    allInputsOnPage.on('blur', function (_event) {
                        if (_event.target.classList.contains('validation_error')) return;
                        _event.target.classList.remove(classNameCheckOnlyThis);
                    });

                    allInputsOnPage.on('keyup blur', function (_e) {
                        validator._validateForm();
                    });
                });
            </script>
        </div>
    </div>
</div>
<?php get_template_part('end'); ?>
