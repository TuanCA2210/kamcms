	$('body').on('click', '.choose_img', function(event) {
		event.preventDefault();
		var body_img = $(this).parents('.modal-image-choose').find('.modal-body');
		var list = new Array();
		body_img.find('.img-active').each(function(){
			list.push($(this).attr('data-src'));
		});
		//console.log(list);
		if (list.length == 0) {
			toastr["warning"](body_img.attr('data-mess-one'));
		}else if(list.length > 1){
			toastr["warning"](body_img.attr('data-mess-two'));
		}else{
			var src = list[0];
			if (body_img.attr('data-title')=='logo') {
				var title = 'logo';
			}else{
				var title = 'favicon';
			}
			$.ajax({
				url: baseUrl+'index.php?mod=settings&controller=settings&action=updateInfo',
				type: 'POST',
				dataType: 'json',
				data: {src: src,title:title},
			})
			.done(function(data) {
				if (data.status) {
					toastr["success"](data.mess);
				}
			});
			$(this).parents('.modal-image-choose').find('.load-img').attr('src', baseUrl+'tmp/public/plugins/image_tools/timthumb.php?src='+baseUrl+'tmp/cdn/'+src+'&h=150&w=210&zc=2');
			body_img.find('.img-load-folder').each(function(){
				$(this).removeClass('img-active');
			});
			$(this).parents('.modal-image-choose').find('.modal').modal('hide');
		}
	});