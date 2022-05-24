$(document).ready(function() {

	var lockBreakersGroupsList = $('#lock_breakers_groups_list');
	OC.Settings.setupGroupsSelect(lockBreakersGroupsList);
	lockBreakersGroupsList.change(function(ev) {
		OC.AppConfig.setValue('core', 'lock-breaker-groups', JSON.stringify(ev.val || []));
	});

	$('#persistentlocking input').change(function () {
		var currentInput = $(this);
		var name = currentInput.attr('name');
		var isValid = true;
		var app = '';
		var value = '';

		// handled above
		if (name === 'lock_breakers_groups_list') {
			return;
		}
		if (name === 'enable_lock_file_action') {
			app = 'files';
			if (this.checked) {
				value = 'yes';
			} else {
				value = 'no';
			}
		} else {
			app = 'core';
			value = currentInput.val();
			var minRange = currentInput.attr('min');
			var maxRange = currentInput.attr('max');

			// range validation (mainly for firefox) to prevent saving wrong values
			if (minRange !== undefined && value < minRange) {
				isValid = false;
			}
			if (maxRange !== undefined && value > maxRange) {
				isValid = false;
			}
		}

		if (isValid) {
			OC.AppConfig.setValue(app, name, value);
		}
		// browser should take care of the visual indication if the value
		// isn't in the range
	});

});
