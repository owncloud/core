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
			'<form id="emailPrivateLink" class="public-link-modal--item">' +
			'    <label class="public-link-modal--label" for="emailPrivateLinkField-{{cid}}">{{mailLabel}}</label>' +
			'    <input id="emailPrivateLinkField-{{cid}}" class="public-link-modal--input emailField" value="{{email}}" placeholder="{{mailPrivatePlaceholder}}" type="email" />' +
			'</form>'
		;

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

		/** @type {Function} **/
		_template: undefined,

		initialize: function(options) {
			if(!_.isUndefined(options.itemModel)) {
				this.itemModel = options.itemModel;
			} else {
				throw 'missing OC.Share.ShareItemModel';
			}
		},

		/**
		 * Send the link share information by email
		 *
		 * @param {string} recipientEmail recipient email address
		 */
		_sendEmailPrivateLink: function(recipientEmail) {
			var deferred = $.Deferred();
			var itemType = this.itemModel.get('itemType');
			var itemSource = this.itemModel.get('itemSource');

			if (!this.validateEmail(recipientEmail)) {
				return deferred.reject({
					message: t('core', '{email} is not a valid address!', {email: recipientEmail})
				});
			}

			$.post(
				OC.generateUrl('core/ajax/share.php'), {
					action: 'email',
					toaddress: recipientEmail,
					link: this.model.getLink(),
					itemType: itemType,
					itemSource: itemSource,
					file: this.itemModel.getFileInfo().get('name'),
					expiration: this.model.get('expireDate') || ''
				},
				function(result) {
					if (!result || result.status !== 'success') {
						deferred.reject({
							message: result.data.message
						});
					} else {
						deferred.resolve();
					}
			}).fail(function(error) {

				console.log(error);
				return deferred.reject();
			});

			return deferred.promise();
		},

		validateEmail: function (email) {
			return email.match(/([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}$/);
		},

		sendEmails: function() {
			var $emailField = this.$el.find('.emailField');
			var $emailButton = this.$el.find('.emailButton');
			var email = $emailField.val();
			if (email !== '') {
				$emailButton.prop('disabled', true);
				$emailField
					.prop('disabled', true)
					.val(t('core', 'Sending ...'));

				return this._sendEmailPrivateLink(email).done(function() {
					OC.dialogs.info(t('core', 'Notification was send to {email}', {email: email}), "Success");
					$emailButton.prop('disabled', false);
					$emailField
						.prop('disabled', false)
						.val('');

				}).fail(function(error) {
					OC.dialogs.info(error.message, t('core', 'An error occured'));
					$emailButton.prop('disabled', false);
					$emailField
						.css('color', 'red')
						.prop('disabled', false)
						.val(email);
				});
			}
			return $.Deferred().resolve();
		},

		render: function() {
			var email = this.$el.find('.emailField').val();

			this.$el.html(this.template({
				cid: this.cid,
				mailPrivatePlaceholder: t('core', 'Email link to person'),
				mailLabel: t('core', 'Send link via email'),
				email: email
			}));

			var $emailField = this.$el.find('.emailField');

			$emailField.focus(function(){
				// remove styles attached on error
				$(this).removeAttr('style')
			});

			if ($emailField.length !== 0) {
				$emailField.autocomplete({
					minLength: 1,
					source: function (search, response) {
						$.get(
							OC.generateUrl('core/ajax/share.php'), {
								fetch: 'getShareWithEmail',
								search: search.term
							}, function(result) {
								if (result.status == 'success' && result.data.length > 0) {
									response(result.data);
								}
							});
						},
					select: function( event, item ) {
						$emailField.val(item.item.email);
						return false;
					}
				})
				.data("ui-autocomplete")._renderItem = function( ul, item ) {
					return $('<li>')
						.append('<a>' + escapeHTML(item.displayname) + "<br>" + escapeHTML(item.email) + '</a>' )
						.appendTo( ul );
				};
			}
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
