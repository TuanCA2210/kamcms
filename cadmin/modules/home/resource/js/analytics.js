$('body').on('click', '.view_chart_table', function(event) {
	event.preventDefault();
	if ($('#revenue-chart-table').hasClass("view_all_more")) {
		$(this).html('<i class="fa fa-angle-double-down" aria-hidden="true"></i>&nbsp; Xem tất cả');
		
		$('#revenue-chart-table').removeClass("view_all_more");
	}else{
		$(this).html('<i class="fa fa-angle-double-up" aria-hidden="true"></i>&nbsp; Thu gọn');
		$('#revenue-chart-table').addClass("view_all_more");
	}
	
});

