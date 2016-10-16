$(document).ready(function(){
	
	//таймер
	var clock = $('.your-clock').FlipClock({
		clockFace : "DailyCounter",
		autoStart : false,
		language: "russian",
		callbacks : {
			stop : function() {
				$(".message").html("Время прошло");
			}
		}
	});
	// Дата окончания конкурса:
	var dt = "Oct 21 2016 20:22:20";
	// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	var first = new Date(dt);
	var last = Date.now();
	var remaining = first - last;
	remaining /= 1000;
	
	clock.setTime(remaining);
	clock.setCountdown(true);
	clock.start();
	
	//табы
	$(".tab_item").not(":first").hide();
	$(".wrapper .tab").click(function() {
		$(".wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
		$(".tab_item").hide().eq($(this).index()).fadeIn()
	}).eq(0).addClass("active");
	
	setTimeout(function() {
		$('input[type="checkbox"], select').styler();
	}, 100)
	
});