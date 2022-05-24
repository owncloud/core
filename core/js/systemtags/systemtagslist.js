/*
 * Copyright (c) 2015
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* global Handlebars */

(function (OC) {
	var TEMPLATE =
		' {{#each data}}\n' +
		'    <span class="system-tag-list-item">{{name}}</span>\n' +
		'  {{/each}}';

	/**
	 * @class OC.SystemTags.SystemTagsList
	 * @classdesc
	 *
	 * Displays a file's system tags
	 *
	 */
	var SystemTagsList = OC.Backbone.View.extend(
		/** @lends OC.SystemTags.SystemTagsList.prototype */ {

			events: {
				'click .system-tag-list-item': '_onClickEdit',
			},

			_rendered: false,

			_newTag: null,

			className: 'system-tag-list',

			data: [],

			template: function (data) {
				if (!this._template) {
					this._template = Handlebars.compile(TEMPLATE);
				}
				return this._template(data);
			},


			initialize: function (options) {
				options = options || {};

				if (_.isFunction(options.initSelection)) {
					this._initSelection = options.initSelection;
				}

				this.collection = options.collection || OC.SystemTags.collection;
			},


			/**
			 * Renders this details view
			 */
			render: function () {
				var self = this;

				this.$el.html(this.template({
					data: self.data,
				}));

				this.delegateEvents();
			},

			setData: function (data) {
				this.data = data;
			}
		});

	OC.SystemTags = OC.SystemTags || {};
	OC.SystemTags.SystemTagsList = SystemTagsList;

})(OC);

