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
			'<span class="icon-loading-small hidden"></span>' +
			'<ul class="link-shares">' +
			'{{#each shares}}' +
			'<li class="link-entry oneline" data-id="{{id}}">' +
			'	<label for="linkText-{{cid}}">{{urlLabel}}</label>' +
				'<input id="linkText-{{cid}}" class="linkText" type="text" readonly="readonly" value="{{link}}" />' +
// TODO: add social button here:
				'<a class="{{#unless isLinkShare}}hidden-visually{{/unless}} clipboardButton icon icon-clippy" data-clipboard-target="#linkText-{{cid}}"></a>' +
				'<button class="removeLink">{{removeLinkText}}</button>' +
			'</li>' +
			'{{/each}}' +
			'</ul>' +
			'{{#if noShares}}' +
			'{{noSharesMessage}}' +
			'{{/if}}' +
			'<div class="clear-both">' +
			'	<button class="addLink">{{addLinkText}}</button>' +
			'</div>'
		;

	/**
	 * @class OCA.Share.ShareDialogLinkListView
	 * @member {OC.Share.ShareItemModel} model
	 * @member {jQuery} $el
	 * @memberof OCA.Sharing
	 * @classdesc
	 *
	 * Represents the GUI of the share dialogue
	 *
	 */
	var ShareDialogLinkListView = OC.Backbone.View.extend({
		/** @type {string} **/
		id: 'shareDialogLinkList',

		/** @type {OC.Share.ShareConfigModel} **/
		configModel: undefined,

		/** @type {Function} **/
		_template: undefined,

		events: {
			'click .addLink': 'onAddButtonClick',
			'click .removeLink': 'onRemoveButtonClick',
			'click .socialShare': 'onClickSocialShare'
		},

		initialize: function (options) {
			var view = this;

			// if any item in the list changes, rerender the whole thing
			this.collection.on('change update delete', function() {
				view.render();
			});

			if (!_.isUndefined(options.configModel)) {
				this.configModel = options.configModel;
			} else {
				throw 'missing OC.Share.ShareConfigModel';
			}

			var clipboard = new Clipboard('.clipboardButton');
			clipboard.on('success', function (e) {
				var $input = $(e.trigger);
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
				var $input = $(e.trigger);
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

		onRemoveButtonClick: function (ev) {
			var $target = $(ev.target);
			var linkId = $target.closest('.link-entry').attr('data-id');

			var linkModel = this.collection.get(linkId);
			if (!linkModel) {
				return;
			}

			// delete the model from the server
			linkModel.destroy();
		},

		onAddButtonClick: function () {
			var newShare = new OC.Share.ShareModel({
				password: '',
				passwordChanged: false,
				permissions: OC.PERMISSION_READ,
				expireDate: this.configModel.getDefaultExpirationDateString(),
				shareType: OC.Share.SHARE_TYPE_LINK
			});
			this._showPopupForShare(newShare);
		},

		onEditButtonClick: function () {
			var $target = $(ev.target);
			var linkId = $target.closest('.link-entry').attr('data-id');

			var linkModel = this.collection.get(linkId);
			if (!linkModel) {
				return;
			}

			this._showPopupForShare(linkModel);
		},

		_showPopupForShare: function(model) {
			var self = this;
			var popupView = new OC.Share.ShareDialogLinkShareView({
				model: model,
				configModel: this.configModel
			});

			var title = t('files_sharing', 'Edit link share');
			if (model.isNew()) {
				title = t('files_sharing', 'Create link share');
			}

			// hack the dialogs
			OC.dialogs.message(
				'',
				title,
				'custom',
				OC.dialogs.OK_BUTTON,
				function (result) {
					if (result === true) {
						// TODO: error handling
						model.save();
						self.collection.add(model);
					}
				},
				true
			).then(function adjustDialog() {
				var $dialog = $('.oc-dialog:visible');

				popupView.render();
				$dialog.find('.oc-dialog-content').replaceWith(popupView.$el);
			});
		},

		onClickSocialShare: function() {
			// TODO: create ShareDialogLinkSocial view and append under the clicked row
		},

		_formatItem: function(model) {
			return model.toJSON();
		},

		render: function () {
			this.$el.html(this.template({
				cid: this.cid,
				urlLabel: t('core', 'Link'),
				addLinkText: t('core', 'Create link share'),
				removeLinkText: t('core', 'Remove'),
				noShares: !this.collection.length,
				noSharesMessage: t('core', 'There are currently no link shares, you can create one'),
				shares: this.collection.map(_.bind(this._formatItem, this))
			}));

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
		}

	});

	OC.Share.ShareDialogLinkListView = ShareDialogLinkListView;

})();
