jQuery(function($){
    function hideHelloBar(){
        let close = $('.hello-bar-close');
        if($.cookie('hello_bar')){
            return;
        } else {
            $('#hello_bar').show();
            
            close.click(function(){
                doCookie($('#hello_bar'), 'hello_bar', 100, 0);
            })
    
            function doCookie(el, id, expire, show) {
                el.fadeOut();
                $.cookie(id, 'true', { expires: expire, path: '/' });
            }
        }
    }
    hideHelloBar();
})