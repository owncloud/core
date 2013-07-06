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

var usersmanagement = angular.module('usersmanagement', ['ngResource']).config(
['$httpProvider', function($httpProvider) {
	$httpProvider.defaults.headers.common['requesttoken'] = oc_requesttoken;	
}]);

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

usersmanagement.controller('grouplist', ['$scope', '$http', 'GroupService',
	function($scope, $http, GroupService) {
		$http.get(OC.filePath('settings', 'ajax', 'grouplist.php')).then(function(response){
			$scope.groupnames = response.data.result;
		});
		$scope.deletegroup = function(groupid) {
			GroupService.removegroup().delete({ groupname : groupid });
		}
	}
]);

/* Filters Grouplist - It Displays Admin on Top and the Remaining Alphabetically Sorted Right Below.
Needs More Love.
*/

usersmanagement.filter('groupsort', function() {
    return function (groups) {
		var grouplist;
		grouplist = function (group1, group2) {
			return group1.name > group2.name;
		}
		return groups.filter(function (group) { // Needs Attention Here!
			return group.name === 'admin';
		}).concat(groups.filter(function (group) {
			return group.name !== 'admin';
		}).sort(grouplist));
	}
});

/* Fetches the List of All Users and details on the Right Content */

usersmanagement.controller('userlist', ['$scope', '$http', 'QuotaService',
	function($scope,$http,QuotaService) {
		$http.get(OC.filePath('settings', 'ajax', 'userlist.php')).then(function(response) {
			$scope.users = response.data.userdetails;
	});
	}
]);

/* TODO : Asynchronously creates user */

/* TODO : Delete Users from right content */

