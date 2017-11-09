import $ from'jquery';
function drags(handle, resizeElement, resizeElement2, container) {
    var handleWidth;
    var containerOffset;
    var containerWidth;
    var minLeft;
    var maxLeft;

    // Initialize the dragging event on mousedown.
    container.on('mouseenter touchstart', function(e) {

        handle.addClass('draggable off');
        resizeElement.addClass('resizable off');
        resizeElement2.addClass('resizable2 off');

        // Check if it's a mouse or touch event and pass along the correct value
        // var startX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

        // Get sizes
        handleWidth = handle.outerWidth();
        containerOffset = container.offset().left;
        containerWidth = container.outerWidth();

        // Set limits
        minLeft = containerOffset + 10 + (containerWidth * 0.2);
        maxLeft = containerOffset + containerWidth - handleWidth - 10 - (containerWidth * 0.2);

        // Calculate the dragging distance on mousemove.
        container.on("mousemove touchmove", calculateDrag);
        e.preventDefault();
    }).on('mouseleave touchend touchcancel', function(e){
        handle.removeClass('draggable off').css({'left': '50%', 'transition' : 'all .8s ease', '-webkit-transition' : 'all .8s ease'});
        resizeElement.removeClass('resizable off').css({'width' : '50%', 'transition' : 'all .8s ease', '-webkit-transition' : 'all .8s ease'});
        resizeElement2.removeClass('resizable2 off').css({'width' : '50%', 'transition' : 'all .8s ease', '-webkit-transition' : 'all .8s ease'});
        container.off("mousemove touchmove", calculateDrag);
    });

    function calculateDrag(e) {
        // Check if it's a mouse or touch event and pass along the correct value
        var moveX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

        var leftValue = moveX - handleWidth;

        // Prevent going off limits
        if ( leftValue < minLeft) {
            leftValue = minLeft;
        } else if (leftValue > maxLeft) {
            leftValue = maxLeft;
        }

        // Translate the handle's left value to masked divs width.
        var widthValue = (leftValue + handleWidth/2 - containerOffset)*100/containerWidth+'%';

        var widthValue2 = 100 - (leftValue + handleWidth/2 - containerOffset)*100/containerWidth+'%';

        // Set the new values for the slider and the handle.
        $('.draggable').css('left', widthValue);
        $('.resizable').css('width', widthValue);
        $('.resizable2').css('width', widthValue2);
    }
}

// Define plugin
$.fn.beforeAfter = function() {
    var cur = this;
    adjustSlider();
    // Bind dragging events
    drags(cur.find('.handle'), cur.find('.resize'), cur.find('.resize2'), cur);

    // Update sliders on resize.
    // Because we all do this: i.imgur.com/YkbaV.gif
    $(window).resize(adjustSlider);

    function adjustSlider() {
        // Adjust the slider
        var width = cur.width()+'px';
        cur.find('.resize img').css('width', width);
        cur.find('.resize2 img').css('width', width);
    }
};