/*
 * Copyright (c) 2018, ownCloud GmbH
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function (OCA) {

	function modelToSelection (model) {
		var data = model.toJSON();
		if (!OC.isUserAdmin()) {
			/**
			 * If tag cannot be assigned just lock it.
			 * Static tags need to be locked if they do not belong to the groups
			 */
			if (!data.canAssign || (isStaticTag(data) && !data.editableInGroup)) {
				data.locked = true;
			}
		}
		return data;
	}

	function isStaticTag (data) {
		return data.userEditable === false && data.userAssignable === true;
	}

	/**
	 * @class OCA.SystemTags.SystemTagsInfoView
	 * @classdesc
	 *
	 * Displays a file's system tags
	 *
	 */
	var SystemTagsInfoView = OCA.Files.DetailFileInfoView.extend(
		/** @lends OCA.SystemTags.SystemTagsInfoView.prototype */ {

			_rendered: false,

			className: 'systemTagsInfoView hidden',

			/**
			 * @type OC.SystemTags.SystemTagsInputField
			 */
			_inputView: null,


			initialize: function (options) {
				options = options || {};
				this.options = options;

				this._inputView = new OC.SystemTags.SystemTagsList();
				this._inputView._onClickEdit = this._onClickEdit.bind(this);

				this.selectedTagsCollection = this.options.selectedTagsCollection || new OC.SystemTags.SystemTagsMappingCollection([], {objectType: 'files'});

				this._inputView.collection.on('change', this._onTagRenamedGlobally, this);
				this._inputView.collection.on('remove', this._onTagDeletedGlobally, this);

				this.selectedTagsCollection.on('add', this._onSelectTag, this);
				this.selectedTagsCollection.on('remove', this._onDeselectTag, this);

			},

			/**
			 * Event handler whenever edit was clicked
			 */
			_onClickEdit: function (args) {
				if (typeof this.options.onClickEdit === 'function') {
					this.options.onClickEdit(args);
				}
			},


			/**
			 * Event handler whenever a tag was selected
			 */
			_onSelectTag: function () {
				this._inputView.setData(this.selectedTagsCollection.map(modelToSelection));
				this._inputView.render();
			},

			/**
			 * Event handler whenever a tag gets deselected.
			 * Removes the selected tag from the mapping collection.
			 *
			 */
			_onDeselectTag: function () {
				this._inputView.setData(this.selectedTagsCollection.map(modelToSelection));
				this._inputView.render();
			},

			/**
			 * Event handler whenever a tag was renamed globally.
			 *
			 * This will automatically adjust the tag mapping collection to
			 * container the new name.
			 *
			 */
			_onTagRenamedGlobally: function (changedTag) {
				// also rename it in the selection, if applicable
				var selectedTagMapping = this.selectedTagsCollection.get(changedTag.id);
				if (selectedTagMapping) {
					selectedTagMapping.set(changedTag.toJSON());
				}
				this._inputView.setData(this.selectedTagsCollection.map(modelToSelection));
				this._inputView.render();
			},

			/**
			 * Event handler whenever a tag was deleted globally.
			 *
			 * This will automatically adjust the tag mapping collection to
			 * container the new name.
			 *
			 */
			_onTagDeletedGlobally: function (tagId) {
				this.selectedTagsCollection.remove(tagId);
				this._inputView.setData(this.selectedTagsCollection.map(modelToSelection));
				this._inputView.render();
			},

			setFileInfo: function (fileInfo) {
				var self = this;

				if (fileInfo) {
					this.selectedTagsCollection.setObjectId(fileInfo.id);
					this.selectedTagsCollection.fetch({
						success: function (collection) {
							collection.fetched = true;
							self._inputView.setData(collection.map(modelToSelection));
							self.$el.removeClass('hidden');
							self.render();
						}
					});
				}

				if (!this._rendered) {
					this.render();
				}

			},

			/**
			 * Renders this details view
			 */
			render: function () {
				this.$el.append(this._inputView.$el);
				this._rendered = true;
			},

			remove: function () {
				this._inputView.remove();
			},
		});

	OCA.SystemTags.SystemTagsInfoView = SystemTagsInfoView;

})(OCA);

