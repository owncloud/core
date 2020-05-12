$(document).ready(function() {
	$('#license_input_button').click(function () {
		var license = $('#license_input_text').val();

		if (license !== '') {
			$.post(OC.generateUrl('/license/license'), {
				licenseString: license
			}).done(function () {
				location.reload();
			});
		}
	})
});
