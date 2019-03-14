jQuery(document).ready(function() {
  // The slider being synced must be initialized first
  var slideitems = '';
  var itemwidth = '';
  if (jQuery(window).width() <= 768){
		slideitems = 1;
		itemwidth = 768;
  }
  else{
		slideitems = 2;		
		itemwidth = 931;	
  }
  
  jQuery('.flexslider').flexslider({
	slideshowSpeed: picorama_slider_speed.vars,  
    animation: "slide",
    animationLoop: true,
    itemWidth: itemwidth,
    itemMargin: 0,
    minItems: slideitems,
    maxItems: slideitems,
	controlNav: false,
  });
	jQuery("#search-button").click(function(){
			jQuery(".serch-form-coantainer").animate({
            width: 'toggle'
        });
		jQuery( ".search-box .search" ).focus();
    });

	jQuery('.flexslider .slides > li').hover(function(){     
        jQuery(this).find('.slide-desc').fadeIn(500); 
    },     
    function(){    
        jQuery(this).find('.slide-desc').fadeOut(500);
    });
	
	jQuery('a[href*=".png"]:has(img), a[href*=".gif"]:has(img), a[href*=".jpg"]:has(img)').prettyPhoto({ social_tools: false});
	
});