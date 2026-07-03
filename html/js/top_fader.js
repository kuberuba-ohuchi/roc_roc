function windowFade(){
	$('a.fade').click(function() {
		var url = $(this).attr("href");
		$('#accordion_wrap').animate({"opacity":0},500);
		$('#footer').animate({"opacity":0},500);
		$('#toparea').animate({"opacity":0},500,function(){
			location.href = url;
		});
		return false;
	});

	tid = setTimeout("s1change()", 3000);
};

function s1change(){
	clearTimeout(tid);
	$('#accordion_wrap').animate({"opacity":100},3000);
	$('#top_startimg').animate({"opacity":0},1000,function(){
		$(this).css("width", "0px");
	});
}

if(window.addEventListener) {
	window.addEventListener("load", windowFade, false);
}
else if(window.attachEvent) {
	window.attachEvent("onload", windowFade);
}

$(function(){
    //初期化 ============================//
    var visibleAreaW = "760px";
    var visibleAreaH = "595px";
    var dtWidth = "95px";
    var ddWidth = "380px";
    //表示エリアwidth指定
    $("#accordion_wrap").css({"width": visibleAreaW , "height": visibleAreaH});
    //各パネル幅指定
    $("#accordion_wrap dl").css({"width": visibleAreaW,"height": visibleAreaH});
    //各パネル dt(見出し)幅指定
    $("#accordion_wrap dl dt").css({"width": dtWidth , "height": visibleAreaH});
    //各パネル dt span幅指定
    $("#accordion_wrap dl dt span").css({"width": dtWidth, "height": visibleAreaH});
    //各パネル dd(内容)幅指定
    $("#accordion_wrap dd").css({"width":  ddWidth , "height":  visibleAreaH});
    //パネル ddに子要素(p)追加
    $("#accordion_wrap dl dd").wrapInner("<p></p>")
    //子要素アニメーション対策のため幅指定
    $("#accordion_wrap dd p").css({"width": ddWidth, "height":  visibleAreaH});
    //=================================//
 
    //初めのdd要素以外をwidth:0に設定
    $("#accordion_wrap dd:not(:first)").css({"width":"0px"})
    //初めのdd要素のspanにselectedクラスを追加
    $("#accordion_wrap dt:first span").addClass("selected");
 
    //dtクリック時
    $("#accordion_wrap dl dt").click(function() {
        //クリックされたdtのdd要素の横幅が0の場合処理
        if($("+dd",this).css("width")=="0px") {
            //selectedクラスを含むdt(現在展開中)のddの横幅をwidth:0に設定
            $("dt:has(.selected) +dd").animate({"width":"0px"});
            //クリックされたdtのdd要素の横幅を広げる
            $("+dd",this).animate({"width": ddWidth});
            //一旦全てのspan要素からselectedクラスを取り除く
            $("dt span").removeClass("selected");
            //dd要素内のspan要素にselectedクラスを追加
            $("span", this).addClass("selected");
        }
    }).mouseover(function() {
        $("span",this).addClass("over");
    }).mouseout(function() {
        $("span",this).removeClass("over");
    });
});
