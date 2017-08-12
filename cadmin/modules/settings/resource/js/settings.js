$('body').on('click', '.select_logo', function(event) {
		event.preventDefault();
		var _this = $(this);
		var finder = new CKFinder();
	    //finder.basePath = '../';    // The path for the installation of CKFinder (default = "/ckfinder/").
	    finder.selectActionFunction = function(fileUrl){
	    	_this.parents('.modal-image-choose').find('img').attr('src',fileUrl);
	    	var src = fileUrl.replace(baseUrl+'tmp/cdn/','');
	    	var title = 'logo';
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
	    };
	    finder.popup();
	});
	$('body').on('click', '.set_favicon', function(event) {
		event.preventDefault();
		var _this = $(this);
		var finder = new CKFinder();
	    //finder.basePath = '../';    // The path for the installation of CKFinder (default = "/ckfinder/").
	    finder.selectActionFunction = function(fileUrl){
	    	_this.parents('.modal-image-choose').find('img').attr('src',fileUrl);
	    	var src = fileUrl.replace(baseUrl+'tmp/cdn/','');
	    	var title = 'favicon';
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
	    };
	    finder.popup();
	});
	







$('body').on('change', '#file_source', function(event) {
	event.preventDefault();
	var file_data = $(this).prop("files")[0];   
    var form_data = new FormData();                  
    form_data.append("file", file_data);
    //console.log(form_data);

	$.ajax({
		url: baseUrl+'settings/settings/sendFiles',
		type: 'POST',
		dataType: 'json',
		data: form_data,
		contentType: false,
		cache: false,
		processData:false, 
	})
	.done(function(data) {
		if (data.status==true) {
			toastr["success"](data.mess);
		}else{
			toastr["warning"](data.mess);
		}
	});
});




