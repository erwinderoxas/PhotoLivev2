$(document).ready(function(){

		$(function() {
			try {
			$('#status').html("Image 0 of " + max);
			$('#webcam').createWebCam().fadeIn();
			$('#capture').click(function() {
				$(this).css('visibility', 'hidden');
				var sec = 5;
				var loop = 1;
				var timer = setInterval(function() {
					if (!sec <= 0) {
						$('#status').text("Image " + loop + " of " + max);
						$('#count').text(sec);
						$('#webcam').getWebCam().reset();
						sec--;
					} else {
						$('#count').text('');
						sec = 5;
						$('#webcam').getWebCam().capture(function(json) {
							if (loop==max) {
								clearInterval(timer);
								if (json.type=="success") {
									$.ajax({
										url: dest_url,
										cache: false,
										success: function(html) {
											loadPage4();
										}
									});
									$('#picSize').val('polaroid');
								} else if (json.type == "error") {
									clearInterval(timer);
									console.log('ERROR: '+json.msg);
								}
							}
							loop++;
						});
					}
				}, 1000);
			});
			
			refresh();
			} catch(e) {
			}
			
		});
	function imageRefresh() {
		$("#images li").hover(function() {
					console.log('grande');
					$(this).css({'z-index' : '10'});
					$(this).children().addClass("hover").stop().animate({ 
							top: '10%', 
							left: '-30%', 
							width: '100px', 
							height: '100px' 
						}, 200);
		
					} , function() {
					$(this).css({'z-index' : '0'});
					$(this).children().removeClass("hover").stop().animate({
							top: '0', 
							left: '0', 
							width: '50px', 
							height: '50px', 
						}, 400);
		
				});
	}

});