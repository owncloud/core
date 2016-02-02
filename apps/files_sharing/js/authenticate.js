$(document).ready(function(){
	$('#password').on('keyup input change', function() {
		var n = $('#password').val().length;

		if (n > 0) {
			$('#submit').prop('disabled', false);
		} else {
			$('#submit').prop('disabled', true);
		}
	});
});
