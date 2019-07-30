

jQuery(function($) {
  "use strict";

  	/* Pre loader */

	function handlePreloader() {

		if($('.preload').length){
			$('.preload').delay(220).fadeOut(500);
		}
	}



		/* Preloade */

		$(window).on('load', function() {
			handlePreloader();
		});

});