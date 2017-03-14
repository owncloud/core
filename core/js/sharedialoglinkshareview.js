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

	var TEMPLATE =
			'{{#if shareAllowed}}' +
			'<span class="icon-loading-small hidden"></span>' +
			'<div class="oneline {{#unless isLinkShare}}hidden{{/unless}}">' +
			'	<label for="linkText-{{cid}}">{{urlLabel}}</label>' +
				'<input id="linkText-{{cid}}" class="linkText" type="text" readonly="readonly" value="{{shareLinkURL}}" />' +
				'<a class="{{#unless isLinkShare}}hidden-visually{{/unless}} clipboardButton icon icon-clippy" data-clipboard-target="#linkText-{{cid}}"></a>' +
			'</div>' +
			'<div id="linkPass" class="linkPass">' +
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
			'<div class="clear-both">' +
			'	<button class="addLink">{{addLinkText}}</button>' +
			'	<button class="removeLink">{{removeLinkText}}</button>' +
			'</div>' +
			'{{else}}' +
			// FIXME: this doesn't belong in this view
			'{{#if noSharingPlaceholder}}<input id="shareWith-{{cid}}" class="shareWithField" type="text" placeholder="{{noSharingPlaceholder}}" disabled="disabled"/>{{/if}}' +
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

		events: {
			'click .addLink': 'onAddButtonClick',
			'click .removeLink': 'onRemoveButtonClick'
		},

		initialize: function (options) {
			var view = this;

			this.model.on('change:permissions', function () {
				view.render();
			});

			this.model.on('change:itemType', function () {
				view.render();
			});

			this.model.on('change:allowPublicUploadStatus', function () {
				view.render();
			});

			this.model.on('change:linkShare', function () {
				view.render();
			});

			if (!_.isUndefined(options.configModel)) {
				this.configModel = options.configModel;
			} else {
				throw 'missing OC.Share.ShareConfigModel';
			}

			_.bindAll(
				this,
				'onAddButtonClick',
				'onRemoveButtonClick'
			);

			var clipboard = new Clipboard('.clipboardButton');
			clipboard.on('success', function (e) {
				$input = $(e.trigger);
				$input.tooltip({
					placement: 'bottom',
					trigger: 'manual',
					title: t('core', 'Copied!')
				});
				$input.tooltip('show');
				_.delay(function () {
					$input.tooltip('hide');
				}, 3000);
			});
			clipboard.on('error', function (e) {
				$input = $(e.trigger);
				var actionMsg = '';
				if (bowser.ios) {
					actionMsg = t('core', 'Not supported!');
				} else if (bowser.mac) {
					actionMsg = t('core', 'Press ⌘-C to copy.');
				} else {
					actionMsg = t('core', 'Press Ctrl-C to copy.');
				}

				$input.tooltip({
					placement: 'bottom',
					trigger: 'manual',
					title: actionMsg
				});
				$input.tooltip('show');
				_.delay(function () {
					$input.tooltip('hide');
				}, 3000);
			});
		},

		onRemoveButtonClick: function () {

			this.model.removeLinkShare();
		},

		onAddButtonClick: function () {

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


			// save it
			// ***

			this.model.saveLinkShare({
				password: password,
				expireDate: expirationDate,
				permission: permission
			}, {
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
			var linkShareTemplate    = this.template();
			var resharingAllowed     = this.model.sharePermissionPossible();

			var publicUpload         = this.model.isFolder() && this.model.createPermissionPossible() && this.configModel.isPublicUploadEnabled();
			var publicUploadChecked  = (this.model.isPublicUploadAllowed()) ? 'checked="checked"' : null;

			var expiration;
			var defaultExpireDays    = this.configModel.get('defaultExpireDate');
			var isExpirationEnforced = this.configModel.get('isDefaultExpireDateEnforced');
			var isExpirationSet      = !!this.model.get('linkShare').expiration || isExpirationEnforced;

			if((this.model.isFolder() || this.model.isFile()) && isExpirationEnforced) {
				defaultExpireMessage = t('core', 'The public link will expire no later than {days} days after it is created', {'days': defaultExpireDays });
			}

			if (isExpirationSet) {
				expiration = moment(this.model.get('linkShare').expiration, 'YYYY-MM-DD').format('DD-MM-YYYY');
			}

			if (!resharingAllowed || !this.showLink || !this.configModel.isShareWithLinkAllowed()) {
				var templateData = {shareAllowed: false};
				if (!resharingAllowed) {
					// add message
					templateData.noSharingPlaceholder = t('core', 'Resharing is not allowed');
				}
				this.$el.html(linkShareTemplate(templateData));
				return this;
			}

			var isLinkShare = this.model.get('linkShare').isLinkShare;
			var isPasswordSet = !!this.model.get('linkShare').password;
			var showPasswordCheckBox = isLinkShare
				&& (   !this.configModel.get('enforcePasswordForPublicLink')
				|| !this.model.get('linkShare').password);

			var pickerMinDate = new Date();
			pickerMinDate.setDate(pickerMinDate.getDate()+1);

			$.datepicker.setDefaults({
				minDate: pickerMinDate,
				maxDate: null
			});

			this.$el.html(linkShareTemplate({
				cid: this.cid,
				shareAllowed: true,
				isLinkShare: isLinkShare,
				shareLinkURL: this.model.get('linkShare').link,
				linkShareLabel: t('core', 'Share link'),
				urlLabel: t('core', 'Link'),
				enablePasswordLabel: t('core', 'Password protect'),
				addLinkText: t('core', 'Add'),
				removeLinkText: t('core', 'Remove'),
				passwordLabel: t('core', 'Password'),
				expirationValue: expiration,
				passwordPlaceholder: (isPasswordSet) ? '*****' : null,
				isPasswordSet: isPasswordSet,
				expirationLabel : t('core', 'Set expiration date'),
				showPasswordCheckBox: showPasswordCheckBox,
				publicUpload: publicUpload && isLinkShare,
				publicUploadChecked: publicUploadChecked,
				publicUploadLabel: t('core', 'Allow editing'),
				mailPublicNotificationEnabled: isLinkShare && this.configModel.isMailPublicNotificationEnabled(),
				mailPrivatePlaceholder: t('core', 'Email link to person'),
				mailButtonText: t('core', 'Send')
			}));

			this.$el.find('.datepicker').datepicker({dateFormat : 'dd-mm-yy'});

			this.delegateEvents();

			return this;
		},

		/**
		 * @returns {Function} from Handlebars
		 * @private
		 */
		template: function () {
			if (!this._template) {
				this._template = Handlebars.compile(TEMPLATE);
			}
			return this._template;
		}

	});

	OC.Share.ShareDialogLinkShareView = ShareDialogLinkShareView;

})();
