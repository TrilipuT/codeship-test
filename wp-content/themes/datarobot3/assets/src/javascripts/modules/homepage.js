export default function () {
    var $baSlider = jQuery('.ba-slider');
    var $mbp = jQuery('.mbp');
    var $handle = jQuery('.handle');

    $baSlider.beforeAfter();
    setInterval(handleAnimation, 5000);

    function handleAnimation() {
        $handle.each(function () {
            if (jQuery(this).is(':visible')) {
                if ($mbp.hasClass('hover-shake') || $handle.hasClass('draggable')) {
                    $mbp.removeClass('hover-shake')
                } else {
                    $mbp.addClass('hover-shake');
                }
            }
        });
    }

    jQuery('.tabcontent').scroll(function (e) {
        var offset = jQuery(this).scrollLeft();
        if (offset > 11) {
            jQuery('.gif').hide();
        } else {
            jQuery('.gif').show();
        }
    });

    jQuery('.tablinks').click(function (e) {
        e.preventDefault();
        var tab = jQuery(this).attr('href');
        jQuery('.tabcontent').hide();
        jQuery('.tablinks.active').removeClass('active');
        jQuery(this).addClass('active');
        jQuery(tab).show();

        if (jQuery(tab).scrollLeft() > 11) {
            jQuery('.gif').hide();
        } else {
            jQuery('.gif').show();
        }
    });
}
