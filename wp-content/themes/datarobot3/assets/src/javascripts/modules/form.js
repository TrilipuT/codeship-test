import $ from 'jquery';

export default function () {
    if ($('.new-form-handler').length) {

        let endpoints = {
            eloqua: "https://s2142644770.t.eloqua.com/e/f2",
            sf: "https://fbnddub87j.execute-api.us-east-1.amazonaws.com/production/forms",
            sfBackup: "https://q4mqrj2b0h.execute-api.us-west-1.amazonaws.com/backup/forms"
        };
        let $drForm = $('.dr-form');
        let $form = $drForm.find('form');
        let $company = $form.find('input[name="company"]');
        let $select = $form.find('select');
        let $country = $form.find('#country');
        let $input = $form.find('input');
        let $acceptedAgreement = $form.find('#agreementAccepted');
        let $submit = $drForm.find('button[type="submit"]');
        let $stateProv = $form.find('#stateProv');
        let $required = $form.find('[required]');
        let $preloader = $drForm.find('.preloader');


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
            console.log(rJSON);
            return rJSON;
        }

        function transmission_start() {
            $('#error-wrap').hide();
            $('#form-errors').text('');
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

        function submitToSF() {
            return $.post({
                url: endpoints.sf,
                headers: {
                    "Accept": "application/json; charset=utf-8",
                    "Content-Type": "application/json; charset=utf-8"
                },
                data: objectifyForm($form.serializeArray()),
                dataType: "json",
                beforeSend: transmission_start(),
                error: function (jqXHR) {
                    console.log("Response status code: " + jqXHR.status);
                    if (jqXHR.status === 422) {
                        $.each(jqXHR.responseJSON.message, function (i, val) {
                            $('#' + i).addClass('validation_error');
                            $('#form-errors').text(val);
                            $('#error-wrap').fadeIn(150);
                        });
                        transmission_stop();
                    } else if (jqXHR.status === 500) {
                        if (typeof Raven !== 'undefined') {
                            Raven.captureMessage("SF error. Code: " + jqXHR.status);
                        }
                        transmission_done();
                    } else {
                        if (typeof Raven !== 'undefined') {
                            Raven.captureMessage("Submission error. Code: " + jqXHR.status + ". Switching to backup endpoint.");
                        }
                        submitToSF_backup();
                    }
                },
                success: function (data) {
                    console.log(data.message);
                    transmission_done();
                }
            });
        }

        function submitToSF_backup() {
            return $.post({
                url: endpoints.sfBackup,
                headers: {
                    "Accept": "application/json; charset=utf-8",
                    "Content-Type": "application/json; charset=utf-8"
                },
                data: objectifyForm($form.serializeArray()),
                dataType: "json",
                error: function (jqXHR) {
                    console.log("SF backup Raven error");
                    if (typeof Raven !== 'undefined') {
                        Raven.captureMessage("SF backup error. Code: " + jqXHR.status);
                    }
                    transmission_done();
                },
                success: function (jqXHR) {
                    console.log("Success. Data stored at SF backup endpoint.");
                    transmission_done();
                },
            });
        }

        function submitToEloqua() {
            return $.post({
                url: endpoints.eloqua,
                data: $form.serialize(),
                beforeSend: transmission_start(),
                error: function (jqXHR) {
                    console.log("Error. Submission to Eloqua failed.");
                    if (typeof Raven !== 'undefined') {
                        Raven.setUserContext({
                            email: document.getElementById('emailAddress').value
                        });
                        Raven.captureMessage("Error. Submission to Eloqua failed.");
                    }
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


        /**
         *
         *
         *
         *
         *
         *
         *
         */

        $form.find('#submittedOnUrl').val(window.location.href);

        $company.autoComplete({
            minChars: 1,
            source: function (term, response) {
                $.getJSON('https://autocomplete.clearbit.com/v1/companies/suggest', {query: term}, function (data) {
                    response(data);
                });
            },
            renderItem: function (item, search) {
                let default_logo = 'https://s3.amazonaws.com/clearbit-blog/images/company_autocomplete_api/unknown.gif';
                let logo;
                if (item.logo == null) {
                    logo = default_logo
                } else {
                    logo = item.logo + '?size=30x30'
                }

                let container = '<div class="autocomplete-suggestion" data-name="' + item.name + '" data-domain="' + item.domain + '"data-val="' + search + '">';
                container += '<span class="icon"><img align="center" src="' + logo + '" onerror="this.src=\'' + default_logo + '\'"></span> ';
                container += item.name + '<span class="domain">' + item.domain + '</span></div>';
                return container
            },
            onSelect: function (e, term, item) {
                $company.val(item.data('name'));
                $('input[name="website"]').val(item.data('domain'));
            },
        });

        $select.change(function () {
            $(this).css('color', '#465275');
        });

        $country.change(function () {
            if ($(this).val() === "United States" || $(this).val() === "Canada") {
                $('#stateProv').prop('disabled', false);
            } else {
                $('#stateProv').val('').prop('disabled', true);
            }
        });

        $input.on('focus', function () {
            $(this).addClass('is-focused');
        }).on('blur', function () {
            $(this).removeClass('is-focused');
        }).on('keyup change', function () {
            if ($(this).val()) {
                $(this).removeClass('is-empty');
            } else {
                $(this).addClass('is-empty');
            }
            if ($acceptedAgreement.length) {
                $submit.prop("disabled", !$acceptedAgreement.prop("checked"));
            }
        });

        $form.submit(function (event) {
            event.preventDefault();
            if ($stateProv.prop('disabled') === false && $stateProv.val() === "") {
                $stateProv.addClass('validation_error').focus(function () {
                    $(this).removeClass('validation_error');
                });
            }

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

                $('#form-errors').text('Please fill in all required fields');
                $('#error-wrap').fadeIn(150);

                return;
            }

            $form.find("input[name='campaignName']").val(gasfdc_campaign);
            $form.find("input[name='campaignSource']").val(gasfdc_source);
            $form.find("input[name='campaignMedium']").val(gasfdc_medium);
            $form.find("input[name='campaignContent']").val(gasfdc_content);
            $form.find("input[name='campaignTerms']").val(gasfdc_term);

            //todo: import this function here
            identifyForm();
            submitToEloqua();
        });


        var validator = new FormValidator($form.prop('name'), [{
            name: 'firstName',
            rules: 'required|min_length[2]'
        }, {
            name: 'lastName',
            rules: 'required|min_length[2]'
        }, {
            name: 'emailAddress',
            rules: 'required|valid_email' //callback_valid_be
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
            let re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.+-]+\.edu$/g;
            return re.test(value);
        });
        validator.registerCallback('valid_c_name', function (value) {
            var re = /([A-Za-z0-9\-\_]+)/g;
            return re.test(value);
        });

        var event = window.event;
        var classNameCheckOnlyThis = 'checkOnlyThis';

        function ___event_performValidation(errors, evt) {
            $('.validation_error:not(#stateProv)').removeClass('validation_error');


            // detect if it's an onSubmit event
            var weAreInASubmitEvent = (typeof evt !== 'undefined');

            function checkIfIDIsInElementsToProcess(id) {
                return $('#' + id + '.' + classNameCheckOnlyThis).length != 0;
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
                $('#form-errors').text('');
                $('#error-wrap').fadeOut(150);
                if (event) event.returnValue = true;
            }
        }

        var allInputsOnPage = $('.dr-form input, .dr-form select');

        allInputsOnPage.on('focus', function (_event) {
            _event.target.classList.add(classNameCheckOnlyThis);
        });

        allInputsOnPage.on('blur', function (_event) {
            if (_event.target.classList.contains('validation_error')) {
                return;
            }
            _event.target.classList.remove(classNameCheckOnlyThis);
        });

        allInputsOnPage.on('keyup blur change', function (_e) {
            validator._validateForm();
        });
    }
}