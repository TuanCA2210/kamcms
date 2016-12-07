jQuery(document).ready(function($) {


	/*var slider = $('#mainSlider');

	slider.owlCarousel({
		items: 1,
		autoHeight: true,
		loop: true,
    	autoplay: true,
	    autoplayTimeout: 5000,
	    autoplayHoverPause: false,
	    mouseDrag: false,
	});

	$('#sliderNextBtn').click(function() {
    	slider.trigger('next.owl.carousel', [300]);
	})
	$('#sliderPrevBtn').click(function() {
    	slider.trigger('prev.owl.carousel', [300]);
	})*/
	html = "<!-- BEGIN TOP SEARCH -->" +
		        "<li class='menu-search'>" +
		          "<span class='sep'></span>" +
		          "<i class='fa fa-search search-btn'></i>" +
		          "<div class='search-box'>" +
		            "<form action='#'>" +
		              "<div class='input-group'>" +
		                "<input type='text' placeholder='Search' class='form-control'>" +
		                "<span class='input-group-btn'>" +
		                  "<button class='btn btn-primary' type='submit'>Search</button>" +
		                "</span>" +
		              "</div>" +
		            "</form>" +
		          "</div> " +
		        "</li>" +
		        "<!-- END TOP SEARCH -->";
	$(".header-navigation > ul").append(html);

	Layout.initOWL();
	LayersliderInit.initLayerSlider();

	Layout.initFixHeaderWithPreHeader();
    Layout.initNavScrolling();

	$('body').on('click', '.lang', function(event) {
		event.preventDefault();
		var lang = $(this).attr('data-lang');
		$.ajax({
			url: baseUrl+'index.php?mod=home&controller=home&action=setLang',
			type: 'POST',
			dataType: 'json',
			data: {lang: lang},
		})
		.done(function(data) {
			if(data.status==true){
				window.location.assign(baseUrl);
			}
		});
		
	});



});