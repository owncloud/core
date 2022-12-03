/*
 * Copyright (c) 2015
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function() {
	/**
	 * @memberof OCA.Versions
	 */
	var VersionModel = OC.Backbone.Model.extend({

		/**
		 * Restores the original file to this revision
		 */
		revert: function(options) {
			options = options ? _.clone(options) : {};
			var model = this;
			var client = new OC.Files.Client({
				host: OC.getHost(),
				root: OC.linkToRemoteBase('dav') + '/files/' + OC.getCurrentUser().uid,
				useHTTPS: OC.getProtocol() === 'https'
			});

			client.copy(this.getDownloadUrl(), this.getFullPath(), true, {}, {pathIsUrl: true})
				.done(function() {
					if (options.success) {
						options.success.call(options.context, model, {}, options);
					}
					model.trigger('revert', model, options);
				})
				.fail(function () {
					if (options.error) {
						options.error.call(options.context, model, {}, options);
					}
					model.trigger('error', model, {}, options);
				});
		},

		getFullPath: function() {
			return this.get('fullPath');
		},

		getPreviewUrl: function() {
			return OC.linkToRemoteBase('dav') + '/meta/' +
				encodeURIComponent(this.get('fileId')) + '/v/' +
				encodeURIComponent(this.get('id')) + '?preview';
		},

		getDownloadUrl: function() {
			return OC.linkToRemoteBase('dav') + '/meta/' +
				encodeURIComponent(this.get('fileId')) + '/v/' +
				encodeURIComponent(this.get('id'));
		}
	});

	OCA.Versions = OCA.Versions || {};

	OCA.Versions.VersionModel = VersionModel;
})();

