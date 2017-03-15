/*
 * Copyright (c) 2016
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function() {
	if (!OC.Share) {
		OC.Share = {};
	}
	
	var TEMPLATE = 
			'{{#if shareAllowed}}' +
			'    {{#if socialShareEnabled}}' +
			'<button class="icon icon-social-twitter pop-up hasTooltip"' +
			'	title="{{shareToolTipTwitter}}"' +
			'	data-url="https://twitter.com/intent/tweet?url={{reference}}"></button>' +
			'<button class="icon icon-social-facebook pop-up hasTooltip"' +
			'	title="{{shareToolTipFacebook}}"' +
			'	data-url="https://www.facebook.com/sharer/sharer.php?u={{reference}}"></button>' +
			'<button class="icon icon-social-diaspora pop-up hasTooltip"' +
			'	title="{{shareToolTipDiaspora}}"' +
			'	data-url="https://sharetodiaspora.github.io/?url={{reference}}"></button>' +
			'<button class="icon icon-social-googleplus pop-up hasTooltip"' +
			'	title="{{shareToolTipGoogle}}"' +
			'	data-url="https://plus.google.com/share?url={{reference}}"></button>' +
			'<button class="icon icon-mail-grey pop-up hasTooltip"' +
			'	title="{{shareToolTipMail}}"' +
			'	data-url="mailto:?subject=&body={{reference}}"></button>' +
			'    {{/if}}' +
			'{{/if}}'
		;
	
	/**
	 * @class OCA.Share.ShareDialogLinkSocialView
	 * @member {OC.Share.ShareModel} model
	 * @member {jQuery} $el
	 * @memberof OCA.Sharing
	 * @classdesc
	 *
	 * Represents the GUI of the share dialogue
	 *
	 */
	var ShareDialogLinkSocialView = OC.Backbone.View.extend({
		/** @type {string} **/
		id: 'shareDialogLinkSocialView',

		/** @type {OC.Share.ShareConfigModel} **/
		configModel: undefined,

		/** @type {Function} **/
		_template: undefined,

		/** @type {boolean} **/
		showLink: true,

		events: {
			"click .pop-up": 'onPopUpClick'
		},

		initialize: function(options) {
			var view = this;

			this.model.on('change:linkShare', function() {
				view.render();
			});

			if(!_.isUndefined(options.configModel)) {
				this.configModel = options.configModel;
			} else {
				throw 'missing OC.Share.ShareConfigModel';
			}
		},

		onPopUpClick: function(event) {
			var url = $(event.target).data('url');
			$(event.target).tooltip('hide');
			if (url) {
				var width = 600;
				var height = 400;
				var left = (screen.width/2)-(width/2);
				var top = (screen.height/2)-(height/2);

				window.open(url, 'name', 'width=' + width + ', height=' + height + ', top=' + top + ', left=' + left);
			}
		},

		render: function() {
			var linkShareTemplate = this.template();
			var resharingAllowed = this.model.sharePermissionPossible();

			if(!resharingAllowed
				|| !this.showLink
				|| !this.configModel.isShareWithLinkAllowed())
			{
				var templateData = {shareAllowed: false};
				if (!resharingAllowed) {
					// add message
					templateData.noSharingPlaceholder = t('core', 'Resharing is not allowed');
				}
				this.$el.html(linkShareTemplate(templateData));
				return this;
			}
		
			var link = this.model.toJSON();

			this.$el.html(linkShareTemplate({
				cid: this.cid,
				shareAllowed: true,
				socialShareEnabled: this.configModel.isSocialShareEnabled(),
				reference: link,
				shareToolTipTwitter: t('core', 'Share to Twitter. Opens in a new window.'),
				shareToolTipFacebook: t('core', 'Share to Facebook. Opens in a new window.'),
				shareToolTipDiaspora: t('core', 'Share to Diaspora. Opens in a new window.'),
				shareToolTipGoogle: t('core', 'Share to Google+. Opens in a new window.'),
				shareToolTipMail: t('core', 'Share via email. Opens your mail client.')
			}));

			this.$el.find('.hasTooltip').tooltip({trigger: 'hover'});

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

	OC.Share.ShareDialogLinkSocialView = ShareDialogLinkSocialView;

})();
