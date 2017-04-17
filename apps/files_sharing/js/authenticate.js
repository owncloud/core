 $(document).ready(function(){
    $('#password').keyup(function(){
	var n = $('#password').val().length;
		
	if (n > 0) {
        	$('#submit').prop('disabled', false);
	} else {
		$('#submit').prop('disabled', true);
	}
	
    });
}); 
