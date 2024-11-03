$(document).ready(function(){
	
	$(window).scroll(function(){
		if($(this).scrollTop()>40){
			$('#pp').fadeIn();
		}else{
			$('#pp').fadeOut();
		}
	});
	$("#pp").click(function(){
		$('html,body').animate({scrollTop:0},800)
	});
});