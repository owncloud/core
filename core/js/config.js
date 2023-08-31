/**
 * Copyright (c) 2011, Robin Appelman <icewind1991@gmail.com>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */

/**
 * @namespace
 */
OC.AppConfig={
	url:OC.generateUrl('/settings/appconfig'),
	getValue:function(app,key,defaultValue,callback){
		if (defaultValue === undefined || defaultValue === null) {
			$.ajax({
				url: `${OC.AppConfig.url}/${app}/${key}`,
				success: callback
			});
		} else {
			$.ajax({
				url: `${OC.AppConfig.url}/${app}/${key}?default=${defaultValue}`,
				success: callback
			});
		}
	},
	setValue:function(app,key,value){
		return $.ajax({
			url: OC.AppConfig.url,
			type: 'PUT',
			data: {
				app: app,
				key: key,
				value: value
			}
		});
	},
	getApps:function(callback){
		$.ajax({
			url: OC.AppConfig.url,
			success: callback
		});
	},
	getKeys:function(app,callback){
		$.ajax({
			url: `${OC.AppConfig.url}/${app}`,
			success: callback
		});
	},
	hasKey:function(app,key,callback){
		$.ajax({
			url: `${OC.AppConfig.url}/${app}/${key}`,
			success: function(data) {
				callback(data !== null);
			}
		});
	},
	deleteKey:function(app,key){
		$.ajax({
			url: `${OC.AppConfig.url}/${app}/${key}`,
			type: 'DELETE'
		});
	},
	deleteApp:function(app){
		$.ajax({
			url: `${OC.AppConfig.url}/${app}`,
			type: 'DELETE'
		});
	}
};
//TODO OC.Preferences
