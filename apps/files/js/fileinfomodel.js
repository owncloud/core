/*
 * Copyright (c) 2015
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function(OC, OCA) {

	var NS_OWNCLOUD = 'http://owncloud.org/ns';
	var NS_DAV = 'DAV:';

	function parseEtag(etag) {
		if (etag.charAt(0) === '"') {
			return etag.split('"')[1];
		}
		return etag;
	}

	function parsePermissions(result, isFile) {
		var permString = result.permissions;
		data = {mountType: null};
		for (var i = 0; i < permString.length; i++) {
			var c = permString.charAt(i);
			switch (c) {
				// FIXME: twisted permissions
				case 'C':
				case 'K':
					data.permissions |= OC.PERMISSION_CREATE;
					if (!isFile) {
						data.permissions |= OC.PERMISSION_UPDATE;
					}
					break;
				case 'W':
					data.permissions |= OC.PERMISSION_UPDATE;
					break;
				case 'D':
					data.permissions |= OC.PERMISSION_DELETE;
					break;
				case 'R':
					data.permissions |= OC.PERMISSION_SHARE;
					break;
				case 'M':
					if (!data.mountType) {
						// TODO: how to identify external-root ?
						data.mountType = 'external';
					}
					break;
				case 'S':
					// TODO: how to identify shared-root ?
					data.mountType = 'shared';
					break;
			}
		}
		return data;
	}

	/**
	 * @class OC.Files.FileInfoModel
	 * @classdesc File information
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
	 * @since 8.2
	 */
	var FileInfoModel = OC.Backbone.Model.extend({
		sync: OC.Backbone.davSync,

		//idAttribute: 'href',
		davProperties: {
			/**
			 * File id
			 */
			'fileid': '{' + NS_OWNCLOUD + '}fileid',
			/**
			 * Modified time
			 */
			'mtime': '{' + NS_DAV + '}getlastmodified',
			/**
			 * Etag
			 */
			'etag': '{' + NS_DAV + '}getetag',
			/**
			 * Mime type
			 */
			'mimetype': '{' + NS_DAV + '}getcontenttype',
			/**
			 * Resource type "collection" for folders, empty otherwise
			 */
			'resourceType': '{' + NS_DAV + '}resourcetype',
			/**
			 * Letter-coded permissions
			 */
			'permissions': '{' + NS_OWNCLOUD + '}permissions',
			/**
			 * File sizes
			 */
			'size': '{' + NS_OWNCLOUD + '}size',
			/**
			 * Folder sizes
			 */
			'folderSize': '{' + NS_DAV + '}getcontentlength'
		},

		idAttribute: 'href',

		defaults: {
			mimetype: 'application/octet-stream',
			path: ''
		},

		initialize: function(data, options) {
			options = options || {};
			this.sync = OC.Backbone.davSync;
			this._collection = null;
			if (data && !_.isUndefined(data.id)) {
				data.id = parseInt(data.id, 10);
			}
			if (_.isUndefined(data.path)) {
				throw 'Missing "path" argument';
			}
			this._baseUrl = options.baseUrl;
			if (!this._baseUrl) {
				// TODO: enforce this to be injected
				this._baseUrl = OC.joinPaths(
					OC.linkToRemoteBase('dav'),
					'files',
					OC.getCurrentUser().uid
				);
			}
			this._filesClient = options.filesClient || OC.Files.getClient();
		},

		url: function() {
			return this._baseUrl + '/' + this.get('path');
		},

		/**
		 * Get the collection object for this folder's contents.
		 * The collection is initially unpopulated.
		 *
		 * @return {OCA.Files.FileInfoCollection} collection
		 */
		getCollection: function() {
			if (!this._collection) {
				this._collection = new OCA.Files.FileInfoCollection(null, {
					path: this.get('path')
				});
			}
			return this._collection;
		},

		/**
		 * Returns whether this file is a directory
		 *
		 * @return {boolean} true if this is a directory, false otherwise
		 */
		isDirectory: function() {
			return this.get('mimetype') === 'httpd/unix-directory';
		},

		/**
		 * Returns whether this file is an image
		 *
		 * @return {boolean} true if this is an image, false otherwise
		 */
		isImage: function() {
			if (!this.has('mimetype')) {
				return false;
			}
			return this.get('mimetype').substr(0, 6) === 'image/'
				|| this.get('mimetype') === 'application/postscript'
				|| this.get('mimetype') === 'application/illustrator'
				|| this.get('mimetype') === 'application/x-photoshop';
		},

		/**
		 * Returns the full path to this file
		 *
		 * @return {string} full path
		 */
		getFullPath: function() {
			return OC.joinPaths(this.get('path'), this.get('name'));
		},

		parse: function(result) {
			if (!_.isUndefined(result.folderSize)) {
				result.size = result.folderSize;
				delete result.folderSize;
			}
			result.size = parseInt(result.size, 10);
			result.id = parseInt(result.id, 10);
			if (result.etag) {
				result.etag = parseEtag(result.etag);
			}

			var isFile = true;
			if (!result.mimetype && result.resourceType && result.resourceType.length) {
				var xmlvalue = result.resourceType[0];
				if (xmlvalue.namespaceURI === NS_DAV && xmlvalue.nodeName.split(':')[1] === 'collection') {
					result.mimetype = 'httpd/unix-directory';
					isFile = false;
				}
			}
			delete result.resourceType;
			if (result.permissions) {
				_.extend(result, parsePermissions(result, isFile));
			}
			if (result.mtime) {
				result.mtime = new Date(result.mtime).getTime();
			}
			return result;
		},

		isDirectory: function() {
			return this.get('mimetype') === 'httpd/unix-directory';
		},

		/**
		 * Returns whether the file is a dot file
		 *
		 * @return {boolean} true if the file is a hidden file, false otherwise
		 */
		isHiddenFile: function() {
			return this.get('name').charAt(0) === '.';
		},

		fetch: function(options) {
			options = options || {};
			var success = options.success;
			var error = options.error;
			var self = this;
			return OC.Backbone.davSync('PROPFIND', this, {
				depth: 1,
				includeRoot: true,
				success: function(results) {
					var collection = self.getCollection();
					var rootResult = results.shift();
					self.set(self.parse(rootResult));
					collection.reset(results, {parse: true});
					collection.trigger('sync', 'PROPFIND', collection, options);
					if (success) {
						success.apply(null, arguments);
					}
				},
				error: function() {
					if (error) {
						error.apply(null, arguments);
					}
				}
			});
		},

		getId: function() {
			return this.get('fileid');
		},

		getUploadUrl: function(fileName) {
			var dir = this.getFullPath();
			var pathSections = dir.split('/');
			if (!_.isUndefined(fileName)) {
				pathSections.push(fileName);
			}
			var encodedPath = '';
			_.each(pathSections, function(section) {
				if (section !== '') {
					encodedPath += '/' + encodeURIComponent(section);
				}
			});
			return OC.linkToRemoteBase('webdav') + encodedPath;
		},

		getDownloadUrl: function(files, isDir) {
			return OCA.Files.Files.getDownloadUrl(files, this.getFullPath(), isDir);
		},
	});

	FileInfoModel.getFromPath = function(dir) {
		dir = dir || '/';
		if (dir.charAt(0) !== '/') {
			dir = '/' + dir;
		}
		var attrs = {
			path: OC.dirname(dir),
			name: OC.basename(dir)
		};
		return new OCA.Files.FileInfoModel(attrs);
	};

	if (!OCA.Files) {
		OCA.Files = {};
	}
	OCA.Files.FileInfoModel = FileInfoModel;

})(OC, OCA);

