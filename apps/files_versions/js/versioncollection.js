/*
 * Copyright (c) 2015
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* global moment */

(function() {

	_.extend(OC.Files.Client, {
		PROPERTY_FILEID:	'{' + OC.Files.Client.NS_OWNCLOUD + '}id',
		PROPERTY_VERSION_EDITED_BY:	'{' + OC.Files.Client.NS_OWNCLOUD + '}meta-version-edited-by',
	});

	/**
	 * @memberof OCA.Versions
	 */
	var VersionCollection = OC.Backbone.Collection.extend({
		sync: OC.Backbone.davSync,

		davProperties: {
<<<<<<< HEAD
			'meta-version-edited-by':	OC.Files.Client.PROPERTY_VERSION_EDITED_BY,
=======
			'metaversioneditedby':	OC.Files.Client.PROPERTY_VERSION_EDITED_BY,
>>>>>>> 640386028e (add mock of version metadata)
			'id':	OC.Files.Client.PROPERTY_FILEID,
			'getlastmodified': OC.Files.Client.PROPERTY_GETLASTMODIFIED,
			'getcontentlength': OC.Files.Client.PROPERTY_GETCONTENTLENGTH,
			'resourcetype': OC.Files.Client.PROPERTY_RESOURCETYPE,
			'getcontenttype': OC.Files.Client.PROPERTY_GETCONTENTTYPE,
		},

		model: OCA.Versions.VersionModel,

		/**
		 * @var OCA.Files.FileInfoModel
		 */
		_fileInfo: null,

		url: function() {
			return OC.linkToRemoteBase('dav') + '/meta/' +
				encodeURIComponent(this._fileInfo.get('id')) + '/v';
		},

		setFileInfo: function(fileInfo) {
			this._fileInfo = fileInfo;
		},

		getFileInfo: function() {
			return this._fileInfo;
		},

		parse: function(result) {
			var fullPath = this._fileInfo.getFullPath();
			var fileId = this._fileInfo.get('id');
			return _.map(result, function(version) {
				var revision = version.id;
				return {
					id: revision,
					name: revision,
					fullPath: fullPath,
					timestamp: moment(new Date(version.getlastmodified)).format('X'),
					size: version.getcontentlength,
					mimetype: version.getcontenttype,
<<<<<<< HEAD
					editedBy: version['meta-version-edited-by'],
=======
					editedBy: version.metaversioneditedby,
>>>>>>> 640386028e (add mock of version metadata)
					fileId: fileId
				};
			});
		}
	});

	OCA.Versions = OCA.Versions || {};

	OCA.Versions.VersionCollection = VersionCollection;
})();

