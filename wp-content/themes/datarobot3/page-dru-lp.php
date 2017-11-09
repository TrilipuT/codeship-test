<?php
/* Template Name: DRU LP */
?>

<?php get_header('guide'); ?>

<?php
$redirect = get_field('redirect_url');
if (!$redirect) {
  $redirect = 'https://www.datarobot.com/thank-you';
}
?>

<section class="dru">
	<div class="top-block">
		<div class="container">
			<div class="wrap">
				<h1><?php the_field('banner_title'); ?></h1>
				<p><?php the_field('banner_text'); ?></p>
			</div>
		</div>
	</div>
	<div class="main-block">
		<div class="container">
			<article class="lp-info">
				<div class="b-info clearfix">
					<div class="event-details">
						<h2>Event Details</h2>
						<p><?php the_field('event_details'); ?></p>
					</div>
					<div class="main-content">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="b-form">
					<div class="dr-form form-blue">
						<iframe name="hiddenframe" id="hiddenframe" frameborder="0" style="width:0;height:0;border:0;display:none;"></iframe>
						<form method="post" name="<?php the_field('form_name'); ?>" action="https://s2142644770.t.eloqua.com/e/f2" target="hiddenframe" id="elqForm">
	            			<input type="text" name="firstName" id="firstName" value="" class="text" maxlength="40" placeholder="First Name">
							<input type="text" name="lastName" id="lastName" value="" class="text" maxlength="40" placeholder="Last Name">
							<input type="text" name="emailAddress" id="emailAddress" value="" class="text" maxlength="40" placeholder="Business email">

							<?php if(get_field('phone_number')){
								echo '<input type="text" name="busPhone" id="busPhone" value="" class="text" maxlength="40" placeholder="Phone">';
							} ?>

							<input type="text" name="company" id="company" value="" class="text" maxlength="40" placeholder="Company">
							<input type="text" name="title" id="title" value="" class="text" maxlength="40" placeholder="Title">

							<input type="hidden" name="submittedOnUrl" id="submittedOnUrl" value="">
							<input type="hidden" name="formName" value="<?php the_field('form_name'); ?>">
							<input type="hidden" name="elqFormName" value="<?php the_field('form_name'); ?>">
							<input type="hidden" name="elqSiteID" value="2142644770">
							<input type="hidden" name="elqCustomerGUID" value="">
							<input type="hidden" name="elqCampaignId" value="<?php the_field('eloqua_campaign_id'); ?>">
							<input type="hidden" name="campaignName" value="">
							<input type="hidden" name="campaignSource" value="">
							<input type="hidden" name="campaignMedium" value="">
							<input type="hidden" name="campaignContent" value="">
							<input type="hidden" name="campaignTerms" value="">

							<?php if(get_field('form_button_text')) {
								$button = get_field('form_button_text');
							} else {
								$button = 'Submit';
							} ?>

							<input type="submit" value="<?php echo $button; ?>" class="submit bg-filled-blue button">
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

                            jQuery(document).ready(function () {
                                jQuery('.dr-form #submittedOnUrl').val(window.location.href);

                                jQuery('select').change(function () {
                                    jQuery(this).css('color', '#424242');
                                });

                                jQuery('.dr-form').submit(function (event) {
                                    if (jQuery('.dr-form #state').prop('disabled') === false && jQuery('.dr-form #state').val() == "") {
                                        event.preventDefault();
                                        jQuery('.dr-form #state').addClass('validation_error');
                                        jQuery('.dr-form #state').focus(function () {
                                            jQuery(this).removeClass('validation_error');
                                        });
                                    }
                                    ;

                                    jQuery('#address1, #city, #zipPostal, #payment').each(function () {
                                        if (jQuery(this).val() == "") {
                                            jQuery(this).addClass("validation_error");
                                        }
                                    });

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
                                    name: 'busPhone',
                                    rules: 'required|min_length[5]'
                                }, {
                                    name: 'title',
                                    rules: 'required'
                                }, {
                                    name: 'company',
                                    rules: 'required|min_length[2]|callback_valid_c_name'
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
			</article>
		</div>
	</div>
</section>
<?php get_footer('guide'); ?>
