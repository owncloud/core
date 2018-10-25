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
	var NS_DAV = OC.Files.Client.NS_DAV;

	var TEMPLATE_LOCK_STATUS_ACTION =
		'<a class="action action-lock-status permanent" title="{{message}}" href="#">' +
		'<span class="icon icon-lock-open" />' +
		'</a>';

	/**
	 * Parses an XML lock node
	 *
	 * @param {Node} xmlvalue node to parse
	 * @return {Object} parsed values in associative array
	 */
	function parseLockNode(xmlvalue) {
		return {
			lockscope: getChildNodeLocalName(xmlvalue.getElementsByTagNameNS(NS_DAV, 'lockscope')[0]),
			locktype: getChildNodeLocalName(xmlvalue.getElementsByTagNameNS(NS_DAV, 'locktype')[0]),
			lockroot: getHrefNodeContents(xmlvalue.getElementsByTagNameNS(NS_DAV, 'lockroot')[0]),
			// string, as it can also be "infinite"
			depth: xmlvalue.getElementsByTagNameNS(NS_DAV, 'depth')[0].textContent,
			timeout: xmlvalue.getElementsByTagNameNS(NS_DAV, 'timeout')[0].textContent,
			locktoken: getHrefNodeContents(xmlvalue.getElementsByTagNameNS(NS_DAV, 'locktoken')[0]),
			owner: xmlvalue.getElementsByTagNameNS(NS_DAV, 'owner')[0].textContent
		};
	}

	function getHrefNodeContents(node) {
		var nodes = node.getElementsByTagNameNS(NS_DAV, 'href');
		if (!nodes.length) {
			return null;
		}
		return nodes[0].textContent;
	}

	/**
	 * Filter out text nodes from a list of XML nodes
	 *
	 * @param {Array.<Node>} nodes nodes to filter
	 * @return {Array.<Node>} filtered array of nodes
	 */
	function getChildNodeLocalName(node) {
		for (var i = 0; i < node.childNodes.length; i++) {
			// skip pure text nodes
			if (node.childNodes[i].nodeType === 1) {
				return node.childNodes[i].localName;
			}
		}
		return null;
	}

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
						return (xmlvalue.namespaceURI === NS_DAV && xmlvalue.nodeName.split(':')[1] === 'activelock');
					}).map(function(xmlvalue) {
						return parseLockNode(xmlvalue);
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

