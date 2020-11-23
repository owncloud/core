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

	var TEMPLATE_MENU =
		'<ul>' +
		'<li>'+ t('files', 'How do you want to open this file?')+'</li>' +
		'{{#each items}}' +
		'<li>' +
			'<a href="#" class="menuitem action action-{{nameLowerCase}} permanent" data-action="{{name}}">' +
				'{{#if icon}}<img class="icon" src="{{icon}}"/>' +
				'{{else}}'+
					'{{#if iconClass}}' +
						'<span class="icon {{iconClass}}"></span>' +
					'{{else}}' +
						'<span class="no-icon"></span>' +
					'{{/if}}' +
				'{{/if}}' +
				'<span>{{displayName}}</span>' +
		'	</a>' +
		'</li>' +
		'{{/each}}' +
		'</ul>';

	/**
	 * Construct a new FileActionsApplicationSelectMenu instance
	 * @constructs FileActionsApplicationSelectMenu
	 * @memberof OCA.Files
	 */
	var FileActionsApplicationSelectMenu = OC.Backbone.View.extend({
		tagName: 'div',
		className: 'fileActionsApplicationSelectMenu popovermenu bubble hidden open menu',

		/**
		 * Current context
		 *
		 * @type OCA.Files.FileActionContext
		 */
		_context: null,

		events: {
			'click a.action': '_onClickAction'
		},

		template: function(data) {
			if (!OCA.Files.FileActionsApplicationSelectMenu._TEMPLATE) {
				OCA.Files.FileActionsApplicationSelectMenu._TEMPLATE = Handlebars.compile(TEMPLATE_MENU);
			}
			return OCA.Files.FileActionsApplicationSelectMenu._TEMPLATE(data);
		},

		/**
		 * Event handler whenever an action has been clicked within the App Drawer
		 *
		 * @param {Object} event event object
		 */
		_onClickAction: function(event) {
			var $target = $(event.target);
			if (!$target.is('a')) {
				$target = $target.closest('a');
			}
			var fileActions = this._context.fileActions;
			var actionName = $target.attr('data-action');
			var actions = fileActions.getActions(
				fileActions.getCurrentMimeType(),
				fileActions.getCurrentType(),
				fileActions.getCurrentPermissions()
			);
			var actionSpec = actions[actionName];
			var fileName = this._context.$file.attr('data-file');

			event.stopPropagation();
			event.preventDefault();

			OC.hideMenus();

			actionSpec.action(
				fileName,
				this._context
			);
		},

		render: function() {
			var fileActions = this._context.fileActions;
			var actions = fileActions.getActionsWithoutAll(
				fileActions.getCurrentMimeType(),
				fileActions.getCurrentType(),
				fileActions.getCurrentPermissions()
			);

			var items = [];

			Object.keys(actions).forEach(function (actionKey) {
				items.push(actions[actionKey]);
			});

			this.$el.html(this.template({
				items: items
			}));
		},

		/**
		 * Displays the App Drawer menu.
		 *
		 * @param {OCA.Files.FileActionContext} context context
		 * @param {jQuery} target target element to append menu
		 */
		show: function(context, target) {
			this._context = context;

			target.append(this.$el);
			this.$el.on('afterHide', function() {
				this.remove();
			});

			this.render();
			this.$el.removeClass('hidden');
			OC.Util.scrollIntoView(this.$el, null);
			OC.showMenu(null, this.$el);
		}
	});

	OCA.Files.FileActionsApplicationSelectMenu = FileActionsApplicationSelectMenu;

})();

