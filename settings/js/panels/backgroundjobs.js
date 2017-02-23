$(document).ready(function() {

	$('#backgroundjobs span.crondate').tipsy({gravity: 's', live: true});

	$('#backgroundjobs input').change(function () {
		if ($(this).is(':checked')) {
			var mode = $(this).val();
			if (mode === 'ajax' || mode === 'webcron' || mode === 'cron') {
				OC.AppConfig.setValue('core', 'backgroundjobs_mode', mode);
				// clear cron errors on background job mode change
				OC.AppConfig.deleteKey('core', 'cronErrors');
			}
		}
	});

});
