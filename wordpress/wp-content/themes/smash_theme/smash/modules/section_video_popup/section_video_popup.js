jQuery(function($){
    let vids = $('.video-popup-pre-cta.popup-video-open');

    vids.each(function(){
        let id = $(this).data('vid');
        let vid = $('#'+id);
        let close = vid.find('.popup-video-close');

        $(this).click(function(e){
            e.preventDefault();
            vid.fadeIn();
        })
        
        close.click(function(){
            vid.fadeOut();
        })
    })
})