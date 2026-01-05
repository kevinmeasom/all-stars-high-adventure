jQuery(function($){
    window.almComplete = function(alm){
        setTimeout(function(){
            scaleBgImages();
            setupPostProducts();
        }, 500)
    }
    function setupPostProducts(){
        let large = $('.entry-products-slider.large-slider');
        let small = $('.entry-products-slider.small-slider');
        let xsmall = $('.entry-products-slider.xsmall-slider');

        large.each(function(){
            if(!$(this).hasClass('slick-slider')){
                $(this).on('afterChange', function(slick, currentSlide){
                    scaleBgImages();
                });
    
                $(this).slick({
                    dots: false,
                    arrows: true,
                    prevArrow: '<div class="slick-prev slider-prev slider-arrow"><svg class="icon"><use xlink:href="#left-angle" /></svg></div>',
                    nextArrow: '<div class="slick-next slider-next slider-arrow"><svg class="icon"><use xlink:href="#right-angle" /></svg></div>',
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    responsive: [
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
                                slidesToShow: 2,
                                slidesToScroll: 1,
                            }
                        }
                    ]
                })
    
                setTimeout(function(){
                    scaleBgImages();
                }, 500)
            }
        })

        small.each(function(){
            if(!$(this).hasClass('slick-slider')){
                $(this).on('afterChange', function(slick, currentSlide){
                    scaleBgImages();
                });
    
                $(this).slick({
                    dots: false,
                    arrows: true,
                    prevArrow: '<div class="slick-prev slider-prev slider-arrow"><svg class="icon"><use xlink:href="#left-angle" /></svg></div>',
                    nextArrow: '<div class="slick-next slider-next slider-arrow"><svg class="icon"><use xlink:href="#right-angle" /></svg></div>',
                    infinite: true,
                    slidesToShow: 2,
                    slidesToScroll: 1
                })
    
                setTimeout(function(){
                    scaleBgImages();
                }, 500)
            }
        })
        
        xsmall.each(function(){
            if(!$(this).hasClass('slick-slider')){
                $(this).on('afterChange', function(slick, currentSlide){
                    scaleBgImages();
                });
    
                $(this).slick({
                    dots: false,
                    arrows: true,
                    prevArrow: '<div class="slick-prev slider-prev slider-arrow"><svg class="icon"><use xlink:href="#left-angle" /></svg></div>',
                    nextArrow: '<div class="slick-next slider-next slider-arrow"><svg class="icon"><use xlink:href="#right-angle" /></svg></div>',
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                })
    
                setTimeout(function(){
                    scaleBgImages();
                }, 500)
            }
        })
    }
    setupPostProducts();
})