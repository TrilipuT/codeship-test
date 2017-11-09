<?php
/* Template Name: Partners page */
?>

<?php get_header(); ?>
<section class="partners <?php the_field('class')?>">
	<div class="top-banner" style="background-image: url(<?php the_field('banner_image'); ?>)">
		<div class="container clearfix">
			<div class="single-col">
				<h1><?php the_field('banner_title'); ?></h1>
				<p><?php the_field('banner_text'); ?></p>
				<a href="#" class="contact-popup bg-filled-blue button"><?php _e('Become a partner', 'datarobot3'); ?></a>
			</div>
		</div>
	</div>
	<div class="page-content">
		<div class="container">
			<?php $fp = get_field('partners'); ?>
			<?php if($fp){ ?>
				<div class="featured-p">
					<?php if ( get_field('class') !== 'technology') : ?>
						<h2>Featured Partners</h2>
					<?php endif; ?>
					<div class="item-wrap">
						<?php foreach ($fp as $item) {
							$image = $item['logo']; ?>

							<div class="item">
								<div class="logo">
									<img src="<?php echo $image['url']; ?>" width="<?php echo($image['width'] / 2); ?>" alt="DataRobot Partner">
								</div>
								<div class="description">
									<p><?php echo $item['description']; ?></p>
								</div>
								<?php if ($item['link_type']) : ?>
									<?php if( $item['link_type'] == 'link' ) : ?>
									<?php if ($item['link']) : ?>
										<a href="<?= $item['link']; ?>">
											<i class="icon-circle-right"></i>
											<span><?php _e('Learn more', 'datarobot3'); ?></span>
										</a>
									<?php endif; ?>
										<?php  elseif( $item['link_type'] == 'external' ) : ?>
									<?php if ($item['external']) : ?>
										<a href="<?= $item['external']; ?>" target="_blank">
											<i class="icon-circle-right"></i>
											<span><?php _e('Learn more', 'datarobot3'); ?></span>
										</a>
									<?php endif; ?>
									<?php endif; ?>
								<?php endif; ?>
							</div>

						<?php } ?>
					</div>
				</div>
			<?php } ?>

			<?php if ( get_field('class') !== 'technology') : ?>
			<?php $pp = get_field('programs'); ?>
			<?php if($pp){ ?>
				<div class="p-programms">
					<h2>Which is the right partner program for you?</h2>
					<div class="item-wrap">
						<?php foreach ($pp as $item) { ?>

							<div class="item">
								<h3><?php echo $item['title']; ?></h3>
								<p><?php echo $item['text']; ?></p>
								<?php if ($item['programms_link']) : ?>
									<a href="<?= $item['programms_link']; ?>">
										<i class="icon-circle-right"></i>
										<span><?php _e('Learn more', 'datarobot3'); ?></span>
									</a>
								<?php endif; ?>
							</div>

						<?php } ?>
					</div>
				</div>
			<?php } ?>

			<?php $pe = get_field('f_post'); ?>
			<?php if($pe){ ?>
				<div class="p-ecosystem">
					<h2>What's happening in the DataRobot partner ecosystem</h2>
					<div class="item-wrap clearfix">
						<div class="featured-post">
							<?php
							$post = $pe;
							setup_postdata( $post );
							?>
							<article class="f-post-item">
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
	                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	                <div class="meta">
	                  <span><?php the_time('M j, Y'); ?></span>
										<a href="<?php the_permalink(); ?>" class="sm-filled-blue button"><span><?php _e('Read more', 'datarobot3'); ?></span><i class="icon-chevron-right"></i></a>
	                </div>
	              </div>
	            </article>
							<?php wp_reset_postdata(); ?>
						</div>

						<?php $rp = get_field('r_posts'); ?>
						<?php	if ($rp){ ?>
							<div class="related-posts">
								<?php foreach ($rp as $post){ setup_postdata( $post ); ?>
										<article class="r-post-item">
											<a href="<?php the_permalink(); ?>" class="transition"><?php the_title(); ?></a>
											<div class="meta">
												<i class="icon-calendar"></i>
												<span><?php the_time('M j, Y'); ?></span>
											</div>
										</article>
								<?php } ?>
								<?php wp_reset_postdata(); ?>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="get-in-touch">
			<div class="container">
					<div class="button-wrap">
							<p><?php _e('Want to become a DataRobot partner?', 'datarobot3'); ?></p>
							<a href="#" class="contact-popup bg-filled-white button"><?php _e('Contact Us', 'datarobot3'); ?></a>
					</div>
			</div>
	</div>
</section>
<?php get_footer(); ?>
<div class="popup transition">
	<div class="form-wrap">
		<div class="popup-close transition">
			<i class="icon-close"></i>
		</div>
		<div class="form-title">
			<h3></h3>
		</div>
		<div class="dr-form contact-form">
			<iframe name="hiddenframe" id="hiddenframe" frameborder="0" style="width:0;height:0;border:0;display:none;"></iframe>
			<form method="post" name="<?php the_field('form_name'); ?>" action="https://s2142644770.t.eloqua.com/e/f2" target="hiddenframe" id="elqForm">
				<div class="form-section">
					<div class="form-main">
            <input type="text" name="firstName" id="firstName" value="" class="text first" maxlength="40" placeholder="First Name">
						<input type="text" name="lastName" id="lastName" value="" class="text last" maxlength="40" placeholder="Last Name">
						<input type="text" name="emailAddress" id="emailAddress" value="" class="text first" maxlength="40" placeholder="Business email">
						<input type="text" name="busPhone" id="busPhone" value="" class="text last" maxlength="40" placeholder="Phone">
						<input type="text" name="company" id="company" value="" class="text fullrow" maxlength="40" placeholder="Company">
						<input type="text" name="address" id="address" value="" class="text fullrow" placeholder="Address">
						<input type="hidden" name="website" id="website" value="">

						<label class="fullrow">
							<select name="inBusiness" id="inBusiness" class="select">
								<option value="">How long has your company been in business?</option>
								<option value="Less than 1 year">Less than 1 year</option>
								<option value="1-4 years">1-4 years</option>
								<option value="5-10 years">5-10 years</option>
								<option value="Greater than 10 years">Greater than 10 years</option>
							</select>
						</label>

						<label class="fullrow">
							<select name="numberOfEmployees" id="numberOfEmployees" class="select">
								<option value="">Number of Employees</option>
								<option value="1">1-10</option>
	              <option value="11">11-50</option>
	              <option value="51">51-200</option>
	              <option value="201">201-500</option>
	              <option value="501">501-1000</option>
	              <option value="1001">1001-5000</option>
	              <option value="5001">5001-10,000</option>
	              <option value="10,000">10,001+</option>
							</select>
						</label>

						<label class="fullrow">
							<select name="employeesAnalytics" id="employeesAnalytics" class="select">
								<option value="">How many of your employees focus on analytics?</option>
								<option value="Less than 5">Less than 5</option>
	              <option value="6-10">6-10</option>
	              <option value="11-25">11-25</option>
	              <option value="26-50">26-50</option>
	              <option value="More than 50">More than 50</option>
							</select>
						</label>

						<label class="fullrow">
			        <select name="geography" id="geography" class="select">
								<option value="">Which geography does your company primarily operate in?</option>
								<option value="Global">Global</option>
								<option value="APAC">APAC</option>
								<option value="EMEA">EMEA</option>
								<option value="North America">North America</option>
							</select>
						</label>
						<div class="checkboxes fullrow">
							<span>Which of the following are you interested in?</span>
							<label class="field-wrap">
								<input name="checkboxes" type="checkbox" value="I am interested in reselling DataRobot" class="checkbox"  id="1"/>
								I am interested in reselling DataRobot
							</label>
							<label class="field-wrap">
								<input name="checkboxes" type="checkbox" value="I am interested in using DataRobot in my consulting services" class="checkbox"  id="2"/>
								I am interested in using DataRobot in my consulting services
							</label>
							<label class="field-wrap">
								<input name="checkboxes" type="checkbox" value="I am interested in integrating my software product with DataRobot" class="checkbox"  id="3"/>
								I am interested in integrating my software product with DataRobot
							</label>
							<label class="field-wrap">
								<input name="checkboxes" type="checkbox" value="I want to embed DataRobot into my software product or solution" class="checkbox"  id="4"/>
								I want to embed DataRobot into my software product or solution
							</label>
						</div>
					</div>

					<div class="form-extra-wrap">
						<textarea name="partnersInterest" id="partnersInterest" class="fullrow" rows="6" placeholder="Briefly describe why you are interested in becoming a DataRobot partner?"></textarea>
					</div>
				</div>

				<div class="form-footer clearfix">
          <input type="hidden" name="submittedOnUrl" id="submittedOnUrl" value="">
					<input type="hidden" name="formName" value="<?php the_field('form_name'); ?>">
          <input type="hidden" name="elqFormName" value="<?php the_field('form_name'); ?>">
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

					<input type="submit" value="Submit" class="submit bg-filled-blue button">
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
                    		document.forms["<?php the_field('form_name'); ?>"].elements["elqCustomerGUID"].value = GetElqCustomerGUID();
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
                function objectifyForm(formArray) {//serialize data function

                    var rArray = {};
                    for (var i = 0; i < formArray.length; i++) {
                        if (typeof rArray[formArray[i]['name']] === 'undefined') {
                            rArray[formArray[i]['name']] = formArray[i]['value'];
                        }
                        else {
                            rArray[formArray[i]['name']] += '; ' + formArray[i]['value'];
                        }
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
                    window.location.href = 'https://www.datarobot.com/thank-you/';
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
                    return elqReq;
                }

                jQuery(document).ready(function ($) {

                    $('.contact-popup').click(function (e) {
                        e.preventDefault();
                        if ($(window).width() < 720) {
                            $('.wrapper').hide();
                            $(window).scrollTop(75);
                        } else if ($(window).width() >= 720 && $(window).width() <= 1023) {
                            $('.wrapper').height($(window).height()).css("overflow", "hidden");
                        } else {
                            $('.wrapper').height($(window).height() - 75).css("overflow", "hidden");
                            $(window).scrollTop(0);
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

                    $('select').change(function () {
                        $(this).css('color', '#000');
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
                        if ($('.dr-form #partnersInterest').val() == "") {
                            event.preventDefault();
                            $('.dr-form #partnersInterest').addClass('validation_error');
                            $('.dr-form #partnersInterest').change(function () {
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

                        identifyForm({
                            rawAddress: "address",
                            website: "website",
                            businessAge: "inBusiness",
                            numberOfEmployees: "numberOfEmployees",
                            totalAnalyticEmployees: "employeesAnalytics",
                            businessGeo: "geography"
                        });

                        submitToEloqua();
                    });


                    var validator = new FormValidator('<?php the_field( 'form_name' ); ?>', [{
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
