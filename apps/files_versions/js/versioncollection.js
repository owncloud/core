/*
 * Copyright (c) 2015
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function() {
	/**
	 * @memberof OCA.Versions
	 */
	var VersionCollection = OC.Backbone.Collection.extend({
		sync: OC.Backbone.davSync,

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
			var results = _.map(result, function(version) {
				var revision = parseInt(version.id, 10);
				return {
					id: revision,
					name: revision,
					fullPath: fullPath,
					timestamp: revision,
					versionId: revision,
					size: version['{DAV:}getcontentlength'],
					fileId: fileId
				};
			});
			return results;
		}
	});

	OCA.Versions = OCA.Versions || {};

	OCA.Versions.VersionCollection = VersionCollection;
})();

