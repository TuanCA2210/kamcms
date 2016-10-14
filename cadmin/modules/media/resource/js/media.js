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