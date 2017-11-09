import $ from 'jquery';

$('.acordeon-toggle').on('click', function (e) {
    let $toggle = $(this);
    if ($toggle.parents('.show').length === 0) {
        $('.use-cases').find('.show').removeClass('show');
    }
    $toggle.parents('.item').toggleClass('show');
});