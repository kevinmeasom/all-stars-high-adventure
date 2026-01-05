jQuery(function($){
    var $grid = $('.grid').imagesLoaded( function() {
        // init Masonry after all images have loaded
        $grid.masonry({
            // options...
            columnWidth: '.grid-sizer',
            itemSelector: '.grid-item',
            percentPosition: true
        });
    });

    function runSwiper() {
        $('body').addClass('swiper');
        $( '.swipebox' ).swipebox({removeBarsOnMobile: false});
    }

    $(window).resize(function(){
        runSwiper();
    });

    runSwiper();
});