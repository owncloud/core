
$(document).ready(function()
{
	if (OC.Autobahn) {
		OC.Autobahn.subscribe('etag-changed-channel', function onMessage(args, kwargs, details) {
				var event = JSON.parse(args[0]);
				console.log("event received", event, details);
				if (event.user !== OC.currentUser) {
					return;
				}
				// TODO: now really do a sync based on the etag
				OCA.Files.App.fileList.reload();
			}
		);
	}
});
