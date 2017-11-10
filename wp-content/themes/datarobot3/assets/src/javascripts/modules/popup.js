import $ from 'jquery';

export default function (button) {
    let $button = $(button);
    let target = $button.data('target');
    let $body = $('body');
    if (typeof target === 'undefined') {
        target = 'form-popup';
    }
    let $popup = $('#' + target);

    $body.on('click', button, function (e) {
        $body.css('overflow', 'hidden');
        $popup.addClass('show');
        $(document).trigger('popup-opened', e.currentTarget);
        e.preventDefault();
    });
    $popup
        .on('click', function (e) {
            if (e.target !== this)
                return;
            $(this).removeClass('show');
            $body.css('overflow', '');
        })
        .on('click', '.popup-close', function () {
            $popup.removeClass('show');
            $body.css('overflow', '');
        });
}