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

usersmanagement.controller('grouplist', ['$scope', '$http',
	function($scope, $http) {
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

/* Asynchronously creates group */

usersmanagement.factory('newGroup', function($resource) {
	return $resource(OC.filePath('settings', 'ajax', 'grouplist.php'), {}, {
		update: { method : 'PUT' },
		query: { method : 'GET' }
	});
});

usersmanagement.controller('creategroup', ['$scope', '$http', 'newGroup',
	function($scope, $http) {
		var newgroup = {};
		var userid = {};
		$scope.savegroup = function() {
			console.log($scope.newgroup);
			newGroup.update({ name : $scope.newgroup, useringroup: userid });
			$scope.newgroup.reset();
		}
		$scope.disabledcreategroup = function() {
			// here comes the logic for disabling the "add group" button
			return false;
		}
	}
]);

/* Asynchronously creates user */

