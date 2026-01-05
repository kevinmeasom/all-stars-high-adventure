jQuery(document).ready(function($){
	function shopInit(){
		productThumbs();
	}

	function productThumbs(){
		var main = $('#product-featured-image');
		var thumbs = $('.product-thumb');

		thumbs.each(function(){
			var img = $(this).data('image-src');
			$(this).click(function(){
				main.fadeOut('fast',function(){
					main.attr('src', img).fadeIn('fast');
				});
			})
		});
	}

	shopInit();
});