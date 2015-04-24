jQuery(document).ready(function() {

	jQuery( ".search-btn" ).click(function() {
	jQuery( ".widesearch" ).animate({
	     height: "toggle"
	  }, 100, function() {
	   
	  });
	});
	

	function abso() {
        jQuery('#masthead').css({
            width: jQuery(window).width(),
            height: jQuery(window).height()
        });
    }

    jQuery(window).resize(function() {
        abso();         
    });
    abso();


});	



/* Animonscroll */

jQuery('.post-animate').addClass("hidden").viewportChecker({
    classToAdd: 'visible animated fadeInUp', // Class to add to the elements when they are visible
    offset: 100,
    callbackFunction: function(elem){
	   
    }
    
});