jQuery(function($){
    $('.reviews-slider').on('afterChange', function(slick, currentSlide){
        scaleBgImages();
    });
    $('.reviews-slider').slick({
        arrows: false,
        dots: true,
        prevArrow: '<div class="slick-prev slider-prev slider-arrow"><svg class="icon"><use xlink:href="#left-angle" /></svg></div>',
        nextArrow: '<div class="slick-next slider-next slider-arrow"><svg class="icon"><use xlink:href="#right-angle" /></svg></div>',
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 1
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
                $('.reviews-slider').slick('slickGoTo', num);
            });
        })
    }
});