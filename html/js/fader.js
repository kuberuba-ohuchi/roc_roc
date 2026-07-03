$('head').append('<style type="text/css">#fixedarea{display:none;}#movearea{display:none;}</style>');

function windowFade(){
    $('#movearea').fadeIn(600, function(){
		$(this).css('display', 'block');
	});
    $('#fixedarea').fadeIn(300, function(){
		$(this).css('display', 'inline');
		//
		createmap();
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

function createmap() {
var mapobj = document.getElementById("mapframe");
if (mapobj!=null) {
mapobj.innerHTML = 
"<iframe width='560' height='350' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='http://maps.google.co.jp/maps?hl=ja&amp;q=%E6%9D%B1%E4%BA%AC%E9%83%BD%E4%B8%AD%E5%A4%AE%E5%8C%BA%E6%96%B0%E5%B7%9D2%E4%B8%81%E7%9B%AE1-10&amp;ie=UTF8&amp;hq=&amp;hnear=%E6%9D%B1%E4%BA%AC%E9%83%BD%E4%B8%AD%E5%A4%AE%E5%8C%BA%E6%96%B0%E5%B7%9D%EF%BC%92%E4%B8%81%E7%9B%AE%EF%BC%91%E2%88%92%EF%BC%91%EF%BC%90&amp;gl=jp&amp;t=m&amp;brcurrent=3,0x6018895c6bcbd56b:0xb608af34add385fc,0,0x6018895c6f598cb9:0x7c5f245773254cdc&amp;ll=35.676612,139.779482&amp;spn=0.024403,0.048065&amp;z=14&amp;iwloc=A&amp;output=embed'></iframe><br /><small><a href='http://maps.google.co.jp/maps?hl=ja&amp;q=%E6%9D%B1%E4%BA%AC%E9%83%BD%E4%B8%AD%E5%A4%AE%E5%8C%BA%E6%96%B0%E5%B7%9D2%E4%B8%81%E7%9B%AE1-10&amp;ie=UTF8&amp;hq=&amp;hnear=%E6%9D%B1%E4%BA%AC%E9%83%BD%E4%B8%AD%E5%A4%AE%E5%8C%BA%E6%96%B0%E5%B7%9D%EF%BC%92%E4%B8%81%E7%9B%AE%EF%BC%91%E2%88%92%EF%BC%91%EF%BC%90&amp;gl=jp&amp;t=m&amp;brcurrent=3,0x6018895c6bcbd56b:0xb608af34add385fc,0,0x6018895c6f598cb9:0x7c5f245773254cdc&amp;ll=35.676612,139.779482&amp;spn=0.024403,0.048065&amp;z=14&amp;iwloc=A&amp;source=embed' style='color:#0000FF;text-align:left'>大きな地図で見る</a></small>";
}
}

window.onload = function() {
	windowFade();

};
window.onunload = function() {
	windowFade();
};
