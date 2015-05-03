/**
 * Copyright (c) 2014 Vincent Petry <pvince81@owncloud.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/**
 * L10N namespace with localization functions.
 *
 * @namespace
 */
OC.L10N = {
	/**
	 * String bundles with app name as key.
	 * @type {Object.<String,String>}
	 */
	_bundles: {},

	/**
	 * Plural function
	 * @type func
	 */
	_pluralFunction: '',

	/**
	 * Load an app's translation bundle if not loaded already.
	 *
	 * @param {String} appName name of the app
	 * @param {Function} callback callback to be called when
	 * the translations are loaded
	 * @return {Promise} promise
	 */
	load: function(appName, callback) {
		// already available ?
		if (this._bundles[appName] || OC.getLocale() === 'en') {
			var deferred = $.Deferred();
			var promise = deferred.promise();
			promise.then(callback);
			deferred.resolve();
			return promise;
		}

		var self = this;
		var url = OC.filePath(appName, 'l10n', OC.getLocale() + '.json');

		// load JSON translation bundle per AJAX
		return $.get(url)
			.then(
				function(result) {
					if (result.translations) {
						self.register(appName, result.translations, result.pluralForm);
					}
				})
			.then(callback);
	},

	/**
	 * Register an app's translation bundle.
	 *
	 * @param {String} appName name of the app
	 * @param {Object<String,String>} bundle
	 * @param {Function} [pluralForm] optional plural function or plural string
	 */
	register: function(appName, bundle, pluralForm) {
		this._bundles[appName] = bundle || {};

		if (_.isFunction(pluralForm)) {
			this._pluralFunction = pluralForm;
		}
	},

	/**
	 * Translate a string
	 * @param {string} app the id of the app for which to translate the string
	 * @param {string} text the string to translate
	 * @param [vars] map of placeholder key to value
	 * @param {number} [count] number to replace %n with
	 * @param {array} [options] options array
	 * @param {bool} [options.escape=true] enable/disable auto escape of placeholders (by default enabled)
	 * @return {string}
	 */
	translate: function(app, text, vars, count, options) {
		var defaultOptions = {
				escape: true
			},
			allOptions = options || {};
		_.defaults(allOptions, defaultOptions);

		// TODO: cache this function to avoid inline recreation
		// of the same function over and over again in case
		// translate() is used in a loop
		var _build = function (text, vars, count) {
			return text.replace(/%n/g, count).replace(/{([^{}]*)}/g,
				function (a, b) {
					var r = vars[b];
					if(typeof r === 'string' || typeof r === 'number') {
						if(allOptions.escape) {
							return escapeHTML(r);
						} else {
							return r;
						}
					} else {
						return a;
					}
				}
			);
		};
		var translation = text;
		var bundle = this._bundles[app] || {};
		var value = bundle[text];
		if( typeof(value) !== 'undefined' ){
			translation = value;
		}

		if(typeof vars === 'object' || count !== undefined ) {
			return _build(translation, vars, count);
		} else {
			return translation;
		}
	},

	/**
	 * Translate a plural string
	 * @param {string} app the id of the app for which to translate the string
	 * @param {string} textSingular the string to translate for exactly one object
	 * @param {string} textPlural the string to translate for n objects
	 * @param {number} count number to determine whether to use singular or plural
	 * @param [vars] map of placeholder key to value
	 * @param {array} [options] options array
	 * @param {bool} [options.escape=true] enable/disable auto escape of placeholders (by default enabled)
	 * @return {string} Translated string
	 */
	translatePlural: function(app, textSingular, textPlural, count, vars, options) {
		var identifier = '_' + textSingular + '_::_' + textPlural + '_';
		var bundle = this._bundles[app] || {};
		var value = bundle[identifier];
		if( typeof(value) !== 'undefined' ){
			var translation = value;
			if ($.isArray(translation)) {
				var plural = this._pluralFunction(count);
				return this.translate(app, translation[plural.plural], vars, count, options);
			}
		}

		if(count === 1) {
			return this.translate(app, textSingular, vars, count, options);
		}
		else{
			return this.translate(app, textPlural, vars, count, options);
		}
	}
};

/**
 * translate a string
 * @param {string} app the id of the app for which to translate the string
 * @param {string} text the string to translate
 * @param [vars] map of placeholder key to value
 * @param {number} [count] number to replace %n with
 * @return {string}
 */
window.t = _.bind(OC.L10N.translate, OC.L10N);

/**
 * translate a string
 * @param {string} app the id of the app for which to translate the string
 * @param {string} text_singular the string to translate for exactly one object
 * @param {string} text_plural the string to translate for n objects
 * @param {number} count number to determine whether to use singular or plural
 * @param [vars] map of placeholder key to value
 * @return {string} Translated string
 */
window.n = _.bind(OC.L10N.translatePlural, OC.L10N);

Handlebars.registerHelper('t', function(app, text) {
	return OC.L10N.translate(app, text);
});

