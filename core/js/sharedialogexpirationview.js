/*
 * Copyright (c) 2015
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* global moment */

(function() {
	if (!OC.Share) {
		OC.Share = {};
	}

	var TEMPLATE =
			// currently expiration is only effective for link share.
			// this is about to change in future. Therefore this is not included
			// in the LinkShareView to ease reusing it in future. Then,
			// modifications (getting rid of IDs) are still necessary.
			'<input type="checkbox" name="expirationCheckbox" class="expirationCheckbox checkbox" id="expirationCheckbox-{{cid}}" value="1" ' +
				'{{#if isExpirationSet}}checked="checked"{{/if}} {{#if disableCheckbox}}disabled="disabled"{{/if}} />' +
			'<label for="expirationCheckbox-{{cid}}">{{setExpirationLabel}}</label>' +
			'<div class="expirationDateContainer {{#unless isExpirationSet}}hidden{{/unless}}">' +
			'    <label for="expirationDate" class="hidden-visually" value="{{expirationDate}}">{{expirationLabel}}</label>' +
			'    <input id="expirationDate" class="datepicker" type="text" placeholder="{{expirationDatePlaceholder}}" value="{{expirationValue}}" />' +
			'</div>' +
			'    {{#if isExpirationEnforced}}' +
				// originally the expire message was shown when a default date was set, however it never had text
			'<em id="defaultExpireMessage">{{defaultExpireMessage}}</em>' +
			'    {{/if}}'
		;

	/**
	 * @class OCA.Share.ShareDialogExpirationView
	 * @member {OC.Share.ShareItemModel} model
	 * @member {jQuery} $el
	 * @memberof OCA.Sharing
	 * @classdesc
	 *
	 * Represents the expiration part in the GUI of the share dialogue
	 *
	 */
	var ShareDialogExpirationView = OC.Backbone.View.extend({
		/** @type {string} **/
		id: 'shareDialogLinkShare',

		/** @type {OC.Share.ShareConfigModel} **/
		configModel: undefined,

		/** @type {Function} **/
		_template: undefined,

		className: 'hidden',

		events: {
			'change .expirationCheckbox': '_onToggleExpiration',
			'change .datepicker': '_onChangeExpirationDate'
		},

		initialize: function(options) {
			if(!_.isUndefined(options.itemModel)) {
				this.itemModel = options.itemModel;
			} else {
				throw 'missing OC.Share.ShareItemModel';
			}
			if(!_.isUndefined(options.configModel)) {
				this.configModel = options.configModel;
			} else {
				throw 'missing OC.Share.ShareConfigModel';
			}

			var view = this;
			this.configModel.on('change:isDefaultExpireDateEnforced', function() {
				view.render();
			});
		},

		_onToggleExpiration: function(event) {
			var $checkbox = $(event.target);
			var state = $checkbox.prop('checked');
			// TODO: slide animation
			this.$el.find('.expirationDateContainer').toggleClass('hidden', !state);
			if (!state) {
				// discard expiration date
				this.model.unset('expireDate');
			}
		},

		_onChangeExpirationDate: function(event) {
			var $target = $(event.target);
			$target.tooltip('hide');
			$target.removeClass('error');

			var expiration = moment($target.val(), 'DD-MM-YYYY').format('YYYY-MM-DD');
			this.model.set('expireDate', expiration);
		},

		render: function() {
			var defaultExpireMessage = '';
			var defaultExpireDays = this.configModel.get('defaultExpireDate');
			var isExpirationEnforced = this.configModel.get('isDefaultExpireDateEnforced');

			if(    (this.itemModel.isFolder() || this.itemModel.isFile())
				&& isExpirationEnforced) {
				defaultExpireMessage = t(
					'core',
					'The public link will expire no later than {days} days after it is created',
					{'days': defaultExpireDays }
				);
			}

			var isExpirationSet = !!this.model.get('expireDate') || isExpirationEnforced;

			var expiration;
			if (isExpirationSet) {
				expiration = moment(this.model.get('expireDate'), 'YYYY-MM-DD').format('DD-MM-YYYY');
			}

			this.$el.html(this.template({
				cid: this.cid,
				setExpirationLabel: t('core', 'Set expiration date'),
				expirationLabel: t('core', 'Expiration'),
				expirationDatePlaceholder: t('core', 'Expiration date'),
				defaultExpireMessage: defaultExpireMessage,
				isExpirationSet: isExpirationSet,
				isExpirationEnforced: isExpirationEnforced,
				disableCheckbox: isExpirationEnforced && isExpirationSet,
				expirationValue: expiration
			}));

			// what if there is another date picker on that page?
			var minDate = new Date();
			var maxDate = null;
			// min date should always be the next day
			minDate.setDate(minDate.getDate()+1);

			if(isExpirationSet) {
				if(isExpirationEnforced) {
					// TODO: hack: backend returns string instead of integer
					var shareTime = this.model.get('linkShare').stime;
					if (_.isNumber(shareTime)) {
						shareTime = new Date(shareTime * 1000);
					}
					if (!shareTime) {
						shareTime = new Date(); // now
					}
					shareTime = OC.Util.stripTime(shareTime).getTime();
					maxDate = new Date(shareTime + defaultExpireDays * 24 * 3600 * 1000);
				}
			}
			$.datepicker.setDefaults({
				minDate: minDate,
				maxDate: maxDate
			});

			this.$el.find('.datepicker').datepicker({dateFormat : 'dd-mm-yy'});

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

	OC.Share.ShareDialogExpirationView = ShareDialogExpirationView;

})();
