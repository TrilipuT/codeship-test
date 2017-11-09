import $ from 'jquery';
import Cookie from 'js-cookie';

export default function () {
    let $headerMessage = $("#header-message");
    let $mobilePopup = $(".popup-mobile");
    let $wrapper = $('.wrapper');
    let banner_name;

    function showHeaderMessage() {
        setTimeout(function () {
            $headerMessage.slideDown(300);
            $wrapper.animate({paddingTop: "+=60"}, 300);
        }, 1000);
        topSp = 136;
    }

    function hideHeaderMessage() {
        $headerMessage.slideUp(300);
        $wrapper.animate({paddingTop: "-=60"}, 300);
        Cookie.set(banner_name, true, { expires: 30 });
        topSp = 76;
    }

    function showMobileMessage() {
        setTimeout(function () {
            $mobilePopup.fadeIn(300);
        }, 1000);
    }

    function hideMobileMessage() {
        $mobilePopup.fadeOut(300);
        Cookie.set(banner_name, true, { expires: 30 });
    }

    function showBanner() {
        if (!Cookie.get(banner_name)) {
            if ($(window).width() >= 1024) {
                showHeaderMessage();
                return true;
            } else {
                showMobileMessage();
                return false;
            }
        }
    }


    if ($headerMessage.length) {
        banner_name = $headerMessage.data('cname');
        if (showBanner()) {
            $headerMessage.find("a").click(function (e) {
                e.preventDefault();
                hideHeaderMessage();
                window.location.href = $(this).attr("href");
            });
            $mobilePopup.find("a").click(function (e) {
                e.preventDefault();
                hideMobileMessage();
                window.location.href = $(this).attr("href");
            });

            $headerMessage.find(".m-close").click(hideHeaderMessage);
            $mobilePopup.find(".m-close").click(hideMobileMessage);
        }
    }
}
