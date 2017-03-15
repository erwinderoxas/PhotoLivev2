(function(){
	var video = document.getElementById('video'),
		vendorUrl = window.URL || window.webkitURL;

	navigator.getMedia = navigator.getUserMedia ||
						 navigator.webkitGetUserMedia ||
						 navigator.mozGetUserMedia ||
						 navigator.msGetUsermedia;

	navigator({
		video:true,
		audio:false
	},function(stream){
		video.src = vendorUrl.createObject(stream);
		video.play();
	}function(error){
		
	});
})();