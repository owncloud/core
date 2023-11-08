/**
 * Copyright (c) 2014, Arthur Schiwon <blizzz@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */

/**
 * takes care of deleting things represented by an ID
 *
 * @class
 * @param {string} endpoint the corresponding ajax PHP script. Currently limited
 * to settings - ajax path.
 * @param {string} paramID the by the script expected parameter name holding the
 * ID of the object to delete
 * @param {markCallback} markCallback function to be called after successfully
 * marking the object for deletion.
 * @param {removeCallback} removeCallback the function to be called after
 * successful delete.
 * @param {undoCallback} undoCallback called after "undo" was clicked
 */
function DeleteHandler(endpoint, paramID, markCallback, removeCallback, undoCallback) {
	this.oidToDelete = false;
	this.canceled = false;

	this.ajaxEndpoint = endpoint;
	this.ajaxParamID = paramID;

	this.markCallback = markCallback;
	this.removeCallback = removeCallback;
	this.undoCallback = undoCallback;
}

/**
 * initializes the delete operation for a given object id
 *
 * @param {string} oid the object id
 */
DeleteHandler.prototype.mark = function(oid) {
	this.oidToDelete = oid;
	this.markCallback(decodeURIComponent(oid));
};

/**
 * executes a delete operation. Requires that the operation has been
 * initialized by mark(). On error, it will show a message via
 * OC.dialogs.alert. On success, a callback is fired so that the client can
 * update the web interface accordingly.
 */
DeleteHandler.prototype.deleteEntry = function() {
	var deferred = $.Deferred();
	if(this.oidToDelete === false) {
		return deferred.resolve().promise();
	}

	var dh = this;

	var payload = {};
	payload[dh.ajaxParamID] = dh.oidToDelete;
	return $.ajax({
		type: 'DELETE',
		url: OC.generateUrl(dh.ajaxEndpoint+'/{oid}',{oid: this.oidToDelete}),
		// FIXME: do not use synchronous ajax calls as they block the browser !
		async: false,
		success: function (result) {
			// Remove undo option, & remove user from table

			//TODO: following line
			dh.removeCallback(dh.oidToDelete);
		},
		error: function (jqXHR) {
			var msg = 'Unknown error';
			if (jqXHR.responseJSON && jqXHR.responseJSON.data && jqXHR.responseJSON.data.message) {
				msg = jqXHR.responseJSON.data.message;
			}
			OC.dialogs.alert(msg, t('settings', 'Unable to delete {objName}', {objName: decodeURIComponent(dh.oidToDelete)}));
			dh.undoCallback(dh.oidToDelete);
		}
	});
};
