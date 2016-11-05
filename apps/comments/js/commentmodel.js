/*
 * Copyright (c) 2016
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function(OC, OCA) {
	/**
	 * @class OCA.Comments.CommentModel
	 * @classdesc
	 *
	 * Comment
	 *
	 */
	var CommentModel = OC.Backbone.Model.extend(
		/** @lends OCA.Comments.CommentModel.prototype */ {
		sync: OC.Backbone.davSync,

		defaults: {
			actorType: 'users',
			objectType: 'files'
		},

		davProperties: {
			'id': 				OC.CLIENT.PROPERTY.FILEID,
			'message': 			OC.CLIENT.PROPERTY.MESSAGE,
			'actorType': 		OC.CLIENT.PROPERTY.ACTORTYPE,
			'actorId': 			OC.CLIENT.PROPERTY.ACTORID,
			'actorDisplayName': OC.CLIENT.PROPERTY.ACTORDISPLAYNAME,
			'creationDateTime': OC.CLIENT.PROPERTY.CREATEIONDATETIME,
			'objectType': 		OC.CLIENT.PROPERTY.OBJECTTYPE,
			'objectId':			OC.CLIENT.PROPERTY.OBJECTID,
			'isUnread':			OC.CLIENT.PROPERTY.ISUNREAD
		},

		parse: function(data) {
			return {
				id: data.id,
				message: data.message,
				actorType: data.actorType,
				actorId: data.actorId,
				actorDisplayName: data.actorDisplayName,
				creationDateTime: data.creationDateTime,
				objectType: data.objectType,
				objectId: data.objectId,
				isUnread: (data.isUnread === 'true')
			};
		}
	});

	OCA.Comments.CommentModel = CommentModel;
})(OC, OCA);
