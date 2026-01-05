jQuery(function($){
    $('.next-up-posts.posts-slider').on('afterChange', function(slick, currentSlide){
        scaleBgImages();
    });
    $('.next-up-next').click(function(){
        $('.next-up-posts.posts-slider').slick('slickNext');
    })
    $('.next-up-prev').click(function(){
        $('.next-up-posts.posts-slider').slick('slickPrev');
    })
    $('.next-up-posts.posts-slider').slick({
        dots: false,
        arrows: true,
        prevArrow: '<div class="slick-prev slider-prev slider-arrow"><svg class="icon"><use xlink:href="#left-angle" /></svg></div>',
        nextArrow: '<div class="slick-next slider-next slider-arrow"><svg class="icon"><use xlink:href="#right-angle" /></svg></div>',
        centerMode: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            // {
            //     breakpoint: 1025,
            //     settings: {
            //         slidesToShow: 2,
            //         slidesToScroll: 1,
            //     }
            // },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
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
                $('.next-up-posts.posts-slider').slick('slickGoTo', num);
            });
        })
    }
});