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

$('.fancybox').fancybox();

$('body').on('click', '.rename', function(event) {
	event.preventDefault();
	var old_name = $(this).attr('data-title');
	$('#old_name').val(old_name);
	$('#myModalRename').modal("show");
});


// create folder
$('body').on('click', '.create_folder', function(event) {
	event.preventDefault();
	$('#myModalCreateFolder').modal("show");
});
$('body').on('click', '#create_acept', function(event) {
	event.preventDefault();
	var new_name_folder = $('#new_name_folder').val().trim();
	if (new_name_folder=="") {
		$('#new_name_folder').focus();
		toastr["error"]("Bạn cần nhập tên mới cho thư mục!");
	}else{
		onLoading();
		$.ajax({
			url: baseUrl+'media/media/createNameFolder',
			type: 'POST',
			dataType: 'json',
			data: {new_name: new_name_folder},
		})
		.done(function(data) {
			
			if (data.status==true) {
				var messager = data.mess;
				$.ajax({
					url: baseUrl+'media/media/refesh',
					type: 'POST',  
			        dataType:'json',
				})
				.done(function(data) {
					toastr["success"](messager);
					if (data.status==true) {
						$('#loadMedia').fadeOut(600, function(){
		                    $('#loadMedia').html(data.html).fadeIn().delay(200);
		                });
					}
					$('#new_name').val('');
					$('#old_name').val('');
					$('#myModalRename').modal("hide");
					offLoading();
				});

				
			}else{
				offLoading();
				toastr["error"](data.mess);
			}
		});
	}
	
	
});





$('body').on('click', '#rename', function(event) {
	event.preventDefault();
	var new_name = $('#new_name').val().trim();
	var old_name = $('#old_name').val();
	if (new_name=="") {
		$('#new_name').focus();
		toastr["error"]("Bạn cần nhập tên mới cho tệp tin!");
	}else{
		onLoading();
		$.ajax({
			url: baseUrl+'media/media/renameImage',
			type: 'POST',
			dataType: 'json',
			data: {new_name: new_name,old_name:old_name},
		})
		.done(function(data) {
			
			if (data.status==true) {
				var messager = data.mess;
				$.ajax({
					url: baseUrl+'media/media/refesh',
					type: 'POST',  
			        dataType:'json',
				})
				.done(function(data) {
					toastr["success"](messager);
					if (data.status==true) {
						$('#loadMedia').fadeOut(600, function(){
		                    $('#loadMedia').html(data.html).fadeIn().delay(200);
		                });
					}
					$('#new_name').val('');
					$('#old_name').val('');
					$('#myModalRename').modal("hide");
					offLoading();
				});

				
			}else{
				offLoading();
				toastr["error"](data.mess);
			}
		});
	}
	
	
});


$('body').on('click', '#copy_rename', function(event) {
	event.preventDefault();
	var new_name = $('#new_name').val().trim();
	var old_name = $('#old_name').val();
	if (new_name=="") {
		$('#new_name').focus();
		toastr["error"]("Bạn cần nhập tên mới cho tệp tin!");
	}else{
		onLoading();
		$.ajax({
			url: baseUrl+'media/media/renameCopyImage',
			type: 'POST',
			dataType: 'json',
			data: {new_name: new_name,old_name:old_name},
		})
		.done(function(data) {
			
			if (data.status==true) {
				var messager = data.mess;
				$.ajax({
					url: baseUrl+'media/media/refesh',
					type: 'POST',  
			        dataType:'json',
				})
				.done(function(data) {
					toastr["success"](messager);
					if (data.status==true) {
						$('#loadMedia').fadeOut(600, function(){
		                    $('#loadMedia').html(data.html).fadeIn().delay(200);
		                });
					}
					$('#new_name').val('');
					$('#old_name').val('');
					$('#myModalRename').modal("hide");
					offLoading();
				});

				
			}else{
				offLoading();
				toastr["error"](data.mess);
			}
		});
	}
});



$('body').on('click', '.refesh', function(event) {
	event.preventDefault();
	$('.icon-loading').addClass('display-none');	
	$('.loading').addClass('animate-loading-center');
	$('.loading').html('<div class="icon-loading"><i class="demo-icon icon-spin4 animate-spin">&#xe834;</i> Đang tải dữ liệu...</div>');
	$('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
	var data = 1;
	$.ajax({
		url: baseUrl+'media/media/refesh',
		type: 'POST',  
		data: data,
        dataType:'json',
	})
	.done(function(data) {
		$('.icon-loading').removeClass('display-none');	
		$('.loading').removeClass('animate-loading-center');
		$('.loading').empty();
		$('.fade_loading').empty();
		if (data.status==true) {
			$('#loadMedia').fadeOut(600, function(){
                $('#loadMedia').html(data.html).fadeIn().delay(600);
            });
		}
	});

	/* Act on the event */
});



$('body').on('click', '.delete', function(event) {
	event.preventDefault();
	var title = $(this).attr('data-title');
	$('.icon-loading').addClass('display-none');	
	$('.loading').addClass('animate-loading-center');
	$('.loading').html('<div class="icon-loading"><i class="demo-icon icon-spin4 animate-spin">&#xe834;</i> Đang tải dữ liệu...</div>');
	$('.fade_loading').html('<div class="modal-backdrop fade in"></div>');
	$.ajax({
		url: baseUrl+'media/media/deleteImage',
		type: 'POST',
		dataType: 'json',
		data: {title: title},
	})
	.done(function(data) {
		$('.icon-loading').removeClass('display-none');	
		$('.loading').removeClass('animate-loading-center');
		$('.loading').empty();
		$('.fade_loading').empty();
		if (data.status==true) {
			$('#loadMedia').fadeOut(600, function(){
                $('#loadMedia').html(data.html).fadeIn().delay(600);
            });
		}
	});
	
});


$('body').on('dblclick', '.media-col img.img-folder-media', function(event) {
	event.preventDefault();
	var check_folder = $(this).parent('.media-col').attr('data-folder');
	$.ajax({
		url: baseUrl+'media/media/openDirectory',
		type: 'POST',
		dataType: 'json',
		data: {check_folder: check_folder},
	})
	.done(function(data) {
		if (data.status==true) {
			$('#loadMedia').fadeOut(600, function(){
                $('#loadMedia').html(data.html).fadeIn().delay(600);
            });
		}
	});
	
	
});