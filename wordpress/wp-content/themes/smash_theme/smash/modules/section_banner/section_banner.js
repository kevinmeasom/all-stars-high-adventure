jQuery(function($){

    if($('parallax-banner-cta').hasClass('use-parallax')){
        let bg = $('.banner-parallax');
        let page = $('#page');
    
        bg.appendTo(page);
    }

    $.fn.isInViewport = function() {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();
    
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
    
        return elementBottom > viewportTop && elementTop < viewportBottom;
    };

    $(window).on('resize scroll', function() {
        let uses = $('.use-parallax');
        uses.each(function(){
            let _ = $(this);
            let id = _.data('parallax-bg');
            if (_.isInViewport()) {
                $('#'+id).addClass('on-top');
            } else {
                $('#'+id).removeClass('on-top');
            }
        });
    });
})