var usersmanagement = angular.module('usersmanagement', ['ngResource']);

var OC = {
	filePath: function(app, folder, file) {
		return app + '/' + folder + '/' + file;
	}
};