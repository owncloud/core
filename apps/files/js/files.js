/*
 * Copyright (c) 2014
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* global getURLParameter */
/**
 * Utility class for file related operations
 */
(function() {
	var Files = {
		// file space size sync
		_updateStorageStatistics: function(currentDir) {
			var state = Files.updateStorageStatistics;
			if (state.dir){
				if (state.dir === currentDir) {
					return;
				}
				// cancel previous call, as it was for another dir
				state.call.abort();
			}
			state.dir = currentDir;
			state.call = $.getJSON(OC.filePath('files','ajax','getstoragestats.php') + '?dir=' + encodeURIComponent(currentDir),function(response) {
				state.dir = null;
				state.call = null;
				Files.updateMaxUploadFilesize(response);
			});
		},
		/**
		 * Update storage statistics such as free space, max upload,
		 * etc based on the given directory.
		 *
		 * Note this function is debounced to avoid making too
		 * many ajax calls in a row.
		 *
		 * @param dir directory
		 * @param force whether to force retrieving
		 */
		updateStorageStatistics: function(dir, force) {
			if (!OC.currentUser) {
				return;
			}

			if (force) {
				Files._updateStorageStatistics(dir);
			}
			else {
				Files._updateStorageStatisticsDebounced(dir);
			}
		},

		updateMaxUploadFilesize:function(response) {
			if (response === undefined) {
				return;
			}
			if (response.data !== undefined && response.data.uploadMaxFilesize !== undefined) {
				$('#free_space').val(response.data.freeSpace);
				$('#upload.button').attr('data-original-title', response.data.maxHumanFilesize);
				$('#usedSpacePercent').val(response.data.usedSpacePercent);
				$('#owner').val(response.data.owner);
				$('#ownerDisplayName').val(response.data.ownerDisplayName);
				Files.displayStorageWarnings();
			}
			if (response[0] === undefined) {
				return;
			}
			if (response[0].uploadMaxFilesize !== undefined) {
				$('#upload.button').attr('data-original-title', response[0].maxHumanFilesize);
				$('#usedSpacePercent').val(response[0].usedSpacePercent);
				Files.displayStorageWarnings();
			}

		},

		/**
		 * Fix path name by removing double slash at the beginning, if any
		 */
		fixPath: function(fileName) {
			if (fileName.substr(0, 2) == '//') {
				return fileName.substr(1);
			}
			return fileName;
		},

		/**
		 * Checks whether the given file name is valid.
		 * @param name file name to check
		 * @return true if the file name is valid.
		 * Throws a string exception with an error message if
		 * the file name is not valid
		 */
		isFileNameValid: function (name) {
			var trimmedName = name.trim();
			if (trimmedName === '.'	|| trimmedName === '..')
			{
				throw t('files', '"{name}" is an invalid file name.', {name: name});
			} else if (trimmedName.length === 0) {
				throw t('files', 'File name cannot be empty.');
			} else if (trimmedName.indexOf("/") >= 0) {
				throw t('files', 'File name cannot contain "/".');
			} else if (OC.fileIsBlacklisted(trimmedName)) {
				throw t('files', '"{name}" has a forbidden file type/extension.', {name: name});
			}

			return true;
		},
		displayStorageWarnings: function() {
			if (!OC.Notification.isHidden()) {
				return;
			}

			var usedSpacePercent = $('#usedSpacePercent').val(),
				owner = $('#owner').val(),
				ownerDisplayName = $('#ownerDisplayName').val();
			if (usedSpacePercent > 98) {
				if (owner !== oc_current_user) {
					OC.Notification.show(t('files', 'Storage of {owner} is full, files can not be updated or synced anymore!', 
						{owner: ownerDisplayName}), {type: 'error'}
					);
					return;
				}
				OC.Notification.show(t('files', 
					'Your storage is full, files can not be updated or synced anymore!'), 
					{type : 'error'}
				);
				return;
			}
			if (usedSpacePercent > 90) {
				if (owner !== oc_current_user) {
					OC.Notification.show(t('files', 'Storage of {owner} is almost full ({usedSpacePercent}%)', 
						{
							usedSpacePercent: usedSpacePercent,  
							owner: ownerDisplayName
						}),
						{  
							type: 'error'
						}
					);
					return;
				}
				OC.Notification.show(t('files', 'Your storage is almost full ({usedSpacePercent}%)',
					{usedSpacePercent: usedSpacePercent}), 
					{type : 'error'}
				);
			}
		},

		/**
		 * Returns the download URL of the given file(s)
		 * @param {string} filename string or array of file names to download
		 * @param {string} [dir] optional directory in which the file name is, defaults to the current directory
		 * @param {bool} [isDir=false] whether the given filename is a directory and might need a special URL
		 */
		getDownloadUrl: function(filename, dir, isDir) {
			if (!_.isArray(filename) && !isDir) {
				var pathSections = dir.split('/');
				pathSections.push(filename);
				var encodedPath = '';
				_.each(pathSections, function(section) {
					if (section !== '') {
						encodedPath += '/' + encodeURIComponent(section);
					}
				});
				return OC.linkToRemoteBase('webdav') + encodedPath;
			}

			if (_.isArray(filename)) {
				var filesPart = '';
				_.each(filename, function(name) {
					filesPart += '&files[]=' + encodeURIComponent(name);
				});
				return this.getAjaxUrl('download', {dir: dir}) + filesPart;
			}

			var params = {
				dir: dir,
				files: filename
			};
			return this.getAjaxUrl('download', params);
		},

		/**
		 * Returns the ajax URL for a given action
		 * @param action action string
		 * @param params optional params map
		 */
		getAjaxUrl: function(action, params) {
			var q = '';
			if (params) {
				q = '?' + OC.buildQueryString(params);
			}
			return OC.filePath('files', 'ajax', action + '.php') + q;
		},

		/**
		 * Fetch the icon url for the mimetype
		 * @param {string} mime The mimetype
		 * @param {Files~mimeicon} ready Function to call when mimetype is retrieved
		 * @deprecated use OC.MimeType.getIconUrl(mime)
		 */
		getMimeIcon: function(mime, ready) {
			ready(OC.MimeType.getIconUrl(mime));
		},

		/**
		 * Generates a preview URL based on the URL space.
		 * @param urlSpec attributes for the URL
		 * @param {int} urlSpec.x width
		 * @param {int} urlSpec.y height
		 * @param {String} urlSpec.file path to the file
		 * @return preview URL
		 * @deprecated used OCA.Files.FileList.generatePreviewUrl instead
		 */
		generatePreviewUrl: function(urlSpec) {
			console.warn('DEPRECATED: please use generatePreviewUrl() from an OCA.Files.FileList instance');
			return OCA.Files.App.fileList.generatePreviewUrl(urlSpec);
		},

		/**
		 * Lazy load preview
		 * @deprecated used OCA.Files.FileList.lazyLoadPreview instead
		 */
		lazyLoadPreview : function(path, mime, ready, width, height, etag) {
			console.warn('DEPRECATED: please use lazyLoadPreview() from an OCA.Files.FileList instance');
			return FileList.lazyLoadPreview({
				path: path,
				mime: mime,
				callback: ready,
				width: width,
				height: height,
				etag: etag
			});
		},

		/**
		 * Initialize the files view
		 */
		initialize: function() {
			Files.bindKeyboardShortcuts(document, $);

			// TODO: move file list related code (upload) to OCA.Files.FileList
			$('#file_action_panel').attr('activeAction', false);

			// drag&drop support using jquery.fileupload
			// TODO use OC.dialogs
			$(document).bind('drop dragover', function (e) {
					e.preventDefault(); // prevent browser from doing anything, if file isn't dropped in dropZone
				});

			// display storage warnings
			setTimeout(Files.displayStorageWarnings, 100);

			// only possible at the moment if user is logged in or the files app is loaded
			if (OC.currentUser && OCA.Files.App) {
				// start on load - we ask the server every 5 minutes
				var func = _.bind(OCA.Files.App.fileList.updateStorageStatistics, OCA.Files.App.fileList);
				var updateStorageStatisticsInterval = 5*60*1000;
				var updateStorageStatisticsIntervalId = setInterval(func, updateStorageStatisticsInterval);

				// TODO: this should also stop when switching to another view
				// Use jquery-visibility to de-/re-activate file stats sync
				if ($.support.pageVisibility) {
					$(document).on({
						'show': function() {
							if (!updateStorageStatisticsIntervalId) {
								updateStorageStatisticsIntervalId = setInterval(func, updateStorageStatisticsInterval);
							}
						},
						'hide': function() {
							clearInterval(updateStorageStatisticsIntervalId);
							updateStorageStatisticsIntervalId = 0;
						}
					});
				}
			}


			$('#webdavurl').on('click touchstart', function () {
				this.focus();
				this.setSelectionRange(0, this.value.length);
			});

			$('#upload').tooltip({placement:'right'});

			//FIXME scroll to and highlight preselected file
			/*
			if (getURLParameter('scrollto')) {
				FileList.scrollTo(getURLParameter('scrollto'));
			}
			*/
		},

		/**
		 * Handles the download and calls the callback function once the download has started
		 * - browser sends download request and adds parameter with a token
		 * - server notices this token and adds a set cookie to the download response
		 * - browser now adds this cookie for the domain
		 * - JS periodically checks for this cookie and then knows when the download has started to call the callback
		 *
		 * @param {string} url download URL
		 * @param {function} callback function to call once the download has started
		 */
		handleDownload: function(url, callback) {
			var randomToken = Math.random().toString(36).substring(2),
				checkForDownloadCookie = function() {
					if (!OC.Util.isCookieSetToValue('ocDownloadStarted', randomToken)){
						return false;
					} else {
						callback();
						return true;
					}
				};

			if (url.indexOf('?') >= 0) {
				url += '&';
			} else {
				url += '?';
			}
			OC.redirect(url + 'downloadStartSecret=' + randomToken);
			OC.Util.waitFor(checkForDownloadCookie, 500);
		}
	};

	Files._updateStorageStatisticsDebounced = _.debounce(Files._updateStorageStatistics, 250);
	OCA.Files.Files = Files;
})();

// override core's fileDownloadPath (legacy)
function fileDownloadPath(dir, file) {
	return OCA.Files.Files.getDownloadUrl(file, dir);
}

// for backward compatibility
window.Files = OCA.Files.Files;
