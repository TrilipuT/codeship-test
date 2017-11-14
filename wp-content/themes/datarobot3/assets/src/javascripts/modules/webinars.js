import $ from 'jquery';
import 'bxslider';
import popup from './../modules/popup';
import sticky from 'stickybits';

export default function () {
    // slider
    let $slides = $('.slides');
    let sliderConfig = {
        mode: 'fade',
        prevSelector: '#prev',
        nextSelector: '#next',
        prevText: '<i class="icon-slider-prev"></i>',
        nextText: '<i class="icon-slider-next"></i>',
        infiniteLoop: false,
        hideControlOnEnd: true,
    };
    $slides.bxSlider(sliderConfig);


    // Time convert
    $slides.find('time[data-timestamp]').each(function (i, item) {
        let $item = $(item);
        let timestamp = parseInt($item.data('timestamp'));
        if (!timestamp) {
            return;
        }
        let datetime = new Date(timestamp * 1000);
        // Tuesday, Oct 31 at 12:00 pm
        // let str = dr_datetime.weekday[datetime.getDay()] +', '+ dr_datetime.month_abbrev[dr_datetime['month'][datetime.getMonth()]] + ' ' +datetime.getDate() + ' at '+ datetime.getHours()+':'+datetime.getMinutes();
        let time_string = datetime.toLocaleString('en-US', {
            weekday: 'long',
            month: 'short',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        }).split(', ');
        $item.text(time_string[0] + ', ' + time_string[1] + ' at ' + time_string[2]);
    });

    // Load more
    let $loadMoreTarget = $('.load-more-target');
    $('.load-more').on('click', function () {
        let button = this;
        button.disabled = true;
        let paged = parseInt($loadMoreTarget.data('page'));
        $.post(window.location.href, {paged: paged})
            .success(function (response) {
                $loadMoreTarget.append(response.data);
            })
            .always(function () {
                paged++;
                if (paged > parseInt($loadMoreTarget.data('max_num_pages'))) {
                    return button.remove();
                }
                button.disabled = false;
                $loadMoreTarget.data('page', paged);
            })
    });

    sticky('.fixed-holder', {verticalPosition: 'bottom', customVerticalPosition: true});


    // Popup
    let $formHolder = $('.form-holder');

    popup('.open-popup');

    $(document)
        .on('popup-opened', function () {
            $formHolder.addClass('popup');
        })
        .on('popup-closed', function () {
            $formHolder.removeClass('popup');
        });

    let $quotesSlider = $formHolder.find('.quotes-slider');

    if ($('.form-wrap').height() + $quotesSlider.outerHeight() > $formHolder.height()) {
        $quotesSlider.remove();
        $('.content .quotes-slider').removeClass('hidden');
        $('.slides').bxSlider(sliderConfig);
    } else {
        $quotesSlider.removeClass('hidden');
        $('.content .quotes-slider').remove();
        $('.form-wrap').css('margin-bottom', $quotesSlider.outerHeight());
    }

    // Time convert
    $('.date time[data-timestamp]').each(function (i, item) {
        let $item = $(item);
        let timestamp = parseInt($item.data('timestamp'));
        if (!timestamp) {
            return;
        }
        let datetime = new Date(timestamp * 1000);
        // Tuesday, Oct 31 at 12:00 pm
        // let str = dr_datetime.weekday[datetime.getDay()] +', '+ dr_datetime.month_abbrev[dr_datetime['month'][datetime.getMonth()]] + ' ' +datetime.getDate() + ' at '+ datetime.getHours()+':'+datetime.getMinutes();
        let time_string = datetime.toLocaleString('en-US', {
            hour: '2-digit',
            minute: '2-digit'
        });
        $item.text(time_string);
    });
}
