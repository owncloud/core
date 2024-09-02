/*
 * Copyright (c) 2015
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function () {
	if (!OC.Share) {
		OC.Share = {};
	}

	var PASSWORD_PLACEHOLDER_STARS = '**********';
	var PASSWORD_PLACEHOLDER_MESSAGE = t('core', 'Choose a password - password policy may apply');
	var TEMPLATE =
		'<div class="error-message-global hidden"></div>' +
		'<div class="public-link-modal">'+
			'<div class="public-link-modal--item">' +
				'<label class="public-link-modal--label">{{linkNameLabel}}</label>' +
				'<input class="public-link-modal--input" type="text" name="linkName" placeholder="{{namePlaceholder}}" value="{{name}}" maxlength="64" />' +
			'</div>' +
			'<div id="allowPublicRead-{{cid}}" class="public-link-modal--item">' +
				'<input type="radio" value="{{publicReadValue}}" name="publicPermissions" id="sharingDialogAllowPublicRead-{{cid}}" class="checkbox publicPermissions" {{#if publicReadSelected}}checked{{/if}} />' +
				'<label class="bold" for="sharingDialogAllowPublicRead-{{cid}}">{{publicReadLabel}}</label>' +
				'<p><em>{{publicReadDescription}}</em></p>' +
			'</div>' +
			'{{#if publicUploadFilePossible}}' +
			'<div id="allowPublicFileReadWrite-{{cid}}" class="public-link-modal--item">' +
				'<input type="radio" value="{{publicFileReadWriteValue}}" name="publicPermissions" id="sharingDialogAllowPublicFileReadWrite-{{cid}}" class="checkbox publicPermissions" {{#if publicFileReadWriteSelected}}checked{{/if}} />' +
				'<label class="bold" for="sharingDialogAllowPublicFileReadWrite-{{cid}}">{{publicFileReadWriteLabel}}</label>' +
				'<p><em>{{publicFileReadWriteDescription}}</em></p>' +
			'</div>' +
			'{{/if}}' +
			'{{#if publicUploadFolderPossible}}' +
			'<div id="allowPublicUploadWrite-{{cid}}" class="public-link-modal--item">' +
				'<input type="radio" value="{{publicUploadWriteValue}}" name="publicPermissions" id="sharingDialogAllowpublicUploadWrite-{{cid}}" class="checkbox publicPermissions" {{#if publicUploadWriteSelected}}checked{{/if}} />' +
				'<label class="bold" for="sharingDialogAllowpublicUploadWrite-{{cid}}">{{publicUploadWriteLabel}}</label>' +
				'<p><em>{{publicUploadWriteDescription}}</em></p>' +
			'</div>' +
			'<div id="allowPublicFolderReadWrite-{{cid}}" class="public-link-modal--item">' +
				'<input type="radio" value="{{publicFolderReadWriteValue}}" name="publicPermissions" id="sharingDialogAllowPublicFolderReadWrite-{{cid}}" class="checkbox publicPermissions" {{#if publicFolderReadWriteSelected}}checked{{/if}} />' +
				'<label class="bold" for="sharingDialogAllowPublicFolderReadWrite-{{cid}}">{{publicFolderReadWriteLabel}}</label>' +
				'<p><em>{{publicFolderReadWriteDescription}}</em></p>' +
			'</div>' +
			'<div id="allowPublicUploadWrapper-{{cid}}" class="public-link-modal--item">' +
				'<input type="radio" value="{{publicUploadValue}}" name="publicPermissions" id="sharingDialogAllowPublicUpload-{{cid}}" class="checkbox publicPermissions" {{#if publicUploadSelected}}checked{{/if}} />' +
				'<label class="bold" for="sharingDialogAllowPublicUpload-{{cid}}">{{publicUploadLabel}}</label>' +
				'<p><em>{{publicUploadDescription}}</em></p>' +
			'</div>' +
			'{{/if}}' +
			'<div id="linkPass-{{cid}}" class="public-link-modal--item linkPass">' +
				'<label class="public-link-modal--label" for="linkPassText-{{cid}}">{{passwordLabel}}</label>' +
				'<input class="public-link-modal--input linkPassText" id="linkPassText-{{cid}}" type="password" autocomplete="off" placeholder="{{passwordPlaceholder}}" />' +
				'<span class="error-message hidden"></span>' +
			'</div>' +
			'<div class="expirationDateContainer"></div>' +
			'{{#if isMailEnabled}}' +
			'<div class="mailView"></div>' +
			'{{/if}}' +
		'</div>'
	;

	/**
	 * @class OCA.Share.ShareDialogLinkShareView
	 * @member {OC.Share.ShareItemModel} model
	 * @member {jQuery} $el
	 * @memberof OCA.Sharing
	 * @classdesc
	 *
	 * Represents the GUI of the share dialogue
	 *
	 */
	var ShareDialogLinkShareView = OC.Backbone.View.extend({
		/** @type {string} **/
		id: 'shareDialogLinkShare',

		className: 'shareDialogLinkShare',

		/** @type {OC.Share.ShareConfigModel} **/
		configModel: undefined,

		/** @type {OC.Share.ShareItemModel} **/
		itemModel: undefined,

		/** @type {Function} **/
		_template: undefined,

		initialize: function (options) {
			if (!_.isUndefined(options.itemModel)) {
				this.itemModel = options.itemModel;
				this.configModel = this.itemModel.configModel;
			} else {
				throw 'missing OC.Share.ShareItemModel';
			}

			this.expirationView = new OC.Share.ShareDialogLinkExpirationView({
				model: this.model,
				itemModel: this.itemModel
			});

			OC.Plugins.attach('OCA.Share.ShareDialogLinkShareView', this);
		},

		/**
		 * Returns the selected permissions as read from the checkboxes or
		 * the absence thereof.
		 *
		 * @return {int} permissions
		 */
		_getPermissions: function() {
			var permissions = this.$('input[name="publicPermissions"]:checked').val();

			return (permissions) ? parseInt(permissions, 10) : OC.PERMISSION_READ;
		},

		/**
		 * These are all cases as per OCA.Share.ShareDialogLinkShareView.render,
		 * matching passwordMustBeEnforced from server side
		 * 
		 * @returns {boolean}
		 */
		_shouldRequirePassword: function() {
			var permissions = this._getPermissions();

			// Download / View (file and folder)
			var publicRead = permissions === OC.PERMISSION_READ && this.configModel.get('enforceLinkPasswordReadOnly');

			// Upload only (File Drop folder)
			var publicUploadFolder = permissions === OC.PERMISSION_CREATE && this.configModel.get('enforceLinkPasswordWriteOnly');

			// Download / View / Upload (folder)
			var publicReadUploadFolder = (permissions === (OC.PERMISSION_READ | OC.PERMISSION_CREATE) && this.configModel.get('enforceLinkPasswordReadWrite'));

			// Download / View / Upload / Edit (folder)
			var publicReadWriteFolder = (permissions === (OC.PERMISSION_READ | OC.PERMISSION_UPDATE | OC.PERMISSION_CREATE | OC.PERMISSION_DELETE) && this.configModel.get('enforceLinkPasswordReadWriteDelete'));

			// Download / View / Edit (file)
			var publicReadWriteFile = (permissions === (OC.PERMISSION_READ | OC.PERMISSION_UPDATE) && this.configModel.get('enforceLinkPasswordReadWriteDelete'));

			if (publicRead || publicUploadFolder || publicReadUploadFolder || publicReadWriteFolder || publicReadWriteFile) {
				return true;
			} else {
				return false;
			}
		},

		_save: function () {
			var deferred = $.Deferred();
			var $el = this.$el;

			var $formElements       = $el.find('input, textarea, select, button'),
				$select2Elements    = $el.find('.select2-search-choice-close'),
				$password           = $el.find('.linkPassText'),
				$inputs             = $el.find('.linkPassText, .expirationDate, .permission'), // all input fields combined
				$errorMessageGlobal = $el.find('.error-message-global'),
				$loading            = $el.find('.loading'),

				password            = $password.val(),
				expirationDate      = this.expirationView.getValue();

			$el.find('.error-message').addClass('hidden');

			// prevent tinkering with form while loading
			$formElements.attr('disabled', true);
			$select2Elements.addClass('hidden');

			// remove errors
			$inputs.removeClass('error');
			$errorMessageGlobal.addClass('hidden');

			// explicit attributes to be saved
			var attributes = {
				expireDate: expirationDate,
				permissions: this._getPermissions(),
				name: this.$('[name=linkName]').val(),
				shareType: this.model.get('shareType')
			};

			// Reset password for the time being
			if (this.model.get("resetPassword")) {
				attributes.password = '';
			}

			if (password) {
				// only set password explicitly if changed
				attributes.password = password;
			}

			var validates = true;
			validates &= this.expirationView.validate();

			if (!(password || this.model.get('encryptedPassword')) && this._shouldRequirePassword()) {
				$password.addClass('error');
				$password.next('.error-message').removeClass('hidden').text(t('core', 'Password required'));
				validates = false;
			}

			if (!validates) {
				$loading.addClass('hidden');
				$formElements.removeAttr('disabled');
				$select2Elements.removeClass('hidden');
				return deferred.reject(this.model);
			}

			if (this.model.isNew()) {
				// the API is inconsistent
				attributes.path = this.itemModel.getFileInfo().getFullPath();
			}

			var self = this;

			var done = function() {
				$loading.addClass('hidden');
				deferred.resolve(self.model);
				self.trigger('saved', self.model);
			};

			$loading.removeClass('hidden');

			// save it
			// ***
			this.model.save(attributes, {
				// explicit attributes for patch-like PUT to avoid
				// passing all attributes
				attrs: attributes,
				success: function() {
					if (self.mailView) {
						// also send out email first
						// do not resolve on errors
						self.mailView.sendEmails().then(done);
					} else {
						done();
					}
					self.model.unset("resetPassword");
				},
				error: function (model, xhr) {
					var msg = xhr.responseJSON.ocs.meta.message;
					// destroy old tooltips
					$loading.addClass('hidden');
					$formElements.removeAttr('disabled');
					$select2Elements.removeClass('hidden');
					$errorMessageGlobal.removeClass('hidden').text(msg);
					deferred.reject(self.model);
				}
			});

			return deferred.promise();
		},

		_remove: function () {
			this.model.destroy();
		},

		_isPublicFolderUploadPossible: function() {
			if (this.itemModel.isFolder()) {
				return this.itemModel.createPermissionPossible() && this.configModel.isPublicUploadEnabled();
			}
			return false;
		},

		_isPublicFileUploadPossible: function() {
			if (this.itemModel.isFolder()) {
				return false;
			}
			return this.itemModel.updatePermissionPossible() && this.configModel.isPublicUploadEnabled();
		},

		render: function () {
			var isPasswordSet = !!this.model.get('encryptedPassword');

			// only show email field for new shares and if enabled globally
			var showEmailField = this.configModel.isMailPublicNotificationEnabled();

			this.$el.html(this.template({
				cid: this.cid,
				passwordPlaceholder: isPasswordSet ? PASSWORD_PLACEHOLDER_STARS : PASSWORD_PLACEHOLDER_MESSAGE,
				linkNameLabel: t('core', 'Link name'),
				namePlaceholder: t('core', 'Name'),
				name: this.model.get('name'),
				isPasswordSet: isPasswordSet,

				fileNameLabel              : t('core', 'Filename'),
				passwordLabel              : t('core', 'Password'),

				publicUploadFolderPossible : this._isPublicFolderUploadPossible(),
				publicUploadFilePossible   : this._isPublicFileUploadPossible(),

				publicUploadLabel          : t('core', 'Upload only') + ' (File Drop)',
				publicUploadDescription    : t('core', 'Receive files from multiple recipients without revealing the contents of the folder.'),
				publicUploadValue          : OC.PERMISSION_CREATE,
				publicUploadSelected       : this.model.get('permissions') === OC.PERMISSION_CREATE,

				publicReadLabel            : t('core', 'Download / View'),
				publicReadDescription      : t('core', 'Recipients can view or download contents.'),
				publicReadValue            : OC.PERMISSION_READ,
				publicReadSelected         : this.model.get('permissions') === OC.PERMISSION_READ,

				publicUploadWriteLabel       : t('core', 'Download / View / Upload'),
				publicUploadWriteDescription : t('core', 'Recipients can view, download and upload contents.'),
				publicUploadWriteValue       : OC.PERMISSION_READ | OC.PERMISSION_CREATE,
				publicUploadWriteSelected    : this.model.get('permissions') === (OC.PERMISSION_READ | OC.PERMISSION_CREATE),

				publicFolderReadWriteLabel       : t('core', 'Download / View / Upload / Edit'),
				publicFolderReadWriteDescription : t('core', 'Recipients can view, download, edit, delete and upload contents.'),
				publicFolderReadWriteValue       : OC.PERMISSION_READ | OC.PERMISSION_UPDATE | OC.PERMISSION_CREATE | OC.PERMISSION_DELETE,
				publicFolderReadWriteSelected    : this.model.get('permissions') >= (OC.PERMISSION_READ | OC.PERMISSION_UPDATE | OC.PERMISSION_CREATE | OC.PERMISSION_DELETE),

				publicFileReadWriteLabel       : t('core', 'Download / View / Edit'),
				publicFileReadWriteDescription : t('core', 'Recipients can view, download and edit contents.'),
				publicFileReadWriteValue       : OC.PERMISSION_READ | OC.PERMISSION_UPDATE,
				publicFileReadWriteSelected    : this.model.get('permissions') >= (OC.PERMISSION_READ | OC.PERMISSION_UPDATE),

				isMailEnabled: showEmailField
			}));

			this.$('.datepicker').datepicker({dateFormat : 'dd-mm-yy'});

			if (showEmailField) {
				this.mailView = new OC.Share.ShareDialogMailView({
					itemModel: this.itemModel,
					configModel: this.configModel,
					model: this.model
				});
				this.mailView.render();
				this.$('.mailView').append(this.mailView.$el);
			} else {
				this.mailView = null;
			}

			this.expirationView.render();
			this.$('.expirationDateContainer').append(this.expirationView.$el);

			this.delegateEvents();

			return this;
		},

		_onClickReset: function () {
			if (this._shouldRequirePassword()) {
				this.$el.find('.linkPassText').addClass('error').next('.error-message').removeClass('hidden').text(t('core', 'Can not remove required password'));
				return false;
			}
			var $dialog        = $('.oc-dialog:visible'),
				$inputPassword = $dialog.find('.linkPassText'),
				$buttonReset   = $dialog.find('.removePassword');

			this.model.set("resetPassword", true);

			$inputPassword
				.val('')
				.attr('placeholder', PASSWORD_PLACEHOLDER_MESSAGE);

			$buttonReset.remove();
		},

		_onClickSave: function() {
			var self = this;
			this._save().then(function() {
				self.$dialog.ocdialog('close');
			});
		},

		_onClickCancel: function() {
			this.$dialog.ocdialog('close');
			this.model.unset("resetPassword");
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
		 * Display this view inside a popup window
		 */
		show: function() {
			var self = this;
			var title = t('core', 'Edit link share: {name}', {name: this.itemModel.getFileInfo().getFullPath()});
			var buttons = [{
				text: t('core', 'Cancel'),
				click: _.bind(this._onClickCancel, this)
			}];

			if (this.model.isNew()) {
				title = t('core', 'Create link share: {name}', {name: this.itemModel.getFileInfo().getFullPath()});
				buttons.push({
					text: t('core', 'Share'),
					click: _.bind(this._onClickSave, this),
					defaultButton: true
				})
			}
			else {
				buttons.push({
					text: t('core', 'Save'),
					click: _.bind(this._onClickSave, this),
					defaultButton: true
				})
			}

			if (this.model.get('encryptedPassword') && !this.linkPasswordRequired()) {
				buttons.push({
					classes: 'removePassword',
					text: t('core', 'Remove password'),
					click: _.bind(this._onClickReset, this),
					defaultButton: false
				});
			}

			// hack the dialogs
			OC.dialogs.message(
				'',
				title,
				'custom',
				buttons,
				null,
				true,
				'public-link-modal'
			).then(function adjustDialog() {
				var $dialogShell = $('.oc-dialog:visible');
				self.render();
				self.$dialog = $dialogShell.find('.oc-dialog-content');
				self.$dialog.html(self.$el);
				self.$el.find('input:first').focus();
			});
		},

		linkPasswordRequired: function() {
			if (this.model.get('permissions') === OC.PERMISSION_CREATE) {
				return oc_appconfig.core.enforceLinkPasswordWriteOnly;
			}

			if (this.model.get('permissions') === OC.PERMISSION_READ) {
				return oc_appconfig.core.enforceLinkPasswordReadOnly;
			}

			if (this.model.get('permissions') === (OC.PERMISSION_READ | OC.PERMISSION_CREATE)) {
				return oc_appconfig.core.enforceLinkPasswordReadWrite;
			}

			if (this.model.get('permissions') >= (OC.PERMISSION_READ | OC.PERMISSION_UPDATE | OC.PERMISSION_CREATE | OC.PERMISSION_DELETE)) {
				return oc_appconfig.core.enforceLinkPasswordReadWriteDelete;
			}
		}

});

	OC.Share.ShareDialogLinkShareView = ShareDialogLinkShareView;

})();
