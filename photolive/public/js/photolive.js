function loadPage2()
{
	$.ajax({
		url:"page2.html",
		cache:false,
		success:function(html){
			$("#wrapper").hide().html(html).fadeIn('slow');
		}
	});
}
