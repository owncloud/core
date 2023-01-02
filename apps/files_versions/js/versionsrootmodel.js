/*
 * Copyright (c) 2022
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
		PROPERTY_VERSION_TAG:	'{' + OC.Files.Client.NS_OWNCLOUD + '}meta-version-tag',
	});

	/**
	 * Versions collection root - current file version
	 * 
	 * @memberof OCA.Versions
	 */
	var VersionsRootModel = OC.Backbone.Model.extend({
		sync: OC.Backbone.davSync,

		davProperties: {
			'meta-version-edited-by': OC.Files.Client.PROPERTY_VERSION_EDITED_BY,
			'meta-version-edited-by-name': OC.Files.Client.PROPERTY_VERSION_EDITED_BY_NAME,
			'meta-version-tag':	OC.Files.Client.PROPERTY_VERSION_TAG,
			'id':	OC.Files.Client.PROPERTY_FILEID,
			'getlastmodified': OC.Files.Client.PROPERTY_GETLASTMODIFIED,
			'getcontentlength': OC.Files.Client.PROPERTY_GETCONTENTLENGTH,
			'resourcetype': OC.Files.Client.PROPERTY_RESOURCETYPE,
			'getcontenttype': OC.Files.Client.PROPERTY_GETCONTENTTYPE,
		},

		/**
		 * @var OCA.Files.FileInfoModel
		 */
		 _fileInfo: null,

		setFileInfo: function(fileInfo) {
			this._fileInfo = fileInfo;
		},

		getFileInfo: function() {
			return this._fileInfo;
		},

		parse: function(version) {
			var revision = version.id;
			return {
				id: revision,
				name: revision,
				fullPath: this._fileInfo.getFullPath(),
				timestamp: moment(new Date(this._fileInfo.get('mtime'))).format('X'),
				relativeTimestamp:  moment(new Date(this._fileInfo.get('mtime'))).fromNow(),
				size: this._fileInfo.get('size'),
				mimetype: this._fileInfo.get('mimetype'),
				editedBy: version['meta-version-edited-by'],
				editedByName: version['meta-version-edited-by-name'],
				fileId: this._fileInfo.get('id'),
				versionTag: version['meta-version-tag']
			};
		},

		url: function() {
			// NOTE: same as OCA.Versions.VersionCollection but with depth=0
			return OC.linkToRemoteBase('dav') + '/meta/' +
				encodeURIComponent(this._fileInfo.get('id')) + '/v';
		},

		getFullPath: function() {
			return this._fileInfo.getFullPath();
		},

		getPreviewUrl: function() {
			return OC.linkToRemoteBase('dav') + '/files/' + OC.getCurrentUser().uid + this._fileInfo.getFullPath() + '?preview=1';
		},

		getDownloadUrl: function() {
			return OC.linkToRemoteBase('dav') + '/files/' + OC.getCurrentUser().uid + this._fileInfo.getFullPath();
		},

		/**
		 * Publish a tag for current version
		 */
		publish: function(options) {
			var model = this;
			$.post(OC.generateUrl('/apps/files_versions/publish-version'), { path: this.getFullPath() })
				.done(function() {
					if (options.success) {
						options.success.call(options.context, model, {}, options);
					}
				})
				.fail(function () {
					if (options.error) {
						options.error.call(options.context, model, {}, options);
					}
				});
		},
	});

	OCA.Versions = OCA.Versions || {};

	OCA.Versions.VersionsRootModel = VersionsRootModel;
})();
