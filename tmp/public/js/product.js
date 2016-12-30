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
	        //console.log(imgtodrag.offset());
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
	            var id_product 		= $(this).attr('data-id');
	            var nameProduct 	= $(this).parents('.product-item').find('.hidden_product').val();
	            var priceProduct 	= $(this).parents('.product-item').find('.hidden_price').val();
	            var productQuantity = 1;
	            var size 			= '';
	            var color			= '';
	            handleAjaxAddToCart(id_product,nameProduct,priceProduct,productQuantity,size,color);
	        }
	    });
	    $('body').on('click','.add2cart_popup', function () {
	    	//$(this).prop('disabled', true);
	    	//var width_btn = $(this).width();
	    	//var text_val = $(this).text();
	    	//$(this).css('width', width_btn).html('<i class="demo-icon icon-spin4 animate-spin">&#xe834;</i>');


	    	if ($('.product-pop-up .size_popup').val()=='' || $('.product-pop-up .color_popup').val()=='') {
	    		if ($('.product-pop-up .size_popup').val()=='') {
	    			toastr["error"]($('.product-pop-up .size_popup').attr('data-error'));
	    		} 
	    		if($('.product-pop-up .color_popup').val()==''){
	    			toastr["error"]($('.product-pop-up .color_popup').attr('data-error'));	
	    		}
	    		$('.product-page-options').addClass('error_size');
	    	}else{
	    		$('.product-page-options').removeClass('error_size');
	    		var cart = $('.fa-shopping-cart');
		        var imgtodrag = $(this).parents('.product-pop-up').find(".flag").eq(0);
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

		            var id_product 		= $(this).attr('data-id');
		            var nameProduct 	= $('.product-pop-up .hidden_product').val();
		            var priceProduct 	= $('.product-pop-up .hidden_price').val();
		            var productQuantity = $('.product-pop-up .product_quantity').val();
		            var size 			= $('.product-pop-up .size_popup').val();
		            var color			= $('.product-pop-up .color_popup').val();
		            handleAjaxAddToCart(id_product,nameProduct,priceProduct,productQuantity,size,color);


		            //$(this).prop('disabled', false);
		        }
	    	}
	        
	    });

	    $('body').on('click','.add2cart_detail', function () {
	    	//$(this).prop('disabled', true);
	    	//var width_btn = $(this).width();
	    	//var text_val = $(this).text();
	    	//$(this).css('width', width_btn).html('<i class="demo-icon icon-spin4 animate-spin">&#xe834;</i>');
	    	if ($('.size').val()=='' || $('.color').val()=='') {
	    		if ($('.size').val()=='') {
	    			toastr["error"]($('.size').attr('data-error'));
	    		} 
	    		if($('.color').val()==''){
	    			toastr["error"]($('.color').attr('data-error'));	
	    		}
	    		$('.product-page-options').addClass('error_size');
	    	}else{
	    		$('.product-page-options').removeClass('error_size');

		        var cart = $('.fa-shopping-cart');
		        var imgtodrag = $(this).parents('.product-page').find("img.flag").eq(0);
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

		            var id_product 		= $(this).attr('data-id');
		            var nameProduct 	= $('#hidden_product').val();
		            var priceProduct 	= $('#hidden_price').val();
		            var productQuantity = $('#product-quantity').val();
		            var size 			= $('.size').val();
		            var color			= $('.color').val();
		            handleAjaxAddToCart(id_product,nameProduct,priceProduct,productQuantity,size,color);


		            //$(this).prop('disabled', false);
		        }
		    }
	    });

	    $('body').on('click', '.buy_now', function(event) {
	    	event.preventDefault();
	    	if ($('.size').val()=='' || $('.color').val()=='') {
	    		if ($('.size').val()=='') {
	    			toastr["error"]($('.size').attr('data-error'));
	    		} 
	    		if($('.color').val()==''){
	    			toastr["error"]($('.color').attr('data-error'));	
	    		}
	    		$('.product-page-options').addClass('error_size');
	    	}else{
	    		$('.product-page-options').removeClass('error_size');
	    		var id_product 		= $(this).attr('data-id');
	            var nameProduct 	= $('#hidden_product').val();
	            var priceProduct 	= $('#hidden_price').val();
	            var productQuantity = $('#product-quantity').val();
	            var size 			= $('.size').val();
	            var color			= $('.color').val();
	            handleAjaxBuyNow(id_product,nameProduct,priceProduct,productQuantity,size,color);
	    	}
	    });
	    

	    
	}


	var handleSendReviewRate = function(){
		$('body').on('click', '.reviews-form .send_rate', function(event) {
			event.preventDefault();
			var id_product = $(this).attr('data-id');
			var name = $('.reviews-form #name').val();
			var email = $('.reviews-form #email').val();
			var review = $('.reviews-form #review').val();
			var rate = $('.reviews-form #backing5').val();
			$('.reviews-form #email').removeClass('error_input');
			var status = true;
			if (name=="") {
				toastr["error"]($('.reviews-form #name').attr('data-error'));
				$('.reviews-form #name').addClass('error_input');
				status = false;
			}else{
				$('.reviews-form #name').removeClass('error_input');
			}
			if (review=="") {
				toastr["error"]($('.reviews-form #review').attr('data-error'));
				$('.reviews-form #review').addClass('error_input');
				status = false;
			}else{
				$('.reviews-form #review').removeClass('error_input');
			}
			if (isNaN(id_product)) {
				status = false;
			}
			if (status==true) {
				var data = {
					id_product: id_product,
					name: 	name,
					email: 	email,
					review: review,
					rate: 	rate
				}
				$.ajax({
					url: baseUrl+'/product/product/ajaxAddRateProduct',
					type: 'POST',
					dataType: 'json',
					data: {data: data},
				})
				.done(function(data) {
					if (data.status==true) {
						toastr["success"](data.mess);
						$('.reviews-form #name').val('');
						$('.reviews-form #email').val('');
						$('.reviews-form #review').val('');
					}else{
						if (data.fiel=="email") {
							toastr["error"](data.mess);
							$('.reviews-form #email').addClass('error_input');
						}
					}
				});
				
			}
		});

	}

	var handleWriteReview = function(){
		$('body').on('click', '.write_review_focus', function(event) {
			event.preventDefault();
			/* Act on the event */
			$('#name').focus();
		});
	}

	var handleAjaxAddToCart = function(id_product,nameProduct,priceProduct,productQuantity,size,color){
			var data = {
				id: id_product,
				name:nameProduct,
				qty: productQuantity,
				price:priceProduct,
				size: size,
				color:color
			}
			$.ajax({
				url: baseUrl+ 'product/product/ajaxAdd2Cart',
				type: 'POST',
				dataType: 'json',
				data: {data: data},
			})
			.done(function(data) {
				if (data.status==true) {
					toastr["success"](data.mess);
					
					$('.top-cart-content-wrapper ul.scroller').html(data.html);
					$('.top-cart-block a.top-cart-info-count').text(data.total_unique);
					$('.top-cart-block a.top-cart-info-value').text(data.total_cart);
				}
			});
		
	}
	var handleAjaxBuyNow = function(id_product,nameProduct,priceProduct,productQuantity,size,color){
		var data = {
			id: id_product,
			name:nameProduct,
			qty: productQuantity,
			price:priceProduct,
			size: size,
			color:color
		}
		$.ajax({
			url: baseUrl+ 'product/product/ajaxAdd2Cart',
			type: 'POST',
			dataType: 'json',
			data: {data: data},
		})
		.done(function(data) {
			if (data.status==true) {
				window.location.assign(baseUrl+"product/product/cart");
			}
		});
	}

	var handleRemoveItemCart = function(){
		$('body').on('click', '.del-cart-top', function(event) {
			event.preventDefault();
			var current = $(this);
			var id = $(this).attr('data-id');
			$.ajax({
				url: baseUrl+'product/product/ajaxRemoveItemCart',
				type: 'POST',
				dataType: 'json',
				data: {id: id},
			})
			.done(function(data) {
				if (data.status==true) {
					current.parents('li').fadeOut('slow', function() {
						current.parents('li').remove();
					});
					$('.top-cart-block a.top-cart-info-count').text(data.total_unique);
					$('.top-cart-block a.top-cart-info-value').text(data.total_cart);
					toastr["success"](data.mess);
				}
			});
			
		});

		$('body').on('click', '.del-cart-checkout', function(event) {
			event.preventDefault();
			var current = $(this);
			var id = $(this).attr('data-id');
			$.ajax({
				url: baseUrl+'product/product/ajaxRemoveItemCart',
				type: 'POST',
				dataType: 'json',
				data: {id: id},
			})
			.done(function(data) {
				if (data.status==true) {
					current.parents('tr').fadeOut('slow', function() {
						current.parents('tr').remove();
					});
					$('.shopping-total ul li.sub-total strong.price').html('<span>$</span> '+data.total_cart);
					$('.shopping-total ul li.shopping-total-price strong.price').html('<span>$</span> '+data.total_cart);
					toastr["success"](data.mess);
				}
			});
			
		});
	}
	


	return {
		init: function(){
			handleLoadViewProduct();
			handleLoadImageChange();
			handleAddToCart();
			handleSendReviewRate();
			handleWriteReview();
			handleRemoveItemCart();
		}
	}
}();

