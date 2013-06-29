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

var usersmanagement = angular.module('usersmanagement', []);

/* Fetches the List of All Groups - Left Sidebar */

usersmanagement.controller('grouplist', ['$scope', '$http',
	function($scope, $http) {
		$http.post(OC.filePath('settings', 'ajax', 'grouplist.php')).then(function(response){
			$scope.groupnames = response.data.result;
		});
	}
]);

/* Fetches the List of All Users along with their details on the Right Content */

usersmanagement.controller('userlist', ['$scope', '$http',
	function($scope,$http) {
		$http.post(OC.filePath('settings', 'ajax', 'userlist.php')).then(function(response) {
			$scope.users = response.data.userdetails;
	});
	}
]);

/* Asynchronously creates group */

usersmanagement.controller('creategroup', ['$scope', '$http',
	function($scope, $http) {
		var newgroup = {};
		$http.post(OC.filePath('settings', 'ajax', 'creategroup.php')).then(function(response) {
			$scope.savegroup = function(response,data) {
				console.log($scope.newgroup);
				response.data.result.groupname.$save($scope.newgroup); /* Something is wrong here */
			}
			$scope.disabledcreategroup = function(response) {

			}
		});
	}
]);

/* Asynchronously creates user */

