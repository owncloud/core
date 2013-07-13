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

var usersmanagement = angular.module('usersmanagement', ['ngResource']).config(['$httpProvider','$routeProvider',
	function($httpProvider,$routeProvider) {
		$httpProvider.defaults.headers.common['requesttoken'] = oc_requesttoken;
		$routeProvider.when('users/group/:groupid', {
			controller : 'grouplist',
			templateUrl : OC.filePath('settings', 'templates/users', 'part.userlist.php')
		})
		.otherwise({ redirectTo : '/users'});	
	},
]);

/* Group Service */ 

usersmanagement.factory('GroupService', function($resource) {
	return {
		creategroup: function () {
			return $resource(OC.filePath('settings', 'ajax', 'creategroup.php'), {}, {
				method : 'POST'
			});
		},
		removegroup: function (group) {
			return $resource(OC.filePath('settings', 'ajax', 'removegroup.php'), group, {
				method: 'DELETE'
			});
		}
	};
});

/* User Serivce */

usersmanagement.factory('UserService', function($resource) {
	return {
		createuser: function () {
			return $resource(OC.filePath('settings', 'ajax', 'createuser.php'), {}, {
				method : 'POST'
			});
		},
		removeuser: function (users) {
			return $resource(OC.filePath('settings', 'ajax', 'removeuser.php'), users, {
				method: 'DELETE'
			});
		}
	};
});

/* Quota Service */

usersmanagement.factory('QuotaService', function($resource) {
	return $resource(OC.filePath('settings','ajax', 'setQuota.php'), {}, {
		method : 'POST'
	});
});

/* Asynchronously creates group */

usersmanagement.controller('creategroup', ['$scope', '$http', 'GroupService',
	function($scope, $http, GroupService) {
		var newgroup = {};
		$scope.savegroup = function() {
			GroupService.creategroup().save({ groupname : $scope.newgroup });
		}
		$scope.disabledcreategroup = function() {
			// here comes the logic for disabling the "add group" button
			return false;
		}
	}
]);

/* Fetches the List of All Groups - Left Sidebar */

usersmanagement.controller('grouplist', ['$scope', '$http', '$location', 'GroupService',
	function($scope, $http, GroupService, $location) {
		$http.get(OC.filePath('settings', 'ajax', 'grouplist.php')).then(function(response){
			$scope.groupnames = response.data.result;
		});
		$scope.switchuser = function(groupid) {
			$location.url('/group/' + groupid);
		}
		$scope.deletegroup = function(groupid) {
			GroupService.removegroup().delete({ groupname : groupid });
		}
	}
]);

/* Fetches the List of All Users and details on the Right Content */

usersmanagement.controller('userlist', ['$scope', '$http', '$routeParams', '$location', 'QuotaService', 'UserService',
	function ($scope, $http, $route, $routeParams, $location, QuotaService, UserService) {
		$http.get(OC.filePath('settings', 'ajax', 'userlist.php')).then(function(response) {
			$scope.users = response.data.userdetails;
		});
		$scope.deleteuser = function(userid) {
			UserService.removeuser().delete({ username : userid });
		}
	}
]);

/* Filters the userlist for the respective group */

usersmanagement.filter('usertogroup', function() {
	return function(users,groups) {
		var groupusers = [];
		for(var i=0; i<users.length; i++) {
			for (var j=0; j<groups.length; j++ ) {
				if(users[i].userid === groups[j]) {
					groupusers.push(users[i]);
				}
			}
		}
		return groupusers;
	}
});