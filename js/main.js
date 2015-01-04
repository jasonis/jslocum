$(document).ready(function() {
    
    $('#myform').validate();
    
    
    function parallax() {
	setpos("#bg0");
	setpos("#bg1");
	setpos("#bg2", 4);
	setpos("#bg3");
	setpos("#bg4");
    }
    
    
    
    function setpos(element, factor) {
		factor = factor || 2;
		
		var offset = $(element).offset();
		var w = $(window);
		
		var posx = (offset.left - w.scrollLeft()) / factor;
		var posy = (offset.top - w.scrollTop()) / factor;
		
		$(element).css('background-position', '50% '+posy+'px');
	
	// use this to have parallax scrolling vertical and horizontal
	//$(element).css('background-position', posx+'px '+posy+'px');
    }
    
    $(document).ready(function () {
		parallax();
	}).scroll(function () {
		parallax();
    });
	
       
	    
	    /*=== adjust scroll speed for parallax effect ===*/
    $(function(){
	$(window).scroll(function(){
	  $('.box').each(function(){
	    $(this).css('margin-top', - $(window).scrollTop() / parseInt($(this).attr('scrollSpeed')));
	  });
	});
    })


}); 

    




/*
$('#theform').onfocus = function(){
    $('#msgsuccess').html('Your stuff worked');
}
*/

document.getElementById('theform').onfocus = function() {
    document.getElementById('msgsuccess').innerHTML = "('Your message has been sent&excl;')";
}









