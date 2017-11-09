<?php
/* Template Name: Test Drive */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="google-site-verification" content="d-L8sQWcqXG9U_ua4yroXJjGnte_X4EQaWOLHQ7aEMU"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo get_stylesheet_directory_uri() . '/assets/built/stylesheets/test-drive.css'; ?>">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:400,300,500|Noto+Sans:400,700">

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

	<?php wp_head(); ?>

	<?php
	$ac = get_field( 'ac_required' );
	$bl = get_field( 'benefits_list' );
	if ( get_field( 'form_name' ) ) {
		$form_name = get_field( 'form_name' );
	} else {
		$form_name = 'Datarobot-main';
	}
	if ( get_field( 'redirect_url' ) ) {
		$redirect = get_field( 'redirect_url' );
	} else {
		$redirect = '/thank-you';
	}
	?>

    <script>
        (function (h, o, t, j, a, r) {
            h.hj = h.hj || function () {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {hjid: 295062, hjsv: 5};
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, '//static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>
</head>
<body <?php body_class( 'test-drive' ); ?>>
<div class="wrapper">
    <header>
        <div class="container">
            <div id="logo">
                <a href="/" title="DataRobot Homepage">
                    <img src="<?= get_template_directory_uri(); ?>/assets/built/images/td/td-logo.svg"
                         alt="DataRobot Test Drive">
                </a>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="b-main">
                <div class="row-wrap">
                    <div class="b-left">
                        <h1><?php the_field( 'headline' ); ?></h1>
                        <p><?php the_field( 'description' ); ?></p>
                        <div class="img-wrap">
                            <img src="<?php the_field( 'main_image' ); ?>" alt="DataRobot Test Drive">
                        </div>
                    </div>
                    <div class="b-right">
                        <div class="td-form-wrap dr-form <?php if ( $ac ) { echo 'ac'; } ?>">
                            <div class="form-header">
                                <p><?php the_field( 'form_title' ); ?></p>
                                <a class="anchor" href="#form-errors" style="display:none;"></a>
                            </div>
                            <iframe name="hiddenframe" id="hiddenframe" frameborder="0" style="width:0;height:0;border:0;display:none;"></iframe>
                            <form method="post" name="<?php echo $form_name; ?>" id="td-form" target="hiddenframe">
                                <label>
                                    <input type="text" name="firstName" id="firstName" value=""
                                           class="field text is-empty" maxlength="40" placeholder="">
                                    <span><span>First Name</span></span>
                                </label>
                                <label>
                                    <input type="text" name="lastName" id="lastName" value=""
                                           class="field text is-empty" maxlength="40" placeholder="">
                                    <span><span>Last Name</span></span>
                                </label>
                                <label>
                                    <input type="text" name="emailAddress" id="emailAddress" value=""
                                           class="field text is-empty" maxlength="60" placeholder="">
                                    <span><span>Business email</span></span>
                                </label>
                                <label>
                                    <input type="text" name="busPhone" id="busPhone" value=""
                                           class="field text is-empty" maxlength="20" placeholder="(123) 456-7890">
                                    <span><span>Business phone</span></span>
                                </label>
                                <label>
                                    <input type="text" name="company" id="company" value="" class="field text is-empty"
                                           maxlength="60" placeholder="" autocomplete="off">
                                    <span><span>Company</span></span>
                                </label>
                                <label>
                                    <select name="title" id="title" class="select">
                                        <option value=""><?php _e( 'Role', 'datarobot3' ); ?></option>
                                        <option value="Actuary"><?php _e( 'Actuary', 'datarobot3' ); ?></option>
                                        <option value="Business Analyst"><?php _e( 'Business Analyst', 'datarobot3' ); ?></option>
                                        <option value="Executive"><?php _e( 'Executive', 'datarobot3' ); ?></option>
                                        <option value="Data scientist - Beginner"><?php _e( 'Data scientist - Beginner', 'datarobot3' ); ?></option>
                                        <option value="Data scientist - Expert"><?php _e( 'Data scientist - Expert', 'datarobot3' ); ?></option>
                                        <option value="Data scientist - Management"><?php _e( 'Data scientist - Management', 'datarobot3' ); ?></option>
                                        <option value="IT professional"><?php _e( 'IT professional', 'datarobot3' ); ?></option>
                                        <option value="Software Engineer"><?php _e( 'Software Engineer', 'datarobot3' ); ?></option>
                                        <option value="Other"><?php _e( 'Other', 'datarobot3' ); ?></option>
                                    </select>
                                </label>
                                <label>
                                    <select name="country" id="country" class="select" placeholder="<?php _e( 'Country', 'datarobot3' ); ?>">
                                        <option value=""><?php _e( 'Country', 'datarobot3' ); ?></option>
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
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory
                                        </option>
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
                                        <option value="Congo, The Democratic Republic of the">Congo, The Democratic
                                            Republic of
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
                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald
                                            Islands
                                        </option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)
                                        </option>
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
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic
                                            People's
                                            Republic of
                                        </option>
                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic
                                            Republic
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
                                        <option value="Micronesia, Federated States of">Micronesia, Federated States
                                            of
                                        </option>
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
                                        <option value="Palestinian Territory, Occupied">Palestinian Territory,
                                            Occupied
                                        </option>
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
                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the
                                            Grenadines
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
                                        <option value="South Georgia and the South Sandwich Islands">South Georgia and
                                            the South
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
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of
                                        </option>
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
                                        <option value="United States Minor Outlying Islands">United States Minor
                                            Outlying
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
                                <label>
                                    <select name="stateProv" id="stateProv" class="select" disabled>
                                        <option value=""><?php _e( 'State/Province', 'datarobot3' ); ?></option>
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
                                        <option value="Federated States Of Micronesia">Federated States Of Micronesia
                                        </option>
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

								<?php if ( $ac ) { ?>
                                    <label>
                                        <input type="text" name="accessCode" id="accessCode" value=""
                                               class="field text is-empty" maxlength="40" autocomplete="off">
                                        <span><span>Access Code</span></span>
                                    </label>
								<?php } ?>

                                <label class="checkbox">
                                    <input type="checkbox" name="agreementAccepted" id="agreementAccepted" value="1">
                                    <span>I agree to the <a href="<?php echo file_get_contents('testdrive-tos.txt', true); ?>" target="_blank">DataRobot Test Drive Terms of Service</a></span>
                                </label>

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

								<?php if ( get_field( 'is_sales' ) ) {
									echo '<input type="hidden" name="isSalesForm" value="1">';
								} ?>

								<?php if ( get_field( 'extra_hidden_fields' ) ) {
									the_field( 'extra_hidden_fields' );
								} ?>

                                <div class="preloader">
                                    <span class="dr-loader">
                                        <span class="loader">
                                            <svg width="36px" height="36px" viewBox="0 0 335 380">
                                                <defs><path id="path-1"
                                                            d="M0,0.207 L334.206,0.207 L334.206,378.94 L0,378.94 L0,0.207 Z"></path></defs><g
                                                        id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd"><g id="datarobot-robot-monochrome"><g
                                                                id="Clip-2"></g><path
                                                                d="M310.55,180.463 C310.55,198.609 295.703,213.456 277.557,213.456 L56.649,213.456 C38.503,213.456 23.656,198.609 23.656,180.463 L23.656,48.488 C23.656,30.342 38.503,15.495 56.649,15.495 L277.557,15.495 C295.703,15.495 310.55,30.342 310.55,48.488 L310.55,180.463 L310.55,180.463 Z M322.565,69.944 L321.301,69.737 L321.301,41.448 C321.301,18.765 302.743,0.207 280.061,0.207 L54.145,0.207 C31.463,0.207 12.904,18.765 12.904,41.448 L12.904,69.737 L11.641,69.944 C5.113,71.014 0,77.034 0,83.649 L0,129.735 C0,136.35 5.113,142.37 11.641,143.44 L12.904,143.647 L12.904,189.961 C12.904,212.643 31.463,231.202 54.145,231.202 L118.658,231.202 L118.658,242.11 L113.082,242.11 L92.814,250.28 L92.814,253.277 L85.205,253.277 L85.205,261.246 C69.503,262.062 56.978,275.093 56.978,290.995 L56.978,300.038 L53.928,300.038 C50.17,303.796 48.063,305.903 44.306,309.661 L44.306,336.213 L53.928,345.836 L74.089,345.836 L78.213,341.712 L78.213,328.095 L86.148,328.129 L86.148,306.193 C86.148,302.794 83.392,300.038 79.993,300.038 L76.224,300.038 L76.224,290.995 C76.224,285.713 80.131,281.339 85.205,280.579 L85.205,291.222 L93.963,291.222 L93.963,323.119 L104.572,335.156 L104.572,351.651 C96.421,351.651 87.492,352.422 75.788,362.503 L75.788,379 L162.234,379 L162.234,346.794 L172.798,346.794 L172.798,379 L259.245,379 L259.245,362.503 C247.542,352.422 238.612,351.651 230.461,351.651 L230.461,335.156 L241.507,323.119 L241.507,291.222 L249.828,291.222 L249.828,280.551 C254.994,281.228 258.998,285.648 258.998,290.995 L258.998,300.038 L255.229,300.038 C251.83,300.038 249.074,302.794 249.074,306.193 L249.074,328.129 L257.009,328.095 L257.009,341.712 L261.133,345.836 L281.294,345.836 C285.052,342.078 287.159,339.971 290.916,336.213 L290.916,309.661 L281.294,300.038 L278.244,300.038 L278.244,290.995 C278.244,275.029 265.618,261.961 249.828,261.24 L249.828,253.277 L242.218,253.277 L242.218,250.28 L221.951,242.11 L216.374,242.11 L216.374,231.202 L280.061,231.202 C302.743,231.202 321.301,212.643 321.301,189.961 L321.301,143.647 L322.565,143.44 C329.093,142.37 334.206,136.35 334.206,129.735 L334.206,83.65 C334.206,77.035 329.093,71.015 322.565,69.944 L322.565,69.944 Z M113.084,99.062 C104.41,99.062 97.378,109.525 97.378,122.432 C97.378,135.338 104.41,145.801 113.084,145.801 C121.759,145.801 128.791,135.338 128.791,122.432 C128.791,109.525 121.759,99.062 113.084,99.062 L113.084,99.062 Z M221.122,99.062 C212.447,99.062 205.415,109.525 205.415,122.432 C205.415,135.338 212.447,145.801 221.122,145.801 C229.796,145.801 236.828,135.338 236.828,122.432 C236.828,109.525 229.796,99.062 221.122,99.062 L221.122,99.062 Z"
                                                                id="Fill-1" fill="#BECDD9"
                                                                mask="url(#mask-2)"></path></g></g>
                                            </svg>
                                            <span class="loader-inner"></span>
                                        </span>
                                    </span>
                                </div>

                                <div id="error-wrap">
                                    <div id="form-errors" class="shake" role="alert"></div>
                                </div>

                                <button type="submit"
                                        class="button bg-filled-green" disabled><?php the_field( 'submit_button_text' ); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php if ( $bl ) { ?>
            <div class="b-conditions">
                <div class="container">
                    <div class="row-wrap">
						<?php foreach ( $bl as $item ) { ?>
                            <div class="item">
                                <div class="img-wrap">
                                    <i class="icon-check"></i>
                                </div>
                                <p><?php echo $item['benefit']; ?></p>
                            </div>
						<?php } ?>
                    </div>
                </div>
            </div>
		<?php } ?>
    </section>

    <footer>
        <div class="container">
            <div class="row-wrap">
                <div class="copyright">
                    <img src="<?= get_template_directory_uri(); ?>/assets/built/images/td/logo-sm.png" alt="DataRobot">
                    <span>DataRobot, Inc. © 2012</span>
                </div>
                <div class="bpf">
                    Better predictions. Faster.
                </div>
            </div>
        </div>
    </footer>

	<?php wp_footer(); ?>

    <script type="text/javascript">
        jQuery('label:has(select)').addClass('dropdown-parent');

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
            jQuery('#error-wrap').hide();
            jQuery('#form-errors').text('');
            jQuery('.dr-form button').prop("disabled", true);
            jQuery('.dr-form .preloader').fadeIn(150);
        }

        function transmission_stop() {
            jQuery('.dr-form button').prop("disabled", false);
            jQuery('.dr-form .preloader').hide();
        }

        function transmission_done() {
            jQuery('.dr-form .preloader').hide();
            window.location.href = '<?php echo $redirect; ?>';
        }

        function submitToSF() {
            var sfReq = jQuery.ajax({
                url: "https://fbnddub87j.execute-api.us-east-1.amazonaws.com/production/forms",
                type: "POST",
                headers: {
                    "Accept": "application/json; charset=utf-8",
                    "Content-Type": "application/json; charset=utf-8"
                },
                data: objectifyForm(jQuery('#td-form').serializeArray()),
                dataType: "json",
                beforeSend: transmission_start(),
                error: function (jqXHR) {
                    console.log("Response status code: " + jqXHR.status);
                    if (jqXHR.status === 422) {
                        jQuery.each(jqXHR.responseJSON.message, function (i, val) {
                            jQuery('#' + i).addClass('validation_error');
                            jQuery('#form-errors').text(val);
                            jQuery('#error-wrap').fadeIn(150);
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
                data: objectifyForm(jQuery('#td-form').serializeArray()),
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
                data: jQuery('#td-form').serialize(),
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
            return elqReq;
        }

        jQuery(document).ready(function ($) {
            $('.dr-form #submittedOnUrl').val(window.location.href);

            $('.scroll-to').on('click', function (e) {
                e.preventDefault();
                var scrollTarget = $('.dr-form').offset().top - 10;
                $('body,html').animate({
                        scrollTop: scrollTarget,
                    }, 300
                );
            });

            $('input[name="company"]').autoComplete({
                minChars: 1,
                source: function (term, response) {
                    $.getJSON('https://autocomplete.clearbit.com/v1/companies/suggest', {query: term}, function (data) {
                        response(data);
                    });
                },
                renderItem: function (item, search) {
                    default_logo = 'https://s3.amazonaws.com/clearbit-blog/images/company_autocomplete_api/unknown.gif'

                    if (item.logo == null) {
                        logo = default_logo
                    } else {
                        logo = item.logo + '?size=30x30'
                    }

                    container = '<div class="autocomplete-suggestion" data-name="' + item.name + '" data-domain="' + item.domain + '"data-val="' + search + '">'
                    container += '<span class="icon"><img align="center" src="' + logo + '" onerror="this.src=\'' + default_logo + '\'"></span> '
                    container += item.name + '<span class="domain">' + item.domain + '</span></div>';
                    return container
                },
                onSelect: function (e, term, item) {
                    $('input[name="company"]').val(item.data('name'));
                    $('input[name="website"]').val(item.data('domain'));
                },
            });

            $('select').change(function () {
                $(this).css('color', '#465275');
            });

            $('#country').change(function () {
                if ($(this).val() === "United States" || $(this).val() === "Canada") {
                    $('#stateProv').prop('disabled', false);
                } else {
                    $('#stateProv').val('').prop('disabled', true);
                }
            });

            $('input').focus(function () {
                $(this).addClass('is-focused');
            });

            $('input').blur(function () {
                $(this).removeClass('is-focused');
            });

            $('input').on('keyup change', function () {
                if ($(this).val()) {
                    $(this).removeClass('is-empty');
                } else {
                    $(this).addClass('is-empty');
                }
                if ($('.dr-form #agreementAccepted').prop("checked") == false) {
                    $('.dr-form button[type="submit"]').prop("disabled", true);
                } else {
                    $('.dr-form button[type="submit"]').prop("disabled", false);
                }
            });

            $('.dr-form form').submit(function (event) {
                event.preventDefault();

                if ($('.dr-form #stateProv').prop('disabled') === false && $('.dr-form #stateProv').val() == "") {
                    $('.dr-form #stateProv').addClass('validation_error');
                    $('.dr-form #stateProv').focus(function () {
                        $(this).removeClass('validation_error');
                    });
                };

                $('.dr-form select').each(function () {
                    if ($(this).prop('disabled') === false && $(this).val() == "") {
                        $(this).addClass('validation_error');
                        $(this).focus(function () {
                            $(this).removeClass('validation_error');
                        });
                    }
                });

                $('.dr-form input[type="text"]').each(function () {
                    if ($(this).val() == "") {
                        $(this).addClass("validation_error");
                        $(this).focus(function () {
                            $(this).removeClass('validation_error');
                        });
                    }
                });

                var error_fields = jQuery(this).find(".validation_error");

                if (error_fields.length > 0) {
                    event.preventDefault();

                    jQuery('#form-errors').text('Please fill in all required fields');
                    jQuery('#error-wrap').fadeIn(150);

                    return;
                }

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
                rules: 'required|valid_email|callback_valid_be'
            }, {
                name: 'busPhone',
                rules: 'required|min_length[5]'
            }, {
                name: 'company',
                rules: 'required|callback_valid_c_name'
            }, {
                name: 'title',
                rules: 'required'
            }, {
                name: 'country',
                rules: 'required'
            }], ___event_performValidation);

            validator.registerCallback('valid_be', function (value) {
                if (validateBusinessEmail(value)) {
                    return true;
                }
                return false;
            });
            validator.registerCallback('valid_c_name', function (value) {
                if (validateCompany(value)) {
                    return true;
                }
                return false;
            });

            function validateBusinessEmail(email) {
                var domain = email.substring(email.lastIndexOf("@") +1);
                var domainStack = <?php echo get_email_domains(); ?>;
                if (domain) {
                  if (domainStack.indexOf(domain) > -1) {
                    jQuery('#form-errors').text('Please provide a correct business email address');
                    jQuery('#error-wrap').fadeIn(150);
                  }
                }
                
                return (domainStack.indexOf(domain) < 0);
            }

            function validateCompany(comp) {
                var re = /([A-Za-z0-9\-\_]+)/g;
                return re.test(comp);
            }

            var event = window.event;

            var classNameCheckOnlyThis = 'checkOnlyThis';

            function ___event_performValidation(errors, evt) {
                jQuery('.validation_error:not(#stateProv)').removeClass('validation_error');

                // jQuery('#form-errors').text('');
                // jQuery('#error-wrap').fadeOut(150);

                // detect if it's an onSubmit event
                var weAreInASubmitEvent = evt != undefined;

                function checkIfIDIsInElementsToProcess(_string) {
                    return jQuery('#' + _string + '.' + classNameCheckOnlyThis).length != 0;
                }

                if (errors.length > 0) {
                    for (var i = 0; i < errors.length; i++) {
                        if (weAreInASubmitEvent || checkIfIDIsInElementsToProcess(errors[i].id)) {
                            var this_item = jQuery('#' + errors[i].id);

                            this_item.addClass('validation_error');
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

            var allInputsOnPage = jQuery('.dr-form input, .dr-form select');

            allInputsOnPage.on('focus', function (_event) {
                _event.target.classList.add(classNameCheckOnlyThis);
            });

            allInputsOnPage.on('blur', function (_event) {
                if (_event.target.classList.contains('validation_error')) return;
                _event.target.classList.remove(classNameCheckOnlyThis);
            });

            allInputsOnPage.on('keyup blur change', function (_e) {
                validator._validateForm();
            });

        });
    </script>

</div>

<?php get_template_part( 'end' ); ?>
