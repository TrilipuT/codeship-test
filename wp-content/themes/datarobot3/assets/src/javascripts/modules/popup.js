import $ from 'jquery';

export default function (button) {
    let $button = $(button);
    let target = $button.data('target');
    let $body = $('body');
    if (typeof target === 'undefined') {
        target = 'form-popup';
    }
    let $popup = $('#' + target);

    function openPopup(e) {
        e.preventDefault();
        $body.css('overflow', 'hidden');
        if ($body.hasClass('ios')) {
            $("html, body").animate({scrollTop: 0}, "fast");
        }
        $popup.addClass('show');
        $(document).trigger('popup-opened', e.currentTarget);
    }

    function closePopup(e) {
        e.preventDefault();
        $(this).removeClass('show');
        $body.css('overflow', '');
        $(document).trigger('popup-closed', e.currentTarget);
    }

    $body.on('click', button, openPopup);
    $popup
        .on('click', function (e) {
            if (e.target !== this)
                return;
            closePopup(e);
        })
        .on('click', '.popup-close', closePopup);
}