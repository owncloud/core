/*
 * Copyright (c) 2014
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function() {

	var TEMPLATE_ADDBUTTON = '<a href="#" class="button new">' +
		'<span class="icon {{iconClass}}"></span>' +
		'<span class="hidden-visually">{{addText}}</span>' +
		'</a>';

	/**
	 * @class OCA.Files.FileList
	 * @classdesc
	 *
	 * The FileList class manages a file list view.
	 * A file list view consists of a controls bar and
	 * a file list table.
	 *
	 * @param $el container element with existing markup for the #controls
	 * and a table
	 * @param {Object} [options] map of options, see other parameters
	 * @param {Object} [options.scrollContainer] scrollable container, defaults to $(window)
	 * @param {Object} [options.dragOptions] drag options, disabled by default
	 * @param {Object} [options.folderDropOptions] folder drop options, disabled by default
	 * @param {boolean} [options.detailsViewEnabled=true] whether to enable details view
	 * @param {boolean} [options.enableUpload=false] whether to enable uploader
	 * @param {OC.Files.Client} [options.filesClient] files client to use
	 */
	var FileList = function($el, options) {
		this.initialize($el, options);
	};
	/**
	 * @memberof OCA.Files
	 */
	FileList.prototype = {
		SORT_INDICATOR_ASC_CLASS: 'icon-triangle-n',
		SORT_INDICATOR_DESC_CLASS: 'icon-triangle-s',

		id: 'files',
		appName: t('files', 'Files'),
		useUndo:true,

		/**
		 * Top-level container with controls and file list
		 */
		$el: null,

		/**
		 * Files table
		 */
		$table: null,

		/**
		 * List of rows (table tbody)
		 */
		$fileList: null,

		/**
		 * @type OCA.Files.BreadCrumb
		 */
		breadcrumb: null,

		/**
		 * @type OCA.Files.FileSummary
		 */
		fileSummary: null,

		/**
		 * @type OCA.Files.DetailsView
		 */
		_detailsView: null,

		/**
		 * Files client instance
		 *
		 * @type OC.Files.Client
		 */
		filesClient: null,

		/**
		 * Whether the file list was initialized already.
		 * @type boolean
		 */
		initialized: false,

		/**
		 * Number of files per page
		 *
		 * @return {int} page size
		 */
		pageSize: function() {
			return Math.ceil(this.$container.height() / 50);
		},

		/**
		 * Collection of file models
		 *
		 * @type OCA.Files.FileInfoCollection
		 *
		 * @since 9.2
		 */
		collection: null,

		/**
		 * Model for the current folder
		 *
		 * @type OCA.Files.FileInfoModel
		 * @since 9.2
		 */
		model: null,

		/**
		 * File actions handler, defaults to OCA.Files.FileActions
		 * @type OCA.Files.FileActions
		 */
		fileActions: null,

		/**
		 * Whether selection is allowed, checkboxes and selection overlay will
		 * be rendered
		 */
		_allowSelection: true,

		/**
		 * Collection of selected entries
		 */
		_selectedCollection: null,

		/**
		 * Summary of selected files.
		 * @type OCA.Files.FileSummary
		 */
		_selectionSummary: null,

		/**
		 * If not empty, only files containing this string will be shown
		 * @type String
		 */
		_filter: '',

		/**
		 * @type Backbone.Model
		 */
		_filesConfig: undefined,

		/**
		 * Sort attribute
		 * @type String
		 */
		_sort: 'name',

		/**
		 * Sort direction: 'asc' or 'desc'
		 * @type String
		 */
		_sortDirection: 'asc',

		/**
		 * Whether to do a client side sort.
		 * When false, clicking on a table header will call reload().
		 * When true, clicking on a table header will simply resort the list.
		 */
		_clientSideSort: true,

		_dragOptions: null,
		_folderDropOptions: null,

		/**
		 * @type OC.Uploader
		 */
		_uploader: null,

		/**
		 * Initialize the file list and its components
		 *
		 * @param $el container element with existing markup for the #controls
		 * and a table
		 * @param options map of options, see other parameters
		 * @param options.scrollContainer scrollable container, defaults to $(window)
		 * @param options.dragOptions drag options, disabled by default
		 * @param options.folderDropOptions folder drop options, disabled by default
		 * @param options.scrollTo name of file to scroll to after the first load
		 * @param {OC.Files.Client} [options.filesClient] files API client
		 * @param {OC.Backbone.Model} [options.filesConfig] files app configuration
		 * @private
		 */
		initialize: function($el, options) {
			var self = this;
			options = options || {};

			if (this.initialized) {
				return;
			}

			if (options.config) {
				this._filesConfig = options.config;
			} else if (!_.isUndefined(OCA.Files) && !_.isUndefined(OCA.Files.App)) {
				this._filesConfig = OCA.Files.App.getFilesConfig();
			} else {
				this._filesConfig = new OC.Backbone.Model({
					'showhidden': false
				});
			}

			if (options.dragOptions) {
				this._dragOptions = options.dragOptions;
			}
			if (options.folderDropOptions) {
				this._folderDropOptions = options.folderDropOptions;
			}
			if (options.filesClient) {
				this.filesClient = options.filesClient;
			} else {
				// default client if not specified
				this.filesClient = OC.Files.getClient();
			}


			if (options.model) {
				this.model = options.model;
			} else {
				this.model = new OCA.Files.FileInfoModel({path: '', name: ''}, {filesClient: this.filesClient});
			}

			this.collection = this.model.getCollection();
			this.collection.on('reset', this._onCollectionReset, this);
			this.collection.on('sort', this._onCollectionSort, this);
			this.collection.on('add', this._onAddFile, this);
			this.collection.on('remove', this._onRemoveFile, this);
			this.collection.on('change', this._onChangeFile, this);
			this.collection.on('busy', this._onFileBusy, this);

			this.$el = $el;
			if (options.id) {
				this.id = options.id;
			}
			this.$container = options.scrollContainer || $(window);
			this.$table = $el.find('table:first');
			this.$fileList = $el.find('#fileList');

			if (!_.isUndefined(this._filesConfig)) {
				this._filesConfig.on('change:showhidden', function() {
					var showHidden = this.get('showhidden');
					self.$el.toggleClass('hide-hidden-files', !showHidden);
					// TODO: when FileSummary is a model, listen to change event
					self.updateSelectionSummary();

					if (!showHidden) {
						// hiding files could make the page too small, need to try rendering next page
						self._onScroll();
					}
				});

				this.$el.toggleClass('hide-hidden-files', !this._filesConfig.get('showhidden'));
			}


			if (_.isUndefined(options.detailsViewEnabled) || options.detailsViewEnabled) {
				this._detailsView = new OCA.Files.DetailsView();
				this._detailsView.$el.insertBefore(this.$el);
				this._detailsView.$el.addClass('disappear');
			}

			this._initFileActions(options.fileActions);

			if (this._detailsView) {
				this._detailsView.addDetailView(new OCA.Files.MainFileInfoDetailView({fileList: this, fileActions: this.fileActions}));
			}

			this.files = [];

			this.fileSummary = this._createSummary();

			// use a regular collection for now
			this._selectedCollection = new OC.Backbone.Collection();
			this._selectionSummary = new OCA.Files.FileSummary(
				undefined, {
					collection: this._selectedCollection,
					config: this._filesConfig
				}
			);
			// register events after summary did so it gets a chance to update
			this._selectedCollection.on('add', this._onToggleSelectedFile, this);
			this._selectedCollection.on('remove', this._onToggleSelectedFile, this);
			this._selectedCollection.on('reset', this._onResetSelection, this);

			if (options.sorting) {
				this.setSort(options.sorting.mode, options.sorting.direction, false, false);
			} else {
				this.setSort('name', 'asc', false, false);
			}

			var breadcrumbOptions = {
				onClick: _.bind(this._onClickBreadCrumb, this),
				getCrumbUrl: function(part) {
					return self.linkTo(part.dir);
				}
			};
			// if dropping on folders is allowed, then also allow on breadcrumbs
			if (this._folderDropOptions) {
				breadcrumbOptions.onDrop = _.bind(this._onDropOnBreadCrumb, this);
				breadcrumbOptions.onOver = function() {
					self.$el.find('td.filename.ui-droppable').droppable('disable');
				}
				breadcrumbOptions.onOut = function() {
					self.$el.find('td.filename.ui-droppable').droppable('enable');
				}
			}
			this.breadcrumb = new OCA.Files.BreadCrumb(breadcrumbOptions);

			var $controls = this.$el.find('#controls');
			if ($controls.length > 0) {
				$controls.prepend(this.breadcrumb.$el);
				this.$table.addClass('has-controls');
			}

			this._renderNewButton();

			this.$el.find('thead th .columntitle').click(_.bind(this._onClickHeader, this));

			this._onResize = _.debounce(_.bind(this._onResize, this), 100);
			$('#app-content').on('appresized', this._onResize);
			$(window).resize(this._onResize);

			this.$el.on('show', this._onResize);

			this.updateSearch();

			this.$fileList.on('click','td.filename>a.name, td.filesize, td.date', _.bind(this._onClickFile, this));

			this.$fileList.on('change', 'td.filename>.selectCheckBox', _.bind(this._onClickFileCheckbox, this));
			this.$el.on('urlChanged', _.bind(this._onUrlChanged, this));
			this.$el.find('.select-all').click(_.bind(this._onClickSelectAll, this));
			this.$el.find('.download').click(_.bind(this._onClickDownloadSelected, this));
			this.$el.find('.delete-selected').click(_.bind(this._onClickDeleteSelected, this));

			this.$el.find('.selectedActions a').tooltip({placement:'top'});

			this.$container.on('scroll', _.bind(this._onScroll, this));

			if (options.scrollTo) {
				this.$fileList.one('updated', function() {
					self.scrollTo(options.scrollTo);
				});
			}

			if (options.enableUpload) {
				// TODO: auto-create this element
				var $uploadEl = this.$el.find('#file_upload_start');
				if ($uploadEl.exists()) {
					this._uploader = new OC.Uploader($uploadEl, {
						fileList: this,
						filesClient: this.filesClient,
						dropZone: $('#content')
					});

					this.setupUploadEvents(this._uploader);
				}
			}

			OC.Plugins.attach('OCA.Files.FileList', this);
		},

		/**
		 * Destroy / uninitialize this instance.
		 */
		destroy: function() {
			if (this._newFileMenu) {
				this._newFileMenu.remove();
			}
			if (this._newButton) {
				this._newButton.remove();
			}
			if (this._detailsView) {
				this._detailsView.remove();
			}
			// TODO: also unregister other event handlers
			this.fileActions.off('registerAction', this._onFileActionsUpdated);
			this.fileActions.off('setDefault', this._onFileActionsUpdated);
			OC.Plugins.detach('OCA.Files.FileList', this);
			$('#app-content').off('appresized', this._onResize);
		},

		/**
		 * Initializes the file actions, set up listeners.
		 *
		 * @param {OCA.Files.FileActions} fileActions file actions
		 */
		_initFileActions: function(fileActions) {
			var self = this;
			this.fileActions = fileActions;
			if (!this.fileActions) {
				this.fileActions = new OCA.Files.FileActions();
				this.fileActions.registerDefaultActions();
			}

			if (this._detailsView) {
				this.fileActions.registerAction({
					name: 'Details',
					displayName: t('files', 'Details'),
					mime: 'all',
					order: -50,
					iconClass: 'icon-details',
					permissions: OC.PERMISSION_READ,
					actionHandler: function(fileName, context) {
						self._updateDetailsView(fileName);
					}
				});
			}

			this._onFileActionsUpdated = _.debounce(_.bind(this._onFileActionsUpdated, this), 100);
			this.fileActions.on('registerAction', this._onFileActionsUpdated);
			this.fileActions.on('setDefault', this._onFileActionsUpdated);
		},

		/**
		 * Returns a unique model for the given file name.
		 *
		 * @param {string|object} fileName file name or jquery row
		 * @return {OCA.Files.FileInfoModel} file info model
		 */
		getModelForFile: function(fileName) {
			return this.findFile(fileName);
		},

		/**
		 * Displays the details view for the given file and
		 * selects the given tab
		 *
		 * @param {string} fileName file name for which to show details
		 * @param {string} [tabId] optional tab id to select
		 */
		showDetailsView: function(fileName, tabId) {
			this._updateDetailsView(fileName);
			if (tabId) {
				this._detailsView.selectTab(tabId);
			}
			OC.Apps.showAppSidebar(this._detailsView.$el);
		},

		/**
		 * Update the details view to display the given file
		 *
		 * @param {string} fileName file name from the current list
		 * @param {boolean} [show=true] whether to open the sidebar if it was closed
		 */
		_updateDetailsView: function(fileName, show) {
			var self = this;
			if (!this._detailsView) {
				return;
			}

			// show defaults to true
			show = _.isUndefined(show) || !!show;
			var oldFileInfo = this._detailsView.getFileInfo();
			if (oldFileInfo) {
				// TODO: use more efficient way, maybe track the highlight
				this.$fileList.children().filterAttr('data-id', '' + oldFileInfo.get('id')).removeClass('highlighted');
			}

			function onRemoveCurrentFile() {
				OC.Apps.hideAppSidebar(self._detailsView.$el);
				self._currentFileModel = null;
			}

			if (!fileName) {
				this._detailsView.setFileInfo(null);
				if (this._currentFileModel) {
					this._currentFileModel.off('remove', onRemoveCurrentFile);
				}
				this._currentFileModel = null;
				OC.Apps.hideAppSidebar(this._detailsView.$el);
				return;
			}

			if (show && this._detailsView.$el.hasClass('disappear')) {
				OC.Apps.showAppSidebar(this._detailsView.$el);
			}

			var $tr = this.findFileEl(fileName);
			var model = this.findFile(fileName);

			this._currentFileModel = model;
			// close sidebar if current file is removed
			this._currentFileModel.on('remove', onRemoveCurrentFile)

			$tr.addClass('highlighted');

			this._detailsView.setFileInfo(model);
			this._detailsView.$el.scrollTop(0);
		},

		/**
		 * Event handler for when the window size changed
		 */
		_onResize: function() {
			var containerWidth = this.$el.width();
			var actionsWidth = 0;
			$.each(this.$el.find('#controls .actions'), function(index, action) {
				actionsWidth += $(action).outerWidth();
			});

			// subtract app navigation toggle when visible
			containerWidth -= $('#app-navigation-toggle').width();

			this.breadcrumb.setMaxWidth(containerWidth - actionsWidth - 10);

			this.$table.find('>thead').width($('#app-content').width() - OC.Util.getScrollBarWidth());
		},

		/**
		 * Event handler for when the URL changed
		 */
		_onUrlChanged: function(e) {
			if (e && _.isString(e.dir)) {
				this.changeDirectory(e.dir, false, true);
			}
		},

		/**
		 * Selected/deselects the given file element and updated
		 * the internal selection cache.
		 *
		 * @param {Object} $tr single file row element
		 * @param {bool} state true to select, false to deselect
		 */
		_selectFileEl: function($tr, state) {
			var model = this.collection.findWhere({name: $tr.attr('data-file')});
			if (!model) {
				return;
			}

			if (state) {
				this._selectedCollection.add(model);
			} else {
				this._selectedCollection.remove(model);
			}
		},

		_onToggleSelectedFile: function(model, collection, options) {
			var state = options.add ? true : false;
			var $tr = this.findFileEl(model.get('name'));
			var $checkbox = $tr.find('td.filename>.selectCheckBox');

			$checkbox.prop('checked', state);
			$tr.toggleClass('selected', state);
			if (this._detailsView && !this._detailsView.$el.hasClass('disappear')) {
				// hide sidebar
				this._updateDetailsView(null);
			}

			this.updateSelectionSummary();

			this.$el.find('.select-all').prop('checked', this.isAllSelected());
		},

		_onResetSelection: function() {
			var self = this;
			if (this._detailsView && !this._detailsView.$el.hasClass('disappear')) {
				// hide sidebar
				this._updateDetailsView(null);
			}

			if (!this._selectedCollection.length || !this.collection.length) {
				// nothing selected or empty list
				this.$fileList.find('td.filename>.selectCheckBox').prop('checked', false)
					.closest('tr').toggleClass('selected', false);
			} else if (this.isAllSelected()) {
				// don't bother iterating, tick all checkboxes
				this.$fileList.find('td.filename>.selectCheckBox').prop('checked', true)
					.closest('tr').toggleClass('selected', true);
			} else {
				// custom list given, select them one by one
				this._selectedCollection.each(function(model) {
					self._onToggleSelectedFile(model, self._selectedCollection, {add: true});
				});
			}

			this.updateSelectionSummary();
		},

		/**
		 * Event handler for when clicking on files to select them
		 */
		_onClickFile: function(event) {
			var $tr = $(event.target).closest('tr');
			if ($tr.hasClass('dragging')) {
				return;
			}
			if (this._allowSelection && (event.ctrlKey || event.shiftKey)) {
				event.preventDefault();
				if (event.shiftKey) {
					var $lastTr = $(this._lastChecked);
					var lastIndex = $lastTr.index();
					var currentIndex = $tr.index();
					var $rows = this.$fileList.children('tr');

					// last clicked checkbox below current one ?
					if (lastIndex > currentIndex) {
						var aux = lastIndex;
						lastIndex = currentIndex;
						currentIndex = aux;
					}

					// auto-select everything in-between
					for (var i = lastIndex + 1; i < currentIndex; i++) {
						this._selectFileEl($rows.eq(i), true);
					}
				}
				else {
					this._lastChecked = $tr;
				}
				var $checkbox = $tr.find('td.filename>.selectCheckBox');
				this._selectFileEl($tr, !$checkbox.prop('checked'));
				this.updateSelectionSummary();
			} else {
				// clicked directly on the name
				if (!this._detailsView || $(event.target).is('.nametext') || $(event.target).closest('.nametext').length) {
					var filename = $tr.attr('data-file');
					var renaming = $tr.data('renaming');
					if (!renaming) {
						this.fileActions.currentFile = $tr.find('td');
						var mime = this.fileActions.getCurrentMimeType();
						var type = this.fileActions.getCurrentType();
						var permissions = this.fileActions.getCurrentPermissions();
						var action = this.fileActions.getDefault(mime,type, permissions);
						if (action) {
							event.preventDefault();
							// also set on global object for legacy apps
							window.FileActions.currentFile = this.fileActions.currentFile;
							action(filename, {
								$file: $tr,
								fileList: this,
								fileActions: this.fileActions,
								dir: $tr.attr('data-path') || this.getCurrentDirectory()
							});
						}
						// deselect row
						$(event.target).closest('a').blur();
					}
				} else {
					this._updateDetailsView($tr.attr('data-file'));
					event.preventDefault();
				}
			}
		},

		/**
		 * Event handler for when clicking on a file's checkbox
		 */
		_onClickFileCheckbox: function(e) {
			var $tr = $(e.target).closest('tr');
			var state = !$tr.hasClass('selected');
			this._selectFileEl($tr, state);
			this._lastChecked = $tr;
			this.updateSelectionSummary();
			if (this._detailsView && !this._detailsView.$el.hasClass('disappear')) {
				// hide sidebar
				this._updateDetailsView(null);
			}
		},

		/**
		 * Event handler for when selecting/deselecting all files
		 */
		_onClickSelectAll: function(e) {
			var checked = $(e.target).prop('checked');
			if (checked) {
				this._selectedCollection.reset(this.collection.models);
			} else {
				this._selectedCollection.reset([]);
			}
		},

		/**
		 * Event handler for when clicking on "Download" for the selected files
		 */
		_onClickDownloadSelected: function(event) {
			var files;
			var dir = this.getCurrentDirectory();
			if (this.isAllSelected() && this._selectedCollection.length > 1) {
				files = OC.basename(dir);
				dir = OC.dirname(dir) || '/';
			}
			else {
				files = this._selectedCollection.pluck('name');
			}

			var downloadFileaction = $('#selectedActionsList').find('.download');

			// don't allow a second click on the download action
			if(downloadFileaction.hasClass('disabled')) {
				event.preventDefault();
				return;
			}

			var disableLoadingState = function(){
				OCA.Files.FileActions.updateFileActionSpinner(downloadFileaction, false);
			};

			OCA.Files.FileActions.updateFileActionSpinner(downloadFileaction, true);
			if(this._selectedCollection.length > 1) {
				OCA.Files.Files.handleDownload(this.getDownloadUrl(files, dir, true), disableLoadingState);
			}
			else {
				var first = this._selectedCollection.at(0).toJSON();
				OCA.Files.Files.handleDownload(this.getDownloadUrl(first.name, dir, true), disableLoadingState);
			}
			return false;
		},

		/**
		 * Event handler for when clicking on "Delete" for the selected files
		 */
		_onClickDeleteSelected: function(event) {
			var files = null;
			if (!this.isAllSelected()) {
				files = this._selectedCollection.pluck('name');
			}
			this.do_delete(files);
			event.preventDefault();
			return false;
		},

		/**
		 * Event handler when clicking on a table header
		 */
		_onClickHeader: function(e) {
			if (this.$table.hasClass('multiselect')) {
				return;
			}
			var $target = $(e.target);
			var sort;
			if (!$target.is('a')) {
				$target = $target.closest('a');
			}
			sort = $target.attr('data-sort');
			if (sort) {
				if (this._sort === sort) {
					this.setSort(sort, (this._sortDirection === 'desc')?'asc':'desc', true, true);
				}
				else {
					if ( sort === 'name' ) {	//default sorting of name is opposite to size and mtime
						this.setSort(sort, 'asc', true, true);
					}
					else {
						this.setSort(sort, 'desc', true, true);
					}
				}
			}
		},

		/**
		 * Event handler when clicking on a bread crumb
		 */
		_onClickBreadCrumb: function(e) {
			var $el = $(e.target).closest('.crumb'),
				$targetDir = $el.data('dir');

			if ($targetDir !== undefined && e.which === 1) {
				e.preventDefault();
				this.changeDirectory($targetDir);
				this.updateSearch();
			}
		},

		/**
		 * Event handler for when scrolling the list container.
		 * This appends/renders the next page of entries when reaching the bottom.
		 */
		_onScroll: function(e) {
			if (this.$container.scrollTop() + this.$container.height() > this.$el.height() - 300) {
				//this._nextPage(true);
			}
		},

		/**
		 * Event handler when dropping on a breadcrumb
		 */
		_onDropOnBreadCrumb: function( event, ui ) {
			var self = this;
			var $target = $(event.target);
			if (!$target.is('.crumb')) {
				$target = $target.closest('.crumb');
			}
			var targetPath = $(event.target).data('dir');
			var dir = this.getCurrentDirectory();
			while (dir.substr(0,1) === '/') {//remove extra leading /'s
				dir = dir.substr(1);
			}
			dir = '/' + dir;
			if (dir.substr(-1,1) !== '/') {
				dir = dir + '/';
			}
			// do nothing if dragged on current dir
			if (targetPath === dir || targetPath + '/' === dir) {
				return;
			}

			var fileNames = _.map(ui.helper.find('tr'), function(el) {
				return $(el).attr('data-file');
			});

			this.move(fileNames, targetPath);

			// re-enable td elements to be droppable
			// sometimes the filename drop handler is still called after re-enable,
			// it seems that waiting for a short time before re-enabling solves the problem
			setTimeout(function() {
				self.$el.find('td.filename.ui-droppable').droppable('enable');
			}, 10);
		},

		/**
		 * Sets a new page title
		 */
		setPageTitle: function(title){
			if (title) {
				title += ' - ';
			} else {
				title = '';
			}
			title += this.appName;
			// Sets the page title with the " - ownCloud" suffix as in templates
			window.document.title = title + ' - ' + oc_defaults.title;

			return true;
		},
		/**
		 * Returns the file info for the given file name from the internal collection.
		 *
		 * @param {string} fileName file name
		 * @return {OCA.Files.FileInfo} file info or null if it was not found
		 *
		 * @since 8.2
		 *
		 * @deprecated search the file name on the collection instead
		 */
		findFile: function(fileName) {
			return this.collection.findWhere({name: fileName});
		},

		/**
		 * Returns the tr element for a given file name, but only if it was already rendered.
		 *
		 * @param {string} fileName file name
		 * @return {Object} jQuery object of the matching row
		 */
		findFileEl: function(fileName){
			// use filterAttr to avoid escaping issues
			return this.$fileList.find('tr').filterAttr('data-file', fileName);
		},

		/**
		 * Returns the file data from a given file element.
		 * @param $el file tr element
		 * @return file data
		 */
		elementToFile: function($el){
			$el = $($el);
			var data = {
				id: parseInt($el.attr('data-id'), 10),
				name: $el.attr('data-file'),
				mimetype: $el.attr('data-mime'),
				mtime: parseInt($el.attr('data-mtime'), 10),
				type: $el.attr('data-type'),
				size: parseInt($el.attr('data-size'), 10),
				etag: $el.attr('data-etag'),
				permissions: parseInt($el.attr('data-permissions'), 10)
			};
			var icon = $el.attr('data-icon');
			if (icon) {
				data.icon = icon;
			}
			var mountType = $el.attr('data-mounttype');
			if (mountType) {
				data.mountType = mountType;
			}
			var path = $el.attr('data-path');
			if (path) {
				data.path = path;
			}
			return data;
		},

		/**
		 * Event handler for when file actions were updated.
		 * This will refresh the file actions on the list.
		 */
		_onFileActionsUpdated: function() {
			var self = this;
			var $files = this.$fileList.find('tr');
			if (!$files.length) {
				return;
			}

			$files.each(function() {
				self.fileActions.display($(this).find('td.filename'), false, self);
			});
			this.$fileList.trigger($.Event('fileActionsReady', {fileList: this, $files: $files}));

		},

		/**
		 * Sets the files to be displayed in the list.
		 * This operation will re-render the list and update the summary.
		 * @param filesArray array of file data (map)
		 *
		 * @deprecated use the collection directly
		 */
		setFiles: function(filesArray) {
			this.collection.reset(filesArray);
		},

		_onCollectionSort: function(collection, options) {
			// only rerender on real sort, not on add+sort
			if (!options.add) {
				this._rerenderList();
			}
		},

		_onCollectionReset: function() {
			this._selectedCollection.reset([]);
			this._rerenderList();
		},

		_rerenderList: function() {
			var self = this;

			this.$fileList.empty();

			// clear "Select all" checkbox
			this.$el.find('.select-all').prop('checked', false);

			this.updateEmptyContent();

			$(window).scrollTop(0);

			var isAllSelected = this.isAllSelected();
			var $newTrs = this.collection.map(function(entryModel) {
				return self._onAddFile(
					entryModel, self.collection, {
						silent: true,
						selected: isAllSelected,
						animate: false,
						append: true
					});
			});

			this.$fileList.trigger($.Event('fileActionsReady', {fileList: this, $files: $newTrs}));

			this.$fileList.trigger(jQuery.Event('updated'));
			_.defer(function() {
				self.$el.closest('#app-content').trigger(jQuery.Event('apprendered'));
			});
		},

		/**
		 * Returns whether the given file info must be hidden
		 *
		 * @param {OC.Files.FileInfo} fileInfo file info
		 * 
		 * @return {boolean} true if the file is a hidden file, false otherwise
		 */
		_isHiddenFile: function(file) {
			return file.name && file.name.charAt(0) === '.';
		},

		/**
		 * Returns the icon URL matching the given file info
		 *
		 * @param {OC.Files.FileInfo} fileInfo file info
		 *
		 * @return {string} icon URL
		 */
		_getIconUrl: function(fileInfo) {
			var mimeType = fileInfo.get('mimetype') || 'application/octet-stream';
			if (mimeType === 'httpd/unix-directory') {
				var mountType = fileInfo.get('mountType');
				// use default folder icon
				if (mountType === 'shared' || mountType === 'shared-root') {
					return OC.MimeType.getIconUrl('dir-shared');
				} else if (mountType === 'external-root') {
					return OC.MimeType.getIconUrl('dir-external');
				}
				return OC.MimeType.getIconUrl('dir');
			}
			return OC.MimeType.getIconUrl(mimeType);
		},

		/**
		 * Creates a new table row element using the given file data.
		 * @param {OCA.Files.FileInfoModel} fileData file info attributes
		 * @param options map of attributes
		 * @return new tr element (not appended to the table)
		 */
		_createRow: function(fileData, options) {
			var td, simpleSize, basename, extension, sizeColor,
				icon = fileData.get('icon') || this._getIconUrl(fileData),
				name = fileData.get('name'),
				mtime = parseInt(fileData.get('mtime'), 10),
				mime = fileData.get('mimetype'),
				path = fileData.get('path'),
				type,
				dataIcon = null,
				linkUrl;
			options = options || {};

			if (isNaN(mtime)) {
				mtime = new Date().getTime();
			}

			if (fileData.isDirectory()) {
				type = 'dir';
				if (fileData.get('mountType') && fileData.get('mountType').indexOf('external') === 0) {
					icon = OC.MimeType.getIconUrl('dir-external');
					dataIcon = icon;
				}
			} else {
				type = 'file';
			}

			//containing tr
			var tr = $('<tr></tr>').attr({
				"data-id" : fileData.id,
				"data-type": type,
				"data-size": fileData.get('size'),
				"data-file": name,
				"data-mime": mime,
				"data-mtime": mtime,
				"data-etag": fileData.get('etag'),
				"data-permissions": fileData.get('permissions') || this.getDirectoryPermissions()
			});

			if (dataIcon) {
				// icon override
				tr.attr('data-icon', dataIcon);
			}

			// FIXME: solve this on model level
			/*
			if (fileData.mountType) {
				// dirInfo (parent) only exist for the "real" file list
				if (this.dirInfo.id) {
					// FIXME: HACK: detect shared-root
					if (fileData.mountType === 'shared' && this.dirInfo.mountType !== 'shared' && this.dirInfo.mountType !== 'shared-root') {
						// if parent folder isn't share, assume the displayed folder is a share root
						fileData.mountType = 'shared-root';
					} else if (fileData.mountType === 'external' && this.dirInfo.mountType !== 'external' && this.dirInfo.mountType !== 'external-root') {
						// if parent folder isn't external, assume the displayed folder is the external storage root
						fileData.mountType = 'external-root';
					}
				}
				tr.attr('data-mounttype', fileData.mountType);
			}
			*/

			if (!_.isUndefined(path)) {
				tr.attr('data-path', path);
			}
			else {
				path = this.getCurrentDirectory();
			}

			// filename td
			td = $('<td class="filename"></td>');


			// linkUrl
			if (mime === 'httpd/unix-directory') {
				linkUrl = this.linkTo(path + '/' + name);
			}
			else {
				linkUrl = this.getDownloadUrl(name, path, type === 'dir');
			}
			if (this._allowSelection) {
				td.append(
					'<input id="select-' + this.id + '-' + fileData.get('id') +
					'" type="checkbox" class="selectCheckBox checkbox"' +
					(options.selected ? ' checked="checked" ' : '') +
					'/><label for="select-' + this.id + '-' + fileData.get('id') + '">' +
					'<div class="thumbnail" style="background-image:url(' + icon + '); background-size: 32px;"></div>' +
					'<span class="hidden-visually">' + t('files', 'Select') + '</span>' +
					'</label>'
				);
			} else {
				td.append('<div class="thumbnail" style="background-image:url(' + icon + '); background-size: 32px;"></div>');
			}
			var linkElem = $('<a></a>').attr({
				"class": "name",
				"href": linkUrl
			});

			// from here work on the display name
			name = fileData.get('displayName') || name;

			// show hidden files (starting with a dot) completely in gray
			if(name.indexOf('.') === 0) {
				basename = '';
				extension = name;
			// split extension from filename for non dirs
			} else if (mime !== 'httpd/unix-directory' && name.indexOf('.') !== -1) {
				basename = name.substr(0, name.lastIndexOf('.'));
				extension = name.substr(name.lastIndexOf('.'));
			} else {
				basename = name;
				extension = false;
			}
			var nameSpan=$('<span></span>').addClass('nametext');
			var innernameSpan = $('<span></span>').addClass('innernametext').text(basename);
			nameSpan.append(innernameSpan);
			linkElem.append(nameSpan);
			if (extension) {
				nameSpan.append($('<span></span>').addClass('extension').text(extension));
			}
			var extraData = fileData.get('extraData');
			if (extraData) {
				if (extraData.charAt(0) === '/') {
					extraData = extraData.substr(1);
				}
				nameSpan.addClass('extra-data').attr('title', extraData);
				nameSpan.tooltip({placement: 'right'});
			}
			// dirs can show the number of uploaded files
			if (mime === 'httpd/unix-directory') {
				linkElem.append($('<span></span>').attr({
					'class': 'uploadtext',
					'currentUploads': 0
				}));
			}
			td.append(linkElem);
			tr.append(td);

			// size column
			var size = fileData.get('size');
			if (typeof(size) !== 'undefined' && size >= 0) {
				simpleSize = humanFileSize(parseInt(size, 10), true);
				sizeColor = Math.round(160-Math.pow((size/(1024*1024)),2));
			} else {
				simpleSize = t('files', 'Pending');
			}

			td = $('<td></td>').attr({
				"class": "filesize",
				"style": 'color:rgb(' + sizeColor + ',' + sizeColor + ',' + sizeColor + ')'
			}).text(simpleSize);
			tr.append(td);

			// date column (1000 milliseconds to seconds, 60 seconds, 60 minutes, 24 hours)
			// difference in days multiplied by 5 - brightest shade for files older than 32 days (160/5)
			var modifiedColor = Math.round(((new Date()).getTime() - mtime )/1000/60/60/24*5 );
			// ensure that the brightest color is still readable
			if (modifiedColor >= '160') {
				modifiedColor = 160;
			}
			var formatted;
			var text;
			if (mtime > 0) {
				formatted = OC.Util.formatDate(mtime);
				text = OC.Util.relativeModifiedDate(mtime);
			} else {
				formatted = t('files', 'Unable to determine date');
				text = '?';
			}
			td = $('<td></td>').attr({ "class": "date" });
			td.append($('<span></span>').attr({
				"class": "modified",
				"title": formatted,
				"style": 'color:rgb('+modifiedColor+','+modifiedColor+','+modifiedColor+')'
			}).text(text)
			  .tooltip({placement: 'top'})
			);
			tr.find('.filesize').text(simpleSize);
			tr.append(td);
			return tr;
		},

		/**
		 * Adds an entry to the files array and also into the DOM
		 * in a sorted manner.
		 *
		 * @param {OC.Files.FileInfo} fileData map of file attributes
		 * @param {Object} [options] map of attributes
		 * after adding (default), false otherwise. Defaults to true.
		 * @param {boolean} [options.silent] true to prevent firing events like "fileActionsReady",
		 * defaults to false.
		 * @param {boolean} [options.animate] true to animate the thumbnail image after load
		 * defaults to true.
		 * @return new tr element (not appended to the table)
		 *
		 * @deprecated always add directly to the collection
		 */
		add: function(fileData, options) {
			//options = _.extend({sort: false}, options || {});
			// FIXME: prevent sort and provide "at" to insert at correct index !
			// because backbone will still internally re-sort the list
			var model = this.collection.add(fileData, options);
			return this.findFileEl(model.get('name'));
		},

		_onAddFile: function(model, collection, options) {
			var index;
			var $tr;
			var $rows;
			var $insertionPoint;
			options = _.extend({animate: true}, options || {});

			$tr = this._renderRow(model, options);

			if (options.append) {
				this.$fileList.append($tr);
			} else {
				// find insertion index
				$rows = this.$fileList.children();
				index = this.collection.indexOf(model);
				$insertionPoint = $rows.eq(index);
				if (!$insertionPoint.length) {
					this.$fileList.append($tr);
				} else {
					$insertionPoint.before($tr);
				}
			}

			if ($tr && options.animate) {
				$tr.addClass('appear transparent');
				window.setTimeout(function() {
					$tr.removeClass('transparent');
				});
			}

			if (options.scrollTo) {
				this.scrollTo(model.get('name'));
			}

			// just added a file
			if (this.collection.length === 1) {
				this.updateEmptyContent();
			}

			return $tr;
		},

		_onChangeFile: function(model, collection, options) {
			// re-render row
			var $oldRow = this.findFileEl(model.previous('name'));
			var $row
			var highlightState = $oldRow.hasClass('highlighted');

			options = _.extend({animate: true}, options);
			$row = this._renderRow(model, options);

			// replace the whole row
			$oldRow.replaceWith($row);

			this.$fileList.trigger($.Event('fileActionsReady', {fileList: this, $files: $row}));

			if (options.animate) {
				$row.addClass('appear transparent');
				window.setTimeout(function() {
					$row.removeClass('transparent');
				});
			}

			// restore selection state
			var selectedModel = this._selectedCollection.get(model.id);
			if (selectedModel) {
				this._selectFileEl($row, true);
			}

			$row.toggleClass('highlighted', highlightState);
		},

		/**
		 * Creates a new row element based on the given attributes
		 * and returns it.
		 *
		 * @param {OCA.Files.FileInfoModel} fileData map of file attributes
		 * @param {Object} [options] map of attributes
		 * @param {int} [options.index] index at which to insert the element
		 * @param {boolean} [options.animate] true to animate the thumbnail image after load
		 * defaults to true.
		 * @return new tr element (not appended to the table)
		 */
		_renderRow: function(fileData, options) {
			options = options || {};
			var mime = fileData.get('mimetype'),
				path = fileData.get('path') || this.getCurrentDirectory(),
				permissions = fileData.get('permissions');

			if (fileData.isShareMountPoint) {
				permissions = permissions | OC.PERMISSION_UPDATE;
			}

			var tr = this._createRow(
				fileData,
				options
			);
			var filenameTd = tr.find('td.filename');

			// TODO: move dragging to FileActions ?
			// enable drag only for deletable files
			if (this._dragOptions && permissions & OC.PERMISSION_DELETE) {
				filenameTd.draggable(this._dragOptions);
			}
			// allow dropping on folders
			if (this._folderDropOptions && mime === 'httpd/unix-directory') {
				tr.droppable(this._folderDropOptions);
			}

			if (options.hidden) {
				tr.addClass('hidden');
			}

			if (fileData.isHiddenFile()) {
				tr.addClass('hidden-file');
			}

			// display actions
			this.fileActions.display(filenameTd, !options.silent, this);

			if (mime !== 'httpd/unix-directory') {
				var iconDiv = filenameTd.find('.thumbnail');
				// lazy load / newly inserted td ?
				// the typeof check ensures that the default value of animate is true
				if (typeof(options.animate) === 'undefined' || !!options.animate) {
					this.lazyLoadPreview({
						path: path + '/' + fileData.get('name'),
						mime: mime,
						etag: fileData.etag,
						callback: function(url) {
							iconDiv.css('background-image', 'url("' + url + '")');
						}
					});
				}
				else {
					// set the preview URL directly
					var urlSpec = {
							file: path + '/' + fileData.get('name'),
							c: fileData.get('etag')
						};
					var previewUrl = this.generatePreviewUrl(urlSpec);
					previewUrl = previewUrl.replace('(', '%28').replace(')', '%29');
					iconDiv.css('background-image', 'url("' + previewUrl + '")');
				}
			}
			return tr;
		},
		/**
		 * Returns the current directory
		 * @method getCurrentDirectory
		 * @return current directory
		 */
		getCurrentDirectory: function(){
			return this.model.getFullPath();
		},
		/**
		 * Returns the directory permissions
		 * @return permission value as integer
		 */
		getDirectoryPermissions: function() {
			return this.model.get('permissions');
		},
		/**
		 * Changes the current directory and reload the file list.
		 * @param {string} targetDir target directory (non URL encoded)
		 * @param {boolean} [changeUrl=true] if the URL must not be changed (defaults to true)
		 * @param {boolean} [force=false] set to true to force changing directory
		 * @param {string} [fileId] optional file id, if known, to be appended in the URL
		 */
		changeDirectory: function(targetDir, changeUrl, force, fileId) {
			var self = this;
			var currentDir = this.getCurrentDirectory();
			targetDir = targetDir || '/';
			if (!force && currentDir === targetDir) {
				return;
			}
			this._setCurrentDir(targetDir, changeUrl, fileId);
			// discard finished uploads list, we'll get it through a regular reload
			this._uploads = {};
			this.reload().then(function(success){
				if (!success) {
					self.changeDirectory(currentDir, true);
				}
			});
		},
		linkTo: function(dir) {
			return OC.linkTo('files', 'index.php')+"?dir="+ encodeURIComponent(dir).replace(/%2F/g, '/');
		},

		_isValidPath: function(path) {
			var sections = path.split('/');
			var i;
			for (i = 0; i < sections.length; i++) {
				if (sections[i] === '..') {
					return false;
				}
			}
			var specialChars = [decodeURIComponent('%00'), decodeURIComponent('%0A')];
			for (i = 0; i < specialChars.length; i++) {
				if (path.indexOf(specialChars[i]) !== -1) {
					return false;
				}
			}
			return true;
		},

		/**
		 * Sets the current directory name and updates the breadcrumb.
		 * @param targetDir directory to display
		 * @param changeUrl true to also update the URL, false otherwise (default)
		 * @param {string} [fileId] file id
		 */
		_setCurrentDir: function(targetDir, changeUrl, fileId) {
			targetDir = targetDir.replace(/\\/g, '/');
			if (!this._isValidPath(targetDir)) {
				OC.Notification.showTemporary(t('files', 'Invalid path'));
				targetDir = '/';
				changeUrl = true;
			}
			var previousDir = this.getCurrentDirectory(),
				baseDir = OC.basename(targetDir);

			if (baseDir !== '') {
				this.setPageTitle(baseDir);
			}
			else {
				this.setPageTitle();
			}

			if (targetDir.length > 0 && targetDir[0] !== '/') {
				targetDir = '/' + targetDir;
			}

			this.model.set({'path': OC.dirname(targetDir), 'name': OC.basename(targetDir)});

			if (changeUrl !== false) {
				var params = {
					dir: targetDir,
					previousDir: previousDir
				};
				if (fileId) {
					params.fileId = fileId;
				}
				this.$el.trigger(jQuery.Event('changeDirectory', params));
			}
			this.breadcrumb.setDirectory(this.getCurrentDirectory());
		},
		/**
		 * Sets the current sorting and refreshes the list
		 *
		 * @param sort sort attribute name
		 * @param direction sort direction, one of "asc" or "desc"
		 * @param update true to update the list, false otherwise (default)
		 * @param persist true to save changes in the database (default)
		 */
		setSort: function(sort, direction, update, persist) {
			this.collection.setSort(sort, direction);
			this._sort = sort;
			this._sortDirection = (direction === 'desc')?'desc':'asc';

			this.$el.find('thead th .sort-indicator')
				.removeClass(this.SORT_INDICATOR_ASC_CLASS)
				.removeClass(this.SORT_INDICATOR_DESC_CLASS)
				.toggleClass('hidden', true)
				.addClass(this.SORT_INDICATOR_DESC_CLASS);

			this.$el.find('thead th.column-' + sort + ' .sort-indicator')
				.removeClass(this.SORT_INDICATOR_ASC_CLASS)
				.removeClass(this.SORT_INDICATOR_DESC_CLASS)
				.toggleClass('hidden', false)
				.addClass(direction === 'desc' ? this.SORT_INDICATOR_DESC_CLASS : this.SORT_INDICATOR_ASC_CLASS);
			if (update) {
				if (this._clientSideSort) {
					this.collection.sort();
				}
				else {
					this.reload();
				}
			}

			if (persist) {
				$.post(OC.generateUrl('/apps/files/api/v1/sorting'), {
					mode: sort,
					direction: direction
				});
			}
		},

		/**
		 * Returns list of webdav properties to request
		 */
		_getWebdavProperties: function() {
			return [].concat(this.filesClient.getPropfindProperties());
		},

		/**
		 * Reloads the file list using ajax call
		 *
		 * @return ajax call object
		 */
		reload: function() {
			if (this._currentFileModel) {
				this._currentFileModel.off();
			}
			this._currentFileModel = null;
			this.$el.find('.select-all').prop('checked', false);
			this.showMask();

			//this._reloadCall = this.model.fetch();
			this._reloadCall = this.filesClient.getFolderContents(
				this.getCurrentDirectory(), {
					includeParent: true,
					properties: this._getWebdavProperties()
				}
			);

			if (this._detailsView) {
				// close sidebar
				this._updateDetailsView(null);
			}
			var callBack = this.reloadCallback.bind(this);
			return this._reloadCall.then(callBack, callBack);
		},
		reloadCallback: function(status, result) {
			delete this._reloadCall;
			this.hideMask();

			if (status === 401) {
				return false;
			}

			// Firewall Blocked request?
			if (status === 403 || status === 400) {
				// Go home
				this.changeDirectory('/');
				OC.Notification.showTemporary(t('files', 'This operation is forbidden'));
				return false;
			}

			// Did share service die or something else fail?
			if (status === 500) {
				// Go home
				this.changeDirectory('/');
				OC.Notification.showTemporary(
					t('files', 'This directory is unavailable, please check the logs or contact the administrator')
				);
				return false;
			}

			if (status === 503) {
				// Go home
				if (this.getCurrentDirectory() !== '/') {
					this.changeDirectory('/');
					// TODO: read error message from exception
					OC.Notification.showTemporary(
						t('files', 'Storage is temporarily not available')
					);
				}
				return false;
			}

			if (status === 404) {
				// go back home
				this.changeDirectory('/');
				return false;
			}
			// aborted ?
			if (status === 0){
				return true;
			}

			// TODO: parse remaining quota from PROPFIND response
			this.updateStorageStatistics(true);

			this.model.set(result.shift());
			this.collection.reset(result);

			// FIXME: not sure why this is needed
			this.setViewerMode(false);

			if (this.model) {
				var newFileId = this.model.id;
				// update fileid in URL
				var params = {
					dir: this.model.get('path')
				};
				if (newFileId) {
					params.fileId = newFileId;
				}
				this.$el.trigger(jQuery.Event('afterChangeDirectory', params));
			}
			return true;
		},

		updateStorageStatistics: function(force) {
			OCA.Files.Files.updateStorageStatistics(this.getCurrentDirectory(), force);
		},

		/**
		 * @deprecated do not use nor override
		 */
		getAjaxUrl: function(action, params) {
			return OCA.Files.Files.getAjaxUrl(action, params);
		},


		/**
		 * @deprecated use getDownloadUrl on the FileInfoModel instead
		 */
		getDownloadUrl: function(files, dir, isDir) {
			var model;
			if (_.isUndefined(dir)) {
				model = this.model;
			} else {
				model = OCA.Files.FileInfoModel.getFromPath(dir);
			}
			return model.getDownloadUrl(files, isDir);
		},

		/**
		 * @deprecated use getDownloadUrl on the FileInfoModel instead
		 */
		getUploadUrl: function(fileName, dir) {
			var model;
			if (_.isUndefined(dir)) {
				model = this.model;
			} else {
				model = OCA.Files.FileInfoModel.getFromPath(dir);
			}
			return model.getUploadUrl(fileName);
		},

		/**
		 * Generates a preview URL based on the URL space.
		 * @param urlSpec attributes for the URL
		 * @param {int} urlSpec.x width
		 * @param {int} urlSpec.y height
		 * @param {String} urlSpec.file path to the file
		 * @return preview URL
		 */
		generatePreviewUrl: function(urlSpec) {
			urlSpec = urlSpec || {};
			if (!urlSpec.x) {
				urlSpec.x = this.$table.data('preview-x') || 32;
			}
			if (!urlSpec.y) {
				urlSpec.y = this.$table.data('preview-y') || 32;
			}
			urlSpec.x *= window.devicePixelRatio;
			urlSpec.y *= window.devicePixelRatio;
			urlSpec.x = Math.ceil(urlSpec.x);
			urlSpec.y = Math.ceil(urlSpec.y);
			urlSpec.forceIcon = 0;
			return OC.generateUrl('/core/preview.png?') + $.param(urlSpec);
		},

		/**
		 * Lazy load a file's preview.
		 *
		 * @param path path of the file
		 * @param mime mime type
		 * @param callback callback function to call when the image was loaded
		 * @param etag file etag (for caching)
		 */
		lazyLoadPreview : function(options) {
			var self = this;
			var path = options.path;
			var mime = options.mime;
			var ready = options.callback;
			var etag = options.etag;

			// get mime icon url
			var iconURL = OC.MimeType.getIconUrl(mime);
			var previewURL,
				urlSpec = {};
			ready(iconURL); // set mimeicon URL

			urlSpec.file = OCA.Files.Files.fixPath(path);
			if (options.x) {
				urlSpec.x = options.x;
			}
			if (options.y) {
				urlSpec.y = options.y;
			}
			if (options.a) {
				urlSpec.a = options.a;
			}
			if (options.mode) {
				urlSpec.mode = options.mode;
			}

			if (etag){
				// use etag as cache buster
				urlSpec.c = etag;
			}

			previewURL = self.generatePreviewUrl(urlSpec);
			previewURL = previewURL.replace('(', '%28');
			previewURL = previewURL.replace(')', '%29');

			// preload image to prevent delay
			// this will make the browser cache the image
			var img = new Image();
			img.onload = function(){
				// if loading the preview image failed (no preview for the mimetype) then img.width will < 5
				if (img.width > 5) {
					ready(previewURL, img);
				} else if (options.error) {
					options.error();
				}
			};
			if (options.error) {
				img.onerror = options.error;
			}
			img.src = previewURL;
		},

		/**
		 * @deprecated
		 */
		setDirectoryPermissions: function(permissions) {
			var isCreatable = (permissions & OC.PERMISSION_CREATE) !== 0;
			this.$el.find('#permissions').val(permissions);
			this.$el.find('.creatable').toggleClass('hidden', !isCreatable);
			this.$el.find('.notCreatable').toggleClass('hidden', isCreatable);
		},
		/**
		 * Shows/hides action buttons
		 *
		 * @param show true for enabling, false for disabling
		 */
		showActions: function(show){
			this.$el.find('.actions,#file_action_panel').toggleClass('hidden', !show);
			if (show){
				// make sure to display according to permissions
				var permissions = this.getDirectoryPermissions();
				var isCreatable = (permissions & OC.PERMISSION_CREATE) !== 0;
				this.$el.find('.creatable').toggleClass('hidden', !isCreatable);
				this.$el.find('.notCreatable').toggleClass('hidden', isCreatable);
				// remove old style breadcrumbs (some apps might create them)
				this.$el.find('#controls .crumb').remove();
				// refresh breadcrumbs in case it was replaced by an app
				this.breadcrumb.render();
			}
			else{
				this.$el.find('.creatable, .notCreatable').addClass('hidden');
			}
		},
		/**
		 * Enables/disables viewer mode.
		 * In viewer mode, apps can embed themselves under the controls bar.
		 * In viewer mode, the actions of the file list will be hidden.
		 * @param show true for enabling, false for disabling
		 */
		setViewerMode: function(show){
			this.showActions(!show);
			this.$el.find('#filestable').toggleClass('hidden', show);
			this.$el.trigger(new $.Event('changeViewerMode', {viewerModeEnabled: show}));
		},
		/**
		 * Removes a file entry from the list
		 * @param name name of the file to remove
		 * @param {Object} [options] map of attributes
		 * @return deleted element
		 *
		 * @deprecated always remove directly on the collection
		 */
		remove: function(name, options) {
			var fileEl = this.findFileEl(name);
			var model = this.collection.findWhere({name: name});
			if (model) {
				this.collection.remove(model);
			}
			return fileEl;
		},

		_onRemoveFile: function(model, collection, options) {
			options = options || {};
			var name = model.get('name');
			var fileEl = this.findFileEl(name);
			if (!fileEl.length) {
				return null;
			}
			this._selectedCollection.remove(model);
			if (this._dragOptions && (fileEl.data('permissions') & OC.PERMISSION_DELETE)) {
				// file is only draggable when delete permissions are set
				fileEl.find('td.filename').draggable('destroy');
			}
			fileEl.remove();

			// removed last file ?
			if (!this.collection.length) {
				this.updateEmptyContent();
			}

			return fileEl;
		},

		/**
		 * Moves a file to a given target folder.
		 *
		 * @param fileNames array of file names to move
		 * @param targetPath absolute target path
		 */
		move: function(fileNames, targetPath) {
			var self = this;
			var dir = this.getCurrentDirectory();
			if (dir.charAt(dir.length - 1) !== '/') {
				dir += '/';
			}
			var target = OC.basename(targetPath);
			if (!_.isArray(fileNames)) {
				fileNames = [fileNames];
			}
			_.each(fileNames, function(fileName) {
				var $tr = self.findFileEl(fileName);
				self.showFileBusyState($tr, true);
				if (targetPath.charAt(targetPath.length - 1) !== '/') {
					// make sure we move the files into the target dir,
					// not overwrite it
					targetPath = targetPath + '/';
				}
				self.filesClient.move(dir + fileName, targetPath + fileName)
					.done(function() {
						// if still viewing the same directory
						if (OC.joinPaths(self.getCurrentDirectory(), '/') === dir) {
							// recalculate folder size
							var oldFile = self.findFileEl(target);
							var newFile = self.findFileEl(fileName);
							var oldSize = oldFile.data('size');
							var newSize = oldSize + newFile.data('size');
							oldFile.data('size', newSize);
							oldFile.find('td.filesize').text(OC.Util.humanFileSize(newSize));

							self.remove(fileName);
						}
					})
					.fail(function(status) {
						if (status === 412) {
							// TODO: some day here we should invoke the conflict dialog
							OC.Notification.showTemporary(
								t('files', 'Could not move "{file}", target exists', {file: fileName})
							);
						} else {
							OC.Notification.showTemporary(
								t('files', 'Could not move "{file}"', {file: fileName})
							);
						}
					})
					.always(function() {
						self.showFileBusyState($tr, false);
					});
			});

		},

		/**
		 * Updates the given row with the given file info
		 *
		 * @param {Object} $tr row element
		 * @param {OCA.Files.FileInfo} fileInfo file info
		 * @param {Object} options options
		 *
		 * @return {Object} new row element
		 */
		updateRow: function($tr, fileInfo, options) {
			$tr.remove();
			options = _.extend({silent: true}, options);
			$tr = this.onAddFile(this.collection.get(fileInfo.id), this.collection, options);
			this.$fileList.trigger($.Event('fileActionsReady', {fileList: this, $files: $tr}));
			return $tr;
		},

		/**
		 * Triggers file rename input field for the given file name.
		 * If the user enters a new name, the file will be renamed.
		 *
		 * @param oldName file name of the file to rename
		 */
		rename: function(oldName) {
			var self = this;
			var tr, td, input, form;
			tr = this.findFileEl(oldName);
			var model = this.collection.findWhere({name: oldName});
			tr.data('renaming',true);
			td = tr.children('td.filename');
			input = $('<input type="text" class="filename"/>').val(oldName);
			form = $('<form></form>');
			form.append(input);
			td.children('a.name').hide();
			td.append(form);
			input.focus();
			//preselect input
			var len = input.val().lastIndexOf('.');
			if ( len === -1 ||
				tr.data('type') === 'dir' ) {
				len = input.val().length;
			}
			input.selectRange(0, len);
			var checkInput = function () {
				var filename = input.val();
				if (filename !== oldName) {
					// Files.isFileNameValid(filename) throws an exception itself
					OCA.Files.Files.isFileNameValid(filename);
					if (self.inList(filename)) {
						throw t('files', '{newName} already exists', {newName: filename});
					}
				}
				return true;
			};

			function restore() {
				input.tooltip('hide');
				tr.data('renaming',false);
				form.remove();
				td.children('a.name').show();
			}

			// TODO: too many nested blocks, move parts into functions
			form.submit(function(event) {
				event.stopPropagation();
				event.preventDefault();
				if (input.hasClass('error')) {
					return;
				}

				try {
					var newName = input.val();
					input.tooltip('hide');
					form.remove();

					if (newName !== oldName) {
						checkInput();
						// mark as loading (temp element)
						model.setBusy(true);
						var basename = newName;
						var path = model.get('path');
						td.children('a.name').show();
						self.filesClient.move(OC.joinPaths(path, oldName), OC.joinPaths(path, newName))
							.done(function() {
								// set new name, this will implicitly trigger a re-render of the row
								// TODO: in the future the model will do the server request
								model.rename(newName);
							})
							.fail(function(status) {
								// TODO: 409 means current folder does not exist, redirect ?
								if (status === 404) {
									// source not found, so remove it from the list
									OC.Notification.showTemporary(
										t(
											'files',
											'Could not rename "{fileName}", it does not exist any more',
											{fileName: oldName}
										)
									);
									self.collection.remove(model);
									return;
								} else if (status === 412) {
									// target exists
									OC.Notification.showTemporary(
										t(
											'files',
											'The name "{targetName}" is already used in the folder "{dir}". Please choose a different name.',
											{
												targetName: newName,
												dir: self.getCurrentDirectory()
											}
										)
									);
								} else {
									// restore the item to its previous state
									OC.Notification.showTemporary(
										t('files', 'Could not rename "{fileName}"', {fileName: oldName})
									);
								}
							});
					}
				} catch (error) {
					input.attr('title', error);
					input.tooltip({placement: 'right', trigger: 'manual'});
					input.tooltip('show');
					input.addClass('error');
				}
				return false;
			});
			input.keyup(function(event) {
				// verify filename on typing
				try {
					checkInput();
					input.tooltip('hide');
					input.removeClass('error');
				} catch (error) {
					input.attr('title', error);
					input.tooltip({placement: 'right', trigger: 'manual'});
					input.tooltip('show');
					input.addClass('error');
				}
				if (event.keyCode === 27) {
					restore();
				}
			});
			input.click(function(event) {
				event.stopPropagation();
				event.preventDefault();
			});
			input.blur(function() {
				form.trigger('submit');
			});
		},

		/**
		 * Create an empty file inside the current directory.
		 *
		 * @param {string} name name of the file
		 *
		 * @return {Promise} promise that will be resolved after the
		 * file was created
		 *
		 * @since 8.2
		 */
		createFile: function(name) {
			var self = this;
			var deferred = $.Deferred();
			var promise = deferred.promise();

			OCA.Files.Files.isFileNameValid(name);

			if (this.lastAction) {
				this.lastAction();
			}

			name = this.getUniqueName(name);
			var targetPath = this.getCurrentDirectory() + '/' + name;

			self.filesClient.putFileContents(
					targetPath,
					'',
					{
						contentType: 'text/plain',
						overwrite: true
					}
				)
				.done(function() {
					// TODO: error handling / conflicts
					self.addAndFetchFileInfo(targetPath, '', {scrollTo: true}).then(function(status, data) {
						deferred.resolve(status, data);
					}, function() {
						OC.Notification.showTemporary(t('files', 'Could not create file "{file}"', {file: name}));
					});
				})
				.fail(function(status) {
					if (status === 412) {
						OC.Notification.showTemporary(
							t('files', 'Could not create file "{file}" because it already exists', {file: name})
						);
					} else {
						OC.Notification.showTemporary(t('files', 'Could not create file "{file}"', {file: name}));
					}
					deferred.reject(status);
				});

			return promise;
		},

		/**
		 * Create a directory inside the current directory.
		 *
		 * @param {string} name name of the directory
		 *
		 * @return {Promise} promise that will be resolved after the
		 * directory was created
		 *
		 * @since 8.2
		 */
		createDirectory: function(name) {
			var self = this;
			var deferred = $.Deferred();
			var promise = deferred.promise();

			OCA.Files.Files.isFileNameValid(name);

			if (this.lastAction) {
				this.lastAction();
			}

			name = this.getUniqueName(name);
			var targetPath = this.getCurrentDirectory() + '/' + name;

			this.filesClient.createDirectory(targetPath)
				.done(function() {
					self.addAndFetchFileInfo(targetPath, '', {scrollTo:true}).then(function(status, data) {
						deferred.resolve(status, data);
					}, function() {
						OC.Notification.showTemporary(t('files', 'Could not create folder "{dir}"', {dir: name}));
					});
				})
				.fail(function(createStatus) {
					// method not allowed, folder might exist already
					if (createStatus === 405) {
						// add it to the list, for completeness
						self.addAndFetchFileInfo(targetPath, '', {scrollTo:true})
							.done(function(status, data) {
								OC.Notification.showTemporary(
									t('files', 'Could not create folder "{dir}" because it already exists', {dir: name})
								);
								// still consider a failure
								deferred.reject(createStatus, data);
							})
							.fail(function() {
								OC.Notification.showTemporary(
									t('files', 'Could not create folder "{dir}"', {dir: name})
								);
								deferred.reject(status);
							});
					} else {
						OC.Notification.showTemporary(t('files', 'Could not create folder "{dir}"', {dir: name}));
						deferred.reject(createStatus);
					}
				});

			return promise;
		},

		/**
		 * Add file into the list by fetching its information from the server first.
		 *
		 * If the given directory does not match the current directory, nothing will
		 * be fetched.
		 *
		 * @param {String} fileName file name
		 * @param {String} [dir] optional directory, defaults to the current one
		 * @param {Object} options same options as #add
		 * @return {Promise} promise that resolves with the file info, or an
		 * already resolved Promise if no info was fetched. The promise rejects
		 * if the file was not found or an error occurred.
		 *
		 * @since 9.0
		 */
		addAndFetchFileInfo: function(fileName, dir, options) {
			var self = this;
			var deferred = $.Deferred();
			if (_.isUndefined(dir)) {
				dir = this.getCurrentDirectory();
			} else {
				dir = dir || '/';
			}

			var targetPath = OC.joinPaths(dir, fileName);

			if ((OC.dirname(targetPath) || '/') !== this.getCurrentDirectory()) {
				// no need to fetch information
				deferred.resolve();
				return deferred.promise();
			}

			var addOptions = _.extend({
				animate: true,
				scrollTo: false
			}, options || {});

			this.filesClient.getFileInfo(targetPath, {
					properties: this._getWebdavProperties()
				})
				.then(function(status, data) {
					// remove first to avoid duplicates
					self.remove(data.name);
					self.add(data, addOptions);
					deferred.resolve(status, data);
				})
				.fail(function(status) {
					OC.Notification.showTemporary(t('files', 'Could not create file "{file}"', {file: name}));
					deferred.reject(status);
				});

			return deferred.promise();
		},

		/**
		 * Returns whether the given file name exists in the list
		 *
		 * @param {string} file file name
		 *
		 * @return {bool} true if the file exists in the list, false otherwise
		 *
		 * @deprecated search the file name on the collection instead
		 */
		inList:function(file) {
			return this.findFile(file);
		},

		/**
		 * Event handler whenever a file's "busy" event was called
		 */
		_onFileBusy: function(model, options) {
			this.showFileBusyState(model.get('name'), !!options.busy);
		},

		/**
		 * Shows busy state on a given file row or multiple
		 *
		 * @param {string|Array.<string>} files file name or array of file names
		 * @param {bool} [busy=true] busy state, true for busy, false to remove busy state
		 *
		 * @since 8.2
		 *
		 * @deprecated call model.setBusy() instead
		 */
		showFileBusyState: function(files, state) {
			var self = this;
			if (!_.isArray(files) && !files.is) {
				files = [files];
			}

			if (_.isUndefined(state)) {
				state = true;
			}

			_.each(files, function(fileName) {
				// jquery element already ?
				var $tr;
				if (_.isString(fileName)) {
					$tr = self.findFileEl(fileName);
				} else {
					$tr = $(fileName);
				}

				var $thumbEl = $tr.find('.thumbnail');
				$tr.toggleClass('busy', state);

				if (state) {
					$thumbEl.attr('data-oldimage', $thumbEl.css('background-image'));
					$thumbEl.css('background-image', 'url('+ OC.imagePath('core', 'loading.gif') + ')');
				} else {
					$thumbEl.css('background-image', $thumbEl.attr('data-oldimage'));
					$thumbEl.removeAttr('data-oldimage');
				}
			});
		},

		/**
		 * Delete the given files from the given dir
		 * @param files file names list (without path)
		 * @param dir directory in which to delete the files, defaults to the current
		 * directory
		 */
		do_delete:function(files, dir) {
			var self = this;
			if (files && files.substr) {
				files=[files];
			}
			if (!files) {
				// delete all files in directory
				files = _.pluck(this.files, 'name');
			}
			if (files) {
				this.showFileBusyState(files, true);
			}
			// Finish any existing actions
			if (this.lastAction) {
				this.lastAction();
			}

			dir = dir || this.getCurrentDirectory();

			function removeFromList(file) {
				var fileEl = self.remove(file);
				// FIXME: not sure why we need this after the
				// element isn't even in the DOM any more
				fileEl.find('.selectCheckBox').prop('checked', false);
				fileEl.removeClass('selected');
				// FIXME: don't repeat this, do it once all files are done
				self.updateStorageStatistics();
			}

			_.each(files, function(file) {
				self.filesClient.remove(dir + '/' + file)
					.done(function() {
						removeFromList(file);
					})
					.fail(function(status) {
						if (status === 404) {
							// the file already did not exist, remove it from the list
							removeFromList(file);
						} else {
							// only reset the spinner for that one file
							OC.Notification.showTemporary(
									t('files', 'Error deleting file "{fileName}".', {fileName: file}),
									{timeout: 10}
							);
							var deleteAction = self.findFileEl(file).find('.action.delete');
							deleteAction.removeClass('icon-loading-small').addClass('icon-delete');
							self.showFileBusyState(files, false);
						}
					});
			});
		},
		/**
		 * Creates the file summary section
		 */
		_createSummary: function() {
			var $tr = $('<tr class="summary"></tr>');
			this.$el.find('tfoot').append($tr);

			return new OCA.Files.FileSummary($tr, {
				collection: this.collection,
				config: this._filesConfig
			});
		},
		updateEmptyContent: function() {
			var permissions = this.getDirectoryPermissions();
			var isCreatable = (permissions & OC.PERMISSION_CREATE) !== 0;
			this.$el.find('#emptycontent').toggleClass('hidden', !!this.collection.length);
			this.$el.find('#emptycontent .uploadmessage').toggleClass('hidden', !isCreatable || !!this.collection.length);
			this.$el.find('#filestable thead th').toggleClass('hidden', !this.collection.length);
		},
		/**
		 * Shows the loading mask.
		 *
		 * @see OCA.Files.FileList#hideMask
		 */
		showMask: function() {
			// in case one was shown before
			var $mask = this.$el.find('.mask');
			if ($mask.exists()) {
				return;
			}

			this.$table.addClass('hidden');
			this.$el.find('#emptycontent').addClass('hidden');

			$mask = $('<div class="mask transparent"></div>');

			$mask.css('background-image', 'url('+ OC.imagePath('core', 'loading.gif') + ')');
			$mask.css('background-repeat', 'no-repeat');
			this.$el.append($mask);

			$mask.removeClass('transparent');
		},
		/**
		 * Hide the loading mask.
		 * @see OCA.Files.FileList#showMask
		 */
		hideMask: function() {
			this.$el.find('.mask').remove();
			this.$table.removeClass('hidden');
		},
		scrollTo:function(file) {
			if (!_.isArray(file)) {
				file = [file];
			}
			this.highlightFiles(file, function($tr) {
				$tr.addClass('searchresult');
				$tr.one('hover', function() {
					$tr.removeClass('searchresult');
				});
			});
		},
		/**
		 * @deprecated use setFilter(filter)
		 */
		filter:function(query) {
			this.setFilter('');
		},
		/**
		 * @deprecated use setFilter('')
		 */
		unfilter:function() {
			this.setFilter('');
		},
		/**
		 * hide files matching the given filter
		 * @param filter
		 */
		setFilter:function(filter) {
			var total = 0;
			if (this._filter === filter) {
				return;
			}
			this._filter = filter;
			this.fileSummary.setFilter(filter, this.files);
			total = this.fileSummary.getTotal();
			if (!this.$el.find('.mask').exists()) {
				this.hideIrrelevantUIWhenNoFilesMatch();
			}

			var visibleCount = 0;
			filter = filter.toLowerCase();

			function filterRows(tr) {
				var $e = $(tr);
				if ($e.data('file').toString().toLowerCase().indexOf(filter) === -1) {
					$e.addClass('hidden');
				} else {
					visibleCount++;
					$e.removeClass('hidden');
				}
			}
		},
		hideIrrelevantUIWhenNoFilesMatch:function() {
			if (this._filter && this.fileSummary.summary.totalDirs + this.fileSummary.summary.totalFiles === 0) {
				this.$el.find('#filestable thead th').addClass('hidden');
				this.$el.find('#emptycontent').addClass('hidden');
				$('#searchresults').addClass('filter-empty');
				$('#searchresults .emptycontent').addClass('emptycontent-search');
				if ( $('#searchresults').length === 0 || $('#searchresults').hasClass('hidden') ) {
					this.$el.find('.nofilterresults').removeClass('hidden').
						find('p').text(t('files', "No entries in this folder match '{filter}'", {filter:this._filter},  null, {'escape': false}));
				}
			} else {
				$('#searchresults').removeClass('filter-empty');
				$('#searchresults .emptycontent').removeClass('emptycontent-search');
				this.$el.find('#filestable thead th').toggleClass('hidden', !this.collection.length);
				if (!this.$el.find('.mask').exists()) {
					this.$el.find('#emptycontent').toggleClass('hidden', !!this.collection.length);
				}
				this.$el.find('.nofilterresults').addClass('hidden');
			}
		},
		/**
		 * get the current filter
		 * @param filter
		 */
		getFilter:function(filter) {
			return this._filter;
		},
		/**
		 * update the search object to use this filelist when filtering
		 */
		updateSearch:function() {
			if (OCA.Search.files) {
				OCA.Search.files.setFileList(this);
			}
			if (OC.Search) {
				OC.Search.clear();
			}
		},
		/**
		 * Update UI based on the current selection
		 */
		updateSelectionSummary: function() {
			var summary = this._selectionSummary.summary;
			var selection;

			var showHidden = !!this._filesConfig.get('showhidden');
			if (summary.totalFiles === 0 && summary.totalDirs === 0) {
				this.$el.find('#headerName a.name>span:first').text(t('files','Name'));
				this.$el.find('#headerSize a>span:first').text(t('files','Size'));
				this.$el.find('#modified a>span:first').text(t('files','Modified'));
				this.$el.find('table').removeClass('multiselect');
				this.$el.find('.selectedActions').addClass('hidden');
			}
			else {
				this.$el.find('.selectedActions').removeClass('hidden');
				this.$el.find('#headerSize a>span:first').text(OC.Util.humanFileSize(summary.totalSize));

				var directoryInfo = n('files', '%n folder', '%n folders', summary.totalDirs);
				var fileInfo = n('files', '%n file', '%n files', summary.totalFiles);

				if (summary.totalDirs > 0 && summary.totalFiles > 0) {
					var selectionVars = {
						dirs: directoryInfo,
						files: fileInfo
					};
					selection = t('files', '{dirs} and {files}', selectionVars);
				} else if (summary.totalDirs > 0) {
					selection = directoryInfo;
				} else {
					selection = fileInfo;
				}

				if (!showHidden && summary.totalHidden > 0) {
					var hiddenInfo = n('files', 'including %n hidden', 'including %n hidden', summary.totalHidden);
					selection += ' (' + hiddenInfo + ')';
				}

				this.$el.find('#headerName a.name>span:first').text(selection);
				this.$el.find('#modified a>span:first').text('');
				this.$el.find('table').addClass('multiselect');
				this.$el.find('.delete-selected').toggleClass('hidden', !this.isSelectedDeletable());
			}
		},

		/**
		 * Check whether all selected files are deletable
		 */
		isSelectedDeletable: function() {
			return _.reduce(this.getSelectedFiles(), function(deletable, file) {
				return deletable && (file.permissions & OC.PERMISSION_DELETE);
			}, true);
		},

		/**
		 * Returns whether all files are selected
		 * @return true if all files are selected, false otherwise
		 */
		isAllSelected: function() {
			return this._selectedCollection.length === this.collection.length;
		},

		/**
		 * Returns the file info of the selected files
		 *
		 * @return array of file names
		 */
		getSelectedFiles: function() {
			return this._selectedCollection.toJSON();
		},

		getUniqueName: function(name) {
			if (this.findFileEl(name).exists()) {
				var numMatch;
				var parts=name.split('.');
				var extension = "";
				if (parts.length > 1) {
					extension=parts.pop();
				}
				var base=parts.join('.');
				numMatch=base.match(/\((\d+)\)/);
				var num=2;
				if (numMatch && numMatch.length>0) {
					num=parseInt(numMatch[numMatch.length-1], 10)+1;
					base=base.split('(');
					base.pop();
					base=$.trim(base.join('('));
				}
				name=base+' ('+num+')';
				if (extension) {
					name = name+'.'+extension;
				}
				// FIXME: ugly recursion
				return this.getUniqueName(name);
			}
			return name;
		},

		/**
		 * Shows a "permission denied" notification
		 */
		_showPermissionDeniedNotification: function() {
			var message = t('core', 'You don’t have permission to upload or create files here');
			OC.Notification.showTemporary(message);
		},

		/**
		 * Setup file upload events related to the file-upload plugin
		 *
		 * @param {OC.Uploader} uploader
		 */
		setupUploadEvents: function(uploader) {
			var self = this;

			self._uploads = {};

			// detect the progress bar resize
			uploader.on('resized', this._onResize);

			uploader.on('drop', function(e, data) {
				self._uploader.log('filelist handle fileuploaddrop', e, data);

				if (self.$el.hasClass('hidden')) {
					// do not upload to invisible lists
					return false;
				}

				var dropTarget = $(e.originalEvent.target);
				// check if dropped inside this container and not another one
				if (dropTarget.length
					&& !self.$el.is(dropTarget) // dropped on list directly
					&& !self.$el.has(dropTarget).length // dropped inside list
					&& !dropTarget.is(self.$container) // dropped on main container
					) {
					return false;
				}

				// find the closest tr or crumb to use as target
				dropTarget = dropTarget.closest('tr, .crumb');

				// if dropping on tr or crumb, drag&drop upload to folder
				if (dropTarget && (dropTarget.data('type') === 'dir' ||
					dropTarget.hasClass('crumb'))) {

					// remember as context
					data.context = dropTarget;

					// if permissions are specified, only allow if create permission is there
					var permissions = dropTarget.data('permissions');
					if (!_.isUndefined(permissions) && (permissions & OC.PERMISSION_CREATE) === 0) {
						self._showPermissionDeniedNotification();
						return false;
					}
					var dir = dropTarget.data('file');
					// if from file list, need to prepend parent dir
					if (dir) {
						var parentDir = self.getCurrentDirectory();
						if (parentDir[parentDir.length - 1] !== '/') {
							parentDir += '/';
						}
						dir = parentDir + dir;
					}
					else{
						// read full path from crumb
						dir = dropTarget.data('dir') || '/';
					}

					// add target dir
					data.targetDir = dir;
				} else {
					// cancel uploads to current dir if no permission
					var isCreatable = (self.getDirectoryPermissions() & OC.PERMISSION_CREATE) !== 0;
					if (!isCreatable) {
						self._showPermissionDeniedNotification();
						return false;
					}

					// we are dropping somewhere inside the file list, which will
					// upload the file to the current directory
					data.targetDir = self.getCurrentDirectory();
				}
			});
			uploader.on('add', function(e, data) {
				self._uploader.log('filelist handle fileuploadadd', e, data);

				// add ui visualization to existing folder
				if (data.context && data.context.data('type') === 'dir') {
					// add to existing folder

					// update upload counter ui
					var uploadText = data.context.find('.uploadtext');
					var currentUploads = parseInt(uploadText.attr('currentUploads'), 10);
					currentUploads += 1;
					uploadText.attr('currentUploads', currentUploads);

					var translatedText = n('files', 'Uploading %n file', 'Uploading %n files', currentUploads);
					if (currentUploads === 1) {
						self.showFileBusyState(uploadText.closest('tr'), true);
						uploadText.text(translatedText);
						uploadText.show();
					} else {
						uploadText.text(translatedText);
					}
				}

				if (!data.targetDir) {
					data.targetDir = self.getCurrentDirectory();
				}

			});
			/*
			 * when file upload done successfully add row to filelist
			 * update counter when uploading to sub folder
			 */
			uploader.on('done', function(e, upload) {
				self._uploader.log('filelist handle fileuploaddone', e, data);

				var data = upload.data;
				var status = data.jqXHR.status;
				if (status < 200 || status >= 300) {
					// error was handled in OC.Uploads already
					return;
				}

				var fileName = upload.getFileName();
				var fetchInfoPromise = self.addAndFetchFileInfo(fileName, upload.getFullPath());
				if (!self._uploads) {
					self._uploads = {};
				}
				if (OC.isSamePath(OC.dirname(upload.getFullPath() + '/'), self.getCurrentDirectory())) {
					self._uploads[fileName] = fetchInfoPromise;
				}

				var uploadText = self.$fileList.find('tr .uploadtext');
				self.showFileBusyState(uploadText.closest('tr'), false);
				uploadText.fadeOut();
				uploadText.attr('currentUploads', 0);
			});
			uploader.on('createdfolder', function(fullPath) {
				self.addAndFetchFileInfo(OC.basename(fullPath), OC.dirname(fullPath));
			});
			uploader.on('stop', function() {
				self._uploader.log('filelist handle fileuploadstop');

				// prepare list of uploaded file names in the current directory
				// and discard the other ones
				var promises = _.values(self._uploads);
				var fileNames = _.keys(self._uploads);
				self._uploads = [];

				// as soon as all info is fetched
				$.when.apply($, promises).then(function() {
					// highlight uploaded files
					self.highlightFiles(fileNames);
					self.updateStorageStatistics();
				});

				var uploadText = self.$fileList.find('tr .uploadtext');
				self.showFileBusyState(uploadText.closest('tr'), false);
				uploadText.fadeOut();
				uploadText.attr('currentUploads', 0);
			});
			uploader.on('fail', function(e, data) {
				self._uploader.log('filelist handle fileuploadfail', e, data);
				
				self._uploads = [];

				//if user pressed cancel hide upload chrome
				//cleanup uploading to a dir
				var uploadText = self.$fileList.find('tr .uploadtext');
				self.showFileBusyState(uploadText.closest('tr'), false);
				uploadText.fadeOut();
				uploadText.attr('currentUploads', 0);
				self.updateStorageStatistics();
			});

		},

		/**
		 * Scroll to the last file of the given list
		 * Highlight the list of files
		 * @param files array of filenames,
		 * @param {Function} [highlightFunction] optional function
		 * to be called after the scrolling is finished
		 */
		highlightFiles: function(files, highlightFunction) {
			// Detection of the uploaded element
			var filename = files[files.length - 1];
			var $fileRow = this.findFileEl(filename);

			if (!$fileRow.exists()) { // Element not present in the file list
				return;
			}

			var currentOffset = this.$container.scrollTop();
			var additionalOffset = this.$el.find("#controls").height()+this.$el.find("#controls").offset().top;

			// Animation
			var _this = this;
			var $scrollContainer = this.$container;
			if ($scrollContainer[0] === window) {
				// need to use "body" to animate scrolling
				// when the scroll container is the window
				$scrollContainer = $('body');
			}
			$scrollContainer.animate({
				// Scrolling to the top of the new element
				scrollTop: currentOffset + $fileRow.offset().top - $fileRow.height() * 2 - additionalOffset
			}, {
				duration: 500,
				complete: function() {
					// Highlighting function
					var highlightRow = highlightFunction;

					if (!highlightRow) {
						highlightRow = function($fileRow) {
							$fileRow.addClass("highlightUploaded");
							setTimeout(function() {
								$fileRow.removeClass("highlightUploaded");
							}, 2500);
						};
					}

					// Loop over uploaded files
					for(var i=0; i<files.length; i++) {
						var $fileRow = _this.findFileEl(files[i]);

						if($fileRow.length !== 0) { // Checking element existence
							highlightRow($fileRow);
						}
					}

				}
			});
		},

		_renderNewButton: function() {
			// if an upload button (legacy) already exists or no actions container exist, skip
			var $actionsContainer = this.$el.find('#controls .actions');
			if (!$actionsContainer.length || this.$el.find('.button.upload').length) {
				return;
			}
			if (!this._addButtonTemplate) {
				this._addButtonTemplate = Handlebars.compile(TEMPLATE_ADDBUTTON);
			}
			var $newButton = $(this._addButtonTemplate({
				addText: t('files', 'New'),
				iconClass: 'icon-add'
			}));

			$actionsContainer.prepend($newButton);
			$newButton.tooltip({'placement': 'bottom'});

			$newButton.click(_.bind(this._onClickNewButton, this));
			this._newButton = $newButton;
		},

		_onClickNewButton: function(event) {
			var $target = $(event.target);
			if (!$target.hasClass('.button')) {
				$target = $target.closest('.button');
			}
			this._newButton.tooltip('hide');
			event.preventDefault();
			if ($target.hasClass('disabled')) {
				return false;
			}
			if (!this._newFileMenu) {
				this._newFileMenu = new OCA.Files.NewFileMenu({
					fileList: this
				});
				$('body').append(this._newFileMenu.$el);
			}
			this._newFileMenu.showAt($target);

			return false;
		},

		/**
		 * Register a tab view to be added to all views
		 */
		registerTabView: function(tabView) {
			if (this._detailsView) {
				this._detailsView.addTabView(tabView);
			}
		},

		/**
		 * Register a detail view to be added to all views
		 */
		registerDetailView: function(detailView) {
			if (this._detailsView) {
				this._detailsView.addDetailView(detailView);
			}
		}
	};

	/**
	 * File info attributes.
	 *
	 * @typedef {Object} OC.Files.FileInfo
	 *
	 * @lends OC.Files.FileInfo
	 *
	 * @deprecated use OC.Files.FileInfo instead
	 *
	 */
	OCA.Files.FileInfo = OC.Files.FileInfo;

	OCA.Files.FileList = FileList;
})();

$(document).ready(function() {
	// FIXME: unused ?
	OCA.Files.FileList.useUndo = (window.onbeforeunload)?true:false;
	$(window).bind('beforeunload', function () {
		if (OCA.Files.FileList.lastAction) {
			OCA.Files.FileList.lastAction();
		}
	});
	$(window).on('unload', function () {
		$(window).trigger('beforeunload');
	});

});
