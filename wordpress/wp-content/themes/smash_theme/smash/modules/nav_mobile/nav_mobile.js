jQuery(function($){
    function mobileNav() {
        let outer = $('.mobile-nav-outer');
        let outerBG = $('#mobile_nav_bg');
        $('#colophon').append(outer);
        $('#colophon').append(outerBG);

        var triggerOpen = $('.mobile-nav-trigger-open');
        var triggerClose = $('.mobile-nav-trigger-close, #mobile_nav_bg');
        triggerOpen.click(function(){
            $('#mobile_nav_bg').stop().fadeIn(300, function(){
                $('#mobile_nav_wrap').addClass('toggled');
                $('.mobile-nav-outer').stop().animate({
                    left: 0
                }, 300);
                scaleBgImages();
            })
        });
        triggerClose.click(function(){
            $('.mobile-nav-outer').stop().animate({
                left: '-500px'
            }, 300, function(){
                $('#mobile_nav_wrap').removeClass('toggled');
                $('#mobile_nav_bg').fadeOut(300);
            });
        });

        handleSubs();
    }

    function handleSubs() {
        const menu = $('#mobile_menu')
        const subs = menu.find('.menu-item-has-children')
        subs.each(function(){
            let _ = $(this)
            let a = _.find('> a')
            a.before('<div class="menu-drop" />')
            let drop = _.find('> .menu-drop')
            a.appendTo(drop)
            a.after('<svg class="icon menu-drop-trigger"><use xlink:href="#down-angle" /></svg>')
            let trigger = drop.find('.menu-drop-trigger')
            trigger.click(function(){
                _.toggleClass('show')
            })
        })
    }

    function scaleBgImages() {
        var bgs = $('*[data-bgratio]');
        bgs.each(function(){
            var _ = $(this);
            var w = _.width();
            var r = _.data('bgratio');
            _.stop().height(w * r);
            $(window).resize(function(){
                setTimeout(function(){
                    w = _.stop().width();
                }, 500);
                setTimeout(function(){
                    _.stop().height(w * r);
                },600);
            });
        });
    }
    
    mobileNav();
});