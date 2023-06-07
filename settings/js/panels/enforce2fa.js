$(document).ready(function() {

	var enforce2faGroupsList = $('#enforce_2fa_excluded_groups');
	OC.Settings.setupGroupsSelect(enforce2faGroupsList);
	enforce2faGroupsList.change(function(ev) {
		OC.AppConfig.setValue('core', 'enforce_2fa_excluded_groups', JSON.stringify(ev.val || []));
	});

	$('#enforce_2fa').change(function() {
		var name = $(this).attr('name');
		var value;
		if (this.checked) {
			value = 'yes';
		} else {
			value = 'no';
		}
		OC.AppConfig.setValue('core', name, value);
	});
});
