<div class="newsletter-block">
    <div class="container">
      <div class="newsletter-wrap">
        <div class="image-wrap">
          <img src="<?= get_template_directory_uri(); ?>/assets/built/images/newsletter-img.png" alt="Newsletter Subscription" class="full-image">
          <img src="<?= get_template_directory_uri(); ?>/assets/built/images/newsletter-img-medium.png" alt="Newsletter Subscription" class="medium-image">
        </div>
        <div class="n-form-wrap">
          <div class="n-form-inner-wrap">
            <span>Doing Data Science?</span>
            <p>Get our regular data science news, insights, tutorials and more!</p>
            <div class="dr-form newsletter-form">
                <?php
                $form_name = 'Newsletter';
                ?>
                <form method="post" name="<?php echo $form_name; ?>" action="https://s2142644770.t.eloqua.com/e/f2">
                    <input type="text" name="firstName" id="firstName" value="" class="text first" maxlength="40" placeholder="First Name">
                    <input type="text" name="lastName" id="lastName" value="" class="text last" maxlength="40" placeholder="Last Name">
                    <input type="text" name="company" id="company" value="" class="text fullrow" maxlength="40" placeholder="Company">
                    <input type="text" name="emailAddress" id="emailAddress" value="" class="text transition fullrow" maxlength="60" placeholder="Email address">
                    <input type="hidden" name="submittedOnUrl" id="submittedOnUrl" value="">
                    <input type="hidden" name="formName" value="<?php echo $form_name; ?>">
                    <input type="hidden" name="elqFormName" value="<?php echo $form_name; ?>">
                    <input type="hidden" name="elqSiteID" value="2142644770">
                    <input type="hidden" name="elqCustomerGUID" value="">
                    <button type="submit" class="submit bg-filled-blue button">
                      <span>
                        <i class="icon-email"></i>
                        <?php _e('Subscribe', 'datarobot3'); ?>
                      </span>
                    </button>
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
                    jQuery(document).ready(function () {

                      function objectifyForm(formArray) {//serialize data function

          							var rArray = {};
          							for (var i = 0; i < formArray.length; i++){
          								rArray[formArray[i]['name']] = formArray[i]['value'];
          							}
          							var rJSON = JSON.stringify(rArray);
          							console.log(rJSON);
          							return rJSON;
          						}

                        jQuery('.dr-form #submittedOnUrl').val(window.location.href);

                        function validateEmail(email) {
                            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                            return re.test(email);
                        }

                        function validateCompany(comp) {
                            var re = /([A-Za-z0-9\-\_]+)/g;
                            return re.test(comp);
                        }


                        jQuery('.newsletter-block form').submit(function (event) {
                            if (jQuery('.dr-form #firstName').val() == "") {
                                event.preventDefault();
                                jQuery('.dr-form #firstName').addClass('validation_error');
                                jQuery('.dr-form #firstName').focus(function () {
                                    jQuery(this).removeClass('validation_error');
                                });
                            };

                            if (jQuery('.dr-form #lastName').val() == "") {
                                event.preventDefault();
                                jQuery('.dr-form #lastName').addClass('validation_error');
                                jQuery('.dr-form #lastName').focus(function () {
                                    jQuery(this).removeClass('validation_error');
                                });
                            };

                            var comp = jQuery(".dr-form #company").val();

                            if (validateCompany(comp) === false) {
                                event.preventDefault();
                                jQuery('.dr-form #company').addClass('validation_error');
                                jQuery('.dr-form #company').focus(function () {
                                    jQuery(this).removeClass('validation_error');
                                });
                            };

                            var email = jQuery(".dr-form #emailAddress").val();

                            if (validateEmail(email) === false) {
                                event.preventDefault();
                                jQuery('.dr-form #emailAddress').addClass('validation_error');
                                jQuery('.dr-form #emailAddress').focus(function () {
                                    jQuery(this).removeClass('validation_error');
                                });
                            };

                            var error_fields = jQuery(this).find(".validation_error");

                            if (error_fields.length > 0) {
                                event.preventDefault();
                                return;
                            };

                            identifyForm();

                            event.preventDefault();

                            jQuery('.n-form-inner-wrap').hide();
                            jQuery('.n-success-wrap').show();

                            var message = "<span>You’ve just successfully subscribed</span><p>Thanks! Check your inbox to confirm your subscription.</p>";
                            var formData = jQuery('.dr-form form').serialize();

                            jQuery.ajax({
                                type: 'POST',
                                url: 'https://s2142644770.t.eloqua.com/e/f2',
                                data: formData,
                                encode: true
                              })
                              .done(function(message) {
                                jQuery('.n-message-wrap').html('<span class="success">You’ve just successfully subscribed</span><p>Thanks! Check your inbox to confirm your subscription.</p>');
                                var d = new Date();
                                d.setTime(d.getTime() + (365*24*60*60*1000));
                                var expires = "expires="+ d.toUTCString();
                                document.cookie = "newsletter-subscribed=" + "true" + "; " + expires + "; path=/";
                              })
                              .fail(function(message) {
                                 jQuery('.n-message-wrap').html('<span class="error">Submission failed</span><p>Please try again or contact us at <a href="mailto:info@datarobot.com" target="_top">info@datarobot.com</a></p>');
                              })
                              .error(function(message) {
                                jQuery('.n-message-wrap').html('<span class="error">Submission error happened</span><p>Please try again or contact us at <a href="mailto:info@datarobot.com" target="_top">info@datarobot.com</a></p>');
                              });
                        });
                    });
                </script>
            </div>
          </div>
          <div class="n-success-wrap">
            <div class="n-message-wrap">
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
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
