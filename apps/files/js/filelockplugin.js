/*
 * Copyright (c) 2018 Thomas Müller <thomas.mueller@tmit.eu>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function(OCA) {

	var TEMPLATE_LOCK_STATUS_ACTION =
		'<a class="action action-comment permanent" title="{{message}}" href="#">' +
		'<span class="icon icon-lock-open" />' +
		'</a>';

	OCA.Files = OCA.Files || {};

	/**
	 * @namespace OCA.Files.LockPlugin
	 */
	OCA.Files.LockPlugin = {

		/**
		 * @param fileList
		 */
		attach: function(fileList) {
			this._extendFileActions(fileList);

			var oldCreateRow = fileList._createRow;
			fileList._createRow = function(fileData) {
				var $tr = oldCreateRow.apply(this, arguments);
				if (fileData.activeLocks) {
					$tr.attr('data-activeLocks', JSON.stringify(fileData.activeLocks));
				}
				return $tr;
			};
			var oldElementToFile = fileList.elementToFile;
			fileList.elementToFile = function($el) {
				var fileInfo = oldElementToFile.apply(this, arguments);
				var activeLocks = $el.attr('data-activelocks');
				if (_.isUndefined(activeLocks)) {
					activeLocks = '[]';
				}
				fileInfo.activeLocks = JSON.parse(activeLocks);
				return fileInfo;
			};

			var oldGetWebdavProperties = fileList._getWebdavProperties;
			fileList._getWebdavProperties = function() {
				var props = oldGetWebdavProperties.apply(this, arguments);
				props.push('{DAV:}lockdiscovery');
				return props;
			};

			var lockTab = new OCA.Files.LockTabView('lockTabView', {order: -20});
			fileList.registerTabView(lockTab);

			fileList.filesClient.addFileInfoParser(function(response) {
				var data = {};
				var props = response.propStat[0].properties;
				var activeLocks = props['{DAV:}lockdiscovery'];
				if (!_.isUndefined(activeLocks) && activeLocks !== '') {
					data.activeLocks = _.chain(activeLocks).filter(function(xmlvalue) {
						return (xmlvalue.namespaceURI === OC.Files.Client.NS_DAV && xmlvalue.nodeName.split(':')[1] === 'activelock');
					}).map(function(xmlvalue) {
						return {
							lockscope: xmlvalue.getElementsByTagName('d:lockscope')[0].children[0].localName,
							locktype: xmlvalue.getElementsByTagName('d:locktype')[0].children[0].localName,
							lockroot: xmlvalue.getElementsByTagName('d:lockroot')[0].children[0].innerHTML,
							depth: parseInt(xmlvalue.getElementsByTagName('d:depth')[0].innerHTML, 10),
							timeout: xmlvalue.getElementsByTagName('d:timeout')[0].innerHTML,
							locktoken: xmlvalue.getElementsByTagName('d:locktoken')[0].children[0].innerHTML,
							owner: xmlvalue.getElementsByTagName('d:owner')[0].innerHTML
						};
					}).value();

				}
				return data;
			});


		},

		/**
		 * @param fileList
		 * @private
		 */
		_extendFileActions: function(fileList) {
			var self = this;
			fileList.fileActions.registerAction({
				name: 'lock-status',
				displayName: t('files', 'Lock status'),
				mime: 'all',
				permissions: OC.PERMISSION_READ,
				type: OCA.Files.FileActions.TYPE_INLINE,
				render: function(actionSpec, isDefault, context) {
					var $file = context.$file;
					var isLocked = $file.data('activelocks');
					if (isLocked) {
						var $actionLink = $(self.renderLink());
						context.$file.find('a.name>span.fileactions').append($actionLink);
						return $actionLink;
					}
					return '';
				},
				actionHandler: function(fileName) {
					fileList.showDetailsView(fileName, 'lockTabView');
				}
			});

		},

		renderLink: function () {
			if (!this._template) {
				this._template = Handlebars.compile(TEMPLATE_LOCK_STATUS_ACTION);
			}
			return this._template({
				message: t('files', 'This resource is locked. Click to see more details.')
		});
	}

};

})(OCA);

OC.Plugins.register('OCA.Files.FileList', OCA.Files.LockPlugin);

