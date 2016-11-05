/*
 * Copyright (c) 2015
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function(OC) {
	/**
	 * @class OCA.SystemTags.SystemTagsCollection
	 * @classdesc
	 *
	 * System tag
	 *
	 */
	var SystemTagModel = OC.Backbone.Model.extend(
		/** @lends OCA.SystemTags.SystemTagModel.prototype */ {
		sync: OC.Backbone.davSync,

		defaults: {
			userVisible: true,
			userAssignable: true,
			canAssign: true
		},

		davProperties: {
			'id': 				OC.CLIENT.PROPERTY.FILEID,
			'name': 			OC.CLIENT.PROPERTY.DISPLAYNAME,
			'userVisible': 		OC.CLIENT.PROPERTY.USERVISIBLE,
			'userAssignable': 	OC.CLIENT.PROPERTY.USERASSIGNABLE,
			// read-only, effective permissions computed by the server,
			'canAssign': 		OC.CLIENT.PROPERTY.CAN_ASSIGN
		},

		parse: function(data) {
			return {
				id: data.id,
				name: data.name,
				userVisible: data.userVisible === true || data.userVisible === 'true',
				userAssignable: data.userAssignable === true || data.userAssignable === 'true',
				canAssign: data.canAssign === true || data.canAssign === 'true'
			};
		}
	});

	OC.SystemTags = OC.SystemTags || {};
	OC.SystemTags.SystemTagModel = SystemTagModel;
})(OC);
