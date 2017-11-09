import $ from 'jquery';

$(function ($) {
    window.topSp = $('header.fixed').height() + $('body').offset().top;
});