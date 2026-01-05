jQuery(function($){
    $('.image-links-slider').on('afterChange', function(slick, currentSlide){
        scaleBgImages();
    });
    $('.image-links-slider').slick({
        dots: false,
        arrows: true,
        prevArrow: '<div class="slick-prev slider-prev slider-arrow"><svg class="icon"><use xlink:href="#left-angle" /></svg></div>',
        nextArrow: '<div class="slick-next slider-next slider-arrow"><svg class="icon"><use xlink:href="#right-angle" /></svg></div>',
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 821,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            }
        ]
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
                $('.image-links-slider').slick('slickGoTo', num);
            });
        })
    }
});