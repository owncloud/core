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
			'<form id="emailPrivateLink" class="emailPrivateLinkForm oneline">' +
			'    <label for="emailPrivateLinkField-{{cid}}">{{mailLabel}}</label>' +
			'    <input id="emailPrivateLinkField-{{cid}}" class="emailField" value="{{email}}" placeholder="{{mailPrivatePlaceholder}}" type="text" />' +
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
						OC.dialogs.alert(result.data.message, t('core', 'Error while sending notification'));
						deferred.reject();
					} else {
						deferred.resolve();
					}
			}).fail(function() {
				deferred.reject();
			});

			return deferred.promise();
		},


		sendEmails: function() {
			var $emailField = this.$el.find('.emailField');
			var $emailButton = this.$el.find('.emailButton');
			var email = $emailField.val();
			if (email !== '') {
				$emailField.prop('disabled', true);
				$emailButton.prop('disabled', true);
				$emailField.val(t('core', 'Sending ...'));
				return this._sendEmailPrivateLink(email).done(function() {
					$emailField.css('font-weight', 'bold').val(t('core','Email sent'));
					setTimeout(function() {
						$emailField.val('');
						$emailField.css('font-weight', 'normal');
						$emailField.prop('disabled', false);
						$emailButton.prop('disabled', false);
					}, 2000);
				}).fail(function() {
					$emailField.val(email);
					$emailField.css('font-weight', 'normal');
					$emailField.prop('disabled', false);
					$emailButton.prop('disabled', false);
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
