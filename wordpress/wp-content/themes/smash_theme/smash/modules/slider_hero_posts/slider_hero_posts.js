jQuery(function($){
    $('.hero-slider').on('afterChange', function(slick, currentSlide){
        scaleBgImages();
    });
    $('.hero-slider').slick({
        dots: true,
        arrows: false,
        prevArrow: '<div class="slick-prev slider-prev slider-arrow"><svg class="icon"><use xlink:href="#long-arrow-left" /></svg></div>',
        nextArrow: '<div class="slick-next slider-next slider-arrow"><svg class="icon"><use xlink:href="#long-arrow-right" /></svg></div>',
        infinite: true,
        swipe: false,
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 1,
        slidesToScroll: 1,
    })

    setTimeout(function(){
        scaleBgImages();
        // setupSlideLinks();
    }, 500)

    function setupSlideLinks() {
        let slides = $('.hero-slide');

        slides.each(function(){
            $(this).find('.slide-dot').click(function(){
                let num = $(this).data('slidenum');
                $('.hero-slider').slick('slickGoTo', num);
            });
        })
    }
});