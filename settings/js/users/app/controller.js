/*
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

/* Controller for Creating Groups - Left Sidebar */

usersmanagement.controller('creategroupController',
	['$scope', '$http', 'GroupService', 'CreateGroupService',
	function($scope, $http, GroupService, CreateGroupService) {
		var newgroup = {};
		$scope.savegroup = function() {
			GroupService.creategroup().save({ groupname : $scope.newgroup });
			CreateGroupService.addNewGroup($scope.newgroup);
			$scope.showgroupinput = false;
			$scope.showbutton = true;
			$scope.newgroup = '';
		}
	}
]);

/* Fetches the List of All Groups - Left Sidebar */

usersmanagement.controller('grouplistController',
	['$scope', '$http', '$routeParams', 'GroupService', 'CreateGroupService', 'UserService',
	function($scope, $http, $routeParams, GroupService, CreateGroupService, UserService) {
		$scope.loading = true;
		$http.get(OC.filePath('settings', 'ajax', 'grouplist.php')).then(function(response){
			$scope.groupnames = response.data.result;
			var grouplist = $scope.groupnames;
			$scope.loading = false;

			$scope.groups = GroupService.getByGroupId($routeParams.groupid);

			//Ajaxifies the Group Addition
		    $scope.$watch(function() {
		        return CreateGroupService.groupname;
		    }, function(newGroupname, oldGroupname) {
				if (newGroupname !== oldGroupname) {
					getnewgroup(newGroupname);
				}
		    });
		    var getnewgroup = function(newname) {
		        grouplist.push({
					groupid : newname.replace(/\s/g, ''),
					name : newname,
					useringroup : [],
					isAdmin : false
		        });
		    }
			// Selects the current Group.
			$scope.selectGroup = function(groupid) {
				$scope.selectedGroup = groupid;
			}

			// Adds an Active class for the ng-class field.
			$scope.selectListGroup = function(groupid) {
				return groupid === $scope.selectedGroup ? 'active' : undefined;
			}

			// Deletes the group.
			$scope.deletegroup = function(group) {
				grouplist.splice(grouplist.indexOf(group), 1);
				GroupService.removegroup().delete({ groupname : group });
			}
		});
	}
]);

/* Asynchronously creates user */

usersmanagement.controller('addUserController',
	['$scope', '$http', 'UserService', 'GroupService',
	function($scope, $http, UserService, GroupService) {
		var newuser,password = {};
		var groups = [];
		$scope.saveuser = function() {
			UserService.createuser().save({ username : $scope.newuser }, { password : $scope.password }, { group : $scope.selectedgroup });
		}
		// Takes Out all groups for the Chosen dropdown
		$scope.allgroups = GroupService.getByGroupId().get();
	}
]);

usersmanagement.controller('setQuotaController',
	['$scope', 'QuotaService',
	function($scope, QuotaService) {
		// Shift Default Storage here.
	}
]);

/* Fetches the List of All Users and details on the Right Content */

usersmanagement.controller('userlistController',
	['$scope', '$http', 'UserService', 'GroupService', '$routeParams', 'CreateUserService',
	function($scope, $http, UserService, GroupService, $routeParams, CreateUserService) {
		$scope.loading = true;
		$http.get(OC.filePath('settings', 'ajax', 'userlist.php')).then(function(response) {
			$scope.users = response.data.userdetails;
			$scope.loading = false;

			/* Takes Out all groups for the Chosen dropdown */
			$scope.allgroups = GroupService.getByGroupId().get();

			//Ajaxifies the User Addition

		    $scope.$watch(function() {
		        return {
					'user' : CreateUserService.username,
					'useringroups' : CreateUserService.useringroups
				};
		    }, function(newUsername, oldUsername) {
				if (newUsername !== oldUsername) {
					getnewuser(newUsername);
				}
		    });

		    var getnewuser = function(newname) {
		        $scope.users.push({
					userid : newname.replace(/\s/g, ''),
					name : newname,
					displayname : newname,
					groups : CreateUserService.useringroups
		        });
		    }

			$scope.gid = $routeParams.groupid;

			$scope.deleteuser = function(user) {
				$scope.users.splice($scope.users.indexOf(user), 1);
				UserService.removeuser().delete({ username : user });
			};

			$scope.updateUser = function(field) {
				console.log(field);
				console.log($scope.users);
			}
		});
	}
]);
