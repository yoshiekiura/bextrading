"use strict";
$(function () {
$("#zoom_03f").elevateZoom({constrainType:"height", constrainSize:274, zoomType: "lens", containLensZoom: true, gallery:'gallery_01f', cursor: 'pointer', galleryActiveClass: "active"}); 

$("#zoom_03f").bind("click", function(e) {  
  var ez =   $('#zoom_03f').on('elevateZoom');
  ez.closeAll(); //NEW: This function force hides the lens, tint and window	
	$.fancybox(ez.getGalleryList());     
    
  return false;
}); 

}); 
