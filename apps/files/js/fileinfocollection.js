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
	 * @class OCA.Files.FileInfoCollection
	 * @classdesc Collection of file information
	 *
	 * @param {Object} attributes file data
	 * @param {int} attributes.id file id
	 * @param {string} attributes.name file name
	 * @param {string} attributes.path path leading to the file,
	 * without the file name and with a leading slash
	 * @param {int} attributes.size size
	 * @param {string} attributes.mimetype mime type
	 * @param {string} attributes.icon icon URL
	 * @param {int} attributes.permissions permissions
	 * @param {Date} attributes.mtime modification time
	 * @param {string} attributes.etag etag
	 * @param {string} mountType mount type
	 *
	 * @since 9.2
	 */
	var FileInfoCollection = OC.Backbone.Collection.extend({
		sync: OC.Backbone.davSync,
		model: OCA.Files.FileInfoModel,

		initialize: function(models, options) {
			options = options || {};

			this.sync = OC.Backbone.davSync;

			this._path = options.path || '';
			this._filesClient = options.filesClient || OC.Files.getClient();
			this._baseUrl = options.baseUrl;
			if (!this._baseUrl) {
				// TODO: enforce this to be injected
				this._baseUrl = OC.joinPaths(
					OC.linkToRemoteBase('dav'),
					'files',
					OC.getCurrentUser().uid
				);
			}
		},

		url: function() {
			return this._baseUrl + '/' + this._path;
		},

		parse: function(results) {
			var baseDir = this._baseUrl;
			results = results.map(function(result) {
				// TODO: assert href is correct ?
				var path = result.href.substr(baseDir.length);
				result.name = OC.basename(path);
				result.path = OC.dirname(path) || '/';
				if (result.name === '') {
					// it's a folder, go one level further
					result.name = OC.basename(result.path);
					result.path = OC.dirname(result.path);
				}
				return result;
			});
			return results;
		}
	});

	if (!OCA.Files) {
		OCA.Files = {};
	}
	OCA.Files.FileInfoCollection = FileInfoCollection;

})(OC, OCA);

