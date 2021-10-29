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

	function getPreviewUrl(model) {
		var mime = model.get('mimetype');

		var enabledPreviewProviders = OC.appConfig.core.enabledPreviewProviders || [];
		if (enabledPreviewProviders.length > 0) {
			var allMimesPattern = new RegExp(enabledPreviewProviders.join('|'));
			if (OC.appConfig.core.previewsEnabled && allMimesPattern.test(mime)) {
				return model.getPreviewUrl();
			}
		}

		return OC.MimeType.getIconUrl(mime);
	}

	var TEMPLATE_ITEM =
		'<li data-revision="{{versionId}}">' +
		'<div>' +
		'<div class="preview-container">' +
		'<img class="preview" src="{{previewUrl}}"/>' +
		'</div>' +
		'<div class="version-container">' +
		'<div>' +
		'<a href="{{downloadUrl}}" class="downloadVersion"><img src="{{downloadIconUrl}}" />' +
		'<span class="versiondate has-tooltip" title="{{formattedTimestamp}}">{{relativeTimestamp}}</span>' +
		'</a>' +
		'</div>' +
		'{{#hasDetails}}' +
		'<div class="version-details">' +
		'<span class="size has-tooltip" title="{{altSize}}">{{humanReadableSize}}</span>' +
		'<span class="size has-tooltip" title="{{editedBy}}">{{editedBy}}</span>' +
		'</div>' +
		'{{/hasDetails}}' +
		'</div>' +
		'{{#canRevert}}' +
		'<a href="#" class="revertVersion" title="{{revertLabel}}"><img src="{{revertIconUrl}}" /></a>' +
		'{{/canRevert}}' +
		'</div>' +
		'</li>';

	var TEMPLATE =
		'<ul class="versions"></ul>' +
		'<div class="clear-float"></div>' +
		'<div class="empty hidden">{{emptyResultLabel}}</div>' +
		'<div class="loading hidden" style="height: 50px"></div>';

	/**
	 * @memberof OCA.Versions
	 */
	var VersionsTabView = OCA.Files.DetailTabView.extend(
		/** @lends OCA.Versions.VersionsTabView.prototype */ {
		id: 'versionsTabView',
		className: 'tab versionsTabView',

		_template: null,

		$versionsContainer: null,

		events: {
			'click .revertVersion': '_onClickRevertVersion'
		},

		initialize: function() {
			OCA.Files.DetailTabView.prototype.initialize.apply(this, arguments);
			this.collection = new OCA.Versions.VersionCollection();
			this.collection.on('request', this._onRequest, this);
			this.collection.on('sync', this._onEndRequest, this);
			this.collection.on('update', this._onUpdate, this);
			this.collection.on('error', this._onError, this);
			this.collection.on('add', this._onAddModel, this);
		},

		getLabel: function() {
			return t('files_versions', 'Versions');
		},

		nextPage: function() {
			if (this._loading) {
				return;
			}

			if (this.collection.getFileInfo() && this.collection.getFileInfo().isDirectory()) {
				return;
			}
			this.collection.fetch();
		},

		_onClickRevertVersion: function(ev) {
			var self = this;
			var $target = $(ev.target);
			var fileInfoModel = this.collection.getFileInfo();
			var revision;
			if (!$target.is('li')) {
				$target = $target.closest('li');
			}

			ev.preventDefault();
			revision = $target.attr('data-revision');

			var versionModel = this.collection.get(revision);
			versionModel.revert({
				success: function() {
					// reset and re-fetch the updated collection
					self.$versionsContainer.empty();
					self.collection.setFileInfo(fileInfoModel);
					self.collection.reset([], {silent: true});
					self.collection.fetch();

					self.$el.find('.versions').removeClass('hidden');

					// update original model
					fileInfoModel.trigger('busy', fileInfoModel, false);
					fileInfoModel.set({
						size: versionModel.get('size'),
						mtime: versionModel.get('timestamp') * 1000,
						// temp dummy, until we can do a PROPFIND
						etag: versionModel.get('id') + versionModel.get('timestamp')
					});
				},

				error: function() {
					fileInfoModel.trigger('busy', fileInfoModel, false);
					self.$el.find('.versions').removeClass('hidden');
					self._toggleLoading(false);
					OC.Notification.show(t('files_versions', 'Failed to revert {file} to revision {timestamp}.',
						{
							file: versionModel.getFullPath(),
							timestamp: OC.Util.formatDate(versionModel.get('timestamp') * 1000)
						}),
						{
							type: 'error'
						}
					);
				}
			});

			// spinner
			this._toggleLoading(true);
			fileInfoModel.trigger('busy', fileInfoModel, true);
		},

		_toggleLoading: function(state) {
			this._loading = state;
			this.$el.find('.loading').toggleClass('hidden', !state);
		},

		_onRequest: function() {
			this._toggleLoading(true);
		},

		_onEndRequest: function() {
			this._toggleLoading(false);
			this.$el.find('.empty').toggleClass('hidden', !!this.collection.length);
		},

		_onAddModel: function(model) {
			var $el = $(this.itemTemplate(this._formatItem(model)));
			this.$versionsContainer.append($el);
			$el.find('.has-tooltip').tooltip();
		},

		template: function(data) {
			if (!this._template) {
				this._template = Handlebars.compile(TEMPLATE);
			}

			return this._template(data);
		},

		itemTemplate: function(data) {
			if (!this._itemTemplate) {
				this._itemTemplate = Handlebars.compile(TEMPLATE_ITEM);
			}

			return this._itemTemplate(data);
		},

		setFileInfo: function(fileInfo) {
			if (fileInfo) {
				this.render();
				this.collection.setFileInfo(fileInfo);
				this.collection.reset([], {silent: true});
				this.nextPage();
			} else {
				this.render();
				this.collection.reset();
			}
		},

		_formatItem: function(version) {
			var timestamp = version.get('timestamp') * 1000;
			var size = version.has('size') ? version.get('size') : 0;

			return _.extend({
				versionId: version.get('id'),
				formattedTimestamp: OC.Util.formatDate(timestamp),
				relativeTimestamp: OC.Util.relativeModifiedDate(timestamp),
				humanReadableSize: OC.Util.humanFileSize(size, true),
				altSize: n('files', '%n byte', '%n bytes', size),
				hasDetails: version.has('size'),
				downloadUrl: version.getDownloadUrl(),
				downloadIconUrl: OC.imagePath('core', 'actions/download'),
				revertIconUrl: OC.imagePath('core', 'actions/history'),
				previewUrl: getPreviewUrl(version),
				revertLabel: t('files_versions', 'Restore'),
				canRevert: (this.collection.getFileInfo().get('permissions') & OC.PERMISSION_UPDATE) !== 0,
				editedBy: version.has('editedBy'),
			}, version.attributes);
		},

		/**
		 * Renders this details view
		 */
		render: function() {
			this.$el.html(this.template({
				emptyResultLabel: t('files_versions', 'No other versions available'),
			}));
			this.$el.find('.has-tooltip').tooltip();
			this.$versionsContainer = this.$el.find('ul.versions');
			this.delegateEvents();
		},

		/**
		 * Returns true for files, false for folders.
		 *
		 * @return {bool} true for files, false for folders
		 */
		canDisplay: function(fileInfo) {
			if (!fileInfo) {
				return false;
			}
			return !fileInfo.isDirectory();
		}
	});

	OCA.Versions = OCA.Versions || {};

	OCA.Versions.VersionsTabView = VersionsTabView;
})();
