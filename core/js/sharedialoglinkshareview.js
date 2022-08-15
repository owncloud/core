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
		OC.Share.ShareDialogLink = {};
	}

	/**
	 * @typedef {object} OC.Share.ShareDialogLink.PublicLinkRole
	 * @property {string} name
	 * @property {number} permissions
	 * @property {OC.Share.Types.ShareAttribute[]} attributes
	 */

	var PASSWORD_PLACEHOLDER_STARS = '**********';
	var PASSWORD_PLACEHOLDER_MESSAGE = t('core', 'Choose a password');
	var TEMPLATE =
		'<div class="error-message-global hidden"></div>' +
		'<div class="public-link-modal">'+
			'<div class="public-link-modal--item">' +
				'<label class="public-link-modal--label">{{linkNameLabel}}</label>' +
				'<input class="public-link-modal--input" type="text" name="linkName" placeholder="{{namePlaceholder}}" value="{{name}}" maxlength="64" />' +
			'</div>' +
			'<div id="appManagedPublicLinkModelItems">' +
			'</div>' +
			'<div id="allowPublicRead-{{cid}}" class="public-link-modal--item">' +
				'<input type="radio" value="allowPublicRead" name="publicLinkRole" id="sharingDialogAllowPublicRead-{{cid}}" class="checkbox publicLinkRole" {{#if publicReadSelected}}checked{{/if}} />' +
				'<label class="bold" for="sharingDialogAllowPublicRead-{{cid}}">{{publicReadLabel}}</label>' +
				'<p><em>{{publicReadDescription}}</em></p>' +
			'</div>' +
			'{{#if publicUploadFilePossible}}' +
			'<div id="allowPublicFileReadWrite-{{cid}}" class="public-link-modal--item">' +
				'<input type="radio" value="allowPublicFileReadWrite" name="publicLinkRole" id="sharingDialogAllowPublicFileReadWrite-{{cid}}" class="checkbox publicLinkRole" {{#if publicFileReadWriteSelected}}checked{{/if}} />' +
				'<label class="bold" for="sharingDialogAllowPublicFileReadWrite-{{cid}}">{{publicFileReadWriteLabel}}</label>' +
				'<p><em>{{publicFileReadWriteDescription}}</em></p>' +
			'</div>' +
			'{{/if}}' +
			'{{#if publicUploadFolderPossible}}' +
			'<div id="allowPublicUploadWrite-{{cid}}" class="public-link-modal--item">' +
				'<input type="radio" value="allowPublicUploadWrite" name="publicLinkRole" id="sharingDialogAllowPublicUploadWrite-{{cid}}" class="checkbox publicLinkRole" {{#if publicUploadWriteSelected}}checked{{/if}} />' +
				'<label class="bold" for="sharingDialogAllowPublicUploadWrite-{{cid}}">{{publicUploadWriteLabel}}</label>' +
				'<p><em>{{publicUploadWriteDescription}}</em></p>' +
			'</div>' +
			'<div id="allowPublicFolderReadWrite-{{cid}}" class="public-link-modal--item">' +
				'<input type="radio" value="allowPublicFolderReadWrite" name="publicLinkRole" id="sharingDialogAllowPublicFolderReadWrite-{{cid}}" class="checkbox publicLinkRole" {{#if publicFolderReadWriteSelected}}checked{{/if}} />' +
				'<label class="bold" for="sharingDialogAllowPublicFolderReadWrite-{{cid}}">{{publicFolderReadWriteLabel}}</label>' +
				'<p><em>{{publicFolderReadWriteDescription}}</em></p>' +
			'</div>' +
			'<div id="allowPublicUpload-{{cid}}" class="public-link-modal--item">' +
				'<input type="radio" value="allowPublicUpload" name="publicLinkRole" id="sharingDialogAllowPublicUpload-{{cid}}" class="checkbox publicLinkRole" {{#if publicUploadSelected}}checked{{/if}} />' +
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

		/** @type {OC.Share.ShareDialogLink.PublicLinkRole} **/
		_coreRoles: [
			{
				name: "allowPublicRead",
				permissions: OC.PERMISSION_READ,
				attributes: []
			},
			{
				name: "allowPublicUploadWrite",
				permissions: OC.PERMISSION_READ | OC.PERMISSION_CREATE,
				attributes: []
			},
			{
				name: "allowPublicUpload",
				permissions: OC.PERMISSION_CREATE,
				attributes: []
			},
			{
				name: "allowPublicFileReadWrite",
				permissions: OC.PERMISSION_READ | OC.PERMISSION_UPDATE,
				attributes: []
			},
			{
				name: "allowPublicFolderReadWrite",
				permissions: OC.PERMISSION_READ | OC.PERMISSION_UPDATE | OC.PERMISSION_CREATE | OC.PERMISSION_DELETE,
				attributes: []
			}
		],

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
		 * Returns public link roles available for share dialog link
		 * 
		 * NOTE: this API should be extended by apps to register new roles,
		 *       along with registering entry in div[id=appManagedPublicLinkModelItems]
		 * 
		 * @return {OC.Share.ShareDialogLink.PublicLinkRole[]} roles
		 */
		getRoles: function() {
			// base return value that can be extended by apps
			return this._coreRoles;
		},

		/**
		 * Returns the selected permissions as read from the checkboxes or
		 * the absence thereof.
		 *
		 * @return {int} permissions
		 */
		_getSharePermissions: function() {
			var publicLinkRoles = this.getRoles();
			var selectedPublicLinkRole = this.$('input[name="publicLinkRole"]:checked').val();

			if (selectedPublicLinkRole) {
				for(var i in publicLinkRoles) {
					if (publicLinkRoles[i].name === selectedPublicLinkRole) {
						return publicLinkRoles[i].permissions
					}
				}
			}
			return OC.PERMISSION_READ;
		},

		/**
		 * Returns the selected attributes as read from the checkboxes or
		 * the absence thereof.
		 *
		 * @return {OC.Share.Types.ShareAttribute[]} attributes
		 */
		_getShareAttributes: function() {
			var publicLinkRoles = this.getRoles();
			var selectedPublicLinkRole = this.$('input[name="publicLinkRole"]:checked').val();

			if (selectedPublicLinkRole) {
				for(var i in publicLinkRoles) {
					if (publicLinkRoles[i].name === selectedPublicLinkRole) {
						return publicLinkRoles[i].attributes
					}
				}
			}
			return [];
		},

		/**
		 * Returns whether the permissions and attributes of current share 
		 * match to given role
		 *
		 * @return {boolean} enabled
		 */
		_checkRoleEnabled: function(role) {
			var publicLinkRoles = this.getRoles();
;
			var assignedSharePermissions = this.model.get('permissions');
			var assignedShareAttributes = (this.model.get('attributes') ? this.model.get('attributes') : []);

			for(var i in publicLinkRoles) {
				if (publicLinkRoles[i].name === role) {
					var roleSharePermissions = publicLinkRoles[i].permissions;
					var roleShareAttributes = publicLinkRoles[i].attributes;

					// FIXME: for a moment map to string to allow dict comparisons for match 
					//        but should be bitmap check instead
					//        as in case of share to group/user
					return (assignedSharePermissions === roleSharePermissions 
						&& JSON.stringify(assignedShareAttributes) === JSON.stringify(roleShareAttributes))
				}
			}
			return false;
		},

		_shouldRequirePassword: function() {
			// matching passwordMustBeEnforced from server side
			var permissions = this._getSharePermissions();
			var roEnforcement = permissions === OC.PERMISSION_READ && this.configModel.get('enforceLinkPasswordReadOnly');
			var woEnforcement = permissions === OC.PERMISSION_CREATE && this.configModel.get('enforceLinkPasswordWriteOnly');
			var rwEnforcement = (permissions === (OC.PERMISSION_READ | OC.PERMISSION_CREATE) && this.configModel.get('enforceLinkPasswordReadWrite'));
			var rwdEnforcement = (permissions === (OC.PERMISSION_READ | OC.PERMISSION_UPDATE | OC.PERMISSION_CREATE | OC.PERMISSION_DELETE) && this.configModel.get('enforceLinkPasswordReadWriteDelete'));
			if (roEnforcement || woEnforcement || rwEnforcement || rwdEnforcement) {
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
				permissions: this._getSharePermissions(),
				attributes: this._getShareAttributes(),
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
				publicUploadSelected       : this._checkRoleEnabled('allowPublicUpload'),

				publicReadLabel            : t('core', 'Download / View'),
				publicReadDescription      : t('core', 'Recipients can view or download contents.'),
				publicReadSelected         : this._checkRoleEnabled('allowPublicRead'),

				publicUploadWriteLabel       : t('core', 'Download / View / Upload'),
				publicUploadWriteDescription : t('core', 'Recipients can view, download and upload contents.'),
				publicUploadWriteSelected    : this._checkRoleEnabled('allowPublicUploadWrite'),

				publicFileReadWriteLabel       : t('core', 'Download / View / Edit'),
				publicFileReadWriteDescription : t('core', 'Recipients can view, download and edit contents.'),
				publicFileReadWriteSelected    : this._checkRoleEnabled('allowPublicFileReadWrite'),

				publicFolderReadWriteLabel       : t('core', 'Download / View / Edit / Upload'),
				publicFolderReadWriteDescription : t('core', 'Recipients can view, download, edit, delete and upload contents.'),
				publicFolderReadWriteSelected    : this._checkRoleEnabled('allowPublicFolderReadWrite'),

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
