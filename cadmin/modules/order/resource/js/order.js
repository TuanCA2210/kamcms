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


$('body').on('click', '#save_order', function(event) {
	event.preventDefault();	
	onLoading();
	var id = $(this).attr('data-id');
	var status = $('#status').val();
	var note = $('#note').val();
	var data = {
		id:id,
		status: status,
		note:note
	};

	$.ajax({
		url: baseUrl+'order/order/saveOrder',
		type: 'POST',
		dataType: 'json',
		data: {data: data},
	})
	.done(function(data) {
		offLoading();
		if (data.status==true) {
			toastr["success"](data.mess);
		}
	});
	

});

