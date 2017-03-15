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
			return OC.linkToOCS('apps/files_sharing/api/v1/shares', 2) +
				encodeURIComponent(this.id) +
				'?' + OC.buildQueryString(params);
		}
	});

	OC.Share = OC.Share || {};
	OC.Share.ShareModel = ShareModel;
})();
