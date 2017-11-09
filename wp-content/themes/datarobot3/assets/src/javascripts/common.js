import $ from 'jquery';
import './plugins/validate';
import './plugins/dr-messages';
import './plugins/jquery.auto-complete.min';
import './plugins/count-to';
import './plugins/modernizr';
import './plugins/phone.number';
import './plugins/utils';
import './plugins/before-after';
import './plugins/prism';
import './plugins/acordeon';


import 'bxslider';
import Cookie from 'js-cookie';
import homepage from './modules/homepage';
import officeClocks from './modules/office-clocks';
import webinars from './modules/webinars';
import banner from './modules/banner';
import banner_bg from './modules/banner_bg';
import new_form from './modules/form';
import 'featherlight';
imp;

jQuery = $;

$(function ($) {
    banner();
    new_form();
    let $body = $('body');
    if ($body.hasClass('home')) {
        homepage();
    } else if ($body.hasClass('page-template-page-culture')) {
        officeClocks();
    } else if ($body.hasClass('post-type-archive-webinar') || $body.hasClass('single-webinar')) {
        webinars();
    }

    if ($('.invisible').length) {
        banner_bg();
    }

    jQuery(document).click(function (e) {
        var search = jQuery(".header-search");
        var button = jQuery(".icon-magnify");
        if (button.is(e.target)) {
            search.fadeToggle().find('input.text[type="text"]').focus();
            button.toggleClass("active");
        } else if (!search.is(e.target) && search.has(e.target).length === 0) {
            search.fadeOut();
            button.removeClass("active");
        }
    });


    function initializeListeners() {
        $('#top-nav li, #top-nav>li').off();
        if ($(window).width() > 1023) {
            $('#top-nav>li>ul.sub-menu').hide();
            $('#main-nav').show();
            $('#top-nav>li').hover(
                function () {
                    $(this).children('ul.sub-menu').fadeIn('fast');
                },
                function () {
                    $(this).children('ul.sub-menu').hide();
                }
            );
            $('html').removeClass("mobile-menu");
            $('#main-nav').css("height", "auto");
        } else if ($(window).width() <= 1023 && $(window).width() >= 720) {
            $('#main-nav').hide();
            $('#top-nav ul.sub-menu').show();
            $('html').removeClass("mobile-menu");
            $('#main-nav').css("height", "auto");
        } else {
            $('ul.sub-menu').show();
        }
    }

    function minHeight() {
        if ($(window).width() > 1024 || $(".wrapper").outerHeight() < $(window).height()) {
            var minh = $(window).height() - $("header").outerHeight() - $("footer").outerHeight();
            $(".wrapper section").css("min-height", minh);
        }
    }

    function onResize() {
        initializeListeners();
        minHeight();
        anchors.removeClass('fixed').css("top", "auto").addClass('default');
    }

    initializeListeners();
    minHeight();

    $(".menu-item a:contains('Solutions')").parent('li').addClass("detached");

    $('#top-nav a[href="#"]').click(function (e) {
        e.preventDefault();
    });

    $('header .nav-toggle > ').click(function () {
        if ($('#main-nav').is(':visible')) {
            if ($(window).width() < 1024) {
                $('html').removeClass("mobile-menu");
                $('#main-nav').css("height", "auto");
                setTimeout(function () {
                    $(".c-hamburger-header").toggleClass("is-active");
                }, 300);
            }
            $('#main-nav').slideUp(300);
        } else {
            if ($(window).width() < 1024) {
                var menuHeight = $(window).height() - 135;
                $('html').addClass("mobile-menu");
                $('#main-nav').height(menuHeight);
                setTimeout(function () {
                    $(".c-hamburger-header").toggleClass("is-active");
                }, 300);
            }
            $('#main-nav').slideDown(300);
        }
    });

    $('.btt').on('click', function (e) {
        e.preventDefault();
        $('body,html').animate({
                scrollTop: 0,
            }, 500
        );
    });

    $('.search_widget input').focus(function () {
        $('.search_widget label svg path').css('fill', '#0089DF');
    }).blur(function () {
        $('.search_widget label svg path').css('fill', '#B8C5CE');
    });

    $('.footer-top input.text').keyup(function () {
        if ($(this).val() != "") {
            $(this).addClass('full');
        } else {
            $(this).removeClass('full');
        }
    });

    $('.hamburger').click(function (e) {
        e.preventDefault();
        if ($('.sitemap-columns').is(':visible')) {
            $('.sitemap-columns').slideUp('fast', function () {
                setTimeout(function () {
                    $(".c-hamburger").toggleClass("is-active");
                }, 300);
            });
        } else {
            $('.sitemap-columns').slideDown(300, function () {
                $("html, body").animate({scrollTop: $(document).height()}, 300);
                setTimeout(function () {
                    $(".c-hamburger").toggleClass("is-active");
                }, 300);
            });
            return false;
        }
    });

    if (!Cookie.get('newsletter-subscribed')) {
        jQuery('.newsletter-block').fadeIn(300);
    }

    $('input[name="company"]:not(.school-field)').autoComplete({
        minChars: 1,
        delay: 100,
        source: function (term, response) {
            $.getJSON('https://autocomplete.clearbit.com/v1/companies/suggest', {query: term}, function (data) {
                response(data);
            });
        },
        renderItem: function (item, search) {
            var default_logo = 'https://s3.amazonaws.com/clearbit-blog/images/company_autocomplete_api/unknown.gif';
            var logo = '';
            if (item.logo == null) {
                logo = default_logo
            } else {
                logo = item.logo + '?size=30x30'
            }

            var container = '<div class="autocomplete-suggestion" data-name="' + item.name + '" data-domain="' + item.domain + '" data-val="' + search + '">'
            container += '<span class="icon"><img align="center" src="' + logo + '" onerror="this.src=\'' + default_logo + '\'"></span> '
            container += item.name + '<span class="domain">' + item.domain + '</span></div>';
            return container
        },
        onSelect: function (e, term, item) {
            $('input[name="company"]').val(item.data('name'));
            $('input[name="website"]').val(item.data('domain'));
        },
    });

    $('input.text').val('');
    $('#searchform label i').click(function () {
        $('#searchform').submit();
    });

    $(window).resize(onResize);

    var anchors = $('.anchors');
    var anchors_offset;
    if (anchors.length) {
        anchors_offset = anchors.offset().top - topSp;
    } else {
        anchors_offset = 0;
    }

    $(window).scroll(function () {

        var scrollPos = $(document).scrollTop();

        $('.anchors a').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr('href'));
            if ((refElement.offset().top - 61 - topSp) <= scrollPos && (refElement.offset().top + refElement.height()) > scrollPos) {
                $('.anchors a').removeClass('active');
                currLink.addClass('active');
            }
            else {
                currLink.removeClass('active');
            }
        });

        if ($(window).width() >= 1024) {
            if ($('.anchors').length) {
                if ($(this).scrollTop() > anchors_offset && anchors.hasClass('default')) {
                    anchors.removeClass('default').addClass('fixed').css("top", topSp);
                } else if ($(this).scrollTop() <= anchors_offset && anchors.hasClass('fixed')) {
                    anchors.removeClass('fixed').css("top", "auto").addClass('default');
                }
            }
        }
    });

});
