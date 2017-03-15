/*
 * Copyright (c) 2017
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function() {
	/**
	 * @class OC.Share.ShareModel
	 * @classdesc
	 *
	 * Represents a single share.
	 */
	var ShareModel = OC.Backbone.Model.extend({
		url: function() {
			var params = {
				format: 'json'
			};
			var idPart = '';
			// note: unsaved new models have no ids at first but need a POST URL
			if (!_.isUndefined(this.id)) {
				idPart = '/' + encodeURIComponent(this.id);
			}
			return OC.linkToOCS('apps/files_sharing/api/v1', 2) +
				'shares' +
				idPart +
				'?' + OC.buildQueryString(params);
		},

		parse: function(data) {
			if (data.ocs && data.ocs.data) {
				// parse out of the ocs response
				data = data.ocs.data;
			}

			// parse the non-camel to camel
			if (data.share_type === OC.Share.SHARE_TYPE_LINK) {
				data.password = data.share_with;
				delete data.share_with;
			}

			data.itemSource = data.item_source;
			delete data.item_source;
			data.itemType = data.item_type;
			delete data.item_type;

			// convert the inconsistency... (read as expiration, saved as expireDate...)
			if (data.expiration && !data.expireDate) {
				data.expireDate = data.expiration;
				delete data.expiration;
			}
			return data;
		}
	});

	OC.Share = OC.Share || {};
	OC.Share.ShareModel = ShareModel;
})();
