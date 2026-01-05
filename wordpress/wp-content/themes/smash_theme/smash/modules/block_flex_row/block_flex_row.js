jQuery(function($){
    let wrapper = $('.flex_row');
    wrapper.each(function(){
        let items = $(this).find('> *');
        items.each(function(){
            $(this).css({width: (100/items.length - 2)+'%'});
        })
    })
})