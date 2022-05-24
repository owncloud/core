$(document).ready(function() {

	$('#fileSharingSettings input').change(function() {
		var value = 'no';
		if (this.checked) {
			value = 'yes';
		}
		var app = (this.id !== 'autoAcceptTrusted') ? 'files_sharing' : 'federatedfilesharing';
		OC.AppConfig.setValue(app, $(this).attr('name'), value);
	});

	$('.section .icon-info').tipsy({gravity: 'w'});
});
