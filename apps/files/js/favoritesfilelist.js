/*
 * Copyright (c) 2014 Vincent Petry <pvince81@owncloud.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

// HACK: this piece needs to be loaded AFTER the files app (for unit tests)
$(document).ready(function() {
	(function(OCA) {
		/**
		 * @class OCA.Files.FavoritesFileList
		 * @augments OCA.Files.FavoritesFileList
		 *
		 * @classdesc Favorites file list.
		 * Displays the list of files marked as favorites
		 *
		 * @param $el container element with existing markup for the #controls
		 * and a table
		 * @param [options] map of options, see other parameters
		 */
		var FavoritesFileList = function($el, options) {
			this.initialize($el, options);
		};
		FavoritesFileList.prototype = _.extend({}, OCA.Files.FileList.prototype,
			/** @lends OCA.Files.FavoritesFileList.prototype */ {
			id: 'favorites',
			appName: t('files','Favorites'),

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
				OC.Plugins.attach('OCA.Files.FavoritesFileList', this);
			},

			updateEmptyContent: function() {
				var dir = this.getCurrentDirectory();
				if (dir === '/') {
					// root has special permissions
					this.$el.find('#emptycontent').toggleClass('hidden', !this.isEmpty);
					this.$el.find('#filestable thead th').toggleClass('hidden', this.isEmpty);
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
                        _renderRow: function(fileData, options) {
				options = options || {};
				fileData.name = fileData.name;
				fileData.displayName = fileData.name + '.' + fileData.id;
			return OCA.Files.FileList.prototype._renderRow.call(this, fileData, options);
		        },
		        _createRow: function(fileData, options) {
			var td, simpleSize, basename, extension, sizeColor,
				icon = OC.Util.replaceSVGIcon(fileData.icon),
				name=fileData.name,
				fakeName = fileData.displayName,
				type = fileData.type || 'file',
				mtime = parseInt(fileData.mtime, 10),
				mime = fileData.mimetype,
				path = fileData.path,
				linkUrl;
			options = options || {};

			if (isNaN(mtime)) {
				mtime = new Date().getTime()
			}

			if (type === 'dir') {
				mime = mime || 'httpd/unix-directory';
			}

			//containing tr
			var tr = $('<tr></tr>').attr({
				"data-id" : fileData.id,
				"data-type": type,
				"data-size": fileData.size,
				"data-file": fakeName,
				"data-mime": mime,
				"data-mtime": mtime,
				"data-etag": fileData.etag,
				"data-permissions": fileData.permissions || this.getDirectoryPermissions()
			});

			if (fileData.mountType) {
				tr.attr('data-mounttype', fileData.mountType);
			}

			if (!_.isUndefined(path)) {
				tr.attr('data-path', path);
			}
			else {
				path = this.getCurrentDirectory();
			}

			if (type === 'dir') {
				// use default folder icon
				icon = icon || OC.imagePath('core', 'filetypes/folder');
			}
			else {
				icon = icon || OC.imagePath('core', 'filetypes/file');
			}

			// filename td
			td = $('<td class="filename"></td>');


			// linkUrl
			if (type === 'dir') {
				linkUrl = this.linkTo(path + '/' + name);
			}
			else {
				linkUrl = this.getDownloadUrl(name, path);
			}
			if (this._allowSelection) {
				td.append(
					'<input id="select-' + this.id + '-' + fileData.id +
					'" type="checkbox" class="selectCheckBox"/><label for="select-' + this.id + '-' + fileData.id + '">' +
					'<div class="thumbnail" style="background-image:url(' + icon + '); background-size: 32px;"></div>' +
					'<span class="hidden-visually">' + t('files', 'Select') + '</span>' +
					'</label>'
				);
			} else {
				td.append('<div class="thumbnail" style="background-image:url(' + icon + '); background-size: 32px;"></div>');
			}
			var linkElem = $('<a></a>').attr({
				"class": "name",
				"href": linkUrl
			});


			// split extension from filename for non dirs
			if (type !== 'dir' && name.indexOf('.') !== -1) {
				basename = name.substr(0, name.lastIndexOf('.'));
				extension = name.substr(name.lastIndexOf('.'));
			} else {
				basename = name;
				extension = false;
			}
			var nameSpan=$('<span></span>').addClass('nametext');
			var innernameSpan = $('<span></span>').addClass('innernametext').text(basename);
			nameSpan.append(innernameSpan);
			linkElem.append(nameSpan);
			if (extension) {
				nameSpan.append($('<span></span>').addClass('extension').text(extension));
			}
			if (fileData.extraData) {
				if (fileData.extraData.charAt(0) === '/') {
					fileData.extraData = fileData.extraData.substr(1);
				}
				nameSpan.addClass('extra-data').attr('title', fileData.extraData);
			}
			// dirs can show the number of uploaded files
			if (type === 'dir') {
				linkElem.append($('<span></span>').attr({
					'class': 'uploadtext',
					'currentUploads': 0
				}));
			}
			td.append(linkElem);
			tr.append(td);

			// size column
			if (typeof(fileData.size) !== 'undefined' && fileData.size >= 0) {
				simpleSize = humanFileSize(parseInt(fileData.size, 10), true);
				sizeColor = Math.round(160-Math.pow((fileData.size/(1024*1024)),2));
			} else {
				simpleSize = t('files', 'Pending');
			}

			td = $('<td></td>').attr({
				"class": "filesize",
				"style": 'color:rgb(' + sizeColor + ',' + sizeColor + ',' + sizeColor + ')'
			}).text(simpleSize);
			tr.append(td);

			// date column (1000 milliseconds to seconds, 60 seconds, 60 minutes, 24 hours)
			// difference in days multiplied by 5 - brightest shade for files older than 32 days (160/5)
			var modifiedColor = Math.round(((new Date()).getTime() - mtime )/1000/60/60/24*5 );
			// ensure that the brightest color is still readable
			if (modifiedColor >= '160') {
				modifiedColor = 160;
			}
			var formatted;
			var text;
			if (mtime > 0) {
				formatted = formatDate(mtime);
				text = OC.Util.relativeModifiedDate(mtime);
			} else {
				formatted = t('files', 'Unable to determine date');
				text = '?';
			}
			td = $('<td></td>').attr({ "class": "date" });
			td.append($('<span></span>').attr({
				"class": "modified",
				"title": formatted,
				"style": 'color:rgb('+modifiedColor+','+modifiedColor+','+modifiedColor+')'
			}).text(text));
			tr.find('.filesize').text(simpleSize);
			tr.append(td);
			return tr;
		        },
		
		        do_delete:function(files, dir) {
			var self = this;
			var params;
			var copyFiles=new Array();
			if (files && files.substr) {
				files=[files];
			}
			if (files) {
				for (var i=0; i<files.length; i++) {
					copyFiles[i]=files[i];
					var deleteAction = this.findFileEl(files[i]).children("td.date").children(".action.delete");
					deleteAction.removeClass('icon-delete').addClass('icon-loading-small');
					files[i]=files[i].substr(0,files[i].lastIndexOf('.'));
				}
			}
			// Finish any existing actions
			if (this.lastAction) {
				this.lastAction();
			}

			params = {
				dir: dir || this.getCurrentDirectory()
			};
			if (files) {
				params.files = JSON.stringify(files);
			}
			else {
				// no files passed, delete all in current dir
				params.allfiles = true;
				// show spinner for all files
				this.$fileList.find('tr>td.date .action.delete').removeClass('icon-delete').addClass('icon-loading-small');
			}

			$.post(OC.filePath('files', 'ajax', 'delete.php'),
					params,
					function(result) {
						if (result.status === 'success') {
							if (params.allfiles) {
								self.setFiles([]);
							}
							else {
								$.each(copyFiles,function(index,file) {
									var fileEl = self.remove(file, {updateSummary: false});
									// FIXME: not sure why we need this after the
									// element isn't even in the DOM any more
									fileEl.find('.selectCheckBox').prop('checked', false);
									fileEl.removeClass('selected');
									self.fileSummary.remove({type: fileEl.attr('data-type'), size:                                                    fileEl.attr('data-size')});
								});
							}
							// TODO: this info should be returned by the ajax call!
							self.updateEmptyContent();
							self.fileSummary.update();
							self.updateSelectionSummary();
							self.updateStorageStatistics();
						} else {
							if (result.status === 'error' && result.data.message) {
								OC.Notification.show(result.data.message);
							}
							else {
								OC.Notification.show(t('files', 'Error deleting file.'));
							}
							// hide notification after 10 sec
							setTimeout(function() {
								OC.Notification.hide();
							}, 10000);
							if (params.allfiles) {
								// reload the page as we don't know what files were deleted
								// and which ones remain
								self.reload();
							}
							else {
								$.each(copyFiles,function(index,file) {
									var deleteAction = self.findFileEl(file).find('.action.delete');
									deleteAction.removeClass('icon-loading-small').addClass('icon-delete');
								});
							}
						}
					});
		        },
		
		        rename: function(oldname,dir) {
			var self = this;
			var tr, td, input, form;
			tr = this.findFileEl(oldname);
			var realname=oldname.substr(0,oldname.lastIndexOf('.'));
			var oldFileInfo = this.files[tr.index()];
			tr.data('renaming',true);
			td = tr.children('td.filename');
			input = $('<input type="text" class="filename"/>').val(realname);
			form = $('<form></form>');
			form.append(input);
			td.children('a.name').hide();
			td.append(form);
			input.focus();
			//preselect input
			var len = input.val().lastIndexOf('.');
			if ( len === -1 ||
				tr.data('type') === 'dir' ) {
				len = input.val().length;
			}
			input.selectRange(0, len);
			var checkInput = function () {
				var filename = input.val();
				if (filename !== realname) {
					// Files.isFileNameValid(filename) throws an exception itself
					OCA.Files.Files.isFileNameValid(filename);
					if (self.inList(filename)) {
						throw t('files', '{new_name} already exists', {new_name: realname});
					}
				}
				return true;
			};
			

			function restore() {
				input.tipsy('hide');
				tr.data('renaming',false);
				form.remove();
				td.children('a.name').show();
			}

			form.submit(function(event) {
				event.stopPropagation();
				event.preventDefault();
				if (input.hasClass('error')) {
					return;
				}

				try {
					var newName = input.val();
					var $thumbEl = tr.find('.thumbnail');
					input.tipsy('hide');
					form.remove();

					if (newName !== oldname) {
						checkInput();
						// mark as loading (temp element)
						$thumbEl.css('background-image', 'url('+ OC.imagePath('core', 'loading.gif') + ')');
						tr.attr('data-file', newName);
						var basename = newName;
						if (newName.indexOf('.') > 0 && tr.data('type') !== 'dir') {
							basename = newName.substr(0, newName.lastIndexOf('.'));
						}
						td.find('a.name span.nametext').text(basename);
						td.children('a.name').show();
						tr.find('.fileactions, .action').addClass('hidden');

						$.ajax({
							url: OC.filePath('files','ajax','rename.php'),
							data: {
								dir : tr.attr('data-path') || self.getCurrentDirectory(),
								newname: newName,
								file: realname
							},
							success: function(result) {
								var fileInfo;
								if (!result || result.status === 'error') {
									OC.dialogs.alert(result.data.message, t('files', 'Could not rename file'));
									fileInfo = oldFileInfo;
									if (result.data.code === 'sourcenotfound') {
										self.remove(result.data.newname, {updateSummary: true});
										return;
									}
								}
								else {
									fileInfo = result.data;
								}
								// reinsert row
								self.files.splice(tr.index(), 1);
								tr.remove();
								tr = self.add(fileInfo, {updateSummary: false, silent: true});
								self.$fileList.trigger($.Event('fileActionsReady', {fileList: self, $files: $(tr)}));
							}
						});
					} else {
						// add back the old file info when cancelled
						self.files.splice(tr.index(), 1);
						tr.remove();
						tr = self.add(oldFileInfo, {updateSummary: false, silent: true});
						self.$fileList.trigger($.Event('fileActionsReady', {fileList: self, $files: $(tr)}));
					}
				} catch (error) {
					input.attr('title', error);
					input.tipsy({gravity: 'w', trigger: 'manual'});
					input.tipsy('show');
					input.addClass('error');
				}
				return false;
			});
			input.keyup(function(event) {
				// verify filename on typing
				try {
					checkInput();
					input.tipsy('hide');
					input.removeClass('error');
				} catch (error) {
					input.attr('title', error);
					input.tipsy({gravity: 'w', trigger: 'manual'});
					input.tipsy('show');
					input.addClass('error');
				}
				if (event.keyCode === 27) {
					restore();
				}
			});
			input.click(function(event) {
				event.stopPropagation();
				event.preventDefault();
			});
			input.blur(function() {
				form.trigger('submit');
			});
		        },

			reload: function() {
				var tagName = OC.TAG_FAVORITE;
				this.showMask();
				if (this._reloadCall) {
					this._reloadCall.abort();
				}

				// there is only root
				this._setCurrentDir('/', false);

				this._reloadCall = this.filesClient.getFilteredFiles(
					{
						favorite: true
					},
					{
						properties: this._getWebdavProperties()
					}
				);
				var callBack = this.reloadCallback.bind(this);
				return this._reloadCall.then(callBack, callBack);
			},

			reloadCallback: function(status, result) {
				if (result) {
					// prepend empty dir info because original handler
					result.unshift({});
				}

				return OCA.Files.FileList.prototype.reloadCallback.call(this, status, result);
			}
		});

		OCA.Files.FavoritesFileList = FavoritesFileList;
	})(OCA);
});

