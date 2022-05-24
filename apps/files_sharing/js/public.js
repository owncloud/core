/*
 * Copyright (c) 2014
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* global FileActions, Files, FileList */
/* global dragOptions, folderDropOptions */
if (!OCA.Sharing) {
	OCA.Sharing = {};
}
if (!OCA.Files) {
	OCA.Files = {};
}
/**
 * @namespace
 */
OCA.Sharing.PublicApp = {
	_initialized: false,

	/**
	 * Initializes the public share app.
	 *
	 * @param $el container
	 */
	initialize: function ($el) {
		var self = this;
		var fileActions;
		if (this._initialized) {
			return;
		}
		fileActions = new OCA.Files.FileActions();
		// default actions
		fileActions.registerDefaultActions();
		// legacy actions
		fileActions.merge(window.FileActions);
		// regular actions
		fileActions.merge(OCA.Files.fileActions);

		// in case apps would decide to register file actions later,
		// replace the global object with this one
		OCA.Files.fileActions = fileActions;

		this._initialized = true;
		this.initialDir = $('#dir').val();

		var token = $('#sharingToken').val();

		// file list mode ?
		if ($el.find('#filestable').length) {
			var filesClient = new OC.Files.Client({
				host: OC.getHost(),
				port: OC.getPort(),
				userName: token,
				// note: password not be required, the endpoint
				// will recognize previous validation from the session
				root: OC.getRootPath() + '/public.php/webdav',
				useHTTPS: OC.getProtocol() === 'https'
			});

			this.fileList = new OCA.Files.FileList(
				$el,
				{
					id: 'files.public',
					scrollContainer: $('#content-wrapper'),
					dragOptions: dragOptions,
					folderDropOptions: folderDropOptions,
					fileActions: fileActions,
					detailsViewEnabled: false,
					filesClient: filesClient,
					enableUpload: true
				}
			);
			this.files = OCA.Files.Files;
			this.files.initialize();
			// TODO: move to PublicFileList.initialize() once
			// the code was split into a separate class
			OC.Plugins.attach('OCA.Sharing.PublicFileList', this.fileList);
		}

		var mimetype = $('#mimetype').val();
		var mimetypeIcon = $('#mimetypeIcon').val();
		mimetypeIcon = mimetypeIcon.substring(0, mimetypeIcon.length - 3);
		mimetypeIcon = mimetypeIcon + 'svg';
		var previewEnabled = ($("#previewEnabled").val());
		var previewSupported = $('#previewSupported').val();


		if (typeof FileActions !== 'undefined') {
			// Show file preview if previewer is available, images are already handled by the template
			if (mimetype.substr(0, mimetype.indexOf('/')) !== 'image' && $('.publicpreview').length === 0) {
				// Trigger default action if not download TODO
				var action = FileActions.getDefault(mimetype, 'file', OC.PERMISSION_READ);
				if (typeof action !== 'undefined') {
					action($('#filename').val());
				}
			}
		}


		// dynamically load image previews
		var bottomMargin = 350;
		var previewWidth = $(window).width();
		var previewHeight = $(window).height() - bottomMargin;
		previewHeight = Math.max(200, previewHeight);
		var params = {
			x: Math.ceil(previewWidth * window.devicePixelRatio),
			y: Math.ceil(previewHeight * window.devicePixelRatio),
			a: 'true',
			file: encodeURIComponent(this.initialDir + $('#filename').val()),
			t: token,
			scalingup: 0
		};

		var img = $('<img class="publicpreview" alt="">');
		img.css({
			'max-width': previewWidth,
			'max-height': previewHeight
		});

		// Check if video type is supported by browser
		if (mimetype.substr(0, mimetype.indexOf('/')) === 'video' && previewEnabled === 'true') {
			var obj = document.createElement('video');
			if (obj.canPlayType(mimetype) === "") {
				OC.Notification.show(t('files_sharing',
					'The video cannot be played because your browser does not support the file type. Please try another browser.')
				);
			}
		}

		var fileSize = parseInt($('#filesize').val(), 10);
		var maxGifSize = parseInt($('#maxSizeAnimateGif').val(), 10);

		if (mimetype === 'image/gif' &&
			(maxGifSize === -1 || fileSize <= (maxGifSize * 1024 * 1024))) {
			img.attr('src', $('#downloadURL').val());
			img.appendTo('#imgframe');
		} else if (mimetype.substr(0, mimetype.indexOf('/')) === 'text' && window.btoa) {
			// Undocumented Url to public WebDAV endpoint
			var url = parent.location.protocol + '//' + location.host + OC.linkTo('', 'public.php/webdav');
			$.ajax({
				url: url,
				headers: {
					Authorization: 'Basic ' + btoa(token + ':'),
					Range: 'bytes=0-1000'
				}
			}).then(function (data) {
				self._showTextPreview(data, previewHeight);
			});
		} else if ((previewSupported === 'true' && mimetype.substr(0, mimetype.indexOf('/')) !== 'video') ||
			mimetype.substr(0, mimetype.indexOf('/')) === 'image' &&
			mimetype !== 'image/svg+xml') {
			img.attr('src', OC.filePath('files_sharing', 'ajax', 'publicpreview.php') + '?' + OC.buildQueryString(params));
			img.appendTo('#imgframe');
		} else if (mimetype.substr(0, mimetype.indexOf('/')) !== 'video') {
			img.attr('src', OC.Util.replaceSVGIcon(mimetypeIcon));
			img.attr('width', 128);
			img.appendTo('#imgframe');
		} else if (previewSupported === 'true') {
			$('#imgframe > video').attr('poster', OC.filePath('files_sharing', 'ajax', 'publicpreview.php') + '?' + OC.buildQueryString(params));
		}

		if (this.fileList) {
			// TODO: move this to a separate PublicFileList class that extends OCA.Files.FileList (+ unit tests)
			this.fileList.getDownloadUrl = function (filename, dir, isDir) {
				var path = dir || this.getCurrentDirectory();
				var base = OC.generateUrl('/s/' + token + '/download') + '?' + OC.buildQueryString({path: path});

				var filesPart = '';
				if (_.isArray(filename)) {
					_.each(filename, function (name) {
						filesPart += '&files[]=' + encodeURIComponent(name);
					});
				} else {
					filesPart = '&files=' + encodeURIComponent(filename || '');
				}
				return base + filesPart;
			};

			this.fileList.getUploadUrl = function (fileName, dir) {
				if (_.isUndefined(dir)) {
					dir = this.getCurrentDirectory();
				}

				var pathSections = dir.split('/');
				if (!_.isUndefined(fileName)) {
					pathSections.push(fileName);
				}
				var encodedPath = '';
				_.each(pathSections, function (section) {
					if (section !== '') {
						encodedPath += '/' + encodeURIComponent(section);
					}
				});
				var base = '';

				if (!this._uploader.isXHRUpload()) {
					// also add auth in URL due to POST workaround
					base = OC.getProtocol() + '://' + token + '@' + OC.getHost() + (OC.getPort() ? ':' + OC.getPort() : '');
				}
				return base + OC.getRootPath() + '/public.php/webdav' + encodedPath;
			};

			this.fileList.getAjaxUrl = function (action, params) {
				params = params || {};
				params.t = token;
				return OC.filePath('files_sharing', 'ajax', action + '.php') + '?' + OC.buildQueryString(params);
			};

			this.fileList.linkTo = function (dir) {
				return OC.generateUrl('/s/' + token + '', {dir: dir});
			};

			this.fileList.generatePreviewUrl = function (urlSpec) {
				urlSpec = urlSpec || {};
				if (!urlSpec.x) {
					urlSpec.x = 32;
				}
				if (!urlSpec.y) {
					urlSpec.y = 32;
				}
				urlSpec.x *= window.devicePixelRatio;
				urlSpec.y *= window.devicePixelRatio;
				urlSpec.x = Math.ceil(urlSpec.x);
				urlSpec.y = Math.ceil(urlSpec.y);
				urlSpec.t = $('#dirToken').val();
				return OC.generateUrl('/apps/files_sharing/ajax/publicpreview.php?') + $.param(urlSpec);
			};

			this.fileList.updateEmptyContent = function () {
				this.$el.find('#emptycontent .uploadmessage').text(
					t('files_sharing', 'You can upload into this folder')
				);
				OCA.Files.FileList.prototype.updateEmptyContent.apply(this, arguments);
			};

			this.fileList._uploader.on('fileuploadadd', function (e, data) {
				if (!data.headers) {
					data.headers = {};
				}

				data.headers.Authorization = 'Basic ' + btoa(token + ':');
			});

			// do not allow sharing from the public page
			delete this.fileList.fileActions.actions.all.Share;

			this.fileList.changeDirectory(this.initialDir || '/', false, true);

			// URL history handling
			this.fileList.$el.on('changeDirectory', _.bind(this._onDirectoryChanged, this));
			OC.Util.History.addOnPopStateHandler(_.bind(this._onUrlChanged, this));

			$('#download').click(function (e) {
				e.preventDefault();
				OC.redirect(FileList.getDownloadUrl());
			});
		}

		$(document).on('click', '#directLink', function () {
			$(this).focus();
			$(this).select();
		});


		// Server selection
		this.$saveToOcButton = $("#header").find("#save #save-to-oc-button");
		this.$saveToOcButtonText = $("#header").find("#save #save-to-oc-button-text");
		this.$saveToOcButtonExpand = $("#header").find("#save-to-oc-button-expand");
		this.$saveToOcServerMenu = $("#header").find("#save #expanddiv");
		OC.registerMenu(this.$saveToOcButtonExpand, this.$saveToOcServerMenu);

		$(this.$saveToOcServerMenu).on('click', '#current-server', this._onSaveToOcMenuCurrentServerClicked.bind(this));
		$(this.$saveToOcServerMenu).on('click', '#change-server', this._onChangeServerClicked.bind(this));
		this.$saveToOcButton.on('click', this._onSaveToOcButtonClicked.bind(this));

		// legacy
		window.FileList = this.fileList;
	},

	_onSaveToOcMenuCurrentServerClicked: function (event) {
		event.preventDefault();
		this.$saveToOcServerMenu.css('display', 'none');
	},

	_onChangeServerClicked: function (event) {
		event.preventDefault();
		this.$saveToOcServerMenu.css('display', 'none');

		OC.dialogs.prompt('', t('files_sharing', 'Add to another cloud'),
			function (proceed, url) {
				if (!url || !proceed) {
					return;
				}

				var token = $('#sharingToken').val();
				var owner = $('#header').data('owner');
				var ownerDisplayName = $('#header').data('owner-display-name');
				var name = $('#header').data('name');
				var isProtected = $('#header').data('protected') ? 1 : 0;

				OCA.Sharing.PublicApp._saveToOwnCloud(
					url,
					token,
					owner,
					ownerDisplayName,
					name,
					isProtected
				);

			}, true,
			t('files_sharing', 'Enter the server address to add the content to'),
			false,
			t('core', 'Cancel'),
			t('core', 'Add')
		).then(function () {
			var $dialog = $('.oc-dialog:visible');
			var $input = $dialog.find('input[type=text]');
			var $confirmButton = $dialog.find('button.primary');

			$confirmButton.prop('disabled', true);
			$confirmButton.prop('id', 'save-to-oc-button-confirm');
			$dialog.find('.ui-icon').remove();
			$input.css('width', '95%');
			$input.attr('placeholder', 'example.com/cloud');

			$input.on("keyup paste", function () {
				if ($(this).val() === '') {
					$confirmButton.prop('disabled', true);
				} else {
					$confirmButton.prop('disabled', false);
				}
			});
		});
	},

	_onSaveToOcButtonClicked: function () {
		var token = $('#sharingToken').val();
		var owner = $('#header').data('owner');
		var ownerDisplayName = $('#header').data('owner-display-name');
		var name = $('#header').data('name');
		var isProtected = $('#header').data('protected') ? 1 : 0;
		console.log(OC.getRootPath());

		OCA.Sharing.PublicApp._saveToOwnCloud(
			OC.getProtocol() + '://' + OC.getHost() + OC.getRootPath(),
			token,
			owner,
			ownerDisplayName,
			name,
			isProtected
		);
	},

	_showTextPreview: function (data, previewHeight) {
		var textDiv = $('<div/>').addClass('text-preview');
		textDiv.text(data);
		textDiv.appendTo('#imgframe');
		var divHeight = textDiv.height();
		if (data.length > 999) {
			var ellipsis = $('<div/>').addClass('ellipsis');
			ellipsis.html('(&#133;)');
			ellipsis.appendTo('#imgframe');
		}
		if (divHeight > previewHeight) {
			textDiv.height(previewHeight);
		}
	},

	_onDirectoryChanged: function (e) {
		OC.Util.History.pushState({
			// arghhhh, why is this not called "dir" !?
			path: e.dir
		});
	},

	_onUrlChanged: function (params) {
		this.fileList.changeDirectory(params.path || params.dir, false, true);
	},

	_saveToOwnCloud: function (remote, token, owner, ownerDisplayName, name, isProtected) {
		var that = this;

		var toggleLoading = function () {
			var isLoading = !that.$saveToOcButton.find('#save-to-oc-button-loading').hasClass('hidden');

			if (!isLoading) {
				$("#save-to-oc-button-loading").removeClass('hidden');
				that.$saveToOcButtonText.addClass('hidden');
				that.$saveToOcButton.prop('disabled', true);
			} else {
				$("#save-to-oc-button-loading").addClass('hidden');
				that.$saveToOcButtonText.removeClass('hidden');
				that.$saveToOcButton.prop('disabled', false);
			}
		};

		toggleLoading();

		var location = window.location.protocol + '//' + window.location.host + OC.webroot;

		if (remote.substr(-1) !== '/') {
			remote += '/';
		}

		var url = remote + 'index.php/apps/files#' + 'remote=' + encodeURIComponent(location) // our location is the remote for the other server
			+ "&token=" + encodeURIComponent(token) + "&owner=" + encodeURIComponent(owner) + "&ownerDisplayName=" + encodeURIComponent(ownerDisplayName) + "&name=" + encodeURIComponent(name) + "&protected=" + isProtected;


		if (remote.indexOf('://') > 0) {
			toggleLoading();
			OC.redirect(url);
		} else {
			// if no protocol is specified, we automatically detect it by testing https and http
			// this check needs to happen on the server due to the Content Security Policy directive
			$.get(OC.generateUrl('apps/files_sharing/testremote'), {remote: remote}).then(function (protocol) {
				if (protocol !== 'http' && protocol !== 'https') {
					OC.dialogs.alert(t('files_sharing', 'No ownCloud installation (7 or higher) found at {remote}', {remote: remote}),
						t('files_sharing', 'Invalid ownCloud url'));
				} else {
					OC.redirect(protocol + "://" + url);
				}

				toggleLoading();
			});
		}
	}
};

$(document).ready(function () {
	// FIXME: replace with OC.Plugins.register()
	if (window.TESTING) {
		return;
	}

	var App = OCA.Sharing.PublicApp;
	// defer app init, to give a chance to plugins to register file actions
	_.defer(function () {
		App.initialize($('#preview'));
	});

	if (window.Files) {
		// HACK: for oc-dialogs previews that depends on Files:
		Files.generatePreviewUrl = function (urlSpec) {
			return App.fileList.generatePreviewUrl(urlSpec);
		};
	}
});

