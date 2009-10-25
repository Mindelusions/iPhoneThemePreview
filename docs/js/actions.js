/**giZ on gizstyle.com jQuery implementation ´¯`·.¸¸.*

ACTIONS

 */

$(document).ready(function(){

$("#switcher-dx").click(function () {
	$(this).fadeOut(2000);
	$("#switcher-dx-sel").fadeIn(2000);
	$("#switcher-sx-sel").fadeOut(2000);
	$("#switcher-sx").fadeIn(2000);
	$("#page-1").animate({ 
        marginLeft: "-320px"
      }, 1000 );
	$("#page-2").animate({ 
        marginLeft: "-320px"
      }, 1000 );
});

$("#switcher-sx").click(function () {
	$(this).fadeIn(2000);
	$("#switcher-sx-sel").fadeIn(2000);
	$("#switcher-dx-sel").fadeOut(2000);
	$("#switcher-dx").fadeIn(2000);
	$("#page-1").animate({ 
        marginLeft: "0px"
      }, 1000 );
	$("#page-2").animate({ 
        marginLeft: "0px"
      }, 1000 );
});
	
});