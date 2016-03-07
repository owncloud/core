$(document).ready(function(){
 	$('#password').on('keyup input change', function() {

		var n = $('#password').val().length;

		if (n > 0) {
			$('#password-submit').prop('disabled', false);
		} else {
			$('#password-submit').prop('disabled', true);
		}
	});
});