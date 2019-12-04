/**
 * Phoenix integration
 */

(function() {

	$(document).ready(function() {
		if (!$('body').hasClass('phoenix')) {
			// Phoenix not detected
			return;
		}

		window.addEventListener('message', function(e) {
			// FIXME: check origin to be from Phoenix domain
			//console.log('Received message: ', arguments);
			if (e.data) {
				console.log('Received message: ', e.data);
			}
		}, false);
	});
})();

