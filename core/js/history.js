/**
 * @author Clark Tomlinson  <clark@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 */
/**
 * Utility class for the history API,
 * includes fallback to using the URL hash when
 * the browser doesn't support the history API.
 *
 * @namespace
 */
OC.Util.History = {
	_handlers: [],

	/**
	 * Push the current URL parameters to the history stack
	 * and change the visible URL.
	 * Note: this includes a workaround for IE8/IE9 that uses
	 * the hash part instead of the search part.
	 *
	 * @param params to append to the URL, can be either a string
	 * or a map
	 */
	pushState: function(params) {
		var strParams;
		if (typeof(params) === 'string') {
			strParams = params;
		}
		else {
			strParams = OC.buildQueryString(params);
		}
		if (window.history.pushState) {
			var url = location.pathname + '?' + strParams;
			window.history.pushState(params, '', url);
		}
		// use URL hash for IE8
		else {
			window.location.hash = '?' + strParams;
			// inhibit next onhashchange that just added itself
			// to the event queue
			this._cancelPop = true;
		}
	},

	/**
	 * Add a popstate handler
	 *
	 * @param handler function
	 */
	addOnPopStateHandler: function(handler) {
		this._handlers.push(handler);
	},

	/**
	 * Parse a query string from the hash part of the URL.
	 * (workaround for IE8 / IE9)
	 */
	_parseHashQuery: function() {
		var hash = window.location.hash,
			pos = hash.indexOf('?');
		if (pos >= 0) {
			return hash.substr(pos + 1);
		}
		if (hash.length) {
			// remove hash sign
			return hash.substr(1);
		}
		return '';
	},

	_decodeQuery: function(query) {
		return query.replace(/\+/g, ' ');
	},

	/**
	 * Parse the query/search part of the URL.
	 * Also try and parse it from the URL hash (for IE8)
	 *
	 * @return map of parameters
	 */
	parseUrlQuery: function() {
		var query = this._parseHashQuery(),
			params;
		// try and parse from URL hash first
		if (query) {
			params = OC.parseQueryString(this._decodeQuery(query));
		}
		// else read from query attributes
		if (!params) {
			params = OC.parseQueryString(this._decodeQuery(location.search));
		}
		return params || {};
	},

	_onPopState: function(e) {
		if (this._cancelPop) {
			this._cancelPop = false;
			return;
		}
		var params;
		if (!this._handlers.length) {
			return;
		}
		params = (e && e.state) || this.parseUrlQuery() || {};
		for (var i = 0; i < this._handlers.length; i++) {
			this._handlers[i](params);
		}
	}
};

