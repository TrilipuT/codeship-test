<?php
/* Template Name: Payment page */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="google-site-verification" content="d-L8sQWcqXG9U_ua4yroXJjGnte_X4EQaWOLHQ7aEMU" />
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/assets/built/stylesheets/payment.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300,500|Noto+Sans:400,700">

	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>

	<?php $amount = get_field('amount'); ?>
	<?php
	$redirect = get_field('redirect_url');
	if (!$redirect) {
		$redirect = '/thank-you';
	}
	?>

  <script>
      (function(h,o,t,j,a,r){
          h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
          h._hjSettings={hjid:295062,hjsv:5};
          a=o.getElementsByTagName('head')[0];
          r=o.createElement('script');r.async=1;
          r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
          a.appendChild(r);
      })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
  </script>
</head>
<body <?php body_class('sh-pay'); ?>>
	<div class="wrapper">
		<header>
			<div class="container">
				<div class="row-wrap">
					<div id="logo">
						<a href="/" title="DataRobot Homepage">
							<img src="<?= get_template_directory_uri(); ?>/assets/built/images/DRU-Logo-white.svg" alt="DataRobot University">
						</a>
					</div>
	        <div class="bpf">
						<h1>Become a Data Science Superhero</h1>
					</div>
				</div>
			</div>
		</header>

		<section>
      <div class="container">
        <div class="b-main">
          <div class="row-wrap">
            <div class="b-left">
              <h2>You're on your way to becoming a Data Science Superhero!</h2>
              <p>Thank you for purchasing your license of DataRobot Academic. We’re excited to be part of your journey towards making the world a better place, one prediction at a time.</p>
              <p>By submitting the form on the right with the required fields, you acknowledge that you agree to pay $<?php echo $amount; ?> to purchase your license of DataRobot Academic.</p>
              <p>Once we've received your payment, we will send you more information about setting up your DataRobot Academic account. Please keep an eye out for an email from DataRobot.</p>
            </div>
            <div class="b-right">
              <div class="str-form-wrap dr-form">
                <div class="form-header">
                  <p>Your payment information</p>
                  <img src="<?= get_template_directory_uri(); ?>/assets/built/images/credit-card.png" alt="Your payment information">
									<a class="anchor" href="#card-errors" style="display:none;"></a>
                </div>
                <form method="post"  name="payment-form" id="payment-form">
                  <label>
                    <input type="text" name="cardholder-name" id="cardholder-name" class="field text is-empty" maxlength="40" placeholder="Jane Doe" />
                    <span><span>Name</span></span>
                  </label>
                  <label>
                    <input type="text" name="cardholder-email" id="cardholder-email" class="field text is-empty" maxlength="60" placeholder="jane.doe@school.edu" />
                    <span><span>School Email (.edu)</span></span>
                  </label>
                  <label>
                    <input type="text" name="cardholder-phone" id="cardholder-phone" class="field text is-empty" maxlength="20" placeholder="(123) 456-7890" />
                    <span><span>Phone</span></span>
                  </label>
                  <label>
                    <div id="card-element" class="field is-empty"></div>
                    <span><span>Card</span></span>
                  </label>
									<input type="hidden" name="pid" value="<?php echo get_the_ID(); ?>">
									<input type="hidden" name="action" value="stripe_charge">

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

                  <button type="submit" class="button bg-filled-green" disabled>Pay $<?php echo $amount; ?></button>
                </form>
              </div>
							<div id="card-error-wrap">
								<div id="card-errors" class="shake" role="alert"></div>
							</div>
            </div>
          </div>
        </div>
        <div class="b-conditions">
          <p>Please note the following conditions:</p>
          <div class="row-wrap">
            <div class="item">
              <div class="img-wrap">
                <img src="<?= get_template_directory_uri(); ?>/assets/built/images/activation.svg" alt="24 hours for account activation">
              </div>
              <p>Please allow 24 hours for account activation with access code and up to 48 hours if requesting an access code</p>
            </div>
            <div class="item">
              <div class="img-wrap">
                <img src="<?= get_template_directory_uri(); ?>/assets/built/images/commercial.svg" alt="academic use only">
              </div>
              <p>This license is for academic use only; commercial use is strictly forbidden</p>
            </div>
            <div class="item">
              <div class="img-wrap">
                <img src="<?= get_template_directory_uri(); ?>/assets/built/images/approved.svg" alt="intended only for">
              </div>
              <p>This license is intended only for students of approved institutions who are enrolled in approved courses</p>
            </div>
          </div>
        </div>
      </div>
		</section>

    <?php wp_footer(); ?>

    <script src="https://js.stripe.com/v3/"></script>

    <script type="text/javascript">
      // Create a Stripe client
      var stripe = Stripe('<?php echo get_field('str_pub_key', 'options'); ?>');

      // Create an instance of Elements
      var elements = stripe.elements();

      // Custom styling can be passed to options when creating an Element.
      var style = {
      base: {
        color: '#465275',
        lineHeight: '40px',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '14px',
        '::placeholder': {
          color: '#7B91A2'
        }
      },
      invalid: {
        color: '#E55653',
        iconColor: '#E55653'
      }
      };

      // Create an instance of the card Element
      var card = elements.create('card', {
        style: style,
        classes: {
          focus: 'is-focused',
          empty: 'is-empty',
        },
      });

      // Add an instance of the card Element into the `card-element` <div>
      card.mount('#card-element');

      var inputs = document.querySelectorAll('input.field');
      Array.prototype.forEach.call(inputs, function(input) {
        input.addEventListener('focus', function() {
          input.classList.add('is-focused');
        });
        input.addEventListener('blur', function() {
          input.classList.remove('is-focused');
        });
        input.addEventListener('keyup', function() {
          if (input.value.length === 0) {
            input.classList.add('is-empty');
          } else {
            input.classList.remove('is-empty');
          }
        });
        input.addEventListener('change', function() {
          if (input.value.length === 0) {
            input.classList.add('is-empty');
          } else {
            input.classList.remove('is-empty');
          }
        });
      });

      // Handle real-time validation errors from the card Element.
      card.addEventListener('change', function(event) {
		      var displayError = document.getElementById('card-errors');
		      if (event.error) {
		        displayError.textContent = event.error.message;
		      } else {
		        displayError.textContent = '';
		      }
      });

      // Handle form submission
      var form = document.getElementById('payment-form');
      form.addEventListener('submit', function(event) {
      		event.preventDefault();
          jQuery('.dr-form button[type="submit"]').prop( "disabled", false );

					var cardData = {
						name: document.getElementById('cardholder-name').value,
					}

		      stripe.createToken(card,cardData).then(function(result) {
		        if (result.error) {
		          // Inform the user if there was an error
		          var errorElement = document.getElementById('card-errors');
		          errorElement.textContent = result.error.message;
		        } else {
							jQuery('.dr-form input[type="submit"]').prop( "disabled", true );
							jQuery('.dr-form .preloader').fadeIn(150);
		          // Send the token to your server
		          stripeTokenHandler(result.token);
		        }
		      });
      });

      function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Prepare the data
				var formdata = {};
				formdata['cardholder-name'] = jQuery('#cardholder-name').val();
				formdata['cardholder-email'] = jQuery('#cardholder-email').val();
				formdata['cardholder-phone'] = jQuery('#cardholder-phone').val();
				formdata['nonce'] = dr.js_data.sc_nonce;
				formdata['pid'] = jQuery('input[name="pid"]').val();
				formdata['action'] = jQuery('input[name="action"]').val();
				formdata['stripeToken'] = token.id;

				// Submit the form
				var scReq = jQuery.ajax({
					url:dr.js_data.url,
					type:"POST",
					data:formdata,
					beforeSend: transmission_start(),
					success: function(data) {
						var data = JSON.parse(data);
						if (data.exit == true) {
								console.log(data.message);
								window.location.href = "/404/";
						} else {
								if (data.error == true) {
										jQuery('#card-errors').html(data.message);
										transmission_stop();
								} else {
										console.log(data.message);
										window.location.href = "<?php echo $redirect; ?>";
								}
						}
					}
				});
      }
    </script>

        <script type="text/javascript">

            jQuery(document).ready(function ($) {

                $('#cardholder-phone').mobilePhoneNumber({
                    defaultPrefix: '+1',
                });

                $('#cardholder-phone').on('keydown keypress', function (e) {
                    if ($(this).val().length >= 20 && (e.keyCode != 8 || e.keyCode != 37 || e.keyCode != 46)) {
                        e.preventDefault();
                    }
                });

                var error_fields_array = [];

                $('.dr-form input').on('keyup change', function () {

                    error_fields_array.length = 0;

                    $('.dr-form input[type="text"]').each(function () {
                        if ($(this).val() == "") {
                            error_fields_array.push($(this));
                        }
                    });

                    $('.validation_error').each(function () {
                        error_fields_array.push($(this));
                    });

                    if (error_fields_array.length == 0) {
                        $('.dr-form button[type="submit"]').prop("disabled", false);
                    } else {
                        $('.dr-form button[type="submit"]').prop("disabled", true);
                    }
                    ;
                });

                var validator = new FormValidator('payment-form', [{
                    name: 'cardholder-name',
                    rules: 'required',
                }, {
                    name: 'cardholder-email',
                    rules: 'required|valid_email'
                }, {
                    name: 'cardholder-phone',
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

            function transmission_start() {
                jQuery('#form-errors').text('');
                jQuery('.dr-form button[type="submit"]').prop("disabled", true);
                jQuery('.dr-form .preloader').fadeIn(150);
            }

            function transmission_stop() {
                jQuery('.dr-form button[type="submit"]').prop("disabled", false);
                jQuery('.dr-form .preloader').hide();
            }
        </script>

  </div>

<?php get_template_part('end'); ?>
