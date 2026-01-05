jQuery(function($){

	var windowWidth = $(window).outerWidth();
	var windowHeight = $(window).outerHeight();

	function init(){
        animateScroll();
        externalLinks();
        lazyLoad('.lazy');
        scaleBgImages();
		runMoveSocial();
		followDrop();
		runSocial();
		runSearch();
		runWaypoints();
		runComments();
		runSliders();
        // centerSlides();

        setTimeout(animateElements,2000);

		$(window).resize(function(){
			runResize();
		});
	}


	var runResize = function(){
		windowWidth = $(window).outerWidth();
		windowHeight = $(window).outerHeight();

		// centerSlides();
    }

    almComplete = function(alm){
        lazyLoad();
        scaleBgImages();
    }

    function lazyLoad() {
        $('.lazy').Lazy({
            // your configuration goes here
            scrollDirection: 'vertical',
            threshold: 100,
            afterLoad: function(element) {
                scaleBgImages()
            },
            onError: function(element) {
                console.log('error loading ' + element.data('src'));
            }
        });
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


	function runMoveSocial() {
		$('.menu-toggle').click(function(){
			$('#masthead').toggleClass('nav-open');
		});
	}


	function runTabSection(){
		tabs = $('.top-pick-tab');
		codes = $('.top-pick-code');

		codes.hide();
		$('.top-pick-code.toggled').show();

		tabs.click(function(){
			tabID = $(this).data('count');

			$('.top-picks-tabs').find('.active-tab').removeClass('active-tab');
			$(this).addClass('active-tab');

			$('.top-picks-codes').find('.top-pick-code.toggled').removeClass('toggled').fadeOut('fast', function(){
				$('.top-picks-codes').find('.top-pick-code[data-count="' + tabID + '"]').fadeIn('fast').addClass('toggled');
			});

		});
	}

	setTimeout(function(){
		runTabSection();
	}, 2000);

	function showHideIG(){
		$('#ig-trigger').mouseenter(function(){
			var styles = {
				'margin-top': 0
			}
			$('#ig-feed-wrapper').animate(styles, 500, function(){
				console.log('shown');
			});
		});

		$('#masthead').mouseleave(function(){
			var styles = {
				'margin-top': '-500px'
			}
			$('#ig-feed-wrapper').animate(styles, 500, function(){
				console.log('hidden');
			});
		});
	}

	showHideIG();


	// SHOW/HIDE FOLLOW BUTTONS
	function followDrop(){
		var followTrigger = $('.follow-trigger');

		followTrigger.mouseenter(function(){
			$('#header-social').fadeIn();
        });
        $('.site-navigation-wrap, #header-social').mouseleave(function(){
            $('#header-social').fadeOut();
        });
	}


	// SOCIAL SHARING BUTTONS
	var runSocial = function(){
		var shareBlocks = $('.social-share');
		var alreadyShared = [];

		shareBlocks.each(function(){
			var shareBlock = $(this);
            var shareID = $(this).attr('id');
            
            // IF NOT LOADING MORE POSTS ON PAGE
            $(this).find('.share').ShareLink({
                title: shareBlock.find('input.title').val(),
                text: shareBlock.find('input.title').val(),
                image: shareBlock.find('input.image').val(),
                url: shareBlock.find('input.url').val()
            });

            // IF LOADING MORE POSTS ON PAGE
			// if($.inArray(shareID,alreadyShared)){
			// 	$(this).find('.share').ShareLink({
			//         title: shareBlock.find('input.title').val(),
			//         text: shareBlock.find('input.title').val(),
			//         image: shareBlock.find('input.image').val(),
			//         url: shareBlock.find('input.url').val()
			//     });

			//     alreadyShared.push($(this).attr('id'));
			// }
		});
	}



// BEGIN CROPPING FUNCTIONS
	function initCrop(){
		function runCrop(){
			var crops = [];
			container = $('.ig-container');
			
			container.each(function(){
				var containerWidth = $(this).outerWidth();
				var el = $(this).find('.crop-wrap');
				var elCount = el.length;
				if($(this).hasClass('flex-col')){
					size = containerWidth;
				} else {
					size = containerWidth / elCount;
				}

				el.each(function(){
					$(this).width(size);
					$(this).height(size);
				});
			});
		}

		runCrop();

		$(window).resize(function(){
			runCrop();	
		});
	}

	initCrop();
// END CROPPING FUNCTIONS


// SEARCH
	function runSearch(){
		$('.modal').click(function() {
			$('.modal').fadeOut();
		});
	}


	function runSliders(){
		$('.featured-categories-row, .popular-posts-wrapper').slick({
			dots: false,
			arrows: true,
			prevArrow: '<i class="slider-prev slider-arrow fa fa-angle-left"></i>',
			nextArrow: '<i class="slider-next slider-arrow fa fa-angle-right"></i>',
			autoplay: false,
			variableWidth: false,
			slidesToShow: 3,
			slidesToScroll: 1,
			responsive: [
				{
				  breakpoint: 600,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				}
			  ]
		});
		
		$('.featured-slider-container').slick({
			dots: true,
			arrows: false,
			autoplay: false,
			centerMode: true,
			variableWidth: false,
			slidesToShow: 3,
			slidesToScroll: 1,
			responsive: [
				{
				  breakpoint: 768,
				  settings: {
					centerMode: false,
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				}
			]
		});
	}

	function runIndividualRsSliders(){
		codes = $('.top-pick-code');

		codes.each(function(){
			$(this).slick({
				infinite: true,
				centerMode: false,
				slidesToShow: 4,
				slidesToScroll: 1,
				prevArrow: '<i class="slick-prev slick-arrow fa fa-caret-left" aria-hidden="true"></i>',
				nextArrow: '<i class="slick-next slick-arrow fa fa-caret-right" aria-hidden="true"></i>',
				responsive: [
				    {
				      breakpoint: 770,
				      settings: {
				        slidesToShow: 2,
				        slidesToScroll: 1,
				        infinite: true,
				        dots: false
				      }
				    }
				]
			});
		});

		// rsSliders();
	}

	//runIndividualRsSliders();

	function rsSliders(){
		$('.top-picks-codes').slick({
			infinite: true,
			centerMode: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			dots: false,
			asNavFor: '.top-picks-tabs',
			responsive: [
		    {
		      breakpoint: 770,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        infinite: true,
		        dots: false
		      }
		    }
			]
		});

		$('.top-picks-tabs').slick({
		//   slidesToScroll: 1,
		  asNavFor: '.top-picks-codes',
		  dots: false,
		  arrows: false,
		  centerMode: false,
		  focusOnSelect: true
		});
	}

	function centerSlides(){
		var itemWidth = $('.featured_post').outerWidth();
		var itemHeight = $('.featured_post').outerHeight();
		$('.featured_post').css({
			left: -(itemWidth/1.95)
		});

		$('#featured_posts_slider .slick-next, #featured_posts_slider .slick-prev').css({
			width: ((windowWidth - itemWidth) - (15)) / (2),
			height: itemHeight
		});
	}


// ADD CLASS FOR HEADER STYLE ON SCROLL
	var runWaypoints = function(){
		var waypoints = $('#waypoint').waypoint(function(direction) {
		  $('#masthead, body').toggleClass('lock_nav');
		});

		var lockSocial = $('#social-waypoint').waypoint(function(direction) {
		  $('#vertical-social').toggleClass('lock_social');
        });
        
        var hideSidebars = $('#hide_sidebars').waypoint(function(direction) {
            $('.article-sidebar').fadeToggle();
          });
	}


    // CLICK TO SHOW COMMENT FORM
    var runComments = function(){
        let btns = $('.comment-btn');
        btns.each(function(){
            $(this).click(function(){
                $('#comments').addClass('show');
            })
        })
    }

	init();

});