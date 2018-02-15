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
		'<form id="emailPrivateLink" class="emailPrivateLinkForm">' +
		'  <span class="emailPrivateLinkForm--send-indicator success-message-global absolute-center hidden">{{sending}}</span>' +
		'  <label class="public-link-modal--label" for="emailPrivateLinkField-{{cid}}">{{mailLabel}}</label>' +
		'  <input class="public-link-modal--input emailPrivateLinkForm--emailField" autocomplete="off" id="emailPrivateLinkField-{{cid}}" value="" placeholder="{{mailPlaceholder}}" type="email" />' +
		'  <div class="emailPrivateLinkForm--elements hidden">' +
		'    {{#if userHasEmail}}' +
		'    <label class="public-link-modal--bccSelf">' +
		'      <input class="emailPrivateLinkForm--emailBccSelf" type="checkbox"> {{bccSelf}}' +
		'    </label>' +
		'    {{/if}}' +
		'    <label class="public-link-modal--label" for="emailBodyPrivateLinkField-{{cid}}">{{mailMessageLabel}}</label>' +
		'    <textarea class="public-link-modal--input emailPrivateLinkForm--emailBodyField" id="emailBodyPrivateLinkField-{{cid}}" rows="3" placeholder="{{mailBodyPlaceholder}}"></textarea>' +
		'  </div>' +
		'</form>';

	/**
	 * @class OCA.Share.ShareDialogMailView
	 * @member {OC.Share.ShareItemModel} model
	 * @member {jQuery} $el
	 * @memberof OCA.Sharing
	 * @classdesc
	 *
	 * Represents the GUI of the share dialogue
	 *
	 */
	var ShareDialogMailView = OC.Backbone.View.extend({
		/** @type {string} **/
		id: 'shareDialogMailView',

		events: {
			"keyup   .emailPrivateLinkForm--emailField"     : "toggleMailElements",
			"keydown .emailPrivateLinkForm--emailBodyField" : "expandMailBody"
		},

		/** @type {Function} **/
		_template: undefined,

		initialize: function(options) {
			if (!_.isUndefined(options.itemModel)) {
				this.itemModel = options.itemModel;
			} else {
				throw 'missing OC.Share.ShareItemModel';
			}
		},

		toggleMailElements: function() {
			var $email         = this.$el.find('.emailPrivateLinkForm--emailField');
			var $emailElements = this.$el.find('.emailPrivateLinkForm--elements');

			if ($email.val().length > 0 && $emailElements.is(":hidden")) {
				$emailElements.slideDown();
			} else if ($email.val().length === 0 && $emailElements.is(":visible")) {
				$emailElements.slideUp();
			}
		},

		expandMailBody: function(event) {
			var $emailBody = this.$el.find('.emailPrivateLinkForm--emailBodyField');
			$emailBody.css('minHeight', $emailBody[0].scrollHeight - 12);

			if (event.keyCode == 13) {
				event.stopPropagation();
			}
		},

		/**
		 * Send the link share information by email
		 *
		 * @param {string} recipientEmail recipient email address
		 */
		_sendEmailPrivateLink: function(mail) {
			var deferred   = $.Deferred();
			var itemType   = this.itemModel.get('itemType');
			var itemSource = this.itemModel.get('itemSource');

			if (!this.validateEmail(mail.to)) {
				return deferred.reject({
					message: t('core', '{email} is not a valid address!', {email: mail.to})
				});
			}

			var params = {
				action      : 'email',
				toAddress   : mail.to,
				emailBody   : mail.body,
				bccSelf     : mail.bccSelf,
				link        : this.model.getLink(),
				itemType    : itemType,
				itemSource  : itemSource,
				file        : this.itemModel.getFileInfo().get('name'),
				expiration  : this.model.get('expireDate') || ''
			};

			$.post(
				OC.generateUrl('core/ajax/share.php'), params,
				function(result) {
					if (!result || result.status !== 'success') {
						deferred.reject({
							message: result.data.message
						});
					} else {
						deferred.resolve();
					}
			}).fail(function(error) {
				return deferred.reject();
			});

			return deferred.promise();
		},

		validateEmail: function(email) {
			if (email.length === 0)
				return true

			return email.match(/([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}$/);
		},

		sendEmails: function() {
			var $formItems         = this.$el.find('.emailPrivateLinkForm input, .emailPrivateLinkForm textarea');
			var $formSendIndicator = this.$el.find('.emailPrivateLinkForm--send-indicator');
			var  mail = {
				 to      : this.$el.find('.emailPrivateLinkForm--emailField').val().toLowerCase(),
				 bccSelf : this.$el.find('.emailPrivateLinkForm--emailBccSelf').is(':checked'),
				 body    : this.$el.find('.emailPrivateLinkForm--emailBodyField').val()
			};

			if (mail.to !== '') {
				$formItems.prop('disabled', true);
				$formSendIndicator.removeClass('hidden');
				return this._sendEmailPrivateLink(mail).done(function() {
					setTimeout(function() {
						$formItems.prop('disabled', false);
						$formSendIndicator.addClass('hidden');
					}, 2000);
				}).fail(function(error) {
					OC.dialogs.info(error.message, t('core', 'An error occured'));
					$formSendIndicator.addClass('hidden');
					$formItems.prop('disabled', false);
				});
			}
			return $.Deferred().resolve();
		},

		render: function() {
			this.$el.html(this.template({
				cid                 : this.cid,
				userHasEmail        : !!OC.getCurrentUser().email,
				mailPlaceholder     : t('core', 'Email link to person'),
				bccSelf             : t('core', 'Send copy to self'),
				mailLabel           : t('core', 'Send link via email'),
				mailBodyPlaceholder : t('core', 'Add personal message'),
				sending             : t('core', 'Sending') + ' ...'
			}));

			this.delegateEvents();

			return this;
		},

		/**
		 * @returns {Function} from Handlebars
		 * @private
		 */
		template: function(data) {
			if (!this._template) {
				this._template = Handlebars.compile(TEMPLATE);
			}
			return this._template(data);
		}

	});

	OC.Share.ShareDialogMailView = ShareDialogMailView;

})();
