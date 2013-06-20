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

usersmanagement.controller('grouplist', function($scope, $http) {
	$http.post(OC.filePath('settings', 'ajax', 'getsettinginfo.php'))
		.then(function(response){
			$scope.groupnames = response.data.result.groups;
		});
});

/* Fetches the List of All Users along with their details on the Right Content */

usersmanagement.controller('userlist', function($scope, $http) {
	$http.post(OC.filePath('settings', 'ajax', 'userlist.php'))
		.then(function(response) {
			$scope.usernames = response.data.users;
		});
});

/* Asynchronously creates user */

usersmanagement.controller('creategroup', function($scope, $http) {
	$http.get(OC.filePath('settings', 'ajax', 'creategroup.php'))
	.then(function(response) {
		
	});
})

/* Asynchronously creates group */

