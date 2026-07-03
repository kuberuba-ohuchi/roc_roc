$('head').append('<style type="text/css">#fixedarea{display:none;}#movearea{display:none;}</style>');

function windowFade(){
    $('#movearea').fadeIn(600, function(){
		$(this).css('display', 'block');
	});
    $('#fixedarea').fadeIn(300, function(){
		$(this).css('display', 'inline');
		//
		setscroll();
	});

	$('a.fade').click(function() {
		var url = $(this).attr("href");
		$('#movearea').animate({"opacity":0},200);
		$('#fixedarea').animate({"opacity":0},300,function(){
			location.href = url;
		});
		return false;
	});
};

function setscroll() {
	strhref = location.href.split("#");
	if (strhref.length > 1 && adjPosition != 0) {
		valtop = $(window).scrollTop() + adjPosition;
		$(window).scrollTop(valtop);
	}
}

window.onload = function() {
	windowFade();

};
window.onunload = function() {
	windowFade();
};
