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
	var PASSWORD_PLACEHOLDER_MESSAGE = t('core', 'Choose a password for the public link');
	var TEMPLATE =
		'<div class="error-message-global hidden"></div>' +
		'<div class="public-link-modal">'+
			'<div class="public-link-modal--item">' +
				'<label class="public-link-modal--label">Link Name</label>' +
				'<input class="public-link-modal--input" type="text" name="linkName" placeholder="{{namePlaceholder}}" value="{{name}}" maxlength="64" />' +
			'</div>' +
			'{{#if publicUploadPossible}}' +
			'<div id="allowPublicUploadWrapper-{{cid}}" class="public-link-modal--item">' +
				'<input type="checkbox" value="1" name="allowPublicUpload" id="sharingDialogAllowPublicUpload-{{cid}}" class="checkbox publicUploadCheckbox" {{#if publicUploadChecked}}checked="checked"{{/if}} />' +
				'<label for="sharingDialogAllowPublicUpload-{{cid}}">{{publicUploadLabel}}</label>' +
			'</div>' +
			'<div id="showListingWrapper-{{cid}}" class="public-link-modal--item">' +
				'<input type="checkbox" value="1" name="showListing" id="sharingDialogShowListing-{{cid}}" class="checkbox showListingCheckbox" {{#if showListingChecked}}checked="checked"{{/if}} />' +
				'<label for="sharingDialogShowListing-{{cid}}">{{showListingLabel}}</label>' +
			'</div>' +
			'{{/if}}' +
			'<div id="linkPass-{{cid}}" class="public-link-modal--item linkPass">' +
				'<label class="public-link-modal--label" for="linkPassText-{{cid}}">{{passwordLabel}}{{#if isPasswordRequired}}<span class="required-indicator">*</span>{{/if}}</label>' +
				'<input class="public-link-modal--input linkPassText" id="linkPassText-{{cid}}" type="password" placeholder="{{passwordPlaceholder}}" />' +
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

		events: {
			'click .publicUploadCheckbox': '_updateCheckboxes'
		},

		initialize: function (options) {
			if (!_.isUndefined(options.itemModel)) {
				this.itemModel = options.itemModel;
				this.configModel = this.itemModel.configModel;
			} else {
				throw 'missing OC.Share.ShareItemModel';
			}

			this.expirationView = new OC.Share.ShareDialogExpirationView({
				model: this.model,
				itemModel: this.itemModel
			});

			OC.Plugins.attach('OCA.Share.ShareDialogLinkShareView', this);
		},

		_updateCheckboxes: function() {
			var publicUploadAllowed = this.$('.publicUploadCheckbox').is(':checked');
			if (!publicUploadAllowed) {
				this.$('.showListingCheckbox').prop('checked', true);
				this.$('.showListingCheckbox').prop('disabled', true);
			} else {
				this.$('.showListingCheckbox').prop('disabled', false);
			}
		},

		/**
		 * Returns the selected permissions as read from the checkboxes or
		 * the absence thereof.
		 *
		 * @return {int} permissions
		 */
		_getPermissions: function() {
			var $showListingCheckbox = this.$('.showListingCheckbox');
			var $publicUploadCheckbox = this.$('.publicUploadCheckbox');
			var allowListing = (!$showListingCheckbox.length || $showListingCheckbox.is(':checked'));
			var permissions = 0;

			// if the checkbox is missing, default to checked
			if (allowListing) {
				permissions |= OC.PERMISSION_READ;
			}

			// if the checkbox is missing it is the equivalent of unchecked
			if ($publicUploadCheckbox.is(':checked')) {
				if (allowListing) {
					permissions |= OC.PERMISSION_UPDATE | OC.PERMISSION_CREATE | OC.PERMISSION_DELETE;
				} else {
					// without listing only file creation is allowed, no overwrite nor delete
					permissions |= OC.PERMISSION_CREATE;
				}
			} else {
				// ignore listing perm, allow reading
				permissions |= OC.PERMISSION_READ;
			}

			return permissions;
		},

		_save: function () {
			var deferred = $.Deferred();
			var $el = this.$el;

			var $password = $el.find('.linkPassText'),
				$inputs = $el.find('.linkPassText, .expirationDate, .permission'), // all input fields combined
				$errorMessageGlobal = $el.find('.error-message-global'),
				$loading = $el.find('.loading'),
				password = $password.val(),
				expirationDate = this.expirationView.getValue();

			$el.find('.error-message').addClass('hidden');

			// remove errors (if present)
			// ***

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

			if (this.configModel.get('enforcePasswordForPublicLink')
				&& !password
				&& (this.model.isNew() || !this.model.get('encryptedPassword'))
			) {
				$password.addClass('error');
				$password.next('.error-message').removeClass('hidden').text(t('files_sharing', 'Password required'));
				validates = false;
			}

			if (!validates) {
				deferred.reject(this.model);
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
						self.mailView.sendEmails().then(done).
						fail(function() {
							// re-show the popup
							self.show();
						});
					} else {
						done();
					}
					self.model.unset("resetPassword");
				},
				error: function (model, xhr) {
					var msg = xhr.responseJSON.ocs.meta.message;
					// destroy old tooltips
					$loading.addClass('hidden');
					$errorMessageGlobal.removeClass('hidden').text(msg);
					deferred.reject(self.model);
				}
			});

			return deferred.promise();
		},

		_remove: function () {
			this.model.destroy();
		},

		_isPublicUploadPossible: function() {
			// TODO: in the future to read directly from the FileInfoModel
			return this.itemModel.isFolder() && this.itemModel.createPermissionPossible() && this.configModel.isPublicUploadEnabled();
		},

		render: function () {
			var isPasswordSet = !!this.model.get('encryptedPassword');

			// only show email field for new shares and if enabled globally
			var showEmailField = this.model.isNew() && this.configModel.isMailPublicNotificationEnabled();

			this.$el.html(this.template({
				cid: this.cid,
				fileNameLabel : t('core', 'Filename'),
				passwordLabel: t('core', 'Password'),
				passwordPlaceholder: isPasswordSet ? PASSWORD_PLACEHOLDER_STARS : PASSWORD_PLACEHOLDER_MESSAGE,
				isPasswordRequired: this.configModel.get('enforcePasswordForPublicLink'),
				namePlaceholder: t('core', 'Name'),
				name: this.model.get('name'),
				isPasswordSet: isPasswordSet,
				publicUploadPossible: this._isPublicUploadPossible(),
				publicUploadChecked: this.model.canCreate(),
				publicUploadLabel: t('core', 'Allow editing'),
				showListingChecked: this.model.canRead(),
				showListingLabel: t('core', 'Show file listing'),
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

			this._updateCheckboxes();

			this.delegateEvents();

			return this;
		},

		_onClickReset: function () {
			var $dialog              = $('.oc-dialog:visible'),
				$inputPassword       = $dialog.find('.linkPassText'),
				$buttonReset         = $dialog.find('.removePassword');

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
			var title = t('files_sharing', 'Edit link share: {name}', {name: this.itemModel.getFileInfo().getFullPath()});
			var buttons = [{
				text: t('core', 'Save'),
				click: _.bind(this._onClickSave, this),
				defaultButton: true
			}, {
				text: t('core', 'Cancel'),
				click: _.bind(this._onClickCancel, this)
			}];

			if (this.model.isNew()) {
				title = t('files_sharing', 'Create link share: {name}', {name: this.itemModel.getFileInfo().getFullPath()});
			}
			else if (this.model.get('encryptedPassword')) {
				buttons.push({
					classes: 'removePassword -float-left',
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
		}

	});

	OC.Share.ShareDialogLinkShareView = ShareDialogLinkShareView;

})();
