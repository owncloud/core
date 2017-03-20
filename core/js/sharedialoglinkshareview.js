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
				'<input class="public-link-modal--input" type="text" name="linkName" placeholder="{{namePlaceholder}}" value="{{name}}" />' +
			'</div>' +
			'{{#if publicUploadPossible}}' +
			'<div id="allowPublicUploadWrapper-{{cid}}" class="public-link-modal--item">' +
				'<input type="checkbox" value="1" name="allowPublicUpload" id="sharingDialogAllowPublicUpload-{{cid}}" class="checkbox publicUploadCheckbox" {{{publicUploadChecked}}} />' +
				'<label for="sharingDialogAllowPublicUpload-{{cid}}">{{publicUploadLabel}}</label>' +
			'</div>' +
			'{{/if}}' +
			'<div id="linkPass-{{cid}}" class="public-link-modal--item">' +
				'<label class="public-link-modal--label" for="linkPassText-{{cid}}">{{passwordLabel}}{{#if isPasswordRequired}}<span class="required-indicator">*</span>{{/if}}</label>' +
				'<input class="public-link-modal--input" id="linkPassText-{{cid}}" type="text" placeholder="{{passwordPlaceholder}}" />' +
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

			this.expirationView = new OC.Share.ShareDialogExpirationView({
				model: this.model,
				itemModel: this.itemModel
			});
		},

		_save: function () {
			var deferred = $.Deferred();
			var $el = this.$el;

			var $password = $el.find('.linkPassText'),
				$permission = $el.find('.publicUploadCheckbox'),
				$inputs = $el.find('.linkPassText, .expirationDate, .permission'), // all input fields combined
				$errorMessageGlobal = $el.find('.error-message-global'),
				$loading = $el.find('.loading'),

				// get values from input elements
				// ***

				password = $password.val(),
				permission = ($permission.is(':checked')) ? OC.PERMISSION_UPDATE | OC.PERMISSION_CREATE | OC.PERMISSION_READ | OC.PERMISSION_DELETE : OC.PERMISSION_READ,
				expirationDate = this.expirationView.getValue();


			$el.find('.error-message').addClass('hidden');


			// remove errors (if present)
			// ***

			$inputs.removeClass('error');
			$errorMessageGlobal.addClass('hidden');

			// explicit attributes to be saved
			var attributes = {
				expireDate: expirationDate,
				permissions: permission,
				name: this.$('[name=linkName]').val(),
				shareType: this.model.get('shareType')
			};

			// TODO: need a way to clear password (check if "encryptedPassword" was set)
			if (password) {
				// only set password explicitly if changed, else leave previous value
				attributes.password = password;
			}

			var validates = true;
			validates &= this.expirationView.validate();

			if (this.configModel.get('enforcePasswordForPublicLink')
				&& !password.trim()
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

		render: function () {
			// TODO: in the future to read directly from the FileInfoModel
			var publicUploadPossible = this.itemModel.isFolder() && this.itemModel.createPermissionPossible() && this.configModel.isPublicUploadEnabled();
			var publicUploadChecked  = (this.model.canCreate()) ? 'checked="checked"' : null;

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
				publicUploadPossible: publicUploadPossible,
				publicUploadChecked: publicUploadChecked,
				publicUploadLabel: t('core', 'Allow uploads'),
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

		_onClickSave: function() {
			var self = this;
			this._save().then(function() {
				self.$dialog.ocdialog('close');
			});
		},

		_onClickCancel: function() {
			this.$dialog.ocdialog('close');
		},

		_onClickRemove: function() {
			this._remove();
			this.$dialog.ocdialog('close');
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
			var title = t('files_sharing', 'Edit link share: {name}', {name : this.itemModel.getFileInfo().getFullPath() });
			if (this.model.isNew()) {
				title = t('files_sharing', 'Create link share: {name}', {name : this.itemModel.getFileInfo().getFullPath() });
			}

			// hack the dialogs
			OC.dialogs.message(
				'',
				title,
				'custom',
				[
					{
						text: t('core', 'Save'),
						click: _.bind(this._onClickSave, this),
						defaultButton: true
					}, {
						text: t('core', 'Cancel'),
						click: _.bind(this._onClickCancel, this)
					}
				],
				null,
				true,
				'public-link-modal'
			).then(function adjustDialog() {
				var $dialogShell = $('.oc-dialog:visible');
				self.render();
				self.$dialog = $dialogShell.find('.oc-dialog-content');
				self.$dialog.html(self.$el);
			});
		}

	});

	OC.Share.ShareDialogLinkShareView = ShareDialogLinkShareView;

})();
