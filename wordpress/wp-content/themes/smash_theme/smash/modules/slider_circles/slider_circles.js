jQuery(function($){
    $('.circle-links-slider').slick({
        dots: false,
        arrows: true,
        prevArrow: '<div class="slick-prev slider-prev slider-arrow"><svg class="icon"><use xlink:href="#left-angle" /></svg></div>',
        nextArrow: '<div class="slick-next slider-next slider-arrow"><svg class="icon"><use xlink:href="#right-angle" /></svg></div>',
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        lazyLoad: 'progressive',
        responsive: [
            {
                breakpoint: 960,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    })

    // let slides = $('.circle-links-slider .circle-slide')

    setTimeout(function(){
        $('.circle-links-slider').addClass('show-slider');
    }, 1000);
})