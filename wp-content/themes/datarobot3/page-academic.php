<?php
/* Template Name: DR Academic */
?>

<?php get_header('guide'); ?>

<?php
$image = get_field('benefits_image');
$redirect = get_field('redirect_url');
if (!$redirect) {
  $redirect = 'https://www.datarobot.com/thank-you';
}
$pixel = get_field('tracking_code');
$utm_param = get_field('utm_parameters');
?>

<section class="landing" style="color: rgb(255, 255, 255);">
    <div class="container">
        <div class="lp-left">
            <div class="e-upper">
                <h1><?php the_field('headline'); ?></h1>
                <p><?php the_field('description'); ?></p>
            </div>
            <div class="e-mobile-button">
                <a href="#" class="scroll-to bg-filled-orange button"><?php the_field('form_button_text'); ?></a>
            </div>
            <div class="e-bottom image">
                <div class="media">
                    <img src="<?php echo $image["url"]; ?>" width="<?php echo($image["width"] / 2); ?>" alt="Why DataRobot?">
                </div>
                <div class="details">
                    <h3><?php the_field('benefits_headline'); ?></h3>
                    <ul>
                        <?php while (have_rows('benefits_list')): the_row(); ?>
                            <li><?php the_sub_field('benefit'); ?></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="lp-right">
            <div class="b-form">
                <div class="dr-form form-orange">
                    <iframe name="hiddenframe" id="hiddenframe" frameborder="0" style="width:0;height:0;border:0;display:none;"></iframe>
                    <form method="post" name="<?php the_field('form_name'); ?>" action="https://s2142644770.t.eloqua.com/e/f2" target="hiddenframe" id="elqForm">
                        <input type="text" name="firstName" id="firstName" value="" class="text" maxlength="40" placeholder="First Name">
                        <input type="text" name="lastName" id="lastName" value="" class="text" maxlength="40" placeholder="Last Name">
                        <input type="text" name="company" id="company" value="" class="text school-field" maxlength="255" placeholder="School name" autocomplete="off">
                        <input type="text" name="emailAddress" id="emailAddress" value="" class="text" maxlength="40" placeholder="School Email (.edu)">
                        <input type="text" name="accessCode" id="accessCode" value="" class="text" maxlength="40" placeholder="Access Code">

                        <label class="checkbox">
                            <input type="checkbox" name="agreementAccepted" id="agreementAccepted" value="1">
                            <span>I agree to the <a href="<?php echo file_get_contents('academic-tos.txt', true); ?>" target="_blank">DataRobot Academic Terms of Service</a></span>
                        </label>

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

                        <?php if (get_field('is_sales')) {
                          echo '<input type="hidden" name="isSalesForm" value="1">';
                        } ?>

                        <?php if (get_field('extra_hidden_fields')) {
                          the_field('extra_hidden_fields');
                        } ?>

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

                        <input type="submit" value="<?php the_field('submit_button_text'); ?>" class="submit bg-filled-orange button" disabled>
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
                        function objectifyForm(formArray) {
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
                            // console.log( "Redirect" );
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
                                beforeSend: transmission_start(),
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

                        // jQuery(document).ajaxError(function( event, request, settings ) {
                        //   Raven.captureException(new Error(JSON.stringify(request)));
                        // });

                        jQuery(document).ready(function ($) {
                            var fieldValues = false;
                            var error_fields_array = [];
                            $('.dr-form #submittedOnUrl').val(window.location.href);

                            $('.scroll-to').on('click', function (e) {
                                e.preventDefault();
                                var scrollTarget = $('.dr-form').offset().top - 10;
                                $('body,html').animate({
                                        scrollTop: scrollTarget,
                                    }, 300
                                );
                            });

                            $('select').change(function () {
                                $(this).css('color', '#424242');
                            });

                            $('.dr-form input').on('keyup change', function () {
                                error_fields_array.length = 0;
                                $('.dr-form input[type="text"]').each(function () {
                                    if ($(this).val() == "") {
                                        error_fields_array.push($(this));
                                    }
                                });

                                if ($('.dr-form #accessCode').val().indexOf(' ') >= 0) {
                                    error_fields_array.push($('.dr-form #accessCode'));
                                    $('.dr-form input[type="submit"]').prop("disabled", true);
                                }

                                if ($('.dr-form #agreementAccepted').prop("checked") == false) {
                                    error_fields_array.push($('.dr-form #agreementAccepted'));
                                    $('.dr-form input[type="submit"]').prop("disabled", true);
                                }

                                if (error_fields_array.length == 0) {
                                    $('.dr-form input[type="submit"]').prop("disabled", false);
                                } else {
                                    $('.dr-form input[type="submit"]').prop("disabled", true);
                                }
                                ;
                            });

                            $('.dr-form form').submit(function (event) {
                                event.preventDefault();

                                $('.dr-form select').each(function () {
                                    if ($(this).prop('disabled') === false && $(this).val() == "") {
                                        event.preventDefault();
                                        $(this).addClass('validation_error');
                                        $(this).focus(function () {
                                            $(this).removeClass('validation_error');
                                        });
                                    }
                                });

                                $('.dr-form input[type="text"]').each(function () {
                                    if ($(this).val() == "") {
                                        $(this).addClass("validation_error");
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

                                submitToSF();
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
                                name: 'accessCode',
                                rules: 'required|alpha_numeric'
                            }, {
                                name: 'agreementAccepted',
                                rules: 'required'
                            }], ___event_performValidation);

                            validator.registerCallback('valid_edu', function (value) {
                                if (validateEdu(value)) {
                                    return true;
                                }
                                return false;
                            });

                            function validateEdu(email) {
                                var re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.+-]+\.edu$/g;
                                return re.test(email);
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
                                            //this_item.after('<div class="validation_error_message">' + errors[i].message + '</div>');
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

                            allInputsOnPage.on('keyup blur change', function (_e) {
                                validator._validateForm();
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if ($pixel) {
  if ($utm_param) {
    foreach ($utm_param as $item) {
      $utm_param_assoc[$item['param']] = $item['value'];
    }
    if (comp_arrays($utm_param_assoc, $_GET)) {
      echo $pixel;
    }
  } else {
    echo $pixel;
  }
} ?>

<?php get_footer(); ?>

<?php get_template_part('end'); ?>
