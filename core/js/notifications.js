/**
 * @author Clark Tomlinson  <clark@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 */
/**
 * @todo Write documentation
 * @namespace
 */
OC.Notification={
	queuedNotifications: [],
	getDefaultNotificationFunction: null,
	notificationTimer: 0,

	/**
	 * @param callback
	 * @todo Write documentation
	 */
	setDefault: function(callback) {
		OC.Notification.getDefaultNotificationFunction = callback;
	},

	/**
	 * Hides a notification
	 * @param callback
	 * @todo Write documentation
	 */
	hide: function(callback) {
		$('#notification').fadeOut('400', function(){
			if (OC.Notification.isHidden()) {
				if (OC.Notification.getDefaultNotificationFunction) {
					OC.Notification.getDefaultNotificationFunction.call();
				}
			}
			if (callback) {
				callback.call();
			}
			$('#notification').empty();
			if(OC.Notification.queuedNotifications.length > 0){
				OC.Notification.showHtml(OC.Notification.queuedNotifications[0]);
				OC.Notification.queuedNotifications.shift();
			}
		});
	},

	/**
	 * Shows a notification as HTML without being sanitized before.
	 * If you pass unsanitized user input this may lead to a XSS vulnerability.
	 * Consider using show() instead of showHTML()
	 * @param {string} html Message to display
	 */
	showHtml: function(html) {
		var notification = $('#notification');
		if((notification.filter('span.undo').length == 1) || OC.Notification.isHidden()){
			notification.html(html);
			notification.fadeIn().css('display','inline-block');
		}else{
			OC.Notification.queuedNotifications.push(html);
		}
	},

	/**
	 * Shows a sanitized notification
	 * @param {string} text Message to display
	 */
	show: function(text) {
		var notification = $('#notification');
		if((notification.filter('span.undo').length == 1) || OC.Notification.isHidden()){
			notification.text(text);
			notification.fadeIn().css('display','inline-block');
		}else{
			OC.Notification.queuedNotifications.push($('<div/>').text(text).html());
		}
	},


	/**
	 * Shows a notification that disappears after x seconds, default is
	 * 7 seconds
	 * @param {string} text Message to show
	 * @param {array} [options] options array
	 * @param {int} [options.timeout=7] timeout in seconds, if this is 0 it will show the message permanently
	 * @param {boolean} [options.isHTML=false] an indicator for HTML notifications (true) or text (false)
	 */
	showTemporary: function(text, options) {
		var defaults = {
				isHTML: false,
				timeout: 7
			},
			options = options || {};
		// merge defaults with passed in options
		_.defaults(options, defaults);

		// clear previous notifications
		OC.Notification.hide();
		if(OC.Notification.notificationTimer) {
			clearTimeout(OC.Notification.notificationTimer);
		}

		if(options.isHTML) {
			OC.Notification.showHtml(text);
		} else {
			OC.Notification.show(text);
		}

		if(options.timeout > 0) {
			// register timeout to vanish notification
			OC.Notification.notificationTimer = setTimeout(OC.Notification.hide, (options.timeout * 1000));
		}
	},

	/**
	 * Returns whether a notification is hidden.
	 * @return {boolean}
	 */
	isHidden: function() {
		return ($("#notification").text() === '');
	}
};
