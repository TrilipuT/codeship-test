import $ from 'jquery';

export default function (button, popup) {
    let $button = $(button);
    let $popup = $(popup);

    $button.click(function (e) {
        $popup.addClass('popup show');
        e.preventDefault();
        // if ($(window).width() < 720) {
        //     $('.wrapper').hide();
        //     $(window).scrollTop(75);
        // } else if ($(window).width() >= 720 && $(window).width() <= 1023) {
        //     $('.wrapper').height($(window).height()).css("overflow", "hidden");
        // } else {
        //     $('.wrapper').height($(window).height() - 75).css("overflow", "hidden");
        //     $(window).scrollTop(0);
        // }
        // $popup.show();
    });
    $popup
        .on('click', function (e) {
            if (e.target !== this)
                return;
            // $('.wrapper').show().height("auto").css("overflow", "auto");
            $(this).removeClass('popup show');
        })
        .on('click', '.popup-close', function () {
            // $('.wrapper').show().height("auto").css("overflow", "auto");
            $popup.removeClass('popup show');
            // $('.form-title h3').text('');
            // $('.dr-form #submittedOnUrl').val(window.location.href.split("#")[0]);
        });
}