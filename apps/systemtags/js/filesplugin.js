/*
 * Copyright (c) 2015 Vincent Petry <pvince81@owncloud.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function () {
	OCA.SystemTags = _.extend({}, OCA.SystemTags);
	if (!OCA.SystemTags) {
		/**
		 * @namespace
		 */
		OCA.SystemTags = {};
	}

	/**
	 * @namespace
	 */
	OCA.SystemTags.FilesPlugin = {
		ignoreLists: [
			'files_trashbin',
			'files.public'
		],

		attach: function (fileList) {
			if (this.ignoreLists.indexOf(fileList.id) >= 0) {
				return;
			}

			var selectedTagsCollection = new OC.SystemTags.SystemTagsMappingCollection([], {objectType: 'files'});

			fileList.registerDetailView(new OCA.SystemTags.SystemTagsInfoView({
				selectedTagsCollection: selectedTagsCollection,
				onClickEdit: function () {
					fileList._detailsView.selectTab('systemTagsTabView');
				},
			}));

			fileList.registerTabView(new OCA.SystemTags.SystemTagsTabView({
				selectedTagsCollection: selectedTagsCollection,
			}));


		},

	};

})();

OC.Plugins.register('OCA.Files.FileList', OCA.SystemTags.FilesPlugin);

