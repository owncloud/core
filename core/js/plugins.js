/**
 * @author Clark Tomlinson  <clark@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 */
/**
 * Plugin
 *
 * @todo make this a real class in the future
 * @typedef {Object} OC.Plugin
 *
 * @property {String} name plugin name
 * @property {Function} attach function that will be called when the
 * plugin is attached
 * @property {Function} [detach] function that will be called when the
 * plugin is detached
 *
 * @namespace OC.Plugins
 */
OC.Plugins = {
	/**
	 * @type Array.<OC.Plugin>
	 */
	_plugins: {},

	/**
	 * Register plugin
	 *
	 * @param {String} targetName app name / class name to hook into
	 * @param {OC.Plugin} plugin
	 */
	register: function (targetName, plugin) {
		var plugins = this._plugins[targetName];
		if (!plugins) {
			plugins = this._plugins[targetName] = [];
		}
		plugins.push(plugin);
	},

	/**
	 * Returns all plugin registered to the given target
	 * name / app name / class name.
	 *
	 * @param {String} targetName app name / class name to hook into
	 * @return {Array.<OC.Plugin>} array of plugins
	 */
	getPlugins: function (targetName) {
		return this._plugins[targetName] || [];
	},

	/**
	 * Call attach() on all plugins registered to the given target name.
	 *
	 * @param {String} targetName app name / class name
	 * @param {Object} object to be extended
	 * @param {Object} [options] options
	 */
	attach: function (targetName, targetObject, options) {
		var plugins = this.getPlugins(targetName);
		for (var i = 0; i < plugins.length; i++) {
			if (plugins[i].attach) {
				plugins[i].attach(targetObject, options);
			}
		}
	},

	/**
	 * Call detach() on all plugins registered to the given target name.
	 *
	 * @param {String} targetName app name / class name
	 * @param {Object} object to be extended
	 * @param {Object} [options] options
	 */
	detach: function (targetName, targetObject, options) {
		var plugins = this.getPlugins(targetName);
		for (var i = 0; i < plugins.length; i++) {
			if (plugins[i].detach) {
				plugins[i].detach(targetObject, options);
			}
		}
	},

};
