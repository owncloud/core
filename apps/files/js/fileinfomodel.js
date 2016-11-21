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

	function splitUrl(href, baseUrl) {
		var s = decodeURIComponent(_.str.rtrim(href.substr(baseUrl.length), '/'));
		return [OC.dirname(s), OC.basename(s)];
	}

	function parseEtag(etag) {
		if (etag.charAt(0) === '"') {
			return etag.split('"')[1];
		}
		return etag;
	}

	function parsePermissions(result, isFile) {
		var permString = result.permissions;
		data = {
			mountType: null,
			permissions: OC.PERMISSION_READ
		};
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
			 * Folder sizes
			 */
			'folderSize': '{' + NS_OWNCLOUD + '}size',
			/**
			 * File sizes
			 */
			'size': '{' + NS_DAV + '}getcontentlength'
		},

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
			if (options.davProperties) {
				this.davProperties = options.davProperties;
			}
		},

		url: function() {
			return OC.joinPaths(this._baseUrl, this.getFullPath());
		},

		/**
		 * Get the collection object for this folder's contents.
		 * The collection is initially unpopulated.
		 *
		 * @return {OCA.Files.FileInfoCollection} children collection
		 */
		getChildrenCollection: function() {
			if (!this._childrenCollection) {
				this._childrenCollection = new OCA.Files.FileInfoCollection(null, {
					path: this.get('path')
				});
			}
			return this._childrenCollection;
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
			result.id = parseInt(result.fileid, 10);
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

			if (!result.path && !result.name) {
				var parts = splitUrl(result.href, this._baseUrl);
				result.path = parts[0];
				result.name = parts[1];
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
			var model = this;
			var deferred = $.Deferred();
			options = _.extend({depth: 0}, options || {});
			var success = options.success;
			var error = options.error;
			var self = this;
			var depth = options.depth;

			OC.Backbone.davSync('PROPFIND', this, {
				depth: depth,
				includeRoot: true,
				success: function(results) {
					if (depth === 0) {
						self.set(self.parse(results));
					} else {
						var rootResult = results.shift();
						self.set(self.parse(rootResult));

						// also populate children collection
						var collection = self.getChildrenCollection();
						collection.reset(results, {parse: true});
						collection.trigger('sync', 'PROPFIND', collection, options);
					}

					if (success) {
						success.apply(null, arguments);
					}
					deferred.resolve(model, options);
				},
				error: function() {
					if (error) {
						error.apply(null, arguments);
					}
					deferred.reject.call(deferred, arguments);
				}
			});

			return deferred.promise();
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

		/**
		 * Returns the path leading to this file.
		 * The path doesn't contain the file's name.
		 *
		 * @return {String} path
		 */
		getPath: function() {
			return this.get('path');
		},

		/**
		 * Returns the name of this file without path.
		 *
		 * @return {string} name
		 */
		getName: function() {
			return this.get('name');
		},

		/**
		 * Lock file in busy state
		 *
		 * @param {bool} busyState busyState
		 */
		setBusy: function(busyState) {
			busyState = !!busyState;
			if (busyState !== this._busyState) {
				this._busyState = busyState;
				this.trigger('busy', this, {busy: busyState});
			}
		},

		/**
		 * Rename the model and returns a clone of the renamed model.
		 * If the model is in a collection, the old model will be removed
		 * and the new one added automatically.
		 *
		 * @return {Promise<OCA.Files.FileInfoModel>} promise that resolves to new model
		 * representing the renamed entry
		 */
		rename: function(newName) {
			var model = this;
			var deferred = $.Deferred();
			var sourcePath = model.getFullPath();
			var targetPath = OC.joinPaths(model.getPath(), newName);

			this._filesClient.move(sourcePath, targetPath)
				.done(function() {
					var collection = model.collection;
					var newModel = model.clone();
					if (collection) {
						collection.remove(model, {sort: false});
					}
					newModel.set('name', newName, {silent: true});
					if (collection) {
						collection.add(newModel, {sort: true});
					}
					deferred.resolve(status, newModel);
				})
				.fail(function(status) {
					deferred.reject(status);
				});

			return deferred.promise();
		},

		/**
		 * Move this file/folder to the given target path.
		 *
		 * @param {String} targetPath full path including the target name
		 */
		move: function(targetPath) {
			var deferred = $.Deferred();
			var model = this;

			this._filesClient.move(model.getFullPath(), targetPath)
				.done(function() {
					var collection = model.collection;
					var newModel = model.clone();
					newModel.set({
						'name': OC.basename(targetPath),
						'path': OC.dirname(targetPath)
					}, {silent: true});

					// update collection if applicable
					if (collection) {
						if (newModel.getPath() === model.getPath()) {
							// simple rename, reinsert
							collection.remove(model, {sort: false});
							collection.add(model);
						} else {
							// simply remove, the file disappears
							collection.remove(model);
						}
					}
					deferred.resolve(status, newModel);
				})
				.fail(function(status) {
					deferred.reject(status);
				});

			return deferred.promise();
		}
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

