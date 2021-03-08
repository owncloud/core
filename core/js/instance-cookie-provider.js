/**
 * @author Jan Ackermann <jackermann@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */


/**
 * Namespace to hold functions related to convert mimetype to icons
 *
 * @namespace
 */
OC.InstanceCookieProvider = {
	instances: [],
	cookieName: 'seenInstances',


	init: function (){
		this._loadInstancesFromCookie();
		this._updateCookie();
	},

	_loadInstancesFromCookie: function (){
		var cookieData = this._getCookieByName(this.cookieName);

		if(!cookieData){
			return;
		}

		this.instances = JSON.parse(cookieData);
	},

	_getCookieByName: function (name) {
		var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
		if (match){
			return match[2];
		}
		return null;
	},

	_updateCookie: function() {
		var currentInstance = window.location.protocol + '//' + window.location.host;

		if(this.instances.includes(currentInstance)){
			return;
		}

		this.instances.push(currentInstance);

		var myDate = new Date();
		myDate.setMonth(myDate.getMonth() + 12);

		document.cookie = this.cookieName +"=" + JSON.stringify(this.instances) + ";expires=" + myDate
			+ ";domain=."+window.location.host.match(/[^\.]*\.[^.]*$/)[0]+";path=/";
	},

	getInstances: function (excludeCurrentInstance){
		if(excludeCurrentInstance !== true){
			return this.instances;
		}

		var filteredInstances = [];
		var currentInstance = window.location.protocol + '//' + window.location.host;

		for(var i = 0; i < this.instances.length; i++){
			if(this.instances[i] !== currentInstance){
				filteredInstances.push(this.instances[i]);
			}
		}

		return filteredInstances;
	},
};

$(document).ready(function() {
	OC.InstanceCookieProvider.init();
});



