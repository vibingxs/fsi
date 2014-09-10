var doc = document.documentElement;
doc.setAttribute('data-useragent', navigator.userAgent);

jQuery(document).ready(function($){
	
	
	
	(function() {

		var url = window.location.href;
		var types1 = $('.related-types.first');
		var types2 = $('.related-types.second');
		var types3 = $('.related-types.third');
		
		if( url.indexOf('service-innovation') > -1 ) {
			types1.slideDown();
		}
		if( url.indexOf('business-transformation') > -1 ) {
			types2.slideDown();
		}
		if( url.indexOf('regulatory-mastery') > -1 ) {
			types3.slideDown();
		}
	
	})();
	
	
	
	
	//NerveSlider
	$(".slider").nerveSlider({
		slideTransitionSpeed: 1000,
		slideTransitionEasing: "easeOutExpo",
		sliderResizable: true,
		sliderWidth: "1920px",
		showPause: true

	});

	$(".slider-inner").nerveSlider({
		slideTransitionSpeed: 1000,
		slideTransitionEasing: "easeOutExpo",
		sliderResizable: true,
		sliderWidth: "1920px",
		showPause: false,
		showSlider: false,
		showArrows: false,
		showDots: false
	});

	//Filtering for the resources
	$(function(){
		$('#sort').mixItUp({
			selectors: {
				target: '.mixitem'
			}
		});
	});
	

	$( ".filter-select" ).change(function() {
	  $('#sort').mixItUp('filter', this.value);
	});

	
	//Load more option for resources
    size_li = $(".limit").size();
    x=3;
    
    $('.limit').hide();
    $('.limit:lt('+x+')').show();
    $('#loadMore').click(function () {
        x= (x+5 <= size_li) ? x+5 : size_li;
        $('.limit:lt('+x+')').show();
    });
    
    $('#showLess').click(function () {
        x=(x-5<0) ? 3 : x-5;
        $('.limit').not(':lt('+x+')').hide();
    });


    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");

    

})