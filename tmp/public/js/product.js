var Product = function(){

	var onLoading = function(load=null){
	    if (load==null) {
	        load = 'Đang xử lý...';
	    }
	    $('.icon-loading').addClass('display-none');    
	    $('.loading').addClass('animate-loading-center');
	    $('.loading').html('<div class="icon-loading"><i class="demo-icon icon-spin4 animate-spin">&#xe834;</i> '+ load + '</div>');
	    $('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
	}
	var offLoading = function(){
	    $('.icon-loading').removeClass('display-none'); 
	    $('.loading').removeClass('animate-loading-center');
	    $('.loading').empty();
	    $('.fade_loading').empty();
	}

	var validateEmail = function(email) {
	  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  return re.test(email);
	}
	/*var validatePhone = function(phone) {
	  var re = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
	  return re.test(phone);
	}*/

	var chooseChangeProvince = function(input,output){
		$('body').on('change', input, function(event) {
			event.preventDefault();
			var province_id = $(this).val();
			if (province_id) {
				$.ajax({
					url: baseUrl+'product/product/getDistrict',
					type: 'POST',
					dataType: 'json',
					data: {province_id: province_id},
				})
				.done(function(data) {
					if (data.status==true) {
						$(output).html(data.html);
					}
				});
				
			}
		});
	}
	var chooseProvince = function(province_id,output,status=true,districtid=null){
			if (province_id) {
				$.ajax({
					url: baseUrl+'product/product/getDistrict',
					type: 'POST',
					dataType: 'json',
					data: {province_id: province_id},
				})
				.done(function(data) {
					if (data.status==true) {
						$(output).html(data.html);
						if (status==false) {
							if(!isNaN(districtid)){
				   				$('.order_right #region-state-dd2 option').each(function(index, el) {
				   					if($(this).val()==districtid){
				   						$(this).attr('selected', 'selected');
				   					}
				   				});
						   }
						}
					}
				});
				
			}
	}
	

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
	            var size 			= $('.size').val() || null;
	            var color			= $('.color').val()	|| null;
	            handleAjaxBuyNow(id_product,nameProduct,priceProduct,productQuantity,size,color);
	    	}
	    });


	    // Change value color product
	    $('body').on('change', '#choose_color', function(event) {
	    	event.preventDefault();
	    	var color = $(this).val();
	    	var identifier = $(this).parents('tr').attr('data-identifier');
	    	var id = $(this).parents('tr').attr('data-id');
	    	var data = {
	    		identifier: identifier,
	    		id: id,
	    		color: color
	    	} 
	    	$.ajax({
	    		url: baseUrl+'product/product/ajaxChangePropertyProductOnCart',
	    		type: 'POST',
	    		dataType: 'json',
	    		data: {data: data},
	    	})
	    	.done(function(data) {
	    		if (data.status==true) {
	    			toastr["success"](data.mess);
	    		}
	    	});
	    	
	    	
	    	console.log($(this).val());
	    });
	    // Change value size choose_size
	    $('body').on('change', '#choose_size', function(event) {
	    	event.preventDefault();
	    	var size = $(this).val();
	    	var identifier = $(this).parents('tr').attr('data-identifier');
	    	var id = $(this).parents('tr').attr('data-id');
	    	var data = {
	    		identifier: identifier,
	    		id: id,
	    		size: size
	    	} 
	    	$.ajax({
	    		url: baseUrl+'product/product/ajaxChangePropertyProductOnCart',
	    		type: 'POST',
	    		dataType: 'json',
	    		data: {data: data},
	    	})
	    	.done(function(data) {
	    		if (data.status==true) {
	    			toastr["success"](data.mess);
	    		}
	    	});
	    });
	    
	    // Change value quantity product-quantity
	    $('body').on('change', '#product-quantity', function(event) {
	    	event.preventDefault();
	    	var quantity = $(this).val();
	    	var parent_this = $(this).parents('tr');
	    	var identifier = parent_this.attr('data-identifier');
	    	var id = parent_this.attr('data-id');
	    	var data = {
	    		identifier: identifier,
	    		id: id,
	    		quantity: quantity
	    	} 
	    	$.ajax({
	    		url: baseUrl+'product/product/ajaxChangePropertyProductOnCart',
	    		type: 'POST',
	    		dataType: 'json',
	    		data: {data: data},
	    	})
	    	.done(function(data) {
	    		if (data.status==true) {
	    			parent_this.find('td.goods-page-total').html("<strong><span>$</span> "+data.total_item+"</strong>");
	    			$('.shopping-total ul li.sub-total strong.price').html('<span>$</span> '+data.total_cart);
					$('.shopping-total ul li.shopping-total-price strong.price').html('<span>$</span> '+data.total_cart);

					$('.top-cart-info .top-cart-info-value').text('$ '+data.total_cart);
					$('.top-cart-content-wrapper .top-cart-content ul.scroller li').each(function(k,v){
						var identifier = $(this).attr('data-identifier');
						if (identifier==data.identifier) {
							$(this).find('.cart-content-count').text('x '+quantity);
						}
					});

	    			toastr["success"](data.mess);
	    		}
	    	});
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
			var identifier = $(this).parents('li').attr('data-identifier');
			var id = $(this).attr('data-id');
			$.ajax({
				url: baseUrl+'product/product/ajaxRemoveItemCart',
				type: 'POST',
				dataType: 'json',
				data: {id: id,identifier:identifier},
			})
			.done(function(data) {
				if (data.status==true) {
					current.parents('li').fadeOut('slow', function() {
						current.parents('li').remove();
					});
					$('.top-cart-block a.top-cart-info-count').text(data.total_unique+' item');
					$('.top-cart-block a.top-cart-info-value').text('$ '+data.total_cart);
					$('.shopping-total ul li.sub-total strong.price').html('<span>$</span> '+data.total_cart);
					$('.shopping-total ul li.shopping-total-price strong.price').html('<span>$</span> '+data.total_cart);
					$('#data_shopping_cart tbody tr').each(function(k,v){
						var identifier_top = $(this).attr('data-identifier');
						if (identifier==identifier_top) {
							$(this).fadeOut('slow', function() {
								$(this).remove();
							});
						}
					});
					toastr["success"](data.mess);
				}
			});
			
		});

		$('body').on('click', '.del-cart-checkout', function(event) {
			event.preventDefault();
			var current = $(this);
			var id = $(this).attr('data-id');
			var identifier = $(this).attr('data-identifier');
			$.ajax({
				url: baseUrl+'product/product/ajaxRemoveItemCart',
				type: 'POST',
				dataType: 'json',
				data: {id: id,identifier:identifier},
			})
			.done(function(data) {
				if (data.status==true) {
					current.parents('tr').fadeOut('slow', function() {
						current.parents('tr').remove();
					});
					$('.shopping-total ul li.sub-total strong.price').html('<span>$</span> '+data.total_cart);
					$('.shopping-total ul li.shopping-total-price strong.price').html('<span>$</span> '+data.total_cart);

					$('.top-cart-info .top-cart-info-value').text('$ '+data.total_cart);
					$('.top-cart-block a.top-cart-info-count').text(data.total_unique+' item');
					$('.top-cart-content-wrapper .top-cart-content ul.scroller li').each(function(k,v){
						var identifier_top = $(this).attr('data-identifier');
						if (identifier==identifier_top) {
							$(this).fadeOut('slow', function() {
								$(this).remove();
							});
						}
					});
					toastr["success"](data.mess);
				}
			});
			
		});
	}


	var handleCheckOutCart = function(){

		chooseChangeProvince('.order_left #country-dd','.order_left #region-state-dd');
		chooseChangeProvince('.order_right #country-dd','.order_right #region-state-dd');

		$('body').on('change', '#giong', function(event) {
			event.preventDefault();
			/* Act on the event */
			check = $(this).is(":checked");
			if (check) {
				var fullname 	= $('.order_left #fullname-dd').val();
				var email 		= $('.order_left #email-dd').val();
				var phone 		= $('.order_left #telephone-dd').val();
				var provinceid 	= $('.order_left #country-dd').val();
				var districtid 	= $('.order_left #region-state-dd').val();
				var address 	= $('.order_left #address-dd').val();

				$('.order_right #fullname-dd2').val(fullname);
				$('.order_right #email-dd2').val(email);
				$('.order_right #telephone-dd2').val(phone);
				if(!isNaN(provinceid)){
				   $('.order_right #country-dd2 option').each(function(index, el) {
				   		if($(this).val()==provinceid){
				   			$(this).attr('selected', 'selected');
				   			chooseProvince(provinceid,'.order_right #region-state-dd2',status = false,districtid);
				   		}
				   });
				   
				}
				
				//$('.order_right #country-dd').val();
				//$('.order_right #region-state-dd').val();
				$('.order_right #address-dd2').val(address);

			}else{
				console.log("not checked");
			}
		});





		/*$('body').on('click', '#button-confirm', function(event) {
			event.preventDefault();
			onLoading();
			var name = $('.order_left #fullname-dd').val();
			var email = $('.order_left #email-dd').val();
			var phone = $('.order_left #telephone-dd').val();
			var province = $('.order_left #country-dd').val();
			var district = $('.order_left #region-state-dd').val();
			var address = $('.order_left #address-dd').val();

		});*/

		$('#button-shipping-address').click(function(){
		    $('#payment-method-content').collapse('show');
		});
		$('#button-payment-method').click(function(){
		    $('#confirm-content').collapse('show');
		});


		 $("#form_checkout_succ").validate({
		 		
				 rules: {
						 left_fullname: "required",
						 right_fullname: "required",
						 left_email: {
						 	required:true,
						 	email:true
						 },
						 right_email: {
						 	required:true,
						 	email:true
						 },
						 left_phone: {
						 	required:true,
						 	minlength:9
						 },
						 right_phone: {
						 	required:true,
						 	minlength:9
						 },
						 left_province: "required",
						 right_province: "required",
						 left_district: "required",
						 right_district: "required",
						 left_address: "required",
						 right_address: "required"
				 },
				 messages: {
						 left_fullname: $('#checkout-page').attr('data-error-fullname'),
						 right_fullname: $('#checkout-page').attr('data-error-fullname'),
						 left_email: {
						 	required:$('#checkout-page').attr('data-error-email'),
						 	email: $('#checkout-page').attr('data-error-email-valid')
						 },
						 right_email: {
						 	required:$('#checkout-page').attr('data-error-email'),
						 	email: $('#checkout-page').attr('data-error-email-valid')
						 },
						 left_phone: {
						 	required:$('#checkout-page').attr('data-error-phone'),
						 	minlength:$('#checkout-page').attr('data-error-phone-valid')
						 },
						 right_phone: {
						 	required:$('#checkout-page').attr('data-error-phone'),
						 	minlength:$('#checkout-page').attr('data-error-phone-valid')
						 },
						 left_province: $('#checkout-page').attr('data-error-province'),
						 right_province: $('#checkout-page').attr('data-error-province'),
						 left_district: $('#checkout-page').attr('data-error-district'),
						 right_district: $('#checkout-page').attr('data-error-district'),
						 left_address: $('#checkout-page').attr('data-error-address'),
						 right_address: $('#checkout-page').attr('data-error-address')


				 }
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
			handleCheckOutCart();
		}
	}
}();

