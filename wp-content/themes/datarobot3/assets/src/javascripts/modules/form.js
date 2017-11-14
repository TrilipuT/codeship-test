import $ from 'jquery';
import popupOpen from './popup';

export default function () {
    if ($('.new-form-handler').length) {
        popupOpen('.open-popup');

        let endpoints = {
            eloqua: "https://s2142644770.t.eloqua.com/e/f2",
            sf: "https://fbnddub87j.execute-api.us-east-1.amazonaws.com/production/forms",
            sfBackup: "https://q4mqrj2b0h.execute-api.us-west-1.amazonaws.com/backup/forms"
        };
        let $drForm = $('.dr-form');
        let $form = $drForm.find('form');
        let $company = $form.find('input[name="company"]:not(.school-field)');
        let $selects = $form.find('select');
        let $country = $form.find('#country');
        let $inputs = $form.find('input');
        let $submit = $drForm.find('button[type="submit"]');
        let $stateProv = $form.find('#stateprov');
        let $required = $form.find('[required]');
        let $preloader = $drForm.find('.preloader');
        let $errors = $('#form-errors');
        let $errorsWrap = $('#error-wrap');


        /**
         *
         *
         *
         *
         *
         *
         */

        function objectifyForm(formArray) {
            var rArray = {};
            for (var i = 0; i < formArray.length; i++) {
                rArray[formArray[i]['name']] = formArray[i]['value'];
            }
            var rJSON = JSON.stringify(rArray);
            return rJSON;
        }

        function transmission_start() {
            $errorsWrap.hide();
            $errors.text('');
            $submit.prop("disabled", true);
            $preloader.fadeIn(150);
        }

        function transmission_stop() {
            $submit.prop("disabled", false);
            $preloader.hide();
        }

        function transmission_done() {
            $preloader.hide();
            window.location.href = $form.data('redirect');
        }

        function prepareData(action) {
            // Prepare form data
            var formdata = {};
            formdata['nonce'] = dr.js_data.nonce;
            formdata['action'] = action;
            formdata['data'] = $form.serialize();

            return formdata;
        }

        function submitData() {
            var formdata = prepareData($form.data('action'));

            return jQuery.ajax({
                url: dr.js_data.url,
                type: "POST",
                data: formdata,
                dataType: "json",
                beforeSend: transmission_start(),
                error: function (jqXHR) {
                    if (jqXHR.hasOwnProperty('status')) {
                        console.log("Transmission error, code: " + jqXHR.status);
                        if (typeof Raven !== 'undefined' && Raven.hasOwnProperty('captureMessage')) {
                            Raven.captureMessage("Transmission error, code: " + jqXHR.status);
                        }
                    }
                    transmission_stop();
                    $errors.text("Connection error. Please try again later.");
                },
                success: function (response, textStatus, jqXHR) {
                    if (response.data.code === 422) {
                        jQuery.each(response.data.body.message, function (i, val) {
                            jQuery('#' + i).addClass('validation_error');
                            $errors.text(val);
                        });
                        transmission_stop();
                    } else {
                        if (response.data.hasOwnProperty('body') && response.data.body.hasOwnProperty('message')) {
                            console.log(response.data.body.message);
                        }
                        transmission_done();
                    }
                }
            });
        }


        /**
         *
         *
         *
         *
         *
         *
         *
         */
        // Populate field with current URL
        $form.find('#submittedOnUrl').val(window.location.href);
        // Add custom params from button
        $(document).on('popup-opened', function (e, button) {
            let $button = $(button);
            let data = $button.data();
            $.each(data, function (index, value) {
                if (index === 'title') {
                    $('.form-title-target').text(value);
                }
                if (index.indexOf('predefined') === 0) {
                    $form.find('#' + index.substring(10)).val(value).change();
                }
            });
        });


        // Company field autocomplete. Not applied for school-field
        $company.autoComplete({
            minChars: 1,
            delay: 100,
            source: function (term, response) {
                $.getJSON('https://autocomplete.clearbit.com/v1/companies/suggest', {query: term}, function (data) {
                    response(data);
                });
            },
            renderItem: function (item, search) {
                let default_logo = 'https://s3.amazonaws.com/clearbit-blog/images/company_autocomplete_api/unknown.gif';
                let logo = default_logo;
                if (item.hasOwnProperty('logo') && item.logo !== null) {
                    logo = item.logo + '?size=30x30'
                }

                return '<div class="autocomplete-suggestion" data-name="' + item.name + '" ' +
                    'data-domain="' + item.domain + '" ' +
                    'data-val="' + search + '"><span class="icon"><img align="center" src="' + logo + '" ' +
                    'onerror="this.src=\'' + default_logo + '\'"></span>' + item.name +
                    '<span class="domain">' + item.domain + '</span></div>';
            },
            onSelect: function (e, term, item) {
                $company.val(item.data('name'));
                $form.find('input[name="website"]').val(item.data('domain'));
            },
        });

        // Move this to styles?
        $selects.change(function () {
            $(this).css('color', '#465275');
        });

        // Enable states select if Canada or US selected
        $country.change(function () {
            let $this = $(this);
            if ($this.val() === "United States" || $this.val() === "Canada") {
                $stateProv.prop('disabled', false).removeClass('canada usa');
                if ($this.val() === "Canada") {
                    $stateProv.addClass('canada');
                } else if ($this.val() === "United States") {
                    $stateProv.addClass('usa');
                }
            } else {
                $stateProv.val('').prop('disabled', true).removeClass('canada usa');
            }
        });

        $inputs.on('focus', function () {
            $(this).addClass('is-focused');
        }).on('blur', function () {
            $(this).removeClass('is-focused');
        }).on('keyup change', function () {
            if ($(this).val()) {
                $(this).removeClass('is-empty');
            } else {
                $(this).addClass('is-empty');
            }
            let $acceptedAgreement = $form.find('#agreementAccepted');
            if ($acceptedAgreement.length) {
                $submit.prop("disabled", !$acceptedAgreement.prop("checked"));
            }
        });

        let rules = [];
        $required.each(function (i, input) {
            let $input = $(input);
            let validate = $input.data('validate');
            rules.push({
                name: $input.prop('name'),
                rules: 'required|' + validate
            });
        });

        if (rules.length) {
            var validator = new FormValidator($form.prop('name'), rules, __event_performValidation);

            validator.registerCallback('valid_business_email', function (value) {
                let dogIndex = value.lastIndexOf("@");
                if (dogIndex > 0) {
                    var domain = value.substring(dogIndex + 1).trim();
                    if (dr.hasOwnProperty('freeEmailAddresses')) {
                        var domainStack = dr.freeEmailAddresses;
                        if (domain !== '') {
                            let isValid = domainStack.indexOf(domain);
                            if (isValid > -1) {
                                jQuery('#form-errors').text('Please provide a correct business email address');
                                jQuery('#error-wrap').fadeIn(150);
                            } else {
                                jQuery('#form-errors').text('');
                            }
                            return (isValid < 0);
                        }
                    }
                    return true;
                }
                return false;
            });

            validator.registerCallback('valid_c_name', function (value) {
                var re = /([A-Za-z0-9\-\_]+)/g;
                return re.test(value);
            });

            validator.registerCallback('valid_edu', function (value) {
                var re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.+-]+\.edu$/g;
                return re.test(value);
            });

            var event = window.event;
            var classNameCheckOnlyThis = 'checkOnlyThis';

            function __event_performValidation(errors, evt) {
                $('.validation_error').removeClass('validation_error');

                // detect if it's an onSubmit event
                var weAreInASubmitEvent = (typeof evt !== 'undefined');

                function checkIfIDIsInElementsToProcess(id) {
                    return $('#' + id + '.' + classNameCheckOnlyThis).length !== 0;
                }

                if (errors.length > 0) {
                    for (var i = 0; i < errors.length; i++) {
                        if (weAreInASubmitEvent || checkIfIDIsInElementsToProcess(errors[i].id)) {
                            $('#' + errors[i].id).addClass('validation_error');
                        }
                    }
                    if (evt && evt.preventDefault) {
                        evt.preventDefault();
                    } else if (event) {
                        event.returnValue = false;
                    }
                } else {
                    $errors.text('');
                    $errorsWrap.fadeOut(150);
                    if (event) {
                        event.returnValue = true;
                    }
                }
            }

            var $allInputsOnPage = $inputs.add($selects);

            $allInputsOnPage.on('focus', function (_event) {
                _event.target.classList.add(classNameCheckOnlyThis);
            });

            $allInputsOnPage.on('blur', function (_event) {
                if (_event.target.classList.contains('validation_error')) {
                    return;
                }
                _event.target.classList.remove(classNameCheckOnlyThis);
            });

            $allInputsOnPage.on('keyup blur change', function () {
                validator._validateForm();
            });
        }

        /**
         *
         *
         * Submit handler
         *
         *
         */

        $form.submit(function (event) {
            event.preventDefault();
            // Check if state selected if fields is enabled
            if ($stateProv.prop('disabled') === false && $stateProv.val() === "") {
                $stateProv.addClass('validation_error').focus(function () {
                    $(this).removeClass('validation_error');
                });
            }
            // Check all required fields
            $required.each(function () {
                let $this = $(this);
                if ($this.prop('disabled') === false && $this.val() === "") {
                    $this.addClass('validation_error');
                    $this.focus(function () {
                        $this.removeClass('validation_error');
                    });
                }
            });

            var error_fields = $(this).find(".validation_error");

            if (error_fields.length > 0) {
                event.preventDefault();

                $errors.text('Please fill in all required fields');
                $errorsWrap.fadeIn(150);

                return;
            }

            $form.find("input[name='campaignName']").val(gasfdc_campaign);
            $form.find("input[name='campaignSource']").val(gasfdc_source);
            $form.find("input[name='campaignMedium']").val(gasfdc_medium);
            $form.find("input[name='campaignContent']").val(gasfdc_content);
            $form.find("input[name='campaignTerms']").val(gasfdc_term);

            //todo: import this function here
            identifyForm();
            let handler = $form.data('handler');
            if (handler && typeof handler !== 'undefined') {
                window[handler]();
            } else {
                submitData();
            }
        });


        /**
         * Some eloqua stuff
         */
        let timerId = null, timeout = 5;

        function WaitUntilCustomerGUIDIsRetrieved() {
            if (!!(timerId)) {
                if (timeout === 0) {
                    return;
                }
                if (typeof GetElqCustomerGUID === 'function') {
                    $form[0].elements["elqCustomerGUID"].value = GetElqCustomerGUID();
                    return;
                }
                timeout -= 1;
            }
            timerId = setTimeout(WaitUntilCustomerGUIDIsRetrieved, 500);
            return;
        }

        WaitUntilCustomerGUIDIsRetrieved();
        if (typeof _elqQ !== 'undefined') {
            _elqQ.push(['elqGetCustomerGUID']);
        }
    }
}