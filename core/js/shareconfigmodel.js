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
		OC.Share.Types = {};
	}

	// FIXME: the config model should populate its own model attributes based on
	// the old DOM-based config
	var ShareConfigModel = OC.Backbone.Model.extend({
		defaults: {
			publicUploadEnabled: false,
			enforceLinkPasswordReadOnly: oc_appconfig.core.enforceLinkPasswordReadOnly,
			enforceLinkPasswordReadWrite: oc_appconfig.core.enforceLinkPasswordReadWrite,
			enforceLinkPasswordReadWriteDelete: oc_appconfig.core.enforceLinkPasswordReadWriteDelete,
			enforceLinkPasswordWriteOnly: oc_appconfig.core.enforceLinkPasswordWriteOnly,
			defaultExpireDateUser: oc_appconfig.core.defaultExpireDateUser,
			isDefaultExpireDateUserEnabled: oc_appconfig.core.defaultExpireDateUserEnabled,
			isDefaultExpireDateUserEnforced: oc_appconfig.core.enforceDefaultExpireDateUser,
			defaultExpireDateGroup: oc_appconfig.core.defaultExpireDateGroup,
			isDefaultExpireDateGroupEnabled: oc_appconfig.core.defaultExpireDateGroupEnabled,
			isDefaultExpireDateGroupEnforced: oc_appconfig.core.enforceDefaultExpireDateGroup,
			isDefaultExpireDateEnforced: oc_appconfig.core.defaultExpireDateEnforced === true,
			isDefaultExpireDateEnabled: oc_appconfig.core.defaultExpireDateEnabled === true,
			isRemoteShareAllowed: oc_appconfig.core.remoteShareAllowed,
			defaultExpireDateRemote: oc_appconfig.core.defaultExpireDateRemote,
			isDefaultExpireDateRemoteEnabled: oc_appconfig.core.defaultExpireDateRemoteEnabled,
			isDefaultExpireDateRemoteEnforced: oc_appconfig.core.enforceDefaultExpireDateRemote,
			defaultExpireDate: oc_appconfig.core.defaultExpireDate,
			isResharingAllowed: oc_appconfig.core.resharingAllowed,
			allowGroupSharing: oc_appconfig.core.allowGroupSharing
		},

		/**
		 * @returns {boolean}
		 */
		areAvatarsEnabled: function() {
			return oc_config.enable_avatars === true;
		},

		/**
		 * @returns {boolean}
		 */
		isPublicUploadEnabled: function() {
			var publicUploadEnabled = $('#filestable').data('allow-public-upload');
			return publicUploadEnabled === 'yes';
		},

		/**
		 * @returns {boolean}
		 */
		isMailPublicNotificationEnabled: function() {
			return $('input:hidden[name=mailPublicNotificationEnabled]').val() === 'yes';
		},

		/**
		 * @returns {boolean}
		 */
		isSocialShareEnabled: function() {
			return $('input:hidden[name=socialShareEnabled]').val() === 'yes';
		},

		/**
		 * @returns {boolean}
		 */
		isMailNotificationEnabled: function() {
			return $('input:hidden[name=mailNotificationEnabled]').val() === 'yes';
		},

		/**
		 * @returns {boolean}
		 */
		isShareWithLinkAllowed: function() {
			return $('#allowShareWithLink').val() === 'yes';
		},

		/**
		 * @returns {string}
		 */
		getFederatedShareDocLink: function() {
			return oc_appconfig.core.federatedCloudShareDoc;
		},

		getDefaultExpirationDateString: function () {
			var expireDateString = '';
			if (this.get('isDefaultExpireDateEnabled')) {
				var date = moment.utc();
				var expireAfterDays = this.get('defaultExpireDate');
				date.add(expireAfterDays, 'days');
				expireDateString = date.format('YYYY-MM-DD 00:00:00');
			}
			return expireDateString;
		},

		/**
		 * @returns {boolean}
		 */
		isDefaultExpireDateUserEnabled: function() {
			return this.get('isDefaultExpireDateUserEnabled');
		},

		/**
		 * @returns {boolean}
		 */
		isDefaultExpireDateUserEnforced: function() {
			return this.get('isDefaultExpireDateUserEnforced');
		},

		/**
		 * @returns {number/string}
		 */
		getDefaultExpireDateUser: function(format) {
			format = format || false;
			var defaultExpireDateUser = parseInt(this.get('defaultExpireDateUser'), 10);

			if (format) {
				return moment().add(defaultExpireDateUser, 'days').format(format);
			}

			return defaultExpireDateUser;
		},

		/**
		 * @returns {boolean}
		 */
		isDefaultExpireDateGroupEnabled: function() {
			return this.get('isDefaultExpireDateGroupEnabled');
		},

		/**
		 * @returns {boolean}
		 */
		isDefaultExpireDateGroupEnforced: function() {
			return this.get('isDefaultExpireDateGroupEnforced');
		},

		/**
		 * @returns {number/string}
		 */
		getDefaultExpireDateGroup: function(format) {
			format = format || false;
			defaultExpireDateGroup = parseInt(this.get('defaultExpireDateGroup'), 10);

			if (format) {
				return moment().add(defaultExpireDateGroup, 'days').format(format);
			}

			return defaultExpireDateGroup;
		},

		/**
		 * @returns {boolean}
		 */
		isDefaultExpireDateRemoteEnabled: function() {
			return this.get('isDefaultExpireDateRemoteEnabled');
		},

		/**
		 * @returns {boolean}
		 */
		isDefaultExpireDateRemoteEnforced: function() {
			return this.get('isDefaultExpireDateRemoteEnforced');
		},

		/**
		 * @returns {number/string}
		 */
		getDefaultExpireDateRemote: function(format) {
			format = format || false;
			defaultExpireDateRemote = parseInt(this.get('defaultExpireDateRemote'), 10);

			if (format) {
				return moment().add(defaultExpireDateRemote, 'days').format(format);
			}

			return defaultExpireDateRemote;
		},
	});


	OC.Share.ShareConfigModel = ShareConfigModel;
})();
