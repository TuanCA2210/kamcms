$(document).ready(function() {
	$("#list-feature-home").sortable({
	  	handle : '.handle',
	  	update : function (e,ui) {
	    	var order = $('#list-feature-home').sortable('serialize');
	     	//$("#info").load("process-sortable.php?"+order);
	  	}
	});
});


$('body').on('dblclick', '#list-feature-home strong', function(event) {
	event.preventDefault();
	$(this).fadeOut('slow');
	$(this).parents('.item').find('.title').attr('type', 'text');
});

$('body').on('change', '.title', function(event) {
	event.preventDefault();
	onLoading();
	var str = $(this).val();
	var item = $(this).parents('.item');
	var id = item.attr('data-id');
	if (str!="") {
		$.ajax({
			url: baseUrl+'product/manager/edit',
			type: 'POST',
			dataType: 'json',
			data: {title: str,id:id},
		})
		.done(function(data) {
			if (data.status==true) {
				toastr["success"](data.mess);
				$('#modelAdd').modal('hide');
				$('#title_manager').val('');
				item.find('.title').val(data.title);
				item.find('strong').val(data.title);
			}
			offLoading();
		});
		$(this).parents('.item').find('strong').css('display','initial').text(str);
	}
	$(this).attr('type', 'hidden');
});


// add 
$('body').on('click', '#submit_manager', function(event) {
	event.preventDefault();
	$(this).attr("disabled", true);
	var count = $('#list-feature-home li').length;
	onLoading();
	var title = $('#title_manager').val();
	if (title=="") {
		toastr["error"]("Bạn không được để trống tiêu đề !");
	}else{
		$.ajax({
			url: baseUrl+'product/manager/add',
			type: 'POST',
			dataType: 'json',
			data: {title: title,count:count},
		})
		.done(function(data) {
			$('#submit_manager').removeAttr("disabled");
			if (data.status==true) {
				toastr["success"](data.mess);
				$('#modelAdd').modal('hide');
				$('#title_manager').val('');
				var htm = '<li id="listItem_'+data.id+'" class="item" data-id="'+data.id+'">'+
							'<img src="'+baseUrl+'modules/product/resource/images/arrow.png" alt="move" width="16" class="handle">'+
							'<input type="hidden" class="form-control title title_'+data.id+'" value="'+data.title+'"/><strong>'+data.title+'</strong></li>';
				$('#list-feature-home').append(htm);
			}
			offLoading();
		});
		
	}
});