jQuery(function($){
    let tabs = $('.tab-label');

    tabs.each(function(){
        let _ = $(this);
        let ind = _.data('tab');
        _.click(function(){
            if(!_.hasClass('active')){
                $('.tab-body.active').fadeOut().removeClass('active');
                $('#'+ind).fadeIn().addClass('active');
                $('.tab-label.active').removeClass('active');
                _.addClass('active');
            }
        })
    })
})