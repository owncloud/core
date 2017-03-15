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
				'<a class="{{#unless isLinkShare}}hidden-visually{{/unless}} clipboardButton icon icon-clippy" data-clipboard-target="#linkText-{{cid}}"></a>' +
// TODO: replace with pencil and trash icons
				'<br/><button class="editLink">{{../editLinkText}}</button>' +
				'<button class="removeLink">{{../removeLinkText}}</button>' +
				'{{#if ../socialShareEnabled}}' +
				'<button class="shareLink">{{../shareText}}</button>' +
				'<div class="socialShareContainer hidden"></div>' +
				'{{/if}}' +
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

		className: 'shareDialogLinkList',

		/** @type {OC.Share.ShareConfigModel} **/
		configModel: undefined,

		/** @type {Function} **/
		_template: undefined,

		events: {
			'click .addLink': 'onAddButtonClick',
			'click .editLink': 'onEditButtonClick',
			'click .removeLink': 'onRemoveButtonClick',
			'click .shareLink': 'onShareButtonClick',
			'click .socialShare': 'onClickSocialShare'
		},

		initialize: function (options) {
			var view = this;

			// if any item in the list changes, rerender the whole thing
			this.collection.on('change update delete', function() {
				view.render();
			});

			if (!_.isUndefined(options.itemModel)) {
				this.itemModel = options.itemModel;
				this.fileInfoModel = this.itemModel.getFileInfo();
			} else {
				throw 'missing OC.Share.ShareItemModel';
			}

			if (!_.isUndefined(options.configModel)) {
				this.configModel = options.configModel;
			} else {
				throw 'missing OC.Share.ShareConfigModel';
			}

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
				shareType: OC.Share.SHARE_TYPE_LINK,
				itemType: this.itemModel.get('itemType'),
				itemSource: this.itemModel.get('itemSource')
			});
			this._showPopupForShare(newShare);
		},

		onEditButtonClick: function (ev) {
			var $target = $(ev.target);
			var linkId = $target.closest('.link-entry').attr('data-id');

			var linkModel = this.collection.get(linkId);
			if (!linkModel) {
				return;
			}

			this._showPopupForShare(linkModel);
		},

		onShareButtonClick: function (ev) {
			var $target = $(ev.target);
			var $li = $target.closest('.link-entry');
			var $container = $li.find('.socialShareContainer');

			if ($container.is(':empty')) {
				if (this.configModel.isSocialShareEnabled()) {
					var socialView = new OC.Share.ShareDialogLinkSocialView({
						model: this.itemModel,
						configModel: this.configModel
					});
					socialView.render();
					$container.append(socialView.$el);
					$container.removeClass('hidden');
				}
			} else {
				$container.toggleClass('hidden', !$container.hasClass('hidden'));
			}
		},

		_showPopupForShare: function(model) {
			var self = this;
			var popupView = new OC.Share.ShareDialogLinkShareView({
				model: model,
				configModel: this.configModel,
				// pass in legacy stuff...
				itemModel: this.itemModel
			});

			popupView.once('saved', function() {
				// add/update in collection on success
				self.collection.add(model);
			});
			popupView.show();
		},

		onClickSocialShare: function() {
			// TODO: create ShareDialogLinkSocial view and append under the clicked row
		},

		_formatItem: function(model) {
			return _.extend(model.toJSON(), {
				link: this._makeLink(model)
			});
		},

		_makeLink: function(model) {
			var link = window.location.protocol + '//' + window.location.host;
			if (!model.get('token')) {
				// pre-token link
				var fullPath = this.fileInfoModel.get('path') + '/' +
					this.fileInfoModel.get('name');
				var location = '/' + OC.currentUser + '/files' + fullPath;
				var type = this.fileInfoModel.isDirectory() ? 'folder' : 'file';
				link += OC.linkTo('', 'public.php') + '?service=files&' +
					type + '=' + encodeURIComponent(location);
			} else {
				link += OC.generateUrl('/s/') + model.get('token');
			}
			return link;
		},

		render: function () {
			this.$el.html(this.template({
				cid: this.cid,
				urlLabel: t('core', 'Link'),
				addLinkText: t('core', 'Create public link'),
				editLinkText: t('core', 'Edit'),
				removeLinkText: t('core', 'Remove'),
				shareText: t('core', 'Social share'),
				socialShareEnabled: this.configModel.isSocialShareEnabled(),
				noShares: !this.collection.length,
				noSharesMessage: t('core', 'There are currently no link shares, you can create one'),
				shares: this.collection.map(_.bind(this._formatItem, this))
			}));

			var clipboard = new Clipboard('#' + this.id + ' .clipboardButton');
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
