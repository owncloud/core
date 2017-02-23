$(document).ready(function () {
	// Show token views
	var collection = new OC.Settings.AuthTokenCollection();
	var view = new OC.Settings.AuthTokenView({
		collection: collection
	});
	view.reload();
});
