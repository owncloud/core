/*
 * Copyright (c) 2014
 *
 * @author Vincent Petry
 * @copyright 2014 Vincent Petry <pvince81@owncloud.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* global dragOptions, folderDropOptions */
(function() {

	if (!OCA.Files) {
		/**
		 * Namespace for the files app
		 * @namespace OCA.Files
		 */
		OCA.Files = {};
	}

	var TEMPLATE_ADDBUTTON = '<a href="#" class="button new" data-enabledtitle="{{addText}}" data-disabledtitle="{{disabledText}}"><img src="{{iconUrl}}"></img></a>';

	/**
	 * @namespace OCA.Files.App
	 */
	OCA.Files.App = {
		/**
		 * Navigation control
		 *
		 * @member {OCA.Files.Navigation}
		 */
		navigation: null,

		/**
		 * File list for the "All files" section.
		 *
		 * @member {OCA.Files.FileList}
		 */
		fileList: null,

		/**
		 * Initializes the files app
		 */
		initialize: function() {
			this.navigation = new OCA.Files.Navigation($('#app-navigation'));

			var urlParams = OC.Util.History.parseUrlQuery();
			var fileActions = new OCA.Files.FileActions();
			// default actions
			fileActions.registerDefaultActions();
			// legacy actions
			fileActions.merge(window.FileActions);
			// regular actions
			fileActions.merge(OCA.Files.fileActions);

			this._onActionsUpdated = _.bind(this._onActionsUpdated, this);
			OCA.Files.fileActions.on('setDefault.app-files', this._onActionsUpdated);
			OCA.Files.fileActions.on('registerAction.app-files', this._onActionsUpdated);
			window.FileActions.on('setDefault.app-files', this._onActionsUpdated);
			window.FileActions.on('registerAction.app-files', this._onActionsUpdated);

			this.files = OCA.Files.Files;

			// TODO: ideally these should be in a separate class / app (the embedded "all files" app)
			this.fileList = new OCA.Files.FileList(
				$('#app-content-files'), {
					scrollContainer: $('#app-content'),
					dragOptions: dragOptions,
					folderDropOptions: folderDropOptions,
					fileActions: fileActions,
					allowLegacyActions: true,
					scrollTo: urlParams.scrollto
				}
			);
			this.files.initialize();
			this.fileList.$fileList.on('updated', _.bind(this._updateNewButton, this));

			// for backward compatibility, the global FileList will
			// refer to the one of the "files" view
			window.FileList = this.fileList;

			OC.Plugins.attach('OCA.Files.App', this);

			this._renderNewButton();

			this._setupEvents();
			// trigger URL change event handlers
			this._onPopState(urlParams);
		},

		_renderNewButton: function() {
			// TODO: use icon instead
			if (!this._addButtonTemplate) {
				this._addButtonTemplate = Handlebars.compile(TEMPLATE_ADDBUTTON);
			}
			var $newButton = $(this._addButtonTemplate({
				addText: t('files', 'New'),
				disabledText: t('files', 'You don’t have permission to upload or create files here'),
				iconUrl: OC.imagePath('core', 'actions/add')
			}));
			this.navigation.$el.find('li.nav-files a').after($newButton);

			$newButton.click(_.bind(this._onClickNewButton, this));
			$newButton.addClass('hidden');
			this._newButton = $newButton;
		},

		_onClickNewButton: function(event) {
			var self = this;
			var $target = $(event.target);
			if (!$target.hasClass('.button')) {
				$target = $target.closest('.button');
			}
			event.preventDefault();
			if ($target.hasClass('disabled')) {
				return false;
			}
			if (!this._newFileMenu) {
				this._newFileMenu = new OCA.Files.NewFileMenu({
					fileList: this.fileList
				});
				$('body').append(this._newFileMenu.$el);
				this._newFileMenu.on('actionPerformed', function(action) {
					// automatically switch to "All files"
					if (self.getActiveView() !== 'files') {
						self.setActiveView('files');
					}
				});
			}
			this._newFileMenu.showAt($target);

			return false;
		},

		_updateNewButton: function() {
			var $newButton = this._newButton;
			if (!this._newButton) {
				return;
			}

			var perms = this.fileList.getDirectoryPermissions();
			var viewerMode = $('.app-files').hasClass('viewer-mode');
			var mainFileListSelected = this.getActiveView() === 'files';
			var isDisabled = (perms & OC.PERMISSION_CREATE) === 0;
			$newButton.toggleClass('hidden', viewerMode || !perms || !mainFileListSelected);
			$newButton.toggleClass('disabled', isDisabled);
			if (isDisabled) {
				$newButton.attr('title', $newButton.attr('data-disabledtitle'));
			} else {
				$newButton.attr('title', $newButton.attr('data-enabledtitle'));
			}
			$newButton.tooltip({placement: 'bottom', trigger: 'manual'});
		},

		/**
		 * Destroy the app
		 */
		destroy: function() {
			this.navigation = null;
			this.fileList.destroy();
			this.fileList = null;
			this.files = null;
			if (this._newFileMenu) {
				this._newFileMenu.remove();
			}
			OCA.Files.fileActions.off('setDefault.app-files', this._onActionsUpdated);
			OCA.Files.fileActions.off('registerAction.app-files', this._onActionsUpdated);
			window.FileActions.off('setDefault.app-files', this._onActionsUpdated);
			window.FileActions.off('registerAction.app-files', this._onActionsUpdated);
		},

		_onActionsUpdated: function(ev, newAction) {
			// forward new action to the file list
			if (ev.action) {
				this.fileList.fileActions.registerAction(ev.action);
			} else if (ev.defaultAction) {
				this.fileList.fileActions.setDefault(
					ev.defaultAction.mime,
					ev.defaultAction.name
				);
			}
		},

		/**
		 * Returns the container of the currently visible app.
		 *
		 * @return app container
		 */
		getCurrentAppContainer: function() {
			return this.navigation.getActiveContainer();
		},

		/**
		 * Sets the currently active view
		 * @param viewId view id
		 */
		setActiveView: function(viewId, options) {
			this.navigation.setActiveItem(viewId, options);
		},

		/**
		 * Returns the view id of the currently active view
		 * @return view id
		 */
		getActiveView: function() {
			return this.navigation.getActiveItem();
		},

		/**
		 * Setup events based on URL changes
		 */
		_setupEvents: function() {
			OC.Util.History.addOnPopStateHandler(_.bind(this._onPopState, this));

			// detect when app changed their current directory
			$('#app-content').delegate('>div', 'changeDirectory', _.bind(this._onDirectoryChanged, this));
			$('#app-content').delegate('>div', 'changeViewerMode', _.bind(this._onChangeViewerMode, this));

			$('#app-navigation').on('itemChanged', _.bind(this._onNavigationChanged, this));
		},

		/**
		 * Event handler for when the current navigation item has changed
		 */
		_onNavigationChanged: function(e) {
			var params;
			if (e && e.itemId) {
				params = {
					view: e.itemId,
					dir: '/'
				};
				this._changeUrl(params.view, params.dir);
				OC.Apps.hideAppSidebar($('.detailsView'));
				this.navigation.getActiveContainer().trigger(new $.Event('urlChanged', params));
			}
			this._updateNewButton();
		},

		/**
		 * Event handler for when an app notified that its directory changed
		 */
		_onDirectoryChanged: function(e) {
			if (e.dir) {
				this._changeUrl(this.navigation.getActiveItem(), e.dir);
			}
		},

		/**
		 * Event handler for when an app notifies that it needs space
		 * for viewer mode.
		 */
		_onChangeViewerMode: function(e) {
			var state = !!e.viewerModeEnabled;
			if (e.viewerModeEnabled) {
				OC.Apps.hideAppSidebar($('.detailsView'));
			}
			$('#app-navigation').toggleClass('hidden', state);
			$('.app-files').toggleClass('viewer-mode no-sidebar', state);
			this._updateNewButton();
		},

		/**
		 * Event handler for when the URL changed
		 */
		_onPopState: function(params) {
			params = _.extend({
				dir: '/',
				view: 'files'
			}, params);
			var lastId = this.navigation.getActiveItem();
			if (!this.navigation.itemExists(params.view)) {
				params.view = 'files';
			}
			this.navigation.setActiveItem(params.view, {silent: true});
			if (lastId !== this.navigation.getActiveItem()) {
				this.navigation.getActiveContainer().trigger(new $.Event('show'));
			}
			this.navigation.getActiveContainer().trigger(new $.Event('urlChanged', params));
		},

		/**
		 * Change the URL to point to the given dir and view
		 */
		_changeUrl: function(view, dir) {
			var params = {dir: dir};
			if (view !== 'files') {
				params.view = view;
			}
			OC.Util.History.pushState(params);
		}
	};
})();

$(document).ready(function() {
	// wait for other apps/extensions to register their event handlers and file actions
	// in the "ready" clause
	_.defer(function() {
		OCA.Files.App.initialize();
	});
});

