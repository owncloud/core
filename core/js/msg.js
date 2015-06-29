/**
 * @author Clark Tomlinson  <clark@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 */
/**
 * A little class to manage a status field for a "saving" process.
 * It can be used to display a starting message (e.g. "Saving...") and then
 * replace it with a green success message or a red error message.
 *
 * @namespace OC.msg
 */
OC.msg = {
	/**
	 * Displayes a "Saving..." message in the given message placeholder
	 *
	 * @param {Object} selector    Placeholder to display the message in
	 */
	startSaving: function (selector) {
		this.startAction(selector, t('core', 'Saving...'));
	},

	/**
	 * Displayes a custom message in the given message placeholder
	 *
	 * @param {Object} selector    Placeholder to display the message in
	 * @param {string} message    Plain text message to display (no HTML allowed)
	 */
	startAction: function (selector, message) {
		$(selector).text(message)
			.removeClass('success')
			.removeClass('error')
			.stop(true, true)
			.show();
	},

	/**
	 * Displayes an success/error message in the given selector
	 *
	 * @param {Object} selector    Placeholder to display the message in
	 * @param {Object} response    Response of the server
	 * @param {Object} response.data    Data of the servers response
	 * @param {string} response.data.message    Plain text message to display (no HTML allowed)
	 * @param {string} response.status    is being used to decide whether the message
	 * is displayed as an error/success
	 */
	finishedSaving: function (selector, response) {
		this.finishedAction(selector, response);
	},

	/**
	 * Displayes an success/error message in the given selector
	 *
	 * @param {Object} selector    Placeholder to display the message in
	 * @param {Object} response    Response of the server
	 * @param {Object} response.data Data of the servers response
	 * @param {string} response.data.message Plain text message to display (no HTML allowed)
	 * @param {string} response.status is being used to decide whether the message
	 * is displayed as an error/success
	 */
	finishedAction: function (selector, response) {
		if (response.status === "success") {
			this.finishedSuccess(selector, response.data.message);
		} else {
			this.finishedError(selector, response.data.message);
		}
	},

	/**
	 * Displayes an success message in the given selector
	 *
	 * @param {Object} selector Placeholder to display the message in
	 * @param {string} message Plain text success message to display (no HTML allowed)
	 */
	finishedSuccess: function (selector, message) {
		$(selector).text(message)
			.addClass('success')
			.removeClass('error')
			.stop(true, true)
			.delay(3000)
			.fadeOut(900)
			.show();
	},

	/**
	 * Displayes an error message in the given selector
	 *
	 * @param {Object} selector Placeholder to display the message in
	 * @param {string} message Plain text error message to display (no HTML allowed)
	 */
	finishedError: function (selector, message) {
		$(selector).text(message)
			.addClass('error')
			.removeClass('success')
			.show();
	}
};
