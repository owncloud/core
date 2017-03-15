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

	var PASSWORD_PLACEHOLDER = '**********';
	var PASSWORD_PLACEHOLDER_MESSAGE = t('core', 'Choose a password for the public link');
	var PASSWORD_PLACEHOLDER_MESSAGE_OPTIONAL = t('core', 'Choose a password for the public link or press enter');
	var TEMPLATE =
			'<span class="icon-loading-small hidden"></span>' +
			'<div class="fileName">{{fileName}}</div>' +
			'<input type="text" name="linkName" placeholder="{{namePlaceholder}}" value="{{name}}" />' +
			'{{#if publicUploadPossible}}' +
			'<div id="allowPublicUploadWrapper-{{cid}}">' +
			'    <span class="icon-loading-small hidden"></span>' +
			'    <input type="checkbox" value="1" name="allowPublicUpload" id="sharingDialogAllowPublicUpload-{{cid}}" class="checkbox publicUploadCheckbox" {{{publicUploadChecked}}} />' +
			'<label for="sharingDialogAllowPublicUpload-{{cid}}">{{publicUploadLabel}}</label>' +
			'</div>' +
			'{{/if}}' +
			'<div id="linkPass-{{cid}}" class="linkPass">' +
			'    <label for="linkPassText-{{cid}}">{{passwordLabel}}</label>' +
			'    <input id="linkPassText-{{cid}}" class="linkPassText" type="password" placeholder="{{passwordPlaceholder}}" />' +
			'    <span class="icon-loading-small hidden"></span>' +
			'</div>' +
			'<div class="expirationDateContainer">' +
			'    <label for="expirationDate-{{cid}}" value="{{expirationDate}}">{{expirationLabel}}</label>' +
			'    <input id="expirationDate-{{cid}}" class="expirationDate datepicker" type="text" placeholder="{{expirationDatePlaceholder}}" value="{{expirationValue}}" />' +
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

		/** @type {OC.Share.ShareConfigModel} **/
		configModel: undefined,

		/** @type {Function} **/
		_template: undefined,

		/** @type {boolean} **/
		showLink: true,

		initialize: function (options) {
			if (!_.isUndefined(options.itemModel)) {
				this.itemModel = options.itemModel;
			} else {
				throw 'missing OC.Share.ShareItemModel';
			}
			if (!_.isUndefined(options.configModel)) {
				this.configModel = options.configModel;
			} else {
				throw 'missing OC.Share.ShareConfigModel';
			}
		},

		_save: function () {
			var $el = this.$el;

			// find input elements
			// ($ = jQuery object)
			// ***

			var $password = $el.find('.linkPassText'),
				$expirationDate = $el.find('.expirationDate'),
				$permission = $el.find('.publicUploadCheckbox'),
				$inputs = $el.find('.linkPassText, .expirationDate, .permission'), // all input fields combined


				// loading animation element
				// ***

				$loading = $el.find('.linkPass .icon-loading-small'),


				// get values from input elements
				// ***

				password = $password.val(),
				permission = ($permission.is(':checked')) ? OC.PERMISSION_UPDATE | OC.PERMISSION_CREATE | OC.PERMISSION_READ | OC.PERMISSION_DELETE : OC.PERMISSION_READ,
				expirationDate = $expirationDate.val();


			// remove errors (if present)
			// ***

			$inputs.removeClass('error');


			// show loading animation
			// ***

			$loading
				.removeClass('hidden')
				.addClass('inlineblock');


			var attributes = {
				password: password,
				expireDate: expirationDate,
				permissions: permission,
				name: this.$('[name=linkName]').val()
			};

			if (this.model.isNew()) {
				// the API is inconsistent
				attributes.path = this.itemModel.getFileInfo().getFullPath();
			}

			var self = this;

			var done = function() {
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
				}
			});
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

			var passwordPlaceholderInitial = this.configModel.get('enforcePasswordForPublicLink')
				? PASSWORD_PLACEHOLDER_MESSAGE : PASSWORD_PLACEHOLDER_MESSAGE_OPTIONAL;

			// only show email field for new shares and if enabled globally
			var showEmailField = this.model.isNew() && this.configModel.isMailPublicNotificationEnabled();

			this.$el.html(this.template({
				cid: this.cid,
				expirationValue: expiration,
				fileName: this.itemModel.getFileInfo().getFullPath(),
				passwordPlaceholder: (isPasswordSet) ? '*****' : null,
				passwordLabel: t('core', 'Password'),
				passwordPlaceholder: isPasswordSet ? PASSWORD_PLACEHOLDER : PASSWORD_PLACEHOLDER_MESSAGE,
				passwordPlaceholderInitial: passwordPlaceholderInitial,
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
				OC.dialogs.OK_BUTTON,
				function () {
					// note: this will also close the window,
					// need a way to prevent closing in case of error
					self._save();
				},
				true
			).then(function adjustDialog() {
				var $dialog = $('.oc-dialog:visible');

				self.render();
				$dialog.find('.oc-dialog-content').html(self.$el);
			});
		}

	});

	OC.Share.ShareDialogLinkShareView = ShareDialogLinkShareView;

})();
