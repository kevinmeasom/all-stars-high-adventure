jQuery(function($){
    let blocks = $('.video-block-wrap');
    
    blocks.each(function(){
        let _ = $(this);
        let trigger = _.find('.icon');
        let image = _.find('.video-block-image');
        let video = _.find('.embed-container');

        trigger.click(function(){
            let id = $(this).data('vid');
            video.html('');
            autoPlayVideo(video, id, 640, 360);
            image.fadeOut();
        })
    })

    function autoPlayVideo(selector, vcode, width, height){
        "use strict";
        selector.html('<iframe width="'+width+'" height="'+height+'" src="https://www.youtube.com/embed/'+vcode+'?autoplay=1&loop=1&rel=0&wmode=transparent" frameborder="0" allowfullscreen wmode="Opaque"></iframe>');
    }
})