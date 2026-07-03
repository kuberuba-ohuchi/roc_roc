// ÉXÉNÉçÅ[Éã
(function() {

	$(function() {
		$.jscript.Pagetop();
	});


	$.jscript = {
		
		Pagetop: function(){ 
				$('a[href^=#pa_]').click(function () {
					$(this).blur();
					var href = $(this).attr("href");
					var topPx = $(href).offset().top + adjPosition;
					$('html,body').animate({ scrollTop: topPx }, 1000, "swing");
					return false;
				});

		}
	
	};
})();
