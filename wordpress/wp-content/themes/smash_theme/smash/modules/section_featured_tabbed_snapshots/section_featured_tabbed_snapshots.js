jQuery(function($){
    let tabs = $('.snapshot-tab')
    tabs.each(function(){
        let _ = $(this)
        let tab = _.data('tab')
        _.click(function(){
            $('.snapshot-tab.active').removeClass('active');
            $('.snapshot-tab-content.active').removeClass('active')
            _.addClass('active')
            $('#'+tab).addClass('active');
        })
    })
})