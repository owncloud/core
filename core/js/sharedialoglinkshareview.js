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
			'<div class="fileName">{{fileName}}</div>' +
			'<input type="text" name="linkName" placeholder="{{namePlaceholder}}" value="{{name}}" />' +
			'{{#if publicUploadPossible}}' +
			'<div id="allowPublicUploadWrapper-{{cid}}">' +
			'    <input type="checkbox" value="1" name="allowPublicUpload" id="sharingDialogAllowPublicUpload-{{cid}}" class="checkbox publicUploadCheckbox" {{{publicUploadChecked}}} />' +
			'<label for="sharingDialogAllowPublicUpload-{{cid}}">{{publicUploadLabel}}</label>' +
			'</div>' +
			'{{/if}}' +
			'<div id="linkPass-{{cid}}" class="linkPass">' +
			'    <label for="linkPassText-{{cid}}">{{passwordLabel}}{{#if isPasswordRequired}}<span class="required-indicator">*</span>{{/if}}</label>' +
			'    <input id="linkPassText-{{cid}}" class="linkPassText" type="password" placeholder="{{passwordPlaceholder}}" />' +
			'    <span class="error-message hidden"></span>' +
			'</div>' +
			'<div class="expirationDateContainer">' +
			'    <label for="expirationDate-{{cid}}" value="{{expirationDate}}">{{expirationLabel}}</label>' +
			'    <input id="expirationDate-{{cid}}" class="expirationDate datepicker" type="text" placeholder="{{expirationDatePlaceholder}}" value="{{expirationValue}}" />' +
			'    <span class="error-message hidden"></span>' +
			'</div>' +
			'{{#if isExpirationEnforced}}' +
			'<em id="defaultExpireMessage">{{defaultExpireMessage}}</em>' +
			'{{/if}}' +
			'{{#if isMailEnabled}}' +
			'<div class="mailView"></div>' +
			'{{/if}}'
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
		},

		_save: function () {
			var deferred = $.Deferred();
			var $el = this.$el;

			var $password = $el.find('.linkPassText'),
				$expirationDate = $el.find('.expirationDate'),
				$permission = $el.find('.publicUploadCheckbox'),
				$inputs = $el.find('.linkPassText, .expirationDate, .permission'), // all input fields combined

				// get values from input elements
				// ***

				password = $password.val(),
				permission = ($permission.is(':checked')) ? OC.PERMISSION_UPDATE | OC.PERMISSION_CREATE | OC.PERMISSION_READ | OC.PERMISSION_DELETE : OC.PERMISSION_READ,
				expirationDate = $expirationDate.val();

			$el.find('.error-message').addClass('hidden');


			// remove errors (if present)
			// ***

			$inputs.removeClass('error');

			var attributes = {
				password: password,
				expireDate: expirationDate,
				permissions: permission,
				name: this.$('[name=linkName]').val()
			};

			if (this.configModel.get('enforcePasswordForPublicLink') && !password.trim()) {
				$password.addClass('error');
				// TODO: display message that password is required
				$password.next('.error-message').removeClass('hidden').text(t('files_sharing', 'Password required'));
				return deferred.reject();
			}

			if (this.model.isNew()) {
				// the API is inconsistent
				attributes.path = this.itemModel.getFileInfo().getFullPath();
			}

			var self = this;

			var done = function() {
				deferred.resolve(self.model);
				self.trigger('saved', self.model);
			};

			// save it
			// ***
			this.model.save(attributes, {
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
				error: function (model, msg) {
					// destroy old tooltips
					$inputs.tooltip('destroy');
					$loading.removeClass('inlineblock').addClass('hidden');
					$inputs.addClass('error');
					$inputs.attr('title', msg);
					$inputs.tooltip({placement: 'bottom', trigger: 'manual'});
					$inputs.tooltip('show');
					deferred.reject(self.model);
				}
			});

			return deferred.promise();
		},

		render: function () {
			// TODO: in the future to read directly from the FileInfoModel
			var publicUploadPossible = this.itemModel.isFolder() && this.itemModel.createPermissionPossible() && this.configModel.isPublicUploadEnabled();
			var publicUploadChecked  = (this.model.canCreate()) ? 'checked="checked"' : null;

			var expiration;
			var defaultExpireDays    = this.configModel.get('defaultExpireDate');
			var isExpirationEnforced = this.configModel.get('isDefaultExpireDateEnforced');
			var isExpirationSet      = !!this.model.get('expireDate') || isExpirationEnforced;
			var defaultExpireMessage;

			if((this.itemModel.isFolder() || this.itemModel.isFile()) && isExpirationEnforced) {
				defaultExpireMessage = t('core', 'The public link will expire no later than {days} days after it is created', {'days': defaultExpireDays });
			}

			if (isExpirationSet) {
				expiration = moment(this.model.get('expireDate'), 'YYYY-MM-DD').format('DD-MM-YYYY');
			}

			var isPasswordSet = !!this.model.get('password');

			var pickerMinDate = new Date();
			pickerMinDate.setDate(pickerMinDate.getDate()+1);

			$.datepicker.setDefaults({
				minDate: pickerMinDate,
				maxDate: null
			});

			// only show email field for new shares and if enabled globally
			var showEmailField = this.model.isNew() && this.configModel.isMailPublicNotificationEnabled();

			this.$el.html(this.template({
				cid: this.cid,
				expirationValue: expiration,
				fileName: this.itemModel.getFileInfo().getFullPath(),
				passwordLabel: t('core', 'Password'),
				passwordPlaceholder: isPasswordSet ? PASSWORD_PLACEHOLDER_STARS : PASSWORD_PLACEHOLDER_MESSAGE,
				isPasswordRequired: this.configModel.get('enforcePasswordForPublicLink'),
				namePlaceholder: t('core', 'Name'),
				name: this.model.get('name'),
				isPasswordSet: isPasswordSet,
				expirationLabel : t('core', 'Set expiration date'),
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
			var title = t('files_sharing', 'Edit link share');
			if (this.model.isNew()) {
				title = t('files_sharing', 'Create link share');
			}

			// hack the dialogs
			OC.dialogs.message(
				'',
				title,
				'custom',
				[{
					text: t('core', 'Save'),
					click: _.bind(this._onClickSave, this),
					defaultButton: true
				},
				{
					text: t('core', 'Cancel'),
					click: _.bind(this._onClickCancel, this)
				}],
				null,
				true
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
