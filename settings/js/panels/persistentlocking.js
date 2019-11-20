$(document).ready(function() {

	$('#persistentlocking input').change(function () {
		var currentInput = $(this);
		var name = currentInput.attr('name');
		var value = currentInput.val();
		OC.AppConfig.setValue('core', name, value);
	});

});
