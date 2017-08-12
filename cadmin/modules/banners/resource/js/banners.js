function onLoading(load=null){
	if (load==null) {
		load = 'Đang xử lý...';
	}
	$('.icon-loading').addClass('display-none');	
	$('.loading').addClass('animate-loading-center');
	$('.loading').html('<div class="icon-loading"><i class="demo-icon icon-spin4 animate-spin">&#xe834;</i> '+ load + '</div>');
	$('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
}
function offLoading(){
	$('.icon-loading').removeClass('display-none');	
	$('.loading').removeClass('animate-loading-center');
	$('.loading').empty();
	$('.fade_loading').empty();
}



	$('body').on('click', '.choose_img', function(event) {
		event.preventDefault();
		var _this = $(this);
		var finder = new CKFinder();
	    //finder.basePath = '../';    // The path for the installation of CKFinder (default = "/ckfinder/").
	    finder.selectActionFunction = function(fileUrl){
	    	_this.parents('.modal-image-choose').find('img').attr('src',fileUrl);
	    	var src = fileUrl.replace(baseUrl+'tmp/cdn/','');
	    	_this.parents('.modal-image-choose').find('.hidden_thumb_pages').val(src);
	    };
	    finder.popup();
	});



	$('body').on('click', '.del-image-choose-pages', function(event) {
		event.preventDefault();
		$(this).parents('.modal-image-choose').find('.hidden_thumb_pages').val('');
		$(this).parents('.modal-image-choose').find('.pages-website').attr('src',baseUrl+'tmp/public/images/img.png');
	});






	$('body').on('click', '.deleteDialog', function(event) {
		event.preventDefault();
		var href = $(this).attr('data-href');
		$('#agree_del').attr('href', href);
	});



	$('body').on('click', '#del_list_user', function(event) {
		event.preventDefault();
		var allVals = [];
	    $(".checkboxes:checked").each(function(){
		   allVals.push($(this).val());
		});
		if (allVals.length >= 1) {
			$('#modelDeleteAll').modal('show'); 
		}else{
			toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
		}
	});


	$('body').on('click', '#modelDeleteAll #agree_del_all', function(event) {
		event.preventDefault();
		var allVals = [];
	    $(".checkboxes:checked").each(function(){
		   allVals.push($(this).val());
		});
		if (allVals.length >= 1) {
			$.ajax({
				url: baseUrl+'banners/banners/dellAll',
				type: 'POST',
				dataType: 'json',
				data: {all: allVals},
			})
			.done(function(data) {
				if (data.status==true) {
					$('#modelDeleteAll').modal('show'); 
					window.location.assign(data.redirect);
				}else{
					toastr["error"]("Cảnh báo! Đã xảy ra lỗi gì đó.Vui lòng thử lại.");
				}
			});
		}else{
			toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
		}
		
		
	});







$('body').on('click', '#lock_user', function(event) {
	event.preventDefault();
	var allVals = [];
    $(".checkboxes:checked").each(function(){
	   allVals.push($(this).val());
	});
	if (allVals.length >= 1) {
		var status = 'public';
		$.ajax({
			url: baseUrl+'banners/banners/status',
			type: 'POST',
			dataType: 'json',
			data: {status: status,all:allVals},
		})
		.done(function(data) {
			if (data.status==true) {
				window.location.assign(data.redirect);
			}else{
				toastr["error"]("Cảnh báo! Đã xảy ra lỗi gì đó.Vui lòng thử lại.");
			}
		});
	}else{
		toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
	}
});

$('body').on('click', '#unlock_user', function(event) {
	event.preventDefault();
	var allVals = [];
    $(".checkboxes:checked").each(function(){
	   allVals.push($(this).val());
	});
	if (allVals.length >= 1) {
		var status = 'private';
		$.ajax({
			url: baseUrl+'banners/banners/status',
			type: 'POST',
			dataType: 'json',
			data: {status: status,all:allVals},
		})
		.done(function(data) {
			if (data.status==true) {
				window.location.assign(data.redirect);
			}else{
				toastr["error"]("Cảnh báo! Đã xảy ra lỗi gì đó.Vui lòng thử lại.");
			}
		});
	}else{
		toastr["error"]("Cảnh báo! Bạn chưa chọn mục nào.");
	}
});


$('body').on('click', '.search_button_users', function(event) {
	event.preventDefault();
	var search = $('.search_users').val();
	if (search=="") {
		window.location.assign(baseUrl+'banners/banners/index');
	}else{
		window.location.assign(baseUrl+'banners/banners/index&s='+search);
	}
	
});

