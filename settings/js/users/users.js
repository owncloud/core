/**
 * ownCloud - Core
 *
 * @author Raghu Nayyar
 * @copyright 2013 Raghu Nayyar <raghu.nayyar.007@gmail.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

var usersmanagement = angular.module('usersmanagement', ['ngResource']);

/* Fetches the List of All Groups - Left Sidebar */

usersmanagement.controller('grouplist', ['$scope', '$http', 'GroupService',
	function($scope, $http, GroupService) {
		$http.get(OC.filePath('settings', 'ajax', 'grouplist.php')).then(function(response){
			$scope.groupnames = response.data.result;
		});
	}
]);

/* Fetches the List of All Users along with their details on the Right Content */

usersmanagement.controller('userlist', ['$scope', '$http',
	function($scope,$http) {
		$http.get(OC.filePath('settings', 'ajax', 'userlist.php')).then(function(response) {
			$scope.users = response.data.userdetails;
	});
	}
]);

/* Group Service */ 

usersmanagement.factory('GroupService', function($resource) {
	return {
		create: function () {
			return $resource(OC.filePath('settings', 'ajax', 'creategroup.php'), {}, {
				method : 'POST'
			});
		},
		remove: function () {
			return $resource(OC.filePath('settings', 'ajax', 'removegroup.php'), {}, {
				method: 'DELETE'
			});
		}
	};
});

/* User Serivce */

usersmanagement.factory('UserService', function($resource) {
	return {
		create: function () {
			return $resource(OC.filePath('settings', 'ajax', 'createuser.php'), {}, {
				method : 'POST'
			});
		},
		remove: function () {
			return $resource(OC.filePath('settings', 'ajax', 'removeuser.php'), {}, {
				method: 'DELETE'
			});
		}
	};
});

/* Asynchronously creates group */

usersmanagement.controller('creategroup', ['$scope', '$http', 'GroupService',
	function($scope, $http, GroupService) {
		var newgroup = {};
		$scope.savegroup = function() {
			console.log($scope.newgroup);
			GroupService.create().save({ groupname : $scope.newgroup });
		}
		$scope.disabledcreategroup = function() {
			// here comes the logic for disabling the "add group" button
			return false;
		}
	}
]);

/* TODO : Delete Groups from left sidebar */

/* TODO : Asynchronously creates user */

/* TODO : Delete Users from right content */

