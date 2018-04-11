/*
 * Copyright (c) 2014 Vincent Petry <pvince81@owncloud.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* global moment */
(function() {

	/**
	 * @class OCA.Sharing.FileList
	 * @augments OCA.Files.FileList
	 *
	 * @classdesc Sharing file list.
	 * Contains both "shared with others" and "shared with you" modes.
	 *
	 * @param $el container element with existing markup for the #controls
	 * and a table
	 * @param [options] map of options, see other parameters
	 * @param {boolean} [options.sharedWithUser] true to return files shared with
	 * the current user, false to return files that the user shared with others.
	 * Defaults to false.
	 * @param {boolean} [options.linksOnly] true to return only link shares
	 */
	var FileList = function($el, options) {
		this.initialize($el, options);
	};
	FileList.prototype = _.extend({}, OCA.Files.FileList.prototype,
		/** @lends OCA.Sharing.FileList.prototype */ {
		appName: 'Shares',

		/**
		 * Whether the list shows the files shared with the user (true) or
		 * the files that the user shared with others (false).
		 */
		_sharedWithUser: false,
		_linksOnly: false,
		_clientSideSort: true,
		_allowSelection: false,

		/**
		 * @private
		 */
		initialize: function($el, options) {
			OCA.Files.FileList.prototype.initialize.apply(this, arguments);
			if (this.initialized) {
				return;
			}

			// TODO: consolidate both options
			if (options && options.sharedWithUser) {
				this._sharedWithUser = true;
			}
			if (options && options.linksOnly) {
				this._linksOnly = true;
			}

			if (options && options.sorting) {
				this.setSort(options.sorting.mode, options.sorting.direction, false, false);
			} else if (this._sharedWithUser) {
				this.setSort('sharestate', 'asc', false, false);
			}

			if (!this._sharedWithUser) {
				this.$el.find('.column-sharestate').remove();
			}
		},

		_renderRow: function() {
			// HACK: needed to call the overridden _renderRow
			// this is because at the time this class is created
			// the overriding hasn't been done yet...
			return OCA.Files.FileList.prototype._renderRow.apply(this, arguments);
		},

		_createRow: function(fileData) {
			// TODO: hook earlier and render the whole row here
			var $tr = OCA.Files.FileList.prototype._createRow.apply(this, arguments);
			var td;
			var formatted;
			var text;
			var $dateColumn = $tr.find('td.date');
			$tr.find('.filesize').remove();
			$dateColumn.before($tr.children('td:first'));
			$tr.find('td.filename input:checkbox').remove();
			$tr.attr('data-share-location-type', fileData.shareLocationType);
			$tr.attr('data-share-id', _.pluck(fileData.shares, 'id').join(','));
			// add row with expiration date for link only shares - influenced by _createRow of filelist
			if (this._linksOnly) {
				var expirationTimestamp = 0;
				if(fileData.shares && fileData.shares[0].expiration !== null) {
					expirationTimestamp = moment(fileData.shares[0].expiration).valueOf();
				}
				$tr.attr('data-expiration', expirationTimestamp);

				// date column (1000 milliseconds to seconds, 60 seconds, 60 minutes, 24 hours)
				// difference in days multiplied by 5 - brightest shade for expiry dates in more than 32 days (160/5)
				var modifiedColor = Math.round((expirationTimestamp - (new Date()).getTime()) / 1000 / 60 / 60 / 24 * 5);
				// ensure that the brightest color is still readable
				if (modifiedColor >= 160) {
					modifiedColor = 160;
				}

				if (expirationTimestamp > 0) {
					formatted = OC.Util.formatDate(expirationTimestamp);
					text = OC.Util.relativeModifiedDate(expirationTimestamp);
				} else {
					formatted = t('files_sharing', 'No expiration date set');
					text = '';
					modifiedColor = 160;
				}

				td = $('<td></td>').attr({"class": "date"});
				td.append($('<span></span>').attr({
						"class": "modified",
						"title": formatted,
						"style": 'color:rgb(' + modifiedColor + ',' + modifiedColor + ',' + modifiedColor + ')'
					}).text(text)
						.tooltip({placement: 'top'})
				);

				$tr.append(td);
			}
			if (this._sharedWithUser) {
				$tr.attr('data-share-owner', fileData.shareOwner);
				$tr.attr('data-mounttype', 'shared-root');
				var permission = parseInt($tr.attr('data-permissions')) | OC.PERMISSION_DELETE;
				$tr.attr('data-permissions', permission);
				$tr.attr('data-share-state', fileData.shareState);

				text = '';
				var shareStateClass;
				if (fileData.shareState === OC.Share.STATE_REJECTED) {
					text = t('files_sharing', 'Declined');
					shareStateClass = 'share-state-rejected';
				} else if (fileData.shareState === OC.Share.STATE_PENDING) {
					text = t('files_sharing', 'Pending');
					shareStateClass = 'share-state-pending';
				} else {
					shareStateClass = 'share-state-accepted';
				}
				td = $('<td>', {"class": "share-state"});
				td.append($('<span></span>').attr({
						"class": "state",
					}).text(text)
				);
				$tr.addClass(shareStateClass);
				$dateColumn.before(td);

				if (fileData.shareState !== OC.Share.STATE_ACCEPTED) {
					// remove link
					$tr.find('a.name').attr('href', '#');
				}
			}

			return $tr;
		},

		/**
		 * Set whether the list should contain outgoing shares
		 * or incoming shares.
		 *
		 * @param state true for incoming shares, false otherwise
		 */
		setSharedWithUser: function(state) {
			this._sharedWithUser = !!state;
		},

		_updateDetailsView: function(fileName, show) {
			// prevent opening details sidebar for pending shares
			if (this._sharedWithUser) {
				var $tr = this.findFileEl(fileName);
				var shareState = parseInt($tr.attr('data-share-state'), 10);
				if (shareState !== OC.Share.STATE_ACCEPTED) {
					show = false;
				}
			}

			return OCA.Files.FileList.prototype._updateDetailsView.call(this, fileName, show);
		},

		updateEmptyContent: function() {
			var dir = this.getCurrentDirectory();
			if (dir === '/') {
				// root has special permissions
				this.$el.find('#emptycontent').toggleClass('hidden', !this.isEmpty);
				this.$el.find('#filestable thead th').toggleClass('hidden', this.isEmpty);

				// hide expiration date header for non link only shares
				if (!this._linksOnly) {
					this.$el.find('th.column-expiration').addClass('hidden');
				}
				if (!this._sharedWithUser) {
					// hide state column
					this.$el.find('th.column-state').addClass('hidden');
				}
			}
			else {
				OCA.Files.FileList.prototype.updateEmptyContent.apply(this, arguments);
			}
		},

		getDirectoryPermissions: function() {
			return OC.PERMISSION_READ | OC.PERMISSION_DELETE;
		},

		updateStorageStatistics: function() {
			// no op because it doesn't have
			// storage info like free space / used space
		},

		reload: function() {
			this.showMask();
			if (this._reloadCall) {
				this._reloadCall.abort();
			}

			// there is only root
			this._setCurrentDir('/', false);

			var promises = [];
			var requestData = {
				format: 'json'
			};
			if (this._sharedWithUser) {
				requestData.shared_with_me = true;
				requestData.state = 'all';
			}
			requestData.include_tags = true;
			var shares = $.ajax({
				url: OC.linkToOCS('apps/files_sharing/api/v1') + 'shares',
				/* jshint camelcase: false */
				data: requestData,
				type: 'GET',
				beforeSend: function(xhr) {
					xhr.setRequestHeader('OCS-APIREQUEST', 'true');
				},
			});
			promises.push(shares);

			if (!!this._sharedWithUser) {
				var remoteShares = $.ajax({
					url: OC.linkToOCS('apps/files_sharing/api/v1') + 'remote_shares',
					/* jshint camelcase: false */
					data: {
						format: 'json',
						include_tags: true
					},
					type: 'GET',
					beforeSend: function(xhr) {
						xhr.setRequestHeader('OCS-APIREQUEST', 'true');
					},
				});
				promises.push(remoteShares);
			} else {
				//Push empty promise so callback gets called the same way
				promises.push($.Deferred().resolve());
			}

			this._reloadCall = $.when.apply($, promises);
			var callBack = this.reloadCallback.bind(this);
			return this._reloadCall.then(callBack, callBack);
		},

		reloadCallback: function(shares, remoteShares) {
			delete this._reloadCall;
			this.hideMask();

			this.$el.find('#headerSharedWith').text(
				t('files_sharing', this._sharedWithUser ? 'Shared by' : 'Shared with')
			);

			var files = [];

			if (shares[0].ocs && shares[0].ocs.data) {
				files = files.concat(this._makeFilesFromShares(shares[0].ocs.data));
			}

			if (remoteShares && remoteShares[0].ocs && remoteShares[0].ocs.data) {
				files = files.concat(this._makeFilesFromRemoteShares(remoteShares[0].ocs.data));
			}

			files = files.sort(this._sortComparator);

			this.setFiles(files);
			return true;
		},

		elementToFile: function($el) {
			var fileInfo = OCA.Files.FileList.prototype.elementToFile.apply(this, arguments);
			var shareIds = ($el.attr('data-share-id') || '').split(',');
			if (_.isArray(shareIds)) {
				fileInfo.shares = _.map(shareIds, function(id) {
					return {id: id};
				});
			} else {
				fileInfo.shares = [{id: shareIds}];
			}

			fileInfo.shareState = parseInt($el.attr('data-share-state'), 10);
			fileInfo.shareLocationType =  $el.attr('data-share-location-type');
			return fileInfo;
		},

		scrollTo: function(fileId) {
			var rows = this.$fileList.find('tr');

			function filterId(el) {
				return $(el).attr('data-id') === fileId;
			}

			var fileRows = _.filter(rows, filterId);
			while(!fileRows.length && (rows = this._nextPage(false)) !== false) { // Checking element existence
				fileRows = _.filter(rows, filterId);
			}

			if (!fileRows.length) {
				return;
			}

			var $fileRow = $(fileRows[0]);
			this._scrollToRow($fileRow, function() {
				$fileRow.addClass('searchresult');
				$fileRow.one('hover', function() {
					$fileRow.removeClass('searchresult');
				});
			});
		},

		_makeFilesFromRemoteShares: function(data) {
			var files = data;

			files = _.chain(files)
				// convert share data to file data
				.map(function(share) {
					var file = {
						shareOwner: share.owner + '@' + share.remote.replace(/.*?:\/\//g, ""),
						shareState: share.accepted ? OC.Share.STATE_ACCEPTED : OC.Share.STATE_PENDING,
						name: OC.basename(share.mountpoint),
						mtime: share.mtime * 1000,
						mimetype: share.mimetype,
						type: share.type,
						id: share.file_id,
						path: OC.dirname(share.mountpoint),
						permissions: share.permissions,
						tags: share.tags || [],
						shareLocationType: 'remote'
					};

					file.shares = [{
						id: share.id,
						type: OC.Share.SHARE_TYPE_REMOTE
					}];
					return file;
				})
				.value();
			return files;
		},

		/**
		 * Converts the OCS API share response data to a file info
		 * list
		 * @param {Array} data OCS API share array
		 * @return {Array.<OCA.Sharing.SharedFileInfo>} array of shared file info
		 */
		_makeFilesFromShares: function(data) {
			/* jshint camelcase: false */
			var self = this;
			var files = data;

			if (this._linksOnly) {
				files = _.filter(data, function(share) {
					return share.share_type === OC.Share.SHARE_TYPE_LINK;
				});
			}

			// OCS API uses non-camelcased names
			files = _.chain(files)
				// convert share data to file data
				.map(function(share) {
					// TODO: use OC.Files.FileInfo
					var file = {
						id: share.file_source,
						icon: OC.MimeType.getIconUrl(share.mimetype),
						mimetype: share.mimetype,
						tags: share.tags || [],
						shareLocationType: 'local'
					};
					if (share.item_type === 'folder') {
						file.type = 'dir';
						file.mimetype = 'httpd/unix-directory';
					}
					else {
						file.type = 'file';
					}
					file.share = {
						id: share.id,
						type: share.share_type,
						target: share.share_with,
						stime: share.stime * 1000,
						expiration: share.expiration
					};
					if (self._sharedWithUser) {
						file.shareOwner = share.displayname_owner;
						file.shareState = share.state;
						file.name = OC.basename(share.file_target);
						file.path = OC.dirname(share.file_target);
						file.permissions = share.permissions;
						if (file.path) {
							file.extraData = share.file_target;
						}
					}
					else {
						if (share.share_type !== OC.Share.SHARE_TYPE_LINK) {
							file.share.targetDisplayName = share.share_with_displayname;
						}
						file.name = OC.basename(share.path);
						file.path = OC.dirname(share.path);
						file.permissions = OC.PERMISSION_ALL;
						if (file.path) {
							file.extraData = share.path;
						}
					}
					return file;
				})
				// Group all files and have a "shares" array with
				// the share info for each file.
				//
				// This uses a hash memo to cumulate share information
				// inside the same file object (by file id).
				.reduce(function(memo, file) {
					var data = memo[file.id];
					var recipient = file.share.targetDisplayName;
					if (!data) {
						data = memo[file.id] = file;
						data.shares = [file.share];
						// using a hash to make them unique,
						// this is only a list to be displayed
						data.recipients = {};
						// share types
						data.shareTypes = {};
						// counter is cheaper than calling _.keys().length
						data.recipientsCount = 0;
						data.mtime = file.share.stime;
					}
					else {
						// always take the most recent stime
						if (file.share.stime > data.mtime) {
							data.mtime = file.share.stime;
						}
						data.shares.push(file.share);
					}

					if (recipient) {
						// limit counterparts for output
						if (data.recipientsCount < 4) {
							// only store the first ones, they will be the only ones
							// displayed
							data.recipients[recipient] = true;
						}
						data.recipientsCount++;
					}

					data.shareTypes[file.share.type] = true;

					delete file.share;
					return memo;
				}, {})
				// Retrieve only the values of the returned hash
				.values()
				// Clean up
				.each(function(data) {
					// convert the recipients map to a flat
					// array of sorted names
					data.mountType = 'shared';
					data.recipients = _.keys(data.recipients);
					data.recipientsDisplayName = OCA.Sharing.Util.formatRecipients(
						data.recipients,
						data.recipientsCount
					);
					delete data.recipientsCount;
					if (self._sharedWithUser) {
						// only for outgoing shres
						delete data.shareTypes;
					} else {
						data.shareTypes = _.keys(data.shareTypes);
					}
				})
				// Finish the chain by getting the result
				.value();

			return files;
		}
	});

	/**
	 * Share info attributes.
	 *
	 * @typedef {Object} OCA.Sharing.ShareInfo
	 *
	 * @property {int} id share ID
	 * @property {int} type share type
	 * @property {String} target share target, either user name or group name
	 * @property {int} stime share timestamp in milliseconds
	 * @property {String} [targetDisplayName] display name of the recipient
	 * (only when shared with others)
	 *
	 */

	/**
	 * Shared file info attributes.
	 *
	 * @typedef {OCA.Files.FileInfo} OCA.Sharing.SharedFileInfo
	 *
	 * @property {Array.<OCA.Sharing.ShareInfo>} shares array of shares for
	 * this file
	 * @property {int} mtime most recent share time (if multiple shares)
	 * @property {String} shareOwner name of the share owner
	 * @property {Array.<String>} recipients name of the first 4 recipients
	 * (this is mostly for display purposes)
	 * @property {String} recipientsDisplayName display name
	 */


	OCA.Files.FileList.Comparators.SHARE_STATE_ORDER = {};
	OCA.Files.FileList.Comparators.SHARE_STATE_ORDER[OC.Share.STATE_PENDING] = 0;
	OCA.Files.FileList.Comparators.SHARE_STATE_ORDER[OC.Share.STATE_ACCEPTED] = 1;
	OCA.Files.FileList.Comparators.SHARE_STATE_ORDER[OC.Share.STATE_REJECTED] = 2;
	OCA.Files.FileList.Comparators.sharestate = function(fileInfo1, fileInfo2) {
		var result = OCA.Files.FileList.Comparators.SHARE_STATE_ORDER[fileInfo1.shareState] - OCA.Files.FileList.Comparators.SHARE_STATE_ORDER[fileInfo2.shareState];
		if (result === 0) {
			result = OCA.Files.FileList.Comparators.name(fileInfo1, fileInfo2)
		}

		return result;
	};

	OCA.Sharing.FileList = FileList;
})();
