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
		PROPERTY_VERSION_EDITED_BY_NAME:	'{' + OC.Files.Client.NS_OWNCLOUD + '}meta-version-edited-by-name',
		PROPERTY_VERSION_STRING:	'{' + OC.Files.Client.NS_OWNCLOUD + '}meta-version-string',
		PROPERTY_VERSION_IS_CURRENT:	'{' + OC.Files.Client.NS_OWNCLOUD + '}meta-version-is-current',
	});

	/**
	 * @memberof OCA.Versions
	 */
	var VersionCollection = OC.Backbone.Collection.extend({
		sync: OC.Backbone.davSync,

		davProperties: {
			'meta-version-edited-by':	OC.Files.Client.PROPERTY_VERSION_EDITED_BY,
			'meta-version-edited-by-name':	OC.Files.Client.PROPERTY_VERSION_EDITED_BY_NAME,
			'meta-version-string':	OC.Files.Client.PROPERTY_VERSION_STRING,
			'meta-version-is-current':	OC.Files.Client.PROPERTY_VERSION_IS_CURRENT,
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
					relativeTimestamp:  moment(new Date(version.getlastmodified)).fromNow(),
					size: version.getcontentlength,
					mimetype: version.getcontenttype,
					editedBy: version['meta-version-edited-by'],
					editedByName: version['meta-version-edited-by-name'],
					fileId: fileId,
					versionString: version['meta-version-string'],
					isCurrent: version['meta-version-is-current'] === '1',
				};
			});
		}
	});

	OCA.Versions = OCA.Versions || {};

	OCA.Versions.VersionCollection = VersionCollection;
})();

