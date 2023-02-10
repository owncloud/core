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

	var TEMPLATE_CURRENT =
		'<li data-revision="{{versionId}}" class="current-version">' +
		'<div>' +
		'<div class="preview-container">' +
		'<img class="preview" src="{{previewUrl}}"/>' +
		'<span class="has-tooltip" title="{{versionTag}}">{{versionTag}}</span>' +
		'</div>' +
		'<div class="version-container">' +
		'<div class="version-headline">' +
		'<a href="{{downloadUrl}}" class="downloadVersion"><img src="{{downloadIconUrl}}" />' +
		'<span class="versiondate has-tooltip" title="{{formattedTimestamp}}">{{relativeTimestamp}}</span>' +
		'<span class="versionstatus"> · {{currentVersionLabel}}</span>' +
		'</a>' +
		'</div>' +
		'{{#hasDetails}}' +
		'<div class="version-details">' +
		'<span class="size has-tooltip" title="{{altSize}}">{{humanReadableSize}}</span>' +
		'<span class="has-tooltip" title="{{editedBy}}">{{editedByName}}</span>' +
		'</div>' +
		'{{/hasDetails}}' +
		'</div>' +
		'<div class="action-container">' +
		'{{#canPublish}}' +
		'<a href="#" class="publishVersion" title="{{publishLabel}}"><img src="{{publishIconUrl}}" /></a>' +
		'{{/canPublish}}' +
		'</div>' +
		'</div>' +
		'</li>';

	var TEMPLATE_VERSION =
		'<li data-revision="{{versionId}}">' +
		'<div>' +
		'<div class="preview-container">' +
		'<img class="preview" src="{{previewUrl}}"/>' +
		'<span class="has-tooltip" title="{{versionTag}}">{{versionTag}}</span>' +
		'</div>' +
		'<div class="version-container">' +
		'<div class="version-headline">' +
		'<a href="{{downloadUrl}}" class="downloadVersion"><img src="{{downloadIconUrl}}" />' +
		'<span class="versiondate has-tooltip" title="{{formattedTimestamp}}">{{relativeTimestamp}}</span>' +
		'<span class="versionstatus">{{#isMajorVersion}} · {{/isMajorVersion}}{{majorVersionlabel}}</span>' +
		'</a>' +
		'</div>' +
		'{{#hasDetails}}' +
		'<div class="version-details">' +
		'<span class="size has-tooltip" title="{{altSize}}">{{humanReadableSize}}</span>' +
		'<span class="has-tooltip" title="{{editedBy}}">{{editedByName}}</span>' +
		'</div>' +
		'{{/hasDetails}}' +
		'</div>' +
		'<div class="action-container">' +
		'{{#canRevert}}' +
		'<a href="#" class="revertVersion" title="{{revertLabel}}"><img src="{{revertIconUrl}}" /></a>' +
		'{{/canRevert}}' +
		'</div>' +
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
			'click .revertVersion': '_onClickRevertVersion',
			'click .publishVersion': '_onClickPublishVersion'
		},

		initialize: function() {
			OCA.Files.DetailTabView.prototype.initialize.apply(this, arguments);

			// versions collection root - current version
			this.versionsRoot = new OCA.Versions.VersionsRootModel();
			this.versionsRoot.on('sync', this._onAddVersionsRootModel, this);

			// versions collection - noncurrent versions
			this.collection = new OCA.Versions.VersionCollection();
			this.collection.on('request', this._onCollectionRequest, this);
			this.collection.on('sync', this._onCollectionEndRequest, this);
			this.collection.on('update', this._onUpdate, this);
			this.collection.on('error', this._onError, this);
			this.collection.on('add', this._onAddVersionModel, this);
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
			var fileInfoModel = this.versionsRoot.getFileInfo();
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

					self.versionsRoot.setFileInfo(fileInfoModel);
					self.versionsRoot.fetch();

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
					OC.Notification.show(
						t('files_versions', 
							'File {file} has been reverted and marked as new current version',
							{
								file: versionModel.getFullPath()
							}
						),
						{ timeout: 7 }
					);
				},

				error: function() {
					fileInfoModel.trigger('busy', fileInfoModel, false);
					self.$el.find('.versions').removeClass('hidden');
					self._toggleLoading(false);
					OC.Notification.show(
						t('files_versions', 
							'Failed to revert {file} to revision {timestamp}.',
							{
								file: versionModel.getFullPath(),
								timestamp: OC.Util.formatDate(versionModel.get('timestamp') * 1000)
							}
						),
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

		_onClickPublishVersion: function(ev) {
			var self = this;
			var fileInfoModel = this.versionsRoot.getFileInfo();
			ev.preventDefault();

			this.versionsRoot.publish({
				success: function() {
					// reset and re-fetch the updated root for publishing metadata, 
					// and collection just in case new version got generated in the meanwhile by other process
					self.$versionsContainer.empty();

					self.versionsRoot.setFileInfo(fileInfoModel);
					self.versionsRoot.fetch();

					self.collection.setFileInfo(fileInfoModel);
					self.collection.reset([], {silent: true});
					self.collection.fetch();

					self.$el.find('.versions').removeClass('hidden');
				},
				error: function() {
					self.$el.find('.versions').removeClass('hidden');
					self._toggleLoading(false);
					OC.Notification.show(t('files_versions', 'Failed to publish version'),{type: 'error'});
				}
			});
		},

		_toggleLoading: function(state) {
			this._loading = state;
			this.$el.find('.loading').toggleClass('hidden', !state);
		},

		_onCollectionRequest: function() {
			this._toggleLoading(true);
		},

		_onCollectionEndRequest: function() {
			this._toggleLoading(false);

			this.$el.find('.empty').toggleClass('hidden', !!this.collection.length);
		},

		_onAddVersionModel: function(model) {
			// add version to the list (collection child)
			var $el = $(this.versionTemplate(this._formatVersion(model)));
			this.$versionsContainer.append($el);
			$el.find('.has-tooltip').tooltip();
		},

		_onAddVersionsRootModel: function(model) {
			// add current version (versions root) as first item in the list
			var $el = $(this.currentTemplate(this._formatCurrent(model)));
			this.$versionsContainer.prepend($el);
			$el.find('.has-tooltip').tooltip();
		},

		template: function(data) {
			if (!this._template) {
				this._template = Handlebars.compile(TEMPLATE);
			}

			return this._template(data);
		},

		versionTemplate: function(data) {
			if (!this._versionTemplate) {
				this._versionTemplate = Handlebars.compile(TEMPLATE_VERSION);
			}

			return this._versionTemplate(data);
		},

		currentTemplate: function(data) {
			if (!this._currentTemplate) {
				this._currentTemplate = Handlebars.compile(TEMPLATE_CURRENT);
			}

			return this._currentTemplate(data);
		},

		setFileInfo: function(fileInfo) {
			if (fileInfo) {
				this.render();

				this.versionsRoot.setFileInfo(fileInfo);
				this.versionsRoot.fetch();

				this.collection.setFileInfo(fileInfo);
				this.collection.reset([], {silent: true});
				this.nextPage();
			} else {
				this.render();
				this.collection.reset();
			}
		},

		_formatVersion: function(version) {
			var timestamp = version.get('timestamp') * 1000;
			var size = version.has('size') ? version.get('size') : 0;
			var isMajorVersion = version.has('versionTag') && version.get('versionTag').indexOf('.0', version.get('versionTag').length - '.0'.length) !== -1;

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
				editedByName: version.has('editedByName'),
				versionTag: version.has('versionTag'),
				isMajorVersion: isMajorVersion,
				majorVersionlabel: isMajorVersion ? t('files_versions', 'persistent') : ''
			}, version.attributes);
		},

		_formatCurrent: function(current) {
			var size = current.has('size') ? current.get('size') : 0;

			return _.extend({
				versionId: current.get('id'),
				formattedTimestamp: OC.Util.formatDate(current.get('mtime')),
				relativeTimestamp: OC.Util.relativeModifiedDate(current.get('mtime')),
				humanReadableSize: OC.Util.humanFileSize(size, true),
				altSize: n('files', '%n byte', '%n bytes', size),
				hasDetails: current.has('size'),
				downloadUrl: current.getDownloadUrl(),
				downloadIconUrl: OC.imagePath('core', 'actions/download'),
				publishIconUrl: OC.imagePath('core', 'actions/checkmark'),
				previewUrl: getPreviewUrl(current),
				publishLabel: t('files_versions', 'Publish version'),
				canPublish: current.has('versionTag') && (current.get('versionTag') !== ''),
				editedBy: current.has('editedBy'),
				editedByName: current.has('editedByName'),
				versionTag: current.has('versionTag'),
				currentVersionLabel: t('files_versions', 'current')
			}, current.attributes);
		},

		/**
		 * Renders this details view
		 */
		render: function() {
			this.$el.html(this.template({
				emptyResultLabel: '', // not needed anymore as we always display current file
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
