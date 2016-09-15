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

		comparator: null,

		/**
		 * Sort direction: 'asc' or 'desc'
		 * @type String
		 */
		_sortDirection: 'asc',

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

			this.comparator = FileInfoCollection.name;
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
		},

		setSort: function(sortName, sortDirection) {
			var comparator = FileInfoCollection.Comparators[sortName];
			if (!comparator) {
				throw 'No comparator found for sort name "' + sortName + '"';
			}
			if (sortDirection !== 'asc' && sortDirection !== 'desc') {
				throw 'Invalid sort direction "' + sortDirection + '"';
			}

			if (sortDirection === 'desc') {
				this.comparator = function(fileInfo1, fileInfo2) {
					return -comparator(fileInfo1, fileInfo2);
				};
			} else {
				this.comparator = comparator;
			}
		}
	});

	/**
	 * Sort comparators.
	 * @namespace OCA.Files.FileInfoCollection.Comparators
	 * @private
	 */
	FileInfoCollection.Comparators = {
		/**
		 * Compares two file infos by name, making directories appear
		 * first.
		 *
		 * @param {OC.Files.FileInfo} fileInfo1 file info
		 * @param {OC.Files.FileInfo} fileInfo2 file info
		 * @return {int} -1 if the first file must appear before the second one,
		 * 0 if they are identify, 1 otherwise.
		 */
		name: function(fileInfo1, fileInfo2) {
			if (fileInfo1.isDirectory() && !fileInfo2.isDirectory()) {
				return -1;
			}
			if (!fileInfo1.isDirectory() && fileInfo2.isDirectory()) {
				return 1;
			}
			return OC.Util.naturalSortCompare(fileInfo1.get('name'), fileInfo2.get('name'));
		},
		/**
		 * Compares two file infos by size.
		 *
		 * @param {OC.Files.FileInfo} fileInfo1 file info
		 * @param {OC.Files.FileInfo} fileInfo2 file info
		 * @return {int} -1 if the first file must appear before the second one,
		 * 0 if they are identify, 1 otherwise.
		 */
		size: function(fileInfo1, fileInfo2) {
			var result = fileInfo1.get('size') - fileInfo2.get('size');
			if (result === 0) {
				return FileInfoCollection.Comparators.name(fileInfo1, fileInfo2);
			}
			return result;
		},
		/**
		 * Compares two file infos by timestamp.
		 *
		 * @param {OC.Files.FileInfo} fileInfo1 file info
		 * @param {OC.Files.FileInfo} fileInfo2 file info
		 * @return {int} -1 if the first file must appear before the second one,
		 * 0 if they are identify, 1 otherwise.
		 */
		mtime: function(fileInfo1, fileInfo2) {
			var result = fileInfo1.get('mtime') - fileInfo2.get('mtime');
			if (result === 0) {
				return FileInfoCollection.Comparators.name(fileInfo1, fileInfo2);
			}
			return result;
		}
	};

	if (!OCA.Files) {
		OCA.Files = {};
	}
	OCA.Files.FileInfoCollection = FileInfoCollection;

})(OC, OCA);

