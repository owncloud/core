/*
 * Copyright (c) 2017
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function(OC, OCA) {
	if (!OCA.Sharing) {
		OCA.Sharing = {};
	}

	var TEMPLATE =
		'<div>' +
		'    <h2>{{title}}</h2>' +
		'    <div id="uploadprogresswrapper">' +
		'        <div id="uploadprogressbar">' +
		'            <em class="label outer" style="display:none">' +
		'                <span class="desktop">{{uploadProgressText}}</span>' +
		'                <span class="mobile">...</span>' +
		'            </em>' +
		'        </div>' +
		'        <input type="button" class="stop icon-close" style="display:none" value="" />' +
		'    </div>' +
		'    <label>' +
		'        <input type="file" class="uploader hiddenuploadfield" name="files[]" />' +
		'        <div class="public-upload-view--dropzone">' +
		'            <span class="icon icon-upload"></span><span>{{uploadButtonLabel}}</span>' +
		'        </div>' +
		'    </label>' +
		'    <div class="public-upload-view--completed hidden">' +
		'        <h3>{{uploadedFilesMessage}}</h3>' +
		'        <ul></ul>' +
		'    </div>' +
		'</div>'
	;

	var ITEM_TEMPLATE =
		'<li>{{fileName}}</li>';

	/**
	 * @namespace
	 */
	OCA.Sharing.PublicUploadView = OC.Backbone.View.extend({
		className: 'public-upload-view',

		/**
		 * @type OC.Uploader
		 */
		_uploader: null,

		initialize: function(options) {
			this._filesClient = new OC.Files.Client({
				host: OC.getHost(),
				userName: options.shareToken,
				// note: password not be required, the endpoint
				// will recognize previous validation from the session
				root: OC.getRootPath() + '/public.php/webdav',
				useHTTPS: OC.getProtocol() === 'https'
			});

			_.bindAll(
				this,
				'_onUploadBeforeAdd',
				'_onUploadDone',
				'_getUploadUrl'
			);
		},

		_onUploadBeforeAdd: function(upload) {
			// add autorename header to deduplicate names on the server in case of conflict
			upload.setConflictMode(OC.FileUpload.CONFLICT_MODE_AUTORENAME_SERVER);
		},

		_onUploadDone: function(e, upload) {
			var fileName = upload.getFileName();
			this.$('.public-upload-view--completed').removeClass('hidden');
			this.$('.public-upload-view--completed ul').append(this.itemTemplate({
				fileName: fileName
			}));
		},

		_getUploadUrl: function(fileName) {
			return OC.getRootPath() + '/public.php/webdav/' + encodeURIComponent(fileName);
		},

		/**
		 * @returns {Function} from Handlebars
		 * @private
		 */
		template: function (data) {
			if (!this._template) {
				this._template = Handlebars.compile(TEMPLATE);
			}
			return this._template(data);
		},

		/**
		 * @returns {Function} from Handlebars
		 * @private
		 */
		itemTemplate: function (data) {
			if (!this._itemTemplate) {
				this._itemTemplate = Handlebars.compile(ITEM_TEMPLATE);
			}
			return this._itemTemplate(data);
		},

		render: function () {
			this.$el.html(this.template({
				title: t('files_sharing', 'Anonymous upload'),
				uploadButtonLabel: t('files_sharing', 'Click to select files or use drag & drop to upload'),
				uploadedFilesMessage: t('files_sharing', 'Uploaded files'),
				uploadProgressText: t('core', 'Uploading...')
			}));

			this.$el.find('.has-tooltip').tooltip();
			this.delegateEvents();

			this._uploader = new OC.Uploader(this.$('.uploader'), {
				filesClient: this._filesClient,
				dropZone: this.$('.public-upload-view--dropzone'),
				url: this._getUploadUrl
			});
			this._uploader.on('beforeadd', this._onUploadBeforeAdd);
			this._uploader.on('done', this._onUploadDone);

			return this;
		},
	});

	$(document).ready(function () {
		// FIXME: replace with OC.Plugins.register()
		if (window.TESTING) {
			return;
		}

		var view = new OCA.Sharing.PublicUploadView({
			shareToken: $('#sharingToken').val()
		});
		view.render();

		$('#preview .uploadForm').append(view.$el);
	});

})(OC,OCA);

