var Product = function(){


	var handleLoadViewProduct = function(){
		$('body').on('click', '.fancybox-fast-view', function(event) {
	        event.preventDefault();
	        var id_product = $(this).attr('data-id');
	        $.ajax({
	        	url: baseUrl+'home/home/getDetailProductHome',
	        	type: 'POST',
	        	dataType: 'json',
	        	data: {id: id_product},
	        })
	        .done(function(data) {
	        	if (data.status==true) {
	        		$('#product-pop-up .row').html(data.html);
	        		Layout.initImageZoom();
	        	}
	        });
	        
	    });
	}

	var handleLoadImageChange = function(){
		$('body').on('click', '.product-other-images a', function(event) {
			event.preventDefault();
			$('.product-other-images a').removeClass('active');
			$(this).addClass('active');
			var src = $(this).find('img').attr('src');
			$('.product-main-image img').attr('src', src);
			$('.product-main-image img').attr('data-BigImgSrc', src);
			Layout.initImageZoom();
		});
	}

	var handleAddToCart = function(){
		$('body').on('click','.add2cart', function () {
	        var cart = $('.fa-shopping-cart');
	        var imgtodrag = $(this).parent('.product-item').find("img").eq(0);
	        console.log(imgtodrag.offset());
	        if (imgtodrag) {
	            var imgclone = imgtodrag.clone()
	                .offset({
	                top: imgtodrag.offset().top,
	                left: imgtodrag.offset().left
	            })
	                .css({
	                'opacity': '0.5',
	                    'position': 'absolute',
	                    'height': '150px',
	                    'width': '150px',
	                    'z-index': '999999'
	            })
	                .appendTo($('body'))
	                .animate({
	                	'top': cart.offset().top + 10,
	                    'left': cart.offset().left + 10,
	                    'width': 75,
	                    'height': 75
	            }, 1000, 'easeInOutExpo');
	            
	            setTimeout(function () {
	                cart.effect("shake", {
	                    times: 2
	                }, 200);
	            }, 1500);

	            imgclone.animate({
	                'width': 0,
	                'height': 0
	            }, function () {
	                $(this).detach()
	            });
	        }
	    });
	    $('body').on('click','.add2cart_popup', function () {
	    	//$(this).prop('disabled', true);
	    	//var width_btn = $(this).width();
	    	//var text_val = $(this).text();
	    	//$(this).css('width', width_btn).html('<i class="demo-icon icon-spin4 animate-spin">&#xe834;</i>');
	        var cart = $('.fa-shopping-cart');
	        

	        var imgtodrag = $(this).parent('.product-main-image').find(".flag").eq(0);
	        //var top = (imgtodrag.offset() || { "top": NaN }).top;
	        //console.log(top);
	        if (imgtodrag) {
	            var imgclone = imgtodrag.clone()
	                .offset({
	                top: $('.fancybox-wrap').offset().top,
	                left: $('.fancybox-wrap').offset().left
	            })
	                .css({
	                'opacity': '0.5',
	                    'position': 'absolute',
	                    'height': '150px',
	                    'width': '150px',
	                    'z-index': '999999'
	            })
	                .appendTo($('body'))
	                .animate({
	                	'top': cart.offset().top + 10,
	                    'left': cart.offset().left + 10,
	                    'width': 75,
	                    'height': 75
	            }, 1000, 'easeInOutExpo');
	            
	            setTimeout(function () {
	                cart.effect("shake", {
	                    times: 2
	                }, 200);
	            }, 1500);

	            imgclone.animate({
	                'width': 0,
	                'height': 0
	            }, function () {
	                $(this).detach()
	            });
	            //$(this).prop('disabled', false);
	        }
	    });

	    
	}
	


	return {
		init: function(){
			handleLoadViewProduct();
			handleLoadImageChange();
			handleAddToCart();
		}
	}
}();

