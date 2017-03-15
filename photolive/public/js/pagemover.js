function loadPage2()
{
	window.location.href = "page2.php";
	// $.ajax({
	//   url: "welcome.blade.php",
	//   cache: false,
	//   success: function(html){
	// 	$("#wrapper").hide().html(html).fadeIn('slow');
	//   }
	// });
}

function loadPage3()
{
	window.location.href = "page2.php";
// 	$.ajax({
// 	  url: "welcome.blade.php",
// 	  cache: false,
// 	  success: function(html){
// 		$("#wrapper").hide().html(html).fadeIn('slow');
// 	  }
// 	});
}

function loadPage4()
{
	$.ajax({
	  url: "upload.php",
	  cache: false,
	  success: function(html){
		$("#wrapper").hide().html(html).fadeIn('slow');
	  }
	});
}

function loadPageMail()
{
	$('img.share').fadeOut();
	$.ajax({
	  url: "mail.html",
	  cache: false,
	  success: function(html){
		$("#wrapper").hide().html(html).fadeIn('slow');
	  }
	});
}

function loadPageFB()
{
	$.ajax({
	  url: "fb.php",
	  cache: true,
	  success: function(html) {
	  }
	});
}

function loadPageTwit()
{
	$.ajax({
	  url: "twit.php",
	  cache: false,
	  success: function(html){
		loadPage9();
	  }
	});
}



function loadPage9()
{
	$.ajax({
	  url: "page9.php",
	  cache: false,
	  success: function(html){
		$("#wrapper").hide().html(html).fadeIn('slow');
	  }
	});
}

function checkEmail(myEmail) {
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myEmail)) {
	$('#send').css('visibility', 'visible');
	return (true)
	} else {
	$('#send').css('visibility', 'hidden');
	return (false)
	}
}

function showHint(email,news)
{
	$('#back').fadeOut();
	$('.emailtxtbox').attr('disabled', 'true');
	
	if(news=='yes') {
		$('#no').fadeOut();
	} else {
		$('#yes').fadeOut();
	}
	$('#sent').html('<span class="message">Please wait...</span><br><img src="./images/ajax-loader.gif">');
	$.ajax({
	   type: "POST",
	   url: "mail_smtp_basic.php",
	   data: "q="+email + "&news="+news,
	   success: function(msg){
		loadPage9();
	   }
	 });

}

$(document).ready(function(){

	$('.button').attr('disabled', false);

	$('.single').live('click',function() {
		$('#display').hide().attr('src', "photo-bg/single.jpg").fadeIn();
		$('#picSize').val('polaroid');
	});
	
	$('.strip').live('click',function() {
		$('#display').hide().attr('src', 'photo-bg/strip.jpg').fadeIn();
		$('#picSize').val('strip');
	});
	
	$('.square').live('click',function() {
		$('#display').hide().attr('src', 'photo-bg/square.jpg').fadeIn();
		$('#picSize').val('booth');
	});
	
	$('.mail').live('click',function() {
		$('.mail').attr('disabled', true);
		$('.fb').fadeOut();
		$('.twit').fadeOut();
		$('#shared').html('<span class="message">Please wait...</span><br><img src="./images/ajax-loader.gif">');
	});
	
	$('.fb').live('click',function() {
		$('.fb').attr('disabled', true);
		$('.mail').fadeOut();
		$('.twit').fadeOut();
		$('#shared').html('<span class="message">Please wait...</span><br><img src="./images/ajax-loader.gif">');
	});
	
	$('.twit').live('click',function() {
		$('.twit').attr('disabled', true);
		$('.mail').fadeOut();
		$('.fb').fadeOut();
		$('#shared').html('<span class="message">Please wait...</span><br><img src="./images/ajax-loader.gif">');
	});
	

});

