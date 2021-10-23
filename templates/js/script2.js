$('#spinner').hide();
$('#error1').hide();
$('#next').on('click', function(){
	let old = document.getElementById('old');

	if(old.value != ""){

	$('#spinner').show().fadeOut(2000);
	$('#page1').fadeOut(1000);
	$('#page2').delay(1000).fadeIn(1000);
	$('#error1').hide();
	$('#error2').hide();

	}else{
		//fill the password field
		$('#error1').show();
	}

});
$('#prev').on('click', function(){
	$('#spinner').show().fadeOut(2000);
	$('#page2').fadeOut(1000);
	$('#page1').delay(1000).fadeIn(1000);
	$('#error1').hide();
	$('#error2').hide();
});
