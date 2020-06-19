$(document).ready(function() {

	$('#persistentlocking input').change(function () {
		var currentInput = $(this);
		var name = currentInput.attr('name');
		var value = currentInput.val();

		var minRange = currentInput.attr('min');
		var maxRange = currentInput.attr('max');

		// range validation (mainly for firefox) to prevent saving wrong values
		var isValid = true;
		if (minRange !== undefined && value < minRange) {
			isValid = false;
		}
		if (maxRange !== undefined && value > maxRange) {
			isValid = false;
		}

		if (isValid) {
			OC.AppConfig.setValue('core', name, value);
		}
		// browser should take care of the visual indication if the value
		// isn't in the range
	});

});
