export default function () {
    let $invisible = jQuery(".invisible");

    function set_background() {
        $invisible.each(function (i, item) {
            let $this = jQuery(item);
            var bigImgUrl = $this.attr("data-img-big");
            var midImgUrl = $this.attr("data-img-medium");
            if (window.innerWidth > 1023) {
                $this.next().css('background-image', bigImgUrl);
            } else {
                if (midImgUrl !== 'url()') {
                    $this.next().css('background-image', midImgUrl);
                } else {
                    $this.next().css('background-image', bigImgUrl);
                }
            }
        });
    }

    jQuery(document).ready(set_background);

    jQuery(window).resize(set_background);
}
